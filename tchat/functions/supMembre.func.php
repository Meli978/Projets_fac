<?php
function supprimer_membre(){
  global $db;
  $pseudo_dest = $_SESSION['tchat'];
  $pseudo_exp = $_GET['user'];


  $i = array(
      'pseudo_exp' => $pseudo_exp,
      'pseudo_dest' =>$pseudo_dest

  );

  $sql = "DELETE FROM amis  WHERE ((pseudo_exp=:pseudo_exp AND pseudo_dest=:pseudo_dest) OR (pseudo_exp=:pseudo_dest AND pseudo_dest=:pseudo_exp))";
  $req = $db->prepare($sql);
  $req->execute($i);



}



 ?>
