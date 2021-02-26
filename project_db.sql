-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 12:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` varchar(15) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_description` varchar(30) NOT NULL,
  `product_category` varchar(15) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` tinyint(3) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `product_name`, `product_description`, `product_category`, `product_price`, `product_quantity`, `image`) VALUES
('1', 'Product Name', 'Description', '1', 11, 10, ''),
('111', 'Product Name', 'Description', '1', 11, 10, ''),
('1111', 'Product Name', 'Description', '1', 11, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblshop`
--

CREATE TABLE `tblshop` (
  `shop_id` varchar(15) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `owner_id` varchar(9) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `owner_phone` varchar(10) NOT NULL,
  `owner_email` varchar(40) NOT NULL,
  `shop_location` varchar(10) NOT NULL,
  `shop_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblshop`
--

INSERT INTO `tblshop` (`shop_id`, `shop_name`, `owner_id`, `owner_name`, `owner_phone`, `owner_email`, `shop_location`, `shop_status`) VALUES
('000', 'Tech Shop', '000000000', 'Max', '0540000000', 'max@gmail.com', 'Center', '0'),
('111', 'Candy Shop', '111111111', 'Alex', '0541111111', 'alex@gmail.com', 'North', '0'),
('222', 'Shoes Shop', '222222222', 'Sam', '0542222222', 'sam@gamil.com', 'South', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` varchar(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `location` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `email`, `password`, `phone`, `location`, `status`) VALUES
('1', 'Wasif', '1@gmail.com', '$2y$10$9kGGYeGBXJS.kJ1W1RhSf.ePu52bfHYzU.YRWAsH1jqQBNre..Al6', '0544683385', 'South', '0'),
('admin', 'admin', 'admin@admin.com', '1', '0544444444', 'IL', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblshop`
--
ALTER TABLE `tblshop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
