<?php
  require_once 'header.php';
  include "funciones.php";  
?>


<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>

<div class="col-md-8 col-sm-8 espacio principal">

    <form action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
      <?php mostrar_datos_usuario($namex)?>
      <div class="col-sm-12 col-md-12">
        <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar"/>
      </div>
                   
    </form>
</div>

    <?php
            if(isset($_POST['guardar'])){
                $correo=$namex;
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                if (($nombre == "")||($apellido=="")){
                }else{
                    $resultado = modificar_datos_usuario($correo,$nombre,$apellido);
                    if($resultado == true){
                    }
                header ("Location:");
                }
            }
         ?>