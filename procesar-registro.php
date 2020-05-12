<?php
include_once('funcion.php');
include_once('arrays.php');


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['correo'];
$mensaje = trim($_POST['mensaje']);

if(isset($_POST['opcion']) && in_array('Europa', $_POST['opcion']))
{
    $checkbox = 'Deseo recibir novedades de la Gira por Europa';
}
if(isset($_POST['opcion']) && in_array('Buenos Aires', $_POST['opcion']))
{
    $checkbox2 ='Deseo recibir novedades de fechas en Buenos Aires';
}
if(isset($_POST['opcion']) && in_array('Merch', $_POST['opcion']))
{
    $checkbox3  = 'Deseo recibir novedades de merchandising';
}
if(isset($_POST['opcion']) && in_array('Newsletter', $_POST['opcion']))
{
    $checkbox4 = 'Deseo suscribirme al  Newsletter de Angry Zeta';
}
//var_dump($_POST);



// datos obligatorios
if(verificar($nombre,$apellido,$mail)==true ){
    $error = "si";
    header("Location:index.php?page=7&error=$error");
    die();
}else{

     header("Location:index.php?page=6&nombre=$nombre&apellido=$apellido&mail=$mail&mensaje=$mensaje&opcion1=$checkbox&opcion2=$checkbox2&opcion3=$checkbox3&opcion4=$checkbox4");
    die();
}

?>