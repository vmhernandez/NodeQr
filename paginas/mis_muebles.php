<?php
  require_once 'header.php';
  include "funciones.php";  
?>
<div class="col-md-8 col-sm-8 espacio principal">
    <form action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">
     
      <?php
      mis_muebles_usuario($namex)
      ?>   
  </form>
</div>
           <?php
            if(isset($_POST['eliminar'])){
                $id_mueble=$_POST['id_mueble'];
                    $resultado = eliminar_mueble($id_mueble);
                    if($resultado == true){

                header ("Location:usuario.php");
                }
            }
         ?>
</body>
</html>