<?php
//la fonction qui va afficher l'info bulle des invitations
function afficher_ibi(){
  global $db;
  $e = array('session'=>$_SESSION['tchat']);
  //la personne na ni accepte ni refuse linvit
  $sql = "SELECT * FROM amis WHERE ((pseudo_dest =:session) AND (date_invitation=date_confirmation) AND (active=0)) OR
   ((pseudo_exp =:session) AND (date_confirmation > date_vue) AND (active=0))";
  $req = $db->prepare($sql);
  $req->execute($e);
  $exist = $req->rowCount($sql);
  return $exist;
}

//la fonction qui va permettre de mettre a jour la date_vue dans la Bdd
//pour pouvoir cacher l'info Bulle

function update_date_vue()
{
  global $db;
  $pseudo_exp = $_SESSION['tchat'];
  $i = array(
      'pseudo_exp' => $pseudo_exp

  );

  $sql = "UPDATE amis SET date_vue=NOW() WHERE pseudo_exp=:pseudo_exp AND active=1 ";
  $req = $db->prepare($sql);
  $req->execute($i);
}

 ?>
