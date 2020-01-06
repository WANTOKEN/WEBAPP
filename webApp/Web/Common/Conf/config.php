<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',         // 数据库类型
    'DB_HOST'               =>  MY_DB_HOST,      // 服务器地址
    'DB_NAME'               =>  MY_DB_NAME,      // 数据库名
    'DB_USER'               =>  MY_DB_USER,      // 用户名
    'DB_PWD'                =>  MY_DB_PWD,       // 密码
    'DB_PREFIX'             =>  '',              // 数据库前缀
    'DB_PORT'               =>  MY_DB_PORT,      // 端口
    'DB_CHARSET'            =>  'utf8',          // 数据库编码默认采用utf8
    'URL_MODEL'  => 1,

    'READ_DATA_MAP'         =>  true,            // 
    'autoSub'               =>  FALSE,           // 上传文件不自动生成当前日期的文件夹

    'TMPL_L_DELIM'          =>  '{',            // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}',            // 模板引擎普通标签结束标记
    'SHOW_PAGE_TRACE'       =>  FALSE,           // 关闭绿标
    'MODULE_ALLOW_LIST'     => array('Home'),
    'URL_CASE_INSENSITIVE'  =>  false
);