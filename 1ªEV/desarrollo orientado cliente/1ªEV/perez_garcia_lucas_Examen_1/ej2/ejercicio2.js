function validarPrimerFormulario() {
    if(validaciones()) {
        boton2 = document.getElementById("boton2");
        boton2.disabled = false;
        alert("Datos correctos");
    }
}

function validaciones() {
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    email = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    dni = document.getElementById("dni").value;
    
    //validaciones anidadas con funciones
    if (validarVacios(nombre,apellidos,email,usuario,dni)) {
        if (validarNombre(nombre)) {
            if (validarApellidos(apellidos)) {
                if (validarUsuario(usuario)) {
                    if(validarEmail(email)) {
                        if(validarDni(dni)) {
                            return true;
                        } else {
                            alert("El dni no es correcto");
                            return false;
                        }
                    } else {
                        alert("El email no es correcto, debe tener un @");
                        return false;
                    }
                } else {
                    alert("El usuario no escorrecto, debe tener entre 5 y 8 carácteres");
                    return false;
                }
            } else {
                alert("Los apellidos no son correctos, tienen que tener minimo 2 carácteres no numéricos");
                return false;
            }
        } else {
            alert("El nombre no es correcto, tiene que tener minimo 2 caracteres no numéricos");
            return false;
        }
    } else {
        alert("Ningun campo puede estar vacio");
        return false;
    }
}
function validarVacios(nombre,apellidos,email,usuario,dni) {

    if (nombre === "" || apellidos === "" || email === "" || usuario === "" || dni === "") {
        return false;
    } 
    return true;
}
function validarNombre(nombre) {
    let contadorCaracteres = 0;
    for (i = 0; i < nombre.length; i++) {
        if (nombre[i] >= '0' && nombre[i] <= '9') {
            contadorCaracteres++;
        }
    }
    if ((nombre.length - contadorCaracteres) < 2) 
        return false;

    return true;
}

function validarApellidos(apellidos) {
    let contadorCaracteres = 0;
    for (i = 0; i < apellidos.length; i++) {
        if (apellidos[i] >= '0' && apellidos[i] <= '9') {
            contadorCaracteres++;
        }
    }
    if ((apellidos.length - contadorCaracteres) < 2) 
        return false;

    return true;
}

function validarEmail(dni) {
    for (i = 0; i < dni.length; i++) {
        if (dni[i] === "@")
            return true
    }
    return false;
}

function validarDni(dni) {
    dni = dni.trim().toUpperCase();

    const regex = /^\d{8}[A-Z]$/;
    
    if (!regex.test(dni)) {
        return false; 
    }

    const numero = dni.substring(0, 8);
    const letra = dni.charAt(8);

    const letras = "TRWAGMYFPDXBNJZSQVHLCKETMARPX";

    const letraCorrecta = letras.charAt(numero % 23);

    if (letra === letraCorrecta) {
        return true; 
    } else {
        return false; 
    }
}

function validarUsuario(usuario) {
    let contadorCaracteres = 0;
    if (usuario.length < 5 || usuario.length > 8) 
        return false;

    return true;
}

function validarSegundoFormulario() {
    iban =document.getElementById("iban").value;
    ccc =document.getElementById("ccc").value;
    pass = document.getElementById("pass").value;

    if (validarIBAN(iban)) {
        if (ccc.length == 20) {
            if (pass != "") {
                location.reload();
            } else {
                alert("La contraseña esta mal, no pueed estar vacia");
            }
        } else {
            alert("El CCC esta mal, tiene que tener 20 números");
        }
    } else {
        alert('El IBAN esta mal, tiene que seguir el formato "ES" y dos numeros');
    }
}

function validarIBAN(iban) {

    console.log

    if (iban.length != 4) {
        return false;
    }
    if (iban[0] != "E" || iban[1] != "S") {
        return false;
    }
    if ((iban[2] > "9" || iban[2] < "0")||(iban[3] > "9" || iban[3] < "0")) {
        return false;
    }
    return true;
}