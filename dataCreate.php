<?php
	include("connection.php");
	$Old_id = mysqli_fetch_array(mysqli_query($con,"SELECT MAX(Id) FROM Professor_Information")); //舊ID

	//個人資料
	$teacherID = $_SESSION['teacherID'];

	$name = $_POST['name'];
	$academic_Title = $_POST['academic_Title'];
	$administration_Title = $_POST['administration_Title'];
	$center = $_POST['center'];
	$department = $_POST['department'];
	$college = $_POST['college'];
	$university = $_POST['university'];
	$phone = $_POST['phone'];
	$cell = $_POST['cell'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$edu_Degree = $_POST['edu_Degree'];
	$edu_Year = $_POST['edu_Year'];
	//three new colum
	$edu_Major = $_POST['edu_Major'];
	$edu_Department = $_POST['edu_Department'];
	$edu_School = $_POST['edu_School'];

	$faculty_responsibilities = $_POST['faculty_responsibilities'];
	$faculty_sufficiency = $_POST['faculty_sufficiency'];
	$time_devoted_mission = $_POST['time_devoted_mission'];
	$faculty_qualification = $_POST['faculty_qualification'];
	$faculty_description = $_POST['faculty_description'];
	$teaching_interests = $_POST['teaching_interests'];	
	
	//系統改的
	$normal_professional_responsibilities1 = $_POST['normal_professional_responsibilities1'];
	$normal_professional_responsibilities2 = $_POST['normal_professional_responsibilities2'];
	$normal_professional_responsibilities3 = $_POST['normal_professional_responsibilities3'];
	$normal_professional_responsibilities4 = $_POST['normal_professional_responsibilities4'];
	$normal_professional_responsibilities5 = $_POST['normal_professional_responsibilities5'];
	$normal_professional_responsibilities6 = $_POST['normal_professional_responsibilities6'];


	$portfolio_of_intellectual_contributions = $_POST['portfolio_of_intellectual_contributions'];//3個
	$types_of_intellectual_contributions = $_POST['types_of_intellectual_contributions'];//4個


	$output=implode(",",$faculty_responsibilities);  //陣列轉字串
	//$faculty_responsibilities = print_r($faculty_responsibilities); 

	//大部分的個人資料除了$sql_Professor_Information_Impacts
	$sql_Professor_Information = "INSERT INTO Professor_Information(Name,Academic_Title,Administration_Title,Center,Department,College,University,Phone,Cell,E_mail,Website,Edu_Degree,Edu_Year,Edu_Major,Edu_Department,Edu_School,Faculty_Sufficiency,Time_Devoted_Mission,Faculty_Qualification,Description,Teaching_Interests,Normal_Professional_Responsibilities1,Normal_Professional_Responsibilities2,Normal_Professional_Responsibilities3,Normal_Professional_Responsibilities4,Normal_Professional_Responsibilities5,Normal_Professional_Responsibilities6,Responsibilitie) VALUES('$name','$academic_Title','$administration_Title','$center','$department','$college','$university','$phone','$cell','$email','$website','$edu_Degree','$edu_Year','$edu_Major','$edu_Department','$edu_School','$faculty_sufficiency','$time_devoted_mission','$faculty_qualification','$faculty_description','$teaching_interests','$normal_professional_responsibilities1','$normal_professional_responsibilities2','$normal_professional_responsibilities3','$normal_professional_responsibilities4','$normal_professional_responsibilities5','$normal_professional_responsibilities6','$output')";
	$conn = mysqli_query($con, $sql_Professor_Information);

	$id = mysqli_fetch_array(mysqli_query($con,("SELECT MAX(Id) FROM Professor_Information"))); //抓新增後的ID
	
	//$sql_Professor_Information_Impacts update的形式
	$sql_Professor_Information_Impacts = "UPDATE Professor_Information SET Research_Impacts = '$Research_Impacts_description',Practice_Impacts = '$Practice_Impacts_description',Teaching_Impacts = '$Teaching_Impacts_description' WHERE Id = '$id[0]'";
	mysqli_query($con, $sql_Professor_Information_Impacts);
	
	//學年度授課
	$program = $_POST['program'];
	$academic_year = $_POST['academic_year'];
	$semester = $_POST['semester'];
	$course_title = $_POST['course_title'];
	$credit_hour = $_POST['credit_hour'];
	
	//$sql_Course_Taught = "INSERT INTO Course_Taught(Program, Academic_Year, Semester, Course_Title, Credit_Hour, Professor_Id) VALUES('1', '2', '3', '4', '5','166')";
	// $sql_Course_Taught = "INSERT INTO Course_Taught(Program, Academic_Year, Semester, Course_Title, Credit_Hour, Professor_Id) VALUES('$program[0]', '$academic_year[0]', '$semester[0]', '$course_title[0]', '$credit_hour[0]','$id[0]')";
	// $conn2 = mysqli_query($con,$sql_Course_Taught);
	for($i=0; $i<count($program); $i++){ //把每一列的資料取出來
		$sql_Course_Taught = "INSERT INTO Course_Taught(Program, Academic_Year, Semester, Course_Title, Credit_Hour, Professor_Id) VALUES('$program[$i]', '$academic_year[$i]', '$semester[$i]', '$course_title[$i]', '$credit_hour[$i]','$id[0]')";
		$conn2 = mysqli_query($con,$sql_Course_Taught);
	}	
	
	//學術服務
	$service_Year = $_POST['service_Year'];
	$service_type = $_POST['service_type'];
	$service_description = $_POST['service_description'];
	

	for($i=0; $i<count($service_type); $i++){ //把每一列的資料取出來
		$sql_Academic_Services = "INSERT INTO Academic_Services(Services_Year, Service_Type, Description, Professor_Id) VALUES('$service_Year[$i]', '$service_type[$i]',  '$service_description[$i]', '$id[0]')";
		$conn3 = mysqli_query($con,$sql_Academic_Services);
	}	
	
	
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
	for($i=0; $i<count($most_rank); $i++){ //把每一列的資料取出來
		$sql_Peer_reviewed_Journals = "INSERT INTO Peer_reviewed_Journals(Reviewed_Year, Topic, Description, Download_Number, Status, MOST_Rank, Portfolio, Citation_Index, Browses, Supported_by, Professor_Id) VALUES('$Peer_reviewed_year[$i]', '$Peer_reviewed_topic[$i]', '$Peer_reviewed_description[$i]',  '$Peer_reviewed_download_number[$i]', '$Peer_reviewed_status[$i]', '$most_rank[$i]', '$portfolio[$i]', '$citation_index[$i]', '$browses[$i]', '$supported_by[$i]', '$id[0]')";
		$conn4 = mysqli_query($con,$sql_Peer_reviewed_Journals);
	}	
	
	
	
	//Research Monographs
	$Research_Monographs_year = $_POST['Research_Monographs_year'];
	$Research_Monographs_type = $_POST['Research_Monographs_type'];
	$Research_Monographs_topic = $_POST['Research_Monographs_topic'];
	$Research_Monographs_description = $_POST['Research_Monographs_description'];
	$Research_Monographs_download_number = $_POST['Research_Monographs_download_number'];
	$Research_Monographs_status = $_POST['Research_Monographs_status'];
	$Research_Monographs_browses = $_POST['Research_Monographs_browses'];
	$Research_Monographs_supported_by = $_POST['Research_Monographs_supported_by'];
	
	for($i=0; $i<count($Research_Monographs_type); $i++){ //把每一列的資料取出來
		$sql_Research_Monographs = "INSERT INTO Research_Monographs(Research_Year, Research_Type, Topic, Description, Download_Number, Status, Browses, Supported_by, Professor_Id) VALUES('$Research_Monographs_year[$i]', '$Research_Monographs_type[$i]', '$Research_Monographs_topic[$i]', '$Research_Monographs_description[$i]',  '$Research_Monographs_download_number[$i]', '$Research_Monographs_status[$i]', '$Research_Monographs_browses[$i]', '$Research_Monographs_supported_by[$i]', '$id[0]')";
		$conn5 = mysqli_query($con,$sql_Research_Monographs);
	}
	
	
	//Meeting_Proceedings_And_Other
	//Academic Meeting Proceedings
	$Meeting_Proceedings_And_Other_year = $_POST['Meeting_Proceedings_And_Other_year'];
	$Meeting_Proceedings_And_Other_type = $_POST['Meeting_Proceedings_And_Other_type'];
	$Meeting_Proceedings_And_Other_topic = $_POST['Meeting_Proceedings_And_Other_topic'];
	$Meeting_Proceedings_And_Other_description = $_POST['Meeting_Proceedings_And_Other_description'];


	for($i=0; $i<count($Meeting_Proceedings_And_Other_type); $i++){ //把每一列的資料取出來	
		$sql_Meeting_Proceedings_And_Other = "INSERT INTO Meeting_Proceedings_And_Other(Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Meeting_Proceedings_And_Other_year[$i]', '$Meeting_Proceedings_And_Other_type[$i]', '$Meeting_Proceedings_And_Other_topic[$i]',  '$Meeting_Proceedings_And_Other_description[$i]', '$id[0]','Academic Meeting Proceedings')";
		$conn6 = mysqli_query($con,$sql_Meeting_Proceedings_And_Other);
	}	
	
	//Meeting_Proceedings_And_Other
	//Professional Meeting Proceedings
	$Professional_Meeting_Proceedings_year = $_POST['Professional_Meeting_Proceedings_year'];
	$Professional_Meeting_Proceedings_type = $_POST['Professional_Meeting_Proceedings_type'];
	$Professional_Meeting_Proceedings_topic = $_POST['Professional_Meeting_Proceedings_topic'];
	$Professional_Meeting_Proceedings_description = $_POST['Professional_Meeting_Proceedings_description'];
	
	for($i=0; $i<count($Professional_Meeting_Proceedings_type); $i++){ //把每一列的資料取出來
		$sql_Professional_Meeting_Proceedings = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Professional_Meeting_Proceedings_year[$i]', '$Professional_Meeting_Proceedings_type[$i]', '$Professional_Meeting_Proceedings_topic[$i]',  '$Professional_Meeting_Proceedings_description[$i]' ,'$id[0]','Professional Meeting Proceedings')";
		$conn7 = mysqli_query($con,$sql_Professional_Meeting_Proceedings);	
	}	
	//Meeting_Proceedings_And_Other
	//Textbooks/Chapters
	$Textbooks_Chapters_year = $_POST['Textbooks_Chapters_year'];
	$Textbooks_Chapters_type = $_POST['Textbooks_Chapters_type'];
	$Textbooks_Chapters_topic = $_POST['Textbooks_Chapters_topic'];
	$Textbooks_Chapters_description = $_POST['Textbooks_Chapters_description'];
	
	for($i=0; $i<count($Textbooks_Chapters_type); $i++){ //把每一列的資料取出來
		$sql_Textbooks_Chapters = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Textbooks_Chapters_year[$i]', '$Textbooks_Chapters_type[$i]', '$Textbooks_Chapters_topic[$i]', '$Textbooks_Chapters_description[$i]', '$id[0]','Textbooks/Chapters')";
		$conn8 = mysqli_query($con,$sql_Textbooks_Chapters);	
	}	
	//Meeting_Proceedings_And_Other
	//Cases
	$Cases_year = $_POST['Cases_year'];
	$Cases_type = $_POST['Cases_type'];
	$Cases_topic = $_POST['Cases_topic'];
	$Cases_description = $_POST['Cases_description'];
	
	for($i=0; $i<count($Cases_type); $i++){ //把每一列的資料取出來
		$sql_Cases = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Cases_year[$i]', '$Cases_type[$i]',  '$Cases_topic[$i]', '$Cases_description[$i]', '$id[0]','Cases')";
		$conn9 = mysqli_query($con,$sql_Cases);
	}	
	//Other Teaching Materials
	$Other_Teaching_Materials_year = $_POST['Other_Teaching_Materials_year'];
	$Other_Teaching_Materials_type = $_POST['Other_Teaching_Materials_type'];
	$Other_Teaching_Materials_title = $_POST['Other_Teaching_Materials_title'];
	
	for($i=0; $i<count($Other_Teaching_Materials_type); $i++){ //把每一列的資料取出來
		$sql_Other_Teaching_Materials = "INSERT INTO Teaching_Materials_And_Awards (Teaching_Materials_And_Awards_Year, Teaching_Materials_And_Awards_Type, Title, Professor_Id,Contributions_name) VALUES('$Other_Teaching_Materials_year[$i]', '$Other_Teaching_Materials_type[$i]', '$Other_Teaching_Materials_title[$i]', '$id[0]','Other_Teaching_Materials')";
		$conn10 = mysqli_query($con,$sql_Other_Teaching_Materials);
	}	
	//Honors and Competitive Awards Received
	$Honors_Competitive_Awards_Received_year = $_POST['Honors_Competitive_Awards_Received_year'];
	$Honors_Competitive_Awards_Received_type = $_POST['Honors_Competitive_Awards_Received_type'];
	$Honors_Competitive_Awards_Received_title = $_POST['Honors_Competitive_Awards_Received_title'];
	
	for($i=0; $i<count($Honors_Competitive_Awards_Received_type); $i++){ //把每一列的資料取出來
		$sql_Honors_Competitive_Awards_Received = "INSERT INTO Teaching_Materials_And_Awards (Teaching_Materials_And_Awards_Year, Teaching_Materials_And_Awards_Type, Title, Professor_Id,Contributions_name) VALUES('$Honors_Competitive_Awards_Received_year[$i]', '$Honors_Competitive_Awards_Received_type[$i]',  '$Honors_Competitive_Awards_Received_title[$i]', '$id[0]','Honors_Competitive_Awards_Received')";
		$conn11 = mysqli_query($con,$sql_Honors_Competitive_Awards_Received);		
	}	
	//業界經歷
	$Professional_History_month_year = $_POST['Professional_History_month_year'];
	$Professional_History_title = $_POST['Professional_History_title'];
	$Professional_History_department = $_POST['Professional_History_department'];
	$Professional_History_section = $_POST['Professional_History_section'];
	$Professional_History_company = $_POST['Professional_History_company'];
	
	for($i=0; $i<count($Professional_History_title); $i++){ //把每一列的資料取出來
		$sql_Professional_History = "INSERT INTO Professional_History (Month_Year ,Title, Department, Professional_History_Section, Company_name, Professor_Id) VALUES('$Professional_History_month_year[$i]', '$Professional_History_title[$i]', '$Professional_History_department[$i]', '$Professional_History_section[$i]', '$Professional_History_company[$i]', '$id[0]')";
		$conn12 = mysqli_query($con,$sql_Professional_History);	
	}	
	//業界發展
	$Professional_Development_month_year = $_POST['Professional_Development_month_year'];
	$Professional_Development_type = $_POST['Professional_Development_type'];
	$Professional_Development_topic = $_POST['Professional_Development_topic'];
	$Professional_Development_description = $_POST['Professional_Development_description'];

	for($i=0; $i<count($Professional_Development_type); $i++){ //把每一列的資料取出來	
		$sql_Professional_Development = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Professional_Development_month_year[$i]', '$Professional_Development_type[$i]', '$Professional_Development_topic[$i]',  '$Professional_Development_description[$i]', '$id[0]','Professional Development')";
		$conn13 = mysqli_query($con,$sql_Professional_Development);
	}	
	//業界團體
	$Professional_Societies_year = $_POST['Professional_Societies_year'];
	$Professional_Societies_topic = $_POST['Professional_Societies_topic'];
	$Professional_Societies_description = $_POST['Professional_Societies_description'];
	
	for($i=0; $i<count($Professional_Societies_topic); $i++){ //把每一列的資料取出來
		$sql_Professional_Societies = "INSERT INTO Professional_Societies (Professional_Societies_Year, Topic, Description, Professor_Id) VALUES('$Professional_Societies_year[$i]', '$Professional_Societies_topic[$i]', '$Professional_Societies_description[$i]', '$id[0]')";
		$conn14 = mysqli_query($con,$sql_Professional_Societies);
	}	

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

	if($Old_id[0] <> $id[0]){ // <>不等於
		if($conn && $conn2 && $conn3 && $conn4 && $conn5 && $conn6 && $conn7 && $conn8 && $conn9 && $conn10 && $conn11 && $conn12 && $conn13 && $conn14){
			my_msg('上傳成功', 'createTea.php');
		}else{
			my_msg('上傳失敗', 'createTea.php');
			
			$delete = "DELETE FROM `Academic_Services` WHERE `Academic_Services`.`Professor_Id` = '$id[0]'";
			$delete2 = "DELETE FROM `Course_Taught` WHERE `Course_Taught`.`Professor_Id` = '$id[0]'";
			$delete3 = "DELETE FROM `Meeting_Proceedings_And_Other	` WHERE `Meeting_Proceedings_And_Other`.`Professor_Id` = '$id[0]'";
			$delete4 = "DELETE FROM `Peer_reviewed_Journals` WHERE `Peer_reviewed_Journals`.`Professor_Id` = '$id[0]'";
			$delete5 = "DELETE FROM `Professional_History` WHERE `Professional_History`.`Professor_Id` = '$id[0]'";
			$delete6 = "DELETE FROM `Professional_Societies` WHERE `Professional_Societies`.`Professor_Id` = '$id[0]'";
			$delete7 = "DELETE FROM `Research_Monographs` WHERE `Research_Monographs`.`Professor_Id` = '$id[0]'";
			$delete8 = "DELETE FROM `Teaching_Materials_And_Awards` WHERE `Teaching_Materials_And_Awards`.`Professor_Id` = '$id[0]'";
			$delete9 = "DELETE FROM `Professor_Information` WHERE `Professor_Information`.`Id` = '$id[0]'";
	
			mysqli_query($con,$delete);
			mysqli_query($con,$delete2);
			mysqli_query($con,$delete3);
			mysqli_query($con,$delete4);
			mysqli_query($con,$delete5);
			mysqli_query($con,$delete6);
			mysqli_query($con,$delete7);
			mysqli_query($con,$delete8);
			mysqli_query($con,$delete9);
		}
	}else{
		my_msg('上傳失敗', 'createTea.php');
	}
?>