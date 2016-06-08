<?php
include "consultasBD.php";
include "conexionBD.php";
$conexion=conectar();
if($_POST['tipo']==0)
comboAdministradores($conexion);
if($_POST['tipo']==1)
comboUsuarios($conexion);
else
if($_POST['tipo']==2)
comboSedes($conexion);
else
if($_POST['tipo']==4)
tablaPlatillos($conexion);

function comboAdministradores($conexion){
$respuesta="<label>Editar administradores:</label><br>
<select onchange='llenarCapmosEditarAdministrador(this);' 
id='administradores' name='administradores'>".
RetornaComboBoxUsuariosOSodas(traerAdministradores(),$conexion,1).
"</select>";
echo $respuesta;
}

function comboUsuarios($conexion){
$respuesta="<label>Editar usuarios:</label><br>
<select onchange='llenarCaposEditar(this);' id='usuarios' name='usuarios'>".
RetornaComboBoxUsuariosOSodas(traerUsuarios(),$conexion,1).
"</select>";
echo $respuesta;
}

function comboSedes($conexion){
$respuesta="<label>Editar sodas:</label><br>
<select onchange='llenarCapmosEditarsoda(this);' id='selectsodas'>".
RetornaComboBoxUsuariosOSodas(traerSodas(),$conexion,0).
"</select>";
echo $respuesta;
}

function tablaPlatillos($conexion){
echo RetornaTablaPlatillos(traerPlatillosPorSoda($_POST['id']), $conexion);
	}
?>
