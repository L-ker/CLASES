const escribir = document.getElementById("escribir");

let dinero = 10000;

let inicioSesion = () => {
    let usuario = document.getElementById("usuario").value;
    let contraseña = document.getElementById("contraseña").value;

    if (usuario === "usuario" && contraseña === "contraseña") {
        document.getElementById("divInicioSesion").style.display = "none";
        document.getElementById("divCalculadora").style.display = "block";
        alert("Inicio de sesión correcto")
    } else 
        alert("Usuario o contraseña incorrectos");
}

let comprobarDinero = () => {
    escribir.innerHTML = "Su saldo actual es de " + dinero;
}

let sacarDinero = () => {
    let dineroAretirar = parseInt(document.getElementById("inputTexto").value);
    if (dineroAretirar > dinero) 
        escribir.innerHTML = "No posee saldo suficiente para realizar esta accion";
    else {
        dinero -= dineroAretirar
        escribir.innerHTML = "Su saldo tras la accion es de = " + dinero +" euros";
    }
}

let ingresarDinero = () => {
    dineroAingresar = parseInt(document.getElementById("inputTexto").value);
    dinero = dinero + dineroAingresar;
    escribir.innerHTML = "Se han ingresado " + dineroAingresar + " euros a su cuenta";
}
