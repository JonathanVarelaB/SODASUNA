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
if($_POST['tipo']==3)
    desasignarSoda($conexion);
else
if($_POST['tipo']==4)
    borrarPlatillos($conexion);
else
if($_POST['tipo']==9)
    actClave($conexion);

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

function actClave($conexion){
    if($_SESSION['perfilUsuario'] == 'usuario')
    {
        
        if(consultarBase(existeUsuario(), $conexion,array($_SESSION['correoUsuario'],$_POST['actual'])))
        {
            echo consultarBaseSinRetornar('update Usuario set Contrasena = ? where PK_Correo_Electronico = ?',$conexion,array($_POST['nueva'],$_SESSION['correoUsuario']));
            exit();
        }
    }
    else
    {
        if(consultarBase(existeAdministrador(), $conexion,array($_SESSION['correoUsuario'],$_POST['actual'])))
        {
            echo consultarBaseSinRetornar('update Administrador set Contrasena = ? where PK_Correo_Electronico = ?',$conexion,array($_POST['nueva'],$_SESSION['correoUsuario']));
            exit();
        }
    }
    echo 7;
}
$res;
$arreglo=$_POST['arreglo'];
foreach($arreglo as $soda){
  $res.= consultarBaseSinRetornar(desAsigSodas(),$conexion,
array($_POST['correo'],$soda));
}
echo $res;
	}
?>
