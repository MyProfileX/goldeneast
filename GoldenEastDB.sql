-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2023 г., 11:20
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `GoldenEastDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'Vietnam', '2023-09-24 12:17:07', '2023-09-24 12:17:07'),
(10, 'Japan', '2023-09-24 12:17:23', '2023-09-24 12:17:23'),
(11, 'Philippines', '2023-09-24 12:17:56', '2023-09-24 12:17:56'),
(12, 'India', '2023-09-24 12:18:15', '2023-09-24 12:18:15'),
(13, 'China', '2023-09-24 12:18:26', '2023-09-24 12:18:26');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vegetarian_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `country_id`, `title`, `price`, `description`, `image`, `path`, `vegetarian_id`, `created_at`, `updated_at`) VALUES
(30, 10, 'Маки с тунцом', 350, '-', NULL, '/img/dishes/1695571298.jpg', 1, '2023-09-24 13:01:38', '2023-09-24 13:01:38'),
(31, 10, 'Рамен с говядиной', 420, '-', NULL, '/img/dishes/1695571370.jpg', 1, '2023-09-24 13:02:50', '2023-09-24 13:02:50'),
(32, 10, 'Рамен с креветками', 360, '-', NULL, '/img/dishes/1695571491.jpg', 1, '2023-09-24 13:04:51', '2023-09-24 13:04:51'),
(33, 9, 'Ролл Аригато', 280, '-', NULL, '/img/dishes/1695573407.jpg', 1, '2023-09-24 13:36:47', '2023-09-24 13:36:47'),
(34, 9, 'Ролл Окинава', 300, '-', NULL, '/img/dishes/1695573573.jpg', 1, '2023-09-24 13:39:33', '2023-09-24 13:39:33'),
(35, 10, 'Ролл Филадельфия', 340, '-', NULL, '/img/dishes/1695573725.jpg', 1, '2023-09-24 13:42:05', '2023-09-24 13:42:05'),
(36, 13, 'Суп с угрём', 430, '-', NULL, '/img/dishes/1695573856.jpg', 1, '2023-09-24 13:44:16', '2023-09-24 13:44:16'),
(37, 12, 'Лапша эби ям 222', 30, '-', NULL, '/img/dishes/1695618355.jpg', 2, '2023-09-25 02:05:54', '2023-09-25 02:06:19'),
(38, 9, 'wer', 333, 'ed', NULL, '/img/dishes/1696338958.jpg', 2, '2023-10-03 10:15:57', '2023-10-03 10:15:58');

-- --------------------------------------------------------

--
-- Структура таблицы `dish_ingredient`
--

CREATE TABLE `dish_ingredient` (
  `id` bigint UNSIGNED NOT NULL,
  `dish_id` bigint UNSIGNED NOT NULL,
  `ingredient_id` bigint UNSIGNED NOT NULL,
  `gram_amount` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dish_ingredient`
--

INSERT INTO `dish_ingredient` (`id`, `dish_id`, `ingredient_id`, `gram_amount`) VALUES
(1, 1, 1, 179),
(2, 1, 4, 28),
(3, 1, 8, 122),
(4, 2, 2, 64),
(5, 2, 9, 57),
(6, 2, 10, 270),
(7, 2, 1, 261),
(8, 3, 9, 169),
(9, 4, 10, 71),
(10, 4, 6, 211),
(11, 5, 4, 168),
(12, 5, 10, 298),
(13, 5, 1, 295),
(14, 6, 8, 249),
(15, 6, 2, 162),
(16, 7, 7, 14),
(17, 7, 2, 125),
(18, 7, 10, 197),
(19, 7, 8, 69),
(20, 8, 6, 188),
(21, 8, 3, 228),
(22, 8, 7, 142),
(23, 8, 4, 224),
(24, 9, 7, 231),
(25, 9, 4, 286),
(26, 9, 5, 100),
(27, 9, 2, 276),
(28, 10, 3, 55),
(29, 10, 2, 173),
(30, 10, 5, 256),
(31, 11, 2, 0),
(32, 11, 3, 0),
(33, 11, 4, 0),
(37, 13, 1, 0),
(38, 13, 2, 0),
(39, 13, 3, 0),
(40, 14, 2, 0),
(41, 14, 3, 0),
(42, 14, 4, 0),
(43, 15, 2, 0),
(44, 15, 3, 0),
(45, 23, 2, 0),
(46, 23, 3, 0),
(47, 25, 2, 0),
(48, 25, 3, 0),
(49, 25, 4, 0),
(50, 27, 1, 0),
(51, 27, 2, 0),
(52, 27, 3, 0),
(53, 28, 2, 0),
(54, 28, 4, 0),
(55, 28, 6, 0),
(56, 15, 1, 0),
(57, 15, 4, 0),
(58, 15, 5, 0),
(59, 15, 6, 0),
(60, 15, 7, 0),
(61, 15, 8, 0),
(62, 15, 9, 0),
(63, 15, 13, 0),
(64, 15, 14, 0),
(65, 15, 15, 0),
(66, 15, 16, 0),
(67, 15, 17, 0),
(68, 15, 18, 0),
(69, 15, 19, 0),
(70, 15, 20, 0),
(71, 29, 24, 0),
(72, 29, 25, 0),
(73, 29, 35, 0),
(74, 30, 28, 0),
(75, 30, 33, 0),
(76, 31, 24, 0),
(77, 31, 25, 0),
(78, 31, 26, 0),
(79, 31, 36, 0),
(80, 32, 24, 0),
(81, 32, 25, 0),
(82, 32, 35, 0),
(83, 32, 36, 0),
(84, 33, 28, 0),
(85, 33, 35, 0),
(86, 33, 37, 0),
(87, 34, 24, 0),
(88, 34, 28, 0),
(89, 34, 30, 0),
(90, 34, 32, 0),
(91, 34, 34, 0),
(92, 34, 38, 0),
(93, 34, 39, 0),
(94, 34, 40, 0),
(95, 35, 28, 0),
(96, 35, 33, 0),
(97, 35, 39, 0),
(98, 35, 40, 0),
(99, 35, 41, 0),
(100, 36, 23, 0),
(101, 36, 24, 0),
(102, 36, 25, 0),
(103, 36, 42, 0),
(104, 37, 21, 0),
(105, 37, 22, 0),
(106, 37, 23, 0),
(107, 37, 24, 0),
(108, 37, 27, 0),
(109, 37, 28, 0),
(110, 38, 23, 0),
(111, 38, 24, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `dish_order`
--

CREATE TABLE `dish_order` (
  `id` bigint UNSIGNED NOT NULL,
  `dish_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `glutens`
--

CREATE TABLE `glutens` (
  `id` bigint UNSIGNED NOT NULL,
  `is_gluten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `glutens`
--

INSERT INTO `glutens` (`id`, `is_gluten`, `created_at`, `updated_at`) VALUES
(1, 'gluten', '2023-09-05 10:46:21', '2023-09-05 10:46:21'),
(2, 'no gluten', '2023-09-05 10:46:21', '2023-09-05 10:46:21');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_for_gram` decimal(7,2) NOT NULL DEFAULT '0.00',
  `gluten_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `price_for_gram`, `gluten_id`, `created_at`, `updated_at`) VALUES
(21, 'говяжьи щёки', '20.00', 1, '2023-09-24 12:46:12', '2023-09-24 12:46:12'),
(22, 'курица', '20.00', 1, '2023-09-24 12:47:13', '2023-09-24 12:47:13'),
(23, 'перец', '12.00', 2, '2023-09-24 12:47:29', '2023-09-24 12:47:29'),
(24, 'лук', '8.00', 1, '2023-09-24 12:47:41', '2023-09-24 12:47:41'),
(25, 'пшеничная лапша', '24.00', 1, '2023-09-24 12:48:05', '2023-09-24 12:48:05'),
(26, 'говядина', '45.00', 1, '2023-09-24 12:48:38', '2023-09-24 12:48:38'),
(27, 'удон', '16.00', 2, '2023-09-24 12:48:51', '2023-09-24 12:49:04'),
(28, 'рис', '14.00', 1, '2023-09-24 12:49:32', '2023-09-24 12:49:32'),
(29, 'пармезан', '13.00', 1, '2023-09-24 12:49:52', '2023-09-24 12:49:52'),
(30, 'кунжут', '4.00', 2, '2023-09-24 12:50:04', '2023-09-24 12:50:04'),
(31, 'икра', '50.00', 1, '2023-09-24 12:50:16', '2023-09-24 12:50:16'),
(32, 'морковь', '13.00', 2, '2023-09-24 12:51:39', '2023-09-24 12:51:39'),
(33, 'тунец', '28.00', 1, '2023-09-24 12:52:06', '2023-09-24 12:52:06'),
(34, 'краб', '14.00', 1, '2023-09-24 12:52:17', '2023-09-24 12:52:17'),
(35, 'креветки', '20.00', 2, '2023-09-24 12:52:42', '2023-09-24 12:52:42'),
(36, 'яйца', '12.00', 1, '2023-09-24 13:03:20', '2023-09-24 13:03:20'),
(37, 'кинза', '3.00', 2, '2023-09-24 13:05:32', '2023-09-24 13:05:32'),
(38, 'авокадо', '20.00', 1, '2023-09-24 13:37:49', '2023-09-24 13:37:49'),
(39, 'нори', '4.00', 1, '2023-09-24 13:38:00', '2023-09-24 13:38:00'),
(40, 'сыр тобико', '19.00', 1, '2023-09-24 13:38:25', '2023-09-24 13:38:25'),
(41, 'огурец', '2.00', 2, '2023-09-24 13:40:29', '2023-09-24 13:40:29'),
(42, 'угорь', '30.00', 1, '2023-09-24 13:42:51', '2023-09-24 13:42:51');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(71, '2014_07_31_000005_create_roles_table', 1),
(72, '2014_10_12_000000_create_users_table', 1),
(73, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(74, '2014_10_12_100000_create_password_resets_table', 1),
(75, '2019_08_19_000000_create_failed_jobs_table', 1),
(76, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(77, '2023_07_31_000010_create_countries_table', 1),
(78, '2023_07_31_000013_create_glutens_table', 1),
(79, '2023_07_31_000015_create_ingredients_table', 1),
(80, '2023_07_31_000020_create_orders_table', 1),
(81, '2023_07_31_000023_create_vegetarians_table', 1),
(82, '2023_07_31_000025_create_dishes_table', 1),
(83, '2023_07_31_000030_create_dish_order_table', 1),
(84, '2023_07_31_000035_create_dish_ingredient_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('kotbegemot9696@gmail.com', '$2y$10$l3SZhz13hDw.CxfQ86bgeuttU2gxqoMuYi8fTgRL0rnyMlcyjXINe', '2023-09-08 19:22:16');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2023-09-05 10:46:19', '2023-09-05 10:46:19'),
(2, 'admin', '2023-09-05 10:46:19', '2023-09-05 10:46:19');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Evgeniy', 'EvgeniyEmail@gmail.ru', 1, NULL, '$2y$10$tyd.h0JBMNW9O955kw3GGex9a/vvZ1mxpzlCgHtGUT21zEq5BZsX.', NULL, '2023-09-05 10:47:48', '2023-09-05 10:47:48'),
(12, 'Olga', 'OlgaEmail@gmail.ru', 2, NULL, '$2y$10$GqDOtZDFOisPRXubMMs/TeoAvhp9WvJPrhJ9Oxz1CPDyEk53tKwLa', NULL, '2023-09-05 10:48:18', '2023-09-05 10:48:18'),
(55, 'Gleb Khorunjiy', 'MyEmail@gmail.ru', 2, NULL, '$2y$10$i9OiehLgliDsUry3hT6/mOZCogezudZD4/XHcHbCy/RHaskcFmrFm', NULL, '2023-09-19 17:41:38', '2023-09-19 17:41:38'),
(58, 'Gleb Khorunjiy', 'isip_g.a.horunjiy@mpt.ru', 1, '2023-09-25 02:03:14', '$2y$10$LFFV.pFWSP/ChswTNlz4fe1an/6TH/kkvYq7/R7JKfypOUnl/MVvi', NULL, '2023-09-25 02:02:36', '2023-09-25 02:03:14');

-- --------------------------------------------------------

--
-- Структура таблицы `vegetarians`
--

CREATE TABLE `vegetarians` (
  `id` bigint UNSIGNED NOT NULL,
  `is_vegetarian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vegetarians`
--

INSERT INTO `vegetarians` (`id`, `is_vegetarian`, `created_at`, `updated_at`) VALUES
(1, 'no vegetarian', '2023-09-05 10:46:21', '2023-09-05 10:46:21'),
(2, 'vegetarian', '2023-09-05 10:46:21', '2023-09-05 10:46:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_country_id_foreign` (`country_id`),
  ADD KEY `dishes_vegetarian_id_foreign` (`vegetarian_id`);

--
-- Индексы таблицы `dish_ingredient`
--
ALTER TABLE `dish_ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dish_order`
--
ALTER TABLE `dish_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `glutens`
--
ALTER TABLE `glutens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ingredients_name_unique` (`name`),
  ADD KEY `ingredients_gluten_id_foreign` (`gluten_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `vegetarians`
--
ALTER TABLE `vegetarians`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `dish_ingredient`
--
ALTER TABLE `dish_ingredient`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT для таблицы `dish_order`
--
ALTER TABLE `dish_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `glutens`
--
ALTER TABLE `glutens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `vegetarians`
--
ALTER TABLE `vegetarians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dishes_vegetarian_id_foreign` FOREIGN KEY (`vegetarian_id`) REFERENCES `vegetarians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_gluten_id_foreign` FOREIGN KEY (`gluten_id`) REFERENCES `glutens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
