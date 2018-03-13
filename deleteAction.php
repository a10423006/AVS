<?php
	session_start();
	include_once("connection.php");
	$teacherID = $_SESSION['teacherID'];

	//學年度授課
	$course_id = $_POST['course_id'];
	//學術服務
	$service_ID = $_POST['service_ID'];
	//研究產出 
	//Peer-reviewed Journals
	$Peer_reviewed_id = $_POST['Peer_reviewed_id'];
	//Research Monographs
	$Research_Monographs_Id = $_POST['Research_Monographs_Id'];
	//Meeting_Proceedings_And_Other
	//Academic Meeting Proceedings
	$Meeting_Proceedings_And_Other_Id = $_POST['Meeting_Proceedings_And_Other_Id'];	
	//Meeting_Proceedings_And_Other
	//Professional Meeting Proceedings
	$Professional_Meeting_Proceedings_Id = $_POST['Professional_Meeting_Proceedings_Id'];		
	//Meeting_Proceedings_And_Other
	//Textbooks/Chapters
	$Textbooks_Chapters_Id = $_POST['Textbooks_Chapters_Id'];
	//Meeting_Proceedings_And_Other
	//Cases
	$Cases_Id = $_POST['Cases_Id'];
	//Other Teaching Materials
	$Other_Teaching_Materials_Id = $_POST['Other_Teaching_Materials_Id'];	
	//Honors and Competitive Awards Received
	$Honors_Competitive_Awards_Received_Id = $_POST['Honors_Competitive_Awards_Received_Id'];
	//業界經歷
	$Professional_History_Id = $_POST['Professional_History_Id'];		
	//業界發展
	$Professional_Development_Id = $_POST['Professional_Development_Id'];		
	//業界團體
	$Professional_Societies_Id = $_POST['Professional_Societies_Id'];	
	
	//學年度授課
	$sql_Course_Taught_Num="select * from Course_Taught where Professor_Id='$teacherID'";
	$result_Course_Taught=mysql_query($sql_Course_Taught_Num);

	for($i=0; $i<mysql_num_rows($result_Course_Taught); $i++){ //把每一列的資料取出來
		
		$sql_Course_Taught = "DELETE FROM Course_Taught WHERE Id = '$course_id[$i]'";
		mysql_query($sql_Course_Taught);
    }	
    
	//學術服務
	$sql_Academic_Services_Num="select * from Academic_Services where Professor_Id='$teacherID'";
	$result_Academic_Services=mysql_query($sql_Academic_Services_Num);
	for($i=0; $i<mysql_num_rows($result_Academic_Services); $i++){ //把每一列的資料取出來
	
		$sql_Academic_Services = "DELETE FROM Academic_Services   WHERE Id = '$service_ID[$i]'";	
		mysql_query($sql_Academic_Services);
	}
	
	//Peer-reviewed Journals*
	$sql_Peer_reviewed_Journals_Num="select * from Peer_reviewed_Journals where Professor_Id='$teacherID'";
	$result_Peer_reviewed_Journals=mysql_query($sql_Peer_reviewed_Journals_Num);
	for($i=0; $i<mysql_num_rows($result_Peer_reviewed_Journals); $i++){ //把每一列的資料取出來
	
		$sql_Peer_reviewed_Journals = "DELETE FROM Peer_reviewed_Journals   WHERE Id = '$Peer_reviewed_id[$i]'";
;
		mysql_query($sql_Peer_reviewed_Journals);
	}
	//Research Monographs
	$sql_Research_Monographs_Num="select * from Research_Monographs where Professor_Id='$teacherID'";
	$result_sql_Research_Monographs=mysql_query($sql_Research_Monographs_Num);
	for($i=0; $i<mysql_num_rows($result_sql_Research_Monographs); $i++){ //把每一列的資料取出來
	
		$sql_Research_Monographs = "DELETE FROM Research_Monographs SET   WHERE Id = '$Research_Monographs_Id[$i]'";

		mysql_query($sql_Research_Monographs);
	}
	//Academic Meeting Proceedings
	$sql_Meeting_Proceedings_And_Other_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Academic Meeting Proceedings'";
	$result_sql_Meeting_Proceedings_And_Other=mysql_query($sql_Meeting_Proceedings_And_Other_Num);
	for($i=0; $i<mysql_num_rows($result_sql_Meeting_Proceedings_And_Other); $i++){ //把每一列的資料取出來
	
		$sql_Meeting_Proceedings_And_Other = "DELETE FROM Meeting_Proceedings_And_Other WHERE Id = '$Meeting_Proceedings_And_Other_Id[$i]'";

		mysql_query($sql_Meeting_Proceedings_And_Other);
	}
	
	//Professional Meeting Proceedings
	$sql_Professional_Meeting_Proceedings_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Meeting Proceedings'";
	$result_Professional_Meeting_Proceedings=mysql_query($sql_Professional_Meeting_Proceedings_Num);
	for($i=0; $i<mysql_num_rows($result_Professional_Meeting_Proceedings); $i++){ //把每一列的資料取出來
	
		$sql_Professional_Meeting_Proceedings = "DELETE FROM Meeting_Proceedings_And_Other WHERE Id = '$Professional_Meeting_Proceedings_Id[$i]'";

		mysql_query($sql_Professional_Meeting_Proceedings);
	}
	//Textbooks/Chapters
	$sql_Textbooks_Chapters_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Textbooks/Chapters'";
	$result_Textbooks_Chapters=mysql_query($sql_Textbooks_Chapters_Num);
	for($i=0; $i<mysql_num_rows($result_Textbooks_Chapters); $i++){ //把每一列的資料取出來
	
		$sql_Textbooks_Chapters = "DELETE FROM Meeting_Proceedings_And_Other   WHERE Id = '$Textbooks_Chapters_Id[$i]'";
	
		mysql_query($sql_Textbooks_Chapters);
	}
	//Cases
	$sql_Cases_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Cases'";
	$result_Cases=mysql_query($sql_Cases_Num);
	for($i=0; $i<mysql_num_rows($result_Cases); $i++){ //把每一列的資料取出來
	
		$sql_Cases = "DELETE FROM Meeting_Proceedings_And_Other   WHERE Id = '$Cases_Id[$i]'";

		mysql_query($sql_Cases);
	}
	//Other Teaching Materials
	$sql_Other_Teaching_Materials_Num="select * from Teaching_Materials_And_Awards where Professor_Id='$teacherID' && Contributions_name = 'Other Teaching Materials'";
	$result_Other_Teaching_Materials=mysql_query($sql_Other_Teaching_Materials_Num);
	for($i=0; $i<mysql_num_rows($result_Other_Teaching_Materials); $i++){ //把每一列的資料取出來
	
		$sql_Other_Teaching_Materials = "DELETE FROM Teaching_Materials_And_Awards   WHERE Id = '$Other_Teaching_Materials_Id[$i]'";

		mysql_query($sql_Other_Teaching_Materials);
	}
	//Honors and Competitive Awards Received
	$sql_Honors_Competitive_Awards_Received_Num="select * from Teaching_Materials_And_Awards where  Professor_Id='$teacherID' && Contributions_name = 'Honors and Competitive Awards Received'";
	$result_Honors_Competitive_Awards_Received=mysql_query($sql_Honors_Competitive_Awards_Received_Num);
	for($i=0; $i<mysql_num_rows($result_Honors_Competitive_Awards_Received); $i++){ //把每一列的資料取出來
	
		$sql_Honors_Competitive_Awards_Received = "DELETE FROM Teaching_Materials_And_Awards   WHERE Id = '$Honors_Competitive_Awards_Received_Id[$i]'";
	
		mysql_query($sql_Honors_Competitive_Awards_Received);
	}
	//業界經歷
	$sql_Professional_History_Num="select * from Professional_History  where Professor_Id='$teacherID'";
	$result_Professional_History=mysql_query($sql_Professional_History_Num);
	for($i=0; $i<mysql_num_rows($result_Professional_History); $i++){ //把每一列的資料取出來
		$sql_Professional_History = "DELETE FROM Professional_History   WHERE Id = '$Professional_History_Id[$i]'";

		mysql_query($sql_Professional_History);
	}
	
	//業界發展
	$sql_Professional_Development_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Development'";
	$result_Professional_Development=mysql_query($sql_Professional_Development_Num);
	for($i=0; $i<mysql_num_rows($result_Professional_Development); $i++){ //把每一列的資料取出來
	
			$sql_Professional_Development = "DELETE FROM Meeting_Proceedings_And_Other  WHERE Id = '$Professional_Development_Id[$i]'";
			mysql_query($sql_Professional_Development);
	}

	//業界團體
	$sql_Professional_Societies_Num="select * from Professional_Societies where Professor_Id='$teacherID'";
	$result_Professional_Societies=mysql_query($sql_Professional_Societies_Num);
	for($i=0; $i<mysql_num_rows($result_Professional_Societies); $i++){ //把每一列的資料取出來
	
				$sql_Professional_Societies = "DELETE FROM Professional_Societies  WHERE Id = '$Professional_Societies_Id[$i]'";
				mysql_query($sql_Professional_Societies);
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

	my_msg('刪除成功', 'result.php');
?>