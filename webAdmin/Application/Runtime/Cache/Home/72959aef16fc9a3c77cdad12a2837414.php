<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">



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
            <h3 class="title">Welcome !</h3>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-pink">
                    <i class="ion-icecream"></i>

                    <h2 class="m-0 counter goods_total">
                        50</h2>

                    <div>商品总量</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-purple">
                    <i class="ion-cash"></i>

                    <h2 class="m-0 counter sale_total">12056</h2>

                    <div>销售总额</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-info">
                    <i class="ion-card"></i>

                    <h2 class="m-0 counter order_total">1268</h2>

                    <div>订单总量</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-success">
                    <i class="ion-android-contacts"></i>

                    <h2 class="m-0 counter user_total">145</h2>

                    <div>用户数量</div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="portlet">
                    <!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            销售周报
                        </h3>

                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i
                                    class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet1" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <div id="morris-bar-example" style="height: 320px;"></div>

                            <div class="row text-center m-t-30 m-b-30">
                                <div class="col-sm-3 col-xs-6">
                                    <h4 class="day_sale">$ 126</h4>
                                    <small class="text-muted">日销售额</small>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <h4 class="week_sale">$ 967</h4>
                                    <small class="text-muted">周销售额</small>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <h4 class="month_sale">$ 4500</h4>
                                    <small class="text-muted">月销售额</small>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <h4 class="year_sale">$ 87,000</h4>
                                    <small class="text-muted">年销售额</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Portlet -->

            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="portlet">
                    <!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            销售日报
                        </h3>

                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i
                                    class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet2" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <div id="morris-line-example" style="height: 200px;"></div>
                            <div class="row text-center m-t-30">
                                <div class="col-sm-4">
                                    <h4 class="day_orders">86,956</h4>
                                    <small class="text-muted">订单总量</small>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="day_total">86,69</h4>
                                    <small class="text-muted">销售总量</small>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="day_count">$ 948,16</h4>
                                    <small class="text-muted">销售总额</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Portlet -->
                <div class="tile-stats white-bg">
                    <div class="col-sm-8">
                        <div class="status">
                            <h3 class="m-t-15">61.5%</h3>

                            <p>股本占比</p>
                        </div>
                    </div>
                    <div class="col-sm-4 m-t-20">
                        <span class="sparkpie-big"><canvas width="98" height="50"
                                                           style="display: inline-block; width: 98px; height: 50px; vertical-align: top;"></canvas></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- Page Content Ends -->
    <!-- ================== -->
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

</section>
<!-- Main Content Ends -->
<script src="/webAdmin/Public/assets/morris/morris.min.js"></script>
<script src="/webAdmin/Public/assets/morris/raphael.min.js"></script>

<script src="/webAdmin/Public/assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/webAdmin/Public/assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.page1').addClass("active");
    });

</script>
<script>
    !function ($) {
        "use strict";

        var Dashboard = function () {
            this.$body = $("body")
        };
        //initializing various charts and components
        Dashboard.prototype.init = function () {
            function setLine($element, $data) {
                Morris.Line({
                    element: $element,
                    data: $data,
                    xkey: 'y',
                    ykeys: ['a', 'b', 'c'],
                    labels: ['订单量', '销售量', '销售额'],
                    resize: true,
                    lineColors: ['#3bc0c3', '#1a2942', '#ffcc33']
                });
            }

            function setBar($element, $data) {
                Morris.Bar({
                    element: $element,
                    data: $data,
                    xkey: 'y',
                    ykeys: ['a', 'b', 'c'],
                    labels: ['订单量', '总销量', '销售额'],
                    barColors: ['#3bc0c3', '#1a2942', '#ffcc33']
                });
            }

            $.ajax({
                type: "get",
                url: SERVER_URL + 'ADIndexReport',
                dataType: "json",
                success: function (data) {
                    /*console.log(JSON.stringify(data));*/
                    setBar('morris-bar-example', data.salebar);
                    setLine('morris-line-example', data.saleline);
                    $('.goods_total').html(data.indexinfo.goods_total);
                    $('.sale_total').html(data.indexinfo.sales_total);
                    $('.order_total').html(data.indexinfo.orders_total);
                    $('.user_total').html(data.indexinfo.users_total);
                    $('.day_sale').html('￥ ' + data.saledata.day_sale);
                    $('.week_sale').html('￥ ' + data.saledata.week_sale);
                    $('.month_sale').html('￥ ' + data.saledata.month_sale);
                    $('.year_sale').html('￥ ' + data.saledata.year_sale);
                    $('.day_orders').html(data.day_sale_info.total_orders);
                    $('.day_total').html(data.day_sale_info.total_total);
                    $('.day_count').html('￥ ' + data.day_sale_info.total_count);


                },
                error: function () {

                }
            });
            //Bar chart

        },
            //init dashboard
                $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard

    }(window.jQuery),

        //initializing dashboad
            function ($) {
                "use strict";
                $.Dashboard.init()
            }(window.jQuery);
</script>
</body>

</html>