-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 07:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamers_arena`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `game_name`, `price`, `size`, `company`, `image`) VALUES
(12, 'Call of Duty Black Ops 4', 6200, 62, 'Activision', 'battlefield.jpeg'),
(13, 'Battlefield 4 hardline', 3200, 54, 'EA', 'starwars.jpg'),
(14, 'NFS', 6211, 43, 'Rockstar', 'nfs.jpg'),
(15, 'Fifa', 2344, 54, 'EA', 'fifa.jpg'),
(16, 'Moto Racer', 1200, 21, 'Rockstar', 'bike.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`productid`, `userid`, `fname`, `lname`, `phone`, `address`, `city`) VALUES
(4, 4, 'usman', 'akram', 2147483647, 'house number 8 asif colony jauhaarbad', 'chakwal'),
(4, 4, 'usman', 'akram', 2147483647, 'house number 8 asif colony jauhaarbad', 'chakwal'),
(5, 4, 'usman', 'adlsf', 2147483647, 'dsifajlidsjfl', 'jauharabad'),
(4, 6, 'usman', 'akram', 2147483647, 'house number 8 asif colony jauhaarbad', 'jauharabad'),
(5, 6, 'usman', 'akram', 2147483647, 'house number 8 asif colony jauharabad', 'Rawalpindi'),
(4, 7, 'dsasfd', 'adssf', 231, 'sad', 'jauharabad'),
(5, 7, 'ads', 'ads', 0, 'sda', 'Rawalpindi'),
(8, 7, 'dsasfd', 'adssf', 12312, 'sa', 'Rawalpindi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `username`, `email`, `phone_number`, `password`, `type`) VALUES
(8, 'Super', 'Admin', 'admin123', 'admin123@game.com', 9078601, '$2y$10$QZNzn2tzYwHt7rWK8LeNVumZz6km5Cp5uhpFmWIDVlbXbIPVuFduq', 'A'),
(9, 'User', 'Client', 'user123', 'user123@game.com', 907860158, '$2y$10$6fatfJs.qRlbg7NTZvzWder9ahs5r0y28XW.88vxSX7a9qU2EcL.a', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
