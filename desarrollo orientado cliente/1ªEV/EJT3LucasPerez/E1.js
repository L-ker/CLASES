function esPrimo(num) {
    for (let i = 2; i < num; i++) {
        if (num % i == 0) {
            return false;
        }
    }
    return true;
}

let noPrimos = 0;
for (let i = 0; i <= 500; i++) {
    if (i % 3 == 0) {
        console.log(i);
    }
    if (!esPrimo(i)) {
        noPrimos++;
    }
}
console.log("Hay " + noPrimos + " numeros no primos del 1 al 500");