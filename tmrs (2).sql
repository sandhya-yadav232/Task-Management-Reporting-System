-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 08:50 AM
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
-- Database: `tmrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin@gmail.com', '$2y$12$XEz.G25xeIXnREWVRqf3Lu5rWVI52i9AsPWi/O9tz37wWCm8Gw20S', '2025-11-25 06:04:08', '2025-11-25 06:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_works`
--

CREATE TABLE `daily_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `assign_date` date NOT NULL,
  `deadline` date NOT NULL,
  `today_task` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_work_reports`
--

CREATE TABLE `daily_work_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `assign_date` date NOT NULL,
  `employee_update` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_work_reports`
--

INSERT INTO `daily_work_reports` (`id`, `employee_id`, `date`, `project_name`, `assign_date`, `employee_update`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-11-26', 'TMRS', '2025-11-06', 'dfghkjlk', NULL, '2025-11-26 02:44:36', '2025-11-26 02:44:36'),
(2, 1, '2025-11-26', 'TMRS', '2025-11-06', 'Today', NULL, '2025-11-26 02:57:44', '2025-11-26 02:57:44'),
(3, 3, '2025-11-28', 'HRM', '2025-11-06', 'Today I done all the proper working functions', NULL, '2025-11-27 23:43:11', '2025-11-27 23:43:11'),
(5, 1, '2025-12-03', 'TMRS', '2025-11-18', 'Today, I design logo for my project', 'reports/yAl6CCznSZSjxvIjZibkFxXWalZBNAr2knoAbhHi.png', '2025-12-03 00:05:38', '2025-12-03 00:05:38'),
(6, 1, '2025-12-09', 'TMRS', '2025-12-01', 'gjhkl;', NULL, '2025-12-09 00:10:16', '2025-12-09 00:10:16'),
(7, 1, '2025-12-09', 'TMRS', '2025-12-01', 'sdfvcbg', NULL, '2025-12-09 01:09:26', '2025-12-09 01:09:26'),
(8, 1, '2025-12-10', 'HRM', '2025-12-10', 'This is my daily work update', 'reports/Dymb1JGSLzmPW91r1p9hRioy45a3ZD3y6ILQLdOt.png', '2025-12-10 04:21:07', '2025-12-10 04:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `gender`, `department`, `joining_date`, `password`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Sandhya', 'sandhya@pushpendratechnology.com', '6935874123', 'Female', 'IT', '2025-10-16', '$2y$12$HBkDCDueidQvZfsxTfS3iuRGf2k1UiDrzWVb6wQhsZCMPg94pScv2', 'Kanpur', '2025-11-25 23:25:24', '2025-12-16 02:11:51'),
(3, 'Muskan', 'muskan@gmail.com', '69358741236', 'Female', 'IT', '2025-07-29', '$2y$12$4hdFOPIguEQKRkMyDR.Vr.beY5jWZLoH72J3SdVd3J4skmM18i5de', 'Bhopal', '2025-11-26 23:40:11', '2025-11-26 23:40:11'),
(4, 'Sambhav', 'sambhav@gmail.com', '69358741236', 'Male', 'IT', '2025-11-02', '$2y$12$MCZRsLadWw0py3fgqRKzJeRW77IRTJ2/XvJ103vhzPAxyiIrJrtoa', 'Patna', '2025-11-28 05:26:24', '2025-11-28 05:26:24'),
(5, 'Salbi', 'salbi@pushpendratechnology.com', '69358741236', 'Female', 'IT', '2025-07-30', '$2y$12$dQnVTYzam34ch5xovyfsceN0d3n6BUZy9FwQnjlxCtQlORkFj3P1.', 'Patna', '2025-12-01 01:12:05', '2025-12-01 01:12:05'),
(11, 'Saumya', 'saumya@gmail.com', '69358741236', 'Female', 'HR', '2025-12-01', '$2y$12$tgyVQ9CSSD.672mM5SFKguUyEEuBGjtuGDMxJ6Lg.3V2Okfi/3Cym', 'patna\r\npatna', '2025-12-04 00:10:57', '2025-12-04 00:10:57'),
(12, 'Kanik', 'k@gmail.com', '69358741236', 'Male', 'HR', '2025-12-03', '$2y$12$eSq3rlUDUtcspGsu9rN.bOYJZF1k9KM5euOdC.5iGNAusTsSGVUsy', 'Kanpur', '2025-12-09 00:20:50', '2025-12-09 00:20:50'),
(13, 'Gauri', 'g@gmail.com', NULL, NULL, 'IT', '2025-12-04', '$2y$12$MeE.ca./zR91BwBBYxb0KuOCA1b1xPXB8wR.ELiNeKk7BnpIYqj1m', NULL, '2025-12-09 01:25:46', '2025-12-09 01:25:46'),
(15, 'sanya', 'sanya@gmail.com', '69358741236', 'Female', 'IT', '2025-12-09', '$2y$12$Vj41rcFvo06vHqZmbScGJOqz79mCZjPo8FawHYKILXuz0HEpxVL8.', 'Kanpur', '2025-12-15 00:35:22', '2025-12-15 00:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_24_101927_add_role_to_users_table', 1),
(5, '2025_11_24_110715_create_tasks_table', 1),
(6, '2025_11_24_110805_create_daily_works_table', 1),
(7, '2025_11_25_050305_add_employee_fields_to_users_table', 1),
(8, '2025_11_25_052756_create_employees_table', 1),
(9, '2025_11_25_071836_create_admins_table', 2),
(10, '2025_11_26_062639_add_employee_update_to_tasks_table', 3),
(11, '2025_11_26_064451_create_daily_work_reports_table', 4),
(12, '2025_11_28_050221_add_status_to_tasks_table', 5),
(13, '2025_11_28_055834_create_settings_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5ZwBK88UXxIrVBDvQ7igPOEXjCLgKZngj7AWkI79', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRm5TRzhYaEVuUzNkeEZsY2JuNk9CVGdvczRCN1ZrSnphQ3NDQ3B6QyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTg6ImVtcGxveWVlLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9kYXNoYm9hcmQiO31zOjU1OiJsb2dpbl9lbXBsb3llZV81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1765800241),
('I1Dkns55JR1bXflkPgQM0q3Cdm3ohYAA7vaz59aW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVG0yZnBoeEZyb1pOYUR5SDBKZFYwanJRMmVxakkxQTVCVklFYmJvZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9wcm9maWxlIjtzOjU6InJvdXRlIjtzOjE2OiJlbXBsb3llZS5wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O3M6NTU6ImxvZ2luX2VtcGxveWVlXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1765871121);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `assign_date` date NOT NULL,
  `deadline` date NOT NULL,
  `task_details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `employee_id`, `project_name`, `assign_date`, `deadline`, `task_details`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'TMRS', '2025-11-13', '2025-11-30', 'xdfcgvhbj', '2025-11-27 01:06:14', '2025-11-27 23:33:54', 'completed'),
(2, 1, 'TMRS', '2025-11-13', '2025-11-30', 'asdc', '2025-11-27 01:06:25', '2025-11-27 01:06:25', 'pending'),
(3, 1, 'Test Task', '2025-11-27', '2025-12-04', 'Testing save', '2025-11-27 01:13:45', '2025-11-27 23:33:48', 'in-progress'),
(4, 1, 'TMRS', '2025-11-13', '2025-11-30', 'sadv', '2025-11-27 01:32:13', '2025-11-27 01:32:13', 'pending'),
(11, 3, 'HRM', '2025-11-06', '2025-11-30', 'Done this work on time', '2025-11-27 23:35:18', '2025-12-01 00:43:28', 'pending'),
(12, 1, 'TMRS', '2025-12-01', '2025-12-04', 'This is your new tasks', '2025-11-30 23:41:59', '2025-12-05 00:08:21', 'pending'),
(14, 11, 'E-commerce website', '2025-12-01', '2025-12-17', 'Design this work on time', '2025-12-05 00:00:42', '2025-12-05 00:00:42', 'pending'),
(15, 1, 'TMRS', '2025-12-08', '2025-12-26', 'sd', '2025-12-07 23:42:59', '2025-12-07 23:42:59', 'pending'),
(16, 1, 'TMRS', '2025-12-09', '2025-12-26', 'fgjhkjlk', '2025-12-09 00:16:03', '2025-12-09 23:26:09', 'in-progress'),
(17, 1, 'TMRS', '2025-12-09', '2025-12-26', 'rftguyihjk', '2025-12-09 23:25:54', '2025-12-09 23:25:54', 'Pending'),
(18, 15, 'HRM', '2025-12-15', '2025-12-25', 'Complete this task on time', '2025-12-15 00:55:05', '2025-12-15 00:55:05', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `daily_works`
--
ALTER TABLE `daily_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_work_reports`
--
ALTER TABLE `daily_work_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_work_reports_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daily_works`
--
ALTER TABLE `daily_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_work_reports`
--
ALTER TABLE `daily_work_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_work_reports`
--
ALTER TABLE `daily_work_reports`
  ADD CONSTRAINT `daily_work_reports_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
