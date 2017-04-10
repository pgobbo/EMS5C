<div><!-- content -->
	
	<form action="index.php?controller=Locali&action=add" method="POST">
		<h1>Inserisci un nuovo Locale</h1>
		Codice:<br>
		<input type="text" name="Codice" placeholder="varchar(10)" required="required">
		<br>
		Descrizione:<br>
		<input type="text" name="Descrizione" placeholder="varchar(100)" required="required" >
		<br>
		ID Edificio:<br>
		<input type="text" name="IdEdificio" placeholder="int(11)" required="required">
		<input type="submit" name="Inserisci">
	</form>
	<br>
	<form action="index.php" method="get">
	    <input type="hidden" name="controller" value="Locali"></input>
	    <input type="hidden" name="action" value="showHome"></input>
	    <input type="submit" value="HOME" class="btn btn-primary">
	</form>
</div><!-- content -->