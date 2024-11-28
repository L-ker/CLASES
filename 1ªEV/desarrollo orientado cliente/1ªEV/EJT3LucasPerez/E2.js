numeros = [5,0,-3,2,100,5,7,8,23,44];

var numeroMayor = numeros[0];
var numeroMenor = numeros[0];

for (let num of numeros) {
    if (num < numeroMenor) {
        numeroMenor = num;
    }
    if (num > numeroMayor) {
        numeroMayor = num;
    }
}

console.log("El menor numero del array es: " + numeroMenor);
console.log("El mayor numero del array es: " + numeroMayor);

numerosPedidos = [];
for (i = 0; i < 10; i++) {
    numerosPedidos[i] = parseInt(prompt("Introduce un número"));
}

var numeroMayor = numerosPedidos[0];
var numeroMenor = numerosPedidos[0];

for (let num of numerosPedidos) {
    if (num < numeroMenor) {
        numeroMenor = num;
    }
    if (num > numeroMayor) {
        numeroMayor = num;
    }
}

console.log("El menor numero del array es: " + numeroMenor);
console.log("El mayor numero del array es: " + numeroMayor);
