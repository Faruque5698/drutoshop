-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drutoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `photo`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'Admin/image/category/PlusLee2.webp', 'Man Category Products', 'active', '2022-06-15 06:23:12', '2022-06-15 06:23:12'),
(2, 'Woman', 'Admin/image/category/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair_285396-896.webp', 'Woman Category List', 'active', '2022-06-15 06:24:27', '2022-06-15 06:24:27'),
(3, 'Kids', 'Admin/image/category/download.jpg', 'Kids Category', 'active', '2022-06-15 06:31:15', '2022-06-15 06:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_25_191247_create_homes_table', 1),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(9, '2016_06_01_000004_create_oauth_clients_table', 2),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(11, '2022_06_15_120625_create_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0a694a8fa6d6b28dfffe1746bbd642eb62efea3a09a1914e1c76618aa4e80f3862368d5b0a5bf6f4', 23, 1, 'authToken', '[]', 0, '2022-06-06 14:29:38', '2022-06-06 14:29:38', '2023-06-06 10:29:38'),
('1042852c368d782d076af382031f6c8963ad3e15e014a9ee79f307fa269bc22167967ff8726129f8', 32, 1, 'authToken', '[]', 0, '2022-06-12 14:24:10', '2022-06-12 14:24:10', '2023-06-12 10:24:10'),
('10b5b862cfd6cb9bf527c00c1c3dadc648086d00ff3f2718baa9bca8a56e87c19ec604cce3bc3180', 33, 1, 'authToken', '[]', 0, '2022-06-13 15:26:10', '2022-06-13 15:26:10', '2023-06-13 11:26:10'),
('11ecb305617a8ae1a7746700dd74cef7f66c6fe2054c4897b9b30bef723778991778d963fe4420bb', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:35:48', '2022-06-13 16:35:48', '2023-06-13 12:35:48'),
('14559988337f04716a4f30fffd9f27d52614119e37a6dbb361f0293fa6ed21b9055d2676b175b8ad', 14, 1, 'authToken', '[]', 0, '2022-06-05 10:06:59', '2022-06-05 10:06:59', '2023-06-05 06:06:59'),
('15343cbc0107f465bcecc817cd122e67acbc8780beec47323c2dfdf9f4a916376e1f99487589af55', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:04', '2022-06-12 16:57:04', '2023-06-12 12:57:04'),
('161e1c7687a96895f9f1396f961bad2a347c84d95e5fa2b0e7b79a2f0c1ab796aad89c80d60ebd9f', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:52:49', '2022-06-12 16:52:49', '2023-06-12 12:52:49'),
('16e4246272196ea0ce78fcea5212e3b5f40ec18c2a4dd546d4e4d76588a8507c9afa146915f34899', 33, 1, 'authToken', '[]', 0, '2022-06-12 13:53:54', '2022-06-12 13:53:54', '2023-06-12 09:53:54'),
('17c4557c6e0b1a0cf9cfdbedace93167c638a3ac1a78982bb43921cfda6ec50622e8f03c9a8f503b', 32, 1, 'authToken', '[]', 1, '2022-06-12 14:23:02', '2022-06-12 14:23:02', '2023-06-12 10:23:02'),
('17d07cf1d1100fba60d9aed871d3c5323dd7d9f17040d8b8ab474e99b184fd63dba2129edec68afa', 23, 1, 'authToken', '[]', 0, '2022-06-12 13:08:31', '2022-06-12 13:08:31', '2023-06-12 09:08:31'),
('183c22eb74672eccd0eb2ed0d07c24ce003bce990eb65afa8ab5d7eb516bbf355816633e6fbdac1b', 32, 1, 'authToken', '[]', 0, '2022-06-13 11:06:20', '2022-06-13 11:06:20', '2023-06-13 07:06:20'),
('1868247b091496036932299bbafe59ee9ae08b2bf03805d01fc3ede8e7b2e17a5211b08770a1fb26', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:34:37', '2022-06-13 16:34:37', '2023-06-13 12:34:37'),
('1afbba4d8b2fb2750c315ab1727bda61c004a9d016584320c0b7fc416dba64327242e6644511bc7e', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:21:03', '2022-06-13 16:21:03', '2023-06-13 12:21:03'),
('1c249d9b83e96549dff72b64d89a4ec778b1445d9cd4343cf8ba5d294d117a404246f528a3f33977', 28, 1, 'authToken', '[]', 0, '2022-06-06 14:47:16', '2022-06-06 14:47:16', '2023-06-06 10:47:16'),
('20420cee1f1c9da032c293b8d449144ae53c4acfe720ddc096543b56445c831c2a88e2d20ff74d17', 32, 1, 'authToken', '[]', 0, '2022-06-12 12:12:41', '2022-06-12 12:12:41', '2023-06-12 08:12:41'),
('22eb2cd62199afe9825c2f635fa4548b4913be419994f179d0bd691a71a265a09a7fbf29ee25683e', 28, 1, 'authToken', '[]', 0, '2022-06-06 14:46:23', '2022-06-06 14:46:23', '2023-06-06 10:46:23'),
('237d6c4a08205a8b0c3c0a5b1649e5dc7e534173a6091fa65da15732ecd4d87122197adfc58f1032', 22, 1, 'authToken', '[]', 0, '2022-06-06 14:15:17', '2022-06-06 14:15:17', '2023-06-06 10:15:17'),
('242bc4de34f9f23cbc930fd2e7439af622df799ca877fc7eaef14541fb5bc30ca1bb92dc5c122ddc', 29, 1, 'authToken', '[]', 0, '2022-06-12 09:26:35', '2022-06-12 09:26:35', '2023-06-12 05:26:35'),
('2516f629ba74ecff335b07982821cba571f0452074b1a3b0866a0d64ecf2059979dfb81dff36c20e', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:49:30', '2022-06-13 10:49:30', '2023-06-13 06:49:30'),
('26b94e3102935a21d606865da8ab1f4988aadd94f1842a21eaa90981ed7688512d70501b2d890a3e', 34, 1, 'authToken', '[]', 0, '2022-06-12 13:50:18', '2022-06-12 13:50:18', '2023-06-12 09:50:18'),
('2a1e8481ea25e6097a17bd556ca1c9bdb5717f5b78ec8ada48401268c545d46bfa81f35e1849f6d1', 32, 1, 'authToken', '[]', 0, '2022-06-13 11:28:41', '2022-06-13 11:28:41', '2023-06-13 07:28:41'),
('30d3f7bd7f0bb095b788bc0b9bd2bc3ae1d225ef9a2b7da6abde5ac9ff03600b999068e77e4d0b42', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:34:29', '2022-06-13 16:34:29', '2023-06-13 12:34:29'),
('341650d53f4a75615236a03c1b4efba8e5fa7827e5fc3c4a70935ae0c17e7b64aaa779621273339d', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:08:48', '2022-06-13 16:08:48', '2023-06-13 12:08:48'),
('350ce4d00f12c5532458ff1cebfa2bd2d267b3457164463f537c5b8cd06992d40266f408cadf739e', 32, 1, 'authToken', '[]', 0, '2022-06-13 12:09:12', '2022-06-13 12:09:12', '2023-06-13 08:09:12'),
('36c3ffe5feb9eb622b92491a64352553fb1eb2060fc3f4afb7342e0f9a798029545a0ae54dff170c', 30, 1, 'authToken', '[]', 0, '2022-06-07 16:07:15', '2022-06-07 16:07:15', '2023-06-07 12:07:15'),
('3798ff1cd88e38e8cae52664898df3a38c1ee3a4f91ec6eb81a712510048dedb239752db87e343bc', 14, 1, 'authToken', '[]', 0, '2022-06-02 20:18:51', '2022-06-02 20:18:51', '2023-06-02 16:18:51'),
('3a2d2b4a31f1de0bd92068a6a519a99d51528c34b5df800277a8130c4fbbbdb52ba8d11708386852', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:17:29', '2022-06-12 13:17:29', '2023-06-12 09:17:29'),
('3edc168380aaed93df2ffd8d5dded4fb57468b0b7401e7143d67842552969620842ed61ee95d90ef', 22, 1, 'authToken', '[]', 0, '2022-06-06 14:27:52', '2022-06-06 14:27:52', '2023-06-06 10:27:52'),
('40cb41bd3a06f441d82354c8cf9783792dd04312f4f88f0255f44458cc7f38738c5fccdd457bd6ae', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:30:03', '2022-06-13 10:30:03', '2023-06-13 06:30:03'),
('4276c076ea0c3af8ffc58cf877233c14c638e71c46d1a3209b65d115ffb476ec921f8077302b7f77', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:10:20', '2022-06-13 16:10:20', '2023-06-13 12:10:20'),
('4925596f08c9c6a6b8e48a62a3109e21f539a48b880f404e562a9eef8ce318c5b02d310b2807cd1e', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:56:57', '2022-06-12 16:56:57', '2023-06-12 12:56:57'),
('4b85a6771ae30236d2682c0022be0e07a1bb5c4b33a0ec5a27d69fa7f11e85c6cdaca1230433d3a7', 14, 1, 'authToken', '[]', 0, '2022-06-04 20:44:45', '2022-06-04 20:44:45', '2023-06-04 16:44:45'),
('4d7b8e4a9ef9e5481231224d2a708a71aa40735ec3fe7c1ca1d89431160af35e7577dd90e61b1824', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:15:35', '2022-06-13 16:15:35', '2023-06-13 12:15:35'),
('507b42a3ef64b0562974024b891c7def4edcd3d30edd1d452df3ddf505d50125a2cecd9a9fd99ca8', 29, 1, 'authToken', '[]', 0, '2022-06-07 16:02:12', '2022-06-07 16:02:12', '2023-06-07 12:02:12'),
('5316a2517d1d364792173794f9035263fd861ec40873cbeb709b3adf7e81e841b23249d04acc6828', 23, 1, 'authToken', '[]', 0, '2022-06-12 13:08:38', '2022-06-12 13:08:38', '2023-06-12 09:08:38'),
('54b2018e693a7fce124b6be65818f0642cbb61e502540bb4c71bd73e34378ffef9a74f67a83c2377', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:19:21', '2022-06-12 13:19:21', '2023-06-12 09:19:21'),
('57ef851fa3d8b8f12c90393c15f58dacf7df11f7e179faf50e0130ede6e1634c75a86d2d6dc27bf7', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:03', '2022-06-12 16:57:03', '2023-06-12 12:57:03'),
('5a5f29dd4188624948c4af29cbffa07459372234ee84fe17cdc0db9ac160a29e8ef43a778325342f', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:04:53', '2022-06-13 10:04:53', '2023-06-13 06:04:53'),
('5b320dfc84402df2334d873d7709e188bba6a2afff193f3996812431143c8256d471f71f16492ba5', 20, 1, 'authToken', '[]', 0, '2022-06-06 14:04:56', '2022-06-06 14:04:56', '2023-06-06 10:04:56'),
('5b726311411afedd68fc397c84f3a35dd6e253ea1ed3b91ed989e797d204ca482543f270bb857c48', 27, 1, 'authToken', '[]', 0, '2022-06-06 14:43:09', '2022-06-06 14:43:09', '2023-06-06 10:43:09'),
('5c755700957d1c43743e699b7b46d4048203ec4af8d95a53fd9b744277e09346b86884b33b555b17', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:16:27', '2022-06-12 13:16:27', '2023-06-12 09:16:27'),
('5e4f6ed3ccce6f5ab77b998f916c57a6b8614bf01289214867e2786001d38048f0ddef2efc19c053', 32, 1, 'authToken', '[]', 0, '2022-06-13 09:59:04', '2022-06-13 09:59:04', '2023-06-13 05:59:04'),
('5ef1128f9d6c8c3b6da09c14ee195bfe0a21932d84d79d4107e639ea47add120d54644b4bc8c72ff', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:52:59', '2022-06-12 16:52:59', '2023-06-12 12:52:59'),
('64d859984d91840bc109c94c5129570acd7a630dfc1edcd91fd69c9c051745858b0b7505ded0678a', 33, 1, 'authToken', '[]', 0, '2022-06-12 13:46:16', '2022-06-12 13:46:16', '2023-06-12 09:46:16'),
('66a880c599cc7d9029da4ec0b2b0d5d512836aa0418bcc07ca2a4cfb274a467496b7eb20b24561b2', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:41:39', '2022-06-13 16:41:39', '2023-06-13 12:41:39'),
('66ae0dde5673cb5eca293cb6a9e9cf823adcaf890a94f8cfd0486c561caf4bac47362752b8a9db11', 22, 1, 'authToken', '[]', 0, '2022-06-06 14:13:54', '2022-06-06 14:13:54', '2023-06-06 10:13:54'),
('6c12f7e729242a5842ef33a571f606fb804bd3936f210020d67d705c3b4b82e2bd41ec29f74fe635', 18, 1, 'authToken', '[]', 0, '2022-06-05 10:07:47', '2022-06-05 10:07:47', '2023-06-05 06:07:47'),
('6ed37e9e9a2c20568c9441a52aad90d415f4104adac5b780ae4212204ed523b8b953656cc8357efe', 14, 1, 'authToken', '[]', 0, '2022-06-06 08:53:49', '2022-06-06 08:53:49', '2023-06-06 04:53:49'),
('706ce6c2e78f58138ec18609c0d5a0f9e4bcadb41cabf4a85ad44550229ff7822fdc101140f5fc26', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:04', '2022-06-12 16:57:04', '2023-06-12 12:57:04'),
('72582e0afc56e7443b668cbcd6b816911f9b227864808e72775ab1272a95b7c0557eb0b21ffff4c9', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:00:10', '2022-06-13 10:00:10', '2023-06-13 06:00:10'),
('772e7b1d47490a3c5a2c9fe5382cc10e325ff2d9fd00d39a873bc1fb62a5adbd5cba7abfdcfbab79', 32, 1, 'authToken', '[]', 0, '2022-06-13 12:04:03', '2022-06-13 12:04:03', '2023-06-13 08:04:03'),
('78c2207d72be4512c3f392363e728242c68cc590d8f47edda2469b9b93201f7dac56991fb92c2a0a', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:04', '2022-06-12 16:57:04', '2023-06-12 12:57:04'),
('7a98f23d0a790cff8d53c7b3fb66e6cb5b1ef2cee92b092a60317f732e020437d0809e318b2d7375', 33, 1, 'authToken', '[]', 0, '2022-06-13 15:18:18', '2022-06-13 15:18:18', '2023-06-13 11:18:18'),
('7bc7ea6ada4a4e07e02ec58e90d745f9b883c6836feb2990e775eae7a1736b01f1691f260a19320e', 24, 1, 'authToken', '[]', 0, '2022-06-06 14:31:28', '2022-06-06 14:31:28', '2023-06-06 10:31:28'),
('7c202830fea053cb2069fb8a1a65a62dfbaca4237fc34359bfb87f28943680245c6dffbebbff12ed', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:14:45', '2022-06-13 16:14:45', '2023-06-13 12:14:45'),
('8015c8441a272c011bdd73d7f211908db977b753d28f68998c191b99e2713de333c095f3e79f9c20', 16, 1, 'authToken', '[]', 0, '2022-06-02 20:18:28', '2022-06-02 20:18:28', '2023-06-02 16:18:28'),
('80d2b64904f160949afdeb4e0c68e8ed686fbed90e0accd68ecfe836c8ae84e45cb39c1f807ee846', 32, 1, 'authToken', '[]', 0, '2022-06-13 14:14:35', '2022-06-13 14:14:35', '2023-06-13 10:14:35'),
('81029683837541a9f230cbb417e5236d30f043f32b16de4f2d46a81815c60d83c3559a028617a62d', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:34:42', '2022-06-13 16:34:42', '2023-06-13 12:34:42'),
('8109168a66554740bdb4853b2db4a0806d31d32b7df2309a7ed93f12cd20350839d201a4b9502ab9', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:19:11', '2022-06-12 13:19:11', '2023-06-12 09:19:11'),
('82abb94716b1734f87969610d4a9ffac801f5da8a85a9c71678e50d3ae4ad49c5aa5c6b5da8904df', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:12:15', '2022-06-13 16:12:15', '2023-06-13 12:12:15'),
('8657ac5df545d5718072a9b565944ac8333f352cad386bbcb01c2318f3926d4a38f14209e36f9c4f', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:17:44', '2022-06-12 13:17:44', '2023-06-12 09:17:44'),
('8bc4033bb86b39d27fdfc426c6390d24ff648b3111b26fa3c237d43e3351910d0d35d8140605b9f0', 32, 1, 'authToken', '[]', 0, '2022-06-13 12:07:44', '2022-06-13 12:07:44', '2023-06-13 08:07:44'),
('8e6727d7559ff7004a8e552b01bb02f8116a134217178a5f57d98205d8857e5b4fd5d681509c52d0', 33, 1, 'authToken', '[]', 0, '2022-06-12 13:27:47', '2022-06-12 13:27:47', '2023-06-12 09:27:47'),
('92e21562bb40674df14b577358bb972a1361335826173bd3ec88afc32ae926576391aaf1f9e2b338', 32, 1, 'authToken', '[]', 0, '2022-06-13 11:32:31', '2022-06-13 11:32:31', '2023-06-13 07:32:31'),
('94b2c92019e7da39de1472ca4b2785059e1fcaf473e4de6052aadb713927834eddee22c93dde4918', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:40:11', '2022-06-13 16:40:11', '2023-06-13 12:40:11'),
('98ff7156573bc358b953edbec858f2f7350e637812665786aa30c4084e39529ca8118de6f68a6e40', 19, 1, 'authToken', '[]', 0, '2022-06-06 12:58:20', '2022-06-06 12:58:20', '2023-06-06 08:58:20'),
('991c4c71692ee9c965cf8c2374d01d90dba5ef998e13396b536e482c21173096f326c4fba9005f99', 26, 1, 'authToken', '[]', 0, '2022-06-06 14:38:58', '2022-06-06 14:38:58', '2023-06-06 10:38:58'),
('9b9df9f8c8a7bb7e72a60ed94610e6975af3661d4d0e50eb66c81d651ae3c9975685f6010758e8f5', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:17:29', '2022-06-13 16:17:29', '2023-06-13 12:17:29'),
('9cc510ce558f8477f130836a8810ce53902ca77d49b379f0ccb08c3e4a6e34d60815fc226c087bd1', 32, 1, 'authToken', '[]', 0, '2022-06-13 11:29:59', '2022-06-13 11:29:59', '2023-06-13 07:29:59'),
('9e67d87c47fd69876ba0028f589e4c66da786f87cc049401cc89758b16bcaf5211b9da8e02be7a1c', 23, 1, 'authToken', '[]', 0, '2022-06-06 14:29:09', '2022-06-06 14:29:09', '2023-06-06 10:29:09'),
('9f4be2d0b0276765380904a56f8485de74ae70dd612215d4b2c33b580da199847b9b4fbb8e541a47', 23, 1, 'authToken', '[]', 0, '2022-06-12 13:09:28', '2022-06-12 13:09:28', '2023-06-12 09:09:28'),
('a1e463b5173813011f50c3ac2ba0f75c6380fbb17e94574ef4558125a98788f9820e08050e3b8a93', 29, 1, 'authToken', '[]', 0, '2022-06-07 16:01:20', '2022-06-07 16:01:20', '2023-06-07 12:01:20'),
('a3070742c33da005e22ebc30d44a2097ada43c383fe5a624f703b2948f01ee6296988804ade65880', 32, 1, 'authToken', '[]', 0, '2022-06-12 15:42:36', '2022-06-12 15:42:36', '2023-06-12 11:42:36'),
('a3aeefa4ac39aac1d2de5a826b895bdbac222236920e7a57eb9ab2dc63e6ff74a181745f627d87d4', 32, 1, 'authToken', '[]', 0, '2022-06-13 09:59:10', '2022-06-13 09:59:10', '2023-06-13 05:59:10'),
('a420b77a01035f57be8205c030ae19cc59fc6be6234761b2be36d425d4738e4f94fc26264ced0b3d', 33, 1, 'authToken', '[]', 0, '2022-06-12 22:24:54', '2022-06-12 22:24:54', '2023-06-12 18:24:54'),
('a666d27da684da3e2d62ff1f7328f286fa8cd53f842eb62bc6cf5804495a8cd3411f8c40b14d54d6', 33, 1, 'authToken', '[]', 0, '2022-06-13 15:31:11', '2022-06-13 15:31:11', '2023-06-13 11:31:11'),
('a72ab05def0ac3c569edc13d07a38e1776c09499a575fe2c6448218d861b0b8cea95e6902d417df8', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:04:50', '2022-06-13 10:04:50', '2023-06-13 06:04:50'),
('ab5f8aad46f981e5a0c72d9502aa6ff4cb048238c113b2f815ea04758a7fb17417efe63c1fc46824', 32, 1, 'authToken', '[]', 0, '2022-06-12 14:54:32', '2022-06-12 14:54:32', '2023-06-12 10:54:32'),
('ac128f31b4128cc3c84e0ba37145f4f48a5c512ef83ce5e08f0b84c4b5b96d1fbaba9433e133f12b', 32, 1, 'authToken', '[]', 0, '2022-06-12 17:01:11', '2022-06-12 17:01:11', '2023-06-12 13:01:11'),
('ae48d644a032c0958146a15adaf9b24fc2e2b183eeab05b0e34ee267226408282ab40985f9f80bd4', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:19:27', '2022-06-13 10:19:27', '2023-06-13 06:19:27'),
('b2e03224a9bf1631754c8498c6329cfd1d5686765af1d564abc100a305f538acbaf980ab265da157', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:05', '2022-06-12 16:57:05', '2023-06-12 12:57:05'),
('b79797e1479db56e1cddf3ecb470f141bd527466285abb0f364352ca1efee801700cbe68f07813be', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:37:05', '2022-06-13 16:37:05', '2023-06-13 12:37:05'),
('b97ca48c2e4fda6fb20d42b90ea6ee9379d31121631a044b5713c8e56463d045bd59bbd9ca3ed804', 32, 1, 'authToken', '[]', 0, '2022-06-13 09:59:05', '2022-06-13 09:59:05', '2023-06-13 05:59:05'),
('bb59269f28e684c1b83d661433f5027cffc111abb4b8a3e00dbf029d0e1582e700d6bcf2b0c45236', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:12:16', '2022-06-12 13:12:16', '2023-06-12 09:12:16'),
('be0a6b21e8de3b61a7de20758691a35ee019eaad09450d876e52e62210a02eb8f77c993cc93be6d6', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:04', '2022-06-12 16:57:04', '2023-06-12 12:57:04'),
('bf3b34a08c8365bd9b0d8fef7cf610244b7cba8759e2a414b07116186da8ac8c0ef573e7749055b9', 23, 1, 'authToken', '[]', 0, '2022-06-07 15:40:39', '2022-06-07 15:40:39', '2023-06-07 11:40:39'),
('bf8526b1f8fdeca6081d5728d7d52c69e0b68eae47920d2ec08e6595b8dfd29c50ea6f22c3b70df0', 33, 1, 'authToken', '[]', 0, '2022-06-12 13:26:59', '2022-06-12 13:26:59', '2023-06-12 09:26:59'),
('c055b21ae73fe3f5258f59b907e45e97db1a295f3704d17503ef9741f4746520dc7bddfcea53e907', 14, 1, 'authToken', '[]', 1, '2022-06-01 09:45:18', '2022-06-01 09:45:18', '2023-06-01 15:45:18'),
('c24e34ce466c21ed4a4b43c0675ae61bc1e69bcc8df21491d766d7bf406217121a122f12500395a1', 14, 1, 'authToken', '[]', 1, '2022-06-01 09:55:35', '2022-06-01 09:55:35', '2023-06-01 15:55:35'),
('c51f56f65c710c09f8c8b3d3a1329a150d70bf789198ce0ee9901fbab0fcff6749ce2d164e3e4371', 14, 1, 'authToken', '[]', 0, '2022-06-01 20:56:39', '2022-06-01 20:56:39', '2023-06-01 16:56:39'),
('c69c800645a7def55fc01ae498026b67f20f3cf84d4163e43765373d64e89b4578a5d633d426b890', 33, 1, 'authToken', '[]', 0, '2022-06-12 13:53:54', '2022-06-12 13:53:54', '2023-06-12 09:53:54'),
('cc48cc3734a0447bebec451435753b59ff9bda8ffaf8bf6a47b0130c05ca02d2d6961b42de37ccd4', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:56:56', '2022-06-13 16:56:56', '2023-06-13 12:56:56'),
('ce19475ba281813abaa0c98c414b0ff92c38cabd12e49ce0b71945621adf27eecaaa7c55bb67f0dd', 31, 1, 'authToken', '[]', 0, '2022-06-07 16:09:05', '2022-06-07 16:09:05', '2023-06-07 12:09:05'),
('cf8935db0a412c5f2acfe87875ee19699389b158e880b9429cac1289fb7b73672b11cb2f8d307758', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:10:19', '2022-06-13 16:10:19', '2023-06-13 12:10:19'),
('d12f0ca90c6968c494b27f73ea4e80eb53fb804d43fa88adcc344c4f274ade941a49b377070b26f7', 32, 1, 'authToken', '[]', 0, '2022-06-13 10:27:41', '2022-06-13 10:27:41', '2023-06-13 06:27:41'),
('d262d06846926e7a8368a307172ef062fbeab8747e5cb54b41f912ab41db5aca6d37cec757145924', 32, 1, 'authToken', '[]', 0, '2022-06-13 14:15:38', '2022-06-13 14:15:38', '2023-06-13 10:15:38'),
('d617835b99428b3a52692bb982badd41dd4e67ae20c4438bf1b0c59f8db49b1af185b435eee4fedd', 14, 1, 'authToken', '[]', 0, '2022-06-01 09:39:13', '2022-06-01 09:39:13', '2023-06-01 15:39:13'),
('d6d3316d1d1d6b8a2f64ef22c4b961a66be409aee999dd05b179a2b7ac8a5e52af4604caf51faa88', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:02', '2022-06-12 16:57:02', '2023-06-12 12:57:02'),
('d7b8ffb8e81c3b07d128f6cec564d7eed4215defab49b50200ad1b697e63e9546a21f2bdfbfa7f1d', 33, 1, 'authToken', '[]', 0, '2022-06-13 14:21:02', '2022-06-13 14:21:02', '2023-06-13 10:21:02'),
('d82f8a4e767a8a756b6aa1bbf2f4d7c28e48935c93a46ca479e3b888ae3c303bd70c9b173a108ee7', 24, 1, 'authToken', '[]', 0, '2022-06-06 14:31:42', '2022-06-06 14:31:42', '2023-06-06 10:31:42'),
('dd486004994355f030d2c12afddb72d9b65823089f3aa99333c9a5de4e1bfb1520d452b9d28af06f', 14, 1, 'authToken', '[]', 0, '2022-06-06 11:35:26', '2022-06-06 11:35:26', '2023-06-06 07:35:26'),
('ddfd08b6cfbf1620f484d28bde9956cc18bc1559460b004ec2328990deff76627afca3dd3ec0b8bf', 32, 1, 'authToken', '[]', 0, '2022-06-12 13:12:17', '2022-06-12 13:12:17', '2023-06-12 09:12:17'),
('df53a3a740c893e5a31485bdf614b48b43f5ade5e15795f804eaa2feb95ffd95ec51fb96fdb35196', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:04', '2022-06-12 16:57:04', '2023-06-12 12:57:04'),
('e24dc553fd074cb6922a2a8f9fe63e5451d09b89a0d5da8a231c4e4124f68ea69aa7aef5df631ede', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:05', '2022-06-12 16:57:05', '2023-06-12 12:57:05'),
('e313d88c5e8aa328988eaa4237de35d56c8baeeedb8f158d5947c593f954cb5657cca9c86f6d1f6f', 17, 1, 'authToken', '[]', 0, '2022-06-04 20:45:29', '2022-06-04 20:45:29', '2023-06-04 16:45:29'),
('e4b0c52d618e1fa20b2f27205fb6214c05d5640f7071012de37f48c2488b785dc78b090da1626f55', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:15:07', '2022-06-13 16:15:07', '2023-06-13 12:15:07'),
('e60f1414d02345f86326840e717b8c20ee0cbcf55dec01d0986518048ce9d436052cd1370e7dadb1', 14, 1, 'authToken', '[]', 0, '2022-06-06 11:35:39', '2022-06-06 11:35:39', '2023-06-06 07:35:39'),
('e752887bd7ea1d7d76c6b216cc8566e5ccd71aa666389e367c5438f1c6536cfa2edd058ba47df7ad', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:04', '2022-06-12 16:57:04', '2023-06-12 12:57:04'),
('ee36b72d6ae10096e455da2566994827b9688c419114c75856f92a410c13db6d5f96c63cad3307a1', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:05', '2022-06-12 16:57:05', '2023-06-12 12:57:05'),
('eece49a68fae50b5ff8406d9373d01ef93e32bf4eeb6ae550ea386a2bbb3470cf0169dbefe4f0486', 25, 1, 'authToken', '[]', 0, '2022-06-06 14:38:33', '2022-06-06 14:38:33', '2023-06-06 10:38:33'),
('efddd1acbbf7c8e17757010592049d16de3efa506f7f657871604d7c7e49e0a6b7037dbeb188cba7', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:51:32', '2022-06-12 16:51:32', '2023-06-12 12:51:32'),
('f1de6f4240d81cca0dbc4140321bd4c7802faedd6dde1997b743ead78edc54ad946000d0aa857ab2', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:57:06', '2022-06-12 16:57:06', '2023-06-12 12:57:06'),
('f2f8e7b452f9344cc58b0e70fb8562b10bc78f8974bbe2f9a65d7a67b2ef09fa681932341df7f552', 21, 1, 'authToken', '[]', 0, '2022-06-06 14:10:36', '2022-06-06 14:10:36', '2023-06-06 10:10:36'),
('f5533c3e803c2f773696c0927aef863c7ee19d6b868b6bf501eda439680268914d5598eac628dea3', 32, 1, 'authToken', '[]', 0, '2022-06-13 14:08:16', '2022-06-13 14:08:16', '2023-06-13 10:08:16'),
('f61e156bd75c3bf3103363833520e508b5b6075c315139e1d8862b8dfa76157e9836c2961c7d57b8', 32, 1, 'authToken', '[]', 0, '2022-06-12 16:52:42', '2022-06-12 16:52:42', '2023-06-12 12:52:42'),
('f68485e6986f69326e9014027ec61e35d18fde5d2e1579e8e8051b9a92f77af7ad843c26bde99641', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:14:52', '2022-06-13 16:14:52', '2023-06-13 12:14:52'),
('f7295a2c8f8e5d18730fa2b581d8cd5ae25514669270a35d52e4521bbeacb7438ac5d4cc3e572335', 32, 1, 'authToken', '[]', 0, '2022-06-13 16:11:37', '2022-06-13 16:11:37', '2023-06-13 12:11:37'),
('f85a9c479423b0b0f5cc8a0b2cd11ab03b861aaa2d608b8bd9dbe61035e8c70d59e7e1caf0d0c1b3', 15, 1, 'authToken', '[]', 0, '2022-06-02 20:17:25', '2022-06-02 20:17:25', '2023-06-02 16:17:25'),
('f986bb408ea4a751b46df417bd5e45365f5afeef72f368da8d61f2ba55d1941e1f6f9568b56521eb', 33, 1, 'authToken', '[]', 0, '2022-06-13 14:10:11', '2022-06-13 14:10:11', '2023-06-13 10:10:11'),
('fbaf0ce2a41a3d2bb42065ea1ed448abec7c5bc7db23deaf3cd0a0e9ab8141219d12c54ace0332ab', 35, 1, 'authToken', '[]', 0, '2022-06-12 13:50:40', '2022-06-12 13:50:40', '2023-06-12 09:50:40'),
('feaefd88aefcbf117f1d9105147b520955ed1ea156573a070938d32d1db013edbdfcc0f87e1dabd2', 33, 1, 'authToken', '[]', 0, '2022-06-12 22:17:59', '2022-06-12 22:17:59', '2023-06-12 18:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'xlkMkzeak1cvdXhs2tMnYCM9nBu9Gw1T37BH3g8F', NULL, 'http://localhost', 1, 0, 0, '2022-06-01 09:18:57', '2022-06-01 09:18:57'),
(2, NULL, 'Laravel Password Grant Client', 'FMHy0W6afOg03fv8JBBi6IQxnss7FsPgiQVLtFEo', 'users', 'http://localhost', 0, 1, 0, '2022-06-01 09:18:57', '2022-06-01 09:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-01 09:18:57', '2022-06-01 09:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `isBan` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `email_verified_at`, `password`, `image`, `role`, `isBan`, `is_delete`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, NULL, '$2y$10$5/54knklTHgNQwPDheyJZexSubUbJJCyMsYSgZS5YcX/EE7kG184S', NULL, 1, 1, 1, 1, 'VeAVMVDBIupfeX3KnIEjUWC93RhfLlq0V1fGoC71YSd9numwobVILn0icsKk', NULL, NULL),
(2, 'testuser', 'testuser@example.com', NULL, NULL, '$2y$10$fq1lLshthog3EBaf.7Ky7Ohxh57S4X3yNtQPVzguA0RQc4g4vNZWG', NULL, 0, 1, 1, 1, NULL, '2022-05-31 09:56:12', '2022-05-31 09:56:12'),
(14, 'testuser', 'testuser@gmail.com', NULL, NULL, '$2y$10$3Ljd5umys5fY2I55DLAj0OPpR7syHVt5KWCiQ5ZJzDAySKQgfR2Ni', NULL, 0, 1, 1, 1, NULL, '2022-06-01 09:39:13', '2022-06-01 09:39:13'),
(15, 'testuser1', 'testuser1@gmail.com', NULL, NULL, '$2y$10$a2wIY.g6yOcocgh4CjUg6.68XNZ9KeA0aRnrSQTpWElTYMNIb/Nwm', NULL, 0, 1, 1, 1, NULL, '2022-06-02 20:17:25', '2022-06-02 20:17:25'),
(16, 'testuser234', 'testuser234@gmail.com', NULL, NULL, '$2y$10$/Iwj8IYWeadF6zqcft5B6eflTB0mOoqqYKSLbEJMmuIbwJ5WokuOW', NULL, 0, 1, 1, 1, NULL, '2022-06-02 20:18:28', '2022-06-02 20:18:28'),
(17, 'testuser567', 'testuser567@gmail.com', NULL, NULL, '$2y$10$Fi.2G6JVac/3XLY.PcvBee01XGhHp0N2I.TolUNeacc3Zcvy.5qf6', NULL, 0, 1, 1, 1, NULL, '2022-06-04 20:45:29', '2022-06-04 20:45:29'),
(18, 'testuser568', 'testuser568@gmail.com', NULL, NULL, '$2y$10$pDORz/lVMHkcUQs75Wuv2eUq/rgdwEwIGiOeqNNQvUg.iYn8jvZqm', NULL, 0, 1, 1, 1, NULL, '2022-06-05 10:07:47', '2022-06-05 10:07:47'),
(19, 'testuser1234', 'testuser1234@gmail.com', NULL, NULL, '$2y$10$wml2VE/dDoWvBtGHOW8QJuG2hFmix71oNtOpGr6umlH7.wEe.ggDm', NULL, 0, 1, 1, 1, NULL, '2022-06-06 12:58:20', '2022-06-06 12:58:20'),
(20, 'testuser12344', 'testuser12344@gmail.com', NULL, NULL, '$2y$10$LYlKK2cN7lu8U.04utmlBuhLem9BN8xbm2t..tGJZvBv2De9s24RC', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:04:56', '2022-06-06 14:04:56'),
(21, 'habib', 'habib234@gmail.com', NULL, NULL, '$2y$10$X7x71.MtbJTRG0OPRPvIa.by9XBYMRxrXOK5dJu3Or5TnOzmU8tlu', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:10:36', '2022-06-06 14:10:36'),
(22, 'habib', 'habib12345@gmail.com', NULL, NULL, '$2y$10$4FcVguC04jMlVnVdqGMBn.YHhokMKe.JiiX2ZP64dmCL5dihxSmC.', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:13:54', '2022-06-06 14:13:54'),
(23, 'hello', 'hello567@gmail.com', NULL, NULL, '$2y$10$l/6Duz3hjrwRzEQWGMw85uOwnL/YfeHcPH0Vk1kVpgHntjBjbFesW', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:29:09', '2022-06-06 14:29:09'),
(24, 'hridoy', 'hridoy@gmail.com', NULL, NULL, '$2y$10$6r/tT0Q7nJk3//9tgSFhVuLw7mQ8YNJ33nrBT1lbX2bdpgKsI2hsS', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:31:28', '2022-06-06 14:31:28'),
(25, 'asdasd', 'demo3@gmail.com', NULL, NULL, '$2y$10$QUHlqI9puwp5XASoXJQZVuSHa9gniZjTiy6/1cbIoueZ2cqKc/hhm', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:38:33', '2022-06-06 14:38:33'),
(26, 'asdasd', 'demo31@gmail.com', NULL, NULL, '$2y$10$oyvd7l7/7z4nbxAfsYe2i.iLGkKsSTzQbyHRuNcxtqT6APado7XWW', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:38:58', '2022-06-06 14:38:58'),
(27, 'hridi', 'demo21@gmail.com', NULL, NULL, '$2y$10$TIgrqdXnYipQpsOCJcbfo.CgtVIUmuhFEKIh.sb1ZywVxLVrG5lmy', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:43:09', '2022-06-06 14:43:09'),
(28, 'hridoy', 'hridoy2@gmail.com', NULL, NULL, '$2y$10$Xhm9L4DzbapfI4jQHddwROnii.IeDMSeNovScjzlLIW7zG.M6jQpC', NULL, 0, 1, 1, 1, NULL, '2022-06-06 14:46:23', '2022-06-06 14:46:23'),
(29, 'hello', 'hello5678@gmail.com', NULL, NULL, '$2y$10$Mv7toYQQIBDa6eDqXtVyhe3HOfT3xfhwPqTKhTHgVTGWcF2HhkkRW', NULL, 0, 1, 1, 1, NULL, '2022-06-07 16:01:20', '2022-06-07 16:01:20'),
(30, 'habib', 'rock422@gmail.com', NULL, NULL, '$2y$10$lqL0qKkDakYvtiYSJVruqej7VYKIO.B/Sr9vIldoa2lJ1unxDGLT.', NULL, 0, 1, 1, 1, NULL, '2022-06-07 16:07:15', '2022-06-07 16:07:15'),
(31, 'hello', 'hello56x78@gmail.com', NULL, NULL, '$2y$10$YV7LsOL0nHYZBHCfllVNKOAGvwy70EttdqGXoYLyBovyJ57AZLv3W', NULL, 0, 1, 1, 1, NULL, '2022-06-07 16:09:05', '2022-06-07 16:09:05'),
(32, 'Hridoy', 'hridoy89@gmail.com', NULL, NULL, '$2y$10$BQW.gbFLoBtm1OjQBw.IxOT99jc.mqiLN5dLV0FH4ILRRcjq4xCO2', NULL, 0, 1, 1, 1, NULL, '2022-06-12 12:12:41', '2022-06-12 12:12:41'),
(33, 'hello', 'hello56789@gmail.com', NULL, NULL, '$2y$10$Nr2aWpkc2ePhB955q9o0jelNCgy3zDbcYkenzX0SGXwLe6Ool1IYu', NULL, 0, 1, 1, 1, NULL, '2022-06-12 13:26:58', '2022-06-12 13:26:58'),
(34, 'jone', 'demo12345@gmail.com', NULL, NULL, '$2y$10$iOlu/YsmW9fkYknPxXkSUul4miFtbUgY6l1zuTcwZNlea9ZyJ/lhe', NULL, 0, 1, 1, 1, NULL, '2022-06-12 13:50:18', '2022-06-12 13:50:18'),
(35, 'jone', 'demo123456789@gmail.com', NULL, NULL, '$2y$10$yf1Z.fMsAeajkO6yp2g9eeC4bCDFoSzpEGSUM7/WVcKviO.1.gcB2', NULL, 0, 1, 1, 1, NULL, '2022-06-12 13:50:40', '2022-06-12 13:50:40'),
(36, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$C.HhiCBqlu77XhYhgIurcu7It/gU/glMMl43Hz9hK.GDwMA2OlXpu', NULL, 1, 1, 1, 1, NULL, '2022-06-15 04:02:56', '2022-06-15 04:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_no_unique` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
