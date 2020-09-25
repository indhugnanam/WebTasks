-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2020 at 03:19 AM
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
-- Database: `Master`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
CREATE TABLE IF NOT EXISTS `Category` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(256) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_Id`, `Category_Name`, `Status`) VALUES
(1, 'Fruits', 'A'),
(2, 'Vegtables', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `User_Id` varchar(15) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Role` char(1) NOT NULL,
  PRIMARY KEY (`User_Id`),
  UNIQUE KEY `Mobile` (`Mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_Id`, `First_Name`, `Last_Name`, `Email`, `Mobile`, `Status`, `Password`, `Role`) VALUES
('MIU000001', 'QWE', '', '', 9876543210, 'A', '123456', 'A');

--
-- Constraints for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
