# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25-0ubuntu0.18.04.2)
# Database: ms_db
# Generation Time: 2020-05-05 08:19:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table manage_eod
# ------------------------------------------------------------

DROP TABLE IF EXISTS `manage_eod`;

CREATE TABLE `manage_eod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_id` bigint(10) DEFAULT NULL,
  `prefix` enum('MAN','API','CHECK') NOT NULL DEFAULT 'MAN',
  `ticket_number` bigint(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` enum('NOT_STARTED','INITIATED','STARTED','MID_LEVEL','PEER_REVIEW','STAG_TESTING','BIG_FIXES','WAIT_PROD','PROD_TESTING','BLOCKED','DONE') NOT NULL DEFAULT 'NOT_STARTED',
  `estimated_time` varchar(20) NOT NULL DEFAULT '',
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL,
  `remaining_time` varchar(20) NOT NULL DEFAULT '',
  `complete_percentage` int(100) NOT NULL,
  `mark` int(11) NOT NULL DEFAULT '100',
  `comments` varchar(250) NOT NULL,
  `is_subticket` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `main_ticket_no` int(11) DEFAULT NULL,
  `is_testing` varchar(20) NOT NULL DEFAULT '',
  `iteration_no` int(20) DEFAULT NULL,
  `created_date_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `manage_eod` WRITE;
/*!40000 ALTER TABLE `manage_eod` DISABLE KEYS */;

INSERT INTO `manage_eod` (`id`, `user_name`, `user_id`, `prefix`, `ticket_number`, `description`, `status`, `estimated_time`, `login_time`, `logout_time`, `remaining_time`, `complete_percentage`, `mark`, `comments`, `is_subticket`, `main_ticket_no`, `is_testing`, `iteration_no`, `created_date_time`, `updated_time`, `date`)
VALUES
	(1,'raja',512,'MAN',1234,'eod report','INITIATED','6h','00:00:00','00:00:00','',0,100,'','NO',NULL,'',0,'2020-05-05 07:46:06','0000-00-00 00:00:00','2020-05-05 07:46:06');

/*!40000 ALTER TABLE `manage_eod` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table manage_eod_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `manage_eod_logs`;

CREATE TABLE `manage_eod_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eod_id` bigint(10) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `login_time` time(6) NOT NULL,
  `logout_time` time(6) NOT NULL,
  `remaining_time` varchar(20) NOT NULL,
  `complete_percentage` int(100) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `status` enum('NOT_STARTED','INITIATED','STARTED','MID_LEVEL','PEER_REVIEW','STAG_TESTING','BIG_FIXES','WAIT_PROD','PROD_TESTING','BLOCKED','DONE') DEFAULT 'NOT_STARTED',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `manage_eod_logs` WRITE;
/*!40000 ALTER TABLE `manage_eod_logs` DISABLE KEYS */;

INSERT INTO `manage_eod_logs` (`id`, `eod_id`, `user_name`, `login_time`, `logout_time`, `remaining_time`, `complete_percentage`, `created_at`, `status`)
VALUES
	(1,1,'raja','00:00:00.000000','00:00:00.000000','',20,'0000-00-00 00:00:00.000000','INITIATED'),
	(2,1,'raja','00:00:00.000000','00:00:00.000000','',30,'0000-00-00 00:00:00.000000','STARTED'),
	(3,1,'raja','00:00:00.000000','00:00:00.000000','',40,'0000-00-00 00:00:00.000000','PEER_REVIEW'),
	(4,1,'raja','00:00:00.000000','00:00:00.000000','',60,'0000-00-00 00:00:00.000000','BIG_FIXES'),
	(5,1,'raja','00:00:00.000000','00:00:00.000000','',100,'0000-00-00 00:00:00.000000','PROD_TESTING'),
	(6,1,'raja','00:00:00.000000','00:00:00.000000','',0,'0000-00-00 00:00:00.000000','DONE');

/*!40000 ALTER TABLE `manage_eod_logs` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
