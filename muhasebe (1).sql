-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Nis 2024, 21:50:53
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `muhasebe`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `banks`
--

INSERT INTO `banks` (`id`, `name`, `iban`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 'Ziraat Bnk', 'tr32886886698999893333x', '1233213333x', NULL, '2024-03-01 04:52:00'),
(4, 'Ziraat Katılım', 'tr355437745', '64997545', '2024-02-28 12:03:07', '2024-02-28 12:03:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `tc_no` bigint(11) DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `customer_type`, `name`, `surname`, `email`, `photo`, `birthday`, `tc_no`, `adress`, `number`, `company_name`, `tax_number`, `tax_office`, `created_at`, `updated_at`) VALUES
(33, 0, 'fatih', 'avcı', NULL, 'images/ToiIbSGEXkIwoFu79gy8ZVi69ku28MVmhimqXn3w.jpg', '2023-12-08', 3453, '34', NULL, NULL, NULL, NULL, '2023-12-11 03:54:41', '2024-04-07 12:06:02'),
(35, 1, 'esmanur', 'avcı', '66fatihavci@gmail.com', 'images/8t2TdwB6ZPY5fJGHNX1a0E3hs9epL9ZFF6nxpril.jpg', '2024-01-30', 24324, '34', '1', 'netgsm', '2342', '2342', '2024-01-10 08:24:14', '2024-04-06 11:03:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `financial_statements`
--

CREATE TABLE `financial_statements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `financial_statements`
--

INSERT INTO `financial_statements` (`id`, `type`, `name`, `kdv`, `created_at`, `updated_at`) VALUES
(10, 0, 'kalem 12', 18, '2024-01-10 11:28:48', '2024-01-23 16:29:28'),
(12, 1, 'gider kalem', 22, '2024-01-20 16:14:26', '2024-01-20 16:14:26'),
(13, 1, 'gider kalem 2', 23, '2024-01-20 16:14:47', '2024-01-20 16:14:47'),
(14, 0, 'kalem 2', 19, '2024-01-20 16:15:05', '2024-01-20 16:15:05'),
(15, 0, '22', 1, '2024-01-23 16:30:17', '2024-01-23 16:30:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 ise gelir , 1 ise gider',
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_type`, `invoice_no`, `customer_id`, `invoice_date`, `created_at`, `updated_at`) VALUES
(46, 1, '1233334', 33, '2024-01-02', '2024-01-20 15:45:23', '2024-02-04 14:45:05'),
(47, 0, '6647', 33, '2024-01-20', '2024-01-20 15:56:31', '2024-02-04 15:16:30'),
(48, 1, '1', 33, '2024-01-20', '2024-01-20 15:58:01', '2024-01-20 15:58:01'),
(50, 1, '13254456', 33, '2024-01-20', '2024-01-20 18:03:27', '2024-01-20 18:03:27'),
(51, 1, '13254456', 33, '2024-01-20', '2024-01-28 12:28:06', '2024-01-28 12:28:06'),
(52, 1, '13254456', 33, '2024-01-20', '2024-01-28 12:28:22', '2024-01-28 12:28:22'),
(53, 1, '13254456', 33, '2024-01-20', '2024-01-28 12:29:15', '2024-01-28 12:29:15'),
(65, 0, '2321', 35, '2024-02-04', '2024-02-04 15:24:31', '2024-02-04 15:24:31'),
(66, 0, '2321', 35, '2024-02-04', '2024-02-04 15:24:40', '2024-02-04 15:24:40'),
(67, 0, '2321', 35, '2024-02-04', '2024-02-04 15:24:52', '2024-02-04 15:24:52'),
(68, 0, '2321', 35, '2024-02-04', '2024-02-04 15:25:15', '2024-02-04 15:25:15'),
(69, 1, '1111', 35, '2024-02-04', '2024-02-04 15:26:24', '2024-02-04 15:26:24'),
(70, 1, '111', 35, '2024-02-04', '2024-02-04 15:28:58', '2024-02-04 15:28:58'),
(71, 0, '2222', 33, '2024-02-04', '2024-02-04 15:29:22', '2024-02-04 15:29:22'),
(72, 0, '2222', 35, '2024-02-04', '2024-02-04 15:30:15', '2024-02-04 15:30:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoice_transactions`
--

CREATE TABLE `invoice_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pencil_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `kdv` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `kdvtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `invvoice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `invoice_transactions`
--

INSERT INTO `invoice_transactions` (`id`, `pencil_id`, `amount`, `price`, `kdv`, `subtotal`, `kdvtotal`, `total`, `invvoice_id`, `created_at`, `updated_at`) VALUES
(8, 10, 2, 3, 18, 6, 1.08, 7.08, 48, '2024-01-20 15:58:01', '2024-01-20 15:58:01'),
(11, 13, 2, 3, 23, 6, 1.38, 7.38, 50, '2024-01-20 18:03:27', '2024-01-20 18:03:27'),
(12, 13, 2, 3, 6, 2, 1.38, 7.38, 51, '2024-01-28 12:28:06', '2024-01-28 12:28:06'),
(13, 12, 2, 33, 22, 66, 14.52, 80.52, 47, '2024-01-28 12:28:06', '2024-01-28 12:28:06'),
(14, 13, 2, 3, 6, 2, 1.38, 7.38, 52, '2024-01-28 12:28:22', '2024-01-28 12:28:22'),
(15, 12, 2, 33, 22, 66, 14.52, 80.52, 52, '2024-01-28 12:28:22', '2024-01-28 12:28:22'),
(134, 13, 2, 3, 2, 2, 1.38, 7.38, 46, '2024-02-04 15:03:22', '2024-02-04 15:03:22'),
(135, 12, NULL, NULL, NULL, NULL, 0, 0, 46, '2024-02-04 15:03:22', '2024-02-04 15:03:22'),
(139, 13, 2, 3, 2, 2, 1.38, 7.38, 53, '2024-02-04 15:11:37', '2024-02-04 15:11:37'),
(140, 13, 3, 2, 23, 6, 1.38, 7.38, 53, '2024-02-04 15:11:37', '2024-02-04 15:11:37'),
(145, 10, 2, 3, 18, 6, 1.08, 7.08, 47, '2024-02-04 15:16:30', '2024-02-04 15:16:30'),
(151, 14, NULL, NULL, 19, 0, 0, 0, 65, '2024-02-04 15:24:31', '2024-02-04 15:24:31'),
(152, 14, 2, 3, 19, 6, 1.14, 7.14, 66, '2024-02-04 15:24:40', '2024-02-04 15:24:40'),
(153, 14, 2, 3, 19, 6, 1.14, 7.14, 67, '2024-02-04 15:24:52', '2024-02-04 15:24:52'),
(155, 14, NULL, NULL, 19, 0, 0, 0, 71, '2024-02-04 15:29:22', '2024-02-04 15:29:22'),
(156, 14, 1, 1, 19, 1, 0.19, 1.19, 72, '2024-02-04 15:30:15', '2024-02-04 15:30:15'),
(157, 12, 2, 33, 0, 66, 0, 66, 70, '2024-04-06 20:19:56', '2024-04-06 20:19:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_25_192300_create_customers_table', 1),
(6, '2023_11_25_192934_create_banks_table', 1),
(7, '2023_11_25_193335_create_invoices_table', 1),
(9, '2023_11_25_193921_create_pencils_table', 1),
(10, '2023_11_25_194152_create_payments_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2023_12_16_135652_create_financial_statements_table', 2),
(13, '2023_11_25_193639_create_invoice_transactions_table', 3),
(14, '2024_04_06_132505_add_photo_to_users_table', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1 ise ödeme 0 ise tahsilat',
  `customer_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `bank_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `payments`
--

INSERT INTO `payments` (`id`, `type`, `customer_id`, `invoice_id`, `price`, `date`, `bank_id`, `description`, `created_at`, `updated_at`) VALUES
(8, 0, 35, 67, 22, '2024-03-22', 4, 'lll', '2024-03-31 06:43:28', '2024-03-31 06:43:28'),
(9, 0, 33, 67, 666, '2024-03-31', 1, NULL, '2024-03-31 06:43:46', '2024-03-31 06:43:46'),
(10, 0, 35, 47, 2323, '2024-03-31', 1, NULL, '2024-03-31 06:44:30', '2024-03-31 06:44:30'),
(11, 0, 35, 66, 22, '2024-02-04', 1, NULL, '2024-03-31 08:11:46', '2024-03-31 08:11:46'),
(12, 0, 35, 65, 2323, '2024-02-04', 1, NULL, '2024-03-31 08:12:00', '2024-03-31 08:12:00'),
(13, 1, 33, 52, 20000, '2024-03-31', 1, '222', '2024-03-31 08:16:07', '2024-03-31 08:16:07'),
(14, 1, 33, 48, 2, '2024-03-31', 1, NULL, '2024-03-31 08:16:36', '2024-03-31 08:16:36'),
(15, 0, 33, 71, 3.25, '2024-02-04', 4, '2', '2024-03-31 08:26:55', '2024-03-31 08:26:55'),
(16, 1, 33, 46, 2.34, '2024-03-31', 4, 's', '2024-03-31 08:27:23', '2024-03-31 08:27:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pencils`
--

CREATE TABLE `pencils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pencil_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
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
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Custom User', 'custom@example.com', NULL, '$2y$12$EQ9B3WyPuMvcSjMbP2BKxeT3aRjGAdwKaxUA8MaZFXDCZKL3a6uw6', NULL, NULL, NULL, NULL),
(2, 'fatih avcı', 'fatih@test.com', NULL, '$2y$12$FeY7g8.B/mUZfWhEiHD/3uZoBWp3BqG7YZKCs1NYXcvSxj8609tiW', NULL, NULL, '2024-04-06 11:11:44', 'photo/H0fTp2LXgDdcccIcDRKPxJBNMHSi3wxJEixVyyDp.jpg'),
(3, 'JOHN DOE', 'John Doe', NULL, '$2y$12$5AA/fEzll1uj4HFRsQ9LtuWMW/cXOzpKqxahWEKtvV4jWWV95Ou8S', NULL, '2023-12-12 04:50:20', '2023-12-12 04:50:20', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `financial_statements`
--
ALTER TABLE `financial_statements`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `invoice_transactions`
--
ALTER TABLE `invoice_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_transactions_invvoice_id_foreign` (`invvoice_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pencils`
--
ALTER TABLE `pencils`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `financial_statements`
--
ALTER TABLE `financial_statements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `invoice_transactions`
--
ALTER TABLE `invoice_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `pencils`
--
ALTER TABLE `pencils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `invoice_transactions`
--
ALTER TABLE `invoice_transactions`
  ADD CONSTRAINT `invoice_transactions_invvoice_id_foreign` FOREIGN KEY (`invvoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
