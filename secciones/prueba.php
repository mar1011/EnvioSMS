<?php
//llamado al archivo autoload
require 'vendor/autoload.php';

//cargar la clase de phpspreadsheet para manejo de 
use PhpOffice\PhpSpreadsheet\Spreadsheet;

//Para Crear un archivo Excel y ponerle datos
/*
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx'); */


//ruta
$ruta = 'uploads/5eb86c1a4a0ec8.28811001.xlsx';

//$ruta=isset($_GET['arch']);

//array de datos
$datos = Array();

/** Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($ruta);
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($ruta);


$worksheet = $spreadsheet->getActiveSheet();
// averiguar el maximo de filas
$highestRow = $worksheet->getHighestRow(); // e.g. 10



echo '<table>' . "\n";
for ($row = 2; $row <= $highestRow; ++$row) {
    
    $nombre = $worksheet->getCell('A'.$row)->getValue();
    $telefono= $worksheet->getCell('B'.$row)->getValue();
    $banco = $worksheet->getCell('C'.$row)->getValue();

    echo '<tr>' . PHP_EOL;
    echo '<td>'.$nombre.'</td>';
    echo '<td>'.$telefono.'</td>';
    echo '<td>'.$banco.'</td>';
    echo '</tr>' . PHP_EOL;
   //array dinámico
   $datos[$row] = Array(
    "nombre"=>$nombre,
    "telefono"=>$telefono,
    "banco"=>$banco
);

}
echo '</table>' . PHP_EOL;
    
print_r($datos);

?>

