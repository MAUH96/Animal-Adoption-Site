-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 08:00 PM
-- Server version: 5.5.62
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohama32_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals_dbs`
--

CREATE TABLE `animals_dbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mammal',
  `picture_count` bigint(20) NOT NULL DEFAULT '0',
  `availability` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals_dbs`
--

INSERT INTO `animals_dbs` (`id`, `user_id`, `name`, `date_of_birth`, `description`, `type`, `picture_count`, `availability`, `created_at`, `updated_at`) VALUES
(11, 1, 'blade', '2019-05-14', 'Details...', 'Fish', 0, 'yes', '2019-05-01 15:29:24', '2019-05-01 18:23:03'),
(12, 1, 'bladea', '2019-05-28', 'Details...', 'Mammal', 0, 'yes', '2019-05-01 15:33:56', '2019-05-01 15:33:56'),
(13, 1, 'Bilal', '2019-05-15', 'Details...', 'Mammal', 1, 'yes', '2019-05-01 15:35:23', '2019-05-01 15:35:23'),
(16, 1, 'Bilalaaa', '2019-05-22', 'Details...', 'Mammal', 1, 'yes', '2019-05-01 15:37:58', '2019-05-01 15:37:58'),
(17, 1, 'kanga', '2019-05-14', 'Details...', 'Fish', 2, 'yes', '2019-05-01 16:12:40', '2019-05-01 16:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `images_dbs`
--

CREATE TABLE `images_dbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images_dbs`
--

INSERT INTO `images_dbs` (`id`, `user_id`, `animal_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'bird_1556728523.jpg', '2019-05-01 15:35:23', '2019-05-01 15:35:23'),
(3, 1, 16, 'bird_1556728678.jpg', '2019-05-01 15:37:58', '2019-05-01 15:37:58'),
(4, 1, 17, 'bird_1556730760.jpg', '2019-05-01 16:12:40', '2019-05-01 16:12:40'),
(5, 1, 17, 'kang_1556730760.jpg', '2019-05-01 16:12:40', '2019-05-01 16:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_01_144931_create_users_dbs_table', 1),
(2, '2019_05_01_145101_password_resets_table', 1),
(3, '2019_05_01_145320_create_animals_dbs_table', 1),
(4, '2019_05_01_145500_create_requests_dbs_table', 1),
(5, '2019_05_01_145545_create_images_dbs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$aIZzrulIAoxhH5Mrv/F0tuI22HoeuPCrBoRk1YwbjDiDR0QsntH26', '2019-05-01 16:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `requests_dbs`
--

CREATE TABLE `requests_dbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `animal_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_dbs`
--

CREATE TABLE `users_dbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_dbs`
--

INSERT INTO `users_dbs` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 1, NULL, '$2y$10$xW3tBw9mA/neN31u9c7VXeE92ByYDG4vFOtYjs4xYwVz/JYZ./D7W', 'Vt4YWLYlMo8GGNOlU7NPZYbTbtMWHYAV93nT46Dr9anpLuFmIqfa5n2ZTh3B', '2019-05-01 14:47:45', '2019-05-01 14:47:45'),
(2, 'Emmet Reinger', 'pmacejkovic@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YvcDiRMy0f', '1983-09-29 08:44:12', '2004-04-28 22:38:23'),
(3, 'Ardella Boyer', 'murphy.hodkiewicz@example.org', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1zDjwv3to1', '1985-05-03 06:04:50', '1975-06-07 04:17:33'),
(4, 'Sally Harris', 'bbergnaum@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dknQbtHmnI', '2003-03-01 13:49:47', '1970-03-26 14:18:28'),
(5, 'Prof. Jesus Schmeler', 'shannon.hand@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gy5s96FtEK', '1985-03-29 16:08:15', '1977-12-29 08:16:58'),
(6, 'Roma Runte DVM', 'medhurst.haylee@example.org', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'odTCtJw8Gf', '2001-11-07 20:15:54', '2012-03-04 14:21:11'),
(7, 'Justus Jenkins', 'gilda.bergstrom@example.org', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uOTqau6aJZ', '1980-06-03 21:02:27', '1972-12-24 16:06:36'),
(8, 'Esmeralda Kunze', 'russel.hunter@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'umCGJE9YNk', '2006-06-15 10:04:54', '2007-06-25 00:55:03'),
(9, 'Dr. Courtney Olson DVM', 'nasir.ullrich@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UsHI0YFpbp', '1989-03-15 02:04:53', '1998-03-14 14:47:21'),
(10, 'Constantin Balistreri', 'qdickinson@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DrkEeql3zs', '1998-06-02 23:19:24', '1996-05-20 10:42:11'),
(11, 'Dr. Litzy Lowe', 'ijohns@example.org', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6p8fdyU9oJ', '2013-07-24 08:32:37', '1988-10-04 03:50:27'),
(12, 'Kody Ortiz', 'ghowell@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ufDJ9H4nDS', '2017-06-21 01:58:08', '2006-08-31 00:49:57'),
(13, 'Nelson Ryan', 'hilpert.markus@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'z9oSLggWtD', '1984-10-18 13:55:01', '1985-02-20 23:53:03'),
(14, 'Ruth Glover V', 'jackeline55@example.org', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LMMlaIWUqm', '1983-10-09 02:21:58', '1976-01-19 18:26:11'),
(15, 'Rebeka Paucek', 'toby.bahringer@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MJTjt7FpOH', '1972-09-27 01:51:38', '2014-03-27 23:42:31'),
(16, 'Prof. Jordon Sawayn V', 'damian.dickens@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UcQR6FAQCZ', '1979-02-16 05:02:45', '1991-10-02 03:57:13'),
(17, 'Leonora Veum II', 'murray.stephan@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kQKocZhkg1', '1970-01-15 05:41:40', '1973-05-19 15:42:26'),
(18, 'Sage Jacobson I', 'domenica53@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cpYRILnnrw', '1993-12-05 02:48:04', '2001-06-24 08:47:19'),
(19, 'Toy Mayer', 'nels79@example.net', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xWhQDrqQmY', '1985-04-14 12:25:48', '2019-03-13 20:45:02'),
(20, 'Vince Heaney', 'alberto81@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zLIlgDSLxd', '2011-07-19 00:19:54', '1988-11-02 14:50:53'),
(21, 'Julien Skiles', 'uhahn@example.com', 0, '2019-05-01 14:47:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'z1RkWI1RCf', '1997-06-03 20:21:43', '1975-06-23 02:17:55'),
(22, 'areeb', 'ulhassan@mauh.com', 0, NULL, '$2y$10$fKqcGTebSJ1kKi3h/bzQJOGzOPFtuDvzTRPdoxZbAIX5ZEbfLTfzC', NULL, '2019-05-01 15:00:39', '2019-05-01 15:00:39'),
(23, 'areeb1', 'areeb1@f.com', 0, NULL, '$2y$10$RV0SYBmiqwEylMk11PZ5i.jhu.Jn5lRgqFEk3aWmHBGJJnaqB4AVS', NULL, '2019-05-01 16:13:45', '2019-05-01 16:13:45'),
(24, 'Nora', 'nora@email.com', 0, NULL, '$2y$10$8mehy30kXpYl135sA9A5Oe7IIY0HhOPhUU4mFa3Os8P3gPYvGIkcO', NULL, '2019-05-01 18:02:27', '2019-05-01 18:02:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals_dbs`
--
ALTER TABLE `animals_dbs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `animals_dbs_name_unique` (`name`),
  ADD KEY `animals_dbs_user_id_foreign` (`user_id`);

--
-- Indexes for table `images_dbs`
--
ALTER TABLE `images_dbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_dbs_user_id_foreign` (`user_id`),
  ADD KEY `images_dbs_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `requests_dbs`
--
ALTER TABLE `requests_dbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_dbs_user_id_foreign` (`user_id`),
  ADD KEY `requests_dbs_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `users_dbs`
--
ALTER TABLE `users_dbs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_dbs_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals_dbs`
--
ALTER TABLE `animals_dbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images_dbs`
--
ALTER TABLE `images_dbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests_dbs`
--
ALTER TABLE `requests_dbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_dbs`
--
ALTER TABLE `users_dbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals_dbs`
--
ALTER TABLE `animals_dbs`
  ADD CONSTRAINT `animals_dbs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users_dbs` (`id`);

--
-- Constraints for table `images_dbs`
--
ALTER TABLE `images_dbs`
  ADD CONSTRAINT `images_dbs_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals_dbs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `images_dbs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users_dbs` (`id`);

--
-- Constraints for table `requests_dbs`
--
ALTER TABLE `requests_dbs`
  ADD CONSTRAINT `requests_dbs_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals_dbs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_dbs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users_dbs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
