<?php
 function update_actif(){
   global $db;
   $sql = "UPDATE users SET actif=0 WHERE email='{$_SESSION['tchat']}'";
   $req = $db->prepare($sql);
   $req->execute($i);
 }
 ?>
