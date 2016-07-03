<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
        $(document).ready(function() {
    
    $("#formCliente").validate({
        rules:{
            contrasena:{
                required:true,
                rangelength: [6,12]
            },
            correo:{
                required:true,
                email:true
                
            },  
        },
        messages:{
            contrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            },
            correo:{
                required:"Campo obligatorio",
                email:"Formato erróneo"
            }
            
        }
        
        
        });
});
</script>
</br>
           <form method="post" action="checklogin_cliente.php" class="form-horizontal naranjo" id="formCliente">
	           <div class ="center-block espacio col-md-12 col-sm-12">
                   <input type="text" name="correo" placeholder="&#128588; Correo" class="form-control" id="correo"/>
                </div>
                   <div class ="center-block espacio col-md-12 col-sm-12">
                       <input type="password" name="contrasena" placeholder="&#128273; Password" class="form-control" id="contrasena"/>
                   </div>
                    <div class ="center-block espacio col-md-12 col-sm-12">
                     <input type="submit" name="iniciar"value="Iniciar sesion" class="form-control "/>
                        </br>
                    </div>
             </form>
            <div class ="center-block espacio col-md-12 col-sm-12">
                     <a href="registrar_usuario.php">Crear cuenta</a>
                        </br>
                    </div>
        </div>  
        <?php
            if(isset($_POST['iniciar'])){
                $correo=$_POST['correo'];
                $contrasena=$_POST['contrasena'];
                if (($correo == "")|| ($contrasena=="")){
                }else{
                header ("Location: checklogin_cliente.php");
            }
         }
       ?>
