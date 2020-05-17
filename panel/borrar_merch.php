<?php
/*

Chequear que lleguen los datos por POST (id)
Chequear que esa carpeta exista
Entrar a esa carpeta y borrar todos los archivos
Borras la carpeta

Redireccionas al usuario al listado con un mensajito de que se borro el merch


 */

if(empty($_POST["id"])):
    header("Location:index.php?seccion=0&error=sin_merch");
    die();
endif;

$merch = $_POST["id"];

if(!is_dir("../merch/$merch")):
    header("Location:index.php?seccion=0&error=merch");
    die();
endif;


$carpeta = opendir("../merch/$merch");

while($file = readdir($carpeta)){
    if($file != "." && $file != ".."){

        unlink("../merch/$merch/$file");
        
    }
}

rmdir("../merch/$merch");

header("Location:index.php?seccion=0h&ok=merch_borrado&merch=$merch");



