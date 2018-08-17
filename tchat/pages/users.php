<?php
    include './functions/envoi.func.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cssdomaine.css">
   
  </head>
  <body>

    <?php
    foreach(get_membres($_GET['dm']) as $membre){
    if($membre->email != $_SESSION['tchat']){
      if(demande_exist($membre->email) == 0){
     ?>

   <!-- afficher les membres qui existent -->
      <div class="Membres ">
        <div class="">
          <?php
          $name = $membre->name;
          echo ucfirst(strtolower($name));
           ?>
        </div>

        <a href="index.php?page=envoi&user=<?php echo $membre->email?>&dm=<?php echo $_GET['dm'] ?>">Envoyer invitation</a>
      </div>


     <?php
   }
   //si la demande non acceptee et envoyee et que c le connecte qui la envoye
   else
     if((demande_acceptee($membre->email)== 0) && (verifier_expediteur($membre->email) == 1))
   {
   ?>

   <div class="Membres ">
     <div class="">
       <?php
       $name = $membre->name;
       echo ucfirst(strtolower($name));
        ?>
     </div>

     <div class="">
       Demande envoyee
     </div>
   </div>
  <?php
   }
   //si la demande non acceptee et envoyee et que c pas le connecte qui la envoye
   else
     if((demande_acceptee($membre->email)== 0) && (verifier_expediteur($membre->email) == 0)){
   ?>
   <div class="Membres ">
     <div class="">
       <?php
       $name = $membre->name;
       echo ucfirst(strtolower($name));
        ?>
     </div>

     <div class="">
       Demande deja envoyee par  <?php
        $name = $membre->name;
        echo ucfirst(strtolower($name));
         ?>, verifier vos invitations
     </div>
   </div>

     <?php
      }
      else
        if((demande_acceptee($membre->email) == 1) && (verifier_expediteur($membre->email) == 1)){
          update_date_vue();
       ?>

       <div class="">
         <p> <?php
          $name = $membre->name;
          echo ucfirst(strtolower($name));
           ?> a accepte votre demande </p>
       </div>
       </div>

       <?php
     }else {
       //demande acceptee et c le connectee le destinataire
       if((demande_acceptee($membre->email) == 1) && (verifier_expediteur($membre->email) == 0)){
      ?>
       <div class="">
         Vous avez acceptee la demande de  <?php
          $name = $membre->name;
          echo ucfirst(strtolower($name));
           ?>
       </div>
      <?php
      }
     }

      ?>

<?php
 }
 }
      ?>

  </body>
</html>
