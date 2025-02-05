<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
    * {
        box-sizing: border-box;
    }

    .outer-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        max-width: 1000px;
        margin: 0 auto;
        max-height: 2200px;
        background-color: lightblue;
    }

    .container {
        display: flex;
        justify-content: center;
        margin: auto;
        width: 100%;
        flex-wrap: wrap;
    }

    .box1 {
        width: 200px;
        height: 200px;
        background-color: yellow;
        text-align: center;
        margin: 10px;
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        color: black;
    }

    a {
        text-decoration: none;
        font-size: 50px;
    }

    button {
        border-radius: 8px;
        color: blue;
    }

    a:hover {
        color: black;
    }

    @media(max-width:524px) {
        .box1 {
            width: 50%;
        }

        a {
            width: 50%;
        }
    }

    @media(max-width:768px) {
        .box1 {
            width: 75%;
        }

        a {
            width: 75%;
        }
    }

    .btn-blue {
        background-color: blue;
        color: white;
    }

    .btn-yellow {
        background-color: yellow;
        color: black;
    }

    .btn-red {
        background-color: red;
        color: yellow;
    }

    .header {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .number {
        text-align: center;
        margin: 0 auto;
        background-color: yellow;
    }

    footer {
        text-align: center;
        background-color: yellow
    }

    #radar2 {
        width: 300px;
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
    <script>
    $.ajax({
        type: "GET",
        url: "https://opendata.cwa.gov.tw/fileapi/v1/opendataapi/F-C0032-001?Authorization=CWA-624371E0-DEC9-4EBE-9A3E-596837C3FCE2&format=JSON",
        dataType: "json",
        success: function(response) {
            console.log('成功獲取內容:', response); // Log the entire response
            // Check if the response structure is as expected
            if (response) {
                let data = response;
                let data_length = data.cwaopendata.dataset.location.length;
                let time_length = data.cwaopendata.dataset.location[0].weatherElement[0].time.length;
                //console.log(data);
                //console.log(data.cwaopendata.dataset.location[0].locationName);
                console.log(time_length);
                //console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[0].parameter.parameterName);
                console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[0].startTime);
                console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[0].endTime);
                console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[1].startTime);
                console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[1].endTime);
                console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[2].startTime);
                console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[2].endTime);
                // Iterate over the locations and display their names in the boxes
                for (let i = 0; i < 9; i++) {
                    let locationName = data.cwaopendata.dataset.location[i].locationName;
                    // Dynamically select the boxes by id
                    $(`#box${i + 1}`).text(locationName);
                }

                for (let i = 0; i < time_length; i++) {
                    let weather1 = data.cwaopendata.dataset.location[0].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather2 = data.cwaopendata.dataset.location[1].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather3 = data.cwaopendata.dataset.location[2].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather4 = data.cwaopendata.dataset.location[3].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather5 = data.cwaopendata.dataset.location[4].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather6 = data.cwaopendata.dataset.location[5].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather7 = data.cwaopendata.dataset.location[6].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather8 = data.cwaopendata.dataset.location[7].weatherElement[0].time[i].parameter
                        .parameterName;
                    let weather9 = data.cwaopendata.dataset.location[8].weatherElement[0].time[i].parameter
                        .parameterName;

                    var el = document.getElementById("box1");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather1 + "</p>");
                    var el = document.getElementById("box2");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather2 + "</p>");
                    var el = document.getElementById("box3");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather3 + "</p>");
                    var el = document.getElementById("box4");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather4 + "</p>");
                    var el = document.getElementById("box5");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather5 + "</p>");
                    var el = document.getElementById("box6");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather6 + "</p>");
                    var el = document.getElementById("box7");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather7 + "</p>");
                    var el = document.getElementById("box8");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather8 + "</p>");
                    var el = document.getElementById("box9");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather9 + "</p>");

                    // Check the weather condition and dynamically add the image
                    if (weather1 == "陰天") {
                        var box1 = document.getElementById('box1'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/07.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }else if(weather1 == "陰時多雲短暫雨"){
                    var box1 = document.getElementById('box1'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/10.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }

                    if (weather2 == "陰天") {
                        var box1 = document.getElementById('box2'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/07.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }
                    else if(weather2 == "多雲時陰短暫雨"){
                        var box1 = document.getElementById('box2'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/09.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }

                    if (weather3 == "多雲時陰") {
                        var box1 = document.getElementById('box3'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/05.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }
                    if (weather4 == "多雲") {
                        var box1 = document.getElementById('box4'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/04.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }
                    if (weather5 == "多雲") {
                        var box1 = document.getElementById('box5'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/04.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }
                    if (weather6 == "多雲") {
                        var box1 = document.getElementById('box6'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/04.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }

                    if (weather7 == "陰短暫雨") {
                        var box1 = document.getElementById('box7'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/11.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }
                    if (weather8 == "多雲") {
                        var box1 = document.getElementById('box8'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/04.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }
                    if (weather9 == "多雲") {
                        var box1 = document.getElementById('box9'); // 获取box1元素
                        box1.style.backgroundImage = "url('./upload/04.svg')"; // 设置背景图像
                        box1.style.backgroundSize = "100px"; // 确保背景图覆盖整个元素
                        box1.style.backgroundPosition = "bottom"; // 背景居中
                        box1.style.backgroundRepeat = "no-repeat"; // 不重复背景图
                    }










                }
            } else {
                console.error("Data structure is unexpected", response);
            }
        },
        error: function(error) {
            console.error("Error fetching data:", error);
        }
    });
    </script>
</head>

<body>

    <div class="container2">

        <div class="header">
            <h1>天氣預報</h1>
            <div>
                <button type="button" class="btn1 btn-blue">登出</button>
                <button type="button" class="btn2 btn-yellow">重新整理</button>
                <button type="button" class="btn3 btn-red">刪除</button>
            </div>
        </div>
        <div class="outer-container">

            <div class="container">

                <button><a href="./天氣預報.php">第一頁</a></button>
                <button><a href="./天氣預報2.php">第二頁</a></button>
                <button><a href="./天氣預報3.php">第三頁</a></button>
            </div>
            <div class="container">
                <span class="t"></span>
                <div class='cent' id="dn" onclick="pp(1)">
                    <img src="./icon/left.jpg" alt="" style="padding-top: 80px;">
                </div>
                <?php 
                    $imgs=$Image->all(['sh'=>1]);
                    foreach($imgs as $idx => $img){
                        echo "<div class='im' id='ssaa{$idx}'>";
                        echo "<img src='./upload/{$img['img']}' style='width:250px;height:200px;border:3px solid orange'>";
                        echo "</div>";
                    }

                        

                ?>
                <div class='cent' id="up" onclick="pp(2)">
                    <img src="./icon/right.jpg" alt="" srcset="" style="padding-top: 80px;">
                </div>
                <div class="box1" id="box1"></div>
                <div class="box1" id="box2"></div>
                <div class="box1" id="box3"></div>
            </div>
            <div class="container">

                <div class="box1" id="box4"></div>
                <div class="box1" id="box5"></div>
                <div class="box1" id="box6"></div>
            </div>
            <div class="container">
                <div class="box1" id="box7"></div>
                <div class="box1" id="box8"></div>
                <div class="box1" id="box9"></div>
            </div>

            <div id=radar2><img src="https://cwaopendata.s3.ap-northeast-1.amazonaws.com/Observation/O-A0058-002.png"
                    style="width:300px;height:300px;"><img
                    src="https://cwaopendata.s3.ap-northeast-1.amazonaws.com/Observation/O-B0028-003.jpg"
                    style="width:300px;height:300px;"><img
                    src="https://cwaopendata.s3.ap-northeast-1.amazonaws.com/Observation/O-A0040-002.jpg"
                    style="width:300px;height:300px;"></div>
            <div class="number">進站總人數 :
                <?=$Total->find(1)['total'];?></div>
            <footer>

                <?=$Bottom->find(1)['bottom'];?>
            </footer>
        </div>
    </div>
    <script>
    var nowpage = 0,
        num = <?=$Image->count(['sh'=>1]);?>;

    function pp(x) {
        var s, t;
        if (x == 1 && nowpage - 1 >= 0) {
            nowpage--;
        }
        if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
            nowpage++;
        }
        $(".im").hide()
        for (s = 0; s <= 2; s++) {
            t = s * 1 + nowpage * 1;
            $("#ssaa" + t).show()
        }
    }
    pp(1)
    $(document).ready(function() {
        $(".btn1").on("click", function() {
            $(".container2").empty()
            <?php
             if(isset ($_SESSION['login'])){

             unset($_SESSION['login']);}
              else {
                echo "not use";
            }
             ?>
            $.ajax({
                type: "GET",
                url: "./index.php",
                success: function(response) {
                    //console.log('成功獲取內容:', response); // 在控制台中檢查
                    $(".container2").html(response); // 將內容插入容器
                },
                error: function(error) {
                    console.log('載入失敗:', error); // 如果發生錯誤，顯示錯誤信息
                }
            });
            <?php
            $_SESSION['login']=1;
            
            ?>
        });
    });


    $(document).ready(function() {
        $(".btn3").on("click", function() {
            $(".box1").on("click", function() {
                console.log($(this)[0].id);
                let id = $(this)[0].id
                console.log("id", id);
                $("#" + id).remove();
            })
        });
    });


    $(document).ready(function() {
        $(".btn2").on("click", function() {
            location.reload();
        });
    });
    </script>
</body>

</html>