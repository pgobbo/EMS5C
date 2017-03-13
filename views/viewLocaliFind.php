<!DOCTYPE html>
<html>
<body>
<?php
include("controllers/controllerLocali.php")
?>

<form action="index.php" method="get">  
    <h1>Find Locale</h1>
    ID Locale :<br>
    <input type="text" name="IdLocale" value="">
    <br>
    Code :<br>
    <input type="text" name="Codice" value="">
    <br>
    Description :<br>
    <input type="text" name="Descrizione">
    <br>
    IdEdificio :<br>
    <input type="text" name="IdEdificio">

    <input type="hidden" name="controller" value="controllerLocali">
    <input type="hidden" name="action" value="find">
    <input type="submit" value="Find Out" class="btn">
</form> 
<br>
<form action="index.php" method="get">
    <input type="hidden" name="controller" value="controllerLocali">
    <input type="hidden" name="action" value="showHome">
    <input type="submit" value="HOME" class="btn btn-primary">
</form>
<p>___________________________________________________________________________________________________________</p>
<h3>Find Locali</h3>
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
            require_once("controllers/ControllerLocaliFind.php");
            controllerLocaliFind::createTable();
        ?>
    </tbody>
</table>

</body>
</html>