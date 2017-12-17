-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 09:54 AM
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
-- Database: `complaintsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(11) UNSIGNED NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_description` varchar(50) NOT NULL,
  `c_contactno` varchar(50) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `c_dateofoccurence` varchar(50) NOT NULL,
  `c_datefiled` varchar(50) DEFAULT NULL,
  `r_respondent` varchar(50) NOT NULL,
  `r_company` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `c_name`, `c_description`, `c_contactno`, `c_address`, `c_dateofoccurence`, `c_datefiled`, `r_respondent`, `r_company`, `status`, `username`) VALUES
(1, 'joshua', 'sample desc', '09075540191', 'sandawa dvo', '2017-12-11', '2017-12-14', 'mark', 'usep', 'Solved', 'admin'),
(2, 'joshua mark moldez', 'sample complaint', '098765', 'matina dvo', '2017-12-11', '2017-12-14', 'mark barrios', 'SM Entertainment', 'Pending', 'admin'),
(3, 'Angelina Jolie', 'Expired Products', '019283', 'New York, USA', '2017-12-12', '2017-12-14', 'Brad Pitt', 'Universal Studios', 'Pending', 'admin'),
(4, 'Jennifer Aniston', 'Plasctic Rice', '23856', 'Bangkal, Japan', '2017-12-10', '2017-12-16', 'Brad Pitt', 'DOST', 'Solved', 'admin'),
(5, 'Jessica Jung', 'Overpricing', '29374', 'Korea', '2017-12-10', '2017-12-16', 'Mark Barrios', 'USEP', 'Pending', 'admin'),
(6, 'Kris Chu', 'Incorrect Label', '123456', 'Maa, Davao City', '2017-12-11', '2017-12-14', 'Mark Barrios', 'DTI', 'Solved', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
