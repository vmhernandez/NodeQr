<?php
    session_start();
    include "funciones.php";
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Esta pagina es solo para usuarios registrados porfavor inicia sesion')
        window.location.href='login.php';
        </SCRIPT>");
        exit;
    }
    $now = time(); // checking the time now when home page starts
    if($now > $_SESSION['expire']){
        session_destroy();
        echo "<br/><br />" . "Su sesion ha terminado, <a href='login.php'> Necesita Hacer Login</a>";
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <header>
            <ul>
                <li>
                    <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                            $namex = $_SESSION['correo'];
                            echo "<a>BIENVENIDO: $namex</a>";
                        }
                        else echo "<a href='login.php'>INICIAR SESION</a>";
                    ?>
                </li>  
                <li>
                    <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                            $namex = $_SESSION['correo'];
                            echo "<a href='close.php'>CERRAR SESION</a>";
                        }
                    ?>
                </li>
            </ul>
        </header>
    </head>
    <body>
          <ul><li><a href="index.php">Index</a></li>
                </ul>
        <table>
            <form action="agregar_mueble.php" method="post">
                <tr>
                    <td>Sticker(*)</td>
                    <td><select name="id_sticker"><?php listar_sticker();?></select></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><input name="foto" type="file"></td>
                </tr>
                <tr>
                    <td>Calificacion</td>
                    <td><input name="calificacion" type="number" min="1" max="5"></td>
                </tr>
                <tr>
                    <td>Tipo</td>
                    <td>
                        <select name="tipo">
                            <option value="Cocina">Cocina</option>
                            <option value="Baño">Baño</option>
                        </select>
                    </td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                $correo=$_SESSION['correo'];
                $id_sticker=$_POST['id_sticker'];
                $foto=$_POST['foto'];
                $calificacion=$_POST['calificacion'];
                $tipo=$_POST['tipo'];
                if (($correo == "")|| ($id_sticker=="")|| ($calificacion=="")|| ($tipo=="")){
                }else{
                    $resultado = agregar_mueble($correo, $id_sticker,$foto,$calificacion,$tipo);
                    if($resultado == true){
                    }
                header ("Location: index.php");
                }
            }
         ?>
</html>