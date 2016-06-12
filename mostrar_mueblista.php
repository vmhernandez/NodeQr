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
          <h2>Madera</h2>
          <?php
            if(isset($_POST['consulta'])){
            $id_sticker=$_POST['txtCodigo'];
        
            if (($id_sticker == "")){
                }else{
                    $resultado = listar_madera_sticker($id_sticker);
                }
            }
        ?>
        </div>
        <form class="consultaqr" method="post" action="muebles_mueblista.php">
          <div class="mueblista">
            <h2>Mueblista</h2>
            <?php
            if(isset($_POST['consulta'])){
            $id_sticker=$_POST['txtCodigo'];
        
            if (($id_sticker == "")){
                }else{
                    $resultado = listar_mueblista_sticker($id_sticker);
                }
            }
            ?>
          </div>
          <div>
            <input type="submit" value="Consultar" name="consulta">
        </form>
        </div>
      </div>
    </div>
  </body>

  </html>