<?php include "funciones.php"; ?>
<form class="formulario" action="<?php echo $pagina == 'agregar_sticker' ?>" method="post">
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">ID madera</label>    
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="id" type="number">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label espacio">Su contraseña</label>
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="contrasena" type="password">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Quitar madera"/>
        </div>
    </div>
</form>


         <?php
            if(isset($_POST['guardar'])){
                $id=$_POST['id'];
               

                if (($id == "")||(strlen($id)>30)){
                }else{
                    $resultado = eliminar_madera($id);
                    if($resultado == true){
                    }
                    //Redireccionar    
                $_SESSION['id_sticker']=$resultado;
                header ("Location:");
                }
            }
         ?>
