-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2017 at 06:38 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `midlands_open`
--
USE `midlands_open`;

-- --------------------------------------------------------

--
-- Table structure for table `bjj_events`
--

CREATE TABLE IF NOT EXISTS `bjj_events` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_start` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `early_reg_fee` int(10) unsigned NOT NULL,
  `late_reg_fee` int(10) unsigned NOT NULL,
  `teen_early_reg_fee` int(10) unsigned NOT NULL,
  `teen_late_reg_fee` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bjj_events`
--

INSERT INTO `bjj_events` (`id`, `title`, `event_start`, `content`, `early_reg_fee`, `late_reg_fee`, `teen_early_reg_fee`, `teen_late_reg_fee`, `created_at`, `updated_at`) VALUES
(1, 'Midlands Open BJJ 1 ', '2017-02-25 00:00:00', 'first fight @ 9am', 3000, 4000, 2000, 2500, '2017-01-10 05:00:00', '2017-01-10 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bjj_event_results`
--

CREATE TABLE IF NOT EXISTS `bjj_event_results` (
`id` int(10) unsigned NOT NULL,
  `bjj_event_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_and_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bjj_participants`
--

CREATE TABLE IF NOT EXISTS `bjj_participants` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `belt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `years_training` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instructor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `bjj_event_id` int(10) unsigned NOT NULL,
  `terms_conditions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE IF NOT EXISTS `contact_form` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2017_01_02_150205_create_bjj_events_table', 1),
(30, '2017_01_02_152611_create_bjj_participants_table', 1),
(31, '2017_01_02_211119_create_mma_participants_table', 1),
(32, '2017_01_02_211426_create_mma_events_table', 1),
(33, '2017_01_05_130151_create_bjj_event_results_table', 1),
(34, '2017_01_05_130200_create_mma_event_results_table', 1),
(35, '2017_01_09_183556_create_contact_form_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mma_events`
--

CREATE TABLE IF NOT EXISTS `mma_events` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_start` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `early_reg_fee` int(10) unsigned NOT NULL,
  `late_reg_fee` int(10) unsigned NOT NULL,
  `teen_early_reg_fee` int(10) unsigned NOT NULL,
  `teen_late_reg_fee` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mma_events`
--

INSERT INTO `mma_events` (`id`, `title`, `event_start`, `content`, `early_reg_fee`, `late_reg_fee`, `teen_early_reg_fee`, `teen_late_reg_fee`, `created_at`, `updated_at`) VALUES
(1, 'Midlands Open MMA League Round 1 ', '2017-03-05 00:00:00', 'first fight @ 9am', 4000, 5000, 2500, 3000, '2017-01-10 05:00:00', '2017-01-10 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mma_event_results`
--

CREATE TABLE IF NOT EXISTS `mma_event_results` (
`id` int(10) unsigned NOT NULL,
  `mma_event_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_and_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mma_participants`
--

CREATE TABLE IF NOT EXISTS `mma_participants` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `years_training` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instructor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `mma_event_id` int(10) unsigned NOT NULL,
  `terms_conditions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bjj_events`
--
ALTER TABLE `bjj_events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bjj_event_results`
--
ALTER TABLE `bjj_event_results`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bjj_participants`
--
ALTER TABLE `bjj_participants`
 ADD PRIMARY KEY (`id`), ADD KEY `bjj_participants_bjj_event_id_index` (`bjj_event_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mma_events`
--
ALTER TABLE `mma_events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mma_event_results`
--
ALTER TABLE `mma_event_results`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mma_participants`
--
ALTER TABLE `mma_participants`
 ADD PRIMARY KEY (`id`), ADD KEY `mma_participants_mma_event_id_index` (`mma_event_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bjj_events`
--
ALTER TABLE `bjj_events`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bjj_event_results`
--
ALTER TABLE `bjj_event_results`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bjj_participants`
--
ALTER TABLE `bjj_participants`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `mma_events`
--
ALTER TABLE `mma_events`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mma_event_results`
--
ALTER TABLE `mma_event_results`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mma_participants`
--
ALTER TABLE `mma_participants`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
