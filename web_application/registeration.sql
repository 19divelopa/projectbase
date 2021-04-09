-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 08:57 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registeration`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminbase`
--

CREATE TABLE `adminbase` (
  `Admin_id` varchar(5) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminbase`
--

INSERT INTO `adminbase` (`Admin_id`, `password`) VALUES
('Uche1', 'Uche01');

-- --------------------------------------------------------

--
-- Table structure for table `staff_record`
--

CREATE TABLE `staff_record` (
  `todays_date` date NOT NULL,
  `current_month` int(11) NOT NULL,
  `staff_id` varchar(5) NOT NULL,
  `morning` time NOT NULL,
  `evening` time NOT NULL,
  `time_stamp` int(11) NOT NULL,
  `puntual` int(11) NOT NULL,
  `counters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_reg`
--

CREATE TABLE `staff_reg` (
  `Staff_id` varchar(4) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(5) NOT NULL,
  `statuss` int(11) NOT NULL,
  `daily_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_reg`
--

INSERT INTO `staff_reg` (`Staff_id`, `firstname`, `lastname`, `email`, `password`, `statuss`, `daily_counter`) VALUES
('A96', 'Uche', 'Timothy', 'uchetimothy@gmail.co', '4500', 0, 0),
('A91', 'ajabo ', 'asoko', 'nineteendivelopa@yah', '3333', 1, 0),
('A4', 'joseph', 'ondo', 'uhuma@Y.com', '1234', 0, 1),
('A66', 'grACE', 'Jonathan', 'Gracejoe@yahoo.com', '1234', 1, 0),
('A30', 'iSAIAH', 'OKIBE', 'isaiah1@yaoo.com', '1234', 1, 0),
('A29', 'oKIBE', 'ISAIAH', 'OKIBEMIC@GMAIL.COM', '1234', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff_record`
--
ALTER TABLE `staff_record`
  ADD PRIMARY KEY (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
