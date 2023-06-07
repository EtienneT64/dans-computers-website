-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 08:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `dans_computers_db`
--

-- --------------------------------------------------------
--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Description` longtext NOT NULL,
  `Price` decimal(10, 2) NOT NULL,
  `SalesPrice` decimal(10, 2) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `items`
--

INSERT INTO `items` (
    `ItemID`,
    `Name`,
    `Description`,
    `Price`,
    `SalesPrice`,
    `Image`
  )
VALUES (
    1,
    'Ryzen 5 5600',
    '6-Core 3.5GHz (4.4GHz Boost) Socket AM4 Desktop CPU',
    5000.00,
    3999.00,
    'Ryzen 5 5600.jpg'
  ),
  (
    2,
    'ASUS RTX 3070 TUF Gaming',
    '	TUF-RTX4070-12G-GAMING 12GB GDDR6X 192-Bit PCIe 4.0 Desktop\r\n			Graphics Card',
    16000.00,
    14999.00,
    'ASUS RTX 3070 TUF Gaming.jpg'
  ),
  (
    3,
    'Alienware AW3423DW',
    'UWQHD (3440x1440) 175Hz 0.1ms QD-OLED HDR400 G-Sync Ultimate\r\n							Curved Monitor',
    25000.00,
    22999.00,
    'Alienware AW3423DW.jpg'
  ),
  (
    4,
    'ASUS ROG MAXIMUS XII HERO WIFI',
    '-Intel Z490 ATX\r\n							- Intel LGA 1200 Socket\r\n							- Robust Power Solution\r\n							- Optimized Thermal Design',
    10000.00,
    4999.00,
    'ASUS ROG MAXIMUS XII HERO WIFI.jpg'
  ),
  (
    5,
    'G.Skill Trident Z5 NEO RGB 32GB',
    '- 32GB (2x16GB)\r\n							- DDR5-5600MHz\r\n							- 1.35V\r\n							- CL28\r\n							- 288-pin DIMM\r\n							- AMD EXPO Memory OC Profile',
    4000.00,
    2999.00,
    'G.Skill Trident Z5 NEO RGB 32GB.jpg'
  ),
  (
    6,
    'Fractal Design Torrent White Steel',
    '- Top-Tier Airflow Design\r\n		 - Steel Chassis\r\n		 - Clear Tempered Glass Panel\r\n	   - Full-Tower Form Factor',
    5000.00,
    3999.00,
    'Fractal Design Torrent White Steel.jpg'
  ),
  (
    11,
    'Palit GeForce RTX 4080 GameRock',
    '-RTX 4080 16GB GDDR6X \n- Base Clock: 2205MHz\n- Boost Clock: 2505MHz\n- 3rd Gen Ray Tracing Cores\n- 4th Gen Tensor Cores',
    30000.00,
    24999.00,
    'Palit GeForce RTX 4080 GameRock.jpg'
  ),
  (
    12,
    'Ryzen 9 7950X',
    '- AMD Ryzen 9 7950X 4.50GHz Processor (64MB L3 Cache)\r\n- Up to 5.70GHz Boost Clock\r\n- 16 Cores, 32 Threads\r\n- AMD 5nm Zen 4 Architecture',
    12000.00,
    10999.00,
    'Ryzen 9 7950X.jpg'
  ),
  (
    13,
    'Corsair Hydro RGB H100',
    '- H100 RGB All-In-One CPU Cooler\n- Corsair SP RGB ELITE PWM Fans\n- 240mm Radiator\n- Copper Cold Plate\n- Aluminum Radiator',
    2000.00,
    1499.00,
    'Corsair Hydro RGB H100.jpg'
  );
-- --------------------------------------------------------
--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Table structure for table `stock_levels`
--

CREATE TABLE `stock_levels` (
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `SubTotal` decimal(10, 2) NOT NULL,
  `Vat` decimal(10, 2) NOT NULL,
  `Shipping` decimal(10, 2) NOT NULL,
  `GrandTotal` decimal(10, 2) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`)
VALUES (
    1,
    'Admin',
    'admin@adminonly.com',
    '$2y$10$7xoimzd4vmxJBeuD3DFM9u6RV9Y0fiAh29nOQMQG/llE1PWbCtqEu'
  ),
  (
    2,
    'Test',
    'test@gmail.com',
    '$2y$10$NdHiCMDjitim.AwkcRTd2.Pfczj8e19KejuahmSNwb52aH/cYBE/a'
  ),
  (
    3,
    'Larry Low',
    'larrylow@gmail.com',
    '$2y$10$4LDfvd2p32wbgi2ZGLIPoOJQQXTRYIkzh1QMpr6TvVPWhTOvDy3/i'
  );
-- --------------------------------------------------------
--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
ADD PRIMARY KEY (`ItemID`);
--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk_oder_transaction` (`TransactionID`),
  ADD KEY `fk_orderhistory_userid` (`UserID`);
--
-- Indexes for table `stock_levels`
--
ALTER TABLE `stock_levels`
ADD PRIMARY KEY (`ItemID`);
--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `UserID` (`UserID`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);
--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
ADD PRIMARY KEY (`CartID`),
  ADD KEY `fk_cart_itemid` (`ItemID`),
  ADD KEY `fk_cart_userid` (`UserID`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 25;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
ADD CONSTRAINT `fk_oder_transaction` FOREIGN KEY (`TransactionID`) REFERENCES `transactions` (`TransactionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_userid` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderhistory_userid` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Constraints for table `stock_levels`
--
ALTER TABLE `stock_levels`
ADD CONSTRAINT `ItemID` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
ADD CONSTRAINT `fk_cart_itemid` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_userid` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
