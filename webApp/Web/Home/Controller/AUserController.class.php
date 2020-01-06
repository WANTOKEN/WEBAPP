<?php
namespace Home\Controller;

use Think\Controller;

class AUserController extends Controller
{
    function getInfo(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $user = D('User');
        $orders = D('Orders');
        $now = date('Y-m-d');
        $where['regTime']=array('like',"$now%");
        $userstotal = $user->count();//用户总数
        $usersnew = $user->where($where)->count();//今日注册新用户
        $where2['comTime']=array('like',"$now%");
        $usersactive = $user->where($where2)->count();//登录用户
        $usersbuy = $orders->group('userId')->count();//消费用户数
        $return = array(
            'usertotal'=>$userstotal,
            'usersnew'=>$usersnew,
            'usersactive'=>$usersactive,
            'usersbuy'=>$usersbuy
        );
        $this->ajaxReturn($return);
    }
    function getUsersData(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $user = D('User');
        $userdata = $user->select();
        $this->ajaxReturn($userdata);
    }
    function getUsersDetail(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $user = D('User');
        $userid = I('userid');
        $where['userId'] = $userid;
        $userdata = $user->where($where)->select();
        $this->ajaxReturn($userdata);
    }
    /*
     * 获取用户的余额
     */
    function getUserBalanceInfo(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $user = D('User');
        $userinfo = $user->field('userId,userName,userBlance,regTime')->select();
        $this->ajaxReturn($userinfo);
    }
    /*
     * 获取用户的余额明细
     */
    function getUserBalanceDetail(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $balance = D('UserBlance');
        $userid = I('userid');
        $where['user_id']=$userid;
        if ($balance->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '没有数据！'
            );
            $this->ajaxReturn($return);
            return;
        }
        /*
         * SUBSTRING_INDEX(blanceTime, ' ', 1)提取字符串函数
         */
        $state = $balance->field("blanceNumber,blanceCount,blanceCost,blanceWays,blanceTime")->order('blanceId desc ')->where($where)->select();
        $cost = $balance->field('sum(blanceCount) as pay,sum(blanceCost) as cost')->where($where)->select();

        if($state){
            $return = array(
                'code' => '200',
                'msg' => '获取成功!',
                'cost'=>$cost[0],
                'data' => $state,
            );
        }else{
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',

            );
        }
        $this->ajaxReturn($return);


    }

}