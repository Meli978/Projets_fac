<?php
  $nb = 4;
  recup_dai();

  foreach(recuperer_nb_dai() as $key=>$val){

    foreach($val as $id){
      $bon_id = $id;
    }
  }

  $bon_id ++;

   ?>
 <link rel="stylesheet" href="css/bsm.css">
 <script type="text/javascript" src="js/bsm.func.js">

 </script>
<svg style="position: absolute; width: 0; height: 0; overflow: hidden" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <defs>
    <symbol viewBox="0 0 512 512" id="ion-android-arrow-dropright"><path d="M192 128l128 128-128 128z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-android-warning"><path d="M32 464h448L256 48 32 464zm248-64h-48v-48h48v48zm0-80h-48v-96h48v96z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-printer"><path d="M423.8 128H384V64H128v64H88.2C60.3 128 32 144.9 32 182.6v123.8c0 38 28.3 61.6 56.2 61.6H128v112h256V368h39.8c27.9 0 56.2-22.6 56.2-53.6V182.6c0-35.7-28.2-54.6-56.2-54.6zM368 464H144V288h224v176zm0-336H144V80h224v48zm48 64h-17v-16h17v16z"></path><path d="M160 320h192v16H160zM160 368h192v16H160zM160 416h192v16H160z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-printer2"><path d="M128 224h256v224H128z"></path><path d="M127.5 224.5h256v224h-256zM111.5 64.5h288v32h-288z"></path><path d="M432.5 112.5h-352c-17.645 0-33 12.842-33 30.309v158.393c0 17.468 15.355 33.299 33 33.299h31v-126h288v126h33c17.645 0 31-15.831 31-33.299V142.809c0-17.467-13.355-30.309-31-30.309z"></path></symbol>

    <symbol viewBox="0 0 32 32" id="ion-truck"><path d="M26.969 13c-0.553 0-1 0-1 0h-1.979l-0.013 1.256c0.598 0.341 0.992 0.989 0.992 1.744l0.042 6.938h-18.98v-6.938c0-0.738 0.404-1.376 1-1.723v-1.277h-2c0 0-0.448 0-1 0-0.553 0-1-0.448-1-1v-1c0-0.553 0.447-1 1-1 0.552 0 1 0 1 0v2h2v-3c0-1.104 0.896-2 2-2h13c1.104 0 2 0.896 2 2l-0.031 3h1.969v-2c0 0 0.447 0 1 0 0.552 0 1 0.447 1 1v1c0 0.552-0.448 1-1 1zM12.031 22h7v-1h-7v1zM12.031 20h7v-1h-7v1zM12.031 18h7v-1h-7v1zM8.031 21c0 0.552 0.447 1 1 1h1c0.552 0 1-0.448 1-1 0-0.553-0.448-1-1-1h-1c-0.552 0-1 0.447-1 1zM22.031 10c0-0.553-0.447-1-1-1h-11c-0.553 0-1 0.447-1 1v5h13v-5zM22.031 20h-1c-0.553 0-1 0.447-1 1 0 0.552 0.447 1 1 1h1c0.552 0 1-0.448 1-1 0-0.553-0.448-1-1-1zM23.031 6h-15c-1.104 0-2 0.896-2 2v-5c0-0.553 0.447-1 1-1h17c0.552 0 1 0.447 1 1v5c0-1.104-0.895-2-2-2zM25.031 24.938c0 0.552-0.448 1-1 1h-17c-0.553 0-1-0.448-1-1 0-0.553 0-1 0-1h19c0 0 0 0.447 0 1zM11.031 29c0 0.552-0.448 1-1 1h-1c-0.553 0-1-0.448-1-1v-2h3v2zM23.031 29c0 0.552-0.448 1-1 1h-1c-0.553 0-1-0.448-1-1v-2h3v2z"></path></symbol>
  </defs>
</svg>

<div class="all">

 <form  method="post">
   <article id="article">

  <header id="header">
    <h1>
      <p>ENIEM</p>
    </h1>
    <span id="date">Date: <input type="date" name="date"/> </span>

  </header>


  <section>
    <p>
      <span>Numero de bon: <strong><?php echo $bon_id ?></strong></span>
    </p>

  <table>

  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">quantite</th>
      <th scope="col">Prix</th>

    </tr>
  </thead>
  <tbody id="tbody">
    <?php
    for($i=0; $i<$nb; $i++){
     ?>
    <tr>
      <td><input type="text" name="<?php echo "nom_".$i ?>" value=""></td>
      <td><input type="text" name="<?php echo "qte_".$i ?>" value=""></td>
      <td><input type="text" name="<?php echo "prix_".$i ?>" value=""></td>
    </tr>
    <?php
    } ?>
  </tbody>
</table>

<br>

<div class="item" id="item">
</div>

  </section>
  <button name="enregistrer"> Enregistrer</button>
</article>


</div>

</form>


<?php

if(isset($_POST["enregistrer"])){
  $insertion_impossible = 0;
  $ligne_vide = 0;
  $tab_nom     = array();
  $tab_qte     = array();
  $tab_prix     = array();
  $date        = $_POST['date'];
  if((isset($date)) && (!empty($date))){
  for($j=0; $j<$nb; $j++){
    $nom_produit = $_POST["nom_".$j];
    $qte_produit = $_POST["qte_".$j];
    $prix_produit = $_POST["prix_".$j];
    $mm_nom      = false;
    $qtePlus     = 0;//qte au cas ou ya pls produits qui ont l emm nom
    $produit_deja_insere = false;

    if(isset($nom_produit) && empty($nom_produit) && isset($qte_produit) && empty($qte_produit) && isset($prix_produit) && empty($prix_produit)){
      $ligne_vide ++;
    }
    else
    if(isset($nom_produit) && !empty($nom_produit) && isset($qte_produit) && !empty($qte_produit) && isset($prix_produit) && !empty($prix_produit)){

///chercher produit qui ont le mm nom
        if($j !== ($nb - 1)){
          for($w=$j+1; $w<$nb; $w ++){
            $nom_mm = $_POST["nom_".$w];
            $qte_autre = $_POST["qte_".$w];
            if ((isset($nom_mm)) && (!empty($nom_mm)) && isset($qte_autre) && (!empty($qte_autre)) && ($nom_mm == $nom_produit)){
              $mm_nom = true;
              $qtePlus = $qtePlus + $qte_autre;

            }
          }
        }

//il existe un produit qui a le mm nom, si il est deja inserer, on ne le reinsere pas
        if(($mm_nom) && (!empty($tab_nom))){

          foreach($tab_nom as $val){
            if ($nom_produit == $val){
              $produit_deja_insere = true;

            }
          }

        }
        else
        if(!empty($tab_nom))
        {
          foreach($tab_nom as $val){
            if ($nom_produit == $val){
              $produit_deja_insere = true;

            }
          }
        }
//si il na jamais ete inserer, on linsere dans la bdd
        if(!$produit_deja_insere){
           $qte_produit = $qte_produit + $qtePlus;
            $tab_nom[] = $nom_produit;
            $tab_qte[] = $qte_produit;
            $tab_prix[]= $prix_produit;
        }

      else{
        $insertion_impossible ++;
        $chaine = "quantite trop grande";
        ?>
        <script type="text/javascript">
        inserer('<?php echo $chaine; ?>');
      </script>
        break;

        </script>

        <?php
      }
  }
  else{
    $insertion_impossible ++;
    $chaine = "champs manquants";
    ?>
    <script type="text/javascript">
    inserer('<?php echo $chaine; ?>');
    </script>
    break;

    </script>

    <?php
    }
  }
}
else{
  $chaine = "veuillez entrer la date";
  ?>
  <script type="text/javascript">
  inserer('<?php echo $chaine; ?>');
</script>

  </script>

  <?php
}



//////fin lecture lignes///////////////////
  if(($insertion_impossible == 0) && ($ligne_vide!==$nb) && (!empty($tab_nom)) &&(!empty($tab_qte))){
    $tab_nom_dai = serialize($tab_nom);
    $tab_qte_dai = serialize($tab_qte);
    $tab_prix_dai = serialize($tab_prix);
    inserer_dai($tab_nom_dai, $tab_qte_dai,$tab_prix_dai,$date);
    ?>

    <script type="text/javascript">
      window.open("index.php?page=daiDefinitif", "_self");
    </script>
<?php
  }


}

?>
