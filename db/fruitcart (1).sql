-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 09:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`) VALUES
(1, '', 'n@n.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Rajneesh', 'raj@mail', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `upload_image`) VALUES
(13, 'raj', ' kpkp ', '765117398107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg'),
(14, 'raj', ' dfjaetj ', ' 107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg'),
(17, 'pinky', ' uyfyctsy ', ' 107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg'),
(18, 'fish', ' jguyinbk, ', '391078862OIP.jpg'),
(20, 'Test o7', ' testing ', '2123922164107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg'),
(21, 'testing new', ' testing new ', '1321351983OIP.jpg'),
(22, 'harshi', ' elmazzzzzzzz', '639536367OIP.jpg'),
(23, 'tinku', ' kojoink ', '1450191121107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg'),
(24, 'Testing O7', ' Testing O7 ', '1286368196blogImage1637211233645.jpg'),
(25, 'Navneesh', ' Testing O7 ', '878226609blogImage1637211233645.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `messege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `messege`) VALUES
(2, 'raj', 'raj@mail', '98456725', 'ahcgf7c', 'SnngEIOH ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `createdat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `pincode`, `subtotal`, `shipping`, `total`, `message`, `status`, `createdat`) VALUES
(1, 1241, 'address', '8194848070', '144001', '800', '50', '850', 'test', 'CONFIRMED', '2022-08-23 09:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `order_id`, `quantity`, `price`, `total_price`) VALUES
(1, 10, 1, '2', '250', '500'),
(2, 11, 1, '1', '300', '300');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categorey_id` int(255) NOT NULL,
  `subcategorey_id` int(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `categorey_id`, `subcategorey_id`, `upload_image`, `description`, `price`) VALUES
(8, 'pinkiy', 11, 2, '1020803021OIP.jpg', 'tyg', '4000'),
(9, 'raj', 23, 6, '130723068636211337518143584-GettyImages-137152632.webp', 'cjv9qejvocmqvq', '2000'),
(10, 'Testing O7777', 24, 11, '1962754796astro-dummy.jpg', 'this is testing products', '250'),
(11, 'Test product', 18, 13, '161389388blogImage1637211233645.jpg', 'fdchg', '300');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_password` varchar(255) NOT NULL,
  `re_enter_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `email`, `phone`, `address`, `create_password`, `re_enter_password`) VALUES
('raj', 'aman123@gmail.com', '981547552', 'aeryane4y', '1234', '1234'),
('raj', 'aman123@gmail.com', '981547552', 'aeryane4y', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(255) NOT NULL,
  `categorey_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categorey_id`, `name`, `upload_image`) VALUES
(9, 25, 'navneesh', '851228645blogImage1637211233645.jpg'),
(11, 25, 'Sub cat', '1886865796blogImage1637211233645.jpg'),
(12, 25, 'test sub cat', '896461892blogImage1637211233645.jpg'),
(13, 18, 'fishy', '202079943astro-dummy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `upload_id` varchar(255) DEFAULT NULL,
  `upload_addressid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact`, `dob`, `upload_id`, `upload_addressid`) VALUES
(1234, 'raj', 'aman123@gmail.com', '2587', '9844556622', '2022-08-16', '1189238779burgerkinglogo.png', '1092249125burgerkinglogo.png'),
(1235, 'rahul', 'minku@gmail', '9999', '98585855865', '2022-08-27', '283191361107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg', '1761527049107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg'),
(1236, 'rahul', 'rahul123@gd', '7895', '852468426', '2022-08-19', '2123269754107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg', '743349638OIP.jpg'),
(1240, 'venna', 'fish@1456', '8520', '7891562482', '2022-08-19', '127064566107628-flowers-photography-macro-cherry_blossom-closeup-white_flowers.jpg', '1204940405OIP.jpg'),
(1241, 'Navneesh', 'n@n.com', '202cb962ac59075b964b07152d234b70', '8194848070', '2004-08-23', '370062722blogImage1637211233645.jpg', '560071678demo.png'),
(1244, 'Navneesh', 'n@gmail.com', '202cb962ac59075b964b07152d234b70', '8194848070', '2004-08-23', '305787460Angular_full_color_logo.svg.png', '513218658117-1172166_transparent-png-angular-logo-png-download.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
