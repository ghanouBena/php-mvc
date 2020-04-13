<?php
use \app\init;
use \mvc\config;
//use \core\error\Error;
//use \DateTime;
use \core\app\app;
use \core\Session\SessionClass;
require_once 'app/init.php';
$date = new DateTime('+ 1 hour'); 
SessionClass::sessionStart('MY'.SITE_NAME,$date->getTimeStamp(),'/','localhost',false,true);
//error_reporting(DISPLAY_ERRORS);
/**
 * Error and Exception handling
error_reporting(E_ALL);
set_error_handler("Error::errorHandler");
set_exception_handler("Error::exceptionHandler");
 */
$app  = new app;


 ?>