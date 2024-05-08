-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< Updated upstream
-- Generation Time: May 09, 2024 at 12:34 AM
=======
-- Generation Time: May 09, 2024 at 12:31 AM
>>>>>>> Stashed changes
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_full_name` varchar(255) NOT NULL,
  `address_email` varchar(255) NOT NULL,
  `address_mobile` varchar(12) NOT NULL,
  `full_address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address_full_name`, `address_email`, `address_mobile`, `full_address`, `city`, `state`, `pincode`, `country`, `address_created_on`) VALUES
(12, 2, 'Sohil', 'zaidvora9@gmail.com', '9033594669', '302, Rangoonwala Palace, Sunni borwad, Bhatia Dharmshala Road', 'Junagadh', 'Gujarat', '362001', 'India', '2024-05-02 18:27:47'),
(13, 3, 'Sohil', 'sohil@gmail.com', '7383063130', 'Basera Apartment, New Ghanchivada', 'Junagadh', 'Gujarat', '362001', 'India', '2024-05-03 15:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `category_id`, `brand_created_on`) VALUES
(6, 'Mi', 6, '2024-04-24 17:40:32'),
(7, 'Realme', 6, '2024-04-24 17:40:39'),
(8, 'Samsung', 6, '2024-04-24 17:40:48'),
(9, 'Sony', 8, '2024-04-24 17:41:01'),
(10, 'Panasonic', 8, '2024-04-24 17:41:17'),
(11, 'Oneplus', 8, '2024-04-24 17:41:50'),
(12, 'Xiomi', 8, '2024-04-27 18:43:40'),
(13, 'LG', 9, '2024-04-27 18:46:14'),
(14, 'Whilpool', 9, '2024-04-27 18:46:26'),
(15, 'Godrej', 9, '2024-04-27 18:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_created_on`) VALUES
(6, 'Mobile', '2024-04-24 17:40:18'),
(8, 'TV', '2024-04-24 17:19:26'),
(9, 'Refrigerator', '2024-04-27 18:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_mobile` varchar(12) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `contact_name`, `contact_email`, `contact_mobile`, `contact_subject`, `contact_message`) VALUES
(1, 'SOHIL', 'SOHILVORA2000@GMAIL.COM', '07383063130', 'asdasa', 'kjhsdkjhf'),
(2, 'SOHIL', 'SOHILVORA2000@GMAIL.COM', '7383063130', 'I want some more Products', 'kdhkdfjghdfjkg'),
(3, 'SOHIL', 'SOHILVORA2000@GMAIL.COM', '7383063130', 'I want some more Products', 'skdhfksjdhf');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `order_number`, `user_id`, `address_id`, `product_id`, `qty`, `product_price`, `total`, `payment_method`, `status`, `created_on`, `updated_on`) VALUES
(1, '95786', 2, 6, 19, 1, '37999', '37999', 'upi', 'cancelled', '', '2024-05-06 07:00:25'),
(2, '95786', 2, 6, 20, 1, '41999', '41999', 'upi', 'cancelled', '', '2024-05-06 07:00:25'),
(3, '81945', 2, 11, 18, 1, '77990', '77990', 'cod', 'cancelled', '', '2024-05-06 07:03:51'),
(4, '81945', 2, 11, 19, 2, '37999', '75998', 'cod', 'cancelled', '', '2024-05-06 07:03:51'),
(5, '11215', 2, 12, 16, 1, '45999', '45999', 'upi', 'returned', '', '2024-05-06 07:04:01'),
(6, '11215', 2, 12, 15, 9, '499', '4491', 'upi', 'returned', '', '2024-05-06 07:04:01'),
(7, '11215', 2, 12, 17, 2, '139999', '279998', 'upi', 'returned', '', '2024-05-06 07:04:01'),
(8, '11215', 2, 12, 21, 1, '42999', '42999', 'upi', 'returned', '', '2024-05-06 07:04:01'),
(9, '11215', 2, 12, 18, 1, '77990', '77990', 'upi', 'returned', '', '2024-05-06 07:04:01'),
(10, '11215', 2, 12, 23, 1, '31990', '31990', 'upi', 'returned', '', '2024-05-06 07:04:01'),
(11, 'ORD030520242052', 3, 13, 15, 1, '499', '499', 'cod', 'returned', '', '2024-05-05 17:39:59'),
(12, 'ORD040520240126453', 3, 13, 24, 1, '23990', '23990', 'cod', 'cancelled', '04-05-2024 01:26:45', '2024-05-05 17:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_description` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_slug` text NOT NULL,
  `product_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `brand_id`, `category_id`, `product_image`, `product_slug`, `product_created_on`) VALUES
(15, 'Samsung Galaxy A54 5G', 499, '50MP(OIS)+12MP+5MP Triple camera setup - 50MP (F1.8) Main Camera with OIS + 12MP (F2.2) Ultra wide camera + 5MP (F2.4) depth camera | 32MP (F2.2) front camera\r\n16.31 centimeters (6.4-inch) FHD+ Super AMOLED display, FHD+ resolution with 1080 x 2340 pixels , 401 PPI with 16M colours\r\nAndroid 13, v13.0 operating system with Exynos1380 2.4GHz,2GHz Octa-Core processor\r\nA54 5G has an IP67 certification and Gorilla Glass 5 (front & back) for carefree usage\r\n5000 mAh battery (Non-removable) with Super Fast Charging', 8, 6, '20240427083010.jpg', 'samsung-galaxy-a54-5g', '2024-05-01 19:59:34'),
(16, 'Samsung Galaxy A55 5G', 45999, 'DISPLAY - 16.83 Centimeters (6.6\"Inch) Super AMOLED Display with 19.5:9 Aspect Ratio, FHD+ Resolution with 2340 x 1080 Pixels , 389 PPI with 16M Colors and 120Hz Refresh Rate, Corning Gorilla Glass Victus+\r\nCAMERA - Nightography | Super HDR Video | 50MP (F1.8) Main Wide Angle Camera + 12MP (F2.2) Ultra Wide Camera + 5MP (F2.4) Macro Camera | 32MP (F2.2) Front Camera | Video Maximum Resolution of Ultra HD 4K (3840 x 2160) @30fps\r\nINTERFACE & PROCESSOR - Latest Android 14 Operating System having One UI 6.1 platform with Samsung Exynos 1480 Processor | 2.75GHz, 2GHz 4nm Octa-Core Processor\r\nBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable) with C-Type Super Fast Charging (25W Charging Support)\r\nOS UPDATES & SECURITY - Get upto 4 Generations of AndroidOS Upgrades & 5 Years of Security Updates with Samsung Galaxy A55. Includes 1 Year Manufacturer Warranty for Device and 6 Months for In-Box Accessories.', 8, 6, '20240427083211.jpg', 'samsung-galaxy-a55-5g', '2024-04-27 18:32:11'),
(17, 'Samsung Galaxy S24 Ultra 5G', 139999, 'Samsung Galaxy S24 Ultra 5G\r\n', 8, 6, '20240427083929.jpg', 'samsung-galaxy-s24-ultra-5g', '2024-04-27 18:39:30'),
(18, 'Sony Bravia 164 cm (65 inches)', 77990, 'Resolution: 4K Ultra HD (3840 x 2160) | Refresh Rate: 60 Hertz | 178 Degree wide viewing angle\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound : 20 Watts Output | Open Baffle Speaker| Dolby Audio | Clear Phase | eARC Input\r\nSmart TV Features: Google TV, Watchlist, Voice Search, Google Play, Chromecast Built-In, Netflix, Amazon Prime Video, Additional Features: Apple Airplay, Apple Homekit, Alexa | Supported Apps: Netflix, Amazon Prime Video, Disney+ Hotstar, Sony Liv, Zee5, Voot, Jio Cinema & many More\r\nDisplay: X1 4K Processor | 4K HDR | Live Colour| 4K X Reality Pro | Motion Flow XR100', 9, 8, '20240427084131.jpg', 'sony-bravia-164-cm-65-inches-', '2024-04-27 18:41:31'),
(19, 'Sony Bravia 108 cm (43 inches)', 37999, 'Resolution: 4K Ultra HD (3840 x 2160) | Refresh Rate: 60 Hertz | 178 Degree wide viewing angle\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound : 20 Watts Output | Open Baffle Speaker| Dolby Audio | Clear Phase\r\nSmart TV Features: Google TV | Watchlist | Voice Search | Google Play | Chromecast | Netflix | Amazon Prime Video | Additional Features: Apple Airplay | Apple Homekit |Alexa\r\nDisplay: X1 4K Processor | 4K HDR | Live Colour| 4K X Reality Pro | Motion Flow XR100', 9, 8, '20240427084310.jpg', 'sony-bravia-108-cm-43-inches-', '2024-04-27 18:43:10'),
(20, 'Xiaomi 125 cm (50 inches)', 41999, 'Resolution : 4K Ultra HD (3840 x 2160) | Refresh Rate : 60 Hertz | Viewing angle : 178 degrees\r\nConnectivity: Dual Band Wi-Fi | 3 HDMI | 2 USB ports| Optical port| AV port| Ethernet port | 3.5 mm jack | Bluetooth 5.0\r\nSound: 40 Watts Output | Dolby Atmos | DTS-X\r\nSmart TV Features: Google TV, Built-In WiFi, Chromecast built-in, 2GB RAM, 16GB ROM, Supported Apps: Netflix, Prime Video, YouTube, Zee5, etc., Ambient Light Sensor, Far Field Microphone, ALLM (Auto Low Latency Mode), Hands Free Voice Control and Google Assistant Operation\r\nDisplay: 4K Dolby Vision IQ | HDR10+ | HDR 10 | HLG | Reality Flow MEMC | Vivid Picture Engine 2 | Wide Colour Gamut- DCI-P3 94% (typ)', 12, 8, '20240427084501.jpg', 'xiaomi-125-cm-50-inches-', '2024-04-27 18:45:01'),
(21, 'Panasonic 139 cm (55 inches) ', 42999, 'Resolution : 4K Ultra HD (3840 x 2160) | Refresh Rate : 60 Hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu-ray speakers or gaming console | 2 USB ports to connect hard drives or other USB devices | Bluetooth | Built-in Wi-Fi\r\nSound: 20 Watts Output | Dolby Digital | Audio Booseter+\r\nSmart TV Features: Google TV | In-Built WiFi | Screen Mirroring | 2 GB RAM | 16 GB ROM | Supported Apps: Netflix, Prime Video, YouTube, Zee5, etc. | Google Assistant Operation\r\nDisplay: 4K HDR | Wide Viewing Angle | Micro Dimming | Noise Reduction | Hexa Chroma Drive | 4K Upscaling | 4K Studio Color Engine', 10, 8, '20240427084751.jpg', 'panasonic-139-cm-55-inches-', '2024-04-27 18:54:42'),
(22, 'LG 240 L 3 GL-S292RDSX', 26990, 'Frost Free Refrigerator Less than 300 L: Auto defrost function to prevent ice-build up\r\nCapacity 240 L: Suitable for families with 2 to 3 members I freezer capacity: 59 L, fresh food capacity: 181 L\r\nEnergy Rating 3 Star: Energy efficiency\r\nManufacturer warranty: 1 year on product, 10 years on compressor T&C\r\nSmart inverter compressor – energy efficient, less noise & more durable\r\nSpecial Features: Convertible – Freezer to fridge conversion offers you more space to suit your needs, Multi Air Flow - Distribute and circulate cool air to every corner for proper and even cooling; Temperature Control- I Micom, Smart Diagnosis – Detects problem automatically\r\n', 13, 9, '20240427084950.jpg', 'lg-240-l-3-gl-s292rdsx', '2024-04-27 18:49:50'),
(23, 'Whirlpool 308 L 3 Star', 31990, 'The star rating changes are as per BEE guidelines on 1st Jan 2023\r\nFrost Free Double Door Refrigerator - Intellisense Inverter Technology\r\nCapacity: 308 liters suitable for medium to large sized family\r\nEnergy Rating : 3 Star with Toughened Glass\r\nMicroblock Technology : Prevention of up to 99% bacterial growth with Microblock Technology\r\nSpecial Features: Touch UI Inside Refrigerator, Get Ice In Up 85 Minutes, 40% Faster Bottle Cooling, Anti-Odour Action, Coldest Freezer As -24C, 99.9% Bacterial Growth Prevention', 14, 9, '20240427085158.jpg', 'whirlpool-308-l-3-star', '2024-04-27 18:52:53'),
(24, 'Godrej 244 L 3 Star', 23990, 'Frost Free Refrigerator : Auto defrost function to prevent ice-build up\r\nCapacity 244 L : Suitable for families of 2 to 3 members\r\nEnergy Efficiency: 3 star : Energy Efficiency (Please refer energy label on product page or contact brand for more details)\r\nManufacturer Warranty: 10 Years Compressor Warranty, 1 Year Comprehensive Warranty\r\nEnergy Efficient Inverter Compressor: The energy efficient inverter compressor, which is not only quieter but is also a variable speed compressor, as it adjusts the cooling as per the refrigerator operation.\r\nStorage Description : Fresh food capacity : 194 L | Freezer capacity : 50 L | shelves : 2 | Shelf type : Toughened Glass | Vegetable Storage Space : 27 L', 15, 9, '20240427085416.jpg', 'godrej-244-l-3-star', '2024-04-27 18:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `u_type` varchar(6) NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `email`, `password`, `mobile`, `gender`, `u_type`, `registered_on`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', '9033594669', 'male', 'admin', '2024-04-29 16:43:14'),
(2, 'Zaid', 'zaidvora9@gmail.com', '1234', '9033594669', 'male', 'user', '2024-05-06 10:56:24'),
(3, 'Sohil', 'sohil@gmail.com', '123', '7383063130', 'male', 'user', '2024-05-03 15:21:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
