<?php 

use \core\Controller\Controller;
use \core\Session\SessionClass;
use \libs\auth\Auth;
/**
* 
*/
class home extends Controller
{
	
	function index($name='',$lname='')
	{ 
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: *');
		header('Content-Type: application/json');
		$json = file_get_contents('php://input');
		$data = json_decode($json); 
		//echo ($data->username);die();
		echo json_encode(['success'=>$data->username]);die();
		//SessionClass::delete('loggin');
		//Auth::handleSession('loggin');
		$this->view('header',['page'=>'Home']);
		$this->view('home',['name'=>$name,'lname'=>$lname]);
		
		$this->view('footer');
	}


	function login()
	{
		if(isset($_POST['login'])){
			//$this->validation_validation->debug($_POST,true);
			if($this->validation_validation->checkPassword(['password'=>$_SESSION['token'],'hash'=>$_POST['token']])){
			$login = $this->users_model->login($_POST);

			//$login = $user->login($_POST);
			//var_dump($login);
			echo '<br>'.$login->id;
			echo '<br>'.$login->url;
		}else{
			echo "ERROR token";
		}

		}
		$code = $this->validation_validation->checkEmail('gha.nou@gm.-ail.com');
		//$code = $valid->checkEmail('ghanou@gmail.com');
		//var_dump($this->validation_validation->checkValidTypeInput('ghanou','digit'));
		echo "-------<br>";
		$token = $this->validation_validation->token();
		SessionClass::set('token',$token);
		$this->view('header',['page'=>'login']);
		$this->view('login',['code'=>SessionClass::get('token'),'token'=>$this->validation_validation->hashPassword($token)]);
		$this->view('footer');
	}

	public function register()
	{
		$bodyHTML = '<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Email Confirmation</title>
		</head>
		<body>
		<div>
			<h3>Hello, Mr: abdelghani</h3>
			<p>Thank you for your registe, now you should to confirme you email by clicking to the button confirme.</p>
			<a href="medicament.com/confirme/1223" style="font-size:14px;text-decoration:none;color:#ffffff;font-weight:bold;padding:8px 14px;display:block;background-color:#77be53;border-radius:2px; width:100px;text-align:center" target="_blank">
			Confirme</a>
		</div>
		</body>
		</html>';
		$email = $this->mail();
		$sendEmail = $email->sendEmail('Email Confirmation',$bodyHTML);
		if($sendEmail){
			echo 'email has been sent';
		}else{
			echo 'error has not been sent';
		}
	}
}

 ?>
 