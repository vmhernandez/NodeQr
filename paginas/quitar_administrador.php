<?php include "funciones.php"; 
?>
<link rel="stylesheet" href="../estiloValidacion.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$(document).ready(function() {
    
    $("#validar").validate({
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
    
function confirmar()
{
	if(confirm('¿Estas seguro desea agregar al administrador'))
		return true;
	else
		return false;
}
    
</script>
<div class="col-md-8 col-sm-8 espacio principal">
            
        <form action="<?php echo $pagina == 'agregar_sticker' ?>" method="post" onsubmit="return confirmar()" id="validar">
                
            <label class="col-sm-12 col-md-12 control-label espacio">Ingresar el correo del administrador que desea quitar</label>    
                
            <label class="col-sm-4 col-md-3 control-label espacio">Correo </label>    
            
            <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="correo" type="email">
            </div>
                   
            <label class="col-sm-12 col-md-12 control-label espacio">Para confirmar la baja del administrador, por favor ingresar su contraseña y luego dar click en guardar</label>
            
            <div class="col-sm-12 col-md-12">
            <input class="form-control espacio" name="contrasena" type="password"></div>
            
            <div class="col-sm-12 col-md-12">
            <?php clave_administrador($namex)?>
            </div>

               
            <div class="col-sm-12 col-md-12">
            <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Enviar"/>
            </div>
            
            </form>
        </div>

         <?php
            if(isset($_POST['guardar'])){
                $correo=$_POST['correo'];
                $contrasena=$_POST['contrasena'];
                $contrasena3=$_POST['contrasena3'];
               

                if (($correo == "") ||($contrasena != $contrasena3) ||(strlen($correo)>30)){
                     echo'<script language="javascript">
                     alert("Contraseña incorrecta");
                     </script>'; 
                }else{
                    $resultado = eliminar_administrador($correo);
                    if($resultado == true){
                    echo'<script language="javascript">
                     alert("Eliminacion realizada");
                     </script>'; 
                    }
                    //Redireccionar    
                $_SESSION['id_sticker']=$resultado;
                }
            }
         ?>

