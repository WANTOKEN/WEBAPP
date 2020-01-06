<?php
$server = new swoole_server("0.0.0.0", 9505);
$server->set(array(
    //'heartbeat_check_interval' => 5,
    //'heartbeat_idle_time' => 10,//上面的设置就是每5秒侦测一次心跳，一个TCP连接如果在10秒内未向服务器端发送数据，将会被切断
    'worker_num' => 4,
    'backlog' => 128,   //listen backlog
    'max_request' => 50,
    'dispatch_mode' => 1,
    'daemonize' => 1
));//守护进程

echo "服务器已启动！";
//监听连接进入事件
$server->on('connect', function ($serv, $fd){
    echo "connection open: {$fd}\n";
    $serv->send($fd, "ok");

});
//监听数据接收事件
$server->on('receive', function ($serv, $fd, $from_id, $data) {
    echo  "recv:".$fd."->".$data;
    foreach ($serv->connections as $fd) {
        $serv->send($fd, $data);//将消息发送给所有连接客户端
    }



});
//监听连接关闭事件
$server->on('close', function ($serv, $fd) {
    $serv->send($fd, 'close');
    echo $fd . "Client: Close.\n";
});
//启动服务器
$server->start();

