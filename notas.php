<?php
 //Redirecciona a index.php
 header("Location: index.php");
 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nota=$_POST['nota'];
    $archivo='notas.txt';
    //Abre el archivo en modo append (añadir)
    $file = fopen($archivo, 'a');
    fwrite($file, $nota . PHP_EOL);
    //cierra el archivo
    fclose($file);
   
}else{
    echo "La nota no se ha guardado";
}
?>