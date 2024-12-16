
// for (i = 0; i <= 30; i++) {
//     document.write("<a>"+i+"</a> <br>")
// }

const numerosDiv = document.getElementById('numeros');
let numerosHTML = '';

for (let i = 1; i <= 30; i++) {
    numerosHTML += i + '<br>';
}

numerosDiv.innerHTML = numerosHTML