-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 04:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `annex`
--

CREATE TABLE `annex` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `annex`
--

INSERT INTO `annex` (`id`, `name`) VALUES
(1, 'annex1'),
(2, 'annex2'),
(3, 'annex3'),
(4, 'annex4'),
(5, 'annex5'),
(6, 'annex6'),
(7, 'annex7');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `starttime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `endtime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cancelledby` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addedby` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `userid`, `classid`, `courseid`, `status`, `date`, `description`, `starttime`, `endtime`, `cancelledby`, `addedby`) VALUES
(1, 6, 8, 1, 0, '2018-12-15', 'Busy', '8:00', '11:00', '123-45678-1', '123-45678-1'),
(3, 6, 10, 10, 0, '2018-12-16', 'Sick', '12:30', '2:00', '16-31237-1', '16-31237-1'),
(4, 6, 4, 10, 0, '2018-12-22', 'Unavailable', '8:00', '10:00', '16-31237-1', '123-45678-1'),
(5, 6, 4, 10, 0, '2018-12-22', 'I have a meeting', '10:00', '12:00', '123-45678-1', '123-45678-1'),
(6, 6, 9, 1, 1, '2018-12-20', 'Booked', '2:00', '5:00', NULL, '16-31237-1'),
(7, 8, 11, 4, 1, '2018-12-15', 'Booked', '9:30', '11:00', NULL, '123-45678-1'),
(8, 8, 11, 4, 1, '2018-12-15', 'Booked', '11:00', '12:30', NULL, '123-45678-1'),
(9, 8, 11, 4, 1, '2018-12-15', 'Booked', '12:30', '2:00', NULL, '123-45678-1'),
(10, 8, 11, 4, 1, '2018-12-15', 'Booked', '2:00', '3:30', NULL, '123-45678-1');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `roomname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `typeid` int(11) NOT NULL,
  `annexid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `roomname`, `typeid`, `annexid`) VALUES
(4, '3101', 1, 3),
(5, '3102', 1, 3),
(6, '2101', 2, 2),
(7, '2102', 2, 2),
(8, '3201', 2, 3),
(9, '3202', 2, 3),
(10, '5101', 1, 5),
(11, '5102', 1, 5),
(12, '1101', 1, 1),
(13, '3203', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `coursename` text COLLATE utf8_unicode_ci NOT NULL,
  `deptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursename`, `deptid`) VALUES
(1, 'Algorithm', 1),
(2, 'Microprocessor', 3),
(3, 'Econimics', 2),
(4, 'Data Structure', 1),
(5, 'Accountings', 2),
(6, 'Electronic Device', 3),
(7, 'Business Math', 2),
(8, 'Design Model', 5),
(9, 'Digital Electronics', 3),
(10, 'Data Mining', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptname` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptname`) VALUES
(1, 'CSE'),
(2, 'BBA'),
(3, 'EEE'),
(4, 'admin'),
(5, 'ARCHI');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `typename` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `typename`) VALUES
(1, 'Theory'),
(2, 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '2',
  `createdat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`, `phone`, `status`, `type`, `createdat`, `deptid`) VALUES
(5, '123-45678-1', 'Md. Tareq', 'tareq@gmail.com', '202cb962ac59075b964b07152d234b70', '01711769845', 1, 1, '2018-12-03 02:33:35', 4),
(6, '16-31237-1', 'Tanjima Nasreen Jenia', 'tjn.jenia@gmail.com', 'ad946e260f74e67a48092d735c75e1c4', '01711706398', 1, 2, '2018-12-03 02:34:14', 1),
(7, '16-31183-1', 'Khalid Ibne Hasan', 'khalid@gmail.com', 'd6f0d32edb9a5eb5a251defe6830b6c6', '01711706378', 1, 2, '2018-12-10 23:57:32', 3),
(8, '16-31209-1', 'Fariha Rowshan Huda', 'fariha@gmail.com', '80f8bf07961590b8fe7d43a3a640f141', '01711706370', 1, 2, '2018-12-11 08:02:47', 1),
(9, '16-31201-1', 'Luffy', 'a@gmail.com', 'd6f0d32edb9a5eb5a251defe6830b6c6', '01711706390', 0, 2, '2018-12-18 20:55:51', 1),
(10, '16-31181-1', 'Tareq', 'tareq@gmail.com', 'ad946e260f74e67a48092d735c75e1c4', '+8801898266702', 1, 2, '2018-12-15 10:10:03', 1),
(11, '16-31238-1', 'Jenia', 'jenia@gmail.com', 'ad946e260f74e67a48092d735c75e1c4', '01711706398', 1, 2, '2018-12-18 20:38:12', 3),
(33, '15-28792-1', 'Md. Samshad Rahman', 'samshad@gmail.com', 'ad946e260f74e67a48092d735c75e1c4', '01711706397', 1, 2, '2018-12-18 20:38:15', 1),
(35, '16-31235-1', 'Mr. X', 'x@thml.com', '62b96f8b163fea06d09cdbdecd46735f', '01711706345', NULL, 2, '2018-12-18 21:01:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annex`
--
ALTER TABLE `annex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `annexid` (`annexid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deptid` (`deptid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `deptid` (`deptid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annex`
--
ALTER TABLE `annex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`classid`) REFERENCES `classroom` (`id`);

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `roomtype` (`id`),
  ADD CONSTRAINT `classroom_ibfk_2` FOREIGN KEY (`annexid`) REFERENCES `annex` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `department` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `department` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
