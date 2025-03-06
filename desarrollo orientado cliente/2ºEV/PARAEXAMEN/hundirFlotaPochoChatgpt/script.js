// Tableros de los jugadores
let tableroRojo = [];
let tableroAmarillo = [];

// Configuración inicial
const TAMANIO_TABLERO = 10; // Tablero de 10x10

// Crear tablero vacío
function crearTablero() {
  return Array(TAMANIO_TABLERO).fill().map(() => Array(TAMANIO_TABLERO).fill(null));
}

// Crear el tablero en el DOM
function crearTableroHTML(id, tablero) {
  const contenedor = document.getElementById(id);
  contenedor.innerHTML = ''; // Limpiar el tablero previo
  tablero.forEach((fila, filaIndex) => {
    fila.forEach((celda, colIndex) => {
      const celdaHTML = document.createElement('div');
      celdaHTML.classList.add('celda');
      celdaHTML.dataset.fila = filaIndex;
      celdaHTML.dataset.columna = colIndex;
      celdaHTML.addEventListener('click', (e) => manejarClick(e, filaIndex, colIndex, id));
      contenedor.appendChild(celdaHTML);
    });
  });
}

// Colocar barcos en el tablero
function colocarBarcos(tablero) {
  const barcos = [
    { tamaño: 4, cantidad: 1 },
    { tamaño: 3, cantidad: 2 },
    { tamaño: 2, cantidad: 3 },
  ];

  barcos.forEach((barco) => {
    for (let i = 0; i < barco.cantidad; i++) {
      let colocado = false;
      while (!colocado) {
        // Generar coordenadas aleatorias
        const fila = Math.floor(Math.random() * TAMANIO_TABLERO);
        const columna = Math.floor(Math.random() * TAMANIO_TABLERO);
        const direccion = Math.random() > 0.5 ? 'horizontal' : 'vertical';
        if (esPosicionValida(tablero, fila, columna, barco.tamaño, direccion)) {
          colocarBarcoEnTablero(tablero, fila, columna, barco.tamaño, direccion);
          colocado = true;
        }
      }
    }
  });
}

// Verificar si un barco cabe en la posición indicada
function esPosicionValida(tablero, fila, columna, tamaño, direccion) {
  if (direccion === 'horizontal') {
    if (columna + tamaño > TAMANIO_TABLERO) return false;
    for (let i = 0; i < tamaño; i++) {
      if (tablero[fila][columna + i] !== null) return false;
    }
  } else {
    if (fila + tamaño > TAMANIO_TABLERO) return false;
    for (let i = 0; i < tamaño; i++) {
      if (tablero[fila + i][columna] !== null) return false;
    }
  }
  return true;
}

// Colocar el barco en el tablero
function colocarBarcoEnTablero(tablero, fila, columna, tamaño, direccion) {
  if (direccion === 'horizontal') {
    for (let i = 0; i < tamaño; i++) {
      tablero[fila][columna + i] = 'barco';
    }
  } else {
    for (let i = 0; i < tamaño; i++) {
      tablero[fila + i][columna] = 'barco';
    }
  }
}

// Manejar los clics del jugador Amarillo
let clicksAmarillo = 0;

function manejarClick(event, fila, columna, id) {
  const celda = event.target;
  if (id === 'tablero-amarillo') {
    clicksAmarillo++;
    const resultado = tableroRojo[fila][columna] === 'barco' ? 'tocado' : 'agua';
    if (resultado === 'tocado') {
      celda.classList.add('tocado');
      tableroRojo[fila][columna] = null; // El barco se toca
    } else {
      celda.classList.add('agua');
    }
    mostrarMensaje(resultado);
    comprobarVictoria();
  }
}

// Comprobar si el jugador Amarillo ha ganado
function comprobarVictoria() {
  let barcosRestantes = 0;
  for (let i = 0; i < TAMANIO_TABLERO; i++) {
    for (let j = 0; j < TAMANIO_TABLERO; j++) {
      if (tableroRojo[i][j] === 'barco') {
        barcosRestantes++;
      }
    }
  }
  if (barcosRestantes === 0) {
    alert(`¡Victoria! El jugador Amarillo ha hundido todos los barcos en ${clicksAmarillo} clics.`);
    // Guardar resultado en cookie
    document.cookie = `mejorResultado=${clicksAmarillo}; max-age=3600; path=/`;
  }
}

// Mostrar mensaje en el juego
function mostrarMensaje(mensaje) {
  const mensajeElem = document.getElementById('mensaje');
  mensajeElem.textContent = mensaje === 'tocado' ? '¡Tocado!' : mensaje === 'agua' ? '¡Agua!' : '';
}

// Iniciar el juego
function iniciarJuego() {
  tableroRojo = crearTablero();
  tableroAmarillo = crearTablero();
  crearTableroHTML('tablero-rojo', tableroRojo);
  crearTableroHTML('tablero-amarillo', tableroAmarillo);
  colocarBarcos(tableroRojo);
}

document.getElementById('iniciar-juego').addEventListener('click', iniciarJuego);
