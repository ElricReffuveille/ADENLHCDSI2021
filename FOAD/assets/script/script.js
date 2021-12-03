//SELECTION DES ELEMENTS DU HTML
let list = document.querySelector("ul");
let input = document.querySelector("input[type='text']");
let add = document.querySelector("input[name='add']");
let delArray;
let checkArray;

//APPEL DE LA FONCTION POUR AJOUTER UN ELEMENT A LA LISTE LORSQUE L'ON CLIQUE SUR LE BOUTON "AJOUTER"
add.onclick = addItem;

//SCANNE TOUS LES BOUTONS SUPPRIMER
function deleteSelector() {
    delArray = document.querySelectorAll("input[name='delete']");
    for (i = 0; i < delArray.length; i++) {
        delArray[i].onclick = deleteItem;
    }
}

//SCANNE TOUTES LES CHECKBOXES
function checkSelector () {
    checkArray = document.querySelectorAll("input[name='check']");
    for (i = 0; i < delArray.length; i++) {
        checkArray[i].onclick = checkItem;
    }
}

//AJOUTE UN ELEMENT A LA LISTE
function addItem() {
    if (input.value != "") {
        //TEXTE
        let itemValue = document.createTextNode(input.value);
        let itemText = document.createElement('h3');
        itemText.appendChild(itemValue);

        //CHECKBOX
        let check = document.createElement('input');
        check.type = "checkbox";
        check.name = "check";

        //BOUTON SUPPRIMER
        let del = document.createElement('input');
        del.type = "submit";
        del.value = "Supprimer";
        del.name = 'delete';

        //AJOUT DU TEXTE, DE LA CHECKBOX ET DU BOUTON SUPPRIMER DANS UN ELEMENT DE LISTE
        let item = document.createElement('li');
        item.appendChild(check);
        item.appendChild(itemText);
        item.appendChild(del);
        
        //AJOUT DE L'ELEMENT DANS LA LISTE
        list.insertBefore(item, null);

        //RESET DU TEXT INPUT
        input.value="";

        //MISE A JOUR DES CHECKBOX ET BOUTONS SUPPRIMER
        deleteSelector();
        checkSelector();
    }
}

//SUPPRIME UN ELEMENT DE LA LISTE
function deleteItem() {
    let thisItem = this.parentElement;
    thisItem.remove();
}

//CHANGE AFFICHAGE DE L'ELEMENT DE LA LISTE EN FONCTION DE LA CHECKBOX
function checkItem() {
    let thisItem = this.parentElement;
    let thisItemText = this.nextSibling;

    if(this.checked) {
        thisItem.style.backgroundColor = "lightgreen"; 
        thisItemText.style.textDecoration = "line-through";
    } else {
        thisItem.style.backgroundColor = "lightblue";
        thisItemText.style.textDecoration = "none";
    }
}

//@madeBy Florian Bouly