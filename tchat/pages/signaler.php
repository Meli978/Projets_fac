<?php
 $user = $_GET['user'];
 $inc = $_GET['inc'];

 if(signal_exist($user) == 1){
   header('Location:index.php?page=membres');
  }
  else
  if(signal_exist($user) == 0){
    inserer_signal($user);
    signaler($user,$inc);
    header('Location:index.php?page=membres');

  }




 ?>
