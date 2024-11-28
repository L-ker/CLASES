// apartado a 
let correcto = false;
while (!correcto) {
    let contraseña = prompt("Introduce la contraseña (Debe de tener almenos 1 letra)");
    for (let i = 0; i < contraseña.length; i++) {
        if (contraseña[i] <= "z" && contraseña[i] >= "a") {
            correcto = true;
            i = contraseña.length;
        }
    }
}
// apartado b
let saldo = 10000;
function mostrarSaldo() {
    document.getElementById("divMostrarSaldo").innerHTML = "<a>El saldo de la cuenta es: " + saldo + " euros </a>";
}
// apartado c 
function sacarSaldo() {
    let saldoARetirar = NaN;
    while(isNaN(saldoARetirar)) {
        saldoARetirar = parseInt(prompt("Introduce el saldo a retirar"));
    }
    saldo -= saldoARetirar;
}


