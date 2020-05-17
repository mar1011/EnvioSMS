<?php
/*

Chequear que lleguen los datos por POST (id)
Chequear que esa carpeta exista
Entrar a esa carpeta y borrar todos los archivos
Borras la carpeta

Redireccionas al usuario al listado con un mensajito de que se borro el planilla


 */

if(empty($_POST["id"])):
    header("Location:index.php?seccion=0&error=sin_planilla");
    die();
endif;

$planilla = $_POST["id"];

if(!is_dir("../planilla/$planilla")):
    header("Location:index.php?seccion=0&error=planilla");
    die();
endif;


$carpeta = opendir("../planilla/$planilla");

while($file = readdir($carpeta)){
    if($file != "." && $file != ".."){

        unlink("../planilla/$planilla/$file");
        
    }
}

rmdir("../planilla/$planilla");

header("Location:index.php?seccion=0h&ok=planilla_borrado&planilla=$planilla");



