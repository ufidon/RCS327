-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 05:43 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgallery`
--
CREATE DATABASE IF NOT EXISTS `dbgallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `dbgallery`;

-- --------------------------------------------------------

--
-- Table structure for table `tbimages`
--

DROP TABLE IF EXISTS `tbimages`;
CREATE TABLE IF NOT EXISTS `tbimages` (
  `FILENAME` varchar(60) COLLATE utf8_bin NOT NULL,
  `IMAGECAPTION` varchar(60) COLLATE utf8_bin NOT NULL,
  `IMAGEGENRE` varchar(60) COLLATE utf8_bin NOT NULL,
  `PHOTOLOCATION` varchar(60) COLLATE utf8_bin NOT NULL,
  `PHOTOGRAPHERNAME` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbimages`
--

INSERT INTO `tbimages` (`FILENAME`, `IMAGECAPTION`, `IMAGEGENRE`, `PHOTOLOCATION`, `PHOTOGRAPHERNAME`) VALUES
('monkey.jpg', 'monkey', 'happy', 'Vilas Zoo', 'Trump'),
('waterfall.jpg', 'water fall', 'nature', 'Michigan', 'Trump');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbimages`
--
ALTER TABLE `tbimages`
  ADD PRIMARY KEY (`FILENAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
