<?php
  require_once 'header.php';
  include "paginas/funciones.php";  
?>
  <div class="contenedor">
    <h2>Muebles asociados</h2>
    <?php
      $rut_mueblista=$namex;
      listar_muebles_mueblista($rut_mueblista);
    ?>

  </div>