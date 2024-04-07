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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.brands: ~22 rows (approximately)
INSERT INTO `brands` (`id`, `brandName`, `ownerName`, `numberOfCrates`, `company_id`, `company_idd`, `is_delete`, `created_at`, `updated_at`) VALUES
	(4, 'apple', 'ahad', '4', NULL, 'affy9629', 0, '2024-04-07 08:24:46', NULL),
	(5, 'samsung', 'john', '7', NULL, 'affy9629', 0, '2023-10-15 03:51:30', NULL),
	(6, 'nike', 'emma', '12', NULL, 'affy9629', 0, '2022-12-30 13:15:00', NULL),
	(7, 'adidas', 'michael', '9', NULL, 'affy9629', 0, '2022-11-05 05:40:20', NULL),
	(8, 'google', 'susan', '15', NULL, 'affy9629', 0, '2023-05-20 09:00:55', NULL),
	(9, 'amazon', 'david', '20', NULL, 'affy9629', 0, '2022-09-10 01:42:48', NULL),
	(10, 'tesla', 'mark', '6', NULL, 'affy9629', 0, '2023-03-18 11:08:12', NULL),
	(11, 'microsoft', 'laura', '10', NULL, 'affy9629', 0, '2024-01-05 14:30:30', NULL),
	(12, 'huawei', 'kevin', '8', NULL, 'affy9629', 0, '2023-08-25 07:15:55', NULL),
	(13, 'toyota', 'emily', '18', NULL, 'affy9629', 0, '2022-07-12 04:20:15', NULL),
	(14, 'cocacola', 'chris', '14', NULL, 'affy9629', 0, '2023-06-28 12:25:40', NULL),
	(15, 'pepsi', 'linda', '11', NULL, 'affy9629', 0, '2022-04-04 07:55:00', NULL),
	(16, 'mcdonalds', 'steve', '22', NULL, 'affy9629', 0, '2023-02-15 02:30:00', NULL),
	(17, 'bmw', 'jessica', '5', NULL, 'affy9629', 0, '2022-05-30 04:45:30', NULL),
	(18, 'mercedes', 'matt', '13', NULL, 'affy9629', 0, '2023-11-10 06:15:20', NULL),
	(19, 'sony', 'olivia', '17', NULL, 'affy9629', 0, '2022-08-20 10:00:45', NULL),
	(20, 'nintendo', 'alex', '19', NULL, 'affy9629', 0, '2023-07-05 13:50:10', NULL),
	(21, 'lg', 'ryan', '3', NULL, 'affy9629', 0, '2022-10-25 08:40:55', NULL),
	(22, 'starbucks', 'jennifer', '16', NULL, 'affy9629', 0, '2024-03-02 04:10:30', NULL),
	(23, 'facebook', 'eric', '21', NULL, 'affy9629', 0, '2023-04-15 12:30:00', NULL),
	(24, 'ab', 'cd', '66', NULL, 'affy9629', 0, '2024-04-07 09:23:31', NULL),
	(25, 'aaa', 'bbbbb', '55', NULL, 'affy9629', 0, '2024-04-07 09:24:36', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table management_1.companies: ~3 rows (approximately)
INSERT INTO `companies` (`company_id`, `company_name`, `user_name`, `user_id`, `email`, `password`, `mobile`, `usertype`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
	(1, 'CRYPTO TECHNOCRAFT PRIVATE LIMITED', 'admin', 'affy9629', 'ahadkhalid117@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '07974857585', 0, 0, 0, NULL, NULL),
	(3, 'GOOGLE', 'admin', 'affy1111', 'ahadkhalid118@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9806734272', 0, 0, 0, NULL, NULL),
	(4, 'CRYPTO TECHNOCRAFT PRIVATE LIMITED', 'admin', 'affy4769', 'ahadkhalid117@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', '07974857585', 0, 0, 0, '2024-04-07 08:14:10', NULL);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_idd` varchar(50) NOT NULL,
  `dealer_name` varchar(50) NOT NULL,
  `dealer_no` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `is_delete` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table management_1.dealers: ~11 rows (approximately)
INSERT INTO `dealers` (`id`, `company_idd`, `dealer_name`, `dealer_no`, `status`, `is_delete`, `created_date`) VALUES
	(3, 'affy9629', 'ahadd', '9806734272', 0, 0, '2024-04-07 14:22:10'),
	(5, 'affy9629', 'Jane Smith', '9876543210', 0, 0, '2024-04-07 14:22:10'),
	(6, 'affy9629', 'Michael Johnson', '5555555555', 0, 0, '2024-04-07 14:22:10'),
	(8, 'affy9629', 'David Wilson', '9999999999', 0, 0, '2024-04-07 14:22:10'),
	(10, 'affy9629', 'James Miller', '2222222222', 0, 0, '2024-04-07 14:22:10'),
	(12, 'affy9629', 'Daniel Anderson', '4444444444', 0, 0, '2024-04-07 14:22:10'),
	(14, 'affy9629', 'Ethan Martinez', '6666666666', 0, 0, '2024-04-07 14:22:10'),
	(16, 'affy9629', 'William Smith', '8888888888', 0, 0, '2024-04-07 14:22:10'),
	(18, 'affy9629', 'Alexander Williams', '1010101010', 0, 0, '2024-04-07 14:22:10'),
	(20, 'affy9629', 'Benjamin Wilson', '3030303030', 0, 0, '2024-04-07 14:22:10'),
	(21, 'affy9629', 'khalid', '', 0, 0, '2024-04-07 14:53:06');

-- Dumping structure for table management_1.dealers_orders
DROP TABLE IF EXISTS `dealers_orders`;
CREATE TABLE IF NOT EXISTS `dealers_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_idd` varchar(50) DEFAULT NULL,
  `dealer_id` varchar(50) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `vehicle_number` varchar(255) DEFAULT NULL,
  `company_idd` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_delete` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table management_1.dealers_orders: ~1 rows (approximately)
INSERT INTO `dealers_orders` (`id`, `brand_idd`, `dealer_id`, `units`, `vehicle_number`, `company_idd`, `date`, `created_at`, `updated_at`, `is_delete`) VALUES
	(3, '24,23,22', '3', 'Jama', '777777777', 'affy9629', '2024-04-07', '2024-04-07 15:13:10', '2024-04-07 15:37:17', 0);

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
