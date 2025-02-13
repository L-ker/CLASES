function getCookie(nombre) {
    let cookies = document.cookie.split("; ");
    for (let cookie of cookies) {
        let [clave, valor] = cookie.split("=");
        if (clave === nombre) return valor;
    }
    return null;
}

function validarNombreYApellidos(cadena) {
    if (cadena === "" || cadena === " "  || cadena === null) 
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
    if (!/^\d{8}-[A-Za-z]$/.test(nif)) {
        console.log("NO CUMPLE REGEX");
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

        let valorNombre = document.getElementById("nombre").value;
        let valorApellidos = document.getElementById("apellidos").value;

        let mensajeError = "";


        if (!validarNombreYApellidos(valorNombre) || !validarNombreYApellidos(valorApellidos)) {
            mensajeError = "Nombre o apellidos incorrectos";
        }

        let edad = document.getElementById("edad").value;

        if (!validarEdad(edad)) {
            if (mensajeError.length != 0) 
                mensajeError += "<br>";
            
            mensajeError += "Edad incorrecta";
        }

        let nif = document.getElementById("nif").value;

        if (!validarNif(nif)) {
            if (mensajeError.length !== 0) 
                mensajeError += "<br>";
            
            mensajeError += "Nif incorrecto";
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