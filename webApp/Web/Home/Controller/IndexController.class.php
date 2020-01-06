<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $this->display();
    }
    public function index2()
    {
        $this->display("index2");
    }

    public function checkupdate()
    {
        $client_version = I('version');//客户端的版本
        $server_version = 2.0;
        $this->ajaxReturn($server_version);
    }

    function appindex()
    {
        $indeximg = D('IndexImg');
        $return = $indeximg->field('indexnumber,indeximg,indextitle')->select();
        $this->ajaxReturn($return);
    }

    function appindextext()
    {
        $indeximg = D('IndexText');
        $return = $indeximg->field('indextextnum as num,indextextcontent as text')->select();
        $this->ajaxReturn($return);
    }

    function appindexdetail()
    {
        $indeximg = D('IndexImg');
        $indexid = I('indexid');
        $where['indexnumber'] = $indexid;
        $state = $indeximg->field('indextitle,indexcontent')->where($where)->select();
        if ($state) {
            $return = array(
                'code' => 200,
                'data' => $state
            );
        } else {
            $return = array(
                'code' => 400,
            );
        }

        $this->ajaxReturn($return);
    }


}