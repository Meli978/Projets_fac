<?php
include 'fonctions/reception.func.php';
 ?>
<a href="index.php?page=daiDefinitif">Retour</a>
<?php
$search = $_GET['mot_cle'];
$chaine = "";
$resultat = array();
if(empty($search)){
  echo '<span class="erreur">Veuillez remplir le champ </span>';
}
else
if(strlen($search) == 1){
  echo '<span class="erreur">Votre mot cle de recherche est trop court </span>';
}
else
if(!empty(result_code_reception($search))){
    $resultat = result_code_reception($search);
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
      foreach($resultat as $reception){
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
