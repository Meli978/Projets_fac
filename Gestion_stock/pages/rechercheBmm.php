<?php
include 'fonctions/bmm.func.php';
 ?>
<a href="index.php?page=bmmDefinitif">Retour</a>
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
if(!empty(result_code_bmm($search))){
    $resultat = result_code_bmm($search);
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
        <a href="index.php?page=bmmAjout&nb_lignes=2">Ajouter bmm</a>
      </button>
    </caption>

    <thead>
      <tr>
        <th scope="col">Numero bmm</th>
        <th scope="col">Date</th>
        <th scope="col">Afficher/Supprimer</th>
      </tr>
    </thead>
    <tbody>

        <?php
       foreach($resultat as $bmm){
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
          <a href="index.php?page=SupprimerBmm&id=<?php echo $bmm->id ?>"><button name="Supprimer">Supprimer</button></a>

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
