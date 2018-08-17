<?php

if(isLogged() == 1){
 $ibi = afficher_ibi();
}
 ?>

    <link rel="stylesheet" href="./css/Menu.css">
     <link rel ="stylesheet" href = "./font-awesome-4.7.0\css\font-awesome.min.css" >

    <!-- HEADER -->

     <header class="block">
        <div class="barremenu">
            <div class="logo">
             <img class="imglogo" src="img/ecureuil.png" alt="">

            </div>
            <div class="lemenu">

         <ul class="header-menu horizontal-list">
             <li>
                 <a class="header-menu-tab" href="index.php?page=domaine"> <span class="fa fa-home"></span> <span class="lib">Accueil</span> </a>
             </li>
             <li>
                 <a class="header-menu-tab" href="index.php?page=profil"><span class="fa fa-address-card"></span><span class="lib">Profil</span> </a>
             </li>
             <li>
                 <a class="header-menu-tab" href="index.php?page=invitation"><span class="fa fa-user-plus"></span><span class="lib">Invitations</span> </a>
                 <a class="header-menu-number" href="#4">
                   <?php
                    if(isLogged() == 1){

                  if($ibi !== 0) echo $ibi; }
                  ?>
                </a>
             </li>
             <li>
                 <a class="header-menu-tab" href="index.php?page=membres"><span class="fa fa-envelope"></span><span class="lib">Messagerie</span> </a>
                  <div id="msg">

                  </div>
             </li>
             <li>
                 <a class="header-menu-tab" href="index.php?page=logout"><span class="fa fa-sign-out"></span><span class="lib">Deconnexion</span> </a>
             </li>
         </ul>
         </div>
       </div>
     </header>
