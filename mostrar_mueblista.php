<?php
    include "paginas/funciones.php";
    require_once 'header.php';
?>
       
    <div class="container col-md-12">
           
        <div class="madera col-md-6 col-sm-6 espacio">
         <div class="panel panel-default principal">
            <div class="panel-heading"><h2>Madera</h2></div>
            <div class="fondo2">
                <img src="img/logo.png" class="center-block img-circle">
            </div>
        <form method="post" action="maderas.php">
        <?php
            if(isset($_POST['consulta'])){
            $id_sticker=$_POST['txtCodigo'];
        
            if (($id_sticker == "")){
                }else{
                    $resultado = listar_madera_sticker($id_sticker);
                }
            }
       ?>
       <input class="btn btn-primary btn-lg btn-block" type="submit" value="Ver mas" name="consulta">
        </div>
          </div>
            </form>
         <div class="mueblista col-md-6 col-sm-6 espacio">       
            <div class="panel panel-default principal">
            <div class="panel-heading"><h2>Mueblista</h2></div>
           <form class="consultaqr" style="margin-top: 0px; margin-bottom: 0px;" method="post" action="muebles_mueblista.php">
            <?php
            if(isset($_POST['consulta'])){
            $id_sticker=$_POST['txtCodigo'];
        
            if (($id_sticker == "")){
                }else{
                    $resultado = listar_mueblista_sticker($id_sticker);
                }
            }
            ?>
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Muebles asociados" name="consulta">
            </form>
          </div>
          <div>    
  </div>
</div>

            
            
   
            