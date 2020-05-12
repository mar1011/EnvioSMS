<?php
//CONFIG
include_once('../config_global.php');
//ARRAYS
include_once('../arrays.php');
//FUNCION
include_once('../funcion.php');

session_start();

if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] != "admin"):
    header("Location:../index.php");
//FALTA ESTO 
    $_SESSION["error"] = "No tenés permisos para acceder al panel";

    die();
endif;

?>

<!doctype html>
<html lang="es">
  <head>
    <title>Sitio Angry Zeta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <!--CSS-->
     <link rel="stylesheet"  href="../css/estilos.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <!-- BODY-->
  <body class="fondo">
      <!-- HEADER -->
   <header>
  <!--NAVBAR-->
     <div class="row">
       <div class="container-fluid">
     
          <nav id="navegador" class="navbar navbar-fixed-top navbar-expand-lg  navbar-dark ">
              
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                       </button>
                       
                   <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                   
                      <ul class="navbar-nav container">
                         
                        <li class="nav-item active"> 
                        <?php
                        foreach($nav_panel as $ind => $boton):
                        ?>
                            <a class=" nav-link" href="<?= $boton["ruta"] ?>"><?= $boton["nombre"] ?></a>
                        <?php
                        endforeach;
                        ?>
                        </li>
                        </ul>
                    </div>  
                </div> 
            </nav>    
        </div>      
    </div>           
</header>    
<!--TÍTULO -->
<div class="row nov">
  <div class="container-fluid"> 
<h2 class="titulo text-center display-4">Panel de Administración</h2>
  </div>
</div>

<?php
if(!empty($_GET["seccion"])){
    $seccion = $_GET["seccion"];
    if($_GET["seccion"]==1){
        include_once("lista_planillas.php");
    }
    if($_GET["seccion"]==3){
        include_once("cargar_planilla.php");
    }
    if( $_GET["seccion"]<0 || $_GET["seccion"] >3){
     include_once("../secciones/error.php"); 
    }

}else{
    include_once("lista_planillas.php");
}
?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>