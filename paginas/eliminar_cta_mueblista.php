<?php
  require_once 'head.php';
  include "funciones.php";  
?>
<div class="col-md-8 col-sm-8 espacio principal">

    <form action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
      <?php
      clave_mueblista($namex)
      ?>
      <label class="col-sm-4 col-md-3 control-label espacio">Contraseña(*)</label>        
        <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="rcontrasena"  type="password"/></div>
      <div class="col-sm-12 col-md-12">
        <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Eliminar cuenta"/>
      </div>
                   
    </form>
</div>

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