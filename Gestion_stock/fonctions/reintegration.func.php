<?php
function modifier_bdd_reintegration_produit($nom,$qte){
  global $db;
  $i = array(
      'nom' => $nom,
      'qte' =>$qte

  );

  $sql = "UPDATE produit SET qte= qte +:qte WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req->execute($i);
}

  function inserer_reintegration($id,$nom_produit, $qte,$date){
  global $db;
  $i = array(
      'id'          =>$id,
      'nom_produit' => $nom_produit,
      'qte'       =>$qte,
      'date'      =>$date
  );

  $sql = "INSERT INTO reintegration(id,nom_produit, qte,date,recup) VALUES(:id,:nom_produit,:qte,:date,1)";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recup_reintegration(){
  global $db;
  $sql = "UPDATE reintegration SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

//permet de recuperer les reintegration inseres
function recuperer_produit_reintegration($id){
  global $db;
  $i = array(
    'id' => $id
  );
  $sql = "SELECT * FROM reintegration WHERE id=:id";
  $req = $db->prepare($sql);
  $req-> execute($i);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function recuperer_donnees_reintegration_produit($nom_produit){
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
function recuperer_nb_reintegration(){
  global $db;
  $sql = "SELECT MAX(id) FROM reintegration ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function supprimer_reintegration($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM reintegration WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function modifier_reintegration($id,$nom_produit, $qte,$date){
global $db;
$i = array(
    'id'          => $id,
    'nom_produit' => $nom_produit,
    'qte'       =>$qte,
    'date'      =>$date
);

$sql = "UPDATE reintegration SET nom_produit=:nom_produit, qte=:qte,date=:date WHERE id=:id";
$req = $db->prepare($sql);
$req->execute($i);
}

//permet de recuperer les reintegration inseres
function recuperer_reintegration_entier(){
  global $db;
  $sql = "SELECT * FROM reintegration ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}


function  result_code_reintegration($search){
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
      $req = $db->query("SELECT * FROM reintegration WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}




 ?>
