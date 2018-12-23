-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 09:43 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cholo_bike`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `admin_type` int(3) NOT NULL DEFAULT '0',
  `account_status` int(3) NOT NULL DEFAULT '1',
  `branch_id` int(3) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `phone_number`, `password`, `admin_type`, `account_status`, `branch_id`, `timestamp`) VALUES
(1, 'Rubel', 'dm@gmail.com', '123456789', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, '2018-10-14 06:01:51.678682'),
(2, 'Samir', 'ba@gmail.com', '123456789', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 2, '2018-10-14 06:01:51.678682'),
(3, 'Foysal', 'mj@gmail.com', '1213456677', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 5, '2018-10-14 06:01:51.678682'),
(4, 'Zahid', 'mp@gmail.com', '1321331313', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 8, '2018-10-14 06:01:51.678682'),
(6, 'Super Admin', 'sa@gmail.com', '01912311291', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 9, '0000-00-00 00:00:00.000000'),
(16, 'test', 'tsst@gmail.com', '234567898765', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 5, '2018-10-18 19:51:23.208457'),
(21, 'goxipi@mailinator.net', 'cexubijuja@mailinator.net', '40345686543456', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 5, '2018-10-18 20:30:59.057024'),
(22, 'AA', '1000191@daffodil.ac', '45535', 'aaaaa', 0, 1, 2, '2018-11-19 20:07:20.079455');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `branch_phone` varchar(50) NOT NULL,
  `branch_email` varchar(80) NOT NULL,
  `branch_status` int(10) NOT NULL DEFAULT '1',
  `branch_type` int(3) DEFAULT '0',
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_address`, `branch_phone`, `branch_email`, `branch_status`, `branch_type`, `timestamp`) VALUES
(1, 'Dhanmondi', 'Sukrabad, Dhanmondi', '019234122234', 'e@gmail.com', 1, 0, '2018-10-14 05:22:03.062136'),
(2, 'Badda', 'Adarsha Nagar, Middle Badda, Gulshan', '53535676545', 'b@gmail.com', 1, 0, '2018-10-14 05:22:03.062136'),
(5, 'Motijheel', 'Toyenbee Circular Rd, Motijheel', '456787654', 'm@gmail.com', 1, 0, '2018-10-14 05:22:03.062136'),
(8, 'Mohammadpur', 'Town Hall, Mohammadpur', '4567898765', 'mp@gmail.com', 1, 0, '2018-10-18 08:43:58.326997'),
(9, 'Head Office', 'Toyenbee Circular Rd, Motijheel', '01912311291', 'ho@gmail.com', 1, 1, '2018-10-17 18:00:00.000000'),
(10, 'AA', 'AAAAAAAAAAAaaa', '45454555', '100000sdd@gmail.com', 0, 0, '2018-11-19 20:10:24.805754');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_type` varchar(50) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_type`, `publication_status`, `timestamp`) VALUES
(9, 'Electric Bicycle ', 'Electric Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(10, 'Fixed Gear ', 'Fixed Gear', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(11, 'Bicycle Folding ', 'Bicycle Folding', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(12, 'Bicycle General ', '', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(16, 'Road Bicycle', 'Road Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(17, 'Mountain Bicycle', 'Mountain Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(18, 'Ladies Bicycle', 'Ladies Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(19, 'Kids Bicycle', 'Kids Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(20, 'Hybrid Bicycle', 'Hybrid Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(21, 'General Bicycle', 'General Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(22, 'Folding Bicycle', 'Folding Bicycle', 'Bike', 1, '2018-10-14 05:22:23.239018'),
(23, 'Helmet', 'Helmet', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(24, 'Gloves', 'Gloves', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(25, 'Front Light', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Front Light</span></font>', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(26, 'Tail Light', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">TAIL LIGHT</span></font>', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(27, 'Sun Glass', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">SUN GLASS</span></font>', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(28, 'Bag', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">BAG</span></font>', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(29, 'Stand', 'Stand', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(30, 'Tyre', 'Tyre', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(31, 'Lock', 'Lock', 'Accessories', 0, '2018-10-14 05:22:23.239018'),
(32, 'Bell & Horn', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Bell &amp; Horn</span></font>', 'Accessories', 1, '2018-10-14 05:22:23.239018'),
(35, 'TT', 'TTTTTTTTTTTTTTTTTTTT', 'Accessories', 0, '2018-11-19 18:46:43.160192');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `sms_id` int(3) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `sms` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sms_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`sms_id`, `first_name`, `last_name`, `email_address`, `phone_number`, `sms`, `status`, `sms_time`) VALUES
(1, 'Jameson', 'Valencia', 'tojygave@mailinator.net', '+644-68-5458668', 'Illo reiciendis aut sed aute voluptate enim et reprehenderit voluptas impedit recusandae In quis neque laborum aut', 1, '2018-11-10 20:00:28'),
(2, 'Kennan', 'Cain', 'fofarafur@mailinator.net', '+952-71-2291031', 'Aut dolor maxime quia ad modi tempora voluptas culpa eveniet aliquip praesentium', 1, '2018-11-21 20:33:58'),
(4, 'Amanda', 'Justice', 'keteqaqur@mailinator.net', '+137-30-5197766', 'Voluptatem aut quis deserunt tenetur in', 1, '2018-11-10 20:00:21'),
(5, '', '', '', '', '', 0, '2018-11-17 08:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `national_id` int(30) DEFAULT NULL,
  `phone_number` varchar(30) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(50) NOT NULL,
  `activation_status` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `password`, `national_id`, `phone_number`, `blood_group`, `address`, `city`, `district`, `activation_status`, `timestamp`) VALUES
(44, 'Rubel', 'Mahmud', 'rubelmahmuud21@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 123456789, '5454554', '2', 'Dhaka', 'dhaka', 'Dhaka', 0, '2018-10-16 06:42:17.814905'),
(45, 'Samir', 'Khalid', 'sk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 5435353, '2345676543', '1', 'Dhanmondi', 'Dhaka', 'Dhaka', 0, '2018-10-17 08:37:52.393556'),
(66, 'Cooper', 'Grant', 'rubelmahmuud21@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2147483647, '454', '3', 'Facere pariatur Minus rem expedita rerum labore', 'Obcaecati alias qui voluptatem dicta enim ducimus eos odit ipsum obcaecati animi iste consequatur qu', 'Sed officiis molestias quas nobis eos quas ducimus', 0, '2018-11-17 16:11:01.995727'),
(67, 'Test', 'Master', 'rm@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 345333333, '5646564', '2', 'rtretrtett', 'Dhaka', 'Dhaka', 0, '2018-11-21 12:16:06.807521');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `enquiry_id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `enquiry` varchar(255) DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`enquiry_id`, `name`, `email`, `enquiry`, `status`, `time`, `product_id`) VALUES
(5, 'Ulysses Alston', 'redec@mailinator.com', 'Labore esse accusamus quia ipsum ut reprehenderit dolorum', 1, '2018-11-19 09:00:46', 41),
(6, 'Rooney Callahan', 'riri@mailinator.net', 'Qui illum dolore Nam molestiae praesentium debitis voluptate voluptatem molestiae consequatur Ipsum quos nobis minima dolor', 0, '2018-11-19 09:00:46', 16),
(7, 'Test', 'rrr@gmail.com', 'drfgfdgg', 0, '2018-11-21 19:52:23', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `manufacturer_id` int(3) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `manufacturer_description` text NOT NULL,
  `manufacturer_type` varchar(50) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_description`, `manufacturer_type`, `publication_status`, `timestamp`) VALUES
(14, 'Core', 'Core', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(15, 'Duranta', '', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(16, 'Foxter', 'Foxter', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(17, 'Ghost', '', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(19, 'Nekro', 'Nekro', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(20, 'Phoenix', 'Phoenix', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(21, 'Saracen', 'Saracen', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(22, 'Veloce', 'Veloce', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(23, 'Trek', '', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(24, 'Hero', '', 'Bike', 1, '2018-10-14 05:23:21.433532'),
(25, 'Cairbull', 'CAIRBULL', 'Accessories', 1, '2018-10-14 05:23:21.433532'),
(26, 'Hand Crew', 'HAND CREW', 'Accessories', 1, '2018-10-14 05:23:21.433532'),
(27, 'Deemount', 'Deemount', 'Accessories', 1, '2018-10-14 05:23:21.433532'),
(28, 'Gub', 'Gub', 'Accessories', 1, '2018-10-14 05:23:21.433532'),
(30, 'Non Brand', 'Non Brand', 'Accessories', 1, '2018-10-14 05:23:21.433532'),
(32, 'aaa', 'aaa', 'Bike', 0, '2018-11-19 18:52:13.358356'),
(33, 'aaa', 'aaa', '', 0, '2018-11-19 18:53:05.650124');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_status` varchar(25) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `order_date`) VALUES
(46, 44, 26, 1300.00, 'pending', '2018-10-17 08:25:22'),
(47, 45, 27, 1300.00, 'approved', '2018-10-17 08:39:05'),
(48, 44, 28, 40000.00, 'approved', '2018-10-17 08:47:50'),
(49, 44, 28, 17600.00, 'approved', '2018-10-17 08:59:10'),
(50, 45, 29, 13800.00, 'approved', '2018-10-17 09:05:41'),
(51, 45, 30, 2300.00, 'approved', '2018-10-18 07:18:36'),
(52, 45, 30, 25000.00, 'approved', '2018-10-18 07:19:58'),
(53, 44, 31, 18500.00, 'pending', '2018-10-19 11:06:01'),
(54, 44, 32, 2000.00, 'pending', '2018-10-24 17:50:11'),
(55, 46, 0, 100.00, 'pending', '2018-11-09 06:38:03'),
(56, 47, 0, 50.00, 'pending', '2018-11-09 18:10:31'),
(57, 53, 33, 28000.00, 'pending', '2018-11-15 19:30:46'),
(58, 53, 33, 14000.00, 'pending', '2018-11-15 19:36:49'),
(59, 53, 33, 14000.00, 'pending', '2018-11-15 19:45:14'),
(60, 55, 34, 15500.00, 'pending', '2018-11-15 19:47:40'),
(62, 44, 35, 15500.00, 'pending', '2018-11-15 20:04:22'),
(63, 44, 35, 23500.00, 'pending', '2018-11-15 20:04:42'),
(64, 66, 36, 15500.00, 'pending', '2018-11-17 16:39:39'),
(65, 44, 37, 47000.00, 'approved', '2018-11-17 18:05:20'),
(66, 44, 37, 112000.00, 'approved', '2018-11-17 18:06:16'),
(67, 44, 37, 68500.00, 'approved', '2018-11-17 18:09:31'),
(68, 44, 38, 132000.00, 'approved', '2018-11-20 15:00:05'),
(69, 44, 38, 14000.00, 'pending', '2018-11-20 15:15:06'),
(70, 44, 38, 56000.00, 'approved', '2018-11-20 15:16:45'),
(71, 67, 39, 4200.00, 'approved', '2018-11-21 12:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(7) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_image`) VALUES
(43, 46, 30, 'Gub M1 Pro Helmet', 1300.00, 1, '../assets/product_images/gub-pro-m1-500x500.jpg'),
(44, 47, 30, 'Gub M1 Pro Helmet', 1300.00, 1, '../assets/product_images/gub-pro-m1-500x500.jpg'),
(45, 48, 18, 'SARACEN TUFFTRAX', 20000.00, 2, '../assets/product_images/Saracen-Tufftrax-Mens (1).jpg'),
(46, 49, 16, 'NEKRO ZEN BICYCLE', 15500.00, 1, '../assets/product_images/nekro-zen.jpg'),
(47, 49, 27, 'Cairbull Cycling Helmet 30', 2100.00, 1, '../assets/product_images/product-image-557157333_800x-500x500.jpg'),
(48, 50, 26, 'Helmet with Sunglass', 2300.00, 6, '../assets/product_images/hel.jpg'),
(49, 51, 26, 'Helmet with Sunglass', 2300.00, 1, '../assets/product_images/hel.jpg'),
(50, 52, 14, 'FOXTER 3.0 BICYCLE', 12500.00, 2, '../assets/product_images/foxter-3-0.jpg'),
(51, 53, 17, 'PHOENIX 1800 BICYCLE', 18500.00, 1, '../assets/product_images/phoenix-1800.jpg'),
(52, 54, 28, 'Cairbull 07 Bicycle Helmet', 2000.00, 1, '../assets/product_images/Cairbull 07-500x500.jpg'),
(53, 55, 19, 'TREK 4300 BICYCLE', 56000.00, 1, '../assets/product_images/Trek-4300-Black.jpg'),
(54, 57, 40, 'Phoenix 1400', 14000.00, 1, '../assets/product_images/phoenix-1400.jpg'),
(55, 57, 40, 'Phoenix 1400', 14000.00, 1, '../assets/product_images/phoenix-1400.jpg'),
(56, 58, 40, 'Phoenix 1400', 14000.00, 1, '../assets/product_images/phoenix-1400.jpg'),
(57, 59, 40, 'Phoenix 1400', 14000.00, 1, '../assets/product_images/phoenix-1400.jpg'),
(58, 60, 41, 'Phoenix 1500', 15500.00, 1, '../assets/product_images/phoenix-1500.jpg'),
(59, 61, 40, 'Phoenix 1400', 14000.00, 1, '../assets/product_images/phoenix-1400.jpg'),
(60, 61, 43, 'Adjustable Bicycle stand', 350.00, 1, '../assets/product_images/29683542_2114319562133803_2695578559574872533_n-500x500.jpg'),
(61, 62, 41, 'Phoenix 1500', 15500.00, 1, '../assets/product_images/phoenix-1500.jpg'),
(62, 63, 39, 'Core Project 27.5er', 23500.00, 1, '../assets/product_images/core-project-27-5er.jpg'),
(63, 64, 41, 'Phoenix 1500', 15500.00, 1, '../assets/product_images/phoenix-1500.jpg'),
(64, 65, 39, 'Core Project 27.5er', 23500.00, 2, '../assets/product_images/core-project-27-5er.jpg'),
(65, 66, 19, 'TREK 4300 BICYCLE', 56000.00, 2, '../assets/product_images/Trek-4300-Black.jpg'),
(66, 67, 19, 'TREK 4300 BICYCLE', 56000.00, 1, '../assets/product_images/Trek-4300-Black.jpg'),
(67, 67, 14, 'FOXTER 3.0 BICYCLE', 12500.00, 1, '../assets/product_images/foxter-3-0.jpg'),
(68, 68, 19, 'TREK 4300 BICYCLE', 56000.00, 2, '../assets/product_images/Trek-4300-Black.jpg'),
(69, 68, 18, 'SARACEN TUFFTRAX', 20000.00, 1, '../assets/product_images/Saracen-Tufftrax-Mens (1).jpg'),
(70, 69, 40, 'Phoenix 1400', 14000.00, 1, '../assets/product_images/phoenix-1400.jpg'),
(71, 70, 19, 'TREK 4300 BICYCLE', 56000.00, 1, '../assets/product_images/Trek-4300-Black.jpg'),
(72, 71, 27, 'Cairbull Cycling Helmet 30', 2100.00, 2, '../assets/product_images/product-image-557157333_800x-500x500.jpg'),
(73, 73, 27, 'Cairbull Cycling Helmet 30', 2100.00, 1, '../assets/product_images/product-image-557157333_800x-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `trx_id` varchar(15) DEFAULT NULL,
  `payment_status` varchar(25) NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `payment_type`, `trx_id`, `payment_status`, `payment_date`) VALUES
(1, 1, 'cash_on_delivery', NULL, 'pending', '2016-08-09 14:10:35'),
(2, 2, 'cash_on_delivery', NULL, 'pending', '2016-08-09 14:12:45'),
(3, 3, 'cash_on_delivery', NULL, 'pending', '2016-08-11 13:20:32'),
(4, 4, 'cash_on_delivery', NULL, 'pending', '2017-04-27 13:44:16'),
(5, 5, 'cash_on_delivery', NULL, 'pending', '2017-04-27 13:58:23'),
(6, 6, 'cash_on_delivery', NULL, 'pending', '2017-04-27 18:44:10'),
(7, 7, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:31:19'),
(8, 8, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:36:08'),
(9, 9, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:38:34'),
(10, 10, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:39:40'),
(11, 11, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:40:57'),
(12, 12, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:41:24'),
(13, 13, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:54:23'),
(14, 14, 'cash_on_delivery', NULL, 'pending', '2017-04-27 19:54:41'),
(15, 15, 'cash_on_delivery', NULL, 'pending', '2017-04-28 08:36:36'),
(16, 16, 'cash_on_delivery', NULL, 'pending', '2017-04-28 08:46:40'),
(17, 17, 'cash_on_delivery', NULL, 'pending', '2017-04-28 08:48:50'),
(18, 18, 'cash_on_delivery', NULL, 'pending', '2017-04-28 16:10:11'),
(19, 19, 'cash_on_delivery', NULL, 'pending', '2017-04-28 16:15:16'),
(20, 20, 'cash_on_delivery', NULL, 'pending', '2017-04-28 17:01:30'),
(21, 21, 'cash_on_delivery', NULL, 'pending', '2017-04-28 20:24:14'),
(22, 22, 'cash_on_delivery', NULL, 'pending', '2017-04-28 20:25:26'),
(23, 23, 'cash_on_delivery', NULL, 'pending', '2017-04-28 20:26:13'),
(24, 24, 'cash_on_delivery', NULL, 'pending', '2017-04-28 20:31:41'),
(25, 25, 'cash_on_delivery', NULL, 'pending', '2017-04-28 23:41:25'),
(26, 26, 'cash_on_delivery', NULL, 'pending', '2017-04-28 23:44:21'),
(27, 27, 'cash_on_delivery', NULL, 'pending', '2018-09-23 21:07:41'),
(28, 28, 'cash_on_delivery', NULL, 'pending', '2018-09-23 22:24:58'),
(29, 29, 'cash_on_delivery', NULL, 'pending', '2018-09-24 19:45:55'),
(30, 30, 'cash_on_delivery', NULL, 'pending', '2018-09-27 17:07:26'),
(31, 31, 'cash_on_delivery', NULL, 'pending', '2018-09-27 17:17:01'),
(32, 32, 'cash_on_delivery', NULL, 'pending', '2018-09-27 17:21:28'),
(33, 33, 'cash_on_delivery', NULL, 'pending', '2018-09-27 18:47:09'),
(34, 34, 'cash_on_delivery', NULL, 'pending', '2018-10-03 03:19:43'),
(35, 35, 'cash_on_delivery', NULL, 'pending', '2018-10-12 12:40:10'),
(36, 36, 'cash_on_delivery', NULL, 'pending', '2018-10-12 15:40:16'),
(37, 37, 'cash_on_delivery', NULL, 'pending', '2018-10-12 15:41:26'),
(38, 38, 'cash_on_delivery', NULL, 'pending', '2018-10-12 15:42:56'),
(39, 39, 'cash_on_delivery', NULL, 'pending', '2018-10-12 15:45:24'),
(40, 40, 'cash_on_delivery', NULL, 'pending', '2018-10-15 15:21:34'),
(41, 41, 'cash_on_delivery', NULL, 'pending', '2018-10-16 06:29:09'),
(42, 42, 'bKash', NULL, 'pending', '2018-10-16 06:31:27'),
(43, 43, 'bKash', NULL, 'pending', '2018-10-16 06:42:24'),
(44, 44, 'bKash', NULL, 'pending', '2018-10-16 06:42:47'),
(45, 45, 'bKash', NULL, 'pending', '2018-10-17 07:40:30'),
(46, 46, 'bKash', NULL, 'pending', '2018-10-17 08:25:22'),
(47, 47, 'bKash', NULL, 'pending', '2018-10-17 08:39:05'),
(48, 48, 'cash_on_delivery', NULL, 'pending', '2018-10-17 08:47:50'),
(49, 49, 'cash_on_delivery', NULL, 'pending', '2018-10-17 08:59:10'),
(50, 50, 'cash_on_delivery', NULL, 'pending', '2018-10-17 09:05:41'),
(51, 51, 'cash_on_delivery', NULL, 'pending', '2018-10-18 07:18:36'),
(52, 52, 'cash_on_delivery', NULL, 'pending', '2018-10-18 07:19:58'),
(53, 53, 'cash_on_delivery', NULL, 'pending', '2018-10-19 11:06:01'),
(54, 54, 'cash_on_delivery', NULL, 'pending', '2018-10-24 17:50:11'),
(55, 55, 'bKash', NULL, 'pending', '2018-11-09 06:38:03'),
(56, 56, 'bKash', NULL, 'pending', '2018-11-09 18:10:31'),
(57, 57, 'cash_on_delivery', NULL, 'pending', '2018-11-15 19:30:46'),
(58, 58, 'bKash', '', 'pending', '2018-11-15 19:36:49'),
(59, 59, 'bKash', NULL, 'pending', '2018-11-15 19:45:14'),
(60, 60, 'bKash', NULL, 'pending', '2018-11-15 19:47:40'),
(61, 61, '', NULL, 'pending', '2018-11-15 20:02:49'),
(62, 62, 'bKash', NULL, 'pending', '2018-11-15 20:04:22'),
(63, 63, 'cash_on_delivery', NULL, 'pending', '2018-11-15 20:04:42'),
(64, 64, 'bKash', NULL, 'pending', '2018-11-17 16:39:45'),
(65, 65, 'bKash', NULL, 'pending', '2018-11-17 18:05:26'),
(66, 66, 'cash_on_delivery', NULL, 'pending', '2018-11-17 18:06:21'),
(67, 67, 'cash_on_delivery', NULL, 'pending', '2018-11-17 18:09:37'),
(68, 68, 'bKash', NULL, 'pending', '2018-11-20 15:00:16'),
(69, 69, 'bKash', 'gfhgf4443jhjhf', 'pending', '2018-11-20 15:15:11'),
(70, 70, 'bKash', 'ddgdgdg555', 'pending', '2018-11-20 15:16:50'),
(71, 71, 'bKash', '43535353', 'pending', '2018-11-21 12:17:29'),
(72, 72, 'bKash', 'tytryryr', 'pending', '2018-11-21 12:45:40'),
(73, 73, 'bKash', '3453543', 'pending', '2018-11-21 12:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_sku` varchar(100) DEFAULT NULL,
  `category_id` int(3) NOT NULL,
  `manufacturer_id` int(3) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_cost` int(10) DEFAULT NULL,
  `stock_amount` int(7) NOT NULL,
  `minimum_stock_amount` varchar(5) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` varchar(200) NOT NULL DEFAULT '../assets/product_images/no_image_availables.jpg',
  `product_type` int(5) NOT NULL DEFAULT '0',
  `is_featured` int(2) NOT NULL DEFAULT '0',
  `allow_review` int(11) NOT NULL DEFAULT '0',
  `publication_status` tinyint(1) NOT NULL,
  `admin_id` int(3) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_sku`, `category_id`, `manufacturer_id`, `product_price`, `product_cost`, `stock_amount`, `minimum_stock_amount`, `product_short_description`, `product_long_description`, `product_image`, `product_type`, `is_featured`, `allow_review`, `publication_status`, `admin_id`, `branch_id`, `timestamp`) VALUES
(12, 'CORE RETRO SPEED BICYCLE', 'CRSB_265', 10, 14, 26500, 0, 10, '2', 'Core Retro Speed bicycle is a product of popular brand Core. Product price of Core Retro Speed bicycle may revised by the seller anytime without prior notice. Core Retro Speed bicycle is suitable for Bangladeshi roads and weather. To get Core Retro Speed bicycle please call to your nearest bicycle shop.', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Core Retro Speed bicycle is a product of popular brand Core. Product price of Core Retro Speed bicycle may revised by the seller anytime without prior notice. Core Retro Speed bicycle is suitable for Bangladeshi roads and weather. To get Core Retro Speed bicycle please call to your nearest bicycle shop.</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Frame: Double butted hydroformed 6061 alloy tubing</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Frame Sizes: 54cm and 57cm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Fork: Alloy Threadless</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Front Dera: Shimano Claris</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Rear Dera: Shimano Claris</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Shifter: Microshift</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Chainwheel: Cyclone</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Cable: Jagwire</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Hub: Joytech</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Tyre: Maxxis 700X23C</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Pedal: VP</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Brakes: Tektro Alloy Caliper Brake</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Speed: 16</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Color: Grey/Blue &amp; Black/Red&nbsp;</span>', '../assets/product_images/core-retro-speed.jpg', 0, 0, 0, 1, 2, 1, '2018-10-14 05:21:01.554255'),
(13, 'DURANTA MOUNTAIN BIKE', 'RMBPB_850', 17, 15, 8500, NULL, 8, '1', '<span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Duranta Mountain Bike Power bicycle is a product of popular brand Duranta. Product price of Duranta Mountain Bike Power bicycle may revised by the seller anytime without prior notice. Duranta Mountain Bike Power bicycle is suitable for Bangladeshi roads and weather. To get Duranta Mountain Bike Power bicycle please call to your nearest bicycle shop.&nbsp;</span>', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Duranta Mountain Bike Power bicycle is a product of popular brand Duranta. Product price of Duranta Mountain Bike Power bicycle may revised by the seller anytime without prior notice. Duranta Mountain Bike Power bicycle is suitable for Bangladeshi roads and weather. To get Duranta Mountain Bike Power bicycle please call to your nearest bicycle shop.&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Details:</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Brand: Duranta</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Gender: Male</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Materials: steel</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Wheel size: 26\"</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Color: As given picture.</span>', '../assets/product_images/duranta-avenger-gents-26-bi.jpg', 0, 1, 0, 1, 1, 1, '2018-10-14 05:21:01.554255'),
(14, 'FOXTER 3.0 BICYCLE', 'FB3_125', 12, 16, 12500, 0, 9, '1', 'Foxter 3.0 bicycle is a product of popular brand Foxter. Product price of Foxter 3.0 bicycle may revised by the seller anytime without prior notice. Foxter 3.0 bicycle is suitable for Bangladeshi roads and weather. To get Foxter 3.0 bicycle please call to your nearest bicycle shop. ', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Foxter 3.0 bicycle is a product of popular brand Foxter. Product price of Foxter 3.0 bicycle may revised by the seller anytime without prior notice. Foxter 3.0 bicycle is suitable for Bangladeshi roads and weather. To get Foxter 3.0 bicycle please call to your nearest bicycle shop.</span><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Monocoque Carbon MTB</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Super Light Alloy Frame</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Shifter Shimano</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Shimano Gear</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Front Fork Suspension</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Front &amp; Rear Disk Brake</span>', '../assets/product_images/foxter-3-0.jpg', 0, 0, 0, 1, 1, 1, '2018-10-14 05:21:01.554255'),
(15, 'GHOST SE 4000 2014 BICYCLE', 'GS400_7000', 16, 17, 70000, NULL, 6, '1', '', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Ghost SE 4000 2014 bicycle is a product of popular brand Ghost. Product price of Ghost SE 4000 2014 bicycle may revised by the seller anytime without prior notice. Ghost SE 4000 2014 bicycle is suitable for Bangladeshi roads and weather. To get Ghost SE 4000 2014 bicycle please call to your nearest bicycle shop.</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">frame : SE Alloy PG</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">stem : GHOST AS-DC 1 31.8 mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Fork : RST Aerial 30 Air RL 100 mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Handlebar : GHOST Low Rizer light 660 mm 31.8 mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">seatpost : GHOST light SP DC 1 31.6 mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">saddle : GHOST 2055 comfort</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Rear derailleur : Shimano XT 10-Speed</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Front derailleur : Shimano Deore</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">shifter : Shimano Deore SL</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">crankset : Shimano FCM 522 42-34-24 / 11-36</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">brakes : Tektro HDC 330 Disc 160 mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Tires : Schwalbe Smart Sam 2.1</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Rims : Alex TD 19</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Hubs : Sram</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">weight 12.9 kg</span>', '../assets/product_images/ghost-se-4000-2014.jpg', 0, 1, 0, 1, 2, 2, '2018-10-14 05:21:01.554255'),
(16, 'NEKRO ZEN BICYCLE', 'NZB_155', 16, 19, 15500, 0, 12, '2', 'Nekro Zen bicycle is a product of popular brand Nekro. Product price of Nekro Zen bicycle may revised by the seller anytime without prior notice. Nekro Zen bicycle is suitable for Bangladeshi roads and weather. To get Nekro Zen bicycle please call to your nearest bicycle shop. ', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Nekro Zen bicycle is a product of popular brand Nekro. Product price of Nekro Zen bicycle may revised by the seller anytime without prior notice. Nekro Zen bicycle is suitable for Bangladeshi roads and weather. To get Nekro Zen bicycle please call to your nearest bicycle shop.&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Brand: NEKRO-</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Model: ZEN</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Frame: 6061 Alloy 54cm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Fork: Steel</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Chainwheel: Prowheel Alloy</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">BB: Neco sealed</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Chain: KMC</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Shifter: SRAM X3</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Cassette: Shimano TZ21</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Rear dera: SRAM X3</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Brake: Promax</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Hub: Joytech</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Kickstand: Alloy</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Tyres: Kenda 700X28c</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Pedal: Wellgo</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Headsets: Neco</span>', '../assets/product_images/nekro-zen.jpg', 0, 1, 0, 1, 3, 2, '2018-10-14 05:21:01.554255'),
(17, 'PHOENIX 1800 BICYCLE', 'PB_185', 12, 20, 18500, 0, 9, '1', 'Phoenix 1800 bicycle is a product of popular brand Phoenix. Product price of Phoenix 1800 bicycle may revised by the seller anytime without prior notice. Phoenix 1800 bicycle is suitable for Bangladeshi roads and weather. To get Phoenix 1800 bicycle please call to your nearest bicycle shop. ', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Phoenix 1800 bicycle is a product of popular brand Phoenix. Product price of Phoenix 1800 bicycle may revised by the seller anytime without prior notice. Phoenix 1800 bicycle is suitable for Bangladeshi roads and weather. To get Phoenix 1800 bicycle please call to your nearest bicycle shop.</span><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Frame: 6061 alloy, 17.5\"</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">ForK: SR Suntour XCM (100mm, HLO)</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">F/D: Shimano TX50</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">R/D: Shimano Acera M360, 8 speed</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Shifter: Shimano EF51 (8 speed)</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Cassette: Shimano HG20-8</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Crank: SR Suntour XCT-9s</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Bottom Braket: Neco</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Hub: Joytec</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Tyre: Kenda k1153 26\"X1.95\"</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Pedal: Wellgo</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Brake: Bengal Mechanical Disk Brake</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Saddle : Stock</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Handlebar, Steam &amp; seatpost by Zoom</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Color: Black, Gray</span>', '../assets/product_images/phoenix-1800.jpg', 0, 0, 0, 1, 4, 2, '2018-10-14 05:21:01.554255'),
(18, 'SARACEN TUFFTRAX', 'STM_200', 17, 21, 20000, 0, 4, '1', 'Saracen Tufftrax Mens bicycle is a product of popular brand Saracen. Product price of Saracen Tufftrax Mens bicycle may revised by the seller anytime without prior notice. Saracen Tufftrax Mens bicycle is suitable for Bangladeshi roads and weather. To get Saracen Tufftrax Mens bicycle please call to your nearest bicycle shop. ', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Saracen Tufftrax Mens bicycle is a product of popular brand Saracen. Product price of Saracen Tufftrax Mens bicycle may revised by the seller anytime without prior notice. Saracen Tufftrax Mens bicycle is suitable for Bangladeshi roads and weather. To get Saracen Tufftrax Mens bicycle please call to your nearest bicycle shop.&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Tufftrax is our entry into mountain biking but they are much more versatile than the Mountain bike tag suggests. We believe that even entry-level bikes can ride great with carefully considered specs. Wide bars, short stems and long toptubes contribute to fantastic, do-it-all bikes.</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">FRAME Tufftrax 27.5 6061 lightweight alloy tubing / UK-specific design</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">FORK Suntour XCT / 100mm travel</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">HEADSET Neco cartridge</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">SHIFTERS Shimano STEF51 EZ-Fire 3x7 speed</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">REAR DERAILLEUR Shimano TX35</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">FRONT DERAILLEUR Shimano TX51</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">CHAINSET Suntour XCC-T208 28/38/48T 170-175mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">BOTTOM BRACKET Neco sealed cartridge</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">CHAIN KMC HV-500</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">CASSETTE Shimano TZ21 7-speed freewheel 14-28T</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">RIMS Saracen doublewall alloy black 32h</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">HUBS KT alloy black 32h front / rear</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">SPOKES Steel 14g</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">TYRES WTB Nano 27.5 x 2.1\"</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">BRAKES Alloy V-Brakes</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">LEVERS Shimano STEF51 inc EZ-Fire Shifters</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">HANDLEBARS Saracen alloy OS 720mm wide / 15mm rise / 5 degree bend</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">GRIPS Saracen dual-density grip</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">STEM Saracen 6061 60-80mm a-head / 10 degree rise / 31.8mm clamp</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">SADDLE Saracen custom</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">SEATPOST Alloy micro-adjust / 27.2mm</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">PEDALS Resin MTB</span>', '../assets/product_images/Saracen-Tufftrax-Mens (1).jpg', 0, 0, 0, 1, 3, 1, '2018-10-14 05:21:01.554255');
INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_sku`, `category_id`, `manufacturer_id`, `product_price`, `product_cost`, `stock_amount`, `minimum_stock_amount`, `product_short_description`, `product_long_description`, `product_image`, `product_type`, `is_featured`, `allow_review`, `publication_status`, `admin_id`, `branch_id`, `timestamp`) VALUES
(19, 'TREK 4300 BICYCLE', 'TB_550', 17, 23, 56000, 55000, 1, '1', 'Trek 4300 bicycle is a product of popular brand Trek. Product price of Trek 4300 bicycle may revised by the seller anytime without prior notice. Trek 4300 bicycle is suitable for Bangladeshi roads and weather. To get Trek 4300 bicycle please call to your nearest bicycle shop.', '<span style=\"box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Product Description</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Trek 4300 bicycle is a product of popular brand Trek. Product price of Trek 4300 bicycle may revised by the seller anytime without prior notice. Trek 4300 bicycle is suitable for Bangladeshi roads and weather. To get Trek 4300 bicycle please call to your nearest bicycle shop.</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Frame: Alpha Gold Aluminium w/semi-integrated head tube, mechanically formed &amp; butted tubing, race geometry, internal cable routing, rack mounts, replaceable derailleur hanger</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Front suspension: SR Suntour XCM w/30mm stanchions, coil spring, preload, hydraulic lockout, 100mm travel</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Sizes: 13.5, 15.5, 17.5, 18.5, 19.5, 21.5, 23.5\"</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Wheels: Formula DC20 alloy front hub; Formula DC22 LW alloy rear hub w/Bontrager AT-650 32-hole double-walled rims</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Tyres: Bontrager XR2, 26x2.2\"</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Shifters: Shimano Acera M390, 9 speed</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Front derailleur: Shimano Acera</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Rear derailleur: Shimano Acera M390</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Crank: Shimano Acera M391, 44/32/22 w/chainguard</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Cassette: Shimano HG20 11-34, 9 speed</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Pedals: Wellgo nylon platform</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Saddle: Bontrager Evoke 1</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Seatpost: Bontrager SSR, 31.6mm, 12mm offset</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Handlebar: Bontrager low-riser, 31.8mm, 15mm rise</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Stem: Bontrager SSR, 31.8mm, 10 degree</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Headset: 1-1/8\" threadless, semi-integrated, semi-cartridge bearings</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Brakeset: Shimano M395 hydraulic disc brakes</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Grips: Bontrager Race&nbsp;</span>', '../assets/product_images/Trek-4300-Black.jpg', 0, 1, 0, 1, 1, 1, '2018-10-14 05:21:01.554255'),
(26, 'Helmet with Sunglass', 'DHS_230', 23, 25, 2300, 2200, 3, '2', '<span style=\"color: rgb(105, 103, 99); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">&nbsp;Helmet with Sunglass package include : extra 2 pc sunglass 1 night vision &amp; 1 sunglas</span>', '<span style=\"color: rgb(105, 103, 99); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Helmet with Sunglass package include : extra 2 pc sunglass 1 night vision &amp; 1 sunglass</span>', '../assets/product_images/hel.jpg', 1, 0, 0, 1, 3, 1, '2018-10-14 05:21:01.554255'),
(27, 'Cairbull Cycling Helmet 30', 'CCH30', 23, 25, 2100, 2000, 6, '1', '<div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Inner Shell:Thermoformed reinforcement shock absorbing polystyrene</span></font></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Fit System&nbsp;</span></font></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Lightweight fit system with an easy-to-turn dial for adjustments&nbsp;</span></font></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Ventilation</span></font></div>', '<div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Inner Shell:Thermoformed&nbsp;reinforcement shock absorbing polystyrene</span></font></div><div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Fit System&nbsp;</span></font></div><div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Lightweight&nbsp;fit system with an easy-to-turn dial for adjustments&nbsp;</span></font></div><div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Ventilation</span></font></div>', '../assets/product_images/product-image-557157333_800x-500x500.jpg', 1, 0, 0, 1, 4, 5, '2018-10-14 05:21:01.554255'),
(28, 'Cairbull 07 Bicycle Helmet', 'CBH07', 23, 25, 2000, NULL, 50, '2', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Inner Shell:Thermoformed reinforcement shock absorbing polystyrene</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Fit System&nbsp;</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Lightweight fit system with an easy-to-turn dial for adjustments&nbsp;</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Ventilation</span></font></div>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Inner Shell:Thermoformed reinforcement shock absorbing polystyrene</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Fit System&nbsp;</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Lightweight fit system with an easy-to-turn dial for adjustments&nbsp;</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Ventilation</span></font></div>', '../assets/product_images/Cairbull 07-500x500.jpg', 1, 0, 0, 1, 3, 2, '2018-10-14 05:21:01.554255'),
(29, 'Gel Padded Gloves', 'HCGPG', 24, 26, 500, NULL, 100, '5', 'aaaaaaaa', 'bbbbbbb', '../assets/product_images/23755084_2052084988357261_5224316458807798644_n-500x500.jpg', 1, 0, 0, 1, 2, 2, '2018-10-14 05:21:01.554255'),
(30, 'Gub M1 Pro Helmet', 'GMH_130', 23, 28, 1300, NULL, 50, '2', 'aaaaaa', 'CCCC', '../assets/product_images/gub-pro-m1-500x500.jpg', 1, 0, 0, 1, 2, 2, '2018-10-14 05:21:01.554255'),
(33, 'Rechargeable USB Light With Horn device', 'RULH_450', 25, 30, 450, NULL, 100, '1', '<div class=\" _50f7\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; font-size: 13px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41);\">Product details</div><div class=\"_1xwp\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; font-size: 13px; white-space: pre-wrap; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41);\">100% brand new and high quality\r\n\r\nseparate key switches can be mounted anywhere on the handle can be easily accessed, when the brake is in operation. \r\n\r\nEasy to install, suitable for many models diameter H Andlebar.</div>', '<div class=\" _50f7\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; font-size: 13px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41);\">Product details</div><div class=\"_1xwp\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; font-size: 13px; white-space: pre-wrap; font-family: Helvetica, Arial, sans-serif; color: rgb(29, 33, 41);\">100% brand new and high quality\r\n\r\nseparate key switches can be mounted anywhere on the handle can be easily accessed, when the brake is in operation. \r\n\r\nEasy to install, suitable for many models diameter H Andlebar.\r\n\r\nBuilt-in 1200 mAh hour polymer lithium batteries (can be recharged over 500 times)\r\n\r\nIP44 waterproof, but please do not immerse in water. safe and secure \r\n\r\nCharging time: half an hour. \r\n\r\nMaterial: high quality plastic\r\n\r\nSwitch: press cap on / off. \r\n\r\nSize: 10x5.1 cm (LxW)\r\n\r\nPackage Includes:\r\n\r\n1 x speaker bike light\r\n\r\n1 x Wireless USB</div>', '../assets/product_images/15729472_1415640468448486_677110308703043584_n-500x500.jpg', 1, 1, 0, 1, 2, 2, '2018-10-14 05:21:01.554255'),
(34, 'LED leser tail light', 'LLTL_18', 26, 30, 180, NULL, 189, '1', '<p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">New: A brand-new, unused, unopened, undamaged item in its original packaging ,</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Type: Tail Light</p>', '<p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">New: A brand-new, unused, unopened, undamaged item in its original packaging ,</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Type: Tail Light</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Powered by : 2x AAA battery (Not included)<span class=\"Apple-tab-span\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; white-space: pre;\">	</span>Features: Flashing</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Size : 8cm x 7cm x 3cm / 3.15inch x 2.75inch x 1.18inch<span class=\"Apple-tab-span\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; white-space: pre;\">	</span></p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Country/Region of Manufacture:Made in China</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Bulb Type &nbsp;: &nbsp;LED</p>', '../assets/product_images/2016-New-5-LED-Laser-Beam-MTB-Mountain-Bicycle-Bike-Rear-Tail-Warning-Lamp-Light-4-500x500.jpg', 1, 1, 0, 1, 1, 2, '2018-10-14 05:21:01.554255'),
(35, 'Night Vision Sunglass', 'NVS_15', 27, 30, 150, NULL, 190, '1', '<p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">100%, UV &nbsp;PROTECTION</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Excellent choice for protection against dust (on the road),</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Leaves and twigs during mountain biking</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Night time sports &nbsp;riding or cycling</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">This Is &nbsp;very usefull on low light conditions&nbsp;</p>', '<p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">100%, UV &nbsp;PROTECTION</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Excellent choice for protection against dust (on the road),</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Leaves and twigs during mountain biking</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">Night time sports &nbsp;riding or cycling</p><p style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px 0px 10px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(51, 55, 69); font-family: Roboto; font-size: 13px;\">This Is &nbsp;very usefull on low light conditions&nbsp;</p>', '../assets/product_images/For  another Web-500x500.jpg', 1, 0, 1, 1, 1, 2, '2018-10-14 05:21:01.554255'),
(37, 'Core Jumper', 'CJ18', 17, 14, 18000, 17000, 10, '1', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Frame Size: 18\"&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Rim Size: 26,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Alloy Frame</span>', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Frame Size: 18\"&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Rim Size: 26,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Alloy Frame,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Double Alloy Rim,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Speed: 21 Speed,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter: EF-50,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front Dera: Shimano Tourney,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Rear Dera: Shimano Tourney,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork: Suntour M 3020,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Handle Bar: dmu alloy,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Sit post: Alloy, Soft Sit,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Head Parts: neco,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brake: V Brake (ARTEK),&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Tyer: INNOVA,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Tyer Size: 26\"x2.1,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">BB set Upgraded,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Color: White &amp; Silver,</span>', '../assets/product_images/core-jumper.jpg', 0, 0, 1, 1, 4, 5, '2018-11-10 16:19:47.281147'),
(38, 'Core Project 2.0', 'CP2', 17, 14, 22000, 21000, 20, '1', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Frame: 26\"x18\" Alloy 6061,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork: SUNTOUR SF 13-XCM-MLO,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Handle/Stem: Zoom Alloy Black</span>', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Frame: 26\"x18\" Alloy 6061,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork: SUNTOUR SF 13-XCM-MLO,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Handle/Stem: Zoom Alloy Black,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Seat Post: Zoom Alloy Black,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Head Set: Neco,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">BB Set: Neco,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Grips: Soft Comfort,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Saddle: Velo Plus Double Density,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Pedal: Wellgo B087 Full Alloy,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chain wheel: SUNTOUR XCT-V2,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter: Shimano EF-50 21 Speed,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front Dera: Shimano M310,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Rear Dera: Shimano M310,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Freewheel: Shimano HG20,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chain: KMC Z51,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brakes: TREKTRO NOVELA DISC BRAKE,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Hubs: KT Alloy Disc Hubs W/QR,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Rims: ALEX EF 20 Double Wall Alloy,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Tyre: KENDA K1047 26X2.1,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Kick Stand: Stand Well Alloy,&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Color: Silver, Black</span>', '../assets/product_images/core-project-2-0.jpg', 0, 0, 0, 1, 4, 5, '2018-11-10 16:21:55.032936'),
(39, 'Core Project 27.5er', 'CP27', 17, 14, 23500, 23000, 20, '1', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Color :&nbsp;Black/Green &amp; Gray/Green</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Frame: Double butted hydroformed 6061 alloy tubing with smooth welding,</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Size: 17.5\"</span>', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Color : Black/Green &amp; Gray/Green</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Frame: Double butted hydroformed 6061 alloy tubing with smooth welding,</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Size: 17.5\"</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork: Suntour XCM 100mm Hydraulic Lockout, QR, For 27.5</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front Dera: Shimano M310</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Rear Dera: Shimano Acera</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter: Shimano EF51</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Chainwheel: Suntour XCT</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Cable: Jagwire</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Hub: Joytech</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Tyre: Kenda Kadre SPORT 27.5\"X2.10\"</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Pedal: Wellgo</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brakes: Tektro Novela Disk Brake</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Speed: 24 (3X8)</span>', '../assets/product_images/core-project-27-5er.jpg', 0, 0, 0, 1, 4, 5, '2018-11-10 16:23:56.351182'),
(40, 'Phoenix 1400', 'P14', 12, 14, 14000, 13500, 15, '1', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front &amp; rear Dera- Shimano Tourney</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork- Zoom 60 mm</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter- Ef51 (7X3)</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brake- V brake</span>', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front &amp; rear Dera- Shimano Tourney</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork- Zoom 60 mm</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter- Ef51 (7X3)</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brake- V brake</span>', '../assets/product_images/phoenix-1400.jpg', 0, 0, 0, 1, 4, 8, '2018-11-10 16:28:28.431210'),
(41, 'Phoenix 1500', 'P155', 12, 20, 15500, 14500, 10, '1', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front &amp; rear Dera- Shimano Tourney</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork- Zoom 60 mm</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter- Ef51 (7X3)</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brake- Disk brake (Radius)</span>', '<span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Front &amp; rear Dera- Shimano Tourney</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Fork- Zoom 60 mm</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Shifter- Ef51 (7X3)</span><br style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Brake- Disk brake (Radius)</span>', '../assets/product_images/phoenix-1500.jpg', 0, 0, 0, 1, 4, 8, '2018-11-10 16:29:52.593295');
INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_sku`, `category_id`, `manufacturer_id`, `product_price`, `product_cost`, `stock_amount`, `minimum_stock_amount`, `product_short_description`, `product_long_description`, `product_image`, `product_type`, `is_featured`, `allow_review`, `publication_status`, `admin_id`, `branch_id`, `timestamp`) VALUES
(42, 'CBR Bicycle waterproof frame bag', 'CBR', 28, 30, 350, 300, 20, '1', '<font color=\"#1d2129\" face=\"Helvetica, Arial, sans-serif\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244);\">*stylish&nbsp;design</font><br style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244); color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif;\"><span style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244); color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif;\">*colour only red&nbsp;</span><br style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244); color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif;\"><font color=\"#1d2129\" face=\"Helvetica, Arial, sans-serif\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244);\">*waterproof&nbsp;</font>', '<font color=\"#1d2129\" face=\"Helvetica, Arial, sans-serif\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244);\">*stylish&nbsp;design</font><br style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244); color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif;\"><span style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244); color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif;\">*colour only red&nbsp;</span><br style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244); color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif;\"><font color=\"#1d2129\" face=\"Helvetica, Arial, sans-serif\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; box-sizing: border-box; font-size: 13px; background-color: rgb(244, 244, 244);\">*waterproof&nbsp;</font>', '../assets/product_images/3-Colors-Waterproof-CBR-1-5L-Outdoor-Triangle-Cycling-Bicycle-Front-Tube-Frame-Bag-Mountain-Bike-500x500.jpg', 1, 0, 0, 1, 4, 8, '2018-11-10 17:01:56.644710'),
(43, 'Adjustable Bicycle stand', 'BS35', 29, 30, 350, 320, 10, '1', '<span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(244, 244, 244);\">Adjustable Bicycle stand</span><span class=\"Apple-converted-space\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(244, 244, 244);\">&nbsp;</span>', '<span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(244, 244, 244);\">Adjustable Bicycle stand</span><span class=\"Apple-converted-space\" style=\"-webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; box-sizing: border-box; color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(244, 244, 244);\">&nbsp;</span>', '../assets/product_images/29683542_2114319562133803_2695578559574872533_n-500x500.jpg', 1, 1, 0, 1, 4, 5, '2018-11-10 17:04:10.436827'),
(44, '26*2.10 Meghna Tyre', 'MT35', 30, 30, 350, 300, 10, '1', '<span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(244, 244, 244);\">26*2.10 Meghna Tyr</span>', '<span style=\"color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(244, 244, 244);\">26*2.10 Meghna Tyr</span>', '../assets/product_images/22365519_2032203597012067_4071420180616737379_n-500x500.jpg', 1, 0, 0, 1, 4, 8, '2018-11-10 17:05:39.258146'),
(46, 'Helmet with Sunglass', 'yrty', 11, 17, 23, 565655, 55, '2', 'fgdfg', 'gdgdg', '../assets/product_images/46519150_2225481567697871_404227731895615488_o.jpg', 0, 0, 0, 1, 1, 1, '2018-11-21 18:10:01.640906');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_bike`
--

CREATE TABLE `tbl_rental_bike` (
  `bike_id` int(3) NOT NULL,
  `bike_number` int(5) DEFAULT NULL,
  `frame_number` varchar(50) DEFAULT NULL,
  `bike_condition` int(5) DEFAULT '1',
  `status` int(3) NOT NULL DEFAULT '0',
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rental_bike`
--

INSERT INTO `tbl_rental_bike` (`bike_id`, `bike_number`, `frame_number`, `bike_condition`, `status`, `branch_id`) VALUES
(1, 100, 'cb100fn', 0, 0, 1),
(2, 101, 'cb101fn', 0, 0, 2),
(3, 103, 'cb103fn', 1, 0, 2),
(4, 104, 'cb104fn', 1, 0, 5),
(5, 105, 'cb105fn', 1, 0, 8),
(6, 106, 'cb106fn', 1, 0, 1),
(7, 107, 'cb107fn', 0, 0, 5),
(8, 108, 'cb108fn', 1, 0, 1),
(9, 109, 'cb109fn', 1, 0, 2),
(10, 110, 'cb110fn', 1, 0, 5),
(11, 111, 'cb111fn', 1, 0, 2),
(12, 112, 'cb112fn', 1, 0, 2),
(13, 113, 'cb113fn', 1, 0, 2),
(14, 114, 'cb114fn', 1, 0, 8),
(15, 115, 'cb115fn', 1, 0, 1),
(16, 116, 'cb116fn', 1, 0, 1),
(17, 117, 'cb117fn', 1, 0, 1),
(18, 118, 'cb117fn', 1, 0, 1),
(19, 119, 'cb119fn', 1, 0, 1),
(20, 120, 'cb120fn', 1, 0, 1),
(21, 121, 'cb121fn', 1, 0, 2),
(22, 122, 'cb122fn', 1, 0, 2),
(23, 123, 'cb123fn', 1, 0, 2),
(24, 124, 'cb124fn', 1, 0, 8),
(25, 125, 'cb125fn', 1, 0, 2),
(26, 126, 'cb127fn', 1, 0, 5),
(27, 127, 'cb127fn', 1, 0, 5),
(28, 128, 'cb128fn', 1, 0, 5),
(29, 129, 'cb129fn', 1, 0, 5),
(30, 130, 'cb130fn', 1, 0, 5),
(31, 131, 'cb131fn', 1, 0, 8),
(32, 132, 'cb132fn', 1, 0, 8),
(33, 133, 'cb133fn', 1, 0, 8),
(34, 134, 'cb134fn', 1, 0, 8),
(36, 136, 'fdfdfddsd', 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_order`
--

CREATE TABLE `tbl_rental_order` (
  `rent_order_id` int(3) NOT NULL,
  `rent_from` int(5) DEFAULT NULL,
  `rent_to` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `rent_order_status` int(5) DEFAULT '0',
  `rent_order_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rental_order`
--

INSERT INTO `tbl_rental_order` (`rent_order_id`, `rent_from`, `rent_to`, `customer_id`, `rent_order_status`, `rent_order_time`) VALUES
(2, 1, 1, 44, 2, '2018-11-10 07:40:05'),
(3, 5, 5, 44, 2, '2018-11-11 19:23:03'),
(5, 1, 2, 44, 2, '2018-11-10 07:45:35'),
(6, 1, 2, 44, 2, '2018-11-11 18:39:46'),
(7, 5, 8, 45, 2, '2018-11-11 19:23:09'),
(8, 1, 8, 48, 2, '2018-11-11 17:51:40'),
(9, 8, 5, 48, 2, '2018-11-11 17:51:07'),
(10, 1, 5, 48, 2, '2018-11-11 19:23:11'),
(11, 1, 5, 48, 2, '2018-11-11 19:30:09'),
(12, 2, 5, 48, 2, '2018-11-11 19:34:53'),
(13, 1, 5, 48, 2, '2018-11-11 20:08:00'),
(14, 1, 2, 48, 2, '2018-11-11 20:10:29'),
(15, 1, 8, 48, 2, '2018-11-11 20:41:36'),
(16, 5, 2, 48, 2, '2018-11-12 10:10:30'),
(17, 1, 1, 48, 2, '2018-11-11 21:47:36'),
(18, 8, 1, 48, 2, '2018-11-12 10:10:47'),
(21, 1, 2, 44, 2, '2018-11-12 10:24:03'),
(22, 1, 5, 44, 2, '2018-11-12 10:36:18'),
(23, 1, 8, 44, 2, '2018-11-17 17:43:11'),
(24, 1, 2, 44, 2, '2018-11-13 17:36:48'),
(25, 1, 2, 44, 2, '2018-11-19 07:40:46'),
(26, 1, 2, 44, 2, '2018-11-17 17:48:24'),
(27, 5, 1, 44, 2, '2018-11-19 08:04:32'),
(28, 1, 5, 52, 0, '0000-00-00 00:00:00'),
(29, 2, 5, 56, 0, '0000-00-00 00:00:00'),
(30, 2, 8, 57, 0, '0000-00-00 00:00:00'),
(31, 5, 8, 44, 2, '2018-11-21 13:38:05'),
(34, 5, 2, 44, 2, '2018-11-19 07:50:09'),
(35, 5, 2, 44, 2, '2018-11-21 14:00:42'),
(36, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(37, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(38, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(39, 5, 2, 44, 2, '2018-11-19 08:04:41'),
(40, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(41, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(42, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(43, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(44, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(45, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(46, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(47, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(48, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(49, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(50, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(51, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(52, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(53, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(54, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(55, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(56, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(57, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(58, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(59, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(60, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(61, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(62, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(63, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(64, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(65, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(66, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(67, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(68, 5, 2, 44, 0, '0000-00-00 00:00:00'),
(69, 8, 2, 44, 2, '2018-11-19 15:42:27'),
(70, 8, 2, 44, 0, '0000-00-00 00:00:00'),
(71, 2, 8, 45, 2, '2018-11-19 14:31:31'),
(72, 2, 5, 44, 2, '2018-11-20 15:49:36'),
(73, 2, 5, 44, 2, '2018-11-19 14:25:21'),
(74, 2, 5, 44, 0, '0000-00-00 00:00:00'),
(75, 5, 5, 44, 0, '0000-00-00 00:00:00'),
(76, 2, 5, 44, 0, '0000-00-00 00:00:00'),
(77, 1, 8, 44, 2, '2018-11-19 08:04:53'),
(78, 2, 8, 44, 2, '2018-11-19 15:41:12'),
(79, 1, 2, 44, 2, '2018-11-17 17:45:38'),
(80, 5, 8, 44, 0, '0000-00-00 00:00:00'),
(81, 1, 5, 44, 2, '2018-11-19 07:42:01'),
(82, 2, 5, 44, 0, '0000-00-00 00:00:00'),
(83, 2, 5, 44, 0, '0000-00-00 00:00:00'),
(84, 2, 2, 44, 2, '2018-11-19 15:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_order_details`
--

CREATE TABLE `tbl_rental_order_details` (
  `rent_order_details_id` int(3) NOT NULL,
  `rent_order_id` int(5) DEFAULT NULL,
  `bike_number` int(5) DEFAULT NULL,
  `rent_fare` int(5) DEFAULT NULL,
  `rent_total_fare` float(10,2) DEFAULT NULL,
  `rent_start` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rent_end` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rental_order_details`
--

INSERT INTO `tbl_rental_order_details` (`rent_order_details_id`, `rent_order_id`, `bike_number`, `rent_fare`, `rent_total_fare`, `rent_start`, `rent_end`) VALUES
(19, 1, 108, 50, 9.17, '2018-11-10 02:26:06', '2018-11-10 02:36:46'),
(20, 2, 106, 50, 0.00, '2018-11-10 02:39:44', '2018-11-10 02:40:05'),
(21, 3, 103, 50, 1781.67, '2018-11-10 02:45:08', '2018-11-11 14:23:03'),
(22, 5, 100, 50, 0.00, '2018-11-10 02:45:26', '2018-11-10 02:45:35'),
(23, 7, 109, 50, 1775.83, '2018-11-10 02:51:46', '2018-11-11 14:23:09'),
(24, 8, 113, 50, 42.50, '2018-11-11 12:00:39', '2018-11-11 12:51:40'),
(25, 9, 105, 50, 15.00, '2018-11-11 12:33:34', '2018-11-11 12:51:07'),
(26, 6, 107, 50, 50.00, '2018-11-11 12:39:51', '2018-11-11 13:39:46'),
(29, 10, 107, 50, 31.67, '2018-11-11 13:45:03', '2018-11-11 14:23:11'),
(31, 11, 100, 50, 0.83, '2018-11-11 14:28:58', '2018-11-11 14:30:09'),
(32, 12, 108, 50, 20.83, '2018-11-11 14:34:45', '2018-11-11 15:00:03'),
(33, 13, 100, 50, 4.17, '2018-11-11 15:03:40', '2018-11-11 15:08:47'),
(34, 14, 115, 50, 15.83, '2018-11-11 15:09:33', '2018-11-11 15:28:33'),
(35, 15, 119, 50, 500.00, '2018-11-11 20:46:45', '2018-11-11 20:46:45'),
(36, 17, 100, 50, 2.50, '2018-11-11 16:45:04', '2018-11-11 16:47:36'),
(37, 16, 127, 50, 618.33, '2018-11-11 16:50:24', '2018-11-12 05:12:05'),
(38, 18, 111, 50, 616.67, '2018-11-11 16:50:44', '2018-11-12 05:10:47'),
(39, 21, 100, 50, 0.83, '2018-11-12 05:22:50', '2018-11-12 05:24:03'),
(40, 22, 103, 50, 2.50, '2018-11-12 05:33:12', '2018-11-12 05:36:18'),
(41, 24, 109, 50, 0.00, '2018-11-13 12:36:21', '2018-11-13 12:36:48'),
(42, 26, 116, 50, 2338.33, '2018-11-15 14:02:27', '2018-11-17 12:48:18'),
(43, 23, 100, 50, 31.67, '2018-11-17 12:05:17', '2018-11-17 12:43:05'),
(45, 77, 103, 50, 1945.00, '2018-11-17 12:10:34', '2018-11-19 03:04:48'),
(47, 25, 109, 50, 1921.67, '2018-11-17 12:14:36', '2018-11-19 02:40:46'),
(48, 79, 120, 50, 24.17, '2018-11-17 12:16:08', '2018-11-17 12:45:32'),
(49, 81, 114, 50, 1915.00, '2018-11-17 12:23:35', '2018-11-19 02:42:01'),
(50, 34, 126, 50, 9.17, '2018-11-19 02:39:29', '2018-11-19 02:50:04'),
(51, 27, 110, 50, 5.83, '2018-11-19 02:57:38', '2018-11-19 03:04:26'),
(52, 39, 128, 50, 5.00, '2018-11-19 02:58:51', '2018-11-19 03:04:35'),
(53, 73, 109, 50, 6.67, '2018-11-19 09:17:31', '2018-11-19 09:25:16'),
(54, 71, 103, 50, 4.17, '2018-11-19 09:26:34', '2018-11-19 09:31:25'),
(55, 84, 107, 50, 33.33, '2018-11-19 09:35:52', '2018-11-19 10:16:15'),
(56, 78, 124, 50, 16.67, '2018-11-19 10:21:05', '2018-11-19 10:41:06'),
(57, 69, 103, 50, 19.17, '2018-11-19 10:21:58', '2018-11-19 10:45:21'),
(58, 72, 107, 50, 1190.83, '2018-11-19 11:00:56', '2018-11-20 10:49:31'),
(59, 31, 110, 50, 1092.50, '2018-11-20 10:46:35', '2018-11-21 08:37:59'),
(60, 35, 130, 50, 13.33, '2018-11-21 08:44:28', '2018-11-21 09:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent_cost`
--

CREATE TABLE `tbl_rent_cost` (
  `rent_cost_id` int(11) NOT NULL,
  `rent_cost` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_rent_cost`
--

INSERT INTO `tbl_rent_cost` (`rent_cost_id`, `rent_cost`) VALUES
(3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `full_name`, `email_address`, `phone_number`, `address`, `city`, `district`, `timestamp`) VALUES
(26, ' Rubel Mahmud', 'rm@gmail.com', '453454353534', 'Dhaka', 'Dhaka', 'Dhaka', '2018-10-17 07:40:25.576111'),
(27, 'Samir Khalid', 'sk@gmail.com', '2345676543', 'Panthapath, Dhanmondi', 'Dhaka', 'Dhaka', '2018-10-17 08:39:00.908623'),
(28, 'Rubel Mahmud', 'rm@gmail.com', '5454554', 'Dhaka', 'dhaka', 'Dhaka', '2018-10-17 08:47:46.124276'),
(29, 'Samir Khalid', 'sk@gmail.com', '2345676543', 'Dhanmondi', 'Dhaka', 'Dhaka', '2018-10-17 09:05:38.310602'),
(30, 'Samir Khalid', 'sk@gmail.com', '2345676543', 'Dhanmondi', 'Dhaka', 'Dhaka', '2018-10-18 07:18:31.130319'),
(31, 'Rubel Mahmud', 'rm@gmail.com', '5454554', 'Dhaka', 'dhaka', 'Dhaka', '2018-10-19 11:05:57.067745'),
(32, 'Rubel Mahmud', 'rm@gmail.com', '5454554', 'Dhaka', 'dhaka', 'Dhaka', '2018-10-24 17:50:05.891729'),
(34, 'Lyle Hanae', 'puxa@mailinator.net', '956', 'Molestiae est qui reprehenderit et fuga Consectetur et voluptas ullamco ut nihil dolor', 'Eligendi nisi quo tempore esse atque saepe cillum ', 'Unde nulla ad in non placeat cum atque eligendi am', '2018-11-15 19:47:35.635459'),
(35, 'Rubel Mahmud', 'rm@gmail.com', '5454554', 'Dhaka', 'dhaka', 'Dhaka', '2018-11-15 19:59:05.588620'),
(36, 'Cooper Grant', 'rubelmahmuud21@gmail.com', '454', 'Facere pariatur Minus rem expedita rerum labore', 'Obcaecati alias qui voluptatem dicta enim ducimus ', 'Sed officiis molestias quas nobis eos quas ducimus', '2018-11-17 16:27:20.965484'),
(37, 'Rubel Mahmud', 'rubelmahmuud21@gmail.com', '5454554', 'Dhaka', 'dhaka', 'Dhaka', '2018-11-17 18:05:17.717166'),
(38, 'Rubel Mahmud', 'rubelmahmuud21@gmail.com', '5454554', 'Dhaka', 'dhaka', 'Dhaka', '2018-11-20 14:59:49.024446'),
(39, 'Test Master', 'rm@gmail.com', '5646564', 'rtretrtett', 'Dhaka', 'Dhaka', '2018-11-21 12:17:19.438934'),
(40, 'Test Master', 'rm@gmail.com', '5646564', 'rtretrtett', 'Dhaka', 'Dhaka', '2018-11-21 12:45:29.060843');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `subscribe_id` int(5) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subscribe_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`subscribe_id`, `email`, `subscribe_time`) VALUES
(1, 'a@gmail.com', '2018-11-17 09:42:09'),
(2, 'matodudyj@mailinator.net', '2018-11-19 14:38:00'),
(3, 'vyzafylig@mailinator.com', '2018-11-19 14:38:06'),
(4, 'coxu@mailinator.com', '2018-11-19 14:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_cart`
--

CREATE TABLE `tbl_temp_cart` (
  `temp_cart_id` int(11) NOT NULL,
  `session_id` varchar(256) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(7) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_temp_cart`
--

INSERT INTO `tbl_temp_cart` (`temp_cart_id`, `session_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_image`) VALUES
(1, '', 4, 'Sony X-periz Z5', 38000.00, 1, '../assets/product_images/sony.jpg'),
(2, '', 1, 'T-shirt', 1600.00, 3, '../assets/product_images/indweex.jpg'),
(3, '', 1, 'T-shirt', 1600.00, 1, '../assets/product_images/indweex.jpg'),
(6, 'e0agdntg8capacclfv4uaas802', 4, 'Sony X-periz Z5', 38000.00, 1, '../assets/product_images/sony.jpg'),
(8, '487mssdlgletf7cf0m6lv5toi1', 2, 'Samsung Galaxy DUOS', 25000.00, 1, '../assets/product_images/PA080545.jpg'),
(9, '487mssdlgletf7cf0m6lv5toi1', 1, 'T-shirt', 1600.00, 1, '../assets/product_images/indweex.jpg'),
(11, '487mssdlgletf7cf0m6lv5toi1', 4, 'Sony X-periz Z5', 38000.00, 1, '../assets/product_images/sony.jpg'),
(13, 'g2qourvjeemt7ugsjbam8m6080', 1, 'T-shirt', 1600.00, 1, '../assets/product_images/indweex.jpg'),
(17, 'vct4nrv1vr8bm0do3p09o557df', 21, 'VELOCE LEGACY BICYCLE', 25500.00, 4, '../assets/product_images/veloce-legacy.jpg'),
(18, 'vct4nrv1vr8bm0do3p09o557df', 21, 'VELOCE LEGACY BICYCLE', 25500.00, 1, '../assets/product_images/veloce-legacy.jpg'),
(19, 'vct4nrv1vr8bm0do3p09o557df', 21, 'VELOCE LEGACY BICYCLE', 25500.00, 1, '../assets/product_images/veloce-legacy.jpg'),
(20, 'vct4nrv1vr8bm0do3p09o557df', 21, 'VELOCE LEGACY BICYCLE', 25500.00, 1, '../assets/product_images/veloce-legacy.jpg'),
(21, 'm35gg6m7gnh9pml7d6e9qji000', 18, 'SARACEN TUFFTRAX MENS BICYCLE', 20000.00, 4, '../assets/product_images/Saracen-Tufftrax-Mens (1).jpg'),
(22, '86deefobg00vhu7tbt8o227qi0', 17, 'PHOENIX 1800 BICYCLE', 18500.00, 1, '../assets/product_images/phoenix-1800.jpg'),
(26, 'vjcrqr2e1g07g0arcdgub2t5i6', 20, 'HERO ALPHA BICYCLE', 9000.00, 1, '../assets/product_images/hero-alpha.jpg'),
(27, 'bbsjdqpg8grm95jcj869q778of', 33, 'Rechargeable USB Light With Horn device', 450.00, 10, '../assets/product_images/15729472_1415640468448486_677110308703043584_n-500x500.jpg'),
(28, 've5hetjcpmfnek5itcc7hg18jq', 0, '', 0.00, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`) USING BTREE,
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`) USING BTREE;

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`) USING BTREE;

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`) USING BTREE,
  ADD UNIQUE KEY `national_id` (`national_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`) USING BTREE;

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`) USING BTREE;

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`) USING BTREE;

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`) USING BTREE,
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`) USING BTREE,
  ADD KEY `pro_fk1` (`branch_id`) USING BTREE;

--
-- Indexes for table `tbl_rental_bike`
--
ALTER TABLE `tbl_rental_bike`
  ADD PRIMARY KEY (`bike_id`),
  ADD UNIQUE KEY `bike_number` (`bike_number`);

--
-- Indexes for table `tbl_rental_order`
--
ALTER TABLE `tbl_rental_order`
  ADD PRIMARY KEY (`rent_order_id`);

--
-- Indexes for table `tbl_rental_order_details`
--
ALTER TABLE `tbl_rental_order_details`
  ADD PRIMARY KEY (`rent_order_details_id`),
  ADD UNIQUE KEY `rent_order_id` (`rent_order_id`);

--
-- Indexes for table `tbl_rent_cost`
--
ALTER TABLE `tbl_rent_cost`
  ADD PRIMARY KEY (`rent_cost_id`) USING BTREE;

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`) USING BTREE;

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  ADD PRIMARY KEY (`temp_cart_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `sms_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `enquiry_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `manufacturer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_rental_bike`
--
ALTER TABLE `tbl_rental_bike`
  MODIFY `bike_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_rental_order`
--
ALTER TABLE `tbl_rental_order`
  MODIFY `rent_order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_rental_order_details`
--
ALTER TABLE `tbl_rental_order_details`
  MODIFY `rent_order_details_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_rent_cost`
--
ALTER TABLE `tbl_rent_cost`
  MODIFY `rent_cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `subscribe_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  MODIFY `temp_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
