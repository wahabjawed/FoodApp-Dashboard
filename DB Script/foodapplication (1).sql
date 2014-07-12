-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2014 at 08:11 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.3.17

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
  `country_id` int(10) NOT NULL,
  `country_name` varchar(30) NOT NULL,
  `country_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`) VALUES
(1, 'United States', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `currency_code`
--

CREATE TABLE IF NOT EXISTS `currency_code` (
  `currencycode_id` int(10) NOT NULL,
  `currency_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `customer_id` int(10) NOT NULL,
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
  `location_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_city`, `customer_stateid`, `customer_zip`, `customer_countryid`, `customer_email`, `customer_phone`, `customer_cell`, `customer_major`, `customer_gradclass`, `customer_password`, `location_id`) VALUES
(1, 'Chuck', 'Dudley', '3730 Madison Ave', 'Bridgeport', 'CT', '06606', 'USA', 'chuckdudley@yahoo.com', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `edu`
--

CREATE TABLE IF NOT EXISTS `edu` (
  `edu_id` int(11) NOT NULL,
  `edu_name` varchar(30) NOT NULL,
  `display` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(5) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_lname`, `employee_address`, `employee_city`, `employee_stateid`, `employee_zip`, `employee_countryid`, `employeeimage_id`, `employee_available`, `coordinates_id`) VALUES
(1, 'Jim', 'Smith', '5151 Park Ave', 'Fairfield', 'CT', '6640', 'USA', '//imageserver/Images/Employees/EmployeeID1.jpg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(30) NOT NULL,
  `display` varchar(30) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `display`) VALUES
(1, 'Sacred Heart University', ''),
(2, 'McDonald''s', ''),
(3, 'Marshalls', ''),
(4, 'Big Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_name` varchar(20) NOT NULL,
  `order_status` int(1) NOT NULL,
  `vendor_id` int(5) NOT NULL,
  `receipt_id` varchar(10) NOT NULL,
  `payment_id` varchar(10) NOT NULL,
  `deleivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `employee_id` int(5) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `order_time`, `order_name`, `order_status`, `vendor_id`, `receipt_id`, `payment_id`, `deleivery_time`, `employee_id`) VALUES
(1, 1, '2014-07-11', '2014-07-11 19:42:00', 'DUDLEYMCDONALDS', 2, 2, 'abc12345', 'xyz12345', '2014-07-12 15:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE IF NOT EXISTS `order_line` (
  `linenum` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `saleprice` varchar(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `lineamount` varchar(10) NOT NULL,
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

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`linenum`, `order_id`, `product_id`, `saleprice`, `qty`, `lineamount`, `delivery_address`, `delivery_city`, `delivery_stateid`, `delivery_zip`, `delivery_countryid`, `currency_code`, `delivery_status`, `linestatus`, `vendor_id`) VALUES
(1, 1, 1, '$10.00', 2, '$20.00', '3730 Madison Ave', 'Bridgeport', 'CT', 6606, 'USA', 'USD', 2, 2, 1),
(2, 1, 2, '$3.00', 1, '$6.00', '3730 Madison Ave', 'Bridgeport', 'CT', 6606, 'USA', 'USD', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_type` varchar(30) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `display` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `product_price`, `vendor_id`, `display`) VALUES
(1, 'Delivery Service', 'Delivery', '$10.00', 1, ''),
(2, 'Fast Food Restraunts', 'Food', '0', 2, ''),
(3, 'Clothes', 'Clothes', '', 3, ''),
(4, 'Grocery Stores', 'Groceries', '', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(10) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `state_salestax` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_salestax`) VALUES
(1, 'CONNECTICUT', 'CT');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(0, 'OPEN'),
(1, 'IN PROGRES'),
(2, 'DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(10) NOT NULL,
  `vendorstore_no` int(10) NOT NULL,
  `vendor_name` varchar(30) NOT NULL,
  `vendor_address` varchar(30) NOT NULL,
  `vendor_city` varchar(30) NOT NULL,
  `vendor_stateid` varchar(10) NOT NULL,
  `vendor_zip` varchar(10) NOT NULL,
  `vendor_countryid` varchar(10) NOT NULL,
  `vendor_imageid` varchar(60) NOT NULL,
  `coordinates_id` int(10) NOT NULL,
  `display` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendorstore_no`, `vendor_name`, `vendor_address`, `vendor_city`, `vendor_stateid`, `vendor_zip`, `vendor_countryid`, `vendor_imageid`, `coordinates_id`, `display`) VALUES
(1, 0, 'Fulfilment INC.', '5151 Post Road', 'Fairfield', 'CT', '06430', 'USA', '//imageserver/Images/Vendors/FULFILLSmall.jpg', 1, ''),
(2, 1032, 'McDonalds', '536 POST RD', 'Fairfield', 'CT', '06430', 'USA', '//imageserver/Images/Vendors/MCDSmall.jpg', 2, ''),
(3, 5555, 'Marshalls', '700 Post Rd', 'Fairfield', 'CT', '06430', 'USA', '//imageserver/Images/Vendors/MARSHSmall.jpg', 3, ''),
(4, 1234, 'Big Y', '355 Hawley Ln Stratford', 'Fairfield', 'CT', '06614', 'USA', '//imageserver/Images/Vendors/BIGYSmall.jpg', 4, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
