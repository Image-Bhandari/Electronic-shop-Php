-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2019 at 01:22 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

CREATE TABLE `tbl_admin_users` (
  `admin_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`admin_id`, `user_id`, `email`, `password`, `gender`, `dob`) VALUES
(4, 24, 'admin@admin.com', '$2y$10$Z.iFMvTbIDasdoRCZVKN/eA83AH0hbnJmfRIVJHTMFv88KlNUpzmG', 'M', '2019-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_id`, `product_id`, `date`) VALUES
(1, 24, 4, '2019-01-02'),
(2, 26, 7, '2019-01-06'),
(3, 26, 6, '2019-01-06'),
(5, 27, 8, '2019-01-06'),
(6, 27, 9, '2019-01-06'),
(7, 26, 9, '2019-01-06'),
(8, 24, 9, '2019-01-06'),
(9, 26, 6, '2019-01-06'),
(10, 26, 8, '2019-01-09'),
(11, 26, 6, '2019-01-09'),
(12, 27, 6, '2019-01-13'),
(13, 28, 10, '2019-01-13'),
(14, 32, 7, '2019-01-13'),
(15, 32, 10, '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'COMPUTER'),
(7, 'SMART PHONES'),
(8, 'CHARGER'),
(9, 'SIM CARD'),
(10, 'I-PHONE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_featured`
--

CREATE TABLE `tbl_featured` (
  `feature_id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_featured`
--

INSERT INTO `tbl_featured` (`feature_id`, `category_id`, `product_id`, `product_name`, `product_price`, `product_description`) VALUES
(4, 6, 6, 'DELL DESKTOP', '1500', 'Brand new Desktop for PC \r\nInches: 2\r\n'),
(5, 7, 7, 'Xiaomi Redmi Note 5', '45,000', 'xiaomi has lunched the brand new redmi series. the phone is affordable and has alot new features like camera, celluar service and touch screen.'),
(6, 8, 8, 'Samsung Charger', '150', 'genuine charger of samsung in stuck. not availabe any where else at mminimum cost.'),
(7, 9, 9, 'Hello Sim Cards', '440', 'Hello has lunched new hello sims which has 4G service . Limited in stuck and 5 stars for the performance. '),
(8, 10, 11, 'iphone 5', '400', 'it is original');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(8) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `category_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_price`, `product_description`, `category_id`) VALUES
(6, 'DELL DESKTOP', '1500', 'Brand new Desktop for PC \r\nInches: 2\r\n', 6),
(7, 'Xiaomi Redmi Note 5', '45,000', 'xiaomi has lunched the brand new redmi series. the phone is affordable and has alot new features like camera, celluar service and touch screen.', 7),
(8, 'Samsung Charger', '150', 'genuine charger of samsung in stuck. not availabe any where else at mminimum cost.', 8),
(9, 'Hello Sim Cards', '440', 'Hello has lunched new hello sims which has 4G service . Limited in stuck and 5 stars for the performance. ', 9),
(10, 'SD card', '200', 'very nice and portable.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `review_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_id`, `product_id`, `review_text`) VALUES
(4, 24, 8, 'Very Good charger.\r\nFull charges phone in just 5 minutes'),
(6, 26, 6, 'it has very good display.\r\nLed screen is good for game play.\r\n'),
(7, 26, 6, 'It\'s very very bad......................'),
(8, 27, 6, 'umm. its okay.. but not reliable'),
(9, 29, 6, 'its okay'),
(10, 30, 1, ''),
(11, 30, 1, ''),
(12, 30, 1, ''),
(13, 30, 1, ''),
(14, 31, 7, 'wow its a nice phone !!!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploaded_review`
--

CREATE TABLE `tbl_uploaded_review` (
  `uprev_id` int(8) NOT NULL,
  `review_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `review_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_uploaded_review`
--

INSERT INTO `tbl_uploaded_review` (`uprev_id`, `review_id`, `user_id`, `product_id`, `review_text`) VALUES
(1, 3, 26, 7, 'Nice Phone .. MUst Buy !! :) :) \r\n'),
(2, 5, 26, 6, 'it has very good display.\r\nLed screen is good for game play.\r\n'),
(3, 8, 26, 9, 'ghjk'),
(4, 15, 32, 6, 'wow its nice ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `email`, `password`, `gender`, `dob`) VALUES
(26, 'user@user.com', '$2y$10$XOMza7K0az1XSzrMrqXa1uGcQLyCh3lRpi6GWJiZpzsdrrxm9Rih6', 'M', '2019-01-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_featured`
--
ALTER TABLE `tbl_featured`
  ADD PRIMARY KEY (`feature_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `product_price` (`product_price`),
  ADD KEY `product_description` (`product_description`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_uploaded_review`
--
ALTER TABLE `tbl_uploaded_review`
  ADD PRIMARY KEY (`uprev_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_featured`
--
ALTER TABLE `tbl_featured`
  MODIFY `feature_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_uploaded_review`
--
ALTER TABLE `tbl_uploaded_review`
  MODIFY `uprev_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
