<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <link rel ="stylesheet" href = "..\font-awesome-4.7.0\css\font-awesome.min.css">
  <link rel ="stylesheet" href = "css/liste.css" >
</head>
<body>
    <div class="slider-container">
    <div class="slider-content">

       <?php
    foreach(get_membres($_GET['dm']) as $membre){
    if($membre->email != $_SESSION['tchat']){
      if(demande_exist($membre->email) == 0){
     ?>
     
      <div class="slider-single">
        <div class="slider-single-image">
          <div class="container2">
      <div class="head2">
          <h1 class="a"> <?php
          $name = $membre->name;
          echo ucfirst(strtolower($name));
           ?></h1>
          <span class="s"><?php echo $membre->email?></span> <a href="index.php?page=envoi&user=<?php echo $membre->email?>&dm=<?php echo $_GET['dm'] ?>" class="button2">Inviter<i class="fa fa-paper-plane"></i></a>
        </div>
      </div>
      </div>
      </div>
      
      <?php
                        
          }
     ?>
      
</body>
</html>