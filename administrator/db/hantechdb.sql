-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 07:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hantechdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`name`, `password`) VALUES
('hantech', 'access');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(11) NOT NULL,
  `aname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `company` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `aname`, `surname`, `company`, `position`, `branch_id`, `address`, `contact_no`, `email`, `password`) VALUES
(1, 'admin_user', 'surname', 'hantech', 'developer', 1, 'recodo zamboanga city', '09557653775', 'sample@gmail.com', 'password'),
(16, 'sample2', 'surname', 'samplecompany', 'sampleposition', 16, 'Sampleadd', '2366', 'reenjie17@gmail.com', 'reenjay17'),
(17, 'test2', 'try', 'samplecompany', 'sampleposition', 2, 'ayala', '0955764', 'reenjay51715@gmail.com', 'reenjay17');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `bname`, `location`) VALUES
(1, 'ExampleStore', 'Example city'),
(2, 'secondaryexample', 'Example city'),
(16, 'cecilles-recodo', 'recodo zc');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cancelled`
-- (See below for the actual view)
--
CREATE TABLE `cancelled` (
`prod_id` int(11)
,`track_id` int(11)
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `checkout`
-- (See below for the actual view)
--
CREATE TABLE `checkout` (
`user_id` int(11)
,`prod_id` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `completed`
-- (See below for the actual view)
--
CREATE TABLE `completed` (
`prod_id` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `expired`
-- (See below for the actual view)
--
CREATE TABLE `expired` (
`prod_id` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_record`
--

CREATE TABLE `invoice_record` (
  `invoice_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tempuserid` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `dateprocess` date NOT NULL,
  `total` int(11) DEFAULT NULL,
  `amount_rendered` int(11) DEFAULT NULL,
  `amount_change` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `newtrans`
-- (See below for the actual view)
--
CREATE TABLE `newtrans` (
`track_id` int(11)
,`name` varchar(50)
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`tempuserid` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending`
-- (See below for the actual view)
--
CREATE TABLE `pending` (
`user_id` int(11)
,`prod_id` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`Order_accepted` datetime
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `availabitility` varchar(50) NOT NULL,
  `photo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `branch_id`, `name`, `price`, `description`, `stock`, `availabitility`, `photo`) VALUES
(66, 1, 'chicharon', 15, 'Mang Juan', 90, 'Available', '1785-chicharon.jfif'),
(67, 1, 'sinandomeng', 900, 'bigas', 91, 'Available', '8175-sinandomeng.jfif'),
(68, 1, 'Pepsi', 20, 'Ni mang Kanor', 90, 'Available', '6836-pepsi.jfif'),
(70, 1, 'ice poop', 10, 'orange flvor yellow lng', 74, 'Available', '8646-poop.jfif'),
(71, 16, 'mang Inasal', 117, 'Masarap may langaw', 140, 'Available', '3220-20181008_101829.jpg'),
(72, 16, 'Mang Thomas', 200, 'Mang Kanor', 25, 'Available', '6699-IMG_20190720_105755.jpg'),
(73, 16, 'Sauce To go', 250, 'Masarap kahit walang manok', 20, 'Available', '8607-IMG20190109160211~2.jpg'),
(74, 16, 'sinandomeng', 250, 'bigas', 100, 'Available', '8727-IMG_20190613_132459.jpg'),
(77, 2, 'chicharon', 20, 'masarap', 200, 'Available', '4764-20180925_101633.jpg'),
(78, 2, 'chicharona', 23, 'alin', 26, 'Available', '8401-20181008_101834.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `receipt`
-- (See below for the actual view)
--
CREATE TABLE `receipt` (
`user_id` int(11)
,`name` varchar(50)
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`invoice_no` int(11)
,`transaction_type` varchar(100)
,`stat_checkout` varchar(50)
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reserve`
-- (See below for the actual view)
--
CREATE TABLE `reserve` (
`user_id` int(11)
,`prod_id` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`Order_accepted` datetime
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `trans_record`
--

CREATE TABLE `trans_record` (
  `track_id` int(11) NOT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tempuserid` int(11) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `Order_accepted` datetime DEFAULT NULL,
  `target_date` datetime DEFAULT NULL,
  `stat_checkout` varchar(50) DEFAULT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_record`
--

INSERT INTO `trans_record` (`track_id`, `invoice_no`, `user_id`, `tempuserid`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`, `Order_accepted`, `target_date`, `stat_checkout`, `status`) VALUES
(4, NULL, 2, NULL, 67, 1, 900, '2021-03-10 13:22:51', 'walk in', NULL, NULL, 'false', 'pending'),
(7, NULL, 2, NULL, 70, 1, 2, '2021-03-10 15:55:15', 'walk in', NULL, NULL, 'false', 'pending'),
(8, NULL, 2, NULL, 70, 1, 2, '2021-03-10 15:06:28', 'walk in', NULL, NULL, 'false', 'pending'),
(9, NULL, 1, NULL, 67, 1, 900, '2021-03-03 15:07:06', 'reservation', '2021-03-10 16:24:36', '2021-03-12 15:05:20', 'false', 'approved'),
(10, NULL, 2, NULL, 67, 5, 4500, '2021-03-03 15:08:31', 'reservation', NULL, '2021-03-15 21:01:54', 'false', 'pending'),
(11, NULL, 1, NULL, 72, 2, 400, '2021-03-03 15:40:40', 'walk in', '2021-03-06 20:36:08', '2021-03-07 20:36:08', 'false', 'pending'),
(12, NULL, 2, NULL, 66, 2, 30, '2021-03-06 18:26:26', 'reservation', '2021-03-11 10:19:37', '2021-03-14 21:01:54', 'false', 'approved'),
(14, NULL, 2, NULL, 70, 34, 68, '2021-03-06 18:26:55', 'walk in', NULL, NULL, 'false', 'pending'),
(138, NULL, 2, NULL, 66, 1, 15, '2021-03-09 21:02:18', 'walk in', NULL, NULL, 'false', 'pending'),
(139, NULL, 2, NULL, 68, 1, 200, '2021-03-09 21:02:21', 'walk in', '2021-03-11 10:19:50', '2021-03-12 10:19:50', 'false', 'approved'),
(140, NULL, 2, NULL, 70, 1, 2, '2021-03-09 21:02:24', 'reservation', NULL, '2021-03-12 21:02:24', 'false', 'pending'),
(141, NULL, 2, NULL, 66, 10, 150, '2021-03-10 11:46:14', 'walk in', NULL, NULL, 'false', 'pending'),
(142, NULL, 2, NULL, 70, 20, 40, '2021-03-10 11:46:29', 'reservation', NULL, '2021-03-15 11:46:29', 'false', 'pending'),
(143, NULL, 2, NULL, 68, 10, 2000, '2021-03-10 11:46:35', 'walk in', NULL, NULL, 'false', 'pending'),
(146, 249, 2, NULL, 70, 2, 4, '2021-03-10 14:12:31', 'checkout', '2021-03-10 14:12:31', '2021-03-10 14:12:31', 'completed', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `uname`, `surname`, `address`, `contact_no`, `email`, `password`) VALUES
(1, 'sampleuser', 'surname', 'sampleaddress', '09557653775', 'sample@gmail.com', 'sample'),
(2, 'reen', 'jay', 'recodo zamboanga city', '09557653775', 'reenj@gmail.com', 'reenjay17');

-- --------------------------------------------------------

--
-- Stand-in structure for view `walkin`
-- (See below for the actual view)
--
CREATE TABLE `walkin` (
`user_id` int(11)
,`prod_id` int(11)
,`invoice_no` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(40)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` int(11)
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(100)
,`target_date` datetime
,`Order_accepted` datetime
,`stat_checkout` varchar(50)
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Structure for view `cancelled`
--
DROP TABLE IF EXISTS `cancelled`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cancelled`  AS SELECT `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`track_id` AS `track_id`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `checkout`
--
DROP TABLE IF EXISTS `checkout`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `checkout`  AS SELECT `user_account`.`user_id` AS `user_id`, `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`track_id` AS `track_id`, `trans_record`.`dateandtime` AS `dateandtime`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `completed`
--
DROP TABLE IF EXISTS `completed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `completed`  AS SELECT `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`track_id` AS `track_id`, `trans_record`.`dateandtime` AS `dateandtime`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `expired`
--
DROP TABLE IF EXISTS `expired`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `expired`  AS SELECT `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`track_id` AS `track_id`, `trans_record`.`dateandtime` AS `dateandtime`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `newtrans`
--
DROP TABLE IF EXISTS `newtrans`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `newtrans`  AS SELECT `trans_record`.`track_id` AS `track_id`, `product`.`name` AS `name`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `invoice_record`.`tempuserid` AS `tempuserid` FROM ((`product` join `trans_record` on(`trans_record`.`prod_id` = `product`.`prod_id`)) join `invoice_record` on(`invoice_record`.`invoice_no` = `trans_record`.`invoice_no`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pending`
--
DROP TABLE IF EXISTS `pending`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending`  AS SELECT `user_account`.`user_id` AS `user_id`, `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`track_id` AS `track_id`, `trans_record`.`dateandtime` AS `dateandtime`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`Order_accepted` AS `Order_accepted`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `receipt`
--
DROP TABLE IF EXISTS `receipt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `receipt`  AS SELECT `user_account`.`user_id` AS `user_id`, `product`.`name` AS `name`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`invoice_no` AS `invoice_no`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`stat_checkout` AS `stat_checkout`, `trans_record`.`status` AS `status` FROM ((`product` join `trans_record` on(`product`.`prod_id` = `trans_record`.`prod_id`)) join `user_account` on(`user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `reserve`
--
DROP TABLE IF EXISTS `reserve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reserve`  AS SELECT `user_account`.`user_id` AS `user_id`, `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`track_id` AS `track_id`, `trans_record`.`dateandtime` AS `dateandtime`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`Order_accepted` AS `Order_accepted`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `walkin`
--
DROP TABLE IF EXISTS `walkin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `walkin`  AS SELECT `user_account`.`user_id` AS `user_id`, `trans_record`.`prod_id` AS `prod_id`, `trans_record`.`invoice_no` AS `invoice_no`, `trans_record`.`track_id` AS `track_id`, `trans_record`.`dateandtime` AS `dateandtime`, `user_account`.`uname` AS `uname`, `user_account`.`surname` AS `surname`, `branches`.`branch_id` AS `branch_id`, `branches`.`bname` AS `bname`, `product`.`name` AS `name`, `product`.`photo` AS `photo`, `product`.`description` AS `description`, `product`.`price` AS `price`, `trans_record`.`quantity` AS `quantity`, `trans_record`.`total` AS `total`, `trans_record`.`transaction_type` AS `transaction_type`, `trans_record`.`target_date` AS `target_date`, `trans_record`.`Order_accepted` AS `Order_accepted`, `trans_record`.`stat_checkout` AS `stat_checkout`, `trans_record`.`status` AS `status` FROM (((`trans_record` join `product`) join `branches`) join `user_account` on(`trans_record`.`prod_id` = `product`.`prod_id` and `product`.`branch_id` = `branches`.`branch_id` and `user_account`.`user_id` = `trans_record`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `invoice_record`
--
ALTER TABLE `invoice_record`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `trans_record`
--
ALTER TABLE `trans_record`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice_record`
--
ALTER TABLE `invoice_record`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `trans_record`
--
ALTER TABLE `trans_record`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD CONSTRAINT `admin_account_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`);

--
-- Constraints for table `invoice_record`
--
ALTER TABLE `invoice_record`
  ADD CONSTRAINT `invoice_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `trans_record` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_record_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_record`
--
ALTER TABLE `trans_record`
  ADD CONSTRAINT `trans_record_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trans_record_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
