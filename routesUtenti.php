<?php
  function call($controller, $action) {
    require_once('controllers/controller' . $controller . '.php');


    switch($controller) {
      case 'Utenti':
      require_once('models/modelUtenti.php');
        $controller = new UtentiController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('Utenti' => ['add', 'modifica','delete', 'update','show', 'errore']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('Utenti', 'errore');
    }
  } else {
    call('Utenti', 'errore');
  }
?>