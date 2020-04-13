<?php 

use \core\Controller\Controller;
/**
* 
*/
class users extends Controller
{
	
	function index($name='',$lname ='')
	{ 
		$this->view('home',['name'=>$name,'lname'=>$lname]);
	}

	

	public function register()
	{
		$errors = NULL;
		if(isset($_POST['save'])){
			unset($_POST['save']);
			$condition = ['firstName'=>['min'=>8,'max'=>'32','type'=>'alpha'],
						  'lastName'=>['min'=>8,'max'=>'32','type'=>'alpha']];
			$errors = $this->validation_validation->validForm($_POST,$condition);

			if($errors['ok']){

			}
		}
		//var_dump($errors);
		$this->view('header',['page'=>'Register']);
		$this->view('register',['errors'=>$errors]);
		$this->view('footer');
	}
}

 ?>
 