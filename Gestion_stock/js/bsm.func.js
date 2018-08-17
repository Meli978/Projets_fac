Array.prototype.forEach.call(document.querySelectorAll('.grid'), function(el, i){
  el.style.height = Math.ceil(el.querySelectorAll('ul').length / 3) * 6 + 'mm';
});


// function disparaitre(id){
//
//   document.getElementById("enregistrer").addEventListener("click", function(event){
//       event.preventDefault();
//   });
//
// tbody     =  document.getElementById("tbody_"+id);
// tr      = tbody.children;
// for(i=0; i<tr.length; i++){
//   h =0;
//   td = tr[i].children;
//   for (j=0; j<td.length; j++){
//     child = td[j].children[0];
//     text  =child.value;
//     td[j].removeChild(child);
//     if(text.trim().length !== 0){
//       td[j].innerHTML = text;
//       h ++;
//     }
//
//   }
//   if(h== 0){
//     tbody.removeChild(tr[i]);
//   }
//
// }
//
// }

function ajout_ligne(){


  var nb_lignes = prompt("Combien de ligne voulez-vous ajouter?");

  if((nb_lignes.length !== 0) && (isNaN(nb_lignes) == false)){

    nb_lignes = parseInt(nb_lignes);
    if(nb_lignes !== 0){

      url = "index.php?page=bsm&nb_lignes="+ nb_lignes;
    }
    else{
      nb_lignes = 2;
      url = "index.php?page=bsm&nb_lignes="+ nb_lignes;
    }

  }
  else{
    nb_lignes = 2;
    url = "index.php?page=bsm&nb_lignes="+ nb_lignes;
  }


    window.open(url, "_self");

}

function inserer(message){

  var node = document.createElement("span");                 // Create a <li> node
  var textnode = document.createTextNode(message);         // Create a text node
  node.appendChild(textnode);                              // Append the text to <li>
  document.getElementById("article").appendChild(node);


}
