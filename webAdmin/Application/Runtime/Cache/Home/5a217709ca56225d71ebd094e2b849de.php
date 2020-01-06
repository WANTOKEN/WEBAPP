<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .boxDiv {
            perspective: 2000px;
            border: rgba(0, 0, 0, 0.35);
        }

        .full-box {
            background-color: rgb(255, 174, 107);
            height: 100px;
            padding-top: 30%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 1px 2px 3px 1px rgba(0, 0, 0, 0.35);
            color: #FFFFFF;

        }

        @keyframes myfirst {
            from {
            }
            to {
                perspective-origin: 20% 50%;
                transform-origin: 0 0;
                transform: rotate3d(0, 1, 0, -45deg);
                transition: all 0.5s;
            }
        }

        @-webkit-keyframes myfirst {
            from {
            }
            to {
                perspective-origin: 20% 50%;
                transform-origin: 0 0;
                transform: rotate3d(0, 1, 0, -45deg);
                transition: all 0.5s;
            }
        }

        .full-box:hover {
            background-color: rgba(0, 0, 0, 0.3);
            color: #FFFFFF;
            perspective-origin: 20% 50%;
            transform-origin: 0 0;
            transform: rotate3d(0, 1, 0, -45deg);
            transition: all 0.5s;

        }

        .full-box:hover .full-num {
            color: #FFFFFF;
        }

       /* .full-box .full-code {
            display: none;
        }

        .full-box:hover .full-code {
            display: block;
        }*/

        .empty-box {
            color: #333;
            background-color: #F0F2F7;
            height: 100px;
            padding-top: 30%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 1px 2px 3px 1px rgba(0, 0, 0, 0.35);
            animation: myfirst 0.5s;
            -webkit-animation: myfirst 0.5s; /* Safari and Chrome */
        }
    </style>
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
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

        <div class="page-title">
            <h3 class="title">柜子管理</h3>
        </div>
        <!--Widget-4 -->

        <div class="row">
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">监听状态</h3></div>
                    <div class="panel-body" id="box-listener" style="height: 250px;overflow-y: scroll;">

                    </div>
                </div>
                <form role="form">
                    <div class="form-group">
                        <label>指令输入</label>
                        <textarea class="form-control" rows="3" id="conmand-text"></textarea>
                    </div>
                </form>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="sendCommand">发送指令</button>

            </div>

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" data-toggle="modal" data-target="#box-modal">柜子检测</h3>
                    </div>
                    <div class="panel-body row" id="Send-Box">
                        <div class="col-sm-3 boxDiv" style="margin-bottom: 10px;" v-cloak v-for="(item,index) in items">
                            <div class="full-box" v-if="item.status>=1">
                                <span class="full-num" style="font-size: 20px;">{{item.box}}号柜</span><br/>
                                <span class="full-code">{{item.code}}</span>
                            </div>
                            <div class="empty-box" v-else>
                                <span class="full-num" style="font-size: 20px;">{{item.box}}号柜</span><br/>
                                <span>空</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- panel -->

    <div id="box-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">更改</h4>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="box_datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">柜号</th>
                                        <th style="text-align: center;">状态</th>
                                        <th style="text-align: center;">取餐码</th>
                                        <th style="text-align: center;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="data-row" style="text-align: center;">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
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


</section>
<!-- Main Content Ends -->


<!-- js placed at the end of the document so the pages load faster -->


</body>
<script>
    $(document).ready(function () {
        $('.pageG').addClass("active");
        $('.page13').addClass("active");
    });
    var box = new Vue({
        el: '#Send-Box',
        data: {
            items: "",
        },
        methods: {
            get: function () {
                //发送get请求
                this.$http.get('http://47.106.253.201/webApp/searchAllBox').then(function (res) {
                    /*console.log(JSON.stringify(res.body));*/
                    box.items = res.body.data;
                    console.log(JSON.stringify(box.items));
                }, function () {
                    /*console.log('请求失败处理');*/
                });
            }
        }

    });
    box.get();
    $(document).on('click', '#sendCommand', function () {
        var ctext = $('#conmand-text').val();
        console.log(ctext);
        if (ws.readyState > 0) {
            ws.send(ctext);
            console.log('ok');
            /*console.log(ws.readyState);*/
        } else {
            console.log('fail');
        }

    });
    // 打开一个 web socket
    var ws = new WebSocket("ws://47.106.253.201:9503");

    ws.onopen = function () {
        // Web Socket 已连接上，使用 send() 方法发送数据
        ws.send("connect");
        var ltext = '<p>' + CurentTime() + '</p>正在连接服务器...';
        $('#box-listener').append(ltext);
        console.log(ws.readyState);
    };
    /*			console.log(ws.readyState);*/

    setInterval(function () {
        if (ws.readyState > 0) {
            ws.send("connect");
            /*console.log(ws.readyState);*/
        }
    }, 10000)

    function CurentTime() {
        var now = new Date();
        var year = now.getFullYear(); //年
        var month = now.getMonth() + 1; //月
        var day = now.getDate(); //日
        var hh = now.getHours(); //时
        var mm = now.getMinutes(); //分
        var ss = now.getSeconds(); //秒
        var clock = year + "-";
        if (month < 10)
            clock += "0";
        clock += month + "-";
        if (day < 10)
            clock += "0";
        clock += day + " ";
        if (hh < 10)
            clock += "0";
        clock += hh + ":";
        if (mm < 10) clock += '0';
        clock += mm + ":";
        if (ss < 10) clock += '0';
        clock += ss;
        return clock;
    }

    ws.onmessage = function (evt) {
        var received_msg = evt.data;
        /*console.log("数据已接收...");*/
        console.log(received_msg);
        var ltext = null;

        if (received_msg > 0) {
            if (received_msg == 9) {
                ltext = '<p>' + CurentTime() + '</p>正在开启所有柜...';
            } else {
                ltext = '<p>' + CurentTime() + '</p>正在开启' + received_msg + '号柜...';

            }

        } else if (received_msg == 'connectok') {
            ltext = '<p>' + CurentTime() + '</p>连接服务器成功...';

        } else if (received_msg == 0) {
            ltext = '<p>' + CurentTime() + '</p>取餐指令有误...';
        } else if (received_msg == 'openall') {
            ltext = '<p>' + CurentTime() + '</p>正在开启所有柜...';
        }

        $('#box-listener').append(ltext);
        var ele = document.getElementById('box-listener');
        ele.scrollTop = ele.scrollHeight;
        box.get();


    };

    ws.onclose = function () {
        // 关闭 websocket
        console.log("连接已关闭...");
        var ltext = '<p>' + CurentTime() + '</p>连接已关闭...';
        $('#box-listener').append(ltext);
    };
    var table;
    $(document).ready(function() {
        table = $('#box_datatable');
        table.dataTable({
            /*"bProcessing": true,*/
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "全部"]
            ],
            searching: true, //是否显示查询
            lengthChange: true, //是否使用下位列表选择分页大小
            //ordering:false,//全部禁止排序
            paginationType: "full_numbers", //分页按钮：有精简和全功能几种选项
            //语言国际化设置，默认是英文的
            language: {
                lengthMenu: "显示 _MENU_ 记录", //[[10, 25, 50, -1], [10, 25, 50, "All"]], //"显示 _MENU_ 记录",
                zeroRecords: "没有找到记录",
                info: "第 <span style='color:red'>_PAGE_</span> 页 ( 总共 _PAGES_ 页 ) 共 _TOTAL_ 条记录",
                infoEmpty: "没有找到记录",
                infoFiltered: "(从 _MAX_ 条记录过滤)",
                paginate: {
                    first: "首页",
                    previous: " 上一页",
                    next: " 下一页 ",
                    last: " 尾页 "
                },
                search: "模糊查询：" //查询按钮显示的文本
            },
            "ajax": {
                "url": 'http://47.106.253.201/webApp/searchAllBox',
                dataSrc: "data"
            },
            /*"sAjaxSource": SERVER_URL + 'GoodsData',*/
            "columns": [
                { "data": "box" },
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        var html = '';
                        html += '<input type="text" class="form-control status' + row.id + '" style="width:50px;" value=' + row.status + '>';
                        return html;

                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        var html = '';
                        html += '<input type="text" class="form-control code' + row.id + '" style="width:100px;" value=' + row.code + '>';
                        return html;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        var html = '';
                        html += '<button type="button" class="btn btn-purple reg_box" data-id="' + row.id + '">确定</button>';
                        return html;
                    }
                },
            ],
            'aoColumnDefs': [{ //去掉排序
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }],

        });
    });
    $(document).on('click', '.reg_box', function() {
        var bid = $(this).attr('data-id').toString();
        var status = $('.status' + bid + '').val();
        console.log(status);
        var code = $('.code' + bid + '').val();
        console.log(code);
        regBox(bid,status,code);
    });
    function regBox($bid,$status, $code) {
        $.ajax({
            url: 'http://47.106.253.201/webApp/RegBox',
            type: 'POST',
            data: {
                bid:$bid,
                status: $status,
                code: $code
            },
            dataType: 'json',
            success: function(data) {
                /*console.log(data.goodsid);*/
                console.log(JSON.stringify(data));
                if(data.code == 200) {
                    swal(data.msg);
                } else {
                    swal(data.msg);
                }

            },
            error: function() {
                swal("操作有误！");
            }
        });
    }

</script>
</html>