<?php
$id = $_GET['id'];
supprimer_utilisateur($id);
header("Location:index.php?page=utilisateurs");

 ?>
