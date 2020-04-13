<?php 
namespace core\models\model;
use \core\DB_P\DB;
use \PDO;

require_once 'database.php';
/**
* 
*/
class model extends DB
{
	public static $table='';

	function __construct($nTable=''){

		self::$table = $nTable;
	}

	public static function query($col,$class){

		$pdo = DB::getPdo();
		$query = $pdo->query("SELECT {$colm} FROM ".self::$table);

		return $query->fetchAll(PDO::FETCH_CLASS,$class);
	}

	public static function prepare($param=[],$values=[],$class,$all=false)
	{
		$pdo = DB::getPdo();
		
		$prepare = $pdo->prepare("SELECT {$param['colm']} FROM ".self::$table." WHERE {$param['condition']}");
		$prepare->execute($values);

		$prepare->setFetchMode(PDO::FETCH_CLASS,$class);

		return $all?$prepare->fetchAll():$prepare->fetch();
	}

	public static function insert($param=[],$values=[],$lastId=false)
	{
		$pdo = DB::getPdo();
		$prepare = $pdo->prepare("INSERT INTO ".self::$table." ({$param['colm']}) VALUES({$param['value']})");
		if($prepare->execute($values)){

		return $lastId?$pdo->lastInsertId():true;
		}else{
			return false;
		}

	}

	public static function delete($param='',$values=[],$condition=false)
	{
		$pdo = DB::getPdo();
		if ($condition) {
			$prepare = $pdo->prepare("DELETE FROM ".self::$table." WHERE {$param}");
			return $prepare->execute($values)?true:false;
		}else{
			$query = $pdo->query("DELETE FROM {self::$table}");
			return $query?true:false;
		}


	}

	public static function update($param=[],$values=[],$condition=false)
	{
		$pdo = DB::getPdo();
		if($condition){

			$prepare = $pdo->prepare("UPDATE {self::$table} SET ".self::$table." WHERE {$param['condition']}");
			
		}else{
			$prepare = $pdo->prepare("UPDATE ".self::$table." SET {$param['param']}}");	
		}

		return $prepare->execute($values)?true:false;
	}


}

 ?>