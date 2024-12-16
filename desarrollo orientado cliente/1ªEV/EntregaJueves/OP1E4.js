let numero1 = NaN;

while(isNaN(numero1)) {
    numero1 = parseInt(prompt("Introduce el primer numero (Se comprobará si este es múltiplo del otro)"));
}

let numero2 = NaN;

while(isNaN(numero2)) {
    numero2 = parseInt(prompt("Introduce el numero"));
}

console.log(numero2 % numero1 == 0 ? console.log("El número " + numero1 + " es múltiplo de " + numero2) : console.log("El número " + numero1 + " no es múltiplo de " + numero2));