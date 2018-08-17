<?php
  function inserer_dai($nom_produit, $qte,$prix,$date){
  global $db;
  $i = array(
      'nom_produit' => $nom_produit,
      'qte'       =>$qte,
      'prix'      =>$prix,
      'date'      =>$date
  );

  $sql = "INSERT INTO dai(nom_produit, qte,prix,date,recup) VALUES(:nom_produit,:qte,:prix,:date,1)";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recup_dai(){
  global $db;
  $sql = "UPDATE dai SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

//permet de recuperer les dai inseres
function recuperer_produit_dai($id){
  global $db;
  $i = array(
      'id' => $id
  );
  $sql = "SELECT * FROM dai WHERE id=:id";
  $req = $db->prepare($sql);
  $req-> execute($i);
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

//recuperer le numero de bon
function recuperer_nb_dai(){
  global $db;
  $sql = "SELECT MAX(id) FROM dai ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function supprimer_dai($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM dai WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function modifier_dai($id,$nom_produit, $qte,$prix,$date){
global $db;
$i = array(
    'id'          => $id,
    'nom_produit' => $nom_produit,
    'qte'       =>$qte,
    'prix'      =>$prix,
    'date'      =>$date
);

$sql = "UPDATE dai SET nom_produit=:nom_produit,prix=:prix, qte=:qte,date=:date WHERE id=:id";
$req = $db->prepare($sql);
$req->execute($i);
}

//permet de recuperer les dai inseres
function recuperer_dai_entier(){
  global $db;
  $sql = "SELECT * FROM dai ";
  $req = $db->prepare($sql);
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function recuperer_dai_id($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "SELECT * FROM dai WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function  result_code_dai($search){
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
      $req = $db->query("SELECT * FROM dai WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}

 ?>
