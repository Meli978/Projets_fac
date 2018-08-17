<?php

    function email_taken($email){
        global $db;
        $e = array('email' => $email);
        $sql = 'SELECT * FROM users WHERE email = :email';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    function register($name,$prenom,$pseudo,$email,$dm,$password){
        global $db;
        $r = array(
            'name'=>$name,
            'prenom'=>$prenom,
            'pseudo'=>$pseudo,
            'email'=>$email,
             'dm'=>$dm,
            'password'=>$password,
            'actif'=>1
        );
        $sql = "INSERT INTO users(name,prenom,pseudo,email,dm,password,actif) VALUES(:name,:prenom,:pseudo,:email,:dm,:password,:actif)";
        $req = $db->prepare($sql);
        $req->execute($r);
    }

