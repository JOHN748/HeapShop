-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 02:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heapshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `category_description`, `category_image`) VALUES
(121, 'Mens Fashion', 'Fashion Items for Men', 'mens fashion.png'),
(120, 'Cosmetics', 'Beauty Products for Women', 'beauty products.png'),
(119, 'Sports', 'Sports Accessories', 'sports.png'),
(118, 'Furnitures', 'Wooden and Steel Furnitures', 'furnitures.png'),
(116, 'Electronics', 'Electrical Items', 'electronics.png'),
(117, 'Home Appliances', 'Appliances for home', 'Home Appliances.png'),
(122, 'Womens Fashion', 'Fashion Item for Women', 'womens fashion.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `gallery_images` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `featured_product` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `sub_categories_id`, `product_name`, `slug`, `mrp`, `price`, `quantity`, `featured_image`, `gallery_images`, `short_desc`, `description`, `added_by`, `added_on`, `status`, `featured_product`) VALUES
(60, 116, 43, 'product1', 'greftgr', 1, 1, 1, 'beauty products.png', 'books.png,electronics.png,furnitures.png', '1', '1', 'JOHN', '2020-12-30', 1, 1),
(61, 116, 43, 'product2rf', 'thgrh', 1, 1, 1, 'furnitures.png', 'mens fashion1.png,sport.png,sports.png', '1', '1', 'JOHN', '2020-12-30', 1, 1),
(62, 116, 43, 'product45', 'gfvbhgh', 1, 1, 1, 'sports.png', 'mens fashion.png,mens fashion1.png,sport.png', '1', '1', 'JOHN', '2021-01-01', 1, 1),
(63, 116, 43, 'product24', 'dfbfrgnbfrg', 1, 1, 1, 'Home Appliances.png', 'mens fashion.png,mens fashion1.png,sport.png,womens fashion1.png', '1', '1', 'JOHN', '2021-01-01', 1, 1),
(64, 116, 43, 'product67', 'dfgredfg', 1, 1, 1, 'books.png', 'electronics.png,furnitures.png,Home Appliances.png', '1', '1', 'JOHN', '2021-01-01', 1, 1),
(72, 116, 43, 'fgbhfh', 'svgdfg', 1, 1, 1, 'screen_capture 2020-04-10_5-11-35_pm.png', 'firlas.jpg', '1', '1', 'JOHN', '2021-01-04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `sub_category_image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `sub_category_image`) VALUES
(43, 116, 'Laptops', 'electronics.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_image` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `joined_at` date DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `user_image`, `status`, `joined_at`, `token`) VALUES
(83, 'JOHN', 'johnakl7480@gmail.com', 'admin', 'e976848178bad8eb307dd00cb4ec5e86', 'JOHN.jpg', 1, '2020-11-27', NULL),
(119, 'logi', 'logimeet@gmail.com', 'vendor', '96e79218965eb72c92a549dd5a330112', '34935.jpg', 1, '2020-12-23', NULL),
(120, 'kamala', 'kamalama@gmail.com', 'customer', '96e79218965eb72c92a549dd5a330112', '34937.jpg', 1, '2020-12-23', NULL),
(122, 'mahesh', 'maheshbabu@gmail.com', 'customer', '96e79218965eb72c92a549dd5a330112', 'image--000.png', 1, '2021-02-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `product_name`, `product_image`) VALUES
(3, 121, 64, 'product67', 'books.png'),
(4, 121, 62, 'product45', 'sports.png'),
(67, 83, 64, 'product67', 'books.png'),
(77, 83, 72, 'fgbhfh', 'screen_capture 2020-04-10_5-11-35_pm.png'),
(79, 122, 64, 'product67', 'books.png'),
(80, 83, 62, 'product45', 'sports.png'),
(81, 83, 60, 'product1', 'beauty products.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
