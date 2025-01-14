const frase = "Esta es una frase de prueba para el ejemplo de iteradores en JavaScript";
const palabrasUnicas = [...new Set(frase.split(" "))];
console.log(palabrasUnicas); // Output: ["Esta", "es", "una", "frase", "de", "prueba", "para", "el", "ejemplo", "en","JavaScript"]