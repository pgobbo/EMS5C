<?php 
	function call($controller, $action) {
		require_once('controllers/controller' . $controller . '.php');

		switch($controller) {
			case 'Edificio':
				$controller = new EdificioController();
				break;
		}

		$controller->{ $action }();
	}

	// we're adding an entry for the new controller and its actions
	$controllers = array('Edificio' => ['show','addShow','add','updateShow','update','delete']);
	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('Edificio', 'error');
		}
	} else {
		call('Edificio', 'error');
	}
?>