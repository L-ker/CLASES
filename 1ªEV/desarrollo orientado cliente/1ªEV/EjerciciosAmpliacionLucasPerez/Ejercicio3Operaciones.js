const divtablaMultiplicar7 = document.getElementById("tablaMultiplicar7");
const divtablaSumar8 = document.getElementById("tablaSumar8");
const divtablaDividir9 = document.getElementById("tablaDividir9");

var aux = 1;
// var cadena = "";
do {
    divtablaMultiplicar7.innerHTML += 7 + " x " + aux + " = " + (7*aux) + "<br>";

    // cadena += siete + " x " + aux + " = " + (siete*aux) + "<br>";

    aux++;
} while (aux <= 10);
// document.getElementById("tablaMultiplicar7").innerHTML = cadena;

var aux = 1;
// var cadena = "";
while (aux <= 10) {
    divtablaSumar8.innerHTML += 8 + " + " + aux + " = " + (8+aux) + "<br>";

    // cadena  += 8 + " x " + aux + " = " + (8+aux) + "<br>";

    aux++;
}
// document.getElementById("divtablaSumar8").innerHTML = cadena;

// var cadena = "";
for (let i = 1; i <= 10; i++) {
    divtablaDividir9.innerHTML += 9 + " / " + i + " = " + (9/i) + "<br>";
}

function pasarAMultiplo2(numero) {
    let divisorBinario = 0;
    if (numero % 2 == 0) {
        while (numero > 1) {
            numero /= 2;
            divisorBinario ++;
        }
    }
    return divisorBinario;
}

document.getElementById("desplazamientoBits1").innerHTML = 125 >> pasarAMultiplo2(8);
document.getElementById("desplazamientoBits2").innerHTML = 40 << pasarAMultiplo2(4);
document.getElementById("desplazamientoBits3").innerHTML = 25 >> pasarAMultiplo2(2);
document.getElementById("desplazamientoBits4").innerHTML = 10 << pasarAMultiplo2(16);
