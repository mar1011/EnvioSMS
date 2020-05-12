<?php
session_start();

// borrar los datos de la sesion
session_destroy();


// redirigir
header("Location:index.php");