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
    
    //Pasar los parámetros del POST a variables locales
    $seccion = $_POST['seccion'];
    $tipo_casilla = $_POST['tipo_casilla'];
    $numero_casilla = $POST['casilla_number'];
    $id = "";
    $id = $seccion.$tipo_casilla.$numero_casilla;
    $boletas_sobrantes = (int)$_POST['boletas_sobrantes'];
    $voto_nominal = (int)$_POST['voto_nominal'];
    $voto_rc = (int)$_POST['voto_rc'];
    $votos_emitidos1 = $voto_nominal + $voto_rc;
    $votos_escrutados = (int)$_POST['votos_escrutados'];
    $incidencia1 = (votos_escrutados == votos_emitidos1);
    $PRI = (int)$_POST['PRI'];
    $PVEM = (int)$_POST['PVEM'];
    $NA = (int)$_POST['NA'];
    $VR = (int)$_POST['VR'];
    $MC = (int)$_POST['MC'];
    $PAN_PRD_MC = (int)$_POST['PAN_PRD_MC'];
    $PAN = (int)$_POST['PAN'];
    $PRD = (int)$_POST['PRD'];
    $PAN_PRD = (int)$_POST['PAN_PRD'];
    $PAN_MC = (int)$_POST['PAN_MC'];
    $PRD_MC = (int)$_POST['PRD_MC'];
    $MORENA = (int)$_POST['MORENA'];
    $MORENA_PES_PT = (int)$_POST['MORENA_PES_PT'];
    $PES = (int)$_POST['PES'];
    $PT = (int)$_POST['PT'];
    $MORENA_PES = (int)$_POST['MORENA_PES'];
    $MORENA_PT = (int)$_POST['MORENA_PT'];
    $PES_PT = (int)$_POST['PES_PT'];
    $NO_REGISTRADOS = (int)$_POST['NO_REGISTRADOS'];
    $NULOS = (int)$_POST['NULOS'];
    $votos_emitidos2 = $PRI + $PVEM + $NA + $VR + $MC + $PAN_PRD_MC + $PAN + $PRD + $PAN_PRD + $PAN_MC + $PRD_MC + $MORENA + $MORENA_PES_PT + $PES + $PT + $MORENA_PES + $MORENA_PT + $PES_PT;
    $incidencia2 = ($votos_emitidos2 == $votos_escrutados);
    $cobertura_rc = $_POST['cobertura_rc'];
    $nombre_rc = $_POST['nombre_rc'];
    
    $sql = "INSERT INTO resultados(id, seccion, tipo_casilla, numero_casilla, boletas_sobrantes, voto_nominal, voto_rc, votos_emitidos1,
    votos_escrutados, incidencia1, PRI, PVEM, NA, VR, MC, PAN_PRD_MC, PAN, PRD, PAN_PRD, PAN_MC, PRD_MC, MORENA, MORENA_PES_PT, 
    PES, PT, MORENA_PES, MORENA_PT, PES_PT, NO_REGISTRADOS, NULOS, votos_emitidos2, incidencia2, cobertura_rc, nombre_rc) values
    ('".$id."', '".$seccion."', '".$tipo_casilla."', '".$numero_casilla."', '".$boletas_sobrantes."', '".$voto_nominal."', 
    '".$voto_rc."', '".$votos_emitidos1."', '".$votos_escrutados."', '".$incidencia1."',
    '".$PRI."', '".$PVEM."', '".$NA."', '".$VR."', '".$MC."', '".$PAN_PRD_MC."', '".$PAN."', '".$PRD."', 
    '".$PAN_PRD."', '".$PAN_MC."', '".$PRD_MC."', 
    '".$MORENA."', '".$MORENA_PES_PT."', '".$PES."', '".$PT."', '".$MORENA_PES."', '".$MORENA_PT."', '".$PES_PT."', 
    '".$NO_REGISTRADOS."', '".$NULOS."', '".$votos_emitidos2."', '".$incidencia2."', '".$cobertura_rc."', '".$nombre_rc."')";
    $result = mysql_query($sql, $conexio);
    
    //Next let's create a form to inform the status
    if ($result) {
        ?>
        <!-- This is if insert results correct -->
        <form name="formulario" method="POST" action="principal.php">
            <input type="hidden" name="msg_error" value="1"> 
        </form>
        <?php
    }
    else {
        ?>
         <form name="formulario" method="POST" action="principal.php">
            <input type="hidden" name="msg_error" value="0">
         </form>
        <?php
    }
?>

<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>