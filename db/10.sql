
ALTER TABLE `progress`
ADD `category_id` bigint(20) unsigned NULL AFTER `id`,
ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
COMMENT='';
