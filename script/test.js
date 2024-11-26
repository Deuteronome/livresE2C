let number1 = document.querySelector('#number1');
let number2 = document.querySelector('#number2');
let calculate = document.querySelector('#calculate');
let resultHtml = document.querySelector('#result');



function makeCalcul() {
    let nombre1 = parseInt(number1.value);
    let nombre2 = parseInt(number2.value);
    let resultat = nombre1 + nombre2;
    let messageAddition = "<p>Le résultat de l'addition de "+nombre1+" et de "+nombre2+" est "+resultat+"</p>";
    resultHtml.innerHTML = messageAddition;resultHtml.innerHTML = messageAddition;

    resultat = nombre1 - nombre2;
    let messageSoustraction = `<p>Le resultat de la soustratction de ${nombre1} et de ${nombre2} est ${resultat}</p>`;
    resultHtml.innerHTML += messageSoustraction;

    resultat = nombre1 * nombre2;
    let messageMultiplication = `<p>Le resultat de la multiplication de ${nombre1} et de ${nombre2} est ${resultat}</p>`;
    resultHtml.innerHTML += messageMultiplication;

    resultat = nombre1 / nombre2;
    let messageDivision = `<p>Le resultat de la division de ${nombre1} et de ${nombre2} est ${resultat}</p>`;
    resultHtml.innerHTML += messageDivision;
}

calculate.addEventListener("click", makeCalcul)
