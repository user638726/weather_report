﻿﻿<?php include_once "api/db.php";

if(!isset($_SESSION['login'])){
    echo "請從登入頁登入<a href='index.php?do=login'>管理登入</a>";
    exit();
}


?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=admin&redo=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>`
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;">

            </div>
        </div>
    </div>



    <!--標題-->
    </a>
    <div id="ms">
        <div id="lf" style="float:left;">
            <div id="menuput" class="dbor">
                <!--主選單放此-->
                <span class="t botli">後台管理選單</span>

                <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=image">
                    <div class="mainmu">
                        輪播影像管理 </div>
                </a>
                <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=total">
                    <div class="mainmu">
                        進站總人數管理 </div>
                </a>
                <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=bottom">
                    <div class="mainmu">
                        頁尾版權資料管理 </div>
                </a>



            </div>
            <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                <span class="t">進站總人數 :
                    <?=$Total->find(1)['total'];?></span>
            </div>
        </div>
        <?php
				$do=$_GET['do']??'image';
				$file="./backend/{$do}.php";

				if(file_exists($file)){
					include $file;
				}else{
					include "./backend/image.php";
				}
				?>

    </div>
    <div style="clear:both;"></div>
    <div
        style="width:1900px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
        <span class="t" style="line-height:123px;text-align:center;"><?=$Bottom->find(1)['bottom'];?></span>
    </div>

</body>

</html>