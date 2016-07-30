-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 08:52 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydatabase`
--
CREATE DATABASE IF NOT EXISTS `mydatabase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

DROP TABLE IF EXISTS `admin_account`;
CREATE TABLE IF NOT EXISTS `admin_account` (
  `admin_user` varchar(200) NOT NULL,
  `admin_pass` varchar(5000) NOT NULL,
  PRIMARY KEY (`admin_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_user`, `admin_pass`) VALUES
('admin', 'sha256:1000:KBuiR1wrEcHd50c9v8TnjXYFsvQdGG/Tb+PJecW43RC+URMhRkrOtEX48JvsHDnIAAo=:fXNNOFITOLXWsmT/BdPyUQWZx1akxGEzGm4MT16Q1mDDXoE1lCP7qoZTFs74N1AU/74=HtJCanrexQCX9x2He0cQ6LHx_2Kk8bHw3ztRgUShtynQEkWKgPYDtMk8YmizY-qAJu33LKZw2CmREr1xkMYevXpdLPZfPvpMM4KayBGWHGs');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
