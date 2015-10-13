-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 12:42 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `admin_password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `admin_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `admin_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_email`, `admin_password`, `admin_name`, `admin_date`) VALUES
('admin@admin.admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin', '2015-09-23 14:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` smallint(6) NOT NULL,
  `class_title` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `class_start` date NOT NULL,
  `class_descr` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `class_cost` decimal(6,2) NOT NULL,
  `class_instr` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_title`, `class_start`, `class_descr`, `class_cost`, `class_instr`) VALUES
(1, 'JavaScript', '0000-00-00', 'Test of Update', '33.25', 'JavaScript'),
(2, 'Beginning PHP and MySQL', '0000-00-00', 'Just a Test to test', '12.12', 'LazyMies'),
(3, 'Bootstrap', '1111-11-11', 'Bootstrap tutorial', '11.11', 'LazyMies'),
(4, 'Android', '1111-11-11', '12321321', '11.11', 'Lazy');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` smallint(6) NOT NULL,
  `class_id` smallint(6) NOT NULL,
  `student_email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `student_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `student_password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `student_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_email`, `student_name`, `student_password`, `student_date`) VALUES
('student2@student2.com', 'student2', 'c241e7b7811ffbe3faba5b193717a46f9643eab1', '2015-10-06 09:42:09'),
('student3@student3.com', 'student3', '32be4bedbd3a8539503a9bbbe72f9d84956affa1', '2015-09-25 07:59:44'),
('student@student.com', 'student', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', '2015-09-25 17:00:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` smallint(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
