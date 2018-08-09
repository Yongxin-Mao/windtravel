-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2018 at 03:16 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_Name`, `street`, `city`, `postal_code`, `province`, `country`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 22:54:44', NULL),
(2, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 23:00:56', NULL),
(3, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 23:01:21', NULL),
(4, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 23:01:48', NULL),
(5, 'vsd', 'vsd', 'vds', 'vds', 'dvs', 'vds', 'dvs', '12222222', 'cas@s.com', '123333', '2018-08-08 21:46:42', NULL),
(6, 'vsd', 'vsd', 'vds', 'vds', 'dvs', 'vds', 'dvs', '12222222', 'cas@s.com', '123333', '2018-08-08 21:47:18', NULL),
(7, 'vsd', 'vsd', 'vds', 'vds', 'dvs', 'vds', 'dvs', '12222222', 'cas@s.com', '123333', '2018-08-08 21:59:43', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
