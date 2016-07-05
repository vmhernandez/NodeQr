<?php
  require_once 'header.php';
  include "funciones.php";  
?>
<div class="col-md-8 col-sm-8 espacio principal">

    <form action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
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
                }else{
                    $resultado = modificar_mueblista($rut_mueblista,$nombre,$correo,$telefono,$direccion);
                    if($resultado == true){
                    }
                header ("Location:");
                }
            }
         ?>
         