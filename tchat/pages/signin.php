<?php
    if(isLogged() == 1){
        header("Location:index.php?page=membres");
    }
?>

<?php

    if(isset($_POST['submit'])){
      $email = htmlspecialchars(trim($_POST['email']));
        $password = sha1(htmlspecialchars(trim($_POST['password'])));

        if(user_exist($email,$password) == 1){
             $_SESSION['tchat']=$email;
              header("Location:index.php?page=profil");
        }else{
            $error_user_not_found = "L'adresse email ou le mot de passe est incorrect";
        }


    }

?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" media="screen and (min-width:801px)" href="./css-inscription/desktop.css" type="text/css" />
  <link rel="stylesheet" media="screen and (max-width: 800px)" href="./css-inscription/petiteresolution.css" type="text/css" />
</head>
<body>
<!--contenaire du formulaire et de la partie gauche-->
<div class="animated slideInLeft" id="contenaire">


            <!--partie gauche-->
     <div class="animated bounceInUp" id="pgauche">
           <!-- contenaire de limage de haut-->
           <div class="animated bounceInUp" id="contenaireimg">
                <img class="imggauche  img-responsive" src="./img/logo.png" />
           </div>
           <!--fin du contenaire de limage haut-->
             <!--texts du welcome-->
           <h2 id="titrewelcome">Bienvenue dans World'sPro</h2>
           <h3 id="autretext">Rejoignez La Communauté Professionnelle</h3>
            <!--fin texts du welcome-->
      </div>
            <!--fin partie gauche-->
                 <!--partie droite-->
  <div class="animated bounceInDown" id="pdroite">
    <!--contenaire des elements de la partie droite-->
             <div id="containerelmpartiedroite">
                       <!--signup text-->
                  <h1 class="signup">Connexion</h1>
                    <!--le formulaire dinscription-->

                  <form action="" method="post" className="animated slideInLeft" novalidate="">
                    <input type="text" name="email"
                           id="email" class="optin"

                           placeholder="Email"
                           pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                           required
                           title="entrez un mail du type ---@--.--"/>

                     <input class="optin"
                     id="password"
                            type="password"
                            placeholder="..........."
                            name="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="inclure la majuscule/minscule/chiffre/lettre
                                  et il doit contenair au moins 8caracteres"
                            required/>
                     <a href="#" id="a" class="hide-password-login fa fa-eye"></a>
                     <p class="erreur"><?php echo (isset($error_user_not_found)) ? $error_user_not_found : ''; ?></p>
                   <button  id="t" type="submit"class="animated infinite pulse button btn btn-info" name="submit">
                         <span id="twitter">Connexion</span>
                   </button>
               </form>
                <!--fin du formulaire d'inscription-->

        <p class="liendeconnexion">Vous n'avez pas de compte? <a  class="connexion" href="index.php?page=register">Inscrivez vous</a></p>

             </div>
    <!--fin contenaire des elements de la partie droite-->
  </div>
           <!--fin partie droite-->
<!--fin du contenaire general-->
</div>


</body>
</html>
