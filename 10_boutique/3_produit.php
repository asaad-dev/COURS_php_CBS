<?php
   require_once 'inc/init.php';
   // jePrintr($_SESSION);

 ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   <!-- Font awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>La Boutique - Produit</title>
    <!-- Mes styles -->
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <main class="container bg-white m-4 mx-auto p-4">
      <div class="row">
         <div class="col-sm-12 col-md-4 border border-success mx-auto m-4 p-4">
            <h1 class="text-center">Les produits</h1>
         </div>
      </div>
      <!-- formulaire d'inscription-->
      <div class="row  p-3">            
         <table class="table table-striped">
         <thead class="table-dark">
         <tr>
            <th scope="col">Reference</th>
            <th scope="col">Categorie</th>
            <th scope="col">Titre</th>";
            <th scope="col">Description</th>
            <th scope="col">Couleur</th>
            <th scope="col">Taille</th>
            <th scope="col">Public</th>
            <!-- <th scope="col">Photo</th> -->
            <th scope="col">Prix</th>
            <th scope="col">Stock</th>
            <th scope="col">Fiche prduit</th>
         </tr>
         </thead>
         <?php
            $requete = $pdoBOU->query("SELECT * FROM produit");
            $nbr_produit = $requete->rowCount();

            foreach ( $pdoBOU->query( " SELECT * FROM produit " ) as $infos ) {
            echo "<tr>";
            echo "<td>" .$infos['reference']. "</td>";
            echo "<td>" .$infos['categorie']. "</td>";
            echo "<td>" .$infos['titre']. "</td>";
            echo "<td>" .$infos['description']. "</td>";
            echo "<td>" .$infos['couleur']. "</td>";
            echo "<td>" .$infos['taille']. "</td>";
            echo "<td>" .$infos['public']. "</td>";
            // echo "<td>" .$infos['photo']. "</td>";
            echo "<td>" .$infos['prix']. "</td>";
            echo "<td>" .$infos['stock']. "</td>";
            echo "<td><a href=\"3_fiche_produit.php?id_produit=".$infos['id_produit']. "\">Voir sa fiche</a></td>";

            echo "</tr>";
            }
            echo "</table>";
         ?>
        <!-- fin row -->
      </div>
    </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>