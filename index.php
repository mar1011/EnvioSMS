<?php
session_start();
//CONFIG
include_once('config_global.php');
//ARRAYS
include_once('arrays.php');
//FUNCION
include_once('funcion.php');

?>
<!doctype html>

<html lang="es">
  <head>
    <title>Sitio Envio SMS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <!--CSS-->
     <link rel="stylesheet"  href="css/estilos.css">
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
                         foreach($nav as $ind => $boton):
                        ?>
                            <a class=" nav-link" href="<?= $boton["ruta"] ?>"><?= $boton["nombre"] ?></a>    
                        <?php
                        endforeach;
                        ?>
                        </ul>
             <ul class="navbar-nav mr-0">

                <?php
                    if(isset($_SESSION["usuario"])):
                ?>                    
                        <li class="nav-item">
                            <span class="nav-link"><?= $_SESSION["usuario"]["usuario"]; ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href="logout.php">Logout</a>
                        </li>
                <?php
                    else:
                ?>
                
                 <li class="nav-item <?= !empty($_GET["page"]) && $_GET["page"] == "login" ? "active" : ""; ?>">
                            <a class="nav-link"href="index.php?page=4">Registrarse</a>
                        </li>
                        <li class="nav-item <?= !empty($_GET["page"]) && $_GET["page"] == "registro" ? "active" : ""; ?>">
                            <a class="nav-link"href="index.php?page=5">Login</a>
                        </li>
                <?php
                    endif;
                ?> 
            </ul>      
                    </div>
                    
                </div> 
            </nav>    
            <!-- incluir los modulos -->
    <?php
        if(isset($_SESSION["login"])):
        
        ?>
<div class="container">
<div class=" mt-5 alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <p> Hola! te logueaste correctamente: <b><?= $_SESSION["usuario"]["usuario"] ?></b> </p>
            </div>
</div>
       
        <?php
        endif;

        // tengo que borrar el indice "login" de la sesion
        unset($_SESSION["login"]);
    
?>
 <?php
        if(isset($_SESSION["error"])):
        
        ?>
<div class="container">
<div class=" mt-5 alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <p><b><?= $_SESSION["error"] ?></b> </p>
            </div>
            <?php
        endif;
?>

<?php

 

if(isset($_GET["error"]) == 'A'):
 ?>

<div class="">
<div class=" mt-5 alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <p><b>Archivo no permitido!</b> </p>
            </div>
 
<?php
    endif; 
    if(isset($_GET["error"])=='B'):
 ?>   
 <div class="">
 <div class=" mt-5 alert alert-danger alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     <span class="sr-only">Close</span>
                 </button>
                 <p><b>Archivo no permitido!</b> </p>
             </div>
<?php
  endif; 
  if(isset($_GET["error"])=='C'):
?>
<div class="">
<div class=" mt-5 alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <p><b>Archivo no permitido!</b> </p>
            </div>
<?php
endif;
?>
</div>
        </div>      
    </div>           
</header>              
<?php

if(!empty($_GET["page"])){
    if($_GET["page"]==0){
        include_once("secciones/inicio.php");
    }if($_GET["page"]==1){
        include_once("secciones/prueba.php");
    }
    if($_GET["page"]==2){
        include_once("secciones/planilla.php");
    }
    if($_GET["page"]==4){
        include_once("secciones/registro.php");
    }
    if($_GET["page"]==5){
        include_once("secciones/login.php");
    }
    if($_GET["page"]>=7){
        include_once("secciones/error.php");
    }
    if( $_GET["page"]<0){
     include_once("secciones/error.php"); 
    }

}else{
    include_once("secciones/inicio.php");
}
?>


<footer>
        <div class="row">
          <div class="container-fluid">
             <nav id="footer" class="navbar fixed-bottom col-lg-12 ">
                  <div class="container">
                      <div class="col-lg-6 col-md-6 col-sm-12 d-none d-sm-block">
                        <p>©2020 EnvioSMS - Todos los derechos reservados</p>
                      </div>
                      <div id="redes" class="col-lg-6 col-md-6 col-sm-12">
                         <ul class="float-right">
            <?php
            foreach($footer as $ind => $icono):
            ?>
         <li><a href="<?= $icono["href"]; ?>" target="<?= $icono["target"]; ?>"><img src="<?= $icono["img"]; ?>" alt="<?=$icono["alt"]; ?>" width="<?= $icono["width"]; ?>" title="<?=$icono["title"]; ?>"></a>
        </li>
            <?php       
            endforeach;
            ?>
                         </ul>
                        </div>
                       </div>
                    </div>
                   </div> 
               </nav>    
           </div>      
       </div>           
   </footer>     


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>