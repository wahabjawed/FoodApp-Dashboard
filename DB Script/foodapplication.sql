-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2014 at 04:08 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `center_coordinates`
--

CREATE TABLE IF NOT EXISTS `center_coordinates` (
  `coordinates_id` int(10) NOT NULL,
  `long` float NOT NULL,
  `lat` float NOT NULL,
  `radius` float NOT NULL,
  `location_id` int(10) NOT NULL,
  `map_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(3) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`) VALUES
(1, 'Pakistan', '74000'),
(2, 'Pakistan', '74000');

-- --------------------------------------------------------

--
-- Table structure for table `currency_code`
--

CREATE TABLE IF NOT EXISTS `currency_code` (
  `currencycode_id` int(3) NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(10) NOT NULL,
  PRIMARY KEY (`currencycode_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `currency_code`
--

INSERT INTO `currency_code` (`currencycode_id`, `currency_code`) VALUES
(1, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_fname` varchar(30) NOT NULL,
  `customer_lname` varchar(30) NOT NULL,
  `customer_address` varchar(40) NOT NULL,
  `customer_city` varchar(20) NOT NULL,
  `customer_stateid` varchar(10) NOT NULL,
  `customer_zip` varchar(10) NOT NULL,
  `customer_countryid` varchar(10) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_phone` varchar(30) NOT NULL,
  `customer_cell` varchar(30) NOT NULL,
  `customer_major` varchar(30) NOT NULL,
  `customer_gradclass` varchar(30) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_locationid` int(10) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_city`, `customer_stateid`, `customer_zip`, `customer_countryid`, `customer_email`, `customer_phone`, `customer_cell`, `customer_major`, `customer_gradclass`, `customer_password`, `customer_locationid`) VALUES
(1, 'Wahab', 'Jawed', 'Namakwara', 'Karachi', '1', '74000', '1', 'wahabjawed@gmail.com', '021-2776548', '03327785412', 'CS', 'A', 'infinity', 1);

-- --------------------------------------------------------

--
-- Table structure for table `edu`
--

CREATE TABLE IF NOT EXISTS `edu` (
  `edu_id` int(5) NOT NULL AUTO_INCREMENT,
  `edu_name` varchar(30) NOT NULL,
  `display` varchar(30) NOT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `edu`
--

INSERT INTO `edu` (`edu_id`, `edu_name`, `display`) VALUES
(1, 'iba.edu.pk', 'picture'),
(2, 'iba.edu.pk', 'display pic');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_fname` varchar(15) NOT NULL,
  `employee_lname` varchar(15) NOT NULL,
  `employee_address` varchar(30) NOT NULL,
  `employee_city` varchar(20) NOT NULL,
  `employee_stateid` varchar(10) NOT NULL,
  `employee_zip` varchar(10) NOT NULL,
  `employee_countryid` varchar(10) NOT NULL,
  `employeeimage_id` varchar(100) NOT NULL,
  `employee_available` int(1) NOT NULL,
  `coordinates_id` varchar(40) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_lname`, `employee_address`, `employee_city`, `employee_stateid`, `employee_zip`, `employee_countryid`, `employeeimage_id`, `employee_available`, `coordinates_id`) VALUES
(1, 'Wahab', 'Jawed', 'garden', 'karachi', '1', '84848', '1', 'djfsdjf.jpg', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(30) NOT NULL,
  `display` varchar(30) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `display`) VALUES
(1, 'Islamabad', 'pic');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_date` date NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_name` varchar(20) NOT NULL,
  `order_status` int(1) NOT NULL,
  `vendor_id` int(5) NOT NULL,
  `receipt_id` varchar(10) NOT NULL,
  `payment_id` varchar(10) NOT NULL,
  `deleivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `employee_id` int(5) NOT NULL,
  PRIMARY KEY (`order_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE IF NOT EXISTS `order_line` (
  `linenum` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `saleprice` float NOT NULL,
  `qty` int(5) NOT NULL,
  `lineamount` float NOT NULL,
  `delivery_address` varchar(30) NOT NULL,
  `delivery_city` varchar(20) NOT NULL,
  `delivery_stateid` varchar(10) NOT NULL,
  `delivery_zip` int(10) NOT NULL,
  `delivery_countryid` varchar(10) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `delivery_status` int(1) NOT NULL,
  `linestatus` int(1) NOT NULL,
  `vendor_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `product_type` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `display` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `vendor_id`, `display`) VALUES
(1, 'burger', 'water', 150, 1, 'pic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(3) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(30) NOT NULL,
  `state_salestax` varchar(30) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_salestax`) VALUES
(1, 'Karachi', '75');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(3) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Oen');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `type_id`) VALUES
(1, 'wahab', 'Wahab', 'wahabjawed@gmail.com', 'torpedo1', 1),
(2, 'zain', 'Zain', 'zain@gmail.com', 'memon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(5) NOT NULL AUTO_INCREMENT,
  `vendorstore_no` int(10) NOT NULL,
  `vendor_name` varchar(30) NOT NULL,
  `vendor_address` varchar(30) NOT NULL,
  `vendor_city` varchar(30) NOT NULL,
  `vendor_stateid` varchar(10) NOT NULL,
  `vendor_zip` varchar(10) NOT NULL,
  `vendor_countryid` varchar(10) NOT NULL,
  `vendor_imageid` varchar(30) NOT NULL,
  `coordinates_id` int(10) NOT NULL,
  `display` varchar(30) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendorstore_no`, `vendor_name`, `vendor_address`, `vendor_city`, `vendor_stateid`, `vendor_zip`, `vendor_countryid`, `vendor_imageid`, `coordinates_id`, `display`) VALUES
(1, 123, 'Arco', 'gul plaza', 'karachi', '1', '25477', '1', 'soos.png', 1, 'dcdcdc.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
