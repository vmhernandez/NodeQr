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
         
    <?php
            if(isset($_POST['editar'])){
              $id_mueble=$POST['id_mueble'];
                header ("Location:usuario.php");
                }
         ?>
         
  <script>
    function boton(){
      var el1=document.querySelector('.c1').removeAttribute('readonly', true);
      el1;
      var el2=document.querySelector('.c2').removeAttribute('readonly', true);
      el2;
      var el3=document.querySelector('.c3').removeAttribute('readonly', true);
      el3;
    }
    document.querySelector('#modificar').addEventListener('click',boton)
  </script>
  
</body>
</html>