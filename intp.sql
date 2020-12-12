-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2020 at 03:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `app_id` int(200) NOT NULL,
  `pat_id` int(200) NOT NULL,
  `pat_name` text NOT NULL,
  `doc_id` int(200) NOT NULL,
  `doc_name` text NOT NULL,
  `app_sub` text NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `app_location` text NOT NULL,
  `app_status` text NOT NULL,
  `app_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_register`
--

CREATE TABLE `doctor_register` (
  `doc_id` int(200) NOT NULL,
  `doc_name` text NOT NULL,
  `doc_specializn` text NOT NULL,
  `doc_gender` text NOT NULL,
  `doc_mail` text NOT NULL,
  `ratings` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_login`
--

CREATE TABLE `doc_login` (
  `doc_id` int(200) NOT NULL,
  `doc_mail` text NOT NULL,
  `doc_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_pat`
--

CREATE TABLE `doc_pat` (
  `reltn_id` int(200) NOT NULL,
  `doc_id` int(200) NOT NULL,
  `pat_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_pat_report`
--

CREATE TABLE `doc_pat_report` (
  `sr_no` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pat_id` int(200) NOT NULL,
  `report_date` date NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `report_descript` varchar(70) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_profile`
--

CREATE TABLE `doc_profile` (
  `doc_id` int(200) NOT NULL,
  `doc_dob` date NOT NULL,
  `doc_age` text NOT NULL,
  `doc_contact` text NOT NULL,
  `doc_designatn` text NOT NULL,
  `doc_experience` text NOT NULL,
  `doc_edu` text NOT NULL,
  `doc_hospital_name` text NOT NULL,
  `doc_hospital_add` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_health_info`
--

CREATE TABLE `pat_health_info` (
  `pat_id` int(200) NOT NULL,
  `chest_pain` text NOT NULL,
  `short_breath` text NOT NULL,
  `diabetes` text NOT NULL,
  `bp` text NOT NULL,
  `alcohol` text NOT NULL,
  `smoke` text NOT NULL,
  `stress` text NOT NULL,
  `exercise` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_login`
--

CREATE TABLE `pat_login` (
  `pat_id` int(200) NOT NULL,
  `pat_email` text NOT NULL,
  `pat_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_profile`
--

CREATE TABLE `pat_profile` (
  `pat_id` int(200) NOT NULL,
  `pat_dob` date NOT NULL,
  `pat_age` text NOT NULL,
  `pat_address` text NOT NULL,
  `pat_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_register`
--

CREATE TABLE `pat_register` (
  `pat_id` int(200) NOT NULL,
  `pat_name` text NOT NULL,
  `pat_gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `name_card` varchar(40) NOT NULL,
  `card_no` text NOT NULL,
  `exp_date` text NOT NULL,
  `cvv` varchar(11) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_state`
--

CREATE TABLE `rating_state` (
  `rt_id` int(200) NOT NULL,
  `pat_id` int(200) NOT NULL,
  `doc_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `doctor_register`
--
ALTER TABLE `doctor_register`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doc_login`
--
ALTER TABLE `doc_login`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doc_pat`
--
ALTER TABLE `doc_pat`
  ADD PRIMARY KEY (`reltn_id`);

--
-- Indexes for table `doc_pat_report`
--
ALTER TABLE `doc_pat_report`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `doc_profile`
--
ALTER TABLE `doc_profile`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `pat_health_info`
--
ALTER TABLE `pat_health_info`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `pat_login`
--
ALTER TABLE `pat_login`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `pat_profile`
--
ALTER TABLE `pat_profile`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `pat_register`
--
ALTER TABLE `pat_register`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `rating_state`
--
ALTER TABLE `rating_state`
  ADD PRIMARY KEY (`rt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `app_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `doc_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_pat`
--
ALTER TABLE `doc_pat`
  MODIFY `reltn_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_pat_report`
--
ALTER TABLE `doc_pat_report`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pat_register`
--
ALTER TABLE `pat_register`
  MODIFY `pat_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_state`
--
ALTER TABLE `rating_state`
  MODIFY `rt_id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
