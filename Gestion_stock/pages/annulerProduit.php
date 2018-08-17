<?php
$nb = 0;
 ?>
<link rel="stylesheet" href="./css/gestion.css">
  <table>
    <caption>

      <div  class = "bouton_search">
        <div id="buttons">
         <button class="btn blue" onclick="ajouter()" onblur="opacite()"><a href="#" id ="ajouter">Ajouter d'autres produits</a></button>
        </div>
      </div>
    </caption>

    <thead>
      <tr id ="colonne">
        <th scope="col"></th>
        <th scope="col">Nom</th>
        <th scope="col">designation</th>
        <th scope="col">Emplacement</th>
        <th scope="col">unite</th>
        <th scope="col">qte</th>
        <th scope="col">Prix</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach (recuperer_produit_insere() as $produit){
        $nb ++;
          ?>
        <tr class="utilisateur_modif_annuler">
          <form class="" action="" method="post">
            <td><input type="checkbox" name="supp_modif[<?php echo $produit->id ?>]" value="" class="checkClass"></td>
            <td ><input type="text" name="nom[<?php echo $produit->id ?>]" value="<?php echo $produit->nom ?> " /></td>
            <td><input type="text" name="designation[<?php echo $produit->id ?>]" value="<?php echo $produit->designation ?>" /></td>
            <td ><input type="text" name="emplacement[<?php echo $produit->id ?>]" value="<?php echo $produit->emplacement ?>" /></td>
            <td><input type="text" name="unite[<?php echo $produit->id ?>]" value="<?php echo $produit->unite ?>" /></td>
            <td><input type="text" name="qte[<?php echo $produit->id ?>]" value="<?php echo $produit->qte ?>" /></td>
              <td><input type="text" name="prix[<?php echo $produit->id ?>]" value="<?php echo $produit->prix ?>" /></td>
        <tr/>
          <?php
        }
            ?>
            <th id="bouton">
              <div class="topcoat-button-bar__item">
                <button class="topcoat-button-bar__button" name="modif" id="modif">Modifier</button>
              </div>
              <div class="topcoat-button-bar__item">
                <button class="topcoat-button-bar__button" name = "annulerBtnUt">Annuler l'ajout</button>
              </div>
                <input type="checkbox" name="checkAll" id="checkAll" value="false" /> Tout cocher
            </th>

  </form>


    </tbody>
  </table>



  <?php
///////////////////////////////partie supprimer///////////////////////////////
    if (isset($_POST["annulerBtnUt"])) {
      if(isset($_POST["supp_modif"])){

        foreach ($_POST["supp_modif"] as $key => $value) {
          supprimer_produit($key);
        }
      }
    }
////////////////////////////////////////partie modifier///////////////////////////
    if(isset($_POST["modif"])){

      foreach ($_POST["supp_modif"] as $key => $value) {
        $nom         = $_POST['nom'];
        $designation      = $_POST['designation'];
        $emplacement      = $_POST['emplacement'];
        $unite   = $_POST['unite'];
        $qte       = $_POST['qte'];
        $prix       = $_POST['prix'];

        $nom_modif      = $nom[$key];
        $designation_modif    = $designation[$key];
        $emplacement_modif    = $emplacement[$key];
        $unite_modif = $unite[$key];
        $qte_modif     = $qte[$key];
        $prix_modif     = $prix[$key];

        modifier_produit($key, $nom_modif, $designation_modif, $emplacement_modif, $unite_modif, $qte_modif,$prix_modif );

        ?>
        <script type="text/javascript">
          window.open("index.php?page=gestion","_self");
        </script>

        <?php

      }
}


   ?>
    <script type="text/javascript" src="js/annulerUtilisateur.func.js"></script>

    <script type="text/javascript" src="js/gestion.func.js"> </script>
