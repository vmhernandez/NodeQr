<?php
  require_once 'head.php';
  include "funciones.php";  
?>

<form class="formulario" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
    <?php
        clave_mueblista($namex)
    ?>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Contraseña</label>        
        <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="rcontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Eliminar cuenta"/>
        </div>
    </div>

</form>


    <?php
            if(isset($_POST['guardar'])){
                $rut_mueblista=$namex;
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                if (($rcontrasena == "")||($contrasena == "")||($contrasena!=$rcontrasena)){
                }else{
                    $resultado = eliminar_mueblista($rut_mueblista);
                    if($resultado == true){
                    }
                header ("Location:");
                }
            }
         ?>