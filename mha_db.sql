-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 10:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mha_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `questionID` text NOT NULL,
  `counselorID` int(11) NOT NULL,
  `assess_remarks` text NOT NULL,
  `appointmentDate` datetime DEFAULT NULL,
  `virtualLink` text NOT NULL,
  `assessment_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `studID`, `questionID`, `counselorID`, `assess_remarks`, `appointmentDate`, `virtualLink`, `assessment_status`, `created_at`) VALUES
(4, 4, 'a:14:{i:0;s:1:\"5\";i:1;s:1:\"8\";i:2;s:1:\"9\";i:3;s:2:\"33\";i:4;s:2:\"41\";i:5;s:2:\"21\";i:6;s:2:\"43\";i:7;s:2:\"44\";i:8;s:2:\"24\";i:9;s:2:\"47\";i:10;s:2:\"25\";i:11;s:2:\"26\";i:12;s:2:\"28\";i:13;s:2:\"29\";}', 5, 'This is only sample remarks', '2024-01-18 04:52:00', 'https://meet.google.com/vpe-rmda-ced', 2, '2024-01-07 10:21:34'),
(5, 6, 'a:10:{i:0;s:1:\"7\";i:1;s:1:\"8\";i:2;s:2:\"18\";i:3;s:2:\"19\";i:4;s:2:\"32\";i:5;s:2:\"43\";i:6;s:2:\"24\";i:7;s:2:\"26\";i:8;s:2:\"27\";i:9;s:2:\"28\";}', 5, '', '2024-01-10 12:04:00', 'https://meet.google.com/ayh-dxby-yow', 5, '2024-01-07 14:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cID` int(11) NOT NULL,
  `deptID` int(11) NOT NULL,
  `courseName` text NOT NULL,
  `courseAbbreviation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cID`, `deptID`, `courseName`, `courseAbbreviation`, `created_at`) VALUES
(1, 1, 'bachelor of science in information technology', 'bsit', '2024-01-13 08:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dID` int(11) NOT NULL,
  `departmentName` text NOT NULL,
  `departmentAbbreviation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dID`, `departmentName`, `departmentAbbreviation`, `created_at`) VALUES
(1, 'College of Engineering', 'coe', '2024-01-13 07:40:51'),
(3, 'College of Arts and Science', 'CAS', '2024-01-13 08:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `gccategories`
--

CREATE TABLE `gccategories` (
  `gcID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gccategories`
--

INSERT INTO `gccategories` (`gcID`, `categoryName`, `created_at`) VALUES
(2, 'QF-CGC-002', '2023-12-29 03:31:59'),
(3, 'Physical Appearance', '2024-01-02 10:56:06'),
(4, 'Health Condition', '2024-01-02 10:56:27'),
(5, 'Social Interaction', '2024-01-02 10:56:48'),
(6, 'Thought of Suicide', '2024-01-02 10:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `gcquestions`
--

CREATE TABLE `gcquestions` (
  `id` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gcquestions`
--

INSERT INTO `gcquestions` (`id`, `catID`, `question`, `created_at`) VALUES
(1, 2, 'Weight problem', '2023-12-29 03:33:18'),
(2, 2, 'Height Problem', '2023-12-29 03:40:14'),
(3, 2, 'Poor Complexion/Skin Trouble', '2023-12-29 03:41:54'),
(4, 2, 'Poor Posture\r\n', '2023-12-29 04:13:25'),
(5, 2, 'Sickly', '2023-12-29 03:42:33'),
(6, 2, 'Weak eyes', '2023-12-29 03:42:55'),
(7, 2, 'Hearing Difficulty', '2023-12-29 03:43:11'),
(8, 2, 'Oral Communication Skills', '2023-12-29 03:43:23'),
(9, 2, 'Coping with academic pressures', '2023-12-29 03:43:39'),
(15, 2, 'Fear of the Opposite sex', '2024-01-03 03:36:28'),
(16, 2, 'Too little time for recreation', '2024-01-03 03:37:10'),
(17, 2, 'Inability to understand', '2024-01-03 03:38:50'),
(18, 2, 'Inferiority Complex', '2024-01-03 03:39:09'),
(19, 2, 'Difficulty in making decisions', '2024-01-03 03:40:27'),
(20, 3, 'Poor Complexion or skin trouble', '2024-01-03 03:47:05'),
(21, 3, 'Being Underweight', '2024-01-03 03:47:17'),
(22, 3, 'Being overweight', '2024-01-03 03:47:31'),
(23, 4, 'Weak Eyes', '2024-01-03 03:47:39'),
(24, 4, 'Frequent Colds', '2024-01-03 03:47:53'),
(25, 5, 'Not enough time for recreation', '2024-01-03 03:57:42'),
(26, 5, 'Being Shy amd timid', '2024-01-03 03:57:59'),
(27, 6, 'I feel like committing suicide when problems tend to remain unsolved', '2024-01-03 03:59:04'),
(28, 6, 'I thought of ending my problems by committing suicide', '2024-01-03 03:59:43'),
(29, 6, 'I tried to commit suicide but failed', '2024-01-03 04:00:19'),
(30, 2, 'Difficult in making friends', '2024-01-03 04:01:43'),
(31, 2, 'Identity Crisis', '2024-01-03 04:01:58'),
(32, 2, 'immature/childish', '2024-01-03 04:02:16'),
(33, 2, 'Too easily discouraged ', '2024-01-03 07:06:51'),
(34, 2, 'Too easily led by other people', '2024-01-03 07:07:20'),
(35, 2, 'Controlling sex urges', '2024-01-03 07:07:38'),
(36, 2, 'Indulging in vices - a. Billards', '2024-01-03 07:10:44'),
(37, 2, 'Indulging in vices - b. Computer Games', '2024-01-03 07:10:53'),
(38, 2, 'Indulging in vices - c. drinking', '2024-01-03 07:11:02'),
(39, 2, 'Indulging in vices - d. drugs', '2024-01-03 07:11:14'),
(40, 2, 'Indulging in vices - e. gambling', '2024-01-03 07:11:22'),
(41, 2, 'Indulging in vices - f. smoking', '2024-01-03 07:11:32'),
(42, 3, 'Being too tall', '2024-01-03 14:55:09'),
(43, 3, 'Being too short', '2024-01-03 14:55:23'),
(44, 3, 'partial disability', '2024-01-03 14:55:43'),
(45, 4, 'Not as healthy and strong as i should be', '2024-01-03 14:56:46'),
(46, 4, 'Allergies (high fever, asthma)', '2024-01-03 14:57:29'),
(47, 4, 'Occasional pressure and pain in my head', '2024-01-03 14:58:00'),
(48, 4, 'Gradually losing sight', '2024-01-03 14:58:21'),
(49, 2, 'Easily losing temper', '2024-01-03 14:59:29'),
(50, 2, 'lacking self-control', '2024-01-03 14:59:49'),
(51, 2, 'Easily get worried ', '2024-01-03 15:00:06'),
(52, 2, 'Easily gets nervous ', '2024-01-03 15:00:21'),
(53, 2, 'Shy/Timid', '2024-01-03 15:00:41'),
(54, 2, 'Misunderstanding with \"Mother\"', '2024-01-03 15:01:17'),
(55, 2, 'Misunderstanding with \"Father\"', '2024-01-03 15:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `identification_ID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `bDay` date NOT NULL,
  `address` text NOT NULL,
  `courseID` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `identification_ID`, `firstName`, `middleName`, `lastName`, `email`, `password`, `bDay`, `address`, `courseID`, `role`, `created_at`) VALUES
(1, 20150453, 'Harvey', 'Almerino', 'Buena', 'harvz.buena@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '1999-02-04', 'Tacloban City', 0, 'admin', '2023-12-28 02:04:39'),
(3, 2024, 'wsfasdasda', 'asdas', 'dasdasd', 'sample@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '0000-00-00', '', 0, 'student', '2023-12-31 16:42:49'),
(4, 143, 'sample', 'sample', 'sample', 'sample@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '0000-00-00', '', 0, 'student', '2023-12-31 16:45:23'),
(5, 123, 'counselor', 'counselor', 'counselor', 'counselor@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '0000-00-00', '', 0, 'counselor', '2023-12-31 13:11:47'),
(6, 20133409, 'Ann Michelle', 'N/A', 'Mainit', 'mainitannmichelle0304@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '0000-00-00', '', 0, 'student', '2024-01-07 13:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dID`);

--
-- Indexes for table `gccategories`
--
ALTER TABLE `gccategories`
  ADD PRIMARY KEY (`gcID`);

--
-- Indexes for table `gcquestions`
--
ALTER TABLE `gcquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gccategories`
--
ALTER TABLE `gccategories`
  MODIFY `gcID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gcquestions`
--
ALTER TABLE `gcquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
