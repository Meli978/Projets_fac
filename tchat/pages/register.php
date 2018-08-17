<?php
    if(isset($_POST['submit'])){
        $name = htmlspecialchars(trim($_POST['name']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $pseudo = (htmlspecialchars(trim($_POST['pseudo'])));
        $email = (htmlspecialchars(trim($_POST['email'])));
        $dm = (htmlspecialchars(trim($_POST['dm'])));
        $password = sha1(htmlspecialchars(trim($_POST['password'])));


    if(!empty($name) AND !empty($prenom)AND !empty($pseudo) AND !empty($email)AND !empty($dm)AND !empty($password)){
        if(email_taken($email) == 1){
            $erreur = "L'adresse email est déjà utilisée";
        }else{
            register($name,$prenom,$pseudo,$email,$dm,$password);
            $_SESSION['tchat'] = $email;
            header("Location:index.php?page=profil");
        }
    }
  else{
    $erreur = "Veuillez remplir tous vos champs";
  }
}

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" media="screen and (min-width:801px)" href="./css-inscription/desktop.css" type="text/css" />
  <link rel="stylesheet" media="screen and (max-width: 800px)" href="./css-inscription/petiteresolution.css" type="text/css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
             <h2 id="titrewelcome">Bienvenue Dans World'sPro</h2>
             <h3 id="autretext">Rejoignez La Communauté Professionnelle </h3>
              <!--fin texts du welcome-->
        </div>
              <!--fin partie gauche-->
              <!--partie droite-->
              <div class="animated bounceInDown" id="pdroite">
                <!--contenaire des elements de la partie droite-->
                         <div id="containerelmpartiedroitesignup">
                                   <!--signup text-->
                              <h1 class="signup">Inscription </h1>
                                <!--le formulaire dinscription-->
<!--on mets rien dans action car on reste sur cette bpage-->
<form method="post"  action="" className="animated slideInLeft" novalidate="" >
  <div class="flex">
           <input class="optin"
                    id="name"
                    type="text"
                    placeholder="Nom"
                    name="name"
                    pattern="^[A-Za-z0-9_-]{3,15}$"
                    title="Toute combinaison est de 3 et 15 caracteres avec:
                               minuscules,chiffres ou symboles speciaux _-
                                 seulement"
                    required
                     />
        <input class="optin"
               id="prenom"
               type="text"
               placeholder="Prénom"
               name="prenom"
               pattern="^[A-Za-z0-9_-]{3,15}$"
               title="Toute combinaison est de 3 et 15 caracteres avec:
                          minuscules,chiffres ou symboles speciaux -_-
                               seulement"
               required
                />
     </div>
     <input class="optin"
            id="pseudo"
            type="text"
            placeholder="Nom D'utilisateur"
            name="pseudo"
            pattern="^[A-Za-z0-9_-]{3,15}$"
            title="Toute combinaison est de 3 et 15 caracteres avec:
                       minuscules,chiffres ou symboles speciaux _-
                            seulement"
            required
             />
     <input type="text" name="email"
            id="email" class="optin"
            type="email"
            placeholder="Email"
            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
            required
            title="entrez un mail du type ---@--.--"/>

         <select   id="dm" name="dm" class="optin" required>
  <option value="">Choisissez Votre Domaine</option>
  <option value="Informatique">Informatique</option>
  <option value="Medecine">Medecine</option>
  <option value="Biologie">Biologie</option>
  <option value="Agriculture">agriculture</option>
  <option value="Psychologie">Psychologie</option>
  <option value="Droit">Droit</option>
  <option value="Pharmacie">Pharmacie</option>
  <option value="Commerce">Commerce</option>
  <option value="Architecture">Architecture</option>
  <option value="GenieCivil">Génie Civil</option>
  <option value="Mecanique">Mecanique</option>
  <option value="SciencesIslamiques">Science Islamique</option>
  <option value="ChirurgieDentaire">Chirugie dentaire</option>
</select>

  <input class="optin"
         id="password"
         type="password"
         placeholder="Mot de passe"
        name="password"
         pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
         onchange=" if(this.checkValidity()) form.passwordCon.pattern = this.value;"
         required
         title="inclure la majuscule/minscule/chiffre/lettre
                et il doit contenir au moins 8caracteres"/>
      <a href="#"  class="hide-password-con fa fa-eye"></a>

       <input class="optin"
       id="passwordCon"
            type="password"
            placeholder="Confirmer Mot De Passe"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Entrez lE meme mot de passe' : '');"
            required/>

          <a href="#" id="a" class="hide-password fa fa-eye"></a>

    <button type="submit" id="t" name="submit" value="submit" class="animated infinite pulse button btn btn-info">S'inscrire</button>
</form>
  <p class="error"><?php echo (isset($erreur)) ? $erreur : ''; ?></p>

  <h3 id="termeetcondtion">En Continuant Vous Accepter Nos	<a class="buttton" href="#popup1">Termes & Conditions</a> </h3>
             <!--la boite qui saffichera au clic-->
        <div id="popup1" class="overlay">
            	<div class="popup">
               		  <h2>Here i am</h2>
               		  <a class="close" href="">&times;</a>
               		   <div class="content">
               			      Thank to pop me out of that button,
                          but now i'm done so you can close this window.
                      </div>
              </div>
        </div>
              <!--fin acceptation des termes et condition-->
              <p class="liendeconnexion">Vous Etes Déjà Inscris? <a  class="connexion"href="index.php?page=signin">Connexion</a></p>
             </div>
    <!--fin contenaire des elements de la partie droite-->
  </div>
           <!--fin partie droite-->
<!--fin du contenaire general-->
</div>
