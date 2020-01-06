<?php

namespace Home\Controller;

use Think\Controller;

class AIndexController extends Controller
{
    public function index()
    {
        $this->display('login');
    }

    public function page1()
    {
        $this->display('Aindex');
    }

    public function page2()
    {
        $this->display('Agoods_onsale');
    }

    public function page3()
    {
        $this->display('Agoods_onsend');
    }

    public function page4()
    {
        $this->display('Agoods_dismount');
    }

    public function page5()
    {
        $this->display('Aorders_data');
    }

    public function page6()
    {
        $this->display('Aorders_fail');
    }

    public function page7()
    {
        $this->display('Ausers_data');
    }

    public function page8()
    {
        $this->display('Ausers_response');
    }

    public function page9()
    {
        $this->display('Ausers_gold');
    }

    public function page10()
    {
        $this->display('Acustomer_apply');
    }

    public function page11()
    {
        $this->display('Acustomer_cooperate');
    }

    public function header()
    {
        $this->display('header');
    }

    public function footer()
    {
        $this->display('footer');
    }


    public function appindeximg()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $indeximg = D('IndexImg');
        $return = $indeximg->select();
        $this->ajaxReturn($return);
    }
    public function addindeximg(){
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $indeximg = D('IndexImgUrl');
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => './Uploads/',
            'savePath' => '/AppIndexImg/',
            'saveName' => array('uniqid'),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => true,
            'subName' => array('date', 'Ymd'),
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->uploadOne($_FILES['file']);
        if (!$info) {
            $return =array(
                'code'=>400
            );
        } else {
            $file_url = 'Uploads' . $info['savepath'] . $info['savename'];
            $return =array(
                'code'=>200,
                'data'=>$file_url
            );

        }
        $this->ajaxReturn($return);
    }

    public function addappindex()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $indeximg = D('IndexImg');
        $indexnum = I('indexnum');
        $title = I('title');
        $content = I('content');
        $where['indexnumber'] = $indexnum;
        $data['indextitle'] = $title;
        $data['indexcontent'] = htmlspecialchars_decode($content);
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => './Uploads/',
            'savePath' => '/AppIndex/',
            'saveName' => array('uniqid'),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => true,
            'subName' => array('date', 'Ymd'),
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->uploadOne($_FILES['file']);
        if (!$info) {
        } else {
            $file_url = 'Uploads' . $info['savepath'] . $info['savename'];
            $data['indeximg'] = $file_url;
            $goodsimginfo = $indeximg->field('indeximg')->where("indexnumber='$indexnum'")->limit(1)->select();

        }
        if ($indeximg->where($where)->save($data) >= 0) {
            unlink('./' . $goodsimginfo[0]['indeximg']);
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
    public function appindextext()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $indeximg = D('IndexText');
        $data = $indeximg->field('indextextnum as num,indextextcontent as text')->select();
        if($data){
            $this->ajaxReturn(array('code'=>200,'data'=>$data));
        }else{
            $this->ajaxReturn(array('code'=>400));
        }

    }
    public function addindextext()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $indeximg = D('IndexText');
        $textlist = I('textlist');
        if($textlist==null||$textlist==''){
            $this->ajaxReturn(array(
                'code'=>400,
                'msg'=>'内容为空！'
            ));
        }
        $text_list = explode(",", $textlist);//分割
        for ($i = 0; $i < count($text_list); $i++) {
            $data[] = array(
                'indextextnum'=>rand(100000,999999),
                'indextextcontent'=>$text_list[$i]
            );
        }
        $indeximg->where('1')->delete();
        $state =  $indeximg->addAll($data);
        if($state){
            $return = array(
                'code'=>200,
                'msg'=>'添加成功！'
            );
        }else{
            $return = array(
                'code'=>400,
                'msg'=>'添加失败！'
            );
        }
        $this->ajaxReturn($return);
    }
    public function login()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $admin = D('Admin');
        $where['adminAccount'] = I('account');
        if ($admin->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '用户不存在'
            );
            /*  $this->ajaxReturn($return);*/
            redirect('login');
            return;
        }
        $LoginInfo = $admin->where($where)->select();
        // $this->ajaxReturn($LoginInfo[0]['adminpass']);
        if ($LoginInfo[0]['adminpass'] == md5(I('password'))) {
            $return = array(
                'code' => '200',
                'msg' => '欢迎' . $LoginInfo[0]['adminrole'] . '!',

            );
            $this->display('Aindex');
        } else {
            $return = array(
                'code' => '400',
                'msg' => '密码错误!',

            );
            redirect('login');
        }
        /*  $this->ajaxReturn($return);*/
    }

    public function indexReport()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $orders = D('Orders');
        $user = D('User');
        $sale = D('Sale');
        //获取不同的时间
        $nowtime = date('Y-m-d H:i:s');//当前时间
        $map_day['reportDate'] = array('in', substr($nowtime, 5, 5));

        $fweek = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y")));
        $lweek = date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y")));
        $map_week['reportTime'] = array('between', array($fweek, $lweek));

        $fmonth = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), 1, date("Y")));
        $lmonth = date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("t"), date("Y")));
        $map_month['reportTime'] = array('between', array($fmonth, $lmonth));

        $map_year['reportYear'] = array('in', substr($nowtime, 0, 4));
        $typetime[] = $sale->field('reportDate')->group('reportDate')->order('reportDate desc')->limit(7)->select();
        $l = count($typetime[0]);//时间数
        for ($i = ($l - 1); $i >= 0; $i--) {
            $typeId = $typetime[0][$i]['reportdate'];//一条类型数据
            $info[] = $sale->field('reportWeek,reportDate,sum(saleOrders),sum(saleTotal),sum(saleCount)')->where("reportDate = '$typeId'")->select();

        }
        foreach ($info as $value) {//拼接
            $saledata[] = array(
                'y' => $value[0]['reportdate'] . ' ' . $value[0]['reportweek'],
                'a' => $value[0]['sum(saleorders)'],
                'b' => $value[0]['sum(saletotal)'],
                'c' => $value[0]['sum(salecount)'],
            );

        }
        //获取总的销售信息
        //日销售额：$day_sale,$week_sale,$month_sale,$year_sale

        $day_sale = $sale->field('sum(saleCount) as daysale')->where($map_day)->select();
        $week_sale = $sale->field('sum(saleCount) as weeksale')->where($map_week)->order('reportTime')->select();
        $month_sale = $sale->field('sum(saleCount) as monthsale')->where($map_month)->order('reportTime')->select();
        $year_sale = $sale->field('sum(saleCount) as yearsale')->where($map_year)->order('reportTime')->select();

        $day_sale_line = $sale->field('reportHour as y,sum(saleOrders) as a,sum(saleTotal) as b,sum(saleCount) as c')->where($map_day)->group('reportHour')->order('reportTime')->select();

        $day_sale_info = $sale->field('sum(saleOrders) as total_orders,sum(saleTotal) as total_total,sum(saleCount) as total_count')->where($map_day)->order('reportTime')->select();
        foreach ($day_sale_info as $info){
            $saleinfo = array(
                'total_orders'=>$info['total_orders']==null?0:$info['total_orders'],
                'total_total'=>$info['total_total']==null?0:$info['total_total'],
                'total_count'=>$info['total_count']==null?0:$info['total_count'],
            );
        }
        $goodstotal = $goods->count();//商品总量
        $ordertotal = $orders->count();//订单总量
        $usertotal = $user->count();//用户总量
        $saletotal = $sale->field('sum(saleCount) as saletotal')->select();

        $return = array(
            'salebar' => $saledata,
            'saledata' => array(
                'day_sale' => $day_sale[0]['daysale'] == null ? 0 : $day_sale[0]['daysale'],
                'week_sale' => $week_sale[0]['weeksale'] == null ? 0 : $week_sale[0]['weeksale'],
                'month_sale' => $month_sale[0]['monthsale']== null? 0 : $month_sale[0]['monthsale'],
                'year_sale' => $year_sale[0]['yearsale'],
            ),
            'saleline' => $day_sale_line,
            /*  'day_sale_info' => $day_sale_info[0],*/
            'day_sale_info' =>$saleinfo,
            'indexinfo' => array(
                'goods_total' => $goodstotal,
                'sales_total' => $saletotal[0]['saletotal'],
                'orders_total' => $ordertotal,
                'users_total' => $usertotal,
            ),
        );

        $this->ajaxReturn($return);
    }
}