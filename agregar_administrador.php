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
            <form action="agregar_administrador.php" method="post">
                <tr>
                    <td>Correo</td>
                    <td><input name="correo" type="email"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input name="contrasena" type="password"></td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
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

</html>