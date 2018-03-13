<?php
	//個人資料
	session_start();
	$teacherID = $_SESSION['teacherID'];

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
	$normal_professional_responsibilities = $_POST['normal_professional_responsibilities'];
	$portfolio_of_intellectual_contributions = $_POST['portfolio_of_intellectual_contributions'];//3個
	$types_of_intellectual_contributions = $_POST['types_of_intellectual_contributions'];//4個

	$sql_Professor_Information = "UPDATE Professor_Information SET Name = '$name',Academic_Title= '$academic_Title',Center = '$center',Department= '$department',College= '$college',Phone= '$phone',Cell= '$cell',E_mail = '$email',Website= '$website',Edu_Degree= '$edu_Degree',Edu_Year= '$edu_Year',Edu_Major= '$edu_Major',Edu_Department= '$edu_Department',Edu_School= '$edu_School',Responsibilitie= '$faculty_responsibilities' ,Faculty_Sufficiency = '$faculty_sufficiency',Time_Devoted_Mission = '$time_devoted_mission',Faculty_Qualification = '$faculty_qualification',Description = '$faculty_description',Teaching_Interests = '$teaching_interests' WHERE Id = '$teacherID'";
	
	$con=mysqli_connect("212.1.212.1","bigcattl_test","s6951435","bigcattl_formal");
	
	
	// 檢測連接
	if (mysqli_connect_errno())
	{
		echo "連接失敗: " . mysqli_connect_error();
	}
	mysqli_query($con, "set names utf8"); //utf8 設為對應的編碼  超級重要

	mysqli_query($con,$sql_Professor_Information);

	mysqli_close($con);

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

	my_msg('刪除成功', 'result.php');
	//header("location: result.php");
	
?>