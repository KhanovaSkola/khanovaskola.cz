
ALTER TABLE `tag`
ADD `description` text COLLATE 'utf8_czech_ci' NOT NULL AFTER `label`,
COMMENT='';
