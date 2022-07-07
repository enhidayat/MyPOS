-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2022 at 07:53 PM
-- Server version: 10.3.30-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` int(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'dayat h', 'L', 855656554, 'Banyuwangi', '2022-06-26 15:57:51', '2022-06-26 16:17:39'),
(2, 'sifulanah', 'P', 3353546, 'jajag', '2022-06-26 16:03:34', '2022-06-26 16:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `name`, `created`, `updated`) VALUES
(2, 'Spart Part Mobil', '2022-06-27 06:13:02', '2022-06-27 12:54:14'),
(3, 'Spart part motor', '2022-06-27 06:13:21', '2022-06-27 12:54:33'),
(4, 'Makanan', '2022-06-27 06:13:43', '2022-06-27 12:54:49'),
(5, 'Minuman', '2022-06-27 06:14:03', '2022-06-27 12:55:02'),
(6, 'Pakaian', '2022-06-27 06:39:14', '2022-06-27 12:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(90) DEFAULT NULL,
  `name` varchar(90) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created` int(11) NOT NULL DEFAULT current_timestamp(),
  `updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(1, 'A001', 'Kripik singkong', 4, 4, 1000000, 0, 'item-220706-437beea224.jpg', 2147483647, 2022),
(3, 'A003', 'Baju koko 1', 6, 2, 100000, 0, NULL, 2147483647, 2022),
(4, 'A0031', 'Kaca sipon yaris mantab', 2, 6, 1500000, 0, NULL, 2147483647, 2022),
(5, 'A004', 'susu', 5, 2, 5000, 0, NULL, 2147483647, NULL),
(6, 'A005', 'Pisang coklat', 4, 2, 10000, 0, NULL, 2147483647, NULL),
(7, 'A006', 'TEBS  WITH SHOKING SODA  1', 5, 4, 500000, 0, NULL, 2147483647, NULL),
(8, 'A007', 'Es enak', 5, 2, 1434343, 0, NULL, 2147483647, NULL),
(12, 'A008', 'Kain Bahan  2', 6, 1, 555000, 0, NULL, 2147483647, NULL),
(13, 'A009', 'ACCU MOTOR Honda 1', 3, 2, 450000, 0, NULL, 2147483647, NULL),
(15, 'A0011', 'susujahe', 5, 2, 7000, 0, NULL, 2147483647, NULL),
(17, 'A002', 'Sari Kedelai', 5, 2, 5000, 0, 'item-220701-ee87d09ea8.jpg', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_unit`
--

CREATE TABLE `product_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_unit`
--

INSERT INTO `product_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(1, 'meter', '2022-06-29 10:54:27', NULL),
(2, ' Pcs', '2022-06-27 06:13:02', '2022-06-27 13:05:49'),
(3, 'Kilogram', '2022-06-27 06:13:21', '2022-06-27 13:06:24'),
(4, 'Dos', '2022-06-27 06:13:43', '2022-06-27 13:06:36'),
(5, 'Lusin', '2022-06-27 06:14:03', '2022-06-27 13:06:46'),
(6, 'Paket', '2022-06-27 06:39:14', '2022-06-27 13:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko Maju Jaya', '02532324434', 'Jogjakarta', 'Toko bahan baku makanan', '2022-06-25 19:30:39', '2022-06-26 09:47:39'),
(2, 'Toko Barokah Electronik', '02198888888', 'Jakarta indonesia', 'Toko Elektronik skala nasional', '2022-06-25 19:30:39', '2022-06-26 09:51:27'),
(4, 'Toko Sentracom', '0333956955', 'Jajag', 'toko computer', '2022-06-26 06:59:51', NULL),
(5, 'Wangi Cellular', '08521054546', 'Blokagung bwi', 'Jual beli Hp ,pulsa, asesoris, dan alat electronik\r\n', '2022-06-26 08:02:16', NULL),
(6, 'Toko KLM', '021321933', 'Jakarta', 'Toko Spartpart motor', '2022-06-26 09:19:44', NULL),
(7, 'Toko Sejahtera Motor', '021321933555', 'Cikampek, Jakarta Utara', 'Toko Spartpart mobil', '2022-06-26 09:21:13', NULL),
(9, 'Toko Barokah Engine', '0214343544', 'Pasar Rebo, Jakarta Timur', 'Pusat spartpar Mesin MOTOR DAN MOBIL', '2022-06-26 09:43:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(55) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:Admin, 2:Kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'dayat123', 'c539f0770f47cb6e9bdc329fba696d233ee3f172', 'N Hidayat', 'Banyuwangi Jatim', 1),
(2, 'zainal123', 'd6ef1cbd05de1cb1a988b8511360b045907b3a55', 'zainal', 'Palembang', 2),
(3, 'tibyani123', '315f166c5aca63a157f7d41007675cb44a948b33', 'Tibyni', 'Palembang', 1),
(6, 'sifulan123', '8cb2237d0679ca88db6464eac60da96345513964', 'Sifulan', NULL, 1),
(7, 'wati123', '2f365d72d8b75dae726bf7a8cf30472f9e1006c4', 'Wati', 'PALEMBANG sumatera', 2),
(8, 'sukiman123', '189c5983bf48990a745ce85fa436ae463b8fa2f0', 'Sukiman', 'blokagung', 2),
(9, 'faizar123', '1221f2e600883e7995f1cfdc8fd01b05cd098b9c', 'Faizar', 'Cirebon', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_unit`
--
ALTER TABLE `product_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_item`
--
ALTER TABLE `product_item`
  ADD CONSTRAINT `product_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`),
  ADD CONSTRAINT `product_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `product_unit` (`unit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
