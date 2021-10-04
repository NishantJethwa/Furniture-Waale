-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 01:08 PM
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
-- Database: `furniture_wale`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(11) NOT NULL,
  `user_cart_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `user_cart_id`, `user_id`, `item_id`) VALUES
(6, 1235, 1, 1),
(7, 1235, 1, 2),
(9, 1235, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lr_essentials`
--

CREATE TABLE `lr_essentials` (
  `LR_id` int(11) NOT NULL,
  `LR_name` varchar(255) NOT NULL,
  `LR_image` varchar(255) NOT NULL,
  `LR_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lr_essentials`
--

INSERT INTO `lr_essentials` (`LR_id`, `LR_name`, `LR_image`, `LR_link`) VALUES
(1, 'Sofa Set', 'living_room_001.jpeg', 'sofas'),
(2, 'Chairs', 'living_room_002.jpeg', 'chairs'),
(3, 'Tables', 'living_room_003.jpeg', 'tables');

-- --------------------------------------------------------

--
-- Table structure for table `lr_essentials_items`
--

CREATE TABLE `lr_essentials_items` (
  `item_id` int(11) NOT NULL,
  `LR_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_price` int(255) NOT NULL,
  `item_guarantee` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lr_essentials_items`
--

INSERT INTO `lr_essentials_items` (`item_id`, `LR_id`, `item_name`, `item_image`, `item_price`, `item_guarantee`, `item_desc`) VALUES
(1, 1, 'Wood Sofa set-1', 'https://i.imgur.com/e9VnSng.png', 550, '2 Years Guarantee', ''),
(2, 1, 'Wood Sofa set-2', 'https://i.imgur.com/e9VnSng.png', 600, '1 Years Guarantee', ''),
(3, 2, 'Chair Set-01', 'https://i.imgur.com/e9VnSng.png', 500, '3 years guarantee', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` longtext NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_address`, `user_password`) VALUES
(1, 'hamzajg16@gmail.com', 'B/37 Nutan Abhishek, 2nd cross road Lokhandwala complex, Andher (W)', '$2y$12$1ftN36rouGxdaAn0KCtRruC09m.yLqoCHGVQj6FG8yatYtIzYSUK2'),
(2, 'ansh.jain@gmail.com', 'lumiere', '$2y$12$OV10N58Ro9SD3rB0y1s3X.SZtWAFiqKhrtb6loQDlJcL1laBGR4We');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `lr_essentials`
--
ALTER TABLE `lr_essentials`
  ADD PRIMARY KEY (`LR_id`);

--
-- Indexes for table `lr_essentials_items`
--
ALTER TABLE `lr_essentials_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lr_essentials`
--
ALTER TABLE `lr_essentials`
  MODIFY `LR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lr_essentials_items`
--
ALTER TABLE `lr_essentials_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `lr_essentials_items` (`item_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
