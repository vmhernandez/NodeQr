<?php
  require_once 'head.php';
  include "funciones.php";  
?>
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
   <div class="row">
            <?php
                clave_mueblista($namex)
            ?>
    </div>
    <div class="row">
       <label class="col-sm-4 col-md-3 control-label espacio">Contraseña antigua</label>    
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="rcontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Nueva contraseña</label>   
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="ncontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label">Confirmar contraseña</label>   
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="rncontrasena"  type="password"/>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Modificar clave"/>
        </div>
    </div>
</form>

    <?php
            if(isset($_POST['guardar'])){
                $rut_mueblista=$namex;
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                $ncontrasena=$_POST['ncontrasena'];
                $rncontrasena=$_POST['rncontrasena'];
                if (($contrasena == "")||($rcontrasena == "")||($ncontrasena == "")||($rncontrasena == "")||($contrasena!=$rcontrasena)||($ncontrasena!=$rncontrasena)){
                }else{
                    $resultado = modificar_pass_mueblista($rut_mueblista,$ncontrasena);
                    if($resultado == true){
                    }
                header ("Location:");
                }
            }
         ?>