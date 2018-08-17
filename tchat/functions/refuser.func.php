<?php
function refuser_invitation(){
  global $db;
  $pseudo_dest = $_SESSION['tchat'];
  $pseudo_exp = $_GET['user'];


  $i = array(
      'pseudo_exp' => $pseudo_exp,
      'pseudo_dest' =>$pseudo_dest

  );

  $sql = "DELETE FROM amis  WHERE pseudo_exp=:pseudo_exp AND pseudo_dest=:pseudo_dest";
  $req = $db->prepare($sql);
  $req->execute($i);



}



 ?>
