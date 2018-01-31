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
        <?php include_once("connection.php");?>
		<?php
			
			$teacherName = $_POST['searchName'];
			$check = 0;
								
			$sql = "select Name from Professor_Information";//查詢整個表單				
			$result = mysql_query($sql);
			$check = 0;
			while($row = mysql_fetch_array($result)){
					echo $row['Name'];
					if($teacherName==$row['Name']){
						$check = 1;
					}	
					else{			
						echo "wrose 查無此人";	
					}
				}	
			if($check==1){
				echo "success";
			}	
			else{
				header("location: error.php");	
			}
			
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
        
	            <div style="width:auto; height:700px; margin:0 auto 0 185px; text-align:center; line-height:50px;">

                    <div>
						<table width="490" bgcolor="black" style="font-size:15px">
							<br></br>
							<tr>
                                <td colspan="6" bgcolor="#e3e3e3"><b>搜尋列表</b></td>
                                </tr>
                            <tr>
                                <td colspan="2" bgcolor="#e3e3e3"><b>老師名稱</b></td>
                                <td colspan="2" bgcolor="#e3e3e3"><b>系別</b></td>
								<td colspan="1" bgcolor="#e3e3e3"><b>id</b></td>
								<td colspan="1" bgcolor="#e3e3e3"><b>按鈕</b></td>
                            </tr>
							
							<?php 
                            $data = mysql_query("select * from Professor_Information where Name='$teacherName'", $conn);
                                for($i=1; $i<=mysql_num_rows($data); $i++){ //把每一列的資料取出來
                                $rs=mysql_fetch_row($data);
								$buttomValue[i] = $rs[0];				
							?>
							
							<form action="result.php" method="post">
							<tr>
                                <td colspan="2" bgcolor="#FFFFFF">
                                    <input type="text" name="name" value="<?php echo $rs[1]; ?>" readonly="readonly"
                                    style="width:250px; font-size:15px; text-align:center; 
                                    text-overflow:ellipsis; overflow: hidden; border-color:transparent;"/>
                                </td>
                                <td colspan="2" bgcolor="#FFFFFF">
									<input type="text" name="department" value="<?php echo $rs[4]; ?>" readonly="readonly"
                                    style="width:350px; font-size:15px; text-align:center; 
                                    text-overflow:ellipsis; overflow: hidden; border-color:transparent;"/>
                                </td>
								<td colspan="1" bgcolor="#FFFFFF">
									<input type="text" name="teacher_ID" value="<?php echo $rs[0];?>" readonly="readonly"
                                    style="width:70px; font-size:15px; text-align:center; 
                                    text-overflow:ellipsis; overflow: hidden; border-color:transparent;"/>
									
                                </td>	
								<td colspan="1" bgcolor="#FFFFFF">
									<input type="submit" value="查閱" style="width:70px;height:70px;font-size:50px;" onClick="document.form1.submit()">		
                                </td>		
							</tr>
							</form>
							<?php }?>  
									
						</table>
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