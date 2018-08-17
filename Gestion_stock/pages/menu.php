<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/menu.css">
    <title></title>
  </head>
  <body>
    <div id='cssmenu'>
      <?php
        switch($_SESSION['gestion']){
          case 0:{

       ?>
       <!--gestion------->
       <ul>
          <li><a href='index.php?page=gestion'>Gestion</a></li>
          <li class='active'><a href='index.php?page=emplacement'>Emplacement</a></li>
          <li><a href='index.php?page=bsmDefinitif'>BSM</a></li>
          <li><a href='index.php?page=reintegrationDefinitif'>Reintegration</a></li>
          <li>
            <a href="index.php?page=bmmDefinitif">BMM</a>
          </li>
          <li>
            <a href='index.php?page=produitSignaler'>Rupture de stock</a>
          </li>



    <!--section------->
    <?php
    break;}
    case 1:{

      ?>
      <ul>
         <li><a href='index.php?page=daiDefinitif'>DAI</a></li>
         <li class='active'><a href='index.php?page=receptionDefinitif'>Reception</a></li>

    <?php
      break;}
      case 2:{

     ?>
     <!--service------->
     <ul>
        <li><a href='index.php?page=utilisateurs'>Utilisateurs</a></li>
        <li class='active'><a href='index.php?page=produits'>Produits</a></li>



     <?php
       break;}
     }
      ?>
      <li class='active'><a href='index.php?page=deconnexion'>Deconnexion</a></li>
    </ul>
      </div>

  </body>
</html>
