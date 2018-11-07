-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 09:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE omts;
USE omts;
--
-- Database: `omts`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `Movie_id` int(10) NOT NULL,
  `Actor_fname` varchar(50) NOT NULL,
  `Actor_lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Account_id` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `Phone_num` char(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `Street_num` int(11) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Postal_code` char(6) DEFAULT NULL,
  `Admin_privileges` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Account_id`, `Password`, `Fname`, `Lname`, `Phone_num`, `Email`, `Street`, `Street_num`, `City`, `Province`, `Country`, `Postal_code`, `Admin_privileges`) VALUES
(1, '123', NULL, NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DName` varchar(15) NOT NULL,
  `DNumber` int(11) NOT NULL,
  `MGRSSN` char(11) NOT NULL,
  `MgrStartDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DName`, `DNumber`, `MGRSSN`, `MgrStartDate`) VALUES
('Headquarters', 1, '888665555', '1981-06-19'),
('Administration', 4, '987654321', '1995-01-01'),
('Research', 5, '333445555', '1988-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Account_id` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `Phone_num` char(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `Street_num` varchar(11) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Postal_code` char(6) DEFAULT NULL,
  `Credit_num` char(16) NOT NULL,
  `Credit_expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Account_id`, `Password`, `Fname`, `Lname`, `Phone_num`, `Email`, `Street`, `Street_num`, `City`, `Province`, `Country`, `Postal_code`, `Credit_num`, `Credit_expiry`) VALUES
(1, '123', 'Nigger', 'Mumtaz', '2899900978', 'test@gmail.com', '401 Princess St', '4', 'Kingston', 'Ontario', 'Canada', 'L2G5T6', '432342432', '2018-03-15'),
(17, '123', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(18, '123', '', '', '', 'test', '', '', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Movie_id` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Director_fname` varchar(50) DEFAULT NULL,
  `Director_lname` varchar(50) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL,
  `Plot` varchar(200) DEFAULT NULL,
  `Rating` enum('G','PG','PG13','14A','18+','R') DEFAULT NULL,
  `Prod_company` varchar(50) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `End_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Movie_id`, `Title`, `Director_fname`, `Director_lname`, `Length`, `Plot`, `Rating`, `Prod_company`, `Start_date`, `End_date`) VALUES
(1, 'Lord Of The Rings', 'Peter', 'Jackson', 2, 'Orcs and hobbits fight ', 'PG', 'fake news inc', '2018-03-25', '2018-03-25'),
(2, 'Harry Potter', 'David', 'Yates', 2, 'You\'re a Wizard Harry', 'G', 'Dont be a victim', '2018-03-27', '2018-03-31'),
(3, 'King Kong', 'Peter ', 'Jackson', 3, 'Big gorilla ', 'PG', 'Dont be a victim', '2018-03-26', '2018-03-28'),
(4, 'Star Wars', 'George', 'Lucas', 3, 'Lightsabers and storm troopers', 'G', 'fake news inc', '2018-03-26', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Ticket_id` int(10) NOT NULL,
  `Num_purchased` int(11) NOT NULL,
  `Valid` enum('Yes','No') DEFAULT NULL,
  `Showing_date` date NOT NULL,
  `Start_time` time DEFAULT NULL,
  `Theatre_id` int(11) NOT NULL,
  `Person_id` int(10) NOT NULL,
  `movie` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Ticket_id`, `Num_purchased`, `Valid`, `Showing_date`, `Start_time`, `Theatre_id`, `Person_id`, `movie`) VALUES
(12, 1, 'No', '2018-03-27', '06:00:00', 5, 1, 4),
(13, 1, 'No', '2018-03-26', '14:00:00', 1, 1, 2),
(14, 2, 'Yes', '2018-03-27', '06:00:00', 5, 1, 4),
(15, 2, 'Yes', '2018-03-27', '06:00:00', 5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Account_id` int(10) NOT NULL,
  `Movie_id` int(10) NOT NULL,
  `Review_content` TEXT(200) DEFAULT NULL,
  `review_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Account_id`, `Movie_id`, `Review_content`, `review_id`) VALUES
(1, 1, 'this movie sucks', 1),
(1, 1, 'never mind its pretty good', 2),
(1, 1, 'dsadsaadsad', 3),
(1, 1, 'nah its awful', 4),
(1, 2, 'youre a wizard harry', 5);

-- --------------------------------------------------------

--
-- Table structure for table `showing`
--

CREATE TABLE `showing` (
  `Showing_date` date NOT NULL,
  `Start_time` time NOT NULL,
  `Theatre_id` int(11) NOT NULL,
  `Movie_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showing`
--

INSERT INTO `showing` (`Showing_date`, `Start_time`, `Theatre_id`, `Movie_id`) VALUES
('2018-03-26', '10:00:00', 1, 1),
('2018-03-26', '14:00:00', 1, 2),
('2018-03-26', '19:00:00', 3, 3),
('2018-03-27', '06:00:00', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Company_name` varchar(50) NOT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `Street_num` int(11) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Postal_code` char(6) DEFAULT NULL,
  `Contact_fname` varchar(50) DEFAULT NULL,
  `Contact_lname` varchar(50) DEFAULT NULL,
  `Phone_num` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Company_name`, `Street`, `Street_num`, `City`, `Province`, `Country`, `Postal_code`, `Contact_fname`, `Contact_lname`, `Phone_num`) VALUES
('Dont be a victim', 'toronto street', 35, 'Hollywood', 'California', 'USA', 'L2G5T4', 'Jordan', 'Peterson', '90590590512'),
('fake news inc', 'fake street', 34, 'Hollywood', 'California', 'USA', 'L2G5T3', 'Kanye', 'West', '90590590511');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `Theatre_id` int(11) NOT NULL,
  `Max_seats` int(11) DEFAULT NULL,
  `Screen_size` enum('small','medium','large') DEFAULT NULL,
  `Phone_num` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`Theatre_id`, `Max_seats`, `Screen_size`, `Phone_num`) VALUES
(1, 100, 'small', '9059059055'),
(2, 200, 'medium', '9059059055'),
(3, 300, 'large', '5905905590'),
(5, 400, 'medium', '0590590559');

-- --------------------------------------------------------

--
-- Table structure for table `theatre_complex`
--

CREATE TABLE `theatre_complex` (
  `Name` varchar(50) NOT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `Street_num` int(11) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Postal_Code` char(6) DEFAULT NULL,
  `Num_theatres` int(11) DEFAULT NULL,
  `Phone_num` varchar(11) NOT NULL,
  `Movie_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre_complex`
--

INSERT INTO `theatre_complex` (`Name`, `Street`, `Street_num`, `City`, `Province`, `Country`, `Postal_Code`, `Num_theatres`, `Phone_num`, `Movie_price`) VALUES
('Complex B', 'Fake Street', 33, 'Kingston', 'Ontario', 'Canada', 'L2G5T7', 5, '0590590559', 13.5),
('Complex C', 'Fake Street', 44, 'Kingston', 'Ontario', 'Canada', 'L2G5T8', 5, '5905905590', 14.5),
('Complex A', 'Fake Street', 22, 'Kingston', 'Ontario', 'Canada', 'L2G5T6', 5, '9059059055', 12.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`Movie_id`,`Actor_fname`,`Actor_lname`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Account_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DNumber`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Account_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Movie_id`),
  ADD KEY `Prod_company` (`Prod_company`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Ticket_id`),
  ADD KEY `Showing_date` (`Showing_date`,`Start_time`,`Theatre_id`),
  ADD KEY `Person_id` (`Person_id`),
  ADD KEY `movie` (`movie`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `Movie_id` (`Movie_id`),
  ADD KEY `Account_id` (`Account_id`);

--
-- Indexes for table `showing`
--
ALTER TABLE `showing`
  ADD PRIMARY KEY (`Showing_date`,`Start_time`,`Theatre_id`),
  ADD KEY `Theatre_id` (`Theatre_id`),
  ADD KEY `Movie_id` (`Movie_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Company_name`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`Theatre_id`),
  ADD KEY `Phone_num` (`Phone_num`);

--
-- Indexes for table `theatre_complex`
--
ALTER TABLE `theatre_complex`
  ADD PRIMARY KEY (`Phone_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `Movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Ticket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`Movie_id`) REFERENCES `movie` (`Movie_id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`Prod_company`) REFERENCES `supplier` (`Company_name`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Showing_date`,`Start_time`,`Theatre_id`) REFERENCES `showing` (`Showing_date`, `Start_time`, `Theatre_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Person_id`) REFERENCES `member` (`Account_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`movie`) REFERENCES `movie` (`Movie_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_4` FOREIGN KEY (`Movie_id`) REFERENCES `movie` (`Movie_id`),
  ADD CONSTRAINT `review_ibfk_5` FOREIGN KEY (`Account_id`) REFERENCES `member` (`Account_id`);

--
-- Constraints for table `showing`
--
ALTER TABLE `showing`
  ADD CONSTRAINT `showing_ibfk_1` FOREIGN KEY (`Theatre_id`) REFERENCES `theatre` (`Theatre_id`),
  ADD CONSTRAINT `showing_ibfk_2` FOREIGN KEY (`Movie_id`) REFERENCES `movie` (`Movie_id`);

--
-- Constraints for table `theatre`
--
ALTER TABLE `theatre`
  ADD CONSTRAINT `theatre_ibfk_1` FOREIGN KEY (`Phone_num`) REFERENCES `theatre_complex` (`Phone_num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
