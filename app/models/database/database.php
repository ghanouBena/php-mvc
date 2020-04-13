<?php 
namespace core\DB_P;
use \PDO;

/**
* 
*/
class DB
{
	
	public  static function getPdo()
	{
		if(self::$pdo === NULL){
			try {
				
			$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 					PDO::MYSQL_ATTR_INIT_COMMAND =>'SET CHARACTER SET UTF8',
 					PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'];

			self::$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME
				,DB_USER,DB_PASS, $opt);

			
			} catch (Exception $e) {
				die('ERROR : '.$e->getMessage());
			}
		}
		return self::$pdo;
	}
}

?>