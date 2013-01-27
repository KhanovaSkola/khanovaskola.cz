-- SQL Initialization

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `khanovaskola` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `khanovaskola`;


DROP TABLE IF EXISTS `_version`;
CREATE TABLE `_version` (
  `version` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


INSERT INTO `_version` (`version`) VALUES (0)
