<?php
include "consultasBD.php";
include "conexionBD.php";
session_start();
$conexion=conectar();

if($_POST['tipo']==0)
    editarAdministrador($conexion);
if($_POST['tipo']==1)
    editarUsuarios($conexion);
else
if($_POST['tipo']==2)
    editarSodas($conexion);
else
if($_POST['tipo']==4)
    borrarPlatillos($conexion);

function editarAdministrador($conexion){
echo consultarBaseSinRetornar(modificarAdministrador(),$conexion,
array($_POST['correo'],$_POST['nombre'],$_POST['clave']));
}

function editarUsuarios($conexion){
echo consultarBaseSinRetornar(modificarUsuario(),$conexion,
array($_POST['correo'],$_POST['nombre'],$_SESSION['correoUsuario'],$_POST['clave']));
}

function editarSodas($conexion){
echo consultarBaseSinRetornar(modificarSoda(),$conexion,
array($_POST['nombresoda'],$_POST['sedesoda'],$_POST['id']));
}

function borrarPlatillos($conexion){
echo consultarBaseSinRetornar(eliminarPlatillo(),$conexion,
array($_POST['nombre'],$_POST['dia'],$_POST['soda']));
}
?>
