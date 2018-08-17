<?php
include 'fonctions/dai.func.php';
$id = $_GET['id'];
supprimer_dai($id);
header("Location:index.php?page=daiDefinitif");
 ?>
