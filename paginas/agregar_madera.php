<?php
    include "funciones.php";
?>
<link rel="stylesheet" href="../estiloValidacion.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$(document).ready(function() {
    
    $("#validar").validate({
        
        rules:{
            nombre:{
                required: true,
                rangelength:[3,40]
            },
            empresa:{
                required: true,
                rangelength: [3,40]
            },
            uso:{
                required: true
            },
            descripcion:{
                required: true
            },
        },
        messages:{
            nombre:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 1 y máximo 40 caracteres"
            },
            empresa:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 1 y máximo 40 caracteres"
            },
            uso:{
                required:"Campo obligatorio"
            },
            descripcion:{
                required:"Campo obligatorio"
            }
            
        }
        });
   
 });
    
function confirmar()
{
	if(confirm('¿Estas seguro desea agregar la madera'))
		return true;
	else
		return false;
}
</script>
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker' ?>" onsubmit="return confirmar()" method="post" id="validar">
   <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Nombre</label>
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="nombre" id="nombre"/>
        </div>
    </div>
    <div class="row">
    <label class="col-sm-4 col-md-3 control-label espacio">Empresa</label>
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="empresa" id="empresa"/>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Uso</label>
        <div class="col-sm-8 col-md-9 ">
            <select id="uso" name="uso" class=" form-control espacio">
                <option value="Construccion/interior">Construccion/interior</option>
                <option value="Mobiliario">Mobiliario</option>
                <option value="Revestimiento">Revestimiento</option>
            </select>
        </div>
    </div>      
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Descripción</label>
        <div class="col-sm-8 col-md-9">
            <input id="descripcion" class="form-control espacio" name="descripcion"/>
        </div>
    </div>
    <div class="row">
    <div class="col-xs-12">
        <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Agregar" />
    </div>
    </div>
</form>

         <?php
            if(isset($_POST['guardar'])){
                $nombre=$_POST['nombre'];
                $empresa=$_POST['empresa'];
                $uso=$_POST['uso'];
                $descripcion=$_POST['descripcion'];
                
                if (($nombre=="")||(strlen($nombre)>30)){
                }else{
                    $resultado = agregar_madera($nombre,$empresa,$uso,$descripcion);
                    if($resultado == true){
                     echo'<script language="javascript">
                     alert("Madera ingresada correctamente");
                     </script>';
                    }
                    //Redireccionar                   
                header ("Location:");
                }  
            }
         ?>
