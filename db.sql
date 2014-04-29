-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2014 at 06:00 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

use stickynotes;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stickynotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyexpenses`
--

CREATE TABLE IF NOT EXISTS `dailyexpenses` (
  `date_created` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `dailexpensetypeID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `dailyexpenses`
--

INSERT INTO `dailyexpenses` (`date_created`, `id`, `note`, `date`, `user_id`, `session_id`, `price`, `dailexpensetypeID`) VALUES
('0000-00-00 00:00:00', 1, 'test', NULL, NULL, NULL, 0, 0),
('0000-00-00 00:00:00', 2, 'fast', NULL, NULL, NULL, 0, 0),
('0000-00-00 00:00:00', 3, 'test', NULL, NULL, NULL, 0, 0),
('0000-00-00 00:00:00', 4, NULL, NULL, NULL, NULL, 0, 0),
('0000-00-00 00:00:00', 5, NULL, NULL, NULL, NULL, 0, 0),
('0000-00-00 00:00:00', 6, NULL, NULL, NULL, NULL, 0, 0),
('0000-00-00 00:00:00', 7, NULL, NULL, NULL, NULL, 0, 0),
('2014-03-24 02:21:22', 8, NULL, NULL, NULL, NULL, 0, 0),
('2014-03-24 02:21:59', 9, NULL, NULL, NULL, NULL, 12, 0),
('2014-03-24 02:23:12', 10, NULL, NULL, NULL, NULL, 12, 0),
('2014-03-24 02:23:18', 11, NULL, NULL, NULL, NULL, 0, 0),
('2014-03-24 02:23:28', 12, 'adsf', NULL, NULL, NULL, 123, 0),
('2014-03-24 02:28:12', 13, 'asdf', NULL, NULL, NULL, 123, 0),
('2014-03-24 02:29:13', 14, 'asdf', NULL, NULL, NULL, 123, 6),
('2014-03-24 02:29:37', 15, 'asdf', NULL, NULL, NULL, 123, 6),
('2014-03-24 02:29:53', 16, 'asdf', NULL, NULL, NULL, 123, 6),
('2014-03-24 03:49:10', 17, 'asdf', NULL, NULL, NULL, 123, 6);

-- --------------------------------------------------------

--
-- Table structure for table `dailyexpensestype`
--

CREATE TABLE IF NOT EXISTS `dailyexpensesType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dailyexpensestype`
--

INSERT INTO `dailyexpensesType` (`id`, `name`) VALUES
(1, 'Food'),
(2, 'Traffic'),
(3, 'Clothes'),
(4, 'Finance and Insurance'),
(5, 'Healthcare'),
(6, 'Study'),
(7, 'Lesire'),
(8, 'Property');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
