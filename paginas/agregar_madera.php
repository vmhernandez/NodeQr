<?php
    include "funciones.php";
?>

<div class="col-md-8 col-sm-8 espacio principal">
            <form action="<?php echo $pagina == 'agregar_sticker' ?>" method="post">
              
                <label class="col-sm-4 col-md-3 control-label espacio">Nombre(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="nombre"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Empresa</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="empresa"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Uso</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="uso"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Descripcion</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="descripcion"/></div>
               
                <div class="col-sm-12 col-md-12"><input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar" /></div>
                
                
                
                
            </form>
</div>
         <?php
            if(isset($_POST['guardar'])){
                $nombre=$_POST['nombre'];
                $empresa=$_POST['empresa'];
                $uso=$_POST['uso'];
                $descripcion=$_POST['descripcion'];
                
                if (($nombre=="")||(strlen($nombre)>30)){
                }else{
                    $resultado = agregar_madera($nombre,$empresa,$uso,$descripcion);
                    if($resultado == true){
                    }
                    //Redireccionar                   
                header ("Location:");
                }  
            }
         ?>
