<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
</head>
<body>
    <h2>Aplicación de Notas</h2>
    <form action="notas.php" method="post">
        <label for="nota">Ingrese su nota: </label>
        <br>
        <textarea name="nota" id="nota" cols="50" rows="4"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h3>Notas guardadas:</h3>
    <?php
    //Comprueba si hay un mensaje para mostrar
    $archivo='notas.txt';
    if(file_exists($archivo)){
        $contenido=file_get_contents($archivo);
        echo "<pre>$contenido</pre>";

    }else{
        echo "no hay notas guardadas.";
    }
    
    ?>
</body>
</html>