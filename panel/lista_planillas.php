
  <!-- TABLA -->
<div class="container">
  <div class="row mt-3">
    <div class="col-12">
    <?php
        if(!empty($_GET["error"])):
            $error = $_GET["error"];
            $color="danger";

            if($error == "descripcion"):
                  $mensaje = "No puede quedar vacío el campo <strong>descripción</strong>";    
            elseif($error == "formato"):
                 $mensaje = "El formato de la imagen debe ser JPG";
            elseif($error == "tamaño"):
                  $mensaje = "Hubo un problema con subir la foto";
            else:
                $mensaje = "ERROR";
            endif;
        endif;

        if(!empty($_GET["ok"])):
          $ok = $_GET["ok"];
          $color = "success";

            if($ok == "foto_borrada"):
                $m = !empty($_GET["galeria"]) ? $_GET["galeria"] : "";
                $mensaje = "Se eliminó correctamente la foto: ". ucfirst($m);
            endif;
        endif;

    if(isset($mensaje)):
    ?>

<div class="alert alert-<?=$color; ?> alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        <span class="sr-only">Close</span>
    </button>
    <p><?= $mensaje; ?></p>
  </div>
</div>

      <?php
      endif;
      if(!empty($_GET["subida"])):
        $color="success";
      ?>

<div class="alert alert-<?= $color; ?> alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Exito!</strong> Se subio la planilla: <?= $_GET["subida"] ?>.
</div>
      <?php
      endif;
      ?>

<div class="col-12">
  <table class="table mt-5 nov">

  <thead>

  <tr>
  <th>Descripción</th>
  <th>Imagen</th>
  <th>Acciones</th>
  </tr>

  </thead>
  <?php
    $carpeta = "../galeria";
    $dir = opendir($carpeta);

    while ($galeria = readdir($dir)):
      if($galeria != "." && $galeria != ".."):
        $foto = count(glob("$carpeta/$galeria/$galeria.*")) > 0 ? glob("$carpeta/$galeria/$galeria.*")[0] : "../img/sin_imagen.png";
    
  ?>

    <tbody>
  
  <tr>
  <td><?= imprimir_detalle("$carpeta/$galeria/descripcion.txt","descripcion"); ?></td>
  <td> <img  src="<?= $foto ?>" alt="<?= imprimir_detalle("$carpeta/$galeria/descripcion.txt","descripcion"); ?>" width="200"></td>
  <td><form action="borrar_foto.php" method="post">
    <input type="hidden" value="<?= $galeria ?>" name="id">
    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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