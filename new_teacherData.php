<!DOCTYPE html>
<html lang="zh-tw">
    <!--去除超連結底線-->
    <style>
        a{
            text-decoration:none;
        }
    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="Keywords" content="" />
        <meta name="Description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Script-Type" content="text/javascript" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <link href="qa_layout.css" rel="stylesheet" type="text/css" />

        <!--Importing Database Script-->
        <?php 
			include("connection.php");
			session_start();
			if($_POST['teacher_ID']!=null) {
			  $teacherID = $_POST['teacher_ID'];
			  $_SESSION['teacherID']=$teacherID;	
			  //echo "not null";
			}
			else{
			//   echo "null!";
			//   echo $teacherID;
			//   echo "null!";
			//   echo $_SESSION['teacherID'];
			  $teacherID = $_SESSION['teacherID'];
			//   echo "null!";
			}
			$today = date('Y-m-d') ;
			
		?>
		<style>/*回到頂部*/
			/* Go Top 按鈕 */
			#goTop {
			position: fixed;
			bottom: 5px; /* 與下方的距離, 也可改為百分比, 即為距離螢幕下方的百分比 */
			right: 5px; /* 與右方的距離 */
			width: 40px; /* 按鈕原始寬度 */
			height: 40px; /* 按鈕原始高度 */
			opacity: 0.4; /* 按鈕原始透明度 */
			z-index: 10;
			cursor: pointer;
	
			}
			#goTop:hover { /* 滑鼠經過按鈕時 */
			opacity: 1; /* 透明度 */
			width: 80px; /* 按鈕寬度 */
			height: 80px; /* 按鈕高度 */
			}
		</style>
    </head>

    <script type="text/javascript">
		//捉現在時間	
// 		var Today=new Date();
// 　		document.write("今天日期是 " + Today.getFullYear()+ " 年 " + (Today.getMonth()+1) + " 月 " + Today.getDate() + " 日");
        function Course_Taught_Program_add_new_data() {
            var Course_Taught_Program_num = document.getElementById("Course_Taught_Program").rows.length;
            var Course_Taught_Program_Tr = document.getElementById("Course_Taught_Program").insertRow(Course_Taught_Program_num);
  
            Td = Course_Taught_Program_Tr.insertCell(Course_Taught_Program_Tr.cells.length);
            Td.innerHTML ='<select name="program[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Course_Taught_Program'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Course_Taught_Program_Tr.insertCell(Course_Taught_Program_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="academic_year[]" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Course_Taught_Program_Tr.insertCell(Course_Taught_Program_Tr.cells.length);
            Td.innerHTML ='<select name="semester[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Semester'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Course_Taught_Program_Tr.insertCell(Course_Taught_Program_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="course_title[]" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Course_Taught_Program_Tr.insertCell(Course_Taught_Program_Tr.cells.length);
            Td.innerHTML ='<select name="credit_hour[]><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Credit_hour'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            }
        function Course_Taught_Program_remove_data() {
            var Course_Taught_Program_num = document.getElementById("Course_Taught_Program").rows.length;
            if(Course_Taught_Program_num >1)
                document.getElementById("Course_Taught_Program").deleteRow(-1);
        }
        function Service_Type_add_new_data() {
            var Service_Type_num = document.getElementById("Service_Type").rows.length;
            var Service_Type_Tr = document.getElementById("Service_Type").insertRow(Service_Type_num);
            
            Td = Service_Type_Tr.insertCell(Service_Type_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="service_Year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Service_Type_Tr.insertCell(Service_Type_Tr.cells.length);
            Td.innerHTML ='<select name="service_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Service_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Service_Type_Tr.insertCell(Service_Type_Tr.cells.length);
            Td.innerHTML ='<textarea name="service_description[]" cols="30" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Service_Type_remove_data() {
            var Service_Type_num = document.getElementById("Service_Type").rows.length;
            if(Service_Type_num >1)
                document.getElementById("Service_Type").deleteRow(-1);
        }
        function Peer_reviewed_add_new_data() {
            var Peer_reviewed_num = document.getElementById("Peer_reviewed").rows.length;
            var Peer_reviewed_Tr = document.getElementById("Peer_reviewed").insertRow(Peer_reviewed_num);
            
            Td = Peer_reviewed_Tr.insertCell(Peer_reviewed_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Peer_reviewed_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Peer_reviewed_Tr.insertCell(Peer_reviewed_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Peer_reviewed_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';  
            Td = Peer_reviewed_Tr.insertCell(Peer_reviewed_Tr.cells.length);
            Td.innerHTML ='<textarea name="Peer_reviewed_description[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            Td = Peer_reviewed_Tr.insertCell(Peer_reviewed_Tr.cells.length);
            Td.innerHTML ='<select name="most_rank[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='MOST_Rank'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Peer_reviewed_Tr.insertCell(Peer_reviewed_Tr.cells.length);
            Td.innerHTML ='<select name="portfolio[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Portfolio'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Peer_reviewed_Tr.insertCell(Peer_reviewed_Tr.cells.length);
            Td.innerHTML ='<select name="citation_index[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Citation_Index'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            }
        function Peer_reviewed_remove_data() {
            var Peer_reviewed_num = document.getElementById("Peer_reviewed").rows.length;
            if(Peer_reviewed_num >1)
                document.getElementById("Peer_reviewed").deleteRow(-1);
        }
        function Research_Monographs_add_new_data() {
            var Research_Monographs_num = document.getElementById("Research_Monographs").rows.length;
            var Research_Monographs_Tr = document.getElementById("Research_Monographs").insertRow(Research_Monographs_num);
            
            Td = Research_Monographs_Tr.insertCell(Research_Monographs_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Research_Monographs_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Research_Monographs_Tr.insertCell(Research_Monographs_Tr.cells.length);
            Td.innerHTML ='<select name="Research_Monographs_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Research_Monographs_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Research_Monographs_Tr.insertCell(Research_Monographs_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Research_Monographs_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Research_Monographs_Tr.insertCell(Research_Monographs_Tr.cells.length);
            Td.innerHTML ='<textarea name="Research_Monographs_description[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Research_Monographs_remove_data() {
            var Research_Monographs_num = document.getElementById("Research_Monographs").rows.length;
            if(Research_Monographs_num >1)
                document.getElementById("Research_Monographs").deleteRow(-1);
        }
        function Meeting_Proceedings_And_Other_add_new_data() {
            var Meeting_Proceedings_And_Other_num = document.getElementById("Meeting_Proceedings_And_Other").rows.length;
            var Meeting_Proceedings_And_Other_Tr = document.getElementById("Meeting_Proceedings_And_Other").insertRow(Meeting_Proceedings_And_Other_num);
            
            Td = Meeting_Proceedings_And_Other_Tr.insertCell(Meeting_Proceedings_And_Other_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Meeting_Proceedings_And_Other_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Meeting_Proceedings_And_Other_Tr.insertCell(Meeting_Proceedings_And_Other_Tr.cells.length);
            Td.innerHTML ='<select name="Meeting_Proceedings_And_Other_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Academic_Meeting_Proceedings_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Meeting_Proceedings_And_Other_Tr.insertCell(Meeting_Proceedings_And_Other_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Meeting_Proceedings_And_Other_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Meeting_Proceedings_And_Other_Tr.insertCell(Meeting_Proceedings_And_Other_Tr.cells.length);
            Td.innerHTML ='<textarea name="Meeting_Proceedings_And_Other_description[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Meeting_Proceedings_And_Other_remove_data() {
            var Meeting_Proceedings_And_Other_num = document.getElementById("Meeting_Proceedings_And_Other").rows.length;
            if(Meeting_Proceedings_And_Other_num >1)
                document.getElementById("Meeting_Proceedings_And_Other").deleteRow(-1);
        }
        function Professional_Meeting_Proceedings_add_new_data() {
            var Professional_Meeting_Proceedings_num = document.getElementById("Professional_Meeting_Proceedings").rows.length;
            var Professional_Meeting_Proceedings_Tr = document.getElementById("Professional_Meeting_Proceedings").insertRow(Professional_Meeting_Proceedings_num);
            
            Td = Professional_Meeting_Proceedings_Tr.insertCell(Professional_Meeting_Proceedings_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_Meeting_Proceedings_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_Meeting_Proceedings_Tr.insertCell(Professional_Meeting_Proceedings_Tr.cells.length);
            Td.innerHTML ='<select name="Professional_Meeting_Proceedings_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Professional_Meeting_Proceedings_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Professional_Meeting_Proceedings_Tr.insertCell(Professional_Meeting_Proceedings_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_Meeting_Proceedings_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_Meeting_Proceedings_Tr.insertCell(Professional_Meeting_Proceedings_Tr.cells.length);
            Td.innerHTML ='<textarea name="Professional_Meeting_Proceedings_description[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Professional_Meeting_Proceedings_remove_data() {
            var Professional_Meeting_Proceedings_num = document.getElementById("Professional_Meeting_Proceedings").rows.length;
            if(Professional_Meeting_Proceedings_num >1)
                document.getElementById("Professional_Meeting_Proceedings").deleteRow(-1);
        }
        function Textbooks_Chapters_add_new_data() {
            var Textbooks_Chapters_num = document.getElementById("Textbooks_Chapters").rows.length;
            var Textbooks_Chapters_Tr = document.getElementById("Textbooks_Chapters").insertRow(Textbooks_Chapters_num);
            
            Td = Textbooks_Chapters_Tr.insertCell(Textbooks_Chapters_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Textbooks_Chapters_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Textbooks_Chapters_Tr.insertCell(Textbooks_Chapters_Tr.cells.length);
            Td.innerHTML ='<select name="Textbooks_Chapters_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Textbooks_Chapters_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Textbooks_Chapters_Tr.insertCell(Textbooks_Chapters_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Textbooks_Chapters_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Textbooks_Chapters_Tr.insertCell(Textbooks_Chapters_Tr.cells.length);
            Td.innerHTML ='<textarea name="Textbooks_Chapters_description[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Textbooks_Chapters_remove_data() {
            var Textbooks_Chapters_num = document.getElementById("Textbooks_Chapters").rows.length;
            if(Textbooks_Chapters_num >1)
                document.getElementById("Textbooks_Chapters").deleteRow(-1);
        }
        function Cases_add_new_data() {
            var Cases_num = document.getElementById("Cases").rows.length;
            var Cases_Tr = document.getElementById("Cases").insertRow(Cases_num);
            
            Td = Cases_Tr.insertCell(Cases_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Cases_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Cases_Tr.insertCell(Cases_Tr.cells.length);
            Td.innerHTML ='<select name="Cases_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Cases_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Cases_Tr.insertCell(Cases_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Cases_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Cases_Tr.insertCell(Cases_Tr.cells.length);
            Td.innerHTML ='<textarea name="Cases_description[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Cases_remove_data() {
            var Cases_num = document.getElementById("Cases").rows.length;
            if(Cases_num >1)
                document.getElementById("Cases").deleteRow(-1);
        }
        function Other_Teaching_Materials_add_new_data() {
            var Other_Teaching_Materials_num = document.getElementById("Other_Teaching_Materials").rows.length;
            var Other_Teaching_Materials_Tr = document.getElementById("Other_Teaching_Materials").insertRow(Other_Teaching_Materials_num);
            
            Td = Other_Teaching_Materials_Tr.insertCell(Other_Teaching_Materials_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Other_Teaching_Materials_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Other_Teaching_Materials_Tr.insertCell(Other_Teaching_Materials_Tr.cells.length);
            Td.innerHTML ='<select name="Other_Teaching_Materials_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Other_Teaching_Materials_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Other_Teaching_Materials_Tr.insertCell(Other_Teaching_Materials_Tr.cells.length);
            Td.innerHTML ='<textarea name="Other_Teaching_Materials_title[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Other_Teaching_Materials_remove_data() {
            var Other_Teaching_Materials_num = document.getElementById("Other_Teaching_Materials").rows.length;
            if(Other_Teaching_Materials_num >1)
                document.getElementById("Other_Teaching_Materials").deleteRow(-1);
        }
        function Honors_Competitive_Awards_Received_add_new_data() {
            var Honors_Competitive_Awards_Received_num = document.getElementById("Honors_Competitive_Awards_Received").rows.length;
            var Honors_Competitive_Awards_Received_Tr = document.getElementById("Honors_Competitive_Awards_Received").insertRow(Honors_Competitive_Awards_Received_num);
            
            Td = Honors_Competitive_Awards_Received_Tr.insertCell(Honors_Competitive_Awards_Received_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Honors_Competitive_Awards_Received_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Honors_Competitive_Awards_Received_Tr.insertCell(Honors_Competitive_Awards_Received_Tr.cells.length);
            Td.innerHTML ='<select name="Honors_Competitive_Awards_Received_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Honors_and_Competitive_Awards_Received_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Honors_Competitive_Awards_Received_Tr.insertCell(Honors_Competitive_Awards_Received_Tr.cells.length);
            Td.innerHTML ='<textarea name="Honors_Competitive_Awards_Received_title[]" cols="20" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Honors_Competitive_Awards_Received_remove_data() {
            var Honors_Competitive_Awards_Received_num = document.getElementById("Honors_Competitive_Awards_Received").rows.length;
            if(Honors_Competitive_Awards_Received_num >1)
                document.getElementById("Honors_Competitive_Awards_Received").deleteRow(-1);
        }
        function Professional_History_add_new_data() {
            var Professional_History_num = document.getElementById("Professional_History").rows.length;
            var Professional_History_Tr = document.getElementById("Professional_History").insertRow(Professional_History_num);
            
            Td = Professional_History_Tr.insertCell(Professional_History_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_History_month_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_History_Tr.insertCell(Professional_History_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_History_title[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_History_Tr.insertCell(Professional_History_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_History_department[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_History_Tr.insertCell(Professional_History_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_History_section[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_History_Tr.insertCell(Professional_History_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_History_company[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            }
        function Professional_History_remove_data() {
            var Professional_History_num = document.getElementById("Professional_History").rows.length;
            if(Professional_History_num >1)
                document.getElementById("Professional_History").deleteRow(-1);
        }
        function Professional_Development_add_new_data() {
            var Professional_Development_num = document.getElementById("Professional_Development").rows.length;
            var Professional_Development_Tr = document.getElementById("Professional_Development").insertRow(Professional_Development_num);
            
            Td = Professional_Development_Tr.insertCell(Professional_Development_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_Development_month_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_Development_Tr.insertCell(Professional_Development_Tr.cells.length);
            Td.innerHTML ='<select name="Professional_Development_type[]"><?php $data_avsAnswer = mysqli_query($con,"select * from avsAnswer where avsAnswer_Title='Professional_Development_Type'");for($j=0; $j<mysqli_num_rows($data_avsAnswer); $j++){ $avs=mysqli_fetch_row($data_avsAnswer);?><option name="academic_Title" value="<?php echo $avs[1]; ?>"><?php echo $avs[1]; ?></option><?php } ?></select>';
            Td = Professional_Development_Tr.insertCell(Professional_Development_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_Development_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_Development_Tr.insertCell(Professional_Development_Tr.cells.length);
            Td.innerHTML ='<textarea name="Professional_Development_description[]" cols="30" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';
            }
        function Professional_Development_remove_data() {
            var Professional_Development_num = document.getElementById("Professional_Development").rows.length;
            if(Professional_Development_num >1)
                document.getElementById("Professional_Development").deleteRow(-1);
        }
        function Professional_Societies_add_new_data() {
            var Professional_Societies_num = document.getElementById("Professional_Societies").rows.length;
            var Professional_Societies_Tr = document.getElementById("Professional_Societies").insertRow(Professional_Societies_num);
            
            Td = Professional_Societies_Tr.insertCell(Professional_Societies_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_Societies_year[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_Societies_Tr.insertCell(Professional_Societies_Tr.cells.length);
            Td.innerHTML ='<input type="text" name="Professional_Societies_topic[]" value="" style="width:100px; font-size:15px; text-align:center; text-overflow:ellipsis; overflow: hidden;"/>';
            Td = Professional_Societies_Tr.insertCell(Professional_Societies_Tr.cells.length);
            Td.innerHTML ='<textarea name="Professional_Societies_description[]" cols="40" rows="5" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;></textarea>';

            }
        function Professional_Societies_remove_data() {
            var Professional_Societies_num = document.getElementById("Professional_Societies").rows.length;
            if(Professional_Societies_num >1)
                document.getElementById("Professional_Societies").deleteRow(-1);
        }
		$(function(){
            // 伸縮效果
            // 幫 #qaContent 的 ul 子元素加上 .accordionPart
            // 接著再找出 li 中的第一個 div 子元素加上 .qa_title
            // 並幫其加上 hover 及 click 事件
            // 同時把兄弟元素加上 .qa_content 並隱藏起來
            $('#qaContent ul').addClass('accordionPart').find('li div:nth-child(1)').addClass('qa_title').hover(function(){
                $(this).addClass('qa_title_on');
            }, function(){
                $(this).removeClass('qa_title_on');
            }).click(function(){
                // 當點到標題時，若答案是隱藏時則顯示它，同時隱藏其它已經展開的項目
                // 反之則隱藏
                var $qa_content = $(this).next('div.qa_content');
                if(!$qa_content.is(':visible')){
                    $('#qaContent ul li div.qa_content:visible').slideUp();
                }
                $qa_content.slideToggle();
            }).siblings().addClass('qa_content').hide();
        });
    </script>
    <body>
        <div id="WRAPPER"> <!--白色區塊-->
                <div id="HEADER"></div>
				 <!--側邊選單-->
                <div id='SIDE'>
                    <fieldset>
                        <div><a href="createTea.php">履歷填寫</a></div><br/>
                        <div><a href="search_teacherData.php">搜尋教師資料</a></div><br/>
                        <div><a href="new_teacherData.php">新增教師資料</a></div><br/>
                        <div><a href="deleteInformation.php">刪除教師資料</a></div><br/>
                        <div><a href="result.php">回上一頁</a></div><br/>
                        <div><a href="logoutUnset.php">登出</a></div><br/>
                    </fieldset>
                </div>
                <?php
							session_start();
							$searchYear1 = $_SESSION['searchYear1'];
							$searchYear2 = $_SESSION['searchYear2'];
							
							echo'<br>';
							//echo $_SESSION['yearWrong'];
							// echo $_SESSION['teacherID'];
							echo'<br>';
                             
							unset($_SESSION['yearWrong']);
							unset($_SESSION['$searchYear1']);
                            unset($_SESSION['$searchYear2']);
                            
					?>
				
	            <div style="width:800px; height:100%; margin:0 auto 0 185px; text-align:center; line-height:50px;">

				  <div id="qaContent">
	                    <!--個人資料-->
                    <form action="dataAdded.php" name="createTea" method="post">
                            <div style='text-align:right;'>
							<input type="submit"  name="submit_Btn1"  id="submit_Btn1" value="提交" style="width:80px;height:40px;font-size:15px;" value="修改" onClick="document.form1.submit()">
                            </div>
                            
                            <!--學年度授課 style="border:3px #cccccc solid;"-->  
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">學年度授課 ▾</div>
									    <div class="qa_content">
                                            <table id="Course_Taught_Program" width="790"  border="1" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>Program</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Academic Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Semester</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Course Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Credit hour</b></td>
                                                </tr>     
                                                    <input type="button" value="增加 +" onclick="Course_Taught_Program_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Course_Taught_Program_remove_data()"><br/>
                                            </table>
                                        </div>
                                </li>
                            </ul>
                            <!--學術服務--> 
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">學術服務 ▾</div>
									    <div class="qa_content">
                                            <table id=Service_Type width="790" border="1"  style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Service Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description (Title, Institute/Unit, etc.)</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Service_Type_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Service_Type_remove_data()"><br/>
                                            </table>
                                        </div>
                                </li>
                            </ul>
                            <!--研究產出-->
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">研究產出 ▾</div>
									    <div class="qa_content">
												
                                            <h4>Peer-reviewed Journals</h4> <!--小分類-->			
                                            <table id=Peer_reviewed  width="790" border="1" style="font-size:15px">
                                                <tr>
													
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,etc)</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>MOST Rank</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>PortfolioICs</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Citation Index</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Peer_reviewed_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Peer_reviewed_remove_data()"><br/>
                                            </table>						
                                            <h4>Research Monographs</h4> <!--小分類-->
                                            <table id=Research_Monographs width="790" border="1" style="font-size:15px">
                                                <tr>                      
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,etc.)</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Research_Monographs_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Research_Monographs_remove_data()"><br/>
                                            </table>
													
                                            <h4>Academic and Professional Meeting Proceedings</h4> <!--小分類-->
								
                                            <table id=Meeting_Proceedings_And_Other width="790" border="1" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Meeting_Proceedings_And_Other_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Meeting_Proceedings_And_Other_remove_data()"><br/>
                                            </table>
																		
                                            <h4>Textbooks/Chapters</h4> <!--小分類-->
									
                                            <table id=Textbooks_Chapters width="790" border="1" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Textbooks_Chapters_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Textbooks_Chapters_remove_data()"><br/>
                                            </table>
						

                                            <h4>Cases</h4> <!--小分類-->
								
                                            <table id=Cases width="790" border="1" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Cases_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Cases_remove_data()"><br/>
                                            </table>
								

                                            <h4>Other Teaching Materials</h4> <!--小分類-->
						
                                            <table id=Other_Teaching_Materials width="790" border="1" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                </tr> 
                                                    <input type="button" value="增加 +" onclick="Other_Teaching_Materials_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Other_Teaching_Materials_remove_data()"><br/>
                                            </table>
								

                                            <h4>Honors and Competitive Awards Received</h4> <!--小分類-->
									
                                            <table id=Honors_Competitive_Awards_Received width="790" border="1" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Honors_Competitive_Awards_Received_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Honors_Competitive_Awards_Received_remove_data()"><br/>
                                            </table>
											
                                        </div>
                                </li>
                            </ul>
                            <!--業界-->
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">業界 ▾</div>
									    <div class="qa_content">
                                            <h4>Professional History</h4> <!--小分類-->
                                            <table id=Professional_History width="790" border="1" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Unit / Department</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Section / College</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Company / Foundation</b></td>
                                                </tr> 
                                                    <input type="button" value="增加 +" onclick="Professional_History_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Professional_History_remove_data()"><br/>
                                            </table>
										

                                            <h4>Professional Development</h4> <!--小分類-->
                                            <table id=Professional_Development width="790" border="1" style="font-size:15px">
                                                <tr>                                       
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description (institute/unit, etc.)</b></td>
                                                </tr>         
                                                    <input type="button" value="增加 +" onclick="Professional_Development_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Professional_Development_remove_data()"><br/>
                                            </table>
								

                                            <h4>Professional Societies</h4> <!--小分類-->
                                            <table id=Professional_Societies width="790" border="1" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(society/association/unit/agency)</b></td>
                                                </tr>
                                                    <input type="button" value="增加 +" onclick="Professional_Societies_add_new_data()">&nbsp;
                                                    <input type="button" value="減少 −" onclick="Professional_Societies_remove_data()"><br/>               
                                            </table>		
                                        </div>
                                </li>
                            </ul>
							</form>
                    </div>
	            </div>
        </div>
        <div id="FOOTER"></div>
		<img id="goTop" src="images/goTop.png" title="Back to Top"/>
		<script> //回到頂部
			$.extend($.easing, {
			easeOutExpo: function (x, t, b, c, d) {
			return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
			}
			});
			$("#goTop").click(function(){
			$("html, body").animate({scrollTop: 0}, 1000, "easeOutExpo");
			});
		</script>
    </body>
</html>