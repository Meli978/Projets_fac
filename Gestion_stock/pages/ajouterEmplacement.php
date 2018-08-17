<?php
  include 'fonctions/emplacement.func.php';
  recup_emplacement();
  $nb_emplacement = $_GET['nb_emplacement'];
   ?>

<link rel="stylesheet" href="./css/gestion.css">
  <table>
    <caption>

      <div  class = "bouton_search">
        <div id="buttons">
         <button class="btn blue" onclick="ajouter()" ><a href="#" id ="ajouter">Ajouter d'autres emplacements</a></button>
       </div>
      </div>
    </caption>

    <thead>
      <tr>
        <th scope="col">Nom Emplacement</th>
      </tr>
    </thead>
    <tbody>

        <?php for($i = 0; $i< $nb_emplacement; $i++) {  ?>
        <tr>
          <form class="" action="" method="post">
              <td data-label=""><input type="text" name="nom[<?php echo $i ?>]" value="" ></td>
        </tr>
          <?php
        }
            ?>
            <th>
              <div class="topcoat-button-bar__item">
                <button class="topcoat-button-bar__button" name="ajout">Ajouter</button>
              </div>
              <div class="topcoat-button-bar__item">
                <button class="topcoat-button-bar__button"><a href="#">Annuler l'ajout</a></button>
              </div>

            </th>

  </form>


    </tbody>
  </table>

  <?php

  if(isset($_POST["ajout"])){
     $nom         = $_POST['nom'];
     $annuler     = 0;

       for($i=0; $i<$nb_emplacement; $i++){
        $nom_emplacement   = $nom[$i];
        $tab = array( $nom_emplacement);
        $vide = 1;
        $chaine = "";

        foreach ($tab as $valeur){
          if(!empty($valeur)){
            $vide --;
          }
        }
        if($vide == 0){
          $chaine = "";
          if(emplacement_existe($nom_emplacement) != 1){
            $annuler ++;
            ajouter_emplacement($nom_emplacement);
          }

        }
        $vide_total[] = $vide;
      }

    $champHuit = $nb_emplacement;
    $champBetween = $nb_emplacement;
    $champZero = $nb_emplacement;
      foreach($vide_total as $vide){
        if($vide == 1){
          $champHuit --;
        }
        else
        if($vide == 0){
            $champZero --;
        }
        else{
            $champBetween --;
        }
      }

//tous les champs sont vides
      if($champHuit == 0){
        echo "Tous vos champs sont vides, ajout impossible";
      }
      else
//Il existe des chmaps non totalement remplis
        if(($champBetween !== 0) && ($champBetween !== $nb_emplacement)){
          echo "Veuillez remplir tous vos champs";
        }

        if(($champBetween !== 0) && ($annuler == 0)) {
          echo "Les emplacements existent deja";
        }
      if (($annuler !== 0) && ($champBetween == $nb_emplacement)){

        ?>
        <script type="text/javascript">

          url = "index.php?page=annulerEmplacement";
          window.open(url,"_self");
        </script>

    <?php
      }
          }

   ?>
<script type="text/javascript" src="js/gestion.func.js"></script>
