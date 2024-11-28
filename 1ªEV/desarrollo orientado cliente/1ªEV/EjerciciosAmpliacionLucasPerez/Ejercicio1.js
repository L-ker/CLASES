
let notaExamen = NaN;
let notaProyecto = NaN;

while(isNaN(notaExamen) || (notaExamen < 0 || notaExamen > 10)) {
    notaExamen = parseFloat(prompt("Introduce la nota del examen"));
}
while(isNaN(notaProyecto) || (notaProyecto < 0 || notaProyecto > 10)) {
    notaProyecto = parseFloat(prompt("Introduce la nota del proyecto"));
}

notaMedia = (notaExamen + notaProyecto) / 2;
let calificacion = "suspenso";

if (notaProyecto >= 4.5 && notaExamen >= 4.5) {
    if ( notaMedia >= 5 && notaMedia < 7) {
        calificacion = "aprobado";
    } else if (notaMedia < 9) {
        calificacion = "notable";
    } else {
        calificacion = "sobresaliente";
    }
}

alert("La media es = " + notaMedia + " y la calificación es: " + calificacion);