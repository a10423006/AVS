<?php
	session_start();
	$teacherID = $_SESSION['teacherID'];
	include("connection.php");
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
	$course_id = $_POST['course_id'];
	$program = $_POST['program'];
	$academic_year = $_POST['academic_year'];
	$semester = $_POST['semester'];
	$course_title = $_POST['course_title'];
	$credit_hour = $_POST['credit_hour'];

	//學術服務
	$service_ID = $_POST['service_ID'];
	$service_Year = $_POST['service_Year'];
	$service_type = $_POST['service_type'];
	$service_description = $_POST['service_description'];
	
	//研究產出 
	//Peer-reviewed Journals
	$Peer_reviewed_id = $_POST['Peer_reviewed_id'];
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
	$Research_Monographs_Id = $_POST['Research_Monographs_Id'];
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
	$Meeting_Proceedings_And_Other_Id = $_POST['Meeting_Proceedings_And_Other_Id'];
	$Meeting_Proceedings_And_Other_year = $_POST['Meeting_Proceedings_And_Other_year'];
	$Meeting_Proceedings_And_Other_type = $_POST['Meeting_Proceedings_And_Other_type'];
	$Meeting_Proceedings_And_Other_topic = $_POST['Meeting_Proceedings_And_Other_topic'];
	$Meeting_Proceedings_And_Other_description = $_POST['Meeting_Proceedings_And_Other_description'];
	
	//Meeting_Proceedings_And_Other
	//Professional Meeting Proceedings
	$Professional_Meeting_Proceedings_Id = $_POST['Professional_Meeting_Proceedings_Id'];
	$Professional_Meeting_Proceedings_year = $_POST['Professional_Meeting_Proceedings_year'];
	$Professional_Meeting_Proceedings_type = $_POST['Professional_Meeting_Proceedings_type'];
	$Professional_Meeting_Proceedings_topic = $_POST['Professional_Meeting_Proceedings_topic'];
	$Professional_Meeting_Proceedings_description = $_POST['Professional_Meeting_Proceedings_description'];
		
	//Meeting_Proceedings_And_Other
	//Textbooks/Chapters
	$Textbooks_Chapters_Id = $_POST['Textbooks_Chapters_Id'];
	$Textbooks_Chapters_year = $_POST['Textbooks_Chapters_year'];
	$Textbooks_Chapters_type = $_POST['Textbooks_Chapters_type'];
	$Textbooks_Chapters_topic = $_POST['Textbooks_Chapters_topic'];
	$Textbooks_Chapters_description = $_POST['Textbooks_Chapters_description'];
	
	//Meeting_Proceedings_And_Other
	//Cases
	$Cases_Id = $_POST['Cases_Id'];
	$Cases_year = $_POST['Cases_year'];
	$Cases_type = $_POST['Cases_type'];
	$Cases_topic = $_POST['Cases_topic'];
	$Cases_description = $_POST['Cases_description'];
	
	//Other Teaching Materials
	$Other_Teaching_Materials_Id = $_POST['Other_Teaching_Materials_Id'];
	$Other_Teaching_Materials_year = $_POST['Other_Teaching_Materials_year'];
	$Other_Teaching_Materials_type = $_POST['Other_Teaching_Materials_type'];
	$Other_Teaching_Materials_title = $_POST['Other_Teaching_Materials_title'];
	
	//Honors and Competitive Awards Received
	$Honors_Competitive_Awards_Received_Id = $_POST['Honors_Competitive_Awards_Received_Id'];
	$Honors_Competitive_Awards_Received_year = $_POST['Honors_Competitive_Awards_Received_year'];
	$Honors_Competitive_Awards_Received_type = $_POST['Honors_Competitive_Awards_Received_type'];
	$Honors_Competitive_Awards_Received_title = $_POST['Honors_Competitive_Awards_Received_title'];
	
	//業界經歷
	$Professional_History_Id = $_POST['Professional_History_Id'];
	$Professional_History_month_year = $_POST['Professional_History_month_year'];
	$Professional_History_title = $_POST['Professional_History_title'];
	$Professional_History_department = $_POST['Professional_History_department'];
	$Professional_History_section = $_POST['Professional_History_section'];
	$Professional_History_company = $_POST['Professional_History_company'];
		
	//業界發展
	$Professional_Development_Id = $_POST['Professional_Development_Id'];
	$Professional_Development_month_year = $_POST['Professional_Development_month_year'];
	$Professional_Development_type = $_POST['Professional_Development_type'];
	$Professional_Development_topic = $_POST['Professional_Development_topic'];
	$Professional_Development_description = $_POST['Professional_Development_description'];
		
	//業界團體
	$Professional_Societies_Id = $_POST['Professional_Societies_Id'];
	$Professional_Societies_year = $_POST['Professional_Societies_year'];
	$Professional_Societies_topic = $_POST['Professional_Societies_topic'];
	$Professional_Societies_description = $_POST['Professional_Societies_description'];	
	
	//影響力描述
	$Research_Impacts_description = $_POST['Research_Impacts_description'];
	$Practice_Impacts_description = $_POST['Practice_Impacts_description'];
	$Teaching_Impacts_description = $_POST['Teaching_Impacts_description'];

	//檢查
	//echo "success".$academic_year[0]."   ";
	for($i=0; $i<count($program); $i++){ //學年度授課
		if( $program[$i]=="" || $academic_year[$i]=="" || $semester[$i]=="" || $course_title[$i]=="" || $credit_hour[$i]==""){
			my_msg('學年度授課未輸入資料!','result.php');
			echo $program[$i]."  ".$academic_year[$i]."   ".$semester[$i]."    ". $course_title[$i]."    ".$credit_hour[$i];
		}else{
			//echo "success".$i;
		}
	}	
	for($i=0; $i<count($service_type); $i++){ //學術服務
		if($service_Year[$i]==""|| $service_type[$i]==""|| $service_description[$i]==""){
			my_msg('學術服務未輸入資料!','result.php');
		}else{

		}
	}	
	for($i=0; $i<count($most_rank); $i++){ //Peer-reviewed Journals
		if($Peer_reviewed_year[$i]==""|| $Peer_reviewed_topic[$i]==""|| $Peer_reviewed_description[$i]==""|| $most_rank[$i]==""|| $portfolio[$i]==""){
			my_msg('Peer-reviewed Journals未輸入資料!','result.php');
		}else{

		}
	}
	for($i=0; $i<count($Research_Monographs_type); $i++){ //Research Monographs
		if($Research_Monographs_year[$i]==""|| $Research_Monographs_type[$i]==""|| $Research_Monographs_topic[$i]==""|| $Research_Monographs_description[$i]==""){
			my_msg('Research Monographs未輸入資料!','result.php');
		}else{

		}
	}
	for($i=0; $i<count($Meeting_Proceedings_And_Other_type); $i++){ //Academic Meeting Proceedings	
		if($Meeting_Proceedings_And_Other_year[$i]==""|| $Meeting_Proceedings_And_Other_type[$i]==""|| $Meeting_Proceedings_And_Other_topic[$i]==""){
			my_msg('Academic Meeting Proceedings未輸入資料!','result.php');
		}else{

		}
	}
	/*
	for($i=0; $i<count($Professional_Meeting_Proceedings_type); $i++){ //Professional Meeting Proceedings
		if($Professional_Meeting_Proceedings_year[$i]==""|| $Professional_Meeting_Proceedings_type[$i]==""|| $Professional_Meeting_Proceedings_topic[$i]==""){
			my_msg('Professional Meeting Proceedings未輸入資料!','result.php');
		}else{

		}
	}	
	*/
	for($i=0; $i<count($Textbooks_Chapters_type); $i++){ //Textbooks/Chapters
		if($Textbooks_Chapters_year[$i]==""|| $Textbooks_Chapters_type[$i]==""|| $Textbooks_Chapters_topic[$i]==""){
			my_msg('Textbooks/Chapters未輸入資料!','result.php');
		}else{

		}	
	}	
	for($i=0; $i<count($Cases_type); $i++){ //Cases
		if($Cases_year[$i]==""|| $Cases_type[$i]==""|| $Cases_topic[$i]==""|| $Cases_description[$i]==""){
			my_msg('Cases未輸入資料!','result.php');
		}else{

		}
	}
	for($i=0; $i<count($Other_Teaching_Materials_type); $i++){ //Other Teaching Materials
		if($Other_Teaching_Materials_year[$i]==""|| $Other_Teaching_Materials_type[$i]==""|| $Other_Teaching_Materials_title[$i]==""){
			my_msg('Other Teaching Materials未輸入資料!','result.php');
		}else{

		}
	}		
	for($i=0; $i<count($Honors_Competitive_Awards_Received_type); $i++){ //Honors and Competitive Awards Received
		if($Honors_Competitive_Awards_Received_year[$i]==""|| $Honors_Competitive_Awards_Received_type[$i]==""|| $Honors_Competitive_Awards_Received_title[$i]==""){
			my_msg('Honors and Competitive Awards Received未輸入資料!','result.php');
		}else{

		}	
	}
	for($i=0; $i<count($Professional_History_title); $i++){ //業界經歷
		if($Professional_History_month_year[$i]==""|| $Professional_History_title[$i]==""|| $Professional_History_department[$i]==""|| $Professional_History_section[$i]==""){
			my_msg('業界經歷未輸入資料!','result.php');
		}else{

		}
	}
	for($i=0; $i<count($Professional_Development_type); $i++){ //業界發展
		if($Professional_Development_month_year[$i]==""|| $Professional_Development_type[$i]==""|| $Professional_Development_topic[$i]==""){
			my_msg('業界發展未輸入資料!','result.php');
		}else{

		}
	}
	for($i=0; $i<count($Professional_Societies_topic); $i++){ //業界團體
		if($Professional_Societies_year[$i]==""|| $Professional_Societies_topic[$i]==""|| $Professional_Societies_description[$i]==""){
			my_msg('業界團體未輸入資料!','result.php');
		}else{

		}
	}	


		//my_msg('未輸入資料!', 'result.php');
		
		//影響力描述修改
		$sql_Professor_Information_Impacts = "UPDATE Professor_Information SET Research_Impacts = '$Research_Impacts_description',Practice_Impacts = '$Practice_Impacts_description',Teaching_Impacts = '$Teaching_Impacts_description' WHERE Id = '$teacherID'";
		mysqli_query($con, $sql_Professor_Information_Impacts);
		
		//學年度授課修改
		$sql_Course_Taught_Num="select * from Course_Taught where Professor_Id='$teacherID'";
		$result_Course_Taught=mysqli_query($con, $sql_Course_Taught_Num);
		for($i=0; $i<mysqli_num_rows($result_Course_Taught); $i++){ //把每一列的資料取出來
		
			$sql_Course_Taught = "UPDATE Course_Taught SET Program = '$program[$i]',Academic_Year = '$academic_year[$i]',Semester = '$semester[$i]',Course_Title = '$course_title[$i]',Credit_Hour = '$credit_hour[$i]'  WHERE Id = '$course_id[$i]'";
			mysqli_query($con,$sql_Course_Taught);
		}

		//學術服務修改
		$sql_Academic_Services_Num="select * from Academic_Services where Professor_Id='$teacherID'";
		$result_Academic_Services=mysqli_query($con,$sql_Academic_Services_Num);
		for($i=0; $i<mysqli_num_rows($result_Academic_Services); $i++){ //把每一列的資料取出來
		
			$sql_Academic_Services = "UPDATE Academic_Services SET Services_Year = '$service_Year[$i]',Service_Type = '$service_type[$i]',Description = '$service_description[$i]'  WHERE Id = '$service_ID[$i]'";
				
			mysqli_query($con,$sql_Academic_Services);
		}
		
		//Peer-reviewed Journals*
		$sql_Peer_reviewed_Journals_Num="select * from Peer_reviewed_Journals where Professor_Id='$teacherID'";
		$result_Peer_reviewed_Journals=mysqli_query($con,$sql_Peer_reviewed_Journals_Num);
		for($i=0; $i<mysqli_num_rows($result_Peer_reviewed_Journals); $i++){ //把每一列的資料取出來
		
			$sql_Peer_reviewed_Journals = "UPDATE Peer_reviewed_Journals SET Reviewed_Year = '$Peer_reviewed_year[$i]',Topic = '$Peer_reviewed_topic[$i]',Description = '$Peer_reviewed_description[$i]',Download_Number = '$Peer_reviewed_download_number[$i]',Status = '$Peer_reviewed_status[$i]',MOST_Rank='$most_rank[$i]',Portfolio='$portfolio[$i]',Citation_Index='$citation_index[$i]',Browses='$browses[$i]',Supported_by='$supported_by[$i]'  WHERE Id = '$Peer_reviewed_id[$i]'";
			
			mysqli_query($con,$sql_Peer_reviewed_Journals);
		}

		//Research Monographs
		$sql_Research_Monographs_Num="select * from Research_Monographs where Professor_Id='$teacherID'";
		$result_sql_Research_Monographs=mysqli_query($con,$sql_Research_Monographs_Num);
		for($i=0; $i<mysqli_num_rows($result_sql_Research_Monographs); $i++){ //把每一列的資料取出來
		
			$sql_Research_Monographs = "UPDATE Research_Monographs SET Research_Year = '$Research_Monographs_year[$i]',Research_Type = '$Research_Monographs_type[$i]',Topic = '$Research_Monographs_topic[$i]',Description = '$Research_Monographs_description[$i]',Download_Number = '$Research_Monographs_download_number[$i]',Status='$Research_Monographs_status[$i]',Browses='$Research_Monographs_browses[$i]',Supported_by='$Research_Monographs_supported_by[$i]'  WHERE Id = '$Research_Monographs_Id[$i]'";

			mysqli_query($con,$sql_Research_Monographs);
		}

		//Academic Meeting Proceedings
		$sql_Meeting_Proceedings_And_Other_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Meeting Proceedings'";
		$result_sql_Meeting_Proceedings_And_Other=mysqli_query($con,$sql_Meeting_Proceedings_And_Other_Num);
		for($i=0; $i<mysqli_num_rows($result_sql_Meeting_Proceedings_And_Other); $i++){ //把每一列的資料取出來
		
			$sql_Meeting_Proceedings_And_Other = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Meeting_Proceedings_And_Other_year[$i]',Meeting_Type = '$Meeting_Proceedings_And_Other_type[$i]',Topic = '$Meeting_Proceedings_And_Other_topic[$i]',Description = '$Meeting_Proceedings_And_Other_description[$i]'  WHERE Id = '$Meeting_Proceedings_And_Other_Id[$i]'";

			mysqli_query($con,$sql_Meeting_Proceedings_And_Other);
		}
		/*
		//Professional Meeting Proceedings
		$sql_Professional_Meeting_Proceedings_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Meeting Proceedings'";
		$result_Professional_Meeting_Proceedings=mysqli_query($con,$sql_Professional_Meeting_Proceedings_Num);
		for($i=0; $i<mysqli_num_rows($result_Professional_Meeting_Proceedings); $i++){ //把每一列的資料取出來
		
			$sql_Professional_Meeting_Proceedings = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Professional_Meeting_Proceedings_year[$i]',Meeting_Type = '$Professional_Meeting_Proceedings_type[$i]',Topic = '$Professional_Meeting_Proceedings_topic[$i]',Description = '$Professional_Meeting_Proceedings_description[$i]'  WHERE Id = '$Professional_Meeting_Proceedings_Id[$i]'";

			mysqli_query($con,$sql_Professional_Meeting_Proceedings);
		}
		*/
		//Textbooks/Chapters
		$sql_Textbooks_Chapters_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Textbooks/Chapters'";
		$result_Textbooks_Chapters=mysqli_query($con,$sql_Textbooks_Chapters_Num);
		for($i=0; $i<mysqli_num_rows($result_Textbooks_Chapters); $i++){ //把每一列的資料取出來
		
			$sql_Textbooks_Chapters = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Textbooks_Chapters_year[$i]',Meeting_Type = '$Textbooks_Chapters_type[$i]',Topic = '$Textbooks_Chapters_topic[$i]',Description = '$Textbooks_Chapters_description[$i]'  WHERE Id = '$Textbooks_Chapters_Id[$i]'";
		
			mysqli_query($con,$sql_Textbooks_Chapters);
		}

		//Cases
		$sql_Cases_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Cases'";
		$result_Cases=mysqli_query($con,$sql_Cases_Num);
		for($i=0; $i<mysqli_num_rows($result_Cases); $i++){ //把每一列的資料取出來
		
			$sql_Cases = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Cases_year[$i]',Meeting_Type = '$Cases_type[$i]',Topic = '$Cases_topic[$i]',Description = '$Cases_description[$i]'  WHERE Id = '$Cases_Id[$i]'";
		

			mysqli_query($con,$sql_Cases);
		}

		//Other Teaching Materials
		$sql_Other_Teaching_Materials_Num="select * from Teaching_Materials_And_Awards where Professor_Id='$teacherID' && Contributions_name = 'Other Teaching Materials'";
		$result_Other_Teaching_Materials=mysqli_query($con,$sql_Other_Teaching_Materials_Num);
		for($i=0; $i<mysqli_num_rows($result_Other_Teaching_Materials); $i++){ //把每一列的資料取出來
		
			$sql_Other_Teaching_Materials = "UPDATE Teaching_Materials_And_Awards SET Teaching_Materials_And_Awards_Year = '$Other_Teaching_Materials_year[$i]',Teaching_Materials_And_Awards_Type = '$Other_Teaching_Materials_type[$i]',Title = '$Other_Teaching_Materials_title[$i]'  WHERE Id = '$Other_Teaching_Materials_Id[$i]'";

			mysqli_query($con,$sql_Other_Teaching_Materials);
		}

		//Honors and Competitive Awards Received
		$sql_Honors_Competitive_Awards_Received_Num="select * from Teaching_Materials_And_Awards where  Professor_Id='$teacherID' && Contributions_name = 'Honors and Competitive Awards Received'";
		$result_Honors_Competitive_Awards_Received=mysqli_query($con,$sql_Honors_Competitive_Awards_Received_Num);
		for($i=0; $i<mysqli_num_rows($result_Honors_Competitive_Awards_Received); $i++){ //把每一列的資料取出來
		
			$sql_Honors_Competitive_Awards_Received = "UPDATE Teaching_Materials_And_Awards SET Teaching_Materials_And_Awards_Year = '$Honors_Competitive_Awards_Received_year[$i]',Teaching_Materials_And_Awards_Type = '$Honors_Competitive_Awards_Received_type[$i]',Title = '$Honors_Competitive_Awards_Received_title[$i]'  WHERE Id = '$Honors_Competitive_Awards_Received_Id[$i]'";
		
			mysqli_query($con,$sql_Honors_Competitive_Awards_Received);
		}

		//業界經歷
		$sql_Professional_History_Num="select * from Professional_History  where Professor_Id='$teacherID'";
		$result_Professional_History=mysqli_query($con,$sql_Professional_History_Num);
		for($i=0; $i<mysqli_num_rows($result_Professional_History); $i++){ //把每一列的資料取出來
			$sql_Professional_History = "UPDATE Professional_History SET Month_Year = '$Professional_History_month_year[$i]',Title = '$Professional_History_title[$i]',Department = '$Professional_History_department[$i]',Professional_History_Section = '$Professional_History_section[$i]',Company_name = '$Professional_History_company[$i]'  WHERE Id = '$Professional_History_Id[$i]'";

			mysqli_query($con,$sql_Professional_History);
		}
		
		//業界發展
		$sql_Professional_Development_Num="select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Development'";
		$result_Professional_Development=mysqli_query($con,$sql_Professional_Development_Num);
		for($i=0; $i<mysqli_num_rows($result_Professional_Development); $i++){ //把每一列的資料取出來
		
				$sql_Professional_Development = "UPDATE Meeting_Proceedings_And_Other SET Meeting_Year = '$Professional_Development_month_year[$i]',Meeting_Type = '$Professional_Development_type[$i]',Topic = '$Professional_Development_topic[$i]',Description = '$Professional_Development_description[$i]' WHERE Id = '$Professional_Development_Id[$i]'";
				mysqli_query($con,$sql_Professional_Development);
		}

		//業界團體
		$sql_Professional_Societies_Num="select * from Professional_Societies where Professor_Id='$teacherID'";
		$result_Professional_Societies=mysqli_query($con,$sql_Professional_Societies_Num);
		for($i=0; $i<mysqli_num_rows($result_Professional_Societies); $i++){ //把每一列的資料取出來
		
					$sql_Professional_Societies = "UPDATE Professional_Societies SET Professional_Societies_Year = '$Professional_Societies_year[$i]',Topic = '$Professional_Societies_topic[$i]',Description = '$Professional_Societies_description[$i]' WHERE Id = '$Professional_Societies_Id[$i]'";
					mysqli_query($con,$sql_Professional_Societies);
		}

		mysqli_close($con);
		my_msg('修改成功', 'result.php');
		//header("location: result.php");

		
?>