-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2020 at 05:52 PM
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
-- Database: `School`
--

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

DROP TABLE IF EXISTS `Teacher`;
CREATE TABLE IF NOT EXISTS `Teacher` (
  `Teacher_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Teacher_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`Teacher_Id`, `Name`) VALUES
(1, 'Raja'),
(2, 'Gnanam'),
(3, 'Nizhar'),
(4, 'Raji');

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

DROP TABLE IF EXISTS `Timetable`;
CREATE TABLE IF NOT EXISTS `Timetable` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Class_Name` varchar(20) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Period` varchar(20) NOT NULL,
  `Teacher_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Timetable`
--

INSERT INTO `Timetable` (`Id`, `Class_Name`, `Subject`, `Day`, `Period`, `Teacher_Id`) VALUES
(1, '1A', 'English', 'Wednesday', 'I', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD CONSTRAINT `Timetable_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `Teacher` (`Teacher_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
