-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 03:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `road safety monitoring system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidentreports`
--

CREATE TABLE `accidentreports` (
  `ReportID` int(11) NOT NULL,
  `ReportDateTime` datetime NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `VehicleLicensePlate` varchar(20) NOT NULL,
  `VehicleType` varchar(50) NOT NULL,
  `VehicleColor` varchar(50) DEFAULT NULL,
  `DriverName` varchar(50) DEFAULT NULL,
  `DriverContact` varchar(50) DEFAULT NULL,
  `DriverLicense` varchar(50) DEFAULT NULL,
  `WitnessName` varchar(50) DEFAULT NULL,
  `WitnessContact` varchar(50) DEFAULT NULL,
  `Injuries` text DEFAULT NULL,
  `Damages` text DEFAULT NULL,
  `Photos` varchar(255) DEFAULT NULL,
  `AdditionalComments` text DEFAULT NULL,
  `ReporterName` varchar(255) DEFAULT NULL,
  `ReporterContact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accidentreports`
--

INSERT INTO `accidentreports` (`ReportID`, `ReportDateTime`, `Location`, `Description`, `VehicleLicensePlate`, `VehicleType`, `VehicleColor`, `DriverName`, `DriverContact`, `DriverLicense`, `WitnessName`, `WitnessContact`, `Injuries`, `Damages`, `Photos`, `AdditionalComments`, `ReporterName`, `ReporterContact`) VALUES
(2, '2023-06-17 17:21:00', 'Gwarko', 'Scooter Accident', '1234A', 'Scooter', 'Red', 'Ram Thapa', '', '', '', '', 'The victim seems to have sprained ankle', '', 'Array', '', NULL, NULL),
(3, '2023-06-17 17:40:00', 'Balkumari', 'Bike Accident', '2846B', 'Motorcycle', 'Black', '', '', '', '', '', '', '', 'Array', '', NULL, NULL),
(4, '2023-06-18 07:38:00', 'lalitpur', 'accident', '1323456bba', 'scooter', 'black', 'euriks', '9871725', 'jdsf1223', 'bindu', '98272757', 'hand fracture', 'scooty damaqge', 'Array', '', NULL, NULL),
(7, '2023-06-24 12:00:00', 'Gatthaghar', 'Bike accident', '9736BA', 'Motorcycle', 'Red', '', '', '', '', '', '', '', 'Array', '', NULL, NULL),
(11, '2023-07-10 18:40:00', 'Balkumari', 'Motorcycle accident', 'B AB 1822', 'Pulsar 123', 'Black', 'Shyam Gurung', '', '', 'Hari Nepal', '9876543210', 'Leg sprain ', 'Bike headlight damaged', 'images (1).jpg', '', 'Sita Nepal', '9812345678'),
(14, '2023-07-13 22:37:00', 'Gwarko', 'Tipper accident', 'BA JA 7590', 'Tipper', 'White', 'Aaradhya Khatiwada', '987694328', '', 'Barshana Maharjan', '9876543210', 'The drivers head was bleeding', 'The tippers front is broken', 'tipper-0972018100017-1000x0-1172.jpg', '', 'Arya Kafle ', '9801048740');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'traffic1', 'traffic1@gmail.com', '$2y$10$9LhXRpowP7Rg9XrFtGLkjet0TyKkAnWn/ezidGtNi/ue2Nj7eyNHq');

-- --------------------------------------------------------

--
-- Table structure for table `driverfeedback`
--

CREATE TABLE `driverfeedback` (
  `report_id` int(11) NOT NULL,
  `License_Plate_No` varchar(20) NOT NULL,
  `Vehicle` varchar(50) NOT NULL,
  `Driver_Name` varchar(50) DEFAULT NULL,
  `Rating` int(11) NOT NULL,
  `category` enum('Drunk','Good','Overspeeding','Reckless Driving','other') NOT NULL,
  `reporter` varchar(100) NOT NULL,
  `reporter_contact` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driverfeedback`
--

INSERT INTO `driverfeedback` (`report_id`, `License_Plate_No`, `Vehicle`, `Driver_Name`, `Rating`, `category`, `reporter`, `reporter_contact`, `Description`, `Datetime`) VALUES
(1, '0763BA', 'Motorcycle', '', 9, 'Good', '', '', '', '2023-06-24 08:15:12'),
(2, '2334B', 'Scooter', 'Eurika Shahi', 2, 'Drunk', '', '', 'The driver seems drunk', '2023-06-17 13:51:25'),
(3, '456BB', 'Pulsar 150', 'Shyam', 1, 'Reckless Driving', 'Hari', '9872727727', '', '2023-07-10 15:42:28'),
(4, '75884', 'scooter', 'eurika', 5, 'Overspeeding', '', '', '', '2023-06-18 03:54:55'),
(5, '987B', 'Scooter', 'Aarushi Kharel', 2, 'Drunk', '', '', 'The driver seemed to be under the influence of drugs', '2023-06-17 13:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `roadconditionupdates`
--

CREATE TABLE `roadconditionupdates` (
  `UpdateID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Source` enum('User','Server') NOT NULL,
  `road_update_image1` varchar(255) DEFAULT NULL,
  `road_update_image2` varchar(255) NOT NULL,
  `road_update_image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roadconditionupdates`
--

INSERT INTO `roadconditionupdates` (`UpdateID`, `User`, `Timestamp`, `Location`, `Description`, `Source`, `road_update_image1`, `road_update_image2`, `road_update_image3`) VALUES
(7, '', '2023-07-10 17:58:43', 'Balkumari', 'Huge pothole in front of Kathford college', 'Server', 'file-20180824-149463-1hzm435.png', 'file-20180824-149463-1hzm435.png', 'file-20180824-149463-1hzm435.png'),
(13, '', '2023-07-12 23:45:52', 'Balkumari', 'Manhole maintenance in front of Balkumari petrol pump', '', 'ro.jpg', 'ro.jpg', 'ro.jpg'),
(14, '', '2023-07-12 23:50:44', 'Maitighar', 'Muddy puddles', 'User', 'rr.jpg', 'rr.jpg', 'rr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roadreport`
--

CREATE TABLE `roadreport` (
  `reportid` int(11) NOT NULL,
  `updatelocation` varchar(255) NOT NULL,
  `roadcondition` varchar(255) NOT NULL,
  `updaterepoter` varchar(255) NOT NULL,
  `updaterepotercontact` varchar(255) NOT NULL,
  `roadimage1` varchar(255) NOT NULL,
  `roadimage2` varchar(255) DEFAULT NULL,
  `roadimage3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roadreport`
--

INSERT INTO `roadreport` (`reportid`, `updatelocation`, `roadcondition`, `updaterepoter`, `updaterepotercontact`, `roadimage1`, `roadimage2`, `roadimage3`, `created_at`) VALUES
(5, 'Gwarko', 'The construction of flyover bridge has caused two lanes to be blocked. Huge traffic jams', 'Aarati Kharel', '9877771112', 'thumb.php.jpg', 'thumb.php.jpg', 'thumb.php.jpg', '2023-07-13 09:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `SessionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `SessionToken` varchar(255) NOT NULL,
  `ExpirationTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `user_image`, `user_ip`) VALUES
(3, 'ramthapa', '$2y$10$1xRirqUGZAWJzoH7CBo/8O61Yphjcf3SLJQPxW4vzriY9V9SlOSrG', 'ramthapa@gmail.com', '', ''),
(5, 'shyamnepal', '$2y$10$JkwFL.TBueOQ6vlOGNGHtej90.Ao/KRCNOcnL3zqY0pVZ6ddLt5v2', 'shyam@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidentreports`
--
ALTER TABLE `accidentreports`
  ADD PRIMARY KEY (`ReportID`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `driverfeedback`
--
ALTER TABLE `driverfeedback`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `roadconditionupdates`
--
ALTER TABLE `roadconditionupdates`
  ADD PRIMARY KEY (`UpdateID`);

--
-- Indexes for table `roadreport`
--
ALTER TABLE `roadreport`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`SessionID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidentreports`
--
ALTER TABLE `accidentreports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driverfeedback`
--
ALTER TABLE `driverfeedback`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roadconditionupdates`
--
ALTER TABLE `roadconditionupdates`
  MODIFY `UpdateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roadreport`
--
ALTER TABLE `roadreport`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `SessionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
