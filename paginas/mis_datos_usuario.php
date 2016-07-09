<?php
  require_once 'head.php';
  include "funciones.php";  
?>


<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
<?php mostrar_datos_usuario($namex)?>
    <div class="row">
       <div class="col-sm-12 col-md-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Guardar"/>
        </div>
    </div>
</form>

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