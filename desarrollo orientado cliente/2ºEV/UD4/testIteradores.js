const reservas = [
    { id: 10000, precio: 25, habitacion: 'individual', pagada: false },
    { id: 10001, precio: 15, habitacion: 'individual', pagada: false },
    { id: 10002, precio: 55, habitacion: 'doble', pagada: true },
    { id: 10003, precio: 55, habitacion: 'doble', pagada: true },
    { id: 10004, precio: 65, habitacion: 'doble', pagada: true } ];

const reservaPagadas = reservas.every(booking => booking.pagada);
console.log(reservaPagadas);

const nopagadas = reservas.filter(booking => !booking.pagada);
console.log(nopagadas);

const reservaCara = reservas.filter(booking => booking.precio > 50);
console.log(reservaCara);

const booking = reservas.find(booking => booking.habitacion === 'individual');
console.log(booking.id);

const reservaIndex = reservas.findIndex(booking => booking.habitacion === 'doble');
console.log(reservas[reservaIndex].id);

const descuento = 10;
const descuentoReserva = reservas.map(booking => ({
price: booking.precio * (1 - (descuento / 100))
}));
console.log(descuentoReserva);

const totalPrecio = reservas.reduce((total, booking) => total + booking.precio, 0);
console.log(totalPrecio);

const habitacionSuit = reservas.some(booking => booking.habitacion === 'suit');
console.log(habitacionSuit);

const reservaNueva = {
    id:10006,
    precio: 350,
    habitacion: 'individual',
    pagado: false,
    };
    const reservaUnica = new Set(reservas);
    reservaUnica.add(reservaNueva);
    reservaUnica.add(reservaNueva);
    reservaUnica.add(reservaNueva);
    reservaUnica.add(reservaNueva);
    console.log(reservaUnica);

// const reservaNueva = {
//     id:10006,
//     precio: 350,
//     habitacion: 'individual',
//     pagado: false,
//     };
//     const reservaUnica = new Set(reservas);
//     reservaUnica.add(reservaNueva);
//     console.log('Nuevo booking eliminado', reservaUnica.delete(reservaNueva));
//     console.log('Eliminar nuevo booking de nuevo', reservaUnica.delete(reservaNueva));
//     console.log(reservaUnica);

// const reservaUnica = new Set(reservas);
// console.log(reservaUnica.size);

// const reservaNueva = {
//     id:10006,
//     precio: 350,
//     habitacion: 'individual',
//     pagado: false,
//     };
//     const reservaUnica = new Set(reservas);
//     reservaUnica.add(reservaNueva);
//     console.log(reservaUnica.has(reservaNueva));