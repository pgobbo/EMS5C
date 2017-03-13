<!DOCTYPE html>
<html>
    <head> 
        <title>Aggiungi prodotto</title>
 
    </head>
    <body>
        <h1>Aggiungi prodotto</h1>
        <form method="get" action="index.php">
             <input type="hidden" name="idIstituto" id="idIstituto" value="">
            <br><br>
            <label for="codice">Codice:</label> <input type="text" name="codice" id="codice" value=""> 
            <br><br>
            <label for="nome">Nome:</label>  <input type="text" name="nome" id="nome" value=""> 
            <input type="hidden" name="controller" value="Istituto">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="inserisci" value="add"/>
        </form>
    </body>
</html>
