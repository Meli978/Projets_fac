<?php
  $nb = 0;
   ?>

<link rel="stylesheet" href="./css/gestion.css">
  <table>
    <caption>

      <div  class = "bouton_search">
        <div id="buttons">
         <button class="btn blue" onclick="ajouter()" onblur="opacite()"><a href="#" id ="ajouter">Ajouter d'autres emplacements</a></button>
        </div>
      </div>
    </caption>

    <thead>
      <tr id ="colonne">
        <th scope="col"></th>
        <th scope="col">Numero</th>
        <th scope="col">Nom Emplacement</th>
      </tr>
    </thead>
    <tbody>

        <?php
        foreach (recuperer_emplacement_insere() as $emplacement){
        $nb ++;
          ?>
        <tr class="emplacement_modif_annuler">
          <form class="" action="" method="post">
            <td><input type="checkbox" name="supp_modif[<?php echo $emplacement->id ?>]" value="" class="checkClass"></td>
            <td ><?php echo $emplacement->id ?>  </td>
            <td><input type="text" name="nom[<?php echo $emplacement->id ?>]" value="<?php echo $emplacement->nom ?>" /></td>

            </tr>
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
          supprimer_emplacement($key);
        }
      }
    }
////////////////////////////////////////partie modifier///////////////////////////
    if(isset($_POST["modif"])){

      foreach ($_POST["supp_modif"] as $key => $value) {
        $nom         = $_POST['nom'];
        $nom_modif      = $nom[$key];

        modifier($key, $nom_modif);
        ?>
        <script type="text/javascript">
          window.open("index.php?page=annulerEmplacement","_self");
        </script>

        <?php

      }
}


   ?>
   <script type="text/javascript" src="js/emplacement.func.js"></script>
