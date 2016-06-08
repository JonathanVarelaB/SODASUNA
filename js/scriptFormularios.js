
$('#acceso').submit(function () {
    var correo = $('#correo').val();
    var contrasena = $('#contrasena').val();
    var datos = 'Act=ingreso' + '&correo=' + correo + '&contrasena=' + contrasena;
    $.ajax({
        type: 'POST',
        url: 'Control/Control.php',
        data: datos,
        success: function (resp) {
            if (resp === '0')//error en conexion a BD
            {
                $('#aviso').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;\n\
                </a><strong>Error!</strong> Se produjo un error en la conexión.</div>');
            }
            if (resp === '-1')//datos incorrectos
            {
                $('#aviso').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;\n\
                </a><strong>Error!</strong> El correo electrónico o la contraseña es incorrecta.</div>');
            }
            if(resp === '1')//es un administrador
            {
                $('#correo').val('');
                location.replace('Vistas/Administrador/principalAdministrador.php');
            }
            if(resp === '2')//es un usuario
            {
                $('#correo').val('');
                location.replace('Vistas/Usuario/principalUsuario.php');
            }
            $('#contrasena').val('');
        },
        error: function (resp) {
            alert('Hubo un error, intente de nuevo');
        }
    });
    return false;
});