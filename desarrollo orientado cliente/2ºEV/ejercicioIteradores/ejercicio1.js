// Ruta del archivo JSON (asegúrate de que este archivo esté accesible)
// const jsonArchivo = 'reservas.json';  // Puedes cambiar la ruta si es una URL externa

function contarReservasPendientes() {
        let escribir = document.getElementById("output");

        const jsonArchivo = 'reservas.json';  // Puedes cambiar la ruta si es una URL externa

        // Usamos fetch para cargar el archivo JSON
        let array = fetch(jsonArchivo)
        .then(response => {
        if (!response.ok) {
                throw new Error(`Error al cargar el archivo JSON: ${response.statusText}`);
        }
        return response.json(); // Convertimos la respuesta a JSON
        })
        .then(data => {
        // Filtramos las reservas con estado "Pendiente"
        const reservasPendientes = data.filter(reserva => reserva.estado === "Pendiente");

        // Mostramos el número de reservas pendientes
        escribir.innerHTML = `Número de reservas pendientes: ${reservasPendientes.length}`;
        })
        .catch(error => {
        console.error("Error al cargar o procesar el JSON:", error);
        let errorMessage = document.getElementById("errorMessage");
        errorMessage.innerHTML = `Error al cargar el archivo JSON: ${error.message}`;
        });

        escribir.innerHTML = "Número de reservas pendientes: " + array.filter(reserva => reserva.estado === "Pendiente").length
}