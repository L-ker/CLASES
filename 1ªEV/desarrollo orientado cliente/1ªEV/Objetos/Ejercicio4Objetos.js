window.onload = function () {
    function Persona (nombre,apellido,edad,mail) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad;
        this.mail = mail;
    }
    
    let mediaEdadesFlecha = (...argumentos) => {
        let media = 0;
        let aux = 0;
        for (i = 0; i < argumentos.lenght; i++) {
            aux += argumentos[i].edad;
        }
        return media = (aux) / argumentos.lenght;
    }
    
    function mediaEdades () {
        let media = 0;
        let aux = 0;
        for (i = 0; i < arguments.length; i++) {
            aux += arguments[i].edad;
            
        }
        return media = (aux) / arguments.length;
    }

    let p1 = new Persona("Roberto","Martinez",22,"roberto.martinez@tuempresa.com");
    let p2 = new Persona("Antonio","Lopez",25,"antonio.lopez@tuempresa.com");
    let p3 = new Persona("Javier","Rodriguez",18,"javier.rodriguez@tuempresa.com");
    let p4 = new Persona("Eva","Teruel",33,"@tuempresa.com");

    mediaEdadesPersonas = mediaEdades(p1,p2,p3,p4);
    document.getElementById("escribir").innerText = "La media de las edades es: " + mediaEdadesPersonas;
}