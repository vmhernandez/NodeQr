<?php
  require_once 'head.php';
  include "funciones.php";  
?>


<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>

$(document).ready(function() {
    
    $("#validar").validate({
        rules:{
            rcontrasena:{
                required:true,
                rangelength: [6,12]
            } 
        },
        messages:{
            rcontrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            }
        }
           
        });
});    
     
    
function confirmar()
{
	if(confirm('¿Estas seguro desea eliminar la cuenta'))
		return true;
	else
		return false;
}
</script>

<form class="formulario" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post" onsubmit="return confirmar()" id="validar">
    <?php
        clave_usuario($namex)
    ?>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Contraseña</label>        
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="rcontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Eliminar cuenta"/>
        </div>
    </div>

</form>


    <?php
            if(isset($_POST['guardar'])){
                $correo=$namex;
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                if (($rcontrasena == "")||($contrasena == "")||($contrasena!=$rcontrasena)){
                    echo'<script language="javascript">
                     alert("Contraseña incorrecta");
                     </script>';
                }else{
                    $resultado = eliminar_usuario($correo);
                    if($resultado == true){
                     echo'<script language="javascript">
                     alert("Cuenta eliminada");
                     </script>';
                    }
                header ("Location:");
                }
            }
         ?>