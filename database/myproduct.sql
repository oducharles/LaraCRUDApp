-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2018 at 04:50 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `fname`, `lname`, `adress`, `created_at`, `updated_at`) VALUES
(1, 'jhn', 'k,dl', 'nkdw', '2018-06-21 13:16:27', '2018-06-21 13:16:27'),
(2, 'Roberto', 'Carlos', 'London', '2018-06-23 09:40:28', '2018-06-23 09:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_06_19_142536_create_details_table', 1),
(2, '2018_06_21_121510_create_products_table', 1),
(3, '2018_06_21_135456_admin_table_migration', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_detail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_type`, `p_price`, `p_detail`, `user_id`, `created_at`, `updated_at`) VALUES
(47, 'Toshiba Satelites Laptop', 'Computers', '15000', 'files/CLvnS8trNkB7CMW9FPb0XAo8jRCfyvlXaKPs7pwP.jpeg', 7, '2018-06-27 01:29:10', '2018-06-27 01:29:10'),
(46, 'Samsungs S280', 'Electronics', '750000', 'files/2Y1fyCE7tXpFf81Bttnz46s2YALadQJhLuZMGa0G.jpeg', 6, '2018-06-27 01:26:57', '2018-06-27 01:26:57'),
(45, 'Matresses', 'Beddings', '85000', 'files/hpGyYl1Rh0BvuTkTCIJGorvY2pAlBbYX5rqEY8la.pdf', 3, '2018-06-27 01:22:36', '2018-06-27 01:24:29'),
(44, 'Black books', 'Stationaries', '10000', 'files/nNqlYdMtHL7MmZnGM2IzxWTryWVIdaci7yCuol9r.pdf', 5, '2018-06-26 13:40:58', '2018-06-26 13:40:58'),
(43, 'Washing Machine', 'Electronics', '1700000', 'files/2OqEo5VOx15a4r7x5Fxzm6ja2hQwX39K9ADDFVqn.pdf', 4, '2018-06-26 09:21:12', '2018-06-26 09:21:12'),
(42, 'Ruled papers', 'Stationaries', '17000', 'files/geibuoKkuQZOVxdzlsmqVsddFTjuPTtIwkuChUdn.pdf', 1, '2018-06-26 09:11:35', '2018-06-27 01:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ocl', 'ocl@gmail.com', '$2y$10$oMzaHtXnk3xEiRTqoOgGZ.a8vZOatyeTbtOuLQWLNVWwKAxIqq2e6', 'acuwP0HYITdkZ7nr7OL4hnE1adT3s5KQdFKRhpQGQzXdVlcMlyDU2Abdbeaw', '2018-06-25 08:37:15', '2018-06-25 08:37:15'),
(2, 'Charles', 'charles1@gmail.com', '$2y$10$80IbzUw/uDgy.KWL9H93xOylY9OKKF7v/PcZMsrwQLPQpLjQ.tbRq', 'pnrFvI0Dordl2r73xAvClP1zzEJbptkw5B6wUNfXwEZvBmNFQaDyk8rltszs', '2018-06-26 07:17:11', '2018-06-26 07:17:11'),
(3, 'Administrator', 'admin@admin.com', '$2y$10$bD7pOptYdOQ8IXVKfZRpEOIsDFIHezRJD18AK9E7HRYrgSd4nqIpC', 'zU5BsffvJJ3fRHFXqzjRDwxlLIGndnX4p0w236YeMV6WamduU0fbLM9sbJ9k', '2018-06-26 08:42:49', '2018-06-26 08:42:49'),
(4, 'charlie', 'charlie@charlie.com', '$2y$10$TZVgiz/dpSY7Ri/j8VTkROxleuyoOnzl/CMKNzPEVnPLzveElVzXO', 'zwHqaiTKpD5wu4mvEpTFDE0vpR57Yzk6RalQFr7DoFtxTFuqtGX3fVMpB8aJ', '2018-06-26 09:20:37', '2018-06-26 09:20:37'),
(5, 'james', 'james@james.com', '$2y$10$9cbn2mjQfgWoBzfoMNYfNeEc9d3qYlLS9BNLuALn12c4ctZmO57ZG', 'K0XdwXYzUttrOGAbE2X7P71JbJyRK1SnrLmtGSKfRlJ2KYdZGEcIJ0CW6KD0', '2018-06-26 13:40:06', '2018-06-26 13:40:06'),
(6, 'charlie king', 'charlie@king.com', '$2y$10$5HxJE8/gKMso.gZfwEilH.epE3QpBTv.UKWhAJk/1IeL8jWDQsJI.', '91taaw3xXlYswMTrnbEYxuDM3REZiAaDmQAC7OfXB6DGTeZHOaXkO0K729La', '2018-06-27 01:25:57', '2018-06-27 01:25:57'),
(7, 'James Karta', 'james@karta.com', '$2y$10$y/B9MMiKZRlrCkzhpaGMUO9Jah2bGM7i/llG.8dTTYuhmpRcSRGG.', 'Ds6BuQAnDBZNedqkXw6weO4MCRl5ShJgAGU8RDbJyrjBNmmXg1OQkUFCnK4b', '2018-06-27 01:28:33', '2018-06-27 01:28:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
