<?php
    include "funciones.php";
?>
<div class="col-md-8 col-sm-8 espacio principal">
            <form action="<?php echo $pagina == 'agregar_sticker' ?>" method="post">
               
                <label class="col-sm-4 col-md-3 control-label espacio">Rut(*)</label>
                 
                <div class="col-sm-8 col-md-9">
                <input class="form-control espacio" name="rut_mueblista" type="number"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Nombre(*)</label>
                  
                <div class="col-sm-8 col-md-9">
                <input class="form-control espacio" name="nombre"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Correo</label>
                  
                <div class="col-sm-8 col-md-9">
                <input class="form-control espacio" name="correo" type="email"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Telefono</label>
                 
                <div class="col-sm-8 col-md-9">
                <input class="form-control espacio" name="telefono" type="number"></div>
                
               
                <label class="col-sm-4 col-md-3 control-label espacio">Direccion</label>
                 
                <div class="col-sm-8 col-md-9">
                <input class="form-control espacio" name="direccion"></div>
                
                <div class="col-sm-12 col-md-12">
                <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar"/></div>
               
            </form>
</div>
         <?php
            if(isset($_POST['guardar'])){

                $rut_mueblista=$_POST['rut_mueblista'];
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];

                if (($rut_mueblista == "")|| ($nombre=="")||(strlen($rut_mueblista)>8)||(strlen($nombre)>30)||(strlen($telefono)!=9)||(strlen($direccion)>50)||(strlen($correo)>30)){
                }else{
                    $resultado = agregar_mueblista($rut_mueblista, $nombre, $correo, $telefono, $direccion);
                    if($resultado == true){
                    }
                     //Redireccionar                   
                header ("Location:");
                }  
            }
         ?>
</html>