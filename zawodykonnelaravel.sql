-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 11:12 AM
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
-- Database: `zawodykonnelaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Spots` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CreationDateTime` date NOT NULL DEFAULT current_timestamp(),
  `EditDateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`Id`, `Name`, `StartDate`, `EndDate`, `Type`, `Spots`, `IsActive`, `CreationDateTime`, `EditDateTime`) VALUES
(1, 'Jumping competition', '2023-07-06', '2023-08-17', 'Jumping', 50, 1, '2023-05-31', '2023-06-01'),
(2, 'Dressage competition', '2023-06-08', '2023-07-14', 'Dressage', 80, 1, '2023-05-31', '2023-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `competition_entry`
--

CREATE TABLE `competition_entry` (
  `Id` int(11) NOT NULL,
  `CompetitionId` int(11) NOT NULL,
  `HorseId` int(11) NOT NULL,
  `RiderId` int(11) NOT NULL,
  `Accommodation` varchar(5) NOT NULL,
  `PaymentType` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `IsActiveEntry` tinyint(1) NOT NULL,
  `CreationDateTime` date NOT NULL DEFAULT current_timestamp(),
  `EditDateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competition_entry`
--

INSERT INTO `competition_entry` (`Id`, `CompetitionId`, `HorseId`, `RiderId`, `Accommodation`, `PaymentType`, `Phone`, `IsActiveEntry`, `CreationDateTime`, `EditDateTime`) VALUES
(1, 1, 2, 1, 'Yes', 'Credit Card', '787787787', 1, '2023-05-31', '2023-05-31'),
(2, 2, 2, 1, 'No', 'Credit Card', '787787787', 1, '2023-05-31', '2023-05-31'),
(3, 2, 4, 2, 'No', 'Choose the payment option.', 'a', 1, '2023-06-01', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `horse`
--

CREATE TABLE `horse` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Height` decimal(10,0) NOT NULL,
  `Race` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Coat` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `PhotoURL` varchar(1000) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CreationDateTime` date DEFAULT current_timestamp(),
  `EditDateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horse`
--

INSERT INTO `horse` (`Id`, `Name`, `MotherName`, `FatherName`, `Gender`, `Height`, `Race`, `Birthdate`, `Coat`, `Country`, `PhotoURL`, `IsActive`, `CreationDateTime`, `EditDateTime`) VALUES
(1, 'Riley Star', 'Starlette', 'Rowan', 'Gelding', '165', 'Thoroughbred', '2018-06-06', 'Dapple Gray', 'Poland', 'https://horsevills.com/wp-content/uploads/2021/07/names-for-grey-horses-3-1024x683.jpg', 1, NULL, '2023-06-10'),
(2, 'Lirose', 'Larose', 'Leroy', 'Mare', '160', 'Race', '2019-05-29', 'Bay', 'Poland', 'https://www.joyfulequestrian.com/wp-content/uploads/2022/07/Bay-Horses.jpg', 1, '2023-05-29', '2023-06-10'),
(3, 'Name', 'Name', 'Name', 'value=', '123', '1', '2023-05-30', '1', '1', '1', 0, '2023-05-30', '2023-05-30'),
(4, '1', '1', '1', 'Mare', '1', '1', '2023-05-30', '1', '1', '1', 0, '2023-05-30', '2023-05-30'),
(5, '1', '1', '1', 'Stallion', '1', '1', '2023-05-30', '1', '1', '1', 0, '2023-05-30', '2023-05-30'),
(6, 'Suzy', 'Suzette', 'Sven', 'Mare', '162', 'Missouri Fox Trotter', '2015-08-12', 'Palomino', 'Germany', 'https://www.helpfulhorsehints.com/wp-content/uploads/palomino-quarter-horse-ss220827-1024x597.jpg.webp', 0, '2023-05-30', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `RidersClub` varchar(100) NOT NULL,
  `PhotoURL` varchar(100) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CreationDateTime` date NOT NULL DEFAULT current_timestamp(),
  `EditDateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`Id`, `Name`, `Surname`, `Birthdate`, `Gender`, `Country`, `RidersClub`, `PhotoURL`, `IsActive`, `CreationDateTime`, `EditDateTime`) VALUES
(1, 'Agata', 'Kot', '1996-06-12', 'Female', 'Poland', 'Polish Riders', 'https://i.imgur.com/EmNpMiO.jpeg', 1, '2023-05-30', '2023-06-10'),
(2, 'Suzy', 'Kot', '2000-01-01', 'Female', 'Germany', 'German Riders', 'https://i.imgur.com/AAqL8RQ.jpg', 1, '2023-06-01', '2023-06-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `competition_entry`
--
ALTER TABLE `competition_entry`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `competition_id` (`CompetitionId`),
  ADD KEY `horse_id` (`HorseId`),
  ADD KEY `rider_id` (`RiderId`);

--
-- Indexes for table `horse`
--
ALTER TABLE `horse`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `competition_entry`
--
ALTER TABLE `competition_entry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horse`
--
ALTER TABLE `horse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition_entry`
--
ALTER TABLE `competition_entry`
  ADD CONSTRAINT `competition_entry_ibfk_1` FOREIGN KEY (`CompetitionId`) REFERENCES `competition` (`Id`),
  ADD CONSTRAINT `competition_entry_ibfk_2` FOREIGN KEY (`HorseId`) REFERENCES `horse` (`Id`),
  ADD CONSTRAINT `competition_entry_ibfk_3` FOREIGN KEY (`RiderId`) REFERENCES `rider` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
