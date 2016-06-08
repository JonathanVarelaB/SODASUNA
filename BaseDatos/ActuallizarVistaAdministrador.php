<?php
include "conexionBD.php";
include "consultasBD.php";
$conexion=conectar();
session_start();

if($_POST['tipo']==0)
 administradores($conexion);
else
if($_POST['tipo']==1)
 usuarios($conexion);
else
if($_POST['tipo']==2)
 sodas($conexion);
else
if($_POST['tipo']==9)
 contraseña($conexion);

function administradores($conexion){
$respuesta="
<div class='container'>
<label class='control-label' for='nombre'><h3><strong>Agregar un administrador</strong></h3></label>
<div class='panel panel-default'>
 <div class='panel-body'>
 <form class='form-horizontal' role='form' id='formNuevoAdministrador'>
 <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Nombre:</label>
     <div class='col-sm-10'>
        <input style='font-size:15px;' type='text' class='form-control inputlg' placeholder='Vacio' maxlength='45' id='nombreadministrador' name='nombreadministrador' required/>
        </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='correo'>Correo Electrónico:</label>
    <div class='col-sm-10'>
    <input type='email' placeholder='Vacio' class='form-control' maxlength='45' id='correoadministrador' name='correoadministrador' required/>
    </div>
  </div>
  <div class='col-sm-offset-2 col-sm-10'>
    <button type='submit' class='btn btn-warning' name='nuevoAdministrador' id='nuevoAdministrador'>Agregar</button>
    </div>
</form>
</div>
</div>
</div><br>";
$respuesta.="
<div class='container'>
<label class='control-label'><h3><strong>Control de administradores</strong></h3></label>
<hr class='style18'></hr>
<div class='panel panel-default'>
 <div class='panel-body'>
 <div id='divcomboEditarAdmi'>
 <form class='form-horizontal' role='form'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Seleccione el administrador:</label>
        <div class='col-sm-10'>
            <select class='form-control' onchange='llenarCapmosEditarAdministrador(this);' id='administradores' name='administradores'>".
            RetornaComboBoxUsuariosOSodas(traerAdministradores(),$conexion,1).
            "</select>
        </div>
    </div>
</div>
</div>
</div>
</div>";
echo $respuesta;
}

function usuarios($conexion){
$respuesta="
<div class='container'>
<label class='control-label' for='nombre'><h3><strong>Agregar un usuario</strong></h3></label>
<div class='panel panel-default'>
 <div class='panel-body'>
 <form class='form-horizontal' role='form' id='formNuevoUsuario'>
 <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Nombre:</label>
     <div class='col-sm-10'>
        <input style='font-size:15px;' type='text' class='form-control inputlg' placeholder='Vacio' maxlength='45' id='nombre' name='nombre' required/>
        </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='correo'>Correo Electrónico:</label>
    <div class='col-sm-10'>
    <input type='email' placeholder='Vacio' class='form-control' maxlength='45' id='correo' name='correo' required/>
    </div>
  </div>
  <div class='col-sm-offset-2 col-sm-10'>
    <button type='submit' class='btn btn-warning' name='nuevoUsuario' id='nuevoUsuario'>Agregar</button>
    </div>
</form>
</div>
</div>
</div><br>
";


$respuesta.="
    <div class='container'>
<label class='control-label'><h3><strong>Control de usuarios</strong></h3></label>
<hr class='style18'></hr>
<div class='panel panel-default'>
 <div class='panel-body'>
 <div id='divcomboEditar'>
 <form class='form-horizontal' role='form'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Seleccione el usuario:</label>
        <div class='col-sm-10'>
            <select class='form-control' onchange='llenarCaposEditar(this);' id='usuarios'>".
            RetornaComboBoxUsuariosOSodas(traerUsuarios(),$conexion,1).
            "</select>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>";
echo $respuesta;
}


function sodas($conexion){
$respuesta="
<div class='container'>
<label class='control-label' for='nombre'><h3><strong>Agregar una soda</strong></h3></label>
<div class='panel panel-default'>
 <div class='panel-body'>
 <form class='form-horizontal' role='form' id='formNuevaSoda'>
 <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Nombre:</label>
     <div class='col-sm-10'>
        <input style='font-size:15px;' type='text' class='form-control inputlg' placeholder='Vacio' maxlength='45' id='nombresoda' name='nombresoda' required/>
        </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='correo'>Sede:</label>
    <div class='col-sm-10'>
    <input style='font-size:15px;' type='text' class='form-control inputlg' placeholder='Vacio' maxlength='45' id='sedesoda' name='sedesoda' required/>
    </div>
  </div>
  <div class='col-sm-offset-2 col-sm-10'>
    <button type='submit' class='btn btn-warning' name='nuevaSoda' id='nuevaSoda'>Agregar</button>
    </div>
</form>
</div>
</div>
</div><br>";

 

$respuesta.="
<div class='container'>
<label class='control-label'><h3><strong>Control de sodas</strong></h3></label>
<hr class='style18'></hr>
<div class='panel panel-default'>
 <div class='panel-body'>
 <div id='divcomboEditarSodas'>
 <form class='form-horizontal' role='form'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Seleccione la soda:</label>
        <div class='col-sm-10'>
            <select class='form-control' onchange='llenarCapmosEditarsoda(this);' id='selectsodas'>".
            RetornaComboBoxUsuariosOSodas(traerSodas(),$conexion,0).
            "</select>
        </div>
    </div>
</div>
</div>
</div>
</div>";
echo $respuesta;
}


function contraseña($conexion)
{

$respuesta="
<div class='container'>
<label class='control-label' for='nombre'><h3><strong>Cambiar Contraseña</strong></h3></label>
<div class='panel panel-default'>
 <div class='panel-body'>
 <form class='form-horizontal' role='form' id='formCambiarContraseña'>
 <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Contraseña Actual:</label>
     <div class='col-sm-10'>
        <input type='password' class='form-control' placeholder='Vacio' maxlength='45' id='contrasenaActual' name='contrasenaActual' required/>
        </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Nueva Contraseña:</label>
     <div class='col-sm-10'>
        <input type='password' class='form-control' placeholder='Vacio' maxlength='45' id='contrasenaNueva' name='contrasenaNueva' required/>
        </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Repita Nueva Contraseña:</label>
     <div class='col-sm-10'>
        <input type='password' class='form-control' placeholder='Vacio' maxlength='45' id='RepcontrasenaNueva' name='RepcontrasenaNueva' required/>
        </div>
  </div>
  <div class='col-sm-offset-2 col-sm-10'>
    <button type='submit' class='btn btn-warning' name='cambiarC' id='cambiarC'>Cambiar</button>
    </div>
</form>
</div>
</div>
</div><br><br><br>";
echo $respuesta;
}

?>
