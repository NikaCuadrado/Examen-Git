<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2, h3 {
            color: #333;
            text-align: center;
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

        #mensaje {
            text-align: center;
            margin-bottom: 10px;
        }

        #notasGuardadas {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
    <script>
    $(document).ready(function(){
        $('#notaForm').submit(function(e){
            e.preventDefault(); // Evita el envío del formulario por defecto
            var nota = $('#nota').val(); // Obtiene el valor de la nota
            $.ajax({
                type: 'POST',
                url: 'notas.php', // El archivo PHP que manejará la solicitud AJAX
                data: {nota: nota}, // Los datos que se enviarán al servidor
                success: function(response){
                    $('#nota').val(''); // Limpia el campo de nota después de enviarla
                    $('#mensaje').html(response); // Muestra el mensaje de respuesta del servidor
                    cargarNotas(); // Vuelve a cargar las notas después de enviar una nueva
                }
            });
        });

        function cargarNotas(){
            $.ajax({
                url: 'notas.php', // El archivo PHP que manejará la carga de notas
                success: function(response){
                    $('#notasGuardadas').html(response); // Muestra las notas guardadas en el div correspondiente
                }
            });
        }

        cargarNotas(); // Cargar las notas al cargar la página por primera vez
    });
    </script>
</head>
<body>
    <div class="container">
        <h2>Aplicación de Notas</h2>
        <form id="notaForm">
            <label for="nota">Ingrese su nota: </label>
            <br>
            <textarea name="nota" id="nota" cols="50" rows="4"></textarea>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <h3>Notas guardadas:</h3>
        <div id="notasGuardadas"></div>
        <div id="mensaje"></div>
    </div>
</body>
</html>
