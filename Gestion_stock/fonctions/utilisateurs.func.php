<?php

function user_exist($login,$mdp){
    global $db;
    $u = array(
        'login'=>$login,
        'mdp'=>$mdp
    );
    $sql = "SELECT * FROM utilisateurs WHERE login=:login AND mdp=:mdp";
    $req = $db->prepare($sql);
    $req->execute($u);
    $exist = $req->rowCount($sql);
    return $exist;
}

function type_utilisateur($login){
    global $db;
    $u = array(
        'login'=>$login
    );
    $sql = "SELECT * FROM utilisateurs WHERE login=:login";
    $req = $db->prepare($sql);
    $req->execute($u);
    $chercher = $req->fetch(PDO::FETCH_ASSOC);
    $type = $chercher['type'];
    return $type;
}

function recuperer_utilisateurs(){
    global $db;
    $req = $db->prepare("SELECT * FROM utilisateurs ");
    $req-> execute();
    $results = array();
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}


function supprimer_utilisateur($id){
  global $db;
  $i = array(
      'id' => $id
    );
  $sql = "DELETE FROM utilisateurs WHERE id =:id";
  $req = $db->prepare($sql);
  $req->execute($i);

}

function recuperer_utilisateurs_insere(){
  global $db;
  $req = $db->prepare("SELECT * FROM utilisateurs WHERE recup=1");
  $req-> execute();
  $results = array();
  while($rows = $req->fetchObject()){
      $results[] = $rows;
  }
  return $results;
}

function login_pris($login){
    global $db;
    $u = array(
        'login'=>$login

    );
    $sql = "SELECT * FROM utilisateurs WHERE login=:login";
    $req = $db->prepare($sql);
    $req->execute($u);
    $exist = $req->rowCount($sql);
    return $exist;
}

function email_pris($email){
  global $db;
  $u = array(
      'email'=>$email

  );
  $sql = "SELECT * FROM utilisateurs WHERE email=:email";
  $req = $db->prepare($sql);
  $req->execute($u);
  $exist = $req->rowCount($sql);
  return $exist;
}


function ajouter_utilisateur($nom, $prenom, $age, $telephone, $email, $login, $mdp, $type ){
  global $db;


  $i = array(
      'nom'         => $nom,
      'prenom'      =>$prenom,
      'age'         =>$age,
      'telephone'   =>$telephone,
      'email'       =>$email,
      'login'       =>$login,
      'mdp'         =>$mdp,
      'type'        =>$type


  );

  $sql = "INSERT INTO utilisateurs(nom, prenom, age, telephone, email,login,mdp, type,recup ) VALUES(:nom,:prenom,:age,:telephone,:email,:login, :mdp,:type,1 )";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function modifier($id, $nom, $prenom, $age, $telephone, $email, $login, $mdp, $type){
  global $db;


  $i = array(
      'id'          =>$id,
      'nom'         => $nom,
      'prenom'      =>$prenom,
      'age'         =>$age,
      'telephone'   =>$telephone,
      'email'       =>$email,
      'login'       =>$login,
      'mdp'         =>$mdp,
      'type'        =>$type


  );

  $sql = "UPDATE utilisateurs SET nom = :nom, prenom=:prenom, age=:age, telephone=:telephone, email=:email, login=:login, mdp=:mdp, type=:type WHERE id=:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}

function recup_utilisateur(){
  global $db;
  $sql = "UPDATE utilisateurs SET recup = 0 WHERE recup = 1";
  $req = $db->prepare($sql);
  $req->execute();
}

function result_nom($search){
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
      $req = $db->query("SELECT * FROM utilisateurs WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;
}

function  result_prenom($search){
  global $db;

    $where = "";
    $search = preg_split('/[\s\-]/',$search);//tableau

      $count_keywords = count($search);//nombre de mots
       foreach($search as $key => $searches)
     {
       $where .= "prenom LIKE '%".$searches."%'";

       if($key != ($count_keywords-1)){
         $where .= " AND ";
       }
     }
      $req = $db->query("SELECT * FROM utilisateurs WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}

function result_login($search){
  global $db;

    $where = "";
    $search = preg_split('/[\s\-]/',$search);//tableau

      $count_keywords = count($search);//nombre de mots
       foreach($search as $key => $searches)
     {
       $where .= "login LIKE '%".$searches."%'";

       if($key != ($count_keywords-1)){
         $where .= " AND ";
       }
     }
      $req = $db->query("SELECT * FROM utilisateurs WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

}

function mod_utilisateur($id){
  global $db;
  $i = array(
      'id'          =>$id

  );

  $sql = "UPDATE utilisateurs SET recup=1 WHERE id=:id";
  $req = $db->prepare($sql);
  $req->execute($i);
}


 ?>
