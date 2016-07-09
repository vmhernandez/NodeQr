<?php
    include "funciones.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
          <ul><li><a href="index.php">Index</a></li>
                </ul>
        <table>
            <form action="agregar_usuario.php" method="post">
                <tr>
                    <td>Correo</td>
                    <td><input name="correo" type="email"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input name="contrasena" type="password"></td>
                </tr>
                <tr>
                    <td>Nombre(*)</td>
                    <td><input name="nombre"></td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td><input name="apellido"></td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                $correo=$_POST['correo'];
                $contrasena=$_POST['contrasena'];
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                if (($correo == "")|| ($contrasena=="")|| ($nombre=="")|| ($apellido=="")||(strlen($correo)>30)||(strlen($contrasena)>20)||(strlen($nombre)>30)||(strlen($apellido)>50)){
                }else{
                    $resultado = agregar_usuario($correo, $contrasena,$nombre,$apellido);
                    if($resultado == true){
                    }
                header ("Location: index.php");
                }
            }
         ?>

</html>