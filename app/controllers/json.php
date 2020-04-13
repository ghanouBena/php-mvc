<?php 

use \core\Controller\Controller;
/**
* 
*/
class json extends Controller
{
	
	function index($name='',$lname ='')
	{ 
		$this->view('home',['name'=>$name,'lname'=>$lname]);
	}

	

	public function upload()
	{
		if(isset($_FILES)){
			$file = $this->uploads_uploadFiles->uploadImages([$_FILES['file'],'data/upload/']);
			if($file['ok']){
				$return_arr = array("name" => $_FILES['file']['name'],
					"size" =>$_FILES['file']['size'], "src"=> '/'.$file['url']);
				echo json_encode($return_arr);
			}
		}
	}
}

 ?>
 