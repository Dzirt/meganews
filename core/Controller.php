<?php
/**
* 			
*/
class Controller
{
	public function view($name, $data=null) {
		ob_start();
		require_once("views/$name.php");
		echo ob_get_clean();
	}
	public function error() {
		ob_start();
		require_once("views/404.html");
		echo ob_get_clean();
	}
}