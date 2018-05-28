<?php
	include_once("connection.php");
	session_start();

	if($_SESSION['teacherID']!=null) {
		$teacherID = $_SESSION['teacherID'];	
	  }else{
		echo "null!";
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


//學年度授課
$program = $_POST['program'];
$academic_year = $_POST['academic_year'];
$semester = $_POST['semester'];
$course_title = $_POST['course_title'];
$credit_hour = $_POST['credit_hour'];

//學術服務
$service_Year = $_POST['service_Year'];
$service_type = $_POST['service_type'];
$service_description = $_POST['service_description'];

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
//Research Monographs
$Research_Monographs_year = $_POST['Research_Monographs_year'];
$Research_Monographs_type = $_POST['Research_Monographs_type'];
$Research_Monographs_topic = $_POST['Research_Monographs_topic'];
$Research_Monographs_description = $_POST['Research_Monographs_description'];
$Research_Monographs_download_number = $_POST['Research_Monographs_download_number'];
$Research_Monographs_status = $_POST['Research_Monographs_status'];
$Research_Monographs_browses = $_POST['Research_Monographs_browses'];
$Research_Monographs_supported_by = $_POST['Research_Monographs_supported_by'];
//Meeting_Proceedings_And_Other
//Academic Meeting Proceedings
$Meeting_Proceedings_And_Other_year = $_POST['Meeting_Proceedings_And_Other_year'];
$Meeting_Proceedings_And_Other_type = $_POST['Meeting_Proceedings_And_Other_type'];
$Meeting_Proceedings_And_Other_topic = $_POST['Meeting_Proceedings_And_Other_topic'];
$Meeting_Proceedings_And_Other_description = $_POST['Meeting_Proceedings_And_Other_description'];
//Meeting_Proceedings_And_Other
//Professional Meeting Proceedings
$Professional_Meeting_Proceedings_year = $_POST['Professional_Meeting_Proceedings_year'];
$Professional_Meeting_Proceedings_type = $_POST['Professional_Meeting_Proceedings_type'];
$Professional_Meeting_Proceedings_topic = $_POST['Professional_Meeting_Proceedings_topic'];
$Professional_Meeting_Proceedings_description = $_POST['Professional_Meeting_Proceedings_description'];
//Meeting_Proceedings_And_Other
//Textbooks/Chapters
$Textbooks_Chapters_year = $_POST['Textbooks_Chapters_year'];
$Textbooks_Chapters_type = $_POST['Textbooks_Chapters_type'];
$Textbooks_Chapters_topic = $_POST['Textbooks_Chapters_topic'];
$Textbooks_Chapters_description = $_POST['Textbooks_Chapters_description'];
//Meeting_Proceedings_And_Other
//Cases
$Cases_year = $_POST['Cases_year'];
$Cases_type = $_POST['Cases_type'];
$Cases_topic = $_POST['Cases_topic'];
$Cases_description = $_POST['Cases_description'];
//Other Teaching Materials
$Other_Teaching_Materials_year = $_POST['Other_Teaching_Materials_year'];
$Other_Teaching_Materials_type = $_POST['Other_Teaching_Materials_type'];
$Other_Teaching_Materials_title = $_POST['Other_Teaching_Materials_title'];
//Honors and Competitive Awards Received
$Honors_Competitive_Awards_Received_year = $_POST['Honors_Competitive_Awards_Received_year'];
$Honors_Competitive_Awards_Received_type = $_POST['Honors_Competitive_Awards_Received_type'];
$Honors_Competitive_Awards_Received_title = $_POST['Honors_Competitive_Awards_Received_title'];
//業界經歷
$Professional_History_month_year = $_POST['Professional_History_month_year'];
$Professional_History_title = $_POST['Professional_History_title'];
$Professional_History_department = $_POST['Professional_History_department'];
$Professional_History_section = $_POST['Professional_History_section'];
$Professional_History_company = $_POST['Professional_History_company'];
//業界發展
$Professional_Development_month_year = $_POST['Professional_Development_month_year'];
$Professional_Development_type = $_POST['Professional_Development_type'];
$Professional_Development_topic = $_POST['Professional_Development_topic'];
$Professional_Development_description = $_POST['Professional_Development_description'];
//業界團體
$Professional_Societies_year = $_POST['Professional_Societies_year'];
$Professional_Societies_topic = $_POST['Professional_Societies_topic'];
$Professional_Societies_description = $_POST['Professional_Societies_description'];
//檢查
for($i=0; $i<count($program); $i++){ //學年度授課
	if($program[$i]==""|| $academic_year[$i]==""|| $semester[$i]==""|| $course_title[$i]==""|| $credit_hour[$i]==""){
		my_msg('學年度授課未輸入資料!','new_teacherData.php');
	}else{
		//echo "success";
	}
}	
for($i=0; $i<count($service_type); $i++){ //學術服務
	if($service_Year[$i]==""|| $service_type[$i]==""|| $service_description[$i]==""){
		my_msg('學術服務未輸入資料!','new_teacherData.php');
	}else{

	}
}	
for($i=0; $i<count($most_rank); $i++){ //Peer-reviewed Journals
	if($Peer_reviewed_year[$i]==""|| $Peer_reviewed_topic[$i]==""|| $Peer_reviewed_description[$i]==""|| $most_rank[$i]==""|| $portfolio[$i]==""){
		my_msg('Peer-reviewed Journals未輸入資料!','new_teacherData.php');
	}else{

	}
}
for($i=0; $i<count($Research_Monographs_type); $i++){ //Research Monographs
	if($Research_Monographs_year[$i]==""|| $Research_Monographs_type[$i]==""|| $Research_Monographs_topic[$i]==""|| $Research_Monographs_description[$i]==""){
		my_msg('Research Monographs未輸入資料!','new_teacherData.php');
	}else{

	}
}
for($i=0; $i<count($Meeting_Proceedings_And_Other_type); $i++){ //Academic Meeting Proceedings	
	if($Meeting_Proceedings_And_Other_year[$i]==""|| $Meeting_Proceedings_And_Other_type[$i]==""|| $Meeting_Proceedings_And_Other_topic[$i]==""){
		my_msg('Academic Meeting Proceedings未輸入資料!','new_teacherData.php');
	}else{

	}
}
/*
for($i=0; $i<count($Professional_Meeting_Proceedings_type); $i++){ //Professional Meeting Proceedings
	if($Professional_Meeting_Proceedings_year[$i]==""|| $Professional_Meeting_Proceedings_type[$i]==""|| $Professional_Meeting_Proceedings_topic[$i]==""){
		my_msg('Professional Meeting Proceedings未輸入資料!','new_teacherData.php');
	}else{

	}
}	
*/
for($i=0; $i<count($Textbooks_Chapters_type); $i++){ //Textbooks/Chapters
	if($Textbooks_Chapters_year[$i]==""|| $Textbooks_Chapters_type[$i]==""|| $Textbooks_Chapters_topic[$i]==""){
		my_msg('Textbooks/Chapters未輸入資料!','new_teacherData.php');
	}else{

	}	
}	
for($i=0; $i<count($Cases_type); $i++){ //Cases
	if($Cases_year[$i]==""|| $Cases_type[$i]==""|| $Cases_topic[$i]==""|| $Cases_description[$i]==""){
		my_msg('Cases未輸入資料!','new_teacherData.php');
	}else{

	}
}
for($i=0; $i<count($Other_Teaching_Materials_type); $i++){ //Other Teaching Materials
	if($Other_Teaching_Materials_year[$i]==""|| $Other_Teaching_Materials_type[$i]==""|| $Other_Teaching_Materials_title[$i]==""){
		my_msg('Other Teaching Materials未輸入資料!','new_teacherData.php');
	}else{

	}
}		
for($i=0; $i<count($Honors_Competitive_Awards_Received_type); $i++){ //Honors and Competitive Awards Received
	if($Honors_Competitive_Awards_Received_year[$i]==""|| $Honors_Competitive_Awards_Received_type[$i]==""|| $Honors_Competitive_Awards_Received_title[$i]==""){
		my_msg('Honors and Competitive Awards Received未輸入資料!','new_teacherData.php');
	}else{

	}	
}
for($i=0; $i<count($Professional_History_title); $i++){ //業界經歷
	if($Professional_History_month_year[$i]==""|| $Professional_History_title[$i]==""|| $Professional_History_department[$i]==""|| $Professional_History_section[$i]==""){
		my_msg('業界經歷未輸入資料!','new_teacherData.php');
	}else{

	}
}
for($i=0; $i<count($Professional_Development_type); $i++){ //業界發展
	if($Professional_Development_month_year[$i]==""|| $Professional_Development_type[$i]==""|| $Professional_Development_topic[$i]==""){
		my_msg('業界發展未輸入資料!','new_teacherData.php');
	}else{

	}
}
for($i=0; $i<count($Professional_Societies_topic); $i++){ //業界團體
	if($Professional_Societies_year[$i]==""|| $Professional_Societies_topic[$i]==""|| $Professional_Societies_description[$i]==""){
		my_msg('業界團體未輸入資料!','new_teacherData.php');
	}else{

	}
}	
//學年度授課
if($academic_year[0]==""){
}
else{
	for($i=0; $i<count($program); $i++){ //把每一列的資料取出來
		$sql_Course_Taught = "INSERT INTO Course_Taught(Program, Academic_Year, Semester, Course_Title, Credit_Hour, Professor_Id) VALUES('$program[$i]', '$academic_year[$i]', '$semester[$i]', '$course_title[$i]', '$credit_hour[$i]','$teacherID')";
		$conn2 = mysqli_query($con,$sql_Course_Taught);
	}	
}
//學術服務
if($service_description[0]==""){
}
else{
	for($i=0; $i<count($service_type); $i++){ //把每一列的資料取出來
		$sql_Academic_Services = "INSERT INTO Academic_Services(Services_Year, Service_Type, Description, Professor_Id) VALUES('$service_Year[$i]', '$service_type[$i]',  '$service_description[$i]', '$teacherID')";
		$conn3 = mysqli_query($con,$sql_Academic_Services);
	}	
}
//研究產出 
//Peer-reviewed Journals
if($Peer_reviewed_description[0]==""){
}
else{
	for($i=0; $i<count($most_rank); $i++){ //把每一列的資料取出來
		$sql_Peer_reviewed_Journals = "INSERT INTO Peer_reviewed_Journals(Reviewed_Year, Topic, Description, Download_Number, Status, MOST_Rank, Portfolio, Citation_Index, Browses, Supported_by, Professor_Id) VALUES('$Peer_reviewed_year[$i]', '$Peer_reviewed_topic[$i]', '$Peer_reviewed_description[$i]',  '$Peer_reviewed_download_number[$i]', '$Peer_reviewed_status[$i]', '$most_rank[$i]', '$portfolio[$i]', '$citation_index[$i]', '$browses[$i]', '$supported_by[$i]', '$teacherID')";
		$conn4 = mysqli_query($con,$sql_Peer_reviewed_Journals);
	}	
}
//Research Monographs
if($Research_Monographs_description[0]==""){
}
else{
	for($i=0; $i<count($Research_Monographs_type); $i++){ //把每一列的資料取出來
		$sql_Research_Monographs = "INSERT INTO Research_Monographs(Research_Year, Research_Type, Topic, Description, Download_Number, Status, Browses, Supported_by, Professor_Id) VALUES('$Research_Monographs_year[$i]', '$Research_Monographs_type[$i]', '$Research_Monographs_topic[$i]', '$Research_Monographs_description[$i]',  '$Research_Monographs_download_number[$i]', '$Research_Monographs_status[$i]', '$Research_Monographs_browses[$i]', '$Research_Monographs_supported_by[$i]', '$teacherID')";
		$conn5 = mysqli_query($con,$sql_Research_Monographs);
	}
}
//Meeting_Proceedings_And_Other
//Academic Meeting Proceedings
if($Meeting_Proceedings_And_Other_description[0]==""){
}
else{
	for($i=0; $i<count($Meeting_Proceedings_And_Other_type); $i++){ //把每一列的資料取出來	
		$sql_Meeting_Proceedings_And_Other = "INSERT INTO Meeting_Proceedings_And_Other(Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Meeting_Proceedings_And_Other_year[$i]', '$Meeting_Proceedings_And_Other_type[$i]', '$Meeting_Proceedings_And_Other_topic[$i]',  '$Meeting_Proceedings_And_Other_description[$i]', '$teacherID','Meeting Proceedings')";
		$conn6 = mysqli_query($con,$sql_Meeting_Proceedings_And_Other);
	}	
}
//Meeting_Proceedings_And_Other
//Professional Meeting Proceedings
/*
if($Professional_Meeting_Proceedings_description[0]==""){
}
else{
	for($i=0; $i<count($Professional_Meeting_Proceedings_type); $i++){ //把每一列的資料取出來
		$sql_Professional_Meeting_Proceedings = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Professional_Meeting_Proceedings_year[$i]', '$Professional_Meeting_Proceedings_type[$i]', '$Professional_Meeting_Proceedings_topic[$i]',  '$Professional_Meeting_Proceedings_description[$i]' ,'$teacherID','Professional Meeting Proceedings')";
		$conn7 = mysqli_query($con,$sql_Professional_Meeting_Proceedings);	
	}	
}
*/
//Meeting_Proceedings_And_Other
//Textbooks/Chapters
if($Textbooks_Chapters_description[0]==""){
}
else{
	for($i=0; $i<count($Textbooks_Chapters_type); $i++){ //把每一列的資料取出來
		$sql_Textbooks_Chapters = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Textbooks_Chapters_year[$i]', '$Textbooks_Chapters_type[$i]', '$Textbooks_Chapters_topic[$i]', '$Textbooks_Chapters_description[$i]', '$teacherID','Textbooks/Chapters')";
		$conn8 = mysqli_query($con,$sql_Textbooks_Chapters);	
	}	
}
//Meeting_Proceedings_And_Other
//Cases
if($Cases_description[0]==""){
}
else{
	for($i=0; $i<count($Cases_type); $i++){ //把每一列的資料取出來
		$sql_Cases = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Cases_year[$i]', '$Cases_type[$i]',  '$Cases_topic[$i]', '$Cases_description[$i]', '$teacherID','Cases')";
		$conn9 = mysqli_query($con,$sql_Cases);
	}	
}
//Other Teaching Materials
if($Other_Teaching_Materials_title[0]==""){
}
else{
	for($i=0; $i<count($Other_Teaching_Materials_type); $i++){ //把每一列的資料取出來
		$sql_Other_Teaching_Materials = "INSERT INTO Teaching_Materials_And_Awards (Teaching_Materials_And_Awards_Year, Teaching_Materials_And_Awards_Type, Title, Professor_Id,Contributions_name) VALUES('$Other_Teaching_Materials_year[$i]', '$Other_Teaching_Materials_type[$i]', '$Other_Teaching_Materials_title[$i]', '$teacherID','Other_Teaching_Materials')";
		$conn10 = mysqli_query($con,$sql_Other_Teaching_Materials);
	}	
}
//Honors and Competitive Awards Received
if($Honors_Competitive_Awards_Received_title[0]==""){
}
else{
	for($i=0; $i<count($Honors_Competitive_Awards_Received_type); $i++){ //把每一列的資料取出來
		$sql_Honors_Competitive_Awards_Received = "INSERT INTO Teaching_Materials_And_Awards (Teaching_Materials_And_Awards_Year, Teaching_Materials_And_Awards_Type, Title, Professor_Id,Contributions_name) VALUES('$Honors_Competitive_Awards_Received_year[$i]', '$Honors_Competitive_Awards_Received_type[$i]',  '$Honors_Competitive_Awards_Received_title[$i]', '$teacherID','Honors_Competitive_Awards_Received')";
		$conn11 = mysqli_query($con,$sql_Honors_Competitive_Awards_Received);		
	}
}
//業界經歷
if($Professional_History_company[0]==""){
}
else{
	for($i=0; $i<count($Professional_History_title); $i++){ //把每一列的資料取出來
		$sql_Professional_History = "INSERT INTO Professional_History (Month_Year ,Title, Department, Professional_History_Section, Company_name, Professor_Id) VALUES('$Professional_History_month_year[$i]', '$Professional_History_title[$i]', '$Professional_History_department[$i]', '$Professional_History_section[$i]', '$Professional_History_company[$i]', '$teacherID')";
		$conn12 = mysqli_query($con,$sql_Professional_History);	
	}
}
//業界發展
if($Professional_Development_description[0]==""){
}
else{
	for($i=0; $i<count($Professional_Development_type); $i++){ //把每一列的資料取出來	
		$sql_Professional_Development = "INSERT INTO Meeting_Proceedings_And_Other (Meeting_Year, Meeting_Type, Topic, Description, Professor_Id,Meeting_Class) VALUES('$Professional_Development_month_year[$i]', '$Professional_Development_type[$i]', '$Professional_Development_topic[$i]',  '$Professional_Development_description[$i]', '$teacherID','Professional Development')";
		$conn13 = mysqli_query($con,$sql_Professional_Development);
	}
}
//業界團體
if($Professional_Societies_description[0]==""){
}
else{
	for($i=0; $i<count($Professional_Societies_topic); $i++){ //把每一列的資料取出來
		$sql_Professional_Societies = "INSERT INTO Professional_Societies (Professional_Societies_Year, Topic, Description, Professor_Id) VALUES('$Professional_Societies_year[$i]', '$Professional_Societies_topic[$i]', '$Professional_Societies_description[$i]', '$teacherID')";
		$conn14 = mysqli_query($con,$sql_Professional_Societies);
	}	
}



// //警告視窗
// Function my_msg($msg, $redirect){
// 	echo "<script language=\"javascript\">";
// 	echo "window.alert('".$msg."')"; 
// 	echo "</script>"; 
// 	echo "<script language=\"javascript\">"; 
// 	echo "location.href='".$redirect."'"; 
// 	echo "</script>";
// 	return; 
// }


// if($conn2 && $conn3 && $conn4 && $conn5 && $conn6 && $conn7 && $conn8 && $conn9 && $conn10 && $conn11 && $conn12 && $conn13 && $conn14){
   my_msg('上傳成功', 'result.php');
// }else{
	//my_msg('新增成功', 'result.php');
// }

?>