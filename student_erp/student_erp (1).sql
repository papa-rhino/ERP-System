-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 02:53 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `t_id` int(11) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`t_id`, `reg_id`, `date`, `status`) VALUES
(2, 'RA1611003030259', '2020-08-03', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `t_id` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `sem` int(1) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `max_marks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`t_id`, `course_id`, `name`, `sem`, `dept_id`, `max_marks`) VALUES
(1, 'CS104', 'Java Fundamentals and Programming', 3, 'EN101', 100),
(2, 'EC104', 'Digital Electronics and Communications', 3, 'EN102', 100),
(3, 'EE104', 'Transformer Design', 3, 'EN103', 100);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `t_id` int(11) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`t_id`, `dept_id`, `name`) VALUES
(1, 'EN101', 'Computer Science and Engineering'),
(2, 'EN102', 'Electrical Communications and Engineering'),
(3, 'EN103', 'Electrical and Electronics Engineering'),
(4, 'EN104', 'Mechanical Engineering'),
(5, 'EN105', 'Information Technology'),
(6, 'EN106', 'Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `t_id` int(11) NOT NULL,
  `event_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `descrp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`t_id`, `event_id`, `name`, `from_date`, `to_date`, `descrp`) VALUES
(3, 'EV2020101', 'Hackathon 2020', '2020-08-12', '2020-08-14', 'A hackathon for Computer Science Department');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `t_id` int(11) NOT NULL,
  `hod_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`t_id`, `hod_id`, `name`, `dept_id`, `password`) VALUES
(2, 'HA1611003030255', 'Arvind Kumar', 'EN101', '123456'),
(3, 'HA1611003030256', 'Ramesh Sahu', 'EN102', '123456'),
(4, 'HA1611003030257', 'Sudhir Singh', 'EN103', '123456'),
(5, 'HA1611003030258', 'Mayank Aggarwal', 'EN104', '123456'),
(6, 'HA1611003030259', 'Rahul Basu', 'EN105', '123456'),
(7, 'HA1611003030260', 'Karthiken Subramaniam', 'EN106', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `t_id` int(11) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `marks_obt` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`t_id`, `reg_id`, `course_id`, `marks_obt`) VALUES
(2, 'RA1611003030256', 'EC104', 84);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `t_id` int(11) NOT NULL,
  `project_id` varchar(20) NOT NULL,
  `leader_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `deadline` date NOT NULL,
  `descrp` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`t_id`, `project_id`, `leader_id`, `name`, `deadline`, `descrp`, `status`) VALUES
(5, 'PR101', 'RA1611003030259', 'Chat App', '2020-08-23', 'A chat application in JAVA', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `t_id` int(11) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `sem` int(1) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `project_id` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`t_id`, `reg_id`, `name`, `sem`, `dept_id`, `project_id`, `password`) VALUES
(4, 'RA1611003030256', 'Dinesh Pandey', 4, 'EN101', 'PR105', '123456'),
(1, 'RA1611003030259', 'Shivam Pandey', 4, 'EN101', 'PR107', '123456'),
(5, 'RA1611003030333', 'Manish Bhardwaj', 1, 'EN105', NULL, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `teach_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `teach_id`, `name`, `course_id`, `dept_id`, `password`) VALUES
(1, 'TA1611003030259', 'Dinesh Maurya', 'CS104', 'EN101', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`reg_id`,`date`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `t_id_2` (`t_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`),
  ADD UNIQUE KEY `hod_id` (`hod_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`reg_id`,`course_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `t_id_2` (`t_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `leader_id` (`leader_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teach_id`),
  ADD KEY `t_id` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `student` (`reg_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `hod_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `student` (`reg_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `student` (`reg_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
