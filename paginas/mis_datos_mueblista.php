<?php
  require_once 'header.php';
  include "funciones.php";  
?>

<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
function confirmar()
{
	if(confirm('¿Estas seguro guardar los cambios?'))
		return true;
	else
		return false;
}
</script>


<div class="col-md-8 col-sm-8 espacio principal">

    <form action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post" onsubmit="return confirmar()" >
      <?php
      mostrar_datos_mueblista($namex)
      ?>
      <div class="col-sm-12 col-md-12">
        <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar"/>
      </div>
                   
    </form>
</div>
    
    <?php
            if(isset($_POST['guardar'])){
                $rut_mueblista=$namex;
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];
                if (($nombre == "")||(strlen($correo)>30)||(strlen($correo)>30)||(strlen($direccion)>50)){
                    echo'<script language="javascript">
                     alert("Datos incorectos");
                     </script>';
                }else{
                    $resultado = modificar_mueblista($rut_mueblista,$nombre,$correo,$telefono,$direccion);
                    if($resultado == true){
                    echo "<SCRIPT LANGUAGE='JavaScript'> window.location.href='mueblista.php?p=mis_datos_mueblista'; </SCRIPT>";
                    }
                    
                }
            }
         ?>
         