-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 10:52 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_database`
--

CREATE TABLE `customer_database` (
  `c_email` varchar(50) NOT NULL,
  `c_username` varchar(50) NOT NULL,
  `c_password` varchar(50) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_fname` varchar(50) NOT NULL,
  `c_lname` varchar(50) NOT NULL,
  `c_pan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_database`
--

INSERT INTO `customer_database` (`c_email`, `c_username`, `c_password`, `c_address`, `c_fname`, `c_lname`, `c_pan`) VALUES
('as@gmail.com', 'abdul', '123', 'banglore', 'a', 's', '1235'),
('captain@gmail.com', 'captain America', '123', 'newyork', 'steve', 'rogers', ''),
('Mohammedabdulsammad@gmail.com', 'sammad5505', '123', 'd', 'sammad', 'md', '123456pwrq'),
('tonystark@gmail.com', 'Avenger', '123', 'newyork', 'tony', 'stark', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_wallet`
--

CREATE TABLE `customer_wallet` (
  `c_email` varchar(50) NOT NULL,
  `c_money` decimal(10,0) NOT NULL DEFAULT '3500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_record`
--

CREATE TABLE `purchase_record` (
  `r_email` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `money_spent_by_customer` decimal(10,0) NOT NULL,
  `transaction_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer_database`
--

CREATE TABLE `retailer_database` (
  `r_email` varchar(50) NOT NULL,
  `r_username` varchar(50) NOT NULL,
  `r_password` varchar(50) NOT NULL,
  `r_address` varchar(50) NOT NULL,
  `r_fname` varchar(50) NOT NULL,
  `r_lname` varchar(50) NOT NULL,
  `r_pan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_database`
--

INSERT INTO `retailer_database` (`r_email`, `r_username`, `r_password`, `r_address`, `r_fname`, `r_lname`, `r_pan`) VALUES
('ABDULSAMMAD@GMAIL.COM', 'Amazon', '123', 'HYDERABAD', 'ABDUL', 'SAMMAD', '012345PWQK'),
('alibaba@gmail.com', 'Alibaba', '123', 'chinaaaaa', 'im ali', 'ali singh', '10101010101'),
('ebay@gmail.com', 'Ebay', '123', '2', 'e', 'bay', '01235poaw'),
('flipkart@gmail.com', 'Flipkart', '123', 'hyderabad', 'www', 'www', '1235');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_price`
--

CREATE TABLE `retailer_price` (
  `r_email` varchar(50) NOT NULL,
  `p_banana` decimal(10,0) NOT NULL DEFAULT '0',
  `p_orange` decimal(10,0) NOT NULL DEFAULT '0',
  `p_apple` decimal(10,0) NOT NULL DEFAULT '0',
  `p_watermelon` decimal(10,0) NOT NULL DEFAULT '0',
  `p_papaya` decimal(10,0) NOT NULL DEFAULT '0',
  `p_mango` decimal(10,0) NOT NULL DEFAULT '0',
  `p_pineapple` decimal(10,0) NOT NULL DEFAULT '0',
  `p_pomegranate` decimal(10,0) NOT NULL DEFAULT '0',
  `p_guava` decimal(10,0) NOT NULL DEFAULT '0',
  `updated_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_price`
--

INSERT INTO `retailer_price` (`r_email`, `p_banana`, `p_orange`, `p_apple`, `p_watermelon`, `p_papaya`, `p_mango`, `p_pineapple`, `p_pomegranate`, `p_guava`, `updated_time`) VALUES
('ABDULSAMMAD@GMAIL.COM', '1', '2', '3', '4', '5', '6', '7', '8', '9', '2018-12-16'),
('alibaba@gmail.com', '10', '1', '2', '5', '8', '9', '7', '6', '103', '2018-12-16'),
('flipkart@gmail.com', '1', '2', '3', '4', '5', '6', '7', '8', '9', '2018-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_quantity`
--

CREATE TABLE `retailer_quantity` (
  `r_email` varchar(50) NOT NULL,
  `q_banana` int(11) NOT NULL DEFAULT '0',
  `q_orange` int(11) NOT NULL DEFAULT '0',
  `q_apple` int(11) NOT NULL DEFAULT '0',
  `q_watermelon` int(11) NOT NULL DEFAULT '0',
  `q_papaya` int(11) NOT NULL DEFAULT '0',
  `q_mango` int(11) NOT NULL DEFAULT '0',
  `q_pineapple` int(11) NOT NULL DEFAULT '0',
  `q_pomegranate` int(11) NOT NULL DEFAULT '0',
  `q_guava` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_quantity`
--

INSERT INTO `retailer_quantity` (`r_email`, `q_banana`, `q_orange`, `q_apple`, `q_watermelon`, `q_papaya`, `q_mango`, `q_pineapple`, `q_pomegranate`, `q_guava`) VALUES
('ABDULSAMMAD@GMAIL.COM', 2, 6, 5, 7, 8, 9, 7, 4, 5),
('alibaba@gmail.com', 55, 2, 52, 5, 45, 25, 8, 18, 1),
('flipkart@gmail.com', 11, 22, 33, 44, 55, 88, 99, 22, 17);

-- --------------------------------------------------------

--
-- Table structure for table `retailer_store`
--

CREATE TABLE `retailer_store` (
  `r_email` varchar(50) NOT NULL,
  `r_description` varchar(200) NOT NULL,
  `r_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_store`
--

INSERT INTO `retailer_store` (`r_email`, `r_description`, `r_location`) VALUES
('ABDULSAMMAD@GMAIL.COM', 'this is fruit store', 'Hyderabad'),
('alibaba@gmail.com', 'this is fruit store', 'chinaa'),
('ebay@gmail.com', 'this is fruit store', 'chinaaaa'),
('flipkart@gmail.com', 'this is fruit store', 'Hyderabad');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_wallet`
--

CREATE TABLE `retailer_wallet` (
  `r_email` varchar(50) NOT NULL,
  `r_money` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_database`
--
ALTER TABLE `customer_database`
  ADD PRIMARY KEY (`c_email`);

--
-- Indexes for table `customer_wallet`
--
ALTER TABLE `customer_wallet`
  ADD PRIMARY KEY (`c_email`);

--
-- Indexes for table `retailer_database`
--
ALTER TABLE `retailer_database`
  ADD PRIMARY KEY (`r_email`);

--
-- Indexes for table `retailer_price`
--
ALTER TABLE `retailer_price`
  ADD PRIMARY KEY (`r_email`);

--
-- Indexes for table `retailer_quantity`
--
ALTER TABLE `retailer_quantity`
  ADD PRIMARY KEY (`r_email`);

--
-- Indexes for table `retailer_store`
--
ALTER TABLE `retailer_store`
  ADD PRIMARY KEY (`r_email`);

--
-- Indexes for table `retailer_wallet`
--
ALTER TABLE `retailer_wallet`
  ADD PRIMARY KEY (`r_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
