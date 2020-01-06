<?php

namespace Home\Controller;

use function Sodium\add;
use Think\Controller;

class OrdersController extends Controller
{
    function getUserIdByOId($oid){//传入openid或者userid
        $user = D('User');
        $userinfo = $user->where("openid='$oid'")->select();
        if($userinfo){//如果openid存在，返回userid
            return $userinfo[0]['userid'];
        }else{//不存在则不是openid是userid
            return $oid;
        }

    }
    /**
     * 用户下单
     * @account:用户ID
     * @goodsidlist:商品ID列表 eg：2720181202132757，3020181202142352
     * @goodsnumlist:对应商品ID的数量列表 eg：1，3
     * @payway:付款方式 ：支付宝、微信、余额
     * @comtime:要求配送的时间
     * @name:联系人
     * @tel:联系电话
     * @address:配送地址
     * @box:配送地柜号：A柜，B柜，或者1号柜，2号柜
     * @real:实际付款金额
     * @discount:折扣金额
     * @total：未折扣的总金额
     * @apppaycode：支付密码
     */
    public function addOrderItem()
    {
        $user_id = $this->getUserIdByOId(I('account'));
        $goodsidlist = I('goodsidlist');
        $goodsnumlist = I('goodsnumlist');
        $payWay = I('payway');//付款方式
        $comTime = I('comtime');//要求时间
        $name = I('name');
        $tel = I('tel');
        $address = I('address');
        $box = I('box');
        $real = I('real') >= 0 ? I('real') : 0;
        $discount = I('discount') >= 0 ? I('discount') : 0;
        $total = I('total') >= 0 ? I('total') : 0;
        //数据表
        $user = D('User');
        $goods = D('Goods');
        $orderItem = D('OrdersItem');//订单项
        $orders = D('Orders');//订单
        $sale = D('Sale');//销售
        //事务开启，如果订单添加失败就回滚
        $user->startTrans();
        $where['userId'] = $user_id;
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        //查询用户信息
        $UserInfo = $user->where($where)->select();
        //支付判断
        if ($UserInfo[0]['paycode'] == md5(I('apppaycode'))) {
            if ($UserInfo[0]['userpoint'] >= $discount) {
                if ($UserInfo[0]['userblance'] >= $real) {
                    //减操作
                    $data['userPoint'] = ($UserInfo[0]['userpoint'] - $discount);
                    $data['userBlance'] = ($UserInfo[0]['userblance'] - $real);
                    $user->where($where)->save($data); // 根据条件更新记录
                    //支付成功后需要添加积分和余额的使用记录
                    //积分
                    if ($discount != null || $discount != 0) {
                        $pointData = array(
                            'pointNumber' => mt_rand(90, 99) . date('YmdHis'),//交易单号
                            'pointCost' => $discount,//使用积分数
                            'pointTime' => date('Y-m-d H:i:s'),//获得时间
                            'ways' => '购物抵用',//交易的类型或者方式
                            'point_userid' => I('account'),//所属用户
                        );
                        $userPoint = D('UserPoint');
                        $userPoint->add($pointData);
                    }

                    //余额使用 mt_rand 比 rand 快4倍
                    $balanceData = array(
                        'blanceNumber' => mt_rand(80, 90) . date('YmdHis'),//交易单号
                        'blanceCost' => $real,//使用余额数
                        'blanceTime' => date('Y-m-d H:i:s'),//获得时间
                        'blanceWays' => '购物抵用',//交易的类型或者方式
                        'user_id' => I('account'),//所属用户
                    );
                    $userBalance = D('UserBlance');
                    $userBalance->add($balanceData);

                    $sale_num = 0;
                    $goodsid_list = explode(",", $goodsidlist);//分割餐品id
                    $goodsnum_list = explode(",", $goodsnumlist);//分割餐品对应数量
                    $orderNum = rand(20, 70) . date('YmdHis');//订单号
                    $orderTime = date('Y-m-d H:i:s');//下单时间
                    $data = array(
                        'orderNumber' => $orderNum,
                        'orderTime' => $orderTime,
                        'orderStatus' => '等待配送',
                        'orderStatusCode' => '0',
                        'orderPayWay' => $payWay,
                        'userId' => $user_id,
                        'comTime' => $comTime,//要求时间
                        'order_name' => $name,//
                        'order_tel' => $tel,//
                        'order_address' => $address,//
                        'order_box' => $box,//
                        'realPay' => $real,//
                        'discountPay' => $discount,//
                        'totalPay' => $total,//
                    );
                    $orders->add($data);
                    /*
                     * $goods:Goods
                     * $goodsid:对应goodsid
                     * $col:Goods字段
                     * $rcol:返回字段
                     */
                    function getGoods($goods, $goodsid, $col, $rcol)
                    {
                        //增加銷售操作
                        $goodsItem = $goods->field($col)->where("goodsId='$goodsid'")->select();
                        return $goodsItem[0][$rcol];
                    }

                    for ($i = 0; $i < count($goodsid_list); $i++) {
                        $dataList[] = array(
                            'orderid' => $orderNum,
                            'goodsid' => $goodsid_list[$i],
                            'goods_quantity' => $goodsnum_list[$i],
                            'users_id' => $user_id,
                            'goods_name' => getGoods($goods, $goodsid_list[$i], 'goodsName', 'goodsname'),
                            'goods_price' => getGoods($goods, $goodsid_list[$i], 'goodsPrice', 'goodsprice'),
                        );
                        $sale_num += $goodsnum_list[$i];
                        //增加销量
                        $addsaledata['sale']=array('exp', "sale+$goodsnum_list[$i]");//加操作
                        $goods->where("goodsId='$goodsid_list[$i]'")->save($addsaledata);
                    }
                    $state = $orderItem->addAll($dataList);
                    //增加销售记录
                    function addsalerecord($real, $sale, $sale_num, $orderTime)
                    {
                        //销售报表增加记录
                        //订单数：$sale_orders,销售件数:$sale_num,销售金额：$sale_count
                        $sale_orders = '1';
                        /* $sale_num = count($goodsid_list);*/
                        $sale_count = $real;
                        $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                        $week = "星期" . $weekarray[date("w", strtotime(substr($orderTime, 0, 10)))];
                        $saledata = array(
                            'saleOrders' => $sale_orders,
                            'saleTotal' => $sale_num,
                            'saleCount' => $sale_count,
                            'reportTime' => $orderTime,
                            'reportDate' => substr($orderTime, 5, 5),
                            'reportWeek' => $week,
                            'reportYear' => substr($orderTime, 0, 4),
                            'reportHour' => substr($orderTime, 11, 2) . ':00-' . (substr($orderTime, 11, 2) + 1) . ':00',//时间段
                        );
                        $sale->add($saledata);
                    }

                    if ($state) {//成功
                        addsalerecord($real, $sale, $sale_num, $orderTime);//增加销售记录
                        $user->commit();
                        $return = array(
                            'code' => '200',
                            'msg' => '支付成功!',

                        );
                        $this->ajaxReturn($return);
                        return;


                    } else {//失败
                        $user->rollback();//回滚
                        $return = array(
                            'code' => '500',
                            'msg' => '操作失败，请重新下单！',
                        );
                        $this->ajaxReturn($return);
                        return;
                    }


                } else {
                    $return = array(
                        'code' => '800',
                        'msg' => '余额不足',
                        'realpay' => $real,
                        'userblance' => $UserInfo[0]['userblance'],
                    );
                }

            } else {
                $return = array(
                    'code' => '400',
                    'msg' => '积分不足',
                    'discount' => $discount,
                    'userpoint' => $UserInfo[0]['userpoint'],
                );
            }
            $this->ajaxReturn($return);
            return;
        } else {

            $return = array(
                'code' => '400',
                'msg' => "支付密码有误",
            );
            $this->ajaxReturn($return);
            return;
        }
    }
    /**
     * 微信用户下单
     * @account:用户ID
     * @goodsidlist:商品ID列表 eg：2720181202132757，3020181202142352
     * @goodsnumlist:对应商品ID的数量列表 eg：1，3
     * @payway:付款方式 ：支付宝、微信、余额
     * @comtime:要求配送的时间
     * @name:联系人
     * @tel:联系电话
     * @address:配送地址
     * @box:配送地柜号：A柜，B柜，或者1号柜，2号柜
     * @real:实际付款金额
     * @discount:折扣金额
     * @total：未折扣的总金额
     * @apppaycode：支付密码
     */
    public function wxAddOrderItem()
    {
        $user_id = $this->getUserIdByOId(I('account'));
        $goodsidlist = I('goodsidlist');
        $goodsnumlist = I('goodsnumlist');
        $payWay = I('payway');//付款方式
        $comTime = I('comtime');//要求时间
        $name = I('name');
        $tel = I('tel');
        $address = I('address');
        $box = I('box');
        $real = I('real') >= 0 ? I('real') : 0;
        $discount = I('discount') >= 0 ? I('discount') : 0;
        $total = I('total') >= 0 ? I('total') : 0;
        //数据表
        $user = D('User');
        $goods = D('Goods');
        $orderItem = D('OrdersItem');//订单项
        $orders = D('Orders');//订单
        $sale = D('Sale');//销售
        //事务开启，如果订单添加失败就回滚
        $user->startTrans();
        $where['userId'] = $user_id;
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        //查询用户信息
        $UserInfo = $user->where($where)->select();
        //支付判断
        if ($UserInfo[0]['userpoint'] >= $discount) {
            if ($UserInfo[0]['userblance'] >= $real) {
                //减操作
                $data['userPoint'] = ($UserInfo[0]['userpoint'] - $discount);
                $data['userBlance'] = ($UserInfo[0]['userblance'] - $real);
                $user->where($where)->save($data); // 根据条件更新记录
                //支付成功后需要添加积分和余额的使用记录
                //积分
                if ($discount != null || $discount != 0) {
                    $pointData = array(
                        'pointNumber' => mt_rand(90, 99) . date('YmdHis'),//交易单号
                        'pointCost' => $discount,//使用积分数
                        'pointTime' => date('Y-m-d H:i:s'),//获得时间
                        'ways' => '购物抵用',//交易的类型或者方式
                        'point_userid' => I('account'),//所属用户
                    );
                    $userPoint = D('UserPoint');
                    $userPoint->add($pointData);
                }

                //余额使用 mt_rand 比 rand 快4倍
                $balanceData = array(
                    'blanceNumber' => mt_rand(80, 90) . date('YmdHis'),//交易单号
                    'blanceCost' => $real,//使用余额数
                    'blanceTime' => date('Y-m-d H:i:s'),//获得时间
                    'blanceWays' => '购物抵用',//交易的类型或者方式
                    'user_id' => I('account'),//所属用户
                );
                $userBalance = D('UserBlance');
                $userBalance->add($balanceData);

                $sale_num = 0;
                $goodsid_list = explode(",", $goodsidlist);//分割餐品id
                $goodsnum_list = explode(",", $goodsnumlist);//分割餐品对应数量
                $orderNum = rand(20, 70) . date('YmdHis');//订单号
                $orderTime = date('Y-m-d H:i:s');//下单时间
                $data = array(
                    'orderNumber' => $orderNum,
                    'orderTime' => $orderTime,
                    'orderStatus' => '等待配送',
                    'orderStatusCode' => '0',
                    'orderPayWay' => $payWay,
                    'userId' => $user_id,
                    'comTime' => $comTime,//要求时间
                    'order_name' => $name,//
                    'order_tel' => $tel,//
                    'order_address' => $address,//
                    'order_box' => $box,//
                    'realPay' => $real,//
                    'discountPay' => $discount,//
                    'totalPay' => $total,//
                );
                $orders->add($data);
                /*
                 * $goods:Goods
                 * $goodsid:对应goodsid
                 * $col:Goods字段
                 * $rcol:返回字段
                 */
                function getGoods($goods, $goodsid, $col, $rcol)
                {
                    //增加銷售操作
                    $goodsItem = $goods->field($col)->where("goodsId='$goodsid'")->select();
                    return $goodsItem[0][$rcol];
                }

                for ($i = 0; $i < count($goodsid_list); $i++) {
                    $dataList[] = array(
                        'orderid' => $orderNum,
                        'goodsid' => $goodsid_list[$i],
                        'goods_quantity' => $goodsnum_list[$i],
                        'users_id' => $user_id,
                        'goods_name' => getGoods($goods, $goodsid_list[$i], 'goodsName', 'goodsname'),
                        'goods_price' => getGoods($goods, $goodsid_list[$i], 'goodsPrice', 'goodsprice'),
                    );
                    $sale_num += $goodsnum_list[$i];
                    //增加销量
                    $addsaledata['sale'] = array('exp', "sale+$goodsnum_list[$i]");//加操作
                    $goods->where("goodsId='$goodsid_list[$i]'")->save($addsaledata);
                }
                $state = $orderItem->addAll($dataList);
                //增加销售记录
                function addsalerecord($real, $sale, $sale_num, $orderTime)
                {
                    //销售报表增加记录
                    //订单数：$sale_orders,销售件数:$sale_num,销售金额：$sale_count
                    $sale_orders = '1';
                    /* $sale_num = count($goodsid_list);*/
                    $sale_count = $real;
                    $weekarray = array("日", "一", "二", "三", "四", "五", "六");
                    $week = "星期" . $weekarray[date("w", strtotime(substr($orderTime, 0, 10)))];
                    $saledata = array(
                        'saleOrders' => $sale_orders,
                        'saleTotal' => $sale_num,
                        'saleCount' => $sale_count,
                        'reportTime' => $orderTime,
                        'reportDate' => substr($orderTime, 5, 5),
                        'reportWeek' => $week,
                        'reportYear' => substr($orderTime, 0, 4),
                        'reportHour' => substr($orderTime, 11, 2) . ':00-' . (substr($orderTime, 11, 2) + 1) . ':00',//时间段
                    );
                    $sale->add($saledata);
                }

                if ($state) {//成功
                    addsalerecord($real, $sale, $sale_num, $orderTime);//增加销售记录
                    $user->commit();
                    $return = array(
                        'code' => '200',
                        'msg' => '支付成功!',

                    );
                    $this->ajaxReturn($return);
                    return;


                } else {//失败
                    $user->rollback();//回滚
                    $return = array(
                        'code' => '500',
                        'msg' => '操作失败，请重新下单！',
                    );
                    $this->ajaxReturn($return);
                    return;
                }


            } else {
                $return = array(
                    'code' => '800',
                    'msg' => '余额不足',
                    'realpay' => $real,
                    'userblance' => $UserInfo[0]['userblance'],
                );
            }

        } else {
            $return = array(
                'code' => '400',
                'msg' => '积分不足',
                'discount' => $discount,
                'userpoint' => $UserInfo[0]['userpoint'],
            );
        }
        $this->ajaxReturn($return);
        return;

    }
    //根据商品ID查询商品信息
    function getGoodsByGid($gid){
        $goods = D('Goods');
        $where['goodsId']=$gid;
        $state = $goods->field('goodsName,goodsPrice,goodsImage')->where($where)->select();
        if($state){
            $returndata = $state;
        }else{
            $returndata = [];
        }
        return $returndata;
    }
    //判断用户存不存在
    function isNotUser($uid){
        $user = D('User');
        $where['userId'] = $uid;
        if ($user->where($where)->count() == 0) {
            return false;
        }else{
            return true;
        }
    }
    //判断该用户的订单存不存在
    function isNoOrders($uid){
        $orders = D('Orders');//订单
        $where['userId'] = $uid;
        if ($orders->where($where)->count() == 0) {
            return false;
        }else{
            return true;
        }
    }
    //根据用户ID和状态获取订单信息
    function getOrdersByUidAndState($uid, $val)
    {
        $orderItem = D('OrdersItem');//订单项
        $orders = D('Orders');//订单
        $where['userId'] = $uid;
        $where['orderStatusCode'] = $val;
        //对应类型的数据
        $orderInfo1 = $orders->field('orderNumber,orderStatus,orderCode,orderTime,order_box')->order('orderId desc')->where($where)->select();
        //数据中对应的订单号
        for ($i = 0; $i < count($orderInfo1); $i++) {//2条记录
            $qid = $orderInfo1[$i]['ordernumber'];//查询订单号
            $itemdata[] = $orderItem->field('goodsid,goods_name,goods_price,goods_quantity')->where("orderid= $qid")->select();//对应订单项
            $msginfo = null;

            foreach ($itemdata[$i] as $value) {
                $goodsInfo =$this->getGoodsByGid($value['goodsid']);
                $msginfo[]=array(
                    'goodsid'=>$value['goodsid'],
                    'goods_name'=>$goodsInfo[0]['goodsname'],
                    'goods_price'=>$goodsInfo[0]['goodsprice'],
                    'goods_image'=>$goodsInfo[0]['goodsimage'],
                    'goods_quantity'=>$value['goods_quantity']
                );
            }

            $return[] = array(//定义返回数组
                'orderNumber' => $orderInfo1[$i]['ordernumber'],
                'orderStatus' => $orderInfo1[$i]['orderstatus'],
                'orderCode' => $orderInfo1[$i]['ordercode'] == null ? '无' : $orderInfo1[$i]['ordercode'],
                'orderTime' => $orderInfo1[$i]['ordertime'],
                'orderBox' => $orderInfo1[$i]['order_box'],
                'msg' => $msginfo,
            );
        }
        //每个订单号的多条数据
        return $return;
    }
    /**
     * 我的订单
     * @account:用户账号
     */
    function getMyOrders()
    {
        $user_id =  $this->getUserIdByOId(I('account'));
        if(!$this->isNotUser($user_id)){
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        if (!$this->isNoOrders($user_id)) {
            $return = array(
                'code' => '400',
                'msg' => '没有订单！'
            );
            $this->ajaxReturn($return);
            return;
        }

        $return = array(
            'code' => '200',
            'msg' => '获取成功！',
            'data1' => $this->getOrdersByUidAndState($user_id, '0'),//0:等待配送、请求取消中...、请求恢复中...、订单已恢复
            'data2' => $this->getOrdersByUidAndState($user_id, '1'),//1:配送中
            'data3' => $this->getOrdersByUidAndState($user_id, '2'),//2:已送达(管理端)->待取餐（用户端）->已取餐
            'data4' =>$this->getOrdersByUidAndState($user_id, '3'),//3:订单已取消、已完成
            //-1:订单已删除

        );
        $this->ajaxReturn($return);
    }

    /*
     * 获取一条订单
     * @account:用户账号
     * @order_num:订单编号
     */
    function getOneOrder()
    {
        $user_id =  $this->getUserIdByOId(I('account'));
        $order_id = I('order_num');

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
        $where['orderNumber']=$order_id;
        $where['userId']=$user_id;
        $orderInfo = $orders->where($where)->select();
        $qid = $orderInfo[0]['ordernumber'];
        $itemdata[] = $orderItem->field('goodsid,goods_name,goods_price,goods_quantity')->where("orderid= $qid")->select();
        $msginfo = null;

        foreach ($itemdata[0] as $value) {
            $goodsInfo =$this->getGoodsByGid($value['goodsid']);
            $msginfo[]=array(
                'goodsid'=>$value['goodsid'],
                'goods_name'=>$goodsInfo[0]['goodsname'],
                'goods_price'=>$goodsInfo[0]['goodsprice'],
                'goods_image'=>$goodsInfo[0]['goodsimage'],
                'goods_quantity'=>$value['goods_quantity']
            );
        }
        $return = array(
            'code' => '200',
            'msg' => '获取成功！',
            'data' => $orderInfo,
            'item' =>$msginfo,
        );


        $this->ajaxReturn($return);
    }

    /*
     * 设置订单状态
     * @type:cancel：取消 ,resume:恢复，ensure:确认, del:删除
     * @ordernum：订单号
     */
    function setOrderStatus()
    {
        $setType = I('type');//设置的类型，取消，确认，删除
        $orderNum = I('ordernum');//订单号
        $orders = D('Orders');//订单
        $where['orderNumber'] = $orderNum;
        if ($orders->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '没有该订单！'
            );
            $this->ajaxReturn($return);
            return;
        }

        /*
        * 默认操作返回信息
        */
        function reInfo()
        {
            $return = array(
                'code' => '400',
                'msg' => '操作错误！'
            );
            return $return;
        }

        /*
         * 封装操作的方法
         */
        function setSatus($orders, $where, $value, $code)
        {
            $data ['orderStatus'] = $value;
            $data ['orderStatusCode'] = $code;
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
            return $return;
        }

        /*
         * 取消订单和恢复订单请求
         */
        function cancel($orders, $where)
        {
            return setSatus($orders, $where, '请求取消中...', '0');
        }

        function resume($orders, $where)
        {

            return setSatus($orders, $where, '请求恢复中...', '0');
        }

        /*
         *  确认订单
         */
        function ensure($orders, $where)
        {
            //销量+1
            //取订单号
            /* $orederid = I('oredernum');//订单号
             $ordersitem = D('OrdersItem');//订单项数据库
             $info1 = $ordersitem->where("orderid=$orederid")->select();
             $this->ajaxReturn($info1);*/
            return setSatus($orders, $where, '已完成', '3');
        }

        /*
        *  删除订单
         * 不做实际删除，保留订单数据
         * 在客户端不显示
        */
        function del($orders, $where)
        {
            return setSatus($orders, $where, '订单已删除', '-1');
        }

        switch ($setType) {
            case 'cancel'://取消
                $this->ajaxReturn(cancel($orders, $where));
                break;
            case 'resume'://恢复
                $this->ajaxReturn(resume($orders, $where));
                break;
            case 'ensure':
                $this->ajaxReturn(ensure($orders, $where));
                break;
            case 'del':
                $this->ajaxReturn(del($orders, $where));
                break;
            default:
                $this->ajaxReturn(reInfo());
                break;
        }
    }

    /*
     * 取餐扫码
     * http://192.168.1.8:8088/webApp/GetFoods
     */
    function getFoods()
    {
        header('content-type:application:json;charset=utf8');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        $account =  $this->getUserIdByOId(I('account'));
        $this->assign('tel', $account);
        $this->display();

    }


    /*
    * 取餐操作
    */
    function getFoodsCom()
    {
        $account = I('tel');
        $code = I('code');
        $orders = D('Orders');
        $where['userId'] = $account;
        $where['orderCode'] = $code;
        $state = $orders->where($where)->count();

        if ($state <= 0) {
            $this->assign('tel', $account);
            $this->assign('info', '输错了！！！');
        } else {
            $data ['orderStatus'] = '已取餐';
            $data ['orderStatusCode'] = 2;
            if ($orders->where($where)->save($data) > 0) {
                $this->assign('tel', $account);
                $this->assign('info', '取餐成功！！！');
            } else {
                $this->assign('tel', $account);
                $this->assign('info', '你已取过餐了！！！');
            }
        }
        $this->display('getFoods');
    }
    function isEmptyBox($boxnum){//查询空柜
        $box = D('Box');
        $state = $box->where("status=1 and box='$boxnum'")->count();
        if($state==0){
            return true;
        }else{
            return false;
        }
    }
    function isEixtOrder($ordernum){//根据订单号查询订单
        $orders = D('Orders');
        $where['orderNumber'] = $ordernum;
        $state = $orders->where($where)->count();
        if ($state <= 0) {

            return false;
        } else {
            return true;
        }
    }
    /*
    * 送餐
    */
    function sendFoods()
    {

        $ordernum = I('ordernum');
        $code = I('code') == null ? rand(100000, 999999) : I('code');//预防客户端获取取餐码失败
        $statusCode = I('status');
        $numbox = I('numbox');
        /*if(!$this->isEmptyBox($numbox)){//不为空
            $return = array(
                'code' => '400',
                'msg' =>  $numbox.'号柜已占用！',
                'resp' => $numbox.'号柜已占用！',
            );
            $this->ajaxReturn($return);
            return;
        }*/
        $orders = D('Orders');
        $message = D('Msg');//消息
        $box = D('Box');
        //事务开启，如果订单添加失败就回滚
        $box->startTrans();
        if (!$this->isEixtOrder($ordernum)) {//存在true
            $return = array(
                'code' => '400',
                'msg' => '没有该订单！',
                'resp' => '订单不存在！',
            );
        } else {
            $where['orderNumber'] = $ordernum;
            $data ['orderStatusCode'] = $statusCode;
            if ($statusCode == 2 || $statusCode == '2') {
                $data ['orderStatus'] = '已送达';
                $data ['orderCode'] = $code;
                $data['order_box'] = $numbox.'号柜';
                $data ['arrTime'] = date('Y-m-d H:i:s');//获得时间;

            } else {
                $data ['orderStatus'] = '配送中';
            }
            /*
             * 需要比较处理，如果不能进行降级操作，如果是已送达的状态就不可以操作了
             */
            $box_data['code']=$code;
            $box_data['status']=1;
            $map['box'] = $numbox;
            $boxstate = $box->where($map)->save($box_data);

            $info = $orders->field('userId as uid,orderStatusCode as n,orderStatus as m')->where($where)->select();
            $n = $info[0]['n'];//状态码---1或者2
            if ($n >= 2) {
                $box->rollback();
                $return = array(
                    'code' => '400',
                    'msg' => '该订单不可操作！',
                    'resp' => $info[0]['m'],
                );
            } else {
                if ($orders->where($where)->save($data) > 0) {
                    $msg_uid = $info[0]['uid'];
                    $msg_context = '取餐柜:'.$numbox.'号柜,取餐码:'.$code;
                    $message->add(
                        array(
                            'context'=>$msg_context,
                            'time'=>date('Y-m-d H:i:s'),
                            'userid'=>$msg_uid
                        )
                    );
                    $box->commit();

                    $return = array(
                        'code' => '200',
                        'msg' => '操作成功！',
                    );
                } else {
                    $box->rollback();
                    $return = array(
                        'code' => '400',
                        'msg' => '该订单已操作过！',
                        'resp' => $info[0]['m'],
                    );
                }
            }
        }

        $this->ajaxReturn($return);

    }

    function hello()
    {
        header('content-type:application:json;charset=utf8');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        $account = I('account');
        $this->assign('tel', $account);
        $this->display();
    }

}