<?php include_once "api/db.php";?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
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
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <?php 
                        $mains=$Menu->all(['sh'=>1,'main_id'=>0]);
                        foreach($mains as $main){
                            echo "<div class='mainmu cent'>";
                            echo "<a href='{$main['href']}'>";
                            echo $main['text'];
                            echo "</a>";

                            echo "<div class='mw'>";
                            if($Menu->count(['main_id'=>$main['id']])>0){
                                $subs=$Menu->all(['main_id'=>$main['id']]);
                                foreach($subs as $sub){
                                    echo "<div class='mainmu2 cent'>";
                                    echo "<a href='{$sub['href']}'>";
                                    echo $sub['text'];  
                                    echo "</a>";
                                    echo "</div>";
                                }
                            }
                            echo "</div>";
                            echo "</div>";
                        }


                    ?>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                        <?=$Total->find(1)['total'];?></span>
                </div>
            </div>
            <?php
				//$do=$_GET['do']??'main';

				$do=$_GET['do']??'main';
				$file="./front/{$do}.html";

				if(file_exists($file)){
					include $file;
				}else{
					include "./front/天氣預報.html";
				}

				//include (file_exists($file))?$file:"./front/main.php";

			?>
            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <?php 
                    if(!isset($_SESSION['login'])){
                ?>
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo(&#39;?do=login&#39;)">管理登入</button>
                <?php 
                    }else{
                ?>
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo(&#39;admin.php&#39;)">返回管理</button>
                <?php 
                    }
                ?>

            </div>
        </div>
    </div>

    <div
        style="width:1024px; left:0px; background:#FC3; margin:0 auto; height:123px; display:block; position:absolute; top:658px; left:73px;">
        <span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
    </div>
    </div>

</body>

</html>