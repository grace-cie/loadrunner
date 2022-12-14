-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 07:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loadrunner`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_flights`
--

CREATE TABLE `booked_flights` (
  `id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `flight` varchar(200) NOT NULL,
  `total` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `fromm` varchar(30) NOT NULL,
  `too` varchar(30) NOT NULL,
  `dep_date` varchar(30) NOT NULL,
  `arr_date` varchar(30) NOT NULL,
  `roundtrip` varchar(30) NOT NULL,
  `typeseat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `fromm`, `too`, `dep_date`, `arr_date`, `roundtrip`, `typeseat`) VALUES
(1, 'seattle', 'sydney', '11/11/2022', '12/11/2022', 'isticket', 'First');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `category` int(100) NOT NULL,
  `plane` varchar(30) NOT NULL,
  `timee` varchar(30) NOT NULL,
  `cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id`, `category`, `plane`, `timee`, `cost`) VALUES
(1, 1, 'Blue Sky Air 780', '8am', '801'),
(2, 1, 'Blue Sky Air 781', '1pm', '714'),
(3, 1, 'Blue Sky Air 782', '5pm', '758'),
(4, 1, 'Blue Sky Air 783', '11pm', '656'),
(5, 2, 'Blue Sky Air 870', '8am', '801'),
(6, 2, 'Blue Sky Air 871', '1pm', '714'),
(7, 2, 'Blue Sky Air 872', '5pm', '758'),
(8, 2, 'Blue Sky Air 873', '11pm', '656');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'rirei0', '12345', 'Rey', 'Antig');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_flights`
--
ALTER TABLE `booked_flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_flights`
--
ALTER TABLE `booked_flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
