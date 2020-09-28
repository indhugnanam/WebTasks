-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2020 at 05:39 PM
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
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploadimage`
--

DROP TABLE IF EXISTS `uploadimage`;
CREATE TABLE IF NOT EXISTS `uploadimage` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadimage`
--

INSERT INTO `uploadimage` (`Id`, `Image`) VALUES
(12, 'istockphoto-636739634-612x61231.jpg'),
(9, 'images1.jpg'),
(14, 'carrots-shutterstock_789443206-800x4501.jpg'),
(10, 'istockphoto-636739634-612x612.jpg'),
(13, 'cabbage1.jpg'),
(15, 'images11.jpg'),
(16, 'istockphoto-636739634-612x6122.jpg'),
(17, 'istockphoto-636739634-612x61211.jpg'),
(18, 'istockphoto-636739634-612x61221.jpg'),
(19, 'istockphoto-636739634-612x61232.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
