<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">



    <style>
        html,
        body {
            background-color: #EEEEEE;
            font-family: "微软雅黑", Arial, Helvetica, sans-serif;
        }

        .head-bar-zhanwei {
            height: 50px;
        }

        .reg-input {

            background-color: #ffffff;
            height: 60px;
            line-height: 60px;
            border-bottom: 1px solid #DDDDDD;

            margin-bottom: 10px;
        }

        .reg-input label {
            float: left;
            width: 20%;
            text-align: left;
            padding-left: 10px;
            height: 50px;
        }

        .reg-input input {

            font-size: 16px;
            width: 70%;
            border: 0px;
            float: right;
            height: 50px;
        }

        .get-btn {
            height: 40px;
            line-height: 40px;
            color: white;
            text-align: center;
            font-size: 20px;
            background-color: #FFCC33;
            border-radius: 30px;
            border: 1px solid #FFCC33;
            margin-top: 50px;
            width: 60%;
            margin-left: 20%;
        }
        .get-btn:active {
            border: 1px solid #FFAB19;
            background-color: #FFAB19;
        }
        .info{
            height: 50px;
            text-align: center;
            color: #f0c040;
            font-family: "微软雅黑", Arial, Helvetica, sans-serif;
            font-size: 20px;
        }
    </style>

</head>

<body>

<div class="head-bar-zhanwei">
</div>
<form method="post" action="/webApp/GetFoodsCom">
<div class="reg-input">
    <label>手机号码</label>
    <input id='tel' type="tel" value="<?php echo ($tel); ?>" name="tel"/>

</div>
<div class="reg-input">
    <label>取餐码</label>
    <input id='code' type="tel" name="code"/>
</div>
    <div class="info">
        <p><?php echo ($info); ?></p>
    </div>
<input class="get-btn" type="submit" value="取餐">
</form>



</body>

</html>