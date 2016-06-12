<?php
    function conectarse(){ 
        $link=mysql_connect("localhost","root","");
        mysql_select_db("masisa",$link) OR DIE ("Error: No es posible establecer la conexión");
    }
?>