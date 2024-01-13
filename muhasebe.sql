-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Oca 2024, 08:34:01
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.1.17

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
  `name` varchar(255) NOT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `tc_no` bigint(11) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `tax_office` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `customer_type`, `name`, `surname`, `email`, `photo`, `birthday`, `tc_no`, `adress`, `number`, `company_name`, `tax_number`, `tax_office`, `created_at`, `updated_at`) VALUES
(33, 0, '34543', '343', NULL, 'images/nuHxk0hxqryPUefOosBTRTUmtfKHyYsZ9DH5gr8d.png', '2023-12-08', 3453, '34', NULL, NULL, NULL, NULL, '2023-12-11 03:54:41', '2023-12-11 03:54:41'),
(35, 1, 'test', 'test', '66fatihavci@gmail.com', 'images/YFFFtMw0LbwUT4ns8rTFyRIfbiP4YtBjO8vBeVxf.jpg', '2024-01-30', 24324, '34', '1', 'netgsm', '2342', '2342', '2024-01-10 08:24:14', '2024-01-10 08:24:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `financial_statements`
--

CREATE TABLE `financial_statements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `kdv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `financial_statements`
--

INSERT INTO `financial_statements` (`id`, `type`, `name`, `kdv`, `created_at`, `updated_at`) VALUES
(10, 0, 'kalem 1', 18, '2024-01-10 11:28:48', '2024-01-10 11:28:48'),
(11, 1, 'kalem2', 20, '2024-01-10 11:28:56', '2024-01-12 03:11:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 ise gelir , 1 ise gider',
  `invoice_no` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_type`, `invoice_no`, `customer_id`, `invoice_date`, `created_at`, `updated_at`) VALUES
(26, 0, '123', 35, '2024-01-11', '2024-01-11 08:24:27', '2024-01-11 08:24:27'),
(28, 0, '132123', 35, '2024-01-11', '2024-01-11 08:32:09', '2024-01-11 08:32:09'),
(31, 0, '3', 35, '2024-01-11', '2024-01-11 08:36:02', '2024-01-11 08:36:02'),
(33, 0, '12', 33, '2024-01-11', '2024-01-11 08:36:48', '2024-01-11 08:36:48'),
(34, 0, '4554', 33, '2024-01-11', '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(35, 0, '12', 33, '2024-01-11', '2024-01-11 08:42:39', '2024-01-11 08:42:39'),
(36, 0, '1231', 35, '2024-01-11', '2024-01-11 08:42:49', '2024-01-11 08:42:49'),
(37, 0, '1231', 33, '2024-01-11', '2024-01-11 08:43:15', '2024-01-11 08:43:15'),
(38, 0, '112', 33, '2024-01-19', '2024-01-12 03:12:11', '2024-01-12 03:12:11'),
(39, 0, '11', 35, '2024-01-12', '2024-01-12 04:08:54', '2024-01-12 04:08:54'),
(40, 0, '11', 35, '2024-01-12', '2024-01-12 04:11:40', '2024-01-12 04:11:40'),
(41, 0, '123', 33, '2024-01-12', '2024-01-12 04:32:54', '2024-01-12 04:32:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoice_transactions`
--

CREATE TABLE `invoice_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invvoice_id` int(11) DEFAULT NULL,
  `pencil_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `kdv` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `kdvtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `invoice_transactions`
--

INSERT INTO `invoice_transactions` (`id`, `invvoice_id`, `pencil_id`, `amount`, `price`, `kdv`, `subtotal`, `kdvtotal`, `total`, `created_at`, `updated_at`) VALUES
(41, 26, 10, 3, 4, 18, 12, 2.16, 14.16, '2024-01-11 08:24:27', '2024-01-11 08:24:27'),
(42, 28, 10, 21313, 13123, 18, 279690499, 50344289.82, 330034788.82, '2024-01-11 08:32:09', '2024-01-11 08:32:09'),
(43, 28, 11, 42, 34, 20, 1428, 285.6, 1713.6, '2024-01-11 08:32:09', '2024-01-11 08:32:09'),
(44, 31, 10, NULL, NULL, 18, 0, 0, 0, '2024-01-11 08:36:02', '2024-01-11 08:36:02'),
(45, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:36:48', '2024-01-11 08:36:48'),
(46, 34, 10, NULL, NULL, 18, 0, 0, 0, '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(47, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(48, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(49, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(50, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(51, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:39:04', '2024-01-11 08:39:04'),
(52, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:42:39', '2024-01-11 08:42:39'),
(53, 36, 10, NULL, NULL, 18, 0, 0, 0, '2024-01-11 08:42:49', '2024-01-11 08:42:49'),
(54, 36, 11, NULL, NULL, 20, 0, 0, 0, '2024-01-11 08:42:49', '2024-01-11 08:42:49'),
(55, 37, 10, 23, 3, 18, 69, 12.42, 81.42, '2024-01-11 08:43:15', '2024-01-11 08:43:15'),
(56, 38, 11, 3, 4, 20, 12, 2.4, 14.4, '2024-01-12 03:12:11', '2024-01-12 03:12:11'),
(57, 39, 10, NULL, NULL, 18, 0, 0, 0, '2024-01-12 04:08:54', '2024-01-12 04:08:54'),
(58, 40, 10, NULL, NULL, 18, 0, 0, 0, '2024-01-12 04:11:40', '2024-01-12 04:11:40'),
(59, 41, 10, 2, 3, 18, 6, 1.08, 7.08, '2024-01-12 04:32:54', '2024-01-12 04:32:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(8, '2023_11_25_193639_create_invoice_transactions_table', 1),
(9, '2023_11_25_193921_create_pencils_table', 1),
(10, '2023_11_25_194152_create_payments_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2023_12_16_135652_create_financial_statements_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0 ise ödeme 1 ise tahsilat',
  `customer_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `bank_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pencils`
--

CREATE TABLE `pencils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pencil_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Custom User', 'custom@example.com', NULL, '$2y$12$EQ9B3WyPuMvcSjMbP2BKxeT3aRjGAdwKaxUA8MaZFXDCZKL3a6uw6', NULL, NULL, NULL),
(2, 'Fatih User', 'fatih@test.com', NULL, '$2y$12$9EJNehkqAlvUP87pM54uLOgWHvd9AWKvCPGlm3Gkx8zkJMLLt8g1y', NULL, NULL, NULL),
(3, 'JOHN DOE', 'John Doe', NULL, '$2y$12$5AA/fEzll1uj4HFRsQ9LtuWMW/cXOzpKqxahWEKtvV4jWWV95Ou8S', NULL, '2023-12-12 04:50:20', '2023-12-12 04:50:20');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `invoice_transactions`
--
ALTER TABLE `invoice_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
