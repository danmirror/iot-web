-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2022 at 06:14 PM
-- Server version: 5.7.35-0ubuntu0.18.04.2
-- PHP Version: 7.2.34-24+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id` int(10) NOT NULL,
  `value1` varchar(10) NOT NULL,
  `value2` varchar(10) NOT NULL,
  `value3` varchar(10) NOT NULL,
  `value4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sensor`
--

CREATE TABLE `tb_sensor` (
  `id` int(11) NOT NULL,
  `sensor1` varchar(10) NOT NULL,
  `sensor2` varchar(10) NOT NULL,
  `sensor3` varchar(10) NOT NULL,
  `sensor4` varchar(10) NOT NULL,
  `sensor5` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
