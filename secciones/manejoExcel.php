<?php
    //llamado al archivo autoload
    require 'vendor/autoload.php';
    session_start();

    //cargar la clase de phpspreadsheet para manejo de 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    if(isset($_GET['opcion']) && isset($_GET['ruta']))
    {
        $radiobuton = $_GET['opcion'];
        $ruta = $_GET['ruta'];
    }


    //ruta



if(isset($ruta)):
    //array de datos
    $datos = Array();
    //contador
    $counter = 0;
    /** Load $inputFileName to a Spreadsheet Object  **/
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("$ruta");
    $reader = new  \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($ruta);


    $worksheet = $spreadsheet->getActiveSheet();
    // averiguar el maximo de filas
    $highestRow = $worksheet->getHighestRow(); // e.g. 10

    for ($row = 2; $row <= $highestRow; ++$row) 
    {
        
        $nombre = $worksheet->getCell('A'.$row)->getValue();
        $telefono= $worksheet->getCell('B'.$row)->getValue();
        $banco = $worksheet->getCell('C'.$row)->getValue();

    //array dinámico
    $telefonos[$counter] = $telefono;

    //aumento el contador
    

    $string = imprimir_detalle("planilla/$radiobuton/descripcion.txt","descripcion"); 

    $string = str_replace('|nombre|', $nombre, $string);
    $string = str_replace('|banco|', $banco, $string); 
    $sting = strip_tags($string,'<br>');
    $mensaje[$counter] = $string;
    $counter = $counter + 1;
    
    }
    //$queryM = http_build_query(array('mensaje' => $mensaje));
    //$queryD = http_build_query(array('datos' => $datos));
    $_SESSION["mensajes"] = $mensaje;
    $_SESSION["telefonos"] = $telefonos;
   header("Location:procesarEnvio.php?cuenta=$counter");
endif;


