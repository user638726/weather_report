<?php include_once "base.php"; ?>
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

<body>
    
    
    <div id="main">
    
        	<div id="ms">
            <!--標題-->
        
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">後台管理選單</span>
                    
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=total">
                        <div class="mainmu">
                            進站總人數管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=bottom">
                        <div class="mainmu">
                            頁尾版權資料管理 </div>
                    </a>
                    
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin">
                        <div class="mainmu">
                            管理者帳號管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=menu">
                        <div class="mainmu">
                            選單管理 </div>
                    </a>


                </div>
            </div>
            <div class="di"
                style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
                <!--正中央-->
                <table width="100%">
                    <tbody>
                        <tr>
                            <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;"
                                class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a>
                            </td>
                            <td><button onclick="lo(&#39;api/logout.php&#39;)"
                                    style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                $do=(!empty($_GET['do']))?$_GET['do']:"total";
				$file="backend/".$do.".php";
				if(file_exists($file)){
                    include $file;
                }else{
                    include "backend/total.php";
                 }  

                ?>

            </div>

        </div>
        
    </div>

</body>

</html>