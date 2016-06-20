<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
        $(document).ready(function() {
    
    $("#formMueblista").validate({
        rules:{
            rut:{
                required:true,
                rangelength: [7,9]
            },
            contrasena:{
                required:true,
                rangelength: [6,12]
                
            },  
        },
        messages:{
            contrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            },
            rut:{
                required:"Campo obligatorio",
            }
            
        }
        
        
        });
});
</script>
</br>
                      <form method="post" action="checklogin_mueblista.php" class="form-horizontal" id="formMueblista">
	           <div class ="center-block espacio col-md-12 col-sm-12">
                   <input type="text" name="rut" placeholder="&#128588;Rut" class="form-control" id="rut"/>
                </div>
                   <div class ="center-block espacio col-md-12 col-sm-12">
                       <input type="password" name="contrasena" placeholder="&#128273; Password" class="form-control" id="contrasena"/>
                   </div>
                    <div class ="center-block espacio col-md-12 col-sm-12">
                     <input type="submit" name="iniciar"value="Iniciar sesion" class="form-control text-center"/>
                        </br>
                    </div>
             </form>
        </div>     
        <?php
            if(isset($_POST['iniciar'])){
                $rut=$_POST['rut'];
                $contrasena=$_POST['contrasena'];
                if (($rut == "")|| ($contrasena=="")){
                }else{
                header ("Location: checklogin_mueblista.php");
            }
         }
       ?>
</body>
</html>
