<?php
include "conexion.php" ;
///////////////////////////////////////////////INGRESOS////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////AGREGAR////////////////////////////////////
    ////////AGREGAR ADMINISTRADOR//////////
    function agregar_administrador($correo,$contrasena){
        $conn=conectarse();
        $SQL="INSERT INTO administrador (correo,contrasena) VALUES('".$correo."','".$contrasena."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
    
    ///////AGREGAR USUARIO////////////////////
    function agregar_usuario($correo,$contrasena,$nombre,$apellido){
        $conn=conectarse();
        $SQL="INSERT INTO usuario (correo,contrasena,nombre,apellido) VALUES ('".$correo."','".$contrasena."','".$nombre."','".$apellido."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
    
    ///////AGREGAR MADERA////////////////////
    function agregar_madera($nombre,$empresa,$uso,$descripcion){
        $conn=conectarse();
        $SQL="INSERT INTO madera (nombre,Empresa,uso,descripcion) VALUES('".$nombre."','".$empresa."','".$uso."','".$descripcion."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    ///////AGREGAR MUEBLISTA///////////////
    function agregar_mueblista($rut_mueblista,$nombre,$correo,$telefono,$direccion){
        $conn=conectarse();
        $SQL="INSERT INTO mueblista (rut_mueblista,nombre,correo,telefono,direccion) VALUES('".$rut_mueblista."','".$nombre."','".$correo."','".$telefono."','".$direccion."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
    ////////////REGISTRAR USUARIO MUEBLISTA///////////

    function registrar_mueblista($rut_mueblista,$contrasena,$nombre,$correo,$telefono,$direccion){
        $conn=conectarse();
        $SQL="INSERT INTO mueblista (rut_mueblista,nombre,contrasena,correo,telefono,direccion) VALUES('".$rut_mueblista."','".$nombre."','".$contrasena."','".$correo."','".$telefono."','".$direccion."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
    
    /////////AGREGAR STICKER//////////////////
    function agregar_sticker($rut_mueblista,$id_madera){
        $conn=conectarse();
        $SQL="INSERT INTO sticker (rut_mueblista,id_madera) VALUES('".$rut_mueblista."','".$id_madera."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    /////////////AGREGAR MUEBLE//////////////
    function agregar_mueble($correo,$id_sticker,$foto,$calificacion,$tipo){
        $conn=conectarse();
        $SQL="INSERT INTO mueble (correo,id_sticker,foto,calificacion,tipo) VALUES('".$correo."','".$id_sticker."','".$foto."','".$calificacion."','".$tipo."')";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
/////////////////////////////////////////MODIFICAR//////////////////////////////////////////////

    //////////MODIFICAR DATOS DEL USUARIO/////
    function modificar_datos_usuario($correo,$nombre,$apellido){
        $conn=conectarse();
        $SQL="UPDATE usuario SET nombre='".$nombre."',apellido='".$apellido."' WHERE correo='".$correo."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    //////////MODIFICAR CONTRASEÑA DEL USUARIO////
    function modificar_pass_usuario($correo,$contrasena){
        $conn=conectarse();
        $SQL="UPDATE usuario SET contrasena='".$contrasena."' WHERE correo='".$correo."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    //////////MODIFICAR INFORMACION DEL MUEBLE////
    function modificar_mueble($id_mueble,$foto,$calificacion,$tipo){
        $conn=conectarse();
        $SQL="UPDATE mueble SET foto='".$foto."',calificacion='".$calificacion."',tipo='".$tipo."' WHERE id_mueble='".$id_mueble."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
    
    //////////MODIFICAR STICKER////
    function modificar_sticker($id_sticker,$rut_mueblista,$id_madera){
        $conn=conectarse();
        $SQL="UPDATE sticker SET rut_mueblista='".$rut_mueblista."',id_madera='".$id_madera."' WHERE id_sticker='".$id_sticker."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    
    //////////MODIFICAR MUEBLISTA////
    function modificar_mueblista($rut_mueblista,$nombre,$correo,$telefono,$direccion){
        $conn=conectarse();
        $SQL="UPDATE mueblista SET nombre='".$nombre."',correo='".$correo."', telefono='".$telefono."', direccion='".$direccion."'WHERE rut_mueblista='".$rut_mueblista."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    //////////MODIFICAR MADERA////
    function modificar_madera($id_madera,$nombre){
        $conn=conectarse();
        $SQL="UPDATE madera SET nombre='".$nombre."' WHERE id_madera='".$id_madera."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    
    //////////MODIFICAR CONTRASEÑA ADMINISTRADOR///
    function modificar_contraseña_administrador($correo,$contrasena){
        $conn=conectarse();
        $SQL="UPDATE administrador SET contrasena='".$contrasena."' WHERE correo='".$correo."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
///////////////////////////ELIMINAR/////////////////////////
    
    ////////ELIMINAR USUARIO//////////////
    function eliminar_usuario($correo){
        $conn=conectarse();
        $SQL="DELETE FROM usuario WHERE correo='".$correo."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    ////////ELIMINAR MUEBLE//////////////
    function eliminar_mueble($id_mueble){
        $conn=conectarse();
        $SQL="DELETE FROM mueble WHERE id_mueble='".$id_mueble."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    ////////ELIMINAR STICKER//////////////
    function eliminar_sticker($id_sticker){
        $conn=conectarse();
        $SQL="DELETE FROM sticker WHERE id_sticker='".$id_sticker."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    ////////ELIMINAR MUEBLISTA//////////////
    function eliminar_mueblista($rut_mueblista){
        $conn=conectarse();
        $SQL="DELETE FROM mueblista WHERE rut_mueblista='".$rut_mueblista."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    ////////ELIMINAR MADERA//////////////
    function eliminar_madera($id_madera){
        $conn=conectarse();
        $SQL="DELETE FROM madera WHERE id_madera='".$id_madera."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }

    ////////ELIMINAR ADMINISTRADOR/////////////
    function eliminar_administrador($correo){
        $conn=conectarse();
        $SQL="DELETE FROM administrador WHERE correo='".$correo."'";
        if(mysql_query($SQL)){
            return true;
        }else{
            return false;
        }
        mysql_close();
    }
//////////////////////////////LISTAR////////////////////////////////////////////

    //////LISTAR MUEBLISTAS//////////
    function listar_mueblistas(){
        $conn=conectarse();
        $SQL="SELECT rut_mueblista FROM mueblista ORDER BY rut_mueblista";
        $result=mysql_query($SQL);
        while($row = mysql_fetch_array($result)){
            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
        }
        mysql_close();
    }

    //////LISTAR MADERA//////////
    function listar_madera(){
        $conn=conectarse();
        $SQL="SELECT id_madera FROM madera ORDER BY id_madera";
        $result=mysql_query($SQL);
        while($row = mysql_fetch_array($result)){
            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
        }
        mysql_close();
    }

    /////////LISTAR MUEBLES///////////////
    function listar_muebles($correo){
        $conn=conectarse();
        $SQL="SELECT id_mueble,id_sticker,foto,calificacion,tipo FROM mueble WHERE correo='".$correo."' ORDER BY id_mueble";
        $result=mysql_query($SQL);
        while($row = mysql_fetch_array($result)){
            echo '<option value="'.$row[0].'">'.$row[3].'/'.$row[4].'/'.$row[5].'/'.$row[6].'</option>';
        }
        mysql_close();
    }

    
    /////////LISTAR STICKERS///////////////
function listar_sticker(){
        $conn=conectarse();
        $SQL="SELECT id_sticker FROM sticker ORDER BY id_sticker";
        $result=mysql_query($SQL);
        while($row = mysql_fetch_array($result)){
            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
        }
        mysql_close();
    }
///////////////////OTRAS FUNCIONES//////////////////////
////RECUPERAR NOMBRE DE USUARIO
function nombre_usuario($correo){
    $conn=conectarse();
    $SQL="SELECT nombre from usuario WHERE correo='".$correo."'";
    $result=mysql_query($SQL);
    while($row=mysql_fetch_array($result)){
        echo '<input name="nombre" value="'.$row[0].'">';
    
    }
    mysql_close();
}
    ///////////RECUPERAR APELLIDO DE USUARIO
function apellido_usuario($correo){
    $conn=conectarse();
    $SQL="SELECT apellido from usuario WHERE correo='".$correo."'";
    $result=mysql_query($SQL);
    while($row=mysql_fetch_array($result)){
        echo '<input name="apellido" value="'.$row[0].'">';
    }
    mysql_close();
}

//////////////////PRUEBA FUNCIONALIDAD GENERAR STICKER Y QR/////////////////////////////////////////////////
    function agregar_sticker2($rut_mueblista,$id_madera){
        $conn=conectarse();
        $SQL="INSERT INTO sticker (rut_mueblista,id_madera) VALUES('".$rut_mueblista."','".$id_madera."')";
        mysql_query($SQL);
        ///////////DONDE ESTA EL PROBLEMAA??????????????//////////////////////77
        $SQL2="SELECT FROM sticker WHERE rut_mueblista='".$rut_mueblista."' AND id_madera'".$id_madera."'";
        $result2=mysql_query($SQL2);
        while($row=mysql_fetch_array($result2)){
            $id_sticker = $row[0];
        }
        mysql_close();
        return $id_sticker;
    }

///////////////////////LISTAR MUEBLISTA SEGUN EL STICKER//////////////////////////////
    function listar_mueblista_sticker($id_sticker){
        $conn=conectarse();
        $SQL="SELECT rut_mueblista, nombre, telefono, correo, direccion,calificacion FROM mueblista WHERE mueblista.rut_mueblista=(SELECT rut_mueblista from sticker where id_sticker='".$id_sticker."')";
        $result=mysql_query($SQL);
        while($row=mysql_fetch_array($result)){  
          echo '
            <ul class="list-group text-center">
                 <li class="list-group-item">'.$row[1].'</li>
                 <li class="list-group-item">'.$row[2].'</li>
                 <li class="list-group-item">'.$row[3].'</li>
                 <li class="list-group-item">'.$row[4].'</li>
                 <li class="list-group-item">'.$row[5].'</li>
                 </ul>
             <input id="rut_mueblista" type="hidden" name="rut_mueblista" value="'.$row[0].'">';
        }
        mysql_close();
        return $id_sticker;
    }

//////////////////LISTAR MADERA SEGUN EL STICKER/////////////
    function listar_madera_sticker($id_sticker){
        $conn=conectarse();
        $SQL="SELECT id_madera, nombre, empresa, uso, descripcion FROM madera WHERE madera.id_madera=(SELECT id_madera from sticker where id_sticker='".$id_sticker."')";
        $result=mysql_query($SQL);
        while($row=mysql_fetch_array($result)){
            echo '
            <meta charset="UTF-8">
            <ul class="list-group text-center">
                  <li class="list-group-item">Nombre: '.$row[1].'</li>
                  <li class="list-group-item">Empresa: '.$row[2].'</li>
                  <li class="list-group-item">Uso: '.$row[3].' </li>
                  <li class="list-group-item">Descripcion: '.$row[4].' </li>
            </ul>';
        }
      
        mysql_close();
        return $id_sticker;
    }

function listar_muebles_mueblista($rut_mueblista){
    $conn=conectarse();
    $SQL="SELECT correo,tipo, calificacion FROM mueble JOIN sticker USING (id_sticker) WHERE sticker.rut_mueblista='".$rut_mueblista."'";
     $result=mysql_query($SQL);
        while($row=mysql_fetch_array($result)){
            echo '
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="img/mueble.png" class="img-responsive img-rounded">
            </div>
            <ul class="list-group col-md-8 col-sm-8 col-xs-8">
                  <li class="list-group-item">'.$row[0].' </li>
                  <li class="list-group-item">'.$row[1].' </li>
                  <li class="list-group-item">'.$row[2].' </li>
            </ul>
          </div>';
        }
       //<li><img src="'.$row[0].'"></li>
    mysql_close();
  }

///////////////////LISTAR MADERAS//////////////////////////////////////////

  function listar_madera_todas(){
    $conn=conectarse();
    $SQL="SELECT nombre, empresa, uso, descripcion FROM madera";
     $result=mysql_query($SQL);
        while($row=mysql_fetch_array($result)){
            echo '
            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
            <ul class="list-group text-center col-md-4 col-sm-6 col-xs-12  ">
                 <li class="list-group-item">'.$row[0].'</li>
                 <li class="list-group-item">'.$row[1].'</li>
                 <li class="list-group-item">'.$row[2].'</li>
                 <li class="list-group-item">'.$row[3].'</li>
                 
                 </ul>';
        }
    mysql_close();
  }

    function id(){
               $conn=conectarse();
              $SQL="SELECT MAX(id_sticker) FROM sticker";
              $result=mysql_query($SQL);
              while($row = mysql_fetch_array($result)){
                $id=$row[0]+1;
                echo '<input name="id" value='.$id.' class="form-control"readonly>';
              }
              mysql_close();
    }

///////////////////////////////RANKING/////////////////////////////////////////
function ranking_mueblista(){
    $conn=conectarse();
    $SQL="SELECT nombre,telefono,direccion FROM mueblista ORDER BY calificacion DESC";
    $result=mysql_query($SQL);
    $ranking = 0;
    while($row=mysql_fetch_array($result)){
    $ranking = $ranking + 1;
      echo'<meta charset="UTF-8">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="img/men.jpg" class="img-responsive img-rounded">
            </div>
            <ul class="list-group col-md-8 col-sm-8 col-xs-8">
                  <li class="list-group-item"><h4>'.$ranking.'. '.$row[0].'</h4></li>
                  <li class="list-group-item">'.$row[1].' </li>
                  <li class="list-group-item">'.$row[2].' </li>
            </ul>
          </div>';
    }
    mysql_close();
  }
function ranking(){
    $conn=conectarse();
    $SQL="SELECT nombre,telefono,direccion FROM mueblista ORDER BY calificacion DESC";
    $result=mysql_query($SQL);
    $ranking = 0;
    while($row=mysql_fetch_array($result)){
    $ranking = $ranking + 1;
      echo'<meta charset="UTF-8">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="img/men.jpg" class="img-responsive img-rounded">
            </div>
            <ul class="list-group col-md-8 col-sm-8 col-xs-8">
                  <li class="list-group-item"><h4>'.$ranking.'. '.$row[0].'</h4></li>
                  <li class="list-group-item">'.$row[1].' </li>
                  <li class="list-group-item">'.$row[2].' </li>
            </ul>
          </div>';
    }
    mysql_close();
  }
  function mostrar_datos_mueblista($rut){
      $conn=conectarse();
      $SQL="SELECT nombre, correo, telefono, direccion FROM mueblista WHERE rut_mueblista='".$rut."'";
      $result=mysql_query($SQL);
      while($row =mysql_fetch_array($result)){
      echo '
          <div class="col-sm-8 col-md-9">
          <input name="nombre" value='.$row[0].' class="form-control" type="text">
          </div>
          <div class="col-sm-8 col-md-9">
            <input name="correo" value='.$row[1].' class="form-control" type="email">
          </div>
          <div class="col-sm-8 col-md-9">
          <input name="telefono" value='.$row[2].' class="form-control" type="number">
          </div>
          <div class="col-sm-8 col-md-9">
            <input name="direccion" value='.$row[3].' class="form-control" type="text">
          </div>';
      }
        mysql_close();
  }

  function clave_mueblista($rut){
      $conn=conectarse();
      $SQL="SELECT contrasena FROM mueblista WHERE rut_mueblista='".$rut."'";
      $result=mysql_query($SQL);
      while($row =mysql_fetch_array($result)){
      echo '
          <div class="col-sm-8 col-md-9">
          <input name="contrasena" value='.$row[0].' class="form-control" type="hidden">
          </div>';
      }
        mysql_close();
  }


?>