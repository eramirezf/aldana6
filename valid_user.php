<?php
    /*Code taken from www.notas-programacion.com
    Code provided 'as is', no liabilities, corresponding rights reserved to them.
    Code modified to satisfy own purposes. No commercial use, just education purposes*/
    
    //Connect to DB
    include("connect_db.php");
    connect_db();
    
    sleep(10);
    
    $usr = $_POST['usuario'];
    $pw = $_POST['password'];
    //Versión encriptada del password
    $pw_enc = md5($pw);
    
    $sql = "SELECT id FROM users WHERE name = '".$usr."' && password = '".$pw."';";
    $result = mysql_query($sql, $conexio);
    
    $uid = "";
    
    //Si existe al menos una fila
    if($fila = mysql_fetch_array($result)) {
        //Obtener ID usuario en DB:
        $uid = $fila['id'];
        //Iniciar una sesión de PHP
        session_start();
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado'] = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['uid'] = $uid;
        //CODIGO DE SESIÓN
        
        //Crear un formulario para redireccionar al usuario y enviar oculto su id
        ?>
        <form name="formulario" method="POST" action="principal.php">
            <input type="hidden" name="idUsr" value='<?php echo $uid ?>'/>
        </form>
        <?php
    }
    else {
        //en caso de no existir en el resutado de la consulta a la DB
        //ninguna fila, redirecciona al login con un mensaje de 
        //error
        ?>
        <form name="formulario" method="POST" action="index.php">
            <input type="hidden" name="msg_error" value="1">
        </form>
        <?php
    }
?>

<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>