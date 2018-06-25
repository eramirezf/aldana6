<html>
    <head>
        <title>Aldana6 | M&eacute;xico 2018</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=viewport-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery171.js" type="text/javascript"></script> 
	    <script src="js/jquery.validate.js" type="text/javascript"></script>
	    <script src="js/jquery.alerts.js" type="text/javascript"></script>
        
        <script type="text/javascript">
	    <!--
			$(document).ready(function() {
					$("#frmlogin").validate();
					$("#usuario").focus();
			});
	    // -->
	</script>
    </head>
    
    <body>
        

        <div class="central">
            <h1>Aldana6 | Resultados electorales</h1>
            <div>
                <form id="frmlogin" name="frmlogin"  method="POST" action="valid_user.php">
                    <div class="frm">
                        <h4>Usuario:</h4>
                    </div>
                    <div class="frm">
                        <input type="text" name="usuario" id="usuario" class="required" maxlength="50">
                    </div>
                    <div class="frm">
                        <h4>Contraseña:</h4>
                    </div>
                    <div class="frm">
                        <input type="password" name="password" id="password" class="required"  maxlength="50">
                    </div>
                    <div class="frm">
                         <input type="submit" name="enviar" value="Enviar" >
                    </div>
                    
                    <?php
     
    //Mostrar errores de validacion de usuario, en caso de que lleguen
     
        if( isset( $_POST['msg_error'] ) )
        {
            switch( $_POST['msg_error'] )
            {
                case 1:
            ?>
            <script type="text/javascript">
                jAlert("El usuario o password son incorrectos.", "Seguridad");
                $("#password").focus();
            </script>
            <?php
                break;         
                case 2:
            ?>
            <script type="text/javascript">
                jAlert("La seccion a la que intentaste entrar esta restringida.\n Solo permitida para usuarios registrados.", "Seguridad");
            </script>
            <?php       
                break;
            }       //Fin switch
        }
        ?>
                </form>
            </div>
            
        </div>
    </body>
</html>