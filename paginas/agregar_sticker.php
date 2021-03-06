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

<div id="imprimirqr" class="center-block">
    <?php echo '<img class ="codigo center-block" src="'.$PNG_WEB_DIR.basename($filename).' "/>';?>
    <form class="formulario" method="post">
        <div>
        <?
            php id()
        ?>
        </div>
        <div class="row">
            <label class="col-sm-4 col-md-3 control-label">Nombre mueblista </label>
            <div class="col-sm-8 col-md-9">
                <select name="rut" class="form-control">
                    <?php listar_mueblistas()?>
                </select>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-4 col-md-3 control-label espacio">Codigo madera</label>
            <div class="col-sm-8 col-md-9">
                <select name="codigo" class="form-control espacio">
                    <?php listar_madera()?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input class="botonesSubmit btn-block" type="submit" name="registrar" value="Generar Qr">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo '<a class="botonesSubmit btn-block" href="'.$PNG_WEB_DIR.basename($filename).' " download>Descargar<a/>';?>
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['registrar']) ){
            conectarse();
            $id =  $_POST['id'];
            $rut = $_POST['rut'];
            $codigo = $_POST['codigo'];
            $query = "INSERT INTO  sticker (id_sticker,rut_mueblista,id_madera) 
            VALUES ('".$id."','".$rut."','".$codigo."')";
            $result = mysql_query($query)or die(mysql_error());
            echo '<script language="javascript">
            alert("Codigo generado correctamente");
            </script>';
    }?>
</div>