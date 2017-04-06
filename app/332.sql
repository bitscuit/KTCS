-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for 332
CREATE DATABASE IF NOT EXISTS `332` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `332`;

-- Dumping structure for table 332.car
CREATE TABLE IF NOT EXISTS `car` (
  `vin` varchar(20) NOT NULL,
  `parking_address` varchar(50) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `make_year` year(4) NOT NULL,
  `daily_rental_fee` decimal(15,2) NOT NULL,
  PRIMARY KEY (`vin`),
  KEY `FK_car_parking_location` (`parking_address`),
  CONSTRAINT `FK_car_parking_location` FOREIGN KEY (`parking_address`) REFERENCES `parking_location` (`parking_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table 332.car: ~4 rows (approximately)
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` (`vin`, `parking_address`, `make`, `model`, `make_year`, `daily_rental_fee`) VALUES
	('123gh45rt7y6534rw', '67 Albert St', 'Chevy', 'Cruise', '2016', 105.00),
	('32498fb', '20 Division St', 'Honda', 'Civic', '2014', 99.99),
	('435grgwg', '67 Albert St', 'Lamborgini', 'Mercialago', '2007', 750.98),
	('736hfyst618hye76t', '20 Division St', 'Ferrari', 'Spider', '1996', 600.99),
	('8473hh278', '20 Division St', 'Toyota', 'Carolla', '2016', 120.98);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;

-- Dumping structure for table 332.car_maintenance_history
CREATE TABLE IF NOT EXISTS `car_maintenance_history` (
  `vin` varchar(20) NOT NULL,
  `maintenance_date` date NOT NULL,
  `odometer_reading` int(20) NOT NULL,
  `maintenance_type` enum('Scheduled','Repair','Body Work') NOT NULL,
  `description` varchar(50) NOT NULL,
  `maintenance_time` time NOT NULL,
  PRIMARY KEY (`maintenance_date`,`vin`),
  KEY `FK_car_maintenance_history_car` (`vin`),
  CONSTRAINT `FK_car_maintenance_history_car` FOREIGN KEY (`vin`) REFERENCES `car` (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table 332.car_maintenance_history: ~2 rows (approximately)
/*!40000 ALTER TABLE `car_maintenance_history` DISABLE KEYS */;
INSERT INTO `car_maintenance_history` (`vin`, `maintenance_date`, `odometer_reading`, `maintenance_type`, `description`, `maintenance_time`) VALUES
	('736hfyst618hye76t', '2017-02-02', 2789, 'Scheduled', 'Oil Change', '12:16:45'),
	('8473hh278', '2017-02-06', 90, 'Scheduled', 'Oil Change', '15:14:49'),
	('123gh45rt7y6534rw', '2017-02-17', 20176, 'Repair', 'Brakes', '09:45:19');
/*!40000 ALTER TABLE `car_maintenance_history` ENABLE KEYS */;

-- Dumping structure for table 332.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `member_num` int(20) NOT NULL,
  `vin` varchar(20) NOT NULL,
  `rating` enum('1','2','3','4') NOT NULL,
  `comment_text` varchar(100) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`member_num`,`vin`,`comment_time`),
  KEY `FK_comment_car` (`vin`),
  KEY `FK_comment_member` (`member_num`),
  CONSTRAINT `FK_comment_car` FOREIGN KEY (`vin`) REFERENCES `car` (`vin`),
  CONSTRAINT `FK_comment_member` FOREIGN KEY (`member_num`) REFERENCES `member` (`member_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table 332.comment: ~12 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`member_num`, `vin`, `rating`, `comment_text`, `comment_time`, `reply`) VALUES
	(123456, '736hfyst618hye76t', '4', 'Drives great!', '2017-04-06 14:57:30', NULL),
	(654323, '435grgwg', '4', 'Great ride!. Would of prefered heated seats.', '2017-04-06 15:00:45', NULL),
	(654324, '32498fb', '1', 'Car wasn\'t clean when I went to pick up.', '2017-04-06 15:01:29', '');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping structure for table 332.member
CREATE TABLE IF NOT EXISTS `member` (
  `member_num` int(20) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone_num` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `license_num` varchar(20) NOT NULL,
  `annual_mem_fee` decimal(15,2) NOT NULL,
  `role` enum('User','Admin') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`member_num`)
) ENGINE=InnoDB AUTO_INCREMENT=654326 DEFAULT CHARSET=latin1;

-- Dumping data for table 332.member: ~5 rows (approximately)
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`member_num`, `f_name`, `l_name`, `phone_num`, `email`, `license_num`, `annual_mem_fee`, `role`, `username`, `password`) VALUES
	(123456, 'Mitch', 'Mulder', '9059874657', NULL, 'L4762-73672-37262', 60.00, 'User', 'MitchMulder', 'hello'),
	(654321, 'Michael', 'Tanel', '9059487635', 'michael.tanel@queensu.ca', 'M6352-72653-74653', 0.00, 'Admin', 'MichaelTanel', 'hello'),
	(654323, 'Michael', 'Tanel', '4166026133', 'm_tanel@live.ca', 'T8493-74657-02985', 60.00, 'User', 'mike', 'mike'),
	(654324, 'hank', 'hank', '9057563546', 'hank@li.ca', 'L8476-85764-09873', 60.00, 'User', 'hankli', 'hankli'),
	(654325, 'Joe', 'Bill', '9068756478', 'm@l.com', 'B8573-85764-09576', 60.00, 'User', 'joe', 'joe');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table 332.parking_location
CREATE TABLE IF NOT EXISTS `parking_location` (
  `parking_address` varchar(50) NOT NULL,
  `num_spaces` int(10) NOT NULL,
  PRIMARY KEY (`parking_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table 332.parking_location: ~2 rows (approximately)
/*!40000 ALTER TABLE `parking_location` DISABLE KEYS */;
INSERT INTO `parking_location` (`parking_address`, `num_spaces`) VALUES
	('20 Division St', 100),
	('67 Albert St', 55);
/*!40000 ALTER TABLE `parking_location` ENABLE KEYS */;

-- Dumping structure for table 332.rental_history
CREATE TABLE IF NOT EXISTS `rental_history` (
  `vin` varchar(20) NOT NULL,
  `member_num` int(20) NOT NULL,
  `pick_up_odometer_reading` int(20) NOT NULL,
  `drop_off_odometer_reading` int(20) DEFAULT NULL,
  `status` enum('Normal','Damaged','Not Running') DEFAULT NULL,
  `rent_date` date NOT NULL,
  `rent_fee` decimal(15,2) DEFAULT NULL,
  `pick_up_time` time NOT NULL,
  `drop_off_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`rent_date`,`vin`,`member_num`),
  KEY `FK_member_rental_history_member` (`member_num`),
  KEY `FK_rental_history_car` (`vin`),
  CONSTRAINT `FK_member_rental_history_member` FOREIGN KEY (`member_num`) REFERENCES `member` (`member_num`),
  CONSTRAINT `FK_rental_history_car` FOREIGN KEY (`vin`) REFERENCES `car` (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table 332.rental_history: ~6 rows (approximately)
/*!40000 ALTER TABLE `rental_history` DISABLE KEYS */;
INSERT INTO `rental_history` (`vin`, `member_num`, `pick_up_odometer_reading`, `drop_off_odometer_reading`, `status`, `rent_date`, `rent_fee`, `pick_up_time`, `drop_off_time`, `end_date`) VALUES
	('736hfyst618hye76t', 123456, 456, 690, 'Normal', '2017-02-02', 3004.95, '06:00:58', '14:49:58', '2017-02-06'),
	('8473hh278', 654323, 6789, 6899, 'Normal', '2017-03-02', 967.84, '00:00:00', '15:15:39', '2017-03-09'),
	('736hfyst618hye76t', 654325, 567, 4577, 'Not Running', '2017-03-04', 14423.76, '15:17:19', '15:17:17', '2017-03-27'),
	('32498fb', 654323, 4353, 4566, 'Damaged', '2017-03-06', 499.95, '00:00:00', '15:02:28', '2017-03-10'),
	('123gh45rt7y6534rw', 123456, 5867, 6758, 'Normal', '2017-04-01', 630.00, '12:00:57', '14:51:57', '2017-04-06');
/*!40000 ALTER TABLE `rental_history` ENABLE KEYS */;

-- Dumping structure for table 332.reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_num` int(11) NOT NULL AUTO_INCREMENT,
  `member_num` int(20) NOT NULL,
  `vin` varchar(20) NOT NULL,
  `reservation_start_date` date NOT NULL,
  `access_code` int(20) NOT NULL,
  `reservation_end_date` date NOT NULL,
  PRIMARY KEY (`reservation_num`),
  KEY `FK_reservation_car` (`vin`),
  KEY `FK_reservation_member` (`member_num`),
  CONSTRAINT `FK_reservation_car` FOREIGN KEY (`vin`) REFERENCES `car` (`vin`),
  CONSTRAINT `FK_reservation_member` FOREIGN KEY (`member_num`) REFERENCES `member` (`member_num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table 332.reservation: ~5 rows (approximately)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` (`reservation_num`, `member_num`, `vin`, `reservation_start_date`, `access_code`, `reservation_end_date`) VALUES
	(1, 654323, '435grgwg', '2017-04-03', 5764, '2017-04-07'),
	(2, 654324, '32498fb', '2017-04-05', 4567, '2017-04-08'),
	(3, 654324, '736hfyst618hye76t', '2017-04-06', 4524, '2017-04-09');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
