<?php 
	function call($controller, $action) {
		require_once('controllers/controller' . $controller . '.php');

		if($controller=='Login') {
			$controller = new LoginController();
			$controller->{ $action }();
		} else {
			switch($controller) {
				case 'Login':
					$controller = new LoginController();
					break;
				case 'Home' :
					$controller = new HomeController();
					break;
				case 'Edificio':
					$controller = new EdificioController();
					break;
				case 'Classi' :
					$controller = new controllerClassi();
					break;
				case 'Istituto' :
					$controller = new istitutoController();
					break;
				case 'Locali' :
					$controller = new controllerLocali();
					break;
				case 'Persone':
					$controller = new PersoneController();
					break;
				case 'TipoSpecializzazioni':
					$controller = new TipoSpecializzazioniController();
					break;
			}
		require_once('views/header.html');
		require_once('views/viewMenuAside.html');

		$controller->{ $action }();
		require_once('views/footer.html');
		}
	}

	// we're adding an entry for the new controller and its actions
	$controllers = array('Edificio' => ['show','addShow','add','updateShow','update','delete'],
		'Classi'=> ['visualizzaModifica', 'visualizzaHome', 'visualizzaCancella', 'visualizzaCerca', 'visualizzaInserisci', 'inserisci', 'cerca', 'cancella', 'modifica'],
		'Istituto' => ['show','add','update', 'updateShow', 'delete'],
		'Locali' => ['showInput', 'showFind', 'showModify', 'add', 'find', 'createTable', 'delete', 'modify'],
		'Persone' => ['show', 'add', 'modifica', 'update', 'delete', 'errore'],
		'TipoSpecializzazioni' => ['show', 'add', 'modifica', 'update', 'delete', 'errore'],
		'Login' => ['checkLoginInput','home', 'errore'],
		'Home' => ['home']);
		

	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('Error', 'error404');
		}
	} else {
		call('Error', 'error404');
	}
?>