// Appelle ou non la fonction de suppresion de l'élément en fonction de sa classe
function ajoutSuppr(clicked_id)
{
  if (document.getElementById(clicked_id).className == "vide")
    document.getElementById(clicked_id).className = "aSuppr";
  else if (document.getElementById(clicked_id).className == "aSuppr")
    document.getElementById(clicked_id).className = "vide";
}

// Fonction de suppresion
function suppression()
{
  const elements = document.getElementsByClassName('aSuppr');
  while(elements.length > 0)
    elements[0].parentNode.removeChild(elements[0]);
}

// Crée un nouvel élément à partir du texte du champ de recherche, lui attribue un nouvel id
function nouv() 
{
  var li = document.createElement("li");    // Cree une nouvelle case dans le tableau
  li.id = numId;  
  numId++;
  li.className += "vide";
  li.setAttribute("onclick","ajoutSuppr(this.id);");

  var val = document.getElementById("myInput").value;   // Ajoute le texte du champ dans la nouvelle case du tableau
  var t = document.createTextNode(val);
  li.appendChild(t);
  document.getElementById("myUL").appendChild(li);
}



// Variable des id des éléments
var numId = 7;