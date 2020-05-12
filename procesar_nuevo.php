<?php
/* se crea carpeta de usuario .txt chequear redireccionar al login .txt. usuario   */
include_once("../funciones.php");

if(empty($_POST["email"]) || empty($_POST["password"])):
    header("Location:index.php?page=4&error=datos");
    die();
endif;

// ya tengo el mail y el password del usuario

$email = $_POST["email"];
$password = $_POST["password"];

// tengo que crear una carpeta por usuario con un dato unico (email)

if(is_dir("usuarios/$email")):
    header("Location:index.php?page=4&error=email_existe");
    die();
endif;


// Aca ya me asegure que el usuario no este creado (mail)
// creamos la carpeta
chmod("usuarios",777);

mkdir("usuarios/$email");

// guardamos el email
file_put_contents("usuarios/$email/email.txt",$email);

// guardamos el password
// lo pasamos por la funcion password_hash con la constante PASSWORD_DEFAULT que nos busca el algoritmo más actualizado para usar.
$password = password_hash($password,PASSWORD_DEFAULT);

file_put_contents("usuarios/$email/password.txt",$password);


// guardamos el usuario
if(empty($_POST["usuario"])):
    // generamos el usuario a partir del email
    $usuario = explode("@",$email)[0];
else:

    $usuario = $_POST["usuario"];

endif;

file_put_contents("usuarios/$email/usuario.txt",$usuario);

file_put_contents("usuarios/$email/rol.txt","usuario");


header("Location:index.php?page=5");
die();
