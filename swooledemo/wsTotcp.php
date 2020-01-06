<?php
//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("0.0.0.0", 9503);
//webSocket服务器启动
echo "webSocket服务器启动";
$ws->set(array(
    'worker_num' => 4,
    'backlog' => 128,   //listen backlog
    'max_request' => 50,
    'dispatch_mode' => 1,
    'heartbeat_check_interval' => 30,
    'heartbeat_idle_time' => 62,
    'daemonize' => 1
));//守护进程
//多监听一个tcp端口，对外开启tcp服务，并设置tcp服务器的回调
$tcp_server = $ws->addListener('0.0.0.0', 9504, SWOOLE_SOCK_TCP);
//需要调用 set 方法覆盖主服务器的设置
$tcp_server->set(array());

$tcp_server->on("receive", function ($serv, $fd, $threadId, $data) use ($ws) {
    echo $data;
    // global $link_user;
    foreach($ws->connections as $fd){
        print_r($fd);
        $ws->push($fd, $data);
    }
});
//自定义转发服务器
//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
    /*  var_dump($request->fd, $request->get, $request->server);*/
    $ws->push($request->fd, "connectok");
    /* global $link_user;
     $link_user[] = $request->fd;*/
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    $msg = $frame->data;
    echo "recv: $msg\n";
    $tcpMsg = senTcpClientMsg($msg);
    echo "recvTcp: $tcpMsg\n";
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});
$ws->start();
function senTcpClientMsg($tcpMsg){
    $client = new swoole_client(SWOOLE_SOCK_TCP);
//连接到服务器
    if (!$client->connect('47.106.253.201', 9501, 0.5)) {
        die("connect failed.");
    }
//向服务器发送数据
    if (!$client->send($tcpMsg)) {
        die("send failed.");
    }
//从服务器接收数据
    $data = $client->recv();
    echo $data;
//关闭连接
    $client->close();
    return $data;
}