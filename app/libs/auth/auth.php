<?php 

namespace libs\auth;
use \core\Controller\Controller;

/**
 * 
 */
class Auth
{
	
	public static function handleSession($loginKey)
	{
		if(!isset($_SESSION[$loginKey])){
			session_destroy();
			Controller::render('login');
		}
	}
}

 ?>