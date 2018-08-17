<?php

  $id = $_GET['id'];
  supprimer_produit($id);
  header('Location:index.php?page=produits');

 ?>
