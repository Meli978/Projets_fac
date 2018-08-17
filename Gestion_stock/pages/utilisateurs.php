
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
      <div id="buttons">
       <button class="btn blue" onclick="ajouter()" onblur="opacite()"><a href="#" id ="ajouter">Ajouter un utilisateur</a></button>
      </div>
    </div>
  </caption>

  <thead>
    <tr>
      <th scope="col">Nom </th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
      <th scope="col">Telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Login</th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Type</th>
      <th scope="col">Supprimer/Modifier</th>
    </tr>
  </thead>
  <tbody>

      <?php foreach (recuperer_utilisateurs() as $utilisateur) {  ?>
      <tr>
      <td data-label="<?php echo $utilisateur ->nom;?>"><?php echo $utilisateur ->nom;?></td>
      <td data-label="<?php echo $utilisateur ->prenom;?>"><?php echo $utilisateur ->prenom;?></td>
      <td data-label="<?php echo $utilisateur ->age;?>"><?php echo $utilisateur ->age;?></td>
      <td data-label="<?php echo $utilisateur ->telephone;?>"><?php echo $utilisateur ->telephone;?></td>
      <td data-label="<?php echo $utilisateur ->email;?>"><?php echo $utilisateur ->email;?></td>
      <td data-label="<?php echo $utilisateur ->login;?>"><?php echo $utilisateur ->login;?></td>
      <td data-label="<?php echo $utilisateur ->mdp;?>"><?php echo $utilisateur ->mdp;?></td>
      <td data-label="<?php echo $utilisateur ->type;?>"><?php echo $utilisateur ->type;?></td>
        <td class="topcoat-button-bar">
           <div class="topcoat-button-bar__item">
             <button class="topcoat-button-bar__button"><a href="index.php?page=modifierUtilisateur&id=<?php echo $utilisateur ->id ?>" target="_self">Modidier</a></button>
           </div>
           <div class="topcoat-button-bar__item">
             <button class="topcoat-button-bar__button"><a href="index.php?page=supprimerUtilisateur&id=<?php echo $utilisateur ->id ?>" target="_self">Supprimer</a></button>
           </div>

        </td>
          </tr>
        <?php
      }
          ?>

  </tbody>
</table>
<!---partie recherche------------------------>
<?php
if(isset($_POST["boutonRecherche"])){
  $search = htmlspecialchars(trim($_POST["chercher"]));

?>
<script type="text/javascript">

    window.open("index.php?page=rechercheUtilisateur&mot_cle=<?php echo $search; ?>", "_self");
</script>

<?php

}


?>
