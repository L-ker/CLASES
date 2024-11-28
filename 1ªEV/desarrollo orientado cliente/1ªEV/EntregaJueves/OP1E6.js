let numero1 = NaN;

while(isNaN(numero1)) {
    numero1 = parseInt(prompt("Introduce el primer numero"));
}

let numero2 = NaN;

while(isNaN(numero2)) {
    numero2 = parseInt(prompt("Introduce el segundo numreo"));
}

if (numero1 > numero2) {
    console.log("El primer numero es mayor que el segundo")
} else if (numero1 < numero2) {
    console.log("El segundo numero es mayor que el primero ")
} else {
    console.log("Ambos números son iguales")

}

if (numero1 < 0) {
    console.log("El primer numero es negativo")
}
if (numero2 < 0) {
    console.log("El segundo numero es negativo")
}