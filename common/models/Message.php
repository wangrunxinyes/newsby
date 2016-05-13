<?php 
namespace common\models;

use common\models\WActiveRecord;

/**
 * Tour model
 *
 * @property integer $id
 * @property string $email
 * @property string $status
 * @property string $createtime
 * @property string $name
 * @property string $message
 * @property string $captcha
 * @property string $ip
 */
class Message extends WActiveRecord{
	function __construct(){
		parent::__construct();
		$this->attributes = [
				'email'=>['request', 'string'],
				'status'=>['request', 'int'],
				'createtime'=>['request', 'int'],
				'name'=>['request', 'string'],
				'message'=>['request', 'string'],
				'captcha'=>['request', 'string'],
				'ip'=>['request', 'string'],
		];
	}
	public static function tableNameString() {
		return 'leavemessage';
	}
	public static function tableName() {
		return '{{%leavemessage}}';
	}
	
	
}


?>