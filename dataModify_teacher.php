<?php
	//個人資料
	include_once("connection.php");
	session_start();
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

	$sql_Professor_Information = "UPDATE Professor_Information SET Name = '$name',Academic_Title= '$academic_Title',Administration_Title='$administration_Title',Center = '$center',Department= '$department',College= '$college',University= '$university',Phone= '$phone',Cell= '$cell',E_mail = '$email',Website= '$website',Edu_Degree= '$edu_Degree',Edu_Year= '$edu_Year',Edu_Major= '$edu_Major',Edu_Department= '$edu_Department',Edu_School= '$edu_School',Responsibilitie= '$faculty_responsibilities' ,Faculty_Sufficiency = '$faculty_sufficiency',Time_Devoted_Mission = '$time_devoted_mission',Faculty_Qualification = '$faculty_qualification',Description = '$faculty_description',Teaching_Interests = '$teaching_interests',Normal_Professional_Responsibilities1 = '$normal_professional_responsibilities1',Normal_Professional_Responsibilities2 = '$normal_professional_responsibilities2',Normal_Professional_Responsibilities3 = '$normal_professional_responsibilities3',Normal_Professional_Responsibilities4 = '$normal_professional_responsibilities4',Normal_Professional_Responsibilities5 = '$normal_professional_responsibilities5',Normal_Professional_Responsibilities6 = '$normal_professional_responsibilities6' WHERE Id = '$teacherID'";
	$sql_Professor_Information2 = "UPDATE Professor_Information SET  Responsibilitie= '$output' WHERE Id = '$teacherID'";

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

	if($name ="" || $academic_Title ="" || $administration_Title ="" || $center ="" || $department ="" || $college ="" || $university ="" || $phone ="" || $cell ="" || $email ="" || $website ="" || $edu_Degree ="" || $edu_Year ="" || $edu_Major ="" || $edu_Department ="" || $edu_School ="" || $faculty_responsibilities ="" || $faculty_sufficiency ="" || $time_devoted_mission ="" || $faculty_qualification ="" || $faculty_description ="" || $teaching_interests =""){
		my_msg('未輸入資料!', 'result.php');
	}else{
		mysqli_query($con, $sql_Professor_Information);
		mysqli_query($con, $sql_Professor_Information2);
		mysqli_close($con);

		my_msg('修改成功', 'result.php');
		//header("location: result.php");
	}
?>