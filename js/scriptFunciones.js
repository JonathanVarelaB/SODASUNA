
$(document).ready(function(){
    $('#inicioAdmin').click(function(){
        activo();$('#inicio').toggleClass("active");
         $('.contenidoEditable').text("");
        $('.contenido').html('<div id="bienvenida"><div class="container"><br><br><img style="width:50px;" src="../../imagenes/user.png" /><br><label style="color:darkred;"><h3>Bienvenido(a) </h3></label><br></div></div>');
   });
    $('#administradoresAdmin').click(function(){
        activo();$('#administradores').toggleClass("active");
         $('.contenidoEditable').text("");
         actualizarVistaAdministrador(0);
   });
   $('#usuariosAdmin').click(function(){
       activo();$('#usuarios').toggleClass("active");
         $('.contenidoEditable').text("");
       actualizarVistaAdministrador(1);
   });
   $('#sodasAdmin').click(function(){
       activo();$('#sodas').toggleClass("active");
       $('.contenidoEditable').text("");
        actualizarVistaAdministrador(2);
   });
    $('#inicioUsu').click(function(){
        activo();$('#inicio').toggleClass("active");
         $('.contenidoEditable').text("");
        $('.contenido').html('<div id="bienvenida"><div class="container"><br><br><img style="width:50px;" src="../../imagenes/user.png" /><br><label style="color:darkred;"><h3>Bienvenido(a) </h3></label><br></div></div>');
   });
    $('#platillosUsu').click(function(){
        activo();$('#usuarios').toggleClass("active");
         $('.contenidoEditable').text("");
         actualizarVistaUsuario();
   });
});

$('body').on('submit','#formNuevoUsuario',function(){
    insertarUsuario();
});
$('body').on('submit','#formNuevoAdministrador',function(){
    insertarAdministrador();
});
$('body').on('submit','#formNuevaSoda',function(){
    insertarSoda();
});
$('body').on('submit','#formEditarSoda',function(){
    editarSoda();
});
$('body').on('submit','#formEditarUsuario',function(){
    editarUsuario();
});
$('body').on('submit','#formEditarAdministrador',function(){
    editarAdministrador();
});
$('body').on('submit','#formCambiarContraseña',function(){
    if($('#contrasenaNueva').val() != $('#RepcontrasenaNueva').val())
        alert('Ambos campos correspondientes a la nueva contraseña, son diferentes');
    else
        actualizarContraseña();
});
$('body').on('click','#eliminarAdmin',function(){
    eliminarAdmin();
});
$('body').on('click','#eliminarSoda',function(){
    eliminarSoda();
});
$('body').on('click','#eliminarUsu',function(){
    eliminarUsuario();
});
$('body').on('submit','#formAsignarSoda',function(){
    if($('#sodasporAsignar').val() == 0)
        alert('Debe de seleccionar una soda');
    else
        asignarSoda();
});

$('#cerrar').click(function(){
    if (confirm("¿Desea cerrar sesión?") == true)
    {
        $.post('../../sesion/sesion.php',
	{
            tipo:1
	});
        location.replace('../../index.php');
    }
});

$('#olvido').click(function(){
   $('#titulo').text('Envio de nueva clave'); 
   $('#subtitulo').text('Ingrese su correo electrónico'); 
   $('#contrasena').css('display','none'); 
   $('#accionLogin').text('Enviar'); 
   $('#accionLogin').attr('onclick','enviarClave();'); 
});

$('#cambioCont').click(function(){
    activo();
         $('.contenidoEditable').text("");
         cambiarContraseña();
});

function enviarClave(){
    alert('El correo electrónico le fue enviado');
    location.reload();
}

function asignarSoda(){
        $.post('../../BaseDatos/ingresarInformacion.php',
	{	tipo:5,
		sodaA:$('#sodasporAsignar').val(),
                clave:$("#clave").val()
	},
	function(resp){
		if(resp!=1)
                    alert(resp);
		else{
                    alert("Soda asignada");
                    actualizarcombo(0);
                }
        }
	);}
$('body').on('submit','#formNuevoPlatillo',function(){
    return insertarPlatillo();
});

function cambiarEstado(){
	if($("#si").is(":checked")){
	$("#nombreplatillo").attr('required',false);
	$("#nombreselect").attr('required',true);
	}
	else{
	$("#nombreplatillo").attr('required',true);
	$("#nombreselect").attr('required',false);
}
	}

function insertarPlatillo(){
	var nombrePlatillo=""; 
	if($("#si").is(":checked")) {
	if($("#nombreselect option:selected").text()!=="Seleccione")
	 nombrePlatillo=$("#nombreselect option:selected").text();
	 }
	else
		nombrePlatillo=$("#nombreplatillo").val();
		if(nombrePlatillo!==""){
	$.post('../../BaseDatos/ingresarInformacion.php',
	{	tipo:4,
		nombre:nombrePlatillo,
		descripcion:$("#descripcion").val(),
		soda:$("#idsoda").val(),
		precio:$("#precio").val(),
		dia:$("#dia").val()
	},
	function(resp){
		if(resp!=1){
		return false;
		alert(resp);
		}
		else{
		alert("Platillo " + nombrePlatillo + " ingresado");
		return true;
		//actualizarcombo(0);
	}
		}
	);}
	else{
	alert("Selecciones un platillo por favor");
		return false;
		}
	}
        


function insertarAdministrador(){
	$.post('../../BaseDatos/ingresarInformacion.php',
	{	tipo:0,
		nombre:$("#nombreadministrador").val(),
		contrasena:'123',//$("#contrasenaadministrador").val(),
		correo:$("#correoadministrador").val()
	},
	function(resp){
		if(resp!=1)
		alert(resp);
		else{
		alert("Administrador " + $("#nombreadministrador").val() + " ingresado");
		actualizarcombo(0);
	}
		}
	);}
        
function editarAdministrador(){
	$.post('../../BaseDatos/editarInformacion.php',
	{	tipo:0,
		nombre:$("#nuevonombreadmi").val(),
		//contrasena:'123',//$("#nuevacontrasenaadmi").val(),
		correo:$("#nuevocorreoadmi").val(),
		clave:$("#clave").val()
	},
	function(resp){
		if(resp!=1)
		alert('No se puede editar, existen usuarios registrados a su cargo');
		else{
		alert("Administrador " + $("#nuevonombreadmi").val() + " editado");
		actualizarcombo(0);
	}
		}
	);}
function actualizarContraseña(){
	$.post('../../BaseDatos/editarInformacion.php',
	{	tipo:9,
		actual:$("#contrasenaActual").val(),
		nueva:$("#contrasenaNueva").val()
	},
	function(resp){
		if(resp!=1)
		alert('La contraseña actual es incorrecta');
		else{
		alert("Contraseña actualizada");
	}
		}
	);}


function eliminarAdmin(){
    $.post('../../BaseDatos/eliminarInformacion.php',
	{	tipo:0,
		clave:$("#clave").val()
	},
	function(resp){
		if(resp!=1)
		alert('No se puede eliminar, existen usuarios registrados a su cargo');
		else{
		alert("Administrador " + $("#nuevonombreadmi").val() + " eliminado");
		actualizarcombo(0);
                $('#administradoresAdmin').click();
	}
		}
	);
}
function eliminarSoda(){
    $.post('../../BaseDatos/eliminarInformacion.php',
	{	tipo:2,
		id:$("#id").val()
	},
	function(resp){
		if(resp!=1)
		alert('No se puede eliminar, primero debe de desasignar la soda del usuario encargado');
		else{
		alert("Soda " + $("#nuevonombresoda").val() + " eliminada");
		actualizarcombo(0);
                $('#sodasAdmin').click();
	}
		}
	);
}
function insertarUsuario(){
	$.post('../../BaseDatos/ingresarInformacion.php',
	{	tipo:1,
		nombre:$("#nombre").val(),
		contrasena:'123',//$("#contrasena").val(),
		correo:$("#correo").val()
	},
	function(resp){
		if(resp!=1)
		alert(resp);
		else{
		alert("Usuario " + $("#nombre").val() + " ingresado");
		actualizarcombo(1);
	}
		}
	);}
        
function editarUsuario(){
	$.post('../../BaseDatos/editarInformacion.php',
	{	tipo:1,
		nombre:$("#nuevonombre").val(),
		//contrasena:'123',//$("#nuevacontrasena").val(),
		correo:$("#nuevocorreo").val(),
		clave:$("#clave").val()
	},
	function(resp){
		if(resp!=1)
		alert(resp);
		else{
		alert("Usuario " + $("#nuevonombre").val() + " editado");
		actualizarcombo(1);
	}
		}
	);}
function eliminarUsuario(){
	$.post('../../BaseDatos/eliminarInformacion.php',
	{	tipo:1,
		clave:$("#clave").val()
	},
	function(resp){
		if(resp!=1)
		alert(resp);
		else{
		alert("Usuario " + $("#nuevonombre").val() + " eliminado");
		actualizarcombo(1);
                $('#usuariosAdmin').click();
	}
		}
	);}
	
	function insertarSoda(){
	$.post('../../BaseDatos/ingresarInformacion.php',
	{	tipo:2,
		nombresoda:$("#nombresoda").val(),
		sedesoda:$("#sedesoda").val()
			},
	function(resp){
		if(resp!=1)
		alert(resp);
		else{
		alert("Soda " + $("#nombresoda").val() + " ingresada en la sede " + $("#sedesoda").val());
		actualizarcombo(2);
	}
		}
	);}

	
	function editarSoda(){
	$.post('../../BaseDatos/editarInformacion.php',
	{	tipo:2,
		nombresoda:$("#nuevonombresoda").val(),
		sedesoda:$("#nuevasedesoda").val(),
                id:$("#id").val()
			},
	function(resp){
		if(resp!=1)
		alert(resp);
		else{
		alert("Soda " + $("#nuevonombresoda").val() + " editada");
		actualizarcombo(2);
	}
		}
	);}
	
function actualizarcombo(cual){
	var tabla;
	if(cual==4)
	tabla=$("#idsodaG").val();
	$.post('../../BaseDatos/actualizarCombo.php',
	{
		id:tabla,
		tipo:cual
	},
	function(resp){
		if(cual==0)
		$('#divcomboEditarAdmi').html(resp);
		else
		if(cual==1)
		$('#divcomboEditar').html(resp);
		else
		if(cual==2)
		$('#divcomboEditarSodas').html(resp);
		if(cual==4)
		$('#divtablaPlatillos').html(resp);
	}
	);}
	
function llenarCapmosEditarAdministrador(sel){
	if(sel.value !== "0"){
	$.post('../../BaseDatos/MostrarCamposEditables.php',
	{	tipo:0,
		correo:sel.value
	},
	function(resp){
		$('.contenidoEditable').html(resp);
	}
	);
	}
	else
			$('.contenidoEditable').html("");
			}	
	
function llenarCaposEditar(sel){
	if(sel.value !== "0"){
	$.post('../../BaseDatos/MostrarCamposEditables.php',
	{	tipo:1,
		correo:sel.value
	},
	function(resp){
		$('.contenidoEditable').html(resp);
	}
	);
	}
	else
			$('.contenidoEditable').html("");
			}
	
function llenarCapmosEditarsoda(sel){
	if(sel.value !== "0"){
	$.post('../../BaseDatos/MostrarCamposEditables.php',
	{	tipo:2,
		id:sel.value
	},
	function(resp){
		$('.contenidoEditable').html(resp);
	}
	);
	}
	else
			$('.contenidoEditable').html("");

	}	
	
function cambiarContraseña(){
	try{
	$.post("../../BaseDatos/ActuallizarVistaAdministrador.php",
	{
            tipo:9
	},
	function(resp){
	$('.contenido').html(resp);
	});
	}
	catch(error){
		alert(error);
		}
	}
function actualizarVistaAdministrador(tipo){
	try{
	$.post("../../BaseDatos/ActuallizarVistaAdministrador.php",
	{
		tipo:tipo
	},
	function(resp){
	$('.contenido').html(resp);
	});
	}
	catch(error){
		alert(error);
		}
	}
function actualizarVistaUsuario(){
		try{
	$.post("../../BaseDatos/ActuallizarVistaUsuario.php",
	{
	},
	function(resp){
	$('.contenido').html(resp);
	});
	}
	catch(error){
		alert(error);
		}
	
	
	}

function traerinfoPlatillos(sel){
	if(sel.value !== "0"){
	$.post('../../BaseDatos/MostrarPlatillosInfo.php',
	{	
		id:sel.value
	},
	function(resp){
		$('.contenidoEditable').html(resp);
	}
	);
	}
	else
			$('.contenidoEditable').html("");

	
}

function borrarPlatillo(i){
	$.post('../../BaseDatos/editarInformacion.php',
	{	tipo:4,
		nombre:$("#nombre"+i).val(),
		dia:$("#dia"+i).val(),
		soda:$("#idsodaG").val(),
		},function(resp){
			if(resp!=1)
			alert(resp);
			else{
			alert($("#nombre"+i).val()+" "+ $("#idsodaG").val()+" "+$("#dia"+i).val()+" eliminado correctamente");
			}
			actualizarcombo(4);
			}
		);
	}
	
function desasignarSodas(){
	var searchIDs = $("#checkForm input:checkbox:checked").map(function(){
      return $(this).val();
    }).get();
    if(searchIDs != '')
    {
   // alert(searchIDs+" "+$("#clave").val());
    $.post('../../BaseDatos/editarInformacion.php',
	{	tipo:3,
		correo:$("#clave").val(),
		arreglo:searchIDs
		},function(resp){
			alert("Las sodas seleccionadas se han desasignado correctamente");
			
			}
		);
    }
    else
        alert('No selecciono ninguna soda');
	}
	

function quitarAviso(){
    $('#aviso').html('');
}

function activo(){
    $('li').each(function(){
           $(this).removeClass("active");
       });
}
