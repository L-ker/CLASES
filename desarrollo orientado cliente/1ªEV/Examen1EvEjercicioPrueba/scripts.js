class Usuario {
    constructor(id, nombre,fecha) {
        this.id = id;
        this.nombre = nombre;
        this.fecha = fecha;
    }
}

function cargarUsuariosTabla() {
    let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
    tabla = document.getElementById("tabla");
    if (usuarios.length > 0) {
        while (tabla.rows.length > 1) {
            tabla.deleteRow(1);
        }
        for (let usuario of usuarios) {
            let nuevaFila = tabla.insertRow();

            let celdaNombre = nuevaFila.insertCell();
            let celdaFecha = nuevaFila.insertCell();

            celdaNombre.innerHTML = usuario.nombre;
            celdaFecha.innerHTML = usuario.fecha;
        }
        tabla.style.display = "block";

        document.getElementById('formularioEditar').style.display = "block";
    } else {
        tabla.style.display = "none";
        document.getElementById('formularioEditar').style.display = "none";
    }
}

function form1enviado() {
    let nombre = document.getElementById("nombre").value;
    let fecha = document.getElementById("fechaNacimiento").value;

    //funciones flecha (lo de abajo es una funcion que se ha de llamar)
    // comprobarNombre = nombre => /\d/.test(nombre);

    if (comprobarNombre(nombre) && comprobarFecha(fecha)) {
        crearUsuario(nombre,fecha);
    } else {
        alert("Ambos datos han de ser correctos");
    }
}

function crearUsuario(nombre,fecha) {
    let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

    let id = usuarios.length > 0 ? usuarios[usuarios.length - 1].id + 1 : 0;

    let usuario = new Usuario(id,nombre,fecha);

    usuarios.push(usuario);

    localStorage.setItem('usuarios', JSON.stringify(usuarios));
    cargarUsuariosTabla();
}

function comprobarNombre (nombre) {
    if (nombre === "") {
        alert("Debes escribir un nombre");
        return false;
    } else if (nombre === " ") {
        alert("El nombre no puede estar vacio");
        return false;
    } else if (/\d/.test(nombre)) {
        alert("El nombre no puede contener números");
        return false;
    }
    return true;
}
function comprobarFecha(fecha) {
    let fechaHoy = new Date();
    fechaHoy.setHours(0, 0, 0, 0);
    let fechaParametro = new Date(fecha);
    if (fechaParametro <= fechaHoy) {
        return false;
    } else {
        return true;
    }
}

function editarUsuario() {

}

function borrarStorage() {
    localStorage.removeItem('usuarios');
    tabla = document.getElementById("tabla");
    while (tabla.rows.length > 1) {
        tabla.deleteRow(1);
    }
    cargarUsuariosTabla();
}





// function funcionInicio() {
//     // Usando var
// console.log("Usando var:");
// for (var i = 0; i < 3; i++) {
//     console.log(`Bucle externo var - i: ${i}`);
//     for (var i = 0; i < 3; i++) {
//         console.log(`Bucle interno var - i: ${i}`);
//     }
// }

// // Usando let
// console.log("Usando let:");
// for (let i = 0; i < 3; i++) {
//     console.log(`Bucle externo let - i: ${i}`);
//     for (let i = 0; i < 3; i++) {
//         console.log(`Bucle interno let - i: ${i}`);
//     }
// }
// }