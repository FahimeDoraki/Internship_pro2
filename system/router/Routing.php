<?php
namespace System\router;

use ReflectionMethod;

class Routing{

    private $current_route;

    public function __construct(){
        global $current_route;
        $this->current_route = explode('/', $current_route);
    }

public function run(){

  $path = realpath(dirname(__FILE__) . "/../../app/Controllers/" . $this->current_route[0] . ".php");
  if(empty($this->current_route[0])){
    header("Location: ".'http://localhost/home');
    exit;
  }elseif(!file_exists($path)){
    echo "404 - file not exist!!";
    exit;
  }
  require_once($path);

sizeof($this->current_route) == 1 ? $method = "index" : $method = $this->current_route[1];

$class = "app\Controllers\\" . $this->current_route[0];
$object = new $class();
if (method_exists($object, $method)) {
  $reflection = new ReflectionMethod($class , $method);
  $parameterCount = $reflection->getNumberOfParameters();
  if ($parameterCount <= count(array_slice($this->current_route , 2)))
    call_user_func_array(array($object , $method), array_slice($this->current_route , 2));
    else {
      echo "404 - parameter error!";
    }
    }
  else {
    echo "404 - method not exist!";
  }
}

}
