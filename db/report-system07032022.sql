-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for report_system
CREATE DATABASE IF NOT EXISTS `report_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `report_system`;

-- Dumping structure for table report_system.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table report_system.admin: ~8 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
	(1, 'khin', 'khin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(2, 'may', 'may@gmail.com', '01cfcd4f6b8770febfb40cb906715822'),
	(3, 'sai', 'sai@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(4, 'set', 'set@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(5, 'aye', 'aye@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(6, 'aye', 'a@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(7, 'aye', 'aaa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(8, 'myint', 'myint@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
	(9, 'aa', 'aa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table report_system.report
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report` text NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT '0',
  `adminId` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table report_system.report: ~14 rows (approximately)
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id`, `report`, `date`, `adminId`, `created_date`, `updated_date`) VALUES
	(1, 'Hello khin', '2022-02-08', 1, '2022-02-06 08:16:49', '2022-02-06 08:16:49'),
	(2, 'Hello \r\nAre you busy\r\n', '2022-02-05', 1, '2022-02-06 08:17:05', '2022-02-06 08:17:05'),
	(4, 'Hello How are you?', '2022-02-03', 2, '2022-02-06 08:17:54', '2022-02-06 08:17:54'),
	(5, 'Hello Are you free?', '2022-02-02', 4, '2022-02-06 08:19:46', '2022-02-06 08:19:46'),
	(6, 'Are you ok is everything?', '2022-02-01', 3, '2022-02-06 08:20:30', '2022-02-06 08:20:30'),
	(9, 'ddddddddddd', '2022-02-11', 1, '2022-02-20 11:46:10', '2022-02-20 11:46:10'),
	(10, 'ss', '2022-03-02', 1, '2022-03-01 04:09:08', '2022-03-01 04:09:08'),
	(12, 'dd', '2022-03-02', 1, '2022-03-01 04:09:41', '2022-03-01 04:09:41'),
	(13, 'ff', '2022-03-03', 1, '2022-03-01 04:09:49', '2022-03-01 04:09:49'),
	(14, 'www', '2022-03-04', 1, '2022-03-04 09:36:23', '2022-03-04 09:36:23'),
	(15, 'Lorem ipsum dolor sit amet, ', '2022-03-04', 1, '2022-03-04 09:37:40', '2022-03-04 09:37:40'),
	(16, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur unde qui quia laborum officiis', '2022-03-07', 2, '2022-03-07 02:14:51', '2022-03-07 02:14:51'),
	(17, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur unde qui quia laborum officiis\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur unde qui quia laborum officiis', '2022-03-06', 2, '2022-03-07 10:23:17', '2022-03-07 10:23:17');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
