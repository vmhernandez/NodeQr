<?php
  require_once 'header.php';
  include "funciones.php";  
?>

<link rel="stylesheet" href="estiloValidacion.css">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
function confirmar()
{
	if(confirm('¿Estas seguro desea eliminar el mueble'))
		return true;
	else
		return false;
}
</script>

<div class="col-md-8 col-sm-8 espacio principal">
    <form action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post" onsubmit="return confirmar()">
     
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
         ?>
</body>
</html>