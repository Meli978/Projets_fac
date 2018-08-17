<?php

 function results($search)
   {
     global $db;

     $where = "";
     $search = preg_split('/[\s\-]/',$search);//tableau

       $count_keywords = count($search);//nombre de mots
        foreach($search as $key => $searches)
      {
        $where .= "name LIKE '%".$searches."%'";

        if($key != ($count_keywords-1)){
          $where .= " AND ";
        }
      }

       //  $users = $db->prepare("SELECT * FROM users WHERE $where");
     //  $users->execute();
     //  $rows = $users->rowCount();

       $req = $db->query("SELECT * FROM users WHERE $where");
        $result = array();
        while($row = $req->fetchObject()){
            $result[] = $row;
        }
        return $result;


      }

  function result_exp($search){
    global $db;

    $where = "";
    $search = preg_split('/[\s\-]/',$search);//tableau

      $count_keywords = count($search);//nombre de mots
       foreach($search as $key => $searches)
     {

       $where .= "(pseudo_dest ='{$_SESSION['tchat']}' AND active=1 AND pseudo_exp LIKE '%".$searches."%')";

       if($key != ($count_keywords-1)){
         $where .= " AND ";
       }
     }

      //  $users = $db->prepare("SELECT * FROM users WHERE $where");
    //  $users->execute();
    //  $rows = $users->rowCount();

      $req = $db->query("SELECT * FROM amis INNER JOIN users ON users.email=amis.pseudo_exp WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

  }

  function result_dest($search){
    global $db;

    $where = "";
    $search = preg_split('/[\s\-]/',$search);//tableau

      $count_keywords = count($search);//nombre de mots
       foreach($search as $key => $searches)
     {

       $where .= "(pseudo_exp ='{$_SESSION['tchat']}' AND active=1 AND pseudo_dest LIKE '%".$searches."%')";

       if($key != ($count_keywords-1)){
         $where .= " AND ";
       }
     }

      //  $users = $db->prepare("SELECT * FROM users WHERE $where");
    //  $users->execute();
    //  $rows = $users->rowCount();

    $req = $db->query("SELECT * FROM amis INNER JOIN users ON users.email=amis.pseudo_dest WHERE $where");
       $result = array();
       while($row = $req->fetchObject()){
           $result[] = $row;
       }
       return $result;

  }

  ?>
