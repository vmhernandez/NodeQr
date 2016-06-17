<div class="col-md-8 col-sm-8 espacio principal">
            
        <form action="agregar_administrador.php" method="post">
                
            <label class="col-sm-12 col-md-12 control-label espacio">Ingresar el correo del administrador que desea agregar</label>    
                
            <label class="col-sm-4 col-md-3 control-label espacio">Correo </label>    
            
            <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="correo" type="email">
            </div>
                   
             <label class="col-sm-12 col-md-12 control-label espacio">Ingresar contraseña del nuevo administrador </label> 
                    
            <label class="col-sm-4 col-md-3 control-label espacio">Contraseña</label>
            
            <div class="col-sm-8 col-md-9">
            <input class="form-control espacio" name="contrasena" type="password"></div>
            
            <label class="col-sm-12 col-md-12 control-label espacio">Para confirmar el ingreso del nuevo administrador, por favor ingresar su contraseña y luego dar click en guardar</label>
            
            <div class="col-sm-12 col-md-12">
            <input class="form-control espacio" name="contrasena" type="password"></div>
               
            <div class="col-sm-12 col-md-12">
            <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar"/>
            </div>
            
            </form>
        </div>

         <?php
            if(isset($_POST['guardar'])){
                $correo=$_POST['correo'];
                $contrasena=$_POST['contrasena'];

                if (($correo == "")|| ($contrasena=="")||(strlen($correo)>30)||(strlen($contrasena)>20)){
                }else{
                    $resultado = agregar_administrador($correo, $contrasena);
                    if($resultado == true){
                    }
                    //Redireccionar    
                $_SESSION['id_sticker']=$resultado;
                header ("Location: index.php");
                }
            }
         ?>

