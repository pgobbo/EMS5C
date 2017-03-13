<?php 
	function call($controller, $action) {
		require_once('controllers/controller' . $controller . '.php');

		switch($controller) {
			case 'Istituto':
				$controller = new istitutoController();
				break;
			case 'Home':
				$controller = new homeController();
				break;
		}

		$controller->$action();
	}

	// we're adding an entry for the new controller and its actions
	
	$controllers = array('Istituto' => ['show','add','update', 'updateShow', 'delete'],
			     'Home'=>['show']);
	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('Istituto', 'error');
		}
	} else { 
		call('Istituto', 'error');
	}
?>