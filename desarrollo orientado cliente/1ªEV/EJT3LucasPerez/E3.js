let talla = prompt("Introduce la talla");
let tallaMostrar = "";

switch (talla) {
    case "XXL":
    case "XL":
    case "L":
        tallaMostrar = "Grande";
        break;
    case "M":
        tallaMostrar = "Mediana";
        break;
    case "S":
    case "XS":
    case "XXS":
        tallaMostrar = "Pequeña";
        break;
    default:
        tallaMostrar = "No reconozco esa talla";
}

alert(tallaMostrar);