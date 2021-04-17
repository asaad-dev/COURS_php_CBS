<?php
   require_once 'inc/init.php';
   // jePrintr($_SESSION);

   if (isset($_GET['id_produit'])) {
      $resultat = $pdoBOU->prepare( "SELECT * FROM produit WHERE id_produit = :id_produit" );
      $resultat->execute(array(
          ':id_produit' => $_GET['id_produit'] 
      ));
      
      if ($resultat->rowCount() == 0) { 
       header( 'location:3_produit.php' ); 
       exit(); //on arrête le script
   }
      
      $fiche = $resultat->fetch( PDO::FETCH_ASSOC );
      // jePrintr($fiche);

  } else { //sinon c'est que l'on a pas demandé un employé en particulier en arrivant sur cette 
      header( 'location:3_produit.php' );
      exit();
  }
 ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>La Boutique - Fiche Produit</title>
    <!-- Mes styles -->
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <main class="container py-5">
      <div class="row justify-content-center ">
         <div class="card border-success" style="width: 25rem;">
            <div class="card-body">
               <h4 class="alert alert-success m-0 text-center"> <?php echo $fiche['titre']; ?> </h4>
               <?php echo "<img class=\"img-fluid\" src=\"{$fiche['photo']}\">"; ?> 
               <p class="card-text alert alert-warning "><?php echo "Description:". " " .$fiche['description']. "<br>Prix :". " "  .$fiche['prix']. " €" ."<br>Stock :". " " .$fiche['stock'] ; ?></p>
               <button type="submit" class="btn btn-success">Acheter</button>
               <button type="submit" class="btn btn-warning"><a href="3_produit.php" class="text-decoration-none text-dark">Voir plus</a> </button>
            </div>
         </div>
      <!-- fin row -->
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