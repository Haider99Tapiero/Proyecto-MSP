function validar_login(){
	var documento, contrasena;
	documento = document.getElementById('iddocumento').value;
	contrasena = document.getElementById('idcontrasena').value; 

	if (documento == "" && contrasena == "") {
		document.getElementById('message').style.display='block';
		document.getElementById('message').innerHTML = "¡¡El documento y la contraseña estan vacios!!";
        return false;
	}
	else if (documento == "") {
		document.getElementById('message').style.display='block';
        document.getElementById('message').innerHTML = "¡¡El documento esta vacio!!";
        return false;
    }
    else if (contrasena == "") {
    	document.getElementById('message').style.display='block';
        document.getElementById('message').innerHTML = "¡¡La contraseña esta vacia!!";
        return false;
    }
}

function validar_login_error(){
	var documento, contrasena;
	documento = document.getElementById('iddocumento').value;
	contrasena = document.getElementById('idcontrasena').value; 

	if (documento == "" && contrasena == "") {
		document.getElementById('message').style.display = 'block';
		document.getElementById('error').style.display = 'none';
		document.getElementById('message').innerHTML = "¡¡El documento y la contraseña estan vacios!!";
        return false;
	}
	else if (documento == "") {
		document.getElementById('message').style.display = 'block';
		document.getElementById('error').style.display = 'none';
        document.getElementById('message').innerHTML = "¡¡El documento esta vacio!!";
        return false;
    }
    else if (contrasena == "") {
    	document.getElementById('message').style.display = 'block';
    	document.getElementById('error').style.display = 'none';
        document.getElementById('message').innerHTML = "¡¡La contraseña esta vacia!!";
        return false;
    }
}

function MSM(){
	document.getElementById('error').style.display = 'block';
	document.getElementById('error').innerHTML = "¡¡Información incorrecta JODER";
}