<?php

function conectar() {//este metodo inicia la conexion a la base de datos
    try {
            $servername = "localhost";//nombre del servidor
            $username_DB = "root";//usuario de la base de datos
            $password = "root";//contraseña de la base de datos para el usuario
            $dbname = "SODASUNA";//nombre de la base de datos
            $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username_DB, $password);//conecta la base con PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// set el modo error PDO para exepción
            return $conexion;//retorna esa conexion
    } catch (PDOException $ex) {//si no se puede conectar
        return false;//alerta y muestra el mensaje del error
    }
}

//Consulta la base y retorna el resultado
function consultarBase($consultar, $conexion, $arreglo) {
    $query = $conexion->prepare($consultar);
    $query->execute($arreglo);
    return $query->fetch(PDO::FETCH_ASSOC);
}

//Consulta la base y no retorna el resultado	
function consultarBaseSinRetornar($consultar, $conexion, $arreglo) {
    $query = $conexion->prepare($consultar);
    return $query->execute($arreglo);
}

function desconectar($conexion){
    mysql_close($conexion);
}