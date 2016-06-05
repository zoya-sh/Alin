-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 12:26 PM
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
  `MakeupType` varchar(255) NOT NULL,
  `FacialStructure` varchar(255) NOT NULL,
  `SkinType` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mcustomer`
--

INSERT INTO `mcustomer` (`MCustomerID`, `DOB`, `MemberID`, `FirstName`, `LastName`, `PhoneNumber`, `MakeupType`, `FacialStructure`, `SkinType`, `date`) VALUES
(3, '2016-06-05', 2, 'חנה', 'לסלו', 1, 'Bride Makeup', 'עגול', 'יבש', '2015-09-09'),
(4, '2016-06-05', 2, 'ב', 'ב', 54, 'Evening Makeup', 'ב', 'ב', '2016-06-05'),
(5, '2016-06-05', 2, 'ג', 'ג', 123, 'Makeup Alliance', 'ג', 'ג', '2004-06-05'),
(6, '2016-06-05', 2, 'ד', 'ד', 123, 'Makeup Bat Mitzvah', 'ד', 'ד', '2016-06-05'),
(7, '2016-06-05', 2, 'ה', 'ה', 123, 'Personal Tranning', 'ה', 'ה', '2016-06-05'),
(8, '2016-06-05', 2, 'ו', 'ו', 123, 'Group Tranning', 'ו', 'ו', '2016-03-07'),
(9, '2016-06-05', 2, 'ז', 'ז', 3, 'Evening activity', 'ז', 'ז', '2016-06-05'),
(10, '2016-06-05', 2, 'ח', 'ח', 456, 'Bridesmaids Party', 'ח', 'ח', '2016-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberID` int(11) NOT NULL,
  `ProfileType` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Treatment` tinyint(4) NOT NULL,
  `TelNo` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `IsEnable` tinyint(4) NOT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `ProfileType`, `FirstName`, `LastName`, `Treatment`, `TelNo`, `Email`, `Password`, `IsActive`, `IsEnable`, `DateAdded`, `DateUpdated`) VALUES
(2, 'artist', '\0a\0l\0i\0n', 'mishayev', 0, '972507817770', 'alin.makeup.artist@gmail.com', '123', 0, 1, '2015-12-23 13:58:02', '2015-12-23 13:58:02'),
(3, 'user', 'זויה', 'שאולוב', 5, '0547326486', 'zoya.shaulove@gmail.com', 'zoya213', 1, 1, '2016-06-04 17:34:28', '2016-06-04 17:34:28'),
(4, 'user', 'מעיין', 'נחום', 11, '0547326486', 'shaulove.zoya@gmail.com', 'ZOSHA890703', 1, 1, '2016-06-05 08:43:02', '2016-06-05 08:43:02');

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
(10, 2, 'http://localhost/alin/photo/146511680014515788481.JPG', 0, '0000-00-00 00:00:00'),
(11, 2, 'http://localhost/alin/photo/146511680314515789622.JPG', 0, '0000-00-00 00:00:00'),
(12, 2, 'http://localhost/alin/photo/146511680814515789863.JPG', 0, '0000-00-00 00:00:00'),
(22, 2, 'http://localhost/alin/photo/146511692214515796553.jpg', 2, '0000-00-00 00:00:00'),
(21, 2, 'http://localhost/alin/photo/146511691914515795732.jpg', 2, '0000-00-00 00:00:00'),
(20, 2, 'http://localhost/alin/photo/146511691614515795161.jpg', 2, '0000-00-00 00:00:00'),
(13, 2, 'http://localhost/alin/photo/146511681314515791274.jpg', 0, '0000-00-00 00:00:00'),
(23, 2, 'http://localhost/alin/photo/146511692514515797354.jpg', 2, '0000-00-00 00:00:00'),
(14, 2, 'http://localhost/alin/photo/146511681714515794317.JPG', 0, '0000-00-00 00:00:00'),
(15, 2, 'http://localhost/alin/photo/1465116826145141935720141016_211721.jpg', 0, '0000-00-00 00:00:00'),
(16, 2, 'http://localhost/alin/photo/1465116845146403168614515793136.JPG', 0, '0000-00-00 00:00:00'),
(17, 2, 'http://localhost/alin/photo/1465116863145141935420140915_111619.jpg', 0, '0000-00-00 00:00:00'),
(18, 2, 'http://localhost/alin/photo/14651168811464089135makeupgallery_img5.jpg', 0, '0000-00-00 00:00:00'),
(19, 2, 'http://localhost/alin/photo/14651168891464033171makeupgallery_img1.jpg', 0, '0000-00-00 00:00:00'),
(24, 2, 'http://localhost/alin/photo/146511692914515798125.jpg', 2, '0000-00-00 00:00:00'),
(25, 2, 'http://localhost/alin/photo/1465116937145310479120151129_111405.jpg', 2, '0000-00-00 00:00:00');

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
  `IsEnable` tinyint(4) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`PageID`, `PageTypeID`, `PageParentID`, `PageName`, `Slug`, `DetailDesc`, `IsEnable`, `DateAdded`, `DateUpdated`) VALUES
(2, 0, 0, 'Personal Training', 'personal-training', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 0, 'Group Training', 'group-training', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 0, 'evenings-activity', 'evenings-activity', 'fgfhdfgh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `duration`, `action`, `con`) VALUES
(1, 'Bridesmaids Party', '+1 week', 'צריכה איפור ליום חתונתה', ''),
(2, 'Bride Makeup', '+270 day', 'צריכה איפור לברית/ה', ''),
(3, 'Makeup Alliance', '+12 year', 'צריכה איפור למסיבת בר// בת מצוורה', ''),
(4, 'Personal Tranning', '+30 day', 'מעוניית בשיעור נוף של סדנא אישית', 'yes'),
(5, 'Group Tranning', '+90 day', 'מעוניינות בשיעורים נוספים של סדנא קבוצתית', 'yes'),
(6, 'Evening Makeup', '-1 week', '', ''),
(7, 'Makeup Bat Mitzvah', '-1 week', '', ''),
(8, 'Evening activity', '-1 week', '', '');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`TipsID`, `MemberID`, `Desc`, `TipsType`, `DateAdded`, `DateUpdate`) VALUES
(8, 2, 'את ממש לא חייבת להיות מאפרת מקצועית כדי להבין את ההיגיון הפשוט של תורת האיפור: צבע כהה מקטין, משקיע ומקרב. צבע בהיר מאיר, מבליט ומרחיק. זה אולי לא משהו לשיחת סלון, אבל מדובר באינפורמציה ששווה הון. איך מתרגמים אותה למציאות? יש לך עיניים בולטות שאת ממש לא אוהבת? התאפרי בצלליות כהות יותר. אם עינייך קטנות, השקיעי בגוונים בהירים שיפתחו ויגדילו את מבנה העין.', 1, '2016-06-05 10:57:59', '0000-00-00 00:00:00'),
(12, 2, 'נכון את תמיד מורחת לק כשהאצבעות שלך מופנות החוצה? אז מתברר שהזווית הטובה ביותר למשיחת לק היא כאשר המרפק מכופף ב-90 מעלות, וכף היד נחה על משטח יציב ומופנית אלייך.', 2, '2016-06-05 10:59:14', '0000-00-00 00:00:00'),
(9, 2, 'למאפרים מקצועיים יש לא מעט טריקים, אחד מהם הוא הפיכתך לזוהרת במיוחד. איך? בעזרת נקודות של אור. הנקודות פותחות ומאירות את הפנים והעיניים ומגביהים את עצם הגבה. איך עושים את זה? קחי צללית בהירה (או עפרון לבן אם יש לך) ומרחי על הזווית הפנימית שבין האף והעין. הניחי טיפה גם על עצם הגבה ועל עצמות הלחיים והרקה. זה ייצור אשליה של עין גדולה יותר ופנים זוהרות.', 1, '2016-06-05 10:58:11', '0000-00-00 00:00:00'),
(10, 2, 'בין אם את חושבת שהגבות שלך מדוללות וחסרות צבע, ובין אם הן באמת כאלה, יש דרך לעבות את הגבות, מבלי להיראות כמו פיירו: לצבוע אותן בעזרת צלליות. בניגוד לעיפרון עיניים שעלול להותיר גוון כהה מדי ומראה נוקשה, הצללית – אם היא מונחת בעדינות – משווה לגבה מראה טבעי ולא קודר. חשוב להתאים את גוון הצלליות לגוון השיער ולהקפיד שגוון הגבות יהיה מעט יותר בהיר יותר מגוון השיער.', 1, '2016-06-05 10:58:20', '0000-00-00 00:00:00'),
(11, 2, 'במידה שאת לא מעוניינת למרוח לק, אבל כן רוצה להיראות סופר מטופחת, את יכולה לנסות באף מקצועי – אותו מלבן עם שטח פנים אפור חלק, שיוצר ברק עז על הציפורניים. יוליה מעדכנת אותנו שליידיז איטלקיות אמיתיות אינן מורחות לק, אלא עושות מניקור מוקפד ומותירות את הציפורניים עירומות וחלקות למשעי.', 2, '2016-06-05 10:58:59', '0000-00-00 00:00:00'),
(13, 2, 'לק זה הדבר שהכי מעניין אותנו במניקור, והשלב שהכי קשה לעשות אותו בקלאס. ברוב המקרים זה יוצא עקום למדי. לפני הלק הצבעוני מומלץ להניח שכבת בסיס שקופה. היא מגנה על הציפורן מפני חדירת הצבע והצהבה. מיד אחרי את יכולה למרוח את הלק הצבעוני, בשביל לחדש את הלק אחרי יום יומיים, מרחי את שכבת הסיום השקופה שוב. היא מרעננת את המראה ושומרת על הלק.', 2, '2016-06-05 10:59:20', '0000-00-00 00:00:00'),
(19, 2, ' כשהשפתיים שלך יבשות, הדבר האחרון שאת צריכה לעשות זה ללקק אותן. ברגע שאת מעבירה עליהן את הלשון, הרוק רק מייבש אותן עוד יותר. ונגד שפתיים סדוקות באמת שאין מה לעשות. מה עושים? אם אין לך נטייה ליובש מוגבר אז שפתון עם אחוזי לחות גבוהים יעשה את העבודה. אם את מהמתקלפות, אז עדיף ללכת על מוצר ייעודי ולמשוך אותו על שפתייך אחת לשעתיים.', 3, '2016-06-05 11:00:40', '0000-00-00 00:00:00'),
(16, 2, 'את תקראי לזה תרופת סבתא, אנחנו נקרא לזה עוד כסף לבגדים: במקום לקנות פילינג בים כסף, את יכולה פשוט להשתמש במה שיש לך במקרר. העיקרון הוא לשלב בין חומר גרגירי, כמו סוכר, עם חומר נוזלי ומאחד. קבלי מתכון: ערבבי כף שמן זית, כף סוכר, כף מיץ לימון ומעט דבש, מרחי על הפנים, שפשפי קלות והרי לך פילינג חינמי (או רוטב חינני לסלט).', 3, '2016-06-05 11:00:19', '0000-00-00 00:00:00'),
(17, 2, 'על אף הסכנה להישמע כמו פטיפון שבור, אין מנוס מלומר זאת: מקדם הגנה ומסנן קרינה צריכים להיות החברים הכי טובים שלך בכל עונות השנה. גם בחורף. אם את עייפה מלמרוח על עצמך אינספור שכבות בבוקר (קרם לחות, מייק אפ, פודרה ומקדם הגנה), זכרי שכמעט כל לחות ומייק אפ מכילים מקדם הגנה, וזה אמור להספיק. הקפידי לרכוש את אלו שיגנו עלייך מפני השמש ולא רק מפני חצ''קונים.', 3, '2016-06-05 11:00:27', '0000-00-00 00:00:00'),
(18, 2, 'קרם לחות את מורחת כל יום נכון? נכון. אז בזמן שאת משקיעה בלחיים, בסנטר ובמצח, אולי כדאי שתשימי לב גם לצוואר – החלק שמחזיק את כל הקונסטרוקט המפואר שנקרא הפרצוף שלך. גם הוא זקוק ללחות שתאפשר לו גמישות ותאט את הקמטוטים העתידים להגיע, מה גם שיש לו נטייה להזדקן לפני עור הפנים והגוף, כך שקרם מזין ייעודי לצוואר הוא בכלל בבחינת ברכה.', 3, '2016-06-05 11:00:33', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`VideoID`, `MemberID`, `Path`, `Type`, `DateAdded`, `DateUpdate`) VALUES
(1, 2, 'http://localhost/alin/video/146505937714628889711.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'http://localhost/alin/video/14650593852.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'http://localhost/alin/video/14650593974.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'http://localhost/alin/video/14650594033.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `Postcode` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `IsEnable` tinyint(4) DEFAULT NULL,
  `Priority` int(11) DEFAULT '0',
  `MetaTitle` text,
  `MetaKeyword` text,
  `Remark` text,
  `NOH` int(11) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`WebsiteID`, `WebsiteName`, `URL`, `CompanyName`, `Address1`, `Postcode`, `Phone`, `Fax`, `Email`, `IsEnable`, `Priority`, `MetaTitle`, `MetaKeyword`, `Remark`, `NOH`, `DateAdded`, `DateUpdated`) VALUES
(1, 'alinmackup', 'http://localhost/alinmakeup/', 'alinmakeup', 'Address line one', '89023', '0547777777', '0547777777', 'alinmakeup@gmail.com', 2, 0, 'Welcome to alinmakeup', 'Online alinmakeup', '', NULL, '2011-09-21 05:14:56', '2015-12-23 14:16:13');

-- --------------------------------------------------------

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
