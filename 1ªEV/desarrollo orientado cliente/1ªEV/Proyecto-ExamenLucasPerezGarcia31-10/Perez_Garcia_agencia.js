// apartado b
let nombreAgencia = ""
let ciudadOrigen = "";
let ciudadDestino = "";
let fechaViaje = "";
let descuento = 0;

while(nombreAgencia == "" || nombreAgencia == " ") {
    nombreAgencia = prompt("Introduce el nombre de la agencia");
}
while(ciudadOrigen == "" || ciudadOrigen == " ") {
    ciudadOrigen = prompt("Introduce la ciudad de origen del viaje");
}
while(ciudadDestino == "" || ciudadDestino == " ") {
    ciudadDestino = prompt("Introduce la ciudad destino del viaje");
}
while(fechaViaje == "" || fechaViaje == " ") {
    fechaViaje = prompt("Introduce la fecha del viaje con el siguiente formato 'DD-MM-YYYY' (En numeros el mes)");
}
// apartado a
document.getElementById("tituloAplicacion").innerHTML = "<h1> " + nombreAgencia +"</h1>"
document.getElementById("escribirApartadoB").innerHTML = "<a>Tu viaje es desde " +ciudadOrigen+ " hasta " +ciudadDestino+" y en la fecha " +fechaViaje+"</a>";
// apartado c
if ((ciudadDestino.toLowerCase() == "zaragoza" && ciudadOrigen.toLowerCase() == "barcelona") || (ciudadDestino.toLowerCase() == "barcelona" && ciudadOrigen.toLowerCase() == "zaragoza")) {
   descuento = 10; 
}
if (descuento = 10) {
    document.getElementById("escribirApartadoC").innerHTML = "<a>Su viaje posee un descuento del 10%</a>";
} else {
    document.getElementById("escribirApartadoC").innerHTML = "<a>Su viaje no posee descuento alguno</a>";
}

// apartado d
if ((ciudadDestino.length + ciudadOrigen.length) > 10) {
    document.getElementById("cuadradoNaranja").innerHTML = "<a>Caracteres superiores a 10</a>";
}
// apartado e
let numeroCaracteresACiudadOrigen = 0;
for (let i = 0; i < ciudadOrigen.length; i++) {
    if (ciudadOrigen[i] == "A") {
        numeroCaracteresACiudadOrigen++;
    }
}
document.getElementById("escribirApartadoE").innerHTML = "<a>El número de carácteres 'A' de la ciudad de origen es: " +numeroCaracteresACiudadOrigen+"</a>";
// apartado f
let dia = parseInt(fechaViaje[0] + fechaViaje[1]); 
let mes = parseInt(fechaViaje[3] + fechaViaje[4]); 
let año = parseInt(fechaViaje[6] + fechaViaje[7] + fechaViaje[8] + fechaViaje[9]); 
let fecha = new Date();

console.log(dia)
console.log(mes)
console.log(año)

let fechaCorrecta = comprobarFecha();

function comprobarFecha () {
    if (año < fecha.getFullYear() ) {
        return false;
    } else if (mes < fecha.getMonth() ) {
        return false;
    } else if (dia < fecha.getDate() && mes == fecha.getMonth && año == fecha.getFullYear) {
        return false;
    }
    return true;
}

while (!fechaCorrecta) {
    fechaViaje = prompt("Introduce la fecha del viaje con el siguiente formato 'DD-MM-YYYY' (En numeros el mes)");
    // se que esto de qui no es todo lo eficiente que podria pero no tengo tiempo para hacerlo mejor
    dia = parseInt(fechaViaje[0] + fechaViaje[1]); 
    mes = parseInt(fechaViaje[3] + fechaViaje[4]); 
    año = parseInt(fechaViaje[6] + fechaViaje[7] + fechaViaje[8] + fechaViaje[9]); 
    fechaCorrecta = comprobarFecha();
}

// apartado g


let diasMes = 0;
switch (mes) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        diasMes = 31;
        break;
    case 2:
        diasMes = 28;
    case 4:
    case 6:
    case 9:
    case 11:
        diasMes = 30;
}
document.getElementById("escribirApartadoG").innerHTML = "<a>El mes seleccionado tiene "+diasMes+ " dias</a>";
// apartado h
let ciudades = ["Zaragoza", "Barcelona"];
ciudades.push("Madrid");
let aux = 0;
let stringMostrarCiudades = "<a>Ciudades: ";
do {
    stringMostrarCiudades += " " + ciudades[aux];
    aux++;
} while (aux < ciudades.length);
stringMostrarCiudades += "</a>";
document.getElementById("escribirApartadoh").innerHTML = stringMostrarCiudades;
// apartado i
let cadenaNumeros = [15,10,-150,7,10/7,49,100]
let numeroMultiplos5 = 0;
for (let i = 0; i < cadenaNumeros.length; i++) {
    if (cadenaNumeros[i] % 5 == 0) 
        numeroMultiplos5++;
}
document.getElementById("escribirApartadoi").innerHTML = "<a>El número de multiplos de 5 del siguiente Array (15,10,-150,7,10/7,49,100) es: "+numeroMultiplos5+"</a>";