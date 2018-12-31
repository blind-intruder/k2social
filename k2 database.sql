-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2018 at 04:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k2`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_friend`
--

CREATE TABLE `add_friend` (
  `request_sender_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `request_reciever_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_rejected` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `add_friend`
--

INSERT INTO `add_friend` (`request_sender_id`, `request_reciever_id`, `is_accepted`, `is_rejected`) VALUES
('22', '23', 0, 0),
('22', '23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_text` varchar(100) COLLATE utf16_bin NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `u_id`, `c_text`, `comment_id`) VALUES
(4, 14, 'hello', 1),
(2, 12, 'hello', 2),
(2, 12, 'hello', 3),
(0, 12, 'hello', 4),
(0, 12, 'hello', 5),
(0, 12, 'hello', 6),
(0, 12, 'hello', 7),
(24, 12, 'fasfas', 8),
(24, 16, 'hello', 9),
(24, 16, 'hello', 10),
(24, 16, 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 11),
(24, 16, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 12),
(10, 14, 'hello', 13),
(28, 14, 'hello', 14),
(8, 14, 'hello', 15),
(8, 14, 'fasfas', 16),
(10, 14, 'fasfas', 17),
(26, 14, 'hello', 18),
(24, 14, 'fasf', 19),
(24, 14, 'fasf', 20),
(24, 14, 'fasf', 21),
(23, 14, 'assa', 22),
(24, 12, 'fsaf', 23),
(27, 12, '123', 24),
(29, 12, 'fdsfsd', 25),
(18, 12, 'hello', 26),
(29, 14, 'hello', 27);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `u_id_one` varchar(50) COLLATE utf16_bin NOT NULL,
  `u_id_two` varchar(50) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`u_id_one`, `u_id_two`) VALUES
('16', '12'),
('12', '16'),
('14', '16'),
('16', '14'),
('14', '22'),
('22', '14'),
('14', '12'),
('12', '14'),
('22', '12'),
('12', '22'),
('12', '24'),
('24', '12');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `liker_u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `liker_u_id`) VALUES
(0, 12),
(0, 12),
(0, 12),
(12, 12),
(12, 12),
(12, 12),
(12, 12),
(12, 12),
(12, 12),
(12, 12),
(12, 12),
(12, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(12, 12),
(12, 12),
(12, 12),
(0, 12),
(0, 12),
(0, 12),
(24, 12),
(24, 12),
(24, 12),
(23, 12),
(23, 12),
(23, 12),
(20, 12),
(20, 12),
(20, 12),
(22, 12),
(22, 12),
(22, 12),
(19, 12),
(19, 12),
(19, 12),
(2, 12),
(2, 12),
(2, 12),
(7, 12),
(7, 12),
(7, 12),
(21, 12),
(21, 12),
(21, 12),
(18, 12),
(18, 12),
(18, 12),
(1, 12),
(1, 12),
(1, 12),
(17, 12),
(17, 12),
(17, 12),
(27, 16),
(27, 16),
(27, 16),
(28, 14),
(28, 14),
(28, 14),
(28, 14),
(28, 14),
(28, 14),
(2, 16),
(2, 16),
(2, 16),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(0, 12),
(29, 12),
(29, 12),
(29, 12),
(10, 12),
(10, 12),
(10, 12),
(27, 12),
(27, 12),
(27, 12),
(28, 22),
(28, 22),
(28, 22),
(26, 22),
(26, 22),
(26, 22),
(25, 22),
(25, 22),
(25, 22),
(24, 22),
(24, 22),
(24, 22),
(23, 22),
(23, 22),
(23, 22),
(22, 22),
(22, 22),
(22, 22),
(21, 22),
(21, 22),
(21, 22),
(20, 22),
(20, 22),
(20, 22),
(19, 22),
(19, 22),
(19, 22),
(27, 22),
(27, 22),
(27, 22),
(5, 12),
(5, 12),
(5, 12),
(29, 14),
(29, 14),
(29, 14),
(45, 12),
(45, 12),
(45, 12),
(50, 12),
(50, 12),
(50, 12),
(31, 24),
(31, 24),
(31, 24);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_author_id` int(5) NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `is_friends_only` tinyint(1) NOT NULL,
  `is_only_me` tinyint(1) NOT NULL,
  `media_path` varchar(50) COLLATE utf16_bin NOT NULL DEFAULT '0',
  `post_text` varchar(300) COLLATE utf16_bin NOT NULL,
  `post_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf16_bin NOT NULL DEFAULT 'uploaded',
  `sharer_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_author_id`, `is_public`, `is_friends_only`, `is_only_me`, `media_path`, `post_text`, `post_date_time`, `post_id`, `type`, `sharer_id`) VALUES
(14, 1, 0, 0, 'capture.jpg', 'HEllo HEllo HEllo HEllo HEllo HEllo HEllo HEllo HEllo HEllo ', '0000-00-00 00:00:00', 1, 'uploaded', 0),
(14, 1, 0, 0, 'aa.jpg', 'dsafadsfasdfsadfsfasdfasdf safasd fsad f sadf sad f sa f as fsadf\r\nsadfsadfsa\r\nfsadf\r\nasd\r\nfas\r\ndf\r\nas', '0000-00-00 00:00:00', 2, 'uploaded', 0),
(12, 0, 0, 0, '180169st2.jpg', 'hhghgh', '2018-12-25 22:57:47', 4, 'uploaded', 0),
(12, 0, 0, 0, '7266aa.jpg', 'dsfasf', '2018-12-25 23:00:01', 5, 'uploaded', 0),
(12, 0, 0, 0, '30169st2.jpg', '1231321', '2018-12-25 23:01:15', 6, 'uploaded', 0),
(14, 0, 0, 0, '11266aa.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-26 20:43:37', 7, 'uploaded', 0),
(12, 0, 0, 0, '190default-cover.PNG', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-26 20:48:07', 8, 'uploaded', 0),
(12, 0, 0, 0, '181not-so-large-file.png', 'hello', '2018-12-26 20:56:36', 9, 'uploaded', 0),
(16, 0, 0, 0, '60Capture.PNG', 'hello', '2018-12-26 21:03:22', 10, 'uploaded', 0),
(12, 0, 0, 0, '100Capture.PNG', 'sfa', '2018-12-26 21:29:09', 11, 'uploaded', 0),
(12, 0, 0, 0, '34Capture.PNG', 'asf sadas1 2131', '2018-12-26 21:32:26', 12, 'uploaded', 0),
(12, 0, 0, 0, '0', 'afsafasf', '2018-12-26 21:36:01', 13, 'uploaded', 0),
(12, 0, 0, 0, '0', 'afsafasf', '2018-12-26 21:36:23', 14, 'uploaded', 0),
(12, 0, 0, 0, '63Capture.PNG', '', '2018-12-26 21:41:42', 15, 'uploaded', 0),
(12, 0, 0, 0, '158not-so-large-file.png', '', '2018-12-26 21:44:13', 16, 'uploaded', 0),
(14, 0, 0, 0, '178Capture.PNG', '', '2018-12-26 21:48:35', 17, 'uploaded', 0),
(14, 0, 0, 0, '93Capture.PNG', '', '2018-12-26 21:50:06', 18, 'uploaded', 0),
(14, 0, 0, 0, '140Capture.PNG', 'fasdfFafAS', '2018-12-26 21:53:58', 19, 'uploaded', 0),
(14, 0, 0, 0, '13Capture.PNG', '', '2018-12-26 21:54:25', 20, 'uploaded', 0),
(14, 0, 0, 0, '0', ' safasfsaf', '2018-12-26 21:54:33', 21, 'uploaded', 0),
(14, 0, 0, 0, '0', 'asfasf', '2018-12-26 22:11:15', 22, 'uploaded', 0),
(14, 0, 0, 0, '33Capture.PNG', 'asfasf', '2018-12-26 22:11:28', 23, 'uploaded', 0),
(14, 0, 0, 0, '131Capture.PNG', '', '2018-12-26 22:11:38', 24, 'uploaded', 0),
(12, 0, 0, 0, '0', ' ', '2018-12-26 22:17:16', 25, 'uploaded', 0),
(12, 0, 0, 0, '0', ' ', '2018-12-26 22:17:57', 26, 'uploaded', 0),
(12, 0, 0, 0, '0', ' sdfdasfasdfasdfsadfsadfasdf', '2018-12-26 22:22:25', 27, 'uploaded', 0),
(12, 0, 0, 0, '0', 'hehehehehehehe', '2018-12-26 22:44:44', 28, 'uploaded', 0),
(22, 0, 0, 0, '116Capture.PNG', 'hello', '2018-12-27 15:32:32', 29, 'uploaded', 0),
(23, 0, 0, 0, '34Capture.PNG', 'hi', '2018-12-27 16:29:44', 30, 'uploaded', 0),
(12, 0, 0, 0, '4166aa.jpg', 'new', '2018-12-30 18:58:18', 31, 'uploaded', 0),
(22, 0, 0, 0, '116Capture.PNG', 'hello', '2018-12-30 19:46:40', 57, 'shared', 12),
(12, 0, 0, 0, '180169st2.jpg', 'hhghgh', '2018-12-30 19:53:45', 58, 'shared', 24),
(12, 0, 0, 0, '4166aa.jpg', 'new', '2018-12-30 20:11:44', 59, 'shared', 24),
(12, 0, 0, 0, '0', ' ', '2018-12-30 20:13:13', 60, 'shared', 24);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `post_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `post_author_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `sharer_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `share_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`post_id`, `post_author_id`, `sharer_id`, `share_date_time`) VALUES
('dfsaf', 'dsafdsa', 'sadfsad', '2018-12-14 06:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `story_author_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `media_path` varchar(50) COLLATE utf16_bin NOT NULL,
  `story_date` date NOT NULL,
  `is_expired` tinyint(1) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`story_author_id`, `media_path`, `story_date`, `is_expired`, `id`) VALUES
('12', '7511250post1.jpg', '0000-00-00', 0, 1),
('12', '17611250post1.jpg', '2018-12-30', 0, 2),
('14', '511st3.jpg', '2018-12-30', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `u_email` varchar(50) COLLATE utf16_bin NOT NULL,
  `u_pass` varchar(50) COLLATE utf16_bin NOT NULL,
  `u_is_active` tinyint(1) NOT NULL,
  `u_session` varchar(50) COLLATE utf16_bin NOT NULL,
  `u_gender` varchar(10) COLLATE utf16_bin NOT NULL,
  `u_fname` varchar(30) COLLATE utf16_bin NOT NULL,
  `u_b_date` int(5) NOT NULL,
  `u_b_month` varchar(15) COLLATE utf16_bin NOT NULL,
  `u_b_year` varchar(5) COLLATE utf16_bin NOT NULL,
  `u_lname` varchar(50) COLLATE utf16_bin NOT NULL,
  `is_email_verified` tinyint(1) NOT NULL,
  `activation_code` varchar(10) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_pass`, `u_is_active`, `u_session`, `u_gender`, `u_fname`, `u_b_date`, `u_b_month`, `u_b_year`, `u_lname`, `is_email_verified`, `activation_code`) VALUES
(12, 'farhan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'farhan', 1, 'January', '1998', 'khursheed', 0, ''),
(14, 'faizan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'faizan', 1, 'January', '2018', 'ahmed', 0, ''),
(15, 'shahrayar@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'shahrayar', 1, 'January', '2018', 'khan', 0, ''),
(16, 'usama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'usama', 1, 'January', '2018', 'shoukat', 0, ''),
(22, 'fardin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'fardin', 1, 'January', '2018', 'khan', 0, ''),
(23, 'mohsin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'mohsin', 1, 'January', '1997', 'khan', 0, ''),
(24, 'faizank@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'male', 'faizan', 1, 'January', '1998', 'khan', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE `user_setting` (
  `u_id` varchar(50) COLLATE utf16_bin NOT NULL,
  `u_cover_path` varchar(50) COLLATE utf16_bin NOT NULL DEFAULT 'default-cover.png',
  `u_profile_path` varchar(50) COLLATE utf16_bin NOT NULL DEFAULT 'default.png',
  `is_private_profile` tinyint(1) NOT NULL DEFAULT '0',
  `is_public_profile` tinyint(1) NOT NULL DEFAULT '1',
  `Country` varchar(20) COLLATE utf16_bin NOT NULL DEFAULT 'Your Country',
  `City` varchar(20) COLLATE utf16_bin NOT NULL DEFAULT 'Your City',
  `u_bio` varchar(100) COLLATE utf16_bin DEFAULT 'Add bio.'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `user_setting`
--

INSERT INTO `user_setting` (`u_id`, `u_cover_path`, `u_profile_path`, `is_private_profile`, `is_public_profile`, `Country`, `City`, `u_bio`) VALUES
('15', 'default-cover.png', 'st2.jpg', 0, 1, '', '', NULL),
('14', '126142st3.jpg', 'st2.jpg', 0, 1, 'Pakistan', 'Karachi', 'Welcome too my account'),
('16', 'default-cover.png', '154st2.jpg', 0, 1, 'Pakistan', 'karachi', 'hello this is my account'),
('12', '4566aa.jpg', '1logo.jpg', 0, 1, 'Pakistan', 'Islamabad', 'hello this is my account'),
('', 'default-cover.png', 'default.png', 0, 1, 'Pakistan', 'Karachi', 'Wellcome to my account'),
('21', 'default-cover.png', 'default.png', 1, 1, '', '', 'Welcome to myy account'),
('21', 'default-cover.png', 'default.png', 1, 1, '', '', 'Welcome to myy account'),
('22', '1st3.jpg', '8aa.jpg', 1, 1, 'Pakistan', 'karachi', 'Welcome to myy account'),
('23', 'default-cover.png', 'default.png', 0, 1, 'Pakistan', 'karachi', 'Add bio.'),
('24', '11250post1.jpg', '153169st2.jpg', 0, 1, 'Pakistan', 'karachi', 'hello this is my account');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_id` (`u_id`),
  ADD UNIQUE KEY `u_id_2` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
