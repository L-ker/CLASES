let editando = false
let valoresOriginales = [];
function transformarEnEditable(elemento) {
    divBotones = document.getElementById("contenedorForm")
    if (editando == false) {
        valoresOriginales = [];
        let fila = elemento.closest("tr")

        let celdaEditar = fila.lastElementChild;
        let span = celdaEditar.querySelector("span");

        span.textContent = "En edicion"

        span.style.color = "grey"

        console.log(celdaEditar)

        let celdas = fila.querySelectorAll("td:not(:last-child)")

        celdas.forEach((celda) => {
            valoresOriginales.push(celda.textContent); 
            let input = document.createElement("input");
            input.type = "text";
            input.name = 
            input.value = celda.textContent;  
            celda.textContent = "";  
            celda.appendChild(input);  
        });

        divBotones.innerHTML = "Pulse Aceptar para guardar los cambios o cancelar para anularlos"
        
        editando = true;
    } else {
    divBotones.textContent = "Solo se puede editar una línea, cancele o recargue la página para poder editar otra"
    }
    divBotones.innerHTML = divBotones.innerHTML + "<br><button onclick='capturarEnvio()'>Aceptar</button><button onclick='window.location.reload()'>Cancelar</button>"
}

function capturarEnvio() {
    inputs = document.querySelectorAll("input")

    let formulario = document.createElement("form")

    formulario.action = "https://8.8.8.8";
    formulario.method = "GET"

    let nombresColumnas = [
        "Alimento",
        "Calorias",
        "Grasas",
        "Protenia",
        "Carbohidratos"
    ]
    let numColumna = 0

    inputs.forEach((input) => {
        let inputOculto = document.createElement("input")
        inputOculto.value = input.value
        inputOculto.type = "hidden"
        inputOculto.name = nombresColumnas[numColumna]
        formulario.appendChild(inputOculto)
        numColumna++
    })

    document.body.appendChild(formulario);
    formulario.submit();
}