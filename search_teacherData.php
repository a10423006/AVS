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
            session_start();
            include_once("connection.php");  
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

    <body>
        <div id="WRAPPER"> <!--白色區塊-->
                <div id="HEADER"></div>
				 <!--側邊選單-->
                <div id='SIDE'>
                    <fieldset>
                        <div><a href="">問卷填寫</a></div><br/>
                        <div><a href="search_teacherData.php">搜尋教師資料</a></div><br/>
                        <div><a href="depmanage.php?op=logout">登出</a></div><br/>
                    </fieldset>
                </div>

	            <div style="width:800px; height:400px; margin:0 auto 0 185px; text-align:center; line-height:50px;">
                    <div>
						<br></br>
						<form action="searchList.php" method="post">
					        請輸入要搜尋的教師 : <input type="text" name="searchName" style="width:120px; height:25px; font-size:20px;">
						<input type="submit" name="submit_Btn" id="submit_Btn" value="提交" style="width:60px; height:80px; font-size:50px;" onClick="document.form1.submit()">
						</form>
						<?php
							echo $_SESSION['wrong'];
							unset($_SESSION['wrong']);
							unset($_SESSION['teacherID']);
						?>
					</div> 
	            </div>
        </div>
		
		<!--回到頂部-->
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