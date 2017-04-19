-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2017 at 08:20 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db678294987`
--

-- --------------------------------------------------------

--
-- Table structure for table `emoji`
--

CREATE TABLE `emoji` (
  `emoji_id` int(11) NOT NULL,
  `emoji_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emoji`
--

INSERT INTO `emoji` (`emoji_id`, `emoji_image`) VALUES
(1, 'awful.png'),
(2, 'sad.png'),
(3, 'normal.png'),
(4, 'good.png'),
(5, 'rad.png');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `date_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emoji_id` int(11) NOT NULL,
  `story` text NOT NULL,
  `picturename` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`date_id`, `date`, `user_name`, `emoji_id`, `story`, `picturename`) VALUES
(21, '2017-02-14', 'Lulu', 5, 'Happy to meet Andrew.', 'ASLK.jpg'),
(22, '2017-04-01', 'Lulu', 5, 'hhhhhhh', 'hhh.png'),
(23, '2017-03-28', 'Lulu', 3, '"The person who deserves most pity is a lonesome one on a rainy day who doesn\'t know how to read.” ― Benjamin Franklin', 'rainy.jpg'),
(24, '2017-03-05', 'Lulu', 4, 'Got my favourite green tea frap. ', 'frap.jpg'),
(25, '2017-04-18', 'Lulu', 2, 'So awful for being sick....', 'sick.jpg'),
(26, '2017-04-02', 'Mengsi', 4, 'Duo is a good place for dessert. Cakes are delicious!', 'duo.jpg'),
(27, '2017-04-05', 'Mengsi', 1, 'Epic fail. We failed to escpe the room! T.T', 'fail.jpg'),
(28, '2017-04-11', 'Mengsi', 5, 'Today is my mum\'s birthday. Made a floral box as a gift for her.', 'floral.jpg'),
(29, '2017-04-13', 'Mengsi', 3, 'Special brunch today. Cold plate.', 'meal.jpg'),
(30, '2017-04-18', 'Mengsi', 4, 'Picture day for IMM 2017 class, we had so much fun taking pictures!', 'photo.jpg'),
(31, '2017-03-02', 'Linus', 5, 'No work today!', 'happy.png'),
(32, '2017-03-21', 'Linus', 1, 'I lost my job T.T', 'lost.png'),
(33, '2017-04-03', 'Linus', 3, 'Just a normal day.', 'normal.jpg'),
(34, '2017-04-06', 'Linus', 2, 'I miss my cat...', 'sad.png'),
(35, '2017-04-14', 'Linus', 4, 'Workout makes me happy!', 'workout.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'Linus', '$2y$10$XJQkxmntCth086SP8TSYCuqHE3NssJfRRQn9N1V3OlrFzr3uK6nmi', 'cupzhen@sina.com'),
(6, 'Lulu', '$2y$10$tDiDIh0cF2Vfh6u8JqQWHODUi6afiQ8dUAohlW7MZoCbHIllSQx1m', 'aaa@sina.com'),
(13, 'Daisy', '$2y$10$FNOLOazTOuRO8/k2RDefSejQ8oG1F/7/Q3Te/wJ7rCuZmisKP3k4a', 'daisy@sina.com'),
(14, 'Mengsi', '$2y$10$hmWzi/eTTHy6xjd.xvPa0OJPCnm3.wIKGCXvwaS0If.jUKBIWu2gO', 'mengsi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emoji`
--
ALTER TABLE `emoji`
  ADD PRIMARY KEY (`emoji_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emoji`
--
ALTER TABLE `emoji`
  MODIFY `emoji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
