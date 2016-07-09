<?php
  require_once 'head.php';
  include "funciones.php";  
?>
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
    <?php
        mostrar_datos_mueblista($namex)
    ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Guardar"/>
        </div>
    </div>
</form>
    <?php
            if(isset($_POST['guardar'])){
                $rut_mueblista=$namex;
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];
                if (($nombre == "")||(strlen($correo)>30)||(strlen($correo)>30)||(strlen($direccion)>50)){
                }else{
                    $resultado = modificar_mueblista($rut_mueblista,$nombre,$correo,$telefono,$direccion);
                    if($resultado == true){
                    }
                header ("Location:");
                }
            }
         ?>
         