<?php

include "consultasBD.php";
include "conexionBD.php";
session_start();
$conexion = conectar();

if($_POST['tipo']==0)
ingresarAdministrador($conexion);
if($_POST['tipo']==1)
ingresarUsuarios($conexion);
else
if($_POST['tipo']==2)
ingresarSodas($conexion);
else
if($_POST['tipo']==4)
ingresarplatillo($conexion);
else
if($_POST['tipo']==5)
asignarSoda($conexion);

function ingresarAdministrador($conexion){
echo consultarBaseSinRetornar(insertarAdministrador(), $conexion,
 array($_POST['correo'], $_POST['contrasena'], $_POST['nombre']));
}


function ingresarUsuarios($conexion){
echo consultarBaseSinRetornar(insertarUsuario(), $conexion,
 array($_POST['correo'], $_POST['contrasena'], $_POST['nombre'], $_SESSION['correoUsuario']));
}

function ingresarSodas($conexion){
echo consultarBaseSinRetornar(insertarSodas(), $conexion,
 array($_POST['nombresoda'], $_POST['sedesoda']));
}

function asignarSoda($conexion){

echo consultarBaseSinRetornar(asigSodas(), $conexion,
 array($_POST['clave'], $_SESSION['correoUsuario'], $_POST['sodaA']));
}

function ingresarplatillo($conexion){
//try{
    echo consultarBaseSinRetornar(insertarPlatillo(), $conexion,
    array($_POST['nombre'], $_POST['dia'], $_POST['precio'], $_POST['descripcion'], $_POST['soda']));
    //} 
    //catch(e){
    //    echo 0;
    //}
}
?>
