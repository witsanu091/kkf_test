-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 05:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkf_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cus_name`
--

CREATE TABLE `cus_name` (
  `Cus_id` varchar(5) NOT NULL,
  `Cus_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_name`
--

INSERT INTO `cus_name` (`Cus_id`, `Cus_name`) VALUES
('C0001', 'ลูกค้า 1'),
('C0002', 'ลูกค้า 2'),
('C0003', 'ลูกค้า 3');

-- --------------------------------------------------------

--
-- Table structure for table `d_order`
--

CREATE TABLE `d_order` (
  `Order_no` int(4) NOT NULL,
  `Goods_id` varchar(10) NOT NULL,
  `Ord_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `Fin_date` datetime DEFAULT '2000-01-01 00:00:00',
  `Amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `COST_UNIT` decimal(8,2) NOT NULL DEFAULT 0.00,
  `TOT_PRC` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d_order`
--

INSERT INTO `d_order` (`Order_no`, `Goods_id`, `Ord_date`, `Fin_date`, `Amount`, `COST_UNIT`, `TOT_PRC`) VALUES
(1, 'P000000002', '2020-09-11 00:00:00', '2020-09-11 00:00:00', '100.00', '1000.00', '100000.00'),
(2, 'P000000001', '2020-09-15 00:00:00', NULL, '200.00', '500.00', '100000.00'),
(5, 'P000000002', '2020-09-19 00:00:00', '2020-10-20 00:00:00', '100.00', '1000.00', '100000.00'),
(5, 'P000000005', '2019-09-20 00:00:00', '2019-09-25 00:00:00', '450.00', '125.00', '56250.00'),
(43, 'P000000002', '2020-10-09 00:00:00', '2020-10-12 00:00:00', '1.00', '1000.00', '1000.00'),
(45, 'P000000001', '2020-10-02 00:00:00', '2020-10-03 00:00:00', '1.00', '500.00', '500.00'),
(47, 'P000000004', '2020-10-23 00:00:00', '2020-10-24 00:00:00', '100.00', '150.00', '15000.00');

-- --------------------------------------------------------

--
-- Table structure for table `goods_name`
--

CREATE TABLE `goods_name` (
  `Goods_id` varchar(10) NOT NULL,
  `Goods_name` varchar(30) NOT NULL,
  `cost_unit` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods_name`
--

INSERT INTO `goods_name` (`Goods_id`, `Goods_name`, `cost_unit`) VALUES
('P000000001', 'ตาข่ายการเกษตร', '500.00'),
('P000000002', 'อวนล้อม', '1000.00'),
('P000000003', 'อวนปู', '100.00'),
('P000000004', 'อวนมะระ', '150.00'),
('P000000005', 'แห', '125.00');

-- --------------------------------------------------------

--
-- Table structure for table `h_order`
--

CREATE TABLE `h_order` (
  `Order_no` int(4) NOT NULL,
  `Cus_id` varchar(5) NOT NULL,
  `Order_Date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `h_order`
--

INSERT INTO `h_order` (`Order_no`, `Cus_id`, `Order_Date`) VALUES
(1, 'C0001', '2020-09-11 00:00:00'),
(2, 'C0001', '2020-09-15 00:00:00'),
(5, 'C0003', '2020-09-20 00:00:00'),
(43, 'C0002', '2019-10-02 00:00:00'),
(45, 'C0002', '2020-10-02 00:00:00'),
(47, 'C0001', '2020-10-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_order`
--

CREATE TABLE `m_order` (
  `Cus_id` varchar(5) NOT NULL,
  `Goods_id` varchar(10) NOT NULL,
  `Doc_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `Ord_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `Fin_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `Sys_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `Amount` decimal(10,2) NOT NULL,
  `cost_tot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_order`
--

INSERT INTO `m_order` (`Cus_id`, `Goods_id`, `Doc_date`, `Ord_date`, `Fin_date`, `Sys_date`, `Amount`, `cost_tot`) VALUES
('C0001', 'P000000002', '2020-09-11 00:00:00', '2020-09-11 00:00:00', '2020-09-11 00:00:00', '2020-10-02 00:00:00', '100.00', '1000.00'),
('C0001', 'P000000002', '2020-09-15 00:00:00', '2020-10-15 00:00:00', '2020-09-16 00:00:00', '2020-10-02 00:00:00', '250.00', '1000.00'),
('C0001', 'P000000003', '2020-09-11 00:00:00', '2020-09-11 00:00:00', '2020-09-15 00:00:00', '2020-10-03 00:00:00', '150.00', '100.00'),
('C0002', 'P000000001', '2020-09-12 00:00:00', '2020-09-12 00:00:00', '2020-09-12 10:36:52', '2020-10-03 00:00:00', '500.00', '500.00'),
('C0002', 'P000000004', '2020-09-12 00:00:00', '2020-09-12 00:00:00', '2020-09-12 10:37:39', '2020-10-03 00:00:00', '150.00', '150.00'),
('C0002', 'P000000004', '2020-09-16 00:00:00', '2020-09-16 00:00:00', '2020-09-16 00:00:00', '2020-10-02 00:00:00', '200.00', '150.00'),
('C0002', 'P000000005', '2020-09-12 00:00:00', '2020-09-12 00:00:00', '2020-09-15 00:00:00', '2020-10-03 00:00:00', '125.00', '125.00'),
('C0002', 'P000000005', '2020-09-16 00:00:00', '2020-09-16 00:00:00', '2020-09-16 00:00:00', '2020-10-02 00:00:00', '500.00', '125.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cus_name`
--
ALTER TABLE `cus_name`
  ADD PRIMARY KEY (`Cus_id`);

--
-- Indexes for table `d_order`
--
ALTER TABLE `d_order`
  ADD PRIMARY KEY (`Order_no`,`Goods_id`),
  ADD KEY `Goods_id` (`Goods_id`);

--
-- Indexes for table `goods_name`
--
ALTER TABLE `goods_name`
  ADD PRIMARY KEY (`Goods_id`);

--
-- Indexes for table `h_order`
--
ALTER TABLE `h_order`
  ADD PRIMARY KEY (`Order_no`),
  ADD KEY `Cus_id` (`Cus_id`);

--
-- Indexes for table `m_order`
--
ALTER TABLE `m_order`
  ADD PRIMARY KEY (`Cus_id`,`Goods_id`,`Fin_date`,`Ord_date`,`Doc_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `h_order`
--
ALTER TABLE `h_order`
  MODIFY `Order_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_order`
--
ALTER TABLE `d_order`
  ADD CONSTRAINT `d_order_ibfk_2` FOREIGN KEY (`Goods_id`) REFERENCES `goods_name` (`Goods_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `d_order_ibfk_3` FOREIGN KEY (`Order_no`) REFERENCES `h_order` (`Order_no`) ON UPDATE CASCADE;

--
-- Constraints for table `h_order`
--
ALTER TABLE `h_order`
  ADD CONSTRAINT `h_order_ibfk_1` FOREIGN KEY (`Cus_id`) REFERENCES `cus_name` (`Cus_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
