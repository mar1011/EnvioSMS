
<!--INFO-->  
        <div class="container-fluid nov">
            
               <div class= "text-center" >
                   <!--BIENVENIDA-->
                 <h1>¡Bienvenido a nuestro sitio de envío SMS!</h1>
                 <img src="img/sms.png" alt="mensaje" height="100" width="100">
                 <p><span>
                 Seleccione el archivo de Excel que desea cargar 
                 </span></p>

                  <!--FORMULARIO-->
                  <form action="upload.php" method="POST" enctype="multipart/form-data">
          
                    <input type="file" name="file" class=""> 
                   
                    <div class="row-center">  
                      <small class="text-muted">Seleccione el mensaje</small>    
                        <select id="opcion" name="opcion">

                          <?php
                            if(isset($_POST["mensajes"]))
                            {
                                $mensajes = $_POST["mensajes"];
                            }
                          for ($i=0; $i < count($mensajes) ; $i++):
                            $nombre = imprimir_detalle("planilla/$mensajes[$i]/nombre.txt","");
                          ?>
                            <option value="<?php echo($mensajes[$i])?>"><?php echo($nombre)?></option>

                          <?php
                          endfor;
                          ?>
                          
                        </select>
                    </div>
                      <br>
                    <button type="submit" name="submit" value= "Result" >Enviar SMS</button>
                    </form>
         

               </div>       
    </div>
               
  
      
