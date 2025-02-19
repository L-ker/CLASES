function getCookie(nombre) {
    let cookies = document.cookie.split("; ");
    for (let cookie of cookies) {
        let [clave, valor] = cookie.split("=");
        if (clave === nombre) return valor;
    }
    return null;
}

function validarNombre(nombre) {
    if (nombre === "" || nombre === " "  || nombre === null) 
        return false;
    else 
        return true;
}

function validarApellidos(apellidos) {
    if (apellidos === "" || apellidos === " "  || apellidos === null) 
        return false;
    else 
        return true;
}



function validarEdad(edad) {
    if (!/^\d+$/.test(edad)) {
        return false;
    }
    if (edad < 0 || edad > 105) {
        return false;
    }
    return true;
}

function validarNif(nif) {
    /**
     * ^ = indica el inicio de la cadena
     * \d = indica un digito numerico 0-9
     * {8} = indica que deben aparecer 8 digitos numericos seguidos
     * - = literalmente que tiene que haber un guion
     * [A-Za-z] = indica una sola letra mayuscula o minuscula, como estan juntos puede ser cualquiera
     */
    if (!/^\d{8}-[A-Za-z]$/.test(nif)) {
        return false;
    }
    return true;
}

function validarEmail(email) {
    /**
     * ^ = indica el inicio de la cadena
     * [a-zA-Z0-9._%+-]+ = la parte dle usuario, permite letras, numeros y algunos caracteres especiales (. _ % + -) debe haber al menos un caracter
     * @ = es obligatorio que este en todos los correos
     * [a-zA-Z0-9.-]+ = la parte del dominio, permite letras, numeros, . y -, debe haber al menos un caracter
     * \. = el punto obligatorio del dominio, la barra es para escaparlo porque sino regex lo detecta como cualquier caracter
     * [a-zA-Z] = cualquier letra mayuscula o minuscula
     * {2,} = al menos 2 letras pero puede haber mas
     * $ = fin cadena
     */
    let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!regex.test(email)) {
        return false;
    }
    return true;
}

function validarProvincia(provincia) {    
    if (provincia === "0") {
        return false;
    }
    return true;
}

function validarFecha(fecha) {
    /**
     * ^ = inicio de la cadena
     * \d{2} = dos digitos numericos para el dia
     * [-\/] = un guion o una barra de separador
     * \d{2} = dos digitos numericos para el mes
     * [-\/] = un guion o una barra de separador
     * \d{4} = cuatro digitos numericos para el año
     * $ = fin de la cadena
     */
    let regex = /^\d{2}[-\/]\d{2}[-\/]\d{4}$/;
    if (!regex.test(fecha)) {
        return false;
    }
    return true;
}

function validarTelefono(telefono) {
    /**
     *  ^ = inicio de la cadena
     *  \d{9} = nueve digitos numericos
     *  $ = fin de la cadena
     */
    let regex = /^\d{9}$/;
    if (!regex.test(telefono)) {
        return false;
    }
    return true;
}

function validarHora(hora) {
    /**
     *  ^ = inicio de la cadena
     *  [01] = puede empezar por 1 o 0
     *  \d = seguido de cualquier caracter numerico del 1 al 9
     *  | = OR, o se cumple los 2 puntos de antes o se cumple lo siguiente
     *  2 = empieza por 2
     *  [0-3] = un número del 0 al 3
     *  : = tiene que estar este : de forma obligatoria 
     *  [0-5] = los minutos pueden empezar por cualquier numero del 1 al 5
     *  \d = cualquier caracter numerico seguido al anterior para completar los minutos
     *  $ = fin cadena
     */
    let regex = /^([01]\d|2[0-3]):[0-5]\d$/; 
    if (!regex.test(hora)) {
        return false;
    }
    return true;
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener("submit", function(event) {
        event.preventDefault();

        let intentos = getCookie("intentos");


        console.log("intentos: "+ intentos);

        if (intentos === null) {
            intentos = 1;
        } else {
            intentos = parseInt(intentos) + 1;
        }

        document.cookie = "intentos=" + intentos + ";";

        document.getElementById("intentos").innerHTML = "Se han hecho " + intentos + " intentos de envío.";

        let mensajeError = "";

        let nombre = document.getElementById("nombre").value;

        if (!validarNombre(nombre)) {
            if (mensajeError.length != 0) 
                mensajeError += "<br>";
            document.getElementById("nombre").focus();
            mensajeError += "Nombre vacio";
        }

        let apellidos = document.getElementById("apellidos").value;

        if (!validarApellidos(apellidos)) {
            if (mensajeError.length != 0) 
                mensajeError += "<br>";
            document.getElementById("apellidos").focus();
            mensajeError += "Apellidos vacios";
        }

        let edad = document.getElementById("edad").value;

        if (!validarEdad(edad)) {
            if (mensajeError.length != 0) 
                mensajeError += "<br>";
            document.getElementById("edad").focus();
            mensajeError += "Edad incorrecta";
        }

        let nif = document.getElementById("nif").value;

        if (!validarNif(nif)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            document.getElementById("nif").focus();
            mensajeError += "Nif incorrecto";
        }

        let email = document.getElementById("email").value;

        if (!validarEmail(email)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            document.getElementById("email").focus();
            mensajeError += "Email incorrecto";
        }

        let provincia = document.getElementById("provincia").value;

        if (!validarProvincia(provincia)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            document.getElementById("provincia").focus();
            mensajeError += "Debe seleccionar una provincia";
        }

        let fecha = document.getElementById("fecha").value;

        if (!validarFecha(fecha)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            document.getElementById("fecha").focus();
            mensajeError += "La fecha no cumple el formato  dd/mm/aaaa o dd-mm-aaaa";
        }

        let telefono = document.getElementById("telefono").value;

        if (!validarTelefono(telefono)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            document.getElementById("telefono").focus();
            mensajeError += "El telefono no tiene 9 digitos numericos";
        }

        let hora = document.getElementById("hora").value;

        if (!validarHora(hora)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            document.getElementById("hora").focus();
            mensajeError += "La hora no cumple el formato hh:mm";
        }

        let confirmar = confirm("¿Estás seguro de que quieres enviar el formulario?");
        
        if (confirmar) {
            this.submit();
        } else {
            alert("Envío cancelado.");
        }

        "<>";
        document.getElementById("errores").innerHTML = mensajeError;
    });

    function convertirAMayusculas(event) {
        event.target.value = event.target.value.toUpperCase();
    }

    document.getElementById("nombre").addEventListener("blur", convertirAMayusculas);
    document.getElementById("apellidos").addEventListener("blur", convertirAMayusculas);

});