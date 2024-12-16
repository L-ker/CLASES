// window.onload = function() {
//     let bruto = parseInt(document.getElementById('salarioBruto').value);
//     let retencion = parseInt(document.getElementById('retencion').value);
//     let numeroPagas = parseInt(document.getElementById('numeroPagas').value);
// }
function nomina(salarioBruto, retencion, numeroPagas){
    let salarioNeto = (parseInt(salarioBruto) * (1 - (parseInt(retencion)*0.01))) / parseInt(numeroPagas);
    salarioNeto.toFixed(2);

    let x = salarioNeto;
    document.getElementById('demo1').innerHTML = x;
}