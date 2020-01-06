<?php

namespace Home\Controller;

use Think\Controller;

class MessageController extends Controller
{
    public function test1(){

        //创建一个redis对象
        $redis = new \Redis();

        //连接本地的 Redis 服务
        $redis->connect('127.0.0.1', 6379);

        //密码验证,如果没有可以不设置
      /*  $redis->auth('123456');*/

        //查看服务是否运行
        echo "Server is running: " . $redis->ping();
        echo '<br/>';
        //设置缓存
        $redis->set('username','zhang san',3600);

        //获取缓存
     /*   $user_name = $redis->get('username');
        var_dump($user_name);*/
    }
    function test2(){
        $set=array(

            'type'=>'redis',

            'host'=>'127.0.0.1',

            'port'=>6379,

        );
        $message=array(

            'name'=>'yang',

            'id'=>1

        );
        // 存储数据到缓存

       /* S('message',$message,$set);*/
        //创建一个redis对象
        $redis = new \Redis();

        //连接本地的 Redis 服务
        $redis->connect('127.0.0.1', 6379);

        $user_name = $redis->get('username');
        echo $user_name;

    }
    public function getMessage()
    {
        $msg = I('msg');
        echo "接受的信息:" . $msg;
    }

    //获取取餐信息
    public function getboxMsg()
    {
        $box = D('Msg');
        $account = I('account');
        $where['userid'] = $account;
        $msg = $box->field('id,context')->select();
        if ($msg) {
            foreach ($msg as $info) {
                $data[] = array(
                    'title' => '您的餐品已送达',
                    'infomsg' => $info['context'],
                );
                $map['id'] = $info['id'];
                $box->where($map)->delete();//删除消息
            }
            $return = array(
                'code' => 200,
                'msg' => '您有新的订单信息！',
                'data' => $data,
            );
        } else {
            $return = array(
                'code' => 201,
                'msg' => '暂无订单信息'
            );
        }


        $this->ajaxReturn($return);
    }

    public function superCommand()
    {//超级管理员的开柜命令
        //b3cc7b2dece2d058c5bc943f1b0dbb3b
        $command = I('command');//命令
        set_time_limit(0);
        $host = "47.106.253.201";
        $port = 9501;
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $connection = socket_connect($socket, $host, $port);
        if($connection){
            $write = socket_write($socket, $command);
            $close = socket_close($socket);
            $msg = "已打开所有柜子";
        }else{
            $msg = "连接失败服务器出错...";
        }
        $this->ajaxReturn($msg);

    }
    public function adminCommand()
    {//超级管理员的开柜命令
        //b3cc7b2dece2d058c5bc943f1b0dbb3b
        $command = I('command');//命令
        set_time_limit(0);
        $host = "47.106.253.201";
        $port = 9501;
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $connection = socket_connect($socket, $host, $port);
        if($connection){
            $write = socket_write($socket, $command);
            $close = socket_close($socket);
            $code = 200;
        }else{
            $code = 400;
        }
        $this->ajaxReturn($code);

    }


    public function userCommand()
    {//用戶的开柜命令
        $command = I('command');//命令
        $orderId = I('orderid');//订单号
        $orders = D('Orders');
        $orders->startTrans();//开事务
        $box = D('Box');
        $where['orderNumber'] = $orderId;
        $where['orderCode'] = $command;
        $map['code']=$command;
        $map['status']=1;
        $data ['orderStatus'] = '已取餐';
        $data ['orderStatusCode'] = 2;
        $orders->where($where)->save($data);
        $state2 = $box->where($map)->select();
        $openbox = $state2[0]['box'];
        if ($state2){
            $msg='正在为您开启'.$openbox.'号柜,请稍等...';

            set_time_limit(0);
            $host = "47.106.253.201";
            $port = 9501;
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            $connection = socket_connect($socket, $host, $port);
            if($connection){
                socket_write($socket, $command);
                socket_close($socket);
                $orders->commit();
            }else{
                $msg='服务器出错';
                $orders->rollback();
            }

       }else{
            $orders->rollback();
            $msg='取餐码已失效';
        }
      /* */
        $this->ajaxReturn($msg);
    }

    public function setboxMsg()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $box = D('Box');
        $boxmsg = I('bmsg');
        $data['box'] = $boxmsg;
        $state = $box->add($data);
        if ($state) {
            $this->ajaxReturn('成功存储：' . $boxmsg);
        } else {
            $this->ajaxReturn('失败存储：' . $boxmsg);
        }

    }

}