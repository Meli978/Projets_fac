<link rel="stylesheet" href="./css/gestion.css">
<?php

  if( nb_rupture_stock() !== 0){

 ?>
<table>
  <caption>

    <div  class = "bouton_search">
      <form id="demo-2">
        <input type="search" placeholder="Search">
      </form>

      <button class="btn blue" onclick="ajouter()"><a href="#" id ="ajouter">Ajouter Produit</a></button>

    </div>
  </caption>

  <thead>
    <tr>
        <th scope="col">Code Produit</th>
      <th scope="col">Nom du produit</th>
      <th scope="col">Designation</th>
      <th scope="col">Emplacement</th>
      <th scope="col">Unite de mesure</th>
      <th scope="col">Quantite</th>
    </tr>
  </thead>
  <tbody>

      <?php foreach (rupture_stock() as $produit) {  ?>
      <tr>
      <td data-label="<?php echo $produit ->id;?>"><?php echo $produit ->id;?></td>
      <td data-label="<?php echo $produit ->nom;?>"><?php echo $produit ->nom;?></td>
      <td data-label="<?php echo $produit ->designation;?>"><?php echo $produit ->designation;?></td>
      <td data-label="<?php echo $produit ->emplacement;?>"><?php echo $produit ->emplacement;?></td>
      <td data-label="<?php echo $produit ->unite;?>"><?php echo $produit ->unite;?></td>
      <td data-label="<?php echo $produit ->nom;?>"><?php echo $produit ->qte;?></td>
          </tr>
        <?php
      }
          ?>



  </tbody>
</table>

<?php

}
else{
  echo "Aucun produit n'est en rupture de stock";
}
 ?>

<script type="text/javascript" src="js/gestion.func.js"></script>
