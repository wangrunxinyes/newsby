<?php 
namespace common\models;

use common\models\WActiveRecord;

/**
 * Tour model
 *
 * @property integer $id
 * @property string $ip
 * @property string $status
 * @property string $createtime
 * @property string $lastvisittime
 * @property int $vip
 * @property int total
 */
class Visitor extends WActiveRecord{
	
	function __construct(){
		parent::__construct();
		$this->attributes = [
				'ip'=>['request', 'string'],
				'status'=>['request', 'int'],
				'createtime'=>['request', 'int'],
				'lastvisittime'=>['request', 'int'],
				'vip'=>['request', 'int'],
				'total'=>['request', 'int'],
		];
	}
	
	public static function tableName()
	{
		return '{{%visitor}}';
	}
	public static function tableNameString() {
		return 'visitor';
	}
}


?>