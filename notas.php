<?php
// Si la solicitud es POST, significa que se está guardando una nueva nota
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = $_POST['nota'];
    $archivo = 'notas.txt';
    $file = fopen($archivo, 'a');
    if (fwrite($file, $nota . PHP_EOL)) {
        echo "Nota guardada exitosamente.";
    } else {
        echo "Error al guardar la nota.";
    }
    fclose($file);
} else { // Si no es POST, significa que se está cargando las notas existentes
    $archivo = 'notas.txt';
    if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
        echo "<pre>$contenido</pre>";
    } else {
        echo "No hay notas guardadas.";
    }
}
?>
