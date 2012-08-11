-- Adminer 3.4.0-dev MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `khanacademy`;

DELIMITER ;;

DROP PROCEDURE IF EXISTS `trim_youtube_ids`;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `trim_youtube_ids`()
UPDATE video SET youtube_id = trim(youtube_id);;

DELIMITER ;

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


DROP TABLE IF EXISTS `exercise`;
CREATE TABLE `exercise` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'název',
  `slug` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'soubor',
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Cvičení';


DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'tag',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Tagy';


DROP TABLE IF EXISTS `tag_video`;
CREATE TABLE `tag_video` (
  `tag_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`tag_id`,`video_id`),
  KEY `video_id` (`video_id`),
  CONSTRAINT `tag_video_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tag_video_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'mail',
  `password` binary(32) NOT NULL,
  `salt` binary(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Uživatelé';


DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL COMMENT 'kategorie',
  `exercise_id` bigint(20) unsigned DEFAULT NULL COMMENT 'cvičení',
  `label` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'titulek',
  `slug` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL COMMENT 'abstrakt',
  `youtube_id` varchar(50) COLLATE utf8_czech_ci NOT NULL COMMENT 'youtube_id',
  `position` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`),
  KEY `category_id` (`category_id`),
  KEY `exercise_id` (`exercise_id`),
  CONSTRAINT `video_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `video_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Videa';


DROP VIEW IF EXISTS `videos_with_error`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `videos_with_error` AS select `video`.`id` AS `id`,`video`.`category_id` AS `category_id`,`video`.`exercise_id` AS `exercise_id`,`video`.`label` AS `label`,`video`.`description` AS `description`,`video`.`youtube_id` AS `youtube_id`,`video`.`position` AS `position` from `video` where (`video`.`description` like '%.');

-- 2012-08-11 19:23:07
