
ALTER TABLE `video`
ADD `timestamp` timestamp NOT NULL AFTER `exercise_id`,
COMMENT='';

ALTER TABLE `user`
ADD `timestamp` timestamp NOT NULL AFTER `id`,
COMMENT='Uživatelé';

ALTER TABLE `group`
ADD `timestamp` timestamp NOT NULL AFTER `user_id`,
COMMENT='';

ALTER TABLE `exercise`
ADD `timestamp` timestamp NOT NULL AFTER `id`,
COMMENT='';

ALTER TABLE `category`
ADD `timestamp` timestamp NOT NULL AFTER `parent_id`,
COMMENT='';
