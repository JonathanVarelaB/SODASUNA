<?php
include '../BaseDatos/conexionBD.php';
include '../Modelo/Modelo.php';

if(isset($_POST['Act']))//comprueba que reciba la actividad
{
    $actividad = $_POST['Act'];
    $conexion = conectar();
    if(!$conexion)
    {
        echo '0'; //no se puede conectar a la base
        exit();
    }
    
    if($actividad == 'ingreso'){
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $datos = consultarAdministrador($conexion,array($correo,$contrasena));
        if(!$datos)
        {
            $datos = consultarUsuario($conexion,array($correo,$contrasena));
            if(!$datos)
            {
                echo '-1';//no existe ese Usuario ni Administrador
                exit();
            }
            else
            {
                echo '2';
                session_start();
                $_SESSION['nombreUsuario'] = $datos['Nombre'];
                $_SESSION['correoUsuario'] = $correo;
                $_SESSION['perfilUsuario'] = 'usuario';
                exit();
            }
        }
        else
        {
            echo '1';
            session_start();
            $_SESSION['nombreUsuario'] = $datos['Nombre'];
            $_SESSION['correoUsuario'] = $correo;
            $_SESSION['perfilUsuario'] = 'administrador';
            exit();
        }
    }
    echo '-1';
}



