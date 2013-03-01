
CREATE TABLE `video_verification` (
  `video_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL,
  FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) COMMENT='';
ALTER TABLE `video_verification`
ADD PRIMARY KEY `video_id_user_id` (`video_id`, `user_id`);
