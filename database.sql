-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 02:15 PM
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
(1, 'Arriving discussion', 'Discuss here about arriving to the UK by adding topics according to your choice.', 2),
(2, 'Life in the UK', 'Discuss here about the lifestyle in the United Kingdom- For existing and coming students.', 1),
(9, 'Studying at De Montfort University', 'Discussions related to the teaching facilities, structure and regulations at De Montfort University.', 2),
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
(39, 46, '2017-04-10 14:26:05', 32, 'p15169449@my365.dmu.ac.uk', 'Its tier 2 visa. Check on UKVI'),
(37, 43, '2017-04-10 14:20:06', 31, 'p16221860@my365.dmu.ac.uk', 'Final test done'),
(38, 44, '2017-04-10 14:25:37', 32, 'p15169449@my365.dmu.ac.uk', 'He can contact anyone of us. Ask admin for our contact'),
(36, 43, '2017-04-10 14:18:49', 31, 'p16221860@my365.dmu.ac.uk', 'Final test done'),
(34, 43, '2017-04-10 14:15:39', 30, 'kuljit_singh@outlook.com', 'working yes'),
(35, 44, '2017-04-10 14:16:47', 30, 'kuljit_singh@outlook.com', 'My son is coming to study. Can he contact you ?'),
(33, 43, '2017-04-10 14:15:13', 30, 'kuljit_singh@outlook.com', 'working yes'),
(31, 43, '2017-04-10 14:11:41', 29, 'srajvir@outlook.com', 'is it working ?'),
(32, 43, '2017-04-10 14:13:21', 30, 'kuljit_singh@outlook.com', 'working yes'),
(40, 43, '2017-04-10 14:26:18', 32, 'p15169449@my365.dmu.ac.uk', 'working'),
(41, 45, '2017-04-10 14:29:11', 33, 'p16236574@my365.dmu.ac.uk', 'Life style is very good.'),
(42, 43, '2017-04-10 14:29:44', 33, 'p16236574@my365.dmu.ac.uk', 'working'),
(43, 43, '2017-04-10 14:31:44', 37, 'p1622287x@my365.dmu.ac.uk', 'working');

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
(48, 9, '2017-04-10 14:27:47', 32, 'p15169449@my365.dmu.ac.uk', 'Mechanical Engineering', 'Contact me to get any information about mech eng ', 0, '2017-04-10 14:27:47', 'p15169449@my365.dmu.ac.uk'),
(49, 5, '2017-04-10 14:28:51', 33, 'p16236574@my365.dmu.ac.uk', 'Part time job', 'I need help to get my CV done for part time job', 0, '2017-04-10 14:28:51', 'p16236574@my365.dmu.ac.uk'),
(47, 5, '2017-04-10 14:26:49', 32, 'p15169449@my365.dmu.ac.uk', 'Business visa', 'What are the requirements for business visa ?', 0, '2017-04-10 14:26:49', 'p15169449@my365.dmu.ac.uk'),
(46, 6, '2017-04-10 14:18:32', 31, 'p16221860@my365.dmu.ac.uk', 'Jobs ', 'What is the procedure of getting a job in the UK when you are from overseas as a student ?', 1, '2017-04-10 14:18:32', 'p16221860@my365.dmu.ac.uk'),
(45, 2, '2017-04-10 14:16:21', 30, 'kuljit_singh@outlook.com', 'Life style', 'What sort of life style is in the UK ?', 1, '2017-04-10 14:16:21', 'kuljit_singh@outlook.com'),
(43, 1, '2017-04-10 14:11:20', 29, 'srajvir@outlook.com', 'Final testing', 'Testing before submission', 9, '2017-04-10 14:11:20', 'srajvir@outlook.com'),
(44, 9, '2017-04-10 14:12:50', 29, 'srajvir@outlook.com', 'Any information', 'Contact me for any kind of information ?', 2, '2017-04-10 14:12:50', 'srajvir@outlook.com'),
(50, 1, '2017-04-10 14:31:33', 37, 'p1622287x@my365.dmu.ac.uk', 'How to get to DMU', 'From Birmigham intl airport', 0, '2017-04-10 14:31:33', 'p1622287x@my365.dmu.ac.uk');

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
(35, 'Viral', 'Shah', 'p16230341@my365.dmu.ac.uk', '08765432188', 'dmk5MXJhbA=='),
(34, 'Fasahat', 'Khan', 'p16224623@my365.dmu.ac.uk', '06655443322', 'MjNraGFu'),
(33, 'Inderpreet', 'Kaur', 'p16236574@my365.dmu.ac.uk', '09988776655', 'aW5kZXIwOTg='),
(32, 'Kulvir', 'Singh', 'p15169449@my365.dmu.ac.uk', '08877665544', 'c2luZ2g5Nw=='),
(31, 'manpreet', 'singh', 'p16221860@my365.dmu.ac.uk', '07766554433', 'aGVsbG8yOA=='),
(30, 'Kuljit', 'Singh', 'kuljit_singh@outlook.com', '07463279076', 'a2luZzI4ODI='),
(29, 'rajvir', 'singh', 'srajvir@outlook.com', '07463279076', 'a2luZzI4ODI='),
(36, 'Afzal', 'Khan', 'p16226672@my365.dmu.ac.uk', '0987667897', 'YWZ6YWwxOTk0'),
(37, 'Al', 'fred', 'p1622287x@my365.dmu.ac.uk', '09878976566', 'YWxfMjgxOV9mcmVk'),
(38, 'Mohammed', 'Rafi', 'p16220194@my365.dmu.ac.uk', '09878876677', 'bW9oOTY='),
(39, 'Akaf', 'Salam', 'akafsalam@gmail.com', '0777778888', 'YWthZjQ1Ng=='),
(40, 'test', 'acc', 'srajvir28@yahoo.com', '07463279076', 'aGVsbG8zNA==');

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
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
