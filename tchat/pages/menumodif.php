<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/Menu.css">
  </head>
  <body>
    <?php
    include ('./functions/profil.func.php');

    global $db;

    if(isset($_SESSION['tchat'])) {
       $requser = $db->prepare("SELECT * FROM users WHERE email = ?");
       $requser->execute(array($_SESSION['tchat']));
       $user = $requser->fetch();

            if(isset($_POST['name2']) AND ($_POST['name2'] != $user['name'])){
                $newname= htmlspecialchars($_POST['name2']);
                $insertname= $db->prepare("UPDATE users SET name=? WHERE email=?");
                $insertname->execute(array($newname, $_SESSION['tchat']));

            }

        if(isset($_POST['prenom2']) AND ($_POST['prenom2'] != $user['prenom'])){
                $newname= htmlspecialchars($_POST['prenom2']);
                $insertname= $db->prepare("UPDATE users SET prenom=? WHERE email=?");
                $insertname->execute(array($newname, $_SESSION['tchat']));

            }

             if(isset($_POST['pseudo2']) AND ($_POST['pseudo2'] != $user['pseudo'])){
                $newpseudo= htmlspecialchars($_POST['pseudo2']);
                $insertpseudo= $db->prepare("UPDATE users SET pseudo=? WHERE email=?");
                $insertpseudo->execute(array($newpseudo, $_SESSION['tchat']));

            }
            if(isset($_POST['mdp1']) AND isset($_POST['mdp2'])){
                if(!empty($_POST['mdp1']) AND !empty($_POST['mdp2'])){
                $mdp1= sha1($_POST['mdp1']);
                $mdp2= sha1($_POST['mdp2']);
                if($mdp1== $mdp2){
                    $insertmdp= $db->prepare("UPDATE users SET password=? WHERE email=?");
                      $insertmdp->execute(array($mdp1, $_SESSION['tchat']));
                }

                else{
                    $msg=" Vos mots de passe ne sont pas identiques";
                }
            } else{
                $msg= "Les Champs Des Mots de Passe sont Obligatoires";
            }
                }

                if(isset($_POST['bio'])){
                $statut= htmlspecialchars($_POST['bio']);
                $insertstatut= $db->prepare("UPDATE users SET statut=? WHERE email=?");
                $insertstatut->execute(array($statut, $_SESSION['tchat']));

            }

        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
        {
            $tailleMax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            if($_FILES['avatar']['size'] <= $tailleMax){
                $extensionsUpload= strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if(in_array($extensionsUpload, $extensionsValides))
                {
                   $chemin = "membres/avatars/".$_SESSION['tchat'].".".$extensionsUpload;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                    if($resultat)
                    {
                        $updateavatar = $db->prepare('UPDATE users SET avatar= :avatar WHERE email=:email');
                        $updateavatar->execute(array('avatar' => $_SESSION['tchat'].".".$extensionsUpload, 'email' =>$_SESSION['tchat']));
                    }
                    else {
                        $msg='erreur durant importation de votre fichier';
                    }
                }
                else{
                    $msg= ' votre hoto doit etre sous format ...';
                }
            }
            else{
                $msg= 'votre photo de profil ne doit pas depasser 2Mo';
            }
        }




    ?>



    <div class="container">
    <!-- juste apré le menu-->
    <div class="corps">

        <div class="side_wrapper">

         <div class="inform-perso">


          <section class="about-dev">

           <header class="profile-card_header">
                      <div class="profile-card_header-container">
                               <?php
         foreach (get_user_profil() as $user) {
        ?>

                <div class="profile-card_header-imgbox">
                 <?php
                    if(!empty($user->avatar))
                    {
                        ?>
                        <img src="./membres/avatars/<?php echo $user->avatar; ?>" alt="">
                  <?php
                    }
                    ?>

                </div>

                <h1>
              <?php echo $user->name ?> <?php echo $user->prenom ?>
                <span>Etudiante en <?php echo $user->dm ?></span>
                </h1>

              </div>


            </header>




            <div class="profile-card_about">
              <h2>Informations Générales</h2>
<?php
                         if(isset($msg)){
                             ?>
                               <div class="err">
                            <?php echo $msg;  ?>
                                 </div>
                             <?php
                         }
                         ?>


                 <div class="apropos">
                     <div class="contentarea">
                      
                       <form class="form-style-7" method="post" action="" enctype="multipart/form-data">
    <ul>
    <li>
        <label for="name">Nom</label>
        <input type="text" name="name2" maxlength="100" value="<?php echo $user->name; ?>">
        <span>Entrez Votre Nom Ici</span>
    </li>
    <li>
        <label for="prenom2">Prénom</label>
        <input type="text" name="prenom2" maxlength="100" value="<?php echo $user->prenom; ?>">
        <span>Entrez Votre Prénom Ici</span>
    </li>

    <li>
        <label for="pseudo2">Nom D'utilisateur</label>
        <input type="text" name="pseudo2" maxlength="100" value="<?php echo $user->pseudo; ?>">
        <span>Votre Nom D'utilisateur(exemple: Kamelia123</span>
    </li>
    <li>
        <label for="mdp1">Mot De Passe</label>
        <input type="password" name="mdp1" maxlength="100">
        <span>Tapez Votre Nouveau MDP</span>
    </li>
    <li>
        <label for="mdp2">Confirmer Mot De Passe</label>
        <input type="password" name="mdp2" maxlength="100">
        <span>Confirmez votre MDP</span>
    </li>


    <li>
        <label for="bio">Statut</label>
        <textarea name="bio" onkeyup="adjust_textarea(this)" value="<?php echo $user->statut; ?>"></textarea>
        <span>Ajoutez Quelque chose à propos de vous</span>
    </li>
    <li>
        <label for="avatar">Mofidier Photo de profil</label>
        <input type="file" name="avatar" maxlength="100" >
        <span>Ajoutez une photo de Profil</span>
    </li>
    <li>
        <input type="submit" value="Sauvgarder">

    </li>

    </ul>
    </form>
     <?php
                    }
                    ?>
                      
                        
                        
                     </div>



                    </div>
              </div>
         </section>
            </div>

       <div class="right-menu">
            <a href="index.php?page=profil">
                <i class="fa fa-user">  </i>
                <span>Profil</span>
            </a>
            <a href="index.php?page=menumodif" class="active">
                <i class="fa fa-pencil" > </i>
                <span>  Modifier Mes Informations</span>
            </a>



        </div>
    </div>

    </div>
     </div>

    </div>
   
    <?php
     }
    ?>

  </body>
</html>
