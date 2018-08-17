<?php
    include('./functions/envoi.func.php');
    include('./functions/amis.func.php');


    if(isLogged() == 0){
        header("Location:index.php?page=signin");
    }

 ?>
<html lang="en">
<head>
 
  
  <link rel="stylesheet" href="./css/invitation.css">
   <script type="text/javascript">
      function disparaitre(id){
        document.getElementById(id).style.display = 'none';
      }
    </script>
</head>
<body>

<div class="tout">
    <div class="containerInvit">
         <?php
            if(!empty(get_invitations())){
            foreach (get_invitations() as $amis) {
               
              
            if($amis->active == 0){

          ?>

          <div class="container" id="containerInvit">
              <div class="dialog">
                    <div class="GlobalInvit">

                        
                         <div class="user-photo">
                             <img src="./membres/avatars/<?= $amis->avatar?>" alt="">
                         </div>
                         
                         <div class="infoInvit">
                             <p id="NameInvit"><?= $amis->name ?></p> 
                             <p id="NameInvit">Domaine :<?= $amis->dm ?></p>
                         </div>

                         <div class="Liens">
                              <div class="LienInvit">
                                  <div id="AccepterInvit" class="boutonInvit" >
                                        <a href="index.php?page=accepter&user=<?php echo $amis->email ?>" onclick="disparaitre('containerInvit')" class="btn fa fa-check"></a>
                                  </div>

                                  <div id="RefuserInvit" class="boutonInvit" >
                                        <a href="index.php?page=refuser&user=<?php echo $amis->email ?>" onclick="disparaitre('containerInvit')" class="btn fa fa-close"></a>
                                   </div>
                              </div>
                         </div>
                      </div>
                  </div>
          </div>

  <?php
}else{
  ?>
    <div class="">
      Vous êtes Desormais ami(e) avec <?php echo $amis->name ?>
    </div>
  <?php
}

   ?>

   <?php
                  
   }
 }
   else{
    ?>

    <div class="">
      <p>Pas d'invitations</p>
    </div>
    </div>
</div>

    <?php

   }
    ?>

   

  </body>
  </html>
