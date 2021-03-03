-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2020 at 05:35 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabbooking`
--

DROP TABLE IF EXISTS `cabbooking`;
CREATE TABLE IF NOT EXISTS `cabbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `riderName` varchar(20) NOT NULL,
  `riderMobileNumber` bigint(20) DEFAULT NULL,
  `lfrom` varchar(100) NOT NULL,
  `lto` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'reject',
  `cabNumber` varchar(20) DEFAULT NULL,
  `driverName` varchar(20) DEFAULT NULL,
  `driverMobileNumber` bigint(20) DEFAULT NULL,
  `fare` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabbooking`
--

INSERT INTO `cabbooking` (`id`, `riderName`, `riderMobileNumber`, `lfrom`, `lto`, `status`, `cabNumber`, `driverName`, `driverMobileNumber`, `fare`) VALUES
(165, 'suwin', 8888888888, 'race course', 'r s puram', 'cancelled', NULL, NULL, NULL, 20),
(164, 'suwin', 8888888888, 'xyz brookfields r s puram', 'pothys town hall', 'accept', 'tn 45 x 1000', 'navin', 6666666666, 60),
(163, 'siva balan sir', 9999999999, 'kuniyamuthur', 'r s puram', 'accept', 'tn 66 z 9117', 'kushaal', 9543905890, 130),
(156, 'ronak', 7373830602, '16,ponnurangam road r s puram cbe-641002', 'pothys town hall', 'accept', 'tn 66 z 9117', 'kushaal', 9543905890, 60),
(157, 'ronak', 7373830602, 'r s puram', 'race course', 'cancelled', NULL, NULL, NULL, 20),
(158, 'ronak', 7373830602, 'r s puram', 'town hall', 'accept', 'tn 66 z 9117', 'kushaal', 9543905890, 60),
(159, 'siva balan sir', 9999999999, '16, ponnurangam road ,r s puram', 'oppanakara street town hall', 'accept', 'tn 66 w 5796', 'prasath', 9442333833, 60),
(160, 'siva balan sir', 9999999999, 'kuniyamuthur', 'town hall', 'cancelled', NULL, NULL, NULL, 20),
(161, 'siva balan sir', 9999999999, 'r s puram', 'town hall', 'accept', 'tn 66 w 5796', 'prasath', 9442333833, 60),
(162, 'ronak', 7373830602, 'r s puram', 'race course', 'accept', 'tn 66 z 9117', 'kushaal', 9543905890, 60);

-- --------------------------------------------------------

--
-- Table structure for table `distance`
--

DROP TABLE IF EXISTS `distance`;
CREATE TABLE IF NOT EXISTS `distance` (
  `lfrom` varchar(20) DEFAULT NULL,
  `lto` varchar(20) DEFAULT NULL,
  `kms` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distance`
--

INSERT INTO `distance` (`lfrom`, `lto`, `kms`, `id`) VALUES
('race course', 'gandhipuram', 4, 1),
('gandhipuram', 'race course', 4, 2),
('race course', 'town hall', 4, 3),
('town hall', 'race course', 4, 4),
('race course', 'r s puram', 4, 5),
('r s puram', 'race course', 4, 6),
('r s puram', 'town hall', 4, 7),
('town hall', 'r s puram', 4, 8),
('town hall', 'gandhipuram', 4, 9),
('gandhipuram', 'town hall', 4, 10),
('gandhipuram', 'kuniyamuthur', 11, 11),
('kuniyamuthur', 'gandhipuram', 11, 12),
('kuniyamuthur', 'race course', 10, 13),
('race course', 'kuniyamuthur', 10, 14),
('r s puram', 'gandhipuram', 3, 15),
('gandhipuram', 'r s puram', 3, 16),
('r s puram', 'kuniyamuthur', 11, 17),
('kuniyamuthur', 'r s puram', 11, 18),
('town hall', 'kuniyamuthur', 9, 19),
('kuniyamuthur', 'town hall', 9, 20),
('r s puram ', 'r s puram', 3, 21),
('gandhipuram', 'gandhipuram', 3, 22),
('town hall', 'town hall', 3, 23),
('race course', 'race course', 3, 24),
('kuniyamuthur', 'kuniyamuthur', 3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `cabNumber` varchar(20) NOT NULL,
  `mobileNumber` bigint(20) NOT NULL,
  `locality` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `verified` varchar(5) DEFAULT 'no',
  `dWallet` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`cabNumber`),
  UNIQUE KEY `mobileNumber` (`mobileNumber`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `cabNumber`, `mobileNumber`, `locality`, `password`, `verified`, `dWallet`) VALUES
(34, 'navin', 'tn 45 x 1000', 6666666666, 'r s puram', 'navin@123', 'yes', 60),
(31, 'prasath', 'tn 66 w 5796', 9442333833, 'r s puram', 'prasath@123', 'yes', 120),
(30, 'kushaal', 'tn 66 z 9117', 9543905890, 'r s puram', 'kushaal@123', 'yes', 310);

-- --------------------------------------------------------

--
-- Table structure for table `rideid`
--

DROP TABLE IF EXISTS `rideid`;
CREATE TABLE IF NOT EXISTS `rideid` (
  `ref` int(11) NOT NULL DEFAULT 1,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rideid`
--

INSERT INTO `rideid` (`ref`, `id`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
CREATE TABLE IF NOT EXISTS `rider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mobileNumber` bigint(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `rWallet` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobileNumber` (`mobileNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`id`, `name`, `mobileNumber`, `password`, `rWallet`) VALUES
(18, 'suwin', 8888888888, 'suwin@123', 120),
(17, 'siva balan sir', 9999999999, 'siva@123', 130),
(16, 'ronak', 7373830602, 'ronak@123', 400);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
