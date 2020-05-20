
<!--TÍTULO -->
<div class="row nov">
  <div class="container-fluid"> 
<h4 class="titulo text-center display-4">Cargar Planilla</h4>
  </div>
</div>

<div class="container">
<div class="row">

<div class="col-6 offset-3">
<form action="procesar_planilla.php" enctype="multipart/form-data" method="POST" class=" p-3">
<div class="form-group">
  <label class="frase2" for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del mensaje">
</div>

<div class="form-group">
  <label class="frase2" for="descripcion">Descripción</label>
  <textarea type="text" name="descripcion" id="descripcion" class="form-control" aria-describedby="help_descripcion" maxlength="160"></textarea>
  <small id="help_descripcion" class="text-muted">Los campos a llenar deben ir entre |ejemplo| alt+124.</small>
</div>

<div class="form-group">
  <label class="frase2" for="imagen">Foto</label>
  <!-- Si quiero subir mas de un archivo pongo el name como array y el atributo multiple -->
  <input type="file" accept="image/jpeg" class="form-control-file frase2" name="imagen" id="imagen" placeholder="" aria-describedby="help_imagen">
  <small id="help_imagen" class="form-text text-muted">La imágen del mensaje debe ser en formato jpg y pesar menos de 2mb</small>
</div> 

<button type="submit" class="btn btn-primary">Cargar</button>
</form>
</div>
</div>



</div>

