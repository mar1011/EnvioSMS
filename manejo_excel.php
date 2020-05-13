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

//$ruta=isset($_GET['file']);

/** Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($ruta);
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($ruta);

$sheet = $spreadsheet->getActiveSheet();

//$sheet = $spreadsheet->getSheet(0);

$sheet = $spreadsheet->getSheetByName("Hoja1");


echo '<table border="1" cellpadding="8" style="margin-left:250px;">';

foreach ($sheet->getRowIterator() as $row){
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    echo '<tr>';
    foreach ($cellIterator as $cell){
        if(!is_null($cell)){
            //el dato de la celda
            $value = $cell->getCalculatedValue();
            echo '<td>' . $value .'</td>';
        }
    }

    echo '</tr>';
}
echo '</table>';

