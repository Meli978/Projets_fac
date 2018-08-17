<?php
include 'fonctions/bsm.func.php';
$id = $_GET['id'];
supprimer_bsm($id);
header("Location:index.php?page=bsmDefinitif");
 ?>
