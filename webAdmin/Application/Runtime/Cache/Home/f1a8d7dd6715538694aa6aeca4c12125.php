<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .uploadpanel {
            background: url(/webAdmin/Public/webresource/icon/add.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            border: 1px solid #ccc;
            text-align: center;
            height: 150px;
            min-width: 180px;
        }

        .delimgbtn {
            position: absolute;
            right: 20px;
            height: 20px;
            width: 20px;
            background-color: #FFFFFF;
            border-radius: 20px;
            top: 5px;
        }

        .delimgbtn1 {
            position: absolute;
            right: 20px;
            height: 20px;
            width: 20px;
            background-color: #FFFFFF;
            border-radius: 20px;
            top: 5px;
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
        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="page-title">
            <h3 class="title">下架商品</h3>
        </div>
        <div id="regoods-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">修改商品信息</h4>
                    </div>
                    <div class="modal-body" id="goodsdetails">
                        <form class="form-horizontal input-from" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label for="re_goodsid" class="control-label col-md-2">商品编号</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" disabled="" id="re_goodsid"
                                               v-model="data.goodsid">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <label class="col-md-2 control-label">商品名称</label>

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="请填写商品的中文名称"
                                               v-model="data.goodsname" id="goods-name">
                                    </div>
                                    <label class="col-md-2 control-label" for="goods-enname">附加说明</label>

                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder=""
                                               v-model="data.goodsenname" id="goods-enname">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 control-label">商品单价</label>

                                    <div class="col-md-3">
                                        <input type="number" id="goods-price" name="" class="form-control"
                                               placeholder="商品价格" min="0.00" v-model="data.goodsprice">

                                    </div>
                                    <label class="col-md-2 control-label">商品类型</label>

                                    <div class="col-md-3">
                                        <input type="search" class="form-control" autocomplete="on" autofocus="autofocus"
                                               id="goods-type" list="autoType" v-model="data.goodstype"/>
                                        <datalist id="autoType">
                                            <option value="套餐">套餐</option>
                                            <option value="主食">主食</option>
                                            <option value="豆浆">豆浆</option>
                                            <option value="牛奶">牛奶</option>
                                            <option value="果汁">果汁</option>
                                            <option value="饺子">饺子</option>
                                            <option value="披萨">披萨</option>
                                            <option value="三明治">三明治</option>
                                            <option value="吐司">吐司</option>
                                            <option value="粥">粥</option>
                                            <option value="其他">其他</option>
                                        </datalist>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-md-2 control-label">推荐理由</label>

                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="3" placeholder="请填写推荐的理由50字内"
                                                  maxlength="50" v-model="data.goodsrecom" id="goods-recom"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-md-2 control-label">营养价值说明</label>

                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="3" placeholder="请描述商品的价值100字内"
                                                  maxlength="100" v-model="data.goodsnutrition"
                                                  id="goods-nutrition"></textarea>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <hr>
                        <form class="form-horizontal input-from" role="form">
                            <div class="form-group nutritiondata" v-for="item in item1">
                                <label for="item_name" class="col-sm-1 control-label">名称</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="item_name" placeholder="" min="0"
                                           value="能量" disabled="disabled" v-model="item.itemname">
                                </div>
                                <label for="item_num" class="col-sm-1 control-label">数值</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control goodsenery" id="item_num"
                                           placeholder="营养数值" min="0" v-model="item.itemnum">
                                </div>
                                <label for="item_nrv" class="col-sm-1 control-label">NRV(%)</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="item_nrv" placeholder="营养素参考值" min="0"
                                           v-model="item.itemnrv">
                                </div>
                                <!--<div class="col-sm-1">
                                    <button type="button" class="btn btn-danger del-btn1">删除</button>
                                </div>-->
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-info add-btn1">添加</button>
                                </div>
                            </div>

                        </form>
                        <hr/>
                        <form class="form-horizontal input-from" role="form" id="material-body">

                            <div class="form-group materialdata" v-for="item in item2">
                                <label for="material_name" class="col-sm-offset-0 col-sm-1 control-label">材料</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="material_name" name="material_name"
                                           placeholder="材料名称" min="0" v-model="item.itemname">
                                </div>
                                <label for="material_source" class="col-sm-1 control-label">厂商</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="material_source" name="material_source"
                                           placeholder="来源厂商" min="0" v-model="item.itemsource">
                                </div>
                                <label for="material_value" class="col-sm-1 control-label">含量</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="material_value" name="material_value"
                                           placeholder="成分含量" min="0" v-model="item.itemvalue">
                                </div>

                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-danger del-btn2">删除</button>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-info add-btn2">添加</button>
                                </div>
                            </div>
                        </form>
                        <hr/>
                        <form id="uploadForm" enctype="multipart/form-data">
                            <div class="row">

                                <!--<div class="col-sm-4">
                                    <div class="panel img-panel" style="height: 200px; border: 1px solid #ccc;text-align: center;padding: 0;">
                                        <i class="delimgbtn">X</i>
                                        <img class="uploadimg img-responsive" src="" style="width:100%;height: 100%;" />
                                    </div>
                                </div>-->

                                <div class="col-sm-3 panel uploadpanel" id="uploadbox">
                                    <label for="file" style="width: 100%; height: 100%;">
                                        <input type="file" id="file" style="display: none" name="file[]"
                                               accept="image/*"/>
                                    </label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-3" style="text-align: center;">
                                    主图
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-info submit-btn">确认更改</button>
                    </div>
                </div>
                <!-- /.modal-content -->

            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- End Row -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">已下架的商品</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">商品ID</th>
                                        <th style="text-align: center;">商品名称</th>
                                        <th style="text-align: center;">状态</th>
                                        <th style="text-align: center;">操作时间</th>
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
<script>
    $(document).ready(function(){
        $('.pageB').addClass("active");
        $('.page4').addClass("active");
    });

</script>
<script type="text/javascript">
    var table;
    $(document).ready(function () {
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
                "url": SERVER_URL + 'ADGetDisGoods',
                dataSrc: ""
            },
            /*"sAjaxSource": SERVER_URL + 'GoodsData',*/
            "columns": [
                {"data": "goodsid"},
                {"data": "goodsname"},
                {"data": "goodsstatus"},
                {"data": "goodstime"},
                {
                    "data": null,
                    "render": function (data, type, row, meta) {
                        var html = '';
                        html += '<div class="btn-group">';
                        html += '<button type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-expanded="true">选择操作 <span class="caret"></span></button>';
                        html += '<ul class="dropdown-menu" role="menu">';
                        html += '<li><a href="#"><p class="text-purple regbtn" data-goodsid="' + row.goodsid + '">修改信息</p></a></li>';
                        html += '<li><a href="#"><p class="text reonsalebtn" data-goodsid="' + row.goodsid + '">重新上架</p></a></li>';
                        html += '<li><a href="#"><p class="text-danger delbtn" data-goodsid="' + row.goodsid + '">删除商品</p></a></li>';
                        html += '</ul>';
                        html += '</div>';
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
    var goodsvue = new Vue({
        el: '#goodsdetails',
        data: {
            data: "",
            item1: "",
            item2: ""

        }

    });
    var index = 0;
    var img = [];
    var delimg = new Array();
    document.getElementById('file').onchange = function () {
        add(index);
        var imgFile = this.files[0];
        //console.log(imgFile.name);
        if (imgFile) {
            var fr = new FileReader();
            fr.onload = function () {
                var imgs = document.getElementsByClassName('uploadimg');
                imgs[imgs.length - 1].src = fr.result;
                //console.log(fr.result);
            };
            fr.readAsDataURL(imgFile);
            img.push({name: "file" + index, path: imgFile});
            //console.log(JSON.stringify(img));
            //console.log(fr);
            index++;
        } else {
            return;
        }

    };

    function add() {
        var html = '';
        html += '<div class="col-sm-3 imgdiv">';
        html += '<div class="panel img-panel" style="height: 150px; border: 1px solid #ccc;text-align: center;padding: 0;">';
        html += '<i class="delimgbtn">X</i>';
        html += '<img class="uploadimg img-responsive" src="" style="width:100%;height: 100%;" />';
        html += '</div>';
        html += '</div>';
        $("#uploadbox").before(html);
    }
    $(document).on('click', '.delimgbtn', function () {
        var dindex = $(this).index('.delimgbtn');
        console.log(dindex); //获取元素index
        img.splice(dindex, 1);
        console.log(JSON.stringify(img));
        $(this).parent().parent().remove();
    });
    $(document).on('click', '.delimgbtn1', function () {
        var dindex = $(this).index('.delimgbtn1');
        var imgurl = $(this).attr('data-imgurl');
        //console.log(imgurl);
        delimg.push(imgurl);
        /*	console.log(delimg);
         console.log(dindex); //获取元素index*/
        $(this).parent().parent().remove();
    });
    $(document).on("click", ".regbtn", function () {
        index = 0;
        img = [];
        delimg = new Array();

        var goodsid = $(this).attr('data-goodsid').toString();
        $('#regoods-modal').modal('show')
        /*	console.log(goodsid);*/
        $.ajax({
            type: "get",
            data: {
                goodsid: goodsid
            },
            url: SERVER_URL + 'ADGetGoodsDetail',
            dataType: "json",
            dataType: "json",
            success: function (data) {
                console.log(JSON.stringify(data));
                goodsvue.data = data.data[0];
                goodsvue.item1 = data.data1;
                goodsvue.item2 = data.data2;
                setImg(data.data3);

            }
        });

    });

    function setImg($data) {
        $(".imgdiv").remove();
        var html = '';
        $.each($data, function (index, item) {
            html += '<div class="col-sm-3 imgdiv">';
            html += '<div class="panel img-panel" style="height: 150px; border: 1px solid #ccc;text-align: center;padding: 0;">';
            html += '<i class="delimgbtn1" data-imgurl="' + item.goodsimg + '">X</i>';
            html += '<img class="uploadimg1 img-responsive" src="' + SERVER_RESOURCE + item.goodsimg + '" style="width:100%;height: 100%;" />';
            html += '</div>';
            html += '</div>';
        });
        $("#uploadbox").before(html);
    }

    var formData;
    $(document).on("click", ".submit-btn", function () {
        /*console.log(img.length);
         if(img.length == 0) {
         swal('请添加图片！');
         return;
         }*/
        var imgdivlen = $('.imgdiv').length; //原有图片的存放位置个数
        if (imgdivlen == 0) { //没有原有图片了
            if (img.length == 0) { //没有新增加的图片
                swal('请添加图片！');
                return;
            }
        }

        console.log($('.imgdiv').length);

        //判断有没有图片

        formData = new FormData();
        $.each(img, function (index, item) {
            //console.log(item.name);
            formData.append(item.name, item.path);
        });

        var flag = 1;
        $('.input-from').find("input[type=text]").each(function () {
            if ($(this).val() == '') {
                flag = 0;
                return;
            } else {
                flag *= 1;
            }

        });
        console.log(flag);
        if (!flag) {
            swal('请填写完整！');
            return;
        }

        var goodsid = $("#re_goodsid").val().toString();
        console.log(goodsid);
        var goodsname = $('#goods-name').val();
        var goodsenname = $('#goods-enname').val();
        var goodsprice = $('#goods-price').val();
        var goodstype = $('#goods-type').val();
        var goodsenery = $('.goodsenery').val();
        var goodsrecom = $('#goods-recom').val();
        var goodsnutrition = $('#goods-nutrition').val();
        console.log(goodsenname + goodsprice + goodsrecom + goodsnutrition + goodstype + goodsenery);

        var materialJSON = [];
        $(".materialdata").each(function () {
            var material_name = ($(this).find('#material_name')).val();
            var material_source = ($(this).find('#material_source')).val();
            var material_value = ($(this).find('#material_value')).val();
            console.log(material_name + material_source + material_value);
            materialJSON.push({name: material_name, source: material_source, value: material_value});
        });
        console.log(JSON.stringify(materialJSON));
        var nutritionJSON = [];
        $(".nutritiondata").each(function () {
            var item_name = ($(this).find('#item_name')).val();
            var item_num = ($(this).find('#item_num')).val();
            var item_nrv = ($(this).find('#item_nrv')).val();
            //console.log(item_name + item_num + item_nrv);
            nutritionJSON.push({name: item_name, num: item_num, nrv: item_nrv});
        });

        /*	console.log(JSON.stringify(nutritionJSON));*/
        /*				console.log(nutritionJSON);*/
        $.ajax({
            url: SERVER_URL + 'ADRegGoodsData',
            type: 'POST',
            data: {
                goodsid: goodsid,
                goodsname: goodsname,
                goodsenname: goodsenname,
                goodsprice: goodsprice,
                goodstype: goodstype,
                goodsenery: goodsenery,
                goodsrecom: goodsrecom,
                goodsnutrition: goodsnutrition,
                nutritiondata: nutritionJSON,
                materialdata: materialJSON
            },
            dataType: 'json',
            success: function (data) {
                /*console.log(data.goodsid);*/
                console.log(JSON.stringify(data));
                if (data.code == 200) {
                    swal(data.msg);
                    regGoodsImg(data.goodsid, delimg);
                    //$('#regoods-modal').modal('hide')
                } else {
                    swal(data.msg);
                }

            },
            error: function () {
                swal("操作有误！");
            }
        });
    });

    function regGoodsImg($goodsid, $delimg) {
        //console.log($delimg);
        formData.append('goodsid', $goodsid);
        formData.append('del_img_url', $delimg);
        //重点：要用这种方法接收表单的参数
        $.ajax({
            url: SERVER_URL + 'ADRegGoodsImg',
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
                console.log(JSON.stringify(data));
                /*if(data.code == 200) {
                 swal("添加成功！");
                 } else {
                 swal("添加图片失败！");
                 }*/
                $('#regoods-modal').modal('hide');
            },
            error: function () {
                swal("操作有误！");
            }
        });
    }
    //重新上架
    $(document).on("click", ".reonsalebtn", function () {
        var goodsid = $(this).attr('data-goodsid').toString();
        var elem = this;
        var li = elem.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        console.log(goodsid);
        swal({
            title: "确定重新上架此商品吗？",
            text: "进行本操作后仍可恢复",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "取消",
            confirmButtonText: "上架",
            closeOnConfirm: false
        }, function () {
            onsaleGoods(goodsid);
            li.parentNode.removeChild(li);

        });
    });
    //重新上架
    function onsaleGoods($goodsid) {
        $.ajax({
            type: "post",
            data: {
                goodsid: $goodsid
            },
            url: SERVER_URL + 'ADOnSaleGoods',
            dataType: "json",
            success: function (data) {
                if (data.code == 200) {
                    swal("操作成功！", data.msg, "success");
                } else {
                    swal(data.msg, data.msg, "error");
                }
                console.log(JSON.stringify(data));

            }
        });
    }
    //删除商品
    $(document).on("click", ".delbtn", function () {
        var goodsid = $(this).attr('data-goodsid').toString();
        var elem = this;
        var li = elem.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        console.log(goodsid);
        swal({
            title: "确定删除此商品吗？",
            text: "进行本操作后仍可恢复",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "取消",
            confirmButtonText: "删除",
            closeOnConfirm: false
        }, function () {
            delGoods(goodsid);
            li.parentNode.removeChild(li);
        });
    });
    //删除商品
    function delGoods($goodsid) {
        $.ajax({
            type: "post",
            data: {
                goodsid: $goodsid
            },
            url: SERVER_URL + 'ADDelGoods',
            dataType: "json",
            success: function (data) {
                console.log(JSON.stringify(data));
                if (data.code == 200) {
                    swal("操作成功！", data.msg, "success");
                } else {
                    swal(data.msg, data.msg, "error");
                }

            }
        });
    }

    $(document).on("click", ".add-btn1", function () {
        //拼接一行

        var row1 = $('.nutritiondata').length;
        console.log(row1);
        if (row1 < 5) {
            row1++;
            var html = '';
            html += '<div class="form-group nutritiondata">';
            html += '<label for="item_name" class="col-sm-offset-0 col-sm-1 control-label">名称</label>';
            html += '<div class="col-sm-2">';
            html += '<input type="text" class="form-control" id="item_name" name="item_name" placeholder="名称" min="0">';
            html += '</div>';
            html += '<label for="item_num" class="col-sm-1 control-label">数值</label>';
            html += '<div class="col-sm-2">';
            html += '<input type="number" class="form-control" id="item_num" name="item_num" placeholder="营养数值" min="0">';
            html += '</div>';
            html += '<label for="item_nrv" class="col-sm-1 control-label">NRV(%)</label>';
            html += '<div class="col-sm-2">';
            html += '<input type="number" class="form-control" id="item_nrv" name="item_nrv" placeholder="营养素参考值" min="0">';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-danger del-btn1">删除</button>';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-info add-btn1">添加</button>';
            html += '</div>';
            html += '</div>';
            $(this).parent().parent().after(html);

        } else {
            swal("最多填写5个项目哦！");
        }
    });
    $(document).on("click", ".del-btn1", function () {
        /*console.log(row1);*/
        var row1 = $('.nutritiondata').length;
        if (row1 <= 1) {
            swal("不能删除！");
        } else {
            $(this).parent().parent().remove();
            row1--;
        }

    });
    $(document).on("click", ".add-btn2", function () {
        //拼接一行
        var row2 = $('.materialdata').length;
        if (row2 < 10) {
            row2++;
            var html = '';
            html += '<div class="form-group materialdata">';
            html += '<label for="material_name" class="col-sm-offset-0 col-sm-1 control-label">材料</label>';
            html += '<div class="col-sm-2">';
            html += '<input type="text" class="form-control" id="material_name" name="material_name" placeholder="材料名称" min="0">';
            html += '</div>';
            html += '<label for="material_source" class="col-sm-1 control-label">厂商</label>';
            html += '<div class="col-sm-2">';
            html += '<input type="text" class="form-control" id="material_source" name="material_source" placeholder="来源厂商" min="0">';
            html += '</div>';
            html += '<label for="material_value" class="col-sm-1 control-label">含量</label>';
            html += '<div class="col-sm-2">';
            html += '<input type="number" class="form-control" id="material_value" name="material_value" placeholder="成分含量" min="0">';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-danger del-btn2">删除</button>';
            html += '</div>';
            html += '<div class="col-sm-1">';
            html += '<button type="button" class="btn btn-info add-btn2">添加</button>';
            html += '</div>';
            html += '</div>';
            $(this).parent().parent().after(html);

        } else {
            swal("最多填写10个项目哦！");
            /*$("#input1").find('label').eq(0).html('材料' + row);*/
        }
    });
    $(document).on("click", ".del-btn2", function () {
        var row2 = $('.materialdata').length;
        console.log(row2);
        if (row2 <= 1) {
            swal("不能删除！");
            /*alert('不能删除！');*/
        } else {
            $(this).parent().parent().remove();
            row2--;
        }

    });
</script>

</body>

</html>