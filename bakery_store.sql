-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 02:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descp` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `descp`) VALUES
(2, 'Cakes', 'Tasty Cakes'),
(8, 'Brownies', 'Brownies'),
(9, 'Pastries', 'Pastries');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `deals_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deals_id`, `title`, `description`) VALUES
(1, 'Free Delivery', 'Apply This coupon \"freeCrave\" to get free Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(100) NOT NULL,
  `p_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  `photo` text NOT NULL,
  `discount` float NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `price`, `photo`, `discount`, `cat_id`, `sub_id`) VALUES
(4, 'White Cake With Strawberry and Blueberry on Top', 45, 'images/products/White-Cake-With-Strawberry-and-Blueberry-on-Top.jpg', 2, 2, 2),
(5, 'Black Forest Cake', 50, 'images/products/BlackForest-Cake.jpg', 4, 2, 2),
(7, 'Brownies With Nuts', 10, 'images/brownies/browni1.jpeg', 0, 8, 3),
(8, 'Strawberry Brownies', 10, 'images/brownies/browni2.jpeg', 4, 8, 3),
(9, 'Brownies with Ice-cream', 15, 'images/brownies/browni3.jpeg', 2, 8, 3),
(10, 'Short Strawberry & Cream Pastry', 5, 'images/pastries/pastry1.jpeg', 0, 9, 9),
(11, 'Puff Pastry', 6, 'images/pastries/puff.jpg', 0, 9, 8),
(12, 'Chocolate Pastry', 8, 'images/pastries/pastry3.jpeg', 3, 9, 9),
(13, 'Choco & Vanilla Cream Pastry', 10, 'images/pastries/pastry2.jpeg', 3, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `pg_id` int(100) NOT NULL,
  `path` text CHARACTER SET latin1 NOT NULL,
  `title` varchar(250) CHARACTER SET latin1 NOT NULL,
  `pro_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`pg_id`, `path`, `title`, `pro_id`) VALUES
(2, 'images/products/White-Cake-With-Strawberry-and-Blueberry-on-Top.jpg', 'White Cake With Strawberry and Blueberry on Top', 4),
(3, 'images/products/BlackForest-Cake.jpg', 'Black Forest Cake', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sc_id` int(100) NOT NULL,
  `sc_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sc_descp` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cat_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sc_id`, `sc_name`, `sc_descp`, `cat_id`) VALUES
(1, 'Wedding Cakes', 'Cakes for Wedding Ceremony', 2),
(2, 'Birthday', 'Cakes for Birthday Parties', 2),
(3, 'Brownie Cakes', 'cakes', 8),
(5, 'Brownie Cookies', 'cookies', 8),
(8, 'Puff Pastries', 'puffs', 9),
(9, 'Cake Pastry', 'small cakes', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mobile_no` varchar(20) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `name`, `mobile_no`, `gender`) VALUES
('demo@gmail.com', '123', 'demo', '337746466', 'Male'),
('dummy@gmail.com', '123', 'dummyuser', '5145618794', 'Male'),
('kpsmehta@gmail.com', '123', 'Kanwar', '+1(514)-561-8794', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_id` (`cat_id`) USING BTREE;

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deals_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`) USING BTREE,
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`pg_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deals_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `pg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `sub_category` (`sc_id`);

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`p_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
