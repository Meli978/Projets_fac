<?php
function ajouter_produit($nom,$designation, $emplacement, $unite, $qte){
  global $db;

  $i = array(
      'nom'         => $nom,
      'designation' =>$designation,
      'emplacement' =>$emplacement,
      'unite'       =>$unite,
      'qte'         =>$qte,

  );

  $sql = "INSERT INTO produit(nom, designation, emplacement, unite, qte,recup) VALUES(:nom,:designation,:emplacement,:unite,:qte,1)";
  $req = $db->prepare($sql);
  $req->execute($i);

}

function produit_existe($nom){
  global $db;
  $u = array(
      'nom'=>$nom

  );
  $sql = "SELECT * FROM produit WHERE nom='".$nom."'";

  $req = $db->prepare($sql);
  $req->execute();
  $exist = $req->rowCount($sql);
  return $exist;
}

function modifier_donnees_produit($nom, $designation, $emplacement, $unite, $qte,$prix){
  global $db;


  $i = array(
      'nom'         => $nom,
      'designation' =>$designation,
      'emplacement' =>$emplacement,
      'unite'       =>$unite,
      'qte'         =>$qte,
      'prix'        =>$prix
  );

  $sql = "UPDATE produit SET designation=:designation, emplacement=:emplacement, unite=:unite, qte= qte + :qte,prix=:prix,recup=1 WHERE nom=:nom";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recuperer_produit_insere(){
  global $db;
  $req = $db->prepare("SELECT * FROM produit WHERE recup=1");
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}


function modifier_produit($id, $nom, $designation, $emplacement, $unite, $qte,$prix){
  global $db;


  $i = array(
      'id'          =>$id,
      'nom'         => $nom,
      'designation' =>$designation,
      'emplacement' =>$emplacement,
      'unite'       =>$unite,
      'qte'         =>$qte,
      'prix'        =>$prix
  );

  $sql = "UPDATE produit SET nom = :nom, designation=:designation, emplacement=:emplacement, unite=:unite, qte=:qte, prix=:prix WHERE id=:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function annuler($nb_produit){
  header("Location:index.php?page=annuler");
}


function supprimer_produit($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM produit WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);

}

function recuperer_produits(){
  global $db;
  $req = $db->prepare("SELECT * FROM produit ");
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
    }


function recup_produit(){
  global $db;
  $sql = "UPDATE produit SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

function rupture_stock(){
  global $db;
  $req = $db->prepare("SELECT * FROM produit WHERE (qte < 5) ");
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function nb_rupture_stock(){
  global $db;
  $sql = "SELECT * FROM produit WHERE (qte < 5)";
  $req = $db->prepare($sql);
  $req->execute();
  $exist = $req->rowCount($sql);
  return $exist;
}


function result_nom_produit($search){
  global $db;

    $where = "";
    $search = preg_split('/[\s\-]/',$search);//tableau

      $count_keywords = count($search);//nombre de mots
       foreach($search as $key => $searches)
     {
       $where .= "nom LIKE '%".$searches."%'";

       if($key != ($count_keywords-1)){
         $where .= " AND ";
       }
     }
      $req = $db->query("SELECT * FROM produit WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;
}

function  result_code($search){
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
      $req = $db->query("SELECT * FROM produit WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}

function modif_prod($id){
  global $db;
  $i = array(
      'id'          =>$id

  );

  $sql = "UPDATE produit SET recup=1 WHERE id=:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

 ?>
