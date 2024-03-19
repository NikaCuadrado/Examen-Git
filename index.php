<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</body>
</html>
