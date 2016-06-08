<?php
include "conexionBD.php";
include "consultasBD.php";
$conexion=conectar();


$respuesta="
<div class='container'>
<label class='control-label'><h3><strong>Escoger soda</strong></h3></label>
<div class='panel panel-default'>
 <div class='panel-body'>
 <div id='divcomboEditarSodas'>
 <form class='form-horizontal' role='form'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Seleccione la soda:</label>
        <div class='col-sm-10'>
            <select class='form-control' onchange='traerinfoPlatillos(this);' id='selectsodas'>".
            RetornaComboBoxUsuariosOSodas(traerSodasPorUsuario(/*$_SESSION['correoUsuario']*/"q@q.com",0),$conexion,0).
            "</select>
        </div>
    </div>
</div>
</div>
</div>
</div>";
echo $respuesta;

