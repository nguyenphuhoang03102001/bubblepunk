-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220524.9aa859bdd3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bubblepunk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `OrderID` int(11) UNSIGNED NOT NULL,
  `UserID` int(11) UNSIGNED NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `OrderDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`OrderID`, `UserID`, `UserEmail`, `OrderDate`) VALUES
(17, 10, 'trunghau@gmail.com', '0000-00-00'),
(18, 9, 'thaitrung@gmail.com', '0000-00-00'),
(19, 10, 'trunghau@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orderdetail`
--

CREATE TABLE `tb_orderdetail` (
  `OrderID` int(11) UNSIGNED NOT NULL,
  `ProductID` int(11) UNSIGNED NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_orderdetail`
--

INSERT INTO `tb_orderdetail` (`OrderID`, `ProductID`, `ProductName`) VALUES
(17, 3, 'Splatoon 2'),
(17, 2, 'NieR:Automata™'),
(17, 1, 'Left 4 Dead 2'),
(18, 2, 'NieR:Automata™'),
(18, 4, 'Call of Duty: Modern Warfare'),
(17, 15, 'Left 4 Dead 2'),
(17, 5, 'Skyrim');

-- --------------------------------------------------------

--
-- Table structure for table `tb_platform`
--

CREATE TABLE `tb_platform` (
  `PlatformID` int(11) NOT NULL,
  `PlatformName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_platform`
--

INSERT INTO `tb_platform` (`PlatformID`, `PlatformName`) VALUES
(1, 'PC'),
(2, 'PS4/PS5'),
(3, 'XBOX'),
(4, 'Nintendo Switch'),
(5, 'Nintendo DS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `ProductID` int(11) UNSIGNED NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductPrice` int(11) UNSIGNED NOT NULL,
  `PlatformID` int(11) NOT NULL,
  `ProductSize` int(11) UNSIGNED NOT NULL,
  `ProductProducer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductSpecCPU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductSpecGPU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductSpecRam` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductSpecOS` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductImg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductTrailer` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`ProductID`, `ProductName`, `ProductPrice`, `PlatformID`, `ProductSize`, `ProductProducer`, `ProductSpecCPU`, `ProductSpecGPU`, `ProductSpecRam`, `ProductSpecOS`, `ProductImg`, `ProductTrailer`) VALUES
(1, 'Left 4 Dead 2', 120000, 1, 13000, 'Valve', 'Intel core 2 duo 2.4GHz', 'Video Card Shader model 3.0. NVidia 7600, ATI X1600 or better', '2 GB', 'Windows® 7 32/64-bit / Vista 32/64 / XP', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod11.png?raw=true', 'https://www.youtube.com/embed/Iqid90JR6BY'),
(2, 'NieR:Automata™', 833000, 2, 50000, 'Square Enix', NULL, NULL, NULL, NULL, 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod21.png?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(3, 'Splatoon 2', 1350000, 4, 5500, 'Nintendo', NULL, NULL, NULL, NULL, 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod31.jpg?raw=true', 'https://www.youtube.com/embed/qN4w5D2tzME'),
(4, 'Call of Duty: Modern Warfare', 990000, 3, 119400, 'Activision', NULL, NULL, NULL, NULL, 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod41.png?raw=true', 'https://www.youtube.com/embed/07oDik6Iwg8'),
(5, 'Skyrim', 147000, 1, 29700, 'Bethesda studio', 'Intel core 2 duo 2.4GHz', 'Video Card Shader model 3.0. NVidia 7600, ATI X1600 or better', '2 GB', 'Windows® 7 32/64-bit / Vista 32/64 / XP', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod12.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(6, 'Battlefield 1', 335000, 1, 9100, 'EA', 'Intel core 2 duo 2.4GHz', 'Video Card Shader model 3.0. NVidia 7600, ATI X1600 or better', '2 GB', 'Windows® 7 32/64-bit / Vista 32/64 / XP', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod13.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(7, 'No man\'s sky', 1047000, 1, 13500, 'Hello Games', 'Intel core 2 duo 2.4GHz', 'Video Card Shader model 3.0. NVidia 7600, ATI X1600 or better', '2 GB', 'Windows® 7 32/64-bit / Vista 32/64 / XP', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod14.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(8, 'Devil\'s may cry', 373000, 2, 22000, 'Capcom', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod22.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(9, 'Bayonetta', 199000, 2, 26100, 'Capcom', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod23.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(10, 'Final Fantasy XIV', 1072000, 2, 27300, 'Square Enix', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod24.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(11, 'Super Mario Galaxy 2', 419000, 3, 10200, 'Nintendo', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod32.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(12, 'Mario kart 8 Deluxe', 267000, 3, 22300, 'Nintendo', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod33.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(13, 'Super Smash Bros Ultimate', 425000, 3, 24400, 'Nintendo', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod34.png?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(14, 'Nier: Automata', 463000, 4, 24800, 'Square Enix', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod42.png?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(15, 'Left 4 Dead 2', 1993000, 4, 28800, 'Vavle', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod43.png?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk'),
(16, 'Battlefield 1', 926000, 4, 18000, 'EA', '', '', '', '', 'https://github.com/nguyenphuhoang03102001/bubblepunk/blob/main/img/prod44.jpg?raw=true', 'https://www.youtube.com/embed/wJxNhJ8fjFk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_thumbnail`
--

CREATE TABLE `tb_thumbnail` (
  `ProductID` int(11) UNSIGNED NOT NULL,
  `ProductThumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `UserID` int(11) UNSIGNED NOT NULL,
  `UserPass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UserPhone` int(11) UNSIGNED DEFAULT NULL,
  `UserAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`UserID`, `UserPass`, `UserName`, `UserEmail`, `UserPhone`, `UserAddress`) VALUES
(7, '42c6199c327263c84b74c1c4d832f193', 'NguyenPhuHoang', 'lord.vader0310@gmail.com', NULL, NULL),
(8, '42c6199c327263c84b74c1c4d832f193', 'HoHaiDang', 'haidang@gmail.com', NULL, NULL),
(9, '42c6199c327263c84b74c1c4d832f193', 'NguyenThaiTrung', 'thaitrung@gmail.com', NULL, NULL),
(10, '42c6199c327263c84b74c1c4d832f193', 'NguyenTrungHau', 'trunghau@gmail.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_A3` (`UserID`) USING BTREE;

--
-- Indexes for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD KEY `FK_A4` (`ProductID`);

--
-- Indexes for table `tb_platform`
--
ALTER TABLE `tb_platform`
  ADD PRIMARY KEY (`PlatformID`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_A1` (`PlatformID`);

--
-- Indexes for table `tb_thumbnail`
--
ALTER TABLE `tb_thumbnail`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `OrderID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_platform`
--
ALTER TABLE `tb_platform`
  MODIFY `PlatformID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `ProductID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `UserID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `FK_A3` FOREIGN KEY (`UserID`) REFERENCES `tb_users` (`UserID`);

--
-- Constraints for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD CONSTRAINT `FK_A4` FOREIGN KEY (`ProductID`) REFERENCES `tb_product` (`ProductID`),
  ADD CONSTRAINT `FK_A5` FOREIGN KEY (`OrderID`) REFERENCES `tb_order` (`OrderID`);

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `FK_A1` FOREIGN KEY (`PlatformID`) REFERENCES `tb_platform` (`PlatformID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



