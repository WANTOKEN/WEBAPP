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

        .div1 {
            padding-left: 10px;
            height: 100px;
            text-align: left;

            width: 100px;
            float: left;
        }
        .div2{
            padding-left: 10px;
            padding-top: 8px;
            float: left;
            height: 100px;
            text-align: center;

        }


        .download-btn {
            height: 30px;
            line-height: 30px;
            color: #FFFFFF;
            text-align: center;
            background-color: #FFCC33;
            border-radius: 3px;
            border: 1px solid #FFCC33;
            padding-left: 10px;
            padding-right: 10px;

        }
        .download-btn:active {
            border: 1px solid #FFAB19;
            background-color: #FFAB19;
        }
        a{
            color: #FFFFFF;
        }
    </style>

</head>

<body>

<div class="div1">
    <img src="downloads/icon.png" width="100px" height="100px">
    <div style="text-align: center">配送APP</div>
</div>
<div class="div2">


    <a class="" href="downloads/tranapp.apk">
        <div class="download-btn">Android版下载</div></a>
    <div style="height: 10px;">&nbsp;</div>

    <!--<a class="" href="downloads/app.ipa">
        <div class="download-btn">IOS版下载</div></a>-->
</div>
</body>

</html>