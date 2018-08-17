<?php
    include 'fonctions/connectionDB.php';
    $pages = scandir('pages/');

    if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = 'connecter';
    }

    $pages_php = scandir('fonctions/');
    if(in_array($page.'.func.php',$pages_php)){
      include 'fonctions/'.$page.'.func.php';

    }

        if($page !== 'produits'){
          include 'fonctions/produits.func.php';
        }
        if($page !== 'utilisateurs'){
          include 'fonctions/utilisateurs.func.php';
        }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--inclure le css ------------------------->
   <link rel="stylesheet" href="css/commun.css">
    <?php
        $pages_css = scandir('css/');
        if(in_array($page.'.css',$pages_css)){
            ?>
                <link rel="stylesheet" href="css/<?= $page.'.css' ?>">
            <?php
        }

      ?>

      <script type="text/javascript" src="js/jquery.js"></script>
      <?php

      $pages_js = scandir('js/');
      if(in_array($page.'.func.js',$pages_js)){

          ?>

              <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>

          <?php
      }
 ?>
    <title>Accueil</title>
  </head>
  <body>
    <div id="main">


    <?php
            if($page!=='connecter'){
              include 'pages/menu.php';
            }

            include 'pages/'.$page.'.php';





              ?>

  <script type="text/javascript" src="js/commun.func.js"></script>



  </div>
  </body>
</html>
