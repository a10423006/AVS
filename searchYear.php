<?php
	session_start();
	$searchYear1 = $_POST['searchYear1'];
	$searchYear2 = $_POST['searchYear2'];
	
	$_SESSION['searchYear1']=$searchYear1;
	$_SESSION['searchYear2']=$searchYear2;
	//&& strtotime(("now") > strtotime($searchYear2))
	//秒數判斷日期

	Function my_msg($msg, $redirect){
		echo "<script language=\"javascript\">";
		echo "window.alert('".$msg."')"; 
		echo "</script>"; 
		echo "<script language=\"javascript\">"; 
		echo "location.href='".$redirect."'"; 
		echo "</script>";
		return; 
	}

	if((strtotime("now") > strtotime($searchYear1)) && strtotime($searchYear1) <> ""){
		if((strtotime("now") > strtotime($searchYear2)) && strtotime($searchYear2) <> "")
		{
			if((strtotime($searchYear2) >= strtotime($searchYear1))){
				$_SESSION['yearWrong']="搜尋成功";

				my_msg('搜尋成功', 'searchYearList.php');
				//header("location: searchYearList.php");
			}
			else{			
				$empty = $searchYear2;
				$searchYear2 = $searchYear1;
				$searchYear1 = $empty;
				$_SESSION['searchYear1']=$searchYear1;
				$_SESSION['searchYear2']=$searchYear2;
				
				$_SESSION['yearWrong']="搜尋成功";

				my_msg('搜尋成功', 'searchYearList.php');
				//header("location: searchYearList.php");
			}
		}	
		else{			
			$_SESSION['yearWrong']="搜尋錯誤";

			my_msg('搜尋錯誤', 'result.php');
			//header("location: result.php");
		}				
	}	
	else{			
			$_SESSION['yearWrong']="搜尋錯誤";

			my_msg('搜尋錯誤', 'result.php');
			//header("location: result.php");
	}					
	
	//$_SESSION['wrong']="輸入錯誤";
?>