<?php
  include "funciones.php"
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="estiloLeerQR.css">
  </head>

  <body>
    <div class="contenedor">
      <header>
        <img class="logo" src="masisa.png">
      </header>
      <div class="principal2">
        <div class="madera">
          <h2>Maderas</h2>
          <?php
        listar_madera_todas()
        ?>
        </div>
        </div>
      </div>
    </div>
  </body>

  </html>