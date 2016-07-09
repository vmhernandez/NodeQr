<?php
    session_start();
?>
<html>
<head>
    <?php   
        require_once 'head.php';
    ?>
</head>
    <body class="cuerpo">
        <div class="letra container">
            <?php   
             require_once 'navegacion.php';
            ?>
            <div class="row">
            <div class="col-xs-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <div class="slide img1">
                           <br>
                            <div class="col-md-6 col-md-offset-3 iContenido">
                             <h1>¿Quieres saber quién hizo tu mueble?</h1>
                             <h3><a class="presione" href="consultarqr.php">¡¡ Presiona Aquí !! </a></h3>
                             <br>
                             </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="slide img2">
                           <br>
                           <div class="col-md-6 col-md-offset-3 iContenido">
                           <h1>¡Te invitamos a conocer a nuestros mejores mueblistas!</h1>
                           <h3 ><a class="presione" href="ranking_mueblistas.php">¡¡ Presiona Aquí !! </a></h3>
                           <br>
                           </div>      
                           </div>
                           
                           
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 iContenido2">
                        <div id="iconoPersona" class="persona">
                           <h1>Login</h1>
                        </div>
                        <div class="casillas">
                            <form method="post" action="checklogin_universal.php" id="formAdmin">
                                <div class="col-md-12 col-sm-12">
                                    <input type="mail" name="correo" placeholder="&#128588; Correo"  id="correo"/>
                                </div>
                                <div class ="col-md-12 col-sm-12">
                                    <input type="password" name="contrasena" placeholder="&#128273; Password" id="contrasena"/>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <input type="submit" name="iniciar" value="Iniciar sesión" class="presionar"/>
                                </div>
                            </form>
                            <div class ="texto col-md-12 col-sm-12">
                                <a class="presione" href="registrar_usuario.php">Crear cuenta</a><br> 
                                <a class="presione" href="mail.php">¿Olvidaste tu contraseña?</a>
                            </div>
                            <?php
                                if(isset($_POST['iniciar'])){
                                    $correo=$_POST['correo'];
                                    $contrasena=$_POST['contrasena'];
                                if (($correo == "")|| ($contrasena=="")){
                                }else{
                                    header ("Location: checklogin_universal.php");
                                }
                                    }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 iContenido2">
                     <video autoplay loop>
    <source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
<source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
</video>
                    </div>
                </div>   
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function() {
        $("#formAdmin").validate({
            rules:{
                contrasena:{
                    required:true,
                    rangelength: [6,12]
                },
                correo:{
                    required:true,
                    email:true

                },  
            },
            messages:{
                contrasena:{
                    required:"Campo obligatorio",
                    rangelength:"Mínimo 6 y máximo 12 caracteres"
                },
                correo:{
                    required:"Campo obligatorio",
                    email:"Formato erróneo"
                }

            }


            });
            });
        </script>
    </body>
</html>
