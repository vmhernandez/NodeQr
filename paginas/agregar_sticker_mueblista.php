<?php        
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'paginas/temp/';

    require_once 'phpqrcode.php';
    require_once 'funciones.php';
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 6;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['id'])) { 
    
        //it's very important!
        if (trim($_REQUEST['id']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['id'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['id'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    }  
        
    //config form
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
    <div id="imprimirqr" class="center-block">
      <?php echo '<img class ="center-block espacio" src="'.$PNG_WEB_DIR.basename($filename).' "/>';?>

        <form class="form-horizontal" action="<?php echo $pagina == 'agregar_sticker_mueblista' ?>" method="post">

          <div class="col-md-4 col-sm-4"></div>
          <div class="center-block espacio col-md-4 col-sm-4">
            <?php id()
              ?>
          </div>
          <div class="col-md-4 col-sm-4"></div>
    </div>
    <div class="col-md-12">
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
if(isset($_POST['registrar']) ){
      conectarse();
        $id =  $_POST['id'];
        $rut = $namex;
        $codigo = $_POST['codigo'];
        $query = "INSERT INTO  sticker (id_sticker,rut_mueblista,id_madera) 
        VALUES ('".$id."','".$rut."','".$codigo."')";
        $result = mysql_query($query)or die(mysql_error());
        echo 'Datos ingresados correctamente'  
     ;}?>


  </div>