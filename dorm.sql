-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `createpost`
--

CREATE TABLE `createpost` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `no_of_students` int(20) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `createpost`
--

INSERT INTO `createpost` (`id`, `title`, `sub_title`, `image`, `city`, `latitude`, `longitude`, `address`, `email`, `description`, `no_of_students`, `active`) VALUES
(23, 'Post 5', 'new', 'phil-hearing-IYfp2Ixe9nM-unsplash.jpg', 'Colombo', '', '', '123/2A, colombo Rd, Colombo', 'owner1@gmail.com', '                                                  Near Colombo University', 2, 'Yes'),
(24, 'Post 5', 'new', 'pic8.jpg', 'Homagama', '6.825086', '80.035864', '123/2A, colombo Rd, Homagama', 'owner1@gmail.com', '                                                  Enjoy Your Stay', 2, 'Yes'),
(27, 'Araliya Hostels', 'Specially for Students', 'pic7.jpg', 'Homagama', '6.826096', '80.036691', '123/2A, colombo Rd, Homagama', 'ashenpavithra@gmail.com', '                         This is a boarding house for 2 children. For more details call- 0227864787', 2, 'Yes'),
(28, 'New Hostel', 'Specially for Students at NSBM', 'pic6.jpeg', 'Homagama', '6.823710', '80.032112', '125/2A, colombo Rd, Homagama', 'owner1@gmail.com', '                                                  Good Place to Stay while you Study', 1, 'Yes'),
(31, 'HopeWell', 'rthrth', 'pic8.jpg', 'trhrt', '', '', '123/2A, colombo Rd, Malabe', '', '                         ', 3, 'Yes'),
(32, 'Kamals Hostel', 'Closer to SLIIT University', 'pic9.jpg', 'Malabe', '6.906143', '79.957262', '123/2A, colombo Rd, Malabe', 'owner1@gmail.com', 'Good Place to stay.Hope you enjoy', 4, 'Yes'),
(33, 'Sudu Araliya', 'Specially for Students at CINEC', 'pic5.jpg', 'Malabe', '6.921345', '79.970436', '123/2A, colombo Rd, Malambe', 'owner1@gmail.com', 'Hostel specially for CINEC students. ', 2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Ashen', 'ashenpavithra@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'Owner1', 'owner1@gmail.com', '202cb962ac59075b964b07152d234b70', 'owner'),
(10, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(11, 'user1', 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(12, 'user2', 'user2@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(15, 'ower2', 'owner2@gmail.com', '202cb962ac59075b964b07152d234b70', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createpost`
--
ALTER TABLE `createpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createpost`
--
ALTER TABLE `createpost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
