<?php

require 'config.php';
require 'autoload.php';
require 'utils/errorLogging.php';

//-->Controller/Method/Params
$url = (isset($_GET["url"])) ? $_GET["url"] : "Index/index";
//echo $url."</br>";

$url = explode("/", $url);
//print_r($url);

if(isset($url[0])){$controller = $url[0];}
if(isset($url[1])){ if($url[1]!=''){ $method = $url[1];} }
//if(isset($url[2])){ if($url[2]!=''){ $params = $url[2];} }

$params=array();
for($i=2; $i<count($url); $i++ ) {
	$params[]=$url[$i];
}
$params=array_merge($params, $_POST);
//print_r($params);

//echo $controller;
//echo $method;




$path = './controllers/'.$controller.'.php';

if (file_exists($path)) {
	require $path;
	$controller = "controllers\\".$controller;
	$controller = new $controller();

	if (isset($method)) {
		if(method_exists($controller, $method)){
			if (isset($params)) {
				$controller->{$method}($params);
			}else{
				$controller->{$method}();
			}
		}
	}else{
		$controller->index();
	}

	//var_dump($controller);
}else{
	echo 'Error';
}

/*Session::init();
Session::setValue("U_ID",1);
echo Session::exist();*/

/*require LIBS.'Session.php';

Session::init();
print_r($_SESSION);

Session::destroy();*/
//echo URL;
//var_dump($params);


//print_r($url);


/*RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-l*/
//RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]