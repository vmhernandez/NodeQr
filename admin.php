<?php
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
                    else echo "<a class='loquito' href='login_administrador.php'>INICIAR SESION</a>";
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
  <?php
    // Pequeña lógica para capturar la pagina que queremos abrir
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'agregar_sticker';

    // El fragmento de html que contiene la cabecera de nuestra web
    require_once 'header.php';
    require_once 'menulateral_admin.php';


    /* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */
    require_once 'paginas/' . $pagina . '.php';

    // Otra opción es validar usando un switch, de esta manera para el valor esperado le indicamos que página cargar


    // El fragmento de html que contiene el pie de página de nuestra web
    //require_once 'footer.php';
    

?>