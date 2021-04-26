-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2021 at 02:24 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_oop_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Database', '2014-06-01 00:35:07', '2014-05-30 13:04:33'),
(2, 'Software', '2014-06-01 00:35:07', '2014-05-30 13:04:33'),
(3, 'Network', '2014-06-01 00:35:07', '2014-05-30 13:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(250) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `username`, `department_id`, `created`, `modified`, `image`, `address`, `email`, `country`, `phone`, `password`) VALUES
(1, 'Sodabeh', 'Sherzad', 'Sodabeh Sherzad', 1, '2021-04-26 13:07:44', '2021-04-26 13:07:44', 'd88a4bdda4289920509379d4530e5fcfa246f811-profile.jpg', 'Mah-Now/Spin-Adi', 'sodabehsherzad2020@gmail.com', 'Afghanistan', '0799888777', '12345'),
(2, 'Abdul Wahid', 'Sherzad', 'Abdul Wahid Sherzad', 1, '2021-04-26 14:15:29', '2021-04-26 14:15:29', '828538dea1654a2efbff25afd482d6ed886079f5-eggs.jpg', 'Mah-Now/Spin-Adi', 'ab.wahidsherzad2020@gmail.com', 'Afghanistan', '0799888666', '1234Abc@');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
