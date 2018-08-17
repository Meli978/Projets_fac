<?php
include 'fonctions/reintegration.func.php';
 ?>
<a href="index.php?page=reintegrationDefinitif">Retour</a>
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
if(!empty(result_code_reintegration($search))){
    $resultat = result_code_reintegration($search);
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
    <caption>

      <div  class = "bouton_search">
        <div class="wrap">
         <div class="search">
           <form class=""  method="post">
             <input type="text" name="chercher" class="searchTerm" placeholder="Recherche">
             <button type="submit" class="searchButton" name="boutonRecherche">
               <i class="fa fa-search"></i>
            </button>
           </form>

         </div>
        </div>
      </div>
      <button type="button" class="btn-blue" name="button" class="forwarder-icon">
        <a href="index.php?page=reintegrationAjout&nb_lignes=2">Ajouter Reintegration</a>
      </button>
    </caption>

    <thead>
      <tr>
        <th scope="col">Numero reintegration</th>
        <th scope="col">Date</th>
        <th scope="col">Afficher/Supprimer</th>
      </tr>
    </thead>
    <tbody>

        <?php
       foreach($resultat as $reintegration){
            $id      = $reintegration->id;
            $tab_nom = array(unserialize($reintegration ->nom_produit));
            $tab_qte = array(unserialize($reintegration ->qte));
            $nb  = count($tab_nom);
            $nom = array();
            $qte = array();
            $total = 0;
            $j     = 0;
            ?>
        <tr>
        <td data-label="<?php echo $reintegration->id ?>"><?php echo $reintegration->id ?></td>
        <td data-label="<?php echo $reintegration->date ?>"><?php echo $reintegration->date ?></td>
        <td data-label="">
          <a href="index.php?page=AfficherReintegration&id=<?php echo $reintegration->id ?>" target="_self"><button  name="Afficher">Afficher</button></a>
          <a href="index.php?page=SupprimerReintegration&id=<?php echo $reintegration->id ?>"><button name="Supprimer">Supprimer</button></a>

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
}
 ?>
