let nombre;
let apellido;
while(nombre == null || nombre=="") {
     nombre = prompt("Introduce tu nombre");
}
while(apellido == null || apellido=="") {
    apellido = prompt("Introduce tu apellido");
}
let fullName = nombre.concat(" ", apellido);
let edad;
while(edad == null || edad=="") {
    edad = prompt("Introduce tu edad");
}

let nacimiento = new Date().getFullYear() - Number(edad);

console.log(fullName);
console.log(nacimiento);