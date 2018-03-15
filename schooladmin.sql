-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 05:40 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooladmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'Administrator', 'admin@portal.com', '$2y$10$kF2BMmI/UL2zxL797jJc.Or1JciVIEguYGFEi.7itKXNzDQmCRfd6', 'cOHxsjnLZi4h3wPZEyYzMtDjjEWGrqTDWcixpFgRksFjjoRCBB2iOElQP2hK');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `path`, `class_id`, `course_id`) VALUES
(1, 1, '/answer/Forex_Course_&_Tutorial[1].pdf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_courses`
--

CREATE TABLE `assigned_courses` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_courses`
--

INSERT INTO `assigned_courses` (`id`, `class_id`, `course_id`, `user_id`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `submissionDate` date NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `class_id`, `course_id`, `path`, `submissionDate`, `filename`, `created_at`) VALUES
(1, 1, 1, '/assignment/cany.pdf', '2018-03-22', 'bb', '2018-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `company_id`, `user_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `department_id`, `level_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_courses`
--

CREATE TABLE `class_courses` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `assigned` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_courses`
--

INSERT INTO `class_courses` (`id`, `class_id`, `course_id`, `assigned`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 5, 0),
(5, 2, 1, 0),
(6, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noEmployee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'images/company/default.png',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `industry`, `email`, `phone`, `password`, `noEmployee`, `address`, `city`, `country`, `about`, `image`, `logo`, `lga`, `remember_token`, `created_at`, `updated_at`, `fname`, `sname`, `website`) VALUES
(1, 'goldtek ventures', '28', 'dike4mii4real@gmail.com', '0706637450', '$2y$10$l9zw6i.py6xF5Q7kBrBHxeITzjvlIW.Gw3PlOrJDiLbZbOnvqVIza', '26-50', 'House 49 srd Avenue Gwarimpa', 'owerri', 'Nigeria', 'about Goldtek', 'images/company/default.png', 'images/company-logo/1489675500.png', 'Njaba', 'UY0kN1vJ9KvSaX1dibj9EXWToDnthyk3gyOErtaKdZberhwWGWQ2zGIlUOKs', '2017-03-10 14:57:22', '2017-03-16 13:45:01', 'mikel', 'dike', 'http://www.goldtekventures.com'),
(2, 'Mobile Development Company', NULL, 'uzo@gmail.com', '08077679584', '$2y$10$T0rRL8edWQXiMilNiK2ol.HbPLFwVHOacPAMSZFH8jlurKuZ70ECG', NULL, NULL, NULL, NULL, NULL, 'images/company/default.png', 'images/company-logo/1489657121.jpg', NULL, 'T9n8cOCcfrKKhRZvwOyGODK4AtP7hNs9qIPDZrDbmyu2C9wZdUviA478N5Ox', '2017-03-16 08:38:42', '2017-03-16 08:38:42', 'john', 'Bull', 'http://www.popngoss.com'),
(3, 'Mobile Development', '16', 'emma@gmail.com', '09069748969', '$2y$10$SDIv7s3IbMjvPz395CFKv.O3U2lHMPsQH.AsVtFonokeMKu39BPxy', NULL, NULL, NULL, NULL, NULL, 'images/company/default.png', 'images/company-logo/1489677274.jpg', NULL, NULL, '2017-03-16 14:14:34', '2017-03-16 14:14:34', 'Frank', 'prince', 'http://www.drty.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `active`, `created`) VALUES
(1, 'English', 1, '2018-03-07'),
(2, 'Mathematics', 1, '2018-03-07'),
(3, 'Introduction To Computing', 1, '2018-03-13'),
(4, 'Computer Maintenance and Troubleshooting', 1, '2018-03-13'),
(5, 'Introduction to Web Development', 1, '2018-03-13'),
(6, 'Compiler Construction', 1, '2018-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created`, `active`) VALUES
(1, 'Computer Science', '2018-03-07', 1),
(2, 'Humanities', '2018-03-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `active`, `created`) VALUES
(1, '100 Level', 1, '2018-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `class_id`, `course_id`, `path`, `created_at`, `filename`) VALUES
(2, 1, 1, '/material/nd.pdf', '2018-03-14', 'pesky');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2004_10_12_2000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2017_03_07_140743_create_companies_table', 1),
(8, '2017_03_07_141149_create_jobs_table', 1),
(9, '2017_03_13_152314_create_experiences_table', 2),
(10, '2017_03_14_094253_create_education_table', 3),
(11, '2017_03_14_132408_create_skills_table', 4),
(12, '2017_03_14_155924_create_resumes_table', 5),
(13, '2017_03_17_120749_create_salaries_table', 6),
(14, '2017_03_17_120852_create_industries_table', 7),
(15, '2017_03_17_120942_create_h_educations_table', 7),
(16, '2017_03_17_133338_create_job_levels_table', 8),
(17, '2017_03_28_140718_create_job_applieds_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `class_id`) VALUES
(1, 'chisom', 'dike', 'dike4mii4real@gmail.com', '$2y$10$bpFljzPJzU1eeZ/Rw6DKVeUxiW0WmkDnoHZScytOehelhvhVt5DDy', 'BqfmXgzWlaCww4ON2u69djOGwLrPaXcZulQt2NuU5PTMJWuy7FUQXCh6thkV', '2018-03-11 10:34:27', '2018-03-11 10:34:27', 'student', 1),
(2, 'mark', 'daniels', 'daniel@gmail.com', '$2y$10$gbDNDD35/VIXwiY9tAmjZevq4llB/T31xZl0K1u2opG4X.reYJIHS', 'j122fsHweI5M9zMjf3byCBaObx50ruxxj8VnVLLacDJJSvbvLRYuSXVTamhp', '2018-03-11 11:05:10', '2018-03-11 11:05:10', 'ta', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_courses`
--
ALTER TABLE `assigned_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_courses`
--
ALTER TABLE `class_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`),
  ADD UNIQUE KEY `companies_phone_unique` (`phone`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assigned_courses`
--
ALTER TABLE `assigned_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_courses`
--
ALTER TABLE `class_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
