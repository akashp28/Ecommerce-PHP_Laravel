-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 11:39 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(20, 5, 4, 1, 500, '2024-03-18 06:25:59', '2024-03-18 06:25:59'),
(27, 2, 4, 1, 800, '2024-03-19 06:28:20', '2024-03-19 06:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subcategory_count` int(11) NOT NULL DEFAULT 0,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `subcategory_count`, `product_count`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', 2, 3, NULL, '2024-03-14 05:53:37'),
(3, 'Clothing', 'clothing', 2, 1, NULL, '2024-03-13 00:56:19'),
(4, 'Fruits and Vegetables', 'fruits-and-vegetables', 1, 1, NULL, '2024-03-14 02:53:12'),
(5, 'Sweets and Bakery', 'sweets-and-bakery', 2, 1, NULL, '2024-03-21 05:08:54'),
(6, 'Sports', 'sports', 2, 3, NULL, '2024-03-21 05:35:11'),
(8, 'Books', 'books', 1, 2, NULL, '2024-03-21 06:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` bigint(11) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `number`, `message`, `status`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test@mail.com', 8909088908, 'hi this is test message', 'Pending', NULL, NULL),
(5, 'test2', 'test2@mail.com', 9761234567, 'Warranty issue', 'Pending', '2024-03-18 02:53:13', '2024-03-18 02:53:13'),
(10, 'user', 'user@mail.com', 9098909098, 'products are less', 'Pending', '2024-03-19 04:53:38', '2024-03-19 04:53:38'),
(12, 'akash', 'akash.parikkal08@gmail.com', 9400691906, 'test', 'Replied', '2024-03-22 01:28:47', '2024-03-22 03:15:41');

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
(5, '2024_03_11_100329_laratrust_setup_tables', 2),
(6, '2024_03_12_081505_create_categories_table', 3),
(7, '2024_03_12_082045_create_subcategories_table', 4),
(8, '2024_03_12_082714_create_products_table', 5),
(9, '2024_03_13_044552_add_quantity_to_products_table', 6),
(10, '2024_03_15_053526_create_carts_table', 7),
(11, '2024_03_16_044032_create_contacts_table', 8),
(12, '2024_03_16_062955_create_shipping_infos_table', 9),
(13, '2024_03_16_085604_create_orders_table', 10),
(14, '2024_03_16_092217_add_status_to_orders', 11),
(15, '2024_03_18_101129_create_reviews_table', 12),
(16, '2024_03_22_075220_add_status_to_contact', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_number` bigint(20) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_district` varchar(255) NOT NULL,
  `shipping_state` varchar(255) NOT NULL,
  `shipping_country` varchar(255) NOT NULL,
  `shipping_pincode` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_number`, `shipping_address`, `shipping_district`, `shipping_state`, `shipping_country`, `shipping_pincode`, `product_id`, `quantity`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 8909088908, 'test home,test street', 'knr', 'kl', 'ind', 789890, 7, 1, 120, 'Confirmed', NULL, '2024-03-17 22:39:58'),
(2, 2, 8909088908, 'test home,test street', 'knr', 'kl', 'ind', 789890, 2, 1, 800, 'Confirmed', NULL, '2024-03-17 23:00:35'),
(3, 2, 8909088908, 'test home,test street', 'knr', 'kl', 'ind', 789890, 5, 1, 500, 'Rejected', NULL, '2024-03-17 23:00:37'),
(4, 2, 8909088908, 'test home,test street', 'knr', 'kl', 'ind', 789890, 1, 1, 120000, 'Rejected', NULL, '2024-03-17 22:39:51'),
(5, 4, 9098909098, 'user home,abc street', 'knr', 'kl', 'ind', 670001, 8, 1, 19999, 'Rejected', NULL, '2024-03-18 23:17:48'),
(6, 2, 8909088908, 'test home,test street', 'knr', 'kl', 'ind', 670001, 5, 1, 500, 'Rejected', NULL, '2024-03-18 23:18:53'),
(7, 2, 8909088908, 'test home,test street', 'knr', 'kl', 'ind', 670001, 5, 5, 2500, 'Rejected', NULL, '2024-03-18 23:28:17'),
(9, 2, 8909088908, 'sam home, xyz street', 'kannur', 'kerala', 'india', 670007, 2, 1, 800, 'Pending', NULL, NULL),
(10, 6, 9996000888, 'exam home,qwerty street', 'Calicut', 'Kerala', 'India', 680987, 1, 1, 120000, 'Confirmed', NULL, '2024-03-21 06:00:04'),
(11, 6, 9996000899, 'exam home,qwerty street 123', 'Calicut123', 'Kerala', 'India', 680987, 8, 1, 19999, 'Rejected', NULL, '2024-03-20 06:01:08'),
(12, 6, 9996000888, 'exam home,qwerty street', 'Calicut', 'Kerala', 'India', 680987, 2, 1, 800, 'Pending', NULL, NULL),
(13, 2, 8909088908, 'sam home, xyz street', 'Kannur', 'Kerala', 'India', 670007, 11, 3, 13500, 'Pending', NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(2, 'users-read', 'Read Users', 'Read Users', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(3, 'users-update', 'Update Users', 'Update Users', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2024-03-11 04:43:35', '2024-03-11 04:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_short_des` text NOT NULL,
  `product_long_des` text NOT NULL,
  `price` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `product_subcategory_name` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_subcategory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_img` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_short_des`, `product_long_des`, `price`, `product_category_name`, `product_subcategory_name`, `product_category_id`, `product_subcategory_id`, `quantity`, `product_img`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 14', 'Iphone 14 Pro Max', 'Iphone 14 Pro Max 8GB RAM 512GB Internal Storage 4000mah Battery', 120000, 'Electronics', 'SmartPhone', 1, 4, 10, 'upload/1793397942170654.jpg', 'iphone-14', '2024-03-19 04:44:37', '2024-03-13 02:42:36'),
(2, 'Tshirt Nike', 'Nike Tshirt Red Color', 'Nike Tshirt Red Color Round Neck Large Size', 800, 'Clothing', 'Men Clothing', 3, 5, 10, 'upload/1793391255579389.png', 'tshirt-nike', '2024-03-10 04:44:46', '2024-03-20 04:51:01'),
(5, 'Ferrero Rocher', 'Ferrero Rocher 1 Pack', 'Ferrero Rocher 1 Pack -  8 Pieces', 500, 'Bakery and Sweets', 'Sweets', 5, 7, 10, 'upload/1793411295716309.jpg', 'ferrero-rocher', '2024-03-10 04:45:23', NULL),
(6, 'REDMI Note 15', 'Redmi Note 15 Pro 8GB 128GB', 'Redmi Note 15 Pro 8GB 128GB.\r\n108MP Camera\r\n5000mah battery\r\nAndroid 14', 16000, 'Electronics', 'SmartPhone', 1, 4, 10, 'upload/1793489006130211.png', 'redmi-note-15', '2024-03-19 04:45:17', '2024-03-21 05:09:36'),
(7, 'Apple', 'Apple', 'Kashmir Apple', 120, 'Fruits and Vegetables', 'Fruits', 4, 9, 10, 'upload/1793489205545793.png', 'apple', '2024-03-10 04:45:30', NULL),
(8, 'POCO X6 5G', 'POCO X6 5G (Mirror Black, 256 GB)  (8 GB RAM)', '8 GB RAM | 256 GB ROM\r\n16.94 cm (6.67 inch) Display\r\n64MP + 8MP + 2MP | 16MP Front Camera\r\n5100 mAh Battery\r\n7s Gen 2 Mobile Platform 5G Processor', 19999, 'Electronics', 'SmartPhone', 1, 4, 10, 'upload/1793501357756217.png', 'poco-x6-5g', '2024-03-10 04:45:35', '2024-03-14 06:06:21'),
(9, 'Chess Board', 'JOLAU Professional Chess Set', 'Wooden Folding Board and Acrylic Pieces | Travel-friendly Educational Chess Game for Kids & Adults', 1200, 'Sports', 'Indoor Sports', 6, 10, 9, 'upload/1794133222363693.jpg', 'chess-board', '2024-03-21 11:05:37', '2024-03-21 11:05:45'),
(11, 'Jabulani Football', 'FIFA South Africa Jabulani Soccer Official World Cup Match Ball', 'Unique collectible soccer ball\r\nTotally box packed\r\nSouth Africa FIFA match ball 2010', 4500, 'Sports', 'Outdoor Sports', 6, 11, 7, 'upload/1794134694279864.jpg', 'jabulani-football', '2024-03-21 05:35:11', '2024-03-22 03:42:16'),
(12, 'RAM C/O ANANDHI', 'Book by Akhil Pi Dharmajan', 'ചെന്നൈ നഗരം പശ്ചാത്തലമാക്കി എഴുതിയ ഫീൽ ഗുഡ് സിനിമ പോലൊരു നോവൽ. പ്രണയം, സൗഹൃദം, യാത്ര, പ്രതികാരം, രാഷ്ട്രീയം തുടങ്ങി വായനയെ രസമുള്ളതാക്കുന്ന എല്ലാ ചേരുവകളും ചേർത്തെഴുതിയ ഈ രചന അനവധി കഥകളും ട്വിസ്റ്റുകളും നിറഞ്ഞതാണ്.', 499, 'Books', 'Novel', 8, 12, 10, 'upload/1794136162862569.png', 'ram-co-anandhi', '2024-03-21 06:16:18', '2024-03-21 06:16:18'),
(13, 'Aadujeevitham', 'Aatujeevitham (Malayalam) Kindle Edition', 'Aadujeevitham, by Benyamin, is a novel that blends together perfectly sweetness of prose, a premise steeped in life-experience, and the Malayali ethos. The captivating beauty of the desert, the specialties of the underworld world… none of this has been recorded so deeply in Malayalam prior to this.', 455, 'Books', 'Novel', 8, 12, 10, 'upload/1794195915820757.png', 'aadujeevitham', '2024-03-21 06:17:36', '2024-03-21 22:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `user_name`, `review`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'sample', 'tasty', '2024-03-18 06:04:55', '2024-03-22 04:38:10'),
(3, 5, 4, 'sample', 'good', '2024-03-18 06:09:23', '2024-03-18 06:09:23'),
(4, 5, 4, 'sample', 'bad', '2024-03-18 06:13:52', '2024-03-18 06:13:52'),
(5, 5, 4, 'test', 'test good', '2024-03-18 06:16:06', '2024-03-18 06:16:06'),
(7, 2, 2, 'sample', 'loose fit', '2024-03-19 05:31:22', '2024-03-19 05:31:22'),
(8, 2, 2, 'sample', 'color fading away', '2024-03-19 05:38:09', '2024-03-22 04:41:16'),
(9, 6, 2, 'sample', 'best camera', '2024-03-19 05:38:59', '2024-03-19 05:38:59'),
(10, 8, 2, 'sample', 'motherboard issue...donot buy', '2024-03-21 05:22:02', '2024-03-22 05:08:03'),
(12, 13, 2, 'sample', 'nice novel', '2024-03-22 03:46:16', '2024-03-22 03:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2024-03-11 04:43:35', '2024-03-11 04:43:35'),
(2, 'user', 'User', 'User', '2024-03-11 04:43:35', '2024-03-11 04:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\User'),
(1, 3, 'App\\Models\\User'),
(2, 4, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_infos`
--

CREATE TABLE `shipping_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_infos`
--

INSERT INTO `shipping_infos` (`id`, `user_id`, `number`, `address`, `district`, `state`, `country`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 8909088908, 'sam home, xyz street', 'Kannur', 'Kerala', 'India', 670007, 1, '2024-03-17 09:23:36', '2024-03-18 01:26:13'),
(13, 5, 8909088123, 'test home,test street', 'Kannur', 'Kerala', 'India', 670001, 1, '2024-03-20 01:06:16', '2024-03-20 01:06:16'),
(14, 6, 9996000888, 'exam home,qwerty street', 'Calicut', 'Kerala', 'India', 680987, 1, '2024-03-20 02:46:24', '2024-03-20 02:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory_name`, `category_id`, `category_name`, `product_count`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'TV', 1, 'Electronics', 0, 'tv', NULL, '2024-03-13 04:16:02'),
(4, 'SmartPhone', 1, 'Electronics', 3, 'smartphone', NULL, '2024-03-14 05:53:37'),
(5, 'Men Clothing', 3, 'Clothing', 1, 'men-clothing', NULL, '2024-03-13 00:56:19'),
(6, 'Women Clothing', 3, 'Clothing', 0, 'women-clothing', NULL, NULL),
(7, 'Sweets', 5, 'Bakery and Sweets', 1, 'sweets', NULL, '2024-03-13 06:14:51'),
(8, 'Bakery', 5, 'Bakery and Sweets', 0, 'bakery', NULL, NULL),
(9, 'Fruits', 4, 'Fruits and Vegetables', 1, 'fruits', NULL, '2024-03-14 02:53:12'),
(10, 'Indoor Sports', 6, 'Sports', 2, 'indoor-sports', NULL, '2024-03-21 05:31:19'),
(11, 'Outdoor Sports', 6, 'Sports', 1, 'outdoor-sports', NULL, '2024-03-21 05:35:11'),
(12, 'Novel', 8, 'Books', 2, 'novel', NULL, '2024-03-21 06:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'sample', 'sam@mail.com', NULL, '$2y$12$8G0bC8qkewLa8DvXzJgGuOn5NbuwjTIXij4tO2FyS3kwBy01Qd9.y', NULL, '2024-03-11 04:55:36', '2024-03-19 00:35:30'),
(3, 'admin', 'admin@admin.com', NULL, '$2y$12$D/tEV9Cr6UQy0y003PjpoOd0izBt.lFezegzOG34rnGz9G1AI0HEu', NULL, '2024-03-11 22:47:42', '2024-03-11 22:47:42'),
(5, 'test', 'test@mail.com', NULL, '$2y$12$tALty0pPw0nPBErSfbdVmu9HeHG5x9rygONe7r.A4VYBlahe82zQ6', NULL, '2024-03-20 01:05:41', '2024-03-20 01:05:41'),
(6, 'example', 'exam@exam.com', NULL, '$2y$12$9WHjdqfc7/CScFnKbYmc4ugIb0pAfgXBN3zFwXAWWWQVMDLEIEaFi', NULL, '2024-03-20 01:07:51', '2024-03-20 01:07:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
