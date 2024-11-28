let filas = parseInt(prompt("Introduce el número de filas"));
let columnas = parseInt(prompt("introduce el número de columnas"));

let matriz = [];



for (let i = 0; i <= columnas; i++) {
    matriz[i] = [];
    for (let j = 0; j <= filas; j++) {
        matriz[i][j] = `(${j},${i})`;
    }
}

let escribir = "<table border:double>";
for (let i = 0; i <= columnas; i++) {
    escribir += "<tr>";
    for (let j = 0; j <= filas; j++) {
        escribir += `<td>${matriz[i][j]}</td>`;
    }
    escribir += "</tr>"; 
}
escribir += "</table>"

document.getElementById("escribir").innerHTML = escribir;