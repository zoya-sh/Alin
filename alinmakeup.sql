-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2015 at 02:59 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alinmackup`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcustomer`
--

CREATE TABLE `mcustomer` (
  `MCustomerID` int(11) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PhoneNumber` int(255) NOT NULL,
  `MakeupType` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcustomer`
--

INSERT INTO `mcustomer` (`MCustomerID`, `DOB`, `MemberID`, `FirstName`, `LastName`, `PhoneNumber`, `MakeupType`) VALUES
(1, '', 2, 'Mritunjay', 'Kumar', 2147483647, 'Group Tranning'),
(2, '', 2, 'makup artis 1', 'mak last name', 0, 'Group Tranning'),
(3, '', 2, 'first name ', 'last lanem', 999, 'Evening Makeup'),
(4, '', 2, 'zoe', 'lina', 50, 'Evening Makeup'),
(5, '', 2, 'assasdasd', 'adasd', 34534, 'Group Tranning'),
(6, '', 2, 'a', 'b', 0, 'Evening Makeup'),
(7, '', 2, 'aa', 'b', 0, 'Birthday'),
(8, '24-09-1987', 2, 'zoya', 'shaulove', 547326486, 'Personal Tranning'),
(9, '12-13-14', 2, 'e', 'r', 2147483647, 'Evening Makeup'),
(10, '3.7.12', 2, 'zoya', 'shaulove', 547326486, 'Bride Makeup'),
(11, '1', 2, '1', '2', 3, 'Bride Makeup');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `CustomerType`, `ProfileType`, `Title`, `FirstName`, `LastName`, `Treatment`, `TelNo`, `Email`, `Password`, `IsActive`, `ActivationCode`, `IsEnable`, `DateAdded`, `DateUpdated`) VALUES
(2, '', 'artist', NULL, 'alin', 'mishayev', 0, '972507817770', 'alin.makeup.artist@gmail.com', '1111', 0, '', 1, '2015-12-23 13:58:02', '2015-12-23 13:58:02'),
(7, '', 'user', NULL, '× ×ª× ××œ', '×‘× ×“×”', 0, '0547326486', 'nel@gmail.com', '111', 1, '', 1, '2015-12-29 12:25:19', '2015-12-29 12:25:19'),
(4, '', 'user', NULL, 'first nmae', 'last', 17, '555', 'email@email.com', 'email@email.com', 1, '', 1, '2015-12-23 14:38:06', '2015-12-23 14:38:06'),
(6, '', 'user', NULL, '×–×•×™×”', '×©××•×œ×•×‘', 0, '123', 'zo@gmail.com', '123', 1, '', 1, '2015-12-26 23:27:14', '2015-12-26 23:27:14'),
(5, '', 'user', NULL, 'zoya', '×©××•×œ×•×‘', 22, '0547326486', 'zoya.shaulove@gmail.com', '123', 1, '', 1, '2015-12-26 23:25:47', '2015-12-26 23:25:47');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mgallery`
--

INSERT INTO `mgallery` (`MGalleryID`, `MemberID`, `ImagePath`, `IsNail`, `DateAdded`) VALUES
(8, 0, 'http://localhost/alin-makeup/photo/1451203824111.jpg', 2, '0000-00-00 00:00:00'),
(11, 2, 'http://localhost/alin-makeup/photo/145139666420150917_155621.jpg', 2, '0000-00-00 00:00:00'),
(9, 2, '', 0, '0000-00-00 00:00:00'),
(10, 2, 'http://localhost/alin-makeup/photo/1451396661123.JPG', 2, '0000-00-00 00:00:00');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`PageID`, `PageTypeID`, `PageParentID`, `PageName`, `Slug`, `DetailDesc`, `DetailDesc1`, `IsEnable`, `MetaTitle`, `MetaKeyword`, `MetaText`, `DateAdded`, `DateUpdated`) VALUES
(2, 0, 0, 'Personal Training', 'personal-training', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 0, 'Group Training', 'group-training', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 0, 'evenings-activity', 'evenings-activity', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pagetype`
--

CREATE TABLE `pagetype` (
  `PageTypeID` int(11) DEFAULT '0',
  `PageTypeName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagetype`
--

INSERT INTO `pagetype` (`PageTypeID`, `PageTypeName`) VALUES
(1, 'Header'),
(2, 'ABOUT DHAKASNOB'),
(3, 'SITE DIRECTORY'),
(4, 'DHAKASNOB FAMILY');

-- --------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`TipsID`, `MemberID`, `Desc`, `TipsType`, `DateAdded`, `DateUpdate`) VALUES
(1, 0, 'sddsadas', 1, '2015-12-23 13:08:36', '0000-00-00 00:00:00'),
(4, 0, 'dasdasdasdasdasdasdasd', 2, '2015-12-23 13:11:04', '0000-00-00 00:00:00'),
(3, 0, 'asdasd', 1, '2015-12-23 13:08:38', '0000-00-00 00:00:00'),
(5, 0, 'asdasdasdnail', 2, '2015-12-23 13:11:08', '0000-00-00 00:00:00'),
(6, 0, 'Care TipsCare TipsCare TipsCare TipsCare TipsCare TipsCare TipsCare TipsCare Tips', 3, '2015-12-23 13:12:46', '0000-00-00 00:00:00'),
(7, 0, 'sdasdasdasdasdasdasdasd', 1, '2015-12-23 16:28:06', '0000-00-00 00:00:00'),
(13, 2, '×™×™×™×™', 3, '2015-12-27 01:33:44', '0000-00-00 00:00:00'),
(8, 2, '×œ×œ×›×ª ×œ×™×©×•×Ÿ ×ž×•×§×“×', 1, '2015-12-26 17:34:51', '0000-00-00 00:00:00'),
(12, 2, '×œ×™×©×•×Ÿ ×˜×•×‘', 3, '2015-12-27 01:13:56', '0000-00-00 00:00:00'),
(14, 2, 'fffffffffffffffffffffffffff', 3, '2015-12-27 01:55:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`UserID`, `UserTypeID`, `CreatedBy`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `IsEnable`, `Remark`, `DateAdded`, `DateUpdated`) VALUES
(1, '3', 0, 'zoya', 'shaulove', 'zoyash', 'zoya.shaulove@gmail.com', 'zoizoish', 1, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`VideoID`, `MemberID`, `Path`, `Type`, `DateAdded`, `DateUpdate`) VALUES
(1, 0, 'http://localhost/alin-makeup/video/14508812211450877262movie.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`WebsiteID`, `WebsiteName`, `URL`, `CompanyName`, `Address1`, `Address2`, `Address3`, `Postcode`, `Phone`, `Fax`, `Email`, `Image1`, `Image2`, `Image3`, `ILink1`, `ILink2`, `ShortDesc`, `DetailDesc`, `IsEnable`, `Priority`, `MetaTitle`, `MetaKeyword`, `MetaText`, `GoogleVerifyCode`, `GoogleAnalyticsCode`, `FacebookUrl`, `TwitterUrl`, `GooglePlusUrl`, `LinkedInUrl`, `YoutubeUrl`, `PintrestUrl`, `Remark`, `NOH`, `DateAdded`, `DateUpdated`) VALUES
(1, 'alinmackup', 'http://localhost/alinmakeup/', 'alinmakeup', 'Address line one', 'Address Line Two', 'London', 'TW4 6JQ', '0101 1010', 'dasdasd', 'sales@alignmackup.com', '', '', '', '', '', '', '', 2, 0, 'Welcome to alinmakeup', 'Online alinmakeup', 'Meta Text', ' Google Verify Code\r\n', 'Google Analytics Code', 'http://facebook.com/abc', 'http://twitter.com/abc', 'http://gplus.com/abc', 'http://linkedin.com/abc', 'http://youtube.com/abc', 'http://pintrest.com/abc', '', NULL, '2011-09-21 05:14:56', '2015-12-23 14:16:13');

-- --------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_usertype`
--

CREATE TABLE `_usertype` (
  `UserTypeID` int(11) NOT NULL,
  `UserType` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_usertype`
--

INSERT INTO `_usertype` (`UserTypeID`, `UserType`) VALUES
(3, 'Administrator '),
(2, 'Power user '),
(1, 'User');

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
