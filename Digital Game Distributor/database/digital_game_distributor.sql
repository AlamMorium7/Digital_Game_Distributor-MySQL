-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 01:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_game_distributor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Game_Name` varchar(100) NOT NULL,
  `Game_Price` double(10,2) NOT NULL,
  `Game_Image` varchar(255) NOT NULL,
  `Game_Register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `Publisher`, `Game_Name`, `Game_Price`, `Game_Image`, `Game_Register`) VALUES
(1, 'CD Projekt Red', 'Cyberpunk 2077', 60.00, './assets/Games/1.jpg', '2020-03-28 11:08:57'),
(2, 'CD Projekt Red', 'Witcher 3', 30.00, './assets/Games/2.jpg', '2020-03-28 11:08:57'),
(3, 'Bethesda', 'Doom: Eternal', 60.00, './assets/Games/3.jpg', '2020-03-28 11:08:57'),
(4, 'Rockstar Games', 'Red Dead Redemption 2', 50.00, './assets/Games/4.jpg', '2020-03-28 11:08:57'),
(5, 'EA', 'FIFA 20', 60.00, './assets/Games/5.jpg', '2020-03-28 11:08:57'),
(6, '505 Games', 'Control', 40.00, './assets/Games/6.jpg', '2020-03-28 11:08:57'),
(7, 'Activision', 'Sekiro: Shadows Die Twice', 30.00, './assets/Games/7.jpg', '2020-03-28 11:08:57'),
(8, 'Capcom', 'Resident Evil 2', 40.00, './assets/Games/8.png', '2020-03-28 11:08:57'),
(9, 'Rockstar Games', 'GTA V', 15.00, './assets/Games/9.jpg', '2020-03-28 11:08:57'),
(10, 'Rockstar Games', 'Max Payne 3', 10.00, './assets/Games/10.jpg', '2020-03-28 11:08:57'),
(11, 'Activision', 'Call of Duty: Modern Warfare (2019)', 30.00, './assets/Games/11.jpg', '2020-03-28 11:08:57'),
(12, 'Activision', 'Call of Duty: Modern Warfare 2 Remastered', 20.00, './assets/Games/12.jpg', '2020-03-28 11:08:57'),
(13, 'Ubisoft', 'Watch Dogs 2', 10.00, './assets/Games/13.jpg', '2020-03-28 11:08:57'),
(14, 'Ubisoft', 'Assassins Creed: Odyssey', 25.00, './assets/Games/14.jpg', '2020-03-28 11:08:57'),
(15, 'Naughty Dogs', 'Last of Us 2', 50.00, './assets/Games/15.png', '2020-03-28 11:08:57'),
(16, 'Square Enix', 'Marvels Avengers', 40.00, './assets/Games/16.jpg', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `email`, `password`) VALUES
(1, 'nazmul_hasan', 'nazmul.hasan7@northsouth.edu', 'abcd123'),
(2, 'samya_sunibir_das', 'samya.das@northsouth.edu', 'sa123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
