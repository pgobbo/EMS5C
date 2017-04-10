<!--
<div> content 

	<h1>Benevenuto nella gestione dei locali della scuola!</h1>
		<br> <a href=index.php?controller=Locali&action=showInput>Inserisci Locale</a>
		<br> <a href=index.php?controller=Locali&action=showFind>Visualizza </a>
		<br>

	<table border="1" style="border-collapse: collapse;">
	    <thead>
	        <th>ID Locale</th>
	        <th>Codice Locale</th>
	        <th>Descrizione </th>
	        <th>ID Edificio</th>
	        <th>Delete</th>
	    </thead>
	    <tbody>
	<?php 
		//require_once("controllers/controllerLocali.php");
	    //controllerLocali::showAll();
	?>
	</tbody>
	</table>
</div>  content 
-->



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<div class="content"><!-- content -->

<form action="index.php" method="get"> 
    	
<h1>Find Locale</h1>

		<div class="row"> 
		    <div class="form-group col-lg-3">
		        <label for="IdLocale">ID Locale </label>
		        <input type="text" name="IdLocale" value="" class='form-control'>
	        </div>

	        <div class="form-group col-lg-3">
		        <label for="Codice">Code </label>
		        <input type="text" name="Codice" value="" class='form-control'>
	        </div>

	        <div class="form-group col-lg-3">
		        <label for="Descrizione">Descrizione </label>
		        <input type="text" name="Descrizione" class='form-control' >
	        </div>

	        <div class="form-group col-lg-3">
		        <label for="IdEdificio">ID Edificio</label>
		        <input type="text" name="IdEdificio" class='form-control' >
	        </div>
	    </div>
	        <input type="hidden" name="controller" value="Locali">
	        <input type="hidden" name="action" value="find">
	        <input type="submit" value="Find Out" class="btn">
    </form> 
    <p>____________________________________________________________________________________________________________________________________</p>
    <h3>Find Locali <form style="float: right;"><button type='submit' formmethod='post' formaction='index.php?controller=Locali&action=showInput' class='btn btn-success '>Inserisci</button></form></h3>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <th>ID Locale</th>
            <th>Codice Locale</th>
            <th>Descrizione </th>
            <th>ID Edificio</th>
            <th>Modifica</th>
            <th>Cancella</th>

        </thead>
        <tbody>
            <?php
                require_once("controllers/controllerLocali.php");
                controllerLocali::createTable();
            ?>
        </tbody>
    </table>
</div><!-- content -->

<!--
<?php 
		//require_once("controllers/controllerLocali.php");
	    //controllerLocali::showAll();
	?> 
-->