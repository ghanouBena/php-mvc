<?php 
 use \core\models\model;

 /**
 * 
 */
 class users extends model
 {
 	
 	function __construct()
 	{
 		parent::__construct('users');

 		//echo self::$table;
 	}

 	function __get($key){
 		$key = explode('_', $key);
 		//print_r($key);die();
 		$method = 'get'.ucfirst($key[0]);
 		$method = $this->{$method}($key[1]);
 		return $method;
 	}

 	public function login($value=[])
 	{
 		$param  = ['colm'=>'*','condition'=>'username = :user AND password = :password'];
 		$values = ['user'=>$value['user'],'password'=>$value['pass']];
 		return model::prepare($param,$values,__CLASS__);
 	}

 	public function getUrl()
 	{
 		return 'accuiel/'.$this->id;
 	}
 }


 ?>