<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<body>
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
					<h3 class="title">商品数据</h3>
				</div>
				<!--Widget-4 -->
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">销量排行</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-group" id="hotList" v-cloak>
											<li class="list-group-item" v-for="item in items">
												<span class="badge bg-primary">{{item.sale}}</span>{{item.goodsname}}
											</li>
										</ul>
									</div>
								</div>
								<!-- end row -->
							</div>
							<!-- panel-body -->
						</div>
						<!-- panel -->
					</div>
					<div class="col-md-8">
						<div class="row">

							<div class="col-md-6">
								<div class="mini-stat clearfix">
									<span class="mini-stat-icon bg-warning"><i class="fa fa-sellsy"></i></span>
									<div class="mini-stat-info text-right">
										<span class="toalsale">956</span> 销量
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mini-stat clearfix">
									<span class="mini-stat-icon bg-info"><i class="fa fa-viacoin"></i></span>
									<div class="mini-stat-info text-right">
										<span class="totalgoods">15852</span> 商品总量
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mini-stat clearfix">
									<span class="mini-stat-icon bg-pink"><i class="fa fa-diamond"></i></span>
									<div class="mini-stat-info text-right">
										<span class="totaltype">5210</span> 商品种类
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mini-stat clearfix">
									<span class="mini-stat-icon bg-success"><i class="fa fa-shopping-cart"></i></span>
									<div class="mini-stat-info text-right">
										<span class="totalperson">20544</span> 购买人数
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- col -->

				</div>
				<!-- End row-->

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">在售商品</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<table id="datatable" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th style="text-align: center;">商品ID</th>
													<th style="text-align: center;">商品名称</th>
													<th style="text-align: center;">所属类型</th>
													<th style="text-align: center;">状态</th>
													<th style="text-align: center;">单价</th>
													<th style="text-align: center;">上架时间</th>
													<th style="text-align: center;">销量</th>
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
				<!-- End row -->

			</div>
			<div id="accordion-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content p-0">
						<div class="panel-group panel-group-joined" id="accordion-test">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
                                     <a data-toggle="collapse" data-parent="#accordion-test" href="modals.html#collapseOne" class="collapsed">
                                                                商品详情  </a>
                         
                           </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body" id="goodsdetails">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<p>商品名称：<mark class="pre_name">{{data.goodsid}}</mark></p>
												<p>附加说明：<mark class="pre_enname">{{data.goodsname}}</mark></p>
												<p>商品状态：<mark class="pre_enname">{{data.goodsstatus}}</mark></p>

											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<p>商品单价：<mark class="pre_price">{{data.goodsprice}}</mark></p>
												<p>商品类型：<mark class="pre_type">{{data.goodstype}}</mark></p>
											</div>

										</div>
										<hr>
										<div class="row" id="goodsimglist">

										</div>
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="table-responsive">
													<table class="table table-striped">
														<thead>
															<tr>
																<th>营养成分</th>
																<th>营养含量</th>
																<th>NRV(%)</th>
															</tr>
														</thead>
														<tbody>
															<tr v-for="item in item1">
																<td>{{item.itemname }}</td>
																<td>{{item.itemnum}}</td>
																<td>{{item.itemnrv}}</td>
															</tr>
														</tbody>

													</table>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="table-responsive">
													<table class="table table-striped">
														<thead>
															<tr>
																<th>材料名称</th>
																<th>来源厂商</th>
																<th>成分含量</th>
															</tr>
														</thead>
														<tbody>
															<tr v-for="item in item2">
																<td>{{item.itemname}}</td>
																<td>{{item.itemsource}}</td>
																<td>{{item.itemvalue}}</td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

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
            $('.pageB').addClass("active");
            $('.page2').addClass("active");
        });

    </script>

		<script>
			var v = new Vue({
				el: '#hotList',
				data: {
					items: ""
				},
				methods: {
					recommend: function() {
						$.ajax({
							type: "get",
							url: SERVER_URL + 'ADGetHotlist',
							dataType: "json",
							success: function(data) {
								console.log(JSON.stringify(data));
								v.items = data;
								console.log(data);
							}
						});
					}
				}
			});
			v.recommend();
			//获取总量
			getTotal();

			function getTotal() {
				$.ajax({
					type: "get",
					url: SERVER_URL + 'ADGetTotal',
					dataType: "json",
					success: function(data) {
						console.log(JSON.stringify(data));
						$('.toalsale').html(data.toalsale);
						$('.totalgoods').html(data.totalgoods);
						$('.totaltype').html(data.totaltype);
						$('.totalperson').html(data.totalperson);

					}
				});
			}
		</script>

		<script type="text/javascript">
			var table;
			$(document).ready(function() {
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
						"url": SERVER_URL + 'ADGetOnsaleGoodsdata',
						dataSrc: ""
					},
					/*"sAjaxSource": SERVER_URL + 'GoodsData',*/
					"columns": [
						{ "data": "goodsid" },
						{ "data": "goodsname" },
						{ "data": "goodstype" },
						{ "data": "goodsstatus" },
						{ "data": "goodsprice" },
						{ "data": "goodstime" },
						{ "data": "sale" },
						{
							"data": null,
							"render": function(data, type, row, meta) {
								var html = '<button type="button" class="btn btn-info look" data-goodsid="' + row.goodsid + '" data-toggle="modal" data-target="#accordion-modal">商品详情</button>';
								html += '&nbsp;&nbsp;';
								html += '<button type="button" class="btn btn-danger dismount" data-goodsid="' + row.goodsid + '">下架</button>';
								return html;
							}
						},
					],
					'aoColumnDefs': [{ //去掉排序
						'bSortable': false,
						'aTargets': [-1] /* 1st one, start by the right */
					}]

				});
			});
		</script>
		<script>
			var goodsvue = new Vue({
				el: '#goodsdetails',
				data: {
					data: "",
					item1: "",
					item2: ""

				}

			});
			//查看详情
			$(document).on("click", ".look", function() {
				var goodsid = $(this).attr('data-goodsid').toString();
				console.log(goodsid);
				$.ajax({
					type: "get",
					data: {
						goodsid: goodsid
					},
					url: SERVER_URL + 'ADGetGoodsDetail',
					dataType: "json",
					dataType: "json",
					success: function(data) {
						console.log(JSON.stringify(data));
						goodsvue.data = data.data[0];
						goodsvue.item1 = data.data1;
						goodsvue.item2 = data.data2;
						setImg(data.data3);

					}
				});

			});

			function setImg($data) {
				$('#goodsimglist').html('');
				var html = '';
				$.each($data, function(index, item) {
					html += '<img src="' + SERVER_RESOURCE + item.goodsimg + '" class="col-sm-12 img-responsive">';
				});
				$('#goodsimglist').append(html);
			}
			$(document).on("click", ".dismount", function() {
				var goodsid = $(this).attr('data-goodsid').toString();
				var elem = this;
				var li = elem.parentNode.parentNode;
				console.log(goodsid);
				swal({
					title: "确定下架此商品吗？",
					text: "进行本操作后仍可恢复",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					cancelButtonText: "取消",
					confirmButtonText: "下架",
					closeOnConfirm: false
				}, function() {
					disGoods(goodsid);
					console.log('下架');
					li.parentNode.removeChild(li);

				});
				/*$(this).parent().parent().remove();*/
			});

			function disGoods($goodsid) {
				$.ajax({
					type: "post",
					data: {
						goodsid: $goodsid
					},
					url: SERVER_URL + 'ADDisGoods',
					dataType: "json",
					success: function(data) {
						if(data.code == 200) {
							swal("已下架！", data.msg, "success");
						} else {
							swal(data.msg, data.msg, "error");
						}
						console.log(JSON.stringify(data));

					}
				});
			}
		</script>
	</body>

</html>