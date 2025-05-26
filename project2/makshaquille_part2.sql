-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 03:48 PM
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
-- Database: `makshaquille_part2`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `JobReferenceNumber` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `StreetAddress` varchar(100) NOT NULL,
  `SuburbTown` varchar(50) NOT NULL,
  `State` varchar(3) NOT NULL,
  `Postcode` varchar(4) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `HTML` varchar(50) DEFAULT NULL,
  `CSS` varchar(50) DEFAULT NULL,
  `JavaScript` varchar(50) DEFAULT NULL,
  `Python` varchar(50) DEFAULT NULL,
  `OtherSkills` text DEFAULT NULL,
  `Status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `JobReferenceNumber`, `FirstName`, `LastName`, `StreetAddress`, `SuburbTown`, `State`, `Postcode`, `EmailAddress`, `PhoneNumber`, `HTML`, `CSS`, `JavaScript`, `Python`, `OtherSkills`, `Status`) VALUES
(4, 'G04C1', 'Nadimul', 'Haque', 'Uttar Chayabithi', 'Joydebpur', 'GAZ', '1700', 'nadim.hq321@gmail.com', '01827090222', 'Yes', 'Yes', 'Yes', 'No', 'Spring Boot', 'Final'),
(5, 'G04X7', 'Test', 'User', 'Uttar Chayabithi', 'Joydebpur', 'GAZ', '1700', 'nadim.hq321@gmail.com', '01827090222', 'Yes', 'Yes', 'Yes', 'No', 'Spring Boot', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobID` int(11) NOT NULL,
  `JobRef` varchar(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobID`, `JobRef`, `Title`, `Description`) VALUES
(3, 'G04C1', 'Cloud Engineer', 'The Cloud Engineer will be responsible for designing, implementing, and maintaining cloud-based infrastructure and services. The role includes collaborating with cross-functional teams to understand infrastructure needs, automating deployments, and ensuring security, scalability, and performance of cloud environments. This position requires strong problem-solving skills and the ability to work in a dynamic team environment.'),
(4, 'G04X7', 'Cybersecurity Specialist', 'The Cybersecurity Specialist will be responsible for protecting the organization\'s networks, systems, and data from security breaches, cyber attacks, and other threats. This role requires identifying vulnerabilities, implementing security measures, and monitoring network traffic to prevent unauthorized access. The specialist will also work to ensure compliance with security standards and best practices while collaborating with IT teams to improve the organization\'s overall cybersecurity.');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `ManagerID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`ManagerID`, `Username`, `PasswordHash`) VALUES
(1, 'admin', '$2y$10$ZFdI6fVi2lAuQM8UPcCx6uLl2baiELS22.e3fCh7oB3.GiATqnZ/e'),
(3, 'testadmin', '$2y$10$GBqU.IxswAxFsFGYFfqgRu051KFQTVyN1y/mjlJIVl4tWto5Gx2Q.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`ManagerID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `ManagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
