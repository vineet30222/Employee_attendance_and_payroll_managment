-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2018 at 05:07 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--
CREATE DATABASE IF NOT EXISTS `college` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `college`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1522045832 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'akash123', 'akash123'),
(2, 'ashish123', 'ashish123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `email` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `DOJ` date NOT NULL,
  `post` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `days` int(11) DEFAULT '0',
  `payment` int(11) DEFAULT '0',
  `lastattendance` date DEFAULT '1996-01-01',
  `attendancetime` time DEFAULT NULL,
  `amorpm` varchar(5) DEFAULT NULL,
  `newattendance` date DEFAULT '1996-01-02',
  `lastsalary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`email`, `firstname`, `lastname`, `DOB`, `fathername`, `mobile`, `address`, `DOJ`, `post`, `photo`, `password`, `days`, `payment`, `lastattendance`, `attendancetime`, `amorpm`, `newattendance`, `lastsalary`) VALUES
('ashishg00485@gmail.com', 'Ashish Kumar', 'Gupta', '1998-07-26', 'Mr. Hanuman Prasad Gupta', '8933070703', 'Jaunpur', '2017-07-09', 'Engineer', 'IMG_20180320_092324.jpg', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 1, 18, '2018-06-05', '11:28:32', 'AM', '2018-06-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post` varchar(100) NOT NULL,
  `ratio` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post`, `ratio`) VALUES
('Engineer', 18),
('wewe', 20),
('abcd', 8);

-- --------------------------------------------------------

--
-- Table structure for table `salarysummary`
--

DROP TABLE IF EXISTS `salarysummary`;
CREATE TABLE IF NOT EXISTS `salarysummary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `salarydate` date NOT NULL,
  `salarytime` time NOT NULL,
  `amorpm` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarysummary`
--

INSERT INTO `salarysummary` (`id`, `name`, `email`, `salary`, `salarydate`, `salarytime`, `amorpm`) VALUES
(29, 'Ashish Kumar Gupta', 'testgamilforme@gmail.com', 18, '2018-04-20', '01:03:59', 'AM'),
(24, 'Ashish Gupta', 'testgamilforme@gmail.com', 36, '2018-04-04', '11:34:53', 'PM'),
(27, 'Ashish Gupta', 'testgamilforme@gmail.com', 18, '2018-04-04', '11:40:53', 'PM');
--
-- Database: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

DROP TABLE IF EXISTS `myguests`;
CREATE TABLE IF NOT EXISTS `myguests` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'John', 'Doe', 'john@example.com', NULL),
(2, 'John', 'Doe', 'john@example.com', NULL),
(3, 'John', 'Doe', 'john@example.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
