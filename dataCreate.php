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
	
	//系統改的
	$normal_professional_responsibilities = $_POST['normal_professional_responsibilities'];
	$portfolio_of_intellectual_contributions = $_POST['portfolio_of_intellectual_contributions'];//3個
	$types_of_intellectual_contributions = $_POST['types_of_intellectual_contributions'];//4個

	$sql_Professor_Information = "INSERT INTO Professor_Information(Name ,Academic_Title ,Center ,Department ,College ,Phone ,Cell ,E_mail ,Website,Edu_Degree ,Edu_Year ,Edu_Department ,Responsibilitie ,Faculty_Sufficiency ,Time_Devoted_Mission ,Faculty_Qualification ,Description,Teaching_Interests) VALUES('$name' ,'$academic_Title' ,'$center' ,'$department' ,'$college' ,'$phone' ,'$cell','$email' ,'$website' ,'$edu_Degree' ,'$edu_Year' ,'$edu_department' ,'$faculty_responsibilities' ,'$faculty_sufficiency' ,'$time_devoted_mission', '$faculty_qualification' ,'$faculty_description' ,'$teaching_interests')";
	
    $conn = include_once("connection.php");
    
    echo $conn;

    mysqli_query($sql_Professor_Information ,$conn);
    
    echo mysqli_query("SELECT * FROM `Professor_Information` WHERE 1" ,$conn);

    //header("location: createTea.php");
?>