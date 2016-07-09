<?php
  require_once 'head.php';
  include "paginas/funciones.php";  
?>
  <div class="contenedor">
   <div class="row">
    <?php
      $rut_mueblista=$namex;
      listar_muebles_mueblista($rut_mueblista);
    ?>