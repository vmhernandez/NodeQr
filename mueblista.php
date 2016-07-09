
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

<div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               
               <?php $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'agregar_sticker';?>
    <li>
      <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    $namex = $_SESSION['rut'];
                    echo "<a href='mueblista.php'>BIENVENIDO: <font color=#68D800>$namex</font></a>";
                }
                    else echo "<a class='loquito' href='index.php'>INICIAR SESION</a>";
            ?>
    </li>

               
                <li class="<?php echo $pagina == 'agregar_sticker_mueblista' ? 'active' : ''; ?>"><a href="?p=agregar_sticker_mueblista">Generar QR</a></li>
                
                <li class="<?php echo $pagina == 'leer_qr' ? 'active' : ''; ?>"><a href="?p=leer_qr">Consultar QR</a></li> 
                
                <li class="<?php echo $pagina == 'mis_creaciones' ? 'active' : ''; ?>"><a href="?p=mis_creaciones">Mis creaciones</a></li>
                
                <li class="<?php echo $pagina == 'ranking' ? 'active' : ''; ?>"><a href="?p=ranking">Ranking</a></li>
                
                <li class="<?php echo $pagina == 'mis_datos_mueblista' ? 'active' : ''; ?>"><a href="?p=mis_datos_mueblista">Mis datos</a></li>
                
                <li class="<?php echo $pagina == 'cambiar_clave_mueblista' ? 'active' : ''; ?>"><a href="?p=cambiar_clave_mueblista">Modificar contraseña</a></li>
                
                <li class="<?php echo $pagina == 'eliminar_cta_mueblista' ? 'active' : ''; ?>"><a href="?p=eliminar_cta_mueblista">Eliminar mi cuenta</a></li>
    <li>
      <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    $namex = $_SESSION['rut'];
                    echo "<a href='close.php'>CERRAR SESION</a>";
                }
            ?>
    </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?php   
                    
                    require_once 'paginas/' . $pagina . '.php';
                ?>
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