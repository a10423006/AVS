-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 02 月 28 日 06:55
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
  `Services_Year` date DEFAULT NULL,
  `Service_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Academic_Services`
--

INSERT INTO `Academic_Services` (`Id`, `Services_Year`, `Service_Type`, `Description`, `Professor_Id`) VALUES
(1234, '1993-01-01', '義工', '很帥的義工', 112),
(1235, '1994-01-01', '志工', '很帥的志工', 112),
(1253, '2017-01-01', '', '                                                            ', 153),
(1254, '2017-01-01', '', '                                                    ', 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Course_Taught`
--

CREATE TABLE `Course_Taught` (
  `Id` int(20) NOT NULL,
  `Program` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Academic_Year` date DEFAULT NULL,
  `Semester` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Course_Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Credit_Hour` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Course_Taught`
--

INSERT INTO `Course_Taught` (`Id`, `Program`, `Academic_Year`, `Semester`, `Course_Title`, `Credit_Hour`, `Professor_Id`) VALUES
(1234, '123456', '1956-01-01', '下學期', 'JAVA', 'JAVA', 112),
(1260, 'C', '2007-01-01', '', '', '', 153),
(1261, 'Java', '2007-01-01', '', '', '', 153),
(1264, ' R', '2007-01-01', '', '', '', 153),
(1265, ' R', '2017-01-01', '', '', '', 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Meeting_Proceedings_And_Other`
--

CREATE TABLE `Meeting_Proceedings_And_Other` (
  `Id` int(20) NOT NULL,
  `Meeting_Year` date DEFAULT NULL,
  `Meeting_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Meeting_Class` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Meeting_Proceedings_And_Other`
--

INSERT INTO `Meeting_Proceedings_And_Other` (`Id`, `Meeting_Year`, `Meeting_Type`, `Topic`, `Description`, `Meeting_Class`, `Professor_Id`) VALUES
(98989801, '1995-01-01', '資訊', '資訊義工', '義工', 'Cases', 112),
(98989802, '1995-01-01', '資訊', '資訊義工', '義工', 'Professional Meeting Proceedings', 112),
(98989810, '1995-01-01', '資訊', '資訊義工', '義工', 'Textbooks/Chapters', 112),
(98989898, '1995-01-01', '資訊', '資訊義工', '義工', 'Academic Meeting Proceedings', 112),
(98989899, '1995-01-01', 'collaborative projects', '資訊', 'Hospital', 'Professional Development', 112),
(98989945, '2017-01-01', '', '', '                                                            ', NULL, 153),
(98989946, '2017-01-01', '', '', '                                                            ', NULL, 153),
(98989947, '2017-01-01', '', '', '                                                            ', NULL, 153),
(98989948, '2017-01-01', '', '', '                                                            ', NULL, 153),
(98989949, '2017-01-01', '', '', '                                                            ', NULL, 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Peer_reviewed_Journals`
--

CREATE TABLE `Peer_reviewed_Journals` (
  `Id` int(20) NOT NULL,
  `Reviewed_Year` date DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Download_Number` varchar(11) DEFAULT NULL,
  `Status` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `MOST_Rank` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Portfolio` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Citation_Index` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Browses` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Supported_by` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Peer_reviewed_Journals`
--

INSERT INTO `Peer_reviewed_Journals` (`Id`, `Reviewed_Year`, `Topic`, `Description`, `Download_Number`, `Status`, `MOST_Rank`, `Portfolio`, `Citation_Index`, `Browses`, `Supported_by`, `Professor_Id`) VALUES
(1255534, '2003-01-01', '超棒期刊', '真的很棒', '2000', '完美', '排第一', '資管', '123156', '公開', '接受超多補助', 112),
(1255546, '2017-01-01', '', '                                                            ', '', '', '', '', '', '', '', 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Professional_History`
--

CREATE TABLE `Professional_History` (
  `Id` int(20) NOT NULL,
  `Month_Year` date DEFAULT NULL,
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
(7248, '2005-01-01', '區塊鍊', '中正大學', '業界', '人事部', 112),
(7249, '2015-01-01', '區塊鍊', '中正大學', '業界', '人事部', 112),
(7250, '2016-01-01', '區塊鍊', '中正大學', '業界', '人事部', 112),
(7268, '2017-01-01', '', '', '', '', 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Professional_Societies`
--

CREATE TABLE `Professional_Societies` (
  `Id` int(20) NOT NULL,
  `Professional_Societies_Year` date DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professional_Societies`
--

INSERT INTO `Professional_Societies` (`Id`, `Professional_Societies_Year`, `Topic`, `Description`, `Professor_Id`) VALUES
(888248, '2015-01-01', '資料庫鍊', '資料庫', 112),
(888266, '2017-01-01', '', '', 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Professor_Information`
--

CREATE TABLE `Professor_Information` (
  `Id` int(20) NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Academic_Title` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Center` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Department` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `College` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `University` varchar(1000) CHARACTER SET utf8 DEFAULT '中正大學',
  `Phone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Cell` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `E_mail` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Website` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_Degree` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_Year` date DEFAULT NULL,
  `Edu_Major` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_Department` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Edu_School` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Responsibilitie` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Faculty_Sufficiency` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Time_Devoted_Mission` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Faculty_Qualification` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Normal Professional Responsibilities` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `BDS` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `AIS` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `TLS` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PRJs` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RMs` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `A/P_MPs` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CRARs` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `TBs` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Cases` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Other_TMs` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Other_IC_Type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Teaching_Interests` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Research_Impacts` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Practice_Impacts` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Teaching_Impacts` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professor_Information`
--

INSERT INTO `Professor_Information` (`Id`, `Name`, `Academic_Title`, `Center`, `Department`, `College`, `University`, `Phone`, `Cell`, `E_mail`, `Website`, `Edu_Degree`, `Edu_Year`, `Edu_Major`, `Edu_Department`, `Edu_School`, `Responsibilitie`, `Faculty_Sufficiency`, `Time_Devoted_Mission`, `Faculty_Qualification`, `Description`, `Normal Professional Responsibilities`, `BDS`, `AIS`, `TLS`, `PRJs`, `RMs`, `A/P_MPs`, `CRARs`, `TBs`, `Cases`, `Other_TMs`, `Other_IC_Type`, `Teaching_Interests`, `Research_Impacts`, `Practice_Impacts`, `Teaching_Impacts`) VALUES
(112, '王大明', '教授', '醫學中心', 'Dept. of Finance Management', 'College of Management', '中正大學', '05-2730411', '0900000001', 'techer2@mis.ccu.edu.tw', 'https://www.ccu.edu.tw/', 'Ph.D.', '2017-01-01', 'Management Information Systems', 'Dept. of Information Management', 'National Chung Cheng University', 'Teaching Responsibilities', 'Participating Faculty', '100%', 'Scholarly Academic', '高雄市燕巢區深水路12號', 'UT, RES, DT, MT, ED, UT', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', 'Data mining', '', '', ''),
(153, '王小明', '', '', '', '', '中正大學', '', '', '', '', '', '2017-01-01', '', '', '', '                                                        ', '', '', '', '                                                        ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '                                                                                                    ', '                                                        ', '                                                        ', '                                                        ');

-- --------------------------------------------------------

--
-- 資料表結構 `Research_Monographs`
--

CREATE TABLE `Research_Monographs` (
  `Id` int(20) NOT NULL,
  `Research_Year` date DEFAULT NULL,
  `Research_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
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
(995534, '2013-01-01', '科學', '真的很資管', '厲害', '2000', '棒', '公開', '接受超多補助', 112),
(995544, '2017-01-01', '', '', '                                                            ', '', '', '', '', 153);

-- --------------------------------------------------------

--
-- 資料表結構 `Teaching_Materials_And_Awards`
--

CREATE TABLE `Teaching_Materials_And_Awards` (
  `Id` int(20) NOT NULL,
  `Teaching_Materials_And_Awards_Year` date DEFAULT NULL,
  `Teaching_Materials_And_Awards_Type` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Contributions_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Professor_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Teaching_Materials_And_Awards`
--

INSERT INTO `Teaching_Materials_And_Awards` (`Id`, `Teaching_Materials_And_Awards_Year`, `Teaching_Materials_And_Awards_Type`, `Title`, `Contributions_name`, `Professor_Id`) VALUES
(1248, '2015-01-01', '資訊', '論文第一名', 'Other Teaching Materials', 112),
(1249, '2015-01-01', '資訊', '論文第一名', 'Honors and Competitive Awards Received', 112),
(1268, '2017-01-01', '', '                                                            ', NULL, 153),
(1269, '2017-01-01', '', '                                                            ', NULL, 153);

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
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1255;

--
-- 使用資料表 AUTO_INCREMENT `Course_Taught`
--
ALTER TABLE `Course_Taught`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1266;

--
-- 使用資料表 AUTO_INCREMENT `Meeting_Proceedings_And_Other`
--
ALTER TABLE `Meeting_Proceedings_And_Other`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98989950;

--
-- 使用資料表 AUTO_INCREMENT `Peer_reviewed_Journals`
--
ALTER TABLE `Peer_reviewed_Journals`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1255547;

--
-- 使用資料表 AUTO_INCREMENT `Professional_History`
--
ALTER TABLE `Professional_History`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7269;

--
-- 使用資料表 AUTO_INCREMENT `Professional_Societies`
--
ALTER TABLE `Professional_Societies`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=888267;

--
-- 使用資料表 AUTO_INCREMENT `Professor_Information`
--
ALTER TABLE `Professor_Information`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- 使用資料表 AUTO_INCREMENT `Research_Monographs`
--
ALTER TABLE `Research_Monographs`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995545;

--
-- 使用資料表 AUTO_INCREMENT `Teaching_Materials_And_Awards`
--
ALTER TABLE `Teaching_Materials_And_Awards`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1270;

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