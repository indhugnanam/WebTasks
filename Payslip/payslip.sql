-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2020 at 09:04 AM
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
-- Database: `Payslip`
--

-- --------------------------------------------------------

--
-- Table structure for table `Payslip`
--

DROP TABLE IF EXISTS `Payslip`;
CREATE TABLE IF NOT EXISTS `payslip` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Basic` float(10,2) NOT NULL,
  `HRA` float(10,2) NOT NULL,
  `Special_Allowance` float(10,2) NOT NULL,
  `PF` float(10,2) NOT NULL,
  `Total` float(10,2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payslip`
--

INSERT INTO `Payslip` (`Id`, `Name`, `Mobile`, `Email`, `Basic`, `HRA`, `Special_Allowance`, `PF`, `Total`) VALUES
(1, 'abc', 3123123212, 'abc@gmail.com', 1000.00, 230.00, 1220.00, 1000.00, 1450.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
