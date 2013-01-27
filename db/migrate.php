<?php

require __DIR__ . '/../vendor/autoload.php';

use Nette\Utils\Finder;

$modes = ['local', 'test'];
if ($argc !== 2 || !in_array($argv[1], $modes)) {
	echo "Usage $argv[0] (" . implode('|', $modes) . ")\n";
	die(1);
}

$configurator = new Nette\Config\Configurator;
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->createRobotLoader()
	->register();

$configurator->addConfig(__DIR__ . "/../app/config/config.db.neon");
$configurator->addConfig(__DIR__ . "/../app/config/config.$argv[1].neon");
$container = $configurator->createContainer();

$c = $container->parameters['database'];
$db = @new mysqli($c['host'], $c['user'], $c['password'], $c['dbname']);
if ($db->connect_errno === 1049) {
	$db = new mysqli($c['host'], $c['user'], $c['password']);
	$db->multi_query("
		CREATE DATABASE `$c[dbname]` COLLATE 'utf8_general_ci';

		GRANT ALL ON `$c[host]`.* TO '$c[user]'@'localhost';
		FLUSH PRIVILEGES;

		USE `$c[dbname]`;

		DROP TABLE IF EXISTS `_version`;
		CREATE TABLE `_version` (
		  `version` bigint(20) unsigned NOT NULL,
		  `migration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`version`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

		INSERT INTO `_version` (`version`) VALUES (0);
	");
	if ($db->connect_errno) {
		die($db->connect_error);
	}

	$db->close();
	echo "\033[32mCreated new database\033[0m\n";
	$db = @new mysqli($c['host'], $c['user'], $c['password'], $c['dbname']);

} else if ($db->connect_errno) {
	die($db->connect_error);
}

$shards = [];
foreach (Finder::findFiles('*.sql')->from(__DIR__) as $file => $i)
{
	$order = (int) pathinfo($file)['filename'];
	$shards[$order] = $file;
}

ksort($shards);

$res = $db->query('SELECT version FROM _version');
$row = $res->fetch_object();
$version = (int) ($row ? $row->version : 0);
$res->free();

if ($version === array_reverse(array_keys($shards))[0]) {
	echo "\033[1;34mDatabase already on the most recent version\033[0m\n";
	die;
}

$first = TRUE;
foreach ($shards as $i => $file)
{
	if ($i < $version) {
		continue;
	} else if ($i === $version) {
		echo "Skipping all migrations up to " . ($version + 1) . "\n\n";
		continue;
	}

	$query = trim(file_get_contents($file));
	$query = str_replace('`khanovaskola`', '`' . $container->parameters['database']['dbname'] . '`', $query);
	multiQuery($db, $query);

	if ($first) {
		echo "\n";
		$first = FALSE;
	}
	echo Highlight::color(pad($query, "  ")) . "\n\n";

	multiQuery($db, "UPDATE _version SET version=$i");
}
echo "\033[1;32mDatabase updated\033[0m\n";


function multiQuery($db, $query)
{
	$db->multi_query($query);

	while ($db->more_results() && $db->next_result()) {
	    $res = $db->use_result();
	    if ($res instanceof mysqli_result) {
	        $res->free();
	    }
	}
}



function pad($string, $pad)
{
	$result = [];
	foreach (explode("\n", $string) as $line) {
		$result[] = $pad . $line;
	}
	return implode("\n", $result);
}



class Highlight {
	// constants must be first, otherwise it break the formatting
	protected static $colors = ['constants' => '31', 'chars' => '33', 'keywords' => '34', 'joins' => '33', 'functions' => '35'];

	protected static $words = [
		'keywords' => [
			'SELECT', 'UPDATE', 'INSERT', 'DELETE', 'REPLACE', 'INTO', 'CREATE', 'ALTER', 'TABLE', 'DROP', 'TRUNCATE', 'FROM',
			'ADD', 'CHANGE', 'COLUMN', 'KEY',
			'WHERE', 'ON', 'CASE', 'WHEN', 'THEN', 'END', 'ELSE', 'AS',
			'USING', 'USE', 'INDEX', 'CONSTRAINT', 'REFERENCES', 'DUPLICATE',
			'LIMIT', 'OFFSET', 'SET', 'SHOW', 'STATUS',
			'BETWEEN', 'AND', 'IS', 'NOT', 'OR', 'XOR', 'INTERVAL', 'TOP',
			'GROUP BY', 'ORDER BY', 'DESC', 'ASC', 'COLLATE', 'NAMES', 'UTF8', 'DISTINCT', 'DATABASE',
			'CALC_FOUND_ROWS', 'SQL_NO_CACHE', 'MATCH', 'AGAINST', 'LIKE', 'REGEXP', 'RLIKE',
			'PRIMARY', 'AUTO_INCREMENT', 'DEFAULT', 'IDENTITY', 'VALUES', 'PROCEDURE', 'FUNCTION',
			'TRAN', 'TRANSACTION', 'COMMIT', 'ROLLBACK', 'SAVEPOINT', 'TRIGGER', 'CASCADE',
			'DECLARE', 'CURSOR', 'FOR', 'DEALLOCATE',
		],
	  	'joins' => [
	  		'JOIN', 'INNER', 'OUTER', 'FULL', 'NATURAL', 'LEFT', 'RIGHT',
		],
		'chars' => '~([.,()<>:=`]+)~i',
		'functions' => [
			'MIN', 'MAX', 'SUM', 'COUNT', 'AVG', 'CAST', 'COALESCE', 'CHAR_LENGTH', 'LENGTH', 'SUBSTRING',
			'DAY', 'MONTH', 'YEAR', 'DATE_FORMAT', 'CRC32', 'CURDATE', 'SYSDATE', 'NOW', 'GETDATE',
			'FROM_UNIXTIME', 'FROM_DAYS', 'TO_DAYS', 'HOUR', 'IFNULL', 'ISNULL', 'NVL', 'NVL2',
			'INET_ATON', 'INET_NTOA', 'INSTR', 'FOUND_ROWS',
			'LAST_INSERT_ID', 'LCASE', 'LOWER', 'UCASE', 'UPPER',
			'LPAD','RPAD','RTRIM','LTRIM',
			'MD5','MINUTE', 'ROUND',
			'SECOND', 'SHA1', 'STDDEV', 'STR_TO_DATE', 'WEEK',
		],
		'constants' => '~("[^"]*"|\'[^\']*\'|\b[0-9]+)~i'
	];

	public static function color($sql)
	{
		$sql = str_replace('\\\'', '\\&#039;', $sql);
		foreach(self::$colors as $key => $color) {
			if (in_array($key, ['constants', 'chars'])) {
				$regexp = self::$words[$key];
			} else {
				$regexp = '~\\b(' . join("|", self::$words[$key]) . ')\\b~i';
			}

			$sql = preg_replace($regexp, "\033[{$color}m$1\033[0m", $sql);
		}
		return $sql;
	}
}
