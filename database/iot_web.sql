-- phpMyAdmin SQL Dump
-- version 5.2.1-4.fc40
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2024 at 04:38 PM
-- Server version: 10.11.6-MariaDB
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot_web`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sensor`
--

CREATE TABLE `tb_sensor` (
  `id` int(11) NOT NULL,
  `sensor1` varchar(10) NOT NULL,
  `sensor2` varchar(10) NOT NULL,
  `sensor3` varchar(10) DEFAULT NULL,
  `sensor4` varchar(20) DEFAULT NULL,
  `sensor5` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_sensor`
--

INSERT INTO `tb_sensor` (`id`, `sensor1`, `sensor2`, `sensor3`, `sensor4`, `sensor5`, `time`) VALUES
(1, '6', 'NORMAL', '', '', '', '2024-06-10 16:35:15');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
