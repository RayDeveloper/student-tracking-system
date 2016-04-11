-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2016 at 11:53 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `students`
--
CREATE DATABASE IF NOT EXISTS `students` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `students`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_Name` varchar(255) NOT NULL,
  `Course_Code` varchar(255) NOT NULL,
  `Course_Level` varchar(255) NOT NULL,
  `Course_Credits` varchar(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Course_Name`, `Course_Code`, `Course_Level`, `Course_Credits`) VALUES
(195, 'Introduction to Information Technology Fundamentals', 'INFO 1500', 'Level 1', '3'),
(196, 'Introduction to WWW Programming', 'INFO 1501', 'Level 1', '3'),
(197, 'Introduction to Problem Solving', 'INFO 1502', 'Level 1', '3'),
(198, 'Introduction to Mathematics for Critical Thinking', 'INFO 1503', 'Level 1', '3'),
(199, 'Introduction to Programming Fundamentals I', 'INFO 1504', 'Level 1', '3'),
(202, 'Introduction to Computer Systems', 'INFO 1505', 'Level 1', '3'),
(203, 'Introduction to Information and Data Management', 'INFO 1506', 'Level 1', '3'),
(204, 'Introduction to Business Principles', 'INFO 1507', 'Level 1', '3'),
(205, 'Enterprise Database Systems', 'INFO 2415', 'Level 2', '4'),
(206, 'Programming Fundamentals II', 'INFO 2420', 'Level 2', '4'),
(207, 'Computer Architecture', 'INFO 2425', 'Level 2', '4'),
(208, 'Fundamentals of Operating Systems', 'INFO 3400', 'Level 3', '4'),
(209, 'Information Assurance and Security', 'INFO 3415', 'Level 3', '4'),
(210, 'Software Engineering', 'INFO 3440', 'Level 3', '4'),
(211, 'Business Information Systems', 'INFO 2430', 'Elective', '4'),
(212, 'Information Systems Development', 'INFO 2400', 'Level 2', '4'),
(213, 'Discrete Mathematics', 'INFO 2405', 'Level 2', '4'),
(214, 'Fundamental Data Structures', 'INFO 2410', 'Level 2', '4'),
(215, 'Web Systems and Technologies', 'INFO 3410', 'Level 3', '4'),
(216, 'Project', 'INFO 3490', 'Level 3', '4'),
(217, ' E-Commerce', 'INFO 3435', 'Elective', '4'),
(218, 'Professional Ethics and Law', 'INFO 3425', 'Elective', '4'),
(219, 'Networking Technologies Fundamentals', 'INFO 2500', 'Level 2', '4'),
(220, 'User Interface Design and Development', 'INFO 3500', 'Level 3', '4'),
(221, 'Networking for Professionals', 'INFO 3510', 'Level 3', '4'),
(222, 'Database Administration for Professionals', 'INFO 3520', 'Level 3', '4'),
(223, 'Caribbean Civilisation', 'FOUN 1101', 'Foundation Course', '3'),
(224, 'Law, Governance, Economy and Society', 'FOUN 1301', 'Foundation Course', '3'),
(225, 'Scientific and Technical Writing', 'FOUN 1105', 'Foundation Course', '3'),
(231, 'TEST COURSEs', 'INFO 3000', '4', '4'),
(233, 'same', 'info 4000', 'level 3', '4'),
(234, 'name', 'INFO 7002', 'Level 4', '4'),
(235, 'hat', 'hat', 'Level 1', '3'),
(236, 'box', 'box', 'Level 1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `uwi`
--

CREATE TABLE IF NOT EXISTS `uwi` (
  `ID___` int(1) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `StudentID` varchar(9) DEFAULT NULL,
  `S1500` varchar(4) DEFAULT NULL,
  `S1506` varchar(4) DEFAULT NULL,
  `S1501` varchar(4) DEFAULT NULL,
  `S1502` varchar(6) DEFAULT NULL,
  `S1503` varchar(6) DEFAULT NULL,
  `S1507` varchar(4) DEFAULT NULL,
  `S1504` varchar(4) DEFAULT NULL,
  `S1505` varchar(4) DEFAULT NULL,
  `S2415` varchar(4) DEFAULT NULL,
  `S2420` varchar(4) DEFAULT NULL,
  `S2425` varchar(5) DEFAULT NULL,
  `S2430` varchar(5) DEFAULT NULL,
  `S2400` varchar(5) DEFAULT NULL,
  `S2405` varchar(5) DEFAULT NULL,
  `S2410` varchar(5) DEFAULT NULL,
  `S3400` varchar(5) DEFAULT NULL,
  `S3405` varchar(5) DEFAULT NULL,
  `S2500` varchar(5) DEFAULT NULL,
  `S3415` varchar(5) DEFAULT NULL,
  `S3440` varchar(5) DEFAULT NULL,
  `S3410` varchar(5) DEFAULT NULL,
  `S3420` varchar(5) DEFAULT NULL,
  `S3435` varchar(5) DEFAULT NULL,
  `S3490` varchar(5) DEFAULT NULL,
  `S3425` varchar(5) DEFAULT NULL,
  `S3430` varchar(5) DEFAULT NULL,
  `S3500` varchar(5) DEFAULT NULL,
  `S3520` varchar(5) DEFAULT NULL,
  `S3510` varchar(5) DEFAULT NULL,
  `S1101` varchar(5) DEFAULT NULL,
  `S1301` varchar(5) DEFAULT NULL,
  `S1102` varchar(5) DEFAULT NULL,
  `S1105` varchar(5) DEFAULT NULL,
  `L1_Core` varchar(40) DEFAULT NULL,
  `L1_Electives` varchar(40) DEFAULT NULL,
  `ADV_Core` varchar(2) DEFAULT NULL,
  `ADV_Electives` varchar(10) DEFAULT NULL,
  `FOUN` varchar(10) DEFAULT NULL,
  `Total_Credits` varchar(2) DEFAULT NULL,
  `Additional_Courses` varchar(10) DEFAULT NULL,
  `Completed` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`ID___`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `uwi`
--

INSERT INTO `uwi` (`ID___`, `FirstName`, `LastName`, `StudentID`, `S1500`, `S1506`, `S1501`, `S1502`, `S1503`, `S1507`, `S1504`, `S1505`, `S2415`, `S2420`, `S2425`, `S2430`, `S2400`, `S2405`, `S2410`, `S3400`, `S3405`, `S2500`, `S3415`, `S3440`, `S3410`, `S3420`, `S3435`, `S3490`, `S3425`, `S3430`, `S3500`, `S3520`, `S3510`, `S1101`, `S1301`, `S1102`, `S1105`, `L1_Core`, `L1_Electives`, `ADV_Core`, `ADV_Electives`, `FOUN`, `Total_Credits`, `Additional_Courses`, `Completed`) VALUES
(1, 'James', 'Brown', '12345678', 'PASS', 'NO', 'NO', 'NO', 'PASS', 'PASS', 'NO', 'NO', 'PASS', 'PASS', 'NO', 'NO', 'PASS', 'NO', 'PASS', 'NO', 'NO', 'NO', 'PASS', 'NO', 'NO', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '24', '6', '20', '4', '0', '54', 'PHYS1211', 'N'),
(2, 'Indira', 'Job', '23489098', 'PASS', '', 'PASS', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Kailash', 'Amir', '45678901', 'PASS', 'NO', 'PASS', 'NO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'John', 'Kingston', '111111111', 'PASS', 'PASS', 'PASS', 'PASS', 'NO', 'NO', 'PASS', 'NO', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'NO', '', '', 'NO', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '15', '0', '32', '4', '3', '47', '', 'N'),
(6, 'Hewlett', 'Packard', '222222222', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Raydon', 'Davis', '813117991', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', 'PASS', 'PASS', '', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Peggy', 'Pratt', '812678495', 'PASS', 'NO', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', 'PASS', 'PASS', '', '', 'PASS', '', 'PASS', '', '', '  ', 'PASS', '', '', 'PASS', '  ', '', '  ', 'PASS', 'PASS', 'PASS', '', '', '', '', '', '', 'COMP 3275', ''),
(13, 'John', 'Salazar', '812003867', 'PASS', '', 'PASS', '', 'PASS', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'Laurie', 'Simon', '813116723', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Leon', 'McCarthy', '811000345', 'PASS', '', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Dan', 'Mickenny', '815000345', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Gerado', 'Jefferson', '813111345', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', '', '', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', 'PASS', '', '', 'PASS', '', '', '', 'PASS', 'PASS', 'PASS', '24', '', '48', '', '9', '93', '', 'Y'),
(18, 'Marcia', 'Mclaughin', '810000238', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Kim', 'Walker', '815117991', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', '', 'PASS', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Mac', 'Macintosh', '813200034', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', 'PASS', '', 'PASS', ' PASS', 'PASS', '', '', 'PASS', '', '', '', '', ' ', '', '', '', ' ', ' ', '', ' ', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'TESTname', 'STUDENT', '816000321', 'PASS', 'PASS', ' PAS', '  PASS', '', '    ', '', '', '', '', '', '', '', '  ', '', '', '', '', '', '', '', '', '  ', '', '', '', '  ', '  ', '', '  ', '', '', '', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
