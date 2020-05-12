<?php
include_once('config_global.php');

function verificar($nombre,$apellido,$mail){

    if(empty($nombre) || empty($apellido) || empty($mail) ){
        $error=true;

}else{
    $error=false;
}
return($error);
}


function imprimir_detalle($ruta,$tipo){
    return file_exists($ruta) ? limpiar_string(file_get_contents($ruta)) : "Sin $tipo";
}


function limpiar_string($str){
    return nl2br(htmlentities(trim($str)));
}

function nombre_limpio($carpeta){
    $nombre = trim($carpeta);
    $nombre = strtolower($nombre);

    $nombre = str_replace(" ","_",$nombre);

    return $nombre;
}