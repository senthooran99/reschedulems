-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 21, 2022 at 02:38 PM
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
-- Database: `reschedule management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EmployeeID` varchar(50) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `ContactNo` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EmployeeID`, `Name`, `ContactNo`, `UserName`, `password`) VALUES
('111654', 'Thusharagan', 776542586, 'thusha', '321456'),
('111789', 'Jathavan', 796537652, 'jathu', '717456'),
('111897', 'Senthooran', 786540119, 'senthu', '519456'),
('3333', 'Diluxhana', 789633214, 'dilux', '123456'),
('999', 'User', 114562584, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`ID`, `Name`) VALUES
('e16', 'Engineering 2016'),
('e17', 'Engineering 2017'),
('e18', 'Engineering 2018'),
('e19', 'Engineering 2019'),
('e20', 'Engineering 2020'),
('e21', 'Engineering 2021'),
('e22', 'Engineering 2022');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `code` varchar(50) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Credits` int(11) NOT NULL,
  `CoordinatorID` varchar(50) NOT NULL,
  `DepartmentID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`code`, `CourseName`, `Credits`, `CoordinatorID`, `DepartmentID`) VALUES
('EC1011', 'Engineering Drawing', 4, '123456', 'D001'),
('EC1054', 'Engineering Drawing', 4, '123456', 'D001'),
('ID2020', 'Engineering Drawing', 4, '123456', 'D001'),
('ID2025', 'Engineering Drawing', 4, '123456', 'D001'),
('ID2044', 'Engineering Drawing', 4, '123456', 'D001'),
('MC3010', 'Engineering Drawing', 4, '123456', 'D001'),
('MC3012', 'Engineering Drawing', 4, '123456', 'D001');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentName` varchar(150) NOT NULL,
  `DepartmentCode` varchar(50) NOT NULL,
  `HOD_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentName`, `DepartmentCode`, `HOD_ID`) VALUES
('Civil and Environmental', 'D001', '123456'),
('Electrical and electronic ', 'D002', '987456'),
('Computer ', 'D003', '456123'),
('Mechanical', 'D004', '654789');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `ID` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Document` blob NOT NULL,
  `Session` varchar(100) NOT NULL,
  `PurposeID` varchar(100) NOT NULL,
  `EmployeeID` varchar(50) NOT NULL,
  `StudentID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--
INSERT INTO `form` (`ID`, `Date`, `Time`, `Document`, `Session`, `PurposeID`, `EmployeeID`, `StudentID`) VALUES
('f002', '0000-00-00', '02:00:00', '', 'End Exam', 'P002', '111897', '2019/E/039'),
('f003', '0000-00-00', '11:00:00', '', 'Assignment', 'P004', '111789', '2019/E/049'),
('f004', '0000-00-00', '09:00:00', '', 'Lectures', 'P001', '111365', '2019/E/061'),
('f011', '0000-00-00', '01:00:00', '', 'Mid Exam', 'P002', '111654', '2019/E/032');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `ID` varchar(50) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Dep_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`ID`, `Name`, `Dep_ID`) VALUES
('111564', 'Maryann', 'D001'),
('123456', 'Fletcher', 'D001'),
('321645', 'Allene', 'D002'),
('456123', 'Veronika', 'D003'),
('654789', 'Willard', 'D004'),
('852963', 'Alisha', 'D003'),
('987456', 'Bette', 'D002');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `PID` varchar(50) NOT NULL,
  `PurposeType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`PID`, `PurposeType`) VALUES
('P001', 'Attendance'),
('P002', 'Makeup Exam'),
('P003', 'Lab Session reshedule'),
('P004', 'Assignment Makeup');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_id` varchar(50) NOT NULL,
  `First_name` varchar(150) NOT NULL,
  `Last_Name` varchar(150) NOT NULL,
  `Dep_ID` varchar(20) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `BatchID` varchar(150) NOT NULL,
  `AdvisorID` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `First_name`, `Last_Name`, `Dep_ID`, `ContactNo`, `BatchID`, `AdvisorID`) VALUES
('2017/E/007', 'Diluxhana', 'Rasenthiram', 'D003', 691501145, 'e17', '987456'),
('2019/E/152', 'vegash', 'rasan', 'D004', 778965214, 'e17', '111564');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentCode`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`BatchID`) REFERENCES `batch` (`ID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`AdvisorID`) REFERENCES `lecturer` (`ID`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`Dep_ID`) REFERENCES `department` (`DepartmentCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
