-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 07:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goElectric`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `cartId` int(10) UNSIGNED NOT NULL,
  `customerId` int(5) UNSIGNED NOT NULL,
  `productId` int(5) UNSIGNED NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`cartId`, `customerId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(922, 1, 202, 'Zero 10X', 1500, 1, 'zero10x.jpg'),
(924, 1, 205, 'ANZO-06', 599, 1, 'image6.jpg'),
(925, 1, 201, 'Apollo Phantom', 2800, 1, 'apollo1.png'),
(926, 1, 206, 'SUV-Jupiter 2.0', 699, 1, 'image7.jpg'),
(928, 1, 208, 'Skatebolt 2nd Generation', 980, 1, 'image9.jpg'),
(929, 6, 203, 'NIU KQi3', 1100, 1, 'image3.jpg'),
(930, 6, 207, 'SYL-08', 630, 1, 'image8.jpg'),
(931, 5, 206, 'SUV-Jupiter 2.0', 699, 1, 'image7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `customerId` int(5) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customerId`, `firstname`, `lastname`, `email`, `password`, `reg_date`) VALUES
(1, 'diego', 'diaz', 'diego@email.com', '123', '2022-11-25 04:22:33'),
(2, 'olga', 'silva', 'olga@email.com', '123', '2022-11-25 04:28:38'),
(4, 'olga', 'Silva', 'olga@silva.com', 'abc', '2022-11-28 15:15:00'),
(5, 'fuchon', 'diaz', 'fuchon@email.com', '123', '2022-11-29 04:46:35'),
(6, 'jorge', 'silva', 'jorge@email.com', 'jorge', '2022-11-29 05:30:29'),
(7, 'oddie', 'diaz', 'oddie@email.com', 'qwe', '2022-11-29 05:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `orderId` int(5) UNSIGNED NOT NULL,
  `customerId` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`orderId`, `customerId`, `name`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(501, 1, 'Order Number 01', 'diego@email.com', 'abc', '2525 Cavendish Boulevard', '2', 1500, '2022/12/01', 'pending'),
(502, 2, 'Order Number 02 for Olga', 'olga@email.com', 'Debit Card', '1445 Sherbrooke East', '1', 3600, '2022/11/25', 'pending'),
(503, 1, 'Diego', 'diego@email.com', 'cash on delivery', 'flat no. 123 Cavendish Montreal Quebec Canada - 6', ',  ( 1 ),  ( 1 )', 3700, '02-Dec-2022', 'pending'),
(504, 1, 'Diego', 'diego@email.com', 'cash on delivery', 'flat no. 123 Queensland Montreal Quebec Canada - 6', ', Apollo Phantom ( 1 ), Gyrocopters Flash Pro Max ( 1 )', 3700, '02-Dec-2022', 'pending'),
(505, 1, 'Alexander', 'diego@email.com', 'paypal', 'flat no. 456 St Catherine Montreal Qc Canada - 11', ', Gyrocopters Flash Pro Max ( 1 )', 1200, '02-Dec-2022', 'pending'),
(506, 1, 'Diego Alexander', 'diego@email.com', 'credit card', 'flat no. 1212 Chumlee Av Montreal QC Canada - 1', ', Gyrocopters Flash Pro Max ( 1 )', 1200, '02-Dec-2022', 'pending'),
(507, 5, 'Fuchonsito', 'fuchon@email.com', 'paypal', 'flat no. 1212 Av 45th Laval QC Canada - 3', ', Zero 10X ( 1 )', 1500, '02-Dec-2022', 'pending'),
(508, 2, 'fsd', 'olga@email.com', 'credit card', 'flat no. asdf asdf dsfa asdf sadf - 0', ', NIU KQi3 ( 1 )', 1100, '05-Dec-2022', 'pending'),
(509, 1, 'Diego Diaz', 'diego@email.com', 'interac', 'flat no. 123 Sherbrooke 1 Montreal Quebec QC Canada - 123456', ', Skatebolt 2nd Generation ( 2 )', 1960, '12-Dec-2022', 'pending'),
(510, 7, 'Oddie', 'oddie@email.com', 'credit/debit card', '2020 Cavendish Blvd, . Quebec QC, Montreal. Canada - H3B 2R6', ', Skatebolt 2nd Generation ( 2 ), Apollo Phantom ( 1 )', 4760, '12-Dec-2022', 'pending'),
(511, 2, 'Olga de Diaz', 'olga@email.com', 'interac', '2525 Cavendish Blvd, . Quebec QC, Montreal. Canada - H123456', ', Zero 10X ( 3 ), SUV-Jupiter 2.0 ( 1 ), W-1118 ( 1 )', 5839, '12-Dec-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `productId` int(5) UNSIGNED NOT NULL,
  `productName` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`productId`, `productName`, `category`, `details`, `price`, `image`) VALUES
(201, 'Apollo Phantom', 'Scooter', 'This is a long range electric Scooter', 2800, 'apollo1.png'),
(202, 'Zero 10X', 'Scooter', 'Powerfull dual motor', 1500, 'zero10x.jpg'),
(203, 'NIU KQi3', 'Scooter', 'The ULTIMATE Commuter Scooter has everything you need: speed, save and easy to fold', 1100, 'image3.jpg'),
(204, 'Gyrocopters Flash Pro Max', 'Scooter', 'Make your daily commute easy, eco-friendly, and fun with the new Gyrocopters Flash Pro Max. Loaded with a powerful 500W brush motor, the Gyrocopter Flash Pro Max offers strong initial acceleration and power.', 1200, 'image4.jpg\r\n'),
(205, 'ANZO-06', 'Skateboard', 'The ANZO-06 600W Dual Motors Electric Skateboard/Longboard has an ultra-thin body with double driving force that can last up to 40KM. Enjoy skateboarding with a decent climbing ability speeding up to 35km/h', 599, 'image6.jpg'),
(206, 'SUV-Jupiter 2.0', 'Skateboard', 'Life is a lot with skateboarding! The SUV-Jupiter 2.0 is a double-motor 2000w electric skateboard that can accelerate up to 40km/h with a long battery capacity.', 699, 'image7.jpg'),
(207, 'SYL-08', 'Skateboard', 'Featured with dual 500w Hub motors. It is powerful enough to go anywhere. SKATEBOLT boards are installed with powerful batteries that drive the boards to go as far as 15-20 miles.', 630, 'image8.jpg'),
(208, 'Skatebolt 2nd Generation', 'Skateboard', 'Featured with dual 500w Hub motors. It is powerful enough to go anywhere. SKATEBOLT boards are installed with powerful batteries that drive the boards to go as far as 15-20 miles.', 980, 'image9.jpg'),
(209, 'W-1118', 'Skateboard', 'The W-1118  Electric Skateboard with 2200W Motor is the suitable skateboard for you as it can cruise up to 30km/h and has a battery life up to 20kms. It is very convenient in strolling on the streets or riding to your destination.', 640, 'image10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `FK_CartCustomer` (`customerId`),
  ADD KEY `FK_CartProduct` (`productId`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `FK_OrderCustomer` (`customerId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cartId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerId` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `orderId` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `productId` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `FK_CartCustomer` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`),
  ADD CONSTRAINT `FK_CartProduct` FOREIGN KEY (`productId`) REFERENCES `Products` (`productId`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `FK_OrderCustomer` FOREIGN KEY (`customerId`) REFERENCES `Customer` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
