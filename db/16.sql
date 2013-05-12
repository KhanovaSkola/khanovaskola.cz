
ALTER TABLE `video`
ADD `youtube_id_original` varchar(50) COLLATE 'utf8_czech_ci' NOT NULL COMMENT 'originální youtube_id (pokud dubbed)' AFTER `youtube_id`,
COMMENT='';
