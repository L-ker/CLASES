let numero1 = prompt("Introduce el primer numero (el dividendo)");
let numero2 = prompt("Introduce el segundo numero (el divisor)");
let divisorBinario = 0;

if (numero2 % 2 == 0) {
    while (numero2 > 1) {
        numero2 /= 2;
        divisorBinario ++;
        console.log(divisorBinario);
    }
}

let resultado = numero1 >> divisorBinario;

console.log(resultado);
