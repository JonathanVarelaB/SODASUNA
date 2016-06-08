<div class='encabezado'>
    <div class="container una">
        <nav class="navbar navbar-nav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="http://www.una.ac.cr"><img style="width: 170px;" src="../../imagenes/3.png"></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li id='nombreUS'><label style='padding: 15px' class='form-control-static'><span style="padding-right: 10px;" class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombreUsuario']; ?></label></li>
                    <li><a id='cambioCont' style="color:black;"><span style="padding-right: 10px;" class="glyphicon glyphicon-lock"></span><label>Cambio de contraseña</label></a></li>
                    <li><a id='cerrar' style="color:black;"><span style="padding-right: 10px;" class="glyphicon glyphicon-log-in"></span><label>Cerrar Sesión</label></a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>