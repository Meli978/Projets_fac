<?php
 function signaler($email,$inc){
    global $db;
     $i = array(
         'email' => $email,
         'inc' => $inc + 1
     );
     $sql = "UPDATE users SET inc=:inc WHERE email=:email ";
     $req = $db->prepare($sql);
     $req->execute($i);
   }

   function signal_exist($email){
     global $db;
     $e = array('email' => $_SESSION['tchat'], 'nsign'=> $email);
     $sql = "SELECT * FROM users WHERE email =:email AND nsign= :nsign";
     $req = $db->prepare($sql);
     $req->execute($e);
     $exist = $req->rowCount($sql);
     return $exist;

   }

   function inserer_signal($email){
     global $db;
     $user = $email;
     $email = $_SESSION['tchat'];


     $i = array(
         'nsign' => $user,
         'email' =>$email

     );

     $sql = "UPDATE users SET nsign=:nsign WHERE email=:email";
     $req = $db->prepare($sql);
     $req->execute($i);
   }


 ?>
