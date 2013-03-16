
CREATE TABLE `exercise_translation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` bigint(20) unsigned NULL,
  `text` text NOT NULL,
  `template` text COLLATE 'utf8_czech_ci' NOT NULL,
  `file` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) COMMENT='';
