<?php
	require_once('/../models/modelClassi.php');

	$html = Classi::getHtmlFormModifica($_POST['Id']); //for the form
	echo $html;

?>