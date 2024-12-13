class Edificio {
    constructor(calle,numero,codigoPostal) {
        this.calle = calle;
        this.numero = numero;
        this.codigoPostal = codigoPostal;
        this.plantas = [];
        console.log("Constrido nuevo edificio en calle: " + calle + ", nº: " + numero + ", CP: " + codigoPostal);
    }

    agregarPlantasYPuertas(numPlantas, puertas) {
        let plantasAñadir = this.plantas||[];
        for (let i = 0; i < numPlantas; i++) {
            plantasAñadir.push(new Array(puertas));
        }
        this.plantas = plantasAñadir;
    }

    modificarNumero(numero) {
        this.numero = numero;
    }

    modificarCalle(calle) {
        this.calle = calle;
    }

    modificarCodigoPostal(codigoPostal) {
        this.codigoPostal = codigoPostal;
    }

    imprimeCalle() {
        return this.calle;
    }

    imprimeNumero() {
        return this.numero;

    }

    impribmeCodigoPostal() {
        return this.codigoPostal;
    }

    agregarPropietario(nombre, planta, puerta) {
        let plantasAñadirPropietario = this.plantas;
        plantasAñadirPropietario[planta][puerta] = nombre;
        this.plantas = plantasAñadirPropietario;
        console.log(nombre + " es ahora el propietario de la puerta " + (puerta + 1) + " de la planta " + (planta + 1));
    }

    imprimePlantas() {
        console.log("Listado de propietarios del edificio calle " + this.calle + " número " + this.numero);
        let plantasRecorrer = this.plantas;
        for (let i = 0; i < plantasRecorrer.length; i++) {
            let planta = plantasRecorrer[i];
            for(let j = 0; j < planta.length; j++) {
                console.log("Propietario del piso " + (j + 1) + " de la planta " + (i + 1)+ ": " + (planta[j]||""));
            }
        }
    }

}

function test() {
    edificioA = new Edificio("Garcia Prieto","58","15706");
    edificioB = new Edificio("Camino Caneiro","29","32004");
    edificioC = new Edificio("San Clemente","s/n","15705");

    console.log("El código postal del edifico A es: " + edificioA.impribmeCodigoPostal());

    console.log("La calle del edificio C es: " + edificioC.imprimeCalle());

    console.log("El edificio B esta situado en la calle " + edificioB.imprimeCalle() + " número " + edificioB.imprimeNumero());

    edificioA.agregarPlantasYPuertas(2,3);

    edificioA.agregarPropietario("Jose Antonio Lopez",0,0);
    edificioA.agregarPropietario("Luisa Martinez",0,1);
    edificioA.agregarPropietario("Marta Castellon",0,2);
    edificioA.agregarPropietario("Antonio Pereira",1,1);

    edificioA.imprimePlantas();
    
    edificioA.agregarPlantasYPuertas(1,3);

    edificioA.agregarPropietario("Pedro Meijede",2,1);

    edificioA.imprimePlantas();

}