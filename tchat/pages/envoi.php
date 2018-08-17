<?php

include './functions/utilisateurs.func.php';

   if(demande_exist($_GET['user']) == 0){
      enregister_invit();
   }
  header("Location:index.php?page=utilisateurs&dm=".$_GET['dm']);

 ?>
