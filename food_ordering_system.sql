-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.epizy.com
-- Generation Time: Apr 03, 2023 at 12:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33873418_black_ash`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `cust_id` int(11) NOT NULL,
  `order_num` int(32) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`cust_id`, `order_num`, `item_id`) VALUES
(2, 1, 8),
(2, 1, 12),
(2, 1, 17),
(2, 1, 19),
(2, 2, 17),
(2, 2, 24),
(2, 3, 23),
(3, 1353, 11),
(3, 1353, 14),
(3, 1353, 21),
(4, 1348, 6),
(4, 1348, 16),
(4, 1348, 21),
(21, 5, 23),
(21, 5, 30),
(21, 9, 7),
(21, 10, 22),
(21, 10, 23),
(21, 11, 7),
(21, 11, 18),
(21, 14, 8),
(21, 14, 21),
(21, 14, 28),
(21, 15, 18),
(21, 15, 20),
(21, 21, 25),
(21, 22, 27),
(21, 22, 30),
(21, 23, 8),
(21, 27, 16),
(21, 27, 25),
(21, 27, 26),
(21, 27, 27),
(21, 1333, 16),
(21, 1333, 21),
(21, 1335, 28),
(21, 1336, 7),
(21, 1338, 5),
(21, 1338, 8),
(21, 1338, 26),
(21, 1342, 14),
(21, 1342, 16),
(21, 1342, 19),
(21, 1342, 29),
(21, 1343, 8),
(21, 1343, 16),
(21, 1343, 17),
(21, 1343, 20),
(21, 1343, 24),
(21, 1347, 6),
(21, 1347, 20),
(21, 1347, 27),
(21, 1347, 28),
(21, 1349, 12),
(21, 1349, 17),
(21, 1349, 23),
(21, 1349, 29),
(21, 1352, 8),
(21, 1352, 21),
(21, 1352, 30),
(21, 1354, 11),
(21, 1354, 18),
(21, 1354, 25),
(21, 1354, 27),
(25, 1329, 5),
(25, 1329, 14),
(25, 1329, 31),
(25, 1330, 21),
(25, 1330, 24),
(25, 1330, 27),
(25, 1330, 30),
(25, 1330, 31),
(25, 1340, 16),
(25, 1340, 18),
(25, 1340, 20),
(25, 1340, 27),
(25, 1340, 31),
(301, 1339, 8),
(301, 1339, 19),
(302, 1341, 7),
(302, 1341, 8),
(302, 1341, 14),
(302, 1341, 16),
(302, 1341, 25),
(304, 1350, 18),
(304, 1350, 24),
(304, 1350, 25),
(305, 1351, 5),
(305, 1351, 8),
(305, 1351, 14),
(305, 1351, 16),
(305, 1351, 17),
(305, 1351, 19),
(305, 1351, 23),
(305, 1351, 30),
(305, 1351, 31);

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `mgr_id` int(11) NOT NULL,
  `order_num` int(32) NOT NULL,
  `chef_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `chef_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`chef_id`, `name`, `password`, `email`) VALUES
(1, 'Dane', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '123@gmail.com'),
(2, 'John Smith', 'a075d17f3d453073853f813838c15b8023b8c487038436354fe599c3942e1f95', 'john.smith@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `password`, `email`, `phoneNum`) VALUES
(1, 'Alice Brown', 'fa37578a260ec6e35b1f12948ded4bf15d812a299da0cc2db46432f67ea2208d', 'alice.brown@example.com', '555-1234-56'),
(2, 'Bob Jones', '15b93d6d8ddf685b62f3b865568c25cbdbebacef7a395ba4f5d0479e6c564051', 'bob.jones@example.com', '555-789-0123'),
(3, 'Charlie Green', 'd2d74290368ab4254205a0f39d4f96897c362a026437be57586d7a2c9d3f8fc3', 'charlie.green@example.com', '555-4567-890'),
(4, 'David Lee', '0f14089313b20c1723ec1d660b0aaa4f473cf5b321cd370f2d48b7bcf9a7b234', 'david.lee@example.com', '555-123-4567'),
(5, 'Elizabeth Smith', '8fdb8dad0e7dac643ee27c9c8a782aa2bc68856169a61afbcab0b28855353db3', 'elizabeth.smith@example.com', '555-8901-234'),
(21, 'salman06', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'salman@gmail.com', '0348394839'),
(23, 'User', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', 'user@gmail.com', '0323'),
(25, 'peacock', 'bfed620d66d7d88c891e1e9814faaa2a54b3d077adf2d59f18cb4cbe63cbeba1', 'kiteurao345@gmail.com', '034577389890'),
(29, '1234', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1234@gmail.com', '98392839238'),
(300, 'dummy', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'dummy@gmail.com', '38923829389'),
(301, 'izzy', '4322243181c1aa79b2bfdd4182e2e94f74053a2b83b5d43c503a66bb76e29bd5', 'i@gmail.com', '032000323'),
(302, 'Zain', '259dbe8cfc8c4e777535bef123dc63f55d75a24f80f7c53f46ed0c121a0f77a1', 'zain@gmail.com', '034934898439'),
(303, 'HashTest', '1addd3e6dffdb854157ff6c232778f4abf57ec04a824556b38b35e3e42cd8a5e', 'hash@gmail.com', '0345849589'),
(304, 'admin', '7932b2e116b076a54f452848eaabd5857f61bd957fe8a218faf216f24c9885bb', 'admin@gmail.com', '0836547444'),
(305, 'Samai', 'c21882af56a1c9bcb59931a834739cebf2c939537c9a742d5b115376a0b647cf', 'sami@aujla.com', '0382938293');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `num` int(32) NOT NULL,
  `total_bill` int(12) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `STATUS` varchar(32) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`num`, `total_bill`, `date_time`, `STATUS`) VALUES
(1, 3080, '2023-03-16 16:38:44', 'processing'),
(2, 770, '2023-03-16 16:41:55', 'new'),
(3, 80, '2023-03-16 16:52:23', 'new'),
(4, 80, '2023-03-16 16:56:02', 'pending'),
(5, 110, '2023-03-16 17:05:15', 'new'),
(9, 350, '2023-03-16 17:18:36', 'new'),
(10, 130, '2023-03-16 17:19:14', 'processing'),
(11, 530, '2023-03-16 17:20:46', 'new'),
(14, 1430, '2023-03-16 17:27:52', 'new'),
(15, 300, '2023-03-16 17:30:40', 'processing'),
(21, 180, '2023-03-16 17:41:29', 'new'),
(22, 60, '2023-03-16 17:50:19', 'pending'),
(23, 370, '2023-03-16 18:23:37', 'completed'),
(27, 1050, '2023-03-16 18:35:58', 'pending'),
(28, 1050, '2023-03-16 18:36:32', 'new'),
(1300, 1330, '2023-03-16 18:41:11', 'new'),
(1329, 630, '2023-03-17 01:18:31', 'new'),
(1330, 3070, '2023-03-17 01:23:54', 'new'),
(1333, 1270, '2023-03-17 05:09:53', 'completed'),
(1335, 800, '2023-03-17 05:17:03', 'processing'),
(1336, 1750, '2023-03-17 05:28:16', 'pending'),
(1338, 1550, '2023-03-17 10:49:31', 'pending'),
(1339, 820, '2023-03-18 06:11:22', 'new'),
(1340, 2020, '2023-03-18 14:07:45', 'pending'),
(1341, 4570, '2023-03-19 14:13:13', 'completed'),
(1342, 3170, '2023-03-19 16:58:41', 'pending'),
(1343, 4440, '2023-03-19 17:12:19', 'pending'),
(1344, 600, '2023-03-28 05:05:32', 'new'),
(1345, 770, '2023-03-28 05:06:28', 'pending'),
(1346, 530, '2023-03-28 05:07:30', 'pending'),
(1347, 1590, '2023-03-28 05:31:06', 'processing'),
(1348, 5110, '2023-03-28 13:26:00', 'new'),
(1349, 6640, '2023-03-29 04:33:50', 'completed'),
(1350, 480, '2023-03-29 17:24:09', 'pending'),
(1351, 17010, '2023-03-31 00:15:36', 'complete'),
(1352, 2360, '2023-04-01 12:24:34', 'processing'),
(1353, 1630, '2023-04-02 06:45:22', 'pending'),
(1354, 2250, '2023-04-03 09:06:49', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `price`) VALUES
(5, 'Beef Shawarma Wrap', 'Juicy slices of beef, served in a warm wrap with veggies.', 280),
(6, 'Doner Shawarma Wrap', 'Tender slices of chicken or lamb, served in a warm wrap with veggies.', 300),
(7, 'Double Trouple Wrap', 'Double the meat, double the flavor! A wrap loaded with chicken or beef.', 350),
(8, 'Grill Shawarma Wrap', 'Grilled chicken or beef, served in a warm wrap with veggies.', 370),
(11, 'Special Burger', 'A special burger with all the fixings.', 450),
(12, 'Double Decker', 'Two juicy beef patties, stacked with cheese and veggies.', 430),
(14, 'Nuggets', 'Crispy and flavorful chicken nuggets, perfect for snacking.', 200),
(16, 'Biryani', 'A spicy rice dish with meat, spices, and herbs.', 290),
(17, 'Nihari', 'A slow-cooked stew made with beef or lamb and spices.', 650),
(18, 'Haleem', 'A thick porridge made with lentils, meat, and spices.', 180),
(19, 'Chapli Kabab', 'A spicy minced meat patty made with ground beef or lamb.', 80),
(20, 'Seekh Kabab', 'A long, cylindrical meat kabab made with ground beef or lamb.', 120),
(21, 'Chicken Karahi', 'A spicy chicken curry cooked in a wok-style karahi.', 980),
(22, 'Samosa', 'A crispy pastry filled with spiced vegetables or meat.', 50),
(23, 'Aloo Paratha', 'A flatbread stuffed with spiced mashed potatoes.', 80),
(24, 'Chana Masala', 'A spicy chickpea curry with tomatoes and onions.', 120),
(25, 'Aloo Keema', 'A spicy dish made with minced meat and potatoes.', 180),
(26, 'Daal Chawal', 'A simple but tasty dish of lentils and rice.', 160),
(27, 'Tandoori Roti', 'Perfectly crisp on the outside and soft on the inside, to satisfy your cravings.', 30),
(28, 'Lassi', 'A sweet yogurt drink often served with spicy food.', 80),
(29, 'Kheer', 'A sweet rice pudding with nuts and spices.', 280),
(30, 'Gulab Jamun', 'A sweet syrupy dessert made from milk solids.', 30),
(31, 'Salad', 'Fresh green vegetables and herbs served with a light dressing.', 150);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `name`, `password`, `email`) VALUES
(1, 'John Smith', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'john.smith@example.com'),
(2, 'Fatima Ahmed', 'fbb4a8a163ffa958b4f02bf9cabb30cfefb40de803f2c4c346a9d39b3be1b544', 'fatima.ahmed@example.com'),
(3, 'Michael Chen', 'd6ab7a4ba46690f83961f28f7d537f4f8db309d75febd5656355561917b84cf8', 'michael.chen@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_quantity`
--

CREATE TABLE `order_quantity` (
  `order_num` int(32) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_quantity`
--

INSERT INTO `order_quantity` (`order_num`, `item_id`, `quantity`) VALUES
(1, 8, 2),
(1, 12, 3),
(1, 17, 1),
(1, 19, 5),
(2, 17, 1),
(2, 24, 1),
(3, 23, 1),
(5, 23, 1),
(5, 30, 1),
(9, 7, 1),
(10, 22, 1),
(10, 23, 1),
(11, 7, 1),
(11, 18, 1),
(14, 8, 1),
(14, 21, 1),
(14, 28, 1),
(15, 18, 1),
(15, 20, 1),
(21, 25, 1),
(22, 27, 1),
(22, 30, 1),
(23, 8, 1),
(27, 16, 1),
(27, 25, 2),
(27, 26, 1),
(27, 27, 8),
(1329, 5, 1),
(1329, 14, 1),
(1329, 31, 1),
(1330, 21, 2),
(1330, 24, 3),
(1330, 27, 10),
(1330, 30, 10),
(1330, 31, 1),
(1333, 16, 1),
(1333, 21, 1),
(1335, 28, 10),
(1336, 7, 5),
(1338, 5, 1),
(1338, 8, 3),
(1338, 26, 1),
(1339, 8, 2),
(1339, 19, 1),
(1340, 16, 2),
(1340, 18, 4),
(1340, 20, 1),
(1340, 27, 10),
(1340, 31, 2),
(1341, 7, 3),
(1341, 8, 3),
(1341, 14, 5),
(1341, 16, 3),
(1341, 25, 3),
(1342, 14, 1),
(1342, 16, 9),
(1342, 19, 1),
(1342, 29, 1),
(1343, 8, 1),
(1343, 16, 4),
(1343, 17, 3),
(1343, 20, 4),
(1343, 24, 4),
(1347, 6, 2),
(1347, 20, 5),
(1347, 27, 5),
(1347, 28, 3),
(1348, 6, 3),
(1348, 16, 1),
(1348, 21, 4),
(1349, 12, 5),
(1349, 17, 5),
(1349, 23, 5),
(1349, 29, 3),
(1350, 18, 1),
(1350, 24, 1),
(1350, 25, 1),
(1351, 5, 1),
(1351, 8, 41),
(1351, 14, 1),
(1351, 16, 1),
(1351, 17, 1),
(1351, 19, 2),
(1351, 23, 1),
(1351, 30, 1),
(1351, 31, 1),
(1352, 8, 1),
(1352, 21, 2),
(1352, 30, 1),
(1353, 11, 1),
(1353, 14, 1),
(1353, 21, 1),
(1354, 11, 3),
(1354, 18, 2),
(1354, 25, 2),
(1354, 27, 6);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(32) NOT NULL,
  `account_num` varchar(14) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `account_num`, `date`) VALUES
(1, '29102910910219', '2023-03-16 17:18:36'),
(2, 'Muhammad Salma', '2023-03-16 17:27:52'),
(3, 'null', '2023-03-16 17:40:03'),
(4, '123456789', '2023-03-16 17:40:55'),
(5, '123456789', '2023-03-16 17:41:29'),
(6, '123456789', '2023-03-16 17:50:19'),
(7, '212', '2023-03-16 18:23:37'),
(8, '849348-84938-2', '2023-03-16 18:24:33'),
(9, '', '2023-03-16 18:25:12'),
(10, '7849-8948380-2', '2023-03-16 18:29:23'),
(11, '3902-909392-27', '2023-03-16 18:35:58'),
(12, '3902-909392-27', '2023-03-16 18:36:32'),
(13, '28392', '2023-03-16 18:38:13'),
(14, '493094-823928-', '2023-03-16 18:41:11'),
(15, '820', '2023-03-17 01:18:31'),
(16, 'Muhammad Sami ', '2023-03-17 01:23:54'),
(17, '3458-98392032-', '2023-03-17 01:34:56'),
(18, 'Aujla Saab ', '2023-03-17 05:07:00'),
(19, '8898', '2023-03-17 05:09:53'),
(20, '9090', '2023-03-17 05:14:19'),
(21, 'hamza', '2023-03-17 05:17:03'),
(22, '8493eio', '2023-03-17 05:28:16'),
(23, '2580-399302120', '2023-03-17 10:33:55'),
(4500, '290-993209201-', '2023-03-17 10:49:31'),
(4501, '87923234', '2023-03-18 06:11:22'),
(4502, '340101-1829189', '2023-03-18 14:07:45'),
(4503, '3237283-323382', '2023-03-19 14:13:13'),
(4504, 'hh88', '2023-03-19 16:58:41'),
(4505, '66262566929726', '2023-03-19 17:12:19'),
(4506, '123-4567-78990', '2023-03-28 05:31:06'),
(4507, '1289120-390239', '2023-03-28 13:26:00'),
(4508, '456437-7886678', '2023-03-29 04:33:50'),
(4509, '19919191915144', '2023-03-29 17:24:09'),
(4510, '4dfg', '2023-03-31 00:15:36'),
(4511, '78392-3293029-', '2023-04-01 12:24:34'),
(4512, '128192-2891-28', '2023-04-02 06:45:22'),
(4513, '313-21829812-3', '2023-04-03 09:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `cust_id` int(11) NOT NULL,
  `order_num` int(32) NOT NULL,
  `payment_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`cust_id`, `order_num`, `payment_id`) VALUES
(3, 1353, 4512),
(4, 1348, 4507),
(21, 0, 14),
(21, 28, 3902),
(21, 29, 13),
(21, 1331, 17),
(21, 1332, 18),
(21, 1333, 19),
(21, 1334, 20),
(21, 1335, 21),
(21, 1336, 22),
(21, 1337, 23),
(21, 1338, 4500),
(21, 1342, 4504),
(21, 1343, 4505),
(21, 1347, 4506),
(21, 1349, 4508),
(21, 1352, 4511),
(21, 1354, 4513),
(25, 1329, 15),
(25, 1330, 16),
(25, 1340, 4502),
(301, 1339, 4501),
(302, 1341, 4503),
(304, 1350, 4509),
(305, 1351, 4510);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`cust_id`,`order_num`,`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_num` (`order_num`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`mgr_id`,`order_num`,`chef_id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chef_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order_quantity`
--
ALTER TABLE `order_quantity`
  ADD PRIMARY KEY (`order_num`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`cust_id`,`order_num`,`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `num` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1355;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4514;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adds`
--
ALTER TABLE `adds`
  ADD CONSTRAINT `adds_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adds_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `adds_ibfk_3` FOREIGN KEY (`order_num`) REFERENCES `food_order` (`num`) ON DELETE CASCADE;

--
-- Constraints for table `order_quantity`
--
ALTER TABLE `order_quantity`
  ADD CONSTRAINT `order_quantity_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `order_quantity_ibfk_2` FOREIGN KEY (`order_num`) REFERENCES `food_order` (`num`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
