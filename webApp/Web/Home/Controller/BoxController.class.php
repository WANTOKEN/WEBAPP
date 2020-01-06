<?php

namespace Home\Controller;

use Think\Controller;
//柜子控制器
class BoxController extends Controller
{
    //查询空柜
    function searchEmptyBox(){
        $box = D('Box');
        $state = $box->field('id,box')->where('status=0')->select();
        if ($state){
            $return = array(
                'code'=>200,
                'data'=>$state
            );
        }else{
            $return = array(
                'code'=>400,
                'data'=>null
            );
        }
        $this->ajaxReturn($return);
    }
    //查询所有柜
    function searchAllBox(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $box = D('Box');
        $state = $box->field('id,box,code,status')->select();
        if ($state){
            $return = array(
                'code'=>200,
                'data'=>$state
            );
        }else{
            $return = array(
                'code'=>400,
                'data'=>null
            );
        }
        $this->ajaxReturn($return);
    }
    //修改柜子
    function regBox(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $box = D('Box');
        $bid = I('bid');
        $status = I('status');
        $code = I('code');
        $data = array(
            'status' => $status,
            'code' => $code,
        );
        $where['id']=$bid;
        $state = $box->where($where)->save($data);
        if ($state){
            $return = array(
                'code'=>200,
                'msg'=>'修改成功'
            );
        }else{
            $return = array(
                'code'=>400,
                'msg'=>'并无修改'
            );
        }
        $this->ajaxReturn($return);
    }
    //查询最新的订单
    function queryNewOrder(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $orders = D('Orders');//订单
        $map['orderStatusCode']=0;
        $ordersdata = $orders->field('orderNumber')->where($map)->order('orderId desc')->limit(1)->select();
        $this->ajaxReturn($ordersdata);
    }

}