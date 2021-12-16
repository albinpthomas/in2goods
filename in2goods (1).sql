-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2021 at 10:01 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `in2goods`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

DROP TABLE IF EXISTS `car_category`;
CREATE TABLE IF NOT EXISTS `car_category` (
  `car_id` int(100) NOT NULL AUTO_INCREMENT,
  `car_details` varchar(100) NOT NULL,
  `car_type` varchar(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`car_id`, `car_details`, `car_type`, `company_id`) VALUES
(9, 'Kwid', 'Hatchback', 2),
(15, 'wagoner', 'sedan', 1),
(30, 'innova', 'suv', 2),
(31, 'etios_liva', 'cooper', 2),
(33, 'city', 'crossover', 4),
(34, 'wagoner', 'Hackback', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_company`
--

DROP TABLE IF EXISTS `car_company`;
CREATE TABLE IF NOT EXISTS `car_company` (
  `company_id` int(100) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_company`
--

INSERT INTO `car_company` (`company_id`, `company_name`) VALUES
(1, 'Maruti Suzuki '),
(2, 'Toyota'),
(3, 'Tata  '),
(4, 'Honda '),
(5, 'Hyundai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

DROP TABLE IF EXISTS `tbl_items`;
CREATE TABLE IF NOT EXISTS `tbl_items` (
  `items_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_title` varchar(100) NOT NULL,
  `items_name` varchar(110) NOT NULL,
  `company_id` int(11) NOT NULL,
  `ad_type` int(2) NOT NULL,
  `negotible` int(2) NOT NULL DEFAULT '1',
  `contact_name` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(20) NOT NULL,
  `contact_address` varchar(50) NOT NULL,
  `items_img` varchar(500) NOT NULL,
  `items_category` varchar(110) NOT NULL,
  `items_price` int(11) NOT NULL,
  `items_desc` varchar(500) NOT NULL,
  `items_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`items_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`items_id`, `ad_title`, `items_name`, `company_id`, `ad_type`, `negotible`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`, `items_desc`, `items_status`) VALUES
(8, '2011 innova for sale', 'innova', 0, 0, 1, 'Albin P Thomas', '9846173680', 'albin@gmail.com', 'padinjareparambil.', 'assets/images/1638999394.png', 'suv', 100000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(9, 'Hector for sale', 'Hector', 0, 0, 1, 'Albin P Thomas', '9846173680', 'abcd@gmail.com', 'padinjareparambil.', 'assets/images/1638999556.jpg', 'suv', 500000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(11, 'i20', 'i20', 0, 0, 1, 'Albin P Thomas', '9846173680', 'abcd@gmail.com', 'padinjareparambil.', 'assets/images/1639021787.jpg', 'Hatchback', 1200000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_save`
--

DROP TABLE IF EXISTS `tbl_save`;
CREATE TABLE IF NOT EXISTS `tbl_save` (
  `save_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `items_id` int(20) NOT NULL,
  PRIMARY KEY (`save_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `name` varchar(10) NOT NULL,
  `user_created_at` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `user_status`, `name`, `user_created_at`) VALUES
(116, 'abcdef@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 'abbcdds aj', '11-11-21'),
(118, 'admin@gmail.com', '7ece99e593ff5dd200e2b9233d9ba654', 2, 'admin admi', '11-11-21'),
(120, 'rubinsiby@mca.ajce.in', 'a35e723cc29d1ec9a23566cfffe77b12', 1, 'rubin siby', '12-11-21'),
(121, 'frankmathewsthomas@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 'frank thom', '12-11-21'),
(122, 'ligin@gmail.com', '383b7d44a65cf9f0e8a474427f01eeba', 1, 'ligin abra', '22-11-21'),
(123, 'frank@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 'frank thom', '22-11-21'),
(126, 'vivek@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 'Vivek Kuma', '24-11-21'),
(127, 'albinp@gmail.com', 'a4235fdb51eba44a64db4c2ff2765c8b', 0, 'albin thom', '24-11-21'),
(128, 'ebin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 1, 'Ebin Johns', '07-12-21'),
(129, 'albin@gmail.com', 'e495a909893e9f1d90198016848fc344', 1, 'albin thom', '08-12-21'),
(130, 'akshai@gmail.com', 'd10fcbde30390ad2cf8a53243639bcad', 1, 'akshai bij', '09-12-21'),
(131, 'ak@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Akhil Siby', '15-12-21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
