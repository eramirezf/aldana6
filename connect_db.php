<?php
    /*Code taken from www.notas-programacion.com
    Code provided 'as is', no liabilities, all rights reserved to them.
    Code modified to satisfy own purposes. No commercial use, just education purposes*/
    $conexio;
    function connect_db() {
        global $conexio;
        //Definir datos de conexion con el servidor mySQL
        $db_user = getenv('C9_USER');
        $db_pass = "";
        $db_server = getenv('IP');
        $db_name = "c9";
        $db_port = 3306;
        
        //Conectar
        $conexio = mysql_connect($db_server, $db_user, $db_pass) or die (mysql_error());
        //$conexio = new mysqli($db_server, $db_user, $db_pass, $db_name, $db_port);
        //Check connection
        /*if($conexio->connect_error) {
            die("Connection failed: " . $conexio->connect_error);
        }
        echo "Connected successfully (" . $conexio->host_info .")";
        sleep(10);*/
        //Seleccionar la DB c9
        mysql_select_db($db_name, $conexio) or die (mysql_error());
        
    }
?>