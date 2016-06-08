<?php

function existeAdministrador(){
    return 'Select Nombre from Administrador where 
    PK_Correo_Electronico = ? and Contrasena = ?';
}
function existeUsuario(){
    return 'Select Nombre from Usuario where 
    PK_Correo_Electronico = ? and Contrasena = ?';
}

function insertarAdministrador(){
	  return 'Insert INTO Administrador VALUES(?,?,?)';
}

function modificarAdministrador(){
    return 'update Administrador set PK_Correo_Electronico = ?, Nombre = ? 
    Where PK_Correo_Electronico = ?';
}

function modificarSoda(){
    return 'update soda set Nombre = ?, Sede = ?
    Where PK_Identificador = ?';
}

function eliminarAdmin(){
    return 'delete from Administrador Where PK_Correo_Electronico = ?';
}

function eliminarUsu(){
    return 'delete from Usuario Where PK_Correo_Electronico = ?';
}

function asigSodas(){
    return 'Insert INTO Usuario_Soda VALUES(?,?,?)';
}

function eliminarSod(){
    return 'delete from Soda Where PK_Identificador = ?';
}
function insertarUsuario(){
    return 'Insert INTO Usuario VALUES(?,?,?,?)';
}
function insertarSodas(){
    return 'Insert INTO Soda (Nombre, Sede) VALUES(?,?)';
}

function modificarUsuario(){
    return 'UPDATE Usuario SET 
    PK_Correo_Electronico = ?,  Nombre = ?, Administrador_PK_Correo_Electronico = ?
    Where PK_Correo_Electronico = ?';
}
function traerUsuarios(){
	return "SELECT * FROM Usuario";
	}
	
function traerAdministradores(){
	return "SELECT * FROM Administrador";
	}
		
function traerAdministradorPorCorreo(){
	return traerAdministradores()." Where PK_Correo_Electronico = ?";
	}		
		
function traerUsuarioPorCorreo(){
	return traerUsuarios()." Where PK_Correo_Electronico = ?";
	}

function insertarPlatillo(){
return "INSERT INTO Platillo VALUES(?,?,?,?,?)";
	}

function traerPlatillosPorSoda($id){
return "SELECT * FROM Platillo WHERE Soda_PK_Identificador = ".$id." ORDER BY PK_Nombre";
	}
	
function traerPlatillosPorSodaGroupBy($id){
return "SELECT * FROM Platillo WHERE Soda_PK_Identificador = ".$id." GROUP BY PK_Nombre";
	}
	
function eliminarPlatillo(){
	return "DELETE FROM Platillo WHERE PK_Nombre = ? AND PK_Dia = ? AND Soda_PK_Identificador = ?";
}
function traerSodasPorUsuario($correo,$asignadas){
	$minus=$asignadas == 1 ?"SELECT * FROM Soda WHERE
	PK_Identificador NOT IN (SELECT ":"(SELECT Nombre, ";
	return $minus."PK_Identificador FROM Soda,
	(SELECT Soda_PK_Identificador id FROM 
	Usuario_Soda WHERE Usuario_PK_Correo_Electronico  ='".$correo."')Ids 
	WHERE id = PK_Identificador)";
	}

function traerUsuariosPorSodas($id,$asignadas){
	$minus=$asignadas == 1 ?"SELECT * FROM Usuario WHERE
	 PK_Correo_Electronico NOT IN (SELECT ":"(SELECT Nombre, ";
	return $minus."PK_Correo_Electronico FROM Usuario,
	(SELECT Usuario_PK_Correo_Electronico correo FROM 
	Usuario_Soda WHERE Soda_PK_Identificador = '".$id."')Ids 
	WHERE correo = PK_Correo_Electronico)";
	}

function traerSodas(){
	return "Select * From Soda";
	}

function traerSodaPorCorreo(){
	return traerSodas()." Where PK_Identificador = ?";
	}

function retornaUsuariosOSodasCheckbox($consulta, $conexion,$cual) {
    try {
    $respuesta = '';
    $i = 1;
    foreach ($conexion->query($consulta) as $fila) {
		$value= $cual == 1 ? $fila['PK_Correo_Electronico'] : 
							$fila['PK_Identificador'];
            $respuesta .= '<input type="checkbox" name="borrar" 
			value="'.$value.'">'.$fila['Nombre'].'<br>';
        $i++;
    }
    if ($i == 1) {
		$quien=$cual == 1 ? "usuarios asignados": "sodas asignadas";
        $respuesta = "<label>No hay ".$quien."</label>";
    }
    return $respuesta;
    } catch (PDOException $ex) {//si no se puede conectar
        return 'Error al conectar con la base de datos: ' . $ex->getMessage();//alerta y muestra el mensaje del error
    }
}
function RetornaComboBoxUsuariosOSodas($consulta, $conexion,$cual) {
    try {
    $respuesta = "<option value='0'>Seleccione</option>";
    $i = 1;
    foreach ($conexion->query($consulta) as $fila) {
		$value= $cual == 1 ? $fila['PK_Correo_Electronico'] : 
							$fila['PK_Identificador'];
        $respuesta.="<option value='".$value."'>"
									.$fila['Nombre'] . "</option>";
        $i++;
    }
    if ($i == 1) {
        $respuesta = "<option value='0'>No hay elementos</option>";
    }
    return $respuesta;
    } catch (PDOException $ex) {//si no se puede conectar
        return 'Error al conectar con la base de datos: ' . $ex->getMessage();//alerta y muestra el mensaje del error
    }
}

function RetornaComboBoxPlatillos($consulta, $conexion,$cual) {
    try {
    $respuesta = "<option value='0'>Seleccione</option>";
    $i = 1;
    foreach ($conexion->query($consulta) as $fila) {
		$value= $cual == 1 ? $fila['PK_Dia']." ".$fila['Soda_PK_Identificador']." ".$fila['PK_Nombre'] : 
							$fila['PK_Nombre'];
		$muestra= $cual == 1 ? $fila['PK_Dia']." ".$fila['PK_Nombre'] : 
								$fila['PK_Nombre'];
        $respuesta.="<option value='".$value."'>"
									.$muestra . "</option>";
        $i++;
    }
    if ($i == 1) {
        $respuesta = "<option value='0'>No hay elementos</option>";
    }
    return $respuesta;
    } catch (PDOException $ex) {//si no se puede conectar
        return 'Error al conectar con la base de datos: ' . $ex->getMessage();//alerta y muestra el mensaje del error
    }
}

function RetornaTablaPlatillos($consulta, $conexion) {
    try {
    $respuesta = "<Table><thead><th>Nombre</th><th>D&iacute;a</th><th>Descripci&oacute;n</th><th>Precio</th></thead>";
    $i = 1;
    foreach ($conexion->query($consulta) as $fila) {
        $respuesta.="<tr>
        <td>".$fila['PK_Nombre']." <input type='hidden' id='nombre" . $i . "' value='".$fila['PK_Nombre']."'</td>
        <td>".date_format(new DateTime($fila['PK_Dia']),'d-m-Y')." <input type='hidden' id='dia" . $i . "' value='".$fila['PK_Dia']."'</td>
        <td>".$fila['Descripcion']."</td>
        <td>".$fila['Precio']."</td>
        <td><button type='submit' class='btn btn-warning' onclick='borrarPlatillo(".$i.");' name='borrarPlatillo' id='borrarPlatillo'>Borrar</button></td>
        </tr>";
        $i++;
    }
      
    $respuesta.="</table>";
    if ($i == 1) {
        $respuesta = "<h1>No hay elementos</h1>";
    }
    return $respuesta;
    } catch (PDOException $ex) {//si no se puede conectar
        return 'Error al conectar con la base de datos: ' . $ex->getMessage();//alerta y muestra el mensaje del error
    }
}

