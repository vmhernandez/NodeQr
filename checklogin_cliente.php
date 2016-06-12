<?php
require_once 'header.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <header>    
        <li>
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    $namex = $_SESSION['correo'];
                    echo "<a>BIENVENIDO: <font color=#68D800>$namex</font></a>";
                }
                    else echo "<a class='loquito' href='login_cliente.php'>INICIAR SESION</a>";
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
    </header>
    <body>
    </body>
        <?php
            include "conexion.php";
            conectarse();
        
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $sql= "SELECT * FROM usuario WHERE correo = '$correo' and contrasena ='$contrasena'";

            $result=mysql_query($sql);
        
            $count = mysql_num_rows($result);

            if($count == 1){
                $_SESSION['loggedin'] = true;
                $_SESSION['correo'] = $correo;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;
                echo ("<SCRIPT LANGUAGE='JavaScript'> window.location.href='usuario.php'; </SCRIPT>");
            }else { 
                echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('El Usuario o Password ingresados son incorrectos o no coinciden') window.location.href='login_cliente.php'; </SCRIPT>");
            }          
        ?>
</html>