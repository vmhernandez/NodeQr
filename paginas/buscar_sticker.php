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
            <form action="agregar_sticker.php" method="post">
                <tr>
                    <td>Mueblista(*)</td>
                    <td><select name="rut_mueblista"><?php listar_mueblistas();?></select></td>
                </tr>
                <tr>
                    <td>Madera(*)</td>
                    <td><select name="id_madera"><?php listar_madera();?></select></td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                $rut_mueblista=$_POST['rut_mueblista'];
                $id_madera=$_POST['id_madera'];
                if (($rut_mueblista=="")||($id_madera=="")){
                }else{
                    $resultado = bsucar_sticker($rut_mueblista,$id_madera);
                    if($resultado == true){
                    }
                    //Redireccionar                   
                header ("Location: index.php");
                }  
            }
         ?>
</html>