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
        <form name="formulario" method="post" action="../index.php">
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
    if($fila = mysql_fetch_array($result))
        $nombreUsuario = $fila['name']." id: ".$_SESSION['uid'];
    //Cerrar conexión a DB:
    mysql_close($conexio);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Aldana6 | Bienvenido al inicio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=viewport-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/principal.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        
        <div class="prime">
            <h1>Bienvenido a Aldana6 <b><?php echo $nombreUsuario ?></b></h1>
            <h4>Programa de captura de resultados electorales</h4>
            <h5>Municipio de Ecatepec | Distrito Local 6</h5>
            <h5>Equipo de Apoyo a la Candidata Elba Aldana Duarte</h5>
            <p>Elige lo que quieres hacer: </p>
            <div>
                <div class="opt">
                    Captura de Actas
                </div>
                <div class="opt">
                    Resultados
                </div>
            </div>
        </div>
        
    </body>
</html>