-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 06:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentenrollmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `staffroletb`
--

CREATE TABLE `staffroletb` (
  `RoleID` int(11) NOT NULL,
  `Rolename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffroletb`
--

INSERT INTO `staffroletb` (`RoleID`, `Rolename`) VALUES
(1, '  Course Administrator'),
(2, 'Program Coordinator'),
(4, '  Operations Manager'),
(5, 'Enrollment Specialist'),
(6, 'Scheduling Manager');

-- --------------------------------------------------------

--
-- Table structure for table `stafftb`
--

CREATE TABLE `stafftb` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `PhoneNo` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `StaffPicture` varchar(100) DEFAULT NULL,
  `RoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stafftb`
--

INSERT INTO `stafftb` (`StaffID`, `StaffName`, `Username`, `Address`, `PhoneNo`, `Email`, `Password`, `StaffPicture`, `RoleID`) VALUES
(5, '   Thet Oo Khin', 'ThetOo690', 'NayPyiTaw', '09685226195', 'thetoo12@gmail.com', 'ThetOo123!@#', 'upload/6768d476afb16_Aloevera.jpg', 5),
(6, '  Kyaw Ko', 'Kokyaw', 'Yangon', '09123456356', 'kyawko131@gmail.com', 'KyawKo123!@#', 'upload/676949597a704_Kyawko.jpg', 2),
(18, 'Khin Lay', 'Khin Wint', 'ygn', '09223456787', 'kyawko131@gmail.com', 'Thetmon123!@#', 'upload/67698941b4433_KhinLay.jpg', 5),
(19, 'Khin Lay', 'Khin Wint', 'ygn', '09223456787', 'kyawko131@gmail.com', 'Mon123!@#', 'upload/676989aa1c169_KhinLay.jpg', 4),
(20, 'olkpoc', 'gfkm', 'opkdv', '09695822270', 'kyawko131@gmail.com', 'Montt123!@#', 'upload/67698b057e303_KhinLay.jpg', 6),
(21, 'zdv', 'kmld', 'vdz', '09440226826', 'kyawko131@gmail.com', 'Kyaw)(*532', 'upload/67698c95edc5d_Kyawko.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studenttb`
--

CREATE TABLE `studenttb` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `PhoneNo` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `StudentPicture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studenttb`
--

INSERT INTO `studenttb` (`StudentID`, `StudentName`, `Username`, `Address`, `PhoneNo`, `Email`, `Password`, `StudentPicture`) VALUES
(2, ' Min Thant', 'MinThant109', 'YGN', '09689718837', 'minthant@gmail.com', 'Min^&*340', 'upload/676a25e805837_Minthant.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staffroletb`
--
ALTER TABLE `staffroletb`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `stafftb`
--
ALTER TABLE `stafftb`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `studenttb`
--
ALTER TABLE `studenttb`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staffroletb`
--
ALTER TABLE `staffroletb`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stafftb`
--
ALTER TABLE `stafftb`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `studenttb`
--
ALTER TABLE `studenttb`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stafftb`
--
ALTER TABLE `stafftb`
  ADD CONSTRAINT `stafftb_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `staffroletb` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
