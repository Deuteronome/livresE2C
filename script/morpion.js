export class Morpion {
    //elements html
    morpionZone;
    infoZone;
    gridZone;
    //variable de jeu
    squareNumber = 9;
    squares = [];



    /**
     * Fonction qui crée la grille du morpion
     * @param {HTMLElement} blocHtml 
     */
    constructor(blocHtml) {
        this.morpionZone = blocHtml;
        this.morpionZone.setAttribute('class', 'morpion-zone');

        this.infoZone = document.createElement('div');
        this.infoZone.setAttribute('class', 'info-zone');

        this.morpionZone.appendChild(this.infoZone);

        this.gridZone = document.createElement('div');
        this.gridZone.setAttribute('class', 'grid-zone');
        
        this.morpionZone.appendChild(this.gridZone);
        
        for(let i=0; i<this.squareNumber; i++) {
            let square = document.createElement('div');
            square.setAttribute('class', 'square');
            this.gridZone.appendChild(square);
            this.squares.push(square);
        }

        for(let i = 0;i<this.squares.length; i++) {
            this.squares[i].addEventListener('click', this.squareClick.bind(this, i));
        }

        console.log(this.squares);
        
    }

    squareClick(i) {
        this.squares[i].style.backgroundImage = 'url(../asset/cersei.png)';
    }

    
}