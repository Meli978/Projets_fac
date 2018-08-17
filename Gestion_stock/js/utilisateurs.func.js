
function ajouter(){
  var nb_utilisateurs = prompt("Combien d'utilisateurs voulez-vous ajouter?");

  if((nb_utilisateurs.length !== 0) && (isNaN(nb_utilisateurs) == false)){

    nb_utilisateurs = parseInt(nb_utilisateurs);
    if(nb_utilisateurs !== 0){

      url = "index.php?page=ajouterUtilisateur&nb_utilisateurs="+ nb_utilisateurs;
    }
    else{
      url = "index.php?page=utilisateurs";
    }

  }
  else{

    url = "index.php?page=utilisateurs";
  }
    window.open(url, "_self");

}
