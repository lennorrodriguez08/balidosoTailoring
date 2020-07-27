-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 07:31 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, '20-0001', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(2, '20-0002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '20-0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '20-0004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '20-0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20-0006', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(7, '20-0007', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(8, '20-0008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '20-0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '20-0010', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(11, '20-0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '20-0012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '20-0013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '20-0014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '20-0015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '20-0016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '20-0017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '20-0018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cashflow`
--

CREATE TABLE `cashflow` (
  `cashflow_id` int(100) NOT NULL,
  `cashflow_date` varchar(255) NOT NULL,
  `cashflow_in` int(100) NOT NULL,
  `cashflow_out` int(255) NOT NULL,
  `cashflow_customer` varchar(255) NOT NULL,
  `cashflow_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '20-0001', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(2, '20-0002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '20-0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '20-0004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '20-0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20-0006', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(7, '20-0007', 50.00, 50.00, 50.00, 50.00, 50.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(8, '20-0008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '20-0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '20-0010', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(11, '20-0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '20-0012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '20-0013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '20-0014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '20-0015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '20-0016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '20-0017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '20-0018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `date` varchar(255) DEFAULT NULL,
  `date_of_transaction` date DEFAULT NULL,
  `amount_receive` double(25,2) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `released` varchar(5) DEFAULT NULL,
  `delivered` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`transaction_id`, `transaction_no`, `fullname`, `contact`, `local`, `date`, `date_of_transaction`, `amount_receive`, `notes`, `released`, `delivered`) VALUES
(1, '20-0001', 'Ronnel', '09999999999', 'Manggahan', '2020-05-01', '2020-04-25', 4500.00, '', 'false', 'false'),
(2, '20-0002', 'Sharm', '09454254214', 'Pasig', '2020-05-02', '2020-04-25', 500.00, '', 'false', 'false'),
(3, '20-0003', 'Carlo', '09685498741', 'Pilot', '2020-06-03', '2020-05-01', 0.00, '', 'true', 'true'),
(4, '20-0004', 'Christian', '09878544521', 'Capitol', '2020-04-30', '2020-05-03', 4000.00, '', 'true', 'true'),
(5, '20-0005', 'Olivia', '09231465289', 'Veterans Village', '2020-05-03', '2020-04-22', 0.00, '', 'true', 'true'),
(6, '20-0006', 'Sample Customer', '09999999999', 'Manggahan', '2020-05-02', '2020-04-23', 3800.00, '', 'false', 'true'),
(7, '20-0007', 'John Doe', '09888888888', 'Somewhere', '2020-05-05', '2020-05-04', 1000.00, '', 'false', 'true'),
(8, '20-0008', 'Sample', '09999999999', 'Sample', '2020-05-03', '2020-04-26', 1500.00, '', 'true', 'true'),
(9, '20-0009', 'Test_Name', '09291234567', 'Quezon City', '2020-06-01', '2020-05-03', 0.00, '  ', 'false', 'false'),
(10, '20-0010', 'Roy Allen Moreno', '09355988133', 'Mangahan', '2020-07-25', '2020-07-16', 500.00, '', 'false', 'false'),
(11, '20-0011', 'luffy monkey d', '09099995446', 'Grand Line', '2020-07-17', '2020-07-16', 400.00, '', 'false', 'false'),
(12, '20-0012', 'Haha', '123', 'Haha', '2020-08-02', '2020-07-26', 1000.00, '', 'true', 'false'),
(13, '20-0013', 'aasd', '123', 'sad', '2020-08-01', '2020-07-26', 50.00, '', 'false', 'false'),
(14, '20-0014', 'asd', '123', 'asd', '2020-08-03', '2020-07-26', 0.00, '', 'false', 'false'),
(15, '20-0015', 'Mike Liboon', '123', 'asd', '2020-08-03', '2020-07-26', 255.00, '', 'false', 'false'),
(16, '20-0016', 'asd', '1123', 'dfsdf', '2020-08-05', '2020-07-26', 61500.00, '', 'false', 'false'),
(17, '20-0017', 'Legit', '0999', 'Manggahan', '2020-08-02', '2020-07-27', 2500.00, '', 'false', 'false'),
(18, '20-0018', 'Carlo Rodriguez', '0111', 'Capitol', '2020-08-03', '2020-07-27', 1800.00, '', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `due_date`
--

CREATE TABLE `due_date` (
  `transaction_id` int(255) NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `due_dates` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `due_date`
--

INSERT INTO `due_date` (`transaction_id`, `transaction_no`, `customer_name`, `due_dates`, `deleted`) VALUES
(1, '20-0001', 'Ronnel', 'May 01, 2020', 'deleted'),
(2, '20-0002', 'Sharm', 'May 02, 2020', 'deleted'),
(3, '20-0003', 'Carlo', 'June 03, 2020', 'deleted'),
(4, '20-0004', 'Christian', 'April 30, 2020', 'deleted'),
(5, '20-0005', 'Olivia', 'May 03, 2020', ''),
(6, '20-0006', 'Sample Customer', 'May 02, 2020', ''),
(7, '20-0007', 'John Doe', 'May 05, 2020', ''),
(8, '20-0008', 'Sample', 'May 03, 2020', ''),
(9, '20-0009', 'Test_Name', 'June 01, 2020', ''),
(10, '20-0010', 'Roy Allen Moreno', 'July 25, 2020', ''),
(11, '20-0011', 'luffy monkey d', 'July 17, 2020', ''),
(12, '20-0012', 'Haha', 'August 02, 2020', ''),
(13, '20-0013', 'aasd', 'August 01, 2020', ''),
(17, '20-0017', 'Legit', 'August 02, 2020', '');

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
(1, '20-0001', 'Coat', 9, 'None', 500.00, 1, '20-0001', 'Coat', 9, 'None', 500.00),
(2, '20-0002', 'Barong SS', 5, 'None', 1000.00, 2, '20-0002', 'Barong SS', 5, 'None', 1000.00),
(3, '20-0003', 'Barong LS', 1, 'None', 5000.00, 3, '20-0003', 'Barong LS', 1, 'None', 5000.00),
(4, '20-0004', 'Finance Male', 8, 'None', 500.00, 4, '20-0004', 'Finance Male', 8, 'None', 500.00),
(5, '20-0005', 'Finance Male', 1, 'None', 1000.00, 5, '20-0005', 'Finance Male', 1, 'None', 1000.00),
(6, '20-0006', 'Coat', 5, 'None', 500.00, 6, '20-0006', 'Coat', 5, 'None', 500.00),
(7, '20-0006', 'Trubenized', 2, 'None', 200.00, 7, '20-0006', 'Trubenized', 2, 'None', 200.00),
(8, '20-0006', 'Louper', 3, 'None', 300.00, 8, '20-0006', 'Louper', 3, 'None', 300.00),
(10, '20-0007', 'Barong SS', 1, 'None', 1000.00, 10, '20-0007', 'Barong SS', 1, 'None', 1000.00),
(11, '20-0008', 'Coat', 1, 'None', 500.00, 11, '20-0008', 'Coat', 1, 'None', 500.00),
(12, '20-0008', 'Trubenized', 5, 'None', 200.00, 12, '20-0008', 'Trubenized', 5, 'None', 200.00),
(18, '20-0009', 'Coat', 1, 'Small', 700.00, NULL, '20-0009', 'Coat', 1, 'Small', 700.00),
(19, '20-0010', 'Coat', 1, 'Large fit', 500.00, NULL, '20-0010', 'Coat', 1, 'Large fit', 500.00),
(20, '20-0011', 'Louper', 1, 'Small', 500.00, NULL, '20-0011', 'Louper', 1, 'Small', 500.00),
(21, '20-0012', 'Coat', 2, 'Haha', 2000.00, NULL, '20-0012', 'Coat', 2, 'Haha', 2000.00),
(23, '20-0012', 'Barong LS', 5, 'Haha', 200.00, NULL, '20-0012', 'Barong LS', 5, 'Haha', 200.00),
(24, '20-0013', 'Barong LS', 2, 'sdf', 25.00, NULL, '20-0013', 'Barong LS', 2, 'sdf', 25.00),
(25, '20-0015', 'Barong LS', 5, 'asd', 555.00, NULL, '20-0015', 'Barong LS', 5, 'asd', 555.00),
(26, '20-0016', 'Trubenized', 123, 'asda', 500.00, NULL, '20-0016', 'Trubenized', 123, 'asda', 500.00),
(27, '20-0017', 'Coat', 5, 'None', 500.00, NULL, '20-0017', 'Coat', 5, 'None', 500.00),
(28, '20-0018', 'Louper', 3, 'None', 600.00, NULL, '20-0018', 'Louper', 3, 'None', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `m_id` int(11) NOT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `fullname` varchar(25) NOT NULL,
  `notes` varchar(9999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`m_id`, `transaction_no`, `fullname`, `notes`) VALUES
(1, '20-0001', 'Ronnel', 'sdaasd'),
(2, '20-0002', 'Sharm', NULL),
(3, '20-0003', 'Carlo', NULL),
(4, '20-0004', 'Christian', NULL),
(5, '20-0005', 'Olivia', NULL),
(6, '20-0006', 'Sample Customer', 'Sample Notes'),
(7, '20-0007', 'John Doe', 'Sample Note Only ..'),
(8, '20-0008', 'Sample', NULL),
(9, '20-0009', 'Test_Name', NULL),
(10, '20-0010', 'Roy Allen Moreno', ''),
(11, '20-0011', 'luffy monkey d', NULL),
(12, '20-0012', 'Haha', NULL),
(13, '20-0013', 'aasd', NULL),
(14, '20-0014', 'asd', NULL),
(15, '20-0015', 'Mike Liboon', NULL),
(16, '20-0016', 'asd', NULL),
(17, '20-0017', 'Legit', NULL),
(18, '20-0018', 'Carlo Rodriguez', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `ordered_date` varchar(255) NOT NULL,
  `ordered_by` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '20-0001', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'false'),
(2, '20-0002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '20-0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '20-0004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '20-0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20-0006', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'false'),
(7, '20-0007', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'true'),
(8, '20-0008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '20-0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '20-0010', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'false'),
(11, '20-0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '20-0012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '20-0013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '20-0014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '20-0015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '20-0016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '20-0017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '20-0018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'admin', '$2y$10$d7rQsnG.KV14UykpFy/2C.ivrlteOFQ9sV2lZFie3uCni6hOP8u5G', 'admin'),
(2, 'Gynaleen', '$2y$10$RRII7vGwvrNn7umMdsPCF.ocFDrAp/GubzetJkNG9VPxd9rTuB3v2', 'admin'),
(3, 'adminsample', '$2y$10$XzVXwY25dhp0nPsKUdtpeevEIQNMHG489awnfQjNXSoQ1uq5W7j2W', 'admin'),
(4, 'cashier', '$2y$10$6fk77v7iEWFMTSWxyAPTWOfg3b9p86eDW2J2Vzm1SVk3QBPeQKcSm', 'cashier');

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
-- Indexes for table `due_date`
--
ALTER TABLE `due_date`
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
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `cashflow_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coat`
--
ALTER TABLE `coat`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `transaction_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pants`
--
ALTER TABLE `pants`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
