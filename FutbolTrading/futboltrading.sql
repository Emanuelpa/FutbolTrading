-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2025 a las 01:19:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futboltrading`
--
CREATE DATABASE IF NOT EXISTS `futboltrading` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `futboltrading`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cards`
--

INSERT INTO `cards` (`id`, `name`, `description`, `image`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Di Maria 2022 Copa America', 'Legendary winger, master of dribbles and assists, shining in crucial moments.', 'images/67e1eb61277e0.jpeg', 500, 20, '2025-03-25 04:31:45', '2025-03-25 04:31:45'),
(2, 'Cristiano Ronaldo Juventus', 'Goal-scoring machine, unstoppable in the air, a true football icon.', 'images/67e1eb84266a8.jpeg', 600, 2, '2025-03-25 04:32:20', '2025-03-25 04:32:20'),
(3, 'Messi Copa america 2024', 'Speed demon with precise finishing, dominating defenses worldwide', 'images/67e1eba929986.jpeg', 50, 76, '2025-03-25 04:32:57', '2025-03-25 04:44:03'),
(4, 'Neymar WC 2018', 'Midfield magician, controlling the game with vision and passing.', 'images/67e1ebc38ccc9.jpeg', 60, 12, '2025-03-25 04:33:23', '2025-03-25 04:33:23'),
(5, 'Ronaldo Nazario 2006', 'Dynamic playmaker, weaving through defenses with dazzling footwork.', 'images/67e1ebf01a3e6.jpeg', 740, 1, '2025-03-25 04:34:08', '2025-03-25 04:54:48'),
(6, 'Pele WC 1950', 'Powerful striker, lethal inside the box, a nightmare for goalkeepers', 'images/67e1f04ce2481.jpeg', 200, 12, '2025-03-25 04:34:39', '2025-03-25 05:08:38'),
(7, 'Rivelino', 'Explosive talent, blending speed, skill, and creativity effortlessly.', 'images/67e1ec4285a2f.jpeg', 800, 45, '2025-03-25 04:35:30', '2025-03-25 04:35:30'),
(8, 'Marcos 1973', 'Defensive rock, blocking every attack with intelligence and strength.', 'images/67e1ec615b513.jpeg', 50, 53, '2025-03-25 04:36:01', '2025-03-25 05:09:22'),
(9, 'Falcao 2017', 'Versatile star, adapting to any position with ease and precision.', 'images/67e1ec790474c.jpeg', 10, 43, '2025-03-25 04:36:25', '2025-03-25 04:54:48'),
(10, 'Haaland 2023 CL', 'Midfield engine, tireless worker, dictating the tempo of every game', 'images/67e1eca6363d6.jpeg', 45, 20, '2025-03-25 04:37:10', '2025-03-25 04:37:10'),
(11, 'Duvan Zapata 2013', 'Towering striker, a powerful finisher with unstoppable physicality.', 'images/67e1ece868109.jpeg', 5, 15, '2025-03-25 04:38:16', '2025-03-25 05:13:04'),
(12, 'Pique 2012', 'Defensive leader, brilliant tactician, unbreakable in duels.', 'images/67e1ecffb61a3.jpeg', 50, 23, '2025-03-25 04:38:39', '2025-03-25 04:38:39'),
(13, 'Iniesta 2010', 'Midfield genius, known for magical assists and legendary goals', 'images/67e1ed16948cc.jpg', 89, 70, '2025-03-25 04:39:02', '2025-03-25 04:39:02'),
(14, 'James Rodriguez 2014', 'Playmaking wizard, delivering stunning goals and pinpoint passes', 'images/67e1ed34c1ed4.jpeg', 40, 14, '2025-03-25 04:39:32', '2025-03-25 05:12:28'),
(15, 'Kevin De Bruyne Belgium', 'Master strategist, bending defenses with inch-perfect passes.', 'images/67e1ed53df2ed.jpeg', 15, 57, '2025-03-25 04:40:03', '2025-03-25 05:09:22'),
(16, 'Luka Modric 2017', 'Elegant maestro, orchestrating play with unmatched vision.', 'images/67e1ed6ce2f14.jpeg', 60, 87, '2025-03-25 04:40:28', '2025-03-25 04:40:28'),
(17, 'Marcelo Brasil', 'Flair-filled left-back, blending defense and attack seamlessly.', 'images/67e1ed85ce697.jpeg', 150, 7, '2025-03-25 04:40:53', '2025-03-25 04:40:53'),
(18, 'Mbappe France WC 2018', 'Blazing speed, ruthless finishing, and a future legend.', 'images/67e1eda486fb1.png', 400, 14, '2025-03-25 04:41:24', '2025-03-25 04:41:24'),
(19, 'Mbappe Real Madrid 2025', 'Lightning-fast dribbler, humiliating defenders with ease.', 'images/67e1edc83710f.jpg', 1200, 2, '2025-03-25 04:42:00', '2025-03-25 05:09:22'),
(20, 'Cr7 Signed 2016', 'Portuguese phenomenon, combining power, speed, and pure talent.', 'images/67e1edfdbbcfe.jpeg', 2500, 6, '2025-03-25 04:42:53', '2025-03-25 04:42:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Estructura de tabla para la tabla `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `order` bigint(20) UNSIGNED NOT NULL,
  `card` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `quantity`, `subtotal`, `order`, `card`, `created_at`, `updated_at`) VALUES
(1, 4, 50.00, 1, 3, '2025-03-25 04:44:03', '2025-03-25 04:44:03'),
(2, 1, 40.00, 2, 14, '2025-03-25 04:45:13', '2025-03-25 04:45:13'),
(3, 2, 155.00, 3, 6, '2025-03-25 04:49:54', '2025-03-25 04:49:54'),
(4, 1, 740.00, 4, 5, '2025-03-25 04:54:48', '2025-03-25 04:54:48'),
(5, 2, 10.00, 4, 9, '2025-03-25 04:54:48', '2025-03-25 04:54:48'),
(6, 4, 200.00, 5, 6, '2025-03-25 05:08:38', '2025-03-25 05:08:38'),
(7, 3, 50.00, 6, 8, '2025-03-25 05:09:22', '2025-03-25 05:09:22'),
(8, 3, 15.00, 6, 15, '2025-03-25 05:09:22', '2025-03-25 05:09:22'),
(9, 1, 1200.00, 6, 19, '2025-03-25 05:09:22', '2025-03-25 05:09:22'),
(10, 5, 40.00, 7, 14, '2025-03-25 05:12:28', '2025-03-25 05:12:28'),
(11, 8, 5.00, 8, 11, '2025-03-25 05:13:04', '2025-03-25 05:13:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
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
-- Estructura de tabla para la tabla `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
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
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_08_152206_create_trade_products_table', 1),
(5, '2025_03_12_234307_create_orders_table', 1),
(6, '2025_03_13_193505_create_cards_table', 1),
(7, '2025_03_14_000024_create_items_table', 1),
(8, '2025_03_19_233652_create_wishlists_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `total`, `address`, `paymentMethod`, `user`, `created_at`, `updated_at`) VALUES
(1, 200, 'Calle 42b sur', 'Credit Card', 2, '2025-03-25 04:44:03', '2025-03-25 04:44:03'),
(2, 40, 'Calle 42b sur', 'Credit Card', 2, '2025-03-25 04:45:13', '2025-03-25 04:45:13'),
(3, 310, 'Calle 42b sur', 'Credit Card', 2, '2025-03-25 04:49:53', '2025-03-25 04:49:54'),
(4, 760, 'Calle 42b sur', 'Credit Card', 2, '2025-03-25 04:54:48', '2025-03-25 04:54:48'),
(5, 800, 'Calle 42b sur', 'Credit Card', 2, '2025-03-25 05:08:38', '2025-03-25 05:08:38'),
(6, 1395, 'Calle 42b sur', 'Credit Card', 2, '2025-03-25 05:09:22', '2025-03-25 05:09:22'),
(7, 200, 'Calle 34 w sur', 'Credit Card', 4, '2025-03-25 05:12:28', '2025-03-25 05:12:28'),
(8, 40, 'Calle 34 w sur', 'Credit Card', 4, '2025-03-25 05:13:04', '2025-03-25 05:13:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1Q5LNXe6cJfmcdwkallz90RtptCPu1a3EGhtcoXR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2diTWZ5TVVPdmR1b0l4Smc1U3dJR1R1blNxM1ZJa3ZSeVVwSVpiViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1742861677);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trade_products`
--

DROP TABLE IF EXISTS `trade_products`;
CREATE TABLE `trade_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `offerType` varchar(255) NOT NULL,
  `offerDescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trade_products`
--

INSERT INTO `trade_products` (`id`, `name`, `type`, `image`, `offerType`, `offerDescription`, `created_at`, `updated_at`, `user`) VALUES
(1, 'Ball Signed by Pogba', 'Exclusive', 'images/67e1f084bcd51.jpg', 'To sell', 'I sell it for 400 USD. You can text me', '2025-03-25 04:17:27', '2025-03-25 04:53:40', 2),
(2, 'Ter Stegen boots', 'Clothes', 'images/67e1e84a8c1c9.jpg', 'Open to Offers', 'He signed it on 2021. Call me and we deal', '2025-03-25 04:18:34', '2025-03-25 04:18:34', 3),
(3, 'Buffon gloves 2010', 'Signed Product', 'images/67e1e8873c9da.jpg', 'To sell', 'This is so special for me. He signed them in the wc 2010', '2025-03-25 04:19:35', '2025-03-25 04:19:35', 3),
(4, 'Iniesta Exclusive CL card', 'Card', 'images/67e1e8ac04a9d.jpg', 'To trade', 'I want some messi card. Text me if you are interested', '2025-03-25 04:20:12', '2025-03-25 04:20:12', 3),
(5, 'Cr7 signed shirt', 'Signed Product', 'images/67e1e913e4b52.jpg', 'To sell', 'He signed it in 2017 Juventus - R. Madrid game. It is so exclusive. 1500 USD', '2025-03-25 04:21:55', '2025-03-25 04:21:55', 1),
(6, 'Pele 1960 card', 'Virtual Product', 'images/67e1e94ec020e.png', 'To trade', 'I have the certified document. Text me with your offer for it', '2025-03-25 04:22:54', '2025-03-25 04:22:54', 1),
(7, 'Messi 2022 shirt', 'Clothes', 'images/67e1e98769087.jpg', 'To sell', 'He wear in in 2022 when he won the WC', '2025-03-25 04:23:51', '2025-03-25 04:23:51', 1),
(8, 'Messi 2021 card', 'Card', 'images/67e1e9af5a289.jpg', 'To trade', 'I dont like messi, i trade it for a cr7 one', '2025-03-25 04:24:31', '2025-03-25 04:24:31', 1),
(9, 'Xavi 2009 card', 'Card', 'images/67e1e9fb4b495.jpg', 'To trade', 'I want a ronaldinho card. Text me and we can look for options', '2025-03-25 04:25:47', '2025-03-25 04:25:47', 2),
(10, 'Argentina team signed t shirt', 'Signed Product', 'images/67e1ea346a2c4.jpg', 'To sell', 'Dont text me if you dont have money. I accept only 900 USD', '2025-03-25 04:26:44', '2025-03-25 04:26:44', 2),
(11, 'Iniesta 2006', 'Card', 'images/67e1ea6dc967e.jpeg', 'Open to Offers', 'Text me. If it is a good deal, i take it', '2025-03-25 04:27:41', '2025-03-25 04:27:41', 2),
(14, 'Dybala 2020', 'Card', 'images/67e1f5544ebf5.jpeg', 'To sell', 'I sell it for 4000 USD', '2025-03-25 05:14:12', '2025-03-25 05:14:12', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailVerifiedAt` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `budget` double NOT NULL DEFAULT 100000,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `emailVerifiedAt`, `password`, `role`, `budget`, `phone`, `city`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Emanuel', 'emanuel@correo.com', NULL, '$2y$12$VnL3p6Dia19DAolR2vvvyu4w5/XbZ.Sb/EgypvKkosawxcSktXxIi', 'admin', 100000, '3006315173', 'Medellin', 'Calle 42b sur #75b 20', NULL, '2025-03-25 03:45:41', '2025-03-25 03:45:41'),
(2, 'Tomas', 'tomas@correo.com', NULL, '$2y$12$R.0pg51MeR1kvdmDrDTm/Owcg4l4uE2OBAVIRKnm4RVSskQHb9V/y', 'admin', 100000, '3006548974', 'Pereira', 'Calle 42b sur', NULL, '2025-03-25 04:09:04', '2025-03-25 04:09:04'),
(3, 'Marcela', 'marcela@correo.com', NULL, '$2y$12$PSaH4Q4V1Qyqm6cHVKIofeGYeyoTm7jrDhBLBddlf/UJvRids3Ium', 'admin', 100000, '3001547635', 'Medellin', 'Calle 43c sur #75b', NULL, '2025-03-25 04:09:52', '2025-03-25 04:09:52'),
(4, 'David', 'david@correo.com', NULL, '$2y$12$K/SoyVMoJexjH3wFQG6rxefgH2Qa1n0qa00mrsDhdykulEx/im0hm', 'user', 100000, '3002657596', 'Cali', 'Calle 34 w sur', NULL, '2025-03-25 05:11:07', '2025-03-25 05:11:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `cards` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`cards`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wishlists`
--

INSERT INTO `wishlists` (`id`, `user`, `cards`, `created_at`, `updated_at`) VALUES
(1, 2, '[\"8\"]', '2025-03-25 04:44:39', '2025-03-25 04:56:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_order_foreign` (`order`),
  ADD KEY `items_card_foreign` (`card`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_foreign` (`user`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `trade_products`
--
ALTER TABLE `trade_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trade_products_user_foreign` (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_foreign` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trade_products`
--
ALTER TABLE `trade_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_card_foreign` FOREIGN KEY (`card`) REFERENCES `cards` (`id`),
  ADD CONSTRAINT `items_order_foreign` FOREIGN KEY (`order`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `trade_products`
--
ALTER TABLE `trade_products`
  ADD CONSTRAINT `trade_products_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
