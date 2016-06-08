<!DOCTYPE html>
<html lang="en">
    <?php
    include '../../includes/head.php';
    session_start();
    if(!isset($_SESSION['nombreUsuario']))
    {
        header('Location: ../../index.php');
    }
    ?>
    <body>
        <?php include '../../includes/encabezado.php'; ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"><strong>SODAS UNA</strong></a>
                </div>
                <ul class="nav navbar-nav">
                    <li id="inicio" class="active"><a><label id="inicioAdmin">Inicio</label></a></li>
                    <li id="administradores"><a><label id="administradoresAdmin">Administradores</label></a></li>
                    <li id="usuarios"><a><label id="usuariosAdmin">Usuarios</label></a></li>
                    <li id="sodas"><a><label id="sodasAdmin">Sodas</label></a></li>
                </ul>
            </div>
        </nav>
        <div class="contenido">
            <div id="bienvenida">
                <div class="container">
                    <br><br><img style="width:50px;" src="../../imagenes/user.png" /><br>
                    <label style="color:darkred;"><h3>Bienvenido(a) </h3></label><br>
                </div>
            </div>
        </div>
        <div class="contenidoEditable">

        </div>
    </body>
    <?php include '../../includes/pie.php'; ?>
</html>
<?php include '../../includes/scripts.php'; ?>
