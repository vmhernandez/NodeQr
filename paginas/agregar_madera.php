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
            <form action="agregar_madera.php" method="post">
                <tr>
                    <td>Nombre(*)</td>
                    <td><input name="nombre"></td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                $nombre=$_POST['nombre'];
                if (($nombre=="")||(strlen($nombre)>30)){
                }else{
                    $resultado = agregar_madera($nombre);
                    if($resultado == true){
                    }
                    //Redireccionar                   
                header ("Location: index.php");
                }  
            }
         ?>
</html>