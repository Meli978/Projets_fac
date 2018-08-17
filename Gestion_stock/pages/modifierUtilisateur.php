<?php
$id = $_GET['id'];
mod_utilisateur($id);
header("Location:index.php?page=annulerUtilisateur");

 ?>
