-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 03:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bounceback`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Md. Fahad Munshi', 'fahad4bangladesh@gmail.com', 'fahad4bd', '9368894d6cff4304a09f463e40bbbcbb'),
(2, 'Ajay Nagar', 'carry@gmail.com', 'Carryminati', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Hasan Sharker', 'hasan@gmail.com', 'Hasan', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Shamim Sharker', 'shamim@gmail.com', 'Shamim', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Nur Islam', 'nur@gmail.com', 'Nur', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Riaz Ahmed', 'riaz@gmail.com', 'Riaz', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'Shourav Munshi', 'shourav@gmail.com', 'Shourav', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Shakil Ahmed ', 'shakil@gmail.com', 'Shakil', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'Mustafizur Rahman', 'mustafiz@gmail.com', 'Mustafiz', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'Lubna Akter', 'lubna@gmail.com', 'Lubna', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Fatema Akter', 'fatema@gmail.com', 'Fatema', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Roksana Akter', 'roksana@gmail.com', 'Roksana', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'Syed Fahim', 'fahim@gmail.com', 'Fahim', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'Tonmoy Ahmed ', 'tonmoy@gmail.com', 'Tonmoy', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'Jannatul Ferdous', 'jannat@gmail.com', 'Jannat', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'Mahabuba Rahman Porshi', 'porshi@gmail.com', 'Porshi', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Kaium Ahmed', 'kaium@gmail.com', 'Kaium', 'e10adc3949ba59abbe56e057f20f883e'),
(18, 'Rabbi Islam', 'rabbi@gmail.com', 'Rabbi', 'e10adc3949ba59abbe56e057f20f883e'),
(19, 'Md. Fahad Monshi', '36fahad@gmail.com', 'Fahad', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'Arif Hossain', 'arif@gmail.com', 'Arif', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
