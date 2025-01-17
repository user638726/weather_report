<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <h2>歡迎來到後台!</h2>
    <div id="ms">
        <div id="lf" style="float:left;">
            <div id="menuput" class="dbor">
                <!--主選單放此-->
                <span class="t botli">後台管理選單</span>
                <a style="color:#000; font-size:13px; text-decoration:none" href="?do=total">
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
                <div style="height:32px; display:block;"></div>
                <!--正中央-->
                <div style="width:100%; padding:2px; height:290px;">
                    <div id="mwww" loop="true" style="width:100%; height:100%;">
                        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
                    </div>
                </div>
                <script>
                function ww() {
                    // console.log("HI");
                    $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
                    //$("#mwww").attr("src",lin[now])
                    now++;
                    if (now >= lin.length)
                        now = 0;
                }

                ww();
                </script>
                <p><a href="logout.php">登出</a></p>
</body>

</html>