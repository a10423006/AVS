<?php
	session_start();
	echo "輸入錯誤";
	
	$searchYear1 = $_POST['searchYear1'];
	$searchYear2 = $_POST['searchYear2'];
	
	$_SESSION['searchYear1']=$searchYear1;
	$_SESSION['searchYear2']=$searchYear2;
	//&& strtotime(("now") > strtotime($searchYear2))
	//秒數判斷日期
	if((strtotime("now") > strtotime($searchYear1)))
	{
		if((strtotime("now") > strtotime($searchYear2)))
		{
			if((strtotime($searchYear2) >= strtotime($searchYear1))){
				$_SESSION['yearWrong']="輸入成功";
				header("location: searchYearList.php");
			}
			else{			
			$empty = $searchYear2;
			$searchYear2 = $searchYear1;
			$searchYear1 = $empty;
			$_SESSION['searchYear1']=$searchYear1;
			$_SESSION['searchYear2']=$searchYear2;
			
			$_SESSION['yearWrong']="輸入成功";
			header("location: searchYearList.php");
			}
		}	
		else{			
			$_SESSION['yearWrong']="輸入錯誤";
			header("location: result.php");
		}				
	}	
	else{			
			$_SESSION['yearWrong']="輸入錯誤";
			header("location: result.php");
	}					
	
	//$_SESSION['wrong']="輸入錯誤";
?>