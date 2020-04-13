<?php 
namespace core\app;


/**
* 
*/
class app
{ 
	private $controller = 'home';
	private $method 	   = 'index';
	private $parm 	   = [];
	
	function __construct()
	{
		$url = $this->parseUrl();
		if(file_exists('app/controllers/'.$url[0].'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		//sprint_r($url);die();

		}
		/*elseif($this->controller == 'home'){
			$url[1]=$url[0];
		}*/

			require_once 'app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;
		if(isset($url[0])){

			if(method_exists($this->controller, $url[0])){

				$this->method = $url[0];
				unset($url[0]);
			}/*else{
				$this->method = 'error';
			}*/
		}elseif(isset($url[1])){

			if(method_exists($this->controller, $url[1])){

				$this->method = $url[1];
				unset($url[1]);
			}/*else{
				$this->method = 'error';
			}*/
		}
		//print_r($url);die();

		$this->parm = $url?array_values($url):[];
		//print_r($this->parm);
		call_user_func_array([$this->controller,$this->method], $this->parm);

	}

	public function parseUrl()
	{
		if(isset($_GET['url'])){

			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}else{
			$url[0]=$this->controller;
			$url[1]=$this->method;
			return $url;
		}
	}
}
 ?>