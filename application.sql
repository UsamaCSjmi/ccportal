-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 09:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `department_id`, `user_id`, `complaint`, `date`, `status`) VALUES
(14, 3, 2, 'There is electricity problem in my locality( center point baheri ) from few days.\r\nPlease take necessary action as soon as possible.', '2022-04-24', 'verified'),
(15, 4, 4, 'Main  water pipeline of my area has been broken.\r\nDue to this there is wastage of water.\r\nPlease repair the pipeline soon.', '2022-04-24', 'pending'),
(16, 9, 7, 'There are very few street lights in my area.\r\nIt\'s a request to arrange some more street lights in my locality area as soon as possible.', '2022-04-24', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'Admin'),
(2, 'Citizen'),
(3, 'Electricity'),
(4, 'Water'),
(9, 'PWD'),
(10, 'Anti Corruption'),
(11, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mobile`, `email`, `password`, `department`) VALUES
(1, 'Arshad Hussain', '7830048754', 'arshadhussain78300@gmail.com', 'Arshad@123', 1),
(2, 'Usama', '8171475514', 'nhusain34@gmail.com', 'Usama@123', 2),
(3, 'Mr. Shanu', '9876543210', 'shanu@gmail.com', 'Shanu@123', 3),
(4, 'Khalid', '8888888888', 'khalid@gmail.com', 'Khalid@123', 2),
(6, 'Khalil Ahmed', '9876543210', 'khalil@gmail.com', 'Khalil@123', 4),
(7, 'Abu Bakar', '9911399113', 'abubakar@gmail.com', 'Abu@123', 2),
(13, 'NOOR', '7060039430', 'noor@gmail.com', 'Noor@123', 9),
(14, 'ARSALAN', '8979043635', 'arslan@gmail.com', 'Arslan@123', 10),
(15, 'AREEB', '6388116907', 'areeb@gmail.com', 'Areeb@123', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `departments` (`department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `departments` FOREIGN KEY (`department`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
