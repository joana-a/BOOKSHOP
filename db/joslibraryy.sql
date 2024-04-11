-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 05:23 PM
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
-- Database: `joslibraryy`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `author` varchar(300) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bookcover` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre`, `price`, `quantity`, `bookcover`) VALUES
(12, 'Powerless', 'Lauren Roberts', 'Fantasy', 20.00, 20, '../bookcovers/powerles.jpg'),
(13, 'Fourth Wing', 'Rebecca Yarros', 'Romance', 15.00, 30, '../bookcovers/fourthwing.jpg'),
(14, 'Love And Other Words', 'Christina Lauren', 'Romance', 10.00, 30, '../bookcovers/laow.jpg'),
(15, 'Once Upon A Broken Heart', 'Stephanie Garber', 'Fantasy', 15.00, 30, '../bookcovers/ouabh1.jpg'),
(16, 'The Poppy War', 'R. F. Kuang', 'Fantasy', 15.00, 30, '../bookcovers/poppywar.jpg'),
(17, 'A Good Girl\'s Guide To Murder', 'Holly Jackson', 'Thriller', 10.00, 30, '../bookcovers/agggtm.jpg'),
(18, 'Verity', 'Colleen Hoover', 'Romance', 20.00, 25, '../bookcovers/verity.jpg'),
(20, 'The Lightning Thief', 'Rick Riordan', 'Fantasy', 10.00, 40, '../bookcovers/lightningthief.jpg'),
(21, 'A Broken people\'s Playlist', 'Chimeka Garricks', 'Romance', 15.00, 30, '../bookcovers/abpp.jpg'),
(22, 'Mistborn', 'Brandon Sanderson', 'Fantasy', 20.00, 30, '../bookcovers/mistborn.jpg'),
(23, 'Excuse Me While I Ugly Cry', 'Joya Goffney', 'Romance', 20.00, 30, '../bookcovers/emwiuc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `book_id`, `quantity`) VALUES
(32, 5, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_products` int(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `method` varchar(200) NOT NULL,
  `payment_status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_products`, `address`, `order_date`, `total_amount`, `method`, `payment_status`) VALUES
(1, 2, 0, 'house no. 17, catalogue street, Takoradi, Effia, Ghana - 123456', '2024-04-09 00:00:00', 70.00, '', 'pending'),
(3, 3, 0, 'house no. 21, rue de la pae, Empire, Loot, Ghana - 56789', '2024-04-09 00:00:00', 30.00, '', 'completed'),
(4, 3, 0, 'house no. 21, rue de la pae, Empire, Loot, Ghana - 23456', '2024-04-09 00:00:00', 20.00, 'cash on delivery', 'pending'),
(5, 5, 0, 'house no. 24, Sgaeyl street, Basgiath, Riders Quadrant, Ghana - 123456', '2024-04-11 00:00:00', 15.00, 'cash on delivery', 'pending'),
(6, 3, 0, 'house no. 23, rue de gray, Rolin, Queens, Ghana - 456788', '2024-04-11 00:00:00', 45.00, 'cash on delivery', 'pending'),
(7, 3, 0, 'house no. 25, rue de la gray, Roi, Island, Ghana - 456789', '2024-04-11 00:00:00', 15.00, 'cash on delivery', 'pending'),
(8, 3, 0, 'house no. 26, rue de la del, Staten, Island, Ghana - 456780', '2024-04-11 00:00:00', 15.00, 'cash on delivery', 'pending'),
(9, 6, 0, 'house no. 2, Riders, Empyrean, BWC, Ghana - 234455', '2024-04-11 00:00:00', 10.00, 'credit card', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(2, 'customer'),
(1, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `pno` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `loyalty_points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `fname`, `lname`, `gender`, `pno`, `dob`, `email`, `password`, `loyalty_points`) VALUES
(2, 2, 'Paedyn', 'Gray', 'female', 543209087, '2010-06-16', 'paedyngray@gmail.com', '$2y$10$/sLr41O0QURPs8vHkVIqRu326P/8MUUG3J0fxUVrT1yMWhQD3Z4YW', 0),
(3, 2, 'Kai', 'Azer', 'male', 244998877, '2006-05-25', 'kaiazer@gmail.com', '$2y$10$xZNF9OU8Aqma3kAd6.0zXOXI/gZJzbSsAcvcz1jblsv3p7/SSymUa', 0),
(5, 2, 'Jo', 'Baby', 'female', 276792195, '2024-04-01', 'jobaby@gmail.com', '$2y$10$HkVKjqD87nn4Xn5kFM0heOuQaN5pnPUTWw5RggWGsV6BlcARQIbya', 0),
(6, 1, 'Violet', 'Sorrengail', 'female', 591245678, '2024-04-04', 'violetsorrengail@gmail.com', '$2y$10$xVaZ039jxxtK3DtlHZlyFO5/obQ5WOgT82EnGBT.pK80P1g9OyOCy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
