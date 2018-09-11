-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2018 at 07:09 PM
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
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_brand` varchar(255) DEFAULT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `bed` int(11) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `street` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `breakfast_included` tinyint(1) DEFAULT NULL,
  `smoke_permit` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `on_maintain` tinyint(1) DEFAULT NULL,
  `log` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_brand`, `hotel_name`, `room`, `bed`, `adults`, `children`, `phone`, `street`, `city`, `country`, `postal`, `rank`, `price`, `description`, `breakfast_included`, `smoke_permit`, `image`, `on_maintain`, `log`, `created_at`, `updated_at`) VALUES
(1, 'Holiday_Inn', 'Winnipeg downtown', 534, 2, 2, 1, '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'Canada', 'R3B 3O4', 2, 89.9, 'This room is very comfortable, and a big window can let you enjoy the sunlight everyday.', 1, 0, 'h1', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(2, 'Holiday_Inn', 'Winnipeg downtown', 203, 1, 1, 0, '204-333-3423', 'Portage Ave. 102', 'Toronto', 'Canada', 'R3B 3O4', 3, 69.5, 'Neat and clean room make you relax, also big bed for a good sleep.', 1, 1, 'h2', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(3, 'Holiday_Inn', 'Winnipeg downtown', 333, 3, 2, 1, '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'Canada', 'R3B 3O4', 1, 99.8, 'The hotel next to airport makes your travelling so convient.', 1, 0, 'h3', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(4, 'Holiday_Inn', 'Winnipeg downtown', 603, 1, 2, 0, '204-333-3423', 'Portage Ave. 102', 'Edmonton', 'Canada', 'R3B 3O4', 3, 110.5, 'Best experience can be happened here. Large and clean bedroom for you.', 0, 1, 'h4', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(5, 'Holiday_Inn', 'Winnipeg downtown', 815, 1, 2, 0, '204-333-3423', 'Portage Ave. 102', 'Quebec', 'Canada', 'R3B 3O4', 1, 180, 'The beautiful and comfortable accommodation with lower price can be found only here.', 1, 1, 'h5', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(6, 'Crowne_Plaza', 'Winnipeg airport', 1002, 2, 2, 0, '204-434-4567', 'Wellington Ave. 100', 'Winnipeg', 'Canada', 'R3H 1C2', 5, 189.9, 'Luxury feeling, but affordable hotel. Book online 15 days in advance can get 95% discount.', 1, 1, 'h6', 0, '', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(7, 'Crowne_Plaza', 'Winnipeg airport', 1520, 1, 2, 0, '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', 4, 210.5, 'Quite and comfortable room with breakfast provided. Book without hesitation is a wise chioce.', 1, 0, 'h7', 0, '', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(8, 'Crowne_Plaza', 'Winnipeg airport', 1208, 3, 2, 1, '204-434-4567', 'Wellington Ave. 100', 'Winnipeg', 'Canada', 'R3H 1C2', 1, 169.9, 'Nice and clear room with gym and swimming pool inside.', 0, 0, 'h8', 0, '', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(9, 'Crowne_Plaza', 'Winnipeg airport', 812, 1, 2, 0, '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', 2, 99.9, 'Large size beds, and meal available for all day.', 1, 1, 'h9', 0, '', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(10, 'Crowne_Plaza', 'Winnipeg airport', 910, 1, 2, 1, '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', 5, 89.9, 'This room is not just a wonderful place for sleeping, but also provides free breakfast if you book for 7days or more.', 0, 0, 'h10', 0, '', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(11, 'Hilton_Hotel', 'Polo Park Center', 333, 1, 2, 0, '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', 3, 89.9, 'Enjoy your free time, happy living.', 1, 0, 'h11', 0, '', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(12, 'Hilton_Hotel', 'Polo Park Center', 222, 2, 2, 0, '204-543-2222', 'Portage Ave. 66Q', 'Toronto', 'Canada', 'R3G 0W4', 4, 100, 'Unbelievable comfortable accomodation with gym and swimming pool.', 0, 0, 'h12', 0, '', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(13, 'Hilton_Hotel', 'Polo Park Center', 444, 2, 2, 1, '204-543-2222', 'Portage Ave. 66Q', 'Edmonton', 'Canada', 'R3G 0W4', 2, 149.9, 'Best place for you to have a good sleep and nice view from large window.', 1, 1, 'h13', 0, '', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(14, 'Hilton_Hotel', 'Polo Park Center', 555, 1, 2, 0, '204-543-2222', 'Portage Ave. 66Q', 'Edmonton', 'Canada', 'R3G 0W4', 1, 110, 'With best service and gorgeious decoration, our hotel can give you wonderful experience.', 1, 1, 'h14', 0, '', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(15, 'Hilton_Hotel', 'Polo Park Center', 666, 3, 2, 1, '204-543-2222', 'Portage Ave. 66Q', 'Toronto', 'Canada', 'R3G 0W4', 2, 219.8, 'Spacial room, bright design and large bed, this make your trip more easily.', 1, 1, 'h15', 0, '', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(16, 'Victoria_Inn', 'Convention Centre', 601, 1, 2, 0, '204-555-3838', 'Berry St. 200', 'Quebec', 'Canada', 'R3G 3H4', 1, 99, 'Our hotel will never forget what you really need: comforable, clear, and cheap.', 1, 0, 'h16', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(17, 'Victoria_Inn', 'Convention Centre', 602, 2, 2, 1, '204-555-3838', 'Berry St. 200', 'Vancouver', 'Canada', 'R3G 3H4', 4, 120.8, 'Keep simple, keep beautiful, and let you feel like at your own home.', 1, 0, 'h17', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(18, 'Victoria_Inn', 'Convention Centre', 603, 1, 2, 0, '204-555-3838', 'Berry St. 200', 'Toronto', 'Canada', 'R3G 3H4', 5, 149.9, 'Near the transportation and shopping mall. The lower price hotel which you should never foeget', 1, 1, 'h18', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(19, 'Victoria_Inn', 'Convention Centre', 604, 2, 2, 0, '204-555-3838', 'Berry St. 200', 'Quebec', 'Canada', 'R3G 3H4', 2, 120.5, 'Hotel is not just a spot you passed away, it can be your best memory.', 1, 0, 'h19', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(20, 'Victoria_Inn', 'Convention Centre', 605, 2, 2, 1, '204-555-3838', 'Berry St. 200', 'Edmonton', 'Canada', 'R3G 3H4', 5, 179.9, 'High quality service, but affordable price. This can only happen in our hotel.', 1, 0, 'h20', 0, '', '2010-05-10 00:00:00', '2017-10-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `num_days` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `gst` decimal(10,0) DEFAULT NULL,
  `pst` decimal(10,0) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
