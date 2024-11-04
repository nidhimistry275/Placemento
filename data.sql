-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 10:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hire_here`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `jobid` int(255) NOT NULL,
  `ename` varchar(10000) NOT NULL,
  `eemail` varchar(100) NOT NULL,
  `econtact` int(12) NOT NULL,
  `eloca` varchar(100) NOT NULL,
  `pjexp` varchar(100) NOT NULL,
  `pcompany` varchar(100) NOT NULL,
  `eresume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyID` int(11) NOT NULL,
  `cname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `cindustry` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `cfounded` int(4) NOT NULL,
  `cceo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `clocation` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `cemail` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `ccontact` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `cprofilepic` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `cdescription` varchar(1000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `eemail` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `interest1` varchar(255) NOT NULL,
  `interest2` varchar(255) NOT NULL,
  `interest3` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobid` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `jtitle` varchar(100) NOT NULL,
  `jfield` varchar(255) NOT NULL,
  `srange` varchar(100) NOT NULL,
  `jqua` varchar(1000) NOT NULL,
  `jvacancy` int(12) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `jdesc` varchar(2500) NOT NULL,
  `jloc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobid`, `cname`, `cemail`, `jtitle`, `jfield`, `srange`, `jqua`, `jvacancy`, `ddate`, `jdesc`, `jloc`) VALUES
(1, 'Tata', '', 'Junior Web Developer', '', '10,000 - 20,000 Rs.', '', 10, '20/03/2021 - 21/03/2021', 'Proficient understanding of web markup, including HTML5, CSS3\r\nBasic knowledge of image authoring jehuidwgeugweugucjdbcudbckdgcudhcujc.', 'Ahmedabad'),
(2, 'Tatvasoft', '', 'Web Developer', '', '30,000 - 50,000 Rs.', '', 0, '21/03/2021 to 25/05/2021', 'Hello', 'Gujarat, Ahmedabad'),
(3, 'TCS', '', 'Graphic Designer', '', '10,000 to 50,000 Rs.', '', 0, '21/03/2021', 'None', 'Bihar'),
(4, 'Vipro', '', 'UI/UX', '', '20,000 to 30,000 Rs.', '', 0, '21/03/2021', 'None', 'Hydrabad'),
(5, 'Tata', 'tata@gmail.com', 'UI/UX Designer', 'Graphic Designing', '20,000 to 30,000 Rs.', 'Html', 5, '02/03/2021', 'None', 'Ahmedabad'),
(14, 'Tata', 'xyz@gmail.com', 'Web developer', 'Web Development', '20,000 to 30,000 Rs.', 'HTML', 5, '2021-07-08', 'NOne', 'Ahmedabad'),
(15, 'Tata', 'xyz@gmail.com', 'Web developer', 'Graphic Designing', '20,000 to 30,000 Rs.', 'HTML', 5, '2021-07-08', 'NOne', 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `selector` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD UNIQUE KEY `eemail` (`eemail`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyID`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `contactno` (`contactno`),
  ADD UNIQUE KEY `emailid` (`eemail`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
