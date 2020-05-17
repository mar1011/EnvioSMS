<?php
include_once('../funcion.php');
//ini_set("upload_max_filesize","30M");



 
//$_FILES["imagen"]["type"];

//$_FILES["imagen"]["size"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];

//var_dump($_FILES);

//chequear que los datos nombre y descripcion no estén vacíos

if(empty($_POST["nombre"]) || empty($_POST["descripcion"])):
    header("Location:index.php?seccion=0&error=nombre/desc");
    die();
endif;

//chequear que el nombre del archivo, no coincida con el de una carpeta con is_dir
if(is_dir("../planilla/$nombre")):
    header("Location: index.php?seccion=0&error=carga");
    die();
endif;


//creo la carpeta
   mkdir("../planilla/$nombre");


//guardar nombre

$nombre = $_POST["nombre"];
file_put_contents("../planilla/$nombre/nombre.txt",$nombre);

// creamos la descripción
$descripcion = $_POST["descripcion"];
file_put_contents("../planilla/$nombre/descripcion.txt",$descripcion);
//chequear que el tamaño de la imágen sea mayor a cero

if(!empty($_FILES) && ($_FILES["imagen"]["size"] ==0)):
    header("Location:index.php?seccion=0&error=tamaño");
    die();
endif;    

$imagen = $_FILES["imagen"]; 



//abrir la imagen
if($imagen["type"] == "image/jpeg"):
    $formato = "jpg";
    $imagenOriginal = imagecreatefromjpeg($imagen["tmp_name"]);
    
else:    
    header("Location: index.php?seccion=0&error=formato");
    die();
endif;

$nomOriginal = $_POST["nombre"];

$nombre = nombre_limpio($nomOriginal);


chmod("../planilla",777);

 // valores originales
 $anchoOriginal = imagesx($imagenOriginal);
 $altoOriginal = imagesy($imagenOriginal);

 // valores nuevos
 $anchoNuevo = 475;
 $altoNuevo = ($anchoNuevo * $altoOriginal) / $anchoOriginal;
 $altoNuevo = round($altoNuevo);

// crea el lienzo nuevo
$imagenCopia = imagecreatetruecolor($anchoNuevo,$altoNuevo); 


$destino = "../planilla/$nombre/$nombre.$formato";
if($imagen["type"] == "image/jpeg"):
// copiar la imagen original en el lienzo nuevo
$lienzoNuevo = imagecopyresampled($imagenCopia,$imagenOriginal,0,0,0,0,$anchoNuevo,$altoNuevo,$anchoOriginal,$altoOriginal);
$imagenNueva = imagejpeg($imagenCopia,$destino,75);
endif;

// sacamos de memoria la copia que hicimos.
imagedestroy($imagenCopia);

$nombre= ucfirst(strtolower($nombre));

header("Location:index.php?seccion=0&subida=$nomOriginal");

