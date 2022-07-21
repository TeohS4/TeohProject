-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Fruits', 'Category for fresh fruits'),
(2, 'Dairy', 'Category for milk products'),
(3, 'Organic Foods', 'Category for organic food'),
(4, 'Pasta & Instant Noodles', 'Category for pasta and instant noodles'),
(5, 'Vegetables', 'Category for vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE `my_order` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`id`, `name`, `phone`, `email`, `payment_method`, `address`, `total_products`, `total_price`) VALUES
(39, '', 0, '', 'Cash on Delivery', '', 'Sweet Potatoes (1) , Organic Yogurt (1) , Australia Potatoes (1) ', '24'),
(40, 'Teoh Wei Jie', 124567288, 'weijieteoh26@gmail.com', 'Cash on Delivery', '1, LORONG JAMBU MADU 4', 'San Remo Pasta (1) , Organic Eggs (1) , Organic Almond Milk (1) , Organic Vanilla Ice Cream (1) , Farm Fresh Milk 1L (1) ', '52'),
(41, 'Teoh Wei Jie', 124567288, 'weijieteoh26@gmail.com', 'Touch N Go', '1, LORONG JAMBU MADU 4', 'Peanut Butter (2) , Organic Eggs (1) ', '37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `category_id`) VALUES
(1, 'Orange', '4.00', 'orange.jpg', 1),
(2, 'Banana', '6.00', 'banana.jpg', 1),
(3, 'Brocolli', '3.90', 'broccoli.jpg', 5),
(4, 'Farm Fresh Milk 1L', '8.50', 'freshmilk.jpg', 2),
(5, 'Australia Avocado', '5.60', 'avocado.png', 1),
(6, 'Organic Eggs', '9.50', 'eggs.jpg', 3),
(7, 'Peanut Butter', '13.50', 'peanut.png', 3),
(8, 'San Remo Pasta', '4.20', 'pasta.png', 4),
(9, 'Organic Yogurt', '12.90', 'yogurt.png', 3),
(10, 'Indomie Instant Noodles', '4.60', 'indomie.png', 4),
(11, 'Sweet Potatoes', '8', 'sweetpotato.jpg', 5),
(12, 'Strawberries', '11.50', 'strawberry.jpg', 1),
(13, 'Salted Butter', '14.50', 'butter.png', 2),
(14, 'Fresh Salmon', '12.90', 'salmon.png', 3),
(15, 'Australia Potatoes', '3.20', 'potato.png', 5),
(16, 'Organic Almond Milk', '8.90', 'almondmilk.png', 3),
(17, 'Organic Vanilla Ice Cream', '19.50', 'ice cream.png', 3),
(18, 'Milo 3 in 1 30s', '23', 'milo.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `email`, `password`, `gender`, `address`, `dob`) VALUES
(3, 'Ghostly', 'teohs4@hotmail.com', 'test123', 'male', '1, LORONG JAMBU MADU 4', '1999-11-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_order`
--
ALTER TABLE `my_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `my_order`
--
ALTER TABLE `my_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
