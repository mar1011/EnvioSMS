
 <!--TÍTULO-->
 <div class="row">
   <div class="container-fluid">
 <h1 class="text-center nov display-4">Registro</h1>
 </div>
</div>

<div class="container">

<?php
if(!empty($_GET["error"])):
    $error = $_GET["error"];
    
    if($error == "datos"):
        $mensaje = "Los campos email y password son obligatorios.";
    elseif($error == "email_existe"):
        $mensaje = "Ya hay un usuario asociado al mail ingresado.";
    else:
        $mensaje = "";
    endif;
    
?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Error: </strong> <?= $mensaje ?>.
    </div>

<?php
endif;

?>
</div>
<div class="container">
<div class="row">

<div  class="col-6 offset-3">
<form action="procesar_nuevo.php" method="POST" class="formulario">
<div class="form-group">

    <label class="etiqueta frase2" for="nombre">Usuario:</label>
    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese un usuario">
    </div>
<div class="form-group">
    <span class="etiqueta frase2">Mail:</span> <br>
    <input type="email" name="email" placeholder="ejemplo@ejemplo.com" class="form-control"> <br>
    </div>
 <div class="form-group">
    <label class="etiqueta frase2">Password</label>
    <input type="password" class="form-control" placeholder="**********" require name="password"/>
  </div>          
    <br>
    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>
        </div>
    </div>
</div>