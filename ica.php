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
                    <p>Municipio: Ecatepec <br>Distrito Electoral Local: 6</p>
                    <div>
                         <label for="seccion">Secci&oacute;n:</label>
                        <input type="number" name="seccion" id="seccion"/>
                         <label for="tipo_casilla">Tipo Casilla:</label>
                        <input name="tipo_casilla" list="casillas" id="tipo_casilla"/>
                        <datalist id="casillas">
                            <option value="B">
                            <option value="C">
                            <option value="XT">
                            <option value="XTC">
                        </datalist>
                         <label for="casilla_number">N&uacute;mero:</label>
                        <input type="number" name="casilla_number" id="casilla_number"/>
                        
                    </div>
                    <br/>
                    <div>
                         <label for="boletas_sobrantes">Boletas sobrantes e inutilizadas:</label>
                        <input type="number" name="boletas_sobrantes" id="boletas_sobrantes"/>
                         <label for="voto_nominal">Personas que votaron:</label>
                        <input type="number" name="voto_nominal" id="voto_nominal"/>
                         <label for="voto_rc">Representantes partidos:</label>
                        <input type="number" name="voto_rc" id="voto_rc"/>
                        <br/><br/>
                         <label for="votos_emitidos1">Votos emitidos:</label>
                        <output name="votos_emitidos1" id="votos_emitidos1" for="voto_nominal voto_rc"></output><br/><br/>
                         <label for="votos_escrutados">Votos sacados de la urna:</label>
                        <input type="number" name="votos_escrutados" id="votos_escrutados" oninput="votos_emitidos1.value=parseInt(voto_nominal.value)+parseInt(voto_rc.value)"/>
                        <p>El número de votos sacados de la urna debe ser igual a la suma de los depositados por los electores 
                        registrados en la lista nominal más los representantes de partidos en la casilla que votaron sin estar incluídos
                        en la lista nominal.</p>
                    </div>
                    <div>
                        <h1>Resultados de la votaci&oacute;n</h1>
                         <label for="PRI">PRI:</label><input type="number" name="PRI" id="PRI"/>
                         <label for="PVEM">PVEM:</label><input type="number" name="PVEM" id="PVEM"/>
                         <label for="NA">NA:</label><input type="number" name="NA" id="NA"/>
                         <label for="VR">VR:</label><input type="number" name="VR" id="VR"/>
                         <br/><br/>
                         <label for="PAN_PRD_MC">México Al Frente:</label><input type="number" name="PAN_PRD_MC" id="PAN_PRD_MC"/>
                         <br/>
                         <label for="MC">MC:</label><input type="number" name="MC" id="MC"/>
                         <label for="PAN">PAN:</label><input type="number" name="PAN" id="PAN"/>
                         <label for="PRD">PRD:</label><input type="number" name="PRD" id="PRD"/>
                         <br/>
                         <label for="PAN_PRD">PAN/PRD:</label><input type="number" name="PAN_PRD" id="PAN_PRD"/>
                         <label for="PAN_MC">PAN/MC:</label><input type="number" name="PAN_MC" id="PAN_MC"/>
                         <label for="PRD_MC">PRD/MC:</label><input type="number" name="PRD_MC" id="PRD_MC"/>
                         <br/><br/>
                         <label for="MORENA_PES_PT">Juntos haremos historia:</label><input type="number" name="MORENA_PES_PT" id="MORENA_PES_PT"/>
                         <br/>
                         <label for="MORENA">MORENA:</label><input type="number" name="MORENA" id="MORENA"/>
                         <label for="PES">PES:</label><input type="number" name="PES" id="PES"/>
                         <label for="PT">PT:</label><input type="number" name="PT" id="PT"/>
                         <br/>
                         <label for="MORENA_PES">MORENA/PES:</label><input type="number" name="MORENA_PES" id="MORENA_PES"/>
                         <label for="MORENA_PT">MORENA/PT:</label><input type="number" name="MORENA_PT" id="MORENA_PT"/>
                         <label for="PES_PT">PES/PT:</label><input type="number" name="PES_PT" id="PES_PT"/>
                         <br/><br/>
                         <label for="NO_REGISTRADOS">Candidatos no registrados:</label><input type="number" name="NO_REGISTRADOS" id="NO_REGISTRADOS"/>
                         <label for="NULOS">Votos Nulos:</label><input type="number" name="NULOS" id="NULOS"/>
                         <br/><br/>
                         <label for="votos_emitidos2">Suma de votos emitidos:</label>
                        <output name="votos_emitidos2" id="votos_emitidos2" for=""></output><br/>
                        <p>La suma de votos por partido, coalición o combinaciones de estos, más los nulos y los que van a candidatos no registrados
                        debe ser igual al número de votos sacados de la urna en un principio.</p>
                        <br/>
                         <label for="cobertura_rc">¿Se cubrió la casilla con un RC de MORENA?</label>
                        <input type="radio" name="cobertura_rc" value="1" id="cobertura_rc"/> S&iacute;
                        <input type="radio" name="cobertura_rc" value="0" checked/> No <br/><br/>
                         <label for="nombre_rc">Nombre RC MORENA/PES/PT:</label><input type="text" name="nombre_rc" id="nombre_rc"/>
                    </div>
                    <br/>
                    <div>
                         <input type="submit" value="Registrar acta"/></div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    
</html>