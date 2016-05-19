-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 05:45 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alinmakeup`
--

CREATE TABLE `mcustomer` (
  `MCustomerID` int(11) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PhoneNumber` int(255) NOT NULL,
  `MakeupType` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Dumping data for table `mcustomer`
--

INSERT INTO `mcustomer` (`MCustomerID`, `DOB`, `MemberID`, `FirstName`, `LastName`, `PhoneNumber`, `MakeupType`, `date`) VALUES
(5, '2000-05-03', 2, '×¡×“× × ×§×‘×•×¦×ª×™×ª', '+3', 123, 'Group Tranning', '2016-05-03'),
(4, '2000-05-03', 2, '×¡×“× × ××™×©×™×ª', '+1', 123, 'Personal Tranning', '2016-05-03'),
(3, '2000-05-03', 2, '×¨×•×•×§×”', '-1w', 123, 'Bridesmaids Party', '2016-04-26'),
(2, '2000-05-03', 2, '×‘×¨×™×ª', '-12', 123, 'Makeup Alliance', '2004-05-03'),
(1, '2000-05-03', 2, '×›×œ×”', '9-', 1, 'Bride Makeup', '2015-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberID` int(11) NOT NULL,
  `CustomerType` varchar(255) NOT NULL,
  `ProfileType` varchar(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Treatment` tinyint(4) NOT NULL,
  `TelNo` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL DEFAULT '0',
  `ActivationCode` varchar(255) NOT NULL,
  `IsEnable` tinyint(4) DEFAULT '0',
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `CustomerType`, `ProfileType`, `Title`, `FirstName`, `LastName`, `Treatment`, `TelNo`, `Email`, `Password`, `IsActive`, `ActivationCode`, `IsEnable`, `DateAdded`, `DateUpdated`) VALUES
(2, '', 'artist', NULL, 'alin', 'mishayev', 0, '972507817770', 'alin.makeup.artist@gmail.com', '123', 0, '', 1, '2015-12-23 13:58:02', '2015-12-23 13:58:02'),
(6, '', 'user', NULL, '×—× ×”', '×©××•×œ×•×‘', 2, '054444444', 'shaulove.zoya@gmail.com', '123456789', 1, '', 1, '2016-05-03 12:10:04', '2016-05-03 12:10:04'),
(5, '', 'user', NULL, 'zoya', 'shaulove', 32, '0547326486', 'zoya.shaulove@gmail.com', '123', 1, '', 1, '2015-12-26 23:25:47', '2015-12-26 23:25:47');


-- --------------------------------------------------------

--
-- Table structure for table `mgallery`
--

CREATE TABLE `mgallery` (
  `MGalleryID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `ImagePath` varchar(250) NOT NULL,
  `IsNail` tinyint(4) NOT NULL DEFAULT '0',
  `DateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `mgallery`
--

INSERT INTO `mgallery` (`MGalleryID`, `MemberID`, `ImagePath`, `IsNail`, `DateAdded`) VALUES
(19, 2, 'http://localhost/alin-makeup/photo/14515797354.jpg', 2, '0000-00-00 00:00:00'),
(21, 2, 'http://localhost/alin-makeup/photo/145310479120151129_111405.jpg', 2, '0000-00-00 00:00:00'),
(18, 2, 'http://localhost/alin-makeup/photo/14515796553.jpg', 2, '0000-00-00 00:00:00'),
(17, 2, 'http://localhost/alin-makeup/photo/14515795732.jpg', 2, '0000-00-00 00:00:00'),
(16, 2, 'http://localhost/alin-makeup/photo/14515795161.jpg', 2, '0000-00-00 00:00:00'),
(9, 2, 'http://localhost/alin-makeup/photo/14515788481.JPG', 0, '0000-00-00 00:00:00'),
(10, 2, 'http://localhost/alin-makeup/photo/14515789622.JPG', 0, '0000-00-00 00:00:00'),
(11, 2, 'http://localhost/alin-makeup/photo/14515790503.JPG', 0, '0000-00-00 00:00:00'),
(12, 2, 'http://localhost/alin-makeup/photo/14515791274.jpg', 0, '0000-00-00 00:00:00'),
(13, 2, 'http://localhost/alin-makeup/photo/14515792085.jpg', 0, '0000-00-00 00:00:00'),
(15, 2, 'http://localhost/alin-makeup/photo/14515794317.JPG', 0, '0000-00-00 00:00:00'),
(20, 2, 'http://localhost/alin-makeup/photo/14515798125.jpg', 2, '0000-00-00 00:00:00');


-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `PageID` int(11) NOT NULL,
  `PageTypeID` int(11) DEFAULT '0',
  `PageParentID` tinyint(3) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `DetailDesc` text,
  `DetailDesc1` text,
  `IsEnable` tinyint(4) DEFAULT NULL,
  `MetaTitle` text,
  `MetaKeyword` text,
  `MetaText` text,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `page`
--

INSERT INTO `page` (`PageID`, `PageTypeID`, `PageParentID`, `PageName`, `Slug`, `DetailDesc`, `DetailDesc1`, `IsEnable`, `MetaTitle`, `MetaKeyword`, `MetaText`, `DateAdded`, `DateUpdated`) VALUES
(2, 0, 0, 'Personal Training', 'personal-training', 'אבל ניתן', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 0, 'Group Training', 'group-training', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 0, 'evenings-activity', 'evenings-activity', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');


-- -------------------------------------------------------

--
-- Table structure for table `pagetype`
--

CREATE TABLE `pagetype` (
  `PageTypeID` int(11) DEFAULT '0',
  `PageTypeName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `pagetype`
--

INSERT INTO `pagetype` (`PageTypeID`, `PageTypeName`) VALUES
(1, 'Header'),
(2, 'ABOUT DHAKASNOB'),
(3, 'SITE DIRECTORY'),
(4, 'DHAKASNOB FAMILY');


-- -----------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `duration` varchar(90) NOT NULL,
  `action` varchar(500) NOT NULL,
  `con` varchar(90) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `duration`, `action`, `con`) VALUES
(1, 'Bridesmaids Party', '+1 week', 'צריכה איפור ליום חתונתה', ''),
(2, 'Bride Makeup', '+9 month', 'need makeup for child party', ''),
(3, 'Makeup Alliance', '+12 year', 'need makeup for Bat Mitzvah party', ''),
(4, 'Personal Tranning', '+1 month', 'want learn more about makeup', 'yes'),
(5, 'Group Tranning', '+3 month', 'want more makeup meetings', 'yes'),
(6, 'Evening Makeup', '-1 week', '', ''),
(7, 'Makeup Bat Mitzvah', '-1 week', '', ''),
(8, 'Evening activity', '-1 week', '', '');


-- -------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `TipsID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `Desc` text NOT NULL,
  `TipsType` tinyint(4) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`TipsID`, `MemberID`, `Desc`, `TipsType`, `DateAdded`, `DateUpdate`) VALUES
(16, 2, '×›×©×”×©×¤×ª×™×™× ×©×œ×š ×™×‘×©×•×ª, ×”×“×‘×¨ ×”××—×¨×•×Ÿ ×©××ª ×¦×¨×™×›×” ×œ×¢×©×•×ª ×–×” ×œ×œ×§×§ ××•×ª×Ÿ. ×‘×¨×’×¢ ×©××ª ×ž×¢×‘×™×¨×” ×¢×œ×™×”×Ÿ ××ª ×”×œ×©×•×Ÿ, ×”×¨×•×§ ×¨×§ ×ž×™×™×‘×© ××•×ª×Ÿ ×¢×•×“ ×™×•×ª×¨. ×•× ×’×“ ×©×¤×ª×™×™× ×¡×“×•×§×•×ª ×‘××ž×ª ×©××™×Ÿ ×ž×” ×œ×¢×©×•×ª. ×ž×” ×¢×•×©×™×? ×× ××™×Ÿ ×œ×š × ×˜×™×™×” ×œ×™×•×‘×© ×ž×•×’×‘×¨ ××– ×©×¤×ª×•×Ÿ ×¢× ××—×•×–×™ ×œ×—×•×ª ×’×‘×•×”×™× ×™×¢×©×” ××ª ×”×¢×‘×•×“×”. ×× ××ª ×ž×”×ž×ª×§×œ×¤×•×ª, ××– ×¢×“×™×£ ×œ×œ×›×ª ×¢×œ ×ž×•×¦×¨ ×™×™×¢×•×“×™ ×•×œ×ž×©×•×š ××•×ª×• ×¢×œ ×©×¤×ª×™×™×š ××—×ª ×œ×©×¢×ª×™×™×.', 3, '2015-12-31 17:03:52', '0000-00-00 00:00:00'),
(19, 2, '×‘×ž×™×“×” ×©××ª ×œ× ×ž×¢×•× ×™×™× ×ª ×œ×ž×¨×•×— ×œ×§, ××‘×œ ×›×Ÿ ×¨×•×¦×” ×œ×”×™×¨××•×ª ×¡×•×¤×¨ ×ž×˜×•×¤×—×ª, ××ª ×™×›×•×œ×” ×œ× ×¡×•×ª ×‘××£ ×ž×§×¦×•×¢×™ â€“ ××•×ª×• ×ž×œ×‘×Ÿ ×¢× ×©×˜×— ×¤× ×™× ××¤×•×¨ ×—×œ×§, ×©×™×•×¦×¨ ×‘×¨×§ ×¢×– ×¢×œ ×”×¦×™×¤×•×¨× ×™×™×. ×™×•×œ×™×” ×ž×¢×“×›× ×ª ××•×ª× ×• ×©×œ×™×™×“×™×– ××™×˜×œ×§×™×•×ª ××ž×™×ª×™×•×ª ××™× ×Ÿ ×ž×•×¨×—×•×ª ×œ×§, ××œ× ×¢×•×©×•×ª ×ž× ×™×§×•×¨ ×ž×•×§×¤×“ ×•×ž×•×ª×™×¨×•×ª ××ª ×”×¦×™×¤×•×¨× ×™×™× ×¢×™×¨×•×ž×•×ª ×•×—×œ×§×•×ª ×œ×ž×©×¢×™.', 2, '2015-12-31 17:10:29', '0000-00-00 00:00:00'),
(15, 2, '×§×¨× ×œ×—×•×ª ××ª ×ž×•×¨×—×ª ×›×œ ×™×•× × ×›×•×Ÿ? × ×›×•×Ÿ. ××– ×‘×–×ž×Ÿ ×©××ª ×ž×©×§×™×¢×” ×‘×œ×—×™×™×, ×‘×¡× ×˜×¨ ×•×‘×ž×¦×—, ××•×œ×™ ×›×“××™ ×©×ª×©×™×ž×™ ×œ×‘ ×’× ×œ×¦×•×•××¨ â€“ ×”×—×œ×§ ×©×ž×—×–×™×§ ××ª ×›×œ ×”×§×•× ×¡×˜×¨×•×§×˜ ×”×ž×¤×•××¨ ×©× ×§×¨× ×”×¤×¨×¦×•×£ ×©×œ×š. ×’× ×”×•× ×–×§×•×§ ×œ×œ×—×•×ª ×©×ª××¤×©×¨ ×œ×• ×’×ž×™×©×•×ª ×•×ª××˜ ××ª ×”×§×ž×˜×•×˜×™× ×”×¢×ª×™×“×™× ×œ×”×’×™×¢, ×ž×” ×’× ×©×™×© ×œ×• × ×˜×™×™×” ×œ×”×–×“×§×Ÿ ×œ×¤× ×™ ×¢×•×¨ ×”×¤× ×™× ×•×”×’×•×£, ×›×š ×©×§×¨× ×ž×–×™×Ÿ ×™×™×¢×•×“×™ ×œ×¦×•×•××¨ ×”×•× ×‘×›×œ×œ ×‘×‘×—×™× ×ª ×‘×¨×›×”.', 3, '2015-12-31 16:58:15', '0000-00-00 00:00:00'),
(17, 2, '××ª ×ª×§×¨××™ ×œ×–×” ×ª×¨×•×¤×ª ×¡×‘×ª×, ×× ×—× ×• × ×§×¨× ×œ×–×” ×¢×•×“ ×›×¡×£ ×œ×‘×’×“×™×: ×‘×ž×§×•× ×œ×§× ×•×ª ×¤×™×œ×™× ×’ ×‘×™× ×›×¡×£, ××ª ×™×›×•×œ×” ×¤×©×•×˜ ×œ×”×©×ª×ž×© ×‘×ž×” ×©×™×© ×œ×š ×‘×ž×§×¨×¨. ×”×¢×™×§×¨×•×Ÿ ×”×•× ×œ×©×œ×‘ ×‘×™×Ÿ ×—×•×ž×¨ ×’×¨×’×™×¨×™, ×›×ž×• ×¡×•×›×¨, ×¢× ×—×•×ž×¨ × ×•×–×œ×™ ×•×ž××—×“. ×§×‘×œ×™ ×ž×ª×›×•×Ÿ: ×¢×¨×‘×‘×™ ×›×£ ×©×ž×Ÿ ×–×™×ª, ×›×£ ×¡×•×›×¨, ×›×£ ×ž×™×¥ ×œ×™×ž×•×Ÿ ×•×ž×¢×˜ ×“×‘×©, ×ž×¨×—×™ ×¢×œ ×”×¤× ×™×, ×©×¤×©×¤×™ ×§×œ×•×ª ×•×”×¨×™ ×œ×š ×¤×™×œ×™× ×’ ×—×™× ×ž×™ (××• ×¨×•×˜×‘ ×—×™× × ×™ ×œ×¡×œ×˜).', 3, '2015-12-31 17:07:12', '0000-00-00 00:00:00'),
(18, 2, '×¢×œ ××£ ×”×¡×›× ×” ×œ×”×™×©×ž×¢ ×›×ž×• ×¤×˜×™×¤×•×Ÿ ×©×‘×•×¨, ××™×Ÿ ×ž× ×•×¡ ×ž×œ×•×ž×¨ ×–××ª: ×ž×§×“× ×”×’× ×” ×•×ž×¡× ×Ÿ ×§×¨×™× ×” ×¦×¨×™×›×™× ×œ×”×™×•×ª ×”×—×‘×¨×™× ×”×›×™ ×˜×•×‘×™× ×©×œ×š ×‘×›×œ ×¢×•× ×•×ª ×”×©× ×”. ×’× ×‘×—×•×¨×£. ×× ××ª ×¢×™×™×¤×” ×ž×œ×ž×¨×•×— ×¢×œ ×¢×¦×ž×š ××™× ×¡×¤×•×¨ ×©×›×‘×•×ª ×‘×‘×•×§×¨ (×§×¨× ×œ×—×•×ª, ×ž×™×™×§ ××¤, ×¤×•×“×¨×” ×•×ž×§×“× ×”×’× ×”), ×–×›×¨×™ ×©×›×ž×¢×˜ ×›×œ ×œ×—×•×ª ×•×ž×™×™×§ ××¤ ×ž×›×™×œ×™× ×ž×§×“× ×”×’× ×”, ×•×–×” ××ž×•×¨ ×œ×”×¡×¤×™×§. ×”×§×¤×™×“×™ ×œ×¨×›×•×© ××ª ××œ×• ×©×™×’× ×• ×¢×œ×™×™×š ×ž×¤× ×™ ×”×©×ž×© ×•×œ× ×¨×§ ×ž×¤× ×™ ×—×¦''×§×•× ×™×.', 3, '2015-12-31 17:08:05', '0000-00-00 00:00:00'),
(20, 2, '× ×›×•×Ÿ ××ª ×ª×ž×™×“ ×ž×•×¨×—×ª ×œ×§ ×›×©×”××¦×‘×¢×•×ª ×©×œ×š ×ž×•×¤× ×•×ª ×”×—×•×¦×”? ××– ×ž×ª×‘×¨×¨ ×©×”×–×•×•×™×ª ×”×˜×•×‘×” ×‘×™×•×ª×¨ ×œ×ž×©×™×—×ª ×œ×§ ×”×™× ×›××©×¨ ×”×ž×¨×¤×§ ×ž×›×•×¤×£ ×‘-90 ×ž×¢×œ×•×ª, ×•×›×£ ×”×™×“ × ×—×” ×¢×œ ×ž×©×˜×— ×™×¦×™×‘ ×•×ž×•×¤× ×™×ª ××œ×™×™×š.', 2, '2015-12-31 17:11:31', '0000-00-00 00:00:00'),
(21, 2, '×œ×§ ×–×” ×”×“×‘×¨ ×©×”×›×™ ×ž×¢× ×™×™×Ÿ ××•×ª× ×• ×‘×ž× ×™×§×•×¨, ×•×”×©×œ×‘ ×©×”×›×™ ×§×©×” ×œ×¢×©×•×ª ××•×ª×• ×‘×§×œ××¡. ×‘×¨×•×‘ ×”×ž×§×¨×™× ×–×” ×™×•×¦× ×¢×§×•× ×œ×ž×“×™.\r\n×œ×¤× ×™ ×”×œ×§ ×”×¦×‘×¢×•× ×™ ×ž×•×ž×œ×¥ ×œ×”× ×™×— ×©×›×‘×ª ×‘×¡×™×¡ ×©×§×•×¤×”. ×”×™× ×ž×’× ×” ×¢×œ ×”×¦×™×¤×•×¨×Ÿ ×ž×¤× ×™ ×—×“×™×¨×ª ×”×¦×‘×¢ ×•×”×¦×”×‘×”. ×ž×™×“ ××—×¨×™ ××ª ×™×›×•×œ×” ×œ×ž×¨×•×— ××ª ×”×œ×§ ×”×¦×‘×¢×•× ×™, ×‘×©×‘×™×œ ×œ×—×“×© ××ª ×”×œ×§ ××—×¨×™ ×™×•× ×™×•×ž×™×™×, ×ž×¨×—×™ ××ª ×©×›×‘×ª ×”×¡×™×•× ×”×©×§×•×¤×” ×©×•×‘. ×”×™× ×ž×¨×¢× × ×ª ××ª ×”×ž×¨××” ×•×©×•×ž×¨×ª ×¢×œ ×”×œ×§.', 2, '2015-12-31 17:13:03', '0000-00-00 00:00:00'),
(22, 2, '××ª ×ž×ž×© ×œ× ×—×™×™×‘×ª ×œ×”×™×•×ª ×ž××¤×¨×ª ×ž×§×¦×•×¢×™×ª ×›×“×™ ×œ×”×‘×™×Ÿ ××ª ×”×”×™×’×™×•×Ÿ ×”×¤×©×•×˜ ×©×œ ×ª×•×¨×ª ×”××™×¤×•×¨: ×¦×‘×¢ ×›×”×” ×ž×§×˜×™×Ÿ, ×ž×©×§×™×¢ ×•×ž×§×¨×‘. ×¦×‘×¢ ×‘×”×™×¨ ×ž××™×¨, ×ž×‘×œ×™×˜ ×•×ž×¨×—×™×§. ×–×” ××•×œ×™ ×œ× ×ž×©×”×• ×œ×©×™×—×ª ×¡×œ×•×Ÿ, ××‘×œ ×ž×“×•×‘×¨ ×‘××™× ×¤×•×¨×ž×¦×™×” ×©×©×•×•×” ×”×•×Ÿ. ××™×š ×ž×ª×¨×’×ž×™× ××•×ª×” ×œ×ž×¦×™××•×ª? ×™×© ×œ×š ×¢×™× ×™×™× ×‘×•×œ×˜×•×ª ×©××ª ×ž×ž×© ×œ× ××•×”×‘×ª? ×”×ª××¤×¨×™ ×‘×¦×œ×œ×™×•×ª ×›×”×•×ª ×™×•×ª×¨. ×× ×¢×™× ×™×™×š ×§×˜× ×•×ª, ×”×©×§×™×¢×™ ×‘×’×•×•× ×™× ×‘×”×™×¨×™× ×©×™×¤×ª×—×• ×•×™×’×“×™×œ×• ××ª ×ž×‘× ×” ×”×¢×™×Ÿ.', 1, '2015-12-31 17:14:35', '0000-00-00 00:00:00'),
(23, 2, '×œ×ž××¤×¨×™× ×ž×§×¦×•×¢×™×™× ×™×© ×œ× ×ž×¢×˜ ×˜×¨×™×§×™×, ××—×“ ×ž×”× ×”×•× ×”×¤×™×›×ª×š ×œ×–×•×”×¨×ª ×‘×ž×™×•×—×“. ××™×š? ×‘×¢×–×¨×ª × ×§×•×“×•×ª ×©×œ ××•×¨. ×”× ×§×•×“×•×ª ×¤×•×ª×—×•×ª ×•×ž××™×¨×•×ª ××ª ×”×¤× ×™× ×•×”×¢×™× ×™×™× ×•×ž×’×‘×™×”×™× ××ª ×¢×¦× ×”×’×‘×”. ××™×š ×¢×•×©×™× ××ª ×–×”? ×§×—×™ ×¦×œ×œ×™×ª ×‘×”×™×¨×” (××• ×¢×¤×¨×•×Ÿ ×œ×‘×Ÿ ×× ×™×© ×œ×š) ×•×ž×¨×—×™ ×¢×œ ×”×–×•×•×™×ª ×”×¤× ×™×ž×™×ª ×©×‘×™×Ÿ ×”××£ ×•×”×¢×™×Ÿ. ×”× ×™×—×™ ×˜×™×¤×” ×’× ×¢×œ ×¢×¦× ×”×’×‘×” ×•×¢×œ ×¢×¦×ž×•×ª ×”×œ×—×™×™× ×•×”×¨×§×”. ×–×” ×™×™×¦×•×¨ ××©×œ×™×” ×©×œ ×¢×™×Ÿ ×’×“×•×œ×” ×™×•×ª×¨ ×•×¤× ×™× ×–×•×”×¨×•×ª.', 1, '2015-12-31 17:15:30', '0000-00-00 00:00:00'),
(24, 2, '×‘×™×Ÿ ×× ××ª ×—×•×©×‘×ª ×©×”×’×‘×•×ª ×©×œ×š ×ž×“×•×œ×œ×•×ª ×•×—×¡×¨×•×ª ×¦×‘×¢, ×•×‘×™×Ÿ ×× ×”×Ÿ ×‘××ž×ª ×›××œ×”, ×™×© ×“×¨×š ×œ×¢×‘×•×ª ××ª ×”×’×‘×•×ª, ×ž×‘×œ×™ ×œ×”×™×¨××•×ª ×›×ž×• ×¤×™×™×¨×•: ×œ×¦×‘×•×¢ ××•×ª×Ÿ ×‘×¢×–×¨×ª ×¦×œ×œ×™×•×ª. ×‘× ×™×’×•×“ ×œ×¢×™×¤×¨×•×Ÿ ×¢×™× ×™×™× ×©×¢×œ×•×œ ×œ×”×•×ª×™×¨ ×’×•×•×Ÿ ×›×”×” ×ž×“×™ ×•×ž×¨××” × ×•×§×©×”, ×”×¦×œ×œ×™×ª â€“ ×× ×”×™× ×ž×•× ×—×ª ×‘×¢×“×™× ×•×ª â€“ ×ž×©×•×•×” ×œ×’×‘×” ×ž×¨××” ×˜×‘×¢×™ ×•×œ× ×§×•×“×¨. ×—×©×•×‘ ×œ×”×ª××™× ××ª ×’×•×•×Ÿ ×”×¦×œ×œ×™×•×ª ×œ×’×•×•×Ÿ ×”×©×™×¢×¨ ×•×œ×”×§×¤×™×“ ×©×’×•×•×Ÿ ×”×’×‘×•×ª ×™×”×™×” ×ž×¢×˜ ×™×•×ª×¨ ×‘×”×™×¨ ×™×•×ª×¨ ×ž×’×•×•×Ÿ ×”×©×™×¢×¨.', 1, '2015-12-31 17:16:54', '0000-00-00 00:00:00');


-- -------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `UserID` int(11) NOT NULL,
  `UserTypeID` varchar(255) DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IsEnable` tinyint(4) DEFAULT NULL,
  `Remark` text,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`UserID`, `UserTypeID`, `CreatedBy`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `IsEnable`, `Remark`, `DateAdded`, `DateUpdated`) VALUES
(1, '3', 0, 'zoya', 'shaulove', 'zoyash', 'zoya.shaulove@gmail.com', 'zoizoish', 1, NULL, NULL, '0000-00-00 00:00:00');

-- -------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `VideoID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Type` tinyint(4) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`VideoID`, `MemberID`, `Path`, `Type`, `DateAdded`, `DateUpdate`) VALUES
(1, 0, 'http://localhost/alin-makeup/video/14508812211450877262movie.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- 

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `WebsiteID` int(11) NOT NULL,
  `WebsiteName` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `Address3` varchar(255) DEFAULT NULL,
  `Postcode` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Image1` varchar(255) DEFAULT NULL,
  `Image2` varchar(255) DEFAULT NULL,
  `Image3` varchar(255) DEFAULT NULL,
  `ILink1` varchar(255) NOT NULL,
  `ILink2` varchar(255) NOT NULL,
  `ShortDesc` text,
  `DetailDesc` text,
  `IsEnable` tinyint(4) DEFAULT NULL,
  `Priority` int(11) DEFAULT '0',
  `MetaTitle` text,
  `MetaKeyword` text,
  `MetaText` text,
  `GoogleVerifyCode` text,
  `GoogleAnalyticsCode` text,
  `FacebookUrl` varchar(255) NOT NULL,
  `TwitterUrl` varchar(255) NOT NULL,
  `GooglePlusUrl` varchar(255) NOT NULL,
  `LinkedInUrl` varchar(255) NOT NULL,
  `YoutubeUrl` varchar(255) NOT NULL,
  `PintrestUrl` varchar(255) NOT NULL,
  `Remark` text,
  `NOH` int(11) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`WebsiteID`, `WebsiteName`, `URL`, `CompanyName`, `Address1`, `Address2`, `Address3`, `Postcode`, `Phone`, `Fax`, `Email`, `Image1`, `Image2`, `Image3`, `ILink1`, `ILink2`, `ShortDesc`, `DetailDesc`, `IsEnable`, `Priority`, `MetaTitle`, `MetaKeyword`, `MetaText`, `GoogleVerifyCode`, `GoogleAnalyticsCode`, `FacebookUrl`, `TwitterUrl`, `GooglePlusUrl`, `LinkedInUrl`, `YoutubeUrl`, `PintrestUrl`, `Remark`, `NOH`, `DateAdded`, `DateUpdated`) VALUES
(1, 'alinmackup', 'http://localhost/alinmakeup/', 'alinmakeup', 'Address line one', 'Address Line Two', 'London', 'TW4 6JQ', '0101 1010', 'dasdasd', 'sales@alin-makeup.com', '', '', '', '', '', '', '', 2, 0, 'Welcome to alinmakeup', 'Online alinmakeup', 'Meta Text', ' Google Verify Code\r\n', 'Google Analytics Code', 'http://facebook.com/abc', 'http://twitter.com/abc', 'http://gplus.com/abc', 'http://linkedin.com/abc', 'http://youtube.com/abc', 'http://pintrest.com/abc', '', NULL, '2011-09-21 05:14:56', '2015-12-23 14:16:13');


-- -----------------------------------------------------

--
-- Table structure for table `_usertype`
--

CREATE TABLE `_usertype` (
  `UserTypeID` int(11) NOT NULL,
  `UserType` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_usertype`
--

INSERT INTO `_usertype` (`UserTypeID`, `UserType`) VALUES
(3, 'Administrator '),
(2, 'Power user '),
(1, 'User');



-- -------------------------------------------------------

--
-- Table structure for table `website_slide`
--

CREATE TABLE `website_slide` (
  `WebsiteSlideID` int(11) NOT NULL,
  `WebsiteID` int(11) DEFAULT '0',
  `SlideName` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `SlideImage1` varchar(255) DEFAULT NULL,
  `SlideImage2` varchar(255) NOT NULL,
  `DetailDesc` text,
  `IsEnable` tinyint(4) DEFAULT NULL,
  `Priority` int(11) DEFAULT '0',
  `Remark` text,
  `NOH` int(11) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `mgallery`
--
ALTER TABLE `mgallery`
  ADD PRIMARY KEY (`MGalleryID`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`PageID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`WebsiteID`);

--
-- Indexes for table `website_slide`
--
ALTER TABLE `website_slide`
  ADD PRIMARY KEY (`WebsiteSlideID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
