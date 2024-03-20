<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://via.placeholder.com/1500x1000'); /* URL de la imagen de fondo */
            background-size: cover;
            background-position: center;
        }

        .container {
            width: 80%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2{
            color: #333;
            text-align: center;
        }

        h3{
            text-align: left;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: calc(100% - 22px); /* Ancho ajustado para tener margen de relleno */
            max-width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none; /* Deshabilitar la redimension */
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        pre {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Aplicación de Notas</h2>
        <form action="notas.php" method="post">
            <label for="nota">Ingrese su nota:</label><br>
            <textarea name="nota" id="nota" cols="50" rows="4"></textarea><br>
            <input type="submit" value="Enviar">
        </form>

        <h3>Notas guardadas:</h3>
        <?php
        // Comprueba si hay un mensaje para mostrar
        $archivo = 'notas.txt';
        if (file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            echo "<pre>$contenido</pre>";
        } else {
            echo "No hay notas guardadas.";
        }
        ?>
    </div>
</body>
</html>
