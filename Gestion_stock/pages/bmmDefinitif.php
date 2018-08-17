<?php
include 'fonctions/bmm.func.php';

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
      <a href="index.php?page=bmmAjout&nb_lignes=2">Ajouter bmm</a>
    </button>
  </caption>

  <thead>
    <tr>
      <th scope="col">Numero </th>
      <th scope="col">Date</th>
      <th scope="col">Afficher</th>
    </tr>
  </thead>
  <tbody>

      <?php
     foreach(recuperer_bmm_entier() as $bmm){
          $id      = $bmm->id;
          $tab_nom = array(unserialize($bmm ->nom_produit));
          $tab_qte = array(unserialize($bmm ->qte));
          $nb  = count($tab_nom);
          $nom = array();
          $qte = array();
          $total = 0;
          $j     = 0;
          ?>
      <tr>
      <td data-label="<?php echo $bmm->id ?>"><?php echo $bmm->id ?></td>
      <td data-label="<?php echo $bmm->date ?>"><?php echo $bmm->date ?></td>
      <td data-label="">
        <a href="index.php?page=AfficherBmm&id=<?php echo $bmm->id ?>" target="_self"><button  name="Afficher">Afficher</button></a>

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

    window.open("index.php?page=rechercheBmm&mot_cle=<?php echo $search; ?>", "_self");
</script>

<?php

}


?>
