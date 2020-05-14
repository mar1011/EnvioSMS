<?php
include_once("secciones/prueba.php");

if (isset($_POST['submit'])){
    //El archivo que se cargó
$file = $_FILES['file'];

// Utilizando la variable globar $_FILE podemos averiguar varios datos del archivo
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['Type'];

//con el método explode guardamos que extensión tiene el archivo

$fileExt = explode('.', $fileName);
//lo pasamos a minúscula con el método strtolower
$fileActualExt = strtolower(end($fileExt));

//creamos un array con las extensiones permitidas (excel)
$allowed = array('xlsx', 'xlsm', 'xltx', 'xls');

// cadena de if de validaciones
if (in_array($fileActualExt, $allowed)){

    if ($fileError === 0){
        if ($fileSize < 1000000){
            //renombrar el archivo que se guardará en la carpeta con un ID único
            $fileNewName = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'uploads/'. $fileNewName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $ruta = $fileDestination;
            
            header("Location: index.php?page=1&status=uploadsuccess&ruta=$ruta");

        }else{
            header("Location: index.php?error?error=C");
            echo "El archivo excede el tamaño permitido!";
        }
    }else{
        header("Location: index.php?error?error=B");
        echo "Hubo un error, cargando el archivo!";
    }

}else{
    header("Location: index.php?error?error=B");
    echo "Archivo no permitido!";
}

}

?>