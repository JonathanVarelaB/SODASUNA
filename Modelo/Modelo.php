<?php

include '../BaseDatos/consultasBD.php';

function consultarAdministrador($conexion,$arreglo){
    return consultarBase(existeAdministrador(), $conexion, $arreglo);
}
function consultarUsuario($conexion,$arreglo){
    return consultarBase(existeUsuario(), $conexion, $arreglo);
}