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
            <span class="nav-label">时膳</span>
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
                    <h3 class="title">合作加盟</h3>
                </div>
                <!--Widget-4 -->

                <div class="row">
					<div class="col-sm-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">加盟信息表</h3></div>
							<div class="panel-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-md-2 control-label">商家名称</label>
										<div class="col-md-10">
											<input type="text" class="form-control" placeholder="请填写商家名称">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label" for="example-email">登录密码</label>
										<div class="col-md-10">
											<input type="password" id="example-email" class="form-control" placeholder="请填写商家的登录密码">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">店铺地址</label>
										<div class="col-md-10">
											<input type="text" class="form-control" placeholder="请填写商家的店铺地址">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">商家名称</label>
										<div class="col-md-10">
											<input type="text" class="form-control" placeholder="请填写商家名称">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">商家评分</label>
										<div class="col-md-10">
											<input type="text" class="form-control" placeholder="请填写商家的评分">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">商家信用评级</label>
										<div class="col-md-10">
											<input type="text" class="form-control" placeholder="请填写商家的信用评级">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">商家当前状态</label>
										<div class="col-md-10">
											<select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
										</div>
									</div>
									<hr>
									<div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-success" type="submit">提交</button>
                                                <button class="btn btn-default" type="reset">重填</button>
                                            </div>
                                        </div>

								</form>
                            </div>

								</form>
							</div>
							<!-- panel-body -->
						</div>
						<!-- panel -->
					</div>
					<!-- col -->
				</div>





            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

           <!-- Footer Start -->
            <!DOCTYPE html>
<html>

<body>
<footer class="footer">
    2018 © 时膳团队.
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
 <script>
     $(document).ready(function(){
         $('.pageE').addClass("active");
         $('.page11').addClass("active");
     });

 </script>



    </body>
</html>