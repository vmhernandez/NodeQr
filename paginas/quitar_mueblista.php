<?php 
    include "funciones.php"; 
?>

<form class="formulario" action="<?php echo $pagina == 'agregar_sticker' ?>" method="post">
   <div class="row"> 
        <label class="col-sm-4 col-md-3 control-label">Rut mueblista</label>    
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="rut" type="number">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-4 col-md-3 control-label">Contraseña</label>
        <div class="col-sm-8 col-md-9">
            <input class="form-control" name="contrasena" type="password">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <input class="botonesSubmit btn-block" type="submit" name="guardar" id="guardar" value="Quitar mueblista"/>
        </div>
    </div>
</form>
<?php
    if(isset($_POST['guardar'])){
    $rut=$_POST['rut'];
        if (($rut == "rut")||(strlen($rut)>30)){
        }else{
            $resultado = eliminar_mueblista($rut);
                if($resultado == true){
                }
            //Redireccionar    
            $_SESSION['id_sticker']=$resultado;
            header ("Location:");
        }
    }
?>
