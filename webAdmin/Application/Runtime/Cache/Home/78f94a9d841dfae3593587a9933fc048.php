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
					<h3 class="title">资金管理</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">交易记录</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<table id="datatable" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th style="text-align: center;">用户编号</th>
													<th style="text-align: center;">用户姓名</th>
													<th style="text-align: center;">账户余额</th>
													<th style="text-align: center;">注册时间</th>
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
				<!-- End Row -->

				<div id="balancedetail-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog" id="balancedetail">
						<div class="modal-content p-0 b-0">
							<div class="panel panel-color panel-primary">
								<div class="panel-heading">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 class="panel-title"><span class="balance_username"></span>的消费明细</h3>
								</div>
								<div class="panel-body">
									<ol class="list-inline">
										<li>充值：<mark><strong>{{item.pay}}</strong></mark></li>
										<li>消费：<mark><strong>{{item.cost}}</strong></mark></li>
									</ol>
									<hr>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<table class="table">
											<thead>
												<tr>
													<th>交易单号</th>
													<th>操作时间</th>
													<th>支付方式</th>
													<th>交易金额</th>
												</tr>
											</thead>
											<tbody>
												<tr v-for="dataitems in dataitems">
													<td>{{dataitems.blancenumber}}</td>
													<td>{{dataitems.blancetime}}</td>
													<td>{{dataitems.blanceways}}</td>
													<td v-if="dataitems.blancecount!=0.00">+{{dataitems.blancecount}}</td>

													<td v-else>-{{dataitems.blancecost}}</td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->

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

		</section>
		<!-- Main Content Ends -->
        <script>
            $(document).ready(function(){
                $('.pageD').addClass("active");
                $('.page9').addClass("active");
            });

        </script>
		<script type="text/javascript">
			var balancevue = new Vue({
				el: '#balancedetail',
				data: {
					item: "",
					dataitems: ""
				}

			})

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
						"url": SERVER_URL + 'ADGetUserBalanceInfo',
						dataSrc: ""
					},
					/*"sAjaxSource": SERVER_URL + 'GoodsData',*/
					"columns": [
						{ "data": "userid" },
						{ "data": "username" },
						{
							"data": null,
							"render": function(data, type, row, meta) {
								var html = '<span class="label label-info" data-toggle="tooltip" data-placement="left" title="剩余折扣点数：224">' + row.userblance + '</span>';
								return html;
							}
						},
						{ "data": "regtime" },
						{
							"data": null,
							"render": function(data, type, row, meta) {
								var html = '<button type="button" data-toggle="modal" class="btn btn-default btn-rounded m-b-5 look" data-userid="' + row.userid + '" data-username="' + row.username + '"><i class="fa fa-search"></i></button>';
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
			$(document).ready(function() {
				getDatas();
			});
			//查看详情
			$(document).on("click", ".look", function() {
				var userid = $(this).attr('data-userid').toString();
				var username = $(this).attr('data-username').toString();
/*				console.log(userid + username);*/
				$('.balance_username').html(username);
				$.ajax({
					type: "post",
					data: {
						userid: userid
					},
					url: SERVER_URL + 'ADGetUserBalanceDetail',
					dataType: "json",
					success: function(data) {
						if(data.code == 200) {
							console.log(JSON.stringify(data));
							balancevue.item = data.cost;
							console.log(JSON.stringify(balancevue.item));
							balancevue.dataitems = data.data;
							console.log(JSON.stringify(balancevue.dataitems));
							$('#balancedetail-model').modal('show')
						} else {
							swal('暂无消费记录！');
						}

					}
				});
			});
		</script>

	</body>

</html>