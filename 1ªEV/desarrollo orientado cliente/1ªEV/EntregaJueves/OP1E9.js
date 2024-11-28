function funcion() {
    let ciudad = prompt("Introduce tu ciudad favorita").toLowerCase();
    switch (ciudad) {
        case 'zaragoza':
            document.write("Maravillosa gente. Capital del Ebro")
            break;
        case 'barcelona':
            document.write("No puedes irte sin ver la Sagrada Familia");
            break;
        case 'madrid':
            document.write("La capital de España, no falla");
            break;
        default:
        document.write("No conozco esa ciudad");
    }
}
