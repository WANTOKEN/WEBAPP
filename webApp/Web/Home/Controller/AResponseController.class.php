<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/26
 * Time: 13:18
 */

namespace Home\Controller;

use Think\Controller;

class AResponseController extends Controller
{
    function getResponseInfo(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $response = D('Response');//反馈

        $where['respStatus'] = array('not in','已处理');
        $where2['respStatus'] =  '已处理';

        $now = date('Y-m-d');
        $where3['respTime']=array('like',"$now%");
        $responsetotal = $response->count();//反馈总量
        $respfailtotal = $response->where($where)->count();//待处理数
        $respsuccess = $response->where($where2)->count();//处理数
        $resptoday = $response->where($where3)->count();//今日反馈数
        $return=array(
            'resptotal'=>$responsetotal,
            'resptoday'=>$resptoday,
            'respsuccess'=>$respsuccess,
            'respfail'=>$respfailtotal,
        );
        $this->ajaxReturn($return);
    }
    /*
     * 获取反馈记录
     */
    function getResponseData()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $response = D('Response');
        $re_data = $response->select();
        $return = array(
            'data' => $re_data,
        );
        $this->ajaxReturn($re_data);
    }

    /*
     * 详细
     */
    function getResponseDetail()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $response = D('Response');
        $responseImg = D('ResponseImg');
        $resp_id = I('resp_id');
        $where['respNum'] = $resp_id;
        $re_data = $response->where($where)->select();
        $re_imgdata = $responseImg->where("responseId='$resp_id'")->select();
        if ($re_imgdata != null) {
            $return = array(
                'data' => $re_data,
                'imgdata' => $re_imgdata,
            );
        } else {
            $return = array(
                'data' => $re_data,
                'imgdata' => "null",
            );
        }
        $this->ajaxReturn($return);
    }

    /*
       * 回复
       */
    function dealResponse()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $response = D('Response');
        $resp_id = I('resp_id');
        $user_id = I('user_id');
        $where['respNum'] = $resp_id;
        $where['resp_userId'] = $user_id;
        $data['respStatus'] = '已处理';
        $state = $response->where($where)->save($data);
        if ($state > 0) {
            $return = array(
                'code' => '200',
                'msg' => '处理完成！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '已被处理！',
            );
        }
        $this->ajaxReturn($return);
    }
    /*
      * 删除
      */
    function delResponse()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $response = D('Response');
        $resp_id = I('resp_id');
        $where['respNum'] = $resp_id;
        $state = $response->where($where)->delete();
        if ($state > 0) {
            $return = array(
                'code' => '200',
                'msg' => '处理完成！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '已被处理！',
            );
        }
        $this->ajaxReturn($return);
    }
}