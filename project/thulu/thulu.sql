-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3388
-- Generation Time: Mar 20, 2017 at 05:44 PM
-- Server version: 5.6.19
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thulu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(100) NOT NULL,
  `admin` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`) VALUES
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
`id` int(100) NOT NULL,
  `bill#` int(100) NOT NULL,
  `consumer_num` int(100) NOT NULL,
  `units` float NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill#`, `consumer_num`, `units`) VALUES
(1, 1543652, 12500, 365),
(2, 1543652, 12500, 365),
(3, 1547211, 12501, 542),
(4, 1547211, 12501, 542);

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE IF NOT EXISTS `consumer` (
`id` int(100) NOT NULL,
  `consumer_num` int(100) NOT NULL,
  `section_num` int(100) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(1024) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`id`, `consumer_num`, `section_num`, `name`, `dob`, `gender`, `address`, `phone`, `email`) VALUES
(1, 12500, 1209, 'Rajan K', '2011-04-04', 'male', 'Box number 34,\r\ntest address,\r\ndemo p.o\r\n684014', 9587469874, 'consumer1@commail.com'),
(2, 12501, 1208, 'Sneha', '2017-03-09', 'female', 'Test address.pb no 65', 8856320147, 'consumer2@mailnet.com');

-- --------------------------------------------------------

--
-- Table structure for table `meter_readings`
--

CREATE TABLE IF NOT EXISTS `meter_readings` (
`id` int(255) NOT NULL,
  `consumer_num` int(150) NOT NULL,
  `section_num` varchar(1000) NOT NULL,
  `units` float NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `meter_readings`
--

INSERT INTO `meter_readings` (`id`, `consumer_num`, `section_num`, `units`) VALUES
(1, 12500, '120', 127),
(2, 12530, '102', 23),
(3, 12530, '102', 53),
(4, 12500, '120', 165),
(5, 1954, '23', 759),
(6, 12500, '120', 127),
(7, 12530, '102', 23),
(8, 12530, '102', 53),
(9, 12500, '120', 165),
(10, 12501, '23', 950),
(11, 12501, '23', 984),
(12, 12500, '120', 719),
(13, 12500, '120', 845);

-- --------------------------------------------------------

--
-- Table structure for table `my_chart_data`
--

CREATE TABLE IF NOT EXISTS `my_chart_data` (
`id` int(10) NOT NULL,
  `consumer_num` int(11) NOT NULL,
  `section_num` int(100) NOT NULL,
  `category` year(4) NOT NULL,
  `units` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `my_chart_data`
--

INSERT INTO `my_chart_data` (`id`, `consumer_num`, `section_num`, `category`, `units`) VALUES
(1, 12500, 1209, 2007, 12540),
(2, 12500, 1209, 2008, 25310),
(3, 12500, 1209, 2009, 16524),
(4, 12500, 1209, 2010, 32102),
(5, 12500, 1209, 2011, 18296),
(6, 12500, 1209, 2012, 19824),
(7, 12500, 1209, 2013, 21020),
(8, 12500, 1209, 2014, 12223),
(9, 12500, 1209, 2015, 22436),
(10, 12500, 1209, 2016, 32240),
(11, 12500, 1209, 2017, 25401),
(12, 12501, 1208, 2004, 21125),
(13, 12501, 1208, 2005, 15421),
(14, 12501, 1208, 2006, 31605),
(15, 12501, 1208, 2007, 21417),
(16, 12501, 1208, 2008, 18202),
(17, 12501, 1208, 2009, 19832),
(18, 12501, 1208, 2010, 21210),
(19, 12501, 1208, 2011, 32223),
(20, 12501, 1208, 2012, 23612),
(21, 12501, 1208, 2013, 11240),
(22, 12501, 1208, 2014, 25421),
(23, 12501, 1208, 2015, 32125),
(24, 12501, 1208, 2016, 15421),
(25, 12501, 1208, 2017, 16522);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(10) NOT NULL,
  `txnid` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `consumer` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `txnid`, `status`, `consumer`, `amount`, `email`, `date`) VALUES
(1, '85feac458a574fc4e888', 'success', 12500, 692, 'test@test.com', '0000-00-00 00:00:00'),
(2, '3921a554cdcfe3e81dbf', 'failure', 12500, 692, 'test@site.com', '0000-00-00 00:00:00'),
(3, '05dbc5a2f7b790b0aa3d', 'failure', 12501, 1146, 'test@test.com', '0000-00-00 00:00:00'),
(4, '294f412bdb94f13c9e76', 'success', 12500, 692, 'test@test.com', '0000-00-00 00:00:00'),
(5, 'f1716a2ca3fca2469afa', 'failure', 12501, 1146, 'test@test.com', '0000-00-00 00:00:00'),
(6, '8244bd5fb7940773bbd7', 'success', 12500, 692, 'test@test.com', '2017-03-16 10:16:14'),
(7, '7a8cd0edf0e67ec644ea', 'failure', 12501, 1146, 'test@site.com', '2017-03-16 10:17:31'),
(8, '61243c110d83ca553e1d', 'failure', 12501, 271, 'test@site.com', '2017-03-16 10:19:01'),
(9, '6d231a6086dca3f86c8d', 'failure', 12501, 271, 'CCFF@hhn.com', '2017-03-16 17:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
`id` int(10) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `vdate` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `browser`, `country`, `vdate`) VALUES
(1, '120.1.2.01', 'Chrome', 'India', '2015-09-01'),
(2, '120.1.0.53', 'Firefox', 'US', '2015-09-01'),
(3, '198.0.0.5', 'Safari', 'UK', '2015-09-02'),
(4, '198.0.0.5', 'Safari', 'India', '2015-09-03'),
(5, '198.0.0.6', 'Chrome', 'India', '2015-09-03'),
(6, '198.0.0.7', 'Chrome', 'US', '2015-09-03'),
(7, '198.0.0.8', 'Safari', 'Russia', '2015-09-04'),
(8, '198.0.0.8', 'Firefox', 'Russia', '2015-09-04'),
(9, '198.0.0.10', 'Firefox', 'Russia', '2015-09-05'),
(10, '198.0.0.8', 'Safari', 'India', '2015-09-05'),
(11, '198.0.0.12', 'Chrome', 'UK', '2015-09-05'),
(12, '198.0.0.14', 'Chrome', 'India', '2015-09-05'),
(13, '198.0.0.14', 'Chrome', 'India', '2015-09-06'),
(14, '198.0.0.15', 'IE', 'US', '2015-09-06'),
(15, '198.0.0.16', 'Chrome', 'US', '2015-09-06'),
(16, '198.0.0.15', 'IE', 'UK', '2015-09-07'),
(17, '198.0.0.16', 'IE', 'US', '2015-09-07'),
(18, '198.0.0.18', 'Chrome', 'India', '2015-09-07'),
(19, '198.0.0.19', 'Chrome', 'India', '2015-09-07'),
(20, '198.0.0.20', 'Firefox', 'India', '2015-09-07'),
(21, '198.0.0.20', 'Safari', 'India', '2015-09-07'),
(22, '198.0.0.22', 'Chrome', 'UK', '2015-09-07'),
(23, '198.0.0.22', 'Safari', 'UK', '2015-09-09'),
(24, '198.0.0.24', 'Opera', 'India', '2015-09-09'),
(25, '198.0.0.24', 'Opera', 'India', '2015-09-10'),
(26, '198.0.0.23', 'Opera', 'US', '2015-09-10'),
(27, '198.0.0.22', 'Opera', 'US', '2015-09-10'),
(28, '198.0.0.21', 'Safari', 'US', '2015-09-10'),
(29, '198.0.0.21', 'Chrome', 'US', '2015-09-10'),
(30, '198.0.0.55', 'Firefox', 'US', '2015-09-10'),
(31, '198.0.0.55', 'Chrome', 'US', '2015-09-10'),
(32, '198.0.0.57', 'Firefox', 'Russia', '2015-09-10'),
(33, '198.0.0.58', 'UC Browser', 'Russia', '2015-09-10'),
(34, '198.0.0.60', 'Chrome', 'Russia', '2015-09-10'),
(35, '198.0.0.60', 'Firefox', 'Russia', '2015-09-10'),
(36, '198.0.0.61', 'Safari', 'India', '2015-09-10'),
(37, '198.0.0.62', 'Safari', 'Brazil', '2015-09-10'),
(38, '198.0.0.63', 'Firefox', 'Brazil', '2015-09-10'),
(39, '198.0.0.64', 'Chrome', 'Brazil', '2015-09-10'),
(40, '198.0.0.65', 'Safari', 'Spain', '2015-09-10'),
(41, '198.0.0.78', 'UC Browser', 'Spain', '2015-09-10'),
(42, '198.0.0.79', 'Opera', 'Spain', '2015-09-10'),
(43, '198.0.0.79', 'Safari', 'Spain', '2015-09-10'),
(44, '198.0.0.5', 'Chrome', 'Brazil', '2015-09-10'),
(45, '198.0.0.5', 'Chrome', 'Brazil', '2015-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter_readings`
--
ALTER TABLE `meter_readings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_chart_data`
--
ALTER TABLE `my_chart_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `meter_readings`
--
ALTER TABLE `meter_readings`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `my_chart_data`
--
ALTER TABLE `my_chart_data`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
