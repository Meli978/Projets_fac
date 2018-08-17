<?php
include 'fonctions/bsm.func.php';


$id = $_GET['id'];

  foreach(recuperer_produit_bsm($id) as $bsm){
    $tab_nom = array(unserialize($bsm ->nom_produit));
    $tab_qte = array(unserialize($bsm ->qte));
    $date    = $bsm->date;
    $nb  = count($tab_nom);
    $nom = array();
    $qte = array();
    $total = 0;
    $j     = 0;

       ?>

 <link rel="stylesheet" href="css/bsm.css">
<svg style="position: absolute; width: 0; height: 0; overflow: hidden" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <defs>
    <symbol viewBox="0 0 512 512" id="ion-android-arrow-dropright"><path d="M192 128l128 128-128 128z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-android-warning"><path d="M32 464h448L256 48 32 464zm248-64h-48v-48h48v48zm0-80h-48v-96h48v96z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-printer"><path d="M423.8 128H384V64H128v64H88.2C60.3 128 32 144.9 32 182.6v123.8c0 38 28.3 61.6 56.2 61.6H128v112h256V368h39.8c27.9 0 56.2-22.6 56.2-53.6V182.6c0-35.7-28.2-54.6-56.2-54.6zM368 464H144V288h224v176zm0-336H144V80h224v48zm48 64h-17v-16h17v16z"></path><path d="M160 320h192v16H160zM160 368h192v16H160zM160 416h192v16H160z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-printer2"><path d="M128 224h256v224H128z"></path><path d="M127.5 224.5h256v224h-256zM111.5 64.5h288v32h-288z"></path><path d="M432.5 112.5h-352c-17.645 0-33 12.842-33 30.309v158.393c0 17.468 15.355 33.299 33 33.299h31v-126h288v126h33c17.645 0 31-15.831 31-33.299V142.809c0-17.467-13.355-30.309-31-30.309z"></path></symbol>
    <symbol viewBox="0 0 512 512" id="ion-plane"><path d="M281.7 311.9c.4-6.9 8.3-4.5 8.3-4.5l62 12.6 128 48.7c0-24-3.8-26.5-9.4-30.7L288 207s-4.9-60-4.9-112.9c0-24.5-11.8-78.1-27.1-78.1s-27.1 54.4-27.1 78.1c0 50.2-4.9 112.9-4.9 112.9L41.4 338c-7.1 5-9.4 7.7-9.4 30.7L160 320l61.9-12.6s7.9-2.4 8.3 4.5c.4 6.9-1.2 69.1 5.9 102.1.9 4.4-2.5 4.7-4.8 7.4l-51.9 32.8c-1.7 1.9-2.5 7.3-2.5 7.3l-1 18.5 68-16 12 32 12-32 68 16-1-18.5c.1 0-.7-5.4-2.4-7.3l-51.9-32.8c-2.3-2.7-5.7-3-4.8-7.4 6.9-33 5.5-95.2 5.9-102.1z"></path></symbol>
    <symbol viewBox="0 0 32 32" id="ion-truck"><path d="M26.969 13c-0.553 0-1 0-1 0h-1.979l-0.013 1.256c0.598 0.341 0.992 0.989 0.992 1.744l0.042 6.938h-18.98v-6.938c0-0.738 0.404-1.376 1-1.723v-1.277h-2c0 0-0.448 0-1 0-0.553 0-1-0.448-1-1v-1c0-0.553 0.447-1 1-1 0.552 0 1 0 1 0v2h2v-3c0-1.104 0.896-2 2-2h13c1.104 0 2 0.896 2 2l-0.031 3h1.969v-2c0 0 0.447 0 1 0 0.552 0 1 0.447 1 1v1c0 0.552-0.448 1-1 1zM12.031 22h7v-1h-7v1zM12.031 20h7v-1h-7v1zM12.031 18h7v-1h-7v1zM8.031 21c0 0.552 0.447 1 1 1h1c0.552 0 1-0.448 1-1 0-0.553-0.448-1-1-1h-1c-0.552 0-1 0.447-1 1zM22.031 10c0-0.553-0.447-1-1-1h-11c-0.553 0-1 0.447-1 1v5h13v-5zM22.031 20h-1c-0.553 0-1 0.447-1 1 0 0.552 0.447 1 1 1h1c0.552 0 1-0.448 1-1 0-0.553-0.448-1-1-1zM23.031 6h-15c-1.104 0-2 0.896-2 2v-5c0-0.553 0.447-1 1-1h17c0.552 0 1 0.447 1 1v5c0-1.104-0.895-2-2-2zM25.031 24.938c0 0.552-0.448 1-1 1h-17c-0.553 0-1-0.448-1-1 0-0.553 0-1 0-1h19c0 0 0 0.447 0 1zM11.031 29c0 0.552-0.448 1-1 1h-1c-0.553 0-1-0.448-1-1v-2h3v2zM23.031 29c0 0.552-0.448 1-1 1h-1c-0.553 0-1-0.448-1-1v-2h3v2z"></path></symbol>
  </defs>
</svg>

<div class="all">
 <form class="" action="" method="post">
   <article id="article">

  <header id="header">
    <h1>
      <p>ENIEM</p>
    </h1>
    <span id="date">Date: <input type="date" name="date" value = "<?php echo $date; ?>"/> </span>

  </header>


  <section>
    <p>
      <span>Numero de bon: <strong><?php echo $bsm->id ?></strong></span>
    </p>

  <table>

  <thead>
    <tr>
      <th></th>
        <th scope="col">Code</th>
      <th scope="col">Nom</th>

      <th scope="col">Qte</th>



    </tr>
  </thead>
  <tbody id="tbody">
    <?php
    while($j < $nb):

    $tab_nom = $tab_nom[$j];
    $tab_qte = $tab_qte[$j];
    $ligne = count($tab_nom);
      for($i=0; $i<count($tab_nom); $i++){

        $nom = $tab_nom[$i];
        $qte = $tab_qte[$i];


         ?>
    <tr>
      <td>
        <input type="checkbox" class="checkClass" name="supp_modif[<?php echo $i ?>]" value="">
      </td>
      <?php
        $produit = recuperer_donnes_produit($nom);
        foreach($produit as $donnes){
          $id = ($donnes->id);
        }

       ?>
       <td><?php echo $id; ?></td>
      <td> <input type="text" name="<?php echo "nom_".$i ?>" value="<?php echo $nom; ?>"></td>
      <td><input type="text" name="<?php echo "qte_".$i ?>" value="<?php echo $qte; ?>"></td>



    </tr>
    <?php
    }
    $j ++;
  endwhile;
  ?>

  </tbody>
</table>

<br>

  </section>
  Tout cocher: <input type="checkbox" id="checkAll" name="supp_modif[<?php echo $i?>]" value="">

  <button  name="annuler">Supprimer</button>
  <button  name="modifier">Enregistrer</button>
</article>


</div>
</form>

<?php
}


//////fin html////////////////////
///appui sur annuler//////////////
if(isset( $_POST['annuler'])){

  if(isset($_POST["supp_modif"])){

    if(($ligne) == 1){
      supprimer_bsm($id);
        ?>

         <script type="text/javascript">
          window.open("index.php?page=bsmDefinitif", "_self");
        </script>
        <?php
    }
    else{
      $insertion_impossible = 0;
      $ligne_vide = 0;
      $tab_nom     = array();
      $tab_qte     = array();
      $date        = $_POST['date'];
    foreach ($_POST["supp_modif"] as $key =>$value) {
      $j = 0;
      while($j<=$nb):

        if($j !== $key){

        $nom_produit = $_POST["nom_".$j];
        $qte_produit = $_POST["qte_".$j];
        $mm_nom      = false;
        $qtePlus     = 0;//qte au cas ou ya pls produits qui ont l emm nom
        $produit_deja_insere = false;

        if(isset($nom_produit) && empty($nom_produit) && isset($qte_produit) && empty($qte_produit)){
          $ligne_vide ++;
        }
        else
        if(isset($nom_produit) && !empty($nom_produit) && isset($qte_produit) && !empty($qte_produit)){
          if(produit_existe($nom_produit) == 1){

    ///chercher produit qui ont le mm nom
            if($j !== ($nb - 1)){
              for($w=$j+1; $w<$nb; $w ++){
                $nom_mm = $_POST["nom_".$w];
                $qte_autre = $_POST["qte_".$w];
                if ((isset($nom_mm)) && (!empty($nom_mm)) && isset($qte_autre) && (!empty($qte_autre)) && ($nom_mm == $nom_produit)){
                  $mm_nom = true;
                  if(($qte_autre <= $qte_ancienne) && ($qte_ancienne >0)){
                    $qtePlus = $qtePlus + $qte_autre;
                  }

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

                modifier_bdd_produit($nom_produit,$qte_produit );
                $tab_nom[] = $nom_produit;
                $tab_qte[] = $qte_produit;

            }


        }
    //////fin produit_exite
        else{
            $insertion_impossible ++;
            $chaine = "le produit n'existe pas dans la bdd";
            ?>
            <script type="text/javascript">
              inserer('<?php echo $chaine; ?>');
            </script>
            <?php
            break;
        }
      }
      else{
        $insertion_impossible ++;
        $chaine = "champs manquants";
        echo $chaine;
        ?>
        <script type="text/javascript">
          inserer('<?php echo $chaine; ?>');
        </script>
        <?php
      ?>

      <?php
        break;
        }
        $j++;
      }

      else{
          $j++;
      }

    endwhile;

    //////fin lecture lignes///////////////////
      if(($insertion_impossible == 0) && ($ligne_vide!==$nb) && (!empty($tab_nom)) &&(!empty($tab_qte))){
        $tab_nom_bsm = serialize($tab_nom);
        $tab_qte_bsm = serialize($tab_qte);
        modifier_bsm($id,$tab_nom_bsm, $tab_qte_bsm,$date);
?>
      <script type="text/javascript">
      window.open("index.php?page=bsmDefinitif", "_self");
      </script>
<?php
      }

    }
  }
  }

}

////////////////appui sur modifier////////////////////
if(isset($_POST['modifier'])){

  $insertion_impossible = 0;
  $ligne_vide = 0;
  $tab_nom     = array();
  $tab_qte     = array();
  $date        = $_POST['date'];

  for($j=0; $j<$nb; $j++){
    $nom_produit = $_POST["nom_".$j];
    $qte_produit = $_POST["qte_".$j];
    $mm_nom      = false;
    $qtePlus     = 0;//qte au cas ou ya pls produits qui ont l emm nom
    $produit_deja_insere = false;

    if(isset($nom_produit) && empty($nom_produit) && isset($qte_produit) && empty($qte_produit)){
      $ligne_vide ++;
    }
    else
    if(isset($nom_produit) && !empty($nom_produit) && isset($qte_produit) && !empty($qte_produit)){
      if(produit_existe($nom_produit) == 1){

        //recuperer donnnees essentielles pour linsertion
        foreach(recuperer_donnes_produit($nom_produit) as $valeur){
          $qte_ancienne = ($valeur -> qte);
        }
 //////si la qte_ancienne nest pas egal a 0
      if($qte_ancienne >0){


  //si le produit existe et que la qte tapee est inferieur ou egal a $qte_ancienne
        if(($qte_ancienne >= $qte_produit )){

///chercher produit qui ont le mm nom
        if($j !== ($nb - 1)){
          for($w=$j+1; $w<$nb; $w ++){
            $nom_mm = $_POST["nom_".$w];
            $qte_autre = $_POST["qte_".$w];
            if ((isset($nom_mm)) && (!empty($nom_mm)) && isset($qte_autre) && (!empty($qte_autre)) && ($nom_mm == $nom_produit)){
              $mm_nom = true;
              if(($qte_autre <= $qte_ancienne) && ($qte_ancienne >0)){
                $qtePlus = $qtePlus + $qte_autre;
              }

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
           if($qte_produit <= $qte_ancienne){
            modifier_bdd_produit($nom_produit,$qte_produit );
            $tab_nom[] = $nom_produit;
            $tab_qte[] = $qte_produit;

          }
          else{
            $insertion_impossible ++;
            $chaine = "quantite trop grande";
            ?>

            <?php
            break;
          }
        }
      }
      else{
        $insertion_impossible ++;
        $chaine = "quantite trop grande";
      ?>

      <?php
        break;
      }
    }
    else{
      $insertion_impossible ++;
      $chaine = "quantite trop grande";
      echo "<span class='erreur'>".$chaine."</span>";
      break;
    }

    }
//////fin produit_exite
    else{
        $insertion_impossible ++;
        $chaine = "le produit n'existe pas dans la bdd";
        ?>

        <?php
        break;
    }
  }
  else{
    $insertion_impossible ++;
    $chaine = "champs manquants";
    ?>

    <?php
    break;
    }
  }



//////fin lecture lignes///////////////////
  if(($insertion_impossible == 0) && ($ligne_vide!==$nb) && (!empty($tab_nom)) &&(!empty($tab_qte))){
    $tab_nom_bsm = serialize($tab_nom);
    $tab_qte_bsm = serialize($tab_qte);
    modifier_bsm($id,$tab_nom_bsm, $tab_qte_bsm,$date);

?>

<script type="text/javascript">
  window.open("index.php?page=bsmDefinitif","_self");
</script>
<?php


  }






  }



 ?>

 <script type="text/javascript" src="js/bsm.func.js"></script>
