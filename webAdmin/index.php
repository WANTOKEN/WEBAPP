<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define('MY_DB_HOST', '47.106.253.201');
define('MY_DB_USER', 'root');
define('MY_DB_PWD', 'ztking97');
define('MY_DB_NAME', 'webapp');
define('MY_DB_PORT', '3306');
/*
define('MY_DB_HOST', 'localhost');
define('MY_DB_USER', 'root');
define('MY_DB_PWD', 'root');
define('MY_DB_NAME', 'webapp');
define('MY_DB_PORT', '3306');*/
//解决Nginx的U方法
define('_PHP_FILE_',$_SERVER['SCRIPT_NAME']);
define('BIND_MODULE', 'Home');
// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单