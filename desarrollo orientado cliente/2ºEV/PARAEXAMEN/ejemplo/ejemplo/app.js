$(document).ready(function() {
    // Cargar las provincias desde el archivo JSON
    $.getJSON('provincias_municipios.json', function(data) {
        // Rellenar la lista de provincias
        data.forEach(function(item) {
            $('#provincia').append(new Option(item.provincia, item.provincia));
        });
     

        // Evento cuando se selecciona una provincia
        $('#provincia').change(function() {
            var provinciaSeleccionada = $(this).val();
            
            // Limpiar la lista de municipios
            $('#municipio').empty();
            $('#municipio').append(new Option('Seleccione un municipio', ''));

            // Si se selecciona una provincia, cargar los municipios
            if (provinciaSeleccionada) {
                let provincia = data.find(function(item) {
                    return item.provincia === provinciaSeleccionada;
                });

                // Rellenar la lista de municipios
                provincia.municipios.forEach(function(municipio) {
                    $('#municipio').append(new Option(municipio, municipio));
                });
            }
        });
    });
});
