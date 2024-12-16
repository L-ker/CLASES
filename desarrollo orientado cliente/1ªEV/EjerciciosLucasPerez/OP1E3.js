let numero = NaN;

while(isNaN(numero)) {
    numero = parseInt(prompt("Introduce el numero"));
}

console.log(numero % 2 == 0 ? "Par" : "Impar");