-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 11:07 AM
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
(15, 'Godrej', 9, '2024-04-27 18:53:14'),
(16, 'Lloyd', 12, '2024-05-15 17:55:47'),
(17, 'Lenovo', 11, '2024-05-15 17:56:36'),
(18, 'IFB', 10, '2024-05-15 18:19:45'),
(19, 'Haier', 10, '2024-05-15 18:19:55');

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
(9, 'Refrigerator', '2024-04-27 18:46:03'),
(10, 'WashingMachine', '2024-05-16 04:00:21'),
(11, 'Laptop', '2024-05-15 17:54:59'),
(12, 'Ac', '2024-05-15 17:55:12');

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
(15, 'Samsung Galaxy A54 5G', 35499, '50MP(OIS)+12MP+5MP Triple camera setup - 50MP (F1.8) Main Camera with OIS + 12MP (F2.2) Ultra wide camera + 5MP (F2.4) depth camera | 32MP (F2.2) front camera\r\n16.31 centimeters (6.4-inch) FHD+ Super AMOLED display, FHD+ resolution with 1080 x 2340 pixels , 401 PPI with 16M colours\r\nAndroid 13, v13.0 operating system with Exynos1380 2.4GHz,2GHz Octa-Core processor\r\nA54 5G has an IP67 certification and Gorilla Glass 5 (front & back) for carefree usage\r\n5000 mAh battery (Non-removable) with Super Fast Charging', 8, 6, '20240427083010.jpg', 'samsung-galaxy-a54-5g', '2024-05-11 19:32:37'),
(16, 'Samsung Galaxy A55 5G', 45999, 'DISPLAY - 16.83 Centimeters (6.6\"Inch) Super AMOLED Display with 19.5:9 Aspect Ratio, FHD+ Resolution with 2340 x 1080 Pixels , 389 PPI with 16M Colors and 120Hz Refresh Rate, Corning Gorilla Glass Victus+\r\nCAMERA - Nightography | Super HDR Video | 50MP (F1.8) Main Wide Angle Camera + 12MP (F2.2) Ultra Wide Camera + 5MP (F2.4) Macro Camera | 32MP (F2.2) Front Camera | Video Maximum Resolution of Ultra HD 4K (3840 x 2160) @30fps\r\nINTERFACE & PROCESSOR - Latest Android 14 Operating System having One UI 6.1 platform with Samsung Exynos 1480 Processor | 2.75GHz, 2GHz 4nm Octa-Core Processor\r\nBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable) with C-Type Super Fast Charging (25W Charging Support)\r\nOS UPDATES & SECURITY - Get upto 4 Generations of AndroidOS Upgrades & 5 Years of Security Updates with Samsung Galaxy A55. Includes 1 Year Manufacturer Warranty for Device and 6 Months for In-Box Accessories.', 8, 6, '20240427083211.jpg', 'samsung-galaxy-a55-5g', '2024-04-27 18:32:11'),
(17, 'Samsung Galaxy S24 Ultra 5G', 139999, 'Samsung Galaxy S24 Ultra 5G\r\n', 8, 6, '20240427083929.jpg', 'samsung-galaxy-s24-ultra-5g', '2024-04-27 18:39:30'),
(18, 'Sony Bravia 164 cm (65 inches)', 77990, 'Resolution: 4K Ultra HD (3840 x 2160) | Refresh Rate: 60 Hertz | 178 Degree wide viewing angle\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound : 20 Watts Output | Open Baffle Speaker| Dolby Audio | Clear Phase | eARC Input\r\nSmart TV Features: Google TV, Watchlist, Voice Search, Google Play, Chromecast Built-In, Netflix, Amazon Prime Video, Additional Features: Apple Airplay, Apple Homekit, Alexa | Supported Apps: Netflix, Amazon Prime Video, Disney+ Hotstar, Sony Liv, Zee5, Voot, Jio Cinema & many More\r\nDisplay: X1 4K Processor | 4K HDR | Live Colour| 4K X Reality Pro | Motion Flow XR100', 9, 8, '20240427084131.jpg', 'sony-bravia-164-cm-65-inches-', '2024-04-27 18:41:31'),
(19, 'Sony Bravia 108 cm (43 inches)', 37999, 'Resolution: 4K Ultra HD (3840 x 2160) | Refresh Rate: 60 Hertz | 178 Degree wide viewing angle\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound : 20 Watts Output | Open Baffle Speaker| Dolby Audio | Clear Phase\r\nSmart TV Features: Google TV | Watchlist | Voice Search | Google Play | Chromecast | Netflix | Amazon Prime Video | Additional Features: Apple Airplay | Apple Homekit |Alexa\r\nDisplay: X1 4K Processor | 4K HDR | Live Colour| 4K X Reality Pro | Motion Flow XR100', 9, 8, '20240427084310.jpg', 'sony-bravia-108-cm-43-inches-', '2024-04-27 18:43:10'),
(20, 'Xiaomi 125 cm (50 inches)', 41999, 'Resolution : 4K Ultra HD (3840 x 2160) | Refresh Rate : 60 Hertz | Viewing angle : 178 degrees\r\nConnectivity: Dual Band Wi-Fi | 3 HDMI | 2 USB ports| Optical port| AV port| Ethernet port | 3.5 mm jack | Bluetooth 5.0\r\nSound: 40 Watts Output | Dolby Atmos | DTS-X\r\nSmart TV Features: Google TV, Built-In WiFi, Chromecast built-in, 2GB RAM, 16GB ROM, Supported Apps: Netflix, Prime Video, YouTube, Zee5, etc., Ambient Light Sensor, Far Field Microphone, ALLM (Auto Low Latency Mode), Hands Free Voice Control and Google Assistant Operation\r\nDisplay: 4K Dolby Vision IQ | HDR10+ | HDR 10 | HLG | Reality Flow MEMC | Vivid Picture Engine 2 | Wide Colour Gamut- DCI-P3 94% (typ)', 12, 8, '20240427084501.jpg', 'xiaomi-125-cm-50-inches-', '2024-04-27 18:45:01'),
(21, 'Panasonic 139 cm (55 inches) ', 42999, 'Resolution : 4K Ultra HD (3840 x 2160) | Refresh Rate : 60 Hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu-ray speakers or gaming console | 2 USB ports to connect hard drives or other USB devices | Bluetooth | Built-in Wi-Fi\r\nSound: 20 Watts Output | Dolby Digital | Audio Booseter+\r\nSmart TV Features: Google TV | In-Built WiFi | Screen Mirroring | 2 GB RAM | 16 GB ROM | Supported Apps: Netflix, Prime Video, YouTube, Zee5, etc. | Google Assistant Operation\r\nDisplay: 4K HDR | Wide Viewing Angle | Micro Dimming | Noise Reduction | Hexa Chroma Drive | 4K Upscaling | 4K Studio Color Engine', 10, 8, '20240427084751.jpg', 'panasonic-139-cm-55-inches-', '2024-04-27 18:54:42'),
(22, 'LG 240 L 3 GL-S292RDSX', 26990, 'Frost Free Refrigerator Less than 300 L: Auto defrost function to prevent ice-build up\r\nCapacity 240 L: Suitable for families with 2 to 3 members I freezer capacity: 59 L, fresh food capacity: 181 L\r\nEnergy Rating 3 Star: Energy efficiency\r\nManufacturer warranty: 1 year on product, 10 years on compressor T&C\r\nSmart inverter compressor – energy efficient, less noise & more durable\r\nSpecial Features: Convertible – Freezer to fridge conversion offers you more space to suit your needs, Multi Air Flow - Distribute and circulate cool air to every corner for proper and even cooling; Temperature Control- I Micom, Smart Diagnosis – Detects problem automatically\r\n', 13, 9, '20240427084950.jpg', 'lg-240-l-3-gl-s292rdsx', '2024-04-27 18:49:50'),
(23, 'Whirlpool 308 L 3 Star', 31990, 'The star rating changes are as per BEE guidelines on 1st Jan 2023\r\nFrost Free Double Door Refrigerator - Intellisense Inverter Technology\r\nCapacity: 308 liters suitable for medium to large sized family\r\nEnergy Rating : 3 Star with Toughened Glass\r\nMicroblock Technology : Prevention of up to 99% bacterial growth with Microblock Technology\r\nSpecial Features: Touch UI Inside Refrigerator, Get Ice In Up 85 Minutes, 40% Faster Bottle Cooling, Anti-Odour Action, Coldest Freezer As -24C, 99.9% Bacterial Growth Prevention', 14, 9, '20240427085158.jpg', 'whirlpool-308-l-3-star', '2024-04-27 18:52:53'),
(24, 'Godrej 244 L 3 Star', 23990, 'Frost Free Refrigerator : Auto defrost function to prevent ice-build up\r\nCapacity 244 L : Suitable for families of 2 to 3 members\r\nEnergy Efficiency: 3 star : Energy Efficiency (Please refer energy label on product page or contact brand for more details)\r\nManufacturer Warranty: 10 Years Compressor Warranty, 1 Year Comprehensive Warranty\r\nEnergy Efficient Inverter Compressor: The energy efficient inverter compressor, which is not only quieter but is also a variable speed compressor, as it adjusts the cooling as per the refrigerator operation.\r\nStorage Description : Fresh food capacity : 194 L | Freezer capacity : 50 L | shelves : 2 | Shelf type : Toughened Glass | Vegetable Storage Space : 27 L', 15, 9, '20240427085416.jpg', 'godrej-244-l-3-star', '2024-04-27 18:54:16'),
(25, 'Lloyd 1 Ton  ( GLS12V5FWGIL)', 34990, 'Lloyd Split AC with Inverter Compressor: AC with variable speed compressor which automatically adjusts power depending on room temperature & heat load. Convertible / adjustable with 5 cooling modes through remote control to operate in different tonnages for different cooling needs (20% to 100% capacity)Capacity: 1.0 ton suitable for medium size rooms up to 120 square feet & Ambient temperature: 52°C with 4-Way Air Swing', 16, 12, '20240515080523.jpg', 'lloyd-1-ton-gls12v5fwgil-', '2024-05-15 18:05:23'),
(26, 'Lloyd 1.5 Ton ( GLS18I3FWAGC)', 32990, 'Energy Rating: 3 Star, Annual Energy Consumption: 956.79, ISEER Value: 3.84, please refer to energy label on the product page;Manufacturer Warranty: 1 Year on the product, 5 Years on Component (including PCB) and 10 Years on the Compressor, please refer to company website for further details; Blue Fins Evaporator Coils: Corrosion Resistance Coated Blue Fins Evaporator Coils Ensures better cooling performance, require low maintenance and enhances durability of the product;Key Features: Cools even at Ambient temperature of 52°C with 2 Way Air Swing, Stabilizer Free Operation within 140 - 280 voltage range; Hidden LED Display; Noise Level: IDU - 32 (DB)', 16, 12, '20240515081057.jpg', 'lloyd-1-5-ton-gls18i3fwagc-', '2024-05-15 18:10:57'),
(27, 'Lenovo IdeaPad Slim 3', 46440, 'Processor: AMD Ryzen 7 5700U | Speed: 1.8 GHz (Base) - 4.3 GHz (Max) | 8 Cores | 16 Threads | 8MB Cache\r\nDisplay: 15.6\" FHD (1920x1080)| TN Technology | 300Nits Brightness | Anti Glare || Memory: 16GB RAM DDR4-3200 || Storage: 512 GB SSD\r\nOS and Software: Windows 11 Home 64 | Office Home and Student 2021 | Xbox GamePass Ultimate 3-month subscription*; Graphics: Integrated AMD Radeon Graphics || Design: 1.99 cm Thin and 1.65 kg Light', 17, 11, '20240515081357.jpg', 'lenovo-ideapad-slim-3', '2024-05-15 18:13:57'),
(28, 'Lenovo ThinkPad E14', 71799, 'ThinkPad Reliability tested on 12 MIL-STD-810H Methods and 22 Procedures | Body Material: Aluminium (Top) | Built to withstand rugged usage and can handle accidental knocks, drops, and even spills\r\nProcessor: 13th Gen Intel Core i5-1335U G5 processor | 10 Cores | 12 Threads | Speed Upto 4.6 Ghz | 12 Mb Cache | Memory: 16GB DDR4 3200 MHz, dual-channel capable upgradable upto 40GB | Storage: 512GB SSD M.2 upgradable up to 1TB', 17, 11, '20240515081646.jpg', 'lenovo-thinkpad-e14', '2024-05-15 18:16:46'),
(29, 'Lenovo ThinkBook 16', 58990, 'ThinkBook 16 Reliability tested on 12 MIL-STD-810H Methods and 22 Procedures | Body Material: Aluminium (top) | Surface Treatment: Anodizing sandblasting | Built to withstand rugged usage and can handle accidental knocks, drops, and even spills\r\nProcessor: 13th Gen Intel Core i5-1335U processor | 10 Cores | 12 Threads | Speed Upto 4.6 Ghz | 12Mb Cache | Memory: 16GB DDR5 5200 MHz, dual-channel capable upgradable up to 64GB | Storage: 512GB SSD M.2 Upgradable up to 2TBDisplay: 16\" (40.64 cm) WUXGA IPS Antiglare | Graphics: Intel UHD Graphics comes with DirectX 12.1 enables amazing graphics| HD Audio, Realtek ALC3287 codec, Stereo speakers, 2W x2, Dolby Audio | SD card reader | Supports up to 4 independent displays\r\nPorts: 1x USB 3.2 Gen 1, 1x USB 3.2 Gen 1 (Always On), 1x USB-C 3.2 Gen 2 (support data transfer, Power Delivery 3.0 and DisplayPort 1.4), 1x Thunderbolt 4, 1x HDMI 2.1, 1x SD Card reader, 1x Ethernet (RJ-45), 1x Headphone / microphone combo jack (3.5mm)', 17, 11, '20240515081828.jpg', 'lenovo-thinkbook-16', '2024-05-15 18:18:28'),
(30, 'IFB 6 Kg 5 Star', 23990, 'ully-automatic Front load washing machine: Best Wash Quality, Energy and Water efficient. Capacity 6 Kg: Suitable for 3 – 4 members\r\nPowered By AI : A neural network-based algorithm detects fabric type and weight. It then optimises the wash—duration, water level, wash actions and the level of gentleness needed.\r\nEnergy Rating 5 Star: Best in class efficiency\r\nTRISHIELD PROTECTION : IFB washers come with India’s best warranty 4 years machine warranty + 10 years Motor Warranty + 10 years Spares Support\r\n1000 RPM: higher spin speeds helps in faster drying', 18, 10, '20240515082130.jpg', 'ifb-6-kg-5-star', '2024-05-15 18:21:30'),
(31, 'IFB 8 Kg 5 Star', 34990, 'Fully-automatic Front load washing machine: Best Wash Quality, Energy and Water efficient\r\nCapacity:8 kg\r\nEnergy star rating 5 Star: Best in class efficiency\r\nManufacturer Warranty :IFB washers come with Indiaâ€s best warranty 4 Years Comprehensive Warranty + 10 years Motor Warranty + 10 years Spares Support\r\n1200 RPM: higher spin speeds helps in faster drying\r\n12 Wash Programmes: Baby Wear, Cradlewash for Delicates, Baby Wear, Mixed Soiled+, Cotton Normal, Synthetic, Woollens, Sports Wear/ Fitness Wear, Express Wash, Cotton Eco Plus, Rinse+Spin, Spin Dry/Drain', 18, 10, '20240515082240.jpg', 'ifb-8-kg-5-star', '2024-05-15 18:22:40'),
(32, 'Haier 8 Kg 5 star', 29990, 'Fully Automatic Front Load washing machine: Affordable with great wash quality, ease of use, has both washing and drying functions\r\nCapacity - 8 Kg : Suitable for large families\r\nEnergy Rating 5 Star : Best in class efficiency | Energy consumption – 0.0411* KWh/kg/cycle & Water Consumption: 6.25 L/Kg/Cycle (Please refer BEE label for more information)\r\nManufacturer Warranty: 5 years on product and 12 years on motor\r\n1200 RPM: Higher spin speeds helps in faster wash and drying; 40 min cycle time for avg. load\r\nWash Programs: 15 No.of Programs - Cotton: Soiled cotton clothes, Cotton Large: optimized washing performance for large amount of laundry, Mix: cleans a variety of different fabrics at the same time', 19, 10, '20240515082414.jpg', 'haier-8-kg-5-star', '2024-05-15 18:24:14'),
(33, 'Haier 8 Kg 5 star fully automatic', 23849, 'Fully-automatic top load washing machine withIn Built Heater Oceanus Wave Technology: Affordable with great wash quality, Easy to use; Has both washing and drying functions\r\nCapacity - 8 Kg : Suitable for large families\r\nEnergy Rating 5 Star : Best in class efficiency | Energy consumption – 0.0087* KWh/kg/cycle & Water Consumption: 16.07 L/Kg/Cycle (Please refer BEE label for more information)\r\nManufacturer Warranty: 5 years on product and 12 years on motor\r\n780 RPM: Higher spin speeds helps in faster wash and drying; 40 min cycle time for avg. load', 19, 10, '20240515082604.jpg', 'haier-8-kg-5-star-fully-automatic', '2024-05-15 18:26:04');

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
(2, 'Zaid', 'zaidvora9@gmail.com', '123', '9033594669', 'male', 'user', '2024-05-16 05:25:30'),
(3, 'Sohil', 'sohilvora2000@gmail.com', '123', '7383063130', 'male', 'user', '2024-05-11 19:33:00');

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
