-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 11:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arogya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'arogya', '16-07-2021 12:34:58 PM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(10, 'Dentist', 10, 10, 2000, '2021-07-20', '5:30 PM', '2021-07-18 11:48:31', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `specilization` varchar(150) NOT NULL,
  `doctorid` varchar(150) NOT NULL,
  `userid` varchar(150) NOT NULL,
  `fees` varchar(150) NOT NULL,
  `appdate` varchar(150) NOT NULL,
  `ATime` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cardname` varchar(150) NOT NULL,
  `cardnumber` varchar(150) NOT NULL,
  `cardex` varchar(150) NOT NULL,
  `cardyear` varchar(150) NOT NULL,
  `cvv` varchar(150) NOT NULL,
  `paidstatus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `specilization`, `doctorid`, `userid`, `fees`, `appdate`, `ATime`, `fname`, `email`, `cardname`, `cardnumber`, `cardex`, `cardyear`, `cvv`, `paidstatus`) VALUES
(4, 'Dentist', '10', '10', '2000', '2021-07-20', '5:30 PM', 'Kamal', 'kamal@gmail.com', 'Kamal Gunawardhane', '3133-4902-2424-2421', 'September', '2022', '532', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(10, 'Dentist', 'Amal Perera', '433/A/24 ,Katunayake Rd,Colombo.', '2000', 715765334, 'amalperera53@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-17 16:39:34', '2021-07-18 11:35:25'),
(11, 'Gynecologist/Obstetrician', 'Kamal Anuradha', '422/A/42,Battaramulla Rd,Colombo', '2000', 714778773, 'kamalanuradha42@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-17 16:42:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(33, 10, 'amalperera53@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-17 16:46:05', '17-07-2021 10:17:24 PM', 1),
(34, NULL, '@demo.com', 0x3a3a3100000000000000000000000000, '2021-07-18 11:33:37', NULL, 0),
(35, NULL, 'Dentist', 0x3a3a3100000000000000000000000000, '2021-07-18 11:34:11', NULL, 0),
(36, 10, 'amalperera53@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 11:34:36', '18-07-2021 05:14:34 PM', 1),
(37, 10, 'amalperera53@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 12:03:41', '18-07-2021 05:38:21 PM', 1),
(38, 10, 'amalperera53@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 18:19:08', '18-07-2021 11:49:52 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(13, '	Gynecologist/Obstetrician', '2021-07-18 11:57:00', NULL),
(14, 'General Physician', '2021-07-18 11:57:19', NULL),
(15, 'Dermatologist', '2021-07-18 11:57:39', NULL),
(16, 'Homeopath', '2021-07-18 11:57:57', NULL),
(17, 'Ayurveda', '2021-07-18 11:58:08', NULL),
(18, 'Dentist', '2021-07-18 11:58:20', NULL),
(19, 'Ear-Nose-Throat (Ent) Specialist', '2021-07-18 11:58:36', NULL),
(20, 'Demo test', '2021-07-18 11:58:50', NULL),
(21, 'Bones Specialist demo', '2021-07-18 11:59:02', NULL),
(22, 'Test', '2021-07-18 11:59:17', NULL),
(23, 'Dermatologist', '2021-07-18 11:59:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(8, 7, '56', '123', '62', '89', 'Paracitamol,Suger Tablets', '2021-07-18 12:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(7, 10, 'Supun Gunawardhana', 717744249, 'supun22@gmail.com', 'male', '74/V/21,New Kandy Rd,Colombo.', 42, 'no medical history', '2021-07-18 11:38:48', NULL),
(8, 10, 'Rashmika Gimhani', 717537223, 'rashmi89@gmail.com', 'female', '72/D/91,Mattakkuliya Rd,Colombo 7', 52, 'Admitted many hospitals for gastritis in many years.', '2021-07-18 11:42:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(40, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-17 16:30:39', NULL, 0),
(41, NULL, 'Kamal', 0x3a3a3100000000000000000000000000, '2021-07-17 16:32:15', NULL, 0),
(42, NULL, 'Kamal', 0x3a3a3100000000000000000000000000, '2021-07-17 16:33:25', NULL, 0),
(43, NULL, 'Kamal', 0x3a3a3100000000000000000000000000, '2021-07-17 16:34:26', NULL, 0),
(44, 10, 'kamal@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-17 16:34:44', '17-07-2021 10:05:13 PM', 1),
(45, 10, 'kamal@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-17 16:35:34', '17-07-2021 10:06:24 PM', 1),
(46, NULL, 'supun22@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 11:45:47', NULL, 0),
(47, 10, 'kamal@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 11:46:26', '18-07-2021 05:21:34 PM', 1),
(48, 10, 'kamal@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 12:09:24', '18-07-2021 05:40:30 PM', 1),
(49, 11, 'namal@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 18:10:50', '18-07-2021 11:41:15 PM', 1),
(50, 10, 'kamal@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-18 18:20:18', '18-07-2021 11:50:39 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(10, 'Kamal', '433/A/24 ,Peradeniya Rd ,Kandy', 'Kandy', 'male', 'kamal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-17 16:34:05', NULL),
(12, 'Saman', '433/A/24 ,Peradeniya Rd ,Kandy', 'Kandy', 'male', 'saman32@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-18 18:16:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
