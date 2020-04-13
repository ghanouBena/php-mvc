<?php 


/**
* 
*/
class validation 
{
	private static  $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
	public function generateCode($ln,$code='')
	{
		
		$wordln=strlen(self::$characters);
		if($ln == 0){
			return $code;
		}else{
			$code .= self::$characters[rand(0, $wordln-1)];
			$ln--;

			return $this->generateCode($ln,$code);
		}
	}

	public function checkEmail($value='')
	{
		$email = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.\-[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

		return preg_match($email, $value);
	}

	public function token($lenght=10)
	{
		return $this->generateCode($lenght);
	}
	public function checkPassword($value=[])
	{
		return password_verify($value['password'], $value['hash']);
	}
	
	public function hashPassword($password='')
	{
		return password_hash($password,PASSWORD_DEFAULT);
	}

	public function inputLength($value='',$lnMin=0,$lnMax=0)
	{
		$strLn = strlen($value);
		return ($strLn >= $lnMin && $strLn <= $lnMax)?true:false;
	}

	public function ConvertTypeInput($value='',$type='')
	{
		switch ($type) {
			case 'int':
				$value = (int) $value;
				break;
			case 'double':
				$value = (double) $value;
				break;
			default:
				$value = (string) $value;
				break;
		}

		return $value;
	}

	public function checkValidTypeInput($value='',$type='')
	{
		$type = 'ctype_'.$type;
		return $type($value);
	}
	
	public function validForm($values=[],$conditions=[])
	{
		$erros = [];
		foreach ($values as $k => $v) {
			if($this->inputLength($v,$conditions[$k]['min'],$conditions[$k]['max'])){
				if($this->checkValidTypeInput($v,$conditions[$k]['type'])){
					continue;
				}else{
					$erros[$k] = 'error type of your '.$k.' must be a '.$conditions[$k]['type'];
				}

			}else{
				$erros[$k] = 'length your  '.$k.' must be between '.$conditions[$k]['min'].' and '.$conditions[$k]['max'];
			}
		}
		$erros['ok'] = empty($erros)?true:false;

		return $erros;
	}

	public function debug($value,$objet=false)
	{
		if (!$objet) {
			echo '<pre>';
			print_r($value);
			echo '</pre>';
		}else{
			echo '<pre>';
			var_dump($value);
			echo '</pre>';
		}

		die();
	}
}


 ?>