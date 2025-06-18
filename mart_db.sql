-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 01:05 AM
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
-- Database: `mart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `building` text NOT NULL,
  `colony` text NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `brand`, `price`, `image`) VALUES
(102, 'JBL Speaker Model 514', 'JBL', 1810.41, 'product_1.jpg'),
(103, 'JBL Headphones Model 785', 'JBL', 1050.53, 'product_2.jpg'),
(104, 'Nokia Tablet Model 148', 'Nokia', 910.16, 'product_3.jpg'),
(105, 'Asus TV Model 225', 'Asus', 1457.00, 'product_4.jpg'),
(106, 'iPhone 14 pro', 'Apple', 1126.81, 'product_5.jpg'),
(107, 'Panasonic Laptop Model 996', 'Panasonic', 280.63, 'product_6.jpg'),
(108, 'Sony Headphones Model 589', 'Sony', 1309.46, 'product_7.jpeg'),
(109, 'Apple Ipad Air', 'apple', 1600.00, 'product_8.jpeg'),
(111, 'JBL Speaker Model 754', 'JBL', 800.00, 'product_9.jpeg'),
(112, 'Apple Macbook Pro', 'Apple', 1599.22, 'product_10.jpeg'),
(113, 'hp Printer Model 294', 'hp', 1055.89, 'product_11.jpeg'),
(114, 'Canon Camera Model 456', 'Canon', 1176.86, 'product_12.jpeg'),
(115, 'Dell Monitor Model 773', 'Dell', 743.02, 'product_13.jpeg'),
(118, 'Samsung Smartwatch Model 229', 'Samsung', 260.41, 'product_14.jpeg'),
(119, 'HP Laptop Model 271', 'HP', 354.44, 'product_15.jpeg'),
(120, 'Xiaomi Smartphone Model 521', 'Xiaomi', 904.37, 'product_16.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
