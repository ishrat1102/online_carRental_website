-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 05:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `a_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`a_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'njaben72@gmail.com', '$2y$10$MMcYEy2pCI7mjl3/mAIa4.QgVBYxzaUw/znH0AgWAA90df8luCWgm');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_year` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `image`, `brand`, `model`, `model_year`, `seat`, `fuel`, `price`) VALUES
(48, 'for.jpg', ' Toyota', 'Fortuner', '2015', '7', 'Disel', '3000'),
(49, 'cor.jpg', ' Toyota', 'Corolla', '2019 ', '4', 'Gas', '1500'),
(50, 'rsz_noah_w1920_01.jpg', ' Toyota', 'Noah', '2019', '8', 'Petrol', '4000'),
(51, 'toyota-allion-8.jpg', ' Toyota', 'Allion', '2016', '5', 'Petrol', '2000'),
(52, 'axio.jpg', ' Toyota', 'Axio', '2015', '5', 'Petrol', '2000'),
(53, 'rsz_nis.jpg', ' Nissan', 'NV350', '2017', '15', 'Disel', '6000'),
(54, 'mic.jpg', ' Nissan', 'Micra', '2019', '5', 'Petrol', '2000'),
(55, 'apv.jpg', ' Maruti', 'Suzuki- APV', '2018 ', '8', 'Gas', '4000'),
(56, 'maruti-suzuki-swift.jpg', ' Maruti', 'Suzuki  Swift', '2014', '5', 'Disel', '2000'),
(59, 'car1.jpg', ' Toyota', 'Camry', '2019', '4', 'Petrol', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `r_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`r_id`, `user_id`, `username`, `rating`, `comment`) VALUES
(1, 1, 'bushra ', '3.5', 'service was good'),
(3, 2, 'test', '4.5', 'good service.');

-- --------------------------------------------------------

--
-- Table structure for table `rented`
--

CREATE TABLE `rented` (
  `ren_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile Number` varchar(255) NOT NULL,
  `NationalID` varchar(255) NOT NULL,
  `carr_id` int(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_year` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `ren_date` date NOT NULL,
  `total_bill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rented`
--

INSERT INTO `rented` (`ren_id`, `u_id`, `Fullname`, `Email`, `Mobile Number`, `NationalID`, `carr_id`, `brand`, `model`, `model_year`, `seat`, `fuel`, `price`, `pdate`, `ren_date`, `total_bill`) VALUES
(1, 1, 'Ishrat Jaben ', 'ishratbushra02@gmail.com', '+8801789654138', '951357852', 55, ' Maruti', 'Suzuki- APV', '2018 ', '8', 'Gas', '4000', '2022-01-04', '2022-01-09', '24000'),
(3, 1, 'Ishrat Jaben ', 'ishratbushra02@gmail.com', '+8801789654138', '951357852', 55, ' Maruti', 'Suzuki- APV', '2018 ', '8', 'Gas', '4000', '2022-01-10', '2022-01-10', '4000'),
(4, 1, 'Ishrat Jaben ', 'ishratbushra02@gmail.com', '+8801789654138', '951357852', 55, ' Maruti', 'Suzuki- APV', '2018 ', '8', 'Gas', '4000', '2022-01-12', '2022-01-14', '12000'),
(6, 2, 'test', '2018-1-60-099@std.ewubd.edu', '+8801345678900', '951357845', 55, ' Maruti', 'Suzuki- APV', '2018 ', '8', 'Gas', '4000', '2022-01-15', '2022-01-16', '8000'),
(7, 2, 'test', '2018-1-60-099@std.ewubd.edu', '+8801345678900', '951357845', 55, ' Maruti', 'Suzuki- APV', '2018 ', '8', 'Gas', '4000', '2022-01-17', '2022-01-17', '4000'),
(8, 2, 'test', '2018-1-60-099@std.ewubd.edu', '+8801345678900', '951357845', 56, ' Maruti', 'Suzuki  Swift', '2014', '5', 'Disel', '2000', '2022-01-04', '2022-01-09', '12000'),
(9, 2, 'test', '2018-1-60-099@std.ewubd.edu', '+8801345678900', '951357845', 56, ' Maruti', 'Suzuki  Swift', '2014', '5', 'Disel', '2000', '2022-01-10', '2022-01-10', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile Number` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `NationalID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Fullname`, `Username`, `Email`, `Password`, `Mobile Number`, `Gender`, `NationalID`) VALUES
(1, 'Ishrat Jaben ', 'bushra', 'ishratbushra02@gmail.com', '$2y$10$gOLm9Hom.azoFlIlRd856.kDuQ2Yz8dkvPtyyus3vFUydGnfjKnhe', '+8801789654138', 'female', '951357852'),
(2, 'test', 'test', '2018-1-60-099@std.ewubd.edu', '$2y$10$0xZ.VEkTgm5xxqfXiczDC.cipPoHg0IRvr5BIRi4OY4CpPudi.Dcy', '+8801345678900', 'male', '951357845');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `f3` (`user_id`);

--
-- Indexes for table `rented`
--
ALTER TABLE `rented`
  ADD PRIMARY KEY (`ren_id`),
  ADD KEY `f1` (`u_id`),
  ADD KEY `f2` (`carr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `NationalID` (`NationalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `a_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rented`
--
ALTER TABLE `rented`
  MODIFY `ren_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `f3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `rented`
--
ALTER TABLE `rented`
  ADD CONSTRAINT `f1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `f2` FOREIGN KEY (`carr_id`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
