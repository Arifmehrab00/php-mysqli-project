-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 10:06 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmysql_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'arifmehrab', '12345'),
(2, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bloge_post`
--

CREATE TABLE `bloge_post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(800) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bloge_post`
--

INSERT INTO `bloge_post` (`id`, `title`, `description`, `category`, `image`) VALUES
(5, 'This is ArifMehrab web developer', 'This is ArifMehrab web developerThis is ArifMehrab web developerThis is ArifMehrab web developer', 'webdesign', 'image/5326155aber 01.jpg'),
(8, 'Kava gor?', 'Kava gor?Kava gor?Kava gor?Kava gor?', 'webdevelopment', 'image/6452807bloge 3-2.png'),
(13, 'Thsi is our First Bloge Post?fgfg', 'Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?', 'html', 'image/5763376batch 71.jpg'),
(14, 'Natural image', 'Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?Thsi is our First Bloge Post?', 'webdesign', 'image/2946097bloge 2-3.jpg'),
(17, 'This is ArifMehrab ', 'This is ArifMehrab web developerThis is ArifMehrab web developerThis is ArifMehrab web developer ...!!!!\r\n', 'html', 'image/3851012batch 71.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photogallery`
--

CREATE TABLE `photogallery` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photogallery`
--

INSERT INTO `photogallery` (`id`, `title`, `image`) VALUES
(3, 'This is ArifMehrab web developer', 'image/7500420181022_150909.jpg'),
(4, 'Kava gor?', 'image/66324InstaSave-03.jpeg'),
(5, 'Natural image', 'image/51233wordpress website using divi theme.png'),
(6, 'Fiver gig image', 'image/12739i will create wordpress website using  divi theme.png'),
(7, 'This is ArifMehrab web developer', 'image/77659divi theme.png'),
(31, 'This is title', 'image/24603create-any-wordpress-website-using-divi-theme.jpg'),
(38, 'This is title', 'image/52903create-ecommerce-website-using-woocommerce-any-types-of-customization-and-fix.jpg'),
(48, 'Natural Image', 'image/41036I Will Design Wordpress Landing Page Or squeeze page.png');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `comm_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`id`, `user_id`, `comm_id`, `user_name`, `comment`) VALUES
(1, 18, 17, 'arifmehrab khan', 'hello?'),
(2, 14, 8, 'arifmehrab', 'This is nice Post?'),
(3, 14, 8, 'arifmehrab', 'This is nice Post?'),
(4, 14, 8, 'arifmehrab', 'This is nice Post?'),
(5, 14, 8, 'arifmehrab', 'Hello?'),
(6, 14, 8, 'arifmehrab', 'Hello?'),
(7, 14, 17, 'arifmehrab', 'Hi?'),
(8, 14, 5, 'arifmehrab', 'Thsi is very Helfull Post Thank a lot?'),
(9, 14, 5, 'arifmehrab', 'Thsi is very Helfull Post Thank a lot?'),
(10, 14, 5, 'arifmehrab', 'Thsi is very Helfull Post Thank a lot?'),
(11, 14, 5, 'arifmehrab', 'Thsi is very Helfull Post Thank a lot?'),
(23, 18, 13, 'arifmehrab khan', 'Yes i can Do it?'),
(24, 18, 17, 'arifmehrab khan', 'This is ArifMehrab web developerThis is ArifMehrab web developerThis is ArifMehrab web developer ...!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `post_deslike`
--

CREATE TABLE `post_deslike` (
  `id` int(100) NOT NULL,
  `user_deslike` int(100) NOT NULL,
  `post_deslike` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_deslike`
--

INSERT INTO `post_deslike` (`id`, `user_deslike`, `post_deslike`) VALUES
(1, 18, 14),
(2, 18, 14),
(3, 18, 17),
(4, 18, 17),
(5, 18, 17),
(6, 18, 17),
(7, 18, 17),
(8, 18, 17),
(9, 18, 17),
(10, 18, 17),
(11, 18, 17),
(12, 14, 13);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`id`, `user_id`, `post_id`) VALUES
(1, 18, 17),
(2, 18, 17),
(3, 18, 14),
(4, 18, 17),
(5, 18, 13),
(6, 18, 13),
(7, 18, 17),
(8, 18, 14),
(9, 18, 14),
(10, 18, 8),
(11, 18, 14),
(12, 18, 17),
(13, 18, 17),
(14, 18, 17),
(15, 18, 17),
(16, 18, 14),
(17, 18, 14),
(18, 18, 17),
(19, 18, 17),
(20, 18, 17),
(21, 18, 17),
(22, 18, 17),
(23, 18, 17),
(24, 18, 17),
(25, 18, 14),
(26, 18, 14),
(27, 18, 14),
(28, 18, 17),
(29, 18, 17),
(30, 18, 17),
(31, 18, 13),
(32, 18, 13),
(33, 18, 17),
(34, 18, 17);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fathers name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` int(12) NOT NULL,
  `deperment` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `fathers name`, `address`, `mobile`, `deperment`, `email`, `password`, `profile`, `status`) VALUES
(2, 'Arif Mehrab', 'salim miah', 'comilla', 2457522, 'Computer', 'tabasummim283@gmail.', '25f9e794323b453885f5', 'image/133429320181022_150909.jpg', 'active'),
(3, 'arif khan', 'salim miah', 'feni', 1827924326, 'cmt6/2', 'arifmehrab11@gmail.c', '25d55ad283aa400af464', 'image/5043535IMG_20190614_163903.jpg', 'active'),
(4, 'Arif Mehrab', 'salim miah', 'comilla', 52825, 'Computer', 'abc@gmail.com', '9fab6755cd2e8817d3e7', 'image/5330429IMG_20190608_100639.jpg', 'active'),
(5, 'Arif Mehrab', 'salim miah', 'comilla', 52825, 'Computer', 'abc@gmail.com', '9fab6755cd2e8817d3e7', 'image/2851457IMG_20190608_100639.jpg', 'active'),
(6, 'arifur  Rahaman ', 'salim miah', 'kenduya', 1871848137, 'civil', 'arif@gmail.com', '9fab6755cd2e8817d3e7', 'image/5548114IMG_20190608_100641.jpg', 'active'),
(7, 'Arif Mehrab', 'salim miah', 'comilla', 5424242, 'Computer', 'arifmehrab11@gmail.c', '25d55ad283aa400af464', 'image/8818958IMG_20190608_110017.jpg', 'active'),
(8, 'Arif Mehrab', 'salim miah', 'comilla', 7585542, 'Computer', 'abc@gmail.com', '9fab6755cd2e8817d3e7', 'image/5242831IMG_20190608_110134.jpg', 'active'),
(9, 'Arif Mehrab', 'salim miah', 'comilla', 2147483647, 'Computer', 'abc@gmail.com', '25d55ad283aa400af464', 'image/1657202B612_20190608_110859_078.jpg', 'active'),
(12, 'Arif Mehrab', 'salim miah', 'comilla', 2147483647, 'Computer', 'arifmehrab@gmail.com', 'e78caf56938df35dc210', 'image/8793729IMG_20190614_163903.jpg', 'active'),
(13, 'Arif Mehrab', 'salim miah', 'comilla', 0, 'Computer', 'arifmarketing22@gmai', '789456123', 'image/8085083IMG_20190614_163903.jpg', 'active'),
(14, 'arifmehrab', 'salim miahdfdf', 'kenduyadfdf', 2147483647, 'civilrerfef', 'abcd@gmail.com', '789456123', 'image/14IMG_20190726_210235.jpg', 'active'),
(15, 'Arif Mehrab', 'fgdsg', 'kenduya', 52653533, 'civil', 'kamal@gmail.com', '25f9e794323b453885f5', 'image/9863385IMG_20190614_163903.jpg', 'inactive'),
(18, 'arifmehrab khan', 'salim miahdfdf', 'comilladfdf', 2147483647, 'Computerdf', 'joy@gmail.com', '123456789', 'image/1820181022_150909.jpg', 'active'),
(20, 'arifmehrab', 'salim miah', 'parvin Beagum', 1871848137, 'computer', 'arifmehrab11@gmail.c', '12345678', 'image/8189203wordpress website templete.png', 'active'),
(21, 'arifur rahaman', 'salim miah', 'Feni chouddagraqm', 171848137, 'computer', 'arifmehrab11@gmail.c', '789456123', 'image/8811315IMG_20190726_210319.jpg', 'active'),
(23, 'Hello', 'salim miah', 'kenduy', 1871848137, 'computer', 'computer@gmail.com', '123456789', 'image/479538820181022_150909.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloge_post`
--
ALTER TABLE `bloge_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photogallery`
--
ALTER TABLE `photogallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_deslike`
--
ALTER TABLE `post_deslike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bloge_post`
--
ALTER TABLE `bloge_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `photogallery`
--
ALTER TABLE `photogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_deslike`
--
ALTER TABLE `post_deslike`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
