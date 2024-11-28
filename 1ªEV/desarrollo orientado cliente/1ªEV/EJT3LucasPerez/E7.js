const pantalla = document.getElementById("pantallaCalculadora");

let valorAhora = "";
let operacion = "";
let valorAnterior = "";
let resultadoAnterior = "";

function añadirNumero(numero) {
    valorAhora += numero;
    pantalla.value = valorAhora;
}

function limpiarPantalla() {
    valorAhora = "";
    operacion = "";
    valorAnterior = "";
    pantalla.value="";
}

function seleccionarOperacion(operacionIntroducida) {
    if (valorAhora == "") return;
    operacion = operacionIntroducida;
    valorAnterior = valorAhora;
    valorAhora = "";
    pantalla.value = "";
}

function mostrarResultadoAtenrior() {
    if (resultadoAnterior == "") return;
    valorAhora = resultadoAnterior;
    pantalla.value = resultadoAnterior;
}

function raizCuadrada() {
    valorAhora = Math.sqrt(valorAhora);
    resultadoAnterior = valorAhora;
    pantalla.value = valorAhora;
}

function calcular() {
    if (pantalla.value != "" && valorAnterior != "") {
        valorAhora = pantalla.value;
        valorAhoraNumerico = parseInt(valorAhora);
        valorAnteriorNumerico = parseInt(valorAnterior);
        let respuesta = "";
        switch(operacion) {
            case '*':
                respuesta = valorAnteriorNumerico * valorAhoraNumerico;
                break;
            case '+':
                respuesta = valorAnteriorNumerico + valorAhoraNumerico;
                break;
            case '/':
                respuesta = valorAnteriorNumerico / valorAhoraNumerico;
                break;
            case '-':
                respuesta = valorAnteriorNumerico - valorAhoraNumerico;
                break;
        }
        resultadoAnterior = respuesta;
        pantalla.value = respuesta;
    } else 
        return;
}