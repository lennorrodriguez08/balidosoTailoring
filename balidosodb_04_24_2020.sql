-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 02:32 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
(1, '20-0001', 100.00, 100.00, 100.00, 100.00, 100.00, 100.00, 500.00, 500.00, 500.00, 500.00, 500.00, 500.00),
(2, '20-0002', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(3, '20-0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '20-0004', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(5, '20-0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20-0006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '20-0007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '20-0008', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(9, '20-0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `cashflow`
--

INSERT INTO `cashflow` (`cashflow_id`, `cashflow_date`, `cashflow_in`, `cashflow_out`, `cashflow_customer`, `cashflow_description`) VALUES
(32, 'April 23, 2020 - 07:22 PM', 500, 0, 'Sharm', 'Payment Order'),
(33, 'April 23, 2020 - 07:22 PM', 900, 0, 'Carlo', 'Payment Order'),
(36, 'April 23, 2020 - 09:38 PM', 900, 0, 'Sample', 'Payment'),
(37, 'April 23, 2020 - 09:39 PM', 900, 0, 'Sample', 'Payment'),
(38, 'April 24, 2020 - 06:53 PM', 123, 0, 'asd', '123');

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
(1, '20-0001', 0.00, 0.00, 0.00, 0.00, 0.00, 100.00, 100.00, 100.00, 100.00, 100.00, 100.00, 100.00),
(2, '20-0002', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(3, '20-0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '20-0004', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(5, '20-0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20-0006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '20-0007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '20-0008', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(9, '20-0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `amount_receive` double(25,2) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `released` varchar(5) DEFAULT NULL,
  `delivered` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`transaction_id`, `transaction_no`, `fullname`, `contact`, `local`, `date`, `amount_receive`, `notes`, `released`, `delivered`) VALUES
(1, '20-0001', 'Roy Allen Moreno', '09355988133', 'Quezon City', '2020-04-29', 1000.00, ' Sample Sewer   wqe', 'true', ''),
(2, '20-0002', 'Ronnel Rodriguez', '09299994564', 'Mangahan', '2020-04-29', 500.00, '', 'true', 'true'),
(3, '20-0003', 'Mike Liboon', '09325644563', 'Pilot QC', '2020-04-29', 0.00, '', 'true', 'true'),
(4, '20-0004', 'Regine ', '09525454875', 'Manggahan', '2020-04-30', 0.00, '', 'true', 'true'),
(5, '20-0005', 'New Customer', '09215444546', 'Pasig', '2020-04-30', 4500.00, '', 'false', 'false'),
(6, '20-0006', 'Sharm', '09545885466', 'Riverside', '2020-04-31', 2700.00, '', 'false', 'false'),
(7, '20-0007', 'Ronnel', '09555458887', 'Manggahan', '2020-04-31', 800.00, '', 'false', 'false'),
(8, '20-0008', 'Generu Manga', '0954565585', 'Pacita', '2020-04-26', 0.00, '', 'false', 'false'),
(9, '20-0009', 'Simple Guy', '0954555555', 'Somewhere', '2020-04-10', 5.00, '', 'true', 'true');

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
(0, '20-0002', 'Barong', 1, 'Prescription sample', 500.00, 0, '20-0002', 'Barong', 1, 'Prescription sample', 500.00),
(2, '20-0001', 'Coat', 5, 'Small', 100.00, 2, '20-0001', 'Coat', 5, 'Small', 100.00),
(3, '20-0001', 'Pants', 4, 'Small', 200.00, 3, '20-0001', 'Pants', 4, 'Small', 200.00),
(5, '20-0003', 'Barong LS', 1, 'None', 500.00, 5, '20-0003', 'Barong LS', 1, 'None', 500.00),
(6, '20-0004', 'Barong LS', 3, 'None', 500.00, 6, '20-0004', 'Barong LS', 3, 'None', 500.00),
(8, '20-0005', 'Coat', 1, 'None', 500.00, 8, '20-0005', 'Coat', 1, 'None', 500.00),
(9, '20-0005', 'Louper', 5, 'None', 200.00, 9, '20-0005', 'Louper', 5, 'None', 200.00),
(10, '20-0005', 'Finance Male', 10, 'None', 300.00, 10, '20-0005', 'Finance Male', 10, 'None', 300.00),
(11, '20-0006', 'Trubenized', 4, 'None', 500.00, 11, '20-0006', 'Trubenized', 4, 'None', 500.00),
(12, '20-0006', 'Toga', 1, 'None', 200.00, 12, '20-0006', 'Toga', 1, 'None', 200.00),
(13, '20-0006', 'Finance Female', 1, 'None', 500.00, 13, '20-0006', 'Finance Female', 1, 'None', 500.00),
(14, '20-0007', 'Trubenized', 5, 'None', 500.00, 14, '20-0007', 'Trubenized', 5, 'None', 500.00),
(15, '20-0007', 'P. Jusi', 5, 'None', 300.00, 15, '20-0007', 'P. Jusi', 5, 'None', 300.00),
(42, '20-0008', 'School Uniform - Course', 3, 'None', 500.00, NULL, '20-0008', 'School Uniform - Course', 3, 'None', 500.00),
(64, '20-0009', 'Trubenized', 5, '5', 5.00, NULL, '20-0009', 'Trubenized', 5, '5', 5.00);

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
(2, '20-0002', 'Ronnel Rodriguez'),
(3, '20-0003', 'Mike Liboon'),
(4, '20-0004', 'Regine '),
(5, '20-0005', 'New Customer'),
(6, '20-0006', 'Sharm'),
(7, '20-0007', 'Ronnel'),
(8, '20-0008', 'Generu Manga'),
(9, '20-0009', 'Simple Guy');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordered_date`, `ordered_by`, `qty`, `item_name`) VALUES
(9, 'April 24, 2020 - 12:52 PM', '', 1, 'asd'),
(10, 'April 24, 2020 - 06:53 PM', '', 1, 'asd'),
(11, 'April 24, 2020 - 06:53 PM', '', 1, 'asd');

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
(1, '20-0001', 500.00, 500.00, 111.00, 111.00, 111.00, 111.00, 777.00, 777.00, 'true'),
(2, '20-0002', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'true'),
(3, '20-0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '20-0004', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'false'),
(5, '20-0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20-0006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '20-0007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '20-0008', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'true'),
(9, '20-0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(8, 'sa', '$2y$10$SjFxyxy6pp9W/M5gmSLN9uDJMqbf/TaOwiBQP.JZ4BnBW5y.hT5kq', 'admin'),
(9, 'wew', '$2y$10$rF27DUdomw6FKm58OU3gO.Q7eqCP/19Kad/Bw9xaEF1lvm1a1Fm0W', 'admin');

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
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `cashflow_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `coat`
--
ALTER TABLE `coat`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `transaction_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pants`
--
ALTER TABLE `pants`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
