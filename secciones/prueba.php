<?php
//llamado al archivo autoload
require 'vendor/autoload.php';


//cargar la clase de phpspreadsheet para manejo de 
use PhpOffice\PhpSpreadsheet\Spreadsheet;

//$ruta=$_GET['ruta'];

$radiobuton=$_GET['opcion'];
//ruta


$ruta = 'uploads/5eb86c1a4a0ec8.28811001.xlsx';


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

    //json con los datos del array
/*if(file_exists("datos.json")){
    $contenido = file_get_contents("datos.json");
    $data = json_decode($contenido);
    array_push($data, $datos);
    file_put_contents("datos.json",json_encode($data));

}else{
        $data=Array();
        array_push($data,$datos);
        $f=fopen("datos.json","w");
        fwrite($f,json_encode($datos));
        fclose($f);
}*/
//aumento el contador
$counter = $counter + 1;
}

var_dump($datos);

if($radiobuton == 'deuda'){

   $leer =fopen('merch\deuda\descripcion.txt','r');
while(!feof($leer)){
    $linea = fgets($leer); 

}
//fclose($leer);

}else if($radiobuton == 'evite'){

    $leer =fopen($radiobuton.'/descripcion.txt','r');
    while(!feof($leer)){
        $linea = fgets($leer);
    
    }
    fclose($leer);
}

