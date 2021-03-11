-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 10:27 AM
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
-- Table structure for table `adminpf`
--

CREATE TABLE `adminpf` (
  `pfId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `birthday` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `postcode` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `nationality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `userId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `fid`, `userId`) VALUES
(1, 'ネットワーク', 1, 56),
(2, 'IoT', 1, 0),
(3, '日本語', 2, 0),
(4, 'computer basic', 2, 0);

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
  `fname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`) VALUES
(1, '情報処理システム'),
(2, 'ITspecialist'),
(3, 'BscIT');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `question` text NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentattendance`
--

CREATE TABLE `studentattendance` (
  `aid` int(20) NOT NULL,
  `pfId` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentattendance`
--

INSERT INTO `studentattendance` (`aid`, `pfId`, `date`, `time`, `status`) VALUES
(1, 21, '2020-11-29', '11:43:35', 1),
(2, 22, '2020-11-11', '00:00:00', 1),
(3, 23, '2020-10-06', '21:43:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentpf`
--

CREATE TABLE `studentpf` (
  `pfId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `postcode` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `image` longtext NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `hobby` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentpf`
--

INSERT INTO `studentpf` (`pfId`, `userId`, `regno`, `lname`, `fname`, `sex`, `birthdate`, `mobile`, `postcode`, `address`, `address1`, `nationality`, `image`, `faculty`, `course`, `subject`, `hobby`) VALUES
(21, 0, 'SMS002', 'baba', 'sanju', 'male', '2020-11-22', '123456789', 5440001, '大阪府大阪市生野区新今里', 'aimazato', '', '', 'ITspecialist', '日本語', '', 'Music Reading and Writing'),
(22, 0, 'SMS003', 'baba', 'sanju', 'male', '2020-11-22', '123456789', 5440001, '大阪府大阪市生野区新今里', 'aimazato', '', '', 'ITspecialist', '日本語', '', 'Music Reading and Writing'),
(23, 0, 'deepak', 'adsf', 'adsf', 'female', '2020-11-05', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITspecialist', 'IoT', '', ''),
(33, 0, 'adsf', 'adsf', 'adsf', '', '2020-12-04', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITスペシャリスト', 'computer basic', '', 'Music Reading and Writing'),
(35, 0, 'adsf', 'cvb', 'adsf', 'female', '2020-11-23', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITスペシャリスト', '日本語', '', 'Sports Reading and Writing'),
(36, 0, 'adsf', 'cvb', 'adsf', 'female', '2020-11-23', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITスペシャリスト', '日本語', '', 'Sports Reading and Writing'),
(42, 0, 'adsf', 'adsf', 'adsf', 'female', '2020-11-18', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'IoT', '', 'Reading and Writing Others'),
(44, 0, '1112222', 'adsf', 'adsf', 'male', '2020-11-18', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITスペシャリスト', '日本語', '', ''),
(45, 0, '1112222', 'adsf', 'adsf', 'male', '2020-11-18', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITスペシャリスト', '日本語', '', ''),
(46, 0, '1112222', 'adsf', 'adsf', 'male', '2020-11-18', '123456789', 5440002, 'adsf', 'adsf', '', '', 'ITスペシャリスト', '日本語', '', 'Sports Music'),
(47, 0, '1111122333', 'adsf', 'adsf', 'female', '2020-11-11', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Music Reading and Writing'),
(48, 0, 'adsf', 'adsf', 'adsf', 'female', '2020-11-19', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(51, 0, 'adsf', 'adsf', 'adsf', 'female', '2020-11-19', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(53, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(54, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(55, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(56, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(57, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(58, 0, 'nanan', 'Rajbanshi', 'Deepak', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', 'img2.JPG', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(59, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(60, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(61, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(62, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(65, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(67, 0, 'nanan', 'youtube', 'fa', 'sexother', '2020-11-10', '123456789', 5440002, 'adsf', 'adsf', '', '', '情報処理システム', 'ネットワーク', '', 'Sports Music'),
(70, 0, 'last added', 'lastname', 'firstname', 'male', '2019-11-30', '12345678913323322222', 5440002, 'adsf', 'adsf', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `userId` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `course` varchar(20) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `hobby` text NOT NULL,
  `image` longtext NOT NULL,
  `mobile` int(20) NOT NULL,
  `postcode` int(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `skill` text NOT NULL,
  `nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherpf`
--

INSERT INTO `teacherpf` (`pfId`, `userId`, `address`, `birthdate`, `course`, `faculty`, `hobby`, `image`, `mobile`, `postcode`, `sex`, `subject`, `skill`, `nationality`) VALUES
(1, 2, '', '2015-05-13', '1', '', '', '', 902345698, 5400022, '男性', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
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

INSERT INTO `user` (`userId`, `userName`, `eMail`, `pass`, `status`, `otp`, `regDate`, `otpDate`, `flag`) VALUES
(14, 'admin', 'admin@sms.com', '$2y$10$E7X16/eE7tGPrVyPNUy.SOMitQBGOyWNgbPWxmWoiXu4taThS.8Ii', 'admin', '', '2020-10-23 09:49:07', '2020-11-26 10:21:52', 0),
(53, 'Teacher', 'deepakrajbanshi68@gmail.com', '$2y$10$ifK1SApZel5Hlt1kr7DAU.qPdyLKel.rAwBcv9bKYoBzbNMUPeHoe', 'teacher', '', '2020-10-29 12:49:23', '0000-00-00 00:00:00', 0),
(56, 'student', 'student@sms.com', '$2y$10$az9r1mX64FSAdSZJSMvpXOuFLq0rg40eeaZKJEAIErdE/PUM4wX.a', 'student', '', '2020-11-04 05:10:20', '0000-00-00 00:00:00', 0),
(57, 'student1', 'student2@sms.com', '$2y$10$ViO90RX13Zv9wnjPSwgWnOqleCQLoFB/GkI2NQy91cBNl5NWhnIki', 'student', '', '2020-11-04 05:23:09', '0000-00-00 00:00:00', 0),
(58, 'student2', 'yamada@kadai.com', 'adf', 'student', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(59, 'Deepak', 'student4@sms.com', '$2y$10$8UCGVY3.fBCRlhwR6IbnauGot6vW/BnGdU2PKwaPyCjNVH5VdVeX6', '', '80157', '2020-11-20 10:23:35', '2020-11-20 10:23:35', 0),
(60, 'Deepak', 'student4@sms.com', '$2y$10$.nh4fncpu6YYOXIZKiReguyTZe9nzqZ2Ri0UdqIDHwDk8OO3Gx/HW', '', '41541', '2020-11-20 10:23:47', '2020-11-20 10:23:47', 0),
(61, 'Deepak', 'student4@sms.com', '$2y$10$PCYaWazLbJhPOswoT10lBOTfZ8DZw5AaljNM47nP.essSSK8o2cki', '', '86939', '2020-11-20 10:23:48', '2020-11-20 10:23:48', 0),
(62, 'nana', 'sms@sms.com', '$2y$10$11B/ztSZWidwP3.K9FBU5.QwksZu2KhiFvWZRxX9jw/k83QorfsJC', '', '59824', '2020-11-26 09:54:51', '2020-11-26 09:54:51', 0),
(63, 'nana', 'sms@sms.com', '$2y$10$H3YIkV3mQJbha56HFmPeZuY/oS0Uoggxk9w99rTn20ABMCuIxErAi', '', '24204', '2020-11-26 09:55:59', '2020-11-26 09:55:59', 0),
(64, 'nana', 'sms@sms.com', '$2y$10$B3PBbxhnidq9O7OuibGwZ.VhIMcq4GUqo69okR6rnoml76K6RCqdi', '', '75781', '2020-11-26 09:56:00', '2020-11-26 09:56:00', 0),
(65, 'lama', 'student10@sms.com', '$2y$10$tAtwBdBIIKqqrkpDDjqRMuqZf1n5JxS1kGwfu5zC1x/UyzxPXYXcq', '', '80514', '2020-12-11 11:51:38', '2020-12-11 11:51:38', 0),
(66, 'lama', 'student10@sms.com', '$2y$10$ouFGXHgaSPkNlE8dkABjAuzWSWKTzhuSluIXjvIhgTvJ6Jin0exym', '', '60042', '2020-12-11 11:51:54', '2020-12-11 11:51:54', 0),
(67, 'lama', 'student10@sms.com', '$2y$10$CsS7wSvyV6kl9xnNngOPfu2Ad/v5pT9jMq00CdJ5bJkcYPWgnRQJm', '', '77321', '2020-12-11 11:52:27', '2020-12-11 11:52:27', 0),
(68, 'lama', 'student10@sms.com', '$2y$10$xy.aAVxriuOC8Ne49LyF/.RsImHt1b0it/xt/jQ92.G30v6Nj66Zy', '', '07730', '2020-12-11 11:52:28', '2020-12-11 11:52:28', 0),
(69, 'lama', 'student10@sms.com', '$2y$10$XbYIh2iEQbX.p0DbO57XDOntJquIjnUTkbPRIMLQCv/hO2u9HIpfK', '', '14313', '2020-12-11 11:52:29', '2020-12-11 11:52:29', 0),
(70, 'lama', 'student10@sms.com', '$2y$10$SxMS3b4oOcQmTTYm2i2jfuqf36KqhdlIzLmis1FMdRPa4gf5fH7Ma', '', '97205', '2020-12-11 11:52:29', '2020-12-11 11:52:29', 0),
(71, 'lama', 'student10@sms.com', '$2y$10$Zo3E/PhhACy19fVLj1nZP.qbhiKoVxi7YWDU3S1p3I5mosG7fEkMq', '', '01632', '2020-12-11 11:52:29', '2020-12-11 11:52:29', 0),
(72, 'lama', 'student10@sms.com', '$2y$10$uI8XqGHiEW4/rrp.L4JTl.Onf0ffo9SKzsls.HkbsEm9CigmIa9Wm', '', '62125', '2020-12-11 11:52:28', '2020-12-11 11:52:28', 0),
(73, 'lama', 'student10@sms.com', '$2y$10$eEgtHGsstGVZ9PYY1Zfbge3ysnUcxAe3iuBt3ICS5YujS4Kvu9jM2', '', '23904', '2020-12-11 11:52:36', '2020-12-11 11:52:36', 0),
(74, 'lama', 'student10@sms.com', '$2y$10$BSpRM5fzGKldxH1S0GX03eko7nQiq.fPdVSBHH900EI6QcKo1Qnbi', '', '51859', '2020-12-11 11:52:39', '2020-12-11 11:52:39', 0),
(75, 'lama', 'student10@sms.com', '$2y$10$DfAhyPYiji53KOEm/gtyve9jA.NdU/7aoaP0VHhicvrbBsRu26MCa', '', '49313', '2020-12-11 11:52:39', '2020-12-11 11:52:39', 0),
(76, 'lama', 'student10@sms.com', '$2y$10$VwqukCpO2DhMxoQCc2IDP.oO9YnJUUupdMQeigajsPy/DqashJmbS', '', '72911', '2020-12-11 11:52:40', '2020-12-11 11:52:40', 0),
(77, 'lama', 'student10@sms.com', '$2y$10$UYU1KuQOG0B9f2F5OBPC6upq29yU4dbG8ha0EW3Q5ixHdlx7bpH7a', '', '17472', '2020-12-11 11:52:42', '2020-12-11 11:52:42', 0),
(78, 'lama', 'student10@sms.com', '$2y$10$v6theWHBs4/0UkLbV3pRg.lYDtRPXhdbAjssizegC8lBnivxUHzAi', '', '96701', '2020-12-11 11:52:40', '2020-12-11 11:52:40', 0),
(79, 'lama', 'student10@sms.com', '$2y$10$FTFLwaAFmhPz2tX2iADxX.8OBgsgUEhEZ7TRcwXV6nGO8f/1Inima', '', '25801', '2020-12-11 11:52:43', '2020-12-11 11:52:43', 0),
(80, 'lama', 'student10@sms.com', '$2y$10$WjICP/LGDAn4uWULc0rNROE8Gb.qHZmp8JjUMcl5sLvROsy30J8Jy', '', '24011', '2020-12-11 11:52:45', '2020-12-11 11:52:45', 0),
(81, 'lama', 'student10@sms.com', '$2y$10$Fj3C9GsLBKRefmkMqCQmouQ5UiT9CYfuEAc3f1VcU398kcNbpnjoW', '', '24459', '2020-12-11 11:52:48', '2020-12-11 11:52:48', 0),
(82, 'lamaa', 'student11@sms.com', '$2y$10$hFiAEa4V.oPAa4XEAtsGN.6lYOzelnZ.P07.6y/p27PHBrMi4p6Su', 'student', '', '2020-12-11 11:56:08', '0000-00-00 00:00:00', 0),
(83, 'asdf', 'smsm@sms.com', '$2y$10$DkkrAwDKovJTTQZR1jmWheNWy/mQ85ZXAF4NEhySOPQaSZi//JPEO', 'student', '67543', '2020-12-11 12:05:41', '2020-12-11 12:05:41', 0),
(84, 'studentstd', 'stds@sms.com', '$2y$10$iIYdb1ETyS0I4In.MOL2/eBBId7/JVgN3e93gaVdRSg0D1D4JXyaa', 'student', '93820', '2020-12-11 12:07:40', '2020-12-11 12:07:40', 0),
(85, 'aesdfasd', 'adfs@sms.com', '$2y$10$B9Ry9EmlBLK8lEXPZ0Cu8eW3/6FFsm79NMxCA1GcU7GFgEVbFW63O', 'student', '22927', '2020-12-11 12:09:46', '2020-12-11 12:09:46', 0),
(86, 'asdfadfafa', 'adfafd@sms.com', '$2y$10$ELe4vKMFN9/Tu3GYKDM/b.kq3Wf./szVDL7OsMmP8mTwFf8GdAyje', 'student', '57408', '2020-12-11 12:12:50', '2020-12-11 12:12:50', 0),
(87, 'asdfadfafaa', 'adfafd1@sms.com', '$2y$10$Nq/RFiJ0w/PDBkJeT5.fW.ZFSp5jL37wD0e2V4nNNm4GVR1qfWqa.', 'student', '44961', '2020-12-11 12:13:19', '2020-12-11 12:13:19', 0),
(88, 'dddddd', 'student21@sms.com', '$2y$10$p1Un0sRHYFAA8L9M9Hk0reUczwzy3X.pxCy22ebaUVIig.IWavND2', 'teacher', '', '2020-12-13 06:17:33', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `studentpf`
--
ALTER TABLE `studentpf`
  ADD PRIMARY KEY (`pfId`);

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
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `conid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examcat`
--
ALTER TABLE `examcat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
  MODIFY `aid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentpf`
--
ALTER TABLE `studentpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacherattendance`
--
ALTER TABLE `teacherattendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherpf`
--
ALTER TABLE `teacherpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
