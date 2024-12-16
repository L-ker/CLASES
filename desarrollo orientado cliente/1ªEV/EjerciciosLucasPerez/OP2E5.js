let ovni = "OBJETO VOLADOR NO IDENTIFICADO";
let info = "En un lugar de la mancha";

let cadena = prompt("Introduce una oración cualquiera");

// function tieneMayusculas(cadena) {
//     let cadenaMayusculas = cadena.toUpperCase();
//     for (i = 0; i < cadena.length; i++) {
//         if (cadenaMayusculas[i] == cadena[i] ) {
//             return true;
//         }
//     }
//     return false;
// }

// function tieneMinusculas(cadena) {
//     let cadenaMinusculas = cadena.toLowerCase();
//     for (i = 0; i < cadena.length; i++) {
//         if (cadenaMinusculas[i] == cadena[i] ) {
//             return true;
//         }
//     }
//     return false;
// }

    if (cadena == cadena.toUpperCase()) {   
        console.log("La cadena '" + cadena + "' tiene solo mayusculas")
    } else if (cadena == cadena.toLowerCase()) {
        console.log("La cadena '" + cadena + "' tiene solo minusculas")
    } else {
        console.log("La cadena '" + cadena + "' tiene mayusculas y minusculas")
    }

