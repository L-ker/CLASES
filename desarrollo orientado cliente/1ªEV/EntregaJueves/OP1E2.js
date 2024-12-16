
let base = NaN;
let exponente = NaN;

while(isNaN(base)) {
    base = Number(prompt("Introduce la base"));
}
while(isNaN(exponente)) {
    exponente = prompt("Introduce el exponente");
}

base = base ** exponente;

console.log(base); 