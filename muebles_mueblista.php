<?php
  require_once 'header.php';
  include "paginas/funciones.php";
?>
  <!DOCTYPE html>
  <html>

  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="estiloLeerQR.css">
    <script type="text/javascript" src="./llqrcode.js"></script>
    <script src="jquery-1.12.3.js"></script>
  </head>

  <body>
    <div class="contenedor">
          <h2>Muebles asociados</h2>
          <?php
          if(isset($_POST['consulta'])){
          $rut_mueblista=$_POST['rut_mueblista'];
          if(($rut_mueblista == "")){  
          }else{
            $resultado = listar_muebles_mueblista($rut_mueblista);
          }
          }
          ?>
    
    </div>
  </body>

  </html>