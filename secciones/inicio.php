
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
                    <input type="file" name="file"> 

                  <div class="form-check">
                      <input class="form-check-input" name="opcion[]" type="radio" value="Deuda" id="planilla1" checked>
                      <label class="form-check-label" for="Deuda">
                       Mensaje de pago de Deuda
                    </label>
                  </div>

                  <div class="form-check">      
                        <input class="form-check-input" name="opcion[]" type="radio" value="Acreditado" id="planilla2"> 
                        <label class="form-check-label" for="Pago">
                        Mensaje de Remate Judicial
                      </label>
                    </div>

                    <button type="submit" name="submit" value= "Result" >Enviar SMS</button>
                    </form>
         

               </div>       
    </div>
               
  
      
