-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 11:55 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contentmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `faci_id` int(11) NOT NULL,
  `faci_img` varchar(50) NOT NULL,
  `faci_name` varchar(50) NOT NULL,
  `faci_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`faci_id`, `faci_img`, `faci_name`, `faci_description`) VALUES
(2, '63977-cover.jpg', 'Recreation Facility', 'The Deck is the resort within the hotel that truly makes it a must-experience destination in the city.'),
(3, '19899-faci-2.jpg', 'Meeting Spaces', 'We have two major meeting spaces, each catering for up to 450 guests. With panoramic views over Victoria Harbour, WiFi and excellent feng shui, they are suitable for all manner of events.'),
(4, '40820-faci-1.jpg', 'Meeting Space', 'Located on our 2nd and 3rd floors, these large spaces are fully soundproofed and can be divided into self-contained meeting rooms to accommodate any size of event. In addition, we have another large function room and four smaller meeting rooms suitable fo');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gal_id` int(11) NOT NULL,
  `gal_img` varchar(50) NOT NULL,
  `gal_caption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gal_id`, `gal_img`, `gal_caption`) VALUES
(3, '72268-panorama.jpg', 'Panorama Victoria Harbour'),
(4, '63042-exterior.jpg', 'Exterior'),
(5, '68779-night.jpg', 'Night Architectural Exterior'),
(6, '75705-faci-3.jpg', 'Dining'),
(7, '70841-excelsior-executive-lounge-7.jpg', 'Executive Lounge'),
(8, '19773-cafe.jpg', 'Cafe on the First');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_description` varchar(255) NOT NULL,
  `home_bg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `hotel_name`, `hotel_description`, `home_bg`) VALUES
(1, 'App Sys Hotel', 'Affordable luxury hotel in Causeway Bay. Combining elegant accommodation with a choice of restaurants, fitness facilities and meeting rooms, we are the perfect hotel for your Hong Kong adventure.', 'dashboardcover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_img` varchar(255) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `room_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_img`, `room_name`, `room_description`, `room_rate`) VALUES
(7, '85879-superior_room.jpg', 'Superior Room', 'Located from the 5th to 8th floor. Spacious enough to accommodate two adults and two children (below 12 years), the Superior rooms of the Marco Polo Davao boast the following amenities', 3665),
(8, '74620-deluxeroom.jpg', 'Deluxe Room', 'Choose the imposing Mount Apo or vast waters of Davao Gulf as your view in the Deluxe Rooms, which ascend from the 9th until the 14th floors of the hotel. Capable of accommodating two adults and two children (below 12 years), our Deluxe rooms provide a ho', 3827),
(9, '59592-premier_room.jpg', 'Premier Room', 'Redesigned and retrofitted for the 21st century, the Premier Rooms located at the 15th and 16th floors convey a haven in hues of ivory and mahogany with accents of rich chocolate and caramel. \r\n\r\nDelight in the floor-to-ceiling windows of light that revea', 5049),
(10, '34299-executive.jpg', 'Executive Suite', 'The bedroom lies adjacent to a comfortable living room, furnished with sofas, chairs and a coffee table. A sizeable bathroom features a bathtub and attached shower. All guests have access to our Executive Lounge.', 21184),
(11, '31882-deluxe-suite.jpg', 'Deluxe Suite', 'Offering sweeping views over Victoria Harbour, this stylish one-bedroom suite includes a large bedroom, living room complete with two sofas and a working desk, and a sumptuous bathroom. Guests have access to our Executive Lounge.', 31131),
(12, '24156-deluxe-suite.jpg', 'Test', 'Test room', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$4w1jviEAmwakcycGDHm9Wugooc4u/80B/0cwtPdOWTaZvvpAmfqE6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`faci_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `faci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
