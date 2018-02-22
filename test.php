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
			$teacherID = $_POST['teacher_ID'];
			
			session_start();
			$_SESSION['teacherID']=$teacherID;	
			
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
                        <div><a href="">問卷填寫</a></div><br/>
                        <div><a href="admanage.php?op=courseset_form&set=teaupload_form">上傳教師資料</a></div><br/>
                        <div><a href="admanage.php?op=courseset_form&set=stupload_form">修改教師資料</a></div><br/>
                        <div><a href="depmanage.php?op=logout">登出</a></div><br/>
                    </fieldset>
                </div>
          
                <!--時間-->
				<div>
				<br/>
					<form action="searchYear.php" method="post">
					輸入要搜尋的日期:
					<input name="searchYear1" type="date" />
					<label>~</label>
					<input name="searchYear2" type="date"/>
					
					<input type="submit"  name="submit_Btn"  id="submit_Btn"  img  src="images/search.png"  onClick="document.form1.submit()">
					</form>
					<?php
							session_start();
							$searchYear1 = $_SESSION['searchYear1'];
							$searchYear2 = $_SESSION['searchYear2'];
							echo(strtotime("now")); //現在時間秒數
							echo'<br>';
							echo $_SESSION['yearWrong'];
							echo $_SESSION['teacherID'];
							echo'<br>';
							echo (strtotime($searchYear1));
							echo'<br>';
							echo (strtotime($searchYear2));
							echo'<br>';
							unset($_SESSION['yearWrong']);
							unset($_SESSION['$searchYear1']);
							unset($_SESSION['$searchYear2']);							
					?>
				</div>
                            <ul class="accordionPart">
                                <li>
                                    <div class="qa_title" style="text-decoration:none;">業界 ▾</div>
									    <div class="qa_content">
                                            <h4>Professional History 業界經歷</h4> <!--小分類-->
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Month, Year</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Unit / Department</b></td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Section / College</b></td>
                                                </tr>
                                                <?php
								
													
                                                    $data = mysql_query("select * from Professional_History  where Professor_Id='$teacherID' AND Month_Year > '2003-11-10' AND Month_Year < '2010-11-10' ", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
														echo"<br>";
														//echo strtotime("$rsTest[1]");
														//echo $rsTest[1];
														echo"<br>";
														/*
														//echo strtotime("2003-11-10");
														if((strtotime($rsTest[1]) > strtotime("2003-11-10")) && (strtotime($rsTest[1]) < strtotime("2010-11-10")))
														{
															$rs=mysql_fetch_row($data);
															echo "success<br>";
															echo "<br>";	
														}
														else
														{
															echo "false<br>";
														}	
														*/
                                                    ?>
													
													<tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="month_year" value="<?php echo $rs[1] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="title" value="<?php echo $rs[2] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="department" value="<?php echo $rs[3] ?>"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="section" value="<?php echo $rs[4] ?>"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
												
                                                <?php }?>
                                                <tr>
                                                    <td colspan="4" bgcolor="#e3e3e3"><b>Company / Agency / School / Association / Foundation</b></td>
                                                </tr>
                                                <?php
                                                    $data = mysql_query("select * from Professional_History  where Professor_Id='A112'", $conn);
                                                    for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                                        $rs=mysql_fetch_row($data);
                                                    ?><tr>
                                                        <td colspan="4" bgcolor="#FFFFFF">
                                                        <input type="text" name="company" value="<?php echo $rs[5] ?>"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                <?php }?>
							
                                            </table>
                                        </div>
                                </li>
                            </ul>				
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