#!/bin/sh

echo Migrate database
php db/migrate.php test --drop > /dev/null
php db/migrate.php test > /dev/null
php vendor/nette/tester/Tester/tester tests/ -s
#php db/migrate.php test --drop > /dev/null
