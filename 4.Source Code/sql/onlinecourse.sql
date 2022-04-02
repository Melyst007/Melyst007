-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 08:10 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `noofSeats` int(11) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `noofSeats`, `creationDate`, `updationDate`) VALUES
(1, 'CST 101', 'CST 101 - Intro to Computer Science', 5, '2022-03-26 21:04:31', ''),
(2, 'CST 313', 'CST 313 - Database Management', 5, '2022-03-26 21:07:56', ''),
(3, 'CST 499', 'CST 499 - Software Technology Capstone', 5, '2022-03-26 21:08:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `course` int(11) NOT NULL,
  `enrollDate` date NOT NULL,
  `courseName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `cgpa` decimal(10,2) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `password`, `studentName`, `pincode`, `cgpa`, `creationdate`, `updationDate`) VALUES
('1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Kevin', '1234', '0.00', '2022-03-28 07:04:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentID`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '1234', 0x3a3a3100000000000000000000000000, '2022-03-26 21:02:55', '', 1),
(2, '1234', 0x3a3a3100000000000000000000000000, '2022-03-26 21:09:00', '27-03-2022 11:50:39 PM', 1),
(3, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 18:45:50', '28-03-2022 02:25:34 AM', 1),
(4, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 20:59:36', '', 1),
(5, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:00:36', '', 1),
(6, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:00:49', '28-03-2022 02:31:35 AM', 1),
(7, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:01:39', '', 1),
(8, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:02:06', '', 1),
(9, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:02:14', '', 1),
(10, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:02:26', '28-03-2022 02:33:45 AM', 1),
(11, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:29:26', '28-03-2022 03:00:58 AM', 1),
(12, '1234', 0x3a3a3100000000000000000000000000, '2022-03-27 21:34:06', '', 1),
(13, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 03:36:31', '28-03-2022 09:11:53 AM', 1),
(14, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 03:51:20', '', 1),
(15, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 03:51:45', '', 1),
(16, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 03:52:15', '', 1),
(17, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 03:52:30', '28-03-2022 09:22:46 AM', 1),
(18, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 03:52:50', '28-03-2022 09:23:06 AM', 1),
(19, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 04:03:33', '28-03-2022 09:33:36 AM', 1),
(20, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 05:50:16', '', 1),
(21, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 05:51:47', '', 1),
(22, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 05:52:29', '28-03-2022 11:31:42 AM', 1),
(23, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 06:46:28', '28-03-2022 12:16:33 PM', 1),
(24, '4321', 0x3a3a3100000000000000000000000000, '2022-03-28 06:46:37', '', 1),
(25, '1122', 0x3a3a3100000000000000000000000000, '2022-03-28 06:49:15', '28-03-2022 12:26:23 PM', 1),
(26, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 06:56:42', '28-03-2022 12:28:02 PM', 1),
(27, '1234', 0x3a3a3100000000000000000000000000, '2022-03-28 07:05:03', '28-03-2022 12:51:23 PM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
