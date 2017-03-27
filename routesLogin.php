<?php
  function call($controller, $action) {
    require_once('controllers/controller' . $controller . '.php');

    switch($controller) {
      case 'Login':
      require_once('models/modelUtenti.php');
        $controller = new LoginController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('Login' => ['checkLoginInput','home', 'errore']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('Login', 'errore');
    }
  } else {
    call('Login', 'errore');
  }
?>