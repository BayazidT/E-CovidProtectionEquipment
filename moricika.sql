-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2020 at 06:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moricika`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `email`, `password`, `security`) VALUES
(1, 'BT Nirob', 'btnirob@gmail.com', '1234', 'btnirob172');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `pid` int(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pid`, `sid`, `quantity`) VALUES
(117, 18, '2bd563afee6d9e3d4c6cfac161f34aed', 3),
(118, 19, '2bd563afee6d9e3d4c6cfac161f34aed', 1),
(119, 20, '2bd563afee6d9e3d4c6cfac161f34aed', 1),
(131, 9, 'a568021f1bcdfa6b0adb65a5584421a2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nonUser`
--

CREATE TABLE `nonUser` (
  `nonId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nonUser`
--

INSERT INTO `nonUser` (`nonId`, `name`, `phone`, `address`, `sId`) VALUES
(6, 'Bayazid Talukder', '01772242616', 'Uttarpara, Khilkhet, Dhaka-1229', '7afff52890e7230ba602c2e9f61068ff'),
(7, 'Mokashefa', '01782776552', 'Uttara, Dhaka-1230', '0f29c35629b5e65e30ac1420fd8f720e'),
(10, 'Rokeya Begum', '01726298465', 'Bertala, Sarail, Brahmanbaria', 'c9233b4d0f6b61dc5962a53bfa4f87ef'),
(11, 'Mokashefa Abedin', '01582886557', 'Uttara, Dhaka', '440553f2097baaf32548906805de16ab'),
(12, 'Samir Talukder', '01826676832', '27/2, gobindodas lan, Old Dhaka', 'bd40c8265679dfc8e1d7e967c57d9a5e'),
(13, 'Nusrat Jahan', '0178372325', 'MohonPur', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(14, 'Lamia Iftekhar', '0177384344', 'Dhanmondi', 'a83f17ba430473917705d93764ed5b9b'),
(15, 'Name for demo', '+880177242616', 'Dhaka , Bangladesh', '2bd563afee6d9e3d4c6cfac161f34aed'),
(16, 'Bayazid', '01732324443', 'Bashundara', '2bbf3725df034ece650271313547b9af');

-- --------------------------------------------------------

--
-- Table structure for table `orderProcced`
--

CREATE TABLE `orderProcced` (
  `oid` int(11) NOT NULL,
  `pId` varchar(255) NOT NULL,
  `oQuantity` varchar(255) NOT NULL,
  `uId` varchar(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderProcced`
--

INSERT INTO `orderProcced` (`oid`, `pId`, `oQuantity`, `uId`, `orderId`, `time`) VALUES
(1, '7', '1', '1', '72001', '2020-07-06 19:02:07'),
(2, '9', '1', '1', '73688', '2020-07-08 19:41:07'),
(3, '18', '1', '1', '73688', '2020-07-08 19:41:07'),
(4, '20', '1', '1', '19769', '2020-07-08 19:41:07'),
(5, '9', '1', '1', '19769', '2020-07-08 19:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `orderProduct`
--

CREATE TABLE `orderProduct` (
  `oid` int(11) NOT NULL,
  `pId` varchar(255) NOT NULL,
  `oQuantity` varchar(255) NOT NULL,
  `uId` varchar(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderProduct`
--

INSERT INTO `orderProduct` (`oid`, `pId`, `oQuantity`, `uId`, `orderId`, `time`) VALUES
(81, '19', '4', '1', '21879', '2020-07-08 19:54:47'),
(82, '9', '1', '1', '21879', '2020-07-08 19:54:47'),
(83, '9', '2', '1', '94104', '2020-12-27 16:42:19'),
(84, '18', '1', '1', '94104', '2020-12-27 16:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `orderProductNonUser`
--

CREATE TABLE `orderProductNonUser` (
  `oid` int(11) NOT NULL,
  `pId` varchar(255) NOT NULL,
  `oQuantity` varchar(255) NOT NULL,
  `uId` varchar(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderProductNonUser`
--

INSERT INTO `orderProductNonUser` (`oid`, `pId`, `oQuantity`, `uId`, `orderId`, `time`, `sId`) VALUES
(1, '1', '1', '12', '', '2020-06-28 06:21:59', ''),
(2, '1', '1', '12', '', '2020-06-28 06:31:42', ''),
(3, '1', '1', '12', '', '2020-06-28 07:10:59', ''),
(4, '2', '1', '12', '', '2020-06-28 07:24:15', ''),
(5, '1', '1', '13', '', '2020-06-28 07:32:42', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(6, '3', '1', '13', '', '2020-06-28 07:34:32', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(7, '6', '1', '13', '', '2020-06-28 08:17:43', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(8, '6', '1', '13', '', '2020-06-28 10:40:58', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(9, '2', '1', '13', '', '2020-06-28 10:47:13', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(10, '2', '1', '13', '', '2020-06-28 10:51:28', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(11, '2', '1', '13', '95246', '2020-06-28 15:55:14', 'fcdfe1a64adb40c4d7a3683ac4de1698'),
(12, '1', '4', '14', '77341', '2020-07-05 08:02:42', 'a83f17ba430473917705d93764ed5b9b'),
(13, '6', '1', '14', '77341', '2020-07-05 08:02:42', 'a83f17ba430473917705d93764ed5b9b'),
(14, '19', '4', '15', '53033', '2020-07-08 19:34:14', '2bd563afee6d9e3d4c6cfac161f34aed'),
(15, '9', '1', '15', '53033', '2020-07-08 19:34:14', '2bd563afee6d9e3d4c6cfac161f34aed'),
(16, '9', '3', '16', '26173', '2020-08-28 14:07:00', '2bbf3725df034ece650271313547b9af');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `psize` varchar(50) DEFAULT NULL,
  `pcategory` varchar(50) DEFAULT NULL,
  `pprice` varchar(50) DEFAULT NULL,
  `pdescription` longtext DEFAULT NULL,
  `pspecification` longtext DEFAULT NULL,
  `pquantity` varchar(50) DEFAULT NULL,
  `pimage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `psize`, `pcategory`, `pprice`, `pdescription`, `pspecification`, `pquantity`, `pimage`) VALUES
(9, 'KN95 MASK', 'all', 'mask', '120', '<p>This mask is very soft and comfortable. One can easily wear this whole day long.</p>', '<div><b>Key Features of McCons KN95 Mash:</b></div><ul><li>Ultra-fine filter layer effectively prevents PM2.5 particles from entering</li><li>PM 2.5 filtration with an efficiency rate up to 95%</li><li>Non-woven fabric for safe filtering, soft fabric, breathable, comfortable</li><li>Filters out dust, bacteria, smoke &amp; pollen</li><li>4 Layers of protection</li><li>FFP2 Protection</li><li>Anti-infection</li><li>PFE=&gt;95%</li><li>BFE&gt;=95%</li></ul>', '1000', 'e848725c79.jpg'),
(14, 'ACE Plus', '500 gm', 'Medicine', '20', '<p>For fever and pain</p>', '<p>Description</p>', '50', 'df173fc5b2.jpg'),
(16, 'Savlon Instant Hand Sanitizer', '100 ml', 'Hand Sanitizer', '200 ', '<p>Protective from everything</p>', '<p>Use it&nbsp;</p>', '10', '0ec04d73ac.jpg'),
(17, 'HF 105 GOGGLES CE', 'all', 'Protective Element', '500', '<p>It\'s high quality</p>', '<p>This is the main thing</p>', '50', 'fced537338.jpg'),
(18, 'Surgical Mask Box 50 pics', 'all', 'Mask', '500', '<p><span style=\"caret-color: rgb(154, 160, 166); font-family: Roboto, HelveticaNeue, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><font color=\"#000000\">China manufactured disposable face mask for preventing risk of infection / viruses / dust / bacteria / chemical / particles / pollen and smoke.</font></span><br></p>', '<p><span style=\"caret-color: rgb(154, 160, 166); color: rgb(0, 0, 0); font-family: Roboto, HelveticaNeue, Arial, sans-serif; font-size: 14px;\">China manufactured disposable face mask for preventing risk of infection / viruses / dust / bacteria / chemical / particles / pollen and smoke.</span><br></p>', '50', 'a5360ac94c.jpeg'),
(19, 'Surgical Mask 1 piece', 'all', 'Mask', '15', '<p><span style=\"caret-color: rgb(154, 160, 166); color: rgb(0, 0, 0); font-family: Roboto, HelveticaNeue, Arial, sans-serif; font-size: 14px;\">China manufactured disposable face mask for preventing risk of infection / viruses / dust / bacteria / chemical / particles / pollen and smoke.</span><br></p>', '<p><span style=\"caret-color: rgb(154, 160, 166); color: rgb(0, 0, 0); font-family: Roboto, HelveticaNeue, Arial, sans-serif; font-size: 14px;\">China manufactured disposable face mask for preventing risk of infection / viruses / dust / bacteria / chemical / particles / pollen and smoke.</span><br></p>', '50', '65bccd91ed.jpg'),
(20, 'Napa Extra 12 peice', '665 gm', 'Medicine', '30', '<p>For fever</p>', '<p>Pain</p>', '50', 'bd068195b4.jpg'),
(21, 'Histacin-4mg-10pcs', '4 gm', 'Medicine', '3', '<p>Histacin</p>', '<p>Histacin</p>', '50', 'a8ac43bb97.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(252) NOT NULL,
  `userAddress` text NOT NULL,
  `userPassword` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `userEmail`, `userAddress`, `userPassword`) VALUES
(1, 'Bayazid Talukder', 'btnirob172@gmail.com', 'Uttar Namapara, Khilkhet, Dhaka-1229', '1234'),
(2, 'Sadia Anjum', 'slamia@gmail.com', '', 'sal'),
(3, 'Nusrat Jahan Efa', 'njahan@gmail.com', 'Mohonpur, Brahmanbaria', '123'),
(4, 'Rakib Hasan', 'rhasan@gmail.com', 'Bertala, Sarail, Brahmanbaria', '1234'),
(5, 'BT Nirob', 'bt.nirob@gmail.com', 'Bashundara, Dhaka', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `nonUser`
--
ALTER TABLE `nonUser`
  ADD PRIMARY KEY (`nonId`);

--
-- Indexes for table `orderProcced`
--
ALTER TABLE `orderProcced`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `orderProductNonUser`
--
ALTER TABLE `orderProductNonUser`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `nonUser`
--
ALTER TABLE `nonUser`
  MODIFY `nonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orderProcced`
--
ALTER TABLE `orderProcced`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderProduct`
--
ALTER TABLE `orderProduct`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `orderProductNonUser`
--
ALTER TABLE `orderProductNonUser`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
