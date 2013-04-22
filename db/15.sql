

DELETE FROM `url`
WHERE `type` = 'video_ad';

ALTER TABLE `url`
CHANGE `type` `type` enum('article','category','exercise','tag','video') COLLATE 'utf8_czech_ci' NOT NULL AFTER `id`,
COMMENT='';
