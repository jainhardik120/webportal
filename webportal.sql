-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `code`) VALUES
('admin', '179001AS');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `cid` int(11) DEFAULT NULL,
  `eno` int(11) DEFAULT NULL,
  `attend_date` date DEFAULT NULL,
  `attend` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`cid`, `eno`, `attend_date`, `attend`) VALUES
(112, 21103185, '2022-11-25', 0),
(112, 21103185, '2022-11-24', 0),
(112, 21103185, '2022-11-23', 1),
(112, 21103185, '2022-11-22', 1),
(115, 21103185, '2022-11-23', 1),
(112, 21103185, '2022-11-18', 0),
(112, 21103182, '2022-11-18', 0),
(112, 21103185, '2022-11-30', 0),
(112, 21103182, '2022-11-30', 0),
(112, 21103185, '2022-11-30', 1),
(112, 21103182, '2022-11-30', 1),
(112, 21103185, '2022-11-25', 1),
(112, 21103182, '2022-11-25', 0),
(112, 21103185, '2022-11-08', 1),
(112, 21103182, '2022-11-08', 0),
(112, 21103185, '2022-11-09', 0),
(112, 21103182, '2022-11-09', 0),
(123, 21103185, '2022-11-24', 1),
(123, 21103182, '2022-11-24', 1),
(123, 21103185, '2022-11-12', 1),
(123, 21103182, '2022-11-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `deptId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `name`, `deptId`) VALUES
(123, 'SDF-2 Lab', 1),
(112, 'Physics-2', 2),
(115, 'SDF-2', 1),
(119, 'Probability', 10);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `name`) VALUES
(1, 'CSE'),
(2, 'ECE'),
(3, 'HSS'),
(10, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `eno` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`eno`, `cid`) VALUES
(21103185, 112),
(21103185, 115),
(21103182, 112),
(21103182, 115),
(21103195, 112),
(21103195, 115),
(21103184, 112),
(21103184, 115),
(21103185, 123),
(21103182, 123),
(21103180, 115);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `eno` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `exam_event` varchar(20) DEFAULT NULL,
  `marks_obtained` int(11) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`eno`, `cid`, `exam_event`, `marks_obtained`, `total_marks`) VALUES
(21103185, 112, 'T1 ODD 2022', 19, 20),
(21103182, 112, 'T1 ODD 2022', 18, 20),
(21103195, 112, 'T1 ODD 2022', 10, 20),
(21103184, 112, 'T1 ODD 2022', 14, 20),
(21103185, 112, 'T2 ODD 2022', 19, 20),
(21103182, 112, 'T2 ODD 2022', 20, 20),
(21103195, 112, 'T2 ODD 2022', 10, 20),
(21103184, 112, 'T2 ODD 2022', 12, 20),
(21103185, 123, 'T2 ODD 2022', 20, 20),
(21103182, 123, 'T2 ODD 2022', 20, 20),
(21103185, 112, 'End Sem', 30, 35),
(21103182, 112, 'End Sem', 31, 35),
(21103195, 112, 'End Sem', 10, 35),
(21103184, 112, 'End Sem', 15, 35);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `eid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `batch` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`eid`, `cid`, `batch`) VALUES
(199012, 112, 'B7'),
(199014, 123, 'B7'),
(199012, 112, 'B8');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `eno` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `batch` varchar(4) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`eno`, `name`, `batch`, `code`) VALUES
(21103185, 'Hardik Jain', 'B7', '179001AS'),
(21103182, 'Keshav Khandelwal', 'B7', '179001AS'),
(21103195, 'Siddhant Kumar', 'B7', '179001AS'),
(21103184, 'Varun Malik', 'B7', '179001AS'),
(21102106, 'Aditya Kushwaha', 'A5', '179001AS'),
(21103180, 'Abhay Pratap', 'B7', '179001AS');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `eid` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `deptId` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`eid`, `name`, `deptId`, `code`) VALUES
(199012, 'Ashish Bhatnagar', 2, '179001AS'),
(199013, 'Ankita Wadhwa', 1, '179001AS'),
(199014, 'Sherry Garg', 1, '179001AS'),
(199018, 'Parmeet Kaur Sodhi', 1, '179001AS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
