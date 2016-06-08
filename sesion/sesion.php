<?php
if($_POST['tipo'] == 1)
{
session_start();
unset($_SESSION["nombreUsuario"]);
unset($_SESSION["correoUsuario"]);
unset($_SESSION["perfilUsuario"]);
session_destroy();
}