<?php
  require_once 'header.php';
  include "paginas/funciones.php";
?>
   
   <form action="registrar_mueblista.php" method="post">
                <label class="col-sm-4 col-md-3 control-label espacio">Rut(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="rut_mueblista" type="number"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Nombre</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="nombre"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Correo</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="correo" type="email"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Direccion</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="direccion"/></div>
               
                <label class="col-sm-4 col-md-3 control-label espacio">Telefono</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="telefono"  type="number"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Contraseña(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="contrasena"  type="password"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Reingrese su contraseña(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="rcontrasena"  type="password"/></div>
                
                <div class="col-sm-12 col-md-12"><input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="guardar" id="guardar" value="Guardar" /></div>
            </form>
</div>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                $rut_mueblista=$_POST['rut_mueblista'];
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                $nombre=$_POST['nombre'];
                $correo=$_POST['correo'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];

                if (($contrasena!=$rcontrasena)||($rut_mueblista == "")|| ($nombre=="")||($rcontrasena=="")||($contrasena=="")||(strlen($rut_mueblista)>11)||(strlen($nombre)>30)||(strlen($direccion)>50)||(strlen($correo)>30)){
                }else{
                    $resultado = registrar_mueblista($rut_mueblista,$contrasena, $nombre, $correo, $telefono, $direccion);
                    if($resultado == true){
                    }
                     //Redireccionar                   
                header ("Location: index.php");
                }
            }
         ?>
</html>