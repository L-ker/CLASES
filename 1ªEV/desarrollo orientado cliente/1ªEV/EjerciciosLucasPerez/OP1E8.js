let numero = prompt ("Introduce el numero del que se hara el factorial");
let resultado = 1;

for (let i = 1; i <= numero; i++) {
    resultado *= i;
}

console.log(resultado);