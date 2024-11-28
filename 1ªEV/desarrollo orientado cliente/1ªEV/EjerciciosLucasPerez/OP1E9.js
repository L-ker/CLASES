function funcion() {
    let ciudad = prompt("Introduce el nombre de una ciudad");
    switch (ciudad.toLowerCase()) {
        case "zaragoza":
            document.getElementById("escribirOP1E9").innerHTML = "Capital del ebro, gente genial";
            break;
        case "madrid":
            document.getElementById("escribirOP1E9").innerHTML = "Capital de España por algo, tienes que visitarla";
            break;
        case "barcelona":
            document.getElementById("escribirOP1E9").innerHTML = "Muy bonita, debes ver la sagrada familia si vas";
            break;
        default:
            document.getElementById("escribirOP1E9").innerHTML = "No conozco esa ciudad";
    }
}