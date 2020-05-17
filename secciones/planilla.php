<?php 
include_once('funcion.php');
?>

<!--TÍTULO -->
<div class="row nov">
  <div class="container-fluid"> 
<h2 class="titulo text-center display-4">Planillas Disponibles</h2>
  </div>
</div>
<div class="col-12">
  <table class="table mt-5 nov">

  <thead>

  <tr>
  <th>Nombre</th>
  <th>Descripción</th>
  <th>Imagen</th>

  </tr>

  </thead>
  <?php
    $carpeta = "planilla";
    $dir = opendir($carpeta);

    while ($planilla = readdir($dir)):
      if($planilla != "." && $planilla != ".."):
        $imagen = count(glob("$carpeta/$planilla/$planilla.*")) > 0 ? glob("$carpeta/$planilla/$planilla.*")[0] : "../img/sin_imagen.png";
    
  ?>

    <tbody>
  
  <tr>
  <td><?= imprimir_detalle("$carpeta/$planilla/nombre.txt","nombre"); ?></td>
  <td><?= imprimir_detalle("$carpeta/$planilla/descripcion.txt","descripcion"); ?></td>
  <td> <img  src="<?= $imagen ?>" alt="<?= $planilla ?>" width="150"></td>
  <td><form action="borrar_planilla.php" method="post">
    <input type="hidden" value="<?= $planilla ?>" name="id">
 
  </form>
  </td>
  </tr>

    <?php
      endif;
      endwhile;
    ?>
    </tbody>
  </table>
      </div>
    </div>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>