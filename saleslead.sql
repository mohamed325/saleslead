-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2019 at 08:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saleslead`
--

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `contact_method` varchar(255) NOT NULL,
  `buy_indicator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `phone`, `state`, `city`, `zip`, `contact_method`, `buy_indicator`) VALUES
(100, 'farhiya', '6148064034', 'OH', 'columbus', '43230', 'sms', 2),
(102, 'Abdikarim Mohamed', '6148064034', 'OH', 'columbus', '43230', 'phone', 3),
(103, 'Ahmed O Iyeh', '6149287597', 'new york', 'Columbus', '43230', 'CarrierPigeon', 1),
(104, 'zakariya ali', '6148064034', 'DC', 'washington', '73230', 'phone', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
