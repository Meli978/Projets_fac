<?php
include 'fonctions/reintegration.func.php';
$id = $_GET['id'];
supprimer_reintegration($id);
header("Location:index.php?page=reintegrationDefinitif");
 ?>
