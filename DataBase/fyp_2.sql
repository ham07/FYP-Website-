-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 02:22 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'hamza', 'amit09');

-- --------------------------------------------------------

--
-- Table structure for table `book_a_carpenter`
--

CREATE TABLE `book_a_carpenter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `problem` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `completedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_a_carpenter`
--

INSERT INTO `book_a_carpenter` (`id`, `user_id`, `fname`, `lname`, `contact`, `problem`, `address`, `status`, `date`, `completedDate`) VALUES
(7, 85, 'hamza', 'zia', '03214269700', 'Repair Furniture', 'lahore', 'complete', '2020-01-22 16:18:19', '2020-01-22 16:20:20'),
(8, 85, 'moiz', 'afzal', '03205599376', 'Repair Furniture', 'lahore', 'incomplete', '2020-01-27 10:49:58', '0000-00-00 00:00:00'),
(9, 99, 'hamza', 'zia', '03204313448', 'Furniture Remodeling', 'dgreg', 'incomplete', '2020-01-28 14:59:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_address`
--

CREATE TABLE `checkout_address` (
  `id` int(11) NOT NULL,
  `firstname` varchar(11) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_address`
--

INSERT INTO `checkout_address` (`id`, `firstname`, `lastname`, `email`, `address`, `city`, `pincode`, `contactno`, `date`) VALUES
(1, 'hamza', 'zia', 'hamza16@gmail.com', 'lahore', 'lahore', '67555', '03214269700', '2020-01-25 13:19:44'),
(4, 'hamza zia', 'tuli zia', 'hamzafarrukh@gmail.com', 'lahore city', 'Karachi', '57000', '03214269712', '2020-01-25 16:35:40'),
(5, 'chuli', 'chuli', 'hamza16@gmail.co', 'lahore', 'lahore', '122', '03214269712', '2020-02-10 17:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order_address`
--

CREATE TABLE `confirm_order_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(11) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `completedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm_order_address`
--

INSERT INTO `confirm_order_address` (`id`, `user_id`, `firstName`, `lastname`, `email`, `address`, `city`, `pincode`, `contactno`, `status`, `date`, `completedDate`) VALUES
(1, 85, 'hamza', 'zia', 'hamza16@gmail.com', 'lahore', 'lahore', '67555', '03214269700', 'complete', '2020-01-25 13:19:49', '2020-01-25 13:20:06'),
(4, 85, 'hamza zia', 'tuli zia', 'hamzafarrukh@gmail.com', 'lahore city', 'Karachi', '57000', '03214269712', 'complete', '2020-01-25 16:35:46', '2020-01-28 12:37:56'),
(5, 85, 'chuli', 'chuli', 'hamza16@gmail.co', 'lahore', 'lahore', '122', '03214269712', 'incomplete', '2020-02-10 17:44:45', '2020-02-10 18:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order_product`
--

CREATE TABLE `confirm_order_product` (
  `id` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_name` varchar(11) NOT NULL,
  `shop_address` varchar(250) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(6) NOT NULL,
  `product_qty` int(6) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm_order_product`
--

INSERT INTO `confirm_order_product` (`id`, `product_id`, `shop_name`, `shop_address`, `order_id`, `product_name`, `product_price`, `product_qty`, `product_img`, `product_total`) VALUES
(11, 4, 'Home Coutur', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 1, 'Kursi', 2222, 1, '7042806download (2).jpg', '2222'),
(12, 3, 'Home Coutur', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 1, 'Chair', 555, 1, '13592243download (1).jpg', '555'),
(15, 3, 'Home Coutur', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 4, 'Chair', 555, 1, '13592243download (1).jpg', '555'),
(16, 5, 'Moiz Trader', 'SamanabadLahore467N', 5, 'Desk', 10000, 1, '16842654download (1).jpg', '10000'),
(17, 3, 'Home Coutur', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 5, 'Chair', 555, 1, '13592243download (1).jpg', '555');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `name`, `price`, `description`, `img1`, `img2`, `img3`) VALUES
(19, 'kursi', '2222', 'kqknsniaijjiasaisaias', '9372189download (1).jpg', '11172490download (2).jpg', '302933download (3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `shop_name` varchar(50) DEFAULT NULL,
  `shop_address` varchar(256) DEFAULT NULL,
  `role_type` varchar(10) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `phone`, `shop_name`, `shop_address`, `role_type`, `creation_date`) VALUES
(85, 'Kuli12', '29790e5bd69de19b12b1b23ae31d980ac64b882fc21be086053e0f7fab36238de3af94db64a8574085bd1170a6f3376dd6314ee7476f684997166d6106451bc6', 'hamzazia16@gmail.com', '0', '0', '0', 'user', '2020-01-22 12:17:35'),
(92, 'Kuta12', '7fcd730d0fc1a7aa26d00a10a480cdc39c91dd963e416ce09502a9eb1242d16333ce7487f797803aedfaec6f6eeb57a3cab5728228a36c028249ac0c7ae24dd3', 'hamza16@gmail.com', '03214269700', 'Furniture Point', 'House No 2, Allama Iqbal Rd, Hunza Block, Allama Iqbal Town, Lahore, Punjab', 'shopkeeper', '2020-01-22 13:35:42'),
(93, 'Lu0123', '59f0a5826e78eb76bf2fd5b8b0d56ce76fe500409da207132caacbdf605a0094ec6e805e8a11c6abb3f1b97c64f5c803502950f753090ab673b9f93c4a1f03c6', 'hamzafarrukhzia@gmail.com', '03214269701', 'Home Couture', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 'shopkeeper', '2020-01-22 13:37:08'),
(94, 'Poli12', 'fd9588f880674e29ef873439cd1597f260dd1392fcefb795fde8f896447ef695c4b3ea3cd483de91c8571590801dcc0fa934bde3392608c0e5f7bcab0dc32c1e', 'hamzazia@gmail.com', '03214269711', 'Interwood Mobel Pvt Ltd', '7 Main Boulevard Garden Town, Babar Block Garden Town, Lahore', 'shopkeeper', '2020-01-22 13:38:54'),
(95, 'Shop12', 'f96df0b5b74068ba6d2f689b4ef0c0b74e6954c1afdd07206fd011af085678f79ec09b031a9d6a5dd91174df89ee3beae41754ed7c4d2bee517eaba6a43f148a', 'hamza16@gmail.com', '03214269700', 'Modal furniture', '28 Saadat Farooq Rd, near shama Cinema, Ichhra Lahore', 'shopkeeper', '2020-01-22 13:40:12'),
(96, 'Keep12', 'd6d3ccc93ca34de6ca9e0110c6c77e49eef76cb716a5a3c7b769d592b8df3b6acdde08ea7c50f20b2f25fe7aceb7f631001ec67cea00b9a763940679b9780af0', 'hamza16@gmail.com', '03214269700', 'FurnitureHub.pk', 'Modes Interior 52 B1 PIA society main boulevard near Wapda Town Roundabout Block B 1 Pia Housing Scheme, Lahore', 'shopkeeper', '2020-01-22 13:47:48'),
(97, 'Jul098', '0c135025fbd8873a3cb6060758b5d1ab6faa3c88695763df3a055eeb813f3fddb9e1e83fc7db0e73cf4f15e005d7e9429f0b6ac7bdd07bf3f37b1b58417600f8', 'hamzazia16@gmail.com', '0', '0', '0', 'user', '2020-01-22 13:49:38'),
(98, 'Moiz11', '76623d8c2b91ae9676884b896446773e3d162b16f784e753eec0760326ed6fa12e3bb2699d43ae8e75f77c6811ff1683adbc2918a9879ed53a43add0f45394a0', 'moizafzal5@gmail.com', '03205599376', 'Moiz Traders', 'SamanabadLahore467N', 'shopkeeper', '2020-01-28 12:29:41'),
(99, 'hamzaa', '123fd5d21b7b5e4edf89203193881048d74dabd9af99d699db356dea2475c440b9413a66cc424e17f82b18099bef5d6413d10999a69a3435be0aea6354bb4e54', 'hamza.naeem3436.hn@gmail.com', '0', '0', '0', 'user', '2020-01-28 14:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `status`) VALUES
(1, 5, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `post_ads`
--

CREATE TABLE `post_ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pro_name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `conditionn` varchar(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img1` varchar(300) NOT NULL,
  `img2` varchar(300) NOT NULL,
  `img3` varchar(300) NOT NULL,
  `img4` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_ads`
--

INSERT INTO `post_ads` (`id`, `user_id`, `name`, `pro_name`, `price`, `contactno`, `conditionn`, `email`, `description`, `img1`, `img2`, `img3`, `img4`, `date`) VALUES
(1, 85, 'Moiz', 'Desk', '100', '03205599376', 'old', 'moizafzal5@gmail.com', 'I want to sale this desk', '6392905download (3).jpg', '11462216', '1522662', '362055', '2020-01-28 12:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_cat` varchar(50) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_cat`, `product_img`, `description`) VALUES
(2, 'table', 2222, 9, 'Tables', '199128901420471450639.jpg', 'so beautiful'),
(3, 'chairs', 78, 3, 'Chairs', '532219620140731_140149_HDR.jpg', 'dwewewew'),
(4, 'chairskursichuri', 7800, 38, 'Tables', '462643IMG-20180619-WA0004.jpg', 'dwewewjasnnnnnewjnffjnfjsnfjjsnfjfnjfs'),
(6, 'ksmds', 44, 6, 'Tables', '1760231120140731_140209_HDR.jpg', 'ddad'),
(7, 'ksmds', 44, 6, 'Tables', '1866204220140731_140209_HDR.jpg', 'ddad'),
(9, 'ksmds', 44, 6, 'Tables', '1272221820140731_140209_HDR.jpg', 'ddad'),
(10, 'ksmds', 44, 6, 'Tables', '1533213220140731_140209_HDR.jpg', 'ddad'),
(13, 'hhh', 2222, 5, 'Chairs', '202235020161119_221419.jpg', 'wdwe');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper_add_product`
--

CREATE TABLE `shopkeeper_add_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(22) NOT NULL,
  `price` varchar(22) NOT NULL,
  `qty` varchar(22) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `img1` varchar(300) NOT NULL,
  `img2` varchar(300) NOT NULL,
  `img3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopkeeper_add_product`
--

INSERT INTO `shopkeeper_add_product` (`id`, `user_id`, `product_name`, `price`, `qty`, `shop_name`, `shop_address`, `description`, `date`, `img1`, `img2`, `img3`) VALUES
(1, 92, 'Bed', '10000', '4', 'Furniture Point', 'House No 2, Allama Iqbal Rd, Hunza Block, Allama Iqbal Town, Lahore, Punjab', 'Nice bed hshnd', '2020-01-25 12:05:48', '17022948download (1).jpg', '12512869download (2).jpg', '4582089download (3).jpg'),
(2, 92, 'Chair', '15000', '3', 'Furniture Point', 'House No 2, Allama Iqbal Rd, Hunza Block, Allama Iqbal Town, Lahore, Punjab', 'nice', '2020-01-25 12:08:08', '2222211download.jpg', '7202714download (2).jpg', '13742630download (1).jpg'),
(3, 93, 'Chair', '555', '2', 'Home Couture', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 'ksmdmksdnksd skdms', '2020-01-25 12:10:02', '13592243download (1).jpg', '17662905download.jpg', '13502103download (2).jpg'),
(4, 93, 'Kursi', '2222', '6', 'Home Couture', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 'sdsddsd', '2020-01-25 12:11:04', '7042806download (2).jpg', '11042368download (1).jpg', '17842536download (3).jpg'),
(5, 98, 'Desk', '10000', '10', 'Moiz Traders', 'SamanabadLahore467N', 'I want to sale my desk', '2020-01-28 12:32:09', '16842654download (1).jpg', '12522238download (2).jpg', '8292341download (3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `address`, `type`, `lat`, `lng`) VALUES
(19, 'Furniture Point', 'House No 2, Allama Iqbal Rd, Hunza Block, Allama Iqbal Town, Lahore, Punjab', 'shop', 31.512623, 74.298691),
(20, 'Home Couture', '2B Mian Mehmood Ali Kasoori Rd, Block B3 Block B 3 Gulberg III, Lahore', 'shop', 31.506874, 74.352486),
(21, 'Interwood Mobel Pvt Ltd', '7 Main Boulevard Garden Town, Babar Block Garden Town, Lahore', 'shop', 31.501657, 74.324669),
(22, 'Modal furniture', '28 Saadat Farooq Rd, near shama Cinema, Ichhra Lahore', 'shop', 31.540543, 74.315048),
(23, 'FurnitureHub.pk', 'Modes Interior 52 B1 PIA society main boulevard near Wapda Town Roundabout Block B 1 Pia Housing Scheme, Lahore', 'shop', 31.450512, 74.284752),
(24, 'Moiz Traders', 'SamanabadLahore467N', 'shop', 18.950378, 72.833427);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_a_carpenter`
--
ALTER TABLE `book_a_carpenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_address`
--
ALTER TABLE `checkout_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_order_address`
--
ALTER TABLE `confirm_order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_order_product`
--
ALTER TABLE `confirm_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_ads`
--
ALTER TABLE `post_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopkeeper_add_product`
--
ALTER TABLE `shopkeeper_add_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_a_carpenter`
--
ALTER TABLE `book_a_carpenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkout_address`
--
ALTER TABLE `checkout_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `confirm_order_address`
--
ALTER TABLE `confirm_order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `confirm_order_product`
--
ALTER TABLE `confirm_order_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_ads`
--
ALTER TABLE `post_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shopkeeper_add_product`
--
ALTER TABLE `shopkeeper_add_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
