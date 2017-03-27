<?php

 class MainController{

    function route(){
        if(isset($_GET['controller']) && isset($_GET['action'])){
            $controller=$_GET['controller'];
            //echo "Controller is set =".$controller;
            $action=$_GET['action'];
             //echo "action is set=".$action;
        }
        else if(isset($_POST['controller']) && isset($_POST['action'])){
            $controller=$_POST['controller'];
            //echo "Controller is set =".$controller;
            $action=$_POST['action'];
             //echo "action is set=".$action;
        } else {
            $controller = 'controllerLocali';
            $action     = 'show';
        }

        //EXECUTION
        try{
            require_once "controllers/".$controller.".php";
            $controller= new $controller();
            $controller->$action();
        }catch(Exception $er){ print_r($er);}   
    }
}

?>