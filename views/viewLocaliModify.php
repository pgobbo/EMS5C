<div><!-- content -->
    <?php
    include("controllers/controllerLocali.php")
    ?>
    
    <form action='index.php' method="POST">
        <h1>Modifica Locale : <?php echo $_POST['IdLocale'];?></h1>
        Id Locale:<br>
        	<input type="text" name="IdLocale" value=<?php echo "'".$_POST['IdLocale']."'";?> placeholder="int(11)" readonly><br>
        Codice:<br>
            <input type="text" name="Codice" value=<?php echo "'".$_POST['Codice']."'";?> placeholder="varchar(10)"><br>
        Descrizione:<br>
        	<input type="text" name="Descrizione" value=<?php echo "'".$_POST['Descrizione']."'";?> placeholder="varchar(100)"><br>
        ID Edificio: <br>
            <input type="text" name="IdEdificio" value=<?php echo "'".$_POST['IdEdificio']."'";?> readonly><br>

            <div style="float: left;">
                <input type="hidden" name="controller" value="controllerLocali">
                <input type="hidden" name="action" value="modify">
                <br>
                <input type="submit" value="Modify" class="btn">
            </div>
            <br>
    </form>
    <div style="float: left;">
        
        <form action="index.php" method="POST">
            <input type="hidden" name="IdLocale" value=<?php echo '"'.$_POST['IdLocale'].'"';?>>
            <input type="hidden" name="controller" value="controllerLocali">
            <input type="hidden" name="action" value="delete">
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
    <div style="float: left;">

    <form action="index.php" method="GET">
        <input type="hidden" name="controller" value="controllerLocali">
        <input type="hidden" name="action" value="showHome">
        <input type="submit" value="HOME" class="btn btn-primary">
    </form>
    </div>
</div><!-- content -->