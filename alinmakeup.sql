-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2016 at 06:10 PM
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
(3, '2016-06-05', 2, 'חנה', 'לסלו', 1, 'Bride Makeup', 'עגול', 'יבש', '2015-09-22'),
(4, '2016-06-05', 2, 'ב', 'ב', 54, 'Evening Makeup', 'ב', 'ב', '2016-06-05'),
(5, '2016-06-05', 2, 'ג', 'ג', 123, 'Makeup Alliance', 'ג', 'ג', '2004-06-18'),
(6, '2016-06-05', 2, 'ד', 'ד', 123, 'Makeup Bat Mitzvah', 'ד', 'ד', '2016-06-05'),
(7, '2016-06-05', 2, 'ה', 'ה', 123, 'Personal Tranning', 'ה', 'ה', '2016-06-18'),
(8, '2016-06-05', 2, 'ו', 'ו', 123, 'Group Tranning', 'ו', 'ו', '2016-06-18'),
(9, '2016-06-05', 2, 'ז', 'ז', 3, 'Evening activity', 'ז', 'ז', '2016-06-05');

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
(2, 'artist', '\0a\0l\0i\0n', 'mishayev', 0, '972507817770', 'alin.makeup.artist@gmail.com', 'MTIz', 0, 1, '2015-12-23 13:58:02', '2015-12-23 13:58:02'),
(5, 'user', 'זויה', 'שאולוב', 10, '123', 'zoya.shaulove@gmail.com', 'MTIz', 1, 1, '2016-06-12 17:45:27', '2016-06-12 17:45:27'),
(4, 'user', 'מעיין', 'נחום', 11, '123456789', 'shaulove.zoya@gmail.com', 'MTIz', 1, 1, '2016-06-06 12:16:20', '2016-06-06 12:16:20');

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
(29, 2, 'http://localhost/alin-makeup/photo/1465737665nailgallery_img2.jpg', 0, '0000-00-00 00:00:00'),
(27, 2, 'http://localhost/alin-makeup/photo/14655754791464089135makeupgallery_img5.jpg', 0, '0000-00-00 00:00:00'),
(30, 2, 'http://localhost/alin-makeup/photo/14657377326.jpg', 2, '0000-00-00 00:00:00'),
(32, 2, 'http://localhost/alin-makeup/photo/14657377418.jpg', 2, '0000-00-00 00:00:00'),
(33, 2, 'http://localhost/alin-makeup/photo/14657377443.jpg', 2, '0000-00-00 00:00:00'),
(35, 2, 'http://localhost/alin-makeup/photo/1465737785nail1.jpg', 2, '0000-00-00 00:00:00'),
(47, 2, 'http://localhost/alin-makeup/photo/nailsGallery/14662017011465737800long-short-fake-nails-Pearl-photo.jpg', 2, '0000-00-00 00:00:00'),
(41, 2, 'http://localhost/alin-makeup/photo/1466166762123.jpg', 0, '0000-00-00 00:00:00'),
(43, 2, 'http://localhost/alin-makeup/photo/1466175635nailgallery_thumb5.jpg', 0, '0000-00-00 00:00:00'),
(44, 2, 'http://localhost/alin-makeup/photo/1466181881nailgallery_img4.jpg', 0, '0000-00-00 00:00:00'),
(48, 2, 'http://localhost/alin-makeup/photo/makeupGallery/14662475291466167074contact_bg.jpg', 0, '0000-00-00 00:00:00');

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
(2, 0, 0, 'Personal Training', 'personal-training', '<h1><p>בואי להתפנק בשעתיים של יופי!</p>\r\n			<p>הסדנה כוללת:</p>\r\n			<p>^ אבחון סוג העור, צורת הפנים וצורת העין.</p>\r\n			<p>^ טיפים לטיפוח נכון של העור.	</p>\r\n			<p>^ למידה של התאמת  בסיס (מייק-אפ) לגוון העור שלך ללא כל עזרה.	</p>\r\n			<p>^ התאמת סגנון איפור יום יומי לצורת העין הספציפית שלך.		</p><br>\r\n			\r\n			<p>למידה של שדרוגי איפור..מה הכוונה?!	</p>\r\n			<p>חזרת אחרי יום מטורף?!	</p>\r\n			<p>נשארו לך 20 דקות להתארגן?!</p>\r\n			<p>בואי וגלי איך את משדרגת את האיפור היום יומי בנגיעות קלות 	</p>\r\n			<p>שדורשות מאיתנו 5 דקות והופכות את האיפור לאיפור ערב זוהר ומרשים!	</p>\r\n			<p>בשונה מסדנאות אחרות, זו היא סדנה מעשית שבה את מיישמת את הנלמד.</p><br>\r\n\r\n			<p>רוצה לעבור חוויה כיפית עם חברה? אחות? אמא?	</p>\r\n			<p>סדנה אישית ניתן לקבוע עד 3 בנות יחד.</p>	</h1>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 0, 'Group Training', 'group-training', '<h1><p>	מארגנת מסיבת רווקות וכולן אוהבת להתאפר?</p>\r\n				<p> מעוניינים לצ''פר את הנשים בעבודה?</p>\r\n				<p>הגעת למקום הנכון.</p><br>\r\n\r\n				<p>סדנא קבוצתית כוללת:</p>\r\n				<p> ^ לימוד על סוגי העור השונים ואבחון סוג העור שלך.</p>\r\n				<p> ^ טיפים לטיפוח העור, נקיון הפנים ותכשירי טיפוח שונים.</p>\r\n				<p> ^ אבחון צורת הפנים וצורת העין.</p>\r\n				<p> ^ לימוד טכניקות עיצוב, חיטוב של צורת הפנים בשיטת המורפולוגיה.</p>\r\n				<p> ^ טיפים וטכניקות לאיפור יום יומי.</p>\r\n				<p> ^ לימוד טכניקה למריחת האיילינר</p>\r\n				<p> ^ שדרוג איפור יום יומי לאיפור ערב עמיד ומרשים.</p><br>\r\n				\r\n				<p>כמות המשתתפים בסדנה קבוצתית נעה בין 10 ל-60 אנשים.</p><br>				\r\n				<p>~ למסיבות רווקות מובטחות הפתעות ובניית התוכן יחד עם המארגנת ~</p></h1>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(0, 'Static');

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
(1, 'Bridesmaids Party', '+1 week', 'הזמן לבדוק אם הלקוחה מעוניינות באיפור כלה לכבוד אירוע החתונה', ''),
(2, 'Bride Makeup', '+270 day', 'הזמן לבדוק אם הלקוחות מעוניינות באיפור ערב למסיבת הברית/ה', ''),
(3, 'Makeup Alliance', '+12 year', ' הזמן לבדוק אם הלקוחה מעוניינת באיפור ערב לבר/בת מצווה', ''),
(4, 'Personal Tranning', '+30 day', 'הזמן לבדוק אם הלקוחה מעוניינת להמשיך בסדנה האישית', 'yes'),
(5, 'Group Tranning', '+90 day', 'הזמן לבדוק אם הלקוחות מעוניינות במפגשים נוספים בסדנה הקבוצתית', 'yes'),
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
(9, 2, 'למאפרים מקצועיים יש לא מעט טריקים, אחד מהם הוא הפיכתך לזוהרת במיוחד. איך? בעזרת נקודות של אור. הנקודות פותחות ומאירות את הפנים והעיניים ומגביהים את עצם הגבה. איך עושים את זה? קחי צללית בהירה (או עפרון לבן אם יש לך) ומרחי על הזווית הפנימית שבין האף והעין. הניחי טיפה גם על עצם הגבה ועל עצמות הלחיים והרקה. זה ייצור אשליה של עין גדולה יותר ופנים זוהרות.', 1, '2016-06-05 10:58:11', '0000-00-00 00:00:00'),
(20, 2, 'בין אם את חושבת שהגבות שלך מדוללות וחסרות צבע, ובין אם הן באמת כאלה, יש דרך לעבות את הגבות, מבלי להיראות כמו פיירו: לצבוע אותן בעזרת צלליות. בניגוד לעיפרון עיניים שעלול להותיר גוון כהה מדי ומראה נוקשה, הצללית – אם היא מונחת בעדינות – משווה לגבה מראה טבעי ולא קודר. חשוב להתאים את גוון הצלליות לגוון השיער ולהקפיד שגוון הגבות יהיה מעט יותר בהיר יותר מגוון השיער.', 1, '2016-06-10 17:09:13', '0000-00-00 00:00:00'),
(11, 2, 'במידה שאת לא מעוניינת למרוח לק, אבל כן רוצה להיראות סופר מטופחת, את יכולה לנסות באף מקצועי – אותו מלבן עם שטח פנים אפור חלק, שיוצר ברק עז על הציפורניים. יוליה מעדכנת אותנו שליידיז איטלקיות אמיתיות אינן מורחות לק, אלא עושות מניקור מוקפד ומותירות את הציפורניים עירומות וחלקות למשעי.', 2, '2016-06-05 10:58:59', '0000-00-00 00:00:00'),
(13, 2, 'לק זה הדבר שהכי מעניין אותנו במניקור, והשלב שהכי קשה לעשות אותו בקלאס. ברוב המקרים זה יוצא עקום למדי. לפני הלק הצבעוני מומלץ להניח שכבת בסיס שקופה. היא מגנה על הציפורן מפני חדירת הצבע והצהבה. מיד אחרי את יכולה למרוח את הלק הצבעוני, בשביל לחדש את הלק אחרי יום יומיים, מרחי את שכבת הסיום השקופה שוב. היא מרעננת את המראה ושומרת על הלק.', 2, '2016-06-05 10:59:20', '0000-00-00 00:00:00'),
(19, 2, ' כשהשפתיים שלך יבשות, הדבר האחרון שאת צריכה לעשות זה ללקק אותן. ברגע שאת מעבירה עליהן את הלשון, הרוק רק מייבש אותן עוד יותר. ונגד שפתיים סדוקות באמת שאין מה לעשות. מה עושים? אם אין לך נטייה ליובש מוגבר אז שפתון עם אחוזי לחות גבוהים יעשה את העבודה. אם את מהמתקלפות, אז עדיף ללכת על מוצר ייעודי ולמשוך אותו על שפתייך אחת לשעתיים.', 3, '2016-06-05 11:00:40', '0000-00-00 00:00:00'),
(16, 2, 'את תקראי לזה תרופת סבתא, אנחנו נקרא לזה עוד כסף לבגדים: במקום לקנות פילינג בים כסף, את יכולה פשוט להשתמש במה שיש לך במקרר. העיקרון הוא לשלב בין חומר גרגירי, כמו סוכר, עם חומר נוזלי ומאחד. קבלי מתכון: ערבבי כף שמן זית, כף סוכר, כף מיץ לימון ומעט דבש, מרחי על הפנים, שפשפי קלות והרי לך פילינג חינמי (או רוטב חינני לסלט).', 3, '2016-06-05 11:00:19', '0000-00-00 00:00:00'),
(17, 2, 'על אף הסכנה להישמע כמו פטיפון שבור, אין מנוס מלומר זאת: מקדם הגנה ומסנן קרינה צריכים להיות החברים הכי טובים שלך בכל עונות השנה. גם בחורף. אם את עייפה מלמרוח על עצמך אינספור שכבות בבוקר (קרם לחות, מייק אפ, פודרה ומקדם הגנה), זכרי שכמעט כל לחות ומייק אפ מכילים מקדם הגנה, וזה אמור להספיק. הקפידי לרכוש את אלו שיגנו עלייך מפני השמש ולא רק מפני חצ''קונים.', 3, '2016-06-05 11:00:27', '0000-00-00 00:00:00'),
(18, 2, 'קרם לחות את מורחת כל יום נכון? נכון. אז בזמן שאת משקיעה בלחיים, בסנטר ובמצח, אולי כדאי שתשימי לב גם לצוואר – החלק שמחזיק את כל הקונסטרוקט המפואר שנקרא הפרצוף שלך. גם הוא זקוק ללחות שתאפשר לו גמישות ותאט את הקמטוטים העתידים להגיע, מה גם שיש לו נטייה להזדקן לפני עור הפנים והגוף, כך שקרם מזין ייעודי לצוואר הוא בכלל בבחינת ברכה.', 3, '2016-06-05 11:00:33', '0000-00-00 00:00:00');

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
(2, 2, 'http://localhost/alin/video/14650593852.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'http://localhost/alin/video/14650593974.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'http://localhost/alin/video/14650594033.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 'http://localhost/alin-makeup/video/146624368314661758046.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'http://localhost/alin-makeup/video/14662436881466201058146619872114661758046.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 'http://localhost/alin-makeup/video/1466243760146620105314661758046.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 'http://localhost/alin-makeup/video/1466247215146619898614661758046.mp4', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
