-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 02:40 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `declone`
--

CREATE TABLE `declone` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `salary` int(11) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `declone`
--

INSERT INTO `declone` (`id`, `firstname`, `email`, `mobile`, `age`, `gender`, `salary`, `department`) VALUES
(1, 'VISHAL', 'v@gmail.com', '546846', 22, 'male', 40000, 'HR'),
(2, 'harsh', 'zzashisth01@gmail.com', '08130817276', 18, 'male', 300000, 'QUALITY'),
(3, 'harsh', 'har@gmail.com', '546846', 22, 'male', 15000, 'HR'),
(4, 'abc', 'ab@gmail.com', '549489', 25, 'male', 20000, 'QUALITY'),
(5, 'virat', 'vir@gmail.com', '8130817571', 33, 'male', 40000, 'DEVELOPER');

-- --------------------------------------------------------

--
-- Table structure for table `desc`
--

CREATE TABLE `desc` (
  `role` int(1) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `experience` text NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `education` text NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `favourite_color` varchar(10) NOT NULL,
  `favourite_sport` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desc`
--

INSERT INTO `desc` (`role`, `id`, `firstname`, `lastname`, `email`, `mobile`, `experience`, `age`, `dob`, `education`, `gender`, `address`, `image`, `password`, `favourite_color`, `favourite_sport`) VALUES
(1, 1, 'admin@gmail.com', '', 'admin@gmail.com', '08130817276', 'fresher', 18, '2020-07-29', '{"from":["2020-08-10"],"to":["2020-08-05"],"course":["echelon"],"college":["kill"]}', 'male', 'VPO Sadpura ,Tigoan,Faridabad', '14_08_20_08_19_20bulletin-board-3127287_1920.jpg', 'asdf', 'blue', 'basketball'),
(2, 2, 'harsh', '', 'harshvashisth01@gmail.com', '08130817276', 'fresher', 20, '2020-08-04', '{"from":["2020-08-03"],"to":["2020-08-05"],"course":["Btech(Mechanical)"],"college":["echelon"]}', 'male', 'VPO Sadpura ,Tigoan,Faridabad', '14_08_20_08_21_30bulletin-board-3127287_1920.jpg', 'zxc', 'blue', 'cricket'),
(2, 3, 'harsh@gmail.com', '', 'rav@gmail.com', '08130817276', 'fresher', 18, '2020-08-12', '{"from":["2020-08-12"],"to":["2020-08-18"],"course":["Btech(Mechanical)"],"college":["btech"]}', 'male', 'VPO Sadpura ,Tigoan,Faridabad', '18_08_20_07_33_23ent.jpg', 'ASDF', 'blue', 'basketball'),
(2, 4, 'chandan', 'rai', 'chan@gmail.com', '08130817276', 'fresher', 18, '2020-09-30', '{"from":["2020-09-02"],"to":["2020-09-03"],"course":["echelon"],"college":["btech"]}', 'male', 'VPO Sadpura ,Tigoan,Faridabad', '', '147', 'blue', 'basketball');

-- --------------------------------------------------------

--
-- Table structure for table `email_table`
--

CREATE TABLE `email_table` (
  `id` int(11) NOT NULL,
  `sender_email` varchar(30) NOT NULL,
  `receiver_email` varchar(30) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `inbox_delete` int(11) NOT NULL,
  `sent_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_table`
--

INSERT INTO `email_table` (`id`, `sender_email`, `receiver_email`, `subject`, `message`, `inbox_delete`, `sent_delete`) VALUES
(5, 'abhijit@gmail.com', 'b@gmail.com', 'text', 'welcome everyone', 0, 0),
(12, 'abhijit@gmail.com', 'abc@gmail.com', 'abc', 'EWKPOJJ', 0, 0),
(14, 'abhijit@gmail.com', 'b@gmail.com', 'hello', 'dsgwhw', 0, 1),
(15, 'abhijit@gmail.com', 'zzashisth01@gmail.com', 'hello', 'email is been sent to the receiver', 0, 0),
(16, 'admin@gmail.com', 'abhijit@gmail.com', 'hello', 'daSHBNJMNTEJM ', 1, 0),
(17, 'admin@gmail.com', 'zzashisth01@gmail.com', 'hello', 'gf,xfyk, vfyl,uxgt', 0, 0),
(18, 'admin@gmail.com', 'abhijit@gmail.com', 'hello', 'dndjmn  mfykm ', 1, 0),
(19, 'harshvashisth01@gmail.com', 'admin@gmail.com', '3rtfgq', 'Fqfvqaf', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `declone`
--
ALTER TABLE `declone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `desc`
--
ALTER TABLE `desc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `email_table`
--
ALTER TABLE `email_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `declone`
--
ALTER TABLE `declone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `desc`
--
ALTER TABLE `desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email_table`
--
ALTER TABLE `email_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
