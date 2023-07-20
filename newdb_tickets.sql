-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ticket.department
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`),
  KEY `department_name` (`department_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ticket.department: ~4 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
REPLACE INTO `department` (`department_id`, `department_name`) VALUES
	(2, 'Engineering'),
	(4, 'General Services'),
	(1, 'IT'),
	(3, 'Nursing Station');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table ticket.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `priority` enum('Red Flag','Urgent','High','Medium','Low') DEFAULT 'Medium',
  `user_id` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Open','Partially closed') NOT NULL DEFAULT 'Open',
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title_msg_email_created_status_department_id` (`title`,`user_id`,`date_created`,`status`,`department_id`) USING BTREE,
  KEY `date_modified` (`date_modified`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table ticket.tickets: ~1 rows (approximately)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
REPLACE INTO `tickets` (`id`, `title`, `msg`, `priority`, `user_id`, `date_created`, `date_modified`, `status`, `department_id`) VALUES
	(8, 'Wlay kuryente', 'Wlay kuryente among CR. palihog ko subay engr.', 'Medium', '2', '2022-11-17 11:43:46', '2022-11-25 09:22:04', 'Partially closed', 2),
	(9, 'No Power inside the office', 'Ng start ni yesterday afternoon, wlay nay kuryente sa office.', 'High', '1', '2022-11-25 08:36:22', '2022-11-25 09:21:42', 'Partially closed', 2),
	(10, 'No network connection among PC', 'Wlay internet connection among PC, palihog ko check.', 'High', '3', '2022-11-25 11:37:12', '2022-11-25 11:37:12', 'Open', 1);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Dumping structure for table ticket.tickets_comments
CREATE TABLE IF NOT EXISTS `tickets_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table ticket.tickets_comments: ~1 rows (approximately)
/*!40000 ALTER TABLE `tickets_comments` DISABLE KEYS */;
REPLACE INTO `tickets_comments` (`id`, `ticket_id`, `msg`, `created`, `user_id`) VALUES
	(5, 8, 'Okay sir, pa anha-an ra nko sir.', '2022-11-17 11:46:24', 3),
	(6, 9, 'Okay sir, pa anhaan ra nko og tao mo check sir.', '2022-11-25 09:05:13', 3),
	(7, 9, 'Need pa subayon ang linya sir kung asa ang nka cause sa wlay kuryente.', '2022-11-25 09:09:42', 3),
	(8, 9, 'Na fixed na sir. naa ray wired na potol.', '2022-11-25 09:21:33', 3),
	(9, 10, 'Ok sir. among e check ang emong unit unya sir.', '2022-11-25 11:39:38', 1);
/*!40000 ALTER TABLE `tickets_comments` ENABLE KEYS */;

-- Dumping structure for table ticket.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_type` enum('admin','employee') DEFAULT 'employee',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`user_id`),
  KEY `username_password_name_department_id_date_created_status` (`username`,`password`,`name`,`department_id`,`date_created`,`status`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ticket.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`user_id`, `username`, `password`, `name`, `department_id`, `user_type`, `date_created`, `status`) VALUES
	(1, 'admin', '0192023a7bbd73250516f069df18b500', 'administrator', 1, 'admin', '2022-11-01 08:51:39', 'active'),
	(2, 'it', '0192023a7bbd73250516f069df18b500', 'Joseph Santos', 1, 'employee', '2022-11-03 20:02:05', 'active'),
	(3, 'engineer', '0192023a7bbd73250516f069df18b500', 'William Clave', 2, 'employee', '2022-11-03 20:02:05', 'active'),
	(4, 'employee', '0192023a7bbd73250516f069df18b500', 'employee', 3, 'employee', '2022-11-03 20:02:05', 'active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
