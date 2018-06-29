<?php
    /*Code taken from www.notas-programacion.com
    Code provided 'as is', no liabilities, all rights reserved to them.
    Code modified to satisfy own purposes. No commercial use, just education purposes*/
    
    //Iniciar una sesión de PHP
    session_start();
    //Verificar que está logueado y existe un UID
    if(!($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid']))) {
        //Si no está autenticado, redirige al login
        ?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="2">
        </form>
        <script type="text/javascript">
            document.formulario.submit();
        </script>
        <?php
    }
    //Conectar a la DB
    include("connect_db.php");
    connect_db();
    
    //Sacar datos del usuario que ha iniciado sesión
    $sql = "SELECT name FROM users WHERE id = '".$_SESSION['uid']."'";
    $result = mysql_query($sql);
    $nombreUsuario = "";
    //Formar el nombre completo del usuario
    if($fila = mysql_fetch_array($result)) {
        $nombreUsuario = $fila['name']." id: ".$_SESSION['uid'];
    }
    //Cerrar conexión a DB:
    mysql_close($conexio);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Aldana6 | Bienvenido al inicio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=viewport-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/principal.css">
        <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery171.js" type="text/javascript"></script> 
	    <script src="js/jquery.validate.js" type="text/javascript"></script>
	    <script src="js/jquery.alerts.js" type="text/javascript"></script>
    </head>
    <body>
        
        <div class="prime">
            <h1>Bienvenido a Aldana6</h1>
            <h4>Programa de captura de resultados electorales</h4>
            <h5>Municipio de Ecatepec | Distrito Local 6</h5>
            <h5>Equipo de Apoyo a la Candidata Elba Aldana Duarte</h5>
            <p>Elige lo que quieres hacer: </p>
            <div>
                <div class="opt">
                    <a href="ica.php">Captura de Actas</a>
                </div>
                <div class="opt">
                    <a href="ir.php">Resultados</a>
                </div>
            </div>
            <div><a href="exit.php">Cerrar sesión</a></div>
        </div>
        
        <!-- Mostrar mensaje de consulta, en caso de existir -->
        <?php
            if(isset($_POST['msg_error'])) {
                switch($_POST['msg_error']) {
                    case 1:
                        ?>
                        <script type="text/javascript">
                            jAlert("Alta exitosa de acta.", "Aldana6");
                        </script>
                        <?php
                    break;
                    case 2:
                        ?>
                        <script type="text/javascript">
                            jAlert("Ocurrió un error, vuelva a intentar.", "¡ERROR!");
                        </script>
                        <?php
                    break;
                }
            }
        ?>
        
    </body>
</html>