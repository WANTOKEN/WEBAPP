<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/26
 * Time: 13:18
 */

namespace Home\Controller;

use Org\Util\ArrayList;
use Think\Controller;

//分享模块
class ShareController extends Controller
{
// 过滤掉emoji表情
    function filterEmoji($str)
    {
        $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);

        return $str;
    }
    function istime($str){
        $currentDate = date('m-d');//当前日期
        $date = substr($str,5,5);
        $time = substr($str,11,5);
        if($date==$currentDate){
            $return_date='今天'.' '.$time;
        }else{
            $return_date = $date.' '.$time;
        }
        return $return_date;
    }
    //根据用户ID查询信息
    function queryInfoById($qid){
        $user = D('User');
        $map['userId'] = $qid;
        $userData = $user->field('userId,userName,userImage')->where($map)->select();
        $return = $userData;
        return $return;
    }
    //根据ID查询点赞数量
    function queryLikeById($qid){
        $shareLike = D('ShareLike');
        $map['like_id'] = $qid;
        $count = $shareLike->where($map)->count();
        $return = $count;
        return $return;
    }
    //根据ID查询评论数量
    function queryCommentById($qid){
        $shareCom = D('ShareCom');
        $map['com_share_id'] = $qid;
        $count = $shareCom->where($map)->count();
        $return = $count;
        return $return;
    }
    //根据ID查询评论数量
    function queryVisitById($qid){
        $shareVisit = D('ShareVisit');
        $map['visit_id'] = $qid;
        $count = $shareVisit->where($map)->count();
        $return = $count;
        return $return;
    }

    //分享
    function sendshare()
    {

        $userId = I('account');//用户Id
        $content = I('contenttext');//内容
        $shareId = 'SD' . date('YmdHis');//分享编号
        $share = D('Share');
        $shareImg = D('ShareImg');//存放记录图片
        //图片（客户端5张）
        /* $i = 1;//下标*/
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = '/UsersShare/'; // 设置附件上传（子）目录
        $upload->subName = $userId;
        $upload->autoSub = true;
        $data2 = array(
            'share_userid' => $userId,
            'share_id' => $shareId,
            'share_content' =>$this->filterEmoji(htmlspecialchars_decode($content)),//特殊的 HTML 实体转换回字符
            'share_time' => date('Y-m-d H:i:s'),

        );
        $state = $share->add($data2);

        //$state = $response->execute("INSERT INTO webapp.response (`resp_userId`,`respQuestion`,`respContact`,`respScore`,`imei`,`platform`,`media`,`respNum`)
        //   VALUES ('$userId','$question','$contact','$score','$imei','$platform','$media','$responseId')");

        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
        } else {// 上传成功 获取上传文件信息
            foreach ($info as $file) {
                $shareImgUrl = 'Uploads' . $file['savepath'] . $file['savename'];
                $imgdata ['share_img_url'] = $shareImgUrl;  //存到数据库
                $imgdata ['share_for_id'] = $shareId;
                $shareImg->add($imgdata);
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

    //获取分享
    function getshare()
    {
        header('Access-Control-Allow-Origin:*');
        $share = D('Share');
        $shareImg = D('ShareImg');//存放记录图片
        $user = D('User');
        $shareData = $share->order('id desc')->limit(0,3)->select();
        foreach ($shareData as $value) {
            $qid = $value['share_id'];//查询的id
            $map['share_for_id'] = $qid;
            $uid = $value['share_userid'];//查询的id
            $map2['userId']=$uid;
            $shareImgData = $shareImg->field('share_img_url as img')->where($map)->select();

            $userData = $user->field('userId,userName,userImage')->where($map2)->select();
            $return[] = array(
                'id' => $value['id'],
                'sid' => $value['share_id'],
                'likecount'=>$this->queryLikeById($value['share_id']),
                'commentcount'=>$this->queryCommentById($value['share_id']),
                'visitcount'=>$this->queryVisitById($value['share_id']),
                'content' => $value['share_content'],
                'time' =>  $this->istime($value['share_time']),
                'userData'=>$userData[0],
                'imgdata' => $shareImgData==[]?[]:$shareImgData,
            );
        }
        /* $return =$shareData;*/
        $this->ajaxReturn($return);
    }
    //获取加载分享
    function getmoreshare()
    {
        header('Access-Control-Allow-Origin:*');
        $share = D('Share');
        $shareImg = D('ShareImg');//存放记录图片
        $user = D('User');
        $qindex = I('index');
        $maplss['id']= array('lt',$qindex);
        $shareData = $share->where($maplss)->order('id desc')->limit(5)->select();
        foreach ($shareData as $value) {
            $qid = $value['share_id'];//查询的id
            $map['share_for_id'] = $qid;
            $uid = $value['share_userid'];//查询的id
            $map2['userId']=$uid;
            $shareImgData = $shareImg->field('share_img_url as img')->where($map)->select();

            $userData = $user->field('userId,userName,userImage')->where($map2)->select();
            $return[] = array(
                'id' => $value['id'],
                'sid' => $value['share_id'],
                'likecount'=>$this->queryLikeById($value['share_id']),
                'commentcount'=>$this->queryCommentById($value['share_id']),
                'visitcount'=>$this->queryVisitById($value['share_id']),
                'content' => $value['share_content'],
                'time' =>  $this->istime($value['share_time']),
                'userData'=>$userData[0],
                'imgdata' => $shareImgData==[]?[]:$shareImgData,
            );
        }
        /* $return =$shareData;*/
        $this->ajaxReturn($return);
    }
    //获取一条
    function getoneshare()
    {
        header('Access-Control-Allow-Origin:*');
        $share = D('Share');
        $shareImg = D('ShareImg');//存放记录图片
        $user = D('User');
        $userId = I('userid');
        $shareId = I('shareid');
        $where['share_id']=$shareId;
        $shareData = $share->where($where)->select();
       if($shareData){
           $this->visit($userId,$shareId);
           $qid = $shareData[0]['share_id'];//查询的id
           $map['share_for_id'] = $qid;
           $uid = $shareData[0]['share_userid'];//查询的id
           $map2['userId']=$uid;
           $shareImgData = $shareImg->field('share_img_url as img')->where($map)->select();
           $userData = $user->field('userId,userName,userImage')->where($map2)->select();
           $return[] = array(
               'id' => $shareData[0]['share_id'],
               'likecount'=>$this->queryLikeById($shareData[0]['share_id']),
               'commentcount'=>$this->queryCommentById($shareData[0]['share_id']),
               'visitcount'=>$this->queryVisitById($shareData[0]['share_id']),
               'content' => $shareData[0]['share_content'],
               'time' => $this->istime($shareData[0]['share_time']),
               'userData'=>$userData[0],
               'imgdata' => $shareImgData==[]?[]:$shareImgData,
           );
       }else{
           $return = array(
               'code'=>400,
               'msg'=>'无该条记录！'
           );
       }
        /* $return =$shareData;*/
        $this->ajaxReturn($return);

    }
    //分享评论
    function sendcomment()
    {

        $userId = I('account');//用户Id
        $content = I('contenttext');//内容
        $shareId = I('shareid');
        $comId = 'PL' . date('YmdHis');//分享编号
        $shareCom = D('ShareCom');

        $data = array(
            'com_id' => $comId,
            'com_share_id' => $shareId,
            'com_text' =>$this->filterEmoji(htmlspecialchars_decode($content)),//特殊的 HTML 实体转换回字符
            'com_time' => date('Y-m-d H:i:s'),
            'com_per_id'=>$userId,
        );
        $state = $shareCom->add($data);


        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '发表成功！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '发表失败！',
            );
        }
        //进行数据库操作
        $this->ajaxReturn($return);

    }

    //获取全部评论
    function getallcomment(){
        $shareId = I('shareid');
        $shareCom = D('ShareCom');
        $user = D('User');
        $shareComReply = D('ShareComReply');
        $where['com_share_id']=$shareId;
        $comData = $shareCom->where($where)->order('id desc')->select();

        if($comData){
            foreach ($comData as $value) {
                $qid = $value['com_per_id'];//查询的id
               /* $map['userId'] = $qid;*/
                $cid = $value['com_id'];
                $map2['reply_com_id']=$cid;
              /*  $userData = $user->field('userId,userName,userImage')->where($map)->select();*/
                $userData = $this->queryInfoById($qid);
                $replyData = $shareComReply->where($map2)->select();
                foreach ($replyData as $value2) {
                    $return_replyData[]=array(
                        'reply_id'=>$value2['reply_id'],
                        'reply_context'=>$value2['reply_context'],
                        'reply_form_p'=> $this->queryInfoById($value2['reply_form_p']),
                        'reply_to_p'=>$this->queryInfoById($value2['reply_to_p']),
                        'reply_time'=>$value2['reply_time'],
                        'reply_com_id'=>$value2['reply_com_id'],

                    );
                }
                $returnData[] = array(
                    'id' => $value['com_id'],
                    'likecount'=>$this->queryLikeById($value['com_id']),
                    'content' => $value['com_text'],
                    'time' => $this->istime($value['com_time']),
                    'userid'=>$userData[0]['userid'],
                    'username'=>$userData[0]['username'],
                    'userimg'=>$userData[0]['userimage'],
                    'replydata'=>$return_replyData
                );
            }
            $return = array(
                'code'=>'200',
                'data'=>$returnData
            );
        }else{
            $return = array(
                'code'=>'400',
                'data'=>null
            );
        }
        $this->ajaxReturn($return);
    }
    //回复评论
    function sendreply()
    {
        $to_userId = I('to_user');//被回复用户Id
        $from_userId = I('form_user');//回复用户Id
        $content = I('content');//内容
        $comId = I('comid');
        $replyId = 'HF' . date('YmdHis');//分享编号
        $shareComReply = D('ShareComReply');

        $data = array(
            'reply_id' => $replyId,
            'reply_com_id' => $comId,
            'reply_context' =>$this->filterEmoji(htmlspecialchars_decode($content)),//特殊的 HTML 实体转换回字符
            'reply_time' => date('Y-m-d H:i:s'),
            'reply_form_p'=>$from_userId,
            'reply_to_p'=>$to_userId
        );
        $state = $shareComReply->add($data);


        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '回复成功！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '回复失败！',
            );
        }
        //进行数据库操作
        $this->ajaxReturn($return);

    }
    //浏览
    function visit($userId,$visitId)
    {
        /*$userId = I('userid');//被回复用户Id
        $visitId = I('visitid');*/
        $shareVisit = D('ShareVisit');
        $data = array(
            'visit_id' => $visitId,
            'visit_uid' => $userId,
        );
        $state = $shareVisit->add($data);
        if ($state) {
            $return=true;
        } else {
            $return =false;
        }
        //进行数据库操作
        return $return;

    }
    //点赞
    function sendlike()
    {
        $userId = I('userid');//被回复用户Id
        $likeId = I('likeid');
        $shareLike = D('ShareLike');
        $data = array(
            'like_id' => $likeId,
            'like_uid' => $userId,
        );
        $state = $shareLike->add($data);
        if ($state) {
            $return = array(
                'code' => '200',
                'msg' => '点赞成功！',
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '点赞失败！',
            );
        }
        //进行数据库操作
        $this->ajaxReturn($return);

    }
    function delOneShare(){
        $shareId = I('shareid');
        $share = D('Share');
        $where['share_id'] = $shareId;
        $state = $share->where($where)->delete();
        if ($state >= 0) {
            $return = array(
                'code' => '200',
                'msg' => '删除成功',

            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '删除失败',
            );
        }
        $this->ajaxReturn($return);


    }
}