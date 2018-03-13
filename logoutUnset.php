<?php
	session_start();
	unset($_SESSION['teacherID']);
	header("location: http://www.colmgt.ccu.edu.tw/aacsb/qa/index.php");
	//$_SESSION['wrong']="輸入錯誤";
?>