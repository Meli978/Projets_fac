<?php

//fonction qui trie selon le domaine
    function get_membres($dm){
        global $db;
        $where = " dm='".$dm."'";
        $req = $db->query("SELECT * FROM users WHERE $where");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }

//fonction qui va verifier si la demande existe
function demande_exist($destinataire){
  global $db;

  $e = array('user' => $destinataire, 'session'=>$_SESSION['tchat']);
  $sql = "SELECT * FROM amis WHERE (pseudo_exp =:user AND pseudo_dest= :session) OR (pseudo_exp =:session AND pseudo_dest= :user)";
  $req = $db->prepare($sql);
  $req->execute($e);
  $exist = $req->rowCount($sql);
  return $exist;
}

//fonction qui va verifier si le destinataire a accepte la demande
function demande_acceptee($destinataire){
  global $db;
  $e = array('user' => $destinataire, 'session'=>$_SESSION['tchat']);
  $sql = "SELECT active FROM amis WHERE (pseudo_exp =:user AND pseudo_dest= :session) OR (pseudo_exp =:session AND pseudo_dest= :user)";
  $req = $db->prepare($sql);
  $req->execute($e);
  while ($donnees = $req->fetch())
{
   if ($donnees['active'] == 0){
     return false;
   }
   else{
     return true;
   }
}
}

//la fonction qui va verifier si l'expediteur est celui qui est connnecte
function verifier_expediteur($destinataire){
  global $db;
  $e = array('user' => $destinataire, 'session'=>$_SESSION['tchat']);
  $sql = "SELECT * FROM amis WHERE (pseudo_exp =:session AND pseudo_dest= :user)";
  $req = $db->prepare($sql);
  $req->execute($e);
  $exist = $req->rowCount($sql);
  return $exist;

}

function get_autres(){
global $db;

     $req = $db->query('SELECT * FROM users WHERE dm NOT IN ("Informatique", "Medecine", "Biologie", "Economie","Droit","GenieCivil","Psychologie","Architecture")');
     $results = array();
     while($rows = $req->fetchObject()){
         $results[] = $rows;
     }
     return $results;
}

 ?>
