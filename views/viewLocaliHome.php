<div> <!-- content -->

	<h1>Benevenuto nella gestione dei locali della scuola!</h1>
	<br> <a href=index.php?controller=Locali&action=showInput>Inserisci Locale</a>
	<br> <a href=index.php?controller=Locali&action=showFind>Visualizza </a>
	<br>
	<table border="1" style="border-collapse: collapse;">
	    <thead>
	        <th>ID Locale</th>
	        <th>Codice Locale</th>
	        <th>Descrizione </th>
	        <th>Modifica</th>
	        <th>ID Edificio</th>
	    </thead>
	    <tbody>
	<?php 
		require_once("controllers/controllerLocali.php");
	    controllerLocali::showAll();
	?>
	</tbody>
	</table>
</div> <!-- content -->