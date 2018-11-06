function validar_reg(){
	var nombre, apellido, direccion, email, telefono, tipo_doc, documento, contrasena, conf_contrasena;
	nombre = document.getElementById('nombre').value;
	apellido = document.getElementById('apellido').value;
	direccion = document.getElementById('direccion').value;
	email = document.getElementById('email').value;
	telefono = document.getElementById('telefono').value;
	tipo_doc = document.getElementById('tipo_doc').value;
	documento = document.getElementById('documento').value;
	contrasena = document.getElementById('contrasena').value; 
	conf_contrasena = document.getElementById('conf_contrasena').value;

	var message = document.getElementById('message');
    var expresion = /\w+@\w+\.+[a-z]/;

	if (nombre == "") {
		document.getElementById('message').style.display = 'block';
		document.getElementById('message').innerHTML = "¡¡El campo <strong>Nombre</strong> es obligatorio!!";
        return false;
	}
	else if (apellido == "") {
		document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡El campo <strong>Apellido</strong> es obligatorio!!";
        return false;
    }
    else if (direccion == "") {
    	document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡El campo <strong>Direccion</strong> es obligatorio!!";
        return false;
    }
    else if (!expresion.test(email)) {
        document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡El <strong>Email</strong> no es valido!!";
        return false;
    }
	else if (telefono == "") {
		document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡El campo <strong>Telefono</strong> es obligatorio!!";
        return false;
    }
    else if (tipo_doc == "0") {
    	document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡Se debe alegir un <strong>Tipo de documento</strong>!!";
        return false;
    }
    else if (documento == "") {
		document.getElementById('message').style.display = 'block';
		document.getElementById('message').innerHTML = "¡¡El campo <strong>Documento</strong> es obligatorio!!";
        return false;
	}
	else if (contrasena == "") {
		document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡El campo <strong>Contraseña</strong> esta vacio!!";
        return false;
    }
    else if (conf_contrasena == "") {
        document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡El campo <strong>Confirmar contraseña</strong> esta vacio!!";
        return false;
    }
    else if (conf_contrasena != contrasena) {
    	document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = "¡¡Las <strong>Contraseñas</strong> no coinciden!!";
        return false;
    }
}