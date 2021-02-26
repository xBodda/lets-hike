-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 05:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets-hike`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets_messages`
--

CREATE TABLE `tickets_messages` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `read` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets_messages`
--

INSERT INTO `tickets_messages` (`id`, `ticket_id`, `message`, `user_id`, `_date`, `read`) VALUES
(1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus doloribus mollitia! Perferendis, debitis rerum illum nostrum praesentium reprehenderit. Quo eligendi tempora recusandae sunt qui amet delectus illo officiis ipsam.', 1, '2021-02-25 10:35:37', 0),
(10, 2, 'Test Message For Ajax', 1, '2021-02-25 13:43:07', 0),
(12, 2, 'Test message from admin                      ', 6, '2021-02-25 16:07:21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets_messages`
--
ALTER TABLE `tickets_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets_messages`
--
ALTER TABLE `tickets_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets_messages`
--
ALTER TABLE `tickets_messages`
  ADD CONSTRAINT `tickets_messages_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `tickets_messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
