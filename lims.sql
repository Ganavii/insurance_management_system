-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 03:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lims`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` varchar(50) NOT NULL,
  `agent_password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_password`, `name`, `branch`, `phone`) VALUES
('2001', '2211', 'Admin', 'Banglore', '1234567890'),
('2280', '1526', 'ganavi', 'banglore', '123458235'),
('33', '444', 'Barney', 'LA', '24398715236'),
('44', '5555', 'Ted', 'Banglore', '15935786204'),
('55', '6666', 'Robin', 'Mumbai', '7531496204'),
('66', '7777', 'Claire', 'Delhi', '7843169520'),
('88', '9999', 'Phil', 'Los Angeles', '2584364852'),
('99', '111111', 'Steven', 'California', '15743695466');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` varchar(200) NOT NULL,
  `client_password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `policy_id` varchar(50) NOT NULL,
  `agent_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_password`, `name`, `sex`, `birth_date`, `phone`, `address`, `policy_id`, `agent_id`) VALUES
('100', '123', 'Jack', 'Male', '01-01-1965', '1463852496', 'Mysore', '2', '33'),
('101', '110', 'Ruhi', 'Female', '01-02-1966', '1286347156', 'Banglore', '1', '44'),
('103', '130', 'Lucifer', 'Male', '01-04-1968', '5286410932', 'Delhi', '2', '66'),
('104', '140', 'Lionel', 'Male', '01-05-1980', '1423690522', 'Mumbai', '3', '77'),
('105', '150', 'Ashley', 'Female', '01-06-2005', '5896310000', 'Mumbai', '1', '33'),
('106', '160', 'Alex', 'Female', '01-07-2006', '9632200554', 'Kolkata', '1', '33'),
('107', '170', 'Isha', 'Female', '01-08-2008', '8823014499', 'Chennai', '3', '44'),
('109', '190', 'Rahul', 'Male', '01-10-2009', '7766330011', 'Manglore', '1', '66'),
('110', '200', 'Rohan', 'Male', '01-11-2011', '1236600449', 'Hampi', '3', '77'),
('111', '210', 'Deepika', 'Female', '01-12-2018', '2036668844', 'Pune', '2', '88'),
('52', '5261', 'Rama', 'M', '22-11-2020', '96153524222333', 'Mysore', '3', '2001'),
('63', '12355', 'Ganavi R', 'Female', '22-11-2001', '9731551980', 'Mysore', '1', '2001');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `nominee_id` varchar(200) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`nominee_id`, `client_id`, `name`, `sex`, `birth_date`, `relationship`, `priority`, `phone`) VALUES
('17', '52', 'Laxman', 'M', '23-12-2020', 'Son', '1', '1254785324'),
('200', '100', 'Kai', 'Male', '02-01-2000', 'Son', '1', '2541336699'),
('201', '101', 'Avni', 'Female', '02-02-2000', 'Daughter', '1', '23311446699'),
('203', '103', 'Anjali', 'Female', '01-07-1965', 'Wife', '1', '4233366115'),
('204', '104', 'Eve', 'Female', '01-07-2000', 'Daughter', '1', '8822336610'),
('205', '105', 'Abhi', 'Male', '01-07-1980', 'Husband', '1', '5500331144'),
('206', '106', 'Sonu', 'Female', '01-07-1990', 'Sister', '1', '523149966'),
('207', '107', 'Arya', 'Female', '01-07-2011', 'Sister', '1', '2200334488'),
('209', '109', 'Rohan', 'Male', '01-08-2005', 'Brother', '1', '22114499'),
('210', '110', 'Ram', 'Male', '01-09-1965', 'Father', '1', '7711330055'),
('211', '111', 'Lakshman', 'Male', '01-10-1975', 'Father', '1', '7722331120'),
('212', '103', 'Robert', 'Male', '01-11-1985', 'Father', '2', '5533001147'),
('213', '104', 'Gucci', 'Female', '01-12-1980', 'Wife', '3', '77220033691'),
('214', '105', 'Jin', 'Male', '01-01-1990', 'Father', '2', '75139504826'),
('215', '106', 'Jimin', 'Male', '01-0-1980', 'Father', '2', '4400339915'),
('76', '63', 'Gowri', 'Female', '21-11-1986', 'Daughter', '1', '1234588');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `recipt_no` varchar(20) NOT NULL,
  `client_id` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `fine` varchar(50) NOT NULL,
  `agent_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`recipt_no`, `client_id`, `month`, `amount`, `due`, `fine`, `agent_id`) VALUES
('302', '107', '2', '200000', '0', '100', '44'),
('306947424', '105', '10', '500000', '500', '15000', '33');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `health_status` varchar(50) NOT NULL,
  `system` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `coverage` varchar(50) NOT NULL,
  `age_limit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_id`, `term`, `health_status`, `system`, `payment_method`, `coverage`, `age_limit`) VALUES
('1', '5 years', '50000', '3000', 'Cash/Check', '100%', '50'),
('2', '10 Years', '1000000', '6500', 'Cash/Check', '100%', '50'),
('3', '15 Years', '2000000', '13000', 'Cash/Check', '100%', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`),
  ADD UNIQUE KEY `agent_id` (`agent_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_id` (`client_id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`nominee_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`recipt_no`),
  ADD UNIQUE KEY `recipt_no` (`recipt_no`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`),
  ADD UNIQUE KEY `policy_id` (`policy_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
