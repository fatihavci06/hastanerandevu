-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Kas 2021, 12:13:46
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastaneran`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_15_111253_create_randevus_table', 1),
(6, '2021_10_15_111547_create_saats_table', 1),
(7, '2021_11_01_201351_create_randevunots_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevunots`
--

DROP TABLE IF EXISTS `randevunots`;
CREATE TABLE IF NOT EXISTS `randevunots` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `randevu_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `randevunots`
--

INSERT INTO `randevunots` (`id`, `randevu_id`, `text`, `created_at`, `updated_at`) VALUES
(21, 40, 'ADSA', '2021-11-02 11:05:55', '2021-11-02 11:05:55'),
(20, 40, '1232131', '2021-11-02 11:05:52', '2021-11-02 11:05:52'),
(19, 40, 'TEST', '2021-11-02 11:05:49', '2021-11-02 11:05:49'),
(17, 39, 'asa', '2021-11-01 18:34:59', '2021-11-01 18:34:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevus`
--

DROP TABLE IF EXISTS `randevus`;
CREATE TABLE IF NOT EXISTS `randevus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `workingHour` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `notification_type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAktive` int(11) NOT NULL DEFAULT 0,
  `isSend` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `randevus`
--

INSERT INTO `randevus` (`id`, `fullname`, `phone`, `email`, `date`, `workingHour`, `text`, `code`, `notification_type`, `created_at`, `updated_at`, `isAktive`, `isSend`) VALUES
(36, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-10-30', 138, NULL, '', 0, '2021-10-30 16:50:33', '2021-10-30 16:51:15', 1, 0),
(37, 'Paragon Teknoloji', '03-334-522-52-8', 'paragonteknoloi@gmail.com', '2021-10-30', 139, NULL, '', 0, '2021-10-30 16:50:53', '2021-10-30 16:59:06', 2, 0),
(38, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-10-02', 138, NULL, '', 0, '2021-10-30 16:57:06', '2021-10-30 16:57:19', 1, 0),
(39, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-06', 139, NULL, '', 0, '2021-10-30 16:59:40', '2021-10-30 16:59:48', 1, 0),
(40, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-02', 130, NULL, '670a16', 1, '2021-11-02 08:23:54', '2021-11-02 08:23:54', 0, 0),
(41, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-03', 132, NULL, 'ac44ea', 1, '2021-11-03 11:39:05', '2021-11-03 11:46:22', 1, 1),
(42, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-10-30', 138, NULL, '', 0, '2021-10-30 16:50:33', '2021-10-30 16:51:15', 1, 0),
(43, 'Paragon Teknoloji', '03-334-522-52-8', 'paragonteknoloi@gmail.com', '2021-10-30', 139, NULL, '', 0, '2021-10-30 16:50:53', '2021-10-30 16:59:06', 2, 0),
(44, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-10-02', 138, NULL, '', 0, '2021-10-30 16:57:06', '2021-10-30 16:57:19', 1, 0),
(45, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-06', 139, NULL, '', 0, '2021-10-30 16:59:40', '2021-10-30 16:59:48', 1, 0),
(46, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-02', 130, NULL, '670a16', 1, '2021-11-02 08:23:54', '2021-11-02 08:23:54', 0, 0),
(47, 'fatih', '90-553-110-52-00', '66fatihavci@gmail.com', '2021-11-03', 132, NULL, 'ac44ea', 1, '2021-11-03 11:39:05', '2021-11-03 11:46:22', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saats`
--

DROP TABLE IF EXISTS `saats`;
CREATE TABLE IF NOT EXISTS `saats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` varchar(300) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `saats`
--

INSERT INTO `saats` (`id`, `day`, `hours`, `created_at`, `updated_at`) VALUES
(127, '1', '11', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(128, '1', '12', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(129, '2', '11', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(130, '2', '12', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(131, '3', '14', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(132, '3', '15', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(133, '4', '11.00-12.00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(134, '4', '13.44-15.00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(135, '5', '11.00-12.00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(136, '5', '12-00-13-00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(137, '5', '14.00-15.00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(138, '6', '20.00-21.00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(139, '6', '21.00-22.00', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(140, '7', '13', '2021-10-30 16:49:46', '2021-10-30 16:49:46'),
(141, '7', '14', '2021-10-30 16:49:46', '2021-10-30 16:49:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
