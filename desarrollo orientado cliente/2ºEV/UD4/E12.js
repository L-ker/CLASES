const empleados = [
    { nombre: "Juan", salario: 4500 },
     { nombre: "María", salario: 6000 },
     { nombre: "Pedro", salario: 3500 },
     { nombre: "Luis", salario: 7000 }
    ];
    const empleadosSalarioMayor5000 = empleados.filter(empleado => empleado.salario > 5000);
    console.log(empleadosSalarioMayor5000); // Output: [{ nombre: "María", salario: 6000 }, { nombre: "Luis", salario: 7000 }]