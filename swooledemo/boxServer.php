<?php
$server = new swoole_server("172.18.40.128", 9501);
$server->set(array(
    //'heartbeat_check_interval' => 5,
    //'heartbeat_idle_time' => 10,//上面的设置就是每5秒侦测一次心跳，一个TCP连接如果在10秒内未向服务器端发送数据，将会被切断
    'worker_num' => 4,
    'backlog' => 128,   //listen backlog
    'max_request' => 50,
    'dispatch_mode' => 1,
    'daemonize' => 1
));//守护进程

$config = array(
    'host' => '47.106.253.201',
    'port' => 3306,
    'user' => 'root',
    'password' => 'ztking97',
    'database' => 'webapp',
    'charset' => 'utf8', //指定字符集
    'timeout' => 2,  // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
);
echo "服务器已启动！";
//监听连接进入事件
$server->on('connect', function ($serv, $fd) {
    echo $fd . "Client: Connect.\n";
    /*  $serv->send($fd, "Connect OK！");*/
});
//监听数据接收事件
$server->on('receive', function ($serv, $fd, $from_id, $data) use ($config) {
    global $msg;//全局msg
    $input = trim($data);//将输入的格式化
    if ($input == "connect") {//如果输入为“connect”,心跳测试包
        $msg = 'ok';
        $serv->send($fd, $msg);//单个发送，单个回复
    } else if ($input == "") {//如果输入为空,返回0
        $msg = 0;
        sendMsg($serv, $msg);
    } else if ($input == 999999) {//如果输入为“openall”,表示开全部柜子指令
        //b3cc7b2dece2d058c5bc943f1b0dbb3b
        $db = new swoole_mysql();
        $db->connect($config, function ($db, $r) use ($serv) {//闭包
            $sql_one = "UPDATE box SET status='0'";
            $db->query($sql_one, function ($db, $result) {
                $db->close();
            });
            $db->close();
            $msg = 9;
            echo 'msg:' . $msg;
            sendMsg($serv, $msg);
        });
    } else if (substr($input,0,4)=="open") {//如果输入为“openall”,表示开全部柜子指令
        $command = substr($input,4);
        if($command=="all"){
            $db = new swoole_mysql();
            $db->connect($config, function ($db, $r) use ($serv) {//闭包
                $sql_one = "UPDATE box SET status='0'";
                $db->query($sql_one, function ($db, $result) {
                    $db->close();
                });
                $db->close();
                $msg = 9;
                echo 'msg:' . $msg;
                sendMsg($serv, $msg);
            });
        }else{
            $msg = $command;
            sendMsg($serv, $msg);
        }

    } else {
        $code = $input;//将输入转为取餐码
        $db = new swoole_mysql();
        $db->connect($config, function ($db, $r) use (&$msg, $serv, $code) {//闭包
            $sql = "select * from box where status=1 and code=$code limit 1";
            $db->query($sql, function (swoole_mysql $db, $r) use (&$msg, $serv) {
                if (empty($r)) {
                    $box = 0;
                    echo "no:" . $box;
                } else {
                    $box = $r[0]['box'];
                    echo "yes:" . $box;
                    //更改柜子状态
                   $sql_one = "UPDATE box SET status='0' where box='$box'";
                    $db->query($sql_one, function ($db, $result) {
                        $db->close();
                    });
                }
                $db->close();
                $msg = $box;
                echo 'msg:' . $msg;
                sendMsg($serv, $msg);

            });
        });

    }
});
function senTcpClientMsg($tcpMsg)
{
    $client = new swoole_client(SWOOLE_SOCK_TCP);
//连接到服务器
    if (!$client->connect('47.106.253.201', 9504, 0.5)) {
        die("connect failed.");
    }
//向服务器发送数据
    if (!$client->send($tcpMsg)) {
        die("send failed.");
    }
//从服务器接收数据
    $data = $client->recv();
    if (!$data) {
        die("recv failed.");
    }
    echo $data;
//关闭连接
    $client->close();
}

function sendMsg($serverval, $msg)
{
    foreach ($serverval->connections as $fd) {
        $serverval->send($fd, $msg);//将消息发送给所有连接客户端
    }
    senTcpClientMsg($msg);
}

//监听连接关闭事件
$server->on('close', function ($serv, $fd) {
    $serv->send($fd, 'close');
    echo $fd . "Client: Close.\n";
});

//启动服务器
$server->start();


