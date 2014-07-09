-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2014 at 10:44 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contactdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `AddressID` int(11) NOT NULL AUTO_INCREMENT,
  `Address` varchar(1000) DEFAULT NULL,
  `Country` varchar(300) DEFAULT NULL,
  `State` varchar(300) DEFAULT NULL,
  `City` varchar(300) DEFAULT NULL,
  `ZipCode` int(11) DEFAULT NULL,
  PRIMARY KEY (`AddressID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`AddressID`, `Address`, `Country`, `State`, `City`, `ZipCode`) VALUES
(3, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(8, 'Member1 Address', 'Pakistan', 'Sindh', 'Karachi', 744000),
(9, 'Add1', 'Pakistan', 'Sindh', 'Karachi', 74000),
(10, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(11, 'Add1', 'Pakistan', 'Sindh', 'Karachi', 74000),
(12, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(13, 'Add1', 'Pakistan', 'Sindh', 'Karachi', 74000),
(14, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(43, 'TC Branch 1 Add', 'Pakistan', 'Sindh', 'Karachi', 744000),
(44, 'TC Branch 2 Add', 'Pakistan', 'Sindh', 'Karachi', 744000),
(45, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(46, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(47, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(48, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(49, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(58, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(59, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(60, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(61, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(62, 'qwery 1', 'Pakistan', 'Sindh', 'Karachi', 74000),
(63, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(64, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(65, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(67, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(68, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(69, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(70, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(71, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(72, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(73, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(74, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(75, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(76, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(78, 'hjh', 'Pakistan', '', '', 0),
(79, '', '', '', '', 0),
(80, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000),
(81, NULL, NULL, NULL, NULL, NULL),
(82, NULL, NULL, NULL, NULL, NULL),
(83, 'qwery', 'Pakistan', 'Sindh', 'Karachi', 74000);

-- --------------------------------------------------------

--
-- Table structure for table `branchdetails`
--

CREATE TABLE IF NOT EXISTS `branchdetails` (
  `BranchDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `BranchID` int(11) NOT NULL,
  `ContactInfoID` int(11) NOT NULL,
  PRIMARY KEY (`BranchDetailID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `branchdetails`
--

INSERT INTO `branchdetails` (`BranchDetailID`, `BranchID`, `ContactInfoID`) VALUES
(11, 7, 13),
(12, 7, 14),
(13, 9, 17),
(14, 9, 18),
(15, 10, 19),
(16, 10, 20),
(17, 11, 21),
(18, 11, 22),
(19, 12, 23),
(20, 12, 24),
(101, 44, 105),
(102, 44, 106),
(103, 44, 107),
(104, 45, 108),
(105, 46, 109),
(106, 46, 110),
(127, 56, 131),
(128, 56, 132),
(129, 56, 133),
(130, 56, 134),
(131, 57, 135),
(132, 57, 136),
(133, 58, 209),
(134, 59, 210),
(135, 60, 211),
(137, 62, 213),
(138, 63, 214),
(139, 64, 217),
(140, 65, 222),
(142, 65, 225),
(143, 65, 226);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `BranchID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `BranchName` varchar(500) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `IsHeadOffice` tinyint(1) NOT NULL,
  PRIMARY KEY (`BranchID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchID`, `CompanyID`, `BranchName`, `AddressID`, `IsHeadOffice`) VALUES
(7, 5, 'Branch 1', 9, 1),
(8, 5, 'Branch 2', 10, 0),
(9, 0, 'Branch 1', 11, 1),
(10, 0, 'Branch 2', 12, 0),
(11, 0, 'Branch 1', 13, 0),
(12, 0, 'Branch 2', 14, 1),
(41, 4, 'TC Branch 1', 43, 1),
(42, 4, 'TC Branch 2', 44, 0),
(43, 6, 'Branch 1', 45, 1),
(44, 6, 'Branch 2', 46, 0),
(45, 7, 'Branch 1 1', 47, 1),
(46, 8, 'Branch 1', 48, 1),
(47, 9, 'Branch 1', 49, 1),
(56, 11, 'Branch 1', 58, 0),
(57, 11, 'Branch 2', 59, 1),
(58, 0, 'Branch 1', 63, 1),
(59, 0, 'Branch 1 1', 64, 1),
(60, 0, 'TC Branch 1', 65, 1),
(62, 13, 'Branch 1', 67, 1),
(63, 14, 'Branch 1', 68, 1),
(64, 15, 'Branch 1', 71, 1),
(65, 16, 'Branch 1', 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(500) NOT NULL,
  `IndustoryCategory` int(11) NOT NULL,
  `IndustorySubCategory` int(11) NOT NULL,
  `Category` int(11) DEFAULT NULL,
  `Website` varchar(300) NOT NULL,
  `Remarks` varchar(1000) NOT NULL,
  `insertedBy` varchar(30) NOT NULL,
  `isVerified` int(1) NOT NULL DEFAULT '0',
  `verifiedBy` varchar(30) DEFAULT NULL,
  `insertedAt` datetime NOT NULL,
  `verifiedAt` datetime DEFAULT NULL,
  `Scope` int(1) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`CompanyID`, `CompanyName`, `IndustoryCategory`, `IndustorySubCategory`, `Category`, `Website`, `Remarks`, `insertedBy`, `isVerified`, `verifiedBy`, `insertedAt`, `verifiedAt`, `Scope`) VALUES
(1, '', 0, 0, 0, '', '', '0', 1, 'super', '0000-00-00 00:00:00', '2014-07-01 21:18:56', 1),
(4, 'Testing Company', 1, 1, NULL, 'website.com', 'qwerty', '0', 0, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'qwer', 36, 64, NULL, 'company.com', 'qwerty', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'Test1', 1, 1, NULL, 'company.com', 'asdfgh', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'asdfasdf', 1, 1, NULL, 'company.com', 'asj', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'asdfasdf', 1, 1, NULL, 'company.com', 'qweryt', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'asdfasdf', 1, 1, NULL, 'company.com', 'qwerty', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, '', 1, 1, 0, '', '', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(11, 'qwerty', 1, 1, NULL, 'company.com', '', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'q', 2, 2, 1, 'website.com', 'qwerty', '1', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(13, 'q', 2, 1, 1, 'company.com', 'qer', '1', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 'qwer', 1, 1, 2, 'company.com', 'qwerty', '1', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, 'q', 1, 1, 2, 'company.com', 'qwerty', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(16, 'q', 1, 1, 1, 'company.com', 'qwerty', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(17, 'Wahab', 1, 16, 1, '', '', 'super', 1, 'super', '2014-07-01 21:23:55', '2014-07-01 21:39:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contactinfos`
--

CREATE TABLE IF NOT EXISTS `contactinfos` (
  `ContactInfoID` int(11) NOT NULL AUTO_INCREMENT,
  `ContactTypeID` int(11) NOT NULL,
  `Value` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ContactInfoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=227 ;

--
-- Dumping data for table `contactinfos`
--

INSERT INTO `contactinfos` (`ContactInfoID`, `ContactTypeID`, `Value`) VALUES
(5, 1, 'qweryty@qwer.com'),
(6, 2, '123465'),
(13, 1, 'branch2@tc.com'),
(14, 2, '45679813'),
(15, 1, 'Member1@tc.com'),
(16, 2, '987654321'),
(17, 2, '12346579'),
(18, 1, 'qwerrqw@qe.com'),
(19, 1, 'qwert@qwe.com'),
(20, 2, '1345678'),
(21, 2, '12346579'),
(22, 1, 'qwerrqw@qe.com'),
(23, 1, 'qwert@qwe.com'),
(24, 2, '1345678'),
(105, 1, 'testing@tc.com'),
(106, 2, '123456789'),
(107, 4, '123465798'),
(108, 1, 'qwerewr@qwer.com'),
(109, 1, 'qwert@qwe.com'),
(110, 2, '2342435234'),
(111, 1, 'qwerewr@qwer.com'),
(112, 2, '789456123'),
(131, 1, 'qwerewr@qwer.com'),
(132, 2, '123465'),
(133, 1, 'qwerewr@qwer.com'),
(134, 4, '123465'),
(135, 2, '123465'),
(136, 4, '87894563'),
(137, 1, 'qweryty@qwer.com'),
(138, 2, '123465'),
(139, 1, 'qweryty@qwer.com'),
(140, 2, '123465'),
(204, 1, 'qweryty@qwer.com'),
(205, 2, '123465'),
(206, 3, 'qweryty@qwer.com'),
(207, 4, '789465'),
(208, 5, 'qweryty@qwer.com'),
(209, 1, 'qwerewr@qwer.com'),
(210, 1, 'qwerewr@qwer.com'),
(211, 1, 'qwerewr@qwer.com'),
(213, 1, 'qwerewr@qwer.com'),
(214, 1, 'qwerewr@qwer.com'),
(215, 1, 'qweryty@qwer.com'),
(216, 1, 'qweryty@qwer.com'),
(217, 1, 'qwerewr@qwer.com'),
(218, 1, 'qweryty@qwer.com'),
(219, 1, 'qweryty@qwer.com'),
(220, 1, 'qweryty@qwer.com'),
(221, 1, 'qweryty@qwer.com'),
(222, 1, 'qwerewr@qwer.com'),
(224, 1, ''),
(225, 1, ''),
(226, 1, 'qwerewr@qwer.com');

-- --------------------------------------------------------

--
-- Table structure for table `contacttypes`
--

CREATE TABLE IF NOT EXISTS `contacttypes` (
  `ContactTypeID` int(11) NOT NULL,
  `ContactTypeName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacttypes`
--

INSERT INTO `contacttypes` (`ContactTypeID`, `ContactTypeName`) VALUES
(1, 'Email'),
(2, 'Phone'),
(3, 'Office Phone'),
(4, 'Cell Phone'),
(5, 'Fax');

-- --------------------------------------------------------

--
-- Table structure for table `industorycategories`
--

CREATE TABLE IF NOT EXISTS `industorycategories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(300) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industorycategories`
--

INSERT INTO `industorycategories` (`CategoryID`, `CategoryName`) VALUES
(1, 'FMCG'),
(2, 'Services'),
(3, 'Research'),
(4, 'Insurance'),
(5, 'Financial Services'),
(6, 'Banking'),
(7, 'Pharmaceuticals'),
(8, 'Energy'),
(9, 'Telecommunication'),
(10, 'Manufacturing'),
(11, 'Marketing Services'),
(12, 'Electronics'),
(13, 'Logistics'),
(14, 'Media'),
(15, 'Group'),
(16, 'Chemical'),
(17, 'Consultancy'),
(18, 'Automobile'),
(19, 'Textiles'),
(20, 'Trading Company'),
(21, 'Tobacco'),
(22, 'Engineering consultants'),
(23, 'Social Sector'),
(24, 'Govt'),
(25, 'Aviation Industry'),
(26, 'Education'),
(27, 'Construction'),
(28, 'Hotels and Resorts'),
(29, 'Real Estate'),
(30, 'Aumtomotive'),
(31, 'Health Care'),
(32, 'Technology'),
(33, 'N/A'),
(34, 'Oil &amp; Gas'),
(35, 'Trade'),
(36, 'Agribusiness'),
(37, 'Automotive Parts'),
(38, 'Manufacturing and Sales'),
(39, 'Sales and Marketing'),
(40, 'Manufacturing and Processing'),
(41, 'Printing and Packaging '),
(42, 'Confectionery'),
(43, 'Communication and Public Relations'),
(44, 'Other'),
(45, 'House Financing '),
(47, 'Auditing');

-- --------------------------------------------------------

--
-- Table structure for table `industorysubcategories`
--

CREATE TABLE IF NOT EXISTS `industorysubcategories` (
  `SubCategoryID` int(11) NOT NULL,
  `SubCategoryName` varchar(300) NOT NULL,
  PRIMARY KEY (`SubCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industorysubcategories`
--

INSERT INTO `industorysubcategories` (`SubCategoryID`, `SubCategoryName`) VALUES
(1, 'Distribution'),
(2, 'Life and Non- Life Insurance'),
(3, 'Investments'),
(4, 'Banks'),
(5, 'Health Care'),
(6, 'Financial Products'),
(7, 'Oil &amp; Gas'),
(8, 'Mobile communication'),
(9, 'Beverages'),
(10, 'Consumer Care'),
(11, 'Steel Pipe Manufacturing'),
(12, 'Food and Retails Franchising'),
(13, 'Production and Marketing'),
(14, 'Engineering services'),
(15, 'Supply Chain'),
(16, 'Manufacturing'),
(17, 'Print and Online'),
(18, 'Various'),
(19, 'Production'),
(20, 'Online'),
(21, 'Food and Retails'),
(22, 'Human Resource Consultancy'),
(23, 'Exports'),
(24, 'Personal Care'),
(25, 'Power Generation &amp; Distribution'),
(26, 'Trading'),
(27, 'Rice Processing'),
(28, 'Life Style'),
(29, 'Marketing and Distribution'),
(30, 'Education'),
(31, 'Consultancy'),
(32, 'Retail'),
(33, 'Plastic'),
(34, 'Water Treatment'),
(35, 'Public Sector'),
(36, 'Travelling'),
(37, 'I.T'),
(38, 'Education Board'),
(39, 'Building Services'),
(40, 'Assest Management'),
(41, 'Hotels'),
(42, 'Confectionery'),
(43, 'Shipping'),
(44, 'Steel Products'),
(45, 'Material'),
(46, 'Storage'),
(47, 'Higher Education'),
(48, 'Food and retail'),
(49, 'Power'),
(50, 'I.T Products'),
(51, 'Parts'),
(52, 'Public'),
(53, 'Builders'),
(54, 'Networking'),
(55, 'Agriculture'),
(56, 'Business Education'),
(57, 'Suppliers'),
(58, 'Pharmaceuticals'),
(59, 'Services'),
(60, 'Training and Development'),
(61, 'Renewable Energy'),
(62, 'Housing'),
(63, 'Islamic Investments'),
(64, 'Accounting'),
(65, 'N/A'),
(66, 'Leasing'),
(67, 'Food and Beverage'),
(68, 'Cement'),
(69, 'Safety Products'),
(70, 'Chemical'),
(71, 'Financial Depository'),
(72, 'Software'),
(73, 'Specialized'),
(74, 'Advertisment '),
(75, 'Microfinance'),
(76, 'Development Finance'),
(77, 'Other'),
(78, 'Auditing ');

-- --------------------------------------------------------

--
-- Table structure for table `memberdetails`
--

CREATE TABLE IF NOT EXISTS `memberdetails` (
  `MemberDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) NOT NULL,
  `ContactInfoID` int(11) NOT NULL,
  PRIMARY KEY (`MemberDetailID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `memberdetails`
--

INSERT INTO `memberdetails` (`MemberDetailID`, `MemberID`, `ContactInfoID`) VALUES
(1, 3, 5),
(2, 3, 6),
(3, 8, 15),
(4, 8, 16),
(5, 60, 137),
(6, 60, 138),
(7, 4, 139),
(8, 4, 140),
(120, 5, 204),
(121, 5, 205),
(122, 5, 206),
(123, 5, 207),
(124, 5, 208),
(125, 6, 215),
(126, 7, 216),
(127, 8, 218),
(128, 9, 219),
(129, 10, 220),
(130, 11, 221),
(131, 12, 224);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(300) DEFAULT NULL,
  `FirstName` varchar(300) DEFAULT NULL,
  `MiddleName` varchar(300) DEFAULT NULL,
  `LastName` varchar(300) DEFAULT NULL,
  `AddressID` int(11) DEFAULT NULL,
  `Remarks` varchar(1000) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Department` varchar(500) DEFAULT NULL,
  `Designation` varchar(500) DEFAULT NULL,
  `insertedBy` varchar(30) NOT NULL,
  `isVerified` int(1) NOT NULL DEFAULT '0',
  `verifiedBy` varchar(30) DEFAULT NULL,
  `insertedAt` datetime NOT NULL,
  `verifiedAt` datetime DEFAULT NULL,
  `Scope` int(1) NOT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `Title`, `FirstName`, `MiddleName`, `LastName`, `AddressID`, `Remarks`, `CompanyID`, `Department`, `Designation`, `insertedBy`, `isVerified`, `verifiedBy`, `insertedAt`, `verifiedAt`, `Scope`) VALUES
(1, 'Mr', 'First', 'Middle', 'Last', 3, 'qwerty', 1, 'HR Department', 'HR Manager', '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Mr', 'Member1 First Name', 'Member1 Middle Name', 'Member1 Last Name', 8, 'Testing Remarks', 4, 'Finance Department', 'Finance Manager', '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Mr', 'First', 'Middle', 'Last', 60, '', 1, 'HR Department', 'HR Manager', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Mr', 'First', 'Middle', 'Last', 61, '', 11, 'HR Department', 'HR Manager', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Miss', 'First 1', 'Middle 1', 'Last 1', 62, 'qwt 2', 4, 'Finance Department', 'Finance Manager', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'Mr', 'First', 'Middle', 'Last', 69, 'qwerty', 1, 'Finance Department', 'Finance Manager', '1', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'Mr', 'First', 'Middle', 'Last', 70, 'qwerty', 1, 'Finance Department', 'Finance Manager', '1', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'Mr', 'First', 'Middle', 'Last', 72, '', 1, 'Finance Department', 'HR Manager', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'Mr', 'First', 'Middle', 'Last', 73, '', 1, 'Finance Department', 'Finance Manager', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'Mr', 'First', 'Middle', 'Last', 74, '', 1, 'Finance Department', 'Finance Manager', '2', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'Mr', 'First', 'Middle', 'Last', 75, 'qwru', 4, 'Finance Department', 'Finance Manager', '2', 1, '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'Mr', 'fsd', 'jhjh', 'hjhj', 78, '', 1, '', '', 'super', 0, NULL, '2014-07-01 21:24:51', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `type` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `first_name`, `last_name`, `type`, `email`) VALUES
(1, 'sub', 'binary', 'Rayyan', 'Taqdees', 1, 'rayyan.182@gmail.com'),
(2, 'super', 'binary', 'Rayyan', 'Taqdees', 3, 'wahabjawed@gmail.com'),
(3, 'admin', 'binary', 'Rayyan', 'Taqdees', 2, 'wahabjawed@gmail.com'),
(5, 'subadmin', 'binary', 'Sub', 'Sub', 2, 'wahabjawed@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `userTypeID` int(5) NOT NULL AUTO_INCREMENT,
  `designation` varchar(20) NOT NULL,
  `canVerify` int(1) NOT NULL,
  `canInsert` int(1) NOT NULL,
  `canUpdate` int(1) NOT NULL,
  `canDelete` int(1) NOT NULL,
  `canManage` int(1) NOT NULL,
  PRIMARY KEY (`userTypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`userTypeID`, `designation`, `canVerify`, `canInsert`, `canUpdate`, `canDelete`, `canManage`) VALUES
(2, 'Admin', 1, 1, 1, 0, 0),
(1, 'User', 0, 1, 0, 0, 0),
(3, 'Super Admin', 1, 1, 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
