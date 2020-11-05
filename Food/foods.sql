-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 07:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(20) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `dateAdded` timestamp(1) NOT NULL DEFAULT current_timestamp(1)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `Quantity`, `dateAdded`) VALUES
(0, 12, '2020-07-30 06:08:39.0'),
(0, 12, '2020-07-30 06:11:23.0'),
(0, 12, '2020-07-30 06:13:40.0'),
(26, 12, '2020-07-30 06:16:14.0'),
(27, 20, '2020-07-30 06:17:10.0'),
(28, 15, '2020-07-31 12:07:52.0'),
(0, 13, '2020-07-31 18:33:50.0'),
(30, 13, '2020-07-31 18:35:40.0'),
(31, 67, '2020-07-31 19:37:18.0');

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `foodID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `foodname` text NOT NULL,
  `imageoriginalname` text NOT NULL,
  `imagepathname` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Category` text NOT NULL,
  `foodprice` int(10) NOT NULL,
  `dateAdded` timestamp(1) NOT NULL DEFAULT current_timestamp(1)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`foodID`, `UserID`, `foodname`, `imageoriginalname`, `imagepathname`, `Description`, `Category`, `foodprice`, `dateAdded`) VALUES
(1, 8, 'Chicken', 'chicken.jpg', '1595863212.jpg', 'Evaporated milk, skinless chicken breasts, chicken broth, white wine', 'Dinner', 250, '2020-07-14 21:00:00.0'),
(2, 8, 'Lasagna', 'lasagna.jpg', '1595863255.jpg', 'Egg white, Active dry yeast, hot water, all purpose flour', 'Lunch', 200, '2020-07-26 21:00:00.0'),
(4, 8, 'Chocolate cupcake', 'chocolate cupcake.jpg', '1595878849.jpg', 'Unsweetened cocoa powder, butter, eggs, baking soda, baking flour', 'Snack', 50, '2020-07-26 21:00:00.0'),
(5, 8, 'Hamburger', 'hamburger.jpg', '1595878930.jpg', 'Ground Beef, cheese, worcestershire sauce, garlic', 'Snack', 300, '2020-07-26 21:00:00.0'),
(28, 8, 'Italian Bread', 'italian bread.jpg', '1596093384.jpg', 'Egg white, Active dry yeast, hot water, all purpose flour', 'Breakfast', 28, '2020-07-30 07:16:24.0'),
(30, 8, 'Pizza', 'pizza.jpg', '1596220540.jpg', 'Ground beef, tomato sauce, mozzarella cheese, Ricotta cheese', 'Breakfast', 15, '2020-07-31 18:35:40.0'),
(31, 8, 'ert', 'hamburger.jpg', '1596224203.jpg', 'oiuytf', 'Breakfast', 45, '2020-07-31 19:36:43.0');

-- --------------------------------------------------------

--
-- Table structure for table `ordereditems`
--

CREATE TABLE `ordereditems` (
  `orderID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordereditems`
--

INSERT INTO `ordereditems` (`orderID`, `foodID`, `Quantity`, `Price`) VALUES
(7, 1, 1, 250),
(8, 4, 1, 50),
(9, 4, 1, 50),
(9, 2, 10, 2000),
(10, 1, 1, 250),
(10, 2, 10, 2000),
(10, 4, 5, 250),
(10, 5, 4, 1200),
(12, 1, 1, 250),
(12, 2, 1, 200),
(13, 2, 1, 200),
(13, 4, 1, 50),
(14, 4, 1, 50),
(14, 5, 1, 300),
(15, 2, 1, 200),
(16, 4, 1, 50),
(17, 28, 1, 20),
(0, 1, 10, 2500),
(22, 1, 2, 500),
(24, 1, 3, 750),
(25, 30, 3, 45),
(26, 28, 3, 84),
(27, 28, 3, 84),
(28, 28, 3, 84),
(29, 28, 3, 84),
(30, 28, 3, 84),
(32, 1, 5, 1250),
(33, 5, 5, 1500),
(35, 2, 5, 1000),
(39, 2, 5, 1000),
(40, 1, 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNo` int(255) NOT NULL,
  `Bill` int(100) NOT NULL,
  `DateOfOrder` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` text NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `UserID`, `Address`, `ContactNo`, `Bill`, `DateOfOrder`, `Status`) VALUES
(1, 1, '', 0, 250, '2020-07-29 21:00:00', 'Active'),
(3, 1, '', 0, 250, '2020-07-29 21:42:48', 'Active'),
(4, 1, 'Fourth Street', 7123456, 250, '2020-07-29 21:43:47', 'Active'),
(5, 1, 'Fourth Street', 7123456, 250, '2020-07-29 21:45:03', 'Active'),
(6, 1, 'Fourth Street', 7123456, 250, '2020-07-29 21:45:37', 'Active'),
(7, 1, 'Fourth Street', 7123456, 250, '2020-07-29 21:49:24', 'Active'),
(8, 1, 'Third Street', 7876543, 2290, '2020-07-29 21:50:49', 'Active'),
(9, 1, 'Third Street', 7123456, 2290, '2020-07-29 21:52:36', 'Active'),
(10, 1, 'Wall Street', 98765432, 3700, '2020-07-29 21:56:55', 'Active'),
(11, 1, 'Second Street', 3456789, 300, '2020-07-30 05:18:43', 'Active'),
(12, 1, 'Third Street', 2345678, 450, '2020-07-30 05:19:47', 'Active'),
(13, 1, '', 0, 250, '2020-07-30 08:30:17', 'Active'),
(14, 8, 'Home', 7123456, 350, '2020-07-30 11:53:00', 'Active'),
(15, 8, 'Fourth Street', 7876543, 200, '2020-07-30 11:55:15', 'Active'),
(16, 4, 'Home', 7876543, 50, '2020-07-30 11:55:58', 'Active'),
(17, 8, 'Fourth Street', 7123456, 20, '2020-07-31 08:43:42', 'Active'),
(18, 11, 'Address', 9876567, 200, '2020-11-05 04:56:12', 'Active'),
(19, 11, 'Address', 9876567, 200, '2020-11-05 04:56:12', 'Active'),
(20, 11, 'Address', 9876567, 200, '2020-11-05 04:59:22', 'Active'),
(21, 11, 'Address', 9876567, 200, '2020-11-05 04:59:22', 'Active'),
(22, 11, 'Address', 9876567, 200, '2020-11-05 05:00:30', 'Active'),
(23, 4, 'Address', 9876567, 200, '2020-11-05 05:01:31', 'Active'),
(24, 4, 'Address', 9876567, 200, '2020-11-05 05:02:14', 'Active'),
(25, 4, 'Address', 9876567, 200, '2020-11-05 05:02:46', 'Active'),
(26, 4, 'Address', 9876567, 200, '2020-11-05 05:03:09', 'Active'),
(27, 4, 'Address', 9876567, 200, '2020-11-05 05:20:07', 'Active'),
(28, 4, 'Address', 9876567, 200, '2020-11-05 05:20:59', 'Active'),
(29, 4, 'Address', 9876567, 200, '2020-11-05 05:23:23', 'Active'),
(30, 4, 'Address', 9876567, 200, '2020-11-05 05:23:32', 'Active'),
(31, 8, 'Address', 9876567, 200, '2020-11-05 05:24:51', 'Active'),
(32, 8, 'Address', 9876567, 200, '2020-11-05 05:24:57', 'Active'),
(33, 9, 'Address', 9876567, 200, '2020-11-05 05:25:56', 'Active'),
(34, 9, 'Address', 9876567, 200, '2020-11-05 05:26:26', 'Active'),
(35, 9, 'Address', 9876567, 200, '2020-11-05 05:30:44', 'Active'),
(36, 9, 'Address', 9876567, 200, '2020-11-05 05:30:48', 'Active'),
(37, 9, 'Address', 9876567, 200, '2020-11-05 05:32:18', 'Active'),
(38, 9, 'Address', 9876567, 200, '2020-11-05 05:32:20', 'Active'),
(39, 9, 'Address', 9876567, 200, '2020-11-05 05:32:47', 'Active'),
(40, 9, 'Address', 9876567, 200, '2020-11-05 18:26:47', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `usertype` text NOT NULL DEFAULT 'User',
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `first_name`, `last_name`, `Username`, `Password`, `Email`, `usertype`, `dateCreated`) VALUES
(1, 'Mark', 'Luke', 'mluke', '1233', 'mluke@gmail.com', 'User\r\n', '2020-07-14'),
(2, 'John', 'Jude', 'jjude', '234', 'jjude@gmail.com', 'User', '2020-07-11'),
(4, 'grace', 'kyalo', 'Admin', '890', 'gkyalo@gmail.com', 'User', '2020-07-08'),
(8, 'John', 'Matt', 'Admin', 'admin', 'john@gmail.com', 'Admin', '2020-07-01'),
(9, 'Luke', 'Cage', 'LCage', '41e6f458a921dbfcf577f87aa5a80ba6', 'LCage@gmail.com', 'User', '2020-07-28'),
(11, 'Rick', 'Morty', 'RMorty', '3fa48824bbbd86c96869798b4ea44ffa', 'RMorty@gmail.com', 'User', '2020-07-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`foodID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `ordereditems`
--
ALTER TABLE `ordereditems`
  ADD KEY `foodID` (`foodID`),
  ADD KEY `orderID_2` (`orderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
