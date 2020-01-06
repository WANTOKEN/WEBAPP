<?php

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{

    function getUserIdByOId($oid)
    {//传入openid或者userid
        $user = D('User');
        $userinfo = $user->where("openid='$oid'")->select();
        if ($userinfo) {//如果openid存在，返回userid
            return $userinfo[0]['userid'];
        } else {//不存在则不是openid是userid
            return $oid;
        }

    }

    public function index()
    {
        /*echo 'UserController-index';*/
        /*  $Orders = D('OrdersItem');

          $return = $Orders ->select();
          $this->ajaxReturn($return);*/
    }

    /*
     * @account:账号
     */
    public function getcode()
    {

        $user = D('User');
        $where['userId'] = $this->getUserIdByOId(I('account'));
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => 400,
                'msg' => '没有该账号！'
            );
            $this->ajaxReturn($return);
            exit;
        }

        $return = array(
            'code' => 200,
            'data' => rand(100000, 999999)
        );
        $this->ajaxReturn($return);
    }

    /**
     * 注册
     * @account:账号
     */
    public function register()
    {
        $userAccount = $this->getUserIdByOId(I('account'));
        $userPass = I('password');
        $user = D('User');
        $where['userId'] = I('account');
        if ($user->where($where)->count() > 0) {
            $return = array(
                'code' => '666',
                'msg' => '该手机已被注册'
            );
            $this->ajaxReturn($return);
            exit;
        }

        $data = array(
            'userId' => $userAccount,
            'userPass' => md5($userPass),
            'regTime' => date('Y-m-d H:i:s'),
            'userName' => '用户' . substr($userAccount, -4),
            'openid' => substr(date('YmdHis'), -9) . mt_rand(10, 99),
        );
        $state = $user->add($data);
        if ($state) {
            $return = array(
                'code' => '0',
                'msg' => '注册成功',
            );
        } else {
            $return = array(
                'code' => '1',
                'msg' => '注册失败',
            );
        }
        $this->ajaxReturn($return);
    }


    /**
     * 登录
     * @account:账号
     * @password:密码
     */
    public function login()
    {

        $user = D('User');
        $where['userId'] = $this->getUserIdByOId(I('account'));
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $LoginInfo = $user->where($where)->select();
        /* $this->ajaxReturn($LoginInfo[0]['userpass']);*/
        if ($LoginInfo[0]['userpass'] == md5(I('password'))) {
            $return = array(
                'code' => '1',
                'msg' => '登录成功',
                'userid' => $LoginInfo[0]['userid'],//账户
                'userimage' => $LoginInfo[0]['userimage'],//头像
                'name' => $LoginInfo[0]['username'],//用户名
                'userblance' => $LoginInfo[0]['userblance'],//用户余额
                'userpoint' => $LoginInfo[0]['userpoint'],//用户积分
            );
            //记录操作时间
            $comData['comTime'] = date('Y-m-d H:i:s');
            $user->where($where)->save($comData);
            $this->ajaxReturn($return);
            return;
        } else {
            $return = array(
                'code' => '0',
                'msg' => '登录失败'
            );
            $this->ajaxReturn($return);
            return;
        }
    }

    /*
     * APP内请求支付
     */
    public function appPay()
    {
        $user = D('User');
        $account = $this->getUserIdByOId(I('account'));
        $where['userId'] = $account;


        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $UserInfo = $user->where($where)->select();
        /* $this->ajaxReturn($LoginInfo[0]['userpass']);*/
        $realpay = I('real') >= 0 ? I('real') : 0;
        $discount = (I('discount') * 100) >= 0 ? (I('discount') * 100) : 0;//抵扣金额*100==积分

        if ($UserInfo[0]['paycode'] == md5(I('apppaycode'))) {
            if ($UserInfo[0]['userpoint'] >= $discount) {
                if ($UserInfo[0]['userblance'] >= $realpay) {
                    //减操作
                    $data['userPoint'] = ($UserInfo[0]['userpoint'] - $discount);
                    $data['userBlance'] = ($UserInfo[0]['userblance'] - $realpay);
                    $user->where($where)->save($data); // 根据条件更新记录
                    //支付成功后需要添加积分和余额的使用记录
                    //积分
                    if ($discount != null || $discount != 0) {
                        $pointData = array(
                            'pointNumber' => rand(90, 99) . date('YmdHis'),//交易单号
                            'pointCost' => $discount,//使用积分数
                            'pointTime' => date('Y-m-d H:i:s'),//获得时间
                            'ways' => '购物抵用',//交易的类型或者方式
                            'point_userid' => $account,//所属用户
                        );
                        $userPoint = D('UserPoint');
                        $userPoint->add($pointData);
                    }

                    //余额使用
                    $balanceData = array(
                        'blanceNumber' => rand(80, 90) . date('YmdHis'),//交易单号
                        'blanceCost' => $realpay,//使用余额数
                        'blanceTime' => date('Y-m-d H:i:s'),//获得时间
                        'blanceWays' => '购物抵用',//交易的类型或者方式
                        'user_id' => I('account'),//所属用户
                    );
                    $userBalance = D('UserBlance');
                    $userBalance->add($balanceData);


                    $return = array(
                        'code' => '1',
                        'msg' => '支付成功',
                        'realpay' => $realpay,
                        'userblance' => $UserInfo[0]['userblance'],

                    );
                } else {
                    $return = array(
                        'code' => '2',
                        'msg' => '余额不足',
                        'realpay' => $realpay,
                        'userblance' => $UserInfo[0]['userblance'],
                    );
                }

            } else {
                $return = array(
                    'code' => '2',
                    'msg' => '积分不足',
                    'discount' => $discount,
                    'userpoint' => $UserInfo[0]['userpoint'],
                );
            }
            $this->ajaxReturn($return);
            return;
        } else {

            $return = array(
                'code' => '0',
                'msg' => "支付密码有误",
            );
            $this->ajaxReturn($return);
            return;
        }
    }

    /**
     * 获取用户地址
     * @account:账号
     *
     */
    public function getAllAddress()
    {
        $user = D('User');
        $account = $this->getUserIdByOId(I('account'));
        $where['userId'] = $account;
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $address = D('Address');
        $where['userAccount'] = $account;

        if ($address->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '还没有添加地址'
            );
            $this->ajaxReturn($return);
            return;
        }
        $state = $address->where($where)->order('IsDefault desc')->select();
        if ($state) {
            $return = array(
                'info' => 'success',
                'code' => '200',
                'data' => $state,
            );
        } else {
            $return = array(
                'info' => 'fail',
                'code' => '400',
            );
        }
        $this->ajaxReturn($return);

    }

    /**
     * 设置默认地址
     * @account:账号
     * @adid:地址ID
     */
    public function setAddress()
    {

        $address = D('Address');
        $account = $this->getUserIdByOId(I('account'));//用户账号
        $where['userAccount'] = $account;
        $where['addressId'] = I('adid');
        if ($address->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '地址不存在！'
            );
            $this->ajaxReturn($return);
            return;
        }
        //0为非默认
        $data1 = array(
            'IsDefault' => 0,
        );
        //1为默认
        $data2 = array(
            'IsDefault' => 1,
        );
        $state1 = $address->where("userAccount=$account")->field('IsDefault')->save($data1);//全部设置为0；
        $state = $address->where($where)->field('IsDefault')->save($data2);//全部设置为1；
        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '设置成功！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '设置失败！',
            );
        }
        $this->ajaxReturn($return);

    }

    /**
     * @account：账号
     */
    public function getAddress()
    {

        $address = D('Address');
        $account = $this->getUserIdByOId(I('account'));
        $where['userAccount'] = $account;
        if ($address->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '还没有添加地址'
            );
            $this->ajaxReturn($return);
            return;
        }
        $state = $address->where($where)->order('IsDefault desc')->limit(1)->select();
        if ($state) {
            $return = array(
                'info' => 'success',
                'code' => '200',
                'data' => $state,
            );
        } else {
            $return = array(
                'info' => 'fail',
                'code' => '400',
            );
        }
        $this->ajaxReturn($return);

    }

    /**
     * 修改地址
     * @account:账号
     * @adid：密码
     */
    public function regAddress()
    {
        $address = D('Address');
        $account = $this->getUserIdByOId(I('account'));
        $where['userAccount'] = $account;
        $where['addressId'] = I('adid');
        if ($address->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '地址不存在！'
            );
            $this->ajaxReturn($return);
            return;
        }


        $data = array(
            'userAccount' => $account,
            'deliverName' => I('rec_name'),
            'deliverTel' => I('rec_tel'),
            'address' => I('rec_address'),
            'deliverBox' => I('rec_box'),
        );
        $state = $address->where($where)->save($data);
        if ($state >= 0) {
            $return = array(
                'info' => 'success',
                'code' => '200',
                'msg' => '修改成功',

            );
        } else {
            $return = array(
                'info' => 'fail',
                'code' => '400',
                'msg' => '修改失败',

            );
        }
        $this->ajaxReturn($return);

    }

    /**
     * 删除地址
     * @account:账号
     * @adid：密码
     */
    public function delAddress()
    {
        $address = D('Address');
        $account = $this->getUserIdByOId(I('account'));
        $where['userAccount'] = $account;
        $where['addressId'] = I('adid');
        if ($address->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '地址不存在！'
            );
            $this->ajaxReturn($return);
            return;
        }
        $state = $address->where($where)->delete();
        if ($state >= 0) {
            $return = array(
                'info' => 'success',
                'code' => '200',
                'msg' => '删除成功',

            );
        } else {
            $return = array(
                'info' => 'fail',
                'code' => '400',
                'msg' => '删除失败',

            );
        }
        $this->ajaxReturn($return);

    }
    /*
     * 添加地址
     */
    /**
     * 添加地址
     * @account:账号
     * @rec_name:联系人
     * @rec_tel:联系电话
     * @rec_address：地址
     * @rec_box：指定取餐柜
     */
    public function addAddress()
    {

        $user = D('User');
        $account = $this->getUserIdByOId(I('account'));
        $where['userId'] = $account;
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $address = D('Address');

        $data = array(
            'userAccount' => $account,
            'deliverName' => I('rec_name'),
            'deliverTel' => I('rec_tel'),
            'address' => I('rec_address'),
            'deliverBox' => I('rec_box'),
        );
        $state = $address->where($where)->add($data);
        if ($state) {
            $return = array(
                'info' => 'success',
                'code' => '200',
                'msg' => '添加成功',
            );
        } else {
            $return = array(
                'info' => 'fail',
                'code' => '400',
                'msg' => '添加失败',
            );
        }
        $this->ajaxReturn($return);

    }

    /**
     * 用户上传头像
     * head:头像文件
     * @userid:账户ID
     */
    public function uploadHead()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $userid = $this->getUserIdByOId(I('userid'));
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => './Uploads/',
            'savePath' => '/Users/',
            'saveName' => array('uniqid', '456'),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => true,
            'subName' => $userid,
        );
        $upload = new \Think\Upload($config);// 实例化上传类

        // 上传文件
        $info = $upload->uploadOne($_FILES['head']);
        $file_url = 'Uploads' . $info['savepath'] . $info['savename'];
        if (!$info) {// 上传错误提示错误信息
            /*  $this->error($upload->getError());*/
            $return = array(
                'code' => '400',
                'msg' => '上传失败！',
            );
        } else {// 上传成功
            $user = D('User');

            $where['userId'] = $userid;
            $img_del_url = $user->where($where)->select();
            $data ['userImage'] = $file_url;  //存到数据库
            $state = $user->where($where)->save($data);
            if ($state) {
                if ($img_del_url[0]['userimage'] !== 'Uploads/resource/userhead/default.jpg') {
                    unlink('./' . $img_del_url[0]['userimage']);
                }
                $return = array(
                    'code' => '200',
                    'msg' => '修改成功！',
                    'url' => $file_url,
                );
            } else {
                $return = array(
                    'code' => '400',
                    'msg' => '上传失败！',
                );
            }
        }

        $this->ajaxReturn($return);
    }

    /**
     * 修改个人信息
     * @account:账号
     * @reg_type:修改类型：name：修改昵称，userpass：登录密码，支付密码：userpay
     * @reg_value：修改的值
     * @userPay：获取的支付密码
     * @userPass:获取的登录密码
     */
    public function regInfo()
    {
        $userid = $this->getUserIdByOId(I('account'));
        $reg_type = I('reg_type');//修改的类型，用户名、登录密码、支付密码
        $user = D('User');
        $where['userId'] = $userid;
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        //修改用户名
        function regName($user, $where)
        {
            $data ['userName'] = I('reg_value');
            if ($user->where($where)->save($data) >= 0) {
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
         * 修改密码
         */
        function regPass($user, $where)
        {
            $map['userPass'] = md5(I('userPass'));
            if ($user->where($where)->where($map)->count()) {
                $data ['userPass'] = md5(I('reg_value'));
                if ($user->where($where)->save($data) >= 0) {
                    $return = array(
                        'code' => '200',
                        'msg' => '修改成功！'
                    );
                } else {
                    $return = array(
                        'code' => '400',
                        'msg' => '密码修改失败！'
                    );
                }
            } else {
                $return = array(
                    'code' => '400',
                    'msg' => '密码不正确！'
                );
            }

            return $return;
        }

        /*
        * 修改支付密码
        */
        function regPay($user, $where)
        {
            $map['payCode'] = md5(I('userPay'));
            if ($user->where($where)->where($map)->count()) {
                $data ['payCode'] = md5(I('reg_value'));
                if ($user->where($where)->save($data) >= 0) {
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
            } else {
                $return = array(
                    'code' => '401',
                    'msg' => '密码不正确！'
                );
            }

            return $return;
        }

        function reInfo()
        {
            $return = array(
                'code' => '400',
                'msg' => '修改失败！'
            );
            return $return;
        }

        switch ($reg_type) {
            case 'name':
                /*   regName($user,$where);//修改用户名*/
                $this->ajaxReturn(regName($user, $where));
                break;
            case 'userpass':
                /* regPass($user,$where);//修改用户密码*/
                $this->ajaxReturn(regPass($user, $where));
                break;
            case 'userpay':
                /* regPay($user,$where);//修改用户支付密码*/
                $this->ajaxReturn(regPay($user, $where));
                break;
            default:
                /* reInfo();*/
                $this->ajaxReturn(reInfo());
                break;
        }

    }

    /**
     * 获取用户积分
     * @account:账户
     *
     */
    function getUserPoint()
    {
        $user = D('User');
        $account = $this->getUserIdByOId(I('account'));
        $where['userId'] = $account;

        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $state = $user->field('userPoint')->where($where)->select();
        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '获取成功!',
                'data' => $state[0]['userpoint'],
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',

            );
        }
        $this->ajaxReturn($return);
    }

    /**
     * 获取用户积分明细
     * @account:账号
     */
    function getUserPointDetail()
    {
        $userPoint = D('UserPoint');
        $account = $this->getUserIdByOId(I('account'));
        $where['point_userid'] = $account;
        if ($userPoint->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '没有数据！'
            );
            $this->ajaxReturn($return);
            return;
        }
        /*
         * SUBSTRING_INDEX(blanceTime, ' ', 1)提取字符串函数
         */
        $state = $userPoint->field("pointNumber,pointCount,pointCost,ways,SUBSTRING_INDEX(SUBSTRING_INDEX(pointTime, ' ', -1),':',2) as time
        ,SUBSTRING_INDEX(SUBSTRING_INDEX(pointTime, ' ', 1),'-',-2) as date")->order('pointId desc ')->where($where)->select();
        $cost = $userPoint->field('sum(pointCount) as count,sum(pointCost) as cost')->where($where)->select();

        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '获取成功!',
                'cost' => $cost[0],
                'data' => $state,
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',

            );
        }
        $this->ajaxReturn($return);
    }

    /**
     *获取用户余额
     * @account:账号
     */
    function getUserBlance()
    {
        $user = D('User');
        $account = $this->getUserIdByOId(I('account'));
        $where['userId'] = $account;
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $state = $user->field('userBlance')->where($where)->select();
        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '获取成功!',
                'data' => $state[0]['userblance'],
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',

            );
        }
        $this->ajaxReturn($return);
    }

    /*
     * 设置用户余额:充值
     */
    function setUserBlance()
    {
        $user = D('User');
        $userBlance = D('UserBlance');
        $type = I('type');
        $count = I('blance');
        $account = $this->getUserIdByOId(I('account'));
        $where['userId'] = $account;
        if ($count == null || $count <= 0) {
            $return = array(
                'code' => '400',
                'msg' => '请充值有效金额！'
            );
            $this->ajaxReturn($return);
            return;
        }
        if ($user->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $balnceNum = rand(80, 90) . date('YmdHis');//交易单号
        $data = array(
            'blanceNumber' => $balnceNum,
            'blanceCount' => $count,
            'blanceWays' => $type,
            'blanceTime' => date('Y-m-d H:i:s'),
            'user_id' => $account,

        );
        $data2['userBlance'] = array('exp', "userBlance+$count");//加操作
        $userBlance->add($data);
        $state = $user->where($where)->save($data2);
        $info = $user->field('userBlance')->where($where)->select();
        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => "成功充值" . $count . "元!",
                'data' => $info[0]['userblance'],
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',
                'data' => $state,

            );
        }
        $this->ajaxReturn($return);
    }

    /**
     *获取用户余额明细
     * @account:账号
     */
    function getUserBlanceDetail()
    {
        $userBlance = D('UserBlance');
        $account  = $this->getUserIdByOId(I('account'));
        $where['user_id'] = $account;
        if ($userBlance->where($where)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '没有数据！'
            );
            $this->ajaxReturn($return);
            return;
        }
        /*
         * SUBSTRING_INDEX(blanceTime, ' ', 1)提取字符串函数
         */
        $state = $userBlance->field("blanceNumber,blanceCount,blanceCost,blanceWays,SUBSTRING_INDEX(SUBSTRING_INDEX(blanceTime, ' ', -1),':',2) as time
        ,SUBSTRING_INDEX(SUBSTRING_INDEX(blanceTime, ' ', 1),'-',-2) as date")->order('blanceId desc ')->where($where)->select();
        $cost = $userBlance->field('sum(blanceCount) as pay,sum(blanceCost) as cost')->where($where)->select();

        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '获取成功!',
                'cost' => $cost[0],
                'data' => $state,
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',

            );
        }
        $this->ajaxReturn($return);
    }
}