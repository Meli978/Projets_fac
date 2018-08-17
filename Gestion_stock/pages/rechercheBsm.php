<?php
include 'fonctions/bsm.func.php';
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
if(!empty(result_code_bsm($search))){
    $resultat = result_code_bsm($search);
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
        <form id="demo-2">
          <input type="search" placeholder="Search">
        </form>
      </div>
      <button type="button" class="btn-blue" name="button" class="forwarder-icon">
        <a href="index.php?page=dai">AjouterBSM</a>
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
       foreach($resultat as $bsm){
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
