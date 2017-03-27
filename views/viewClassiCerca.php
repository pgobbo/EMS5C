<form action="index.php" method="post" class="form-inline">
	<label>Codice: </label>
	<input type="text" class="form-control" name="Codice" value="">
	<label>Nome: </label>
	<input type="text" class="form-control" name="Nome" value="">
	
	<input type="hidden" name="action" value="cerca">
	<input type="hidden" name="controller" value="Classi">
	<input type="submit" class="btn btn-primary" value="Cerca">
</form>