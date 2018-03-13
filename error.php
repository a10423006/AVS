<?php
	session_start();
	// echo "輸入錯誤";
	// header("location: search_teacherData.php");
	$_SESSION['wrong']="輸入錯誤";
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

	my_msg('查無此人', 'search_teacherData.php');
?>