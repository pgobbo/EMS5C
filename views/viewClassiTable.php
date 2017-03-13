<?php

	require_once('/../models/modelClassi.php');
	require_once('views/viewClassiCerca.php');

	if($classi == null)
		echo "<p>Nessun record trovato!</p>";
	else
		echo Classi::getHtmlTable($classi);


?>
