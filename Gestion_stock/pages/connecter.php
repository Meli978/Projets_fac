<?php

    if(isset($_POST['connecter'])){
        $login = htmlspecialchars(trim($_POST['login']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));

        if(user_exist($login,$mdp) == 1){


              $type = type_utilisateur($login);
              $_SESSION['gestion']=$type;
              switch($type){
                //0=> gestion de stock
                //1=> chef de service
                //2 => chef de section
                case 0 : header("Location:index.php?page=gestion");
                         break;
                case 1 : header("Location:index.php?page=dai");
                         break;
                case 2 : header("Location:index.php?page=utilisateurs");
                         break;

              }
        }else{
            $error_user_not_found = "Le login ou le mot de passe est incorrect";
        }


    }

?>

<div class="login">
  <div class="login-triangle"></div>

  <h2 class="login-header">Se connecter</h2>

  <form class="login-container" method="post">
    <p><input type="text" placeholder="Login" name="login"></p>
    <p><input type="mdp" placeholder="Mot de passe" name="mdp"></p>
     <p class="erreur"><?php echo (isset($error_user_not_found)) ? $error_user_not_found : ''; ?></p>
    <p><input type="submit" value="Connecter" name="connecter"></p>
  </form>

</div>
