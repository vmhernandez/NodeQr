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
                    echo "<a href='mi_perfil.php'>BIENVENIDO: <font color=#68D800>$namex</font></a>";
                }
                    else echo "<a class='loquito' href='login_administrador.php'></a>";
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
<style>
html {
  height: 100%;
}

body {
  background-image: radial-gradient(circle farthest-corner at center, #3C4B57 0%, #1C262B 100%);
}

.loader {
  position: absolute;
  top: calc(50% - 32px);
  left: calc(50% - 32px);
  width: 64px;
  height: 64px;
  border-radius: 50%;
  perspective: 800px;
}

.inner {
  position: absolute;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  border-radius: 50%;  
}

.inner.one {
  left: 0%;
  top: 0%;
  animation: rotate-one 1s linear infinite;
  border-bottom: 3px solid #EFEFFA;
}

.inner.two {
  right: 0%;
  top: 0%;
  animation: rotate-two 1s linear infinite;
  border-right: 3px solid #EFEFFA;
}

.inner.three {
  right: 0%;
  bottom: 0%;
  animation: rotate-three 1s linear infinite;
  border-top: 3px solid #EFEFFA;
}

@keyframes rotate-one {
  0% {
    transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }
  100% {
    transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}

@keyframes rotate-two {
  0% {
    transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }
  100% {
    transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}

@keyframes rotate-three {
  0% {
    transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }
  100% {
    transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}
        
</style>
    </header>
    <body>
<div class="loader">
  <div class="inner one"></div>
  <div class="inner two"></div>
  <div class="inner three"></div>
</div>

    </body>
        <?php
            include "conexion.php";
            conectarse();
        
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $sql= "SELECT * FROM administrador WHERE correo = '$correo' and contrasena ='$contrasena'";

            $result=mysql_query($sql);
        
            $count = mysql_num_rows($result);

            if($count == 1){
                $_SESSION['loggedin'] = true;
                $_SESSION['correo'] = $correo;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;
                echo ("<SCRIPT LANGUAGE='JavaScript'> window.location.href='admin.php'; </SCRIPT>");
            }else { 
                echo ("<SCRIPT LANGUAGE='JavaScript'> window.location.href='index.php?p=login_administrador'; </SCRIPT>");
            }          
        ?>
</html>