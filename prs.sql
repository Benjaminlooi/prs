-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 02:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prs`
--

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petID` int(11) NOT NULL,
  `petName` varchar(50) NOT NULL,
  `petAge` date DEFAULT NULL,
  `petSpecies` varchar(15) DEFAULT NULL,
  `petGender` varchar(6) DEFAULT NULL,
  `petWeight` decimal(5,2) DEFAULT NULL,
  `petBreed` varchar(50) DEFAULT NULL,
  `petColor` varchar(10) DEFAULT NULL,
  `userID` varchar(16) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petID`, `petName`, `petAge`, `petSpecies`, `petGender`, `petWeight`, `petBreed`, `petColor`, `userID`, `status`) VALUES
(1, 'Milo', '2015-10-14', 'Dog', 'Male', '14.53', 'French Bulldog', '#8e5742', 'user', 'Approved'),
(2, 'Fido', '2016-12-03', 'Dog', 'Female', '9.65', 'Akita Inu', '#c57561', 'user', 'Approved'),
(3, 'Kitti', '2011-07-18', 'Cat', 'Female', '6.65', 'Oriental', '#f4e7a4', 'user', 'Approved'),
(4, 'Rocket', '2006-05-30', 'Horse', 'Male', '43.23', 'Percheron', '#af877c', 'user', 'Approved'),
(5, 'Wigglesworth', '2018-03-14', 'Fish', 'Male', '0.65', 'Acanthurus', '#3e39e6', 'user', 'Approved'),
(6, 'Ball Python', '2012-03-16', 'Reptile', 'Male', '1.98', 'Chameleon', '#315139', 'user', 'Approved'),
(7, 'Charlie', '2012-04-15', 'Bird', 'Female', '1.23', 'African Silverbill', '#ed417d', 'user', 'Approved'),
(8, 'Max', '2014-04-17', 'Dog', 'Male', '0.00', 'Basset Hound', '#fae9d1', 'user', 'Incomplete'),
(9, 'Alice', '1973-04-14', 'Unicorn', 'Female', '84.00', 'Chinese Unicorn', '#9b7be6', 'user', 'Pending'),
(10, 'Tyson', '0000-00-00', 'Turtle', '', '0.00', '', '#5f9664', 'user', 'Pending'),
(11, 'Milo', '2013-01-14', 'Dog', 'Male', '9.00', 'Retriever', '#72304f', 'ben', 'Pending'),
(15, 'Mong', '2018-05-04', 'Cat', 'Male', '10.95', 'Village', '#ff5000', 'user', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(16) NOT NULL,
  `userPwd` varchar(16) NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userPwd`, `userType`) VALUES
('admin', '321', 'admin'),
('ben', '123', 'user'),
('user', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
