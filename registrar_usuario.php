<?php
  require_once 'header.php';
  include "paginas/funciones.php";
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
            nombre:{
                required:true,
                rangelength: [3,30],
                letras:true
            }, 
            apellido:{
                required:true,
                rangelength: [3,30],
                letras:true
            }, 
            foto:{
                required: true
            },
            correo:{
                required:true,
                email:true     
            },
            contrasena:{
                required:true,
                rangelength: [6,12]
            },
            rcontrasena:{
                required:true,
                rangelength: [6,12]
            }
        },
        messages:{
            nombre:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 3 y máximo 30 caracteres",
                letras: "Ingrese solo letras"
            },
            apellido:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 3 y máximo 30 caracteres",
                letras: "Ingrese solo letras"
            },
            correo:{
                required:"Campo obligatorio",
                email:"Formato erróneo"
            },
            foto:{
                required:"Campo obligatorio"
            },
            contrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            },
            rcontrasena:{
                required:"Campo obligatorio",
                rangelength:"Mínimo 6 y máximo 12 caracteres"
            }
            
        }
           
        });
});    
     
    
function confirmar()
{
	if(confirm('¿Estas seguro desea crear la cuenta'))
		return true;
	else
		return false;
}
</script>
   
   <form action="registrar_usuario.php" method="post" enctype="multipart/form-data" onsubmit="return confirmar()" id="validar">
                
                <label class="col-sm-4 col-md-3 control-label espacio">Nombre</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="nombre"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Apellido</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="apellido"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Foto</label>
            
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="foto" type="file"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Correo</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="correo" type="email"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Contraseña(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="contrasena"  type="password"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Reingrese su contraseña(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="rcontrasena"  type="password"/></div>
                
                <div class="col-sm-12 col-md-12 espacio"><button class="btn btn-primary pull-right" type="submit" name="guardar" id="guardar">Guardar</button></div>
            </form>
</div>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                
                $ruta = "C:\wamp\www\NodeQr\paginas\Perfil\..";
                opendir($ruta);
                $destino = $ruta.$_FILES['foto']['name'];
                copy($_FILES['foto']['tmp_name'],$destino);
                $foto=$_FILES['foto']['name']; 
                
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $correo=$_POST['correo'];
                
                if (($contrasena!=$rcontrasena)|| ($nombre=="")||($apellido=="")|| ($foto=="")|| ($rcontrasena=="")||($contrasena=="")||(strlen($nombre)>30)||(strlen($correo)>30)){
                    echo'<script language="javascript">
                     alert("Contraseña incorrecta");
                     </script>';
                }else{
                    $resultado = registrar_usuario($correo,$contrasena,$nombre,$apellido,$foto);
                    if($resultado == true){
                    echo'<script language="javascript">
                     alert("Usuario registrado");
                     </script>';
                    }
                    echo "<SCRIPT LANGUAGE='JavaScript'> window.location.href='index.php'; </SCRIPT>";
                }
            }
         ?>
</html>