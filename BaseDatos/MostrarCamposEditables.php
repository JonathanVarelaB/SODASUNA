<?php
include "conexionBD.php";
include "consultasBD.php";
session_start();
//action='../../BaseDatos/ingresarInformacionUsuario.php' method='POST'>
$conexion=conectar();
if($_POST['tipo']==0)
camposeditarAdministrador($conexion);
if($_POST['tipo']==1)
camposeditarUsuario($conexion);
else
if($_POST['tipo']==2)
camposeditarSoda($conexion);

function camposeditarAdministrador($conexion){
	$usuario=consultarBase(traerAdministradorPorCorreo(), $conexion,
array($_POST['correo'])) ;

$respuesta="     
<br><div class='container'>
<label class='control-label'><h4><strong>Editar administrador</strong></h4></label>
        <div class='panel panel-default'>
            <div class='panel-body'>
                    <form class='form-horizontal' role='form' id='formEditarAdministrador'>
                        <div class='form-group'>
                            <label class='control-label col-sm-2'>Nombre:</label>
                            <div class='col-sm-10'>
                                <input style='font-size:15px;' type='text' placeholder='Vacio' maxlength='45' 
                                id='nuevonombreadmi' class='form-control' value='".$usuario['Nombre']."'
                                name='nuevonombreadmi' required/>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-sm-2'>Correo Electrónico:</label>
                            <div class='col-sm-10'>
                                <input class='form-control' type='email' placeholder='Vacio' maxlength='45' 
                                id='nuevocorreoadmi' value='".$usuario['PK_Correo_Electronico']."'
                                name='nuevocorreoadmi' required/>
                                <input id='clave' type='hidden' value='".$usuario['PK_Correo_Electronico']."'/>
                            </div>
                        </div>
                        <div class='col-sm-offset-2 col-sm-10'>
                            <button type='submit' class='btn btn-warning' name='nueva' id='nueva'>Editar</button>
                        </div>
                        </form>
                        </div></div></div>
<div class='container'>
<div class='panel panel-default'>
            <div class='panel-body'>
    <div class='btn-group btn-group-justified'>
        <a id='eliminarAdmin' class='btn btn-warning'><h4>Eliminar</h4></a>
    </div>
            </div>
    </div>
</div>
";
echo $respuesta;
}

function camposeditarUsuario($conexion){
    
$usuario=consultarBase(traerUsuarioPorCorreo(), $conexion,array($_POST['correo'])) ;

$respuesta="
<br><div class='container'>
<label class='control-label'><h4><strong>Editar usuario</strong></h4></label><br>
<label style='color:darkred;' class='control-label'><strong>Última modificación realizada por ".$usuario['Administrador_PK_Correo_Electronico']."</strong></label>
        <div class='panel panel-default'>
            <div class='panel-body'>
                    <form class='form-horizontal' role='form' id='formEditarUsuario'>
                        <div class='form-group'>
                            <label class='control-label col-sm-2'>Nombre:</label>
                            <div class='col-sm-10'>
                                <input style='font-size:15px;' type='text' placeholder='Vacio' maxlength='45' 
                                id='nuevonombre' class='form-control' value='".$usuario['Nombre']."'
                                name='nuevonombre' required/>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-sm-2'>Correo Electrónico:</label>
                            <div class='col-sm-10'>
                                <input class='form-control' type='email' placeholder='Vacio' maxlength='45' 
                                id='nuevocorreo' value='".$usuario['PK_Correo_Electronico']."'
                                name='nuevocorreo' required/>
                                <input id='clave' type='hidden' value='".$usuario['PK_Correo_Electronico']."'/>
                            </div>
                        </div>
                        <div class='col-sm-offset-2 col-sm-10'>
                            <button type='submit' class='btn btn-warning' name='nueva' id='nueva'>Editar</button>
                        </div>
                        </form>
                        </div></div></div>";

$respuesta.="
<br><div class='container'>
    <label class='control-label'><h4><strong>Asignar soda</strong></h4></label><br>
        <div class='panel panel-default'>
            <div class='panel-body'>
                <form class='form-horizontal' role='form' id='formAsignarSoda'>
                    <div class='form-group'>
                        <label class='control-label col-sm-2'>Seleccione la soda:</label>
                        <input id='clave' type='hidden' value='".$usuario['PK_Correo_Electronico']."'/>
                        <div class='col-sm-10'>
                            <select class='form-control' id='sodasporAsignar'>".RetornaComboBoxUsuariosOSodas(
                                      traerSodasPorUsuario($_POST['correo'],1),$conexion,0)."</select>
                        </div>
                    </div>
                    <div class='col-sm-offset-2 col-sm-10'>
                        <button type='submit' class='btn btn-warning' name='nueva' id='nueva'>Asignar</button>
                    </div>
                </form>
            </div>
        </div>
</div>";

$respuesta.="
<br>
<div class='container'>
    <label class='control-label'><h4><strong>Desasignar soda</strong></h4></label><br>
    <div class='panel panel-default'>
        <div class='panel-body'>
            <form id='checkForm' class='form-horizontal' role='form'>
                <div class='form-group'>
                    <div class='col-sm-10'>".
                        retornaUsuariosOSodasCheckbox(traerSodasPorUsuario($_POST['correo'],0),$conexion,0)."
                    </div>
                     <div class='col-sm-offset-2 col-sm-10'>
                    <button id='desasignar'  class='btn btn-warning' onclick='desasignarSodas();'>Desasignar Escogidas</button>
                     </div>
                </div>
            </form>
        </div>
    </div>
</div>";

$respuesta.="<br><div class='container'>
<div class='panel panel-default'>
            <div class='panel-body'>
    <div class='btn-group btn-group-justified'>
        <a id='eliminarUsu' class='btn btn-warning'><h4>Eliminar usuario</h4></a>
    </div>
            </div>
    </div>
</div>
";

echo $respuesta;
}

function camposeditarSoda($conexion){
$usuario=consultarBase(traerSodaPorCorreo(), $conexion,
array($_POST['id'])) ;

$respuesta="
<br><div class='container'>
<label class='control-label'><h4><strong>Editar soda</strong></h4></label>
        <div class='panel panel-default'>
            <div class='panel-body'>
                    <form class='form-horizontal' role='form' id='formEditarSoda'>
                        <div class='form-group'>
                            <label class='control-label col-sm-2'>Nombre:</label>
                            <div class='col-sm-10'>
                                <input style='font-size:15px;' type='text' placeholder='Vacio' maxlength='45' 
                                id='nuevonombresoda' class='form-control' value='".$usuario['Nombre']."'
                                name='nuevonombresoda' required/>
                            </div>
                        </div>
                        <input id='id' type='hidden' value='".$usuario['PK_Identificador']."'/>
                        <div class='form-group'>
                            <label class='control-label col-sm-2'>Sede:</label>
                            <div class='col-sm-10'>
                                <input style='font-size:15px;' class='form-control' type='text' placeholder='Vacio' maxlength='45' 
                                id='nuevasedesoda' value='".$usuario['Sede']."'
                                name='nuevasedesoda' required/>
                            </div>
                        </div>
                        <div class='col-sm-offset-2 col-sm-10'>
                            <button type='submit' class='btn btn-warning' name='nueva' id='nueva'>Editar</button>
                        </div>
                        </form>
                        </div></div></div>
<div class='container'>
<div class='panel panel-default'>
            <div class='panel-body'>
    <div class='btn-group btn-group-justified'>
        <a id='eliminarSoda' class='btn btn-warning'><h4>Eliminar</h4></a>
    </div>
            </div>
    </div>
</div>
";
echo $respuesta;
}

?>
