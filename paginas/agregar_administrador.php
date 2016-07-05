<?php include "funciones.php"; ?>


<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
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
                
            <label class="col-sm-12 col-md-12 control-label espacio">Ingresar el correo del administrador que desea agregar</label>    
                
            <label class="col-sm-4 col-md-3 control-label espacio">Correo </label>    
            
            <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="correo" type="email" id="correo">
            </div>
                   
            <label class="col-sm-12 col-md-12 control-label espacio">Ingresar contraseña del nuevo administrador </label> 
                    
            <label class="col-sm-4 col-md-3 control-label espacio">Contraseña</label>
            
            <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="contrasena" id="contrasena" type="password"></div>
            

            <label class="col-sm-12 col-md-12 control-label espacio">Para confirmar la baja del nuevo administrador, por favor ingresar su contraseña y luego dar click en guardar</label>
            
            <div class="col-sm-12 col-md-12">
            <input class="form-control espacio" name="contrasena2" type="password"></div>
               
            <div class="col-sm-12 col-md-12">
            <?php clave_administrador($namex)?>
            </div>
               
            <div class="col-sm-12 col-md-12">
            <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" value="Guardar" />
            </div>
            
            </form>
        </div>

         <?php
    
    if(isset($_POST['guardar'])){ 
                $correo=$_POST['correo'];
                $contrasena=$_POST['contrasena'];
                $contrasena2=$_POST['contrasena2'];
                $contrasena3=$_POST['contrasena3'];

                if (($correo == "")|| ($contrasena=="")||($contrasena2 != $contrasena3)||(strlen($correo)>30)||(strlen($contrasena)>20)){
                    echo'<script language="javascript">
                     alert("Contraseña incorrecta");
                     </script>';
                }else{
                    $resultado = agregar_administrador($correo, $contrasena);
                    if($resultado == true){
                    echo'<script language="javascript">
                     alert("Administrador agregado");
                     </script>';
                    }    
            $_SESSION['id_sticker']=$resultado;
                
             }
            }
         ?>

