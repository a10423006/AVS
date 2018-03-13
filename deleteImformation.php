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
			//   echo "not null";
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
                        <div><a href="new_teacherData.php">新增教師資料</a></div><br/>
                        <div><a href="deleteImformation.php">刪除教師資料</a></div><br/>
                        <div><a href="logoutUnset.php">登出</a></div><br/>
                    </fieldset>
                </div>
                <!--時間-->
				<div>
				<br/>
					<?php
							session_start();
							$searchYear1 = $_SESSION['searchYear1'];
							$searchYear2 = $_SESSION['searchYear2'];
							
							echo'<br>';
							echo $_SESSION['yearWrong'];
							// echo $_SESSION['teacherID'];
							echo'<br>';
						
							unset($_SESSION['yearWrong']);
							unset($_SESSION['$searchYear1']);
							unset($_SESSION['$searchYear2']);
					?>
				</div>
				
	            <div style="width:800px; height:100%; margin:0 auto 0 185px; text-align:center; line-height:50px;">

				  <div id="qaContent">
                            <!--學年度授課-->
							<form action="deleteAction.php" name="deleteAction" method="post">
                            <div style='text-align:right;'>    
							<input type="submit"  name="deleteAction_Btn"  id="deleteAction_Btn" style="font-weight:bold;width:80px;height:40px;font-size:30px;"  value="刪除" onClick="document.deleteAction.submit()">
                            </div>  
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">學年度授課 ▾</div>
                                    <?php $data = mysql_query("select * from Course_Taught where Professor_Id='$teacherID'", $conn); ?>
									    <div class="qa_content">
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Program</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Academic Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Semester</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Course Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Credit hour</b></td>
                                                </tr>
                                                <?php
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="course_id[]"  readonly="readonly"   value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="program[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="academic_year[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="semester[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="course_title[]" readonly="readonly" value="<?php echo $rs[4] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="credit_hour[]" readonly="readonly" value="<?php echo $rs[5] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                </li>
                            </ul>
                      
                            <!--學術服務-->  
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">學術服務 ▾</div>
                                    <?php $data = mysql_query("select * from Academic_Services where Professor_Id='$teacherID'", $conn); ?>
									    <div class="qa_content">
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Service Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description (Title, Institute/Unit, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">    
                                                            <input type="checkbox" name="service_ID[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="service_Year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="service_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea name="service_description[]" cols="30" rows="3" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
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
											
											
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,Journal,etc.-APA format)</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Status</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Peer_reviewed_Journals where Professor_Id='$teacherID'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
													    <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Peer_reviewed_id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_topic[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Peer_reviewed_description[]" readonly="readonly"  style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_status[]" readonly="readonly" value="<?php echo $rs[5] ?>"
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
													
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Peer_reviewed_Journals where Professor_Id='$teacherID'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="most_rank[]" readonly="readonly" value="<?php echo $rs[6] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="portfolio[]" readonly="readonly" value="<?php echo $rs[7] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="citation_index[]" readonly="readonly" value="<?php echo $rs[8] ?>"
                                                            style="width:60px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="browses[]" readonly="readonly" value="<?php echo $rs[9] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="supported_by[]" readonly="readonly" value="<?php echo $rs[10] ?>"
                                                            style="width:150px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
													
                                                            <input type="hidden" name="Professor_Id"  readonly="readonly" value="<?php echo $rs[11] ?>"
                                                            style="width:50px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                            
                                                    </tr>
                                                <?php }?>	
                                            </table>
											
											
												
                                            <h4>Research Monographs</h4> <!--小分類-->
									
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,sponsor,etc.)</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Status</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Research_Monographs where Professor_Id='$teacherID'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">										
                                                            <input type="checkbox" name="Research_Monographs_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_topic[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Research_Monographs_description[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_status[]" readonly="readonly" value="<?php echo $rs[6] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan="3" bgcolor="#e3e3e3"><b>Browses</b></td>
                                                    <td colspan="3" bgcolor="#e3e3e3"><b>Supported by</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Research_Monographs where Professor_Id='$teacherID'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="3" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_browses[]" readonly="readonly" value="<?php echo $rs[7] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="3" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_supported_by[]" readonly="readonly" value="<?php echo $rs[8] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                            <input type="hidden" name="Professor_Id"  onfocus="blur()" readonly="readonly" value="<?php echo $rs[9] ?>"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                    </tr>
                                                <?php }?>
                                            </table>
									
											
												
                                            <h4>Academic Meeting Proceedings</h4> <!--小分類-->
								
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Academic Meeting Proceedings'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Meeting_Proceedings_And_Other_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_topic[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Meeting_Proceedings_And_Other_description[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
									

                                            <h4>Professional Meeting Proceedings</h4> <!--小分類-->
							
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Meeting Proceedings'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Professional_Meeting_Proceedings_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_topic[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Professional_Meeting_Proceedings_description[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								
											
                                            <h4>Textbooks/Chapters</h4> <!--小分類-->
									
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Textbooks/Chapters'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Textbooks_Chapters_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_topic[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Textbooks_Chapters_description[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
						

                                            <h4>Cases</h4> <!--小分類-->
								
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Cases'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Cases_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_topic[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Cases_description[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								

                                            <h4>Other Teaching Materials</h4> <!--小分類-->
						
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Teaching_Materials_And_Awards where Professor_Id='$teacherID' && Contributions_name = 'Other Teaching Materials'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Other_Teaching_Materials_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td> 
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Other_Teaching_Materials_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Other_Teaching_Materials_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Other_Teaching_Materials_title[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								

                                            <h4>Honors and Competitive Awards Received</h4> <!--小分類-->
									
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Teaching_Materials_And_Awards where  Professor_Id='$teacherID' && Contributions_name = 'Honors and Competitive Awards Received'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Honors_Competitive_Awards_Received_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Honors_Competitive_Awards_Received_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Honors_Competitive_Awards_Received_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Honors_Competitive_Awards_Received_title[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[3]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
											
                                        </div>
                                </li>
                            </ul>
                            <!--業界-->
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">業界 ▾</div>
									    <div class="qa_content">
                                            <h4>Professional History 業界經歷</h4> <!--小分類-->
											
											
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>    
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Month, Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Unit / Department</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Section / College</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Professional_History  where Professor_Id='$teacherID'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Professional_History_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_month_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_title[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_department[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_section[]" readonly="readonly" value="<?php echo $rs[4] ?>"
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
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="5" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_company[]" readonly="readonly" value="<?php echo $rs[5] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
										

                                            <h4>Professional Development 業界發展</h4> <!--小分類-->
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>                                       
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description (institute/unit, etc.)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Meeting_Proceedings_And_Other where Professor_Id='$teacherID' && Meeting_Class = 'Professional Development'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox" name="Professional_Development_Id[]"  readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>            
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_month_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_type[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_topic[]" readonly="readonly" value="<?php echo $rs[3] ?>"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Professional_Development_description[]" readonly="readonly" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                                <?php echo rtrim($rs[4]); ?>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </table>
								

                                            <h4>Professional History 業界團體</h4> <!--小分類-->
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>勾選</b></td>        
													<td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Description(society/association/unit/agency)</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Professional_Societies where Professor_Id='$teacherID'", $conn);
                                                    for($i=0; $i<mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="checkbox"  onfocus="blur()" name="Professional_Societies_Id[]" readonly="readonly" value="<?php echo $rs[0] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_year[]" readonly="readonly" value="<?php echo $rs[1] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_topic[]" readonly="readonly" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_description[]" readonly="readonly" value="<?php echo $rs[3] ?>"
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