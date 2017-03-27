<?php

	require_once('/../models/modelClassi.php');
	require_once('views/viewClassiCerca.php');

	if($classi == null)
		echo "<p>Nessun record trovato!</p>";
	else
		echo Classi::getHtmlTable($classi);

?>

<form action="index.php">
	<input type="hidden" name="controller" value="Classi" />
	<input type="hidden" name="action" value="visualizzaInserisci" />
	<input type="submit" value="Inserisci" class="btn btn-primary" />
</form>
