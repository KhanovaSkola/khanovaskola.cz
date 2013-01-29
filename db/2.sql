
CREATE TABLE `want_translated` (
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) COMMENT='' ENGINE='InnoDB' COLLATE 'utf8_czech_ci';

ALTER TABLE `want_translated`
ADD PRIMARY KEY `user_id_category_id` (`user_id`, `category_id`),
DROP INDEX `user_id`;
