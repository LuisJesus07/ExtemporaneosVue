function aparecelogin (){
	event.preventDefault();
	$("#login").animate({
		'top':'0'
	}, 500);
}
function desaparecelogin (){
	event.preventDefault();
	$("#login").animate({
		'top':'-100'
	}, 500);
}

function desaparecerRecuperarPassword(){
	$(".recuperar-password").fadeOut(200);
	$("#oscurecer").fadeOut();	
}

function aparecerRecuperarPassword(){
	$("#oscurecer").fadeIn(400);
	$(".recuperar-password").fadeIn(100);
}

function desparecerExito(){
	$(".registro-exitoso").fadeOut(200);
	$("#oscurecer").fadeOut();
}

function desapareceRegistro(){
	$("#oscurecer").fadeOut();
}


function desapareceFormulario(){
	$("#registrar").fadeOut(300, desapareceRegistro);
	$(".registro-exitoso").fadeOut(300, desapareceRegistro);
}

function mostrarFormulario(){
	$("#registrar").fadeIn();
	$("#oscurecer").click(desapareceFormulario)
	$("#cerrarRegistro").click(desapareceFormulario)
}

function apareceRegistro(e){
	e.preventDefault();
	$("#oscurecer").fadeIn(400, mostrarFormulario);
}

function mostrarLoginYRegistro(){
	$("#activarLogin").click(aparecelogin);
	$("#cerrar").click(desaparecelogin);

	$("#activarRegistro").click(apareceRegistro);
}
$(document).ready (mostrarLoginYRegistro);