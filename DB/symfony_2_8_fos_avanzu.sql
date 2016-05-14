-- phpMyAdmin SQL Dump
-- version 4.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2016 at 02:43 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `symfony_2_8_fos_avanzu`
--

-- --------------------------------------------------------

--
-- Table structure for table `fos_groups`
--

CREATE TABLE IF NOT EXISTS `fos_groups` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_groups`
--

INSERT INTO `fos_groups` (`id`, `name`, `roles`, `description`) VALUES
(4, 'user', 'a:1:{i:0;s:9:"ROLE_USER";}', 'user'),
(6, 'super-admin', 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `fos_users`
--

CREATE TABLE IF NOT EXISTS `fos_users` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_users`
--

INSERT INTO `fos_users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin@admin.com', 1, 'bbm90cv35mgw00s4ow84k084s84wsgk', '$2y$13$bbm90cv35mgw00s4ow84kuslvsTYSbLXnmEhrCmvmM8IHlKS/ZSt2', '2016-05-14 02:39:03', 0, 0, NULL, 'OSEHBHUETL1IuggY1KDIcKGhOVxt8R-1aeL8FcAQMlo', '2016-05-09 20:29:33', 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL),
(7, 'shahidul', 'shahidul', 'shahidul@emicrograph.com', 'shahidul@emicrograph.com', 1, 'jjd70hqx58o48cco0kkk44g08g880ks', '$2y$13$jjd70hqx58o48cco0kkk4uWGBwScwjcb5CBv1k3nT6NG2QkG4e4sC', '2016-05-09 20:37:38', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user_group`
--

INSERT INTO `fos_user_group` (`user_id`, `group_id`) VALUES
(1, 6),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_profiles`
--

CREATE TABLE IF NOT EXISTS `fos_user_profiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphones` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designations` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user_profiles`
--

INSERT INTO `fos_user_profiles` (`id`, `user_id`, `full_name`, `cellphones`, `designations`) VALUES
(1, 1, 'admin', 'admin', 'admin'),
(4, 7, 'shahidul', '000', 'shahidul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fos_groups`
--
ALTER TABLE `fos_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_A44C5CA5E237E06` (`name`);

--
-- Indexes for table `fos_users`
--
ALTER TABLE `fos_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_32427CF792FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_32427CF7A0D96FBF` (`email_canonical`);

--
-- Indexes for table `fos_user_group`
--
ALTER TABLE `fos_user_group`
 ADD PRIMARY KEY (`user_id`,`group_id`), ADD KEY `IDX_583D1F3EA76ED395` (`user_id`), ADD KEY `IDX_583D1F3EFE54D947` (`group_id`);

--
-- Indexes for table `fos_user_profiles`
--
ALTER TABLE `fos_user_profiles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_A8E2130AA76ED395` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fos_groups`
--
ALTER TABLE `fos_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fos_users`
--
ALTER TABLE `fos_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fos_user_profiles`
--
ALTER TABLE `fos_user_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fos_user_group`
--
ALTER TABLE `fos_user_group`
ADD CONSTRAINT `FK_583D1F3EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_users` (`id`),
ADD CONSTRAINT `FK_583D1F3EFE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_groups` (`id`);

--
-- Constraints for table `fos_user_profiles`
--
ALTER TABLE `fos_user_profiles`
ADD CONSTRAINT `FK_A8E2130AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
