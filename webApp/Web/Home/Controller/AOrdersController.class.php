<?php
namespace Home\Controller;

use Think\Controller;

class AOrdersController extends Controller
{
   /* public function __construct()
    {
        parent::__construct();
        tt();

    }*/
    /*
     * 获取简要订单
     */
    function getOrdersInfo(){

        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $orders = D('Orders');//订单
        $ordertotal = $orders->count();//订单总量
        $where['orderStatus'] = array('in', '请求取消中...,请求恢复中...,订单已删除');
        $where2['orderStatus'] = array('not in', '请求取消中...,请求恢复中...,订单已删除');
        $ordersfailtotal = $orders->where($where)->count();//异常订单数
        $ordersuccess = $orders->where($where2)->count();//正常订单数
        $return=array(
            'ordertotal'=>$ordertotal,
            'ordersuccess'=>$ordersuccess,
            'orderfail'=>$ordersfailtotal,
        );
        $this->ajaxReturn($return);
    }
    /*
     * 获取订单数据
     */
    function getOrdersData()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        //$orderItem = D('OrdersItem');//订单项
        $orders = D('Orders');//订单
        $ordersdata = $orders->order('orderId desc')->select();
        $this->ajaxReturn($ordersdata);
    }

    /*
    * 获取异常订单数据
    */
    function getFailOrdersData()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        //$orderItem = D('OrdersItem');//订单项
        $orders = D('Orders');//订单
        $where['orderStatus'] = array('in', '请求取消中...,请求恢复中...,订单已删除');
        $ordersdata = $orders->where($where)->order('orderId desc')->select();
        $this->ajaxReturn($ordersdata);
    }

    /*
     * 获取一条订单详情
     */
    function getOneOrderDetail()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $order_id = I('ordernum');
        $orderItem = D('OrdersItem');//订单项
        $orders = D('Orders');//订单

        if ($orders->where("orderNumber= '$order_id'")->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '没有该订单！'
            );
            $this->ajaxReturn($return);
            return;
        }
        $orderInfo = $orders->where("orderNumber= '$order_id'")->select();
        $qid = $orderInfo[0]['ordernumber'];
        $itemdata[] = $orderItem->field('goodsid,goods_name,goods_price,goods_quantity')->where("orderid= $qid")->select();

        $return = array(
            'code' => '200',
            'msg' => '获取成功！',
            'data' => $orderInfo,
            'item' => $itemdata[0],
        );


        $this->ajaxReturn($return);
    }

    /*
     * 修改订单
     */
    function changeOrders()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $ordernum = I('ordernum');
        $name = I('name');
        $tel = I('tel');
        $address = I('address');
        $status = I('status');
        $orders = D('Orders');//订单
        $where['orderNumber'] = $ordernum;
        if ($orders->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '没有该订单！'
            );
            $this->ajaxReturn($return);
            return;
        }

        switch ($status) {
            case $status == '等待配送':
                $orderscode = 0;
                $statustext =  '等待配送';
                break;
            case $status == '配送中':
                $orderscode = 1;
                $statustext =  '配送中';
                break;
            case $status == '已送达':
                $orderscode = 2;
                $statustext =  '已送达';
                break;
            case $status == '取消订单':
                $orderscode = 3;
                $statustext =  '订单已取消';
                break;


        }
        $data['order_name'] = $name;
        $data['order_tel'] = $tel;
        $data['order_address'] = $address;
        $data['orderStatusCode'] = $orderscode;
        $data['orderStatus'] = $statustext;
        if ($orders->where($where)->save($data) >= 0) {
            $return = array(
                'code' => '200',
                'msg' => '修改成功！'
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '修改失败！'
            );
        }
        $this->ajaxReturn($return);

    }

    /*
     * 处理异常订单
     */
    function handleOrders()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $ordernum = I('ordernum');
        $status = I('status');
        $orders = D('Orders');//订单
        $where['orderNumber'] = $ordernum;
        if ($orders->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '没有该订单！'
            );
            $this->ajaxReturn($return);
            return;
        }
        if ($status == "删除订单") {
            if ($orders->where($where)->delete() > 0) {
                $return = array(
                    'code' => '200',
                    'msg' => '删除成功！'
                );
            } else {
                $return = array(
                    'code' => '400',
                    'msg' => '没有要删除的订单！'
                );
            }

            $this->ajaxReturn($return);
            return;
        }
        switch ($status) {
            case $status == '确认取消':
                $orderscode = 0;
                $statustext = '订单已取消';
                break;
            case $status == '恢复订单':
                $orderscode = 0;
                $statustext = '订单已恢复';
                break;


        }


        $data['orderStatus'] = $statustext;
        $data['orderStatusCode'] = $orderscode;

        if ($orders->where($where)->save($data) >= 0) {
            $return = array(
                'code' => '200',
                'msg' => '操作成功！'
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '操作失败！'
            );
        }
        $this->ajaxReturn($return);

    }


}