<?php
  function call($controller, $action) {
    require_once('controllers/controller' . $controller . '.php');

    switch($controller) {
      case 'Persone':
      require_once('models/modelPersone.php');
        $controller = new PersoneController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('Persone' => ['add', 'modifica','delete', 'update','show', 'errore']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('Persone', 'errore');
    }
  } else {
    call('Persone', 'errore');
  }
?>