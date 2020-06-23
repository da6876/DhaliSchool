-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 08:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da_school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_admin_user`
--

CREATE TABLE `ds_admin_user` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_userName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_gender` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Female|1=Male',
  `admin_phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_user_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ds_admin_user`
--

INSERT INTO `ds_admin_user` (`admin_id`, `admin_userName`, `admin_password`, `admin_name`, `admin_gender`, `admin_phone`, `admin_email`, `address`, `admin_image`, `admin_user_type`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2, '01684924439', 'admin@da.com.bd', 'Dhaka,Bangladesh', 'ImageFiles/UserImage/hKYFO_yH0HH_admin_img.jpg', '', NULL, NULL),
(2, 'dhaliabir', 'eed41fdc0b203ad68c2442ec1f2071d6', 'Dhali Abir', 1, '01955375749', 'dhaliabir@gmail.com', 'Dhaka,Bangladesh', 'No Image', '', NULL, NULL),
(3, 'audhali', '8b6232df74c27c649d36916147b9c5bb', 'A U Dhali', 1, '01712740406', 'audhali836@gmail.com', 'Kollanpur,Mirpur,Dhaka,Bangladesh', 'ImageFiles/UserImage/hKYFO_yH0HH_admin_img.jpg', '', NULL, NULL),
(4, 'aaaa', '202cb962ac59075b964b07152d234b70', 'Test', 2, '23232323', 'adasd@gmail.com', 'asdasdasddas', 'ImageFiles/UserImage/RZp4J_QqPpH_admin_img.jpg', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ds_user_type`
--

CREATE TABLE `ds_user_type` (
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `user_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ds_user_type`
--

INSERT INTO `ds_user_type` (`user_type_id`, `user_type_name`, `user_type_status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'A', NULL, NULL),
(2, 'Editor', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dyn_menu`
--

CREATE TABLE `dyn_menu` (
  `id` int(11) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dyn_menu`
--

INSERT INTO `dyn_menu` (`id`, `label`, `link_url`, `parent_id`) VALUES
(1, 'Home', 'home', NULL),
(2, 'About', 'about', NULL),
(3, 'Class', '#', NULL),
(4, 'One Class', 'classone', 3),
(5, 'Two Class', 'classtwo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu_status` int(11) NOT NULL DEFAULT 0,
  `menu_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`menu_id`, `menu_name`, `menu_link`, `sub_menu_status`, `menu_status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, 1, NULL, NULL),
(4, 'About', '/about', 1, 1, NULL, NULL),
(5, 'asd', 'asd', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_05_095004_create_sub_menu_table', 1),
(2, '2020_05_05_095556_create_main_menu_table', 1),
(3, '2020_05_07_121315_create_ds_admin_user_table', 2),
(4, '2020_05_12_162518_create_ds_user_type', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `sub_menu_id` int(10) UNSIGNED NOT NULL,
  `menus_id` int(11) NOT NULL,
  `sub_menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`sub_menu_id`, `menus_id`, `sub_menu_name`, `sub_menu_link`, `sub_menu_status`, `created_at`, `updated_at`) VALUES
(1, 4, 'sss', 'ss', 1, NULL, NULL),
(2, 4, 'About One', 'aboutone', 1, NULL, NULL),
(3, 4, 'About One', 'aboutone', 1, NULL, NULL),
(4, 5, 'asd', 'asd', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_admin_user`
--
ALTER TABLE `ds_admin_user`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `ds_admin_user_admin_username_unique` (`admin_userName`);

--
-- Indexes for table `ds_user_type`
--
ALTER TABLE `ds_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `dyn_menu`
--
ALTER TABLE `dyn_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`sub_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_admin_user`
--
ALTER TABLE `ds_admin_user`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ds_user_type`
--
ALTER TABLE `ds_user_type`
  MODIFY `user_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dyn_menu`
--
ALTER TABLE `dyn_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `sub_menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
