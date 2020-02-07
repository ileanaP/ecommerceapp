-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2019 at 10:02 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(50) NOT NULL DEFAULT '0',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `price` float UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `name`, `description`, `quantity`, `price`) VALUES
(1, 'product1', 'its a product', 1, 10),
(2, 'product2', 'its a product', 13, 11),
(3, 'product3', 'its a product', 32, 12),
(4, 'product4', 'its a product', 13, 13),
(5, 'product5', 'its a product', 15, 14),
(6, 'product6', 'its a product', 19, 15),
(7, 'product7', 'its a product', 9, 16),
(8, 'product8', 'its a product', 4, 17),
(9, 'product9', 'its a product', 2, 19),
(10, 'product10', 'its a product', 10, 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
