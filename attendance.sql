-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 08:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `department` varchar(50) NOT NULL,
  `classes` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `present_students` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `date`, `department`, `classes`, `shift`, `subject`, `present_students`) VALUES
(1, '0000-00-00 00:00:00', '', '', '', '', ''),
(2, '2021-07-01 00:34:41', 'department', 'class', 'shift', 'subject', '4106,9749,1122'),
(3, '2021-07-01 00:49:52', 'ComputerTechnology', 'CM2I', 'Shift1', 'ENG', '4106'),
(4, '2021-07-01 00:53:41', 'ComputerTechnology', 'CM1I', 'Shift1', 'ENG', '9749'),
(5, '2021-07-01 02:55:46', 'ComputerTechnology', 'CM1I', 'Shift1', 'BSC', '4106'),
(6, '2021-07-01 06:55:19', 'ComputerTechnology', 'CM6I', 'Shift1', 'MAD', ''),
(8, '2021-07-01 10:22:00', 'ComputerTechnology', 'CM6I', 'Shift1', 'MAD', ''),
(9, '2021-07-01 10:37:46', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', '2345'),
(10, '2021-07-01 10:39:09', 'ComputerTechnology', 'CM6I', 'Shift1', 'WBP', '1234'),
(11, '2021-07-01 10:40:57', 'ComputerTechnology', 'CM6I', 'Shift1', 'CPE', '2345'),
(12, '2021-07-01 10:42:03', 'ComputerTechnology', 'CM6I', 'Shift1', 'MAD', '2345'),
(13, '2021-07-01 10:57:43', 'ComputerTechnology', 'CM6I', 'Shift1', 'MAD', '2345'),
(14, '2021-07-01 10:59:18', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', ''),
(15, '2021-07-01 11:06:44', 'ComputerTechnology', 'CM6I', 'Shift1', 'ETI', '3456'),
(16, '2021-07-01 11:59:53', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', '9749'),
(17, '2021-07-01 12:04:43', 'department', 'class', 'shift', 'subject', ''),
(18, '2021-07-01 12:05:43', 'department', 'class', 'shift', 'subject', '3456'),
(19, '2021-07-01 12:07:14', 'department', 'class', 'shift', 'subject', '2345,9749'),
(20, '2021-07-01 13:17:30', 'ComputerTechnology', 'CM6I', 'Shift1', 'ETI', '9749'),
(21, '2021-07-04 13:06:15', 'ComputerTechnology', 'CM6I', 'Shift1', 'MAD', '2345,9749'),
(22, '2021-07-04 14:52:26', 'ComputerTechnology', 'CM6I', 'Shift1', 'MAD', '2520,9749'),
(23, '2021-07-04 15:00:43', 'department', 'class', 'shift', 'subject', '9749'),
(24, '2021-07-05 11:02:19', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', '2520,9749'),
(25, '2021-07-05 11:03:49', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', ''),
(26, '2021-07-05 11:05:15', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', '2520,9749'),
(27, '2021-07-05 13:04:12', 'ComputerTechnology', 'CM6I', 'Shift1', 'WBP', '2520,9749'),
(28, '2021-07-05 13:08:22', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', '2520,9749'),
(29, '2021-07-05 14:32:49', 'ComputerTechnology', 'CM6I', 'Shift1', 'PWP', '2520,9749');

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enroll_no` varchar(20) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `name`, `address`, `email`, `password`, `enroll_no`, `roll_no`, `mobile_no`, `department`, `semester`, `shift`) VALUES
(8, 'Traial Face', 'a', 'a', 'c9220f9e5588fc3e1643852df12698c0', 'a', 'a', 'a', 'COMPUTER', 'SEM 1', 'SHIFT 1'),
(18, 'Ruchita Amale', 'Rangargalli, Sangamner', 'ruchitaamale.click@gmail.com', '8d8974f50868f219c639e3ee76b3c970', '9749', '17', '8888926475', 'COMPUTER', 'SEM 6', 'SHIFT 1'),
(19, 'Manasvi Suryawanshi', 'Maldad Road,Sangamner', 'smanasvi252@gmail.com', '76da7d22bcbec6b6e52a55e69cfcaaf9', '2520', '8', '9404139193', 'COMPUTER', 'SEM 6', 'SHIFT 1'),
(20, 'Kalyani Shinde', 'Rangargalli, Sangamner', 'ruchita@gmail.com', '1341007bb4b7ba0d1de93725c4c25af0', '1800800065', '17', '8888926475', 'COMPUTER', 'SEM 6', 'SHIFT 1');

--
-- Triggers `student_register`
--
DELIMITER $$
CREATE TRIGGER `insr_to_users` BEFORE INSERT ON `student_register` FOR EACH ROW INSERT INTO `users` (`id`, `name`, `email`, `password`, `department`, `access`) VALUES (NULL, new.name, new.email, new.password, new.department, '0')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `access` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `department`, `access`) VALUES
(1, 'Admin', 'teacher@gmail.com', '8d788385431273d11e8b43bb78f3aa41', 'computer', 30),
(10, 'Rushikesh Amale', 'rushikeshamale@gmail.com', '4d0803243f3fd7dd14c02a39c86104dd', 'COMPUTER', 0),
(23, 'Amol Shelkar', 'shelkarad@gmail.com', '8d788385431273d11e8b43bb78f3aa41', 'Computer Technology', 20),
(26, 'Ruchita Amale', 'ruchitaamale.click@gmail.com', '8d8974f50868f219c639e3ee76b3c970', 'COMPUTER', 0),
(27, 'Manasvi Suryawanshi', 'smanasvi252@gmail.com', '76da7d22bcbec6b6e52a55e69cfcaaf9', 'COMPUTER', 0),
(28, 'Kalyani Shinde', 'ruchita@gmail.com', '1341007bb4b7ba0d1de93725c4c25af0', 'COMPUTER', 0),
(29, 'Vijay Thitme', 'vijay@gmail.com', '8d788385431273d11e8b43bb78f3aa41', 'Computer Technology', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enroll_no` (`enroll_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
