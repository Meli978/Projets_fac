<?php

    function get_user_profil(){
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE email=?");
        $req-> execute(array($_SESSION['tchat']));
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }
?>
