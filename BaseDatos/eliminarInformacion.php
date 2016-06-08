<?php
include "consultasBD.php";
include "conexionBD.php";
session_start();
$conexion=conectar();

if($_POST['tipo']==0)
    eliminarAdministrador($conexion);
if($_POST['tipo']==1)
    eliminarUsuarios($conexion);
else
if($_POST['tipo']==2)
    eliminarSodas($conexion);

function eliminarAdministrador($conexion){
echo consultarBaseSinRetornar(eliminarAdmin(),$conexion,
array($_POST['clave']));
}

function eliminarUsuarios($conexion){
    $band = consultarBaseSinRetornar('delete from Usuario_Soda where Usuario_PK_Correo_Electronico = ? ', $conexion, array($_POST['clave']));
    if($band)
        echo consultarBaseSinRetornar(eliminarUsu(),$conexion,array($_POST['clave']));
    else
        echo $band;
}

function eliminarSodas($conexion){
    $bandVal = consultarBaseSinRetornar('delete from Valoracion where Soda_PK_Identificador = ? ', $conexion, array($_POST['id']));
    $bandPlat = consultarBaseSinRetornar('delete from Platillo where Soda_PK_Identificador = ? ', $conexion, array($_POST['id']));
    if($bandPlat && $bandVal)
        echo consultarBaseSinRetornar(eliminarSod(),$conexion,array($_POST['id']));
    else
        echo ($bandPlat && $bandVal);
}
?>
