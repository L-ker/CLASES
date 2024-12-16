const abecedario = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

let numeroDni = prompt("Introduce los números del DNI");
let letraDni = prompt("Introduce la letra del DNI");
let correcto = true;

if (letraDni.length == 0) {
    alert("La letra de DNI no puede estar vacía.");
    correcto = false;
}

if (!abecedario.includes(letraDni)) {
    alert("El carácter de la letra es incorrecto.");
    correcto = false;
}

let num = parseInt(numeroDni);

if (numeroDni.length != 8 || isNaN(num)) {
    alert("El número de DNI es incorrecto. Debe ser un número de 8 dígitos.");
    correcto = false;
}

if (num < 0 || num > 99999999 ) {
    alert("El número de DNI debe estar entre 0 y 99.999.999.");
    correcto = false;
}

if (correcto) {
    alert("El DNI es correcto");
} else {
    alert("El DNI es incorrecto");
}
