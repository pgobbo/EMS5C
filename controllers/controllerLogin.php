<?php
  class LoginController {
    public function home(){
      require_once('views/viewLogin.html');
    }

    public function checkLoginInput () {
      if(!isset($_SESSION)){
        session_start();
      }
      $username=$_POST["userName"];
      $password=md5($_POST["password"]);
      require_once('models/modelUtenti.php');
      if(Utenti::checkLoginInput($username,$password)){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        $_SESSION["admin"]=Utenti::getAdmin($username,$password);
        header('Location: index.php?controller=Home&action=home');
      } else {
        require_once('views/viewLogin.html');
        echo "password e username errata";
      }
    }

    public function errore(){
      require_once('views/viewErrore404.php');
    }

  }
?>