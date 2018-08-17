<?php
  recup_produit();
  $nb_produit = $_GET['nb_produit'];
   ?>

<link rel="stylesheet" href="./css/gestion.css">
  <table>
    <caption>

      <div  class = "bouton_search">
        <div id="buttons">
         <button class="btn blue" onclick="ajouter()" ><a href="#" id ="ajouter">Ajouter d'autres produits</a></button>
       </div>
      </div>
    </caption>

    <thead>
      <tr>

        <th scope="col">Nom</th>
        <th scope="col">Designation</th>
        <th scope="col">Emplacement</th>
        <th scope="col">Unite</th>
        <th scope="col">qte</th>
        <th scope="col">Prix</th>
      </tr>
    </thead>
    <tbody>

        <?php for($i = 0; $i< $nb_produit; $i++) {  ?>
        <tr>
          <form class="" action="" method="post">

            <td data-label=""><input type="text" name="nom[<?php echo $i ?>]" value="" > </td>
            <td data-label=""><input type="text" name="designation[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="emplacement[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="unite[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="qte[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="prix[<?php echo $i ?>]" value="" ></td>
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
     $designation     = $_POST['designation'];
     $emplacement       = $_POST['emplacement'];
     $unite  = $_POST['unite'];
     $qte      = $_POST['qte'];
      $prix      = $_POST['prix'];
     $annuler     = 0;
       for($i=0; $i<$nb_produit; $i++){
         $nom_produit      = $nom[$i];
         $designation_produit   = $designation[$i];
         $emplacement_produit       = $emplacement[$i];
         $unite_produit = $unite[$i];
         $qte_produit    = $qte[$i];
         $prix_produit   = $prix[$i];

        $tab = array($nom_produit, $designation_produit, $emplacement_produit, $unite_produit, $qte_produit );
        $vide = 5;
        $chaine = "";

        foreach ($tab as $valeur){
          if(!empty($valeur)){
            $vide --;
          }
        }
        if($vide == 0){
          $chaine = "";
          if(produit_existe($nom_produit) == 1){
                $annuler ++;
             modifier_donnees_produit($nom_produit, $designation_produit, $emplacement_produit, $unite_produit, $qte_produit,$prix_produit);
          }
          else{

            $annuler ++;
            ajouter_produit($nom_produit, $designation_produit, $emplacement_produit, $unite_produit, $qte_produit,$prix_produit);
          }

        }

        $vide_total[] = $vide;

      }

    $champHuit = $nb_produit;
    $champBetween = $nb_produit;
    $champZero = $nb_produit;
      foreach($vide_total as $vide){
        if($vide == 5){
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
        if(($champBetween !== 0) && ($champBetween !== $nb_produit)){

          echo "Veuillez remplir tous vos champs";
        }

        if(($champBetween !== 0) && ($champBetween !== $nb_produit) && ($annuler == 0)) {
          echo "Les emplacements existent deja";
        }


      if (($annuler !== 0) && ($champBetween == $nb_produit)){

        ?>
        <script type="text/javascript">
          url = "index.php?page=annulerProduit";
          window.open(url,"_self");
        </script>

    <?php
      }
          }

   ?>
<script type="text/javascript" src="js/gestion.func.js"></script>
