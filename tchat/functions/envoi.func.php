<?php
//la fonction qui va enregistrer l'invitation dans la Bdd
function enregister_invit(){
  global $db;
  $pseudo_exp = $_SESSION['tchat'];
  $pseudo_dest = $_GET['user'];


  $i = array(
      'pseudo_exp' => $pseudo_exp,
      'pseudo_dest' =>$pseudo_dest

  );

  $sql = "INSERT INTO amis(pseudo_exp,pseudo_dest,date_invitation,date_confirmation,date_vue,active) VALUES(:pseudo_exp,:pseudo_dest,NOW(),NOW(),NOW(),0)";
  $req = $db->prepare($sql);
  $req->execute($i);
   //demande enregistree, donc envoyee

}


 ?>
