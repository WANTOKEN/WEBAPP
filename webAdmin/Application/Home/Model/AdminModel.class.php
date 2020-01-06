<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/2
 * Time: 16:07
 */

namespace Home\Model;
use Think\Model;

class AdminModel extends MiddleModel{
    protected  $tableName = 'admin';
    protected $tablePrefix = '';
    protected $trueTableName = 'admin';
    protected $dbName = 'webapp';
}