
function ajout_ligne(){


  var nb_lignes = prompt("Combien de ligne voulez-vous ajouter?");

  if((nb_lignes.length !== 0) && (isNaN(nb_lignes) == false)){

    nb_lignes = parseInt(nb_lignes);
    if(nb_lignes !== 0){

      url = "index.php?page=reintegrationAjout&nb_lignes="+ nb_lignes;
    }
    else{
      nb_lignes = 2;
      url = "index.php?page=reintegrationAjout&nb_lignes="+ nb_lignes;
    }

  }
  else{
    nb_lignes = 2;
    url = "index.php?page=reintegrationAjout&nb_lignes="+ nb_lignes;
  }


    window.open(url, "_self");

}
