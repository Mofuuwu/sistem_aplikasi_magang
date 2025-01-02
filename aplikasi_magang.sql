-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2025 at 02:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `mentor_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `mentor_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 1, 'Tes\n', '2025-01-01 19:13:42', '2025-01-01 19:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_comments`
--

CREATE TABLE `announcement_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `announcement_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1735786018),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1735786018;', 1735786018);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint UNSIGNED NOT NULL,
  `internship_student_id` bigint UNSIGNED NOT NULL,
  `type` enum('sikap','kehadiran') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mentor_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `internship_student_id`, `type`, `score`, `created_at`, `updated_at`, `mentor_id`) VALUES
(3, 1, 'sikap', 99, '2024-12-31 00:10:43', '2024-12-31 00:10:43', 1),
(4, 2, 'kehadiran', 99, '2024-12-31 00:20:18', '2024-12-31 00:20:18', 1),
(5, 2, 'kehadiran', 50, '2024-12-31 00:21:29', '2024-12-31 00:21:29', 1),
(6, 1, 'sikap', 99, '2024-12-31 00:21:59', '2024-12-31 00:21:59', 1),
(7, 2, 'sikap', 99, '2024-12-31 00:25:53', '2024-12-31 00:25:53', 1),
(8, 1, 'sikap', 99, '2024-12-31 00:28:41', '2024-12-31 00:28:41', 1),
(9, 2, 'sikap', 99, '2024-12-31 00:31:27', '2024-12-31 00:31:27', 0),
(10, 1, 'sikap', 99, '2024-12-31 00:32:53', '2024-12-31 00:32:53', 0),
(11, 1, 'sikap', 99, '2024-12-31 00:34:37', '2024-12-31 00:34:37', 0),
(12, 2, 'sikap', 99, '2024-12-31 00:41:42', '2024-12-31 00:41:42', 0),
(13, 1, 'sikap', 99, '2024-12-31 00:42:39', '2024-12-31 00:42:39', 0),
(14, 2, 'sikap', 99, '2024-12-31 00:44:15', '2024-12-31 00:44:15', 0),
(15, 1, 'sikap', 90, '2025-01-01 19:27:50', '2025-01-01 19:27:50', 0),
(16, 2, 'kehadiran', 90, '2025-01-01 19:28:00', '2025-01-01 19:28:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `internship_reports`
--

CREATE TABLE `internship_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `internship_student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internship_students`
--

CREATE TABLE `internship_students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `mentor_id` bigint UNSIGNED NOT NULL,
  `work_unit_id` bigint UNSIGNED NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `internship_students`
--

INSERT INTO `internship_students` (`id`, `student_id`, `mentor_id`, `work_unit_id`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-12-01', '2025-03-10', NULL, NULL),
(2, 2, 1, 1, '2024-12-20', '2025-04-15', NULL, NULL),
(3, 3, 1, 1, '2024-12-20', '2025-04-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intership_reports`
--

CREATE TABLE `intership_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `intership_student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intership_students`
--

CREATE TABLE `intership_students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `mentor_id` bigint UNSIGNED NOT NULL,
  `work_unit_id` bigint UNSIGNED NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intership_students`
--

INSERT INTO `intership_students` (`id`, `student_id`, `mentor_id`, `work_unit_id`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-12-01', '2025-03-10', NULL, NULL),
(2, 2, 1, 1, '2024-12-20', '2025-04-15', NULL, NULL),
(3, 3, 1, 1, '2024-12-20', '2025-04-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logbooks`
--

CREATE TABLE `logbooks` (
  `id` bigint UNSIGNED NOT NULL,
  `internship_student_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `presence` enum('hadir','izin','sakit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logbooks`
--

INSERT INTO `logbooks` (`id`, `internship_student_id`, `date`, `presence`, `information`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-01-02', NULL, NULL, NULL, NULL),
(2, 1, '2025-01-02', 'sakit', 'jnduhdij', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`) VALUES
(1, 'Pengembangan Perangkat Lunak Dan Game'),
(2, 'Desain Komunikasi Dan Visual');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_unit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `user_id`, `phone_number`, `work_unit_id`) VALUES
(1, '2', '082718271617', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2024_12_02_131412_create_intership_reports_table', 1),
(24, '2024_12_02_131528_create_intership_students_table', 1),
(109, '0001_01_01_000000_create_users_table', 2),
(110, '0001_01_01_000001_create_cache_table', 2),
(111, '0001_01_01_000002_create_jobs_table', 2),
(112, '2024_12_02_131206_create_evaluations_table', 2),
(113, '2024_12_02_131412_create_internship_reports_table', 2),
(114, '2024_12_02_131528_create_internship_students_table', 2),
(115, '2024_12_02_131537_create_logbooks_table', 2),
(116, '2024_12_02_131547_create_majors_table', 2),
(117, '2024_12_02_131556_create_mentors_table', 2),
(118, '2024_12_02_131624_create_placement_locations_table', 2),
(119, '2024_12_02_131633_create_roles_table', 2),
(120, '2024_12_02_131637_create_rules_table', 2),
(121, '2024_12_02_131642_create_schools_table', 2),
(122, '2024_12_02_131651_create_students_table', 2),
(123, '2024_12_02_131658_create_tasks_table', 2),
(124, '2024_12_02_131718_create_work_units_table', 2),
(125, '2024_12_05_060734_create_announcements_table', 2),
(126, '2024_12_05_063131_create_announcement_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement_locations`
--

CREATE TABLE `placement_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placement_locations`
--

INSERT INTO `placement_locations` (`id`, `name`, `address`) VALUES
(1, 'Gedung 1', 'Jl. Raya Kedungbanteng'),
(2, 'Gedung 2', 'Jl. Raya Keniten');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('general','unit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general' COMMENT 'type = general / unit',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_unit_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `type`, `description`, `work_unit_id`) VALUES
(1, 'general', 'Kegiatan Pkl Dimulai Pukul 07.00 dan Selesai Pukul 15.00', NULL),
(2, 'general', 'Mengenakan Seragam Sekolah', NULL),
(3, 'general', 'Jam Istirahat Pukul 12.00', NULL),
(4, 'unit', 'Membawa Laptop Sendiri', 1),
(5, 'unit', 'Melaksanakan Tugas Dari Pembimbing', 1),
(6, 'unit', 'Berangkat Pada Hari Senin - Jumat', 2),
(7, 'unit', 'Berangkat Pada Hari Senin - Sabtu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `email`, `phone_number`) VALUES
(1, 'SMK Negeri 1 Purwokerto', 'Jl. Raya Purwokerto Timur', 'smkn1pwt@gmail.com', '091828171827'),
(2, 'SMK Negeri 1 Puwbalingga', 'Jl. Raya Purbalingga Selatan', 'smkn1pbg@gmail.com', '018182718262');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4uyIId02tpfan4sFAItGg8KLjKO3ZsOi4PjhiS7Q', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicEVNY2NrNm9lOGkyTlhEU2t6bUpwYk43ZTR1a25CRUpldjZMS1BKViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmRfc2lzd2Evc2lzd2EtZGF0YS1tYWdhbmciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkSTAxeUsvTTdJSEFzTms5aHZwRzRmdVJJTUVTREo5SnFqSVFEbk5xbEFrRzV6cDg3VHk5VU8iO30=', 1735785964),
('gS1KON1UUaunXZTs8DuA8e6T8otOd2OoTQjn8sc4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVHFQMVFQMFRFMVVodmV4RVp0M2dmWlNPNHlwRUVVelV4NUdjN0NhZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmRfc2lzd2EvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQ1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkX3Npc3dhL3R1Z2FzLzEiO319', 1735783581);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` text COLLATE utf8mb4_unicode_ci,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `class`, `major_id`, `school_id`, `phone_number`, `address`, `profile_photo`, `father_name`, `father_job`, `mother_name`, `mother_job`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '1', '12', '1', '1', '082716272616', 'Jl. Raya Kedungbanteng', '1734320019_675f9f936ea27.jpg', 'Father', 'FatherJob', 'Mother', 'MotherJob', '1', '2024-12-31 00:00:12', '2024-12-31 00:00:12'),
(2, '4', '12', '1', '1', '082716272616', 'Jl. Raya Pancurawis', '1734403498_6760e5aa62163.jpg', 'Father', 'FatherJob', 'Mother', 'MotherJob', '1', '2024-12-31 00:00:12', '2024-12-31 00:00:12'),
(3, '5', '12', '1', '1', '082716272616', 'Jl. Raya Kebumen', '1734403498_6760e5aa62163.jpg', 'Father', 'FatherJob', 'Mother', 'MotherJob', '1', '2024-12-31 00:00:12', '2024-12-31 00:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `internship_student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mentor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date DEFAULT NULL,
  `status` enum('belum selesai','dikerjakan','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `internship_student_id`, `mentor_id`, `task_header`, `task_description`, `start_at`, `end_at`, `status`, `response`, `score`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Tugas 1 - Membuat Diagram ERD', 'Silahkan Buat Diagram ERD Berdasarkan Kebutuhan Aplikasi Anda, Identifikasikanlah Entitas Yg Ada Misalnya Siswa, Pembimbing, Dan Humas', '2024-11-29', '2024-12-30', 'belum selesai', NULL, NULL, '2024-12-31 00:00:12', '2024-12-31 00:00:12'),
(2, '1', '1', 'Tugas 2 - Membuat Diagram Aktivitas', 'Silahkan Buat Diagram Aktivitas Berdasarkan Kebutuhan Aplikasi Anda, Identifikasikanlah Aktivitas Apa Saja Yang Akan Dilakukan Oleh User', '2024-11-29', '2024-12-30', 'belum selesai', NULL, NULL, '2024-12-31 00:00:12', '2024-12-31 00:00:12'),
(3, '2', '1', 'Tugas 3 - Membuat Diagram Use Case', 'Silahkan Buat Diagram Use Case Berdasarkan Kebutuhan Aplikasi Anda', '2024-11-29', '2024-12-30', 'belum selesai', NULL, NULL, '2024-12-31 00:00:12', '2024-12-31 00:00:12'),
(4, '1', '1', 'Tugas 1 - Membuat Tabel', 'Silahkan Buat Tabel Di Mysql Berdasarkan Kebutuhan Aplikasi Anda', '2024-11-29', '2024-12-30', 'selesai', NULL, NULL, '2024-12-31 00:00:12', '2024-12-31 00:00:12'),
(5, '2', '1', 'Tugas 1 - Menyiapkan Aplikasi', 'Silahkan Siapkan Aplikasi untuk Development Berdasarkan Kebutuhan Aplikasi Anda', '2024-11-29', '2024-12-30', 'selesai', NULL, NULL, '2024-12-31 00:00:12', '2024-12-31 00:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifqi', 'muhammadrifqi@gmail.com', '2024-12-31 00:00:10', '$2y$12$I01yK/M7IHAsNk9hvpG4fuRIMESDJ9JqjIQDnNqlAkG5zp87Ty9UO', '3', 'K41RJsgzKmRPHJusDzAgR30p8hs2EAgzVu5WtptFUdUIRyI7ur3XjWdzgalt', '2024-12-31 00:00:10', '2024-12-31 00:00:10'),
(2, 'Yoga Willy', 'yogawilly@gmail.com', '2024-12-31 00:00:10', '$2y$12$roPxZsgujPAlXhSULfDOL.aqK/VaPlffq1mCE5G.UThYBIimOvTaK', '2', 'p4t031bUuDDsZG6v27ueog9Lkcy1Wnx9onNTlLIRCiFnk8mmjoevDu9opYEg', '2024-12-31 00:00:10', '2024-12-31 00:00:10'),
(3, 'Rafif Dwi', 'rafifdw@gmail.com', '2024-12-31 00:00:11', '$2y$12$TIIYX3jZvB5aKjuE5w5GU.IPvqBJTWvmqYFAUxpq711troUJMd5Bi', '1', 'iBjiZ3ObMo', '2024-12-31 00:00:11', '2024-12-31 00:00:11'),
(4, 'Muhhamad Hasan Iroqi', 'muhhamadhasan@gmail.com', '2024-12-31 00:00:11', '$2y$12$VI9Et2quhE9Bgl/DQmWMeOoDVMLGB5nPWxStYNJ1uphatPIHfuHTe', '3', 'yQsQVLCUWF', '2024-12-31 00:00:11', '2024-12-31 00:00:11'),
(5, 'Rafif Dwi Saputra', 'rafifdwisaputra@gmail.com', '2024-12-31 00:00:11', '$2y$12$mv1.tzOC8YsCb8I82ipKieVHRMz0j4XmSRa5PfbGXWoNq.0TfYx0G', '3', 'u7SQSekNYV', '2024-12-31 00:00:11', '2024-12-31 00:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `work_units`
--

CREATE TABLE `work_units` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placement_location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_units`
--

INSERT INTO `work_units` (`id`, `name`, `placement_location_id`) VALUES
(1, 'L3PM', '1'),
(2, 'Humas', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `internship_reports`
--
ALTER TABLE `internship_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_students`
--
ALTER TABLE `internship_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intership_reports`
--
ALTER TABLE `intership_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intership_students`
--
ALTER TABLE `intership_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logbooks_internship_student_id_foreign` (`internship_student_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mentors_user_id_unique` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `placement_locations`
--
ALTER TABLE `placement_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_user_id_unique` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_units`
--
ALTER TABLE `work_units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_reports`
--
ALTER TABLE `internship_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_students`
--
ALTER TABLE `internship_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intership_reports`
--
ALTER TABLE `intership_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intership_students`
--
ALTER TABLE `intership_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logbooks`
--
ALTER TABLE `logbooks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `placement_locations`
--
ALTER TABLE `placement_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_units`
--
ALTER TABLE `work_units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD CONSTRAINT `logbooks_internship_student_id_foreign` FOREIGN KEY (`internship_student_id`) REFERENCES `internship_students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
