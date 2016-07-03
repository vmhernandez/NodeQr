<?php
    include "paginas/funciones.php";
    require_once 'header.php';
?>
        <script> // QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var vidhtml = '<video id="v" autoplay></video>';

function handleFiles(f)
{
	var o=[];
	
	for(var i =0;i<f.length;i++)
	{
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

			qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]);	
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}

// CAPTURA
function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        }
        catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
//LEE
function read(a)
{
    var html="<br>";
    if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
        html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
    html+="<b>"+htmlEntities(a)+"</b><br><br>";
    document.getElementById("result").innerHTML=html;
    document.getElementById("codigo").value=a;
}	

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}

function success(stream) {
    if(webkit)
        v.src = window.webkitURL.createObjectURL(stream);
    else
    if(moz)
    {
        v.mozSrcObject = stream;
        v.play();
    }
    else
        v.src = stream;
    gUM=true;
    setTimeout(captureToCanvas, 500);
}
		
function error(error) {
    gUM=false;
    return;
}

function load()
{
	if(isCanvasSupported() && window.File && window.FileReader)
	{
		initCanvas(800, 600);
		qrcode.callback = read;
		document.getElementById("mainbody").style.display="inline";
        setwebcam();
	}
	else
	{
		document.getElementById("mainbody").style.display="inline";
		document.getElementById("mainbody").innerHTML='<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>'+
        '<br><p id="mp2">sorry your browser is not supported</p><br><br>'+
        '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
	}
}

function setwebcam()
{
	document.getElementById("result").innerHTML="- scanning -";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");

    if(n.getUserMedia)
        n.getUserMedia({video: true, audio: false}, success, error);
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video: true, audio: false}, success, error);
    }
    else
    if(n.mozGetUserMedia)
    {
        moz=true;
        n.mozGetUserMedia({video: true, audio: false}, success, error);
    }
    document.getElementById("qrimg").style.opacity=0.2;
    document.getElementById("webcamimg").style.opacity=1.0;
    stype=1;
    setTimeout(captureToCanvas, 500);
}
</script>
        <script type="text/javascript" src="paginas/llqrcode.js"></script>
        <script src="paginas/jquery-1.12.3.js"></script>
           
            <div class="col-md-8 espacio principal">
                <div style="display:none" id="result"></div>
	            <div class="selector" id="webcamimg" onclick="setwebcam()" align="left" ></div>
                <div class="selector" id="qrimg" onclick="setimg()" align="right" ></div>
                <center id="mainbody"><div id="outdiv"></div></center>
                
                <canvas id="qr-canvas" width="200" height="200"></canvas>
                <script type="text/javascript">load();</script>
                
                <form class="form-horizontal" method="post" action="<?php echo $pagina == 'mis_muebles' ?>" enctype="multipart/form-data">
                <div class="col-sm-6">
                <input id="codigo" type="text" name="txtCodigo" class="form-control espacio">
                </div>
                <div class="col-sm-6">
                   <tr>
                    <td>Foto</td>
                    <td><input name="foto" type="file"></td>
                </tr>
                </div>
                <div class="col-sm-6">
                <input id="calificacion" type="number" min="1" max="5" name="calificacion" class="form-control espacio">
                </div>
                <div class="col-sm-6">
                   <tr>
                    <td>Tipo</td>
                    <td>
                        <select name="tipo">
                            <option value="Cocina">Cocina</option>
                            <option value="Baño">Baño</option>
                            <option value="Comedor">Comedor</option>
                            <option value="Dormitorio">Dormitorio</option>
                        </select>
                    </td>
                </tr>
                  </div>
                <td width="103" align="center" valign="middle"><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
            </form>
        </table>
    </body>
         <?php
            if(isset($_POST['guardar'])){
                $correo=$_SESSION['correo'];
                $id_sticker=$_POST['txtCodigo'];
                
                $ruta = "C:\wamp\www\NodeQr\paginas\Imagenes\..";
                opendir($ruta);
                $destino = $ruta.$_FILES['foto']['name'];
                copy($_FILES['foto']['tmp_name'],$destino);
                $foto=$_FILES['foto']['name'];
                
                $calificacion=$_POST['calificacion'];
                $tipo=$_POST['tipo'];
                if (($correo == "")|| ($id_sticker=="")||($foto=="")|| ($calificacion=="")|| ($tipo=="")){
                }else{
                    $resultado = agregar_mueble($correo, $id_sticker,$foto,$calificacion,$tipo);
                    if($resultado == true){
                    }
                header ("Location:");
                }
            }
         ?>
</html>