

function ajouter(){
  var nb_produit = prompt("Combien de produits voulez-vous ajouter?");

  if((nb_produit.length !== 0) && (isNaN(nb_produit) == false)){

    nb_produit = parseInt(nb_produit);
    if(nb_produit !== 0){

      url = "index.php?page=ajouterProduit&nb_produit="+ nb_produit;
    }
    else{
      url = "index.php?page=produits";
    }

  }
  else{

    url = "index.php?page=produits";
  }
    window.open(url, "_self");

}
