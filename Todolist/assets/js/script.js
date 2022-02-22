let buttonNewTask = document.getElementsByClassName("createNewTask");
//Permet de génerer un ID pour les tâches
let nbTask = 0;
//Applique l'evenement onclick sur tout les boutton
for (let i = 0; i < buttonNewTask.length; i++) {

  buttonNewTask[i].onclick = function (e) {
    //Récupère le contenu du champs associé au bouton sélectionné 
    let fieldValue = e.path[1].children[0];
    //Création d'un élement de la liste
    let newTask = document.createElement("li");
    let closeTask = document.createElement("a");
    //Attribution d'un Id card, d'un draggable et de la fonction ondragstart
    newTask.setAttribute("id", "card" + nbTask);
    newTask.setAttribute("draggable", true);
    newTask.setAttribute("ondragstart", "dragstart_handler(event)");
    closeTask.classList.add("close");
    closeTask.appendChild(document.createTextNode("X"));
    //Ajout de la valeur du champs dans l'élement de la liste
    newTask.appendChild(document.createTextNode(fieldValue.value));
    newTask.appendChild(closeTask);
    //Ajout de l'élement de la liste dans la liste appartenant à la section.
    e.path[2].children[3].appendChild(newTask);

    //Reset du champs
    fieldValue.value = "";

    //Ajout de la fonction de suppresion sur le l'ancre X
    closeTask.onclick = function (e) {
      e.path[1].remove();
    };
    nbTask++;
  };
}
//https://developer.mozilla.org/fr/docs/Web/API/HTML_Drag_and_Drop_API#gérer_le_dépôt_de_lobjet
function dragstart_handler(ev) {
  ev.dataTransfer.setData("application/my-app", ev.target.id);
  ev.dataTransfer.dropEffect = "move";
}

function dragover_handler(ev) {
  ev.preventDefault();
  ev.dataTransfer.dropEffect = "move";
}

function drop_handler(ev) {
  ev.preventDefault();
  let data = ev.dataTransfer.getData("application/my-app");
  ev.target.appendChild(document.getElementById(data));
}
