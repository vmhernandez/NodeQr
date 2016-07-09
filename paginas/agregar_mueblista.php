<?php
    include "funciones.php";
?>

<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>

$(document).ready(function() {
    
jQuery.validator.addMethod("letras", function(value, element) {
return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
}); 
    
    $("#validar").validate({
        rules:{
            rut:{
                required:true,
                rangelength: [7,8]
            },
            nombre:{
                required:true,
                rangelength: [3,30],
                letras:true
                
            },  
            correo:{
                required:true,
                email:true
                
            },
            telefono:{
                required:true,
                rangelength: [8,11]
            },
            direccion:{
                required:true,
                rangelength: [3,50]
            }
        },
        messages:{
            rut:{
                required:"Campo obligatorio",
                rangelength:"Ingrese 8 caracteres"
            },
            nombre:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 3 y máximo 30 caracteres",
                letras: "Ingrese solo letras"
            },
            correo:{
                required:"Campo obligatorio",
                email:"Formato erróneo"
            },
            telefono:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 8 y máximo 11 caracteres"
            },
            direccion:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 3 y máximo 40 caracteres"
            }
            
        }
           
        });
});    
     
    
function confirmar()
{
	if(confirm('¿Estas seguro desea agregar al Mueblista'))
		return true;
	else
		return false;
}
</script>
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker' ?>" method="post" onsubmit="return confirmar()" id="validar">
   <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Rut</label>
        <div class="col-sm-8 col-md-9">
            <input id="rut" class="form-control espacio" name="rut_mueblista" type="number">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label">Nombre</label>
        <div class="col-sm-8 col-md-9">
            <input id="nombre" class="form-control" name="nombre">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label">Correo</label>
        <div class="col-sm-8 col-md-9">
            <input id="correo" class="form-control" name="correo" type="email">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Teléfono</label>
        <div class="col-sm-8 col-md-9">
            <input id="telefono" class="form-control espacio" name="telefono" type="number">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Dirección</label>
        <div class="col-sm-8 col-md-9">
            <input id="direccion" class="form-control espacio" name="direccion">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Guardar"/>
        </div>
    </div>
</form>

         <?php
            if(isset($_POST['guardar'])){

                $rut_mueblista=$_POST['rut_mueblista'];
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];

                if (($rut_mueblista == "")|| ($nombre=="")||(strlen($rut_mueblista)>8)||(strlen($nombre)>30)||(strlen($telefono)!=9)||(strlen($direccion)>50)||(strlen($correo)>30)){
                    echo'<script language="javascript">
                     alert("Datos incorectos");
                     </script>';
                }else{
                    $resultado = agregar_mueblista($rut_mueblista, $nombre, $correo, $telefono, $direccion);
                    if($resultado == true){
                    echo'<script language="javascript">
                     alert("Mueblista ingresado correctamente");
                     </script>';
                    }
                     //Redireccionar                   
                header ("Location:");
                }  
            }
         ?>
</html>