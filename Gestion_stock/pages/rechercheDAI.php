<?php
include 'fonctions/dai.func.php';
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
if((strlen($search) == 1) && (!is_numeric($search))){
  echo '<span class="erreur">Votre mot cle de recherche est trop court </span>';
}
else
if(!empty(result_code_dai($search))){
    $resultat = result_code_dai($search);
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
        <th scope="col">Numero Dai</th>
        <th scope="col">Date</th>
        <th scope="col">Afficher/Supprimer</th>
      </tr>
    </thead>
    <tbody>

        <?php foreach ($resultat as $dai) {  ?>
        <tr>
        <td data-label="<?php echo $dai ->id;?>"><?php echo $dai ->id;?></td>
        <td data-label="<?php echo $dai ->date;?>"><?php echo $dai ->date;?></td>
        <td data-label="">
          <a href="index.php?page=AfficherDai&id=<?php echo $dai ->id;?>" target="_self"><button  name="Afficher">Afficher</button></a>
          <a href="index.php?page=SupprimerDai&id=<?php echo $dai ->id;?>"><button name="Supprimer">Supprimer</button></a>

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
