<?php 

namespace core\Controller;

class Controller
{

  function __get($key){
    $key = explode('_', $key);
    $method = $this->{$key[1]}($key[0]);
    return $method;
  }
  public function model($model)
  {
  	require_once 'app/models/'.$model.'.php';
  	return new $model();
  }
  public function view($view,$data = [])
  {
  	require_once 'app/views/'.$view.'.php';
  }

  public function render($page='')
  {
  	header("location:".$page);
  }

  public function validation($valid)
  {
  	require_once 'app/libs/validations/'.$valid.'.php';
  	return new $valid();
  }

  public function mail($page='Email')
  {
    require_once 'app/libs/PHPMailer/'.$page.'.php';
    return new $page();
  }

  public function uploadFiles($page='uploads')
  {
    require_once 'app/libs/uploads/'.$page.'.php';
    return new $page();
  }
  public function error()
  {   $this->view('header',['page'=>'Error']);
    $this->view('error',['error'=>'ERROR 404']);
    $this->view('footer');
  }

}


 ?>