-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 12:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(26, 'Buffalo Wings', '599', 'Buffalo Wings are crispy, juicy chicken wings tossed in a tangy, spicy buffalo sauce, served hot and perfect for dipping—bold, flavorful, and irresistibly crave-worthy.', 'images/best_seller/Buffalo_wings.jpg'),
(27, 'Fish Fillet', '499', 'Fish Fillet is tender, flaky white fish coated in a light, golden batter and fried to crispy perfection—delicately seasoned and served with a zesty dip for a mouthwatering bite every time.', 'images/best_seller/Fish_fillet.jpg'),
(28, 'Pork Lumpia', '399', 'Pork Lumpia is a crispy, golden spring roll filled with savory seasoned ground pork, vegetables, and spices—fried to perfection and served with a sweet and tangy dipping sauce for an irresistible crunch in every bite.', 'images/best_seller/Lumpia.jpg'),
(29, 'Porkchop', '699', 'Porkchop is a thick, juicy cut of pork, perfectly seasoned and seared to a golden-brown crust—tender on the inside and bursting with savory flavor in every bite.', 'images/best_seller/Pork_chop.jpg'),
(30, 'Seafood', '699', 'Seafood is a delicious medley of the ocean’s finest—plump shrimp, tender squid, and fresh fish, lightly seasoned and cooked to perfection, offering a burst of briny, savory flavor in every bite.', 'images/best_seller/Seafood.jpg'),
(31, 'Spaghetti', '399', 'Spaghetti is a comforting classic with al dente noodles smothered in rich, savory tomato sauce, loaded with seasoned ground meat, and topped with a generous sprinkle of cheese—hearty, flavorful, and loved by all ages.', 'images/best_seller/Spaghetti.jpg');

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
(6, 'Zyne', 'Labrador', 'zynelabrador@gmail.com', '+63 912 345 6789', 'Do you offer pick up?', '2025-05-03');

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
  `deliveryDate` date DEFAULT NULL,
  `deliveryTime` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `foodOrder` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `phone`, `address`, `landmark`, `payment`, `deliveryDate`, `deliveryTime`, `notes`, `foodOrder`) VALUES
(13, 'Zyne Labrador', '09123456789', 'Vinzons Camarines Norte', 'Plusivo', 'Cash on Delivery', '2025-05-15', '15:00', 'Thank you!', 'Food: Buffalo Wings, Quantity: 1\nFood: Pork Lumpia, Quantity: 1\n');

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
(7, 'customer', 'customer@gmail.com', 'The service is amazing!');

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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
