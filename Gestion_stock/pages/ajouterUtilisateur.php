<?php
 recup_utilisateur();
  $nb_utilisateurs = $_GET['nb_utilisateurs'];
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
      <tr>

        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Age</th>
        <th scope="col">Telephone</th>
        <th scope="col">Email</th>
        <th scope="col">Login</th>
        <th scope="col">Mot de passe</th>
        <th scope="col">Type</th>


      </tr>
    </thead>
    <tbody>

        <?php for($i = 0; $i< $nb_utilisateurs; $i++) {  ?>
        <tr>
          <form class="" action="" method="post">

            <td data-label=""><input type="text" name="nom[<?php echo $i ?>]" value="" > </td>
            <td data-label=""><input type="text" name="prenom[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="age[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="telephone[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="mail" name="email[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="login[<?php echo $i ?>]" value="" ></td>
            <td data-label=""><input type="text" name="mdp[<?php echo $i ?>]" value="" ></td>
            <td data-label="">
              <select name="type[]">
                 <option value="0">Chef de service</option>
                 <option value="1">Chef de section</option>
                 <option value="2">Gestionnaire de stock</option>
              </select>
            </td>
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
     $prenom      = $_POST['prenom'];
     $age         = $_POST['age'];
     $telephone   = $_POST['telephone'];
     $email       = $_POST['email'];
     $login       = $_POST['login'];
     $mdp         = $_POST['mdp'];
     $type        = $_POST['type'];

     $annuler     = 0;
       for($i=0; $i<$nb_utilisateurs; $i++){

         $nom_utilisateur       = $nom[$i];
         $prenom_utilisateur    = $prenom[$i];
         $age_utilisateur       = $age[$i];
         $telephone_utilisateur = $telephone[$i];
         $email_utilisateur     = $email[$i];
         $login_utilisateur     = $login[$i];
         $mdp_utilisateur       = $mdp[$i];
         $type_utilisateur      = $type[$i];


        $tab = array($nom_utilisateur, $prenom_utilisateur, $age_utilisateur, $telephone_utilisateur, $email_utilisateur, $login_utilisateur, $mdp_utilisateur, $type_utilisateur );
        $vide = 8;
        $chaine = "";


        foreach ($tab as $valeur){

          if((strlen($valeur))!==0){
            $vide --;
          }
        }

      

        if($vide == 0){

          $chaine = "";
          if(login_pris($login_utilisateur) == 1){
            echo "le login est deja pris";

          }
          else
          if(email_pris($email_utilisateur) == 1){
            echo "l'email est deja pris";
          }
          else{
            $annuler ++;
            ajouter_utilisateur($nom_utilisateur, $prenom_utilisateur, $age_utilisateur, $telephone_utilisateur, $email_utilisateur, $login_utilisateur, $mdp_utilisateur, $type_utilisateur );

          }

        }

        $vide_total[] = $vide;

      }

    $champHuit = $nb_utilisateurs;
    $champBetween = $nb_utilisateurs;
    $champZero = $nb_utilisateurs;
      foreach($vide_total as $vide){
        if($vide == 8){
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
        if(($champBetween !== 0) && ($champBetween !== $nb_utilisateurs)){

          echo "Veuillez remplir tous vos champs";
        }



        if (($annuler !== 0) && ($champBetween == $nb_utilisateurs)){
        ?>
        <script type="text/javascript">
          url = "index.php?page=annulerUtilisateur";
          window.open(url,"_self");
        </script>

    <?php
      }
          }

   ?>
   <script type="text/javascript" src="js/utilisateurs.func.js"></script>
