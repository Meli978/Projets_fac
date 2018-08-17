<?php
//la function qui accepte l'invitation
function accepter_invitation(){
  global $db;
  $pseudo_dest = $_SESSION['tchat'];
  $pseudo_exp = $_GET['user'];


  $i = array(
      'pseudo_exp' => $pseudo_exp,
      'pseudo_dest' =>$pseudo_dest

  );

  $sql = "UPDATE amis SET active=1,date_confirmation=NOW() WHERE pseudo_exp=:pseudo_exp AND pseudo_dest=:pseudo_dest";
  $req = $db->prepare($sql);
  $req->execute($i);



}


 ?>
