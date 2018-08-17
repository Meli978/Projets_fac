<?php
session_destroy();
update_actif();
header("Location:index.php?page=signin");
?>
