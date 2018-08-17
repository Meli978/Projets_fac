<?php
include 'fonctions/bsm.func.php';

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
      <a href="index.php?page=bsm&nb_lignes=2">AjouterBSM</a>
    </button>
  </caption>

  <thead>
    <tr>
      <th scope="col">Numero BSM</th>
      <th scope="col">Date</th>
      <th scope="col">Afficher/Supprimer</th>
    </tr>
  </thead>
  <tbody>

      <?php
     foreach(recuperer_bsm_entier() as $bsm){
          $id      = $bsm->id;
          $tab_nom = array(unserialize($bsm ->nom_produit));
          $tab_qte = array(unserialize($bsm ->qte));
          $nb  = count($tab_nom);
          $nom = array();
          $qte = array();
          $total = 0;
          $j     = 0;
          ?>
      <tr>
      <td data-label="<?php echo $bsm->id ?>"><?php echo $bsm->id ?></td>
      <td data-label="<?php echo $bsm->date ?>"><?php echo $bsm->date ?></td>
      <td data-label="">
        <a href="index.php?page=AfficherBSM&id=<?php echo $bsm->id ?>" target="_self"><button  name="Afficher">Afficher</button></a>
        <a href="index.php?page=SupprimerBSM&id=<?php echo $bsm->id ?>"><button name="Supprimer">Supprimer</button></a>

      </td>
    </tr>
        <?php
      }

          ?>



  </tbody>
</table>

<script type="text/javascript" src="js/gestion.func.js"></script>

<script type="text/javascript" src="js/gestion.func.js"></script>
<!---partie recherche------------------------>
<?php
if(isset($_POST["boutonRecherche"])){
  $search = htmlspecialchars(trim($_POST["chercher"]));

?>
<script type="text/javascript">

    window.open("index.php?page=rechercheBsm&mot_cle=<?php echo $search; ?>", "_self");
</script>

<?php

}


?>
