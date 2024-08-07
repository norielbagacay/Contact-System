-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 12:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `pass`) VALUES
(3, 'Rose Janoyan', 'rosejanoyan@gmail.com', '$2y$10$3tMwHPKn4THSpy56.p4zzOc5brm1szzfCVfe.k9QIWONFYgZv64y6'),
(4, 'Darth Zeether', 'darthzeether@gmail.com', '$2y$10$bZpzWXex3h6aLPQYGBOiG.XrZNEVkqqUqWtc7MmAdqVzLNk7XX/e.'),
(5, 'Noriel Bagacay', 'norielbagacay1@gmail.com', '$2y$10$HER0Y.nmAmnotG8hVvprYuw3czX..4kWifgeJIHqDGPu/tOGdQoWi'),
(6, 'Pauljess Bagacay', 'paul@gmail.com', '$2y$10$QzBa/8L30nOw9VbwchriYOHpRi0kSYTzn.O.X.M.3jBXTAbGnwPJC'),
(7, '', '', '$2y$10$6BkeQOKtRMmOG4K866N07.xC9LvVf.dgGcL.r9xPhYh4I/DmR60X.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `company`, `phone`, `email`, `account_id`) VALUES
(1, 'Rose Janoyan', 'FDC', '093264723', 'rosejanoyan@gmail.com', 5),
(15, 'Paul Bagacay', 'FDC', '09162424288', 'pauljessbagacay@gmail.com', 4),
(16, 'Mary Joy Bagacay', 'FDC', '09362734832', 'maryjoy@gmail.com', 5),
(17, 'user 2', 'FDC', '09217316214', 'user2@gmail.com', 4),
(18, 'User 3', ' ', '  ', '  ', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
