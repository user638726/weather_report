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
                    function setBackgroundImage(boxId, weather, imageUrl) {
                        var box = document.getElementById(boxId); // 获取对应的 box 元素
                        // 只有当背景图片为空时才设置背景
                        if (!box.style.backgroundImage) {
                            box.style.backgroundImage = "url('" + imageUrl + "')";
                            box.style.backgroundSize = "100px";
                            box.style.backgroundPosition = "bottom";
                            box.style.backgroundRepeat = "no-repeat";
                        }
                    }
                    if (weather1 == "陰天") {
                        setBackgroundImage('box1', weather1, './upload/陰天.svg');
                    } else if (weather1 == "陰時多雲短暫雨") {
                        setBackgroundImage('box1', weather1, './upload/陰時多雲短暫雨.svg');
                    } else if (weather1 == "陰短暫雨") {
                        setBackgroundImage('box1', weather1, './upload/陰短暫雨.svg');
                    } else if (weather1 == "多雲") {
                        setBackgroundImage('box1', weather1, './upload/多雲.svg');
                    } else if (weather1 == "晴時多雲") {
                        setBackgroundImage('box1', weather1, './upload/晴時多雲.svg');
                    } else if (weather1 == "陰陣雨") {
                        setBackgroundImage('box1', weather1, './upload/陰陣雨.svg');
                    } else if (weather1 == "陰短暫陣雨") {
                        setBackgroundImage('box1', weather1, './upload/陰短暫陣雨.svg');
                    } else if (weather1 == "陰時多雲") {
                        setBackgroundImage('box1', weather1, './upload/陰時多雲.svg');
                    } else if (weather1 == "多雲時陰") {
                        setBackgroundImage('box1', weather1, './upload/多雲時陰.svg');
                    } else if (weather1 == "多雲短暫雨") {
                        setBackgroundImage('box1', weather1, './upload/多雲短暫雨.svg');
                    } else if (weather1 == "陰短暫陣雨或雷雨") {
                        setBackgroundImage('box1', weather1, './upload/陰短暫陣雨或雷雨.svg');
                    } else if (weather1 == "陰時多雲短暫陣雨或雷雨") {
                        setBackgroundImage('box1', weather1, './upload/陰時多雲短暫陣雨或雷雨.svg');
                    }

                    if (weather2 == "陰天") {
                        setBackgroundImage('box2', weather2, './upload/陰天.svg');
                    } else if (weather2 == "多雲時陰短暫雨") {
                        setBackgroundImage('box2', weather2, './upload/多雲時陰短暫雨.svg');
                    } else if (weather2 == "陰短暫雨") {
                        setBackgroundImage('box2', weather2, './upload/陰短暫雨.svg');
                    } else if (weather2 == "晴時多雲") {
                        setBackgroundImage('box2', weather2, './upload/晴時多雲.svg');
                    } else if (weather2 == "陰陣雨") {
                        setBackgroundImage('box2', weather2, './upload/陰陣雨.svg');
                    } else if (weather2 == "陰短暫陣雨") {
                        setBackgroundImage('box2', weather2, './upload/陰短暫陣雨.svg');
                    } else if (weather2 == "陰時多雲") {
                        setBackgroundImage('box2', weather2, './upload/陰時多雲.svg');
                    } else if (weather2 == "多雲時陰") {
                        setBackgroundImage('box2', weather2, './upload/多雲時陰.svg');
                    } else if (weather2 == "多雲") {
                        setBackgroundImage('box2', weather2, './upload/多雲.svg');
                    } else if (weather2 == "陰時多雲短暫雨") {
                        setBackgroundImage('box2', weather2, './upload/陰時多雲短暫雨.svg');
                    }else if(weather2 == "陰短暫陣雨或雷雨"){
                        setBackgroundImage('box2', weather2, './upload/陰短暫陣雨或雷雨.svg');
                    }else if(weather2 == "陰時多雲短暫陣雨或雷雨"){
                        setBackgroundImage('box2', weather2, './upload/陰時多雲短暫陣雨或雷雨.svg');
                    }

                    if (weather3 == "多雲時陰") {
                        setBackgroundImage('box3', weather3, './upload/多雲時陰.svg');
                    } else if (weather3 == "多雲時陰短暫雨") {
                        setBackgroundImage('box3', weather3, './upload/多雲時陰短暫雨.svg');
                    } else if (weather3 == "陰天") {
                        setBackgroundImage('box3', weather3, './upload/陰天.svg');
                    } else if (weather3 == "陰短暫雨") {
                        setBackgroundImage('box3', weather3, './upload/陰短暫雨.svg');
                    } else if (weather3 == "晴時多雲") {
                        setBackgroundImage('box3', weather3, './upload/晴時多雲.svg');
                    } else if (weather3 == "陰陣雨") {
                        setBackgroundImage('box3', weather3, './upload/陰陣雨.svg');
                    } else if (weather3 == "陰時多雲") {
                        setBackgroundImage('box3', weather3, './upload/陰時多雲.svg');
                    } else if (weather3 == "多雲") {
                        setBackgroundImage('box3', weather3, './upload/多雲.svg');
                    } else if (weather3 == "陰時多雲短暫雨") {
                        setBackgroundImage('box3', weather3, './upload/陰時多雲短暫雨.svg');
                    }else if(weather3 == "陰短暫陣雨或雷雨" ){
                        setBackgroundImage('box3', weather3, './upload/陰短暫陣雨或雷雨.svg');
                    }else if(weather3 == "陰短暫陣雨"){
                        setBackgroundImage('box3', weather3, './upload/陰短暫陣雨.svg');
                    }else if(weather3 == "陰時多雲短暫陣雨或雷雨"){
                        setBackgroundImage('box3', weather3, './upload/陰時多雲短暫陣雨或雷雨.svg');
                    }
                    if (weather4 == "多雲") {
                        setBackgroundImage('box4', weather4, './upload/多雲.svg');
                    } else if (weather4 == "多雲時陰") {
                        setBackgroundImage('box4', weather4, './upload/多雲時陰.svg');
                    } else if (weather4 == "陰時多雲") {
                        setBackgroundImage('box4', weather4, './upload/陰時多雲.svg');
                    } else if (weather4 == "晴時多雲") {
                        setBackgroundImage('box4', weather4, './upload/晴時多雲.svg');
                    } else if (weather4 == "陰陣雨") {
                        setBackgroundImage('box4', weather4, './upload/陰陣雨.svg');
                    } else if (weather4 == "陰短暫雨") {
                        setBackgroundImage('box4', weather4, './upload/陰短暫雨.svg');
                    } else if (weather4 == "陰時多雲短暫雨") {
                        setBackgroundImage('box4', weather4, './upload/陰時多雲短暫雨.svg');
                    }else if(weather4 == "陰短暫陣雨或雷雨"){
                        setBackgroundImage('box4', weather4, './upload/陰短暫陣雨或雷雨.svg');
                    }else if(weather4 == "陰時多雲短暫陣雨"){
                        setBackgroundImage('box4', weather4, './upload/陰時多雲短暫陣雨.svg');
                    }
                    if (weather5 == "多雲") {
                        setBackgroundImage('box5', weather5, './upload/多雲.svg');
                    } else if (weather5 == "多雲時晴") {
                        setBackgroundImage('box5', weather5, './upload/多雲時晴.svg');
                    } else if (weather5 == "陰天") {
                        setBackgroundImage('box5', weather5, './upload/陰天.svg');
                    } else if (weather5 == "晴時多雲") {
                        setBackgroundImage('box5', weather5, './upload/晴時多雲.svg');
                    } else if (weather5 == "陰陣雨") {
                        setBackgroundImage('box5', weather5, './upload/陰陣雨.svg');
                    }else if(weather5 == "多雲時陰短暫陣雨或雷雨"){
                        setBackgroundImage('box5', weather5, './upload/多雲時陰短暫陣雨或雷雨.svg');
                    }else if(weather5 == "多雲時陰短暫陣雨"){
                        setBackgroundImage('box5', weather5, './upload/多雲時陰短暫陣雨.svg');
                    }else if(weather5 == "多雲時陰"){
                        setBackgroundImage('box5', weather5, './upload/多雲時陰.svg');
                    }
                    if (weather6 == "多雲時陰") {
                        setBackgroundImage('box6', weather6, './upload/多雲時陰.svg');
                    } else if (weather6 == "多雲") {
                        setBackgroundImage('box6', weather6, './upload/多雲.svg');
                    } else if (weather6 == "陰天") {
                        setBackgroundImage('box6', weather6, './upload/陰天.svg');
                    } else if (weather6 == "晴時多雲") {
                        setBackgroundImage('box6', weather6, './upload/晴時多雲.svg');
                    } else if (weather6 == "陰陣雨") {
                        setBackgroundImage('box6', weather6, './upload/陰陣雨.svg');
                    } else if (weather6 == "多雲時晴") {
                        setBackgroundImage('box6', weather6, './upload/多雲時晴.svg');
                    }else if(weather6 == "多雲時陰短暫陣雨或雷雨"){
                        setBackgroundImage('box6', weather6, './upload/多雲時陰短暫陣雨或雷雨.svg');
                    }else if(weather6 == "陰時多雲"){
                        setBackgroundImage('box6', weather6, './upload/陰時多雲.svg');
                    }

                    if (weather7 == "陰短暫雨") {
                        setBackgroundImage('box7', weather7, './upload/陰短暫雨.svg');
                    } else if (weather7 == "陰天") {
                        setBackgroundImage('box7', weather7, './upload/陰天.svg');
                    } else if (weather7 == "晴時多雲") {
                        setBackgroundImage('box7', weather7, './upload/晴時多雲.svg');
                    } else if (weather7 == "陰陣雨") {
                        setBackgroundImage('box7', weather7, './upload/陰陣雨.svg');
                    } else if (weather7 == "多雲") {
                        setBackgroundImage('box7', weather7, './upload/多雲.svg');
                    } else if (weather7 == "多雲短暫雨") {
                        setBackgroundImage('box7', weather7, './upload/多雲短暫雨.svg');
                    }else if(weather7 == "陰短暫陣雨或雷雨"){
                        setBackgroundImage('box7', weather7, './upload/陰短暫陣雨或雷雨.svg');
                    }else if(weather7 == "陰短暫陣雨"){
                        setBackgroundImage('box7', weather7, './upload/陰短暫陣雨.svg');
                    }
                    if (weather8 == "多雲") {
                        setBackgroundImage('box8', weather8, './upload/多雲.svg');
                    } else if (weather8 == "陰天") {
                        setBackgroundImage('box8', weather8, './upload/陰天.svg');
                    } else if (weather8 == "陰短暫雨") {
                        setBackgroundImage('box8', weather8, './upload/陰短暫雨.svg');
                    } else if (weather8 == "晴時多雲") {
                        setBackgroundImage('box8', weather8, './upload/晴時多雲.svg');
                    } else if (weather8 == "陰陣雨") {
                        setBackgroundImage('box8', weather8, './upload/陰陣雨.svg');
                    } else if (weather8 == "陰短暫陣雨") {
                        setBackgroundImage('box8', weather8, './upload/陰短暫陣雨.svg');
                    } else if (weather8 == "多雲時晴") {
                        setBackgroundImage('box8', weather8, './upload/多雲時晴.svg');
                    } else if (weather8 == "陰時多雲短暫雨") {
                        setBackgroundImage('box8', weather8, './upload/陰時多雲短暫雨.svg');
                    }else if(weather8 == "陰短暫陣雨或雷雨"){
                        setBackgroundImage('box8', weather8, './upload/陰短暫陣雨或雷雨.svg');
                    }else if(weather8 == "多雲時陰短暫陣雨或雷雨"){
                        setBackgroundImage('box8', weather8, './upload/多雲時陰短暫陣雨或雷雨.svg');
                    }
                    if (weather9 == "多雲") {
                        setBackgroundImage('box9', weather9, './upload/多雲.svg');
                    } else if (weather9 == "陰天") {
                        setBackgroundImage('box9', weather9, './upload/陰天.svg');
                    } else if (weather9 == "陰短暫雨") {
                        setBackgroundImage('box9', weather9, './upload/陰短暫雨.svg');
                    } else if (weather9 == "晴時多雲") {
                        setBackgroundImage('box9', weather9, './upload/晴時多雲.svg');
                    } else if (weather9 == "陰陣雨") {
                        setBackgroundImage('box9', weather9, './upload/陰陣雨.svg');
                    } else if (weather9 == "陰短暫陣雨") {
                        setBackgroundImage('box9', weather9, './upload/陰短暫陣雨.svg');
                    }else if(weather9 == "陰短暫陣雨或雷雨"){
                        setBackgroundImage('box9', weather9, './upload/陰短暫陣雨或雷雨.svg');
                    }else if(weather9 == "陰時多雲短暫陣雨或雷雨"){
                        setBackgroundImage('box9', weather9, './upload/陰時多雲短暫陣雨或雷雨.svg');
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

                <?=$Bottom->find(1)['bottom'];?><a href="https://github.com/user638726"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" style=width:30px;height:30px;>
                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
                    </svg></a>
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