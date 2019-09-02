-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 10:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_database`
--

CREATE TABLE `admin_database` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_database`
--

INSERT INTO `admin_database` (`username`, `password`) VALUES
('admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `date` varchar(10) NOT NULL,
  `specialist` varchar(100) NOT NULL,
  `query` varchar(200) NOT NULL,
  `prescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `username`, `email`, `gender`, `date`, `specialist`, `query`, `prescription`) VALUES
(1, 'Arjun', 'arjun73362', 'arjunsingh@gmail.com', 'male', '10/10/98', 'psychiatrist', 'hello i am psycho!!', 'ok ok!!'),
(2, 'Arjun', 'ayush_me001', 'arjunsingh@gmail.com', 'male', '10/12/18', 'dentist', 'pain in teeth', 'i will be there!!!');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_database`
--

CREATE TABLE `doctor_database` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `specialist` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_database`
--

INSERT INTO `doctor_database` (`id`, `name`, `username`, `email`, `specialist`, `password`) VALUES
(123, 'ayush', 'ayush', 'ayush.me001@gmail.com', 'dentist', '202cb962ac59075b964b07152d234b70'),
(332, 'Surgeon', 'deepak', 'deepak@gmial.com', 'Psychiatrist', '202cb962ac59075b964b07152d234b70'),
(345, 'aman', 'aman', 'aman@gmial.com', 'Neurologist', '202cb962ac59075b964b07152d234b70'),
(456, 'arjun', 'arjun', 'arjunsingh@gmail.com', 'Cardiologist', '202cb962ac59075b964b07152d234b70'),
(678, 'atul', 'atul', 'atul@gmial.com', 'Surgeon', '202cb962ac59075b964b07152d234b70'),
(5323, 'abhi', 'abhi001', 'abhi@gmial.com', 'Family medicine physician', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `patient_database`
--

CREATE TABLE `patient_database` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_database`
--

INSERT INTO `patient_database` (`id`, `name`, `username`, `email`, `contact`, `address`, `password`) VALUES
(1, 'cGJ2Mk5PTzgvNjZaVmJXUU1QQkliQT09', 'ckQzbFIyZTNjNzh2WFcwMFBTRVNsUT09', 'Z2doMVJsVndrdlNVNnFJNlByS2FWc21LYXV0VkxOYnJydGNlL0pJT29Ybz0=', 'b3pyY1JqT2VhWndjdTNhL0M1Rm0vQT09', 'MXlCZkVxRUliZElJTE1ZazBsdlN1Zz09', '202cb962ac59075b964b07152d234b70'),
(2, 'RWFUZS9ycUkzR1NCVlgvelFjNDFFdz09', 'WnNUbDJ0UzIwRHlvTERWeGRNWEVqdz09', 'ZmxBL2ZJZUVWcHc0QzZ1WWtHTGM3K1l4NXJvb3Q2bXQyYnRNa0pmTG0xTT0=', 'QjFYMk51NTd0TmtHRDFRWlJBY3htZz09', 'bzV2bFk2a2JEUU9qQnI5MnJMVi9OQT09', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_database`
--
ALTER TABLE `doctor_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_database`
--
ALTER TABLE `patient_database`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_database`
--
ALTER TABLE `patient_database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
