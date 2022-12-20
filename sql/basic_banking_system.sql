-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 06:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basic_banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `balance`) VALUES
(1, 'subhram', 'subhram@gmail.com', 27500),
(2, 'suraj', 'suraj@gmail.com', 35500),
(3, 'priya', 'priya@gmail.com', 40000),
(4, 'Rohit', 'Rohit@gmail.com', 30000),
(5, 'surash', 'surash@gmail.com', 49000),
(6, 'puja', 'puja@gmail.com', 85000),
(7, 'nikhil', 'nikhil@gmail.com', 55000),
(8, 'rahul', 'rahul@gmail.com', 90000),
(9, 'satyam', 'satyam@gmail.com', 32000),
(10, 'ankita', 'ankita@gmail.com', 60000),
(11, 'ankita', 'ankita@gmail.com', 60000),
(12, 'ankita', 'ankita@gmail.com', 60000),
(13, 'ankita', 'ankita@gmail.com', 60000),
(14, 'subhram', 'subhram@gmail.com', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE IF NOT EXISTS `transfers` (
  `sno` int(30) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `balance` int(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'subhram', 'rahul', 2000, '2021-06-03 08:24:49'),
(2, 'subhram', 'suraj', 500, '2021-06-03 10:45:58'),
(3, 'subhram', 'priya', 10000, '2021-06-03 15:47:34'),
(4, 'priya', 'surash', 4000, '2021-06-03 15:55:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
