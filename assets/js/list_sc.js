let bouton= document.getElementById("bouton");
let text  = document.getElementById("text");
let ul    = document.querySelector("ul");
let li    = document.getElementsByTagName("li");


function textLength(){
	return text.value.length;
}


function creeList(){
	let li = document.createElement("li");
	li.appendChild(document.createTextNode(text.value));
	ul.appendChild(li);
	text.value ="";

	function crossOut(){
		li.classList.toggle("done");
	}

	li.addEventListener("click",crossOut);

	let bouton2 = document.createElement("button");
	bouton2.appendChild(document.createTextNode("X"));
	

	li.appendChild(bouton2);
	bouton2.addEventListener("click",deleteList);


	function deleteList() {
		li.classList.add("delete");
	}
}

function addList(){
	if (textLength() > 0){
		creeList();
	}
}

bouton.addEventListener("click",addList);
