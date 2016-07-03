<?php
function generar_qr($data){
  include 'phpqrcode/qrlib.php';
  $file = 'qr/'.$data.'.png'; 
  $data = $data; 
  QRcode::png($data, $file,QR_ECLEVEL_L,7);
  echo '
      <div class="img-responsive img-rounded center-block">
        <div id="imprimirqr" class="col-md-4 col-sm-4"></div>
          <div class="center-block espacio col-md-4 col-sm-4">
            <img src="'.$file.'">
          </div>
        </div>
      </div>
        '; 
  return true;
}
?>