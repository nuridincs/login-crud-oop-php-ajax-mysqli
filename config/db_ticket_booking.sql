-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_ticket_booking.app_seats
CREATE TABLE IF NOT EXISTS `app_seats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_seats` varchar(50) NOT NULL,
  `number_seats` int(11) DEFAULT NULL,
  `wk_rekam` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fl_use` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_app_seats_reff_seats` (`kd_seats`),
  CONSTRAINT `FK_app_seats_reff_seats` FOREIGN KEY (`kd_seats`) REFERENCES `reff_seats` (`kd_seats`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ticket_booking.app_seats: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_seats` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_seats` ENABLE KEYS */;

-- Dumping structure for table db_ticket_booking.app_users
CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_app_users_reff_role` (`role`),
  CONSTRAINT `FK_app_users_reff_role` FOREIGN KEY (`role`) REFERENCES `reff_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ticket_booking.app_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;
INSERT INTO `app_users` (`id`, `nama`, `email`, `password`, `role`) VALUES
	(1, 'dev', 'dev@dev.com', '202cb962ac59075b964b07152d234b70', 1),
	(7, 'tejo', 'tejo@admin.com', '25d55ad283aa400af464c76d713c07ad', 1);
/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;

-- Dumping structure for table db_ticket_booking.reff_role
CREATE TABLE IF NOT EXISTS `reff_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ticket_booking.reff_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `reff_role` DISABLE KEYS */;
INSERT INTO `reff_role` (`id`, `kategori`) VALUES
	(1, 'System Admin');
/*!40000 ALTER TABLE `reff_role` ENABLE KEYS */;

-- Dumping structure for table db_ticket_booking.reff_seats
CREATE TABLE IF NOT EXISTS `reff_seats` (
  `kd_seats` varchar(50) NOT NULL,
  `nama_seats` varchar(50) DEFAULT NULL,
  `panjang` varchar(50) DEFAULT NULL,
  `lebar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_seats`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ticket_booking.reff_seats: ~0 rows (approximately)
/*!40000 ALTER TABLE `reff_seats` DISABLE KEYS */;
INSERT INTO `reff_seats` (`kd_seats`, `nama_seats`, `panjang`, `lebar`) VALUES
	('SEATS', 'TEST SEATS', '20', '5');
/*!40000 ALTER TABLE `reff_seats` ENABLE KEYS */;

-- Dumping structure for table db_ticket_booking.register
CREATE TABLE IF NOT EXISTS `register` (
  `userid` varchar(50) NOT NULL COMMENT 'userid',
  `name` varchar(50) NOT NULL COMMENT 'name',
  `email` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `address` varchar(500) NOT NULL COMMENT 'address',
  `contact` varchar(50) NOT NULL COMMENT 'contact',
  `message` varchar(500) NOT NULL COMMENT 'Message',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ticket_booking.register: ~3 rows (approximately)
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` (`userid`, `name`, `email`, `password`, `address`, `contact`, `message`) VALUES
	('AbhijeetMuneshwar', 'Abhijeet Ashok Muneshwar', 'openingknots@gmail.com', 'ABHIJ33T@1', 'Sphurti Vihar, B wing, Survey no. 16, 4/3, 2nd floor, block no. 4, Ambegaon Pathar, Pune ? 411046.', '9174112881', 'asfaf'),
	('Mohit', 'Abhijeet Ashok Muneshwar', 'openingknots@gmail.com', 'Mohit', 'Sphurti Vihar, B wing, Survey no. 16, 4/3, 2nd floor, block no. 4, Ambegaon Pathar, Pune ? 411046.', '9174112881', 'Hi !!\r\nHello\r\nHow are you ?'),
	('ncs', 'nuridincs', 'nuridin50@gmail.com', '123', 'Jalan amal raya jakarta timur', '1231235345', 'test'),
	('suyash', 'Suyash', 'suyash@gmal.com', 'suyash', 'NITK', '7984561200', 'Hi');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;

-- Dumping structure for table db_ticket_booking.seat
CREATE TABLE IF NOT EXISTS `seat` (
  `userid` varchar(50) NOT NULL COMMENT 'userid',
  `number` int(10) NOT NULL COMMENT 'seat number',
  `PNR` varchar(13) NOT NULL COMMENT 'PNR',
  `date` date NOT NULL COMMENT 'date of booking'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ticket_booking.seat: ~2 rows (approximately)
/*!40000 ALTER TABLE `seat` DISABLE KEYS */;
INSERT INTO `seat` (`userid`, `number`, `PNR`, `date`) VALUES
	('AbhijeetMuneshwar', 2, '2013-05-21-2', '2013-05-21'),
	('Mohit', 5, '2013-05-21-5', '2013-05-21');
/*!40000 ALTER TABLE `seat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
