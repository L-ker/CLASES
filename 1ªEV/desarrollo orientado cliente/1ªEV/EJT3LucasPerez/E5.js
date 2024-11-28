function random (max,min) {
    return Math.round(Math.random() * (max - min) + min);
}
let boleto = [];
while (boleto.length < 5) {
    let numero = random(50,1);
    if (!boleto.includes(numero)) {
        console.log(boleto.push(numero));
    } 
}
while (boleto.length < 7) {
    let numero = random(10,1);
    if (!boleto.includes(numero)) {
        console.log(boleto.push(numero));
    } 
}

document.getElementById("escribir").innerHTML = boleto;