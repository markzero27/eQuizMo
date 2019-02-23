-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 11:53 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daquizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_table`
--

CREATE TABLE `account_table` (
  `id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `student_1` varchar(255) NOT NULL,
  `student_2` varchar(255) NOT NULL,
  `student_3` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'player',
  `show_screen` tinyint(4) NOT NULL DEFAULT '0',
  `imei` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_table`
--

INSERT INTO `account_table` (`id`, `school`, `course`, `team_name`, `student_1`, `student_2`, `student_3`, `password`, `role`, `show_screen`, `imei`) VALUES
(1, 'Trimex', '', 'admin', '', '', '', 'admin', 'admin', 1, ''),
(54, 'Trimex Colleges', 'BSIT', 'Trimex', 'Lemmuel', 'Raynel', 'Sherweng', '1234', 'player', 0, '358168075589088'),
(65, 'Nereo', 'Grade 12', 'Nereo', 'Federico', 'Flores', 'Federico1', '1234', 'player', 0, '352812090383326'),
(66, 'Trimex Colleges', 'BSIT', 'TC', 'Vanesa ', 'Matienzo', 'Sophie', '1234', 'player', 0, '860889030856111'),
(67, 'JZGMNHS', 'Grade 12', 'Jacobo', 'Reven', 'Regan', 'Decembriano', '1234', 'player', 0, '358351080916773'),
(68, 'Jacobo', 'stem', 'jzmnhs', 'Ruel1', 'Bergonio', 'ruelll', '1234', 'player', 0, '868241036114180'),
(69, 'BNSH', 'StEM', 'BNSH', 'Ruel2', 'Bergonio', 'Ruelll', '1234', 'player', 0, '865684039922864'),
(70, 'CSH', 'STEM', 'CSH', 'Regine', 'Ibanez', 'Reg', '1234', 'player', 0, '357729081333976'),
(71, 'St.Francis School', 'STEM', 'SFS', 'Angela', 'Gelay', 'Mayordo', '1234', 'player', 0, '355880059555587'),
(72, 'JZGSAT', 'STEM', 'JZGSAT', 'Princess ', 'Marlene', 'Novila', '1234', 'player', 0, '358233080509289'),
(73, 'Sta Catalina School', 'STEM', 'SCS', 'Maria', 'Victotia', 'Manebo', '1234', 'player', 0, '352945091432871'),
(74, 'Brent', 'BSIT', 'brent', 'a', 'b', 'c', '1234', 'player', 0, '863163031777743'),
(75, 'Daquis', 'BSIT', 'mark', 'a', 'b', 'c', '1234', 'player', 0, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `category`) VALUES
(1, 'English'),
(4, 'Math'),
(6, 'Science'),
(7, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `display_table`
--

CREATE TABLE `display_table` (
  `id` int(11) NOT NULL,
  `screen` varchar(50) NOT NULL,
  `show_screen` tinyint(1) NOT NULL DEFAULT '0',
  `q_id` int(11) NOT NULL DEFAULT '0',
  `difficulty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_table`
--

INSERT INTO `display_table` (`id`, `screen`, `show_screen`, `q_id`, `difficulty`) VALUES
(6, 'display_screen', 0, 0, ''),
(9, 'android_screen', 0, 0, ''),
(21, 'mark', 0, 0, ''),
(22, 'Nereo', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `game_set`
--

CREATE TABLE `game_set` (
  `game_id` int(11) NOT NULL,
  `game_type` text NOT NULL,
  `is_locked` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_set`
--

INSERT INTO `game_set` (`game_id`, `game_type`, `is_locked`, `date`) VALUES
(12, 'Multiple Choice', 1, '2019-01-28 10:15:22'),
(13, 'Multiple Choice', 1, '2019-01-28 10:46:01'),
(14, 'Multiple Choice', 1, '2019-01-28 10:50:20'),
(15, 'Multiple Choice', 1, '2019-01-28 11:54:27'),
(16, 'Multiple Choice', 1, '2019-02-09 01:16:03'),
(17, 'Multiple Choice', 1, '2019-02-15 14:00:09'),
(19, 'Tie-breaker', 0, '2019-02-15 19:26:55'),
(20, 'Tie-breaker', 0, '2019-02-15 21:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `login_authentication`
--

CREATE TABLE `login_authentication` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `code` varchar(80) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_authentication`
--

INSERT INTO `login_authentication` (`id`, `username`, `code`, `login_time`) VALUES
(2, 'Daquis', '8zwTCb7AHl', '2019-01-29 12:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `points_table`
--

CREATE TABLE `points_table` (
  `uniq_id` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `q_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `tbscore` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `q_sequence` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points_table`
--

INSERT INTO `points_table` (`uniq_id`, `team`, `q_id`, `type`, `difficulty`, `answer`, `score`, `tbscore`, `game_id`, `q_sequence`, `rank`, `date`) VALUES
(148, 'Daquis', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 12, 1, 1, '2019-01-28 10:44:29'),
(149, 'MGA GWAPO KAME', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 12, 1, 1, '2019-01-28 10:44:30'),
(150, 'Chararat', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 12, 1, 1, '2019-01-28 10:44:30'),
(151, 'Group.Ko', 49, 'Multiple Choice', 'Easy', 'Scripting Language', 0, 0, 12, 1, 2, '2019-01-28 10:44:31'),
(152, 'L Academy', 49, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 12, 1, 2, '2019-01-28 10:44:32'),
(153, 'Chakarat', 49, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 12, 1, 2, '2019-01-28 10:44:33'),
(154, 'Team 7', 49, 'Multiple Choice', 'Easy', 'None of the above', 0, 0, 12, 1, 2, '2019-01-28 10:44:33'),
(155, 'Paaralan', 49, 'Multiple Choice', 'Easy', 'Scripting Language', 0, 0, 12, 1, 2, '2019-01-28 10:44:33'),
(156, 'BSIT', 49, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 12, 1, 2, '2019-01-28 10:44:33'),
(157, 'Chararat', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:33'),
(158, 'Chakarat', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:34'),
(159, 'Paaralan', 49, 'Multiple Choice', 'Easy', 'Scripting Language', 0, 0, 13, 1, 2, '2019-01-28 10:46:35'),
(160, 'Group.Ko', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:36'),
(161, 'L Academy', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:36'),
(162, 'Daquis', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:36'),
(163, 'BSIT', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:37'),
(164, 'Team 7', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 13, 1, 1, '2019-01-28 10:46:37'),
(165, 'MGA GWAPO KAME', 49, 'Multiple Choice', 'Easy', 'None of the above', 0, 0, 13, 1, 2, '2019-01-28 10:46:37'),
(166, 'Chararat', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 15, 1, 3, '2019-01-28 11:57:07'),
(167, 'Chakarat', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 15, 1, 3, '2019-01-28 11:57:08'),
(168, 'Group.ko', 55, 'Multiple Choice', 'Easy', 'Fencing', 0, 0, 15, 1, 8, '2019-01-28 11:57:08'),
(169, 'MGA GWAPO KAME', 55, 'Multiple Choice', 'Easy', 'Horseback riding', 0, 0, 15, 1, 6, '2019-01-28 11:57:09'),
(170, 'L Academy', 55, 'Multiple Choice', 'Easy', 'Fencing', 0, 0, 15, 1, 2, '2019-01-28 11:57:09'),
(171, 'Ven', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 15, 1, 5, '2019-01-28 11:57:09'),
(172, 'Paaralan', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 15, 1, 4, '2019-01-28 11:57:10'),
(173, 'Team 7', 55, 'Multiple Choice', 'Easy', 'Horseback riding', 0, 0, 15, 1, 7, '2019-01-28 11:57:10'),
(174, 'lui', 55, 'Multiple Choice', 'Easy', 'Fencing', 0, 0, 15, 1, 1, '2019-01-28 11:57:10'),
(175, 'Chararat', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 3, '2019-01-28 11:57:53'),
(176, 'Team 7', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 7, '2019-01-28 11:57:54'),
(177, 'Group.ko', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 8, '2019-01-28 11:57:54'),
(178, 'Ven', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 5, '2019-01-28 11:57:54'),
(179, 'Paaralan', 56, 'Multiple Choice', 'Easy', 'Manila Hotel', 1, 0, 15, 2, 4, '2019-01-28 11:57:54'),
(180, 'Chakarat', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 3, '2019-01-28 11:57:54'),
(181, 'lui', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 1, '2019-01-28 11:57:55'),
(182, 'L Academy', 56, 'Multiple Choice', 'Easy', 'Manila Hotel', 1, 0, 15, 2, 2, '2019-01-28 11:57:55'),
(183, 'MGA GWAPO KAME', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 15, 2, 6, '2019-01-28 11:57:55'),
(184, 'Chararat', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 3, '2019-01-28 11:58:37'),
(185, 'MGA GWAPO KAME', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 6, '2019-01-28 11:58:38'),
(186, 'Chakarat', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 3, '2019-01-28 11:58:38'),
(187, 'Team 7', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 7, '2019-01-28 11:58:38'),
(188, 'Ven', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 5, '2019-01-28 11:58:38'),
(189, 'Paaralan', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 4, '2019-01-28 11:58:39'),
(190, 'Group.ko', 57, 'Multiple Choice', 'Easy', 'Antonio Luna', 0, 0, 15, 3, 8, '2019-01-28 11:58:39'),
(191, 'L Academy', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 2, '2019-01-28 11:58:40'),
(192, 'lui', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 15, 3, 1, '2019-01-28 11:58:45'),
(193, 'Ven', 58, 'Multiple Choice', 'Easy', 'Ramon Magsaysay', 0, 0, 15, 4, 5, '2019-01-28 11:59:23'),
(194, 'Paaralan', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 15, 4, 4, '2019-01-28 11:59:23'),
(195, 'Chararat', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 15, 4, 3, '2019-01-28 11:59:24'),
(196, 'Chakarat', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 15, 4, 3, '2019-01-28 11:59:24'),
(197, 'MGA GWAPO KAME', 58, 'Multiple Choice', 'Easy', 'Serio Osmenia', 0, 0, 15, 4, 6, '2019-01-28 11:59:24'),
(198, 'lui', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 15, 4, 1, '2019-01-28 11:59:24'),
(199, 'Team 7', 58, 'Multiple Choice', 'Easy', 'Elpidio Quirino', 0, 0, 15, 4, 7, '2019-01-28 11:59:24'),
(200, 'L Academy', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 15, 4, 2, '2019-01-28 11:59:27'),
(201, 'Group.ko', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 15, 4, 8, '2019-01-28 11:59:27'),
(202, 'Chararat', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 3, '2019-01-28 12:00:12'),
(203, 'Chakarat', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 3, '2019-01-28 12:00:12'),
(204, 'Paaralan', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 4, '2019-01-28 12:00:12'),
(205, 'Team 7', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 7, '2019-01-28 12:00:13'),
(206, 'lui', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 1, '2019-01-28 12:00:13'),
(207, 'MGA GWAPO KAME', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 6, '2019-01-28 12:00:13'),
(208, 'Ven', 59, 'Multiple Choice', 'Easy', 'Queson City', 0, 0, 15, 5, 5, '2019-01-28 12:00:13'),
(209, 'L Academy', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 15, 5, 2, '2019-01-28 12:00:13'),
(210, 'Group.ko', 59, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 15, 5, 8, '2019-01-28 12:00:17'),
(211, 'Paaralan', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 15, 6, 4, '2019-01-28 12:01:58'),
(212, 'Chararat', 60, 'Multiple Choice', 'Average', 'Sergio Osmena', 0, 0, 15, 6, 3, '2019-01-28 12:01:58'),
(213, 'Chakarat', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 15, 6, 3, '2019-01-28 12:01:58'),
(214, 'lui', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 15, 6, 1, '2019-01-28 12:01:59'),
(215, 'L Academy', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 15, 6, 2, '2019-01-28 12:01:59'),
(216, 'Ven', 60, 'Multiple Choice', 'Average', 'Sergio Osmena', 0, 0, 15, 6, 5, '2019-01-28 12:02:01'),
(217, 'Team 7', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 15, 6, 7, '2019-01-28 12:02:01'),
(218, 'Group.ko', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 15, 6, 8, '2019-01-28 12:02:01'),
(219, 'MGA GWAPO KAME', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 15, 6, 6, '2019-01-28 12:02:03'),
(220, 'Chakarat', 61, 'Multiple Choice', 'Average', 'Carlos Garcia', 0, 0, 15, 7, 3, '2019-01-28 12:02:44'),
(221, 'Chararat', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 15, 7, 3, '2019-01-28 12:02:44'),
(222, 'MGA GWAPO KAME', 61, 'Multiple Choice', 'Average', 'Carlos Garcia', 0, 0, 15, 7, 6, '2019-01-28 12:02:44'),
(223, 'L Academy', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 15, 7, 2, '2019-01-28 12:02:44'),
(224, 'Paaralan', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 15, 7, 4, '2019-01-28 12:02:44'),
(225, 'lui', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 15, 7, 1, '2019-01-28 12:02:45'),
(226, 'Team 7', 61, 'Multiple Choice', 'Average', 'Manuel Roxas', 0, 0, 15, 7, 7, '2019-01-28 12:02:45'),
(227, 'Group.ko', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 15, 7, 8, '2019-01-28 12:02:45'),
(228, 'Ven', 61, 'Multiple Choice', 'Average', 'Elpidio Quirino', 0, 0, 15, 7, 5, '2019-01-28 12:02:46'),
(229, 'Chararat', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 3, '2019-01-28 12:03:27'),
(230, 'Chakarat', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 3, '2019-01-28 12:03:27'),
(231, 'Team 7', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 7, '2019-01-28 12:03:27'),
(232, 'Ven', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 5, '2019-01-28 12:03:28'),
(233, 'MGA GWAPO KAME', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 6, '2019-01-28 12:03:29'),
(234, 'L Academy', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 2, '2019-01-28 12:03:29'),
(235, 'Paaralan', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 4, '2019-01-28 12:03:29'),
(236, 'lui', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 15, 8, 1, '2019-01-28 12:03:31'),
(237, 'Group.ko', 62, 'Multiple Choice', 'Average', 'General Murphy', 0, 0, 15, 8, 8, '2019-01-28 12:03:32'),
(238, 'Chakarat', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 15, 9, 3, '2019-01-28 12:04:32'),
(239, 'Chararat', 63, 'Multiple Choice', 'Average', 'Flash Elorde', 0, 0, 15, 9, 3, '2019-01-28 12:04:33'),
(240, 'Team 7', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 15, 9, 7, '2019-01-28 12:04:33'),
(241, 'MGA GWAPO KAME', 63, 'Multiple Choice', 'Average', 'Onyok Velasco', 0, 0, 15, 9, 6, '2019-01-28 12:04:34'),
(242, 'Paaralan', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 15, 9, 4, '2019-01-28 12:04:34'),
(243, 'L Academy', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 15, 9, 2, '2019-01-28 12:04:34'),
(244, 'Ven', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 15, 9, 5, '2019-01-28 12:04:34'),
(245, 'Group.ko', 63, 'Multiple Choice', 'Average', 'Flash Elorde', 0, 0, 15, 9, 8, '2019-01-28 12:04:34'),
(246, 'lui', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 15, 9, 1, '2019-01-28 12:04:35'),
(247, 'Chararat', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 3, '2019-01-28 12:05:14'),
(248, 'Chakarat', 64, 'Multiple Choice', 'Average', 'Carlos Garcia', 0, 0, 15, 10, 3, '2019-01-28 12:05:14'),
(249, 'Team 7', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 7, '2019-01-28 12:05:15'),
(250, 'Paaralan', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 4, '2019-01-28 12:05:15'),
(251, 'L Academy', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 2, '2019-01-28 12:05:16'),
(252, 'Ven', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 5, '2019-01-28 12:05:16'),
(253, 'lui', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 1, '2019-01-28 12:05:17'),
(254, 'Group.ko', 64, 'Multiple Choice', 'Average', 'Carlos Garcia', 0, 0, 15, 10, 8, '2019-01-28 12:05:17'),
(255, 'MGA GWAPO KAME', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 15, 10, 6, '2019-01-28 12:05:19'),
(256, 'MGA GWAPO KAME', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 6, '2019-01-28 12:05:56'),
(257, 'L Academy', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 2, '2019-01-28 12:05:56'),
(258, 'Chararat', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 3, '2019-01-28 12:05:56'),
(259, 'Chakarat', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 3, '2019-01-28 12:05:56'),
(260, 'Paaralan', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 4, '2019-01-28 12:05:56'),
(261, 'Ven', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 5, '2019-01-28 12:05:57'),
(262, 'lui', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 1, '2019-01-28 12:05:58'),
(263, 'Group.ko', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 8, '2019-01-28 12:05:58'),
(264, 'Team 7', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 15, 11, 7, '2019-01-28 12:05:58'),
(265, 'Chararat', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 3, '2019-01-28 12:06:32'),
(266, 'Paaralan', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 4, '2019-01-28 12:06:32'),
(267, 'MGA GWAPO KAME', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 6, '2019-01-28 12:06:32'),
(268, 'Group.ko', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 8, '2019-01-28 12:06:32'),
(269, 'Ven', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 5, '2019-01-28 12:06:33'),
(270, 'L Academy', 66, 'Multiple Choice', 'Hard', 'Finland', 0, 0, 15, 12, 2, '2019-01-28 12:06:33'),
(271, 'lui', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 1, '2019-01-28 12:06:34'),
(272, 'Team 7', 66, 'Multiple Choice', 'Hard', 'Colombia', 0, 0, 15, 12, 7, '2019-01-28 12:06:35'),
(273, 'Chakarat', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 15, 12, 3, '2019-01-28 12:06:36'),
(274, 'Chararat', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 3, '2019-01-28 12:07:27'),
(275, 'L Academy', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 2, '2019-01-28 12:07:27'),
(276, 'Ven', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 5, '2019-01-28 12:07:28'),
(277, 'Chakarat', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 3, '2019-01-28 12:07:28'),
(278, 'Group.ko', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 8, '2019-01-28 12:07:28'),
(279, 'lui', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 1, '2019-01-28 12:07:28'),
(280, 'Team 7', 67, 'Multiple Choice', 'Hard', 'Juan Ponce Enrile', 0, 0, 15, 13, 7, '2019-01-28 12:07:29'),
(281, 'Paaralan', 67, 'Multiple Choice', 'Hard', 'Alejandro Melchor', 0, 0, 15, 13, 4, '2019-01-28 12:07:29'),
(282, 'MGA GWAPO KAME', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 15, 13, 6, '2019-01-28 12:07:30'),
(283, 'L Academy', 69, 'Multiple Choice', 'Hard', 'Apolinario Mabini', 3, 0, 15, 14, 2, '2019-01-28 12:08:15'),
(284, 'Chararat', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 15, 14, 3, '2019-01-28 12:08:15'),
(285, 'Team 7', 69, 'Multiple Choice', 'Hard', 'Apolinario Mabini', 3, 0, 15, 14, 7, '2019-01-28 12:08:16'),
(286, 'Paaralan', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 15, 14, 4, '2019-01-28 12:08:16'),
(287, 'MGA GWAPO KAME', 69, 'Multiple Choice', 'Hard', 'Sergio Osmena', 0, 0, 15, 14, 6, '2019-01-28 12:08:16'),
(288, 'lui', 69, 'Multiple Choice', 'Hard', 'Apolinario Mabini', 3, 0, 15, 14, 1, '2019-01-28 12:08:17'),
(289, 'Chakarat', 69, 'Multiple Choice', 'Hard', 'Apolinario Mabini', 3, 0, 15, 14, 3, '2019-01-28 12:08:17'),
(290, 'Group.ko', 69, 'Multiple Choice', 'Hard', 'Sergio Osmena', 0, 0, 15, 14, 8, '2019-01-28 12:08:18'),
(291, 'Ven', 69, 'Multiple Choice', 'Hard', 'Apolinario Mabini', 3, 0, 15, 14, 5, '2019-01-28 12:08:18'),
(292, 'Chakarat', 70, 'Multiple Choice', 'Hard', 'Six', 0, 0, 15, 15, 3, '2019-01-28 12:08:48'),
(293, 'Chararat', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 15, 15, 3, '2019-01-28 12:08:48'),
(294, 'MGA GWAPO KAME', 70, 'Multiple Choice', 'Hard', 'Six', 0, 0, 15, 15, 6, '2019-01-28 12:08:48'),
(295, 'Ven', 70, 'Multiple Choice', 'Hard', 'Three', 0, 0, 15, 15, 5, '2019-01-28 12:08:49'),
(296, 'L Academy', 70, 'Multiple Choice', 'Hard', 'Five', 3, 0, 15, 15, 2, '2019-01-28 12:08:49'),
(297, 'Team 7', 70, 'Multiple Choice', 'Hard', 'Six', 0, 0, 15, 15, 7, '2019-01-28 12:08:49'),
(298, 'lui', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 15, 15, 1, '2019-01-28 12:08:51'),
(299, 'Paaralan', 70, 'Multiple Choice', 'Hard', 'Six', 0, 0, 15, 15, 4, '2019-01-28 12:08:51'),
(300, 'Group.ko', 70, 'Multiple Choice', 'Hard', 'Times up', 0, 0, 15, 15, 8, '2019-01-28 12:08:53'),
(301, 'Chakarat', 68, 'Tie-breaker', 'Hard', 'Alejandro Melchor', 0, 0, 15, 16, 3, '2019-01-28 12:10:30'),
(302, 'Chararat', 68, 'Tie-breaker', 'Hard', 'Carlos Romulo', 0, 3, 15, 16, 3, '2019-01-28 12:10:30'),
(307, 'Jacobo', 55, 'Multiple Choice', 'Easy', 'Horseback riding', 0, 0, 17, 1, 6, '2019-02-15 14:09:52'),
(308, 'nereo', 55, 'Multiple Choice', 'Easy', 'Fencing', 0, 0, 17, 1, 2, '2019-02-15 14:09:52'),
(309, 'Bnsh', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 17, 1, 3, '2019-02-15 14:09:52'),
(310, 'brent', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 17, 1, 2, '2019-02-15 14:09:53'),
(311, 'Trimex', 55, 'Multiple Choice', 'Easy', 'Bowling', 1, 0, 17, 1, 1, '2019-02-15 14:09:54'),
(312, 'TC', 55, 'Multiple Choice', 'Easy', 'Horseback riding', 0, 0, 17, 1, 7, '2019-02-15 14:09:55'),
(313, 'JZGSAT', 55, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 17, 1, 8, '2019-02-15 14:09:56'),
(314, 'CSH', 55, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 17, 1, 4, '2019-02-15 14:09:56'),
(315, 'SCS', 55, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 17, 1, 3, '2019-02-15 14:09:57'),
(316, 'Bnsh', 56, 'Multiple Choice', 'Easy', 'Post Office', 0, 0, 17, 2, 3, '2019-02-15 14:11:35'),
(317, 'Trimex', 56, 'Multiple Choice', 'Easy', 'Manila Hotel', 1, 0, 17, 2, 1, '2019-02-15 14:11:36'),
(318, 'nereo', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 17, 2, 2, '2019-02-15 14:11:36'),
(319, 'CSH', 56, 'Multiple Choice', 'Easy', 'Manila Hotel', 1, 0, 17, 2, 4, '2019-02-15 14:11:37'),
(320, 'Jacobo', 56, 'Multiple Choice', 'Easy', 'Central Bank', 0, 0, 17, 2, 6, '2019-02-15 14:11:37'),
(321, 'TC', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 17, 2, 7, '2019-02-15 14:11:38'),
(322, 'brent', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 17, 2, 2, '2019-02-15 14:11:38'),
(323, 'JZGSAT', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 17, 2, 8, '2019-02-15 14:11:39'),
(324, 'Jzmnhs', 56, 'Multiple Choice', 'Easy', 'Malacanan Palace', 0, 0, 17, 1, 5, '2019-02-15 14:11:41'),
(325, 'SCS', 56, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 17, 2, 3, '2019-02-15 14:11:42'),
(326, 'Trimex', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 1, '2019-02-15 14:12:39'),
(327, 'nereo', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 2, '2019-02-15 14:12:39'),
(328, 'TC', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 7, '2019-02-15 14:12:40'),
(329, 'Jacobo', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 6, '2019-02-15 14:12:40'),
(330, 'Bnsh', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 3, '2019-02-15 14:12:40'),
(331, 'CSH', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 4, '2019-02-15 14:12:41'),
(332, 'JZGSAT', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 8, '2019-02-15 14:12:41'),
(333, 'brent', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 2, '2019-02-15 14:12:41'),
(334, 'Jzmnhs', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 2, 5, '2019-02-15 14:12:42'),
(335, 'SCS', 57, 'Multiple Choice', 'Easy', 'Gregorio Del Pilar', 1, 0, 17, 3, 3, '2019-02-15 14:12:42'),
(336, 'CSH', 58, 'Multiple Choice', 'Easy', 'Serio Osmenia', 0, 0, 17, 4, 4, '2019-02-15 14:14:52'),
(337, 'Trimex', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 17, 4, 1, '2019-02-15 14:14:52'),
(338, 'Jacobo', 58, 'Multiple Choice', 'Easy', 'Ramon Magsaysay', 0, 0, 17, 4, 6, '2019-02-15 14:14:53'),
(339, 'JZGSAT', 58, 'Multiple Choice', 'Easy', 'Serio Osmenia', 0, 0, 17, 4, 8, '2019-02-15 14:14:54'),
(340, 'Bnsh', 58, 'Multiple Choice', 'Easy', 'Elpidio Quirino', 0, 0, 17, 4, 3, '2019-02-15 14:14:54'),
(341, 'nereo', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 17, 4, 2, '2019-02-15 14:14:54'),
(342, 'brent', 58, 'Multiple Choice', 'Easy', 'Serio Osmenia', 0, 0, 17, 4, 2, '2019-02-15 14:14:54'),
(343, 'SCS', 58, 'Multiple Choice', 'Easy', 'Manuel Roxas', 1, 0, 17, 4, 3, '2019-02-15 14:14:55'),
(344, 'Jzmnhs', 58, 'Multiple Choice', 'Easy', 'Elpidio Quirino', 0, 0, 17, 3, 5, '2019-02-15 14:14:55'),
(345, 'TC', 58, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 17, 4, 7, '2019-02-15 14:14:57'),
(346, 'CSH', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 4, '2019-02-15 14:15:42'),
(347, 'Trimex', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 1, '2019-02-15 14:15:43'),
(348, 'nereo', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 2, '2019-02-15 14:15:43'),
(349, 'Jacobo', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 6, '2019-02-15 14:15:43'),
(350, 'Jzmnhs', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 4, 5, '2019-02-15 14:15:43'),
(351, 'SCS', 59, 'Multiple Choice', 'Easy', 'Queson City', 0, 0, 17, 5, 3, '2019-02-15 14:15:43'),
(352, 'TC', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 7, '2019-02-15 14:15:43'),
(353, 'Bnsh', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 3, '2019-02-15 14:15:44'),
(354, 'JZGSAT', 59, 'Multiple Choice', 'Easy', 'Manila City', 1, 0, 17, 5, 8, '2019-02-15 14:15:44'),
(355, 'brent', 59, 'Multiple Choice', 'Easy', 'Times up', 0, 0, 17, 5, 2, '2019-02-15 14:15:48'),
(356, 'Jzmnhs', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 17, 5, 5, '2019-02-15 14:17:34'),
(357, 'Trimex', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 17, 6, 1, '2019-02-15 14:17:35'),
(358, 'Jacobo', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 17, 6, 6, '2019-02-15 14:17:35'),
(359, 'nereo', 60, 'Multiple Choice', 'Average', 'Sergio Osmena', 0, 0, 17, 6, 2, '2019-02-15 14:17:35'),
(360, 'JZGSAT', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 17, 6, 8, '2019-02-15 14:17:35'),
(361, 'TC', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 17, 6, 7, '2019-02-15 14:17:36'),
(362, 'CSH', 60, 'Multiple Choice', 'Average', 'Sergio Osmena', 0, 0, 17, 6, 4, '2019-02-15 14:17:37'),
(363, 'brent', 60, 'Multiple Choice', 'Average', 'Sergio Osmena', 0, 0, 17, 6, 2, '2019-02-15 14:17:37'),
(364, 'SCS', 60, 'Multiple Choice', 'Average', 'Sergio Osmena', 0, 0, 17, 6, 3, '2019-02-15 14:17:38'),
(365, 'Bnsh', 60, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 17, 6, 3, '2019-02-15 14:17:39'),
(366, 'Trimex', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 17, 7, 1, '2019-02-15 14:18:21'),
(367, 'Bnsh', 61, 'Multiple Choice', 'Average', 'Manuel Roxas', 0, 0, 17, 7, 3, '2019-02-15 14:18:21'),
(368, 'CSH', 61, 'Multiple Choice', 'Average', 'Carlos Garcia', 0, 0, 17, 7, 4, '2019-02-15 14:18:21'),
(369, 'Jzmnhs', 61, 'Multiple Choice', 'Average', 'Manuel Roxas', 0, 0, 17, 6, 5, '2019-02-15 14:18:22'),
(370, 'nereo', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 17, 7, 2, '2019-02-15 14:18:22'),
(371, 'Jacobo', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 17, 7, 6, '2019-02-15 14:18:22'),
(372, 'TC', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 17, 7, 7, '2019-02-15 14:18:23'),
(373, 'SCS', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 17, 7, 3, '2019-02-15 14:18:24'),
(374, 'brent', 61, 'Multiple Choice', 'Average', 'Ramon Magsaysay', 2, 0, 17, 7, 2, '2019-02-15 14:18:24'),
(375, 'JZGSAT', 61, 'Multiple Choice', 'Average', 'Carlos Garcia', 0, 0, 17, 7, 8, '2019-02-15 14:18:24'),
(376, 'Jzmnhs', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 17, 7, 5, '2019-02-15 14:19:43'),
(377, 'Bnsh', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 17, 8, 3, '2019-02-15 14:19:43'),
(378, 'Jacobo', 62, 'Multiple Choice', 'Average', 'General Taft', 0, 0, 17, 8, 6, '2019-02-15 14:19:43'),
(379, 'JZGSAT', 62, 'Multiple Choice', 'Average', 'General Arthur Mc Arthur', 2, 0, 17, 8, 8, '2019-02-15 14:19:44'),
(380, 'SCS', 62, 'Multiple Choice', 'Average', 'General Murphy', 0, 0, 17, 8, 3, '2019-02-15 14:19:44'),
(381, 'CSH', 62, 'Multiple Choice', 'Average', 'General Taft', 0, 0, 17, 8, 4, '2019-02-15 14:19:44'),
(382, 'nereo', 62, 'Multiple Choice', 'Average', 'General Taft', 0, 0, 17, 8, 2, '2019-02-15 14:19:45'),
(383, 'brent', 62, 'Multiple Choice', 'Average', 'General Taft', 0, 0, 17, 8, 2, '2019-02-15 14:19:45'),
(384, 'TC', 62, 'Multiple Choice', 'Average', 'General Taft', 0, 0, 17, 8, 7, '2019-02-15 14:19:48'),
(385, 'Trimex', 62, 'Multiple Choice', 'Average', 'Times up', 0, 0, 17, 8, 1, '2019-02-15 14:19:49'),
(386, 'Bnsh', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 17, 9, 3, '2019-02-15 14:23:04'),
(387, 'Trimex', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 17, 9, 1, '2019-02-15 14:23:04'),
(388, 'Jzmnhs', 63, 'Multiple Choice', 'Average', 'Anthony Villanueva', 2, 0, 17, 8, 5, '2019-02-15 14:23:05'),
(389, 'Jacobo', 63, 'Multiple Choice', 'Average', 'Ereberto Salabarya', 0, 0, 17, 9, 6, '2019-02-15 14:23:05'),
(390, 'CSH', 63, 'Multiple Choice', 'Average', 'Onyok Velasco', 0, 0, 17, 9, 4, '2019-02-15 14:23:05'),
(391, 'nereo', 63, 'Multiple Choice', 'Average', 'Onyok Velasco', 0, 0, 17, 9, 2, '2019-02-15 14:23:05'),
(392, 'TC', 63, 'Multiple Choice', 'Average', 'Flash Elorde', 0, 0, 17, 9, 7, '2019-02-15 14:23:06'),
(393, 'SCS', 63, 'Multiple Choice', 'Average', 'Onyok Velasco', 0, 0, 17, 9, 3, '2019-02-15 14:23:06'),
(394, 'brent', 63, 'Multiple Choice', 'Average', 'Flash Elorde', 0, 0, 17, 9, 2, '2019-02-15 14:23:06'),
(395, 'JZGSAT', 63, 'Multiple Choice', 'Average', 'Onyok Velasco', 0, 0, 17, 9, 8, '2019-02-15 14:23:06'),
(396, 'Jzmnhs', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 9, 5, '2019-02-15 14:24:46'),
(397, 'Bnsh', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 3, '2019-02-15 14:24:47'),
(398, 'SCS', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 3, '2019-02-15 14:24:47'),
(399, 'Jacobo', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 6, '2019-02-15 14:24:47'),
(400, 'nereo', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 2, '2019-02-15 14:24:47'),
(401, 'CSH', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 4, '2019-02-15 14:24:47'),
(402, 'TC', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 7, '2019-02-15 14:24:47'),
(403, 'Trimex', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 1, '2019-02-15 14:24:47'),
(404, 'brent', 64, 'Multiple Choice', 'Average', 'Manuel Quezon', 0, 0, 17, 10, 2, '2019-02-15 14:24:47'),
(405, 'JZGSAT', 64, 'Multiple Choice', 'Average', 'Ferdinand Marcos', 2, 0, 17, 10, 8, '2019-02-15 14:24:52'),
(406, 'Bnsh', 65, 'Multiple Choice', 'Hard', 'Mathematician', 0, 0, 17, 11, 3, '2019-02-15 14:26:11'),
(407, 'Trimex', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 17, 11, 1, '2019-02-15 14:26:11'),
(408, 'nereo', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 17, 11, 2, '2019-02-15 14:26:12'),
(409, 'Jzmnhs', 65, 'Multiple Choice', 'Hard', 'Mathematician', 0, 0, 17, 10, 5, '2019-02-15 14:26:12'),
(410, 'CSH', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 17, 11, 4, '2019-02-15 14:26:13'),
(411, 'SCS', 65, 'Multiple Choice', 'Hard', 'Mathematician', 0, 0, 17, 11, 3, '2019-02-15 14:26:13'),
(412, 'brent', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 17, 11, 2, '2019-02-15 14:26:13'),
(413, 'TC', 65, 'Multiple Choice', 'Hard', 'Mathematician', 0, 0, 17, 11, 7, '2019-02-15 14:26:14'),
(414, 'Jacobo', 65, 'Multiple Choice', 'Hard', 'Mathematician', 0, 0, 17, 11, 6, '2019-02-15 14:26:15'),
(415, 'JZGSAT', 65, 'Multiple Choice', 'Hard', 'Times up', 0, 0, 17, 11, 8, '2019-02-15 14:26:17'),
(416, 'Trimex', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 17, 12, 1, '2019-02-15 14:26:57'),
(417, 'Jzmnhs', 66, 'Multiple Choice', 'Hard', 'Venezuela', 0, 0, 17, 11, 5, '2019-02-15 14:26:58'),
(418, 'Jacobo', 66, 'Multiple Choice', 'Hard', 'Colombia', 0, 0, 17, 12, 6, '2019-02-15 14:26:58'),
(419, 'SCS', 66, 'Multiple Choice', 'Hard', 'Finland', 3, 0, 17, 12, 3, '2019-02-15 14:26:59'),
(420, 'Bnsh', 66, 'Multiple Choice', 'Hard', 'Venezuela', 0, 0, 17, 12, 3, '2019-02-15 14:27:00'),
(421, 'CSH', 66, 'Multiple Choice', 'Hard', 'Venezuela', 0, 0, 17, 12, 4, '2019-02-15 14:27:00'),
(422, 'nereo', 66, 'Multiple Choice', 'Hard', 'Venezuela', 0, 0, 17, 12, 2, '2019-02-15 14:27:00'),
(423, 'TC', 66, 'Multiple Choice', 'Hard', 'Colombia', 0, 0, 17, 12, 7, '2019-02-15 14:27:01'),
(424, 'brent', 66, 'Multiple Choice', 'Hard', 'Times up', 0, 0, 17, 12, 2, '2019-02-15 14:27:04'),
(425, 'Bnsh', 67, 'Multiple Choice', 'Hard', 'Alejandro Melchor', 0, 0, 17, 13, 3, '2019-02-15 14:31:12'),
(426, 'Jzmnhs', 67, 'Multiple Choice', 'Hard', 'Juan Ponce Enrile', 0, 0, 17, 12, 5, '2019-02-15 14:31:12'),
(427, 'JZGSAT', 67, 'Multiple Choice', 'Hard', 'Alejandro Melchor', 0, 0, 17, 12, 8, '2019-02-15 14:31:12'),
(428, 'Trimex', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 17, 13, 1, '2019-02-15 14:31:13'),
(429, 'Jacobo', 67, 'Multiple Choice', 'Hard', 'Juan Ponce Enrile', 0, 0, 17, 13, 6, '2019-02-15 14:31:13'),
(430, 'brent', 67, 'Multiple Choice', 'Hard', 'Carlos Romulo', 3, 0, 17, 13, 2, '2019-02-15 14:31:14'),
(431, 'nereo', 67, 'Multiple Choice', 'Hard', 'Juan Ponce Enrile', 0, 0, 17, 13, 2, '2019-02-15 14:31:14'),
(432, 'CSH', 67, 'Multiple Choice', 'Hard', 'Juan Ponce Enrile', 0, 0, 17, 13, 4, '2019-02-15 14:31:14'),
(433, 'SCS', 67, 'Multiple Choice', 'Hard', 'Blas Ople', 0, 0, 17, 13, 3, '2019-02-15 14:31:14'),
(434, 'TC', 67, 'Multiple Choice', 'Hard', 'Juan Ponce Enrile', 0, 0, 17, 13, 7, '2019-02-15 14:31:16'),
(435, 'nereo', 69, 'Multiple Choice', 'Hard', 'Times up', 0, 0, 17, 14, 2, '2019-02-15 14:32:05'),
(436, 'TC', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 17, 14, 7, '2019-02-15 14:32:06'),
(437, 'Jacobo', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 17, 14, 6, '2019-02-15 14:32:06'),
(438, 'Bnsh', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 17, 14, 3, '2019-02-15 14:32:06'),
(439, 'Trimex', 69, 'Multiple Choice', 'Hard', 'Apolinario Mabini', 3, 0, 17, 14, 1, '2019-02-15 14:32:07'),
(440, 'CSH', 69, 'Multiple Choice', 'Hard', 'Emilio Jacinto', 0, 0, 17, 14, 4, '2019-02-15 14:32:07'),
(441, 'SCS', 69, 'Multiple Choice', 'Hard', 'Emilio Jacinto', 0, 0, 17, 14, 3, '2019-02-15 14:32:07'),
(442, 'brent', 69, 'Multiple Choice', 'Hard', 'Emilio Jacinto', 0, 0, 17, 14, 2, '2019-02-15 14:32:10'),
(443, 'Jzmnhs', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 17, 13, 5, '2019-02-15 14:32:10'),
(444, 'JZGSAT', 69, 'Multiple Choice', 'Hard', 'Jose Palma', 0, 0, 17, 13, 8, '2019-02-15 14:32:12'),
(445, 'Trimex', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 1, '2019-02-15 14:32:56'),
(446, 'Bnsh', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 3, '2019-02-15 14:32:56'),
(447, 'CSH', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 4, '2019-02-15 14:32:56'),
(448, 'Jacobo', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 6, '2019-02-15 14:32:56'),
(449, 'brent', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 2, '2019-02-15 14:32:57'),
(450, 'JZGSAT', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 14, 8, '2019-02-15 14:32:57'),
(451, 'SCS', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 3, '2019-02-15 14:32:57'),
(452, 'Jzmnhs', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 14, 5, '2019-02-15 14:32:57'),
(453, 'nereo', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 2, '2019-02-15 14:32:57'),
(454, 'TC', 70, 'Multiple Choice', 'Hard', 'Four', 3, 0, 17, 15, 7, '2019-02-15 14:32:58'),
(459, 'nereo', 70, 'Tie-breaker', 'Hard', 'Six', 0, 0, 17, 16, 2, '2019-02-15 14:41:24'),
(460, 'SCS', 70, 'Tie-breaker', 'Hard', 'Five', 0, 0, 17, 16, 3, '2019-02-15 14:41:25'),
(461, 'Bnsh', 70, 'Tie-breaker', 'Hard', 'Four', 0, 3, 17, 16, 3, '2019-02-15 14:41:25'),
(462, 'brent', 70, 'Tie-breaker', 'Hard', 'Four', 0, 3, 17, 16, 2, '2019-02-15 14:41:26'),
(464, 'Jzmnhs', 56, 'Multiple Choice', 'Easy', 'disconnected', 0, 0, 17, 0, 5, '2019-02-15 19:13:47'),
(465, 'mark', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 19, 1, 2, '2019-02-15 19:38:15'),
(471, 'nereo', 59, 'Multiple Choice', 'Easy', 'disconnected', 0, 0, 19, 0, 1, '2019-02-15 19:59:05'),
(472, 'mark', 50, 'Multiple Choice', 'Easy', 'Liver', 1, 0, 19, 1, 2, '2019-02-15 19:59:09'),
(473, 'nereo', 50, 'Multiple Choice', 'Easy', 'Disconnected', 0, 0, 19, 1, 1, '2019-02-15 20:06:47'),
(474, 'mark', 51, 'Multiple Choice', 'Easy', 'Sartorius', 1, 0, 19, 2, 2, '2019-02-15 20:14:57'),
(475, 'nereo', 51, 'Multiple Choice', 'Easy', 'Disconnected', 0, 0, 19, 0, 1, '2019-02-15 20:15:11'),
(476, 'nereo', 52, 'Multiple Choice', 'Easy', 'Disconnected', 0, 0, 19, 0, 1, '2019-02-15 20:16:04'),
(477, 'mark', 52, 'Multiple Choice', 'Easy', 'Disconnected', 0, 0, 19, 0, 2, '2019-02-15 20:16:04'),
(478, 'Nereo', 54, 'Multiple Choice', 'Easy', 'Clubs', 1, 0, 19, 1, 1, '2019-02-15 20:24:33'),
(479, 'mark', 54, 'Multiple Choice', 'Easy', 'Disconnected', 0, 0, 19, 0, 2, '2019-02-15 20:24:40'),
(480, 'Nereo', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 19, 2, 1, '2019-02-15 20:37:18'),
(481, 'mark', 60, 'Multiple Choice', 'Average', 'Disconnected', 0, 0, 19, 0, 2, '2019-02-15 20:37:28'),
(482, 'Nereo', 65, 'Multiple Choice', 'Hard', 'Times up', 0, 0, 19, 3, 1, '2019-02-15 20:40:47'),
(483, 'mark', 65, 'Multiple Choice', 'Hard', 'Disconnected', 0, 0, 19, 0, 2, '2019-02-15 20:40:53'),
(484, 'Nereo', 67, 'Tie-breaker', 'Hard', 'Carlos Romulo', 0, 3, 19, 4, 1, '2019-02-15 20:48:47'),
(487, 'mark', 67, 'Tie-breaker', 'Hard', 'Disconnected', 0, 0, 19, 0, 2, '2019-02-15 21:53:02'),
(488, 'Mark', 49, 'Multiple Choice', 'Easy', 'Programming Language', 1, 0, 20, 1, 1, '2019-02-15 21:59:11'),
(489, 'Nereo', 49, 'Multiple Choice', 'Easy', 'Disconnected', 0, 0, 20, 0, 2, '2019-02-15 21:59:25'),
(490, 'Mark', 60, 'Multiple Choice', 'Average', 'Claro Recto', 2, 0, 20, 2, 1, '2019-02-15 22:00:16'),
(491, 'Nereo', 60, 'Multiple Choice', 'Average', 'Disconnected', 0, 0, 20, 0, 2, '2019-02-15 22:00:22'),
(492, 'Mark', 65, 'Multiple Choice', 'Hard', 'Coin Collector', 3, 0, 20, 3, 1, '2019-02-15 22:01:11'),
(493, 'Nereo', 65, 'Multiple Choice', 'Hard', 'Disconnected', 0, 0, 20, 0, 2, '2019-02-15 22:01:20'),
(494, 'Mark', 66, 'Tie-breaker', 'Hard', 'Finland', 0, 3, 20, 4, 0, '2019-02-15 22:02:12'),
(495, 'Nereo', 66, 'Tie-breaker', 'Hard', 'Disconnected', 0, 0, 20, 0, 0, '2019-02-15 22:05:54'),
(496, 'Mark', 67, 'Tie-breaker', 'Hard', 'Times up', 0, 0, 20, 5, 0, '2019-02-15 22:09:10'),
(497, 'Nereo', 67, 'Tie-breaker', 'Hard', 'Disconnected', 0, 0, 20, 0, 0, '2019-02-15 22:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `q_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `question` varchar(255) NOT NULL,
  `q_image` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `points` int(11) NOT NULL,
  `is_selected` tinyint(1) NOT NULL DEFAULT '0',
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `q_sequence` int(11) NOT NULL DEFAULT '0',
  `timer` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`q_id`, `category`, `difficulty`, `type`, `question`, `q_image`, `option1`, `option2`, `option3`, `option4`, `answer`, `points`, `is_selected`, `is_done`, `q_sequence`, `timer`) VALUES
(49, 'English', 'Easy', 'Multiple Choice', 'What is PHP?', '', 'Programming Language', 'Machine Learning', 'Scripting Language', 'None of the above', 'Programming Language', 1, 1, 1, 1, 10),
(50, 'English', 'Easy', 'Multiple Choice', 'Which organ of the alimentary canal is known as \"Graveyard of Red Blood Cells\" ?', '', ' Liver', ' Pancreas  ', 'Spleen', ' Duodenum', ' Liver', 1, 1, 0, 2, 5),
(51, 'English', 'Easy', 'Multiple Choice', 'The Longest muscle in the body is?', '', ' Deltoid ', ' Iliopsoas  ', 'Pectoralis', ' Sartorius', ' Sartorius', 1, 0, 0, 3, 5),
(52, 'English', 'Easy', 'Multiple Choice', 'which of the following is a scalar quantity ?', '', 'Mass', 'Weight', 'Gravity', 'Velocity', 'Mass', 1, 0, 0, 4, 5),
(54, 'English', 'Easy', 'Multiple Choice', ' Which one of the following is not considered as an organization?', '', 'Clubs', 'Schools', 'Association', 'Society', 'Clubs', 1, 0, 0, 5, 5),
(55, 'English', 'Easy', 'Multiple Choice', 'A kegler is associated with this sport?', '', 'Boxing', 'Fencing', 'Bowling', 'Horseback riding', 'Bowling', 1, 0, 0, 6, 5),
(56, 'English', 'Easy', 'Multiple Choice', 'The first air conditioned building in Philippines ', '', 'Malacanan Palace', 'Central Bank', 'Manila Hotel', 'Post Office', 'Manila Hotel', 1, 0, 0, 7, 5),
(57, 'English', 'Easy', 'Multiple Choice', 'The hero of Tirad pass is', '', 'Antonio Luna', 'General Ola', 'Gregorio Del Pilar', 'Macario Sakay', 'Gregorio Del Pilar', 1, 0, 0, 8, 5),
(58, 'English', 'Easy', 'Multiple Choice', 'He was the last president of Philippine Commonwelth?', '', 'Serio Osmenia', 'Manuel Roxas', 'Elpidio Quirino', 'Ramon Magsaysay', 'Manuel Roxas', 1, 0, 0, 9, 5),
(59, 'English', 'Easy', 'Multiple Choice', 'Capital of the Philippines is', '', 'Queson City', 'Manila City', 'Caloocan City', 'Pasay City', 'Manila City', 1, 0, 0, 10, 5),
(60, 'English', 'Average', 'Multiple Choice', 'He was the president of constitutional Convention of 1934 which drafted the 1935 constitution?', '', 'Manuel Quezon', 'Sergio Osmena', 'Claro Recto', 'Emilio Aguinaldo', 'Claro Recto', 2, 1, 1, 1, 5),
(61, 'English', 'Average', 'Multiple Choice', 'The Philippine president who died in a plane crashed', '', 'Elpidio Quirino', 'Manuel Roxas', 'Ramon Magsaysay', 'Carlos Garcia', 'Ramon Magsaysay', 2, 0, 0, 2, 5),
(62, 'History', 'Average', 'Multiple Choice', 'He was the first American Governor General who receded in the Malacanan palace', '', 'General Smith', 'General Murphy', 'General Taft', 'General Arthur Mc Arthur', 'General Arthur Mc Arthur', 2, 0, 0, 3, 5),
(63, 'History', 'Average', 'Multiple Choice', 'He won the silver medal in boxing in the 1964 Tokyo  Olympics?', '', 'Anthony Villanueva', 'Flash Elorde', 'Onyok Velasco', 'Ereberto Salabarya', 'Anthony Villanueva', 2, 0, 0, 4, 5),
(64, 'History', 'Average', 'Multiple Choice', 'The first Filipino to be re-elected as president of the Philippines', '', 'Manuel Quezon', 'Diosdado Macapagal', 'Ferdinand Marcos', 'Carlos Garcia', 'Ferdinand Marcos', 2, 0, 0, 5, 5),
(65, 'English', 'Hard', 'Multiple Choice', 'A numismatist is a?', '', 'Mathematician', 'Coin Collector', 'Loner', 'Athlete ', 'Coin Collector', 3, 1, 1, 1, 5),
(66, 'English', 'Hard', 'Multiple Choice', 'The first Ms universe came from this country?', '', 'USA', 'Venezuela', 'Finland', 'Colombia', 'Finland', 3, 1, 1, 2, 5),
(67, 'English', 'Hard', 'Multiple Choice', 'The first Asian to be elected as secretary General of the United Nation in 1949?', '', 'Blas Ople', 'Carlos Romulo', 'Juan Ponce Enrile', 'Alejandro Melchor', 'Carlos Romulo', 3, 1, 1, 3, 5),
(68, 'English', 'Hard', 'Multiple Choice', 'The first Asian to be elected as secretary General of the United Nation in 1949?', '', 'Blas Ople', 'Carlos Romulo', 'Juan Ponce Enrile', 'Alejandro Melchor', 'Carlos Romulo', 3, 0, 0, 4, 5),
(69, 'English', 'Hard', 'Multiple Choice', 'First Filipino to become secretary of foreign affairs ', '', 'Emilio Jacinto', 'Jose Palma', 'Apolinario Mabini', 'Sergio Osmena', 'Apolinario Mabini', 3, 0, 0, 5, 5),
(70, 'English', 'Hard', 'Multiple Choice', 'The Philippines Produced this number of Ms. Universe', '', 'Three', 'Four', 'Five', 'Six', 'Four', 3, 0, 0, 6, 5),
(71, 'English', 'Easy', 'Multiple Choice', 'Who is Magellan?', '', 'National hero', 'International Hero', 'Local Hero', 'None of the above', 'None of the above', 1, 0, 0, 11, 15);

-- --------------------------------------------------------

--
-- Table structure for table `used_question`
--

CREATE TABLE `used_question` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `q_type` varchar(255) NOT NULL DEFAULT 'Multiple Choice'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_question`
--

INSERT INTO `used_question` (`id`, `game_id`, `question_id`, `difficulty`, `q_type`) VALUES
(2, 17, 0, 'Easy', 'Multiple Choice'),
(3, 17, 0, 'Easy', 'Multiple Choice'),
(4, 17, 0, 'Easy', 'Multiple Choice'),
(5, 17, 0, 'Easy', 'Multiple Choice'),
(6, 17, 0, 'Easy', 'Multiple Choice'),
(7, 19, 49, 'Easy', 'Multiple Choice'),
(8, 19, 50, 'Easy', 'Multiple Choice'),
(9, 19, 51, 'Easy', 'Multiple Choice'),
(10, 19, 52, 'Easy', 'Multiple Choice'),
(11, 19, 54, 'Easy', 'Multiple Choice'),
(12, 19, 60, 'Average', 'Multiple Choice'),
(13, 19, 65, 'Hard', 'Multiple Choice'),
(14, 19, 67, 'Hard', 'Tie-breaker'),
(15, 20, 49, 'Easy', 'Multiple Choice'),
(16, 20, 60, 'Average', 'Multiple Choice'),
(17, 20, 65, 'Hard', 'Multiple Choice'),
(18, 20, 66, 'Hard', 'Tie-breaker'),
(19, 20, 67, 'Hard', 'Tie-breaker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_table`
--
ALTER TABLE `account_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `display_table`
--
ALTER TABLE `display_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_set`
--
ALTER TABLE `game_set`
  ADD PRIMARY KEY (`game_id`),
  ADD UNIQUE KEY `game_id` (`game_id`);

--
-- Indexes for table `login_authentication`
--
ALTER TABLE `login_authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points_table`
--
ALTER TABLE `points_table`
  ADD PRIMARY KEY (`uniq_id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`q_id`),
  ADD UNIQUE KEY `question_number` (`q_id`);

--
-- Indexes for table `used_question`
--
ALTER TABLE `used_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_table`
--
ALTER TABLE `account_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `display_table`
--
ALTER TABLE `display_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `game_set`
--
ALTER TABLE `game_set`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login_authentication`
--
ALTER TABLE `login_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `points_table`
--
ALTER TABLE `points_table`
  MODIFY `uniq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `used_question`
--
ALTER TABLE `used_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
