<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

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
            <h3 class="title">订单数据</h3>
        </div>
        <!--Widget-4 -->
        <div class="row">
            <div class="col-md-4">
                <a href="page5">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-info"><i class="fa  fa-book"></i></span>

                        <div class="mini-stat-info text-right">
                            <span class="order_total">0</span> 订单总量
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="page5.html">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-success"><i class="fa fa-check"></i></span>

                        <div class="mini-stat-info text-right">
                            <span class="order_success">0</span> 正常订单
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="page6">
                    <div class="mini-stat clearfix">

                        <span class="mini-stat-icon bg-danger"><i class="fa fa-bullseye"></i></span>

                        <div class="mini-stat-info text-right">
                            <span class="order_fail">0</span> 异常订单
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- End row-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">所有订单</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">订单编号</th>
                                        <th style="text-align: center;">用户编号</th>
                                        <th style="text-align: center;">支付方式</th>
                                        <th style="text-align: center;">下单时间</th>
                                        <th style="text-align: center;">实际支付</th>
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
            </div>

        </div>
        <!--订单详细-->
        <div id="orderdetail-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">订单详细</h4>
                    </div>
                    <div class="modal-body" id="orderdetail">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="code"></div>
                                <p>订单状态:&nbsp;&nbsp;{{item.orderstatus}}</p>
                                <p>订单状态码:&nbsp;&nbsp;{{item.orderstatuscode}}</p>
                                <p>取餐柜:&nbsp;&nbsp;{{item.order_box}}</p>
                                <p>取餐码:&nbsp;&nbsp;{{item.ordercode}}</p>
                                <p>要求时间:&nbsp;&nbsp;{{item.comtime}}</p>

                            </div>
                            <div class="col-md-6">
                                <p>订单编号:&nbsp;&nbsp;{{item.ordernumber}}</p>
                                <p>用户ID:&nbsp;&nbsp;{{item.userid}}</p>
                                <p>收件人:&nbsp;&nbsp;{{item.order_name}}</p>
                                <p>支付方式:&nbsp;&nbsp;{{item.orderpayway}}</p>
                                <p>付款:&nbsp;&nbsp;{{item.totalpay}}</p>
                                <p>折扣:&nbsp;&nbsp;{{item.discountpay}}</p>
                                <p>实付:&nbsp;&nbsp;{{item.realpay}}</p>
                                <p>联系电话:&nbsp;&nbsp;{{item.order_tel}}</p>
                                <p>配送地址:&nbsp;&nbsp;{{item.order_address}}</p>
                                <p>下单时间:&nbsp;&nbsp;{{item.ordertime}}</p>
                                <p>到达时间:&nbsp;&nbsp;{{item.arrtime}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" v-for="dataitems in dataitems">
                                <div class="panel">
                                    <h5 class="panel-title">编号：&nbsp;&nbsp;{{dataitems.goodsid}}</h5>

                                    <div class="panel-body">
                                        <p>商品名称：&nbsp;&nbsp;{{dataitems.goods_name}}</p>

                                        <p>商品单价：&nbsp;&nbsp;{{dataitems.goods_price}}</p>

                                        <p>商品数量：&nbsp;&nbsp;{{dataitems.goods_quantity}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">关闭</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

        </div>
        <!-- End Row -->
        <!--修改订单状态-->
        <div id="changeorder-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">修改订单信息</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="c_ordernum" class="control-label">订单编号</label>
                                    <input type="text" class="form-control" disabled="" id="c_ordernum">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_name" class="control-label">联系人姓名</label>
                                    <input type="text" class="form-control" placeholder="联系人" id="c_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_tel" class="control-label">联系电话</label>
                                    <input type="text" class="form-control" placeholder="联系电话" id="c_tel">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="c_status" class="control-label">配送状态</label>
                                    <select class="form-control" id="c_status">
                                        <option value="配送中">配送中</option>
                                        <option value="已送达">已送达</option>
                                        <option value="取消订单">取消订单</option>
                                        <option value="等待配送">等待配送</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="c_address" class="control-label">配送地址</label>
                                    <input type="text" class="form-control" placeholder="修改配送地址" id="c_address">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-info echange-btn">确认更改</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

        </div>

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
    $(document).ready(function(){
        $('.pageC').addClass("active");
        $('.page5').addClass("active");
    });

</script>


<script type="text/javascript">
    function getInfo() {
        $.ajax({
            type: "get",
            url: SERVER_URL + 'ADGetOrdersInfo',
            dataType: "json",
            success: function (data) {
                console.log(JSON.stringify(data));
                $('.order_total').html(data.ordertotal);
                $('.order_success').html(data.ordersuccess);
                $('.order_fail').html(data.orderfail);
            }
        });

    }

    function getDatas() {
        var table;
        table = $('#datatable');
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
                info: "每页显示 10 条 当前显示 _START_ 到 _END_ 条，第 <span style='color:red'>_PAGE_</span> 页 ( 总共 _PAGES_ 页 ) 共 _TOTAL_ 条记录",
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
                "url": SERVER_URL + 'ADGetOrdersData',
                dataSrc: ""
            },
            /*"sAjaxSource": SERVER_URL + 'GoodsData',*/
            "columns": [
                {"data": "ordernumber"},
                {"data": "userid"},
                {"data": "orderpayway"},
                {"data": "ordertime"},
                {"data": "realpay"},
                {"data": "orderstatus"},
                {"data": "ordercode"},
                {
                    "data": null,
                    "render": function (data, type, row, meta) {
                        var html = '<button type="button" class="btn btn-success look" data-goodsid="' + row.ordernumber + '" data-toggle="modal" data-target="#orderdetail-modal">查看详情</button>';
                        html += '&nbsp;&nbsp;';
                        html += '<button type="button" class="btn btn-purple change" data-goodsid="' + row.ordernumber + '" data-uname="' + row.order_name + '" data-utel="' + row.order_tel + '" data-uaddress="' + row.order_address + '" data-status="' + row.orderstatus + '" data-toggle="modal" data-target="#changeorder-modal">修改状态</button>';
                        return html;
                    }
                },
            ],
            'aoColumnDefs': [{ //去掉排序
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }]

        });
    }
    $(document).ready(function () {
        getInfo(); //简要信息
        getDatas();
    });
</script>
<script type="text/javascript" src="/webAdmin/Public/js/qrcode/jquery.qrcode.min.js" ></script>
<script>
    var ordervue = new Vue({
        el: '#orderdetail',
        data: {
            item: "",
            dataitems: ""
        }

    })
    //查看详情
    $(document).on("click", ".look", function () {
        var goodsid = $(this).attr('data-goodsid').toString();
        $("#code").empty();
        var str = goodsid;
        $("#code").qrcode({
            render: "table",
            width: 200,
            height: 200,
            text: str
        });
        console.log(goodsid);
        $.ajax({
            type: "post",
            data: {
                ordernum: goodsid
            },
            url: SERVER_URL + 'ADGetOneOrderDetail',
            dataType: "json",
            success: function (data) {
                /*		console.log(JSON.stringify(data));*/
                ordervue.item = data.data[0];
                /*	console.log(JSON.stringify(ordervue.item));*/
                ordervue.dataitems = data.item;
                /*console.log(data.item);*/
                console.log(JSON.stringify(ordervue.dataitems));
            }
        });
    });
    //更改
    $(document).on("click", ".change", function () {
        var goodsid = $(this).attr('data-goodsid').toString();
        /*	console.log(goodsid);*/
        var uname = $(this).attr('data-uname').toString();
        /*	console.log(uname);*/
        var utel = $(this).attr('data-utel').toString();
        /*	console.log(utel);*/
        var uaddress = $(this).attr('data-uaddress').toString();
        /*	console.log(uaddress);*/
        var status = $(this).attr('data-status').toString();
        /*	console.log(status);*/
        $('#c_ordernum').val(goodsid);
        $('#c_name').val(uname);
        $('#c_tel').val(utel);
        $('#c_address').val(uaddress);
        $("#c_status").val(status);
    });
    //确认更改
    $(document).on("click", ".echange-btn", function () {
        var goodsid = $('#c_ordernum').val();
        console.log(goodsid);
        var uname = $('#c_name').val();
        console.log(uname);
        var utel = $('#c_tel').val();
        console.log(utel);
        var uaddress = $('#c_address').val();
        console.log(uaddress);
        var status = $("#c_status").val();
        console.log(status);
        if (uname == '' || utel == '' || uaddress == '') {
            swal("请填写完整！");
            return;
        }
        $.ajax({
            type: "post",
            data: {
                ordernum: goodsid,
                name: uname,
                tel: utel,
                address: uaddress,
                status: status
            },
            url: SERVER_URL + 'ADChangeOrders',
            dataType: "json",
            success: function (data) {
                console.log(JSON.stringify(data));
                swal(data.msg);
            }
        });
    });
</script>
</body>

</html>