-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 09:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy-billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculatedbillhistory`
--

CREATE TABLE `calculatedbillhistory` (
  `bill_date` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `bill_no` int(10) NOT NULL,
  `bill_total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `collectiondata`
--

CREATE TABLE `collectiondata` (
  `serialno` int(11) NOT NULL,
  `farmer_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `milk` float NOT NULL,
  `fat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collectiondata`
--

INSERT INTO `collectiondata` (`serialno`, `farmer_id`, `date`, `time`, `milk`, `fat`) VALUES
(37, 0, '2024-02-15', 'morning', 50, 5.7),
(38, 0, '2024-02-15', 'evening', 66.3, 5.8),
(39, 0, '2024-03-02', 'morning', 10, 5.7),
(40, 0, '2024-03-01', 'evening', 67, 5.7),
(41, 0, '2024-03-08', 'morning', 76, 9),
(42, 0, '2024-03-01', 'morning', 66.3, 5.7),
(43, 0, '2024-03-01', 'morning', 10, 2.3),
(44, 0, '2024-03-01', 'morning', 50, 6.8),
(45, 0, '2024-03-01', 'morning', 10, 2.3),
(46, 0, '2024-03-01', 'morning', 67, 5.8),
(47, 0, '2024-03-01', 'morning', 10, 6.8),
(48, 0, '2024-03-01', 'morning', 50, 2.3),
(49, 0, '2024-03-01', 'morning', 50, 2.3),
(50, 0, '2024-03-02', 'evening', 12.3, 6.8),
(51, 0, '2024-03-02', 'morning', 67, 5.8),
(52, 0, '2024-03-02', 'morning', 40.8, 6.8),
(53, 0, '2024-03-01', 'evening', 10, 7.7),
(54, 0, '2024-03-03', 'evening', 50, 7.7),
(55, 0, '2024-03-01', 'morning', 66.3, 5.8),
(56, 0, '2024-02-29', 'evening', 12.3, 2.3),
(57, 0, '2024-02-29', 'morning', 67, 2.3);

-- --------------------------------------------------------

--
-- Table structure for table `dailyentryrecord`
--

CREATE TABLE `dailyentryrecord` (
  `farmer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `fat` float NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyentryrecord`
--

INSERT INTO `dailyentryrecord` (`farmer_id`, `date`, `time`, `quantity`, `rate`, `fat`, `amount`) VALUES
(1, '2024-03-01', 'morning', 66.3, 0, 5.7, 0),
(2, '2024-03-01', 'morning', 10, 0, 2.3, 0),
(3, '2024-03-01', 'morning', 50, 8, 6.8, 2720),
(4, '2024-03-01', 'morning', 10, 0, 2.3, 0),
(5, '2024-03-01', 'morning', 67, 0, 5.8, 0),
(6, '2024-03-01', 'morning', 10, 0, 6.8, 0),
(7, '2024-03-02', 'morning', 67, 0, 5.8, 0),
(8, '2024-03-02', 'morning', 40.8, 8, 6.8, 2219.52),
(9, '2024-03-01', 'evening', 10, 0, 7.7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(100) NOT NULL,
  `farmer_name` varchar(100) DEFAULT NULL,
  `farmer_mobile` text DEFAULT NULL,
  `farmer_accountno` int(20) DEFAULT NULL,
  `farmer_address` longtext DEFAULT NULL,
  `farmer_email` varchar(12) DEFAULT NULL,
  `farmer_aadhaar` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `farmer_name`, `farmer_mobile`, `farmer_accountno`, `farmer_address`, `farmer_email`, `farmer_aadhaar`) VALUES
(1, 'ravi kumar', '9978362144', 2147483647, 'college road ward no 01 shrirampur', 'ravi22@gmail', '678987678976'),
(2, 'kishor', '9995452722', 2147483647, 'ramnagar word no.1,shrirampur', 'kishor65@gma', '45678909876543'),
(3, 'rahul', '9321567890', 2147483647, 'main road,shrirampur', 'rahul65@gmai', '678987678976'),
(4, 'lokesh', '9876894315', 2147483647, 'college road ward no 01 shrirampur', 'lokesh66@gma', '1234567899876'),
(5, 'sheshi', '9006356366', 2147483647, 'ramnagar road ward no 01 shrirampur', 'sheshi974@gm', '4321567899876'),
(6, 'nivesh ', '9876532109', 2147483647, 'northen branch,shrirampur', 'nkumar890@gm', '2221567899876'),
(7, 'bhargav', '7276532109', 2147483647, 'main road,shrirampur', 'bargav466@gm', '2221569199876'),
(8, 'charan', '8853532109', 2147483647, 'college road ward no 01 shrirampur', 'charan75@gma', '3221569199876'),
(9, 'dharma', '8853587641', 2147483647, 'kale wadi, shrirampur', 'dharma54@gma', '62765469199876'),
(10, 'niranjan', '8535876547', 2147483647, 'tilaknagar, shrirampur', 'niranjan11@g', '62767969199876'),
(11, 'ravindra', '9936587654', 2147483647, 'girdharnagar, shrisgaon', 'ravindra@gma', '22767969199764'),
(12, 'ram kumar', '9126587654', 2147483647, 'girdharnagar, shrisgaon', 'ravindra@gma', '22767969199764');

-- --------------------------------------------------------

--
-- Table structure for table `ratelist`
--

CREATE TABLE `ratelist` (
  `type` varchar(10) NOT NULL,
  `rate` float NOT NULL,
  `fat` float NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratelist`
--

INSERT INTO `ratelist` (`type`, `rate`, `fat`, `product_id`) VALUES
('Buffalo', 7.1, 1, 1),
('Cow', 8, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculatedbillhistory`
--
ALTER TABLE `calculatedbillhistory`
  ADD UNIQUE KEY `billno` (`bill_no`);

--
-- Indexes for table `collectiondata`
--
ALTER TABLE `collectiondata`
  ADD PRIMARY KEY (`serialno`);

--
-- Indexes for table `dailyentryrecord`
--
ALTER TABLE `dailyentryrecord`
  ADD KEY `farmer_id` (`farmer_id`) USING BTREE;

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `ratelist`
--
ALTER TABLE `ratelist`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collectiondata`
--
ALTER TABLE `collectiondata`
  MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `dailyentryrecord`
--
ALTER TABLE `dailyentryrecord`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratelist`
--
ALTER TABLE `ratelist`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailyentryrecord`
--
ALTER TABLE `dailyentryrecord`
  ADD CONSTRAINT `farmer_id` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
