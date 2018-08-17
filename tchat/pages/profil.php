<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/Menu.css">
    <script>
        Myfonction(){
        alert("hello");
        document.getElementById(infobulle).display=block;
    }
      
      </script>
  </head>
  <body>
    <div class="container">

<!-- juste apré le menu-->
<div class="corps">

<div class="side_wrapper">

<div class="inform-perso">

             <?php
foreach (get_user_profil() as $user) {
?>
<section class="about-dev">
<header class="profile-card_header">
  <div class="profile-card_header-container">


    <div class="profile-card_header-imgbox">
 
       
            <img src="./membres/avatars/<?php echo $user->avatar; ?>" alt="">
      
    </div>

    <h1>
  <?php echo $user->name ?> <?php echo $user->prenom ?>
    <span>Domaine <?php echo $user->dm ?></span>
    </h1>
  </div>
</header>
<div class="profile-card_about">
 <div class="titre1">
    <h2>Informations Générales</h2>
    <a href="index.php?page=menumodif" class="modif2">
    <i class="fa fa-pencil"></i> </a>
 </div>





 <div class="apropos">
      <div id="contentarea">
        <ul class="utilist boitesettingslist boitesettingsbordertop boitesettingsborderbottom _4kg_4ks">
          <li class="boitesettingslistitem boitesettingsbordessous clearfix _5b2_ boitesettingslistitemlabeled">
            <a class="pvm phs boitesettingslista" href="#">
              <h3 class="pls boitesettingslistitemlabel" id="cam1"> Nom </h3>

              <span class="boitesettingslistitemcontent fcg"> <strong><?php echo $user->name ?></strong></span>
            </a>

          </li>


          <li class="boitesettingslistitem boitesettingsbordessous clearfix _5b2_ boitesettingslistitemlabeled">
            <a class="pvm phs boitesettingslista" href="#">
              <h3 class="pls boitesettingslistitemlabel" id="cam1"> Prénom </h3>

              <span class="boitesettingslistitemcontent fcg"> <strong><?php echo $user->prenom ?></strong></span>
            </a>
          </li>
          <li class="boitesettingslistitem boitesettingsbordessous clearfix _5b2_ boitesettingslistitemlabeled">
            <a class="pvm phs boitesettingslista" href="#">
              <h3 class="pls boitesettingslistitemlabel" id="cam1"> Nom d'utilisateur </h3>

              <span class="boitesettingslistitemcontent fcg"> <strong><?php echo $user->pseudo ?></strong></span>
            </a>
          </li>
          <li class="boitesettingslistitem boitesettingsbordessous clearfix _5b2_ boitesettingslistitemlabeled">
            <a class="pvm phs boitesettingslista" href="#">
              <h3 class="pls boitesettingslistitemlabel" id="cam1"> Email  </h3>

              <span class="boitesettingslistitemcontent fcg"> <strong><?php echo $user->email ?></strong></span>
            </a>
          </li>

          <li class="boitesettingslistitem boitesettingsbordessous clearfix _5b2_ boitesettingslistitemlabeled">
            <a class="pvm phs boitesettingslista" href="#">
              <h3 class="pls boitesettingslistitemlabel" id="cam1"> Statut</h3>
              <span class="boitesettingslistitemcontent fcg"> <strong><?php echo $user->statut ?></strong></span>

            </a>
          </li>
          <li class=" suuprim boitesettingslistitem boitesettingsbordessous clearfix _5b2_ boitesettingslistitemlabeled" Onclick="prompt('Voulez-Vous Vraiment Supprimer Votre compte?')">
            <a class="pvm phs boitesettingslista" href="index.php?page=suppcompte&email=<?php echo $user->email ?>">
              <h3 class="pls boitesettingslistitemlabel" id="cam1"> Quitter Le Réseau</h3>
              <span class="boitesettingslistitemcontent fcg fa fa-ban" > <strong>
                Supprimer Mon Compte 
               </strong>
               <div id="infobulle">
                   Attention: Si vous Cliquez Ici Votre Compte Sera Définitivement Supprimé
               </div>
               </span>

            </a>
          </li>
        </ul>
      </div>

    </div>
    </div>
    </section>
       <?php
}
?>
</div>


<div class="right-menu">
<a href="index.php?page=profil" class="active">
    <i class="fa fa-user">  </i>
    <span>Profil</span>
</a>
<a href="index.php?page=menumodif">
    <i class="fa fa-pencil"> </i>
    <span>  Modifier Mes Informations</span>
</a>



</div>
</div>

</div>

</div>

<?php

?>


  </body>
</html>
