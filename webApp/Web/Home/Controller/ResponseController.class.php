<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/26
 * Time: 13:18
 */

namespace Home\Controller;

use Think\Controller;

class ResponseController extends Controller
{
    function response()
    {
        $imei = I('imei');//设备标识
        $platform = I('p');//使用的平台android：ios；
        $media = I('md');//设备型号
        //反馈问题
        $question = I('content');//反馈的问题
        $contact = I('contact');//联系方式
        $userId = I('account');//用户Id
        $score = I('score');//用户Id
        $responseId = 'RES' . str_shuffle(date('YmdHis'));//反馈编号
        $response = D('Response');
        $responseImg = D('ResponseImg');//存放记录图片
        //图片（客户端5张）
        /* $i = 1;//下标*/
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = '/UsersResponse/'; // 设置附件上传（子）目录
        $upload->subName = $userId;
        $upload->autoSub = true;
        $data2 = array(
            'resp_userId' => $userId,
            'respQuestion' => $question,
            'respContact' => $contact,
            'respNum'=>$responseId,
            'respScore' => $score,
            'imei' => $imei,
            'platform' => $platform,
            'media' => $media,

        );
        $state = $response->add($data2);

        //$state = $response->execute("INSERT INTO webapp.response (`resp_userId`,`respQuestion`,`respContact`,`respScore`,`imei`,`platform`,`media`,`respNum`)
        //   VALUES ('$userId','$question','$contact','$score','$imei','$platform','$media','$responseId')");

        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
        } else {// 上传成功 获取上传文件信息
            foreach ($info as $file) {
                $respImg = 'Uploads' . $file['savepath'] . $file['savename'];
                $imgdata ['respImg'] = $respImg;  //存到数据库
                $imgdata ['responseId'] = $responseId;
                $responseImg->add($imgdata);
            }
        }
        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '修改成功！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '上传失败！',
            );
        }
        //进行数据库操作
        $this->ajaxReturn($return);

    }
}