-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 06:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tabel`
--

CREATE TABLE `admin_tabel` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Vegetables'),
(2, 'Fruits'),
(3, 'Bakery'),
(4, 'Meat'),
(5, 'Dairy'),
(6, 'Snacks'),
(9, 'Alcohol');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subCategory_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `subCategory_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES
(1, 'Fresh Mango', 'Mangoes are one of the most popular fruit in the world.', 'mango, fresh mango, fruits, fresh fruits', 0, 3, 'mango1.jpg', 'mango2.jpg', '4', '2023-12-12 14:35:16', 'true'),
(2, 'Frozen Strawberry', 'Strawberries are sweet and Perfect for smoothies or milkshakes.', 'strawberry, fruit, frozen fruit', 0, 4, 'strawberry1.jpg', 'strawberry2.jpg', '5', '2023-12-12 14:39:24', 'true'),
(4, 'Spinach', 'Spinach a healthy vegetable full of vitamins A, C, B6, E, K, and folate.', 'spinach, vegetable, fresh vegetable', 0, 1, 'spinach.jpg', 'spinach2.jpg', '4', '2023-12-12 14:33:53', 'true'),
(5, 'Frozen Carrot', 'Carrots are best salads, stews, soups, sauces, and cakes.', 'carrot, frozen carrot, vegetable, frozen vegetable', 1, 2, 'carrot2.jpg', 'carrot1.jpg', '2', '2023-12-12 13:37:40', 'true'),
(6, 'Bread', 'Freshly baked bread for your everyday breakfast.', 'bread, breakfast, baked, bakery', 3, 6, 'bread1.jpg', 'bread2.jpg', '5', '2023-11-14 19:18:02', 'true'),
(7, 'Chocolate Cookies', 'Freshly baked cookies with infusion of chocolate chips for snacks.', 'bakery, cookie, breakfast', 3, 6, 'cookie1jpg.jpg', 'cookie2.jpg', '6', '2023-12-12 13:37:48', 'true'),
(8, 'Red Velvet Cake', 'Best Red Velvet Cake! Ultra moist, buttery, tender, and soft cake.', 'cake, red velvet, bakery', 3, 7, 'cake1.jpg', 'cake2.jpg', '7', '2023-12-12 13:38:05', 'true'),
(9, 'Apple Pie', 'Classic Apple Pie with an irresistible homemade apple pie filling.!', 'pie, apple, bakery', 3, 7, 'pie1.jpg', 'pie2.jpg', '4', '2023-12-12 13:38:13', 'true'),
(10, 'Chicken', 'Fresh raw chicken, tasty and ready to cook for your dinner.', 'chicken, meat, ', 4, 8, 'chicken1.jpg', 'chicken2.jpg', '9', '2023-11-14 19:41:18', 'true'),
(11, 'Beef', 'High-quality beef - firm, velvety, fine-grained,  and well-marbled.', 'beef, meat', 4, 9, 'beef1.jpg', 'beef2.jpg', '13', '2023-11-14 21:07:13', 'true'),
(14, 'Coca Cola', 'Coca-Cola, a sweetened soft drink and the best selling soda in the world.', 'coca cola, soft drink, dairy', 5, 10, 'coca1.jpg', 'coca2.jpg', '2', '2023-12-12 13:38:20', 'true'),
(15, 'Milk ', 'Milk is an excellent source of calcium and other essential nutrients.', 'milk, dairy', 5, 11, 'milk1.jpg', 'mik2.jpg', '5', '2023-11-14 19:48:31', 'true'),
(16, 'Doritos', 'Doritos are cheesy and tasty for your snacks time.', 'doritos, snacks, chips', 6, 12, 'dorito2.jpg', 'dorito1.jpg', '3', '2023-11-14 19:50:39', 'true'),
(18, 'Gummies', 'Sweet and Sour gummies for snack time.', 'snacks, candy, gummies', 6, 13, 'candy1.jpg', 'candy2.jpg', '3', '2023-12-12 14:53:17', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subCategory_id` int(11) NOT NULL,
  `subCategory_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subCategory_id`, `subCategory_title`) VALUES
(1, 'Fresh Vegetables'),
(2, 'Frozen Vegetables'),
(3, 'Fresh Fruits'),
(4, 'Frozen Fruits'),
(6, 'Bread & Cookies'),
(7, 'Cakes & Pie'),
(8, 'Chicken'),
(9, 'Beef'),
(10, 'Soft Drinks'),
(11, 'Milk'),
(12, 'Chips'),
(13, 'Candy'),
(14, 'Beer');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subCategory_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
