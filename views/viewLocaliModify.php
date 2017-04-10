 <h1>Modifica Locale : <?php echo $_POST['IdLocale'];?></h1>
<div class="content">
        <form action='index.php' method="POST">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="IdLocale">Id Locale </label>
            	       <input type="text" name="IdLocale" value=<?php echo "'".$_POST['IdLocale']."'";?> placeholder="int(11)" readonly class='form-control'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="Codice">Codice </label>
                        <input type="text" name="Codice" value=<?php echo "'".$_POST['Codice']."'";?> placeholder="varchar(10)" class='form-control'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="Descrizione">Descrizione </label>
                    	<input type="text" name="Descrizione" value=<?php echo "'".$_POST['Descrizione']."'";?> placeholder="varchar(100)" class='form-control'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="IdEdificio">ID Edificio </label>
                        <input type="text" name="IdEdificio" value=<?php echo "'".$_POST['IdEdificio']."'";?> readonly class='form-control'>
                </div>
            </div>

            <div style="float: left;">
                <input type="hidden" name="controller" value="Locali">
                <input type="hidden" name="action" value="modify">
                <br>
                <input type="submit" value="Modify" class="btn btn-success">
            </div>
            </form>
         <br>
            <form action="index.php" method="POST" >
                <input type="hidden" name="controller" value="Locali">
                <input type="hidden" name="action" value="showHome">
                <input type="submit" value="HOME" class="btn btn-primary" style="margin-left: 6px;">
            </form>

</div><!-- content -->
    
   
    
    
