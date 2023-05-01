-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 12:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itlh`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitys`
--

CREATE TABLE `activitys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `service_id`, `date`, `time`, `message`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '2023-04-29', '00:31:00', 'dfdsfds', 0, 'test', '2023-04-28 13:31:06', '2023-04-29 00:53:42'),
(2, 1, 7, '2023-04-29', '00:38:00', 'dfsdf', 0, 'test', '2023-04-28 13:38:09', '2023-04-29 00:13:05'),
(3, 1, 7, '2023-04-29', '00:53:00', 'dfdfgd', 0, 'fgdfgdg', '2023-04-28 14:01:43', '2023-04-29 00:15:40'),
(4, 1, 7, '2023-04-23', '10:36:00', 'to be cancelled', 1, 'dfdsf', '2023-04-28 23:36:06', '2023-04-28 23:58:22'),
(5, 1, 8, '2023-04-30', '21:59:00', 'test', 0, '', '2023-04-29 10:56:51', '2023-04-29 10:56:51'),
(6, 1, 7, '2023-05-07', '21:03:00', 'Dui litora blandit tortor tellus gravida integer sagittis. Sed venenatis imperdiet himenaeos a convallis. Condimentum nibh nec augue sapien facilisis porta litora, primis volutpat ullamcorper sit. Et hendrerit condimentum purus maecenas feugiat rhoncus. Dis viverra viverra egestas. Class mus a quisque fringilla ligula sit volutpat dignissim. Malesuada ut rutrum lectus augue aenean dapibus. Interdum congue pellentesque maecenas, pretium fusce? Ut consequat fringilla velit. Ornare mi blandit senectus fringilla.', 1, '', '2023-04-29 10:58:33', '2023-04-29 10:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'test 1', 'test description 1', '2023-04-28 06:05:14', '2023-04-28 06:06:18'),
(3, 'test 3', 'test description 3', '2023-04-28 06:05:23', '2023-04-28 06:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `services_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `type`, `path`, `alt`, `created_at`, `updated_at`, `services_id`) VALUES
(1, 1, 'banner-3.jpg', 'rishikesh', '2023-04-28 07:48:34', '2023-04-28 09:31:00', 5),
(2, 1, '644bc86464904.jpg', 'rishikesh', '2023-04-28 07:51:40', '2023-04-28 07:51:40', 6),
(3, 1, '644c157d50a3a.jpg', 'test', '2023-04-28 13:20:37', '2023-04-28 13:20:37', 7),
(4, 1, '644cbbb23886a.jpg', 'himalayas', '2023-04-29 01:09:46', '2023-04-29 01:09:46', 8),
(6, 1, '644cf2ed69b54.jpg', 'hyd', '2023-04-29 05:05:25', '2023-04-29 05:05:25', 11);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_28_085959_create_category_table', 1),
(6, '2023_04_28_090211_create_services_table', 1),
(7, '2023_04_28_090229_create_activitys_table', 1),
(8, '2023_04_28_090246_create_notification_table', 1),
(9, '2023_04_28_090300_create_profile_table', 1),
(10, '2023_04_28_090309_create_bookings_table', 1),
(11, '2023_04_28_090910_create_schedule_table', 1),
(12, '2023_04_28_123136_create_image_table', 2),
(13, '2023_04_28_125059_update_images_table', 3),
(14, '2023_04_28_163741_update_schedule_table', 4),
(15, '2023_04_28_164809_delete_column_schedule_table', 5),
(16, '2023_04_29_035330_add_column_bookings_table', 6),
(17, '2023_04_29_171405_add_column_services_table', 7),
(18, '2023_04_30_023717_create_service_view_table', 8),
(19, '2023_04_30_032034_create_service_view_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `bio`, `avatar`, `phone_number`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'trtrtrtrtr', '644ce8718679c.jpg', '565665656565', 'tytytyty', '2023-04-29 03:57:01', '2023-04-29 04:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`, `title`, `description`, `service_id`) VALUES
(5, 1, '15:05:00', '15:06:00', '2023-04-29 01:05:05', '2023-04-29 01:33:15', 'NORTH HIMALAYAS', 'discussion', 8),
(7, 1, '22:33:00', '22:32:00', '2023-04-29 11:31:20', '2023-04-29 11:31:20', 'test', 'dfgdfgfdg', 11),
(8, 1, '22:32:00', '22:37:00', '2023-04-29 11:32:06', '2023-04-29 11:32:06', 'test', 'desdesss', 11),
(9, 1, '22:34:00', '23:35:00', '2023-04-29 11:34:27', '2023-04-29 11:34:27', 'test sdsds', 'ffdgfg dfgdfg fdg', 8),
(10, 1, '22:35:00', '23:36:00', '2023-04-29 11:35:13', '2023-04-29 11:35:13', 'sdfdf', 'dfdfdf', 11),
(11, 1, '22:36:00', '23:36:00', '2023-04-29 11:36:12', '2023-04-29 11:36:12', 'dfdsfsd', 'dfdfdf', 11);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `category_id`, `title`, `description`, `price`, `location`, `created_at`, `updated_at`, `views`) VALUES
(7, 1, 2, 'test', 'Senectus nascetur per ligula morbi nec penatibus pretium curabitur dictumst. Inceptos faucibus consectetur commodo et in cras et pulvinar mauris! Ipsum molestie elit maecenas! Taciti velit potenti ut odio ullamcorper aliquet tincidunt malesuada dictumst. Dapibus rhoncus nisi leo natoque fusce parturient. Posuere felis habitant varius praesent, adipiscing neque montes senectus aenean. Integer magna parturient luctus conubia ridiculus primis, ridiculus lacinia. Interdum class porta justo sociosqu mollis vitae sapien! Aptent quam etiam etiam felis ligula sagittis blandit vitae ultrices vivamus ridiculus. Malesuada bibendum ullamcorper vulputate.', '23451.00', 'hyd', '2023-04-28 13:20:37', '2023-04-29 09:15:41', 0),
(8, 1, 2, 'himalayas', 'Eget in facilisi porta vulputate per integer nisl mus purus feugiat mi elementum. Mus varius rhoncus natoque blandit ac facilisis luctus dis in! Urna; proin lobortis pellentesque viverra pulvinar sociis curae; suscipit sollicitudin laoreet nulla. Faucibus convallis morbi, blandit justo? Mus nam amet vulputate ullamcorper iaculis purus ridiculus cum, libero non elementum potenti. Nam montes non felis! Faucibus lacus dignissim vivamus hendrerit interdum mus auctor. Quam venenatis rutrum dolor dignissim eleifend cras. Fames erat.', '50000.00', 'himalayas', '2023-04-29 01:09:46', '2023-04-29 11:57:32', 2),
(11, 1, 3, 'hyderabad', 'Ante malesuada dui, ridiculus montes. Iaculis conubia inceptos scelerisque ultricies facilisis aptent consequat iaculis venenatis sed? Mauris blandit ultrices dis nascetur. Odio curabitur curabitur ut erat nec. Dapibus justo litora et ultrices ullamcorper justo cursus bibendum purus ad leo semper? Etiam risus semper sit tempor dolor eget tincidunt potenti, maecenas curabitur. Pretium, elit quam ante sapien sociosqu magna cras. Curabitur, aptent eget sociis condimentum tempor.', '2999.00', 'hyd', '2023-04-29 05:05:25', '2023-04-29 09:19:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `servicesviews`
--

CREATE TABLE `servicesviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `view` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicesviews`
--

INSERT INTO `servicesviews` (`id`, `service_id`, `view`, `day`, `month`, `year`, `created_at`, `updated_at`) VALUES
(4, 7, 3, 30, 4, 2023, NULL, '2023-04-29 22:21:38'),
(5, 8, 2, 30, 4, 2023, NULL, '2023-04-29 22:21:41'),
(6, 11, 12, 30, 4, 2023, NULL, '2023-04-29 22:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$3qrkzi0USNUHwSyODQPeteN13e2QnNu07dPpIyonR3GT7ryqQb3ZC', NULL, '2023-04-28 04:08:37', '2023-04-28 04:08:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitys`
--
ALTER TABLE `activitys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activitys_subject_type_subject_id_index` (`subject_type`,`subject_id`),
  ADD KEY `activitys_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_user_id_foreign` (`user_id`),
  ADD KEY `notification_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indexes for table `servicesviews`
--
ALTER TABLE `servicesviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicesviews_service_id_foreign` (`service_id`);

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
-- AUTO_INCREMENT for table `activitys`
--
ALTER TABLE `activitys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `servicesviews`
--
ALTER TABLE `servicesviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activitys`
--
ALTER TABLE `activitys`
  ADD CONSTRAINT `activitys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `servicesviews`
--
ALTER TABLE `servicesviews`
  ADD CONSTRAINT `servicesviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
