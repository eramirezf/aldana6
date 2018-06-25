<?php
    /*Code taken from www.notas-programacion.com
    Code provided 'as is', no liabilities, all rights reserved to them.
    Code modified to satisfy own purposes. No commercial use, just education purposes*/
    $conexio;
    function connect_db() {
        global $conexio;
        //Definir datos de conexion con el servidor mySQL
        $db_user = "eramirezf";
        $db_pass = "";
        $db_server = "127.0.0.1";
        $db_name = "c9";
        
        //Conectar
        $conexio = mysql_connect($db_server, $db_user, $db_pass) or die (mysql_error());
        //Seleccionar la DB c9
        mysql_select_db($db_name, $conexio) or die (mysql_error());
    }
?>