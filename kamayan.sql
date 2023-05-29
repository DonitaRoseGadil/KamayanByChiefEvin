-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 07:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `incoming_users`
--

CREATE TABLE `incoming_users` (
  `user_id` int(11) NOT NULL,
  `firstName` text DEFAULT NULL,
  `lastName` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `createdAT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incoming_users`
--

INSERT INTO `incoming_users` (`user_id`, `firstName`, `lastName`, `address`, `password`, `createdAT`) VALUES
(1, 'Xyzel', 'Oribiana', 'P-3 Pamorangon Daet Camarines Norte', 'dsafasf', '2023-05-27 00:00:00'),
(2, 'Xyzel', 'Oribiana', 'P-3 Pamorangon Daet Camarines Norte', 'dsafasf', '2023-05-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `imgPath` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `title`, `price`, `caption`, `imgPath`) VALUES
(1, 'Bufallo wingssssssssssfsdfsdfsdfsdfsdf', '252', 'the best food in town', 'images/best_seller/Buffalo_wings.jpg'),
(3, 'Fish Filletssssssdfds', '100', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos incidunt asperiores, est possimus perspiciatis alias veniam error, iure officia ratione et quo, dolore aut deleniti. Labore nam perspiciatis fugiat id.', 'images/best_seller/Seafood.jpg'),
(14, 'Pork Chop Chop', '200', 'Pork Chop in town', 'images/best_seller/Pork_chop.jpg'),
(15, 'Spagetthi', '100', 'Best Spag in town', 'images/best_seller/Spaghetti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `firstName` text DEFAULT NULL,
  `lastName` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `mobileNumber` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `createdAt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `firstName`, `lastName`, `email`, `mobileNumber`, `message`, `createdAt`) VALUES
(1, 'John Michael', 'Molina', 'jmmmolinathebest@gmail.com', '09512766496', 'test', '2023-05-28'),
(2, 'Xyzel', 'Oribiana', 'jmmmolinathebest@gmail.com', '09512766496', 'Reservation po ako please', '2023-05-28'),
(3, 'John Michael', 'Molina', 'jmmmolinathebest@gmail.com', '09512766496', 'hey there love you', '2023-05-28'),
(4, 'John Michael', 'Molina', 'jmmmolinathebest@gmail.com', '09512766496', 'test', '2023-05-28'),
(5, 'John Michael', 'Molina', 'jmmmolinathebest@gmail.com', '09512766496', 'sdfsdf', '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `deliveryTime` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `foodOrder` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `phone`, `address`, `landmark`, `payment`, `deliveryTime`, `notes`, `foodOrder`) VALUES
(8, 'Arianne Delos Reyesssssss', '09512766496', 'P-3 Pamorangon Daet Camarines Nortesss', 'dsf', 'Cash on Delivery', '06:47', 'sdfsdfsdsd', 'Food: Fish Filletsssss, Quantity: 4'),
(9, 'John Michael Molina SR.', '09512766496', 'P-3 Pamorangon Daet Camarines Norte', 'Purok-3', 'Cash on Delivery', '08:43', 'Pakidaliin', 'Food: Bufallo wingsssssss, Quantity: 3Food: Fish Filletsssss, Quantity: 5'),
(10, 'John Michael Molina', '09512766496', 'P-3 Pamorangon Daet Camarines Norte', 'sdf', 'Gcash', '13:10', 'fsdfs', 'Food: Bufallo wingssssssssssfsdfsdfsdfsdfsdf, Quantity: 5\n');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `username`, `email`, `comment`) VALUES
(1, 'Jhon Michael Molina', 'jmmmolinathebest@gmail.com', 'Sarap sulit'),
(2, 'Juan Dela Cruz', 'mail@mail.com', 'Solid talaga'),
(3, 'James', 'jmmmolinathebest@gmail.com', 'Solod po hehehehhe'),
(4, 'Molina', 'jmmmolinathebest@gmail.com', 'The best'),
(5, 'User', 'jmmmolinathebest@gmail.com', 'test, solid'),
(6, 'root', 'teset424@etre.com', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incoming_users`
--
ALTER TABLE `incoming_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incoming_users`
--
ALTER TABLE `incoming_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
