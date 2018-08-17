<?php
function ajouter_emplacement($nom){
  global $db;

  $i = array(
      'nom'         => $nom
  );

  $sql = "INSERT INTO emplacement(nom,recup) VALUES(:nom,1)";
  $req = $db->prepare($sql);
  $req->execute($i);

}

function emplacement_existe($nom){
  global $db;
  $u = array(
      'nom'=>$nom

  );
  $sql = "SELECT * FROM emplacement WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req->execute($u);
  $exist = $req->rowCount($sql);
  return $exist;
}

function recuperer_emplacement_insere(){
  global $db;
  $req = $db->prepare("SELECT * FROM emplacement WHERE recup=1");
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function supprimer_emplacement($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM emplacement WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);

}

function recuperer_emplacement(){
  global $db;
  $req = $db->prepare("SELECT * FROM emplacement ");
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
    }


function recup_emplacement(){
  global $db;
  $sql = "UPDATE emplacement SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}


 ?>
