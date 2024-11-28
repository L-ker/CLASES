let numero = NaN;

while(isNaN(numero)) {
    numero = parseInt(prompt("Introduce un numero del que se hará el factorial"));
}

let resultado = 1;

for (i = 2; i <= numero; i++) {
    resultado = resultado * i;  
}

console.log(resultado);