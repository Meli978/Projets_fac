<a href="index.php?page=gestion">Retour</a>
<?php
$search = $_GET['mot_cle'];
$chaine = "";
$resultat = array();
if(empty($search)){
  echo '<span class="erreur">Veuillez remplir le champ </span>';
}
else
if((strlen($search) == 1) && (!is_numeric($search))){
  echo '<span class="erreur">Votre mot cle de recherche est trop court </span>';
}
else
  if(!empty(result_nom_produit($search))){
    $resultat = result_nom_produit($search);
}
else
if(!empty(result_code($search))){
    $resultat = result_code($search);
}
else{
  $chaine = "Oups pas de resultats...";
}

 ?>

 <?php
    if((!empty($resultat))){

  ?>

  <link rel="stylesheet" href="./css/gestion.css">
  <table>
    <thead>
      <tr>
        <th scope="col">Nom du produit</th>
        <th scope="col">Designation</th>
        <th scope="col">Emplacement</th>
        <th scope="col">Unite de mesure</th>
        <th scope="col">Quantite</th>
        <th scope="col">Supprimer/Modifier</th>
      </tr>
    </thead>
    <tbody>

        <?php  foreach($resultat as $produit){  ?>
        <tr>
        <td data-label="<?php echo $produit ->nom;?>"><?php echo $produit ->nom;?></td>
        <td data-label="<?php echo $produit ->designation;?>"><?php echo $produit ->designation;?></td>
        <td data-label="<?php echo $produit ->emplacement;?>"><?php echo $produit ->emplacement;?></td>
        <td data-label="<?php echo $produit ->unite;?>"><?php echo $produit ->unite;?></td>
        <td data-label="<?php echo $produit ->qte;?>"><?php echo $produit ->qte;?></td>
          <td class="topcoat-button-bar">
             <div class="topcoat-button-bar__item">
               <button class="topcoat-button-bar__button"><a href="index.php?page=modifierProduit&id=<?php echo $produit ->id ?>" target="_self">Modidier</a></button>
             </div>
             <div class="topcoat-button-bar__item">
               <button class="topcoat-button-bar__button"><a href="index.php?page=supprimerProduit&id=<?php echo $produit ->id ?>" target="_self">Supprimer</a></button>
             </div>

          </td>
            </tr>
          <?php
        }
            ?>

    </tbody>
  </table>

  <?php
      }
      else{
        ?>
    <link rel="stylesheet" href="css/fantome.css">
    <div class="container">
  <div class="boo-wrapper">
    <div class="boo">
      <div class="face"></div>
    </div>
    <div class="shadow"></div>

    <h1>Whoops!</h1>
    <p>
      <?php echo $chaine; ?>
    </p>
  </div>
</div>
<?php
} ?>
