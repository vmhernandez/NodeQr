<?php
    include "paginas/funciones.php";
    require_once 'head.php';
?>
  <script type="text/javascript">
    function imprSelec(imprimirqr) {
      var ficha = document.getElementById(imprimirqr);
      var ventimp = window.open('', 'popimpr');
      ventimp.document.write(ficha.innerHTML);
      ventimp.document.close();
      ventimp.print();
      ventimp.close();
    }
  </script>

  <div class="col-md-8 col-sm-8 espacio principal">
    <div class="center-block">
      <form class="form-horizontal" method="post">
        <div class="col-md-4 col-sm-4"></div>
        <div class="center-block espacio col-md-4 col-sm-4">
          <?php id()
              ?>
        </div>
        <div class="col-md-4 col-sm-4"></div>
    </div>
    <div class="col-md-12">

      <label class="col-sm-4 col-md-3 control-label espacio">Rut mueblista </label>
      <div class="col-sm-8 col-md-9">
        <select name="rut" class="form-control espacio">
          <?php listar_mueblistas()?>
        </select>
      </div>

      <label class="col-sm-4 col-md-3 control-label espacio">Codigo madera</label>
      <div class="col-sm-8 col-md-9">
        <select name="codigo" class="form-control espacio">
          <?php listar_madera()?>
        </select>
      </div>

      <div class="col-sm-6 col-md-6">
        <input class="btn btn-primary btn-lg btn-block espacio" type="submit" name="registrar" value="GENERAR QR">
        </br>
      </div>
      <div class="col-sm-6 col-md-6">
        <a class="btn btn-primary btn-lg btn-block espacio" href="javascript:imprSelec('imprimirqr')">Imprimir</a>
        </br>
      </div>
    </div>
    </form>

    <?php  
    include "p/g.php";
        if(isset($_POST['registrar']) ){
        conectarse();
        $id =  $_POST['id'];
        $rut = $_POST['rut'];
        $codigo = $_POST['codigo'];
        $query = "INSERT INTO  sticker (id_sticker,rut_mueblista,id_madera) 
        VALUES ('".$id."','".$rut."','".$codigo."')";
        $result = mysql_query($query)or die(mysql_error());
        generar_qr($id);
     ;}
?>


  </div>