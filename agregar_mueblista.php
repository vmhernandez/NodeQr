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
            <form action="agregar_mueblista.php" method="post">
                <tr>
                    <td>Rut(*)</td>
                    <td><input name="rut_mueblista" type="number"></td>
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
                header ("Location: index.php");
                }  
            }
         ?>
</html>