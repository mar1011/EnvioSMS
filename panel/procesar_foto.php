<?php
include_once('../funcion.php');
//ini_set("upload_max_filesize","30M");



 
//$_FILES["imagen"]["type"];

//$_FILES["imagen"]["size"];
$galeria = $_POST["id"];
$descripcion = $_POST["descripcion"];

//var_dump($_FILES);

//chequear que los datos nombre y descripcion no estén vacíos

if(empty($_POST["descripcion"]) || empty($_POST["id"]) ):
    header("Location:index.php?seccion=1&error=descripcion");
    die();
endif;

//chequear que el nombre del archivo, no coincida con el de una carpeta con is_dir
if(is_dir("../galeria/$galeria")):
    header("Location: index.php?seccion=1&error=carga");
    die();
endif;


//creo la carpeta
   mkdir("../galeria/$galeria");




// creamos la descripción
$descripcion = $_POST["descripcion"];
file_put_contents("../galeria/$galeria/descripcion.txt",$descripcion);
//chequear que el tamaño de la imágen sea mayor a cero

if(!empty($_FILES) && ($_FILES["imagen"]["size"] ==0)):
    header("Location:index.php?seccion=1&error=tamaño");
    die();
endif;    

$imagen = $_FILES["imagen"]; 



//abrir la imagen
if($imagen["type"] == "image/jpeg"):
    $formato = "jpg";
    $imagenOriginal = imagecreatefromjpeg($imagen["tmp_name"]);
    
else:    
    header("Location: index.php?seccion=1&error=formato");
    die();
endif;

$nomOriginal = $_POST["id"];

$nombre = nombre_limpio($nomOriginal);


chmod("../galeria",777);

 // valores originales
 $anchoOriginal = imagesx($imagenOriginal);
 $altoOriginal = imagesy($imagenOriginal);

 // valores nuevos
 $anchoNuevo = 475;
 $altoNuevo = ($anchoNuevo * $altoOriginal) / $anchoOriginal;
 $altoNuevo = round($altoNuevo);

// crea el lienzo nuevo
$imagenCopia = imagecreatetruecolor($anchoNuevo,$altoNuevo); 


$destino = "../galeria/$galeria/$galeria.$formato";
if($imagen["type"] == "image/jpeg"):
// copiar la imagen original en el lienzo nuevo
$lienzoNuevo = imagecopyresampled($imagenCopia,$imagenOriginal,0,0,0,0,$anchoNuevo,$altoNuevo,$anchoOriginal,$altoOriginal);
$imagenNueva = imagejpeg($imagenCopia,$destino,75);
endif;

// sacamos de memoria la copia que hicimos.
imagedestroy($imagenCopia);

$nombre= ucfirst(strtolower($nombre));

header("Location:index.php?seccion=1&subida=$nomOriginal");

