<?php
	session_start();
	echo "輸入錯誤";
	header("location: search_teacherData.php");
	$_SESSION['wrong']="輸入錯誤";
?>