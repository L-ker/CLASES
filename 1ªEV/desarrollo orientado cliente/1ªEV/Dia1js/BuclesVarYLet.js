// // EJEMPLO HOISTING
// Con var machaca el valor mas o menos como si fuera la misma variable
// for (var i = 0; i < 2; i++) {
//     console.log("Tercero", i);
//     for (var i = 0; i < 2; i++) {
//         console.log("Cuarto", i);
//     }
// }

// Con let no lo machaca y son independientes dentro de estructuras a fuera de estas
// for (let i = 0; i < 2; i++) {
//     console.log("Primer", i);
//     for (let i = 0; i < 2; i++) {
//         console.log("Segundo", i);
//     }
// }

// var mensaje = "Hola Mundo!";
// if (true) {
//     //var mensaje = "Se ha cambiado el mensaje variable global";
//     let mensaje = "Se ha cambiado el mensaje";
//     //aqui el mensaje seria Se ha cambiado el mensaje
//     //console.log(mensaje); 
// }
// console.log(mensaje);

// function test() {
//     let result = 1;
//     result++;
//     return result;
// }

// let obj = test();
// console.log(obj);

// let minombre
// let a = null;
// let b = "cadena";
// let c = 15;
// let d = true;

// console.log(typeof minombre);
// console.log(typeof a);
// console.log(typeof b);
// console.log(typeof c);
// console.log(typeof d);

// var comilla = "Instituto Escuela Secundaria";
// console.log(comilla);
// var comilla = "Instituto Escuela Secundaria 'IES'";
// console.log(comilla);
// var comilla = "Instituto Escuela Secundaria "IES"";
// console.log(comilla);

// alert("1) A la gente de Zaragoza se les llama \"Maños\" Nacimos en los 70's");

// document.body.style.backgroundColor = "red";

// alert('\xBC');

// var mensaje = "El número “\xB5” tiene un valor de 3,14.....    ";

// console.log(mensaje);

// document.getElementById("contenedor").style.backgroundColor="white";

// let confirmacion = confirm("¿Te ha gustado nuestra página web?");
// if (confirmacion) {
//     alert("¡Gracias por confiar en nosotros!");
// } else {
//     alert("¡Intentaremos mejorarla proximamente!");
// }

// function confirmar() {
//     return confirm("Esta pagina tiene contenido para adulto. ¿Eres mayor de 18 años?")
// }
// let nombre;
// while(nombre == null || nombre=="") {
//     nombre = prompt("Introduce tu nombre");
// }
// alert("Hola " + nombre + "! Gracias por darte de alta")

let nombre;
while(nombre == null || nombre=="") {
    nombre = prompt("Introduce tu nombre");
}
alert("Hola " + nombre + "! Gracias por darte de alta")