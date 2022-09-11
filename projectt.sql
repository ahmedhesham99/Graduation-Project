-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 12:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Ali', 'ali99', '123456'),
(3, 'Rawane', 'rawane77', 'rw1000'),
(4, 'Haya', 'haya', '852456'),
(6, 'ahmed', 'ahmed123', '12357'),
(7, 'Ahmed Hesham', 'ahmed1257', '115599');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `amount` float NOT NULL,
  `crops_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `frequency`, `amount`, `crops_id`) VALUES
(265, 119, 3, 6000, 20),
(266, 119, 1, 3000, 19),
(288, 114, 2, 6000, 19);

-- --------------------------------------------------------

--
-- Table structure for table `cartd`
--

CREATE TABLE `cartd` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `amount` float NOT NULL,
  `fert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartd`
--

INSERT INTO `cartd` (`id`, `userid`, `frequency`, `amount`, `fert_id`) VALUES
(58, 11, 8, 1920, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cropss`
--

CREATE TABLE `cropss` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cropss`
--

INSERT INTO `cropss` (`id`, `name`, `quantity`, `image`, `price`, `admin_id`) VALUES
(16, 'Egg Plants ', '500 gr', 'crops/eggplants.jpeg', 40, NULL),
(18, 'Water melon', '3000 gram', 'crops/water melon.jpeg', 100, NULL),
(19, 'Tomatoes', '1 ton', 'crops/Tomato.jpeg', 3000, NULL),
(20, 'Onions Red', '1 ton', 'crops/Onions Red.jpeg', 2000, NULL),
(22, 'Capsicum Mix', '500 gr', 'crops/Mix Capsicum.jpeg', 90, NULL),
(25, 'Corns', '500gr', 'crops/Corns.jpeg', 80, NULL),
(26, 'Strawberry', '250 gr', 'crops/Strawberry.jpeg', 100, NULL),
(27, 'Grapes ', '500gr', 'crops/Grapes Mix.jpeg', 70, NULL),
(28, 'Raspberries', '170 gr', 'crops/Raspberries.jpeg', 50, NULL),
(29, 'Orange', '500gr', 'crops/Orange.jpeg', 50, NULL),
(30, 'Pineapple', '1 pcs', 'crops/Apple.jpeg', 88, NULL),
(31, 'Blueberry', '125 gr', 'crops/Blueberry.jpeg', 100, NULL),
(32, 'Kiwi', '125 gr', 'crops/Kiwi.jpeg', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `num` float NOT NULL,
  `percentage` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wasteid` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `num`, `percentage`, `user_id`, `wasteid`, `status`) VALUES
(52, 0.08, '8%', 114, 153, 'used'),
(53, 0.05, '5%', 114, 154, 'Available'),
(54, 0.05, '5%', 114, 156, 'used'),
(55, 0.05, '5%', 114, 157, 'Cancelled'),
(56, 0.08, '8%', 114, 158, 'used'),
(58, 0.08, '8%', 119, 161, 'Pending'),
(59, 0.08, '8%', 119, 163, 'Cancelled'),
(60, 0.08, '8%', 120, 164, 'Available'),
(61, 0.08, '8%', 120, 165, 'Available'),
(62, 0.05, '5%', 120, 166, 'Cancelled'),
(64, 0.1, '10%', 123, 169, 'Available'),
(66, 0.1, '10%', 119, 171, 'Available'),
(74, 0.05, '5%', 118, 180, 'used'),
(75, 0.08, '8%', 122, 181, 'used'),
(76, 0.08, '8%', 114, 182, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `entityname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `username`, `entityname`, `email`, `phone`, `location`, `password`) VALUES
(2, 'mohamedm', 'Mohamed Mahmoud', 'mohamedmahmoud77@gmail.com', '01522334511', '41 Elmorshedy street, Helwan, Cairo', '159753159'),
(9, 'hassanmo77', 'Hassan Mohamed', 'Hassanmohamed@gmail.com', '01111222333', '15 Elsadat Street, Eneba, Aswan', 'h123498'),
(10, 'mohamedabdo', 'mohamed abdeltawab', 'mohamedabdo88@yahoo.com', '01156996637', '180 mohamed khalifa street , Maadi, cairo', 'mabdo990'),
(11, 'sayedsalem12', 'El Hawary Company', 'Elhawarycomp@gmail.com', '01523568912', ' building No 28 ,salah salem street , Cairo', '3325786'),
(12, 'mohamedhamed', 'mohamed hamed', 'mohamed775@yahoo.com', '01258652145', '28 , dyarb , sharkya', 'mh44445'),
(13, 'ahmedh99', 'Ahmed Hesham', 'elnemrc@yahoo.com', '01155996635', '306 street / Maadi / Cairo', '852456'),
(14, 'laylam95', 'Layla Ahmed', 'Laylaahmed1@gmail.com', '01155996631', '85 , dokki , giza', '951753'),
(15, 'nadasayed', 'Nada Sayed', 'Nadasayed@yahoo.com', '01155996231', '', 'Nsayed22331'),
(16, 'hassanb85', 'Hassan Abdulrahman', 'hassanmb@gmail.com', '01111222223', 'Faisal/ Giza', '0852361');

-- --------------------------------------------------------

--
-- Table structure for table `dist_order_items`
--

CREATE TABLE `dist_order_items` (
  `id` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `amount` float NOT NULL,
  `O_id` int(11) NOT NULL,
  `fert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dist_order_items`
--

INSERT INTO `dist_order_items` (`id`, `frequency`, `amount`, `O_id`, `fert_id`) VALUES
(30, 3, 750, 17, 7),
(31, 3, 750, 18, 6),
(32, 2, 500, 19, 7),
(36, 4, 1000, 21, 8),
(37, 5, 1250, 22, 6),
(38, 3, 720, 23, 12),
(39, 5, 1250, 24, 7),
(40, 4, 1000, 25, 7);

-- --------------------------------------------------------

--
-- Table structure for table `dist_order_total`
--

CREATE TABLE `dist_order_total` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total` float NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dist_order_total`
--

INSERT INTO `dist_order_total` (`id`, `user`, `date`, `total`, `status`, `admin_id`) VALUES
(16, 10, '2022-07-02 20:19:43', 1000, 'Cancelled ', NULL),
(17, 10, '2022-07-02 20:22:30', 750, 'Delivered ', NULL),
(18, 10, '2022-07-02 22:23:56', 750, 'Approved Your Order will be ready in 3-6 days', NULL),
(19, 10, '2022-07-02 22:24:36', 500, 'Delivered ', NULL),
(21, 12, '2022-07-03 21:35:02', 1000, 'Delivered ', NULL),
(22, 12, '2022-07-03 21:35:27', 1250, 'Cancelled ', NULL),
(23, 14, '2022-07-03 21:37:34', 720, 'Delivered ', NULL),
(24, 14, '2022-07-03 21:37:48', 1250, 'Delivered ', NULL),
(25, 12, '2022-07-03 21:39:06', 1000, 'Approved Your Order will be ready in 3-6 days', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizers`
--

CREATE TABLE `fertilizers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fertilizers`
--

INSERT INTO `fertilizers` (`id`, `name`, `quantity`, `image`, `price`, `admin_id`) VALUES
(4, 'Nutrient retention of soil', '25 kg', 'fertilizers/fertilizers7.jpeg', 240, NULL),
(6, 'Increase  aeration easy to handle and store', '25 kg ', 'fertilizers/fertilizers4.jpeg', 250, NULL),
(7, 'Enhance soil structure by adding vital vitamins and enzymes', '25 kg', 'fertilizers/fertilizers2.jpeg', 250, NULL),
(8, '100% organic and produced naturally by earthworms', '25kg', 'fertilizers/fertilizers1.jpeg', 250, NULL),
(9, 'Provide added protection from pests and diseases ', '25 kg', 'fertilizers/fertilizers3.jpeg', 250, NULL),
(10, 'contains all necessary micro faster seed germination', '25 kg', 'fertilizers/fertilizers5.jpeg', 240, NULL),
(11, 'Contains hormones that promote faster seed germination', '25 kg', 'fertilizers/fertilizers6.jpeg', 240, NULL),
(12, 'Promote plant growth build soil organic carbon content', '25 kg', 'fertilizers/fertilizers8.jpeg', 240, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `entityname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Type` enum('Hotel','Restaurant','Club','Factory') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `username`, `entityname`, `password`, `email`, `Type`) VALUES
(114, 'mahmoudahmed12', 'Pasta Drugs', '951753', 'pastadrugs2@gmail.com', 'Restaurant'),
(118, 'ahmed333', 'Elmesnshawy', '01254895211', 'elmenshawy88@gmail.com', 'Factory'),
(119, 'ahmedsayed11', 'Kheer zaman', '85245654', 'ahmedsayed18@yahoo.com', 'Restaurant'),
(120, 'hassanabdo8', 'Zatona', '88552211', 'hassanabdo12@gmail.com', 'Restaurant'),
(121, 'ahmedmahmoud5', 'Grand Nile', '9663221', 'ahmedmahmoud5@gmail.com', 'Hotel'),
(122, 'ahmedmedhat92', 'Maadi Sporting & Yacht Club  ', '951753852', 'ahmedmedhat92@gmail.com', 'Club'),
(123, 'ahmedsayed555', 'Pizza Hut', '55555', 'ahmedsayed555@yahoo.com', 'Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `supp_location`
--

CREATE TABLE `supp_location` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supp_location`
--

INSERT INTO `supp_location` (`id`, `sid`, `location`) VALUES
(1, 114, '306 Street , New Maadi , Cairo'),
(13, 114, '20 Street , Faisal , Giza'),
(14, 119, '14 Abu Elfeda street , Zamalek, Giza'),
(15, 121, '88, Garden City , Cairo'),
(16, 120, 'Degla , Maadi , Cairo'),
(17, 118, '10th of ramadan'),
(18, 122, 'Katamya'),
(19, 122, 'Maadi'),
(20, 123, '24 Nasr St /Maadi/Cairo'),
(21, 123, '30 Abu Elfeda St/ Zamalek / Giza');

-- --------------------------------------------------------

--
-- Table structure for table `supp_order_items`
--

CREATE TABLE `supp_order_items` (
  `id` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `amount` float NOT NULL,
  `O_id` int(11) NOT NULL,
  `crops_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supp_order_items`
--

INSERT INTO `supp_order_items` (`id`, `frequency`, `amount`, `O_id`, `crops_id`) VALUES
(134, 2, 6000, 205, 19),
(135, 1, 3000, 206, 19),
(136, 4, 12000, 207, 19),
(137, 1, 3000, 207, 19),
(138, 1, 100, 207, 18),
(139, 1, 100, 207, 18),
(140, 1, 2000, 208, 20),
(141, 3, 9000, 208, 19),
(142, 2, 6000, 209, 19),
(143, 1, 2000, 209, 20),
(144, 3, 270, 209, 22),
(145, 4, 12000, 210, 19),
(146, 3, 150, 211, 29),
(147, 1, 2000, 212, 20),
(148, 2, 6000, 212, 19),
(149, 2, 4000, 213, 20),
(150, 1, 100, 213, 32),
(151, 4, 8000, 214, 20);

-- --------------------------------------------------------

--
-- Table structure for table `supp_order_total`
--

CREATE TABLE `supp_order_total` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total` float NOT NULL,
  `user` int(11) NOT NULL,
  `discount` float NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supp_order_total`
--

INSERT INTO `supp_order_total` (`id`, `date`, `total`, `user`, `discount`, `status`, `admin_id`) VALUES
(205, '2022-07-02 23:45:48', 6000, 119, 0, 'Cancelled ', NULL),
(206, '2022-07-02 23:57:28', 2700, 119, 300, 'Delivered ', NULL),
(207, '2022-07-03 19:46:53', 13680, 119, 1520, 'Delivered ', NULL),
(208, '2022-07-03 19:54:17', 10450, 119, 550, 'Delivered ', NULL),
(209, '2022-07-03 20:32:47', 7608.4, 114, 661.6, 'Approved Your Order will be ready in 2 days', NULL),
(210, '2022-07-03 20:34:51', 11400, 114, 600, 'Pending', NULL),
(211, '2022-07-03 20:35:21', 138, 114, 12, 'Cancelled ', NULL),
(212, '2022-07-03 21:18:35', 7600, 118, 400, 'Delivered ', NULL),
(213, '2022-07-03 21:22:10', 4100, 118, 0, 'Delivered ', NULL),
(214, '2022-07-03 21:30:26', 7360, 122, 640, 'Approved Your Order will be ready in 3-6 days', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supp_phone`
--

CREATE TABLE `supp_phone` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supp_phone`
--

INSERT INTO `supp_phone` (`id`, `sid`, `phone`) VALUES
(32, 114, '01555889968'),
(35, 114, '01002233668'),
(45, 119, '01153996637'),
(46, 121, '01155996630'),
(47, 120, '01155796638'),
(53, 122, '01155996633'),
(54, 122, '01155996637'),
(56, 122, '01155996635'),
(57, 114, '01155996638'),
(58, 123, '015555563111'),
(59, 123, '015555563222'),
(60, 119, '011114455221'),
(69, 118, '012');

-- --------------------------------------------------------

--
-- Table structure for table `waste`
--

CREATE TABLE `waste` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` float NOT NULL,
  `Type` varchar(30) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `discount` float NOT NULL,
  `Status` varchar(200) NOT NULL DEFAULT 'Pending',
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waste`
--

INSERT INTO `waste` (`id`, `name`, `quantity`, `Type`, `supp_id`, `time`, `discount`, `Status`, `admin_id`) VALUES
(153, 'Pasta leftovers ', 3000, 'Cooked', 114, '2022-06-30 00:33:13', 0.08, 'Delivered ', NULL),
(154, 'Pasta leftovers ', 1500, 'Cooked', 114, '2022-06-30 00:33:32', 0.05, 'Delivered ', NULL),
(155, 'Pasta leftovers ', 100, 'Cooked', 114, '2022-06-30 00:37:37', 0, 'Cancelled  ', NULL),
(156, 'Baked leftovers', 1500, 'Cooked', 114, '2022-06-30 00:47:45', 0.05, 'Delivered ', NULL),
(157, 'used oil', 1500, 'Cooked', 114, '2022-06-30 00:53:29', 0.05, 'Cancelled  ', NULL),
(158, 'Pasta leftovers', 2800, 'Cooked', 114, '2022-06-30 01:10:54', 0.08, 'Delivered ', NULL),
(161, 'onion peel', 3000, 'Vegetables', 119, '2022-06-30 02:21:22', 0.08, 'Pending  ', NULL),
(162, 'onion peel', 1000, 'Vegetables', 119, '2022-06-30 02:21:31', 0, 'Accepted  ', NULL),
(163, 'onion peel', 2600, 'Vegetables', 119, '2022-06-30 02:21:49', 0.08, 'Cancelled  ', NULL),
(164, 'garlic peel', 3000, 'Vegetables', 120, '2022-06-30 02:27:46', 0.08, 'Delivered ', NULL),
(165, 'garlic peel', 2500, 'Vegetables', 120, '2022-06-30 02:28:03', 0.08, 'Delivered ', NULL),
(166, 'garlic peel', 1500, 'Vegetables', 120, '2022-06-30 02:28:13', 0.05, 'Cancelled  ', NULL),
(169, 'Baked leftovers', 3500, 'Cooked', 123, '2022-06-30 07:53:54', 0.1, 'Delivered ', NULL),
(171, 'eggshell', 5000, 'Cooked', 119, '2022-07-01 18:19:25', 0.1, 'Delivered ', NULL),
(180, 'banana peel', 1500, 'Fruits', 118, '2022-07-03 21:16:14', 0.05, 'Delivered ', NULL),
(181, 'leftovers rice', 2600, 'Vegetables', 122, '2022-07-03 21:29:36', 0.08, 'Delivered ', NULL),
(182, 'banana peel', 3000, 'Fruits', 114, '2022-08-14 07:15:22', 0.08, 'Delivered ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`userid`),
  ADD KEY `crops_id` (`crops_id`);

--
-- Indexes for table `cartd`
--
ALTER TABLE `cartd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fert_id` (`fert_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cropss`
--
ALTER TABLE `cropss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wasteid` (`wasteid`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `dist_order_items`
--
ALTER TABLE `dist_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dorderi_ibfk_1` (`O_id`),
  ADD KEY `fert_id` (`fert_id`);

--
-- Indexes for table `dist_order_total`
--
ALTER TABLE `dist_order_total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `fertilizers`
--
ALTER TABLE `fertilizers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `supp_location`
--
ALTER TABLE `supp_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `supp_order_items`
--
ALTER TABLE `supp_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sorderi_ibfk_1` (`O_id`),
  ADD KEY `crops_id` (`crops_id`);

--
-- Indexes for table `supp_order_total`
--
ALTER TABLE `supp_order_total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `supp_phone`
--
ALTER TABLE `supp_phone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `supp_phone_ibfk_1` (`sid`);

--
-- Indexes for table `waste`
--
ALTER TABLE `waste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waste_ibfk_1` (`supp_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `cartd`
--
ALTER TABLE `cartd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `cropss`
--
ALTER TABLE `cropss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dist_order_items`
--
ALTER TABLE `dist_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `dist_order_total`
--
ALTER TABLE `dist_order_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fertilizers`
--
ALTER TABLE `fertilizers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `supp_location`
--
ALTER TABLE `supp_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supp_order_items`
--
ALTER TABLE `supp_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `supp_order_total`
--
ALTER TABLE `supp_order_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `supp_phone`
--
ALTER TABLE `supp_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `waste`
--
ALTER TABLE `waste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`crops_id`) REFERENCES `cropss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartd`
--
ALTER TABLE `cartd`
  ADD CONSTRAINT `cartd_ibfk_1` FOREIGN KEY (`fert_id`) REFERENCES `fertilizers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartd_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `distributors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cropss`
--
ALTER TABLE `cropss`
  ADD CONSTRAINT `cropss_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discount_ibfk_2` FOREIGN KEY (`wasteid`) REFERENCES `waste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dist_order_items`
--
ALTER TABLE `dist_order_items`
  ADD CONSTRAINT `dist_order_items_ibfk_1` FOREIGN KEY (`O_id`) REFERENCES `dist_order_total` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dist_order_items_ibfk_2` FOREIGN KEY (`fert_id`) REFERENCES `fertilizers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dist_order_total`
--
ALTER TABLE `dist_order_total`
  ADD CONSTRAINT `dist_order_total_ibfk_1` FOREIGN KEY (`user`) REFERENCES `distributors` (`id`),
  ADD CONSTRAINT `dist_order_total_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fertilizers`
--
ALTER TABLE `fertilizers`
  ADD CONSTRAINT `fertilizers_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supp_location`
--
ALTER TABLE `supp_location`
  ADD CONSTRAINT `supp_location_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supp_order_items`
--
ALTER TABLE `supp_order_items`
  ADD CONSTRAINT `supp_order_items_ibfk_1` FOREIGN KEY (`O_id`) REFERENCES `supp_order_total` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supp_order_items_ibfk_2` FOREIGN KEY (`crops_id`) REFERENCES `cropss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supp_order_total`
--
ALTER TABLE `supp_order_total`
  ADD CONSTRAINT `supp_order_total_ibfk_1` FOREIGN KEY (`user`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supp_phone`
--
ALTER TABLE `supp_phone`
  ADD CONSTRAINT `supp_phone_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waste`
--
ALTER TABLE `waste`
  ADD CONSTRAINT `waste_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `waste_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
