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
-- Database: `hospitals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `Date_create`) VALUES
(1, 'admin', '12345', '2021-07-15 11:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `Bed_No` int(11) NOT NULL,
  `Bed_Name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `Bed_Id` varchar(11) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `image5` varchar(100) NOT NULL,
  `Date_Admitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`Bed_No`, `Bed_Name`, `description`, `capacity`, `Bed_Id`, `image1`, `image2`, `image3`, `image4`, `image5`, `Date_Admitted`) VALUES
(9, 'Room52', 'This is 1st class room and more facilities included.', '6', '1', 'images (3).jpg', 'images (2).jpg', 'images (1).jpg', 'istockphoto-824894342-612x612.jpg', 'photo-1512678080530-7760d81faba6.jpg', '2021-07-15 10:12:58'),
(10, 'Room13', 'Medium size room. Facilities also same to 1st class room but only 1 bathroom included that room.', '3', '5', 'hospital-room-beds-comfortable-medical-260nw-388775896.jpg', 'download.jpg', 'original.jpg', '16025111dff57e9916ccbf55b4705197.jpg', 'istockphoto-1163664388-612x612.jpg', '2021-07-15 10:21:47'),
(11, 'Room19', 'If you want to small room with high facilities ,You can book this room.', '2', '6', 'original.jpg', '16025111dff57e9916ccbf55b4705197.jpg', 'istockphoto-1163664388-612x612.jpg', 'images (1).jpg', 'istockphoto-824894342-612x612.jpg', '2021-07-15 10:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `bedding`
--

CREATE TABLE `bedding` (
  `ID` int(11) NOT NULL,
  `room` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `Patient` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Status` int(15) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bedding`
--

INSERT INTO `bedding` (`ID`, `room`, `patient_id`, `Patient`, `Address`, `Status`, `Date`) VALUES
(10, '4', 'hasanthamadushan32@gmail.com', NULL, NULL, NULL, '2021-07-15 10:16:35'),
(11, '5', 'hasanthamadushan32@gmail.com', 'dwf', 'afaaas', 2, '2021-07-15 11:03:18'),
(14, '1', 'saman32@gmail.com', NULL, NULL, 1, '2021-07-15 11:02:34'),
(15, '5', NULL, NULL, NULL, 1, '2021-07-15 10:21:47'),
(16, '6', NULL, NULL, NULL, 1, '2021-07-15 10:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `Room` varchar(100) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `Room`, `Date_created`) VALUES
(1, 'Male', '2020-02-15 16:54:15'),
(2, 'Female', '2020-02-16 10:23:29'),
(3, 'Children', '2020-02-16 10:23:37'),
(4, 'Intensive', '2020-02-16 10:23:48'),
(5, 'Emergency', '2020-02-16 10:23:58'),
(6, 'Discharged', '2020-02-16 10:24:15'),
(7, 'Reception', '2020-02-16 10:24:29'),
(9, 'B13', '2021-07-12 11:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Full_Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `Mobile` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Blood` varchar(3) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date Register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Last_Update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Full_Name`, `Address`, `City`, `dob`, `Mobile`, `Email`, `Blood`, `Category`, `Password`, `Date Register`, `Last_Update`) VALUES
(5, 'Hasantha', '433/A/24 ,Peradeniya Rd ,Kandy', 'Kandy', '2021-07-13', 815324663, 'hasanthamadushan32@gmail.com', 'A+', 'Male', '1234', '2021-07-12 10:33:11', NULL),
(6, 'Saman', '112/f/3,Battaramulla,Colombo.', 'Colombo', '2021-07-09', 715533425, 'saman32@gmail.com', 'B+', 'Children', '123', '2021-07-15 10:56:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`Bed_No`);

--
-- Indexes for table `bedding`
--
ALTER TABLE `bedding`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `Bed_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bedding`
--
ALTER TABLE `bedding`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
