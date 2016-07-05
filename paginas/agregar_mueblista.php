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
	if(confirm('¿Estas seguro desea agregar al administrador'))
		return true;
	else
		return false;
}
</script>

<div class="col-md-8 col-sm-8 espacio principal">
            <form action="<?php echo $pagina == 'agregar_sticker' ?>" method="post" id="validar">
               
                <label class="col-sm-4 col-md-3 control-label espacio">Rut(*)</label>
                 
                <div class="col-sm-8 col-md-9">
                <input id="rut" class="form-control espacio" name="rut_mueblista" type="number"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Nombre(*)</label>
                  
                <div class="col-sm-8 col-md-9">
                <input id="nombre" class="form-control espacio" name="nombre"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Correo</label>
                  
                <div class="col-sm-8 col-md-9">
                <input id="correo" class="form-control espacio" name="correo" type="email"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Telefono</label>
                 
                <div class="col-sm-8 col-md-9">
                <input id="telefono" class="form-control espacio" name="telefono" type="number"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Direccion</label>
                 
                <div class="col-sm-8 col-md-9">
                <input id="direccion" class="form-control espacio" name="direccion"></div>
                
                <div class="col-sm-12 col-md-12">
                <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar"/></div>
               
            </form>
</div>
         <?php
            if(isset($_POST['guardar'])){

                $rut_mueblista=$_POST['rut_mueblista'];
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];

                if (($rut_mueblista == "")|| ($nombre=="")||(strlen($rut_mueblista)>8)||(strlen($nombre)>30)||(strlen($telefono)!=9)||(strlen($direccion)>50)||(strlen($correo)>30)){
                }else{
                    $resultado = agregar_mueblista($rut_mueblista, $nombre, $correo, $telefono, $direccion);
                    if($resultado == true){
                    }
                     //Redireccionar                   
                header ("Location:");
                }  
            }
         ?>
</html>