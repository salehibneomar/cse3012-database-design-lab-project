-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 09:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cid` int(11) NOT NULL,
  `problem` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `status` int(3) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `hid` varchar(10) NOT NULL,
  `oid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`cid`, `problem`, `date`, `status`, `tid`, `hid`, `oid`) VALUES
(2, 'Window lock problem', '2019-08-04', 0, '191122331', '1234', '112233'),
(3, 'Gas stove problem', '2019-08-04', 1, '191122332', '1234', '112233'),
(4, 'Water tap problem', '2019-08-04', 0, '192233443', '5678', '223344');

-- --------------------------------------------------------

--
-- Stand-in structure for view `complain_with_details`
-- (See below for the actual view)
--
CREATE TABLE `complain_with_details` (
`House ID` varchar(10)
,`Problem` varchar(60)
,`Complaint` varchar(25)
,`Phone` varchar(15)
,`Date` date
,`Status` int(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `TxID` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount` double(15,3) NOT NULL,
  `paid_by` varchar(25) NOT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `hid` varchar(10) NOT NULL,
  `oid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`TxID`, `title`, `date`, `amount`, `paid_by`, `sid`, `hid`, `oid`) VALUES
(2, 'Water Bill', '2019-01-10', 5000.000, 'Akram', '', '1234', '112233'),
(3, 'Water Bill', '2019-02-08', 5500.000, 'Liam', NULL, '1234', '112233'),
(4, 'Water Bill', '2019-03-12', 6500.000, 'Mr.XYZ', NULL, '1234', '112233'),
(5, 'Water Bill', '2019-04-10', 6700.000, 'Sian', NULL, '1234', '112233'),
(6, 'Water Bill', '2019-05-08', 5500.000, 'Liam', NULL, '1234', '112233'),
(7, 'Water Bill', '2019-06-11', 5200.000, 'Harry', NULL, '1234', '112233'),
(8, 'Water Bill', '2019-07-12', 4500.000, 'Zavia', NULL, '1234', '112233'),
(9, 'Gas Bill', '2019-02-10', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(10, 'Gas Bill', '2019-03-10', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(11, 'Gas Bill', '2019-04-08', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(12, 'Gas Bill', '2019-05-05', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(13, 'Gas Bill', '2019-06-10', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(14, 'Gas Bill', '2019-07-12', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(15, 'Gas Bill', '2019-01-05', 4000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(16, 'Electricity Bill', '2019-01-10', 3000.000, 'Mr.XYZ', NULL, '1234', '112233'),
(17, 'Electricity Bill', '2019-02-08', 2500.000, 'Mr.XYZ', NULL, '1234', '112233'),
(18, 'Electricity Bill', '2019-03-05', 2800.000, 'Mr.XYZ', NULL, '1234', '112233'),
(19, 'Electricity Bill', '2019-04-10', 2100.000, 'Mr.XYZ', NULL, '1234', '112233'),
(20, 'Electricity Bill', '2019-05-12', 3800.000, 'Mr.XYZ', NULL, '1234', '112233'),
(21, 'Electricity Bill', '2019-06-05', 1500.000, 'Mr.XYZ', NULL, '1234', '112233'),
(22, 'Electricity Bill', '2019-07-05', 4200.000, 'Mr.XYZ', NULL, '1234', '112233'),
(23, 'Maintance and Repair', '2019-03-22', 500.000, 'Mr.XYZ', NULL, '1234', '112233'),
(24, 'Maintance and Repair', '2019-03-22', 1200.000, 'Mr.XYZ', NULL, '1234', '112233'),
(26, 'Staff Fee', '2019-02-10', 8000.000, 'Mr.XYZ', '111223319', '1234', '112233'),
(27, 'Staff Fee', '2019-03-08', 8000.000, 'Mr.XYZ', '111223319', '1234', '112233'),
(28, 'Staff Fee', '2019-04-05', 8000.000, 'Mr.XYZ', '111223319', '1234', '112233'),
(29, 'Staff Fee', '2019-05-08', 8000.000, 'Mr.XYZ', '111223319', '1234', '112233'),
(30, 'Staff Fee', '2019-06-02', 8000.000, 'Mr.XYZ', '111223319', '1234', '112233'),
(31, 'Staff Fee', '2019-07-08', 8000.000, 'Mr.XYZ', '111223319', '1234', '112233'),
(32, 'Staff Fee', '2019-02-10', 6000.000, 'Mr.XYZ', '211223319', '1234', '112233'),
(33, 'Staff Fee', '2019-03-08', 6000.000, 'Mr.XYZ', '211223319', '1234', '112233'),
(34, 'Staff Fee', '2019-04-05', 6000.000, 'Mr.XYZ', '211223319', '1234', '112233'),
(35, 'Staff Fee', '2019-05-06', 6000.000, 'Mr.XYZ', '211223319', '1234', '112233'),
(36, 'Staff Fee', '2019-06-10', 6000.000, 'Mr.XYZ', '211223319', '1234', '112233'),
(37, 'Staff Fee', '2019-07-02', 6000.000, 'Mr.XYZ', '211223319', '1234', '112233'),
(38, 'Water Bill', '2018-06-10', 1200.000, 'LEX', NULL, '5678', '223344'),
(39, 'Water Bill', '2018-07-08', 1200.000, 'LEX', NULL, '5678', '223344'),
(40, 'Water Bill', '2018-08-10', 1200.000, 'LEX', NULL, '5678', '223344'),
(41, 'Water Bill', '2018-09-10', 1200.000, 'LEX', NULL, '5678', '223344'),
(42, 'Water Bill', '2018-10-05', 1200.000, 'LEX', NULL, '5678', '223344'),
(43, 'Water Bill', '2018-11-10', 1200.000, 'LEX', NULL, '5678', '223344'),
(44, 'Water Bill', '2018-12-05', 1200.000, 'Mr.ABC', NULL, '5678', '223344'),
(45, 'Water Bill', '2019-01-10', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(46, 'Water Bill', '2019-02-10', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(47, 'Water Bill', '2019-03-08', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(48, 'Water Bill', '2019-04-10', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(49, 'Water Bill', '2019-05-10', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(50, 'Water Bill', '2019-06-10', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(51, 'Water Bill', '2019-07-10', 6000.000, 'Mr.ABC', NULL, '5678', '223344'),
(52, 'Gas Bill', '2018-06-01', 1400.000, 'LEO', NULL, '5678', '223344'),
(53, 'Gas Bill', '2018-07-05', 1400.000, 'LEO', NULL, '5678', '223344'),
(54, 'Gas Bill', '2018-08-08', 1400.000, 'LEO', NULL, '5678', '223344'),
(55, 'Gas Bill', '2018-09-01', 1400.000, 'LEO', NULL, '5678', '223344'),
(56, 'Gas Bill', '2018-10-10', 1400.000, 'LEO', NULL, '5678', '223344'),
(57, 'Gas Bill', '2018-11-01', 1400.000, 'LEO', NULL, '5678', '223344'),
(58, 'Gas Bill', '2018-12-06', 1400.000, 'LEO', NULL, '5678', '223344'),
(59, 'Gas Bill', '2019-01-10', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(60, 'Gas Bill', '2019-02-10', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(61, 'Gas Bill', '2019-03-08', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(62, 'Gas Bill', '2019-04-10', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(63, 'Gas Bill', '2019-05-10', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(64, 'Gas Bill', '2019-06-07', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(65, 'Gas Bill', '2019-07-10', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(66, 'Electricity Bill', '2018-06-10', 2000.000, 'Mr.ABC', NULL, '5678', '223344'),
(67, 'Electricity Bill', '2018-07-10', 2200.000, 'Mr.ABC', NULL, '5678', '223344'),
(68, 'Electricity Bill', '2018-08-05', 1000.000, 'Mr.ABC', NULL, '5678', '223344'),
(69, 'Electricity Bill', '2018-09-08', 1200.000, 'Mr.ABC', NULL, '5678', '223344'),
(70, 'Electricity Bill', '2018-10-10', 1400.000, 'Mr.ABC', NULL, '5678', '223344'),
(71, 'Electricity Bill', '2018-11-12', 800.000, 'Mr.ABC', NULL, '5678', '223344'),
(72, 'Electricity Bill', '2018-12-10', 900.000, 'Mr.ABC', NULL, '5678', '223344'),
(73, 'Electricity Bill', '2019-01-10', 4000.000, 'Mr.ABC', NULL, '5678', '223344'),
(74, 'Electricity Bill', '2019-02-11', 4500.000, 'Mr.ABC', NULL, '5678', '223344'),
(75, 'Electricity Bill', '2019-03-12', 5000.000, 'Mr.ABC', NULL, '5678', '223344'),
(76, 'Electricity Bill', '2019-04-15', 3000.000, 'Mr.ABC', NULL, '5678', '223344'),
(77, 'Electricity Bill', '2019-05-10', 2000.000, 'Mr.ABC', NULL, '5678', '223344'),
(78, 'Electricity Bill', '2019-06-02', 3000.000, 'Mr.ABC', NULL, '5678', '223344'),
(79, 'Electricity Bill', '2019-07-01', 4200.000, 'Mr.ABC', NULL, '5678', '223344'),
(80, 'Maintance and Repair', '2018-11-10', 7000.000, 'Mr.ABC', NULL, '5678', '223344'),
(81, 'Maintance and Repair', '2019-05-27', 1000.000, 'Mr.ABC', NULL, '5678', '223344'),
(82, 'Maintance and Repair', '2019-06-16', 500.000, 'Mr.ABC', NULL, '5678', '223344'),
(83, 'Staff Fee', '2018-07-06', 10000.000, 'Mr.ABC', '122334418', '5678', '223344'),
(84, 'Staff Fee', '2018-08-15', 10000.000, 'Mr.ABC', '122334418', '5678', '223344'),
(85, 'Staff Fee', '2018-09-10', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(86, 'Staff Fee', '2018-10-15', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(87, 'Staff Fee', '2018-11-05', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(88, 'Staff Fee', '2018-12-05', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(89, 'Staff Fee', '2019-01-05', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(90, 'Staff Fee', '2019-02-06', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(91, 'Staff Fee', '2019-03-08', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(92, 'Staff Fee', '2019-04-02', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(93, 'Staff Fee', '2019-05-05', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(94, 'Staff Fee', '2019-06-10', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(95, 'Staff Fee', '2019-07-05', 8000.000, 'Mr.ABC', '222334418', '5678', '223344'),
(96, 'Staff Fee', '2018-10-05', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(97, 'Staff Fee', '2018-11-03', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(98, 'Staff Fee', '2018-12-07', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(99, 'Staff Fee', '2019-01-05', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(100, 'Staff Fee', '2019-02-07', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(101, 'Staff Fee', '2019-03-01', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(102, 'Staff Fee', '2019-04-06', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(103, 'Staff Fee', '2019-05-04', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(104, 'Staff Fee', '2019-06-02', 12000.000, 'Mr.ABC', '322334418', '5678', '223344'),
(105, 'Staff Fee', '2019-07-08', 12000.000, 'Mr.ABC', '322334418', '5678', '223344');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `hid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(40) NOT NULL,
  `length` double(8,3) DEFAULT NULL,
  `width` double(8,3) DEFAULT NULL,
  `elevetors` int(3) DEFAULT NULL,
  `cctvs` int(3) DEFAULT NULL,
  `oid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`hid`, `name`, `location`, `length`, `width`, `elevetors`, `cctvs`, `oid`) VALUES
('1234', 'XYZ Villa', 'Badda,Dhaka-1212', 43.210, 23.410, 1, 2, '112233'),
('5678', 'ABC Villa', 'Banani,Dhaka-1213', 102.330, 60.890, 1, 6, '223344');

-- --------------------------------------------------------

--
-- Stand-in structure for view `house_with_owner_info`
-- (See below for the actual view)
--
CREATE TABLE `house_with_owner_info` (
`Owner ID` varchar(10)
,`Owner Name` varchar(25)
,`Owner Phone Number` varchar(15)
,`House ID` varchar(10)
,`House Name` varchar(30)
,`House Location` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `phone` varchar(15) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `panel` int(2) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `hid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`phone`, `pwd`, `panel`, `user_id`, `hid`) VALUES
('01304915210', '123456', 2, '182233441', '5678'),
('01511944515', '123456', 2, '191122331', '1234'),
('01604915210', '123456', 2, '192233442', '5678'),
('01604915211', '123456', 2, '192233443', '5678'),
('01611332774', '123456', 1, '112233', '1234'),
('01611944515', '123456', 2, '191122332', '1234'),
('01704915210', '123456', 1, '223344', '5678'),
('01811944515', '123456', 2, '191122333', '1234'),
('01904915210', '123456', 2, '192233444', '5678'),
('01904915211', '123456', 2, '192233445', '5678'),
('01911944515', '123456', 2, '192233441', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `oid` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `occupation` varchar(15) NOT NULL,
  `present_address` varchar(30) NOT NULL,
  `permanent_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`oid`, `name`, `nid`, `email`, `phone`, `occupation`, `present_address`, `permanent_address`) VALUES
('112233', 'Mr.XYZ', '88997722', 'xyz@gmail.com', '01611332774', 'Business', 'Badda,Dhaka-1212', 'Badda,Dhaka-1212'),
('223344', 'Mr.ABC', '66997722', 'abc@gmail.com', '01704915210', 'Doctor', 'Banani,Dhaka-1213', 'Banani,Dhaka-1213');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `TxID` int(11) NOT NULL,
  `amount` double(15,3) NOT NULL,
  `received_by` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `tid` varchar(10) NOT NULL,
  `hid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`TxID`, `amount`, `received_by`, `date`, `tid`, `hid`) VALUES
(1, 34200.000, 'Mr.XYZ', '2019-01-01', '191122331', '1234'),
(2, 18200.000, 'Mr.XYZ', '2019-02-10', '191122331', '1234'),
(3, 18200.000, 'Mr.XYZ', '2019-03-05', '191122331', '1234'),
(4, 18200.000, 'Mr.XYZ', '2019-04-07', '191122331', '1234'),
(5, 18200.000, 'Mr.XYZ', '2019-05-05', '191122331', '1234'),
(6, 18200.000, 'Mr.XYZ', '2019-06-15', '191122331', '1234'),
(7, 18200.000, 'Mr.XYZ', '2019-07-08', '191122331', '1234'),
(8, 34200.000, 'Mr.XYZ', '2019-02-01', '191122332', '1234'),
(9, 18200.000, 'Mr.XYZ', '2019-03-10', '191122332', '1234'),
(10, 18200.000, 'Mr.XYZ', '2019-04-10', '191122332', '1234'),
(11, 18200.000, 'Mr.XYZ', '2019-05-08', '191122332', '1234'),
(12, 18200.000, 'Mr.XYZ', '2019-06-05', '191122332', '1234'),
(13, 18200.000, 'Mr.XYZ', '2019-07-02', '191122332', '1234'),
(14, 34200.000, 'Mr.XYZ', '2019-02-05', '191122333', '1234'),
(15, 18200.000, 'Mr.XYZ', '2019-03-05', '191122333', '1234'),
(16, 18200.000, 'Mr.XYZ', '2019-04-05', '191122333', '1234'),
(17, 18200.000, 'Mr.XYZ', '2019-05-15', '191122333', '1234'),
(18, 18200.000, 'Mr.XYZ', '2019-06-05', '191122333', '1234'),
(19, 18200.000, 'Mr.XYZ', '2019-07-10', '191122333', '1234'),
(20, 31600.000, 'Mr.ABC', '2018-06-01', '182233441', '5678'),
(21, 16600.000, 'Mr.ABC', '2018-07-12', '182233441', '5678'),
(22, 16600.000, 'Mr.ABC', '2018-08-15', '182233441', '5678'),
(23, 16600.000, 'Mr.ABC', '2018-09-16', '182233441', '5678'),
(24, 16600.000, 'Mr.ABC', '2018-10-08', '182233441', '5678'),
(25, 36600.000, 'Mr.ABC', '2019-01-01', '192233441', '5678'),
(26, 21600.000, 'Mr.ABC', '2019-02-10', '192233441', '5678'),
(27, 21600.000, 'Mr.ABC', '2019-03-05', '192233441', '5678'),
(28, 21600.000, 'Mr.ABC', '2019-04-10', '192233441', '5678'),
(29, 21600.000, 'Mr.ABC', '2019-05-12', '192233441', '5678'),
(30, 21600.000, 'Mr.ABC', '2019-06-01', '192233441', '5678'),
(31, 21600.000, 'Mr.ABC', '2019-07-10', '192233441', '5678'),
(32, 36600.000, 'Mr.ABC', '2019-01-01', '192233442', '5678'),
(33, 21600.000, 'Mr.ABC', '2019-02-01', '192233442', '5678'),
(34, 21600.000, 'Mr.ABC', '2019-03-01', '192233442', '5678'),
(35, 21600.000, 'Mr.ABC', '2019-04-11', '192233442', '5678'),
(36, 21600.000, 'Mr.ABC', '2019-05-01', '192233442', '5678'),
(37, 21600.000, 'Mr.ABC', '2019-06-10', '192233442', '5678'),
(38, 21600.000, 'Mr.ABC', '2019-07-08', '192233442', '5678'),
(39, 36600.000, 'Mr.ABC', '2019-02-01', '192233443', '5678'),
(40, 21600.000, 'Mr.ABC', '2019-03-10', '192233443', '5678'),
(41, 21600.000, 'Mr.ABC', '2019-04-10', '192233443', '5678'),
(42, 21600.000, 'Mr.ABC', '2019-05-10', '192233443', '5678'),
(43, 21600.000, 'Mr.ABC', '2019-06-10', '192233443', '5678'),
(44, 21600.000, 'Mr.ABC', '2019-07-08', '192233443', '5678'),
(45, 37600.000, 'Mr.ABC', '2019-03-01', '192233444', '5678'),
(46, 22600.000, 'Mr.ABC', '2019-04-10', '192233444', '5678'),
(47, 22600.000, 'Mr.ABC', '2019-05-05', '192233444', '5678'),
(48, 22600.000, 'Mr.ABC', '2019-06-06', '192233444', '5678'),
(49, 22600.000, 'Mr.ABC', '2019-07-08', '192233444', '5678'),
(50, 37600.000, 'Mr.ABC', '2019-05-01', '192233445', '5678'),
(51, 22600.000, 'Mr.ABC', '2019-06-01', '192233445', '5678'),
(52, 22600.000, 'Mr.ABC', '2019-07-10', '192233445', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` varchar(10) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `salary` double(15,3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` date NOT NULL,
  `pre_workplace` varchar(40) NOT NULL,
  `marital_status` varchar(12) NOT NULL,
  `permanent_address` varchar(40) NOT NULL,
  `present_address` varchar(40) NOT NULL,
  `joining_date` date NOT NULL,
  `status` int(3) NOT NULL,
  `hid` varchar(10) NOT NULL,
  `oid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `nid`, `phone`, `name`, `designation`, `salary`, `gender`, `dob`, `pre_workplace`, `marital_status`, `permanent_address`, `present_address`, `joining_date`, `status`, `hid`, `oid`) VALUES
('111223319', '854658', '01700000000', 'Karim Ali', 'Guard', 8000.000, 'Male', '1988-07-18', 'ETR Villa', 'Married', 'Kisorgong', 'Sayednagar', '2019-02-01', 1, '1234', '112233'),
('122334418', '654852', '01600000001', 'Arafat Sunny', 'Guard', 10000.000, 'Male', '1990-09-17', 'Siddik Vhaban', 'Unmarried', 'Soriyotpur', 'Rampura', '2018-07-06', 0, '5678', '223344'),
('122334419', '624759', '01900000001', 'Jafran Ali', 'Monitor', 10000.000, 'Male', '1989-07-12', 'Zika Bari', 'Married', 'Comilla', 'Notunbazar', '2019-01-01', 1, '5678', '223344'),
('211223319', '968574', '01700000001', 'Rabeya Akter', 'Janitor', 6000.000, 'Female', '1992-03-11', 'Jidan Vhaban', 'Married', 'Gajipur', 'Notunbazar', '2019-01-22', 1, '1234', '112233'),
('222334418', '153246', '01600000002', 'Silpi Rani', 'Janitor', 8000.000, 'Female', '1997-11-27', 'Fuji Photography', 'Unmarried', 'Madaripur', 'Matikata', '2018-08-01', 1, '5678', '223344'),
('322334418', '586152', '01500000000', 'Liakot Bhuyan', 'Guard', 12000.000, 'Male', '1986-02-13', 'Tutskill Coaching Center', 'Married', 'Kuril', 'Kuril', '2018-09-01', 1, '5678', '223344');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tid` varchar(10) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `family_members` int(3) NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `permanent_address` varchar(30) NOT NULL,
  `previous_address` varchar(30) NOT NULL,
  `monthly_rent` double(15,3) NOT NULL,
  `gas_bill` double(15,3) NOT NULL,
  `water_bill` double(15,3) NOT NULL,
  `rental_date` date NOT NULL,
  `status` int(3) NOT NULL,
  `unit_no` varchar(10) NOT NULL,
  `hid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tid`, `nid`, `name`, `email`, `phone`, `family_members`, `occupation`, `permanent_address`, `previous_address`, `monthly_rent`, `gas_bill`, `water_bill`, `rental_date`, `status`, `unit_no`, `hid`) VALUES
('182233441', '147963', 'Ox Ot', 'oxot@gmail.com', '01304915210', 5, 'Police', 'Noakhali', 'Mohammadpur', 15000.000, 1400.000, 1200.000, '2018-06-01', 0, '101', '5678'),
('191122331', '999666', 'Xy Za', 'xyza@gmail.com', '01511944515', 4, 'Teacher', 'Khulna', 'Rampura', 16000.000, 1200.000, 1000.000, '2019-01-01', 1, '101', '1234'),
('191122332', '888777', 'Pq Rs', 'pqrs@gmail.com', '01611944515', 5, 'Business', 'Barisal', 'Vatara', 16000.000, 1200.000, 1000.000, '2019-01-30', 1, '102', '1234'),
('191122333', '159753', 'Ab Cd', 'abcd@gmail.com', '01811944515', 3, 'Doctor', 'Rajshahi', 'Dhanmondi', 16000.000, 1200.000, 1000.000, '2019-02-01', 1, '201', '1234'),
('192233441', '753951', 'Qw Rt', 'qwrt@yahoo.com', '01911944515', 4, 'Engineer', 'Rangpur', 'Mirpur-10', 20000.000, 1400.000, 1200.000, '2019-01-01', 1, '102', '5678'),
('192233442', '852963', 'Lx Ly', 'lxly@yahoo.com', '01604915210', 3, 'Business', 'Thakurgaon', 'Mirpur-2', 20000.000, 1400.000, 1200.000, '2019-01-01', 1, '201', '5678'),
('192233443', '852964', 'Ll Rr', 'llrr@yahoo.com', '01604915211', 6, 'Business', 'Chittagong', 'Asad gate', 20000.000, 1400.000, 1200.000, '2019-02-01', 1, '202', '5678'),
('192233444', '852258', 'Tx Ty', 'txty@gmail.com', '01904915210', 3, 'Lawyer', 'Barisal', 'Matikata', 21000.000, 1400.000, 1200.000, '2019-03-01', 1, '301', '5678'),
('192233445', '369852', 'Wx Yz', 'wzyz@gmail.com', '01904915211', 4, 'Teacher', 'Comilla', 'Link-road', 21000.000, 1400.000, 1200.000, '2019-05-01', 1, '302', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `house_id` varchar(10) NOT NULL,
  `floor_no` varchar(10) NOT NULL,
  `unit_no` varchar(10) NOT NULL,
  `availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`house_id`, `floor_no`, `unit_no`, `availability`) VALUES
('1234', 'First', '101', 'Occupied'),
('1234', 'First', '102', 'Occupied'),
('1234', 'Second', '201', 'Occupied'),
('1234', 'Second', '202', 'Free'),
('5678', 'First', '101', 'Free'),
('5678', 'First', '102', 'Occupied'),
('5678', 'Second', '201', 'Occupied'),
('5678', 'Second', '202', 'Occupied'),
('5678', 'Third', '301', 'Free'),
('5678', 'Third', '302', 'Occupied'),
('5678', 'Third', '303', 'Occupied');

-- --------------------------------------------------------

--
-- Structure for view `complain_with_details`
--
DROP TABLE IF EXISTS `complain_with_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `complain_with_details`  AS  select `c`.`hid` AS `House ID`,`c`.`problem` AS `Problem`,`t`.`name` AS `Complaint`,`t`.`phone` AS `Phone`,`c`.`date` AS `Date`,`c`.`status` AS `Status` from (`complain` `c` join `tenant` `t`) where `t`.`hid` = `c`.`hid` and `t`.`tid` = `c`.`tid` ;

-- --------------------------------------------------------

--
-- Structure for view `house_with_owner_info`
--
DROP TABLE IF EXISTS `house_with_owner_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `house_with_owner_info`  AS  select `o`.`oid` AS `Owner ID`,`o`.`name` AS `Owner Name`,`o`.`phone` AS `Owner Phone Number`,`h`.`hid` AS `House ID`,`h`.`name` AS `House Name`,`h`.`location` AS `House Location` from (`owner` `o` join `house` `h`) where `h`.`oid` = `o`.`oid` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `hid` (`hid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`TxID`),
  ADD KEY `hid` (`hid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`phone`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`oid`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`TxID`),
  ADD KEY `tid` (`tid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `hid` (`hid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `hid` (`hid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `TxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `TxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tenant` (`tid`),
  ADD CONSTRAINT `complain_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `house` (`hid`),
  ADD CONSTRAINT `complain_ibfk_3` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `house` (`hid`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`);

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `house` (`hid`);

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tenant` (`tid`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `house` (`hid`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `house` (`hid`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `owner` (`oid`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `house` (`hid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
