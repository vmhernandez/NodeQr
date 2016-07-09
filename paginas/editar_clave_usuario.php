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
    </head>
    
    <header>
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
    </header>
    <body>
          <ul><li><a href="index.php">Index</a></li>
                </ul>
        <table>
            <form action="editar_clave_usuario.php" method="post">
                <tr>
                    <td>Contraseña(*)</td>
                    <td><input name="contrasena" type="password"></td>
                </tr>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
    <?php
            if(isset($_POST['guardar'])){
                $correo=$_SESSION['correo'];
                $contrasena=$_POST['contrasena'];
                if (($correo == "")|| ($contrasena=="")||(strlen($correo)>30)||(strlen($contrasena)>20)){
                }else{
                    $resultado = modificar_pass_usuario($correo,$contrasena);
                    if($resultado == true){
                    }
                header ("Location: index.php");
                }
            }
         ?>
</html>
