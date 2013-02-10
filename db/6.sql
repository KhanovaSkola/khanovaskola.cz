
CREATE TABLE `exercise_status` (
  `exercise_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL,
  `status` enum('started','struggling','proficient') NOT NULL,
  FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) COMMENT='' ENGINE='InnoDB';
