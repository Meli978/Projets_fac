<link rel="stylesheet" href="./css/style.css">

<?php

     include('./functions/amis.func.php');
     include('./functions/signaler.func.php');

    if(isLogged() == 0){
        header("Location:index.php?page=signin");
    }
?>

    <div class=bodyTchat>
    <div class=TchatContainer>
      <div  class=Membres>

    <!-- partie Recherche -->
    <div class=Recherche>
    <h2>Mes Amis</h2>
    </div>

      <div class=PersonneContainer id="PersonneContainer">


          <?php
              foreach(get_amis_exp() as $membre){
                  if($membre->email != $_SESSION['tchat']){
                      ?>
                       <div class="containerA">
                       <a href="index.php?page=tchat&user=<?= $membre->email ?>" target='_self' class="lienPersonne" >
                       <div class=Personne>
                         <div class="user-photo">
                         <img src="./membres/avatars/<?php echo $membre->avatar;?>" alt="">
                         </div>

                         <div class=info>

                        <p>
                           <?php
                           $name = $membre->name;
                           echo ucfirst(strtolower($name));
                            ?>
                         </p>

                          <?php
                             if(signal_exist($membre->email) == 0){
                           ?>
                         <div class="signaler" id="signaler">
                           <a href="index.php?page=signaler&user=<?php echo $membre->email ?>&inc=<?php echo $membre->inc ?>">signaler</a>
                         </div>
                           <?php
                          }
                            ?>

                         <div class="supMembre">
                            <a href="index.php?page=supMembre&user=<?php echo $membre->email ?>" id="supMembre" class="fa fa-user-times"></a>
                          </div>
                         <div class="<?php echo ($membre->actif == 0) ? 'offline' : 'online' ?>"></div>
                         </div>
                       </div>
                       </a>
                       <hr>
                 </div>



                      <?php
                  }

              }
          ?>

          <?php
              foreach(get_amis_dest() as $membre){
                  if($membre->email != $_SESSION['tchat']){
                      ?>
                    <div class="containerA">
                       <a href="index.php?page=tchat&user=<?= $membre->email ?>" target='_self' class="lienPersonne" >
                       <div class=Personne>
                         <div class="user-photo">
                         <img src="./membres/avatars/<?php echo $membre->avatar;?>" alt="">
                         </div>

                         <div class=info>

                        <p>
                           <?php
                           $name = $membre->name;
                           echo ucfirst(strtolower($name));
                            ?>
                         </p>
                         <?php
                            if(signal_exist($membre->email) == 0){
                          ?>
                        <div class="signaler" id="signaler">
                          <a href="index.php?page=signaler&user=<?php echo $membre->email ?>&inc=<?php echo $membre->inc ?>">signaler</a>
                        </div>
                          <?php
                         }
                           ?>
                         <div class="supMembre">
                            <a href="index.php?page=supMembre&user=<?php echo $membre->email ?>" id="supMembre" class="fa fa-user-times"></a>
                          </div>
                         <div class="<?php echo ($membre->actif == 0) ? 'offline' : 'online' ?>"></div>
                         </div>
                       </div>
                       </a>
                        <hr>


                     </div>



                      <?php
                  }

              }
          ?>


          <?php
            if(empty(get_amis_exp()) && empty(get_amis_dest())){
          ?>
             <div>
               <a href="index.php?page=domaine"><p class="noami" id="pasami">Vous n'avez pas encore d'amis</p></a>
             </div>

              <?php
            }


           ?>


          </div>
      </div>
    </div>


    </div>
    </div>
