<?php
function modifier_bdd_reception_produit($nom,$qte){
  global $db;
  $i = array(
      'nom' => $nom,
      'qte' =>$qte

  );

  $sql = "UPDATE produit SET qte= qte +:qte WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req->execute($i);
}

  function inserer_reception($id,$nom_produit, $qte,$date){
  global $db;
  $i = array(
      'id'          =>$id,
      'nom_produit' => $nom_produit,
      'qte'       =>$qte,
      'date'      =>$date
  );

  $sql = "INSERT INTO reception(id,nom_produit, qte,date,recup) VALUES(:id,:nom_produit,:qte,:date,1)";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recup_reception(){
  global $db;
  $sql = "UPDATE reception SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

//permet de recuperer les reception inseres
function recuperer_produit_reception($id){
  global $db;
  $i = array(
    'id' => $id
  );
  $sql = "SELECT * FROM reception WHERE id=:id";
  $req = $db->prepare($sql);
  $req-> execute($i);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function recuperer_donnees_reception_produit($nom_produit){
  global $db;
  $u = array(
    'nom' => $nom_produit
  );
  $sql = "SELECT * FROM produit WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req-> execute($u);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

//recuperer le numero de bon
function recuperer_nb_reception(){
  global $db;
  $sql = "SELECT MAX(id) FROM reception ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function supprimer_reception($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM reception WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function modifier_reception($id,$nom_produit, $qte,$date){
global $db;
$i = array(
    'id'          => $id,
    'nom_produit' => $nom_produit,
    'qte'       =>$qte,
    'date'      =>$date
);

$sql = "UPDATE reception SET nom_produit=:nom_produit, qte=:qte,date=:date WHERE id=:id";
$req = $db->prepare($sql);
$req->execute($i);
}

//permet de recuperer les reception inseres
function recuperer_reception_entier(){
  global $db;
  $sql = "SELECT * FROM reception ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}


function  result_code_reception($search){
  global $db;

    $where = "";
    $search = preg_split('/[\s\-]/',$search);//tableau

      $count_keywords = count($search);//nombre de mots
       foreach($search as $key => $searches)
     {
       $where .= "id LIKE '%".$searches."%'";

       if($key != ($count_keywords-1)){
         $where .= " AND ";
       }
     }
      $req = $db->query("SELECT * FROM reception WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}


 ?>
