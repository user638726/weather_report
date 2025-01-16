<?php
session_start();
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
        background-color: lightblue;
        max-height: 2200px;
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
        color: black;
    }

    .btn-yellow {
        background-color: yellow;
        color: black;
    }

    .btn-red {
        background-color: red;
        color: black
    }

    .header {
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
                //console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[0].parameter.parameterName);
                //console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[0].endTime);
                //console.log(data.cwaopendata.dataset.location[0].weatherElement[0].time[0].startTime);
                // Iterate over the locations and display their names in the boxes
                for (let i = 18; i < 22; i++) {
                    let locationName = data.cwaopendata.dataset.location[i].locationName;
                    // Dynamically select the boxes by id
                    $(`#box${i}`).text(locationName);
                }

                for (let i = 0; i < time_length; i++) {
                    let weather19 = data.cwaopendata.dataset.location[18].weatherElement[0].time[i]
                        .parameter.parameterName;
                    let weather20 = data.cwaopendata.dataset.location[19].weatherElement[0].time[i]
                        .parameter.parameterName;
                    let weather21 = data.cwaopendata.dataset.location[20].weatherElement[0].time[i]
                        .parameter.parameterName;
                    let weather22 = data.cwaopendata.dataset.location[21].weatherElement[0].time[i]
                        .parameter.parameterName;


                    var el = document.getElementById("box18");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather19 + "</p>");
                    var el = document.getElementById("box19");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather20 + "</p>");
                    var el = document.getElementById("box20");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather21 + "</p>");
                    var el = document.getElementById("box21");
                    el.insertAdjacentHTML("beforeEnd", "<p>天氣:" + weather22 + "</p>");


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
                <button type="button" class="btn2 btn-yellow">新增</button>
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
                <div class="box1" id="box18"></div>
                <div class="box1" id="box19"></div>
                <div class="box1" id="box20"></div>
            </div>
            <div class="container">
                <div class="box1" id="box21"></div>
                <div class="box1" id="box22"></div>
                <div class="box1" id="box23"></div>
            </div>
            <div class="container">
                <div class="box1" id="box24"></div>
                <div class="box1" id="box25"></div>
                <div class="box1" id="box26"></div>
            </div>
        </div>
    </div>
    <script>
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
                url: "./login.php",
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
    </script>
</body>

</html>