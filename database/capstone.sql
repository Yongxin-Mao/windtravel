-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2018 at 01:11 AM
-- Server version: 10.2.12-MariaDB
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
-- Table structure for table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`admin_id`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$N0LzoiTczp7FkGL.vOokp.2Pnr.izBG279898FWfZkxzxRQZbY.ze', '2018-09-13 12:12:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_Name`, `street`, `city`, `postal_code`, `province`, `country`, `phone`, `email`, `password`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'mao', 'mao', 'webb place', 'winnipeg', 'R3B 3G5', 'manitoba', 'Canada', '222-222-2222', 'mao@gmail.com', '$2y$10$07DUxiSa0PBPsLZbiVLLfuBZY3xz9P.DeRpzbzziBF2Hmc48XVwGe', 0, '2018-09-07 13:54:10', NULL),
(2, 'mao', 'mao', 'webb place', 'winnipeg', 'R3B 3G5', 'manitoba', 'Canada', '222-222-2222', 'mao@gmail.com', '$2y$10$vwleuTEkxGC2lCiO7AepNePStth30rGfaoeOKtZlfYsG0Y/0ZZILS', 0, '2018-09-07 13:55:15', NULL),
(3, 'yong', 'xin', 'webb place', 'winnipeg', 'R3B 3G5', 'manitoba', 'Canada', '222-222-2222', 'yong@gmail.com', '$2y$10$qmzieutHA3v8LcdG1.NOC.NIemqgrnewDi5yPkUWwP4/.SF/kCYXe', 0, '2018-09-07 14:00:59', NULL),
(4, 'yong', 'xin', 'webb place', 'winnipeg', 'R3B 3G5', 'manitoba', 'Canada', '222-222-2222', 'yong@gmail.com', '$2y$10$nkZIhvAL/c3J1jTyDCRQKul8Lb4gaSFml4JR3cOGdrWvC.wnBjGKW', 0, '2018-09-07 14:02:23', NULL),
(5, 'tian', 'tian', 'dadas', 'winnipeg', 'D3D 3D3', 'fasfsa', 'china', '222-122-3333', 'tian@gmail.com', '$2y$10$xWOS9EXGEdPleOtCngZfAu48Bvuubci1Gi/GtC8GNasssaopdtb7q', 0, '2018-09-10 15:06:41', NULL),
(6, 'yang', 'yang', 'fsda', 'fadsf', 'D3D 3D3', 'faf', 'fasfd', '123-333-3333', 'yang@gmail.com', '$2y$10$GVzeGUKlHTtZXaJHOgJ2J.TgIGsuKxTS2zxnPIgdIDIuGmrmwEjxO', 0, '2018-09-10 15:13:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_brand` varchar(255) DEFAULT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `room` char(10) DEFAULT NULL,
  `bed` char(10) DEFAULT NULL,
  `adults` char(10) DEFAULT NULL,
  `children` char(10) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `street` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `rank` char(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `breakfast_included` enum('yes','no') DEFAULT NULL,
  `smoke_permit` enum('yes','no') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `on_maintain` enum('yes','no') DEFAULT NULL,
  `log` longtext DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_brand`, `hotel_name`, `room`, `bed`, `adults`, `children`, `phone`, `street`, `city`, `country`, `postal`, `rank`, `price`, `description`, `breakfast_included`, `smoke_permit`, `image`, `on_maintain`, `log`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Holiday_Inn', 'Winnipeg downtown', '534', '2', '2', '1', '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'USA', 'R3B 3O4', '6', 111111, 'This room is very comfortable, and a big window can let you enjoy the sunlight everyday.', 'yes', 'no', 'h1', 'no', '', 0, '2010-05-10 00:00:00', '2018-09-14 14:30:43'),
(2, 'Holiday_Inn', 'Winnipeg downtown', '24324', '1', '1', '1', '204-333-3423', 'Portage Ave. 102', 'Toronto', 'Canada', 'R3B 3O4', '3', 69.5, 'Neat and clean room make you relax, also big bed for a good sleep.', 'yes', 'no', 'h2', 'no', '1', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(3, 'Holiday_Inn', 'Winnipeg downtown', '333', '3', '2', '1', '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'Canada', 'R3B 3O4', '1', 99.8, 'The hotel next to airport makes your travelling so convient.', 'yes', 'no', 'h3', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(4, 'Holiday_Inn', 'Winnipeg downtown', '603', '1', '2', '0', '204-333-3423', 'Portage Ave. 102', 'Edmonton', 'Canada', 'R3B 3O4', '3', 110.5, 'Best experience can be happened here. Large and clean bedroom for you.', 'no', 'yes', 'h4', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(5, 'Holiday_Inn', 'Winnipeg downtown', '815', '1', '2', '0', '204-333-3423', 'Portage Ave. 102', 'Quebec', 'Canada', 'R3B 3O4', '1', 180, 'The beautiful and comfortable accommodation with lower price can be found only here.', 'yes', 'yes', 'h5', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(6, 'Crowne_Plaza', 'Winnipeg airport', '1002', '2', '2', '0', '204-434-4567', 'Wellington Ave. 100', 'Winnipeg', 'Canada', 'R3H 1C2', '5', 189.9, 'Luxury feeling, but affordable hotel. Book online 15 days in advance can get 95% discount.', 'yes', 'yes', 'h6', 'no', '', 0, '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(7, 'Crowne_Plaza', 'Winnipeg airport', '1520', '1', '2', '0', '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', '4', 210.5, 'Quite and comfortable room with breakfast provided. Book without hesitation is a wise chioce.', 'yes', 'no', 'h7', 'no', '', 0, '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(8, 'Crowne_Plaza', 'Winnipeg airport', '1208', '3', '2', '1', '204-434-4567', 'Wellington Ave. 100', 'Winnipeg', 'Canada', 'R3H 1C2', '1', 169.9, 'Nice and clear room with gym and swimming pool inside.', 'yes', 'no', 'h8', 'no', '', 0, '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(9, 'Crowne_Plaza', 'Winnipeg airport', '812', '1', '2', '0', '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', '2', 99.9, 'Large size beds, and meal available for all day.', 'yes', 'yes', 'h9', 'no', '', 0, '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(10, 'Crowne_Plaza', 'Winnipeg airport', '910', '1', '2', '1', '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', '5', 89.9, 'This room is not just a wonderful place for sleeping, but also provides free breakfast if you book for 7days or more.', 'no', 'no', 'h10', 'no', '', 0, '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(11, 'Hilton_Hotel', 'Polo Park Center', '333', '1', '2', '0', '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', '3', 89.9, 'Enjoy your free time, happy living.', 'yes', 'no', 'h11', 'no', '', 0, '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(12, 'Hilton_Hotel', 'Polo Park Center', '222', '2', '2', '0', '204-543-2222', 'Portage Ave. 66Q', 'Toronto', 'Canada', 'R3G 0W4', '4', 100, 'Unbelievable comfortable accomodation with gym and swimming pool.', 'no', 'no', 'h12', 'no', '', 0, '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(13, 'Hilton_Hotel', 'Polo Park Center', '444', '2', '2', '1', '204-543-2222', 'Portage Ave. 66Q', 'Edmonton', 'Canada', 'R3G 0W4', '2', 149.9, 'Best place for you to have a good sleep and nice view from large window.', 'yes', 'yes', 'h13', 'no', '', 0, '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(14, 'Hilton_Hotel', 'Polo Park Center', '555', '1', '2', '0', '204-543-2222', 'Portage Ave. 66Q', 'Edmonton', 'Canada', 'R3G 0W4', '1', 110, 'With best service and gorgeious decoration, our hotel can give you wonderful experience.', 'yes', 'yes', 'h14', 'no', '', 0, '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(15, 'Hilton_Hotel', 'Polo Park Center', '666', '3', '2', '1', '204-543-2222', 'Portage Ave. 66Q', 'Toronto', 'Canada', 'R3G 0W4', '2', 219.8, 'Spacial room, bright design and large bed, this make your trip more easily.', 'yes', 'yes', 'h15', 'no', '', 0, '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(16, 'Victoria_Inn', 'Convention Centre', '601', '1', '2', '0', '204-555-3838', 'Berry St. 200', 'Quebec', 'Canada', 'R3G 3H4', '1', 99, 'Our hotel will never forget what you really need: comforable, clear, and cheap.', 'yes', 'no', 'h16', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(17, 'Victoria_Inn', 'Convention Centre', '602', '2', '2', '1', '204-555-3838', 'Berry St. 200', 'Vancouver', 'Canada', 'R3G 3H4', '4', 120.8, 'Keep simple, keep beautiful, and let you feel like at your own home.', 'yes', 'no', 'h17', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(18, 'Victoria_Inn', 'Convention Centre', '603', '1', '2', '0', '204-555-3838', 'Berry St. 200', 'Toronto', 'Canada', 'R3G 3H4', '5', 149.9, 'Near the transportation and shopping mall. The lower price hotel which you should never foeget', 'yes', 'yes', 'h18', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(19, 'Victoria_Inn', 'Convention Centre', '604', '2', '2', '0', '204-555-3838', 'Berry St. 200', 'Quebec', 'Canada', 'R3G 3H4', '2', 120.5, 'Hotel is not just a spot you passed away, it can be your best memory.', 'yes', 'no', 'h19', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(20, 'Victoria_Inn', 'Convention Centre', '605', '2', '2', '1', '204-555-3838', 'Berry St. 200', 'Edmonton', 'Canada', 'R3G 3H4', '5', 179.9, 'High quality service, but affordable price. This can only happen in our hotel.', 'yes', 'no', 'h20', 'no', '', 0, '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(21, 'fake2', 'fake', '43242', '1', '2', '2', '222-233-3333', 'webb place', 'winnipeg', 'Canada', 'R3B 3G5', '2', 3421, 'vdsvdsvds', 'yes', 'no', 'wq', 'yes', 'dsafasf', 1, '2018-09-12 23:20:01', NULL),
(22, 'fake', 'fake', '43242', '2', '2', '2', '111-222-2222', 'DFSAFSAF', 'SFAFAF', 'FASFAF', 'E3E 3E3', '3', 321312, 'VDSVDSVSVDS', 'yes', 'no', 'SDA', 'yes', 'FSA', 1, '2018-09-12 23:24:35', NULL),
(23, 'fake', 'fake', '33', '2', '2', '3', '222-222-2222', 'webb place', 'winnipeg', 'Canada', 'R3B 3G5', '3', 33, 'fsafafasf', 'no', 'yes', '43fds', 'no', 'fds', 1, '2018-09-13 13:41:24', NULL),
(24, 'fake', 'fake', '33', '2', '2', '3', '222-222-2222', 'webb place', 'winnipeg', 'Canada', 'R3B 3G5', '3', 33, 'fsafafasf', 'no', 'yes', '43fds', 'no', 'fds', 1, '2018-09-13 13:42:39', NULL),
(25, 'fake', 'fake', '33', '2', '2', '3', '222-222-2222', 'webb place', 'winnipeg', 'USA', 'R3B 3G5', '3', 33, 'fsafafasf', 'no', 'yes', '43fds', 'no', 'fds', 1, '2018-09-13 13:42:47', NULL),
(26, 'fake', 'fake', '43242', '1', '1', '1', '222-222-2222', 'webb place', 'winnipeg', 'Canada', 'R3B 3G5', '2', 222, '2e', 'no', 'yes', 'rwrw', 'no', 'rwqrwqr', 1, '2018-09-14 14:31:20', NULL),
(27, 'fake1', 'fake1', '43242', '1', '1', '1', '222-222-2222', 'webb place', 'winnipeg', 'Canada', 'R3B 3G5', '6', 55, 'bfvdbbvf', 'no', 'yes', 'ds', 'no', 'vzd', 1, '2018-09-14 16:19:27', NULL),
(28, 'hahhah', 'fsafa', '43242', '1', '1', '1', '222-222-2222', 'webb place', 'winnipeg', 'Canada', 'R3B 3G5', '2', 2, '2rwr', 'no', 'yes', '2rwr', 'no', '223', 1, '2018-09-14 18:02:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `security_code` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `GST` decimal(15,2) DEFAULT NULL,
  `PST` decimal(15,2) DEFAULT NULL,
  `total_price` decimal(15,2) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `security_code`, `price`, `GST`, `PST`, `total_price`, `hotel_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(66, 123, '120.50', '0.05', '0.08', '136.17', 19, 1, '2018-09-13 14:33:35', NULL),
(67, 123, NULL, '0.05', '0.08', '136.17', 19, 1, '2018-09-13 14:33:51', NULL),
(68, 124, NULL, '0.05', '0.08', '136.17', 19, 1, '2018-09-13 14:35:24', NULL),
(69, 3333, '99.80', '0.05', '0.08', '112.77', 3, 1, '2018-09-13 14:39:32', NULL),
(70, 2222, '69.50', '0.05', '0.08', '78.54', 2, 1, '2018-09-13 16:02:34', NULL),
(71, 333, '110.50', '0.05', '0.08', '124.87', 4, 1, '2018-09-14 13:39:53', NULL),
(72, 333, '111.00', '0.05', '0.08', '125.43', 1, 1, '2018-09-14 13:45:44', NULL),
(73, 333, '99.00', '0.05', '0.08', '111.87', 16, 1, '2018-09-14 14:47:10', NULL),
(74, 333, '89.90', '0.05', '0.08', '101.59', 10, 1, '2018-09-14 18:49:18', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
