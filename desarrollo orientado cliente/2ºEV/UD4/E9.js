const numeros = [10, 20, 30, 40];
const suma = numeros.reduce((a, b) => a + b);
const promedio = suma / numeros.length;
console.log(promedio); // Output: 25