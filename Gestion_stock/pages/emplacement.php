<link rel="stylesheet" href="./css/gestion.css">
<table>
  <caption>

    <div  class = "bouton_search">
      <form id="demo-2">
        <input type="search" placeholder="Search">
      </form>

      <button class="btn blue" onclick="ajouter()"><a href="#" id ="ajouter">Ajouter Emplacement</a></button>

    </div>
  </caption>

  <thead>
    <tr>

      <th scope="col">Numero Emplacement</th>
      <th scope="col">Nom Emplacement</th>

    </tr>
  </thead>
  <tbody>

      <?php foreach (recuperer_emplacement() as $emplacement) {  ?>
      <tr>
      <td data-label="<?php echo $emplacement ->id;?>"><?php echo $emplacement ->id;?></td>
      <td data-label="<?php echo $emplacement ->nom;?>"><?php echo $emplacement ->nom;?></td>


      
          </tr>
        <?php
      }
          ?>
 </tbody>
</table>

<script type="text/javascript" src="js/gestion.func.js"></script>
