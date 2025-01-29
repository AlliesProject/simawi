-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 03:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simrs_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `ID` int(11) NOT NULL,
  `RecordNumber` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birth` date NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `BloodType` enum('A','B','AB','O') NOT NULL,
  `Weight` float NOT NULL,
  `Height` float NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `RecordNumber`, `Name`, `Birth`, `NIK`, `Phone`, `Address`, `BloodType`, `Weight`, `Height`, `CreatedAt`, `UpdatedAt`) VALUES
(2, 1, 'fafaagsa', '2025-01-16', '241251521', '52523', 'asgasg', 'B', 33, 434, '2025-01-29 06:24:56', '2025-01-29 06:24:56'),
(3, 2, 'hsdhsdh', '2025-01-15', '642363', '3734', 'df', 'AB', 44, 44, '2025-01-29 06:25:06', '2025-01-29 06:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `ID` int(11) NOT NULL,
  `RecordNumber` int(11) NOT NULL,
  `DateVisit` date NOT NULL,
  `RegisteredBy` int(11) NOT NULL,
  `ConsultationBy` int(11) NOT NULL,
  `Symptoms` text DEFAULT NULL,
  `DoctorDiagnose` text DEFAULT NULL,
  `ICD10Code` varchar(100) DEFAULT NULL,
  `ICD10Name` text DEFAULT NULL,
  `isDone` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`ID`, `RecordNumber`, `DateVisit`, `RegisteredBy`, `ConsultationBy`, `Symptoms`, `DoctorDiagnose`, `ICD10Code`, `ICD10Name`, `isDone`) VALUES
(1, 1, '2025-01-29', 1, 3, 'fsafasgag', 'sagsa', '1762461746', 'Coagulation defects, purpura or other haemorrhagic or related conditions', '1'),
(2, 2, '2025-01-29', 1, 3, 'fbxbdfndn', 'hfdhfd', '944754984', 'Neoplasms of haematopoietic or lymphoid tissues', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Role` enum('Admin','Doctor') DEFAULT 'Admin',
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Email`, `Password`, `Name`, `Role`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin', 'Admin', '2025-01-28 16:12:25', '2025-01-29 13:30:50'),
(2, 'doctor@gmail.com', 'b3666d14ca079417ba6c2a99f079b2ac', 'Doctor A', 'Doctor', NULL, '2025-01-29 15:48:04'),
(3, 'super@gmail.com', '1b3231655cebb7a1f783eddf27d254ca', 'dasd', 'Doctor', NULL, '2025-01-29 13:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
