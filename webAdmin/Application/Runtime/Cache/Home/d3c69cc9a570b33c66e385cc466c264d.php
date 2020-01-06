<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>


    <style>
        .uploadpanel1,
        .uploadpanel2,
        .uploadpanel3,
        .uploadpanel4 {
            background-image: url(/webAdmin/Public/webresource/icon/add.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            border: 1px solid #ccc;
            text-align: center;
            height: 200px;
            min-width: 180px;
        }
        .panel-body img{
            height: 250px;
            width: 400px;

        }
    </style>
    <link href="/webAdmin/Public/assets/summernote/summernote.css" rel="stylesheet" />
</head>

<body>

<!-- Aside Start-->
<!DOCTYPE html>
<html>
<body>
<aside class="left-panel">

    <!-- brand -->
    <div class="logo">
        <a href="index.html" class="logo-expanded">
            <img src="/webAdmin/Public/img/single-logo.png" alt="logo">
            <span class="nav-label">管理后台</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="has-submenu page1">
                <a href="page1"><i class="ion-home"></i>
                    <span class="nav-label">数据中心</span>
                </a>
            </li>
            <li class="has-submenu pageF">
                <a href="page12"><i class="ion-grid"></i>
                    <span class="nav-label">APP管理</span>
                </a>
            </li>
            <li class="has-submenu pageB">
                <a href="page2"><i class="ion-spoon"></i>
                    <span class="nav-label">商品中心</span></a>
                <ul class="list-unstyled">
                    <li class="page2">
                        <a href="page2">在售商品</a>
                    </li>
                    <li class="page3">
                        <a href="page3">发布商品</a>
                    </li>
                    <li class="page4">
                        <a href="page4">下架商品</a>
                    </li>
                </ul>
            </li>
            <li class="has-submenu pageC">
                <a href="page5"><i class="ion-settings"></i>
                    <span class="nav-label">订单中心</span></a>
                <ul class="list-unstyled">
                    <li class="page5">
                        <a href="page5">订单数据</a>
                    </li>
                    <li class="page6">
                        <a href="page6">异常订单</a>
                    </li>

                </ul>

            </li>
            <li class="has-submenu pageD">
                <a href="page7"><i class="ion-compose"></i>
                    <span class="nav-label">用户中心</span></a>
                <ul class="list-unstyled">
                    <li class="page7">
                        <a href="page7">用户数据</a>
                    </li>
                    <li class="page8">
                        <a href="page8">反馈记录</a>
                    </li>
                    <li class="page9">
                        <a href="page9">交易明细</a>
                    </li>

                </ul>
            </li>
            <li class="has-submenu pageE">
                <a href="page10"><i class="ion-grid"></i>
                    <span class="nav-label">客户中心</span></a>
                <ul class="list-unstyled">
                    <li class="page10">
                        <a href="page10">入驻申请</a>
                    </li>
                    <li class="page11">
                        <a href="page11">合作加盟</a>
                    </li>
                </ul>
            </li>
            <li class="has-submenu pageG">
                <a href="page13"><i class="ion-grid"></i>
                    <span class="nav-label">监测中心</span></a>


            </li>
        </ul>



    </nav>

</aside>
</body>
</html>
<!-- Aside Ends-->

<!--Main Content Start -->
<section class="content">

    <!-- Header -->
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/webAdmin/Public/img/favicon_1.ico">

    <title>管理后台</title>


    <!-- Bootstrap core CSS -->
    <link href="/webAdmin/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/webAdmin/Public/css/bootstrap-reset.css" rel="stylesheet">

    <!--Animation css-->
    <link href="/webAdmin/Public/css/animate.css" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="/webAdmin/Public/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="/webAdmin/Public/assets/ionicon/css/ionicons.min.css" rel="stylesheet"/>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="/webAdmin/Public/assets/morris/morris.css">
    <link href="/webAdmin/Public/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
    <link href="/webAdmin/Public/css/style.css" rel="stylesheet">
    <link href="/webAdmin/Public/css/helper.css" rel="stylesheet">
    <link href="/webAdmin/Public/css/style-responsive.css" rel="stylesheet"/>

    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>
<!-- Header -->
<header class="top-head container-fluid">
    <button type="button" class="navbar-toggle pull-left">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Search -->
    <form role="search" class="navbar-left app-search pull-left hidden-xs">
        <input type="text" placeholder="搜索..." class="form-control">
    </form>



    <!-- Right navbar -->
    <ul class="list-inline navbar-right top-menu top-right-menu">

        <!-- mesages -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o "></i>
                <span class="badge badge-sm up bg-purple count">1</span>
            </a>
            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                <li>
                    <p>消息</p>
                </li>

                <li>
                    <a href="#">
                        <span class="pull-left"><i class="fa fa-bell-o fa-2x text-danger"></i></span>
                        <span>有新商品需要审核！<br><small class="text-muted">>1小时 前</small></span>
                    </a>
                </li>
                <li>
                    <p>
                        <a href="#" class="text-right">查看所有消息</a>
                    </p>
                </li>
            </ul>
        </li>
        <!-- /messages -->

        <!-- /Notification -->
        <!-- user login dropdown start-->
        <li class="dropdown text-center">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="/webAdmin/Public/img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                <span class="username"><?php echo (session('name')); ?> </span> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                <li>
                    <a href="#"><i class="fa fa-briefcase"></i>个人信息</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog"></i>设置</a>
                </li>
                <li>
                    <a href="cancelpage"><i class="fa fa-sign-out"></i> 注销</a>
                </li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!-- End right navbar -->

</header>
</body>
</html>
    <!-- Header Ends -->

    <!-- Page Content Start -->
    <!-- ================== -->

    <div class="wraper container-fluid">
        <!--  Modal content for the above example -->

        <div class="page-title">
            <h3 class="title">首页展示</h3>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default p-0">
                    <div class="panel-body p-0">
                        <ul class="nav nav-tabs profile-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#index1" onclick="clickTab(1);">轮播图一</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#index2" onclick="clickTab(2);">轮播图二</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#index3" onclick="clickTab(3);">轮播图三</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#index4" onclick="clickTab(4);">轮播图四</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#daytext">每日一句</a>
                            </li>
                        </ul>

                        <div class="tab-content m-0">

                            <div id="index1" class="tab-pane active" style="padding-bottom: 20px;">
                                <div class="col-sm-6 panel uploadpanel1">
                                    <label for="file1" style="width: 100%; height: 100%;">
                                        <input type="file" id="file1" style="display: none" name="file1"
                                               accept="image/*"/>
                                    </label>
                                </div>
                                <input type="text" class="form-control" placeholder="请填写标题" id="indextitle1">

                                <br>
                                <div class="col-sm-12 summernote" id="summernote1"></div>
                                <br/>
                                <span id="indexnum1" style="display: none;"></span>
                                <button type="button" class="btn btn-info savebtn  pull-right" data-index="1">保存
                                </button>
                            </div>

                            <div id="index2" class="tab-pane" style="padding-bottom: 20px;">

                                <div class="col-sm-6 panel uploadpanel2">
                                    <label for="file2" style="width: 100%; height: 100%;">
                                        <input type="file" id="file2" style="display: none" name="file2"
                                               accept="image/*"/>
                                    </label>
                                </div>
                                <input type="text" class="form-control" placeholder="请填写标题" id="indextitle2">

                                <br>
                                <div class="col-sm-12 summernote" id="summernote2"></div>
                                <br/>
                                <span id="indexnum2" style="display: none;"></span>
                                <button type="button" class="btn btn-info savebtn  pull-right" data-index="2">保存
                                </button>
                            </div>

                            <div id="index3" class="tab-pane" style="padding-bottom: 20px;">
                                <div class="col-sm-6 panel uploadpanel3">
                                    <label for="file3" style="width: 100%; height: 100%;">
                                        <input type="file" id="file3" style="display: none" name="file3"
                                               accept="image/*"/>
                                    </label>
                                </div>
                                <input type="text" class="form-control" placeholder="请填写标题" id="indextitle3">

                                <br>
                                <div class="col-sm-12 summernote" id="summernote3"></div>
                                <br/>
                                <span id="indexnum3" style="display: none;"></span>
                                <button type="button" class="btn btn-info savebtn  pull-right" data-index="3">保存
                                </button>
                            </div>

                            <div id="index4" class="tab-pane" style="padding-bottom: 20px;">
                                <div class="col-sm-6 panel uploadpanel4">
                                    <label for="file4" style="width: 100%; height: 100%;">
                                        <input type="file" id="file4" style="display: none" name="file4"
                                               accept="image/*"/>
                                    </label>
                                </div>
                                <input type="text" class="form-control" placeholder="请填写标题" id="indextitle4">

                                <br>
                                <div class="col-sm-12 summernote" id="summernote4"></div>
                                <br/>
                                <span id="indexnum4" style="display: none;"></span>
                                <button type="button" class="btn btn-info savebtn  pull-right" data-index="4">保存
                                </button>
                            </div>
                            <div id="daytext" class="tab-pane" style="padding-bottom: 20px;">
                                <form class="form-horizontal" role="form">

                                    <div class="form-group daytextdata" v-for="item in items">
                                        <label  class="col-sm-3 control-label">每日一句</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control daytext" placeholder="每日一句" value=""
                                                   v-model="item.text">
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-info add-btn">添加</button>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-danger del-btn">删除</button>
                                        </div>
                                    </div>

                                </form>
                                <button type="button" class="btn btn-info add-btn1">添加</button> &nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-success pull-right submitbtn">提交</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Page Content Ends -->
        <!-- ================== -->

        <!-- Footer Start -->
        <!DOCTYPE html>
<html>

<body>
<footer class="footer">
    
</footer>
</body>
<!-- js placed at the end of the document so the pages load faster -->
<script src="/webAdmin/Public/js/jquery.js"></script>
<script src="/webAdmin/Public/js/bootstrap.min.js"></script>
<script src="/webAdmin/Public/js/pace.min.js"></script>
<script src="/webAdmin/Public/js/modernizr.min.js"></script>
<script src="/webAdmin/Public/js/wow.min.js"></script>
<script src="/webAdmin/Public/js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="/webAdmin/Public/assets/sweet-alert/sweet-alert.min.js"></script>

<script src="/webAdmin/Public/js/jquery.app.js"></script>

<script src="/webAdmin/Public/js/vue/vue.min.js"></script>
<script src="/webAdmin/Public/js/vue/vue-resource.min.js"></script>

<script src="/webAdmin/Public/js/config.js"></script>
<script src="/webAdmin/Public/assets/datatables/jquery.dataTables.min.js"></script>
<script src="/webAdmin/Public/assets/datatables/dataTables.bootstrap.js"></script>



</html>
        <!-- Footer Ends -->

    </div>
</section>
<!-- Main Content Ends -->
<script>
    $(document).ready(function () {
        $('.pageF').addClass("active");
        $('.page12').addClass("active");
    });

</script>
<script src="/webAdmin/Public/assets/summernote/summernote.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 400,
            placeholder: "请输入...",
            focus: focus,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insertImage', ['picture', 'video']]
            ],
            onImageUpload: function(files) {
                sendFile(files);
            }

        });
    });
    var tabNum = 1;
    function clickTab($val){
        /*	console.log($val);*/
        tabNum = $val;
    }
    function sendFile(files) {

        console.log(files[0]);
        var data = new FormData();
        data.append("file", files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: SERVER_URL + 'ADAddIndexImg',//图片上传出来的url，返回的是图片上传后的路径，http格式
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) { //data是返回的hash,key之类的值，key是定义的文件名
                if(data.code==200){
                    console.log(SERVER_RESOURCE+data.data);
                    var imghtml = '<img src="'+SERVER_RESOURCE+data.data+'">';
                    var contenttext = $("#summernote"+tabNum).code().toString(); //编写内容
                    $("#summernote"+tabNum).code(contenttext+imghtml);
                }else{
                    swal("图片格式不对，无法上传！");
                }

                //
            },
            error: function() {
                alert("上传失败");
            }
        });
    }
    getIndeximg();
    getIndextext();
    var textvue = new Vue({
        el: '#daytext',
        data: {
            items: "",
        },

    });
    $(document).on("click", ".submitbtn", function () {
        var textarr = new Array();
        var textempty = 1;
        $(".daytextdata").each(function () {
            var textval = ($(this).find('.daytext')).val();
            if (textval == null || textval == '') {
                textempty *= 0;
            }
            console.log(textval);
            textarr.push(textval);
        });
        console.log(textempty);
        if (!textempty) {
            swal("请填写完整！");
            return;
        }
        $.ajax({
            url: SERVER_URL + 'ADAddIndexText',
            type: 'POST',
            data: {
                textlist: textarr.toString()
            },
            dataType: 'json',
            success: function (data) {
                console.log(JSON.stringify(data));

                swal(data.msg);

            },
            error: function () {
                alert("失败");
            }
        });

    });

    $(document).on("click", ".add-btn1", function () {
        //拼接一行

        var row1 = $('.daytextdata').length;
        /*	console.log(row1);*/
        if (row1 < 5) {
            row1++;
            var html = '';
            html += '<div class="form-group daytextdata">';
            html += '<label for="day1" class="col-sm-3 control-label">每日一句</label>';
            html += '<div class="col-sm-5">';
            html += '<input type="text" class="form-control daytext" placeholder="每日一句" value="">';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-info add-btn">添加</button>';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-danger del-btn">删除</button>';
            html += '</div>';
            html += '</div>';

            $(this).parent().find('form').html(html);
            $(this).css("display", "none");

        } else {
            swal("最多填写5个哦！");
        }
    });
    $(document).on("click", ".add-btn", function () {
        //拼接一行

        var row1 = $('.daytextdata').length;
        /*	console.log(row1);*/
        if (row1 < 5) {
            row1++;
            var html = '';
            html += '<div class="form-group daytextdata">';
            html += '<label for="day1" class="col-sm-3 control-label">每日一句</label>';
            html += '<div class="col-sm-5">';
            html += '<input type="text" class="form-control daytext" placeholder="每日一句" value="">';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-info add-btn">添加</button>';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-danger del-btn">删除</button>';
            html += '</div>';
            html += '</div>';

            $(this).parent().parent().after(html);

        } else {
            swal("最多填写5个哦！");
        }
    });
    $(document).on("click", ".del-btn", function () {
        /*console.log(row1);*/
        var row1 = $('.daytextdata').length;
        if (row1 <= 1) {
            swal("不能删除！");
        } else {
            $(this).parent().parent().remove();
            row1--;
        }

    });
    $("input[type=file]").change(function (e) {
        var dindex = $(this).parent().parent().parent().index();
        console.log(dindex);
        //alert("aaa");
        var imgFile = this.files[0];
        console.log(imgFile);
        if (imgFile) {
            /*					console.log(imgFile.name);*/
            var fr = new FileReader();
            fr.onload = function () {
                $('.uploadpanel' + (dindex + 1)).css('background-image', 'url(' + fr.result + ')');

            };
            fr.readAsDataURL(imgFile);
        }
    });

    $(document).on('click', '.savebtn', function () {
        $('#summernote1  ').summernote('reset');
        var indexbtn = $(this).attr('data-index');
        var indexnum = $('#indexnum' + indexbtn).text();
        var titletext = $('#indextitle' + indexbtn).val();
        var contenttext = $("#summernote" + indexbtn).code().toString(); //编写内容
        var filedata = document.getElementById('file' + indexbtn);
        /*console.log(titletext + indexnum);*/

        var formData = new FormData();
        if (filedata.files[0]) { //如果有文件
            /*					console.log(filedata.files[0]);*/
            formData.append('file', filedata.files[0]);
        }

        formData.append('indexnum', indexnum);
        formData.append('title', titletext);
        formData.append('content', contenttext);
        $.ajax({
            url: SERVER_URL + 'ADAddAppIndex',
            type: 'POST',
            data: formData,
            // 告诉jQuery不要去处理发送的数据
            dataType: 'json',
            cache: false,
            processData: false,
            // 告诉jQuery不要去设置Content-Type请求头
            contentType: false,
            async: false,
            success: function (data) {
                /*console.log(JSON.stringify(data));*/
                swal(data.msg);

            },
            error: function () {
                alert("失败");
            }

        });
    });

    function getIndextext() {
        $.ajax({
            type: "post",
            url: SERVER_URL + 'ADAppIndexText',
            async: true,
            success: function (data) {
                console.log(JSON.stringify(data));
                if (data.code == 200) {
                    textvue.items = data.data;
                    $('.add-btn1').css("display", "none");
                } else {
                    $('.add-btn1').css("display", "inline-block");
                }
            },
            error: function () {
                $('.add-btn1').css("display", "inline-block");
            }

        });
    }

    function getIndeximg() {
        $.ajax({
            type: "post",
            url: SERVER_URL + 'ADAppIndexImg',
            async: true,
            success: function (data) {
                //console.log(JSON.stringify(data));
                $.each(data, function (index, item) {
                    var imgurl = SERVER_RESOURCE + item.indeximg;
                    $('#indexnum' + (index + 1)).html(item.indexnumber);
                    $('.uploadpanel' + (index + 1)).css('background-image', 'url(' + imgurl + ')');
                    $("#indextitle" + (index + 1)).val(item.indextitle);
                    $("#summernote" + (index + 1)).code(item.indexcontent);
                });
            },
            error: function () {

            }

        });
    }
</script>
</body>

</html>