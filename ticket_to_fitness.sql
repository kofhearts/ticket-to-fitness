-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 04:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_to_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `password`) VALUES
(1, 'jamesrice', 'James', 'Rice', 'Apple123@');

-- --------------------------------------------------------

--
-- Table structure for table `gym_activity`
--

CREATE TABLE `gym_activity` (
  `id` int(20) NOT NULL,
  `gym_id` int(20) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sessions_per_week` int(20) NOT NULL,
  `max_capacity` int(20) NOT NULL,
  `price_per_week` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym_activity`
--

INSERT INTO `gym_activity` (`id`, `gym_id`, `activity_name`, `category`, `sessions_per_week`, `max_capacity`, `price_per_week`, `description`, `status`) VALUES
(24, 11, 'High Intensity Workout', 'Pilates', 45, 20, 30, 'This is a high intensity workout. For a limited time only, we are offering a very special package', 1),
(25, 11, 'Normal Intensity Workout', 'Pilates', 45, 20, 30, 'This is a high intensity workout. For a limited time only, we are offering a very special package', 1),
(26, 11, 'Gynastic', 'Pilates', 9, 12, 15, 'This is a gymnastic class offered by one of our top trainer. Please bring your gears Offer for only 10 days.', 1),
(27, 11, 'Gym', 'High Intensity', 1, 20, 15, 'This is a great workout', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gym_information`
--

CREATE TABLE `gym_information` (
  `id` int(11) NOT NULL,
  `gym_id` int(20) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `gym_address` varchar(255) NOT NULL,
  `gym_email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `abn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym_information`
--

INSERT INTO `gym_information` (`id`, `gym_id`, `gym_name`, `gym_address`, `gym_email`, `phone_number`, `abn`) VALUES
(9, 8, 'UNI Gym', 'Hobart', 'uni@gmail.com', '0000000000', 2147483647),
(12, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(13, 11, 'UNI Gym', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(14, 11, 'UNI Gym', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(15, 11, 'UNI Gym', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(16, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(17, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(18, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 0),
(19, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 0),
(20, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(21, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(22, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(23, 11, 'Ticket to fitness', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647),
(24, 12, 'UNI Gym', '74-80 Molle Street', 'ticket@gmail.com', '0468659344', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_activation_code` varchar(255) NOT NULL,
  `user_email_status` varchar(255) NOT NULL,
  `password_reset` varchar(255) NOT NULL,
  `partnership_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `user_activation_code`, `user_email_status`, `password_reset`, `partnership_status`) VALUES
(8, 'anish', 'Anish', 'Adhikari', 'appy233986@gmail.com', '$2y$10$Sfz/xyVGjsYFw.X8bH4OIOan8oot8YVVDryBlHjWVfK2ZXKgZVDkS', '1c5288b3c4c13e4454ce9d4a555b23c6', 'not verified', 'SASAffhdjfhdjkhfdkjhfjdhfjhjfdhfdhj', NULL),
(11, 'sndpgiri', 'Sandeep', 'Giri', 'sndpflashtv@gmail.com', '$2y$10$5.YLRVGQqhCRN8dPZ8fUHODaBhR4UITLaC2BxYJQAJOxV9IMGKAgK', '30f02197ac49acbe934a1dfc9007113e', 'not verified', '8904efd2d5a40ba5a43341e2b926c536', 1),
(12, 'pikachu', 'pikachu', 'pikachu', 'pikachu@gmail.com', '$2y$10$G4PHO1tMIDgbOQk2LIAJk.Y3Co/GWSzLIdWjQxGStL7LnBuGhAkqO', 'fe2dec42282688c94b363b8a15e630c3', 'not verified', 'SASAffhdjfhdjkhfdkjhfjdhfjhjfdhfdhj', 1),
(13, 'random', 'random', 'random', 'random@gmail.com', '$2y$10$cSjgHFb37qyni4XqcDQy5OcipXHPBv6dM7n2AT7jY0yFfNGLrbmI.', '3b721707409598c056c51f2ee403a0ea', 'not verified', 'SASAffhdjfhdjkhfdkjhfjdhfjhjfdhfdhj', NULL),
(14, '&””;Max123', '&””;Max123', 'puru', 'suru@gmail.com', '$2y$10$2D5.zAsI8y9X2Hd/9REgfeIFiGjGpwE1z42THr78w9f.zHXNicUGS', '53845891f2e8fceef4e9043a4e77c1ea', 'not verified', 'SASAffhdjfhdjkhfdkjhfjdhfjhjfdhfdhj', NULL),
(15, 'MAXYMAXY', 'MAXY', 'MAXY', 'sndpofficialida@gmail.com', '$2y$10$zF8wGJOSVNV/AZA1maOZo.A9SqNYDc2WMhrx4DJmczB03lTiNKgaG', '6ca73309f27b029dc11fa54f9a0fd497', 'not verified', 'SASAffhdjfhdjkhfdkjhfjdhfjhjfdhfdhj', NULL),
(16, 'sndp12', 'Sandeep', 'Giri', 'sgiri4@utas.edu.au', '$2y$10$zbuBm8yQ2zeEaTE6q9.BrOBKzF5SjT2U4NSGxDtPtFvOCK4kw1GlK', '9ca32f9746fab891e7df39e6a1bd2bf8', 'not verified', 'SASAffhdjfhdjkhfdkjhfjdhfjhjfdhfdhj', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_activity`
--
ALTER TABLE `gym_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_information`
--
ALTER TABLE `gym_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gyminfo` (`gym_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gym_activity`
--
ALTER TABLE `gym_activity`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gym_information`
--
ALTER TABLE `gym_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gym_information`
--
ALTER TABLE `gym_information`
  ADD CONSTRAINT `fk_gyminfo` FOREIGN KEY (`gym_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
