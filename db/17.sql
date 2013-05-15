
ALTER TABLE `video`
ADD `external_exercise_url` varchar(512) COLLATE 'utf8_czech_ci' NOT NULL AFTER `author_id`,
COMMENT='';
