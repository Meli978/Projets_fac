<?php

  $id = $_GET['id'];
  modif_prod($id);

  header('Location:index.php?page=annulerProduit');

 ?>
