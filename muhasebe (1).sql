-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 May 2024, 14:18:15
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

--
-- Tablo döküm verisi `banks`
--

INSERT INTO `banks` (`id`, `name`, `iban`, `account_number`, `created_at`, `updated_at`) VALUES
(4, 'Ziraat Katılım', 'tr355437745', '64997545', '2024-02-28 12:03:07', '2024-02-28 12:03:07'),
(6, 'Garanti', '123456', '1233', '2024-04-18 05:09:46', '2024-04-18 05:17:47'),
(9, 'testw2211', '1', '2', '2024-04-18 05:18:03', '2024-04-18 06:17:15'),
(10, 'elma', NULL, NULL, '2024-04-19 08:40:04', '2024-04-19 08:40:04');

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
(33, 0, 'fatih', 'avcı', NULL, 'images/IHiqu2hjuGEIk5H3L6o2mXNrQYBCfYPDpbd4pvPL.jpg', '2023-12-08', 3453, '34', NULL, NULL, NULL, NULL, '2023-12-11 03:54:41', '2024-04-17 08:58:52'),
(35, 1, 'esmanur', 'avcı', '66fatihavci@gmail.com', 'images/8t2TdwB6ZPY5fJGHNX1a0E3hs9epL9ZFF6nxpril.jpg', '2024-01-30', 24324, '34', '1', 'netgsm', '2342', '2342', '2024-01-10 08:24:14', '2024-04-06 11:03:32');

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
(12, 1, 'gider kalem', 22, '2024-01-20 16:14:26', '2024-01-20 16:14:26'),
(14, 0, 'kalem 2', 19, '2024-01-20 16:15:05', '2024-01-20 16:15:05'),
(15, 0, '2222', 1, '2024-01-23 16:30:17', '2024-04-18 08:36:54'),
(16, 0, 'test1', 18, '2024-04-18 08:29:54', '2024-04-18 08:29:54');

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
(95, 0, '3', 33, '2024-04-22', '2024-04-22 09:26:27', '2024-04-24 07:45:50'),
(98, 0, '5545', 33, '2024-04-24', '2024-04-24 07:55:15', '2024-04-24 07:55:15'),
(99, 1, '123', 33, '2024-04-26', '2024-04-24 08:00:40', '2024-04-30 08:03:20'),
(100, 0, '65+65', 33, '2024-04-24', '2024-04-24 08:03:53', '2024-04-24 08:03:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoice_transactions`
--

CREATE TABLE `invoice_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pencil_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 1,
  `amount` int(11) DEFAULT 1,
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

INSERT INTO `invoice_transactions` (`id`, `pencil_id`, `product_id`, `amount`, `price`, `kdv`, `subtotal`, `kdvtotal`, `total`, `invvoice_id`, `created_at`, `updated_at`) VALUES
(290, 14, 3, 222, 1, 19, 222, 42.18, 264.18, 95, '2024-04-24 07:49:19', '2024-04-24 07:49:19'),
(293, 14, 3, 2, 3, 6, 2, 0.06, 6.06, 98, '2024-04-24 07:57:17', '2024-04-24 07:57:17'),
(294, 14, 3, 9, 2, 18, 9, 1.44, 19.44, 98, '2024-04-24 07:57:17', '2024-04-24 07:57:17'),
(302, 14, 3, 2, 3, 6, 2, 1.14, 7.14, 100, '2024-04-30 04:37:31', '2024-04-30 04:37:31'),
(303, 12, 3, 1500, 2, 3000, 1500, 60, 3060, 99, '2024-04-30 08:03:20', '2024-04-30 08:03:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loggers`
--

CREATE TABLE `loggers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `loggers`
--

INSERT INTO `loggers` (`id`, `text`, `operation`, `created_at`, `updated_at`) VALUES
(1, 'albaraka adında yeni bir banka eklendi', 'Bank created.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(2, 'test adında yeni bir banka eklendi', 'Bank created.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(3, 'testw2211 adında banka güncellendi', 'Bank updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(4, 'kuveyt adında banka silindi', 'Bank deleted.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(5, 'Bogus Gateway 343 adında yeni bir müşteri eklendi', 'Customer created.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(6, 'Bogus Gatewayq 343 adında müşteri düzenlendi', 'Customer updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(7, 'Bogus Gatewayq 343 adında müşteri silindi', 'Customer deleted.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(8, 'test1 adında gelir/gider kalemi eklendi', 'Financial Statement created.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(9, '222 adında gelir/gider kalemi düzenlendi', 'Financial Statement updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(10, '2222 adında gelir/gider kalemi düzenlendi', 'Financial Statement updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(11, '22 adında gelir/gider kalemi düzenlendi', 'Financial Statement updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(12, '222 adında gelir/gider kalemi düzenlendi', 'Financial Statement updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(13, '2222 adında gelir/gider kalemi düzenlendi', 'Financial Statement updated.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(14, 'kalem 12 adında gelir/gider kalemi silindi', 'Financial Statement deleted.', '2024-04-18 08:39:54', '2024-04-18 08:39:54'),
(15, '1222 numaralı fatura eklendi', 'Invoice added.', '2024-04-18 09:09:59', '2024-04-18 09:09:59'),
(16, '67 numaralı fatura düzenlendi', 'Invoice updated.', '2024-04-18 09:10:38', '2024-04-18 09:10:38'),
(17, '6647 numaralı fatura silindi', 'Invoice deleted.', '2024-04-18 09:13:32', '2024-04-18 09:13:32'),
(18, '12 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-18 09:20:15', '2024-04-18 09:20:15'),
(19, '20000 tutarında ödeme/tahsilat düzenlendi', 'Payment updated.', '2024-04-18 09:20:39', '2024-04-18 09:20:39'),
(20, '20000 tutarında ödeme/tahsilat silindi', 'Payment deleted.', '2024-04-18 09:20:55', '2024-04-18 09:20:55'),
(21, 'albaraka adında banka silindi', 'Bank deleted.', NULL, NULL),
(22, 'elma adında yeni bir banka eklendi', 'Bank created.', '2024-04-19 08:40:04', '2024-04-19 08:40:04'),
(23, 'Ziraat Bnk adında banka silindi', 'Bank deleted.', NULL, NULL),
(24, '2 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 08:43:04', '2024-04-22 08:43:04'),
(26, '334 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 08:51:11', '2024-04-22 08:51:11'),
(27, '2 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 08:51:39', '2024-04-22 08:51:39'),
(28, 'gider kalem 2 adında gelir/gider kalemi silindi', 'Financial Statement deleted.', '2024-04-22 08:53:24', '2024-04-22 08:53:24'),
(29, '660601 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 08:53:55', '2024-04-22 08:53:55'),
(37, '66012 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:03:43', '2024-04-22 09:03:43'),
(38, '123123 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:05:03', '2024-04-22 09:05:03'),
(39, '23432 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:05:38', '2024-04-22 09:05:38'),
(40, '2 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:06:07', '2024-04-22 09:06:07'),
(41, '3 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:07:01', '2024-04-22 09:07:01'),
(42, '222 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:07:30', '2024-04-22 09:07:30'),
(43, '12313 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:08:46', '2024-04-22 09:08:46'),
(44, '1 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:09:19', '2024-04-22 09:09:19'),
(45, '12 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:22:05', '2024-04-22 09:22:05'),
(46, '3 numaralı fatura eklendi', 'Invoice added.', '2024-04-22 09:26:27', '2024-04-22 09:26:27'),
(47, '95 numaralı fatura düzenlendi', 'Invoice updated.', '2024-04-22 09:29:20', '2024-04-22 09:29:20'),
(79, '95 numaralı fatura düzenlendi', 'Invoice updated.', '2024-04-22 10:20:29', '2024-04-22 10:20:29'),
(80, '95 numaralı fatura düzenlendi', 'Invoice updated.', '2024-04-24 04:10:28', '2024-04-24 04:10:28'),
(85, '95 numaralı fatura düzenlendi', 'Invoice updated.', '2024-04-24 07:45:50', '2024-04-24 07:45:50'),
(90, '5545 numaralı fatura eklendi', 'Invoice added.', '2024-04-24 07:55:15', '2024-04-24 07:55:15'),
(91, '123 numaralı fatura eklendi', 'Invoice added.', '2024-04-24 08:00:40', '2024-04-24 08:00:40'),
(92, '65+65 numaralı fatura eklendi', 'Invoice added.', '2024-04-24 08:03:53', '2024-04-24 08:03:53'),
(93, '320.81 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-25 08:33:18', '2024-04-25 08:33:18'),
(94, '264.18 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-25 08:36:21', '2024-04-25 08:36:21'),
(95, '264.18 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-25 08:36:40', '2024-04-25 08:36:40'),
(96, '3455 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-25 08:38:36', '2024-04-25 08:38:36'),
(97, '12 numaralı fatura silindi', 'Invoice deleted.', '2024-04-25 09:04:59', '2024-04-25 09:04:59'),
(98, '25.5 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-30 03:06:06', '2024-04-30 03:06:06'),
(99, '2550 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-30 03:06:53', '2024-04-30 03:06:53'),
(100, '7000.14 tutarında ödeme/tahsilat yapıldı', 'Payment created.', '2024-04-30 03:07:19', '2024-04-30 03:07:19'),
(101, '99 numaralı fatura düzenlendi', 'Invoice updated.', '2024-04-30 08:03:20', '2024-04-30 08:03:20'),
(102, '229 tutarında ödeme/tahsilat düzenlendi', 'Payment updated.', '2024-04-30 08:03:43', '2024-04-30 08:03:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'customer', NULL, NULL),
(2, 'product', NULL, NULL),
(3, 'financial', NULL, NULL),
(4, 'invoice', NULL, NULL),
(5, 'bank', NULL, NULL),
(6, 'payment', NULL, NULL),
(7, 'user', NULL, NULL),
(8, 'offer', NULL, NULL);

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
(9, '2023_11_25_193921_create_pencils_table', 1),
(10, '2023_11_25_194152_create_payments_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2023_12_16_135652_create_financial_statements_table', 2),
(13, '2023_11_25_193639_create_invoice_transactions_table', 3),
(14, '2024_04_06_132505_add_photo_to_users_table', 4),
(15, '2024_04_18_080139_create_loggers_table', 5),
(16, '2024_04_19_111727_create_products_table', 6),
(17, '2024_04_22_104956_quantity_to_products_table', 7),
(18, '2024_04_22_110128_quantity_to_products_table', 8),
(19, '2024_04_22_110231_add_quantity_column_to_products_table', 8),
(20, '2024_04_22_110346_add_quantity_column_to_products_table', 9),
(21, '2024_04_22_121822_add_product_id_column_to_invoice_transactions_table', 10),
(22, '2024_04_29_080653_create_user_page_permisions_table', 11),
(23, '2024_04_29_085022_create_permisions_table', 11),
(24, '2024_04_29_085350_create_menus_table', 11),
(26, '2024_04_29_090143_create_user_menus_table', 12),
(33, '2024_04_30_105628_create_offers_table', 13),
(35, '2024_04_30_121527_create_offer_products_table', 14),
(36, '2024_05_03_074007_add_is_admin_to_users_table', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 açık 1 onaylı',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 2, 0, '2024-05-02 11:20:47', '2024-05-02 11:20:47'),
(12, 2, 0, '2024-05-02 11:24:29', '2024-05-02 11:24:29'),
(13, 12, 0, '2024-05-03 04:47:41', '2024-05-03 04:47:41'),
(14, 2, 2, '2024-05-03 08:20:24', '2024-05-03 08:50:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `offer_product`
--

CREATE TABLE `offer_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT 0.00,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `offer_product`
--

INSERT INTO `offer_product` (`id`, `offer_id`, `name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(16, 12, 'a', 2.00, 3.00, NULL, NULL),
(17, 12, 'b', 2.00, 3.00, NULL, NULL),
(18, 13, 'test', 1.00, 2.00, NULL, NULL),
(19, 13, 'abc', 2.00, 333.00, NULL, NULL),
(31, 11, 'asss', 1.00, 2.00, NULL, NULL),
(32, 11, 'bs', 1.00, 2.00, NULL, NULL),
(33, 11, 'xsss', 1.00, 222.00, NULL, NULL),
(82, 14, 'aasdasd', 1213.00, 333.00, NULL, NULL),
(83, 14, 'assdas', 1231.00, 222.00, NULL, NULL),
(84, 14, 'ASas', 11.00, 22.00, NULL, NULL),
(85, 14, 'das', 2.00, 32.00, NULL, NULL);

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
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1 ise ödeme 0 ise tahsilat',
  `customer_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `bank_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
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
(15, 0, 33, 71, 3.25, '2024-02-04', 4, '2', '2024-03-31 08:26:55', '2024-03-31 08:26:55'),
(16, 1, 33, 46, 2.34, '2024-03-31', 4, 's', '2024-03-31 08:27:23', '2024-03-31 08:27:23'),
(17, 0, 35, 68, 254, '2024-02-04', 1, NULL, '2024-04-17 09:01:22', '2024-04-17 09:01:22'),
(18, 1, 33, 51, 12, '2024-04-18', 1, 'test', '2024-04-18 09:20:15', '2024-04-18 09:20:15'),
(19, 0, 33, 94, 320.81, '2024-04-22', 4, 'test', '2024-04-25 08:33:18', '2024-04-25 08:33:18'),
(20, 0, 33, 95, 264.18, '2024-04-25', 6, 'test', '2024-04-25 08:36:21', '2024-04-25 08:36:21'),
(21, 0, 33, 95, 264.18, '2024-04-25', 6, 'test', '2024-04-25 08:36:40', '2024-04-25 08:36:40'),
(22, 1, 33, 99, 3455, '2024-04-25', 4, 'fsfs', '2024-04-25 08:38:36', '2024-04-25 08:38:36'),
(23, 0, 33, 98, 25.5, '2024-04-24', 6, 'test', '2024-04-30 03:06:06', '2024-04-30 03:06:06'),
(24, 1, 33, 99, 2550, '2024-04-30', 4, 'teststs', '2024-04-30 03:06:53', '2024-04-30 03:06:53'),
(25, 0, 33, 100, 229, '2024-04-30', 4, NULL, '2024-04-30 03:07:19', '2024-04-30 08:03:43');

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
-- Tablo için tablo yapısı `permisions`
--

CREATE TABLE `permisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 'test', 4801.00, '2024-04-19 10:30:05', '2024-04-30 08:03:20'),
(5, 'elma', 3.00, '2024-04-22 09:03:43', '2024-04-25 08:24:39');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `is_admin`) VALUES
(2, 'fatih avcı', 'fatih@test.com', NULL, '$2y$12$FeY7g8.B/mUZfWhEiHD/3uZoBWp3BqG7YZKCs1NYXcvSxj8609tiW', NULL, NULL, '2024-04-17 03:48:28', 'photo/523ORnn70ip3SGHDUIZDDjgWDrOojgUS1OIxxlJp.png', 1),
(4, 'Ahmet AVCI', 'ahmet@test.com', NULL, '$2y$12$o6uD4vkxBmExMVm7sCNcduDP5gTEKW5v0BZKpPgLGNH5dL.dkGpk.', NULL, '2024-04-29 03:53:29', '2024-04-29 05:01:42', 'photo/BCBICUdCEMqm3HyRC2tKAY7P03GIzb1pK6G8shy3.jpg', 0),
(11, 'fatih22@test.com', 'fatih22@test.com', NULL, '$2y$12$OdIzKhBNExBie6YNbqyTRejv363.kHQAHGOrSVB76.u9i5GRVyZyW', NULL, '2024-04-30 03:37:08', '2024-04-30 03:45:55', NULL, 0),
(12, 'yüksel avcı', 'yuksel@test.com', NULL, '$2y$12$xy7iUOnJVN0WpWeYvTMAH.HnKY.Jimhy4Zcg.WuktBhNalkLEmDjO', NULL, '2024-04-30 04:11:18', '2024-04-30 04:11:41', NULL, 0),
(13, 'yuksel@test.com', 'yuksel2@test.com', NULL, '$2y$12$7/8KaRIHrYlhSw8HMzuCx.wXQdphQAGoMxYmhfZ14pw/aKnEWpJte', NULL, '2024-04-30 04:59:15', '2024-04-30 04:59:15', NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_menus`
--

CREATE TABLE `user_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_menus`
--

INSERT INTO `user_menus` (`id`, `user_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(43, 11, 1, NULL, NULL),
(44, 11, 2, NULL, NULL),
(45, 11, 5, NULL, NULL),
(46, 11, 6, NULL, NULL),
(47, 4, 2, NULL, NULL),
(48, 4, 6, NULL, NULL),
(49, 4, 7, NULL, NULL),
(63, 2, 1, NULL, NULL),
(64, 2, 2, NULL, NULL),
(65, 2, 3, NULL, NULL),
(66, 2, 4, NULL, NULL),
(67, 2, 5, NULL, NULL),
(68, 2, 6, NULL, NULL),
(69, 2, 7, NULL, NULL),
(70, 2, 8, NULL, NULL),
(71, 13, 1, NULL, NULL),
(72, 13, 6, NULL, NULL),
(73, 13, 8, NULL, NULL),
(74, 12, 1, NULL, NULL),
(75, 12, 2, NULL, NULL),
(76, 12, 6, NULL, NULL),
(77, 12, 8, NULL, NULL);

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
-- Tablo için indeksler `loggers`
--
ALTER TABLE `loggers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `offer_product`
--
ALTER TABLE `offer_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_product_offer_id_foreign` (`offer_id`);

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
-- Tablo için indeksler `permisions`
--
ALTER TABLE `permisions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `user_menus`
--
ALTER TABLE `user_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_menus_user_id_foreign` (`user_id`),
  ADD KEY `user_menus_menu_id_foreign` (`menu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `financial_statements`
--
ALTER TABLE `financial_statements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tablo için AUTO_INCREMENT değeri `invoice_transactions`
--
ALTER TABLE `invoice_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- Tablo için AUTO_INCREMENT değeri `loggers`
--
ALTER TABLE `loggers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `offer_product`
--
ALTER TABLE `offer_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `pencils`
--
ALTER TABLE `pencils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `permisions`
--
ALTER TABLE `permisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `user_menus`
--
ALTER TABLE `user_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `invoice_transactions`
--
ALTER TABLE `invoice_transactions`
  ADD CONSTRAINT `invoice_transactions_invvoice_id_foreign` FOREIGN KEY (`invvoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `offer_product`
--
ALTER TABLE `offer_product`
  ADD CONSTRAINT `offer_product_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_menus`
--
ALTER TABLE `user_menus`
  ADD CONSTRAINT `user_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
