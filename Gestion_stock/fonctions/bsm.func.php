<?php
function modifier_bdd_produit($nom,$qte){
  global $db;


  $i = array(
      'nom' => $nom,
      'qte' =>$qte

  );

  $sql = "UPDATE produit SET qte= qte -:qte WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recuperer_donnes_produit($nom){
  global $db;
  $i = array(
    'nom' => $nom
  );
  $sql = "SELECT * FROM produit WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req-> execute($i);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

  function inserer_bsm($id,$nom_produit, $qte,$date){
  global $db;
  $i = array(
      'id'          => $id,
      'nom_produit' => $nom_produit,
      'qte'       =>$qte,
      'date'      =>$date
  );

  $sql = "INSERT INTO bsm(id,nom_produit, qte,date,recup) VALUES(:id,:nom_produit,:qte,:date,1)";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recup_bsm(){
  global $db;
  $sql = "UPDATE bsm SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

//permet de recuperer les bsm inseres
function recuperer_produit_bsm($id){
  global $db;
  $i = array(
      'id' => $id
  );
  $sql = "SELECT * FROM bsm WHERE id=:id";
  $req = $db->prepare($sql);
  $req-> execute($i);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function recuperer_donnees_bsm_produit($nom_produit){
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


function supprimer_bsm($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM bsm WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function modifier_bsm($id,$nom_produit, $qte,$date){
global $db;
$i = array(
    'id'          => $id,
    'nom_produit' => $nom_produit,
    'qte'       =>$qte,
    'date'      =>$date
);

$sql = "UPDATE bsm SET nom_produit=:nom_produit, qte=:qte, date=:date WHERE id=:id";
$req = $db->prepare($sql);
$req->execute($i);
}

//permet de recuperer les bsm inseres
function recuperer_bsm_entier(){
  global $db;
  $sql = "SELECT * FROM bsm ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}


function  result_code_bsm($search){
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
      $req = $db->query("SELECT * FROM bsm WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}

//recuperer le numero de bon
function recuperer_nb_bsm(){
  global $db;
  $sql = "SELECT MAX(id) FROM bsm ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}


 ?>
