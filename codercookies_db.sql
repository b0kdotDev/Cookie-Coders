-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20231018.1c54fb853e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 11:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codercookies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Ken', 'admin', 9185723894, 'shee@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int(5) NOT NULL,
  `Grade` int(11) DEFAULT NULL,
  `Section` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `Grade`, `Section`, `CreationDate`) VALUES
(2, 7, 'B', '2022-01-13 10:42:35'),
(12, 9, 'A', '2023-10-10 04:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbllesson`
--

CREATE TABLE `tbllesson` (
  `LessonID` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `thumbnail` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllesson`
--

INSERT INTO `tbllesson` (`LessonID`, `title`, `thumbnail`, `CreationDate`) VALUES
(6, 'Ken', '', '2023-10-19 07:41:03'),
(7, 'img', '', '2023-10-19 08:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `page_id` int(11) NOT NULL,
  `lesson_id` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `page_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`page_id`, `lesson_id`, `content`, `page_number`) VALUES
(1, '6', '<p>,fhewawrfhwgh</p>\r\n', '1'),
(2, '7', '<p><img alt=\"\" src=\"http://localhost/codercookies/admin/lesson/uploads/547173047.png\" style=\"height:400px; margin-left:50px; margin-right:50px; width:400px\" /></p>\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `StudentID` int(10) NOT NULL,
  `StudFirstname` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `StudMiddlename` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `StudLastname` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `StudentEmail` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `StudentClass` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Gender` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `StuID` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `UserName` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Image` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`StudentID`, `StudFirstname`, `StudMiddlename`, `StudLastname`, `StudentEmail`, `StudentClass`, `Gender`, `DOB`, `StuID`, `UserName`, `Password`, `Image`, `DateofAdmission`) VALUES
(6, 'John Ken', 'Mark', 'Leb', 'ken@gmail.com', '2', 'Male', NULL, '2020-1234-A', 'Ken', 'sherry', 'cf6a0c606e3fa7c727f7d1a1693251cc1696890583.jpg', '2023-10-09 22:29:43'),
(7, 'Sherry', 'villa', 'Ann', 'shee@gmail.com', '2', 'Female', '2014-02-13', '2020-4567-A', 'Sherry', 'aacdcaab42f85782dbafce7a5d26b4b1', '7966dba32981c8d8cdf276bf22fa15e71697070083.png', '2023-10-12 00:21:23'),
(8, 'John', 'Mark', 'Lebron', 'john@gmail.com', '2', 'Male', '2001-09-28', '1234-9876-A', 'John', '827ccb0eea8a706c4c34a16891f84e7b', 'a4f5747644f7ef49801c8a35753f24911697464008jpeg', '2023-10-16 13:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `TeacherID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `TeacherEmail` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `TeachID` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`TeacherID`, `Firstname`, `Middlename`, `Lastname`, `TeacherEmail`, `Gender`, `TeachID`, `UserName`, `Password`, `Image`) VALUES
(2, 'Ken', 'Minaves', 'Chino', 'Ken@admin.com', 'Male', '1234-5678-A', 'Kendra', '72c1f0bce31fa7e1ba3b0051195d7cce', '3be0fade9823cd0cd3fba86ff76a4aed1697070804.png'),
(3, 'Ken', 'Chino', 'Minaves', 'Ken@admin.com', 'Male', '2020-1112-A', 'kenchino', '27578ae8d8814212874e7d116b54cca6', '0e8a1a59eda7731c2531c0e9c0a6cafd1697255367.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacherclass`
--

CREATE TABLE `tblteacherclass` (
  `id` int(10) NOT NULL,
  `TeacherID` int(10) NOT NULL,
  `SectionID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `LessonID` int(11) NOT NULL,
  `QuizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllesson`
--
ALTER TABLE `tbllesson`
  ADD PRIMARY KEY (`LessonID`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbllesson`
--
ALTER TABLE `tbllesson`
  MODIFY `LessonID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `StudentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
