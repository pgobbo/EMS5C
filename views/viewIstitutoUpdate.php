
    <html>
    <head> 
        <title>Modifica Istituto</title>
 
    </head>
    <body>
        <h1>Modifica Istituto</h1>
        <form method="get" action="index.php">
            <label for="idIstituto">Id Istituto:</label>
            <?php
                echo "<input type='text' readonly='readonly' name='idIstituto' id='idIstituto' value='".$_GET['idIstituto']."'>";
            ?>
            <br><br>
            <label for="codice">Codice:</label>
            <?php
                echo "<input type='text' name='codice' id='codice' value='".$_GET['codice']."'>";
            ?>
            <br><br>
            <label for="nome">Nome:</label>
            <?php
                echo "<input type='text' name='nome' id='nome' value='".$_GET['nome']."'>";
            ?>
            <input type="hidden" name="controller" value="Istituto">
            <input type="hidden" name="action" value="update">
            <input type="submit" name="inserisci" value="modifica">
        </form>
    </body>
</html>
