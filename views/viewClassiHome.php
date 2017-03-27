<a href="index.php?controller=controllerClassi&action=visualizzaInserisci">Inserisci classe</a><br>
<?php

	require_once('/../models/modelClassi.php');
		
	$classi = Classi::getArrayQuery("", "", "");

	require_once('views/viewClassiTable.php');

?>