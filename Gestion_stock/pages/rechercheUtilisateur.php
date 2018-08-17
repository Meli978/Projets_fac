<a href="index.php?page=utilisateurs">Retour</a>
<?php
$search = $_GET['mot_cle'];

$resultat = array();
if(empty($search)){
  echo '<span class="erreur">Veuillez remplir ce champ </span>';
}
else
if(strlen($search) == 1){
  echo '<span class="erreur">Votre mot cle de recherche est trop court </span>';
}
else
  if(!empty(result_prenom($search))){
    $resultat = result_prenom($search);
}
else
if(!empty(result_nom($search))){
    $resultat = result_nom($search);
}
else
if(!empty(result_login($search))){
    $resultat = result_login($search);
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

        <?php  foreach($resultat as $utilisateur){  ?>
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
