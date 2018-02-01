-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017 年 12 月 06 日 08:54
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
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Services_Year` date,
  `Service_Type` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Academic_Services`
--

INSERT INTO `Academic_Services` (`Id`, `Services_Year`, `Service_Type`, `Description`, `Professor_Id`) VALUES
('01234', '1993-01-01', '義工', '很帥的義工', 'A112'),
('01235', '1994-01-01', '志工', '很帥的志工', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Course_Taught`
--

CREATE TABLE `Course_Taught` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Program` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Academic_Year` date,
  `Semester` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Course_Title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Credit_Hour` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Course_Taught`
--

INSERT INTO `Course_Taught` (`Id`, `Program`, `Academic_Year`, `Semester`, `Course_Title`, `Credit_Hour`, `Professor_Id`) VALUES
('01234', '123456', '1956-01-01', '下學期', 'JAVA', 'JAVA', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Meeting_Proceedings_And_Other`
--

CREATE TABLE `Meeting_Proceedings_And_Other` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Meeting_Year` date,
  `Meeting_Type` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Meeting_Class` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Meeting_Proceedings_And_Other`
--

INSERT INTO `Meeting_Proceedings_And_Other` (`Id`, `Meeting_Year`, `Meeting_Type`, `Topic`, `Description`, `Meeting_Class`, `Professor_Id`) VALUES
('98989801', '1995-01-01', '資訊', '資訊義工', '義工', 'Cases', 'A112'),
('98989802', '1995-01-01', '資訊', '資訊義工', '義工', 'Professional Meeting Proceedings', 'A112'),
('98989810', '1995-01-01', '資訊', '資訊義工', '義工', 'Textbooks/Chapters', 'A112'),
('98989898', '1995-01-01', '資訊', '資訊義工', '義工', 'Academic Meeting Proceedings', 'A112'),
('98989899', '1995-01-01', 'collaborative projects', '資訊', 'Hospital', 'Professional Development', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Peer_reviewed_Journals`
--

CREATE TABLE `Peer_reviewed_Journals` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Reviewed_Year` date,
  `Topic` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Download_Number` int(11) NOT NULL,
  `Status` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `MOST_Rank` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Portfolio` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Citation_Index` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Browses` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Supported_by` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Peer_reviewed_Journals`
--

INSERT INTO `Peer_reviewed_Journals` (`Id`, `Reviewed_Year`, `Topic`, `Description`, `Download_Number`, `Status`, `MOST_Rank`, `Portfolio`, `Citation_Index`, `Browses`, `Supported_by`, `Professor_Id`) VALUES
('01255534', '2003-01-01', '超棒期刊', '真的很棒', 2000, '完美', '排第一', '資管', '123156', '公開', '接受超多補助', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Professional_History`
--

CREATE TABLE `Professional_History` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Month_Year` date,
  `Title` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Department` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Professional_History_Section` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Company_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professional_History`
--

INSERT INTO `Professional_History` (`Id`, `Month_Year`, `Title`, `Department`, `Professional_History_Section`, `Company_name`, `Professor_Id`) VALUES
('7248', '2005-01-01', '區塊鍊', '中正大學', '業界', '人事部', 'A112');
INSERT INTO `Professional_History` (`Id`, `Month_Year`, `Title`, `Department`, `Professional_History_Section`, `Company_name`, `Professor_Id`) VALUES
('7249', '2015-01-01', '區塊鍊', '中正大學', '業界', '人事部', 'A112');
INSERT INTO `Professional_History` (`Id`, `Month_Year`, `Title`, `Department`, `Professional_History_Section`, `Company_name`, `Professor_Id`) VALUES
('7250', '2016-01-01', '區塊鍊', '中正大學', '業界', '人事部', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Professional_Societies`
--

CREATE TABLE `Professional_Societies` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Professional_Societies_Year` date,
  `Topic` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professional_Societies`
--

INSERT INTO `Professional_Societies` (`Id`, `Professional_Societies_Year`, `Topic`, `Description`, `Professor_Id`) VALUES
('888248', '2015-01-01', '資料庫鍊', '資料庫', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Professor_Information`
--

CREATE TABLE `Professor_Information` (
  `Id` INT(20) AUTO_INCREMENT NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Academic_Title` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Center` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Department` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `College` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `University` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Cell` varchar(100) CHARACTER SET utf8 NOT NULL,
  `E_mail` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Website` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Edu_Degree` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Edu_Year` date NULL,
  `Edu_Major` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Edu_Department` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Edu_School` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Responsibilitie` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Faculty_Sufficiency` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Time_Devoted_Mission` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Faculty_Qualification` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Normal Professional Responsibilities` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `BDS` varchar(100) CHARACTER SET utf8 NOT NULL,
  `AIS` varchar(100) CHARACTER SET utf8 NOT NULL,
  `TLS` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PRJs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `RMs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `A/P_MPs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CRARs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `TBs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Cases` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Other_TMs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Other_IC_Type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Teaching_Interests` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Research_Impacts` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Practice_Impacts` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Teaching__Impacts` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Professor_Information`
--

INSERT INTO `Professor_Information` (`Id`, `Name`, `Academic_Title`, `Center`, `Department`, `College`, `University`, `Phone`, `Cell`, `E_mail`, `Website`, `Edu_Degree`, `Edu_Year`, `Edu_Major`, `Edu_Department`, `Edu_School`, `Responsibilitie`, `Faculty_Sufficiency`, `Time_Devoted_Mission`, `Faculty_Qualification`, `Description`, `Normal Professional Responsibilities`, `BDS`, `AIS`, `TLS`, `PRJs`, `RMs`, `A/P_MPs`, `CRARs`, `TBs`, `Cases`, `Other_TMs`, `Other_IC_Type`, `Teaching_Interests`, `Research_Impacts`, `Practice_Impacts`, `Teaching__Impacts`) VALUES
('A113', '王大明', '教授', '醫學中心', 'Dept. of Information Management', 'College of Management', '中正大學', '05-2720411', '0900000000', 'techer@mis.ccu.edu.tw', 'https://www.ccu.edu.tw/', 'Ph.D.', '2017-01-01', 'Management Information Systems', 'Dept. of Information Management', 'National Chung Cheng University', 'Teaching Responsibilities', 'Participating Faculty', '100%', 'Scholarly Academic', '高雄市燕巢區深水路12號', 'UT, RES, DT, MT, ED, UT', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', 'Data mining', 'Business Intelligence', 'Medical Informatics', 'Medical Informatics');
INSERT INTO `Professor_Information` (`Id`, `Name`, `Academic_Title`, `Center`, `Department`, `College`, `University`, `Phone`, `Cell`, `E_mail`, `Website`, `Edu_Degree`, `Edu_Year`, `Edu_Major`, `Edu_Department`, `Edu_School`, `Responsibilitie`, `Faculty_Sufficiency`, `Time_Devoted_Mission`, `Faculty_Qualification`, `Description`, `Normal Professional Responsibilities`, `BDS`, `AIS`, `TLS`, `PRJs`, `RMs`, `A/P_MPs`, `CRARs`, `TBs`, `Cases`, `Other_TMs`, `Other_IC_Type`, `Teaching_Interests`, `Research_Impacts`, `Practice_Impacts`, `Teaching__Impacts`) VALUES
('A112', '王大明', '教授', '醫學中心', 'Dept. of Finance Management', 'College of Management', '中正大學', '05-2730411', '0900000001', 'techer2@mis.ccu.edu.tw', 'https://www.ccu.edu.tw/', 'Ph.D.', '2017-01-01', 'Management Information Systems', 'Dept. of Information Management', 'National Chung Cheng University', 'Teaching Responsibilities', 'Participating Faculty', '100%', 'Scholarly Academic', '高雄市燕巢區深水路12號', 'UT, RES, DT, MT, ED, UT', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', 'Data mining', 'Business Intelligence', 'Medical Informatics', 'Medical Informatics');


-- --------------------------------------------------------

--
-- 資料表結構 `Research_Monographs`
--

CREATE TABLE `Research_Monographs` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Research_Year` date,
  `Research_Type` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Topic` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Download_Number` int(11) NOT NULL,
  `Status` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Browses` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Supported_by` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Research_Monographs`
--

INSERT INTO `Research_Monographs` (`Id`, `Research_Year`, `Research_Type`, `Topic`, `Description`, `Download_Number`, `Status`, `Browses`, `Supported_by`, `Professor_Id`) VALUES
('0995534', '2013-01-01', '科學', '真的很資管', '厲害', 2000, '棒', '公開', '接受超多補助', 'A112');

-- --------------------------------------------------------

--
-- 資料表結構 `Teaching_Materials_And_Awards`
--

CREATE TABLE `Teaching_Materials_And_Awards` (
  `Id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Teaching_Materials_And_Awards_Year` date,
  `Teaching_Materials_And_Awards_Type` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Contributions_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Professor_Id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `Teaching_Materials_And_Awards`
--

INSERT INTO `Teaching_Materials_And_Awards` (`Id`, `Teaching_Materials_And_Awards_Year`, `Teaching_Materials_And_Awards_Type`, `Title`, `Contributions_name`, `Professor_Id`) VALUES
('1248', '2015-01-01', '資訊', '論文第一名', 'Other Teaching Materials', 'A112'),
('1249', '2015-01-01', '資訊', '論文第一名', 'Honors and Competitive Awards Received', 'A112');

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
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `Academic_Services`
--
ALTER TABLE `Academic_Services`
  ADD CONSTRAINT `Academic_Services_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Course_Taught`
--
ALTER TABLE `Course_Taught`
  ADD CONSTRAINT `Course_Taugh_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Meeting_Proceedings_And_Other`
--
ALTER TABLE `Meeting_Proceedings_And_Other`
  ADD CONSTRAINT `Meeting_Proceedings_And_Other_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Peer_reviewed_Journals`
--
ALTER TABLE `Peer_reviewed_Journals`
  ADD CONSTRAINT `Peer_reviewed_Journals_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Professional_History`
--
ALTER TABLE `Professional_History`
  ADD CONSTRAINT `Professional_History_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Professional_Societies`
--
ALTER TABLE `Professional_Societies`
  ADD CONSTRAINT `Professional_Societies_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Research_Monographs`
--
ALTER TABLE `Research_Monographs`
  ADD CONSTRAINT `Research_Monographs_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);

--
-- 資料表的 Constraints `Teaching_Materials_And_Awards`
--
ALTER TABLE `Teaching_Materials_And_Awards`
  ADD CONSTRAINT `Teaching_Materials_And_Awards_Fk` FOREIGN KEY (`Professor_Id`) REFERENCES `Professor_Information` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--- Professor_Information資料表允許null
ALTER TABLE `Professor_Information` CHANGE `Name` `Name` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `Academic_Title` `Academic_Title` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `Center` `Center` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `Department` `Department` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `College` `College` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `University` `University` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Phone` `Phone` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Cell` `Cell` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `E_mail` `E_mail` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Website` `Website` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Edu_Degree` `Edu_Degree` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Edu_Year` `Edu_Year` DATE NULL DEFAULT NULL, CHANGE `Edu_Major` `Edu_Major` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Edu_Department` `Edu_Department` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Edu_School` `Edu_School` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Responsibilitie` `Responsibilitie` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Faculty_Sufficiency` `Faculty_Sufficiency` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Time_Devoted_Mission` `Time_Devoted_Mission` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Faculty_Qualification` `Faculty_Qualification` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Description` `Description` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Normal Professional Responsibilities` `Normal Professional Responsibilities` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `BDS` `BDS` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `AIS` `AIS` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `TLS` `TLS` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `PRJs` `PRJs` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `RMs` `RMs` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `A/P_MPs` `A/P_MPs` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `CRARs` `CRARs` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `TBs` `TBs` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Cases` `Cases` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Other_TMs` `Other_TMs` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Other_IC_Type` `Other_IC_Type` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Teaching_Interests` `Teaching_Interests` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Research_Impacts` `Research_Impacts` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Practice_Impacts` `Practice_Impacts` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `Teaching__Impacts` `Teaching__Impacts` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
---
