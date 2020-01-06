<?php

namespace Home\Controller;

use Think\Controller;

class WXUserController extends Controller
{

    public function isEmptyVal($val,$msg)
    {
        if (empty($val)) {
            return $this->ajaxReturn(
                array(
                    'code' => '400',
                    'msg' => $msg
                )
            );
        } else {
            return $val;
        }
    }

    public function wxRegister()
    {
        $openid = $this->isEmptyVal(I('openid'),'请填写完整');
        $nickname = $this->isEmptyVal(I('nickname'),'请填写完整');
        $avatarurl = $this->isEmptyVal(I('avatarurl'),'请填写完整');
        $wx_user = D('User');
        $count = $wx_user->where("openid='$openid'")->count();
        // $where['openid'] = $openid;
        if ($count > 0) {
            $regdata = array(
                'userName' => $nickname,
                'userImage' => $avatarurl,
            );
            $state = $wx_user->where("openid='$openid'")->save($regdata);
            $return = array(
                'code' => '201',
                'msg' => '已被注册' ,
            );
            $this->ajaxReturn($return);

        } else {

            $data = array(
                'userId' => substr(date('YmdHis'), -9) . mt_rand(10, 99),
                'openid' => $openid,
                'userName' => $nickname,
                'userImage' => $avatarurl,
                'userBlance' => 0,
                'userPoint' => 0,
                'regTime' => date('Y-m-d H:i:s'),
            );
            $state = $wx_user->add($data);
            if ($state) {
                $return = array(
                    'code' => '200',
                    'msg' => '注册成功',
                );
            } else {
                $return = array(
                    'code' => '400',
                    'msg' => '注册失败',
                );
            }
            $this->ajaxReturn($return);
        }
    }

    public function wxSerachById()
    {
        $openid = $this->isEmptyVal(I('openid'),'请填写完整');
        $wx_user = D('User');
        //$where['openid'] = $openid;
        $state = $wx_user->where("openid='$openid'")->select();
        if ($state) {
            $return = array(
                'code' => 200,
                'data' => $state,
            );
        } else {
            $return = array(
                'code' => 400,
                'data' => null,
            );
        }
        $this->ajaxReturn($return);
    }
    /**
     * 发送post请求
     * @param string $url 请求地址
     * @param array $post_data post键值对数据
     * @return string
     */
    function send_post($url, $post_data) {
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
    function postToWx(){
        $post_data = array(
            'openid' => 'post测试',
            'nickname' => 'password',
            'avatarurl'=>'测试',
        );
        $result = $this->send_post('http://47.106.253.201/webApp/WRegister', $post_data);
        $this->ajaxReturn($result);
    }
    function sendGet($url,$val){

        $ch = curl_init();
        $str =$url."?$val";
        curl_setopt($ch, CURLOPT_URL, $str);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec($ch);
        return $output ;
    }
    function getToWx(){
        $url = 'https://api.weixin.qq.com/sns/jscode2session';
        //$url = "http://47.106.253.201/webApp/getMsg";
        $appid = 'wx002feed74457751f';
        $secret = 'f8ab0251f40caf46346286e43df8f28b';
        $grant_type='authorization_code';
        $js_code = I('js_code');
        $str = "appid=$appid&&secret=$secret&&js_code=$js_code&&grant_type=$grant_type";
        $result = $this->sendGet($url,$str);
        echo $result;
    }
    function isExistUserByOid($oid){
        $wx_user = D('User');
        $count = $wx_user->where("openid='$oid'")->count();
        if($count>0){
            return $oid;
        }else{
           $this->ajaxReturn(
               $return = array(
                   'code'=>400,
                   'msg'=>'用户不存在'
               )
           );
        }
    }
    //根据openid修改userid
    function regUserIdByOId(){
        $openid = $this->isExistUserByOid(I('openid'));
        $insertPhone = $this->isEmptyVal(I('insertPhone'),'手机号不能为空');
        $regdata = array(
            'userId' => $insertPhone,
        );
        $wx_user = D('User');
        $state = $wx_user->where("openid='$openid'")->save($regdata);
        if($state){
            $return = array(
                'code'=>200,
                'msg'=>'绑定成功'
            );
        }else{
            $return = array(
                'code'=>400,
                'msg'=>'绑定失败'
            );
        }
        $this->ajaxReturn($return);
    }
}