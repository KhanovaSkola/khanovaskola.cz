-- Adminer 3.5.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `exercise_id` (`exercise_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE CASCADE,
  CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `is_leaf` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'titulek',
  `slug` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL COMMENT 'abstrakt',
  `position` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Kategorie';


DROP TABLE IF EXISTS `category_exercise`;
CREATE TABLE `category_exercise` (
  `category_id` bigint(20) unsigned NOT NULL COMMENT 'kategorie',
  `exercise_id` bigint(20) unsigned NOT NULL COMMENT 'cvičení',
  `position` int(10) unsigned NOT NULL COMMENT 'pozice',
  PRIMARY KEY (`category_id`,`exercise_id`),
  KEY `exercise_id` (`exercise_id`),
  CONSTRAINT `category_exercise_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_exercise_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Kategorie:Cvičení';


DROP TABLE IF EXISTS `category_video`;
CREATE TABLE `category_video` (
  `category_id` bigint(20) unsigned NOT NULL COMMENT 'kategorie',
  `video_id` bigint(20) unsigned NOT NULL COMMENT 'video',
  `position` int(10) unsigned NOT NULL COMMENT 'pozice',
  PRIMARY KEY (`category_id`,`video_id`),
  KEY `video_id` (`video_id`),
  CONSTRAINT `category_video_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_video_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Kategorie:Videa';


DROP TABLE IF EXISTS `coach`;
CREATE TABLE `coach` (
  `coach_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`coach_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `coach_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `exercise`;
CREATE TABLE `exercise` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'název',
  `slug` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'soubor',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Cvičení';


DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user` (
  `group_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `percent` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `video_id` (`video_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE,
  CONSTRAINT `progress_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'tag',
  `display` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Tagy';


DROP TABLE IF EXISTS `tag_video`;
CREATE TABLE `tag_video` (
  `tag_id` bigint(20) unsigned NOT NULL COMMENT 'Tag',
  `video_id` bigint(20) unsigned NOT NULL COMMENT 'Video',
  PRIMARY KEY (`tag_id`,`video_id`),
  KEY `video_id` (`video_id`),
  CONSTRAINT `tag_video_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tag_video_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Video:Tagy';


DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coach_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL COMMENT 'user_id OR group_id NOT NULL',
  `group_id` bigint(20) unsigned DEFAULT NULL COMMENT 'user_id OR group_id NOT NULL',
  `video_id` bigint(20) unsigned DEFAULT NULL COMMENT 'video_id OR exercise_id NOT NULL',
  `exercise_id` bigint(20) unsigned DEFAULT NULL COMMENT 'video_id OR exercise_id NOT NULL',
  `completed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deadline` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  KEY `video_id` (`video_id`),
  KEY `exercise_id` (`exercise_id`),
  KEY `coach_id` (`coach_id`),
  CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_ibfk_3` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_ibfk_4` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_ibfk_5` FOREIGN KEY (`coach_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'mail',
  `password` binary(32) NOT NULL,
  `salt` binary(8) NOT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Uživatelé';


DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` bigint(20) unsigned DEFAULT NULL COMMENT 'cvičení',
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'titulek',
  `slug` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL COMMENT 'abstrakt',
  `youtube_id` varchar(50) COLLATE utf8_czech_ci NOT NULL COMMENT 'youtube_id (bez mezer okolo)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`),
  KEY `exercise_id` (`exercise_id`),
  CONSTRAINT `video_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Videa';


DROP VIEW IF EXISTS `_autocomplete`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `_autocomplete` AS select `category`.`label` AS `label` from `category` union select `exercise`.`label` AS `label` from `exercise` union select `tag`.`label` AS `label` from `tag` union select `video`.`label` AS `label` from `video`;

-- 2012-11-03 17:13:10
