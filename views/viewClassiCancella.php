<!--<p>Confermi l'eliminazione di questo prodotto?</p>
<form action="routes.php" method="post">
	<?php
		//echo "<input type='hidden' name='productCode' value='".$_POST['productCode']."'>";
	?>
	<input type="hidden" name="action" value="cancella">
	<input type="hidden" name="controller" value="CancellaController">
	<input type="submit" value="CANCELLA">
</form>

<form action="routes.php" method="post">
	<input type="hidden" name="action" value="visualizza">
	<input type="hidden" name="controller" value="CercaController">
	<input type="submit" value="ANNULLA">
</form>-->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Attention!</h4>
      </div>
      <div class="modal-body">
        <p>Confermi l'eliminazione? </p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Annulla</button>
        <form action="index.php" method="post">
        	<?php
    				echo "<input type='hidden' name='productCode' value='".$_GET['productCode']."'>";
    			?>
    			<input type="hidden" name="action" value="cancella">
    			<input type="hidden" name="controller" value="Classi">
    			<button type="submit" class="btn btn-primary">Conferma</button>
    		</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
