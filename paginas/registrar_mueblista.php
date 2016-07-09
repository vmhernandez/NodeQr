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
            <form action="registrar_mueblista.php" method="post">
                <tr>
                    <td>Rut(*)</td>
                    <td><input name="rut_mueblista" type="number"></td>
                </tr>
                <tr>
                    <td>Contraseña(*)</td>
                    <td><input name="contrasena" type="password"></td>
                </tr>
                <tr>
                    <td>Reingrese su Contraseña(*)</td>
                    <td><input name="rcontrasena" type="password"></td>
                </tr>
                <tr>
                    <td>Nombre(*)</td>
                    <td><input name="nombre"></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input name="correo" type="email"></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input name="telefono" type="number"></td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td><input name="direccion"></td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
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