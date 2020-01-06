<?php
namespace Home\Controller;
    use Think\Controller;
class IndexController extends Controller
{
    public function method()//控制器方法
    {
        $recvData = I('data');//从客户端接收参数
        //实例化模型
        $User = D('User');
        // 相当于 $User = new \Home\Model\UserModel();
        // 执行具体的数据操作,查询、增加、删除、修改
        $User->select();
        $User->where()->delete();
        //数据操作结束，赋值返回
        $data['value1'] = 'value1';
        $data['value2'] = 'value2';
        //将所有的输入结果以JSON方式返回
        $this->ajaxReturn($data);
    }

    /* public function index(){
         $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
     }*/
    public function auth()
    {
        $value = session('status');
        if ($value == 1) {
            return true;//已登录
        } else {
            $this->assign('js', 'swal("您还未登录！");');
            $this->display('login');
            return false;
        }
    }
    public function cancelpage(){//注销
        session(null); // 清空当前的session
        redirect('index');
    }
    public function index()
    {
        $this->display('login');
    }

    public function page1()
    {
        if ($this->auth()) {
            $this->display('Aindex');
        }
    }

    public function page2()
    {
        if ($this->auth()) {
            $this->display('Agoods_onsale');
        }
    }

    public function page3()
    {
        if ($this->auth()) {
            $this->display('Agoods_onsend');
        }

    }

    public function page4()
    {
        if ($this->auth()) {
            $this->display('Agoods_dismount');
        }

    }

    public function page5()
    {
        if ($this->auth()) {
            $this->display('Aorders_data');
        }

    }

    public function page6()
    {
        if ($this->auth()) {
            $this->display('Aorders_fail');
        }

    }

    public function page7()
    {
        if ($this->auth()) {
            $this->display('Ausers_data');
        }

    }

    public function page8()
    {
        if ($this->auth()) {
            $this->display('Ausers_response');
        }

    }

    public function page9()
    {
        if ($this->auth()) {
            $this->display('Ausers_gold');
        }

    }
    public function page10()
    {
        if ($this->auth()) {
            $this->display('Acustomer_apply');
        }

    }
    public function page11()
    {
        if ($this->auth()) {
            $this->display('Acustomer_cooperate');
        }

    }
    public function page12()
    {
        if ($this->auth()) {
            $this->display('Aapp_manager');
        }

    }
    public function page13()
    {
        if ($this->auth()) {
            $this->display('Abox_manager');
        }

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
            $this->assign('js', 'swal("用户不存在！");');
            $this->display();
            return;
        }
        $LoginInfo = $admin->where($where)->select();
        // $this->ajaxReturn($LoginInfo[0]['adminpass']);
        if ($LoginInfo[0]['adminpass'] == md5(I('password'))) {
            session('[start]');
            session('status', 1);  //设置session
            session('name', $LoginInfo[0]['adminname']);  //设置session
            $value = session('name');
            $this->assign('name', $value);
            //redirect('page1');
            $this->display('Aindex');
        } else {
            $this->assign('js', 'swal("密码错误！");');
            $this->display();
        }

    }
}