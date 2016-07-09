<?php
  require_once 'head.php';
  include "funciones.php";  
?>

<link rel="stylesheet" href="../estiloValidacion.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$(document).ready(function() {
    
    $("#validar").validate({
        
        rules:{
            rcontrasena:{
                required:true,
                rangelength: [6,12]
            },
            ncontrasena:{
                required:true,
                rangelength: [6,12]
            },
            rncontrasena:{
                required:true,
                rangelength: [6,12]
            }
        },
        messages:{
            rcontrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            },
            ncontrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            },
           rncontrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            }
            
        }
        });
   
 });
    
function confirmar()
{
	if(confirm('¿Estas seguro desea cambiar la contraseña'))
		return true;
	else
		return false;
}
</script>

<form class="formulario" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post" onsubmit="return confirmar()" id="validar">
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Contraseña antigua</label>
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="rcontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Nueva contraseña</label>        
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="ncontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Confirmar contraseña</label> 
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="rncontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Modificar clave"/>
        </div>
    </div>

<?php clave_usuario($namex) ?>         
</form>


    <?php
            if(isset($_POST['guardar'])){
                $correo=$namex;
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                $ncontrasena=$_POST['ncontrasena'];
                $rncontrasena=$_POST['rncontrasena'];
                if (($contrasena == "")||($rcontrasena == "")||($ncontrasena == "")||($rncontrasena == "")||($contrasena!=$rcontrasena)||($ncontrasena!=$rncontrasena)){
                    echo'<script language="javascript">
                     alert("Contraseña incorrecta");
                     </script>';
                }else{
                    $resultado = modificar_pass_usuario($correo,$ncontrasena);
                    if($resultado == true){
                        echo'<script language="javascript">
                     alert("Contraseña modificada");
                     </script>';
                    }
                header ("Location:");
                }
            }
         ?>