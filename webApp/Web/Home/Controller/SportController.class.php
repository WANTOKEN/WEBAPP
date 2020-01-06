<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/23
 * Time: 22:43
 */

namespace Home\Controller;

use Think\Controller;

class SportController extends Controller
{
    /*
    * 获取运动记录
    */
    function getSport()
    {
        $user = D('User');
        $map['userId'] = I('account');
        if ($user->where($map)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $sport = D('Sport');
        $where['sport_uId'] = I('account');
        if ($sport->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '还没有记录！',
            );
        } else {
            if ($info = $sport->where($where)->order('sportId desc')->select()) {
                foreach (array_reverse($info) as $value) {
                    $spdate [] = substr($value['sporttime'], 5, 5);
                    $spfoot [] = $value['footstep'];
                    $spcal [] = $value['consumer'];
                    $spmeter [] = $value['mile'] * 1000;
                }
                $return = array(
                    'code' => '200',
                    'msg' => '获取成功！',
                    'info' => $info,
                    'linedata' => array(
                        'spdate' => $spdate,
                        'spfoot' => $spfoot,
                        'spcal' => $spcal,
                        'spmeter' => $spmeter,
                    )
                );
            } else {
                $return = array(
                    'code' => '400',
                    'msg' => '获取失败！',
                );
            }
        }


        $this->ajaxReturn($return);
    }

    //获取当天用户运动的排行信息
    function getUserSportAsc()
    {
        $sport = D('Sport');
        $nowtime = date('Y-m-d H:i:s');//当前时间
        $day = substr($nowtime, 0, 10);
        $where['sportTime'] = $day;
        $sql = "select a.userName,a.userImage,b.* from users as a,sport as b where a.userId=b.sport_uId and b.sportTime='$day' order by b.footStep desc ";
        $sport_data = M()->query($sql);
       // $sport_data = M("user")->table("user as a")->join("sport as b")->field("a.*,b.*")->select();
       // $sport_data = $sport->join('user')->order('footStep desc')->limit(10)->select();
        if ($sport_data < 0) {
            $return = array(
                'code' => '400',
                'msg' => '还没有记录！',
            );
        } else {
            $return = array(
                'code' => '200',
                'msg' => '获取成功！',
                'info' => $sport_data,
                'today'=>$day
            );
        }
        $this->ajaxReturn($return);
    }

    /*
     * 提交运动记录
     */
    function submitSport()
    {
        $user = D('User');
        $map['userId'] = I('account');
        if ($user->where($map)->count() == 0) {
            $return = array(
                'code' => '2',
                'msg' => '用户不存在'
            );
            $this->ajaxReturn($return);
            return;
        }
        $sport = D('Sport');
        $where['sportTime'] = date("Y-m-d");
        $where['sport_uId'] = I('account');
        $footStep = I('footstep') == null ? 0 : I('footstep');//步数
        $point = ($footStep * 0.02) <= 150 ? ($footStep * 0.02) : 150;//积分5000步==100积分，1步就0.02积分
        $consumer = I('consumer');//消耗卡路里
        $mile = I('mile');//公里数
        if ($sport->where($where)->count() != 0) {
            $return = array(
                'code' => '400',
                'msg' => '今天已兑换过了，明天再来！',
            );
        } else {
            $data = array(
                'sport_uId' => I('account'),
                'sportTime' => date("Y-m-d"),
                'footStep' => $footStep,
                'point' => $point,
                'consumer' => $consumer,
                'mile' => $mile,
            );
            if ($sport->add($data)) {
                $info = $sport->where($where)->select();
                /*
                 * 成功后需要添加到积分记录表
                 */
                $pointData = array(
                    'pointNumber' => rand(90, 99) . date('YmdHis'),//交易单号
                    'pointCount' => $info[0]['point'],//获得积分数
                    'pointTime' => date('Y-m-d H:i:s'),//获得时间
                    'ways' => '运动获得',//交易的类型或者方式
                    'point_userid' => I('account'),//所属用户
                );
                $user_point = $info[0]['point'];
                $userPoint = D('UserPoint');
                $userPoint->add($pointData);
                $data2['userPoint'] = array('exp', "userPoint+ $user_point");//加操作
                $user->where($map)->save($data2);
                $return = array(
                    'code' => '200',
                    'msg' => '兑换成功！获得' . $info[0]['point'] . '积分!',
                    'point' => $info[0]['point'],
                );
            } else {

                $return = array(
                    'code' => '400',
                    'msg' => '兑换失败！',
                );
            }

        }
        $this->ajaxReturn($return);
    }

}