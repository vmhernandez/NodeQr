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
    <header>
        <?php
            require_once 'navegacion.php';
        ?>
    </header>
    <body>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <?php   
                    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'agregar_sticker';
                ?>
                <ul class="sidebar-nav">
                   
                    <li>
                        <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                                $namex = $_SESSION['correo'];
                                echo "<a href='mi_perfil.php'>BIENVENIDO: <font color=#68D800>$namex</font></a>";
                            }
                            else echo "<a class='loquito' href='login_administrador.php'>INICIAR SESION</a>";
                        ?>
                    </li>
                    
                    <li class="<?php echo $pagina == 'agregar_sticker' ? 'active' : ''; ?>"><a href="?p=agregar_sticker">Generar Qr</a></li>

                    <li class="<?php echo $pagina == 'leer_qr' ? 'active' : ''; ?>"><a href="?p=leer_qr">Consultar Qr</a></li>

                    <li class="<?php echo $pagina == 'agregar_administrador' ? 'active' : ''; ?>"><a href="?p=agregar_administrador">Agregar administrador</a></li>

                    <li class="<?php echo $pagina == 'quitar_administrador' ? 'active' : ''; ?>"><a a href="?p=quitar_administrador">Quitar administrador</a></li>

                    <li class="<?php echo $pagina == 'agregar_mueblista' ? 'active' : ''; ?>"><a href="?p=agregar_mueblista">Agregar mueblista</a></li>

                    <li class="<?php echo $pagina == 'quitar_mueblista' ? 'active' : ''; ?>"><a href="?p=quitar_mueblista">Quitar mueblista</a></li>

                    <li class="<?php echo $pagina == 'agregar_madera' ? 'active' : ''; ?>"><a href="?p=agregar_madera">Agregar madera</a></li>

                    <li class="<?php echo $pagina == 'quitar_madera' ? 'active' : ''; ?>"><a a href="?p=quitar_madera">Quitar madera</a></li>
                    
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
                <div class="contenido">
                    <div class="row">
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
