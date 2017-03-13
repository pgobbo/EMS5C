<?php

  if(isset($_GET['controller']))
    $controller = $_GET['controller'];
  else if(isset($_POST['controller']) || isset($controller))
    $controller = $_POST['controller'];
  else
    $controller = "controllerClassi"; //default

  if(isset($_GET['action']))
    $action = $_GET['action'];
  else if(isset($_POST['action']) || isset($action))
    $action = $_POST['action'];
  else
    $action = "visualizzaHome"; //default

  require_once('controllers/'.$controller.'.php');

  $controller = new $controller();
  $controller->$action();

?>