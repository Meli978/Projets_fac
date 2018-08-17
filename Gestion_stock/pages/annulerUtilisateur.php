<?php
  $nb = 0;
   ?>

<link rel="stylesheet" href="./css/gestion.css">
  <table>
    <caption>

      <div  class = "bouton_search">
        <div id="buttons">
         <button class="btn blue" onclick="ajouter()" onblur="opacite()"><a href="#" id ="ajouter">Ajouter d'autres utilisateurs</a></button>
        </div>
      </div>
    </caption>

    <thead>
      <tr id ="colonne">
        <th scope="col"></th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Age</th>
        <th scope="col">Telephone</th>
        <th scope="col">Login</th>
        <th scope="col">Email</th>
        <th scope="col">Mot de passe</th>
        <th scope="col">Type</th>
      </tr>
    </thead>
    <tbody>

        <?php
        foreach (recuperer_utilisateurs_insere() as $utilisateur){
        $nb ++;
          ?>
        <tr class="utilisateur_modif_annuler">
          <form class="" action="" method="post">
            <td><input type="checkbox" name="supp_modif[<?php echo $utilisateur->id ?>]" value="" class="checkClass"></td>
            <td ><input type="text" name="nom[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->nom ?> " /></td>
            <td><input type="text" name="prenom[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->prenom ?>" /></td>
            <td ><input type="text" name="age[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->age ?>" /></td>
            <td><input type="text" name="telephone[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->telephone ?>" /></td>
            <td><input type="text" name="login[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->login ?>" /></td>
            <td><input type="email" name="email[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->email ?>" /></td>
            <td><input type="text" name="mdp[<?php echo $utilisateur->id ?>]" value="<?php echo $utilisateur->mdp ?>" /></td>
            <td>
              <select name="type[]" id="select" >
                 <option value="0">Chef de service</option>
                 <option value="1">Chef de section</option>
                 <option value="2">Gestionnaire de stock</option>
              </select>

                 <script type="text/javascript">
                  $(document).ready(function(){
                 $("#select").val(<?= $utilisateur->type ?>).find("option[value=" + <?= $utilisateur->type ?> +"]").attr('selected', true);

              });
                 </script>
                 <?php

                    $id =  $utilisateur->id;
                    $type[$id] = $nb;
                  ?>
            </td>



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
          supprimer_utilisateur($key);
        }
      }
      ?>
      <script type="text/javascript">
        window.open("index.php?page=utilisateurs","_self");
      </script>
      <?php
    }
////////////////////////////////////////partie modifier///////////////////////////
    if(isset($_POST["modif"])){

      foreach ($_POST["supp_modif"] as $key => $value) {
        $nom         = $_POST['nom'];
        $prenom      = $_POST['prenom'];
        $age         = $_POST['age'];
        $telephone   = $_POST['telephone'];
        $email       = $_POST['email'];
        $login       = $_POST['login'];
        $mdp         = $_POST['mdp'];

        $nom_modif      = $nom[$key];
        $prenom_modif    = $prenom[$key];
        $age_modif       = $age[$key];
        $telephone_modif = $telephone[$key];
        $email_modif     = $email[$key];
        $login_modif     = $login[$key];
        $mdp_modif       = $mdp[$key];
        $type_modif     = $type[$key];

        modifier($key, $nom_modif, $prenom_modif, $age_modif, $telephone_modif, $email_modif, $login_modif, $mdp_modif, $type_modif );
        ?>
        <script type="text/javascript">
          window.open("index.php?page=utilisateurs","_self");
        </script>

        <?php

      }
}


   ?>

   <script type="text/javascript" src="js/utilisateurs.func.js"> </script>
