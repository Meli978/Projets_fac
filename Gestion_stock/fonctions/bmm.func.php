<?php
function modifier_bdd_bmm_produit($nom,$qte){
  global $db;
  $i = array(
      'nom' => $nom,
      'qte' =>$qte

  );

  $sql = "UPDATE produit SET qte= qte +:qte WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req->execute($i);
}

  function inserer_bmm($id,$nom_produit, $qte,$date){
  global $db;
  $i = array(
      'id'          =>$id,
      'nom_produit' => $nom_produit,
      'qte'       =>$qte,
      'date'      =>$date
  );

  $sql = "INSERT INTO bmm(id,nom_produit, qte,date,recup) VALUES(:id,:nom_produit,:qte,:date,1)";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recup_bmm(){
  global $db;
  $sql = "UPDATE bmm SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

//permet de recuperer les bmm inseres
function recuperer_produit_bmm($id){
  global $db;
  $i = array(
    'id' => $id
  );
  $sql = "SELECT * FROM bmm WHERE id=:id";
  $req = $db->prepare($sql);
  $req-> execute($i);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function recuperer_donnees_bmm_produit($nom_produit){
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
function recuperer_nb_bmm(){
  global $db;
  $sql = "SELECT MAX(id) FROM bmm ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function supprimer_bmm($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM bmm WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function modifier_bmm($id,$nom_produit, $qte,$date){
global $db;
$i = array(
    'id'          => $id,
    'nom_produit' => $nom_produit,
    'qte'       =>$qte,
    'date'      =>$date
);

$sql = "UPDATE bmm SET nom_produit=:nom_produit, qte=:qte,date=:date WHERE id=:id";
$req = $db->prepare($sql);
$req->execute($i);
}

//permet de recuperer les bmm inseres
function recuperer_bmm_entier(){
  global $db;
  $sql = "SELECT * FROM bmm ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}


function  result_code_bmm($search){
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
      $req = $db->query("SELECT * FROM bmm WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}




 ?>
