-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.32 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for neel_ict
CREATE DATABASE IF NOT EXISTS `neel_ict` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `neel_ict`;

-- Dumping structure for table neel_ict.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(45) NOT NULL,
  `adminMobile` varchar(10) NOT NULL,
  `adminPassword` varchar(45) NOT NULL,
  `adminEmail` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.admin: ~0 rows (approximately)
INSERT INTO `admin` (`id`, `adminName`, `adminMobile`, `adminPassword`, `adminEmail`) VALUES
	(1, 'Neel Prasanna', '0769458554', '1234', 'neel@gmail.com');

-- Dumping structure for table neel_ict.attendingstatus
CREATE TABLE IF NOT EXISTS `attendingstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `statusName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.attendingstatus: ~2 rows (approximately)
INSERT INTO `attendingstatus` (`id`, `statusName`) VALUES
	(1, 'Physical'),
	(2, 'Online');

-- Dumping structure for table neel_ict.batch
CREATE TABLE IF NOT EXISTS `batch` (
  `batchId` int NOT NULL AUTO_INCREMENT,
  `batchName` varchar(45) NOT NULL,
  `city_cityId` int NOT NULL,
  `grade` varchar(45) NOT NULL,
  `batchStatus` int DEFAULT '1',
  PRIMARY KEY (`batchId`),
  KEY `fk_batch_city1_idx` (`city_cityId`),
  CONSTRAINT `fk_batch_city1` FOREIGN KEY (`city_cityId`) REFERENCES `city` (`cityId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.batch: ~4 rows (approximately)
INSERT INTO `batch` (`batchId`, `batchName`, `city_cityId`, `grade`, `batchStatus`) VALUES
	(0, 'Colombo 2025 Batch 1', 2, '12', 1),
	(1, 'Colombo 2025 Batch 2', 1, '12', 1),
	(3, 'Colombo 2024 Batch 1', 2, '13', 1),
	(4, 'Colombo 2024 Batch 2', 2, '13', 1);

-- Dumping structure for table neel_ict.batch_has_video
CREATE TABLE IF NOT EXISTS `batch_has_video` (
  `batch_batchId` int NOT NULL,
  `video_publicVideoId` int NOT NULL,
  PRIMARY KEY (`batch_batchId`,`video_publicVideoId`),
  KEY `fk_batch_has_video_video1_idx` (`video_publicVideoId`),
  KEY `fk_batch_has_video_batch1_idx` (`batch_batchId`),
  CONSTRAINT `fk_batch_has_video_batch1` FOREIGN KEY (`batch_batchId`) REFERENCES `batch` (`batchId`),
  CONSTRAINT `fk_batch_has_video_video1` FOREIGN KEY (`video_publicVideoId`) REFERENCES `video` (`publicVideoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.batch_has_video: ~2 rows (approximately)
INSERT INTO `batch_has_video` (`batch_batchId`, `video_publicVideoId`) VALUES
	(1, 18);

-- Dumping structure for table neel_ict.city
CREATE TABLE IF NOT EXISTS `city` (
  `cityId` int NOT NULL AUTO_INCREMENT,
  `cityName` varchar(45) NOT NULL,
  PRIMARY KEY (`cityId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.city: ~2 rows (approximately)
INSERT INTO `city` (`cityId`, `cityName`) VALUES
	(1, 'Anuradhapura'),
	(2, 'Colombo'),
	(3, 'Kandy');

-- Dumping structure for table neel_ict.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoiceId` varchar(45) NOT NULL,
  `payedDate` date NOT NULL,
  `price` double NOT NULL,
  `student_id` int NOT NULL,
  `month_id` int NOT NULL,
  `batch_batchId` int NOT NULL,
  PRIMARY KEY (`id`,`month_id`,`batch_batchId`),
  KEY `fk_invoice_student1_idx` (`student_id`),
  KEY `fk_invoice_month1_idx` (`month_id`),
  KEY `fk_invoice_batch1_idx` (`batch_batchId`),
  CONSTRAINT `fk_invoice_batch1` FOREIGN KEY (`batch_batchId`) REFERENCES `batch` (`batchId`),
  CONSTRAINT `fk_invoice_month1` FOREIGN KEY (`month_id`) REFERENCES `month` (`id`),
  CONSTRAINT `fk_invoice_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.invoice: ~0 rows (approximately)

-- Dumping structure for table neel_ict.mainbanner
CREATE TABLE IF NOT EXISTS `mainbanner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bannerPath` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.mainbanner: ~0 rows (approximately)

-- Dumping structure for table neel_ict.month
CREATE TABLE IF NOT EXISTS `month` (
  `id` int NOT NULL AUTO_INCREMENT,
  `monthName` varchar(45) NOT NULL,
  `year_yearID` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_month_year1_idx` (`year_yearID`),
  CONSTRAINT `fk_month_year1` FOREIGN KEY (`year_yearID`) REFERENCES `year` (`yearID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.month: ~0 rows (approximately)

-- Dumping structure for table neel_ict.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `adress` text NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `batch_batchId` int DEFAULT NULL,
  `attendingStatus_id` int NOT NULL,
  `verifyed` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_student_batch_idx` (`batch_batchId`),
  KEY `fk_student_attendingStatus1_idx` (`attendingStatus_id`),
  CONSTRAINT `fk_student_attendingStatus1` FOREIGN KEY (`attendingStatus_id`) REFERENCES `attendingstatus` (`id`),
  CONSTRAINT `fk_student_batch` FOREIGN KEY (`batch_batchId`) REFERENCES `batch` (`batchId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.student: ~3 rows (approximately)
INSERT INTO `student` (`id`, `firstName`, `lastName`, `mobile`, `adress`, `password`, `email`, `batch_batchId`, `attendingStatus_id`, `verifyed`) VALUES
	(1, 'Thamoddya Rashmitha', 'Dissanayake', '0769458554', 'Eriyagam Road, Malwanegama , thalawa', '7878', 'thamoddyarashmithadissanayake@gmail.com', 3, 2, 1),
	(2, 'Bamidu ', 'jayakodi', '0716459413', 'Anuradhapura Road , Rajanganaya', '1234', 'bamidu@gmail.com', 3, 2, 1),
	(3, 'Senan', 'Lochitha', '0702229380', 'Colombo Road , Thalawakelle', '12345', 'senan@gmail.com', 1, 1, 1);

-- Dumping structure for table neel_ict.studentother
CREATE TABLE IF NOT EXISTS `studentother` (
  `id` int NOT NULL AUTO_INCREMENT,
  `otherMobile` varchar(10) DEFAULT NULL,
  `otherAdress` varchar(45) DEFAULT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`id`,`student_id`),
  KEY `fk_studentOther_student1_idx` (`student_id`),
  CONSTRAINT `fk_studentOther_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.studentother: ~0 rows (approximately)

-- Dumping structure for table neel_ict.subjecttitle
CREATE TABLE IF NOT EXISTS `subjecttitle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titleName` text NOT NULL,
  `grade` int NOT NULL,
  `subjectText` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.subjecttitle: ~4 rows (approximately)
INSERT INTO `subjecttitle` (`id`, `titleName`, `grade`, `subjectText`) VALUES
	(1, 'Operating Systems', 12, 'Operating Systems is one of the main subject for ICT students.'),
	(2, 'Networking', 12, 'Networking is one of the main subject for ICT students.'),
	(3, 'History Of Computer', 12, 'History of Computer is one of the main subject for ICT students.'),
	(4, 'Python', 13, 'Python is one of the main subject for ICT students.It\'s more familier with developers'),
	(5, 'Investigates how instructions and data are represented in computers', 12, 'Describes that instruction and data are represented using two states in computers. Explains the need of different number systems.');

-- Dumping structure for table neel_ict.video
CREATE TABLE IF NOT EXISTS `video` (
  `publicVideoId` int NOT NULL AUTO_INCREMENT,
  `videoName` text NOT NULL,
  `videoLink` text NOT NULL,
  `videoPDFLink` text,
  `private` int NOT NULL DEFAULT '0',
  `subjectTitle_id` int NOT NULL,
  PRIMARY KEY (`publicVideoId`),
  KEY `fk_publicVideo_subjectTitle1_idx` (`subjectTitle_id`),
  CONSTRAINT `fk_publicVideo_subjectTitle1` FOREIGN KEY (`subjectTitle_id`) REFERENCES `subjecttitle` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.video: ~2 rows (approximately)
INSERT INTO `video` (`publicVideoId`, `videoName`, `videoLink`, `videoPDFLink`, `private`, `subjectTitle_id`) VALUES
	(14, 'Video One', 'videos/Video One.mp4', 'null', 0, 1),
	(15, 'Python Class Video 1 ', 'videos/Python Class Video 1 .mp4', 'null', 1, 4),
	(16, 'Networking 01', 'videos/Networking 01.mp4', 'null', 0, 2),
	(17, 'Operating Systems Class 01', 'videos/Operating Systems Class 01.mp4', 'null', 1, 1),
	(18, 'Operating Systems Class 02', 'videos/Operating Systems Class 02.mp4', 'null', 1, 1),
	(19, 'operating Systems Part 2', 'videos/operating Systems Part 2.mp4', 'null', 0, 1),
	(20, 'Python Video 2', 'videos/Python Video 2.mp4', 'null', 0, 4);

-- Dumping structure for table neel_ict.year
CREATE TABLE IF NOT EXISTS `year` (
  `yearID` int NOT NULL AUTO_INCREMENT,
  `year` int DEFAULT NULL,
  PRIMARY KEY (`yearID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table neel_ict.year: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
