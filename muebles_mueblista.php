<?php
  include "funciones.php"
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="estiloLeerQR.css">
    <script type="text/javascript" src="./llqrcode.js"></script>
    <script src="jquery-1.12.3.js"></script>
  </head>

  <body>
    <div class="contenedor">
      <header>
        <img class="logo" src="masisa.png">
      </header>
      <div class="principal2">
        <div class="madera">
          <h2>Muebles</h2>
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
      </div>
    </div>
  </body>

  </html>