-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2015 at 02:03 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unisearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_name` text NOT NULL,
  `career_description` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`career_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`career_id`, `career_name`, `career_description`, `isactive`) VALUES
(1, 'Pilot', 'Flying high', 1);

-- --------------------------------------------------------

--
-- Table structure for table `career_course`
--

CREATE TABLE IF NOT EXISTS `career_course` (
  `career_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`career_course_id`),
  KEY `course_id` (`course_id`),
  KEY `career_id` (`career_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `isactive`) VALUES
(4, '''BBIT''', '''Bachelors Of Business Information Technology''', 1),
(5, 'BCOM', 'Bachelors Of Commerce', 1),
(6, 'BCOM2', 'BCOM2', 1),
(7, 'Bachelor Of Commerce', 'Course in  business', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_name` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`grade_id`),
  KEY `grade_id` (`grade_id`),
  KEY `grade_id_2` (`grade_id`),
  KEY `grade_id_3` (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade_name`, `isactive`) VALUES
(1, 'A', 1),
(2, 'A-', 1),
(3, 'B+', 1),
(4, 'B', 1),
(5, 'B-', 1),
(6, 'C+', 1),
(7, 'C', 1),
(8, 'C-', 1),
(9, 'D+', 1),
(10, 'D', 1),
(11, 'D-', 1),
(12, 'E', 1),
(13, 'F', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade_course`
--

CREATE TABLE IF NOT EXISTS `grade_course` (
  `grade_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`grade_course_id`),
  KEY `grade_id` (`grade_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_name` text NOT NULL,
  `interest_description` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`interest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`interest_id`, `interest_name`, `interest_description`, `isactive`) VALUES
(1, 'Football', '22 men chasing a ball', 1),
(2, 'Football', '22 men chasing a ball', 1);

-- --------------------------------------------------------

--
-- Table structure for table `interest_career`
--

CREATE TABLE IF NOT EXISTS `interest_career` (
  `interest_career_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`interest_career_id`),
  KEY `interest_id` (`interest_id`),
  KEY `isactive` (`isactive`),
  KEY `isactive_2` (`isactive`),
  KEY `career_id` (`career_id`),
  KEY `career_id_2` (`career_id`),
  KEY `career_id_3` (`career_id`),
  KEY `interest_id_2` (`interest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personalities`
--

CREATE TABLE IF NOT EXISTS `personalities` (
  `personality_id` int(11) NOT NULL AUTO_INCREMENT,
  `personality_name` text NOT NULL,
  `pesonality_description` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`personality_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `personalities`
--

INSERT INTO `personalities` (`personality_id`, `personality_name`, `pesonality_description`, `isactive`) VALUES
(1, 'INTJ', 'Imaginative and strategic thinkers, with a plan for everything.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personality_career`
--

CREATE TABLE IF NOT EXISTS `personality_career` (
  `personality_career_id` int(11) NOT NULL AUTO_INCREMENT,
  `personality_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`personality_career_id`),
  KEY `personality_id` (`personality_id`),
  KEY `career_id` (`career_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `reg_no` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) DEFAULT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_no`, `grade_id`, `isactive`) VALUES
(1, NULL, 1),
(2, NULL, 1),
(3, NULL, 1),
(4, NULL, 1),
(5, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`subject_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects_done`
--

CREATE TABLE IF NOT EXISTS `subjects_done` (
  `s_doneid` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  PRIMARY KEY (`s_doneid`),
  KEY `reg_no` (`reg_no`,`subject_id`,`grade_id`),
  KEY `subject_id` (`subject_id`,`grade_id`),
  KEY `grade_id` (`grade_id`),
  KEY `s_doneid` (`s_doneid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject_course`
--

CREATE TABLE IF NOT EXISTS `subject_course` (
  `course_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `min_grade_id` int(11) DEFAULT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`course_subject_id`),
  KEY `subject_id` (`subject_id`),
  KEY `course_id` (`course_id`),
  KEY `min_grade_id` (`min_grade_id`),
  KEY `course_id_2` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uf_configuration`
--

CREATE TABLE IF NOT EXISTS `uf_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `uf_configuration`
--

INSERT INTO `uf_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'UNISEARCH'),
(2, 'website_url', 'localhost/unisearch/'),
(3, 'email', 'info@unisearch.com'),
(4, 'activation', '0'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(8, 'can_register', '1'),
(9, 'new_user_title', 'New Member'),
(11, 'email_login', '1'),
(12, 'token_timeout', '10800'),
(13, 'version', '0.2.2');

-- --------------------------------------------------------

--
-- Table structure for table `uf_filelist`
--

CREATE TABLE IF NOT EXISTS `uf_filelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uf_filelist`
--

INSERT INTO `uf_filelist` (`id`, `path`) VALUES
(1, 'account'),
(2, 'forms');

-- --------------------------------------------------------

--
-- Table structure for table `uf_groups`
--

CREATE TABLE IF NOT EXISTS `uf_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL,
  `home_page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uf_groups`
--

INSERT INTO `uf_groups` (`id`, `name`, `is_default`, `can_delete`, `home_page_id`) VALUES
(1, 'User', 2, 0, 4),
(2, 'Administrator', 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `uf_group_action_permits`
--

CREATE TABLE IF NOT EXISTS `uf_group_action_permits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `permits` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `uf_group_action_permits`
--

INSERT INTO `uf_group_action_permits` (`id`, `group_id`, `action`, `permits`) VALUES
(1, 1, 'updateUserEmail', 'isLoggedInUser(user_id)'),
(2, 1, 'updateUserPassword', 'isLoggedInUser(user_id)'),
(3, 1, 'loadUser', 'isLoggedInUser(user_id)'),
(4, 1, 'loadUserGroups', 'isLoggedInUser(user_id)'),
(5, 2, 'updateUserEmail', 'always()'),
(6, 2, 'updateUserPassword', 'always()'),
(7, 2, 'updateUser', 'always()'),
(8, 2, 'updateUserDisplayName', 'always()'),
(9, 2, 'updateUserTitle', 'always()'),
(10, 2, 'updateUserEnabled', 'always()'),
(11, 2, 'loadUser', 'always()'),
(12, 2, 'loadUserGroups', 'always()'),
(13, 2, 'loadUsers', 'always()'),
(14, 2, 'deleteUser', 'always()'),
(15, 2, 'activateUser', 'always()'),
(16, 2, 'loadGroups', 'always()');

-- --------------------------------------------------------

--
-- Table structure for table `uf_group_page_matches`
--

CREATE TABLE IF NOT EXISTS `uf_group_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `uf_group_page_matches`
--

INSERT INTO `uf_group_page_matches` (`id`, `group_id`, `page_id`) VALUES
(1, 1, 1),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(19, 1, 3),
(20, 1, 4),
(21, 1, 6),
(22, 1, 13),
(23, 1, 15),
(24, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `uf_nav`
--

CREATE TABLE IF NOT EXISTS `uf_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(75) NOT NULL,
  `page` varchar(175) NOT NULL,
  `name` varchar(150) NOT NULL,
  `position` int(11) NOT NULL,
  `class_name` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `uf_nav`
--

INSERT INTO `uf_nav` (`id`, `menu`, `page`, `name`, `position`, `class_name`, `icon`, `parent_id`) VALUES
(1, 'left', 'account/dashboard_admin.php', 'Admin Dashboard', 1, 'dashboard-admin', 'fa fa-dashboard', 0),
(2, 'left', 'account/users.php', 'Users', 2, 'users', 'fa fa-users', 0),
(3, 'left', 'account/dashboard.php', 'Dashboard', 3, 'dashboard', 'fa fa-dashboard', 0),
(4, 'left', 'account/account_settings.php', 'Account Settings', 4, 'settings', 'fa fa-gear', 0),
(5, 'left-sub', '#', 'Site Settings', 5, '', 'fa fa-wrench', 0),
(6, 'left-sub', 'account/site_settings.php', 'Site Configuration', 6, 'site-settings', 'fa fa-globe', 5),
(7, 'left-sub', 'account/groups.php', 'Groups', 7, 'groups', 'fa fa-users', 5),
(8, 'left-sub', 'account/site_authorization.php', 'Authorization', 8, 'site-pages', 'fa fa-key', 5),
(9, 'top-main-sub', '#', '#USERNAME#', 1, 'site-settings', 'fa fa-user', 0),
(10, 'top-main-sub', 'account/account_settings.php', 'Account Settings', 1, '', 'fa fa-gear', 9),
(11, 'top-main-sub', 'account/logout.php', 'Log Out', 2, '', 'fa fa-power-off', 9),
(12, 'left', 'account/personality_test.php', 'Personality Test', 9, 'dashboard', 'fa fa-list', 0),
(13, 'left', 'account/academics.php', 'Academics', 10, 'dashboard', 'fa fa-book', 0),
(30, 'left-sub', '#', 'Data Config', 2, '', 'fa fa-database', 0),
(31, 'left-sub', 'account/addcourses.php', 'Add Courses', 1, 'dashboard', 'fa fa-plus', 30),
(32, 'left-sub', 'account/addinterests.php', 'Add Interests', 2, 'dashboard', 'fa fa-plus', 30),
(33, 'left-sub', 'account/addcareers.php', 'Add Careers', 3, 'dashboard', 'fa fa-plus', 30);

-- --------------------------------------------------------

--
-- Table structure for table `uf_nav_group_matches`
--

CREATE TABLE IF NOT EXISTS `uf_nav_group_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `uf_nav_group_matches`
--

INSERT INTO `uf_nav_group_matches` (`id`, `menu_id`, `group_id`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 9, 1),
(4, 10, 1),
(5, 11, 1),
(6, 1, 2),
(7, 2, 2),
(8, 5, 2),
(9, 6, 2),
(10, 7, 2),
(11, 8, 2),
(12, 12, 1),
(13, 13, 1),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uf_pages`
--

CREATE TABLE IF NOT EXISTS `uf_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `uf_pages`
--

INSERT INTO `uf_pages` (`id`, `page`, `private`) VALUES
(1, 'forms/table_users.php', 1),
(3, 'account/logout.php', 1),
(4, 'account/dashboard.php', 1),
(5, 'account/dashboard_admin.php', 1),
(6, 'account/account_settings.php', 1),
(7, 'account/site_authorization.php', 1),
(8, 'account/site_settings.php', 1),
(9, 'account/users.php', 1),
(10, 'account/user_details.php', 1),
(11, 'account/index.php', 0),
(12, 'account/groups.php', 1),
(13, 'forms/form_user.php', 1),
(14, 'forms/form_group.php', 1),
(15, 'forms/form_confirm_delete.php', 1),
(16, 'forms/form_action_permits.php', 1),
(17, 'account/404.php', 0),
(18, 'account/personality_test.php', 0),
(19, 'account/academics.php', 0),
(20, 'account/performunisitescan.php', 1),
(31, 'account/addcourses.php', 1),
(32, 'account/addinterests.php', 1),
(33, 'account/addcareers.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uf_plugin_configuration`
--

CREATE TABLE IF NOT EXISTS `uf_plugin_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  `binary` int(1) NOT NULL,
  `variable` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uf_users`
--

CREATE TABLE IF NOT EXISTS `uf_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `lost_password_timestamp` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Specifies if the account is enabled.  Disabled accounts cannot be logged in to, but they retain all of their data and settings.',
  `primary_group_id` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Specifies the primary group for the user.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `uf_users`
--

INSERT INTO `uf_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `lost_password_timestamp`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`, `enabled`, `primary_group_id`) VALUES
(1, 'admin', 'Unisearch Admin', '$2y$10$I/eaDpaW.8xCur6fn9BlAeorQlZphkjwJ12lkDiToOXNrU7FSJtim', 'admin@unisearch.com', '51d1702ae61338a19fa1f8cb731c463d', 1420136350, 0, 1420136350, 1, 'Master Account', 1420136350, 1422895290, 1, 2),
(2, 'kayima', 'John K', '$2y$10$3qSxTyV8.HCUoZjvMpyVWePrYQkoHjeAoYK7TWJK2IAXyvGN9fqm6', 'kayimajohn@gmail.com', '3e2f2b89afd44c692a7f33657a35c342', 1420146437, 0, 1420146437, 1, 'New Member', 1420146437, 1421672780, 1, 1),
(3, 'amberrose', 'Amber Rose', '$2y$10$6OUlrjzo52raAXcLHUm.WO6ooJP9RIGNwkyID.w/GGOmHQJgKFlKy', 'amberrose@kayima.com', '4c2c543b16b6b4f8dcc6c45dd1792057', 1421680360, 0, 1421680360, 1, 'New Member', 1421680360, 1421680379, 1, 1),
(4, 'mwaurahmn', 'mnm', '$2y$10$2iwpHZ5iCQ3fsWTm/zxKzeY3Bjk8Tp.lCZwgsNVBwDt4BHpp9hZhi', 'mwaurahmn@gmail.com', 'c93e68b2be316bf2720ec58fe2467986', 1422021877, 1, 1422021877, 1, 'New Member', 1422021782, 0, 1, 1),
(5, 'mwaura123', 'Martha Mwaura', '$2y$10$PfZw0BOXPEcgNlCdu9sM8.AHhwMr5P0f/e9OG.nYWBE4nAzDnl23S', 'mwaurahmn@yahoo.com', 'fa48f4651bf1b16ccfa43639b51c9d65', 1422895815, 0, 1422895815, 1, 'New Member', 1422895815, 1422895864, 1, 1);

--
-- Triggers `uf_users`
--
DROP TRIGGER IF EXISTS `sync_with_register`;
DELIMITER //
CREATE TRIGGER `sync_with_register` AFTER INSERT ON `uf_users`
 FOR EACH ROW insert into register (reg_no) values (NEW.id)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `uf_user_action_permits`
--

CREATE TABLE IF NOT EXISTS `uf_user_action_permits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `permits` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uf_user_group_matches`
--

CREATE TABLE IF NOT EXISTS `uf_user_group_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `uf_user_group_matches`
--

INSERT INTO `uf_user_group_matches` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `uni_id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_name` text NOT NULL,
  `uni_address` text NOT NULL,
  `uni_website` text NOT NULL,
  PRIMARY KEY (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `university_course`
--

CREATE TABLE IF NOT EXISTS `university_course` (
  `uni_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `offering_description` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uni_course_id`),
  KEY `uni_id` (`uni_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE IF NOT EXISTS `user_interests` (
  `user_interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_interest_id`),
  KEY `reg_no` (`reg_no`),
  KEY `interest_id` (`interest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_personality`
--

CREATE TABLE IF NOT EXISTS `user_personality` (
  `user_personality_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` int(11) NOT NULL,
  `personality_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_personality_id`),
  KEY `reg_no` (`reg_no`),
  KEY `personality_id` (`personality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_subject`
--

CREATE TABLE IF NOT EXISTS `user_subject` (
  `user_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_subject_id`),
  KEY `reg_no` (`reg_no`),
  KEY `subject_id` (`subject_id`),
  KEY `grade_id` (`grade_id`),
  KEY `grade_id_2` (`grade_id`),
  KEY `subject_id_2` (`subject_id`),
  KEY `reg_no_2` (`reg_no`),
  KEY `reg_no_3` (`reg_no`),
  KEY `subject_id_3` (`subject_id`),
  KEY `grade_id_3` (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career_course`
--
ALTER TABLE `career_course`
  ADD CONSTRAINT `career_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `career_course_ibfk_2` FOREIGN KEY (`career_id`) REFERENCES `careers` (`career_id`);

--
-- Constraints for table `grade_course`
--
ALTER TABLE `grade_course`
  ADD CONSTRAINT `grade_course_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`grade_id`),
  ADD CONSTRAINT `grade_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `interest_career`
--
ALTER TABLE `interest_career`
  ADD CONSTRAINT `interest_career_ibfk_1` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`interest_id`),
  ADD CONSTRAINT `interest_career_ibfk_2` FOREIGN KEY (`career_id`) REFERENCES `careers` (`career_id`);

--
-- Constraints for table `personality_career`
--
ALTER TABLE `personality_career`
  ADD CONSTRAINT `personality_career_ibfk_1` FOREIGN KEY (`personality_id`) REFERENCES `personalities` (`personality_id`),
  ADD CONSTRAINT `personality_career_ibfk_2` FOREIGN KEY (`career_id`) REFERENCES `careers` (`career_id`);

--
-- Constraints for table `subjects_done`
--
ALTER TABLE `subjects_done`
  ADD CONSTRAINT `subjects_done_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `register` (`reg_no`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `subjects_done_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `subjects_done_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`grade_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `subject_course`
--
ALTER TABLE `subject_course`
  ADD CONSTRAINT `subject_course_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `subject_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `subject_course_ibfk_3` FOREIGN KEY (`min_grade_id`) REFERENCES `grades` (`grade_id`);

--
-- Constraints for table `university_course`
--
ALTER TABLE `university_course`
  ADD CONSTRAINT `university_course_ibfk_1` FOREIGN KEY (`uni_id`) REFERENCES `universities` (`uni_id`),
  ADD CONSTRAINT `university_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `user_interests_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `register` (`reg_no`),
  ADD CONSTRAINT `user_interests_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`interest_id`);

--
-- Constraints for table `user_personality`
--
ALTER TABLE `user_personality`
  ADD CONSTRAINT `user_personality_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `register` (`reg_no`),
  ADD CONSTRAINT `user_personality_ibfk_2` FOREIGN KEY (`personality_id`) REFERENCES `personalities` (`personality_id`);

--
-- Constraints for table `user_subject`
--
ALTER TABLE `user_subject`
  ADD CONSTRAINT `user_subject_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `register` (`reg_no`),
  ADD CONSTRAINT `user_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `user_subject_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`grade_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
