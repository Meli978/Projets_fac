<?php
include 'fonctions/reintegration.func.php';

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
     foreach(recuperer_reintegration_entier() as $reintegration){
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

<script type="text/javascript" src="js/gestion.func.js"></script>
<!---partie recherche------------------------>
<?php
if(isset($_POST["boutonRecherche"])){
  $search = htmlspecialchars(trim($_POST["chercher"]));

?>
<script type="text/javascript">

    window.open("index.php?page=rechercheReintegration&mot_cle=<?php echo $search; ?>", "_self");
</script>

<?php

}


?>
