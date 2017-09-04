-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 03:54 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `northwind`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_customers`
--

CREATE TABLE `crm_customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_profession` varchar(40) CHARACTER SET latin1 NOT NULL,
  `prospect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_leads`
--

CREATE TABLE `crm_leads` (
  `id` int(11) NOT NULL,
  `lead_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `lead_phone` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_leads`
--

INSERT INTO `crm_leads` (`id`, `lead_name`, `lead_phone`, `product_id`) VALUES
(5, 'Jakob', 222222, 1),
(6, 'gffhf', 2222, 1),
(7, 'gffhf', 2222, 1),
(8, 'adda', 34, 4),
(9, 'ababab', 12121212, 2),
(10, 'eeeee', 9999, 2);

-- --------------------------------------------------------

--
-- Table structure for table `crm_products`
--

CREATE TABLE `crm_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_products`
--

INSERT INTO `crm_products` (`id`, `product_name`) VALUES
(1, 'comp'),
(2, 'keyboard'),
(3, 'mouse'),
(4, 'screen'),
(6, 'www');

-- --------------------------------------------------------

--
-- Table structure for table `crm_professions`
--

CREATE TABLE `crm_professions` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_prospects`
--

CREATE TABLE `crm_prospects` (
  `id` int(11) NOT NULL,
  `prospect_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `prospect_phone` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_to_prospects_table` (`prospect_id`);

--
-- Indexes for table `crm_leads`
--
ALTER TABLE `crm_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `crm_products`
--
ALTER TABLE `crm_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_professions`
--
ALTER TABLE `crm_professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_prospects`
--
ALTER TABLE `crm_prospects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_to_leads_table` (`lead_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_customers`
--
ALTER TABLE `crm_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `crm_leads`
--
ALTER TABLE `crm_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `crm_products`
--
ALTER TABLE `crm_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `crm_professions`
--
ALTER TABLE `crm_professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `crm_prospects`
--
ALTER TABLE `crm_prospects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD CONSTRAINT `foreign_key_to_prospects_table` FOREIGN KEY (`prospect_id`) REFERENCES `crm_prospects` (`lead_id`);

--
-- Constraints for table `crm_prospects`
--
ALTER TABLE `crm_prospects`
  ADD CONSTRAINT `foreign_key_to_leads_table` FOREIGN KEY (`lead_id`) REFERENCES `crm_leads` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
