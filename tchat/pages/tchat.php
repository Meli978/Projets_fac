<?php
    $_SESSION['user'] = $_GET['user'];

    foreach(get_user() as $user){
        ?>
<html>
	<head>
      <link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
	<div class="bodyTchat">
      <div class="TchatContainer">


	    <div class="chatHeader">

          <div class="userPersonne">
            <div id="fleche">  <a href="index.php?page=membres"><div class="flecheretour fa fa-exchange"></div></a>  </div>
            
            <div class="<?php echo ($user->actif == 0) ? 'offline' : 'online' ?>"></div>
             <p class="user namediscu">
             <?php
                $name = $user->name;
               echo ucfirst(strtolower($name));
              ?>
               </p>
               <a href="index.php?page=supConv&user=<?php echo $user->email; ?>" ><div class="bannir fa fa-trash">
</div></a>
         </div>

      </div>

		<div class="messages-box">
		</div>

		<div class="chatform">
      <textarea type="text" id="message" class="chat" placeholder="Tapez votre message ici ... " ></textarea>
			<button type="submit" id="send" class="envoyer button fa fa-send"></button>
		</div>
	</div>
	</div>


	</body>
</html>
   <?php
    }
  ?>
