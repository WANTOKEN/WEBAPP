<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="shortcut icon" href="/webAdmin/Public/img/favicon_1.ico">

		<title>登录</title>

		<!-- Bootstrap core CSS -->
		<link href="/webAdmin/Public/css/bootstrap.min.css" rel="stylesheet">
		<link href="/webAdmin/Public/css/bootstrap-reset.css" rel="stylesheet">

		<!--Animation css-->
		<link href="/webAdmin/Public/css/animate.css" rel="stylesheet">
		<link href="/webAdmin/Public/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
		<!--Icon-fonts css-->
		<link href="/webAdmin/Public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="/webAdmin/Public/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

		<!-- Custom styles for this template -->
		<link href="/webAdmin/Public/css/style.css" rel="stylesheet">
		<link href="/webAdmin/Public/css/helper.css" rel="stylesheet">
		<link href="/webAdmin/Public/css/style-responsive.css" rel="stylesheet" />

	</head>

	<body>

		<div class="wrapper-page animated fadeInDown">
			<div class="panel panel-color panel-primary">
				<div class="panel-heading">
					<h3 class="text-center m-t-10"> Sign In to <strong>LBB</strong> </h3>
				</div>

				<div class="form-horizontal m-t-40">
                    <form action="DoLogin" method="post">
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" placeholder="账号" id="account" name="account">
						</div>
					</div>
					<div class="form-group ">

						<div class="col-xs-12">
							<input class="form-control" type="password" placeholder="密码" id="password" name="password">
						</div>
					</div>

					<div class="form-group ">
						<div class="col-xs-12">
							<label class="cr-styled">
                                <input type="checkbox" checked>
                                <i class="fa"></i> 
                               记住密码
                            </label>
						</div>
					</div>

					<div class="form-group text-right">
						<div class="col-xs-12">
							<button class="btn btn-purple w-md" type="submit" id="submit">登录</button>
						</div>
					</div>
                    </form>
				</div>

			</div>
		</div>

		<script src="/webAdmin/Public/js/jquery.js"></script>
		<script src="/webAdmin/Public/js/bootstrap.min.js"></script>
		<script src="/webAdmin/Public/js/pace.min.js"></script>
		<script src="/webAdmin/Public/js/config.js"></script>
		<script src="/webAdmin/Public/assets/sweet-alert/sweet-alert.min.js"></script>
		<script>
            <?php echo ($js); ?>
		</script>

	</body>

</html>