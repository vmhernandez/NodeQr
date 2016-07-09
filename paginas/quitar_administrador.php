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
	if(confirm('¿Estas seguro desea quitar al administrador'))
		return true;
	else
		return false;
}
    
</script>
            
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker' ?>" method="post" onsubmit="return confirmar()" id="validar">
   <div class="row">   
        <label class="col-sm-4 col-md-3 control-label espacio">Correo administrador </label>    
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="correo" type="email">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Su contraseña</label>  
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="contrasena" type="password">
        </div>
    </div>
    <div class="col-xs-12">
        <?php clave_administrador($namex)?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Quitar administrador"/>
        </div>
    </div>
</form>

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

