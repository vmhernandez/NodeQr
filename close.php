<?php
require_once 'head.php';
?>
<!doctype html>
<html>
<body>
<?php
    session_start();
    session_destroy();
//    echo "Cerraste Sesion.";
//    echo"<br><a href='index.php'>Volver a incio</a>";

echo ("<SCRIPT LANGUAGE='JavaScript'>
    
    window.location.href='index.php';
    </SCRIPT>");
?>
</body>
</html>