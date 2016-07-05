<?php include "funciones.php"; ?>

<link rel="stylesheet" href="../estiloValidacion.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
    
function confirmar()
{
	if(confirm('¿Estas seguro desea eliminar la madera?'))
		return true;
	else
		return false;
}
    
</script>

<div class="col-md-8 col-sm-8 espacio principal">
            
        <form action="<?php echo $pagina == 'agregar_sticker' ?>" method="post" onsubmit="return confirmar()">
                
            <label class="col-sm-12 col-md-12 control-label espacio">Ingresar id de la madera que desea quitar</label>    
                
            <label class="col-sm-4 col-md-3 control-label espacio">Madera </label>    
            
            <div class="col-sm-8 col-md-9">
            <select name="codigo" class="form-control espacio">
            <?php listar_madera()?>
            </select>
            </div>
                   
            <label class="col-sm-12 col-md-12 control-label espacio">Para confirmar la eliminacion de la madera, por favor ingresar su contraseña y luego dar click en guardar</label>
            
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
                $codigo=$_POST['codigo'];
                $contrasena=$_POST['contrasena'];
                $contrasena3=$_POST['contrasena3'];
               
               

                if (($codigo == "")||($contrasena != $contrasena3)){
                    echo'<script language="javascript">
                     alert("Contraseña incorrecta");
                     </script>';
                }else{
                    $resultado = eliminar_madera($codigo);
                    if($resultado == true){
                     echo'<script language="javascript">
                     alert("Eliminacion realizada");
                     </script>'; 
                    }
                echo "<SCRIPT LANGUAGE='JavaScript'> window.location.href='admin.php?p=quitar_madera'; </SCRIPT>";
                    //Redireccionar    
                $_SESSION['id_sticker']=$resultado;
                header ("Location:");
                }
            }
         ?>
