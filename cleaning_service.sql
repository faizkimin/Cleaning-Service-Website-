-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 06:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleaning_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cleaningbooking`
--

CREATE TABLE `cleaningbooking` (
  `idbooking` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phonenum` varchar(20) DEFAULT NULL,
  `icnum` varchar(20) NOT NULL,
  `homeadd` varchar(100) DEFAULT NULL,
  `services` varchar(50) DEFAULT NULL,
  `daycleaning` date DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cleaningbooking`
--

INSERT INTO `cleaningbooking` (`idbooking`, `firstname`, `lastname`, `phonenum`, `icnum`, `homeadd`, `services`, `daycleaning`, `status`) VALUES
(2, 'Alim ', 'Haziq', '0187820213', '020424145999', 'Tingakat 5, Bangunan Megah Holdings, Jalan Merah 1, 56000, Kuala Lumpur', 'Office Cleaning', '2024-04-25', 'done'),
(4, 'Amir ', 'Syahmi', '0143520875', '050320142555', 'No 5 Jalan Kemaman 3, Bandar Baru, 56000, Selangor.', 'Post Renovation Cleaning Service', '2024-04-12', 'ongoing'),
(12, 'Hakim', '', '0143353824', '760608017465', 'No 4 Jalan Emas, Bandar Penawar, 81900, Kota Tinggi, Johor', 'Home Cleaning', '2024-04-18', 'ongoing'),
(15, 'Haikal ', 'Abdullah', '0133553824', '050204015999', 'jalan kembang 2, bandar baru', 'Part Time Maid', '2024-04-18', 'pending'),
(16, 'Karim', 'Haziq', '01023525589', '040203015998', 'No 3 Jalan Permata, Batu Pahat ', 'Post Renovation Cleaning Service', '2024-04-24', 'ongoing'),
(17, 'Aliah ', 'Kasim', '0123353829', '740625015774', 'Condo Sejahtera Block A Jalan Singah Sana, Johor', 'Part Time Maid', '2024-04-24', 'done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cleaningbooking`
--
ALTER TABLE `cleaningbooking`
  ADD PRIMARY KEY (`idbooking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cleaningbooking`
--
ALTER TABLE `cleaningbooking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
