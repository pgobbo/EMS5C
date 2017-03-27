<?php

	require_once('/../models/modelClassi.php');
		
	$classi = Classi::getArrayQuery("", "", "");

	require_once('views/viewClassiTable.php');

?>