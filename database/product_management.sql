-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2026 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `createdAt` datetime NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `quantity`, `description`, `status`, `createdAt`, `image`) VALUES
(1, 'Analog Watch', 'watches', 9600.00, 100, 'Two time zones', 'Available', '2026-08-20 18:03:19', '1788881964_watch 3.webp'),
(2, 'Lacoste Capbreton Qtz Basic White Round Dial Men Watch', 'watches', 9000.00, 100, 'Best watch for regular use', 'Available', '2026-08-20 22:00:27', '1788881821_watch 2.webp'),
(3, 'Tommy Hilfiger Multifunction Grey Dial Grey Stainless Steel Strap Analog Watch', 'watches', 4500.00, 100, 'Best watch for men and women ', 'Available', '2026-08-24 12:41:43', '1788881315_watch 1.webp'),
(4, 'Allin Solly Analog Watch', 'watches', 2200.00, 50, 'Casual Watch', 'Out of Stock', '2026-09-08 21:12:52', '1788882172_watch 4.webp'),
(5, 'Stylish Analog Rubbers Strap Women And Girls Watch Analog Watch', 'watches', 3000.00, 80, 'Casual watch', 'Available', '2026-09-08 21:19:22', '1788882562_women watch 1.webp'),
(6, 'Round Rose Gold Analog Watch', 'watches', 10000.00, 50, 'Stylish and elegant design, \r\nComfortable to wear', 'Available', '2026-09-08 21:22:02', '1788882722_women watch 2.webp'),
(7, 'Analog Watch', 'watches', 15000.00, 10, 'Perfect for daily & party wear, \r\nGreat for gifting', 'Available', '2026-09-08 21:23:43', '1788882823_women watch 3.webp'),
(8, 'Women Black Analog Watch Combo with Crystal Bracelet Set Analog Watch', 'watches', 120000.00, 5, 'Stylish and elegant design, Comfortable to wear, Premium look', 'Available', '2026-09-08 21:26:01', '1788882961_women watch 4.webp'),
(9, 'California Independence Almonds 2*250 Grams', 'Groceries', 520.00, 100, 'Rich in protein, fiber, and healthy nutrients', 'Available', '2026-09-08 21:32:10', '1788883330_almonds.webp'),
(10, 'Goan Cashews, Premium Dryfruits Kaju Cashews , 1000 g', 'Groceries', 990.00, 40, 'Rich in healthy nutrients and perfect for daily snacking', 'Available', '2026-09-08 21:34:54', '1788883494_coshew.webp'),
(11, 'Pista, 100 g', 'Groceries', 258.00, 40, 'Premium quality, fresh and crunchy pistachios', 'Available', '2026-09-08 21:37:12', '1788883632_pista.webp'),
(12, 'Mix Dry Fruit', 'Groceries', 405.00, 100, 'Mix Dry Fruits', 'Available', '2026-09-08 21:38:52', '1788883732_mix dry fruits.webp'),
(13, 'Men Tshirt , S, M, L', 'men clothes', 10000.00, 100, 'Black Men tshirt for regular use', 'Available', '2026-09-08 21:42:34', '1788883954_tshirt.webp'),
(14, 'Men Tshirt, S, M, L, XL, XXL', 'men clothes', 1200.00, 40, 'Light Pink Tshir for men regular use', 'Available', '2026-09-08 21:43:25', '1788884005_ptsirt1.webp'),
(15, 'Back Print Tshirt, Oversize', 'men clothes', 3000.00, 30, 'Best backprint tshirt for men ', 'Available', '2026-09-08 21:45:42', '1788884142_tshir 1.webp'),
(16, 'Back Print Tshirt , Oversize', 'men clothes', 4000.00, 20, 'Best backprint tshirt for men and regular use', 'Available', '2026-09-08 21:46:40', '1788884200_tshirt 2.webp'),
(17, 'Boys Regular Mid Rise Blue Jeans, 38, 40, 42', 'men clothes', 1000.00, 10, 'Best jeans for regular use', 'Available', '2026-09-08 21:51:18', '1788884478_jeans 1.webp'),
(18, 'Men Tapered Fit Mid Rise Black Jeans, 38, 40', 'men clothes', 3000.00, 5, 'Best for regular use', 'Available', '2026-09-08 21:53:14', '1788884594_jeans 2.webp'),
(19, 'Men Loose Fit Mid Rise Grey Jeans', 'men clothes', 5000.00, 40, 'Best for Loose Fit', 'Available', '2026-09-08 21:54:53', '1788884693_jeans 3.webp'),
(20, 'Men Loose Fit Mid Rise White Jeans', 'men clothes', 6000.00, 30, 'Regular use White Jeans for men', 'Available', '2026-09-08 21:56:09', '1788884769_jeans 4.webp'),
(21, 'Women A-line Black, Brown Ankle Length Dress, S, M, L, XL', 'women clothes', 10000.00, 10, 'Best for party wear ', 'Available', '2026-09-08 21:58:45', '1788884925_women 1.webp'),
(22, 'Women A-line Maroon Below Knee Dress', 'women clothes', 2000.00, 20, 'Elegant A-line design,Beautiful maroon color', 'Available', '2026-09-08 22:00:49', '1788885049_women 2.webp'),
(23, 'Women Fit and Flare Black Midi/Calf Length Dress', 'women clothes', 12000.00, 90, 'Elegant black color,Stylish fit & flare design', 'Available', '2026-09-08 22:03:00', '1788885180_women 3.webp'),
(24, 'Saree', 'women clothes', 10000.00, 73, 'Elegant and traditional design,Beautiful and stylish look,Comfortable fabric,Perfect for festivals, parties & special occasions,Great choice for gifting', 'Available', '2026-09-08 22:05:15', '1788885315_women 4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `password`, `createdAt`, `role`) VALUES
('Raj Singh', 1, 'Raj@123', '2026-10-09 16:15:08', 'admin'),
('Sunny ', 2, 'Sunny@123', '2026-10-09 16:24:26', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
