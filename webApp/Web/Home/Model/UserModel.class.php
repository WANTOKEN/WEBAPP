<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/2
 * Time: 16:07
 */

namespace Home\Model;
use Think\Model;

class UserModel extends MiddleModel{
    protected  $tableName = 'users';
    protected $tablePrefix = '';
    protected $trueTableName = 'users';
    protected $dbName = 'webapp';

   /* protected $_auto = array(
        array('userId', 'GetUserID', 1, 'callback'),
        array('userPass', 'md5', 1, 'function'),
        array('regTime','GetDateTime',1,'callback'),
        array('userImage','http://192.168.1.13/webApp/web/resource/image1.jpg',1),

    );
    protected $_map = array(
        'account'   => 'userId',
        'password'  => 'userPass',
        'name'  => 'userName',
        'regtime'  => 'Regtime',
        'head'  => 'userImage',
    );
    protected function GetUserID() {
        $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        $userid=substr(str_shuffle($str),26,10);
        return $userid;
    }*/
}