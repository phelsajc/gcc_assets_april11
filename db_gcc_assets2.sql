-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 10:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gcc_assets2`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(255) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`employee_id` int(10) NOT NULL,
  `employee_fname` varchar(50) DEFAULT NULL,
  `employee_mname` varchar(50) DEFAULT NULL,
  `employee_lname` varchar(50) DEFAULT NULL,
  `employee_age` varchar(50) DEFAULT NULL,
  `employee_dob` varchar(20) DEFAULT NULL,
  `employee_gender` varchar(50) DEFAULT NULL,
  `employee_id_number` varchar(20) DEFAULT NULL,
  `employee_position` varchar(50) DEFAULT NULL,
  `employee_house_num` varchar(50) DEFAULT NULL,
  `employee_street` varchar(50) DEFAULT NULL,
  `employee_subd` varchar(50) DEFAULT NULL,
  `employee_block` varchar(50) DEFAULT NULL,
  `employee_lot_num` varchar(20) DEFAULT NULL,
  `employee_brgy` varchar(20) DEFAULT NULL,
  `employee_country` varchar(20) DEFAULT NULL,
  `employee_postal` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `employee_access_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_mname`, `employee_lname`, `employee_age`, `employee_dob`, `employee_gender`, `employee_id_number`, `employee_position`, `employee_house_num`, `employee_street`, `employee_subd`, `employee_block`, `employee_lot_num`, `employee_brgy`, `employee_country`, `employee_postal`, `username`, `password`, `employee_access_level`) VALUES
(2, 'roben', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'nika', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'shilea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'rene', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'mm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'riza', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'brando', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'cmd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'gyd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'jc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'mm', '', '', '', 'Fri Apr 03 2015 00:0', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(255) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_serial` varchar(100) DEFAULT NULL,
  `item_model` varchar(100) DEFAULT NULL,
  `item_qty` varchar(20) DEFAULT NULL,
  `item_dop` varchar(20) DEFAULT NULL,
  `employee_id` int(255) NOT NULL,
  `company_id` int(255) NOT NULL,
  `item_remarks` varchar(50) DEFAULT NULL,
  `item_description` varchar(50) DEFAULT NULL,
  `item_Image` blob NOT NULL,
  `item_accountability` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`), ADD KEY `employee_id` (`employee_id`), ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `company_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
