<?php
include 'fonctions/reception.func.php';
$id = $_GET['id'];
supprimer_reception($id);
header("Location:index.php?page=receptionDefinitif");
 ?>
