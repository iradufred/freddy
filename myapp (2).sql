-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 02:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dapartment`
--

CREATE TABLE `dapartment` (
  `IDdpt` int(11) NOT NULL,
  `Departname` varchar(50) DEFAULT NULL,
  `Option` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dapartment`
--

INSERT INTO `dapartment` (`IDdpt`, `Departname`, `Option`) VALUES
(1, 'Crop Production', 'Irrigation'),
(2, 'ICT', 'IT'),
(3, 'ICT', 'IT'),
(4, 'Animal Health', 'Veternary'),
(5, 'Mechanical Engineering', 'Mechanics');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `IDmdl` int(11) NOT NULL,
  `Modname` varchar(50) DEFAULT NULL,
  `Modcode` varchar(10) DEFAULT NULL,
  `TrainerID` int(11) DEFAULT NULL,
  `IDdpt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`IDmdl`, `Modname`, `Modcode`, `TrainerID`, `IDdpt`) VALUES
(1, 'USSD Application', 'ITLUA701', 1, 2),
(2, 'Python & Foundamental AI', 'ITLPA701', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Regno` varchar(20) NOT NULL,
  `FirstName` text DEFAULT NULL,
  `LastName` text DEFAULT NULL,
  `IDmdl` int(11) DEFAULT NULL,
  `Marks` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Regno`, `FirstName`, `LastName`, `IDmdl`, `Marks`) VALUES
('22RP05035', 'IRADUKUNDA', 'frederic', 2, '40');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL,
  `Names` text DEFAULT NULL,
  `Phone` text DEFAULT NULL,
  `Qualification` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`TrainerID`, `Names`, `Phone`, `Qualification`) VALUES
(1, 'NIYIGENA Claver', '0781048680', 'A0'),
(2, 'IRADUKUNDA Sylvion', '0737083014', 'Trainee'),
(3, 'MUKULARINDA Yvonne', '0797083014', 'A0'),
(4, 'MUKAMANA Josiane', '0797999914', 'Lecturer'),
(5, 'NIYIRORA Didace', '0794864441', 'Lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dapartment`
--
ALTER TABLE `dapartment`
  ADD PRIMARY KEY (`IDdpt`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`IDmdl`),
  ADD KEY `const_fk_IDdpt` (`IDdpt`),
  ADD KEY `const_fk_TrainerID` (`TrainerID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Regno`),
  ADD KEY `const_mdt_fk` (`IDmdl`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`TrainerID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `const_fk_IDdpt` FOREIGN KEY (`IDdpt`) REFERENCES `dapartment` (`IDdpt`),
  ADD CONSTRAINT `const_fk_TrainerID` FOREIGN KEY (`TrainerID`) REFERENCES `trainer` (`TrainerID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `const_mdt_fk` FOREIGN KEY (`IDmdl`) REFERENCES `module` (`IDmdl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
