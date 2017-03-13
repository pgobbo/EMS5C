<?php
  function call($controller, $action) {
    require_once('controllers/controller' . $controller . '.php');

    switch($controller) {
      case 'TipoSpecializzazioni':
      require_once('models/modelTipoSpecializzazioni.php');
        $controller = new TipoSpecializzazioniController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('TipoSpecializzazioni' => ['add', 'modifica','delete', 'update','show', 'errore']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('TipoSpecializzazioni', 'errore');
    }
  } else {
    call('TipoSpecializzazioni', 'errore');
  }
?>