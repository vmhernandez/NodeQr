  

<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php   
        require_once 'head.php';
    ?>
  </head>
    <?php
        require_once 'navegacion.php';
    ?>
  </header>
  <body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <?php   
                $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'mis_muebles';
            ?>
            <ul class="sidebar-nav">
                <li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                $namex = $_SESSION['correo'];
                echo "<a href='mueblista.php'>BIENVENIDO: <font color=#68D800>$namex</font></a>";
                }
                else echo "<a class='loquito' href='index.php'>INICIAR SESION</a>";
                ?>
                </li>
                <li class="<?php echo $pagina == 'agregar_mueble' ? 'active' : ''; ?>"><a href="?p=mis_muebles">Mis muebles</a></li>  
                <li class="<?php echo $pagina == 'agregar_mueble' ? 'active' : ''; ?>"><a href="?p=agregar_mueble">Agregar mueble</a></li>  
                <li class="<?php echo $pagina == 'ranking' ? 'active' : ''; ?>"><a href="?p=ranking">Ranking</a></li>
                <li class="<?php echo $pagina == 'mis_datos_usuario' ? 'active' : ''; ?>"><a href="?p=mis_datos_usuario">Mis datos</a></li>
                <li class="<?php echo $pagina == 'cambiar_clave_usuario' ? 'active' : ''; ?>"><a href="?p=cambiar_clave_usuario">Modificar contraseña</a></li>
                <li class="<?php echo $pagina == 'eliminar_cta_usuario' ? 'active' : ''; ?>"><a href="?p=eliminar_cta_usuario">Eliminar mi cuenta</a></li>
                <li>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    $namex = $_SESSION['correo'];
                    echo "<a href='close.php'>Cerrar sesión</a>";
                    }
                    ?>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="contenido">
                    <?php   
                        require_once 'paginas/' . $pagina . '.php';
                    ?>
                </div>
            </div>
            </div>
    </div>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         <script>
            $("#menu").click(function(e) {

                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>  
</body>
</html>

