<?php
//llamado al archivo autoload
require 'vendor/autoload.php';

//cargar la clase de phpspreadsheet para manejo de 
use PhpOffice\PhpSpreadsheet\Spreadsheet;

//ruta

$ruta = 'uploads/5eb86c1a4a0ec8.28811001.xlsx';

//recupero la ruta de la URL 
//$ruta=$_GET["ruta"];
//echo $ruta;

//array de datos
$datos = Array();
//contador
$counter = 0;
/** Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($ruta);
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($ruta);


$worksheet = $spreadsheet->getActiveSheet();
// averiguar el maximo de filas
$highestRow = $worksheet->getHighestRow(); // e.g. 10

for ($row = 2; $row <= $highestRow; ++$row) {
    
    $nombre = $worksheet->getCell('A'.$row)->getValue();
    $telefono= $worksheet->getCell('B'.$row)->getValue();
    $banco = $worksheet->getCell('C'.$row)->getValue();

   //array dinámico
   $datos[$counter] = Array(
    "nombre"=>$nombre,
    "telefono"=>$telefono,
    "banco"=>$banco
    );
//aumento el contador
$counter = $counter + 1;
}
    
var_dump($datos);

