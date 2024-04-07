-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for management_1
DROP DATABASE IF EXISTS `management_1`;
CREATE DATABASE IF NOT EXISTS `management_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `management_1`;

-- Dumping structure for table management_1.brands
DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  `ownerName` varchar(255) NOT NULL,
  `numberOfCrates` varchar(255) NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `company_idd` varchar(50) DEFAULT NULL,
  `is_delete` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brands_company_id_foreign` (`company_id`),
  KEY `brands_brandname_index` (`brandName`),
  CONSTRAINT `brands_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.brands: ~2 rows (approximately)
INSERT INTO `brands` (`id`, `brandName`, `ownerName`, `numberOfCrates`, `company_id`, `company_idd`, `is_delete`, `created_at`, `updated_at`) VALUES
	(1, 'whirlpool', 'ahad', '4', NULL, 'affy9629', 0, '2024-04-07 01:40:31', NULL),
	(2, 'apple', 'arsalan', '6', NULL, 'affy1111', 1, '2024-04-07 01:59:48', NULL);

-- Dumping structure for table management_1.companies
DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `admins_company_name_index` (`company_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.companies: ~2 rows (approximately)
INSERT INTO `companies` (`company_id`, `company_name`, `user_name`, `user_id`, `email`, `password`, `mobile`, `usertype`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
	(1, 'CRYPTO TECHNOCRAFT PRIVATE LIMITED', 'admin', 'affy9629', 'ahadkhalid117@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '07974857585', 0, 0, 0, NULL, NULL),
	(3, 'GOOGLE', 'admin', 'affy1111', 'ahadkhalid118@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9806734272', 0, 0, 0, NULL, NULL);

-- Dumping structure for table management_1.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `company_idd` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_company_id_foreign` (`company_id`),
  KEY `customers_customername_index` (`customerName`),
  CONSTRAINT `customers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.customers: ~0 rows (approximately)

-- Dumping structure for table management_1.customer_orders
DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `units` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `customer_idd` bigint(20) unsigned NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `brand_id` bigint(20) unsigned NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_orders_customer_id_foreign` (`customer_id`),
  KEY `customer_orders_customername_foreign` (`customerName`),
  KEY `customer_orders_brand_id_foreign` (`brand_id`),
  KEY `customer_orders_brandname_foreign` (`brandName`),
  CONSTRAINT `customer_orders_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `customer_orders_brandname_foreign` FOREIGN KEY (`brandName`) REFERENCES `brands` (`brandName`),
  CONSTRAINT `customer_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `customer_orders_customername_foreign` FOREIGN KEY (`customerName`) REFERENCES `customers` (`customerName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.customer_orders: ~0 rows (approximately)

-- Dumping structure for table management_1.dealers
DROP TABLE IF EXISTS `dealers`;
CREATE TABLE IF NOT EXISTS `dealers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `brand_id` bigint(20) unsigned NOT NULL,
  `units` int(11) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `company_idd` bigint(20) unsigned DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dealers_customer_id_foreign` (`customer_id`),
  KEY `dealers_brand_id_foreign` (`brand_id`),
  KEY `dealers_company_id_foreign` (`company_id`),
  CONSTRAINT `dealers_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `dealers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  CONSTRAINT `dealers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.dealers: ~0 rows (approximately)

-- Dumping structure for table management_1.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table management_1.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.migrations: ~11 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2014_04_01_140843_create_admins_table', 1),
	(4, '2014_10_12_000000_create_users_table', 1),
	(5, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(6, '2019_08_19_000000_create_failed_jobs_table', 1),
	(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(8, '2024_03_29_100148_create_brands_table', 1),
	(9, '2024_03_29_125254_create_customers_table', 1),
	(10, '2024_03_31_051938_create_dealers_table', 1),
	(11, '2024_04_02_054017_create_super_admins_table', 1),
	(12, '2024_04_02_081830_create_customer_orders_table', 1),
	(13, '2024_04_02_093519_add_user_id_to_admins_table', 1);

-- Dumping structure for table management_1.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table management_1.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table management_1.super_admins
DROP TABLE IF EXISTS `super_admins`;
CREATE TABLE IF NOT EXISTS `super_admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT 0,
  `usertype` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `super_admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.super_admins: ~1 rows (approximately)
INSERT INTO `super_admins` (`id`, `companyName`, `userName`, `mobile`, `email`, `email_verified_at`, `flag`, `usertype`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'SuperAdmin', '777777777', 'admin@gmail.com', NULL, 0, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- Dumping structure for table management_1.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT 0,
  `mobile` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `company_idd` varchar(50) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `is_delete` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_company_id_foreign` (`company_id`),
  KEY `users_company_name_foreign` (`company_name`),
  CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  CONSTRAINT `users_company_name_foreign` FOREIGN KEY (`company_name`) REFERENCES `companies` (`company_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `flag`, `mobile`, `usertype`, `password`, `company_id`, `company_idd`, `company_name`, `remember_token`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
	(5, 'admin', 'ahadkhalid117@gmail.com', NULL, 0, '777777777777777', 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'affy1111', 'GOOGLE', NULL, 0, 0, NULL, NULL),
	(6, 'ahad.khalidd', 'ahad@gmail.com', NULL, 0, '7974857585', 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'affy1111', 'GOOGLE', NULL, 0, 0, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
