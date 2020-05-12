<?php 
include_once('funcion.php');
?>


<!-- ASIDE -->
<div class="container">
<aside class="info col d-none d-lg-block">
 <span class="badge badge-dark"> <a href="#"><img src="img/shopping-cart (1).png" alt="Comprar" width="30" ></a> Carrito (0)</span></aside>
</div>

<!--TÍTULO -->
<div class="row nov">
  <div class="container-fluid"> 
<h2 class="titulo text-center display-4">Merch</h2>
  </div>
</div>

<!--IMÁGENES -->
<section>
  <div class="container">
    <div class="card-columns">
<?php
$carpeta = "merch";
$dir = opendir($carpeta);

while ($merch = readdir($dir)):
  if($merch != "." && $merch != ".."):
    $imagen = count(glob("$carpeta/$merch/$merch.*")) > 0 ? glob("$carpeta/$merch/$merch.*")[0] : "../img/sin_imagen.png";
?>
    <div class="card">
        <img  src="<?= $imagen ?>" alt="<?= $merch ?>" class="card-img-top">            
    </div>
        <p class="frase"><?= imprimir_detalle("$carpeta/$merch/nombre.txt","nombre"); ?></p>
<?php
endif;
endwhile;
?>
    </div>
 </div>
</section>

