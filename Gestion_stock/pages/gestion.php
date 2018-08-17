<table>
  <caption>

    <div  class = "bouton_search">
      <div class="wrap">
       <div class="search">
         <form class=""  method="post">
           <input type="text" name="chercher" class="searchTerm" placeholder="Recherche">
           <button type="submit" class="searchButton" name="boutonRecherche">
             <i class="fa fa-search"></i>
          </button>
         </form>

       </div>
      </div>
      <div id="buttons">
       <button class="btn blue" onclick="ajouter()" onblur="opacite()"><a href="#" id ="ajouter">Ajouter un produit</a></button>
      </div>
    </div>
  </caption>

  <thead>
    <tr>
      <th scope="col">Code produit</th>
      <th scope="col">Nom du produit</th>
      <th scope="col">Designation</th>
      <th scope="col">Emplacement</th>
      <th scope="col">Unite de mesure</th>
      <th scope="col">Quantite</th>
      <th scope="col">Supprimer/Modifier</th>
    </tr>
  </thead>
  <tbody>

      <?php foreach (recuperer_produits() as $produit) {  ?>
      <tr>
      <td data-label="<?php echo $produit ->id;?>"><?php echo $produit ->id;?></td>
      <td data-label="<?php echo $produit ->nom;?>"><?php echo $produit ->nom;?></td>
      <td data-label="<?php echo $produit ->designation;?>"><?php echo $produit ->designation;?></td>
      <td data-label="<?php echo $produit ->emplacement;?>"><?php echo $produit ->emplacement;?></td>
      <td data-label="<?php echo $produit ->unite;?>"><?php echo $produit ->unite;?></td>
      <td data-label="<?php echo $produit ->nom;?>"><?php echo $produit ->qte;?></td>
        <td class="topcoat-button-bar">
           <div class="topcoat-button-bar__item">
             <button class="topcoat-button-bar__button"><a href="index.php?page=modifierProduit&id=<?php echo $produit ->id ?>">Modidier</a></button>
           </div>
           <div class="topcoat-button-bar__item">
             <button class="topcoat-button-bar__button"><a href="index.php?page=supprimerProduit&id=<?php echo $produit ->id ?>">Supprimer</a></button>
           </div>

        </td>
          </tr>
        <?php
      }
          ?>



  </tbody>
</table>
<!---partie recherche------------------------>
<?php
if(isset($_POST["boutonRecherche"])){
  $search = htmlspecialchars(trim($_POST["chercher"]));

?>
<script type="text/javascript">

    window.open("index.php?page=rechercheGestion&mot_cle=<?php echo $search; ?>", "_self");
</script>

<?php

}


?>
