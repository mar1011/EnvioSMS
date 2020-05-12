<?php
/*chequear si el usuario existe, chequear datos que puso, iniciar sesion $_session usuario email, usuario y rol 
*/
// SIEMPRE es recomendable iniciar sesion al principio del documento.
session_start();

include_once("../funciones.php");


if(empty($_POST["email"]) || empty($_POST["password"])):
    header("Location:index.php?page=5&error=datos");
    die();
endif;

// ya tengo el mail y el password del usuario

$email = $_POST["email"];
$password = $_POST["password"];

// tengo que chequear que el email exista

if(!is_dir("usuarios/$email")):
    header("Location:index.php?page=5&error=no_valido");
    die();
endif;

// traer el password que corresponde a ese email

$passwordGuardado = file_get_contents("usuarios/$email/password.txt");


// password_verify chequea si el password que ingresa el usuario coincide con el hash que tengo guardado.

if(!password_verify($password,$passwordGuardado)):
    header("Location:index.php?page=5&error=password");
    die();
endif;

// el email y el password coinciden
// loguear al usuario

/*

    Asi como tenemos un $_GET, $_POST, $_FILES, $_SERVER
    vamos a tener un $_SESSION -> array

    Esta en todos los archivos. 
    Siempre que yo le agregue contenido se va a guardar como un array comun saaaaaaaaaaaaaaaaaaaaaaalvo que le indique a la web que todas mis paginas estan usando sesiones.
    Para compartir datos con el $_SESSION tenemos que iniciar sesion en todos los archivos.
*/

// Iniciar sesion
$_SESSION["usuario"] = [
    "email" => $email,
    "usuario" => file_get_contents("usuarios/$email/usuario.txt"),
    "rol" => file_get_contents("usuarios/$email/rol.txt"),
];


$_SESSION["login"] = true;

if($_SESSION["usuario"]["rol"] == "admin"):
    header("Location:panel/index.php"); 
    die();
endif;

header("Location:index.php?page=0");