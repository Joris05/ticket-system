-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ticket.department
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`),
  KEY `department_name` (`department_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ticket.department: ~2 rows (approximately)
INSERT INTO `department` (`department_id`, `department_name`) VALUES
	(2, 'Engineering'),
	(1, 'IT Department');

-- Dumping structure for table ticket.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `msg` text NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Open','Partially closed') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'Open',
  `department_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title_msg_email_created_status_department_id` (`title`,`user_id`,`date_created`,`status`,`department_id`) USING BTREE,
  KEY `date_modified` (`date_modified`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ticket.tickets: ~1 rows (approximately)
INSERT INTO `tickets` (`id`, `title`, `msg`, `user_id`, `date_created`, `date_modified`, `status`, `department_id`) VALUES
	(1, 'Network', 'Page not dound.', '2', '2022-11-03 20:03:45', '2022-11-03 20:03:46', 'Open', 1);

-- Dumping structure for table ticket.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int NOT NULL,
  `user_type` enum('admin','employee') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'employee',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `username_password_name_department_id_date_created_status` (`username`,`password`,`name`,`department_id`,`date_created`,`status`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table ticket.users: ~2 rows (approximately)
INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `department_id`, `user_type`, `date_created`, `status`) VALUES
	(1, 'admin', '0192023a7bbd73250516f069df18b500', 'administrator', 1, 'admin', '2022-11-01 08:51:39', 'active'),
	(2, 'it', '0192023a7bbd73250516f069df18b500', 'it', 1, 'employee', '2022-11-03 20:02:05', 'active');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
