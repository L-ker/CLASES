let varTablero; //VARIABLE A USAR LUEGO
let piezas = ["♖","♘","♗","♕","♔","♗","♘","♖"] // ARRAY CON LAS PIEZAS ORDENADAS
let peon = "♙"; // VARIBALE DE PEONES

/* CREAMOS EL TABLERO */
onload = function tablero() {
 /* REFERIMOS LA TABLA VACÍA EN UNA VARIABLE */
 /* CREA EN LA TABLA 8 FILAS CON DO WHILE */
 /* INSERTA CADA FILA DEL TABLERO EN UNA NUEVA VARIABLE FILA: .insertRow(0), .insertRow(1)....*/
 /* CREA EN CADA FILA 8 CELDAS. EMPLEA FOR  */
 /* INSERTA TODAS LAS CELDAS EN SU CORRESPONDIENTES 8 FILAS (a modo de columnas) .insertCell(0), .insertCell(0)*/
 /* AHORA QUE TENEMOS EL TABLERO CONSTRUIDO DE 8X8; CON INNERHTML Y EMPLEADO SWITCH-CASE RELLENA LAS FILAS 0 Y 7 CON LAS PIEZAS CORRESPONDIENTES Y LAS FILAS 1 Y 6 CON LOS PEONES*/
 let varTablero = document.getElementById("tablero");

 let i = 0;
 let j = 0;
 let escribir = "";
 do {
    let fila = varTablero.insertRow(0);
    do {
        let celda = fila.insertCell(0);
        celda = "";
        j++;
    }while(j < 8);
    j = 0;
    i++;
 }while(i < 8);

 for (i = 0; i < 8; i++) {
    varTablero.rows[0].cells[i].innerHTML = "<span class=negras>" + piezas[i] + "</span>";
    varTablero.rows[7].cells[i].innerHTML = "<span class=blancas>" + piezas[i] + "</span>";
    varTablero.rows[1].cells[i].innerHTML = "<span class=negras>" + peon + "</span>";
    varTablero.rows[6].cells[i].innerHTML = "<span class=blancas>" + peon + "</span>";
 }
}