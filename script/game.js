import { Morpion } from "./morpion.js";

let menu = document.querySelector('#menu');
let gameZone = document.querySelector('#gameZone');


function initialize() {
    gameZone.innerHTML = "";
}

function newGame() {
    initialize();
    
    switch(menu.value) {
        case "1":
            let game = new  Morpion(gameZone);
            
            break;
        default:
            break;
    }
}


menu.addEventListener('change', newGame);