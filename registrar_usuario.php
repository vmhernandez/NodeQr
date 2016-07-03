<?php
  require_once 'header.php';
  include "paginas/funciones.php";
?>
   
   <form action="registrar_usuario.php" method="post" enctype="multipart/form-data">
                
                <label class="col-sm-4 col-md-3 control-label espacio">Nombre</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="nombre"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Apellido</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="apellido"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Foto</label>
            
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="foto" type="file"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Correo</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="correo" type="email"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Contraseña(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="contrasena"  type="password"/></div>
                
                <label class="col-sm-4 col-md-3 control-label espacio">Reingrese su contraseña(*)</label>
                
                <div class="col-sm-8 col-md-9"><input class="form-control espacio" name="rcontrasena"  type="password"/></div>
                
                <div class="col-sm-12 col-md-12 espacio"><button class="btn btn-primary pull-right" type="submit" name="guardar" id="guardar">Guardar</button></div>
            </form>
</div>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                
                $ruta = "C:\wamp\www\NodeQr\paginas\Perfil\..";
                opendir($ruta);
                $destino = $ruta.$_FILES['foto']['name'];
                copy($_FILES['foto']['tmp_name'],$destino);
                $foto=$_FILES['foto']['name']; 
                
                $contrasena=$_POST['contrasena'];
                $rcontrasena=$_POST['rcontrasena'];
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $correo=$_POST['correo'];
                
                if (($contrasena!=$rcontrasena)|| ($nombre=="")||($apellido=="")|| ($foto=="")|| ($rcontrasena=="")||($contrasena=="")||(strlen($nombre)>30)||(strlen($correo)>30)){
                }else{
                    $resultado = registrar_usuario($correo,$contrasena,$nombre,$apellido,$foto);
                    if($resultado == true){
                    }
                     //Redireccionar                   
                header ("Location: index.php");
                }
            }
         ?>
</html>