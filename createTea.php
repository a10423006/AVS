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
                        <div><a href="">修改教師資料</a></div><br/>
                        <div><a href="depmanage.php?op=logout">登出</a></div><br/>
                    </fieldset>
                </div>
				
                <form action="dataCreate.php" name="form" method="post">
                    <div style="width:800px; height:100%; margin:0 auto 0 185px; text-align:center; line-height:50px;">

                        <div id="qaContent">
                            <!--個人資料-->
                                <div style='text-align:right;'>
                                    <input type="submit" value='提交' name="submit_Btn1" id="submit_Btn1" style="width:70px;height:70px;font-size:50px;" onClick="document.form1.submit()">&nbsp;&nbsp;&nbsp;
                                </div>

                                <ul class="accordionPart">
                                    <li>
                                        <div class="qa_title" style="text-decoration:none;">個人資料 ▾</div>
                                        
                                        <div class="qa_content">
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="4" bgcolor="#FFFFFF">
                                                        姓名: <input type="text" name="name"
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
                                                        <input type="text" name="academic_Title"
                                                            style="width:250px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    <td colspan="2" bgcolor="#FFFFFF">
                                                        <input type="text" name="center" 
                                                            style="width:250px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>Department 科系</b></td>
                                                    <td colspan="2" bgcolor="#FFFFFF">
                                                        <input type="text" name="department" 
                                                            style="width:250px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>College 學院</b></td>
                                                    <td colspan="2" bgcolor="#FFFFFF">
                                                        <input type="text" name="college" 
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
                                                        <input type="text" name="phone" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Cell</b></td>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="cell" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>E-mail</b></td>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="email" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Website</b></td>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="website" 
                                                            style="width:200px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" bgcolor="#e3e3e3"><b>Education (Highest Degree)</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        學歷: <input type="text" name="edu_Degree" 
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        年份: <input type="text" name="edu_Year" 
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                    <td colspan="2" bgcolor="#FFFFFF">
                                                        Major: <input type="text" name="edu_Major" 
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/><p>
                                                        Department: <input type="text" name="edu_Department" 
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>&nbsp;
                                                        School: <input type="text" name="edu_School" 
                                                            style="width:100px; font-size:15px; text-align:center; 
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
                                                        </textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>Faculty Sufficiency</b></td>
                                                    <td colspan="2" bgcolor="FFFFFF">
                                                        <input type="text" name="faculty_sufficiency" 
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>Time Devoted to Mission</b></td>
                                                    <td colspan="2" bgcolor="FFFFFF">
                                                        <input type="text" name="time_devoted_mission" 
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>Faculty Qualification</b></td>
                                                    <td colspan="2" bgcolor="FFFFFF">
                                                        <input type="text" name="faculty_qualification" 
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>Description</b></td>
                                                    <td colspan="2" bgcolor="FFFFFF">
                                                        <textarea cols="30" rows="3" name="faculty_description" 
                                                            style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        </textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" bgcolor="#e3e3e3"><b>Normal Professional Responsibilities</b></td>
                                                    <td colspan="2" bgcolor="FFFFFF">
                                                        <input type="text" name="normal_professional_responsibilities" 
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
                                

                                <!--學年度授課-->
                                <ul class="accordionPart">
                                    <li>
                                        <div class="qa_title" style="text-decoration:none;">學年度授課 ▾</div>
                                            <div class="qa_content">
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Program</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Academic Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Semester</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Course Title</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Credit hour</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="program"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="academic_year"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="semester"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="course_title"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="credit_hour"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </li>
                                </ul>

                                <!--學術服務-->
                                <ul class="accordionPart">
                                    <li>
                                        <div class="qa_title" style="text-decoration:none;">學術服務 ▾</div>
                                            <div class="qa_content">
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Service Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description (Title, Institute/Unit, etc.)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="service_Year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="service_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="30" rows="3" name="service_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
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
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,Journal,etc.-APA format)</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Download Number</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Status</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Peer_reviewed_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Peer_reviewed_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_download_number"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Peer_reviewed_status"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>MOST Rank</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Portfolio</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Citation Index</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Browses</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Supported by</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="most_rank"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="portfolio"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="citation_index"
                                                            style="width:60px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="browses"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="supported_by"
                                                            style="width:150px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                                <h4>Research Monographs</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title,sponsor,etc.)</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Download Number</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Status</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Research_Monographs_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_type"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Research_Monographs_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_download_number"
                                                                style="width:50px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_status"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" bgcolor="#e3e3e3"><b>Browses</b></td>
                                                        <td colspan="3" bgcolor="#e3e3e3"><b>Supported by</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" bgcolor="#FFFFFF">
                                                        <input type="text" name="Research_Monographs_browses"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="3" bgcolor="#FFFFFF">
                                                            <input type="text" name="Research_Monographs_supported_by"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                                <h4>Academic Meeting Proceedings</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Meeting_Proceedings_And_Other_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Meeting_Proceedings_And_Other_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Meeting_Proceedings_And_Other_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h4>Professional Meeting Proceedings</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Meeting_Proceedings_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Meeting_Proceedings_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Professional_Meeting_Proceedings_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                                <h4>Textbooks/Chapters</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Textbooks_Chapters_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Textbooks_Chapters_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Textbooks_Chapters_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h4>Cases</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(Title, Meeting, etc.)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Cases_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Cases_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Cases_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h4>Other Teaching Materials</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Other_Teaching_Materials_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Other_Teaching_Materials_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Other_Teaching_Materials_title" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h4>Honors and Competitive Awards Received</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Honors_Competitive_Awards_Received_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Honors_Competitive_Awards_Received_type"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Honors_Competitive_Awards_Received_title" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
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
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Month, Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Title</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Unit / Department</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Section / College</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_month_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_title"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_department"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_History_section"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" bgcolor="#e3e3e3"><b>Company / Agency / School / Association / Foundation</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_History_company"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h4>Professional Development 業界發展</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Type</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description (institute/unit, etc.)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Development_month_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_type"
                                                                style="width:200px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Development_topic"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <textarea cols="20" rows="5" name="Professional_Development_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                            </textarea>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h4>Professional History 業界團體</h4> <!--小分類-->
                                                <table width="790" bgcolor="black" style="font-size:15px">
                                                    <tr>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Year</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Topic</b></td>
                                                        <td colspan="1" bgcolor="#e3e3e3"><b>Description(society/association/unit/agency)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                        <input type="text" name="Professional_Societies_year"
                                                            style="width:100px; font-size:15px; text-align:center; 
                                                                text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_topic"
                                                                style="width:100px; font-size:15px; text-align:center; 
                                                                    text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                        <td colspan="1" bgcolor="#FFFFFF">
                                                            <input type="text" name="Professional_Societies_description"
                                                                    style="width:100px; font-size:15px; text-align:center; 
                                                                        text-overflow:ellipsis; overflow: hidden;"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </li>
                                </ul>

                                <!--影響力描述-->
                                <ul class="accordionPart">
                                    <li>
                                        
                                        <div class="qa_title" style="text-decoration:none;">影響力描述 ▾</div>
                                            <div class="qa_content">
                                            
                                            <table width="790" bgcolor="black" style="font-size:15px">
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Research Impacts</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        <textarea cols="80" rows="5" name="Research_Impacts_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        </textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Practice Impacts</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        <textarea cols="80" rows="5" name="Practice_Impacts_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        </textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#e3e3e3"><b>Teaching Impacts</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" bgcolor="#FFFFFF">
                                                        <textarea cols="80" rows="5" name="Teaching_Impacts_description" style="font-size:15px; margin:15px auto 0px auto;" text-overflow:ellipsis; overflow: hidden;>
                                                        </textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </form>
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