-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 11:03 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cat_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `topic_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `cat_name`, `cat_desc`, `topic_count`) VALUES
(1, 'Arriving discussion', 'Discuss here about arriving to the UK by adding topics according to your choice.', 1),
(2, 'Life in the UK', 'Discuss here about the lifestyle in the United Kingdom- For existing and coming students.', 1),
(9, 'Studying at De Montfort University', 'Discussions related to the teaching facilities, structure and regulations at De Montfort University.', 1),
(5, 'Jobs & Placements', 'Discussion about jobs and placements during your study can be done here.', 2),
(6, 'Future prospects after graduating', 'Use this area to give your fellow students the information about future prospects after graduation.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `useremail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reply_message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `topic_id`, `date`, `userid`, `useremail`, `reply_message`) VALUES
(24, 38, '2017-03-23 13:31:47', 22, 'srajvir@outlook.com', 'yes'),
(23, 38, '2017-03-23 13:31:34', 22, 'srajvir@outlook.com', 'i can help u'),
(22, 37, '2017-03-21 16:38:23', 21, 'p13202994@my365.dmu.ac.uk', 'Job at XYZ\r\npay - Â£7/hour\r\nContact - 00099988777'),
(25, 40, '2017-03-30 23:57:02', 27, 'amandeepkaur445@gmail.com', 'I am interested in knowing about this visa category. Please check your email about my query.'),
(26, 39, '2017-03-30 23:58:36', 27, 'amandeepkaur445@gmail.com', 'this is fake'),
(27, 39, '2017-03-30 23:58:51', 27, 'amandeepkaur445@gmail.com', 'I rang them and they refused to take my application.'),
(28, 41, '2017-03-31 15:14:59', 28, 'uk_bajwa@rediffmail.com', 'What are differences in asian educational institutions and DMU from teaching point of view ?'),
(29, 40, '2017-03-31 15:15:25', 28, 'uk_bajwa@rediffmail.com', 'I have emailed you to get information, please reply ?'),
(30, 38, '2017-03-31 15:16:08', 28, 'uk_bajwa@rediffmail.com', 'how far is university from london gatwick airport and which is the preffered mode of transport ?');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_Id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `c_date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `useremail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `replies` int(11) NOT NULL,
  `last_reply_date` datetime NOT NULL,
  `last_reply_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_Id`, `catid`, `c_date`, `userid`, `useremail`, `tname`, `message`, `replies`, `last_reply_date`, `last_reply_by`) VALUES
(39, 5, '2017-03-28 16:39:17', 25, 'akafsalam@gmail.com', 'New job apportunity at Pizza Hut Delivery', 'We have vacancies available at Pizza Hut Delivery Melton Road, Leicester.\r\n\r\nContact on 0116 2611911 for applying.', 3, '2017-03-28 16:39:17', 'akafsalam@gmail.com'),
(38, 1, '2017-03-23 13:31:07', 22, 'srajvir@outlook.com', 'going to dmu', 'help me', 3, '2017-03-23 13:31:07', 'srajvir@outlook.com'),
(37, 5, '2017-03-21 16:37:46', 21, 'p13202994@my365.dmu.ac.uk', 'New Job at DMU', 'Follow here for new jobs adverts', 1, '2017-03-21 16:37:46', 'p13202994@my365.dmu.ac.uk'),
(40, 6, '2017-03-28 16:40:27', 25, 'akafsalam@gmail.com', 'Tier 1: Graduate Enterpreneur', 'For more info on this visa route, contact me on akafsalam@gmail.com', 2, '2017-03-28 16:40:27', 'akafsalam@gmail.com'),
(41, 9, '2017-03-30 23:57:39', 27, 'amandeepkaur445@gmail.com', 'Study related help', 'Feel free to ask me about any study related help.', 1, '2017-03-30 23:57:39', 'amandeepkaur445@gmail.com'),
(42, 2, '2017-03-31 15:13:35', 28, 'uk_bajwa@rediffmail.com', 'UK Culture', 'I have found that, UK is far away from racism with immigrants like all other countries. What you guys think ?', 0, '2017-03-31 15:13:35', 'uk_bajwa@rediffmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `email`, `mobile`, `password`) VALUES
(21, 'RAJVIR', 'SINGH', 'p13202994@my365.dmu.ac.uk', '7463279076', 'rajvir2882'),
(22, 'rajvir', 'singh', 'srajvir@outlook.com', '9876543210', '2882waheguru'),
(23, 'kil', 'texo', 'kiltex@gmail.com', '7865678755', 'kiltex28'),
(24, 'Test', 'LName', 'srajvir28@yahoo.com', '9876543210', 'aW5kaWEyODgy'),
(25, 'AKAF', 'SALAM', 'akafsalam@gmail.com', '07956256842', 'YWthZnNhbGFtODQy'),
(26, 'Kuljit', 'Singh', 'kuljit_singh@outlook.com', '07838772769', 'a3Vsaml0c2luZ2gyODgy'),
(27, 'Amandeep', 'Kaur', 'amandeepkaur445@gmail.com', '07429183978', 'YW1hbmRlZXAzNCQ='),
(28, 'Ahmed', 'Bajwa', 'uk_bajwa@rediffmail.com', '07898765673', 'YWhtZWQ3Ng==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
