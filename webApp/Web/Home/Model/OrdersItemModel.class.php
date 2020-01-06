<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/8
 * Time: 15:06
 */

namespace Home\Model;
use Think\Model;

class OrdersItemModel extends  MiddleModel{
    protected  $tableName = 'order_goods';
    protected $tablePrefix = '';
    protected $trueTableName = 'order_goods';
    protected $dbName = 'webapp';


}