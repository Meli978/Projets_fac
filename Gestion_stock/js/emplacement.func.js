

function ajouter(){
  var nb_emplacement = prompt("Combien d'emplacement voulez-vous ajouter?");

  if((nb_emplacement.length !== 0) && (isNaN(nb_emplacement) == false)){

    nb_emplacement = parseInt(nb_emplacement);
    if(nb_emplacement !== 0){

      url = "index.php?page=ajouterEmplacement&nb_emplacement="+ nb_emplacement;
    }
    else{
      url = "index.php?page=emplacement";
    }

  }
  else{

    url = "index.php?page=emplacement";
  }
    window.open(url, "_self");

}
