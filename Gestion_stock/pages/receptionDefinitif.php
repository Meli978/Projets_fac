<?php
include 'fonctions/bsm.func.php';
include 'fonctions/reception.func.php';

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
      <a href="index.php?page=receptionAjout">Ajouter Reception</a>
    </button>
  </caption>

  <thead>
    <tr>
      <th scope="col">Numero Reception</th>
      <th scope="col">Date</th>
      <th scope="col">Afficher/Supprimer</th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach(recuperer_reception_entier() as $reception){
           ?>
      <tr>
      <td data-label="<?php echo $reception->id ?>"><?php echo $reception->id ?></td>
      <td data-label="<?php echo $reception->date ?>"><?php echo $reception->date ?></td>
      <td data-label="">
        <a href="index.php?page=AfficherReception&id=<?php echo $reception ->id;?>" target="_self"><button  name="Afficher">Afficher</button></a>
        <a href="index.php?page=supprimerReception&id=<?php echo $reception ->id;?>"><button name="Supprimer">Supprimer</button></a>

      </td>
    </tr>

    <?php
  } ?>


  </tbody>
</table>

<script type="text/javascript" src="js/gestion.func.js"></script>
<!---partie recherche------------------------>
<?php
if(isset($_POST["boutonRecherche"])){
  $search = htmlspecialchars(trim($_POST["chercher"]));

?>
<script type="text/javascript">

    window.open("index.php?page=rechercheReception&mot_cle=<?php echo $search; ?>", "_self");
</script>

<?php

}


?>
