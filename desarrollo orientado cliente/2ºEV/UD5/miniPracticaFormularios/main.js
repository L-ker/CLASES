document.getElementById('formulario').addEventListener('submit', function(event) {
    event.preventDefault(); 
    console.log("nombre: " + document.getElementById("nombre").value);

    console.log("textArea: " + document.getElementById("mensaje").value);

    console.log("Boton busqueda: " + document.getElementById("busquedaSobreCentro").value);


});