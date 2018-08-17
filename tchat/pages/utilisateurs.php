<div class="slider-container">
<div class="slider-content">

   <?php
   if($_GET['dm'] == 'autres'){
foreach(get_membres($_GET['dm']) as $membre){
if($membre->email != $_SESSION['tchat']){

 ?>

  <div class="slider-single">
    <div class="slider-single-image">
      <div class="container2">
  <div >
    <div class="head2">
     <img src="./membres/avatars/<?php echo $membre->avatar; ?>" class='slid' alt="">
     </div>
      <h1 class="a">
        <?php
      $name = $membre->name;
      $prenom= $membre->prenom;
    ?>
    <span class="np"><?php

      echo ucfirst(strtolower($name));
     ?></span>
     <span class="np">
      <?php
    echo ucfirst(strtolower($prenom));
       ?>
       </span>
       </h1>
       <?php
       //si la demande nexiste pas
          if(demande_exist($membre->email) == 0){

        ?>

      <span class="s">
      <?php echo $membre->email?></span> <a href="index.php?page=envoi&user=<?php echo $membre->email?>&dm=<?php echo $_GET['dm'] ?>" class="button2">Ajouter<i class="fa fa-plus"></i></a>


     <?php
   }
   //si la demande non acceptee et envoyee et que c le connecte qui la envoye
   else
     if((demande_acceptee($membre->email)== 0) && (verifier_expediteur($membre->email) == 1))
   {
      ?>
    <span class="s">  Demande envoyee</span>

   <?php
 }
 //si la demande non acceptee et envoyee et que c pas le connecte qui la envoye
 else
   if((demande_acceptee($membre->email)== 0) && (verifier_expediteur($membre->email) == 0)){
    ?>

    <span class="s">
          Demande deja envoyee par  <?php
         $name = $membre->name;
         echo ucfirst(strtolower($name));
          ?>, verifier vos invitations</span>
    <?php
           }
           else
             if((demande_acceptee($membre->email) == 1) && (verifier_expediteur($membre->email) == 1)){
               update_date_vue();
            ?>

            <span class="s"><?php
             $name = $membre->name;
             echo ucfirst(strtolower($name));
              ?> a accepte votre demande</span>

              <?php
            }else {
              //demande acceptee et c le connectee le destinataire
              if((demande_acceptee($membre->email) == 1) && (verifier_expediteur($membre->email) == 0)){
             ?>

             <span class="s">  Vous avez acceptee la demande de  <?php
                $name = $membre->name;
                echo ucfirst(strtolower($name));
                 ?></span>

                 <?php
                 }
                }
                ?>
  </div>
  </div>
  </div>
  </div>

<?php

  }
}

 ?>


<!-- partie membres -->
 <?php
 }else{
foreach(get_membres($_GET['dm']) as $membre){
if($membre->email != $_SESSION['tchat']){

?>

<div class="slider-single">
  <div class="slider-single-image">
    <div class="container2">
<div >
  <div class="head2">
   <img src="./membres/avatars/<?php echo $membre->avatar; ?>" class='slid' alt="">
   </div>
    <h1 class="a">
      <?php
    $name = $membre->name;
    $prenom= $membre->prenom;
  ?>
  <span class="np"><?php

    echo ucfirst(strtolower($name));
   ?></span>
   <span class="np">
    <?php
  echo ucfirst(strtolower($prenom));
     ?>
     </span>
     </h1>
     <?php
     //si la demande nexiste pas
        if(demande_exist($membre->email) == 0){

      ?>

    <span class="s">
    <?php echo $membre->email?></span> <a href="index.php?page=envoi&user=<?php echo $membre->email?>&dm=<?php echo $_GET['dm'] ?>" class="button2">Ajouter<i class="fa fa-plus"></i></a>


   <?php
 }
 //si la demande non acceptee et envoyee et que c le connecte qui la envoye
 else
   if((demande_acceptee($membre->email)== 0) && (verifier_expediteur($membre->email) == 1))
 {
    ?>
  <span class="s">  Demande envoyee</span>

 <?php
}
//si la demande non acceptee et envoyee et que c pas le connecte qui la envoye
else
 if((demande_acceptee($membre->email)== 0) && (verifier_expediteur($membre->email) == 0)){
  ?>

  <span class="s">
        Demande deja envoyee par  <?php
       $name = $membre->name;
       echo ucfirst(strtolower($name));
        ?>, verifier vos invitations</span>
  <?php
         }
         else
           if((demande_acceptee($membre->email) == 1) && (verifier_expediteur($membre->email) == 1)){
             update_date_vue();
          ?>

          <span class="s"><?php
           $name = $membre->name;
           echo ucfirst(strtolower($name));
            ?> a accepte votre demande</span>

            <?php
          }else {
            //demande acceptee et c le connectee le destinataire
            if((demande_acceptee($membre->email) == 1) && (verifier_expediteur($membre->email) == 0)){
           ?>

           <span class="s">  Vous avez acceptee la demande de  <?php
              $name = $membre->name;
              echo ucfirst(strtolower($name));
               ?></span>

               <?php
               }
              }
              ?>
</div>
</div>
</div>
</div>

<?php

}
}
}
?>

<a class="slider-left" href="javascript:void(0);"><i class="fa fa-arrow-left"></i></a>
<a class="slider-right" href="javascript:void(0);"><i class="fa fa-arrow-right"></i></a>
<a href="index.php?page=domaine"><div class="backBtn">
      <span class="line tLine"></span>
      <span class="line mLine"></span>
      <span class="label">Retour</span>
      <span class="line bLine"></span>
  </div>
</a>
</div>
</div>
