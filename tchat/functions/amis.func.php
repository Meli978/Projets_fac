<?php

    function get_amis_exp(){
        global $db;
        $req = $db->query(" SELECT * FROM amis INNER JOIN users ON users.email=amis.pseudo_exp WHERE (pseudo_dest ='{$_SESSION['tchat']}' AND active=1)");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }

    function get_amis_dest(){
        global $db;
        $req = $db->query(" SELECT * FROM amis INNER JOIN users ON users.email=amis.pseudo_dest WHERE (pseudo_exp ='{$_SESSION['tchat']}' AND active=1)");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }



  ?>
