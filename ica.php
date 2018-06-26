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
    ?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>Interfaz de Captura de Actas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=viewport-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/ica.css">
        <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery171.js" type="text/javascript"></script> 
	    <script src="js/jquery.validate.js" type="text/javascript"></script>
	    <script src="js/jquery.alerts.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div class="main">
            <nav>
                <a href="principal.php">Regresar al Men&uacute;</a>
                <a href="exit.php">Salir</a>
            </nav>
            <div class="acta">
                <p>Captura los datos que se te piden a continuación, con mucho cuidado y precisión, según tu</p>
                <h1>ACTA DE ESCRUTINIO Y CÓMPUTO DE CASILLA</h1>
                <h3>PARA DIPUTADO/A LOCAL</h3>
                <form name="aldana6" method="POST" action="altaacta.php">
                    
                </form>
            </div>
        </div>
    </body>
    
</html>