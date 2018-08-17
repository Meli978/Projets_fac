<?php
  function supConv(){

      global $db;
      $receiver = $_SESSION['tchat'];
      $sender = $_GET['user'];


      $i = array(
          'sender' => $sender,
          'receiver' =>$receiver

      );

      $sql = "DELETE FROM messages  WHERE ((sender=:sender AND receiver=:receiver) OR (sender=:receiver AND receiver=:sender))";
      $req = $db->prepare($sql);
      $req->execute($i);






  }





 ?>
