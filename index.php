<?php
session_start();
$path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$params = explode('/',trim($path,'/'));


//  имя_контроллера/метод/параметр/хлам

$controller = 'Main';
$method = 'index';

if (!empty($params) && current($params) !== '') {  
  if (file_exists('controllers/'.lcfirst(current($params)).'.php')) {
    $controller = current($params);
    array_shift($params);
    require_once("controllers/".$controller.".php");
    $controller = new $controller();
    if (!empty($params)) {
      $method = current($params);
      array_shift($params);
      if (method_exists($controller, $method))
        $controller->{$method}(current($params));   
      else
        $controller->error();
    }
    else
      $controller->{$method}();
  }
  else {
    require_once("core/Controller.php");
    $controller = new Controller();
    $controller->error();
  }
}
else {
  require_once("controllers/".$controller.".php");
  $controller = new $controller();
  $controller->{$method}();
  }
