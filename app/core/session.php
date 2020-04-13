<?php 
namespace core\Session;


/**
* 
*/
class SessionClass
{
	
	public static function sessionStart($name='MYSESS',$time=3600,$path='/',$domain ='localhost',$secure='false',$httponly= 'true')
	{
		session_set_cookie_params($time,$path,$domain,$secure,$httponly);
    	session_name($name);
    	//session_set_cookie_params(lifetime, path, domain, secure, httponly)
    	session_start();

    	// Reset the expiration time upon page load
    	if (isset($_COOKIE[$name])){
      			setcookie($name, $_COOKIE[$name],$time, $path,$domain,$secure,$httponly);
    	}
	}

    public static function set($key,$value)
    {
        $_SESSION[$key]=$value;
        return (isset($_SESSION[$key]) && !empty($_SESSION[$key]))?true:false;
        
    }

    public static function get($key)
    {
        return (isset($_SESSION[$key]))?$_SESSION[$key]:false;
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }
}

 ?>