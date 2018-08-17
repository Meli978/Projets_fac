<?php
function suppcompte($email){
  global $db;
  $pseudo_dest = $_SESSION['tchat'];
  $pseudo_exp = $_GET['user'];


  $i = array(
     'email' => $email
  );

  $sql = "DELETE FROM users  WHERE (email=:email)";
  $req = $db->prepare($sql);
  $req->execute($i);

}



 ?>