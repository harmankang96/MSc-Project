-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 06:48 PM
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
-- Database: `mscproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `adminId` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `adminId`, `Password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `alllecturers`
--

CREATE TABLE `alllecturers` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lecturer_ID` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alllecturers`
--

INSERT INTO `alllecturers` (`ID`, `name`, `lecturer_ID`, `gender`, `availability`) VALUES
(3, 'Shazia Hussain', 'smh12', 'Female', '4');

-- --------------------------------------------------------

--
-- Table structure for table `allstudents`
--

CREATE TABLE `allstudents` (
  `ID` int(11) NOT NULL,
  `student_ID` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allstudents`
--

INSERT INTO `allstudents` (`ID`, `student_ID`, `first_name`, `last_name`, `dob`, `gender`, `course`, `result`) VALUES
(2, 'Alpha12', 'saira', 'maryum', '2021-05-06', 'female', 'all SUBJECTS', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `ID` int(11) NOT NULL,
  `lecturerId` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`ID`, `lecturerId`, `full_name`, `email`, `password`) VALUES
(5, 'shazia1', 'shazia hussain', 'sh1@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'shazia', 'shazia', 'sh12@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `userId`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'SM12', 'Saira', 'Fatima', 's123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'saira1', 'Saira', 'Maryum', 's12@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
(4, 'saira1', 'Saira', 'Maryum', 's1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `alllecturers`
--
ALTER TABLE `alllecturers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `allstudents`
--
ALTER TABLE `allstudents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alllecturers`
--
ALTER TABLE `alllecturers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `allstudents`
--
ALTER TABLE `allstudents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
