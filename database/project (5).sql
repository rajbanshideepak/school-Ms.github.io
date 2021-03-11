-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 04:35 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aid`, `subid`, `qid`, `answer`) VALUES
(1, 3, 1, 'this is A'),
(2, 3, 1, 'this is B'),
(3, 3, 1, 'this is C'),
(4, 3, 1, 'this is D'),
(5, 3, 2, 'ans no A'),
(6, 3, 2, 'ans no B'),
(7, 3, 2, 'ans no C'),
(8, 3, 2, 'ans no D'),
(9, 3, 3, 'ans3 A'),
(10, 3, 3, 'ans3 B'),
(11, 3, 3, 'ans C'),
(12, 3, 3, 'ans D'),
(13, 1, 1, 'PHP A'),
(14, 1, 1, 'php B'),
(15, 1, 1, 'ans c'),
(16, 1, 1, 'ans D'),
(17, 1, 2, 'php 2'),
(18, 1, 2, 'php second'),
(19, 1, 2, 'php third'),
(20, 1, 2, 'php forth'),
(21, 29, 1, 'this is A'),
(22, 29, 1, 'this is B'),
(23, 29, 1, 'this is C'),
(24, 29, 1, 'this is D'),
(25, 29, 2, 'yes'),
(26, 29, 2, 'ya'),
(27, 29, 2, 'no '),
(28, 29, 2, 'な'),
(29, 21, 1, 'this is A'),
(30, 21, 1, '   this is B'),
(31, 21, 1, '   this is C'),
(32, 21, 1, '   this is D'),
(33, 21, 2, 'yes'),
(34, 21, 2, 'ya'),
(35, 21, 2, 'no '),
(36, 21, 2, 'な'),
(37, 38, 1, ' deepak'),
(38, 38, 1, 'anju'),
(39, 38, 1, 'lama'),
(40, 38, 1, 'tamang');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `email`, `message`, `date`, `time`) VALUES
(1, 'sms@gmail.com', 'how are you bro', '2021-01-28', '02:53:22'),
(2, 'sms@gmail.com', 'hello ot hacked', '2021-01-28', '02:54:09'),
(3, 'student@sms.com', 'help me', '2021-02-14', '09:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `conid` int(11) NOT NULL,
  `conname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`conid`, `conname`) VALUES
(1, 'ネパール'),
(2, '日本');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `fid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `fid`, `status`) VALUES
(3, '日本語', 2, 0),
(4, 'computer basic', 2, 1),
(8, 'IOT.AOT', 2, 1),
(9, 'web system', 4, 0),
(12, 'web  システム', 10, 1),
(13, 'IOT', 10, 1),
(16, 'Nepali', 2, 1),
(17, 'abcd course', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examcat`
--

CREATE TABLE `examcat` (
  `catid` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `status`) VALUES
(2, 'ITspecialist dgdgd', 1),
(4, 'BscIT', 0),
(10, 'IIT', 0),
(15, 'Abcd fg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `firstyearfee`
--

CREATE TABLE `firstyearfee` (
  `fyid` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `totalFee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `firstyearfee`
--

INSERT INTO `firstyearfee` (`fyid`, `faculty`, `course`, `totalFee`) VALUES
(9, 'ITspecialist', '日本語', '50000000'),
(11, 'ITspecialist', 'computer basic', '800000'),
(12, 'BscIT', 'web  システム', '800000'),
(13, 'IIT', 'IOT', '500000'),
(14, 'ITspecialist', 'Nepali', '800000');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `from_id` varchar(11) NOT NULL,
  `to_id` varchar(11) NOT NULL,
  `chat_msg` text NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `from_id`, `to_id`, `chat_msg`, `timeStamp`, `status`) VALUES
(4, 'smst002', 'smst001', 'or', '2021-02-04 18:25:28', 0),
(5, 'smst002', 'smst001', 'oe', '2021-02-04 18:26:34', 0),
(6, 'smst002', 'smst001', 'hfdjkhf', '2021-02-04 18:29:08', 0),
(7, 'smst002', 'smst001', 'hello', '2021-02-04 18:32:06', 0),
(8, 'smst002', 'smst001', 'hello', '2021-02-04 18:41:50', 0),
(9, 'smst002', 'smst001', 'what is your name_', '2021-02-04 18:42:01', 0),
(10, 'smst001', 'smst002', 'hello', '2021-02-04 18:50:12', 0),
(11, 'smst001', 'smst002', 'sadfkljdd;sfj', '2021-02-04 18:50:47', 0),
(12, 'smst001', 'smst002', 'hell', '2021-02-04 18:50:58', 0),
(13, 'smst001', 'smst002', 'asdfasdf', '2021-02-04 18:55:17', 0),
(14, 'smst001', 'smst002', 'ehllo', '2021-02-04 18:55:21', 0),
(15, 'smst001', 'smst002', 'thikai xa taa', '2021-02-04 18:55:27', 0),
(16, 'smst001', 'smst002', 'adsf', '2021-02-04 18:58:20', 0),
(17, 'smst001', 'smst002', 'sdf', '2021-02-04 18:58:28', 0),
(18, 'smst001', 'smst002', 'asdf', '2021-02-04 18:58:44', 0),
(19, 'smst001', 'smst002', 'asdf', '2021-02-04 18:58:48', 0),
(20, 'smst001', 'smst002', 'adsf', '2021-02-04 18:58:52', 0),
(21, 'smst001', 'smst002', 'askdfjh', '2021-02-04 19:03:15', 0),
(22, 'smst002', 'Deepak', 'oe yamada', '2021-02-04 19:32:42', 0),
(23, 'smst002', 'sms001', 'hello deepak', '2021-02-04 19:32:55', 0),
(24, 'smst002', 'sms001', 'oee', '0000-00-00 00:00:00', 0),
(25, 'smst002', 'sms001', 'oe', '0000-00-00 00:00:00', 0),
(26, 'smst002', 'smst001', 'ello', '0000-00-00 00:00:00', 0),
(27, 'smst002', 'Deepak', 'oe yamada', '2021-02-04 19:39:23', 0),
(28, 'smst002', 'Deepak', 'hello', '2021-02-04 19:40:07', 0),
(29, 'smst002', 'Deepak', 'oe yame', '2021-02-04 19:40:00', 0),
(30, 'smst002', 'Deepak', 'yemw', '2021-02-04 19:41:23', 0),
(31, 'Deepak', 'smst001', 'heo', '2021-02-06 18:50:23', 0),
(32, 'sms001', 'smst002', 'hy i am fine', '2021-02-06 19:55:07', 0),
(33, 'smst002', 'Deepak', 'oe yamada\n', '2021-02-06 20:06:56', 0),
(34, 'smst002', 'sms001', 'what are you doing now ?', '2021-02-06 20:07:44', 0),
(35, 'sms001', 'smst002', 'Noting much and your', '2021-02-06 20:08:13', 0),
(36, 'sms001', 'smst002', 'helo guys', '2021-02-06 20:13:23', 0),
(37, 'Deepak', 'smst002', 'sorry i haven\'t seeb the massege', '2021-02-09 16:26:00', 0),
(38, 'smst002', 'Deepak', 'こにちば', '2021-02-11 17:06:37', 0),
(39, 'Deepak', 'smst002', 'こにちば', '2021-02-11 17:06:46', 0),
(40, 'smst002', 'Deepak', 'hello', '2021-02-11 17:49:22', 0),
(41, 'Deepak', 'smst002', 'hhy', '2021-02-11 17:49:29', 0),
(42, 'Deepak', 'smst002', 'how are you&gt;', '2021-02-11 17:49:43', 0),
(43, 'smst002', 'Deepak', 'ok fne', '2021-02-11 17:49:54', 0),
(44, 'Deepak', 'smst001', 'this is the trail massege for the chat application', '2021-02-13 01:07:22', 0),
(45, 'teacher001', 'student001', 'oe naya student?', '2021-02-13 23:45:09', 0),
(46, 'student001', 'teacher001', 'hjr sir k x kvr?', '2021-02-13 23:51:37', 0),
(47, 'teacher001', 'student001', 'tikai x n tmro', '2021-02-13 23:51:49', 0),
(48, 'Deepak', 'teacher100', 'hello', '2021-02-15 03:44:36', 0),
(49, 'admin', 'teacher001', 'hello', '2021-02-15 03:50:07', 0),
(50, 'teacher100', 'Deepak', 'hy', '2021-02-15 03:52:29', 0),
(51, 'Deepak', 'teacher100', 'hello how are you now? and where are you humm', '2021-02-24 03:20:04', 0),
(52, 'teacher100', 'Deepak', 'i am fine and you i am in home \n', '2021-02-24 03:22:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `noticeId` int(11) NOT NULL,
  `notice` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `writter` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`noticeId`, `notice`, `date`, `time`, `writter`, `status`) VALUES
(1, '<p>this is the notice borad</p>\r\n', '2021-02-03', '11:34:00', 'adsf adsf', 0),
(2, '<p><strong>this is the second&nbsp;</strong></p>\r\n\r\n<p><strong>noticeboard try&nbsp;</strong></p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 7px; top: -6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '2021-02-03', '11:37:00', 'adsf adsf', 0),
(3, '<p>TOday is holiday</p>\r\n', '2021-02-04', '10:37:00', 'adsfaa adsf', 0),
(4, '<p>this is today notie</p>\r\n', '2021-02-05', '01:48:00', 'adsfaa adsf', 0),
(5, '<h1><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;This is Nepali NoticeBoard</strong></h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>deepak</td>\r\n			<td>rajbanshi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>anju</td>\r\n			<td>jha</td>\r\n		</tr>\r\n		<tr>\r\n			<td>kranti</td>\r\n			<td>tamang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-02-14', '08:43:00', 'abc teacher', 0),
(6, '<p>hfhfh</p>\r\n', '2021-02-15', '12:42:00', 'abcd efgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `subid` int(11) NOT NULL,
  `question` text NOT NULL,
  `sn` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `correct_ans`, `subid`, `question`, `sn`, `time`) VALUES
(1, 'this is B', 3, 'what is javascript in programming language?', 1, 1),
(2, 'ans no C', 3, 'what is full form of HTML?', 2, 1),
(3, 'ans D', 3, 'what is this ', 3, 1),
(4, 'ans c', 1, 'this question is for php catagory only ?', 1, 1),
(5, 'php 2', 1, ' This question is the second question of the php ?', 2, 1),
(6, 'this is B', 29, 'what is this ?', 1, 1),
(7, 'な', 29, 'Is this is question 2 ?', 2, 1),
(8, '   this is C', 21, 'this question id for demo subject 11', 1, 1),
(9, 'yes', 21, 'this question id for demo subject 11 second question?', 2, 1),
(10, 'anju', 38, 'timro nam k ho?', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `secyearfee`
--

CREATE TABLE `secyearfee` (
  `syid` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `totalFee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secyearfee`
--

INSERT INTO `secyearfee` (`syid`, `faculty`, `course`, `totalFee`) VALUES
(1, 'ITspecialist', '', 800000),
(3, 'BscIT', 'web system', 800000),
(4, 'Science Degree ', 'diploma Science', 500000),
(6, 'IIT', 'IOT', 800000),
(7, 'ITspecialist', 'Nepali', 600000);

-- --------------------------------------------------------

--
-- Table structure for table `studentattendance`
--

CREATE TABLE `studentattendance` (
  `aid` int(20) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentfee`
--

CREATE TABLE `studentfee` (
  `stdid` int(11) NOT NULL,
  `regno` varchar(11) NOT NULL,
  `month` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `totalFee` float NOT NULL,
  `paid` float NOT NULL,
  `remineFee` float NOT NULL,
  `deadline` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentfee`
--

INSERT INTO `studentfee` (`stdid`, `regno`, `month`, `status`, `totalFee`, `paid`, `remineFee`, `deadline`, `date`) VALUES
(1, 'Deepak', 4, 1, 800000, 200000, 600000, '2020-04-30', '2020-04-12'),
(2, 'Deepak', 4, 1, 800000, 200000, 400000, '2020-04-30', '2020-04-20'),
(3, 'Deepak', 4, 0, 800000, 400000, 0, '2020-04-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `studentpf`
--

CREATE TABLE `studentpf` (
  `pfId` int(11) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `image` longtext NOT NULL,
  `postcode` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `hobby` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentpf`
--

INSERT INTO `studentpf` (`pfId`, `regno`, `lname`, `fname`, `nationality`, `image`, `postcode`, `address`, `address1`, `birthdate`, `mobile`, `sex`, `faculty`, `course`, `hobby`) VALUES
(2, 'Deepak', 'yamada', 'sannn', '日本', 'IMG_5039.JPG', 5330007, '大阪府大阪市東淀川区相川', 'ダイオード', '2021-01-05', 2147483647, 'male', 'ITspecialist', '日本語', 'sports,music'),
(3, 'sms001', 'Rajbanshi', 'Deepak', 'ネパール', 'img.JPG', 5330011, '大阪府大阪市東淀川区大桐', '5-15-3', '2021-01-22', 123456789, 'male', 'BscIT', 'web system', 'sports,music'),
(4, 'SMS10', 'New', 'added', 'ネパール', 'Screenshot (13).png', 5440002, '大阪府大阪市生野区小路', 'adsf', '2021-02-11', 123456789, 'male', 'ITspecialist', '日本語', 'Sports,Music'),
(5, 'student001', 'std', 'student', '日本', '20201002_163034853_iOS.png', 5440002, '大阪府大阪市生野区小路', 'adsf', '2021-02-17', 123456789, 'male', 'ITspecialist', 'Nepali', 'Sports,Music');

-- --------------------------------------------------------

--
-- Table structure for table `studentresult`
--

CREATE TABLE `studentresult` (
  `rsid` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `fullMark` float NOT NULL,
  `passMark` float NOT NULL,
  `score` float NOT NULL,
  `percent` float NOT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentresult`
--

INSERT INTO `studentresult` (`rsid`, `regno`, `faculty`, `course`, `subject`, `fullMark`, `passMark`, `score`, `percent`, `year`, `month`) VALUES
(39, 'Deepak', '2', '3', 'Demo Subject 11', 100, 60, 80, 80, 2020, 9),
(40, 'Deepak', '2', '3', 'demo subject 2', 100, 60, 50, 50, 2020, 9),
(41, 'Deepak', '2', '3', 'Demo Subject 3', 100, 60, 60, 60, 2020, 9),
(42, 'Deepak', '2', '3', 'Demo Subject 4', 100, 60, 70, 70, 2020, 9),
(43, 'Deepak', '2', '3', 'Demo Subject 5', 100, 40, 80, 80, 2020, 9),
(44, 'SMS10', '2', '3', 'Demo Subject 11', 100, 60, 90, 90, 2020, 9),
(45, 'SMS10', '2', '3', 'demo subject 2', 100, 60, 70, 70, 2020, 9),
(46, 'SMS10', '2', '3', 'Demo Subject 3', 100, 60, 80, 80, 2020, 9),
(47, 'SMS10', '2', '3', 'Demo Subject 4', 100, 60, 80, 80, 2020, 9),
(48, 'SMS10', '2', '3', 'Demo Subject 5', 100, 60, 65, 65, 2020, 9),
(49, 'SMS10', '2', '3', 'Demo Subject 11', 100, 60, 90, 90, 2020, 9),
(50, 'SMS10', '2', '3', 'demo subject 2', 100, 60, 70, 70, 2020, 9),
(51, 'SMS10', '2', '3', 'Demo Subject 3', 100, 60, 60, 60, 2020, 9),
(52, 'SMS10', '2', '3', 'Demo Subject 4', 100, 60, 80, 80, 2020, 9),
(53, 'SMS10', '2', '3', 'Demo Subject 5', 100, 60, 90, 90, 2020, 9),
(59, 'student001', '2', '16', 'Nepali Grammer', 100, 60, 70, 70, 2021, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subname` varchar(50) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `cid`, `subname`, `full_mark`, `pass_mark`, `status`) VALUES
(21, 3, 'Demo Subject 11', 100, 60, 0),
(22, 4, 'Demo Subject 12', 100, 40, 1),
(29, 3, 'demo subject 2', 100, 60, 0),
(30, 3, 'Demo Subject 3', 100, 60, 1),
(31, 3, 'Demo Subject 4', 100, 60, 1),
(35, 8, 'AOT demo subject', 100, 60, 1),
(37, 9, 'PHP', 0, 0, 0),
(38, 16, 'Nepali Grammer', 100, 60, 0),
(39, 17, 'abcd subject', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacherattendance`
--

CREATE TABLE `teacherattendance` (
  `aid` int(11) NOT NULL,
  `pfId` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherattendance`
--

INSERT INTO `teacherattendance` (`aid`, `pfId`, `time`, `date`, `status`) VALUES
(1, 1, '25:34:13', '2020-11-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacherpf`
--

CREATE TABLE `teacherpf` (
  `pfId` int(11) NOT NULL,
  `regno` varchar(11) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `image` longtext NOT NULL,
  `postcode` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` int(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `skill` text NOT NULL,
  `hobby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherpf`
--

INSERT INTO `teacherpf` (`pfId`, `regno`, `lname`, `fname`, `nationality`, `image`, `postcode`, `address`, `address1`, `birthdate`, `mobile`, `sex`, `skill`, `hobby`) VALUES
(9, 'smst001', 'adsf', 'adsf', 'ネパール', 'Screenshot (1).png', 5440002, 'adsf', 'adsf', '2021-12-01', 123456789, 'male', 'CCNA,AI,Raspberry', 'music'),
(10, 'smst002', 'adsfaa', 'adsf', '日本', 'Screenshot (15).png', 5440002, 'adsf', 'adsf', '2020-12-31', 123456789, 'male', 'JavaScript,CCNA', 'music,reading and writing'),
(11, 'admin', 'Admin', 'Admin', 'admin', 'Screenshot (1).png', 5330011, '', '', '0000-00-00', 0, '', '', ''),
(12, 'teacher001', 'abc', 'teacher', 'ネパール', '20201003_072911353_iOS.jpg', 5330011, '大阪府大阪市東淀川区大桐', 'building name 403', '2021-02-16', 2147483647, 'male', 'AOT demo subject,PHP', 'music'),
(13, 'teacher100', 'abcd', 'efgh', '日本', 'Screenshot (31).png', 5330011, '大阪府大阪市東淀川区大桐', 'abcd', '2021-02-17', 1234567892, 'male', 'PHP,abcd subject', 'Sports,Music');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `regDate` datetime NOT NULL,
  `otpDate` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `regno`, `eMail`, `pass`, `status`, `otp`, `regDate`, `otpDate`, `flag`) VALUES
(14, 'admin', 'admin@sms.com', '$2y$10$E7X16/eE7tGPrVyPNUy.SOMitQBGOyWNgbPWxmWoiXu4taThS.8Ii', 'admin', '', '2020-10-23 09:49:07', '2020-11-26 10:21:52', 0),
(53, 'smst001', 'deepakrajbanshi68@gmail.com', '$2y$10$11/y/v4xsk1fsq1l9PyDeeMEwf7ky2E6CncbsRWds6ahhquHoVJSq', 'teacher', '', '2020-10-29 12:49:23', '0000-00-00 00:00:00', 0),
(89, 'Deepak', 'student@sms.com', '$2y$10$70H2ENNnXPEGJBbfL8Dh9uPbVcUEJvLYV1ZQK3ZDGxRfmpZjOkZpu', 'student', '', '2021-01-05 01:30:33', '0000-00-00 00:00:00', 0),
(90, 'sms001', 'student1@sms.com', '$2y$10$TSLaSP6pB74ThmhgppxqTeMjotHZzhCYODQQTh9STCPN1qjo09YCm', 'student', '', '2021-01-22 11:19:06', '0000-00-00 00:00:00', 0),
(91, 'smst002', 'teacher@sms.com', '$2y$10$ufiY.7K0gfaHfRlUGd3EFujfuw6siEEi2jkfouitGrpGO/aC0TGaG', 'teacher', '', '2021-02-03 01:10:21', '0000-00-00 00:00:00', 1),
(99, 'sms001', 'student2@sms.com', '$2y$10$ufxSOUjbrKFiH4yIsa20iOIRlWKqzwiXNiHfSPvc5CO9rIfHMwgvi', 'student', '', '2021-02-14 02:55:26', '0000-00-00 00:00:00', 0),
(100, 'smst002', 'teacher2@sms.com', '$2y$10$p7OTnoiwZbzxzix30Gp7Ued1G.X7Lcz2.MLNIQhBkF0dDK4BJBMfe', 'teacher', '', '2021-02-14 02:57:27', '0000-00-00 00:00:00', 1),
(102, 'teacher001', 'teacher001@sms.com', '$2y$10$e8BKT4iQkd7eTziJ2umDo.N4Vev0mCLH81G4PTKbDd.saHIITLV/a', 'teacher', '', '2021-02-14 08:17:43', '0000-00-00 00:00:00', 0),
(103, 'student001', 'student001@sms.com', '$2y$10$zw1TiTCu9baDqwI7ICSkKus224G5X1uSxSfkOJUIYXYZU2vfP0eE.', 'student', '', '2021-02-14 08:46:53', '0000-00-00 00:00:00', 0),
(105, 'teacher100', 'teacher100@sms.com', '$2y$10$wSPSyHccFvhsgBhUcFSu1OMJzq4878VtjqEgdaSVZLdKrEt7jR8ku', 'teacher', '', '2021-02-15 12:39:38', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`conid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `examcat`
--
ALTER TABLE `examcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `firstyearfee`
--
ALTER TABLE `firstyearfee`
  ADD PRIMARY KEY (`fyid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`noticeId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `secyearfee`
--
ALTER TABLE `secyearfee`
  ADD PRIMARY KEY (`syid`);

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `studentfee`
--
ALTER TABLE `studentfee`
  ADD PRIMARY KEY (`stdid`);

--
-- Indexes for table `studentpf`
--
ALTER TABLE `studentpf`
  ADD PRIMARY KEY (`pfId`);

--
-- Indexes for table `studentresult`
--
ALTER TABLE `studentresult`
  ADD PRIMARY KEY (`rsid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teacherattendance`
--
ALTER TABLE `teacherattendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `teacherpf`
--
ALTER TABLE `teacherpf`
  ADD PRIMARY KEY (`pfId`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `conid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `examcat`
--
ALTER TABLE `examcat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `firstyearfee`
--
ALTER TABLE `firstyearfee`
  MODIFY `fyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `noticeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `secyearfee`
--
ALTER TABLE `secyearfee`
  MODIFY `syid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
  MODIFY `aid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `studentfee`
--
ALTER TABLE `studentfee`
  MODIFY `stdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentpf`
--
ALTER TABLE `studentpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentresult`
--
ALTER TABLE `studentresult`
  MODIFY `rsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teacherattendance`
--
ALTER TABLE `teacherattendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherpf`
--
ALTER TABLE `teacherpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
