<?php include "funciones.php"; ?>
<div class="col-md-8 col-sm-8 espacio principal">
            
        <form action="<?php echo $pagina == 'agregar_sticker' ?>" method="post">
                
            <label class="col-sm-12 col-md-12 control-label espacio">Ingresar el rut del mueblista que desea quitar</label>    
                
            <label class="col-sm-4 col-md-3 control-label espacio">Rut</label>    
            
            <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="rut" type="number">
            </div>
                   
            <label class="col-sm-12 col-md-12 control-label espacio">Para confirmar la baja del mueblista, por favor ingresar su contraseña y luego dar click en guardar</label>
            
            <div class="col-sm-12 col-md-12">
            <input class="form-control espacio" name="contrasena" type="password"></div>

               
            <div class="col-sm-12 col-md-12">
            <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Enviar"/>
            </div>
            
            </form>
        </div>

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
