<?php
	include_once("connection.php");

	//個人資料
	$name = $_POST['name'];
	$academic_Title = $_POST['academic_Title'];
	$center = $_POST['center'];
	$department = $_POST['department'];
	$college = $_POST['college'];
	$phone = $_POST['phone'];
	$cell = $_POST['cell'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$edu_Degree = $_POST['edu_Degree'];
	$edu_Year = $_POST['edu_Year'];
	$edu_Major = $_POST['edu_Major'];
	$edu_department = $_POST['edu_department'];
	$edu_School = $_POST['edu_School'];
	$faculty_responsibilities = $_POST['faculty_responsibilities'];
	$faculty_sufficiency = $_POST['faculty_sufficiency'];
	$time_devoted_mission = $_POST['time_devoted_mission'];
	$faculty_qualification = $_POST['faculty_qualification'];
	$faculty_description = $_POST['faculty_description'];
	$teaching_interests = $_POST['teaching_interests'];	

	$sql_Professor_Information = "INSERT INTO Professor_Information(Name, Academic_Title, Center, Department, College, Phone, Cell, E_mail, Website,Edu_Degree, Edu_Year, Edu_Major, Edu_Department, Edu_School, Responsibilitie, Faculty_Sufficiency, Time_Devoted_Mission, Faculty_Qualification, Description,Teaching_Interests) VALUES('$name', '$academic_Title', '$center', '$department', '$college', '$phone', '$cell','$email', '$website', '$edu_Degree', '$edu_Year', '$edu_Major', '$edu_department',  '$edu_School', '$faculty_responsibilities', '$faculty_sufficiency', '$time_devoted_mission', '$faculty_qualification', '$faculty_description', '$teaching_interests')";

	$conn = mysql_query($sql_Professor_Information);
	$id = mysql_fetch_array(mysql_query("SELECT MAX(Id) FROM Professor_Information")); //抓新增後的ID

	//學年度授課
	$program = $_POST['program'];
	$academic_year = $_POST['academic_year'];
	$semester = $_POST['semester'];
	$course_title = $_POST['course_title'];
	$credit_hour = $_POST['credit_hour'];
	
	$sql_Course_Taught = "INSERT INTO Course_Taught(Program, Academic_Year, Semester, Course_Title, Credit_Hour, Professor_Id) VALUES('$program', '$academic_year', '$semester', '$course_title', '$credit_hour', '$id[0]')";

	$conn2 = mysql_query($sql_Course_Taught);
	
	//學術服務
	$service_Year = $_POST['service_Year'];
	$service_type = $_POST['service_type'];
	$service_description = $_POST['service_description'];
	
	$sql_Academic_Services = "INSERT INTO Academic_Services(Services_Year, Service_Type, Description, Professor_Id) VALUES('$service_Year', '$service_type',  '$service_description', '$id[0]')";

	$conn3 = mysql_query($sql_Academic_Services);
	
	//研究產出 
	//Peer-reviewed Journals
	$Peer_reviewed_year = $_POST['Peer_reviewed_year'];
	$Peer_reviewed_topic = $_POST['Peer_reviewed_topic'];
	$Peer_reviewed_description = $_POST['Peer_reviewed_description'];
	$Peer_reviewed_download_number = $_POST['Peer_reviewed_download_number'];
	$Peer_reviewed_status = $_POST['Peer_reviewed_status'];
	$most_rank = $_POST['most_rank'];
	$portfolio = $_POST['portfolio'];
	$citation_index = $_POST['citation_index'];
	$browses = $_POST['browses'];
	$supported_by = $_POST['supported_by'];
	
	$sql_Peer_reviewed_Journals = "INSERT INTO Peer_reviewed_Journals(Reviewed_Year, Topic, Description, Download_Number, Status, MOST_Rank, Portfolio, Citation_Index, Browses, Supported_by, Professor_Id) VALUES('$Peer_reviewed_year', '$Peer_reviewed_topic', '$Peer_reviewed_description',  '$Peer_reviewed_download_number', '$Peer_reviewed_status', '$most_rank', '$portfolio', '$citation_index', '$browses', '$supported_by', '$id[0]')";

	$conn4 = mysql_query($sql_Peer_reviewed_Journals);
	
	//Research Monographs
	$Research_Monographs_year = $_POST['Research_Monographs_year'];
	$Research_Monographs_type = $_POST['Research_Monographs_type'];
	$Research_Monographs_topic = $_POST['Research_Monographs_topic'];
	$Research_Monographs_description = $_POST['Research_Monographs_description'];
	$Research_Monographs_download_number = $_POST['Research_Monographs_download_number'];
	$Research_Monographs_status = $_POST['Research_Monographs_status'];
	$Research_Monographs_browses = $_POST['Research_Monographs_browses'];
	$Research_Monographs_supported_by = $_POST['Research_Monographs_supported_by'];
	
	$sql_Research_Monographs = "INSERT INTO Research_Monographs (Research_Year, Research_Type, Topic, Description, Download_Number, Status, Browses, Supported_by, Professor_Id) VALUES('$Research_Monographs_year', '$Research_Monographs_type', '$Research_Monographs_topic', '$Research_Monographs_description',  '$Research_Monographs_download_number', '$Research_Monographs_status', '$Research_Monographs_browses', '$Research_Monographs_supported_by', '$id[0]')";

	$conn5 = mysql_query($sql_Research_Monographs);
	
	//Meeting_Proceedings_And_Other
	//Academic Meeting Proceedings
	$Meeting_Proceedings_And_Other_year = $_POST['Meeting_Proceedings_And_Other_year'];
	$Meeting_Proceedings_And_Other_type = $_POST['Meeting_Proceedings_And_Other_type'];
	$Meeting_Proceedings_And_Other_topic = $_POST['Meeting_Proceedings_And_Other_topic'];
	$Meeting_Proceedings_And_Other_description = $_POST['Meeting_Proceedings_And_Other_description'];
	
	
	$sql_Meeting_Proceedings_And_Other = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id) VALUES('$Meeting_Proceedings_And_Other_year', '$Meeting_Proceedings_And_Other_type', '$Meeting_Proceedings_And_Other_topic',  '$Meeting_Proceedings_And_Other_description', '$id[0]')";

	$conn6 = mysql_query($sql_Meeting_Proceedings_And_Other);
	
	//Meeting_Proceedings_And_Other
	//Professional Meeting Proceedings
	$Professional_Meeting_Proceedings_year = $_POST['Professional_Meeting_Proceedings_year'];
	$Professional_Meeting_Proceedings_type = $_POST['Professional_Meeting_Proceedings_type'];
	$Professional_Meeting_Proceedings_topic = $_POST['Professional_Meeting_Proceedings_topic'];
	$Professional_Meeting_Proceedings_description = $_POST['Professional_Meeting_Proceedings_description'];
	
	$sql_Professional_Meeting_Proceedings = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id) VALUES('$Professional_Meeting_Proceedings_year', '$Professional_Meeting_Proceedings_type', '$Professional_Meeting_Proceedings_topic',  '$Professional_Meeting_Proceedings_description' ,'$id[0]')";

	$conn7 = mysql_query($sql_Professional_Meeting_Proceedings);
	
	//Meeting_Proceedings_And_Other
	//Textbooks/Chapters
	$Textbooks_Chapters_year = $_POST['Textbooks_Chapters_year'];
	$Textbooks_Chapters_type = $_POST['Textbooks_Chapters_type'];
	$Textbooks_Chapters_topic = $_POST['Textbooks_Chapters_topic'];
	$Textbooks_Chapters_description = $_POST['Textbooks_Chapters_description'];
	
	$sql_Textbooks_Chapters = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id) VALUES('$Textbooks_Chapters_year', '$Textbooks_Chapters_type', '$Textbooks_Chapters_topic', '$Textbooks_Chapters_description', '$id[0]')";

	$conn8 = mysql_query($sql_Textbooks_Chapters);
	
	//Meeting_Proceedings_And_Other
	//Cases
	$Cases_year = $_POST['Cases_year'];
	$Cases_type = $_POST['Cases_type'];
	$Cases_topic = $_POST['Cases_topic'];
	$Cases_description = $_POST['Cases_description'];
	
	$sql_Cases = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id) VALUES('$Cases_year', '$Cases_type',  '$Cases_topic', '$Cases_description', '$id[0]')";

	$conn9 = mysql_query($sql_Cases);
	
	//Other Teaching Materials
	$Other_Teaching_Materials_year = $_POST['Other_Teaching_Materials_year'];
	$Other_Teaching_Materials_type = $_POST['Other_Teaching_Materials_type'];
	$Other_Teaching_Materials_title = $_POST['Other_Teaching_Materials_title'];
	
	$sql_Other_Teaching_Materials = "INSERT INTO Teaching_Materials_And_Awards (Teaching_Materials_And_Awards_Year, Teaching_Materials_And_Awards_Type, Title, Professor_Id) VALUES('$Other_Teaching_Materials_year', '$Other_Teaching_Materials_type', '$Other_Teaching_Materials_title', '$id[0]')";

	$conn9 = mysql_query($sql_Other_Teaching_Materials);
	
	//Honors and Competitive Awards Received
	$Honors_Competitive_Awards_Received_year = $_POST['Honors_Competitive_Awards_Received_year'];
	$Honors_Competitive_Awards_Received_type = $_POST['Honors_Competitive_Awards_Received_type'];
	$Honors_Competitive_Awards_Received_title = $_POST['Honors_Competitive_Awards_Received_title'];
	
	$sql_Honors_Competitive_Awards_Received = "INSERT INTO Teaching_Materials_And_Awards (Teaching_Materials_And_Awards_Year, Teaching_Materials_And_Awards_Type, Title, Professor_Id) VALUES('$Honors_Competitive_Awards_Received_year', '$Honors_Competitive_Awards_Received_type',  '$Honors_Competitive_Awards_Received_title', '$id[0]')";

	$conn10 = mysql_query($sql_Honors_Competitive_Awards_Received);
	
	//業界經歷
	$Professional_History_month_year = $_POST['Professional_History_month_year'];
	$Professional_History_title = $_POST['Professional_History_title'];
	$Professional_History_department = $_POST['Professional_History_department'];
	$Professional_History_section = $_POST['Professional_History_section'];
	$Professional_History_company = $_POST['Professional_History_company'];
	
	$sql_Professional_History = "INSERT INTO Professional_History (Month_Year ,Title, Department, Professional_History_Section, Company_name, Professor_Id) VALUES('$Professional_History_month_year', '$Professional_History_title', '$Professional_History_department', '$Professional_History_section', '$Professional_History_company', '$id[0]')";

	$conn11 = mysql_query($sql_Professional_History);
	
	//業界發展
	$Professional_Development_month_year = $_POST['Professional_Development_month_year'];
	$Professional_Development_type = $_POST['Professional_Development_type'];
	$Professional_Development_topic = $_POST['Professional_Development_topic'];
	$Professional_Development_description = $_POST['Professional_Development_description'];
	
	$sql_Professional_Development = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id) VALUES('$Professional_Development_month_year', '$Professional_Development_type', '$Professional_Development_topic',  '$Professional_Development_description', '$id[0]')";

	$conn12 = mysql_query($sql_Professional_Development);
	
	//業界團體
	$Professional_Societies_year = $_POST['Professional_Societies_year'];
	$Professional_Societies_topic = $_POST['Professional_Societies_topic'];
	$Professional_Societies_description = $_POST['Professional_Societies_description'];
	
	$sql_Professional_Societies = "INSERT INTO Professional_Societies (Professional_Societies_Year, Topic, Description, Professor_Id) VALUES('$Professional_Societies_year', '$Professional_Societies_topic', '$Professional_Societies_description', '$id[0]')";

	$conn13 = mysql_query($sql_Professional_Societies);
	
	//影響力描述
	$Research_Impacts_description = $_POST['Research_Impacts_description'];
	$Practice_Impacts_description = $_POST['Practice_Impacts_description'];
	$Teaching_Impacts_description = $_POST['Teaching_Impacts_description'];
	
	$sql_Professor_Information_Impacts = "INSERT INTO Professor_Information (Research_Impacts, Practice_Impacts, Teaching_Impacts, Professor_Id) VALUES('$Research_Impacts_description', = '$Practice_Impacts_description', = '$Teaching_Impacts_description', '$id[0]')";

	$conn14 = mysql_query($sql_Professor_Information_Impacts);

	//警告視窗
	Function my_msg($msg, $redirect){
		echo "<script language=\"javascript\">";
		echo "window.alert('".$msg."')"; 
		echo "</script>"; 
		echo "<script language=\"javascript\">"; 
		echo "location.href='".$redirect."'"; 
		echo "</script>";
		return; 
	}

	if($conn && $conn2 && $conn3 && $conn4 && $conn5 && $conn6 && $conn7 && $conn8 && $conn9 && $conn10 && $conn11 && $conn12 && $conn13 && $conn14){
		my_msg('上傳成功', 'createTea.php');
	}else{
		my_msg('上傳失敗', 'createTea.php');
	}
?>