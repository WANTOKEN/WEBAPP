<?php
namespace Home\Model;
use Think\Model;

class MiddleModel extends Model{
	protected $dbName = MY_DB_NAME;
	
	protected $connection = array(
		'DB_TYPE'      => 'mysql',
		'DB_HOST'      => MY_DB_HOST,
		'DB_USER'      => MY_DB_USER,
		'DB_PWD'       => MY_DB_PWD,
		'DB_PORT'      => MY_DB_PORT,
		'DB_PREFIX'    => '',
		'DB_CHARSET'   => 'utf8',
	);
}
	
?>