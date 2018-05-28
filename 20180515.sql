-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 04 月 17 日 10:23
-- 伺服器版本: 5.7.20
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `AVS`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Academic_Services`
--

CREATE TABLE `Academic_Services` (
  `Id` int(20) NOT NULL,
  `Services_Year` int(20) DEFAULT NULL,
  `Service_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Academic_Services`
--

INSERT INTO `Academic_Services` (`Id`, `Services_Year`, `Service_Type`, `Description`, `Professor_Id`) VALUES
(1234, 2013, 'others', '很帥的義工', 100),
(1235, 2014, 'others', '很帥的志工', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `avsAnswer`
--

CREATE TABLE `avsAnswer` (
  `Id` int(20) NOT NULL,
  `avsAnswer_value` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `avsAnswer_Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `avsAnswer`
--

INSERT INTO `avsAnswer` (`Id`, `avsAnswer_value`, `avsAnswer_Title`) VALUES
(1, 'Professor', 'Academic_Title'),
(2, 'Associate Professor', 'Academic_Title'),
(3, 'Assistant Professor', 'Academic_Title'),
(4, 'Lecturer', 'Academic_Title'),
(5, 'Adjunct Professor', 'Academic_Title'),
(6, 'Adjunct Associtate Professor', 'Academic_Title'),
(7, 'Adjunct Assistant Professor', 'Academic_Title'),
(8, 'Adjunct Lecturer', 'Academic_Title'),
(9, 'Academic Title', 'Academic_Title'),
(10, 'Dean', 'Administration_Title'),
(11, 'Department Chair', 'Administration_Title'),
(12, 'Director', 'Administration_Title'),
(13, 'Dept. of Economics', 'Department'),
(14, 'Dept. of Finance', 'Department'),
(15, 'Dept. of Accounting and Information Technology', 'Department'),
(16, 'Dept. of Information Management', 'Department'),
(17, 'Dept. of Business Administration', 'Department'),
(18, 'College of Management', 'College'),
(19, 'Other', 'College'),
(20, 'National Chung Cheng University', 'University'),
(21, 'University', 'University'),
(22, 'Other', 'University'),
(23, 'Ph.D.', 'Education'),
(24, 'Master', 'Education'),
(25, 'Bacholar', 'Education'),
(26, 'Teaching Responsibilities 教學職責', 'Faculty_Responsibilities'),
(27, 'Administrative and Academic Services 行政職責', 'Faculty_Responsibilities'),
(28, 'Administrative Committee (Committee Activities) 行政委員會', 'Faculty_Responsibilities'),
(29, 'Teaching committee (Student-related Activities) 教學委員會(與學生相關)', 'Faculty_Responsibilities'),
(30, 'Participating Faculty (P)', 'Faculty_Sufficiency'),
(31, 'Supporting Faculty (S)', 'Faculty_Sufficiency'),
(32, 'Scholarly Academic (SA)', 'Faculty_Qualification'),
(33, 'Practice Academic (PA)', 'Faculty_Qualification'),
(34, 'Scholarly Practitioner (SP)', 'Faculty_Qualification'),
(35, 'Instructional Practitioner (IP)', 'Faculty_Qualification'),
(36, 'Other (O)', 'Faculty_Qualification'),
(37, 'UT', 'Normal_Professional_Responsibilitiese'),
(38, 'MT', 'Normal_Professional_Responsibilitiese'),
(39, 'DT', 'Normal_Professional_Responsibilitiese'),
(40, 'ADM', 'Normal_Professional_Responsibilitiese'),
(41, 'RES', 'Normal_Professional_Responsibilitiese'),
(42, 'ED', 'Normal_Professional_Responsibilitiese'),
(43, 'SER', 'Normal_Professional_Responsibilitiese'),
(142, 'Null', 'Normal_Professional_Responsibilitiese'),
(44, 'BA/BBA', 'Course_Taught_Program'),
(45, 'MA/MS', 'Course_Taught_Program'),
(46, 'MBA/EMBA', 'Course_Taught_Program'),
(47, 'Ph.D.', 'Course_Taught_Program'),
(48, '1', 'Semester'),
(49, '2', 'Semester'),
(50, '1 hour', 'Credit_hour'),
(51, '2 hours', 'Credit_hour'),
(52, '3 hours', 'Credit_hour'),
(53, '4 hours', 'Credit_hour'),
(54, '5 hours', 'Credit_hour'),
(55, '6 hours', 'Credit_hour'),
(56, 'editor', 'Service_Type'),
(57, 'associate editor', 'Service_Type'),
(58, 'managing editor', 'Service_Type'),
(59, 'editorial board', 'Service_Type'),
(60, 'leadership in academic societies', 'Service_Type'),
(61, 'research fellow', 'Service_Type'),
(62, 'invited speaker', 'Service_Type'),
(63, 'others', 'Service_Type'),
(64, 'Published', 'Peer_reviewed_Journals_Status'),
(65, 'Submitted', 'Peer_reviewed_Journals_Status'),
(66, 'Prepared to submit', 'Peer_reviewed_Journals_Status'),
(67, 'Sumitted and revising', 'Peer_reviewed_Journals_Status'),
(68, '是', 'Peer_reviewed_Journals_Browses'),
(69, '否', 'Peer_reviewed_Journals_Browses'),
(70, 'Ministry of Science and Technology', 'Peer_reviewed_Journals_Supported_by'),
(71, 'Industrial Field', 'Peer_reviewed_Journals_Supported_by'),
(72, 'Academic Association', 'Peer_reviewed_Journals_Supported_by'),
(73, 'Cultural Organization', 'Peer_reviewed_Journals_Supported_by'),
(74, 'NGO', 'Peer_reviewed_Journals_Supported_by'),
(75, 'A+', 'MOST_Rank'),
(76, 'A', 'MOST_Rank'),
(77, 'A-', 'MOST_Rank'),
(78, 'B+', 'MOST_Rank'),
(79, 'B', 'MOST_Rank'),
(80, 'B-', 'MOST_Rank'),
(81, 'C+', 'MOST_Rank'),
(82, 'C', 'MOST_Rank'),
(83, 'C-', 'MOST_Rank'),
(141, 'Other', 'MOST_Rank'),
(84, 'BDS', 'Portfolio'),
(85, 'AIS', 'Portfolio'),
(86, 'TLS', 'Portfolio'),
(87, 'SCI', 'Citation_Index'),
(88, 'SSCI', 'Citation_Index'),
(89, 'TSSCI', 'Citation_Index'),
(90, 'Econlit', 'Citation_Index'),
(91, 'FLI', 'Citation_Index'),
(92, 'EI', 'Citation_Index'),
(93, 'Others (please specify)', 'Citation_Index'),
(94, 'BDS', 'Research_Monographs_Type'),
(95, 'AIS', 'Research_Monographs_Type'),
(96, 'TLS', 'Research_Monographs_Type'),
(97, 'Published', 'Research_Monographs_Status'),
(98, 'Submitted', 'Research_Monographs_Status'),
(99, 'Prepared to submit', 'Research_Monographs_Status'),
(100, 'Sumitted and revising', 'Research_Monographs_Status'),
(101, '是', 'Research_Monographs_Browses'),
(102, '否', 'Research_Monographs_Browses'),
(103, 'Ministry of Science and Technology', 'Research_Monographs_Supported_by'),
(104, 'Industrial Field', 'Research_Monographs_Supported_by'),
(105, 'Academic Association', 'Research_Monographs_Supported_by'),
(106, 'Academic Association', 'Research_Monographs_Supported_by'),
(107, 'NGO', 'Research_Monographs_Supported_by'),
(108, 'BDS', 'Academic_Meeting_Proceedings_Type'),
(109, 'AIS', 'Academic_Meeting_Proceedings_Type'),
(110, 'TLS', 'Academic_Meeting_Proceedings_Type'),
(111, 'BDS', 'Professional_Meeting_Proceedings_Type'),
(112, 'AIS', 'Professional_Meeting_Proceedings_Type'),
(113, 'TLS', 'Professional_Meeting_Proceedings_Type'),
(114, 'BDS', 'Textbooks_Chapters_Type'),
(115, 'TLS', 'Textbooks_Chapters_Type'),
(116, 'AIS', 'Textbooks_Chapters_Type'),
(117, 'BDS', 'Cases_Type'),
(118, 'TLS', 'Cases_Type'),
(119, 'AIS', 'Cases_Type'),
(120, 'BDS', 'Other_Teaching_Materials_Type'),
(121, 'TLS', 'Other_Teaching_Materials_Type'),
(122, 'AIS', 'Other_Teaching_Materials_Type'),
(123, 'Research Award', 'Honors_and_Competitive_Awards_Received_Type'),
(124, 'Research grant from MOST', 'Honors_and_Competitive_Awards_Received_Type'),
(125, 'Professional Awards (Practice)', 'Honors_and_Competitive_Awards_Received_Type'),
(126, 'Teaching Awards', 'Honors_and_Competitive_Awards_Received_Type'),
(127, 'consulting practice', 'Professional_Development_Type'),
(128, 'collaborative projects', 'Professional_Development_Type'),
(129, 'executive', 'Professional_Development_Type'),
(130, 'the board of directors', 'Professional_Development_Type'),
(131, 'faculty internships', 'Professional_Development_Type'),
(132, 'practice-oriented intellectual contribution', 'Professional_Development_Type'),
(133, 'professional certification', 'Professional_Development_Type'),
(134, 'development of executive education program', 'Professional_Development_Type'),
(135, 'professional continuing education', 'Professional_Development_Type'),
(136, 'professional business association', 'Professional_Development_Type'),
(137, 'professional events', 'Professional_Development_Type'),
(138, 'professional acativities', 'Professional_Development_Type'),
(139, 'invited speaker', 'Professional_Development_Type'),
(140, 'others', 'Professional_Development_Type');

-- --------------------------------------------------------

--
-- 資料表結構 `Course_Taught`
--

CREATE TABLE `Course_Taught` (
  `Id` int(20) NOT NULL,
  `Program` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Academic_Year` int(20) DEFAULT NULL,
  `Semester` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Course_Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Credit_Hour` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Course_Taught`
--

INSERT INTO `Course_Taught` (`Id`, `Program`, `Academic_Year`, `Semester`, `Course_Title`, `Credit_Hour`, `Professor_Id`) VALUES
(1234, 'BA/BBA', 2017, '1', 'JAVA', '1 hour', 100),
(1266, 'BA/BBA', 2017, '1', 'JAVA', '1 hour', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `Meeting_Proceedings_And_Other`
--

CREATE TABLE `Meeting_Proceedings_And_Other` (
  `Id` int(20) NOT NULL,
  `Meeting_Year` int(20) DEFAULT NULL,
  `Meeting_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Meeting_Class` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Meeting_Proceedings_And_Other`
--

INSERT INTO `Meeting_Proceedings_And_Other` (`Id`, `Meeting_Year`, `Meeting_Type`, `Topic`, `Description`, `Meeting_Class`, `Professor_Id`) VALUES
(98989801, 2015, 'BDS', '資訊義工', '義工', 'Cases', 100),
(98989802, 2015, 'TLS', '資訊義工', '義工', 'Meeting Proceedings', 100),
(98989810, 2015, 'AIS', '資訊義工', '義工', 'Textbooks/Chapters', 100),
(98989898, 2015, 'AIS', '資訊義工', '義工', 'Meeting Proceedings', 100),
(98989899, 2015, 'others', '資訊', 'Hospital', 'Professional Development', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `Peer_reviewed_Journals`
--

CREATE TABLE `Peer_reviewed_Journals` (
  `Id` int(20) NOT NULL,
  `Reviewed_Year` int(20) DEFAULT NULL,
  `Topic` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Download_Number` varchar(11) DEFAULT NULL,
  `Status` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `MOST_Rank` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Portfolio` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Citation_Index` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Browses` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Supported_by` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Peer_reviewed_Journals`
--

INSERT INTO `Peer_reviewed_Journals` (`Id`, `Reviewed_Year`, `Topic`, `Description`, `Download_Number`, `Status`, `MOST_Rank`, `Portfolio`, `Citation_Index`, `Browses`, `Supported_by`, `Professor_Id`) VALUES
(1255533, 2013, '2超棒期刊', '真的很棒', '2000', '完美', 'A', 'TLS', 'SCI', '公開', '接受超多補助', 100),
(1255534, 2013, '1超棒期刊', '真的很棒', '2000', '完美', 'A', 'BDS', 'SSCI', '公開', '接受超多補助', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `Professional_History`
--

CREATE TABLE `Professional_History` (
  `Id` int(20) NOT NULL,
  `Month_Year` int(20) DEFAULT NULL,
  `Title` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Department` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professional_History_Section` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Company_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professional_History`
--

INSERT INTO `Professional_History` (`Id`, `Month_Year`, `Title`, `Department`, `Professional_History_Section`, `Company_name`, `Professor_Id`) VALUES
(7248, 2005, '區塊鍊', '中正大學', '業界', '人事部', 100),
(7249, 2015, '區塊鍊', '中正大學', '業界', '人事部', 100),
(7250, 2016, '區塊鍊', '中正大學', '業界', '人事部', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `Professional_Societies`
--

CREATE TABLE `Professional_Societies` (
  `Id` int(20) NOT NULL,
  `Professional_Societies_Year` int(20) DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professional_Societies`
--

INSERT INTO `Professional_Societies` (`Id`, `Professional_Societies_Year`, `Topic`, `Description`, `Professor_Id`) VALUES
(888248, 2015, '資料庫鍊', '資料庫', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `Professor_Information`
--

CREATE TABLE `Professor_Information` (
  `Id` int(20) NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Administration_Title` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Academic_Title` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Center` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Department` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `College` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `University` varchar(100) CHARACTER SET utf8 DEFAULT '中正大學',
  `Phone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Cell` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `E_mail` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Website` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_Degree` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_Year` int(20) DEFAULT NULL,
  `Edu_Major` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_Department` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_School` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Responsibilitie` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Faculty_Sufficiency` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Time_Devoted_Mission` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Faculty_Qualification` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities4` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities5` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities6` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Normal_Professional_Responsibilities7` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `BDS` int(20) DEFAULT NULL,
  `AIS` int(20) DEFAULT NULL,
  `TLS` int(20) DEFAULT NULL,
  `PRJs` int(20) DEFAULT NULL,
  `RMs` int(20) DEFAULT NULL,
  `A/P_MPs` int(20) DEFAULT NULL,
  `CRARs` int(20) DEFAULT NULL,
  `TBs` int(20) DEFAULT NULL,
  `Cases` int(20) DEFAULT NULL,
  `Other_TMs` int(20) DEFAULT NULL,
  `Other_IC_Type` int(20) DEFAULT NULL,
  `Teaching_Interests` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Research_Impacts` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Practice_Impacts` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Teaching_Impacts` varchar(1000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professor_Information`
--

INSERT INTO `Professor_Information` (`Id`, `Name`, `Administration_Title`, `Academic_Title`, `Center`, `Department`, `College`, `University`, `Phone`, `Cell`, `E_mail`, `Website`, `Edu_Degree`, `Edu_Year`, `Edu_Major`, `Edu_Department`, `Edu_School`, `Responsibilitie`, `Faculty_Sufficiency`, `Time_Devoted_Mission`, `Faculty_Qualification`, `Description`, `Normal_Professional_Responsibilities1`, `Normal_Professional_Responsibilities2`, `Normal_Professional_Responsibilities3`, `Normal_Professional_Responsibilities4`, `Normal_Professional_Responsibilities5`, `Normal_Professional_Responsibilities6`, `BDS`, `AIS`, `TLS`, `PRJs`, `RMs`, `A/P_MPs`, `CRARs`, `TBs`, `Cases`, `Other_TMs`, `Other_IC_Type`, `Teaching_Interests`, `Research_Impacts`, `Practice_Impacts`, `Teaching_Impacts`) VALUES
(100, '王大明', 'Dean', 'Professor', '醫學中心', 'Dept. of Economics', 'College of Management', 'National Chung Cheng University', '05-2730411', '0900000001', 'techer2@mis.ccu.edu.tw', 'https://www.ccu.edu.tw/', 'Ph.D.', 2017, 'Management Information Systems', 'Dept. of Information Management', 'National Chung Cheng University', 'Teaching Responsibilities 教學職責', 'Participating Faculty (P)', '100%', 'Scholarly Academic (SA)', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                高雄市燕巢區深水路12號                                                                                                                                                                                                                                                                                                                                                                                                                                ', 'UT', 'RES', 'DT', 'ADM', 'RES', 'ED', 8, 2, 2, 4, 5, 6, 7, 8, 9, 10, 11, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                Data mining                                                                                                                                                                                                                                                                                                                                                                                                                                ', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `Research_Monographs`
--

CREATE TABLE `Research_Monographs` (
  `Id` int(20) NOT NULL,
  `Research_Year` int(20) DEFAULT NULL,
  `Research_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Download_Number` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `Status` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Browses` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Supported_by` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Research_Monographs`
--

INSERT INTO `Research_Monographs` (`Id`, `Research_Year`, `Research_Type`, `Topic`, `Description`, `Download_Number`, `Status`, `Browses`, `Supported_by`, `Professor_Id`) VALUES
(995534, 2013, 'BDS', '真的很資管', '厲害', '2000', '棒', '公開', '接受超多補助', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `Teaching_Materials_And_Awards`
--

CREATE TABLE `Teaching_Materials_And_Awards` (
  `Id` int(20) NOT NULL,
  `Teaching_Materials_And_Awards_Year` int(20) DEFAULT NULL,
  `Teaching_Materials_And_Awards_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Contributions_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Teaching_Materials_And_Awards`
--

INSERT INTO `Teaching_Materials_And_Awards` (`Id`, `Teaching_Materials_And_Awards_Year`, `Teaching_Materials_And_Awards_Type`, `Title`, `Contributions_name`, `Professor_Id`) VALUES
(1248, 2015, 'BDS', '論文第一名', 'Other_Teaching_Materials', 100),
(1249, 2015, 'Research grant from MOST', '論文第一名', 'Honors_Competitive_Awards_Received', 100);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `Academic_Services`
--
ALTER TABLE `Academic_Services`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Academic_Services_Fk` (`Professor_Id`);

--
-- 資料表索引 `Course_Taught`
--
ALTER TABLE `Course_Taught`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Course_Taugh_Fk` (`Professor_Id`);

--
-- 資料表索引 `Meeting_Proceedings_And_Other`
--
ALTER TABLE `Meeting_Proceedings_And_Other`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Meeting_Proceedings_And_Other_Fk` (`Professor_Id`);

--
-- 資料表索引 `Peer_reviewed_Journals`
--
ALTER TABLE `Peer_reviewed_Journals`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Peer_reviewed_Journals_Fk` (`Professor_Id`);

--
-- 資料表索引 `Professional_History`
--
ALTER TABLE `Professional_History`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Professional_History_Fk` (`Professor_Id`);

--
-- 資料表索引 `Professional_Societies`
--
ALTER TABLE `Professional_Societies`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Professional_Societies_Fk` (`Professor_Id`);

--
-- 資料表索引 `Professor_Information`
--
ALTER TABLE `Professor_Information`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `Research_Monographs`
--
ALTER TABLE `Research_Monographs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Research_Monographs_Fk` (`Professor_Id`);

--
-- 資料表索引 `Teaching_Materials_And_Awards`
--
ALTER TABLE `Teaching_Materials_And_Awards`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Teaching_Materials_And_Awards_Fk` (`Professor_Id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `Academic_Services`
--
ALTER TABLE `Academic_Services`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1257;

--
-- 使用資料表 AUTO_INCREMENT `Course_Taught`
--
ALTER TABLE `Course_Taught`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1268;

--
-- 使用資料表 AUTO_INCREMENT `Meeting_Proceedings_And_Other`
--
ALTER TABLE `Meeting_Proceedings_And_Other`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98989960;

--
-- 使用資料表 AUTO_INCREMENT `Peer_reviewed_Journals`
--
ALTER TABLE `Peer_reviewed_Journals`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1255549;

--
-- 使用資料表 AUTO_INCREMENT `Professional_History`
--
ALTER TABLE `Professional_History`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7271;

--
-- 使用資料表 AUTO_INCREMENT `Professional_Societies`
--
ALTER TABLE `Professional_Societies`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=888269;

--
-- 使用資料表 AUTO_INCREMENT `Professor_Information`
--
ALTER TABLE `Professor_Information`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- 使用資料表 AUTO_INCREMENT `Research_Monographs`
--
ALTER TABLE `Research_Monographs`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995547;

--
-- 使用資料表 AUTO_INCREMENT `Teaching_Materials_And_Awards`
--
ALTER TABLE `Teaching_Materials_And_Awards`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1274;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `Academic_Services`
--
ALTER TABLE `Academic_Services`
  ADD CONSTRAINT `Academic_Services_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Course_Taught`
--
ALTER TABLE `Course_Taught`
  ADD CONSTRAINT `Course_Taugh_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Meeting_Proceedings_And_Other`
--
ALTER TABLE `Meeting_Proceedings_And_Other`
  ADD CONSTRAINT `Meeting_Proceedings_And_Other_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Peer_reviewed_Journals`
--
ALTER TABLE `Peer_reviewed_Journals`
  ADD CONSTRAINT `Peer_reviewed_Journals_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Professional_History`
--
ALTER TABLE `Professional_History`
  ADD CONSTRAINT `Professional_History_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Professional_Societies`
--
ALTER TABLE `Professional_Societies`
  ADD CONSTRAINT `Professional_Societies_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Research_Monographs`
--
ALTER TABLE `Research_Monographs`
  ADD CONSTRAINT `Research_Monographs_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `Teaching_Materials_And_Awards`
--
ALTER TABLE `Teaching_Materials_And_Awards`
  ADD CONSTRAINT `Teaching_Materials_And_Awards_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
