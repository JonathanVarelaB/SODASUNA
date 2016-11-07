<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> UNA</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="imagenes/una2.png">
    </head>
    <body>
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div id="aviso"></div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 form-text">
                                <h1 style="color:white"><strong>SODAS <label id="tituloTabla"> UNA</label></strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3 id='titulo'>Acceso de usuario</h3>
                                    <p id='subtitulo'>Ingrese su correo electrónico y su contraseña:</p>
                                </div>
                                <div class="form-top-right">
                                    <img  src="imagenes/una2.png"/>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="" method="post" id="acceso">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Correo electrónico</label>
                                        <input onclick="quitarAviso()" type="email" maxlength="50" required name="form-username" placeholder="Correo electrónico..." class="form-username form-control" id="correo">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Contraseña</label>
                                        <input onclick="quitarAviso()" type="password" maxlength="12" required name="form-password" placeholder="Contraseña..." class="form-password form-control" id="contrasena">
                                    </div>
                                    <div class="form-group">
                                        <a id='olvido'>¿Olvido su contraseña?</a>
                                    </div>
                                    <button id='accionLogin' type="submit" class="btn">Ingresar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-top">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                                    <?php include 'includes/pie.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="js/scriptFormularios.js"></script>
<script src="js/scriptFunciones.js"></script>
<script>
jQuery(document).ready(function() {
    $.backstretch("assets/img/backgrounds/1.jpg");
});
</script>