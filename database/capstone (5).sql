-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2018 at 02:03 AM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL unique,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` boolean NOT NULL DEFAULT FALSE,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_Name`, `street`, `city`, `postal_code`, `province`, `country`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 22:54:44', NULL),
(2, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 23:00:56', NULL),
(3, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 23:01:21', NULL),
(4, 'mao', 'yongxin', 'aaa', 'fdsfs', 'dfsfds', 'ddd', 'fsa', '1234567890', 'yongxin@aom.com', '123456', '2018-08-07 23:01:48', NULL),
(5, 'vsd', 'vsd', 'vds', 'vds', 'dvs', 'vds', 'dvs', '12222222', 'cas@s.com', '123333', '2018-08-08 21:46:42', NULL),
(6, 'vsd', 'vsd', 'vds', 'vds', 'dvs', 'vds', 'dvs', '12222222', 'cas@s.com', '123333', '2018-08-08 21:47:18', NULL),
(7, 'vsd', 'vsd', 'vds', 'vds', 'dvs', 'vds', 'dvs', '12222222', 'cas@s.com', '123333', '2018-08-08 21:59:43', NULL),
(8, '', '', '', '', '', '', '', '', '', '', '2018-08-16 19:06:50', NULL),
(9, '', '', '', '', '', '', '', '', '', '', '2018-08-16 19:07:06', NULL),
(10, 'cxzccxzcxzcxzc', 'fvxcvss', 'dsad', 'dsada', 'r3g4r4', 'vsd', 'vdsv', '222-222-2222', 'gggg@fsf.com', 'Momomo123!', '2018-08-16 19:23:53', NULL),
(11, 'mao', 'cszc', 'cxz', 'czx', 'e4e3r4', 'fsdf', 'fsdfds', '222-222-2222', 'dsad@dd.com', '', '2018-08-16 19:24:28', NULL),
(12, 'mao', 'yongxin', 'fdsfds', 'bbb', 'e4e3r4', 'fsafsa', 'fdsfds', '222-222-2222', 'yongxin@aom.com', 'Momomo123!', '2018-08-16 19:27:11', NULL),
(13, '', '', '', '', '', '', '', '', '', '', '2018-08-16 19:27:16', NULL),
(14, 'mao', 'yongxin', 'fdsfds', 'r3e3d3', 'e4e3r4', 'ddd', 'eee', '222-222-2222', 'cxzc@fsf.com', 'Momomo123!', '2018-08-16 19:34:54', NULL),
(15, 'safa', 'sfaf', 'safasffsaf', 'ssafaf', 'e3e3e3', 'fasfas', 'fsafaf', '222-222-2222', 'dsahj@wd.com', 'Momomo123!', '2018-08-17 13:30:48', NULL),
(16, 'efwfe', 'sadf', 'asfasfsa', 'fasfsaf', 'e4e3r4', 'ddd', 'eee', '222-222-2222', 'yongxin@aom.com', 'Momomo123!', '2018-08-17 14:15:12', NULL),
(17, 'efwfe', 'sadf', 'asfasfsa', 'fasfsaf', 'e4e3r4', 'ddd', 'eee', '222-222-2222', 'yongxin@aom.com', 'Momomo123!', '2018-08-17 14:22:01', NULL),
(18, 'fsa', 'fas', 'fesf4444', 'das', 'e4e3r4', 'fsdd', 'dasdas', '222-222-2222', 'yongxin@aom.com', 'Momomo123', '2018-08-17 22:56:47', NULL),
(19, 'fsa', 'fas', 'fesf4444', 'das', 'e4e3r4', 'fsdd', 'dasdas', '222-222-2222', 'yongxin@aom.com', 'Momomo123', '2018-08-17 22:56:54', NULL),
(20, 'Ji', 'Tian', 'sdf', 'dfsf', 'e4e3r4', 'dfasdfa', 'sad', '222-222-2222', 'tian@tian.com', '$2y$10$qMVfybI5OA1i95hJY47./.iZdQEsopzB1leBMxznmC0p0s3RPbvx2', '2018-08-21 11:54:46', NULL),
(21, 'lee', 'lee', 'fasfa', 'fasfa', 'e4e3e3', 'fsdfas', 'fasfasf', '123-456-7890', 'lee@gmail.com', '$2y$10$yocJtp14TY6tTeFnTEmAde3WWMbV6qaw3kUKvVqQow9WX6zV3rTVC', '2018-08-22 18:53:56', NULL),
(22, 'yang', 'yang', 'dffad', 'fasfa', 'r4r5t5', 'dsasfa', 'faasgfds', '222-222-2222', 'yang@gmail.com', '$2y$10$KqGmJjO3n0AIjxrXZh856.5Au60z6q4kXwKMhKknIfgAR/o0HpSoW', '2018-08-22 18:57:55', NULL),
(23, 'yang', 'yang', 'dffad', 'fasfa', 'r4r5t5', 'dsasfa', 'faasgfds', '222-222-2222', 'yang@gmail.com', '$2y$10$tghtGGRFZ4hd1sMQmKPVFenIQlU9Y4LVrIxf33gYH.Jxq5YBWrsCC', '2018-08-22 18:58:20', NULL),
(24, 'shi', 'shi', 'gfdhd', 'hfdhdf', 'r5r5t5', 'hfhbfd', 'gsfdd', '222-222-2222', 'shi@gmail.com', '$2y$10$XPMmlcFxQRp2u1n7JLjqC.ZtMUSie9t0HIN6Npcm4UHqRfmIv5Hl.', '2018-08-22 19:01:15', NULL),
(25, 'shi', 'shi', 'gfdhd', 'hfdhdf', 'r5r5t5', 'hfhbfd', 'gsfdd', '222-222-2222', 'shi@gmail.com', '$2y$10$tLhenrYSWaGoGhFbqZ6u4.hms9fVGZslIz3vfqRq8DF2ax2hhjmDy', '2018-08-22 19:03:55', NULL),
(26, 'shi', 'shi', 'gfdhd', 'hfdhdf', 'r5r5t5', 'hfhbfd', 'gsfdd', '222-222-2222', 'shi@gmail.com', '$2y$10$NBoOAGTvrS5IWkQqsEQkg.FUPxzzmI1Z8MMNXKqXTVHwDClInpxOW', '2018-08-22 19:05:13', NULL),
(27, 'shi', 'shi', 'gfdhd', 'hfdhdf', 'r5r5t5', 'hfhbfd', 'gsfdd', '222-222-2222', 'shi@gmail.com', '$2y$10$6J6CvuV4nqnvYrCdsSKDSOAF8YYHtNuqr/oyAYazHMoH5Xx4BDcVO', '2018-08-22 19:05:30', NULL),
(28, 'jing', 'jing', 'fasfa', 'fasf', 'r5r5t5', 'fssdfs', 'gdfsf', '123-456-7890', 'jing@gmail.com', '$2y$10$MGYxa1Oij5OJZhSYgb/4JeL5qPE.uBQ/qbygYnHUVSdsK03tuMuDC', '2018-08-22 19:06:25', NULL);

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
  `breakfast_included` boolean DEFAULT NULL,
  `smoke_permit` boolean DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `on_maintain` boolean DEFAULT NULL,
  `log` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_brand`, `hotel_name`, `room`, `bed`, `adults`, `children`, `phone`, `address`, `city`, `country`, `postal`, `rank`, `price`, `description`, `breakfast_included`, `smoke_permit`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Holiday Inn', 'Winnipeg downtown', 534, 2, 2, 1, '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'Canada', 'R3B 3O4', 3, 89.9, 'This room is very comfortable, and a big window can let you enjoy the sunlight everyday.', 1, 0, 'h1', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(2, 'Holiday Inn', 'Winnipeg downtown', 203, 1, 1, 0, '204-333-3423', 'Portage Ave. 102', 'Toronto', 'Canada', 'R3B 3O4', 3, 69.5, 'Neat and clean room make you relax, also big bed for a good sleep.', 1, 1, 'h2', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(3, 'Holiday Inn', 'Winnipeg downtown', 333, 3, 2, 1, '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'Canada', 'R3B 3O4', 3, 99.8, 'The hotel next to airport makes your travelling so convient.', 1, 0, 'h3', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(4, 'Holiday Inn', 'Winnipeg downtown', 603, 1, 2, 0, '204-333-3423', 'Portage Ave. 102', 'ottowa', 'Canada', 'R3B 3O4', 3, 110.5, 'Best experience can be happened here. Large and clean bedroom for you.', 0, 1, 'h4', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(5, 'Holiday Inn', 'Winnipeg downtown', 815, 1, 2, 0, '204-333-3423', 'Portage Ave. 102', 'Winnipeg', 'Canada', 'R3B 3O4', 1, 180, 'The beautiful and comfortable accommodation with lower price can be found only here.', 1, 1, 'h5', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(6, 'Crowne Plaza', 'Winnipeg airport', 1002, 2, 2, 0, '204-434-4567', 'Wellington Ave. 100', 'Winnipeg', 'Canada', 'R3H 1C2', 5, 189.9, 'Luxury feeling, but affordable hotel. Book online 15 days in advance can get 95% discount.', 1, 1, 'h6', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(7, 'Crowne Plaza', 'Winnipeg airport', 1520, 1, 2, 0, '204-434-4567', 'Wellington Ave. 100', 'Calgory', 'Canada', 'R3H 1C2', 5, 210.5, 'Quite and comfortable room with breakfast provided. Book without hesitation is a wise chioce.', 1, 0, 'h7', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(8, 'Crowne Plaza', 'Winnipeg airport', 1208, 3, 2, 1, '204-434-4567', 'Wellington Ave. 100', 'Winnipeg', 'Canada', 'R3H 1C2', 5, 169.9, 'Nice and clear room with gym and swimming pool inside.', 0, 0, 'h8', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(9, 'Crowne Plaza', 'Winnipeg airport', 812, 1, 2, 0, '204-434-4567', 'Wellington Ave. 100', 'London', 'Canada', 'R3H 1C2', 5, 99.9, 'Large size beds, and meal available for all day.', 1, 1, 'h9', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(10, 'Crowne Plaza', 'Winnipeg airport', 910, 1, 2, 1, '204-434-4567', 'Wellington Ave. 100', 'Vancouver', 'Canada', 'R3H 1C2', 5, 89.9, 'This room is not just a wonderful place for sleeping, but also provides free breakfast if you book for 7days or more.', 0, 0, 'h10', '2015-03-18 00:00:00', '2018-05-16 00:00:00'),
(11, 'Hilton Hotel', 'Polo Park Center', 333, 1, 2, 0, '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', 3, 89.9, 'Enjoy your free time, happy living.', 1, 0, 'h11', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(12, 'Hilton Hotel', 'Polo Park Center', 222, 2, 2, 0, '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', 4, 100, 'Unbelievable comfortable accomodation with gym and swimming pool.', 0, 0, 'h12', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(13, 'Hilton Hotel', 'Polo Park Center', 444, 2, 2, 1, '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', 3, 149.9, 'Best place for you to have a good sleep and nice view from large window.', 1, 1, 'h13', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(14, 'Hilton Hotel', 'Polo Park Center', 555, 1, 2, 0, '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', 3, 110, 'With best service and gorgeious decoration, our hotel can give you wonderful experience.', 1, 1, 'h14', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(15, 'Hilton Hotel', 'Polo Park Center', 666, 3, 2, 1, '204-543-2222', 'Portage Ave. 66Q', 'Winnipeg', 'Canada', 'R3G 0W4', 3, 219.8, 'Spacial room, bright design and large bed, this make your trip more easily.', 1, 1, 'h15', '2016-05-10 00:00:00', '2017-09-15 00:00:00'),
(16, 'Victoria Inn', 'Convention Centre', 601, 1, 2, 0, '204-555-3838', 'Berry St. 200', 'Winnipeg', 'Canada', 'R3G 3H4', 4, 99, 'Our hotel will never forget what you really need: comforable, clear, and cheap.', 1, 0, 'h16', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(17, 'Victoria Inn', 'Convention Centre', 602, 2, 2, 1, '204-555-3838', 'Berry St. 200', 'Winnipeg', 'Canada', 'R3G 3H4', 4, 120.8, 'Keep simple, keep beautiful, and let you feel like at your own home.', 1, 0, 'h17', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(18, 'Victoria Inn', 'Convention Centre', 603, 1, 2, 0, '204-555-3838', 'Berry St. 200', 'Winnipeg', 'Canada', 'R3G 3H4', 4, 149.9, 'Near the transportation and shopping mall. The lower price hotel which you should never foeget', 1, 1, 'h18', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(19, 'Victoria Inn', 'Convention Centre', 604, 2, 2, 0, '204-555-3838', 'Berry St. 200', 'Winnipeg', 'Canada', 'R3G 3H4', 4, 120.5, 'Hotel is not just a spot you passed away, it can be your best memory.', 1, 0, 'h19', '2010-05-10 00:00:00', '2017-10-15 00:00:00'),
(20, 'Victoria Inn', 'Convention Centre', 605, 2, 2, 1, '204-555-3838', 'Berry St. 200', 'Winnipeg', 'Canada', 'R3G 3H4', 4, 179.9, 'High quality service, but affordable price. This can only happen in our hotel.', 1, 0, 'h20', '2010-05-10 00:00:00', '2017-10-15 00:00:00');

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
