<?php
/*

Chequear que lleguen los datos por POST (id)
Chequear que esa carpeta exista
Entrar a esa carpeta y borrar todos los archivos
Borras la carpeta

Redireccionas al usuario al listado con un mensajito de que se borro el merch


 */

if(empty($_POST["id"])):
    header("Location:index.php?seccion=1&error=sin_foto");
    die();
endif;

$galeria = $_POST["id"];

if(!is_dir("../galeria/$galeria")):
    header("Location:index.php?seccion=1&error=foto");
    die();
endif;


$carpeta = opendir("../galeria/$galeria");

while($file = readdir($carpeta)){
    if($file != "." && $file != ".."){

        unlink("../galeria/$galeria/$file");
        
    }
}

rmdir("../galeria/$galeria");

header("Location:index.php?seccion=1&ok=planilla_borrada&galeria=$galeria");


