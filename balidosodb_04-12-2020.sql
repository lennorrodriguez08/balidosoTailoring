-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 06:14 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balidosodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barong`
--

CREATE TABLE `barong` (
  `b_id` int(10) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `shoulder` double(10,2) DEFAULT NULL,
  `length` double(10,2) DEFAULT NULL,
  `arm_ls_1` double(10,2) DEFAULT NULL,
  `arm_ls_2` double(10,2) DEFAULT NULL,
  `arm_ss_1` double(10,2) DEFAULT NULL,
  `arm_ss_2` double(10,2) DEFAULT NULL,
  `chest` double(10,2) DEFAULT NULL,
  `waist` double(10,2) DEFAULT NULL,
  `hips` double(10,2) DEFAULT NULL,
  `armhole` double(10,2) DEFAULT NULL,
  `neck` double(10,2) DEFAULT NULL,
  `slit` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barong`
--

INSERT INTO `barong` (`b_id`, `transaction_no`, `shoulder`, `length`, `arm_ls_1`, `arm_ls_2`, `arm_ss_1`, `arm_ss_2`, `chest`, `waist`, `hips`, `armhole`, `neck`, `slit`) VALUES
(1, '20-0001', 12.00, 15.00, 15.00, 15.00, 15.00, 151.00, 1.00, 515.00, 15.00, 151.00, 123.00, 12.00),
(2, '20-0002', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `cashflow`
--

CREATE TABLE `cashflow` (
  `cashflow_id` int(100) NOT NULL,
  `cashflow_date` date NOT NULL,
  `cashflow_in` int(100) NOT NULL,
  `cashflow_out` int(100) NOT NULL,
  `cashflow_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashflow`
--

INSERT INTO `cashflow` (`cashflow_id`, `cashflow_date`, `cashflow_in`, `cashflow_out`, `cashflow_description`) VALUES
(2, '2020-03-25', 0, 500, 'Utang ulit'),
(3, '2020-03-25', 0, 5, '5'),
(4, '2020-03-20', 0, 555, '555');

-- --------------------------------------------------------

--
-- Table structure for table `coat`
--

CREATE TABLE `coat` (
  `c_id` int(10) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `shoulder` double(10,2) DEFAULT NULL,
  `length` double(10,2) DEFAULT NULL,
  `arm_1` double(10,2) DEFAULT NULL,
  `arm_2` double(10,2) DEFAULT NULL,
  `arm_3` double(10,2) DEFAULT NULL,
  `chest` double(10,2) DEFAULT NULL,
  `waist` double(10,2) DEFAULT NULL,
  `hips` double(10,2) DEFAULT NULL,
  `armhole` double(10,2) DEFAULT NULL,
  `down` double(10,2) DEFAULT NULL,
  `front` double(10,2) DEFAULT NULL,
  `back` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coat`
--

INSERT INTO `coat` (`c_id`, `transaction_no`, `shoulder`, `length`, `arm_1`, `arm_2`, `arm_3`, `chest`, `waist`, `hips`, `armhole`, `down`, `front`, `back`) VALUES
(1, '20-0001', 15.05, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(2, '20-0002', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `transaction_id` int(25) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `fullname` varchar(25) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `local` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount_receive` double(25,2) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `released` varchar(5) DEFAULT NULL,
  `delivered` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`transaction_id`, `transaction_no`, `fullname`, `contact`, `local`, `date`, `amount_receive`, `notes`, `released`, `delivered`) VALUES
(1, '20-0001', 'Roy Allen Moreno', '09355988133', 'Quezon City', '2020-03-28', 1000.00, ' Sample Sewer   wqe', 'true', ''),
(2, '20-0002', 'Ronnel Rodriguez', '09299994564', 'Mangahan', '2020-03-28', 555.00, '  notes asdf ', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(25) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `prescription` varchar(50) DEFAULT NULL,
  `price` double(25,2) DEFAULT NULL,
  `item_id_b` int(25) DEFAULT NULL,
  `transaction_no_b` varchar(100) DEFAULT NULL,
  `item_name_b` varchar(50) DEFAULT NULL,
  `quantity_b` int(50) DEFAULT NULL,
  `prescription_b` varchar(50) DEFAULT NULL,
  `price_b` double(25,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `transaction_no`, `item_name`, `quantity`, `prescription`, `price`, `item_id_b`, `transaction_no_b`, `item_name_b`, `quantity_b`, `prescription_b`, `price_b`) VALUES
(0, '20-0002', 'Barong', 3, 'Prescription sample', 500.00, 0, '20-0002', 'Barong', 3, 'Prescription sample', 500.00),
(2, '20-0001', 'Coat', 5, 'Small', 100.00, 2, '20-0001', 'Coat', 5, 'Small', 100.00),
(3, '20-0001', 'Pants', 4, 'Small', 200.00, 3, '20-0001', 'Pants', 4, 'Small', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `m_id` int(11) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `fullname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`m_id`, `transaction_no`, `fullname`) VALUES
(1, '20-0001', 'Roy Allen Moreno'),
(2, '20-0002', 'Ronnel Rodriguez');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `ordered_date` date NOT NULL,
  `ordered_by` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordered_date`, `ordered_by`, `qty`, `item_name`) VALUES
(1, '2020-03-26', 'Ronnel', 1, '2'),
(2, '2020-04-04', '5', 5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `pants`
--

CREATE TABLE `pants` (
  `p_id` int(10) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `waistline` double(10,2) DEFAULT NULL,
  `hips` double(10,2) DEFAULT NULL,
  `armhole` double(10,2) DEFAULT NULL,
  `length` double(10,2) DEFAULT NULL,
  `crotch` double(10,2) DEFAULT NULL,
  `legs` double(10,2) DEFAULT NULL,
  `knee` double(10,2) DEFAULT NULL,
  `bottom` double(10,2) DEFAULT NULL,
  `pleats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pants`
--

INSERT INTO `pants` (`p_id`, `transaction_no`, `waistline`, `hips`, `armhole`, `length`, `crotch`, `legs`, `knee`, `bottom`, `pleats`) VALUES
(1, '20-0001', 131.00, 13.00, 15.00, 15.00, 15.00, 151.00, 51.00, 8.00, 'true'),
(2, '20-0002', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(5, 'test', '$2y$10$n1uJajWeL/hHgPLuRecMaOSJMDcM4o5IVO5NYQGbXymJSEbE.VBzK', 'cashier'),
(6, 'admin', '$2y$10$B5U78hQPPy/5vkorGCHCOOpa3h5YTg4PQQqEJgONt1ptTp8wpFA1G', 'cashier'),
(7, 'ada', '$2y$10$/iN0knvSBucjuK9yf/iWWukevIIO1SRSluzFUpMThdD1lUkGocwla', 'admin'),
(8, 'sa', '$2y$10$SjFxyxy6pp9W/M5gmSLN9uDJMqbf/TaOwiBQP.JZ4BnBW5y.hT5kq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barong`
--
ALTER TABLE `barong`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cashflow`
--
ALTER TABLE `cashflow`
  ADD PRIMARY KEY (`cashflow_id`);

--
-- Indexes for table `coat`
--
ALTER TABLE `coat`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pants`
--
ALTER TABLE `pants`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barong`
--
ALTER TABLE `barong`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `cashflow_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coat`
--
ALTER TABLE `coat`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `transaction_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pants`
--
ALTER TABLE `pants`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
