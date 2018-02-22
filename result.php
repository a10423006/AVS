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
			include_once("connection.php");
			session_start();
			if($_POST['teacher_ID']!=null) {
			  $teacherID = $_POST['teacher_ID'];
			  $_SESSION['teacherID']=$teacherID;	
			  echo "not null";
			}
			else{
			  echo "null!";
			  echo $teacherID;
			  echo "null!";
			  echo $_SESSION['teacherID'];
			  $teacherID = $_SESSION['teacherID'];
			  echo "null!";
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
		var Today=new Date();
　		document.write("今天日期是 " + Today.getFullYear()+ " 年 " + (Today.getMonth()+1) + " 月 " + Today.getDate() + " 日");
        
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
                        <div><a href="createTea.php">問卷填寫</a></div><br/>
                        <div><a href="search_teacherData.php">搜尋教師資料</a></div><br/>
                        <div><a href="admanage.php?op=courseset_form&set=stupload_form">修改教師資料</a></div><br/>
                        <div><a href="depmanage.php?op=logout">登出</a></div><br/>
                    </fieldset>
                </div>
                <!--時間-->
				<div>
				    <br/>
                    <form action="searchYear.php" method="post">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;輸入要搜尋的日期:
                        <input name="searchYear1" type="date" value="<?php echo $today; ?>" />
                        <label>~</label>
                        <input name="searchYear2" type="date" value="<?php echo $today; ?>"/>
                        
                        <input type="submit" name="submit_Btn"  id="submit_Btn"  img  src="images/search.png"  onClick="document.form1.submit()">
                    </form>
					<?php
							session_start();
							$searchYear1 = $_SESSION['searchYear1'];
							$searchYear2 = $_SESSION['searchYear2'];
							
							echo'<br>';
							echo $_SESSION['yearWrong'];
							echo $_SESSION['teacherID'];
							echo'<br>';
						
							unset($_SESSION['yearWrong']);
							unset($_SESSION['$searchYear1']);
							unset($_SESSION['$searchYear2']);
					?>
				</div>
				
	            <div style="width:800px; height:100%; margin:0 auto 0 185px; text-align:center; line-height:50px;">

				  <div id="qaContent">
	                    <!--個人資料-->
							<form action="dataModify_teacher.php" name="form1" method="post">
                            <div style='text-align:right;'>
							<input type="submit"  name="submit_Btn1"  id="submit_Btn1" style="font-weight:bold;width:80px;height:40px;font-size:30px;" onClick="document.form1.submit()">
                            </div>	
	                        <ul class="accordionPart">

		                        <li>
                                    <div class="qa_title" style="text-decoration:none;">個人資料 ▾</div>
									
                                    <?php $data = mysql_fetch_row(mysql_query("select * from Professor_Information where id='$teacherID'", $conn)); ?>
			                        <div class="qa_content">
                                        <table width="790" bgcolor="black" style="font-size:15px">
                                            <tr>
                                                <td colspan="4" bgcolor="#FFFFFF">
                                                    <input type="text" name="name" value="<?php echo $data[1]; ?>"
                                                        style="width:250px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Academic Title</b></td>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Center</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#FFFFFF">
                                                    <input type="text" name="academic_Title" value="<?php echo $data[2]; ?>"
                                                        style="width:250px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                <td colspan="2" bgcolor="#FFFFFF">
                                                    <input type="text" name="center" value="<?php echo $data[3]; ?>" 
                                                        style="width:250px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Department 科系</b></td>
                                                <td colspan="2" bgcolor="#FFFFFF">
                                                    <input type="text" name="department" value="<?php echo $data[4]; ?>" 
                                                        style="width:250px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>College 學院</b></td>
                                                <td colspan="2" bgcolor="#FFFFFF">
                                                    <input type="text" name="college" value="<?php echo $data[5]; ?>" 
                                                        style="width:250px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" bgcolor="#FFFFFF">National Chung Cheng University 國立中正大學</td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>Phone 電話</b></td>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <input type="text" name="phone" value="<?php echo $data[7]; ?>" 
                                                        style="width:200px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>Cell</b></td>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <input type="text" name="cell" value="<?php echo $data[8]; ?>" 
                                                        style="width:200px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>E-mail</b></td>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <input type="text" name="email" value="<?php echo $data[9]; ?>" 
                                                        style="width:200px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>Website</b></td>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <input type="text" name="website" value="<?php echo $data[10]; ?>" 
                                                        style="width:200px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" bgcolor="#e3e3e3"><b>Education (Highest Degree)</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <input type="text" name="edu_Degree" value="<?php echo $data[11]; ?>"
                                                        style="width:100px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <input type="text" name="edu_Year" value="<?php echo $data[12]; ?>"
                                                        style="width:100px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                                <td colspan="2" bgcolor="#FFFFFF">
                                                    <input type="text" name="edu_Major" value="<?php echo $data[13]; ?>"
                                                        style="width:300px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/><p>
                                                    <input type="text" name="edu_Department" value="<?php echo $data[14]; ?>"
                                                        style="width:300px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/><p>
                                                    <input type="text" name="edu_School" value="<?php echo $data[15]; ?>"
                                                        style="width:300px; font-size:15px; text-align:center; 
                                                            text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" bgcolor="#e3e3e3"><b>Faculty Responsibilities</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" bgcolor="#FFFFFF">
                                                    <textarea cols="30" rows="3" name="faculty_responsibilities" 
                                                        style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        <?php echo $data[16]; ?>
                                                    </textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Faculty Sufficiency</b></td>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                    <input type="text" name="faculty_sufficiency" value="<?php echo $data[17]; ?>" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Time Devoted to Mission</b></td>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                    <input type="text" name="time_devoted_mission" value="<?php echo $data[18]; ?>" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Faculty Qualification</b></td>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                    <input type="text" name="faculty_qualification" value="<?php echo $data[19]; ?>" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Description</b></td>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                    <textarea cols="30" rows="3" name="faculty_description" 
                                                        style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        <?php echo $data[20]; ?>
                                                    </textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Normal Professional Responsibilities</b></td>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                    <input type="text" name="normal_professional_responsibilities" value="<?php echo $data[21]; ?>" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Portfolio of Intellectual Contributions</b></td>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>Types of Intellectual Contributions</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>BDS,    AIS, TLS</b></td>
                                                <td colspan="2" bgcolor="#e3e3e3"><b>PRJs, RMs,	A/P, MPs,	CRARs,	TBs,	Cases,	Other TMs,	Other IC Type</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                        <input type="text" name="portfolio_of_intellectual_contributions"
                                                            value="<?php echo $data[22].", ".$data[23].", ".$data[24]; ?>" 
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                                <td colspan="2" bgcolor="FFFFFF">
                                                        <input type="text" name="types_of_intellectual_contributions"
                                                            value="<?php echo $data[25].", ".$data[26].", ".$data[27].", ".$data[28].", ".$data[29].", ".$data[30].", ".$data[31].", ".$data[32]; ?>" 
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" bgcolor="#e3e3e3"><b>Academic/Teaching Interests</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" bgcolor="FFFFFF">
                                                    <textarea cols="30" rows="3" name="teaching_interests" 
                                                    style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        <?php echo $data[33]; ?>
                                                    </textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
		                        </li>
								
                            </ul>
							</form>

                            <!--學年度授課-->
							<form action="dataModify.php" name="form2" method="post">
                            <div style='text-align:right;'>    
							<input type="submit"  name="submit_Btn2"  id="submit_Btn2" style="font-weight:bold;width:80px;height:40px;font-size:30px;"  onClick="document.form2.submit()">
                            </div>  
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">學年度授課 ▾</div>
                                    <?php $data = mysql_query("select * from Course_Taught where Professor_Id='$teacherID'", $conn); ?>
									    <div class="qa_content">
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Program</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Academic Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Semester</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Course Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Credit hour</b></td>
                                                </tr>
                                                <?php
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="course_id[]"  onfocus="blur()"   value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="program[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="academic_year[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="semester[]" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="course_title[]" value="<?php echo $rs[4] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="credit_hour[]" value="<?php echo $rs[5] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                </li>
                            </ul>
                            </form>
                            <!--學術服務-->
							<form action="dataModify.php" name="form3" method="post">
                            <div style='text-align:right;'>
							<input type="submit"  name="submit_Btn3"  id="submit_Btn3" style="font-weight:bold;width:80px;height:40px;font-size:30px;"  onClick="document.form3.submit()">
                            </div>  
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">學術服務 ▾</div>
                                    <?php $data = mysql_query("select * from Academic_Services where Professor_Id='$teacherID'", $conn); ?>
									    <div class="qa_content">
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Service Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description (Title, Institute/Unit, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="service_ID[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="service_Year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="service_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea name="service_description[]">
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                </li>
                            </ul>
							</form>

                            <!--研究產出-->
                            <div style='text-align:right;'>
						    <input type="submit"  name="submit_Btn4"  id="submit_Btn4" style="font-weight:bold;width:80px;height:40px;font-size:30px;" onClick="document.form4.submit()">
                            </div>  
                            <form action="dataModify.php" name="form4" method="post">
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">研究產出 ▾</div>
									    <div class="qa_content">
												
                                            <h4>Peer-reviewed Journals</h4> <!--小分類-->
											
											
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,Journal,etc.-APA format)</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Download Number</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Status</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Peer_reviewed_Journals where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Peer_reviewed_id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Peer_reviewed_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_topic[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Peer_reviewed_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_download_number[]" value="<?php echo $rs[4] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_status[]" value="<?php echo $rs[5] ?>"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>MOST Rank</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Portfolio</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Citation Index</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Browses</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Supported by</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Professor_Id</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Peer_reviewed_Journals where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="most_rank[]" value="<?php echo $rs[6] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="portfolio[]" value="<?php echo $rs[7] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="citation_index[]" value="<?php echo $rs[8] ?>"
                                                            style="width:60px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="browses[]" value="<?php echo $rs[9] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="supported_by[]" value="<?php echo $rs[10] ?>"
                                                            style="width:150px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
														<td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professor_Id"  onfocus="blur()" value="<?php echo $rs[11] ?>"
                                                            style="width:50px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>	
                                            </table>
											
											
												
                                            <h4>Research Monographs</h4> <!--小分類-->
									
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,sponsor,etc.)</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Download Number</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Status</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Research_Monographs where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Research_Monographs_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Research_Monographs_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_topic[]" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Research_Monographs_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_download_number[]" value="<?php echo $rs[5] ?>"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_status[]" value="<?php echo $rs[6] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan="3" bgcolor="#e3e3e3"><b>Browses</b></td>
                                                    <td colspan="3" bgcolor="#e3e3e3"><b>Supported by</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Professor_Id</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Research_Monographs where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="3" bgcolor="#FFFFFF">
                                                        <input type="text" name="Research_Monographs_browses[]" value="<?php echo $rs[7] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="3" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_supported_by[]" value="<?php echo $rs[8] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
														<td colspan="3" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professor_Id"  onfocus="blur()" value="<?php echo $rs[9] ?>"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
									
											
												
                                            <h4>Academic Meeting Proceedings</h4> <!--小分類-->
								
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Academic Meeting Proceedings'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Meeting_Proceedings_And_Other_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Meeting_Proceedings_And_Other_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_topic[]" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Meeting_Proceedings_And_Other_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
									

                                            <h4>Professional Meeting Proceedings</h4> <!--小分類-->
							
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Meeting Proceedings'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Meeting_Proceedings_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Meeting_Proceedings_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_topic[]" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Professional_Meeting_Proceedings_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								
											
                                            <h4>Textbooks/Chapters</h4> <!--小分類-->
									
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Textbooks/Chapters'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Textbooks_Chapters_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Textbooks_Chapters_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_topic[]" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Textbooks_Chapters_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
						

                                            <h4>Cases</h4> <!--小分類-->
								
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Cases'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Cases_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Cases_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_topic[]" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Cases_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								

                                            <h4>Other Teaching Materials</h4> <!--小分類-->
						
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Teaching_Materials_And_Awards where Professor_Id='$teacherID' && Contributions_name = 'Other Teaching Materials'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Other_Teaching_Materials_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Other_Teaching_Materials_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Other_Teaching_Materials_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Other_Teaching_Materials_title[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								

                                            <h4>Honors and Competitive Awards Received</h4> <!--小分類-->
									
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Teaching_Materials_And_Awards where  Professor_Id='$teacherID' && Contributions_name = 'Honors and Competitive Awards Received'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Honors_Competitive_Awards_Received_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Honors_Competitive_Awards_Received_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Honors_Competitive_Awards_Received_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Honors_Competitive_Awards_Received_title[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
											
                                        </div>
                                </li>
                            </ul>
                            </form>
                            <!--業界-->
                            <div style='text-align:right;'>
                            <input type="submit"  name="submit_Btn12"  id="submit_Btn12" style="font-weight:bold;width:80px;height:40px;font-size:30px;" onClick="document.form12.submit()">
                            </div>  
                            <form action="dataModify.php" name="form12" method="post">
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">業界 ▾</div>
									    <div class="qa_content">
                                            <h4>Professional History 業界經歷</h4> <!--小分類-->
											
											
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
													<td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Month, Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Unit / Department</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Section / College</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Professional_History  where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_month_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_title[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_department[]" value="<?php echo $rs[3] ?>"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_section[]" value="<?php echo $rs[4] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan="5" bgcolor="#e3e3e3"><b>Company / Agency / School / Association / Foundation</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Professional_History  where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="5" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_company[]" value="<?php echo $rs[5] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
										

                                            <h4>Professional Development 業界發展</h4> <!--小分類-->
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>                                                   
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description (institute/unit, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Development'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Development_Id[]"  onfocus="blur()" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Development_month_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_type[]" value="<?php echo $rs[2] ?>"
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_topic[]" value="<?php echo $rs[3] ?>"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Professional_Development_description[]" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								

                                            <h4>Professional History 業界團體</h4> <!--小分類-->
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>ID</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(society/association/unit/agency)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Professional_Societies where Professor_Id='$teacherID'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
														<td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text"  onfocus="blur()" name="Professional_Societies_Id[]" value="<?php echo $rs[0] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Societies_year[]" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_topic[]" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_description[]" value="<?php echo $rs[3] ?>"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
											
                                        </div>
                                </li>
                            </ul>
                            </form>
                            <!--影響力描述-->
                            <div style='text-align:right;'>
							<form action="dataModify.php" name="form15" method="post">
							<input type="submit"  name="submit_Btn15"  id="submit_Btn15" style="font-weight:bold;width:80px;height:40px;font-size:30px;" onClick="document.form15.submit()">
                            </div>  
                            <ul class="accordionPart">
                                <li>
									
                                    <div class="qa_title" style="text-decoration:none;">影響力描述 ▾</div>
                                    <?php $data = mysql_fetch_row(mysql_query("select * from Professor_Information where id='$teacherID'", $conn)); ?>
									    <div class="qa_content">
										
                                        <table width="790" bgcolor="black" style="font-size:15px">
                                            <tr>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>Research Impacts</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <textarea cols="80" rows="5" name="Research_Impacts_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        <?php echo rtrim($data[34]); ?>
                                                    </textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>Practice Impacts</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <textarea cols="80" rows="5" name="Practice_Impacts_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        <?php echo rtrim($data[35]); ?>
                                                    </textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#e3e3e3"><b>Teaching Impacts</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" bgcolor="#FFFFFF">
                                                    <textarea cols="80" rows="5" name="Teaching_Impacts_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        <?php echo rtrim($data[36]); ?>
                                                    </textarea>
                                                </td>
                                            </tr>
                                        </table>
                                        </div>
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