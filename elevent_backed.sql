-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 11:31 AM
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
-- Database: `elevent_backed`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `descriptions` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `image`, `descriptions`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Timnas', NULL, 'A Indonesia nasional football club', 0, '2024-05-06 23:57:37', '2024-05-06 23:57:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_07_022118_create_clubs_table', 1),
(6, '2024_05_07_040105_create_positions_table', 1),
(7, '2024_05_07_040141_create_nationalities_table', 1),
(8, '2024_05_07_053640_create_players_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', '2024-05-06 23:57:37', '2024-05-06 23:57:37');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'name', '5e5381eecf4798cdcef02e9d5fadfb23842fab58644f99a2362b8a08230ad0e5', '[\"*\"]', NULL, NULL, '2024-05-06 23:57:45', '2024-05-06 23:57:45'),
(2, 'App\\Models\\User', 1, 'name', 'edaa2091019a2b7b67a4297a776c4b5109bba520d400b7265ee1a2728f633aa6', '[\"*\"]', NULL, NULL, '2024-05-07 00:02:36', '2024-05-07 00:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_profile` varchar(255) DEFAULT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `squad_number` varchar(255) DEFAULT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `positions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `full_name`, `email`, `password`, `image_profile`, `height`, `weight`, `squad_number`, `club_id`, `positions_id`, `nationality_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Julius Hammes', 'ckunde@hotmail.com', '$2y$10$tTI6BVmkyAIuJTtkANjljejraAAx37HyrAk9kIXlolwUMqn1uG7D.', NULL, '170', '65', '24', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(2, 'Amber Bartell', 'leuschke.maximillian@yahoo.com', '$2y$10$yeiqQjqU6uAodkR4FcQF4u51u/HcOYc1hKu2RitVX3QCPk.oLJLae', NULL, '160', '75', '28', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(3, 'Dr. Domingo Roberts', 'ebrekke@yahoo.com', '$2y$10$ukYpX1X0gm0difaWRFDY6.9HiQ4R.HxN3Ezc/0iHVPrjc3ZDkyeA2', NULL, '196', '47', '85', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(4, 'Dolly Zieme', 'pasquale.torphy@gmail.com', '$2y$10$tV0SkVa2xjLs7Y/zne6yIOYjGbvEVJeEY7xVNp1pFxaWvq.TnZsTa', NULL, '174', '58', '62', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(5, 'Monica Bartoletti', 'zfranecki@hotmail.com', '$2y$10$8WCBfAQgx10N74mqj123bO2e8hmGGuz1pRG1P/UBZxbVL6aOEckQy', NULL, '161', '52', '97', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(6, 'Valentin Wintheiser', 'lilly.schmitt@yahoo.com', '$2y$10$ExQEBhJ6G38Y6rgjOGa8OulG3H2mhlXdx.WpD.BYQAoOKbcVcUveK', NULL, '196', '45', '97', NULL, NULL, NULL, 0, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(7, 'Ms. Fae Conn', 'eortiz@gmail.com', '$2y$10$0AAUZoTeJ0W/OCxdlS9tfO6C/vqdDbLSqjP2FkgzvqHY95e3GqYhy', NULL, '182', '52', '85', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(8, 'Mr. Marc Mohr DVM', 'fbergnaum@yahoo.com', '$2y$10$KzawKPUSmtW4yr7E0DAYcuLZTLcfY5f26PA90csQLUKureDKMdtUa', NULL, '199', '56', '84', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(9, 'Laurence Runolfsdottir', 'iwisoky@hotmail.com', '$2y$10$STcZaXK1xyYoTg4/RqOKlOk6YhCDDMC1v2TPq3XZUzv0mcOARo4si', NULL, '183', '46', '36', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(10, 'Earline Kozey', 'wilhelmine20@gmail.com', '$2y$10$6EQTk56S1iaoFQ5MO4jSbej9U9bkrW6NzRGsUX7FUpfNlF3AKnFNm', NULL, '198', '45', '22', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(11, 'Irving Prosacco', 'kemmer.crawford@yahoo.com', '$2y$10$qaAF7.SVkpLsy0CqY3mTB.SJ5EkL7F7pHoncX9I/8ZMAkYgcqDsYy', NULL, '178', '82', '73', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(12, 'Kaleb Schultz', 'annamae26@gmail.com', '$2y$10$kKY/FLHjuK9Ih9HsWOuNQO0GA17RlksPpxQRUH6kwGfErIQzXskdG', NULL, '167', '68', '61', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(13, 'Jacinto Gerhold', 'catharine65@hotmail.com', '$2y$10$6NpEB8mlGDXbbOhlctecBOvtXoE/l0o1OS2ObFFy.6NRWbYRkbMWu', NULL, '186', '46', '52', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(14, 'Lourdes Sanford', 'mheaney@hotmail.com', '$2y$10$VuYa0Yrye0.tqaPFlBfpieAggy85sBNPFPRzr29TV4j4BDPUpXOVS', NULL, '154', '91', '63', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(15, 'Stevie Runte', 'leta.turner@gmail.com', '$2y$10$jasCmOhm8M/I25Cj6CZAte8P9jsWRUhcGUl4w8VeUTiAOWHeggSkK', NULL, '183', '67', '20', NULL, NULL, NULL, 0, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(16, 'Hollis Steuber', 'cartwright.arlie@gmail.com', '$2y$10$tmTaNbahmJj4rTvhCBxO1.CVbUroXFlLpU8J7yOaDs8ogVW2A0CXC', NULL, '153', '65', '10', NULL, NULL, NULL, 0, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(17, 'Junius Nienow', 'andreanne.ryan@hotmail.com', '$2y$10$PFrcHJq/CBASqy6HjjefMe.x7wW14brw0JoozGyvdgFQTUM8.r8WW', NULL, '180', '91', '82', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(18, 'Lera Konopelski', 'hamill.bryon@hotmail.com', '$2y$10$hMzhvsfPnTzssRQ/hmBdh.Vgy7HNlRGgoucYrN2Mw4AiXFIEhUmkm', NULL, '188', '90', '37', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(19, 'Mrs. Aubree Rogahn MD', 'chaim88@hotmail.com', '$2y$10$LZKR50RzSuksMk2NDTnN0ulG.RPXGr6er0YSgqHGdzrZnQjU67Tq6', NULL, '158', '56', '50', NULL, NULL, NULL, 0, '2024-05-06 23:57:38', '2024-05-06 23:57:38'),
(20, 'Bette Huels DDS', 'swaniawski.tiana@hotmail.com', '$2y$10$AODmhF.h9O4OHyosDI03n.Pt4O22tJBGWRaKFOUsWmf0.dVuIYcr6', NULL, '195', '80', '57', NULL, NULL, NULL, 1, '2024-05-06 23:57:38', '2024-05-06 23:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'wing', '2024-05-06 23:57:37', '2024-05-06 23:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `token`, `created_at`, `updated_at`) VALUES
(1, 'admin_jp2', '$2y$10$q3pKTpHCFaH5JU1I.2h8o.aekQ.p0C1BlSLWx0tYYFecDf1wZexhW', 'admin', NULL, '2024-05-06 23:57:37', '2024-05-06 23:57:37'),
(2, 'user_jp2', '$2y$10$.kmdIeWLvN.pekAZJIwCGuyg5w/Khz11penR66uoEWpDP8UbM.YEq', 'user', NULL, '2024-05-06 23:57:37', '2024-05-06 23:57:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_club_id_foreign` (`club_id`),
  ADD KEY `players_positions_id_foreign` (`positions_id`),
  ADD KEY `players_nationality_id_foreign` (`nationality_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
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
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `players_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `players_positions_id_foreign` FOREIGN KEY (`positions_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
