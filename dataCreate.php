<?php
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
	$edu_department = $_POST['edu_department'];
	$faculty_responsibilities = $_POST['faculty_responsibilities'];
	$faculty_sufficiency = $_POST['faculty_sufficiency'];
	$time_devoted_mission = $_POST['time_devoted_mission'];
	$faculty_qualification = $_POST['faculty_qualification'];
	$faculty_description = $_POST['faculty_description'];
	$teaching_interests = $_POST['teaching_interests'];	

	$sql_Professor_Information = "INSERT INTO Professor_Information(Name ,Academic_Title ,Center ,Department ,College ,Phone ,Cell ,E_mail ,Website,Edu_Degree ,Edu_Year ,Edu_Department ,Responsibilitie ,Faculty_Sufficiency ,Time_Devoted_Mission ,Faculty_Qualification ,Description,Teaching_Interests) VALUES('$name' ,'$academic_Title' ,'$center' ,'$department' ,'$college' ,'$phone' ,'$cell','$email' ,'$website' ,'$edu_Degree' ,'$edu_Year' ,'$edu_department' ,'$faculty_responsibilities' ,'$faculty_sufficiency' ,'$time_devoted_mission', '$faculty_qualification' ,'$faculty_description' ,'$teaching_interests')";

	$id = "SELECT Id FROM Professor_Information WHERE MAX(Id)";

	//學年度授課
	$course_id = $_POST['course_id'];
	$program = $_POST['program'];
	$academic_year = $_POST['$academic_year'];
	$semester = $_POST['semester'];
	$course_title = $_POST['course_title'];
	$credit_hour = $_POST['credit_hour'];
	
	$sql_Course_Taught = "INSERT INTO Course_Taught(Program,Academic_Year,Semester,Course_Title,Credit_Hour VALUES('$program','$academic_year','$semester','$course_title','$credit_hour') WHERE Id = '$id'";
	
	// //學術服務
	// $service_ID = $_POST['service_ID'];
	// $service_Year = $_POST['service_Year'];
	// $service_type = $_POST['service_type'];
	// $service_description = $_POST['service_description'];
	
	// $sql_Academic_Services = "UPDATE Academic_Services SET Services_Year = '$service_Year',Service_Type = '$service_type',Description = '$service_description'  WHERE Id = '$service_ID'";
	
	
	// //研究產出 
	// //Peer-reviewed Journals
	// $Peer_reviewed_id = $_POST['Peer_reviewed_id'];
	// $Peer_reviewed_year = $_POST['Peer_reviewed_year'];
	// $Peer_reviewed_topic = $_POST['Peer_reviewed_topic'];
	// $Peer_reviewed_description = $_POST['Peer_reviewed_description'];
	// $Peer_reviewed_download_number = $_POST['Peer_reviewed_download_number'];
	// $Peer_reviewed_status = $_POST['Peer_reviewed_status'];
	// $most_rank = $_POST['most_rank'];
	// $portfolio = $_POST['portfolio'];
	// $citation_index = $_POST['citation_index'];
	// $browses = $_POST['browses'];
	// $supported_by = $_POST['supported_by'];
	
	
	// $sql_Peer_reviewed_Journals = "UPDATE Peer_reviewed_Journals SET Reviewed_Year = '$Peer_reviewed_year',Topic = '$Peer_reviewed_topic',Description = '$Peer_reviewed_description',Download_Number = '$Peer_reviewed_download_number',Status = '$Peer_reviewed_status',MOST_Rank='$most_rank',Portfolio='$portfolio',Citation_Index='$citation_index',Browses='$browses',Supported_by='$supported_by'  WHERE Id = '$Peer_reviewed_id'";
	
	// //Research Monographs
	// $Research_Monographs_Id = $_POST['Research_Monographs_Id'];
	// $Research_Monographs_year = $_POST['Research_Monographs_year'];
	// $Research_Monographs_type = $_POST['Research_Monographs_type'];
	// $Research_Monographs_topic = $_POST['Research_Monographs_topic'];
	// $Research_Monographs_description = $_POST['Research_Monographs_description'];
	// $Research_Monographs_download_number = $_POST['Research_Monographs_download_number'];
	// $Research_Monographs_status = $_POST['Research_Monographs_status'];
	// $Research_Monographs_browses = $_POST['Research_Monographs_browses'];
	// $Research_Monographs_supported_by = $_POST['Research_Monographs_supported_by'];
	
	
	// $sql_Research_Monographs = "UPDATE Research_Monographs SET Research_Year = '$Research_Monographs_year',Research_Type = '$Research_Monographs_type',Topic = '$Research_Monographs_topic',Description = '$Research_Monographs_description',Download_Number = '$Research_Monographs_download_number',Status='$Research_Monographs_status',Browses='$Research_Monographs_browses',Supported_by='$Research_Monographs_supported_by'  WHERE Id = '$Research_Monographs_Id'";
	
	// //Meeting_Proceedings_And_Other
	// //Academic Meeting Proceedings
	// $Meeting_Proceedings_And_Other_Id = $_POST['Meeting_Proceedings_And_Other_Id'];
	// $Meeting_Proceedings_And_Other_year = $_POST['Meeting_Proceedings_And_Other_year'];
	// $Meeting_Proceedings_And_Other_type = $_POST['Meeting_Proceedings_And_Other_type'];
	// $Meeting_Proceedings_And_Other_topic = $_POST['Meeting_Proceedings_And_Other_topic'];
	// $Meeting_Proceedings_And_Other_description = $_POST['Meeting_Proceedings_And_Other_description'];
	
	
	// $sql_Meeting_Proceedings_And_Other = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Meeting_Proceedings_And_Other_year',Meeting_Type = '$Meeting_Proceedings_And_Other_type',Topic = '$Meeting_Proceedings_And_Other_topic',Description = '$Meeting_Proceedings_And_Other_description'  WHERE Id = '$Meeting_Proceedings_And_Other_Id'";
	
	// //Meeting_Proceedings_And_Other
	// //Professional Meeting Proceedings
	// $Professional_Meeting_Proceedings_Id = $_POST['Professional_Meeting_Proceedings_Id'];
	// $Professional_Meeting_Proceedings_year = $_POST['Professional_Meeting_Proceedings_year'];
	// $Professional_Meeting_Proceedings_type = $_POST['Professional_Meeting_Proceedings_type'];
	// $Professional_Meeting_Proceedings_topic = $_POST['Professional_Meeting_Proceedings_topic'];
	// $Professional_Meeting_Proceedings_description = $_POST['Professional_Meeting_Proceedings_description'];
	
	
	// $sql_Professional_Meeting_Proceedings = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Professional_Meeting_Proceedings_year',Meeting_Type = '$Professional_Meeting_Proceedings_type',Topic = '$Professional_Meeting_Proceedings_topic',Description = '$Professional_Meeting_Proceedings_description'  WHERE Id = '$Professional_Meeting_Proceedings_Id'";
	
	// //Meeting_Proceedings_And_Other
	// //Textbooks/Chapters
	// $Textbooks_Chapters_Id = $_POST['Textbooks_Chapters_Id'];
	// $Textbooks_Chapters_year = $_POST['Textbooks_Chapters_year'];
	// $Textbooks_Chapters_type = $_POST['Textbooks_Chapters_type'];
	// $Textbooks_Chapters_topic = $_POST['Textbooks_Chapters_topic'];
	// $Textbooks_Chapters_description = $_POST['Textbooks_Chapters_description'];
	
	
	// $sql_Textbooks_Chapters = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Textbooks_Chapters_year',Meeting_Type = '$Textbooks_Chapters_type',Topic = '$Textbooks_Chapters_topic',Description = '$Textbooks_Chapters_description'  WHERE Id = '$Textbooks_Chapters_Id'";
	
	// //Meeting_Proceedings_And_Other
	// //Cases
	// $Cases_Id = $_POST['Cases_Id'];
	// $Cases_year = $_POST['Cases_year'];
	// $Cases_type = $_POST['Cases_type'];
	// $Cases_topic = $_POST['Cases_topic'];
	// $Cases_description = $_POST['Cases_description'];
	
	
	// $sql_Cases = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Cases_year',Meeting_Type = '$Cases_type',Topic = '$Cases_topic',Description = '$Cases_description'  WHERE Id = '$Cases_Id'";
	
	// //Other Teaching Materials
	// $Other_Teaching_Materials_Id = $_POST['Other_Teaching_Materials_Id'];
	// $Other_Teaching_Materials_year = $_POST['Other_Teaching_Materials_year'];
	// $Other_Teaching_Materials_type = $_POST['Other_Teaching_Materials_type'];
	// $Other_Teaching_Materials_title = $_POST['Other_Teaching_Materials_title'];
	
	// $sql_Other_Teaching_Materials = "UPDATE Teaching_Materials_And_Awards SET Teaching_Materials_And_Awards_Year = '$Other_Teaching_Materials_year',Teaching_Materials_And_Awards_Type = '$Other_Teaching_Materials_type',Title = '$Other_Teaching_Materials_title'  WHERE Id = '$Other_Teaching_Materials_Id'";
	
	// //Honors and Competitive Awards Received
	// $Honors_Competitive_Awards_Received_Id = $_POST['Honors_Competitive_Awards_Received_Id'];
	// $Honors_Competitive_Awards_Received_year = $_POST['Honors_Competitive_Awards_Received_year'];
	// $Honors_Competitive_Awards_Received_type = $_POST['Honors_Competitive_Awards_Received_type'];
	// $Honors_Competitive_Awards_Received_title = $_POST['Honors_Competitive_Awards_Received_title'];
	
	// $sql_Honors_Competitive_Awards_Received = "UPDATE Teaching_Materials_And_Awards SET Teaching_Materials_And_Awards_Year = '$Honors_Competitive_Awards_Received_year',Teaching_Materials_And_Awards_Type = '$Honors_Competitive_Awards_Received_type',Title = '$Honors_Competitive_Awards_Received_title'  WHERE Id = '$Honors_Competitive_Awards_Received_Id'";
	
	// //業界經歷
	// $Professional_History_Id = $_POST['Professional_History_Id'];
	// $Professional_History_month_year = $_POST['Professional_History_month_year'];
	// $Professional_History_title = $_POST['Professional_History_title'];
	// $Professional_History_department = $_POST['Professional_History_department'];
	// $Professional_History_section = $_POST['Professional_History_section'];
	// $Professional_History_company = $_POST['Professional_History_company'];
	
	// $sql_Professional_History = "UPDATE Professional_History SET Month_Year = '$Professional_History_month_year',Title = '$Professional_History_title',Department = '$Professional_History_department',Professional_History_Section = '$Professional_History_section',Company_name = '$Professional_History_company'  WHERE Id = '$Professional_History_Id'";
	
	// //業界發展
	// $Professional_Development_Id = $_POST['Professional_Development_Id'];
	// $Professional_Development_month_year = $_POST['Professional_Development_month_year'];
	// $Professional_Development_type = $_POST['Professional_Development_type'];
	// $Professional_Development_topic = $_POST['Professional_Development_topic'];
	// $Professional_Development_description = $_POST['Professional_Development_description'];
	
	// $sql_Professional_Development = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Professional_Development_month_year',Meeting_Type = '$Professional_Development_type',Topic = '$Professional_Development_topic',Description = '$Professional_Development_description' WHERE Id = '$Professional_Development_Id'";
	
	// //業界團體
	// $Professional_Societies_Id = $_POST['Professional_Societies_Id'];
	// $Professional_Societies_year = $_POST['Professional_Societies_year'];
	// $Professional_Societies_topic = $_POST['Professional_Societies_topic'];
	// $Professional_Societies_description = $_POST['Professional_Societies_description'];
	
	// $sql_Professional_Societies = "UPDATE Professional_Societies SET Professional_Societies_Year = '$Professional_Societies_year',Topic = '$Professional_Societies_topic',Description = '$Professional_Societies_description' WHERE Id = '$Professional_Societies_Id'";
	
	// //影響力描述
	// $teacherID = $_SESSION['teacherID'];
	// $Research_Impacts_description = $_POST['Research_Impacts_description'];
	// $Practice_Impacts_description = $_POST['Practice_Impacts_description'];
	// $Teaching_Impacts_description = $_POST['Teaching_Impacts_description'];
	
	// $sql_Professor_Information_Impacts = "UPDATE Professor_Information SET Research_Impacts = '$Research_Impacts_description',Practice_Impacts = '$Practice_Impacts_description',Teaching__Impacts = '$Teaching_Impacts_description' WHERE Id = '$teacherID'";
	
    include_once("connection.php");
	mysql_query($sql_Professor_Information);
	mysql_query($sql_Course_Taught);
    header("location: createTea.php");
?>