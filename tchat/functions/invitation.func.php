<?php

    function get_invitations(){
        global $db;
        $req = $db->query(" SELECT * FROM amis INNER JOIN users ON users.email= amis.pseudo_exp WHERE pseudo_dest ='{$_SESSION['tchat']}' AND (active=0)");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }


 ?>
