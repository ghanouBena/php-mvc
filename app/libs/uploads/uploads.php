<?php 

/**
* 
*/
class uploads
{
	
	public function uploadImages() {
    	$num_args = func_num_args();
    	$arg_list = func_get_args();
   
    	$i = 0;
    	$unlinkElement = array();
    	$unlinkElement['ok'] = false;
    	foreach($arg_list as $key=>$value) {
        	if(is_array($value) AND is_array($value[0])) {
            	if($value[0]['error'] == 0 AND isset($value[1])) {
                	if($value[0]['size'] > 0 AND $value[0]['size'] < 500000) {
                    	$typeAccepted = array("image/jpeg", "image/gif", "image/png");
                    	if(in_array($value[0]['type'],$typeAccepted)) {   
                        	$destination = $value[1];
                        	if(isset($value[2])) {
                            	$extension = substr($value[0]['name'] , strrpos($value[0]['name'] , '.') +1);
                            	$destination .= (str_replace(" ","-",$value[2])).".".$extension;
                        	} else {
                            	$destination .= $value[0]['name'];
                        	}
                       
                        	if(move_uploaded_file($value[0]['tmp_name'],$destination)) {
                            	$i++;
                            	$unlinkElement['url'] = $destination;
                        	}
                    	}
                	}
            	}
        	}
    	}
    	if($i == $num_args) {
       	 $unlinkElement['ok'] = true;

    	} else {
        	foreach($unlinkElement['url'] as $value) {
            	unlink($value);
        	}
    	}
    	//$file_one = array($_FILES['file_one'],$destination,$name_one);
    	return $unlinkElement;
	}
}


 ?>